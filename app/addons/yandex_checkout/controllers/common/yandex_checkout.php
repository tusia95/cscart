<?php
/***************************************************************************
 *                                                                          *
 *   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 ****************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/

use Tygh\Addons\YandexCheckout\Payments\YandexCheckout;
use Tygh\Addons\YandexCheckout\Enum\PaymentStatus;
use Tygh\Addons\YandexCheckout\ServiceProvider;
use Tygh\Enum\NotificationSeverity;
use Tygh\Tygh;

defined('BOOTSTRAP') or die('Access denied');

$response_service = ServiceProvider::getResponseService();
$receipt_service = ServiceProvider::getReceiptService();
$order_service = ServiceProvider::getOrderService();

if ($mode === 'check_payment') {
    $response = file_get_contents('php://input');
    $metadata = $response_service->getMetadataFromNotification($response);

    if (!isset($metadata['order_id'])) {
        return [CONTROLLER_STATUS_DENIED];
    }
    $order_info = fn_get_order_info($metadata['order_id']);
    if (empty($order_info)) {
        return [CONTROLLER_STATUS_NO_CONTENT];
    }
    $payment_data = $order_info['payment_info'];
    $payment_method_params = isset($order_info['payment_method']['processor_params']) ? $order_info['payment_method']['processor_params'] : [];
    $payment_service = ServiceProvider::getPaymentService();
    $payment_id = $payment_service->getPaymentId($order_info);
    if ($payment_id !== $response_service->getPaymentIdFromNotification($response)) {
        return [CONTROLLER_STATUS_DENIED];
    }

    $status = $response_service->getStatusFromNotification($response);
    if (isset($payment_data['status']) && $payment_data['status'] === $status) {
        fn_update_order_payment_info($order_info['order_id'], ['yandex_checkout.notification_received' => __('yes')]);
        return [CONTROLLER_STATUS_NO_CONTENT];
    }

    switch ($status) {
        case PaymentStatus::SUCCEEDED:
            $order_service->processChangeOrderStatus($order_info, $order_info['status']);
            break;
        case PaymentStatus::CANCELED:
            fn_change_order_status($order_info['order_id'], 'F');
            break;
        case PaymentStatus::WAITING_FOR_CAPTURE:
            if (isset($payment_method_params['held_order_status'])) {
                fn_change_order_status($order_info['order_id'], $payment_method_params['held_order_status']);
            } else {
                $order_service->processChangeOrderStatus($order_info, $order_info['status']);
            }
            break;
        default:
            break;
    }
    fn_update_order_payment_info($order_info['order_id'], ['yandex_checkout.notification_received' => __('yes')]);

} elseif ($mode === 'return_to_store') {
    $params = array_merge(
        [
            'order_id'     => null,
            'waiting_time' => 0,
        ],
        $_REQUEST);

    if (!$params['order_id']) {
        return [CONTROLLER_STATUS_DENIED];
    }

    $order_info = fn_get_order_info($params['order_id']);
    if (empty($order_info)) {
        return [CONTROLLER_STATUS_NO_CONTENT];
    }
    $payment_data = $order_info['payment_info'];

    /** @var \Tygh\SmartyEngine\Core $view */
    $view = Tygh::$app['view'];
    if (!defined('AJAX_REQUEST')) {
        $view->assign('check_order_status_url', fn_url('yandex_checkout.return_to_store'));
        $view->display('addons/yandex_checkout/views/yandex_checkout/return_to_store.tpl');
        return [CONTROLLER_STATUS_NO_CONTENT];
    }
    if ($params['waiting_time'] > ServiceProvider::getMaxWaitingTime()) {
        fn_set_notification(NotificationSeverity::NOTICE, __('notice'), __('yandex_checkout.payment_status_not_final'), 'S');
        fn_delete_notification('transaction_cancelled');
        fn_order_placement_routines('route', $order_info['order_id'], false);
    }

    $payment_processor = new YandexCheckout(
        $order_info['payment_method']['processor_params']['shop_id'],
        $order_info['payment_method']['processor_params']['scid'],
        $receipt_service
    );
    try {
        $payment_info = $payment_processor->getPaymentInfo($payment_data['payment_id']);
        $payment_status = $payment_info !== null ? $payment_info->getStatus() : null;
        switch ($payment_status) {
            case PaymentStatus::SUCCEEDED:
                $order_service->processChangeOrderStatus($order_info, $order_info['status']);
                fn_update_order_payment_info($order_info['order_id'], ['status' => $payment_status]);
                fn_order_placement_routines('route', $order_info['order_id'], false);
                break;
            case PaymentStatus::CANCELED:
                fn_set_notification(
                    NotificationSeverity::WARNING,
                    __('important'),
                    __('text_transaction_cancelled'),
                    'S',
                    'transaction_cancelled'
                );
                $details = $payment_info !== null ? $payment_info->getCancellationDetails() : null;
                if ($details) {
                    fn_update_order_payment_info(
                        $order_info['order_id'],
                        [
                            'status' => $payment_status,
                            'yandex_checkout.party' => __('yandex_checkout.' . $details->getParty()),
                            'reason' => __('yandex_checkout.' . $details->getReason()),
                        ]
                    );
                } else {
                    fn_update_order_payment_info($order_info['order_id'], ['status' => $payment_status]);
                }
                fn_order_placement_routines('route', $order_info['order_id'], false);
                break;
            case PaymentStatus::WAITING_FOR_CAPTURE:
                if (isset($order_info['payment_method']['processor_params']['held_order_status'])) {
                    fn_change_order_status($order_info['order_id'], $order_info['payment_method']['processor_params']['held_order_status']);
                } else {
                    $order_service->processChangeOrderStatus($order_info, $order_info['status']);
                }
                fn_update_order_payment_info($order_info['order_id'], ['status' => $payment_status]);
                fn_order_placement_routines('route', $order_info['order_id'], false);
                break;
            case PaymentStatus::PENDING:
            default:
                break;
        }
    } catch (Exception $exception) {
        $payment_processor->getLogger()->logException($exception);
        fn_set_notification(NotificationSeverity::ERROR, __('error'), $exception->getMessage());
        fn_order_placement_routines('route', $order_info['order_id'], false);
    }
}

return [CONTROLLER_STATUS_NO_CONTENT];

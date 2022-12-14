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

use Tygh\Enum\NotificationSeverity;
use Tygh\Enum\ObjectStatuses;
use Tygh\Enum\SiteArea;
use Tygh\Enum\UserTypes;
use Tygh\Enum\YesNo;
use Tygh\Providers\StorefrontProvider;
use Tygh\Registry;
use Tygh\Embedded;
use Tygh\Settings;
use Tygh\Themes\Themes;

function fn_settings_variants_addons_hybrid_auth_icons_pack()
{
    $available_icons_packs = [];

    $theme = Themes::areaFactory(SiteArea::STOREFRONT);
    $icons_packs = $theme->getDirContents(
        [
            'dir'       => 'media/images/addons/hybrid_auth/icons/',
            'get_dirs'  => true,
            'get_files' => false,
        ],
        Themes::STR_MERGE,
        Themes::PATH_ABSOLUTE,
        Themes::USE_BASE
    );

    foreach ($icons_packs as $icons_packs_name => $file_info) {
        $available_icons_packs[$icons_packs_name] = $icons_packs_name;
    }

    return $available_icons_packs;
}

function fn_hybrid_auth_post_delete_user($user_id, $user_data, $result)
{
    return db_query('DELETE FROM ?:hybrid_auth_users WHERE user_id = ?i', $user_id);
}

function fn_hybrid_auth_delete_company($company_id, $result)
{
    return db_query('DELETE FROM ?:hybrid_auth_providers WHERE company_id = ?i', $company_id);
}

/**
 * @param int $user_id     User identifier
 * @param int $provider_id Provider identifier
 *
 * @return bool|int|\mysqli_result|\PDOStatement
 */
function fn_hybrid_auth_get_unlink_provider($user_id, $provider_id)
{
    return db_query('DELETE FROM ?:hybrid_auth_users WHERE user_id = ?i AND provider_id = ?i', $user_id, $provider_id);
}

function fn_hybrid_auth_get_link_provider($user_id)
{
    $provider = db_get_fields('SELECT provider FROM ?:hybrid_auth_providers INNER JOIN ?:hybrid_auth_users USING(provider_id) WHERE user_id = ?i', $user_id);

    return (!empty($provider)) ? $provider : [];
}

function fn_hybrid_auth_init()
{
    $config = Registry::get('config.dir.addons') . 'hybrid_auth/' . 'process_config.php';

    try {
        $hybridauth = new Hybrid_Auth($config);
    }
        // if sometin bad happen
    catch( Exception $e ){

        switch ( $e->getCode() ) {
            case 0 : $message = __('hybrid_auth.unspecified_error'); break;
            case 1 : $message = __('hybrid_auth.configuration_error'); break;
            case 2 : $message = __('hybrid_auth.provider_error_configuration'); break;
            case 3 : $message = __('hybrid_auth.wrong_provider'); break;
            case 4 : $message = __('hybrid_auth.missing_credentials'); break;
            case 5 : $message = __('hybrid_auth.failed_auth'); break;

            default: $message = __('hybrid_auth.unspecified_error');
        }

        fn_set_notification(NotificationSeverity::ERROR, __('error'), $message);
        Tygh::$app['view']->display('addons/hybrid_auth/views/auth/login_error.tpl');

        return false;
    }

    return $hybridauth;
}

function fn_hybrid_auth_get_auth_data($hybridauth, $provider)
{
    $adapter = $hybridauth->getAdapter($provider);

    try {
        $auth_data = $adapter->getUserProfile();

    } catch (Exception $e) {
        fn_set_notification(NotificationSeverity::ERROR, __('error'), $e->getMessage());

        return false;
    }

    return $auth_data;
}

function fn_hybrid_auth_update_provider($provider_data)
{
    if (Registry::get('runtime.company_id') && !isset($provider_data['company_id'])) {
        $provider_data['company_id'] = Registry::get('runtime.company_id');
    }

    if (isset($provider_data['params'])) {
        $provider_data['app_params'] = serialize($provider_data['params']);
        unset($provider_data['params']);
    }

    $result = db_replace_into('hybrid_auth_providers', $provider_data);

    $provider_id = $result ?: $provider_data['provider_id'];

    fn_hybrid_auth_update_storefronts_providers(
        $provider_id,
        empty($provider_data['storefront_ids']) ? [] : explode(',', $provider_data['storefront_ids'])
    );

    return $result;
}

/**
 * Update a record in table hybrid_auth_storefronts_providers
 *
 * @param int           $provider_id    Provider identifier
 * @param array<string> $storefront_ids Storefront identifiers
 */
function fn_hybrid_auth_update_storefronts_providers($provider_id, array $storefront_ids)
{
    if (!$provider_id) {
        return;
    }

    db_query('DELETE FROM ?:hybrid_auth_storefronts_providers WHERE provider_id = ?i', $provider_id);

    if (!$storefront_ids) {
        return;
    }

    foreach ($storefront_ids as $storefront_id) {
        db_replace_into(
            'hybrid_auth_storefronts_providers',
            [
                'storefront_id' => $storefront_id,
                'provider_id'   => $provider_id,
            ]
        );
    }
}

function fn_hybrid_auth_get_providers_list($active = true)
{
    $storefront_id = StorefrontProvider::getStorefront()->storefront_id;

    $key = sprintf('hybrid_auth_providers_list_%s_%s_%s', $active, Registry::get('runtime.company_id'), $storefront_id);

    return Registry::getOrSetCache(
        ['hybrid_auth_providers_list', $key],
        ['storefronts', 'hybrid_auth_providers'],
        ['static', 'storefront'],
        static function () use ($active, $storefront_id) {
            $condition = '';

            if (Registry::get('runtime.company_id')) {
                $condition .=  db_quote(' AND company_id = ?i', Registry::get('runtime.company_id'));
            }

            if ($active) {
                $condition .=  db_quote(' AND status = ?s', ObjectStatuses::ACTIVE);
            }

            $providers_list = db_get_hash_array('SELECT * FROM ?:hybrid_auth_providers WHERE 1 ?p ORDER BY position', 'provider_id', $condition);
            $available_providers = fn_get_schema('hybrid_auth', 'providers');

            foreach ($providers_list as $provider_id => $provider) {
                $providers_list[$provider_id]['params'] = unserialize($provider['app_params']);
                $providers_list[$provider_id]['icon'] = fn_get_hybrid_auth_provider_icon($provider['provider']);
                $providers_list[$provider_id]['storefront_ids'] = fn_hybrid_auth_get_storefront_ids($provider_id);

                if (!SiteArea::isStorefront(AREA)) {
                    continue;
                }

                if (
                    (
                        empty($providers_list[$provider_id]['storefront_ids'])
                        || in_array($storefront_id, $providers_list[$provider_id]['storefront_ids'])
                    )
                    && array_key_exists($provider['provider'], $available_providers)
                ) {
                    unset($available_providers[$provider['provider']]);
                } else {
                    unset($providers_list[$provider_id]);
                }
            }

            return $providers_list;
        }
    );
}

/**
 * @param int $provider_id Provider identifier
 *
 * @return array<int, string>
 */
function fn_hybrid_auth_get_storefront_ids($provider_id)
{
    return db_get_fields('SELECT storefront_id FROM ?:hybrid_auth_storefronts_providers WHERE provider_id = ?i', (int) $provider_id);
}

/**
 * Returns providers list
 *
 * @return array<int, array<string>>|string $providers
 */
function fn_hybrid_auth_get_providers_list_content()
{
    $providers = fn_hybrid_auth_get_providers_list();

    return !empty($providers) ? $providers : '&nbsp';
}

/**
 * Return provider data
 *
 * @param int $provider_id Provider identifier
 *
 * @return array{
 *     provider_id: int,
 *     name: string,
 *     company_id: int,
 *     provider: string,
 *     position: int,
 *     app_id: string,
 *     app_secret_key: string,
 *     app_public_key: string,
 *     app_params: string,
 *     status: string,
 *     params: string|string[],
 *     storefront_ids: int[]
 * } $provider_data
 */
function fn_hybrid_auth_get_provider_data($provider_id)
{
    $condition = '';
    if (Registry::get('runtime.company_id')) {
        $condition =  db_quote('AND company_id = ?i ', Registry::get('runtime.company_id'));
    }

    $provider_data = db_get_row('SELECT * FROM ?:hybrid_auth_providers WHERE provider_id = ?i ?p', $provider_id, $condition);

    $provider_data['params'] = '';
    if (!empty($provider_data['app_params'])) {
        $provider_data['params'] = unserialize($provider_data['app_params']);
    }

    $provider_data['storefront_ids'] = fn_hybrid_auth_get_storefront_ids($provider_id);

    return $provider_data;
}

/**
 * Delete provider by provider identifier
 *
 * @param int $provider_id Provider identifier
 *
 * @return int|null $result
 */
function fn_hybrid_auth_delete_provider($provider_id)
{
    $condition = '';
    if (Registry::get('runtime.company_id')) {
        $condition =  db_quote('AND company_id = ?i ', Registry::get('runtime.company_id'));
    }

    $result = db_query('DELETE FROM ?:hybrid_auth_providers WHERE provider_id = ?i ?p', $provider_id, $condition);

    if ($result) {
        db_query('DELETE FROM ?:hybrid_auth_storefronts_providers WHERE provider_id = ?i', $provider_id);
    }

    return $result;
}

function fn_hybrid_auth_get_user_data($auth_data)
{
    $condition = db_quote('?:hybrid_auth_users.identifier = ?s', $auth_data->identifier);

    if (fn_allowed_for('ULTIMATE')) {
        if (!YesNo::toBool(Registry::get('settings.Stores.share_users')) && AREA !== SiteArea::ADMIN_PANEL) {
            $condition .= fn_get_company_condition('?:users.company_id');
        }
    }

    $join = 'JOIN ?:hybrid_auth_users ON ?:hybrid_auth_users.user_id = ?:users.user_id';

    return db_get_row('SELECT ?:users.user_id, password FROM ?:users ?p WHERE ?p', $join, $condition);
}

/**
 * @param object $auth_data Auth data
 * @param string $provider  Provider
 *
 * @return array<string> $user_data
 */
function fn_hybrid_auth_create_user($auth_data, $provider)
{
    Registry::get('settings.Checkout.address_position') === 'billing_first' ? $address_zone = 'b' : $address_zone = 's';
    $user_data = [];
    $user_data['email'] = (!empty($auth_data->verifiedEmail)) ? $auth_data->verifiedEmail : ((!empty($auth_data->email)) ? $auth_data->email : '');
    $user_data['user_login'] = (!empty($auth_data->verifiedEmail)) ? $auth_data->verifiedEmail : ((!empty($auth_data->email)) ? $auth_data->email : $auth_data->displayName);
    $user_data['user_type'] = UserTypes::CUSTOMER;
    $user_data['is_root'] = YesNo::NO;
    $password_length = (int) max(USER_PASSWORD_LENGTH, (int) Registry::get('settings.Security.min_account_password_length'));
    $user_data['password'] = $user_data['password1'] = $user_data['password2'] = fn_generate_password($password_length);
    $user_data[$address_zone . '_firstname'] = $user_data['firstname'] = (!empty($auth_data->firstName)) ? $auth_data->firstName : '';
    $user_data[$address_zone . '_lastname'] = $user_data['lastname'] = (!empty($auth_data->lastName)) ? $auth_data->lastName : '';
    $user_data[$address_zone . '_phone'] = $user_data['phone'] = (!empty($auth_data->phone)) ? $auth_data->phone : '';
    $user_data[$address_zone . '_address'] = (!empty($auth_data->address)) ? $auth_data->address : '';
    $user_data[$address_zone . '_country'] = (!empty($auth_data->country)) ? $auth_data->country : '';
    $user_data[$address_zone . '_state'] = (!empty($auth_data->region)) ? $auth_data->region : '';
    $user_data[$address_zone . '_city'] = (!empty($auth_data->city)) ? $auth_data->city : '';
    $user_data[$address_zone . '_zipcode'] = (!empty($auth_data->zip)) ? $auth_data->zip : '';

    /**
     * Allows to change user data before creating new user account
     *
     * @param stdClass $auth_data Profile data gotten from server response
     * @param string   $provider  Id of social login provider
     * @param array    $user_data Current user data
     */
    fn_set_hook('hybrid_auth_create_user', $auth_data, $provider, $user_data);

    list($user_data['user_id'], $profile_id) = fn_update_user('', $user_data, $auth, true, false, false);

    if (!empty($user_data['email'])) {
        /** @var \Tygh\Mailer\Mailer $mailer */
        $mailer = Tygh::$app['mailer'];

        $mailer->send(
            [
                'to'            => $user_data['email'],
                'from'          => 'company_orders_department',
                'data'          => [
                    'user_data' => $user_data,
                    'user_name' => $user_data[$address_zone . '_firstname'] . ' ' . $user_data[$address_zone . '_lastname'],
                    'url'       => fn_url('profiles.update', $user_data['user_type'])
                ],
                'template_code' => 'hybrid_auth_create_profile',
                'tpl'           => 'addons/hybrid_auth/create_profile.tpl', // this parameter is obsolete and is used for back compatibility
            ],
            SiteArea::STOREFRONT,
            DESCR_SL
        );
    }

    return $user_data;
}

/**
 * @param int    $user_id     User identifier
 * @param string $identifier  Identifier
 * @param int    $provider_id Provider identifier
 *
 * @return int
 */
function fn_hybrid_auth_link_provider($user_id, $identifier, $provider_id)
{
    $_user_data = [
        'user_id'     => $user_id,
        'provider_id' => $provider_id,
        'identifier'  => $identifier,
        'timestamp'   => TIME,
    ];

    return db_query('REPLACE INTO ?:hybrid_auth_users ?e', $_user_data);
}

function fn_hybrid_auth_process($action, &$redirect_url = '')
{
    $hybridauth = fn_hybrid_auth_init();

    if ($hybridauth) {

        unset(Tygh::$app['session']['hybrid_auth']);
        $provider_id = empty($_REQUEST['provider_id']) ? 0 : $_REQUEST['provider_id'];
        $provider_data = fn_hybrid_auth_get_provider_data($provider_id);
        $provider = empty($provider_data['provider']) ? '' : $provider_data['provider'];

        if (!empty($provider) && $hybridauth->isConnectedWith($provider)) {

            $auth_data = fn_hybrid_auth_get_auth_data($hybridauth, $provider);

            if (!$auth_data) {
                return HYBRID_AUTH_ERROR_AUTH_DATA;
            }

            fn_hybrid_auth_fix_old_user($auth_data, $provider_id); // linked users without providers. for compatibility with the old version of the add-on
            $user_data = fn_hybrid_auth_get_user_data($auth_data);

            if ($action === 'login_provider') {
                $redirect_url = fn_hybrid_auth_login($user_data, $auth_data, $provider_id);

            } elseif ($action === 'link_provider') {
                $redirect_url = fn_hybrid_auth_link($user_data, $auth_data, $provider_id);

            } elseif ($action === 'link_provider_profile') {
                $redirect_url = fn_hybrid_auth_link_profile($auth_data, $provider_id);
            }

            $status = HYBRID_AUTH_LOGIN;

        } else {

            if (!empty($provider)) {
                $params = [];

                if ($provider === 'OpenID') {
                    $params['openid_identifier'] = @ $_REQUEST['openid_identifier'];
                }

                if ($provider === 'twitter') {
                    $params['login_done'] = fn_url('/auth/twitter');
                }
            }

            if (!empty($_REQUEST['redirect_to_idp'])) {

                try {
                    $adapter = $hybridauth->authenticate($provider, $params);
                    $status = HYBRID_AUTH_OK;

                } catch (Exception $e) {
                    fn_set_notification(NotificationSeverity::ERROR, __('error'), $e->getMessage());
                    $status = HYBRID_AUTH_LOGIN;
                }

            } else {
                Tygh::$app['view']->assign('provider', $provider);
                $status = HYBRID_AUTH_LOADING;
            }
        }

    } else {
        $status = HYBRID_AUTH_FALSE;
    }

    if (!empty($_REQUEST['embedded'])) {
        $redirect_url = Embedded::resolveUrl(
            $redirect_url . (parse_url($redirect_url, PHP_URL_QUERY) ? '&' : '?') . '_ts=' . TIME
        );
    }

    return $status;
}

/**
 * @param array<string> $user_data   User data
 * @param object        $auth_data   Auth data
 * @param int           $provider_id Provider identifier
 *
 * @return string $redirect_url
 */
function fn_hybrid_auth_login(array $user_data, $auth_data, $provider_id)
{
    $provider_data = fn_hybrid_auth_get_provider_data($provider_id);
    /** @var string $provider */
    $provider = $provider_data['provider'];

    if (empty($user_data['user_id'])) {

        if (!empty($auth_data->verifiedEmail)) {
            $email = $auth_data->verifiedEmail;

        } elseif (!empty($auth_data->email)) {
            $email = $auth_data->email;

        } elseif (!empty($_REQUEST['user_email'])) {
            $email = $_REQUEST['user_email'];
            $auth_data->email = $email;

        } elseif (YesNo::toBool(Registry::get('addons.hybrid_auth.autogen_email'))) {
            $email = $provider . '-' . $auth_data->identifier . '@example.com';
            $auth_data->email = $email;
        } else {
            $email = '';
        }

        if (empty($email)) {
            $user_status = LOGIN_STATUS_NOT_FOUND_EMAIL;

        } else {
            $user_id = fn_is_user_exists(0, ['email' => $email]);

            if (empty($user_id)) {
                $user_data = fn_hybrid_auth_create_user($auth_data, $provider);
                if (!empty($user_data['user_id'])) {
                    fn_hybrid_auth_link_provider((int) $user_data['user_id'], $auth_data->identifier, $provider_id);
                }
            } else {
                $user_status = LOGIN_STATUS_USER_EXIST;
                $user_data = fn_get_user_info($user_id);
            }
        }
    }

    if (empty($user_status)) {
        if (!empty($user_data['user_id'])) {
            $user_status = fn_login_user($user_data['user_id'], true);
        } else {
            $user_status = LOGIN_STATUS_USER_NOT_FOUND;
        }
    }

    if (!empty($_REQUEST['redirect_url'])) {
        $parsed_url = parse_url($_REQUEST['redirect_url'], PHP_URL_QUERY);
        parse_str($parsed_url, $url_params);
        $redirect_url = (!empty($url_params['return_url'])) ? fn_url($url_params['return_url']) : fn_url($_REQUEST['redirect_url']);
    } else {
        $redirect_url = fn_url();
    }

    if ($user_status === LOGIN_STATUS_USER_DISABLED) {
        fn_set_notification(NotificationSeverity::ERROR, __('error'), __('error_account_disabled'));

    } elseif ($user_status === LOGIN_STATUS_USER_NOT_FOUND) {
        fn_delete_notification('user_exist');
        fn_set_notification(NotificationSeverity::WARNING, __('warning'), __('hybrid_auth.cant_create_profile'));

    } elseif ($user_status === LOGIN_STATUS_USER_EXIST) {
        Tygh::$app['session']['hybrid_auth']['email'] = $user_data['email'];
        Tygh::$app['session']['hybrid_auth']['identifier'] = $auth_data->identifier;
        Tygh::$app['session']['hybrid_auth']['provider_id'] = $provider_id;
        Tygh::$app['session']['hybrid_auth']['redirect_url'] = $redirect_url;

        $redirect_url = fn_url('auth.connect_social');

    } elseif ($user_status === LOGIN_STATUS_NOT_FOUND_EMAIL) {
        Tygh::$app['session']['hybrid_auth']['identifier'] = $auth_data->identifier;
        Tygh::$app['session']['hybrid_auth']['provider_id'] = $provider_id;
        Tygh::$app['session']['hybrid_auth']['redirect_url'] = $redirect_url;

        $redirect_url = fn_url('auth.specify_email');
    }

    /**
     * Executes after log in, allows you to modify a redirect url and session data.
     *
     * @param array<string, string> $user_data Information about user.
     * @param Hybrid_User_Profile   $auth_data Authentication data from Oauth2 server.
     * @param int                   $provider_id Provider identifier.
     * @param string                $redirect_url Current redirect url address.
     * @param string                $user_status  Current user login status.
     */
    fn_set_hook('hybrid_auth_login_post', $user_data, $auth_data, $provider_id, $redirect_url, $user_status);

    return $redirect_url;
}

/**
 * @param array<string> $user_data   User data
 * @param object        $auth_data   Auth data
 * @param int           $provider_id Provider identifier
 *
 * @return string $redirect_url
 */
function fn_hybrid_auth_link(array $user_data, $auth_data, $provider_id)
{
    if (empty($user_data['user_id'])) {
        fn_hybrid_auth_link_provider($user_data['user_id'], $auth_data->identifier, $provider_id);
    }

    if (!empty($user_data['user_id'])) {
        $user_status = fn_login_user($user_data['user_id'], true);
    } else {
        $user_status = LOGIN_STATUS_USER_NOT_FOUND;
    }

    $redirect_url = (!empty($_REQUEST['redirect_url'])) ? $_REQUEST['redirect_url'] : fn_url();

    if ($user_status === LOGIN_STATUS_USER_DISABLED) {
        fn_set_notification(NotificationSeverity::ERROR, __('error'), __('error_account_disabled'));

    } elseif ($user_status === LOGIN_STATUS_USER_NOT_FOUND) {
        fn_delete_notification('user_exist');
        fn_set_notification(NotificationSeverity::WARNING, __('warning'), __('hybrid_auth.cant_create_profile'));
    }

    return $redirect_url;
}

/**
 * @param object $auth_data   Auth data
 * @param int    $provider_id Provider identifier
 *
 * @return string $redirect_url
 */
function fn_hybrid_auth_link_profile($auth_data, $provider_id)
{
    if (!fn_hybrid_auth_is_exist($auth_data)) {
        if (!empty(Tygh::$app['session']['auth']['user_id'])) {
            fn_hybrid_auth_link_provider(Tygh::$app['session']['auth']['user_id'], $auth_data->identifier, $provider_id);
        }
    } else {
        fn_set_notification(NotificationSeverity::WARNING, __('notice'), __('hybrid_auth.text_user_is_already_link'));
    }

    $redirect_url = (!empty($_REQUEST['return_url'])) ? $_REQUEST['return_url'] : fn_url('profiles.update');

    return $redirect_url;
}

function fn_hybrid_auth_is_exist($auth_data)
{
    $user_data = db_get_row('SELECT user_id FROM ?:hybrid_auth_users WHERE identifier = ?s', $auth_data->identifier);

    return !empty($user_data);
}

/**
 * @param object $auth_data   Auth data
 * @param int    $provider_id Provider identifier
 */
function fn_hybrid_auth_fix_old_user($auth_data, $provider_id)
{
    $user_data = db_get_row('SELECT user_id FROM ?:hybrid_auth_users WHERE identifier = ?s AND provider_id = 0', $auth_data->identifier);

    if (!empty($user_data)) {
        db_query('UPDATE ?:hybrid_auth_users SET provider_id = ?i WHERE user_id = ?i', $provider_id, $user_data['user_id']);
    }
}

/**
 * Gets path to provider's icon.
 *
 * @param string $provider_id Provide identifier
 *
 * @return string Path to icon
 */
function fn_get_hybrid_auth_provider_icon($provider_id)
{
    $theme = Themes::areaFactory();
    $icons_pack = Registry::ifGet('addons.hybrid_auth.icons_pack', '');
    if ($file_info = $theme->getContentPath("media/images/addons/hybrid_auth/icons/{$icons_pack}/{$provider_id}.png")) {
        return Registry::get('config.current_location') . '/' . $file_info[Themes::PATH_RELATIVE];
    }

    return '';
}

/**
 * The "url_post" hook handler.
 *
 * Actions performed:
 *  - Change url to removing all query parameters from it.
 *
 * @param string                               $_url              Output URL
 * @param string                               $area              Area
 * @param string                               $url               Input URL
 * @param string                               $protocol          Output URL protocol (protocol://). If equals 'rel', no protocol will be included
 * @param int                                  $company_id_in_url Equals company_id if it is present in $url, otherwise false
 * @param string                               $lang_code         Two letters language code
 * @param array<string, array<string, string>> $locations         Locations used for different protocols in store's area.
 *
 * @see \fn_url()
 */
function fn_hybrid_auth_url_post(&$_url, $area, $url, $protocol, $company_id_in_url, $lang_code, $locations)
{
    if ($url === '/auth/twitter') {
        $_url = $locations[$area][$protocol] . $url;
    }
}

/**
 * Gets callback url by storefronts
 *
 * @param array{params?: array{callback_url?: string}} $provider_schema Provider schema
 * @param int[]                                        $storefront_ids  Storefront identifiers
 *
 * @return string[]
 */
function fn_hybrid_auth_get_callback_urls(array $provider_schema, array $storefront_ids = [])
{
    $callback_urls = [];

    if (!isset($provider_schema['params'])) {
        return $callback_urls;
    }

    /** @var array{callback_url?: string} $params */
    $params = reset($provider_schema['params']);

    if (!isset($params['callback_url'])) {
        return $callback_urls;
    }

    foreach ($storefront_ids as $storefront_id) {
        $setting = Settings::instance(['storefront_id' => $storefront_id])->getSettingDataByName('secure_storefront');
        $url = fn_url('?storefront_id=' . $storefront_id, SiteArea::STOREFRONT, YesNo::toBool($setting['value']) ? 'https' : 'http');
        $url = preg_replace(['/\/' . Registry::get('config.customer_index') . '$/', '/\/$/'], '', $url);

        $callback_urls[$storefront_id] = $url . $params['callback_url'];
    }

    return $callback_urls;
}

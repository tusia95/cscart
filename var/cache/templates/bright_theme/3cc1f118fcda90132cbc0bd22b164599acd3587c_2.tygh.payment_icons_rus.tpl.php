<?php
/* Smarty version 4.1.0, created on 2022-11-27 14:28:34
  from 'C:\XAMPP\htdocs\cscart\design\themes\bright_theme\templates\blocks\static_templates\payment_icons_rus.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_638349e2bc7698_05764115',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3cc1f118fcda90132cbc0bd22b164599acd3587c' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\cscart\\design\\themes\\bright_theme\\templates\\blocks\\static_templates\\payment_icons_rus.tpl',
      1 => 1669548441,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638349e2bc7698_05764115 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\block.hook.php','function'=>'smarty_block_hook',),1=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\function.set_id.php','function'=>'smarty_function_set_id',),));
if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design'] == "Y" && (defined('AREA') ? constant('AREA') : null) == "C") {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "template_content", null, null);?>
<div class="ty-payment-icons ty-payment-rus-icons">
    <?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('hook', array('name'=>"index:rus_payment_icons"));
$_block_repeat=true;
echo smarty_block_hook(array('name'=>"index:rus_payment_icons"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
    <span class="ty-payment-icons__item yandex">&nbsp;</span>
    <span class="ty-payment-icons__item visa">&nbsp;</span>
    <span class="ty-payment-icons__item mastercard">&nbsp;</span>
    <span class="ty-payment-icons__item qiwi">&nbsp;</span>
    <span class="ty-payment-icons__item paypal">&nbsp;</span>
    <?php $_block_repeat=false;
echo smarty_block_hook(array('name'=>"index:rus_payment_icons"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>
</div>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
if (trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content'))) {
if ($_smarty_tpl->tpl_vars['auth']->value['area'] == "A") {?><span class="cm-template-box template-box" data-ca-te-template="blocks/static_templates/payment_icons_rus.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/static_templates/payment_icons_rus.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');?>
<!--[/tpl_id]--></span><?php } else {
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');
}
}
} else { ?>
<div class="ty-payment-icons ty-payment-rus-icons">
    <?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('hook', array('name'=>"index:rus_payment_icons"));
$_block_repeat=true;
echo smarty_block_hook(array('name'=>"index:rus_payment_icons"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
    <span class="ty-payment-icons__item yandex">&nbsp;</span>
    <span class="ty-payment-icons__item visa">&nbsp;</span>
    <span class="ty-payment-icons__item mastercard">&nbsp;</span>
    <span class="ty-payment-icons__item qiwi">&nbsp;</span>
    <span class="ty-payment-icons__item paypal">&nbsp;</span>
    <?php $_block_repeat=false;
echo smarty_block_hook(array('name'=>"index:rus_payment_icons"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>
</div>
<?php }
}
}

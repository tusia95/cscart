<?php
/* Smarty version 4.1.0, created on 2022-11-27 14:28:09
  from 'C:\XAMPP\htdocs\cscart\design\themes\responsive\templates\addons\gdpr\hooks\index\styles.post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_638349c9776096_31785662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0aa44f97f3a94c45dca10f26b73338fd52c8cb91' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\cscart\\design\\themes\\responsive\\templates\\addons\\gdpr\\hooks\\index\\styles.post.tpl',
      1 => 1669548457,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638349c9776096_31785662 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\function.style.php','function'=>'smarty_function_style',),1=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\function.set_id.php','function'=>'smarty_function_set_id',),));
if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design'] == "Y" && (defined('AREA') ? constant('AREA') : null) == "C") {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "template_content", null, null);
echo smarty_function_style(array('src'=>"addons/gdpr/styles.less"),$_smarty_tpl);?>

<?php echo smarty_function_style(array('src'=>"addons/gdpr/klaro.css"),$_smarty_tpl);
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
if (trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content'))) {
if ($_smarty_tpl->tpl_vars['auth']->value['area'] == "A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/gdpr/hooks/index/styles.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/gdpr/hooks/index/styles.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');?>
<!--[/tpl_id]--></span><?php } else {
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');
}
}
} else {
echo smarty_function_style(array('src'=>"addons/gdpr/styles.less"),$_smarty_tpl);?>

<?php echo smarty_function_style(array('src'=>"addons/gdpr/klaro.css"),$_smarty_tpl);
}
}
}

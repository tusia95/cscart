<?php
/* Smarty version 4.1.0, created on 2022-11-27 14:28:14
  from 'C:\XAMPP\htdocs\cscart\design\themes\responsive\templates\addons\hybrid_auth\hooks\index\login_buttons.pre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_638349ce656019_55250875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '267011c6558bd576adcce692819c22d7630b4d06' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\cscart\\design\\themes\\responsive\\templates\\addons\\hybrid_auth\\hooks\\index\\login_buttons.pre.tpl',
      1 => 1669548455,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
    'tygh:addons/hybrid_auth/views/auth/components/login_buttons.tpl' => 2,
  ),
),false)) {
function content_638349ce656019_55250875 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\function.set_id.php','function'=>'smarty_function_set_id',),));
if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design'] == "Y" && (defined('AREA') ? constant('AREA') : null) == "C") {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "template_content", null, null);
if (is_array($_smarty_tpl->tpl_vars['providers_list']->value)) {?>
    <?php $_smarty_tpl->_subTemplateRender("tygh:addons/hybrid_auth/views/auth/components/login_buttons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
if (trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content'))) {
if ($_smarty_tpl->tpl_vars['auth']->value['area'] == "A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/hybrid_auth/hooks/index/login_buttons.pre.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/hybrid_auth/hooks/index/login_buttons.pre.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');?>
<!--[/tpl_id]--></span><?php } else {
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');
}
}
} else {
if (is_array($_smarty_tpl->tpl_vars['providers_list']->value)) {?>
    <?php $_smarty_tpl->_subTemplateRender("tygh:addons/hybrid_auth/views/auth/components/login_buttons.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
}
}

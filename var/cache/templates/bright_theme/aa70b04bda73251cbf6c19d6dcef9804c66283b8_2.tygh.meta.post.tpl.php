<?php
/* Smarty version 4.1.0, created on 2022-11-27 14:28:07
  from 'C:\XAMPP\htdocs\cscart\design\themes\responsive\templates\addons\social_buttons\hooks\index\meta.post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_638349c7e5ccc8_66261420',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aa70b04bda73251cbf6c19d6dcef9804c66283b8' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\cscart\\design\\themes\\responsive\\templates\\addons\\social_buttons\\hooks\\index\\meta.post.tpl',
      1 => 1669548445,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638349c7e5ccc8_66261420 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\function.set_id.php','function'=>'smarty_function_set_id',),));
if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design'] == "Y" && (defined('AREA') ? constant('AREA') : null) == "C") {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "template_content", null, null);
if ($_smarty_tpl->tpl_vars['display_button_block']->value) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['provider_meta_data']->value['all'], 'meta_value', false, 'meta_name');
$_smarty_tpl->tpl_vars['meta_value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['meta_name']->value => $_smarty_tpl->tpl_vars['meta_value']->value) {
$_smarty_tpl->tpl_vars['meta_value']->do_else = false;
?>
        <meta property="og:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_name']->value, ENT_QUOTES, 'UTF-8');?>
" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_value']->value, ENT_QUOTES, 'UTF-8');?>
" />
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['provider_settings']->value, 'provider_data');
$_smarty_tpl->tpl_vars['provider_data']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['provider_data']->value) {
$_smarty_tpl->tpl_vars['provider_data']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['provider_data']->value && $_smarty_tpl->tpl_vars['provider_data']->value['meta_template']) {?>
            <?php $_smarty_tpl->_subTemplateRender("addons/social_buttons/meta_templates/".((string)$_smarty_tpl->tpl_vars['provider_data']->value['meta_template']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
if (trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content'))) {
if ($_smarty_tpl->tpl_vars['auth']->value['area'] == "A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/social_buttons/hooks/index/meta.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/social_buttons/hooks/index/meta.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');?>
<!--[/tpl_id]--></span><?php } else {
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');
}
}
} else {
if ($_smarty_tpl->tpl_vars['display_button_block']->value) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['provider_meta_data']->value['all'], 'meta_value', false, 'meta_name');
$_smarty_tpl->tpl_vars['meta_value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['meta_name']->value => $_smarty_tpl->tpl_vars['meta_value']->value) {
$_smarty_tpl->tpl_vars['meta_value']->do_else = false;
?>
        <meta property="og:<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_name']->value, ENT_QUOTES, 'UTF-8');?>
" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_value']->value, ENT_QUOTES, 'UTF-8');?>
" />
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['provider_settings']->value, 'provider_data');
$_smarty_tpl->tpl_vars['provider_data']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['provider_data']->value) {
$_smarty_tpl->tpl_vars['provider_data']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['provider_data']->value && $_smarty_tpl->tpl_vars['provider_data']->value['meta_template']) {?>
            <?php $_smarty_tpl->_subTemplateRender("addons/social_buttons/meta_templates/".((string)$_smarty_tpl->tpl_vars['provider_data']->value['meta_template']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
}
}

<?php
/* Smarty version 4.1.0, created on 2022-11-27 14:28:34
  from 'C:\XAMPP\htdocs\cscart\design\themes\responsive\templates\addons\gdpr\componentes\gdpr_tooltip.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_638349e2187784_37328678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ac5e15386ebe117d48ca5f076e25ed5e00d4570' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\cscart\\design\\themes\\responsive\\templates\\addons\\gdpr\\componentes\\gdpr_tooltip.tpl',
      1 => 1669548457,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638349e2187784_37328678 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\block.hook.php','function'=>'smarty_block_hook',),1=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\function.set_id.php','function'=>'smarty_function_set_id',),));
if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design'] == "Y" && (defined('AREA') ? constant('AREA') : null) == "C") {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "template_content", null, null);?><div id="gdpr_tooltip_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['target_elem_id']->value, ENT_QUOTES, 'UTF-8');?>
"
    class="tooltip cm-gdpr-tooltip arrow-down ty-gdpr-tooltip ty-gdpr-tooltip--light center"
    data-ce-gdpr-target-elem="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['target_elem_id']->value, ENT_QUOTES, 'UTF-8');?>
">
    <span class="tooltip-arrow"></span>
    <button type="button" class="cm-gdpr-tooltip--close close ty-gdpr-tooltip--close">×</button>
    <div class="ty-gdpr-tooltip-content">
        <?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('hook', array('name'=>"gdpr:tooltip_content"));
$_block_repeat=true;
echo smarty_block_hook(array('name'=>"gdpr:tooltip_content"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
        <?php echo $_smarty_tpl->tpl_vars['app']->value["addons.gdpr.service"]->getFullAgreement($_smarty_tpl->tpl_vars['type']->value);?>

        <?php $_block_repeat=false;
echo smarty_block_hook(array('name'=>"gdpr:tooltip_content"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>
    </div>
</div><?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
if (trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content'))) {
if ($_smarty_tpl->tpl_vars['auth']->value['area'] == "A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/gdpr/componentes/gdpr_tooltip.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/gdpr/componentes/gdpr_tooltip.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');?>
<!--[/tpl_id]--></span><?php } else {
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');
}
}
} else { ?><div id="gdpr_tooltip_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['target_elem_id']->value, ENT_QUOTES, 'UTF-8');?>
"
    class="tooltip cm-gdpr-tooltip arrow-down ty-gdpr-tooltip ty-gdpr-tooltip--light center"
    data-ce-gdpr-target-elem="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['target_elem_id']->value, ENT_QUOTES, 'UTF-8');?>
">
    <span class="tooltip-arrow"></span>
    <button type="button" class="cm-gdpr-tooltip--close close ty-gdpr-tooltip--close">×</button>
    <div class="ty-gdpr-tooltip-content">
        <?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('hook', array('name'=>"gdpr:tooltip_content"));
$_block_repeat=true;
echo smarty_block_hook(array('name'=>"gdpr:tooltip_content"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
        <?php echo $_smarty_tpl->tpl_vars['app']->value["addons.gdpr.service"]->getFullAgreement($_smarty_tpl->tpl_vars['type']->value);?>

        <?php $_block_repeat=false;
echo smarty_block_hook(array('name'=>"gdpr:tooltip_content"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>
    </div>
</div><?php }
}
}

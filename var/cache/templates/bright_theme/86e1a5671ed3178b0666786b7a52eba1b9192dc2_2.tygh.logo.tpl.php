<?php
/* Smarty version 4.1.0, created on 2022-11-27 14:28:16
  from 'C:\XAMPP\htdocs\cscart\design\themes\responsive\templates\blocks\static_templates\logo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_638349d023eb43_62053504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86e1a5671ed3178b0666786b7a52eba1b9192dc2' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\cscart\\design\\themes\\responsive\\templates\\blocks\\static_templates\\logo.tpl',
      1 => 1669548437,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
    'tygh:common/image.tpl' => 2,
  ),
),false)) {
function content_638349d023eb43_62053504 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\function.set_id.php','function'=>'smarty_function_set_id',),));
if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design'] == "Y" && (defined('AREA') ? constant('AREA') : null) == "C") {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "template_content", null, null);?><div class="ty-logo-container">
    <?php $_smarty_tpl->_assignInScope('logo_link', (($tmp = $_smarty_tpl->tpl_vars['block']->value['properties']['enable_link'] ?? null)===null||$tmp==='' ? "Y" ?? null : $tmp) == "Y");?>

    <?php if ($_smarty_tpl->tpl_vars['logo_link']->value) {?>
        <a href="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logos']->value['theme']['image']['alt'], ENT_QUOTES, 'UTF-8');?>
">
    <?php }?>
    <?php $_smarty_tpl->_subTemplateRender("tygh:common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('images'=>$_smarty_tpl->tpl_vars['logos']->value['theme']['image'],'class'=>"ty-logo-container__image",'image_additional_attrs'=>array("width"=>$_smarty_tpl->tpl_vars['logos']->value['theme']['image']['image_x'],"height"=>$_smarty_tpl->tpl_vars['logos']->value['theme']['image']['image_y']),'obj_id'=>false,'show_no_image'=>false,'show_detailed_link'=>false,'capture_image'=>false), 0, false);
?>
    
    <?php if ($_smarty_tpl->tpl_vars['logo_link']->value) {?>
        </a>
    <?php }?>
</div>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
if (trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content'))) {
if ($_smarty_tpl->tpl_vars['auth']->value['area'] == "A") {?><span class="cm-template-box template-box" data-ca-te-template="blocks/static_templates/logo.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/static_templates/logo.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');?>
<!--[/tpl_id]--></span><?php } else {
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');
}
}
} else { ?><div class="ty-logo-container">
    <?php $_smarty_tpl->_assignInScope('logo_link', (($tmp = $_smarty_tpl->tpl_vars['block']->value['properties']['enable_link'] ?? null)===null||$tmp==='' ? "Y" ?? null : $tmp) == "Y");?>

    <?php if ($_smarty_tpl->tpl_vars['logo_link']->value) {?>
        <a href="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logos']->value['theme']['image']['alt'], ENT_QUOTES, 'UTF-8');?>
">
    <?php }?>
    <?php $_smarty_tpl->_subTemplateRender("tygh:common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('images'=>$_smarty_tpl->tpl_vars['logos']->value['theme']['image'],'class'=>"ty-logo-container__image",'image_additional_attrs'=>array("width"=>$_smarty_tpl->tpl_vars['logos']->value['theme']['image']['image_x'],"height"=>$_smarty_tpl->tpl_vars['logos']->value['theme']['image']['image_y']),'obj_id'=>false,'show_no_image'=>false,'show_detailed_link'=>false,'capture_image'=>false), 0, true);
?>
    
    <?php if ($_smarty_tpl->tpl_vars['logo_link']->value) {?>
        </a>
    <?php }?>
</div>
<?php }
}
}

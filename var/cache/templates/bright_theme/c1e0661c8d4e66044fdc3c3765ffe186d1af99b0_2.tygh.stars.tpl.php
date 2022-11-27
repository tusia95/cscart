<?php
/* Smarty version 4.1.0, created on 2022-11-27 14:28:33
  from 'C:\XAMPP\htdocs\cscart\design\themes\responsive\templates\addons\discussion\views\discussion\components\stars.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_638349e1019bd5_06561352',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1e0661c8d4e66044fdc3c3765ffe186d1af99b0' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\cscart\\design\\themes\\responsive\\templates\\addons\\discussion\\views\\discussion\\components\\stars.tpl',
      1 => 1669548453,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638349e1019bd5_06561352 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\function.include_ext.php','function'=>'smarty_function_include_ext',),1=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\function.set_id.php','function'=>'smarty_function_set_id',),));
if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design'] == "Y" && (defined('AREA') ? constant('AREA') : null) == "C") {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "template_content", null, null);
$_smarty_tpl->_assignInScope('link_target', (($tmp = $_smarty_tpl->tpl_vars['link_target']->value ?? null)===null||$tmp==='' ? "auto" ?? null : $tmp));
if (!($_smarty_tpl->tpl_vars['link_target']->value === "auto" && ($_smarty_tpl->tpl_vars['runtime']->value['controller'] == "products" || $_smarty_tpl->tpl_vars['runtime']->value['controller'] == "companies") && $_smarty_tpl->tpl_vars['runtime']->value['mode'] === "view" && !$_smarty_tpl->tpl_vars['product']->value['average_rating'])) {?>
    <?php $_smarty_tpl->_assignInScope('link_target', "url");
}?>

<span class="ty-nowrap ty-stars">
    <?php if ($_smarty_tpl->tpl_vars['link']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['link_target']->value === "url") {?>
            <a href="<?php echo htmlspecialchars(fn_url($_smarty_tpl->tpl_vars['link']->value), ENT_QUOTES, 'UTF-8');?>
">
        <?php } else { ?>
            <a class="cm-external-click" data-ca-scroll="content_discussion" data-ca-external-click-id="discussion">
        <?php }?>
    <?php }?>

    <?php
$__section_full_star_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['stars']->value['full']) ? count($_loop) : max(0, (int) $_loop));
$__section_full_star_2_total = $__section_full_star_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_full_star'] = new Smarty_Variable(array());
if ($__section_full_star_2_total !== 0) {
for ($__section_full_star_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_full_star']->value['index'] = 0; $__section_full_star_2_iteration <= $__section_full_star_2_total; $__section_full_star_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_full_star']->value['index']++){
?>
        <?php echo smarty_function_include_ext(array('file'=>"common/icon.tpl",'class'=>"ty-icon-star ty-stars__icon"),$_smarty_tpl);?>

    <?php
}
}
?>

    <?php if ($_smarty_tpl->tpl_vars['stars']->value['part']) {?>
        <?php echo smarty_function_include_ext(array('file'=>"common/icon.tpl",'class'=>"ty-icon-star-half ty-stars__icon"),$_smarty_tpl);?>

    <?php }?>

    <?php
$__section_full_star_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['stars']->value['empty']) ? count($_loop) : max(0, (int) $_loop));
$__section_full_star_3_total = $__section_full_star_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_full_star'] = new Smarty_Variable(array());
if ($__section_full_star_3_total !== 0) {
for ($__section_full_star_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_full_star']->value['index'] = 0; $__section_full_star_3_iteration <= $__section_full_star_3_total; $__section_full_star_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_full_star']->value['index']++){
?>
        <?php echo smarty_function_include_ext(array('file'=>"common/icon.tpl",'class'=>"ty-icon-star-empty ty-stars__icon"),$_smarty_tpl);?>

    <?php
}
}
?>

    <?php if ($_smarty_tpl->tpl_vars['link']->value) {?>
        </a>
    <?php }?>
</span>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
if (trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content'))) {
if ($_smarty_tpl->tpl_vars['auth']->value['area'] == "A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/discussion/views/discussion/components/stars.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/discussion/views/discussion/components/stars.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');?>
<!--[/tpl_id]--></span><?php } else {
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');
}
}
} else {
$_smarty_tpl->_assignInScope('link_target', (($tmp = $_smarty_tpl->tpl_vars['link_target']->value ?? null)===null||$tmp==='' ? "auto" ?? null : $tmp));
if (!($_smarty_tpl->tpl_vars['link_target']->value === "auto" && ($_smarty_tpl->tpl_vars['runtime']->value['controller'] == "products" || $_smarty_tpl->tpl_vars['runtime']->value['controller'] == "companies") && $_smarty_tpl->tpl_vars['runtime']->value['mode'] === "view" && !$_smarty_tpl->tpl_vars['product']->value['average_rating'])) {?>
    <?php $_smarty_tpl->_assignInScope('link_target', "url");
}?>

<span class="ty-nowrap ty-stars">
    <?php if ($_smarty_tpl->tpl_vars['link']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['link_target']->value === "url") {?>
            <a href="<?php echo htmlspecialchars(fn_url($_smarty_tpl->tpl_vars['link']->value), ENT_QUOTES, 'UTF-8');?>
">
        <?php } else { ?>
            <a class="cm-external-click" data-ca-scroll="content_discussion" data-ca-external-click-id="discussion">
        <?php }?>
    <?php }?>

    <?php
$__section_full_star_4_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['stars']->value['full']) ? count($_loop) : max(0, (int) $_loop));
$__section_full_star_4_total = $__section_full_star_4_loop;
$_smarty_tpl->tpl_vars['__smarty_section_full_star'] = new Smarty_Variable(array());
if ($__section_full_star_4_total !== 0) {
for ($__section_full_star_4_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_full_star']->value['index'] = 0; $__section_full_star_4_iteration <= $__section_full_star_4_total; $__section_full_star_4_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_full_star']->value['index']++){
?>
        <?php echo smarty_function_include_ext(array('file'=>"common/icon.tpl",'class'=>"ty-icon-star ty-stars__icon"),$_smarty_tpl);?>

    <?php
}
}
?>

    <?php if ($_smarty_tpl->tpl_vars['stars']->value['part']) {?>
        <?php echo smarty_function_include_ext(array('file'=>"common/icon.tpl",'class'=>"ty-icon-star-half ty-stars__icon"),$_smarty_tpl);?>

    <?php }?>

    <?php
$__section_full_star_5_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['stars']->value['empty']) ? count($_loop) : max(0, (int) $_loop));
$__section_full_star_5_total = $__section_full_star_5_loop;
$_smarty_tpl->tpl_vars['__smarty_section_full_star'] = new Smarty_Variable(array());
if ($__section_full_star_5_total !== 0) {
for ($__section_full_star_5_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_full_star']->value['index'] = 0; $__section_full_star_5_iteration <= $__section_full_star_5_total; $__section_full_star_5_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_full_star']->value['index']++){
?>
        <?php echo smarty_function_include_ext(array('file'=>"common/icon.tpl",'class'=>"ty-icon-star-empty ty-stars__icon"),$_smarty_tpl);?>

    <?php
}
}
?>

    <?php if ($_smarty_tpl->tpl_vars['link']->value) {?>
        </a>
    <?php }?>
</span>
<?php }
}
}

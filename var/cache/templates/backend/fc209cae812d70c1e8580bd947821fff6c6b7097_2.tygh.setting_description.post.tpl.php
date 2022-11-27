<?php
/* Smarty version 4.1.0, created on 2022-11-27 14:27:46
  from 'C:\XAMPP\htdocs\cscart\design\backend\templates\addons\seo\hooks\settings_fields\setting_description.post.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_638349b21e3897_01081430',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc209cae812d70c1e8580bd947821fff6c6b7097' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\cscart\\design\\backend\\templates\\addons\\seo\\hooks\\settings_fields\\setting_description.post.tpl',
      1 => 1669304533,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638349b21e3897_01081430 (Smarty_Internal_Template $_smarty_tpl) {
\Tygh\Languages\Helper::preloadLangVars(array('warning','seo.default_storefront_frontend_default_language_warning','seo.storefront_frontend_default_language_warning'));
if ($_smarty_tpl->tpl_vars['item']->value['name'] === "frontend_default_language" && $_smarty_tpl->tpl_vars['show_language_warning']->value) {?>
    <div class="text-warning">
        <strong><?php echo $_smarty_tpl->__("warning");?>
!</strong>
        <?php if ($_smarty_tpl->tpl_vars['is_default_storefront_affected']->value) {?>
            <?php echo $_smarty_tpl->__("seo.default_storefront_frontend_default_language_warning",array("[link]"=>fn_url("addons.update?addon=seo")));?>

        <?php } else { ?>
            <?php echo $_smarty_tpl->__("seo.storefront_frontend_default_language_warning",array("[link]"=>fn_url("addons.update?addon=seo")));?>

        <?php }?>
    </div>
<?php }
}
}

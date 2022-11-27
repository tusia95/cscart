<?php
/* Smarty version 4.1.0, created on 2022-11-27 14:28:27
  from 'C:\XAMPP\htdocs\cscart\design\themes\responsive\templates\views\products\components\product_features_short_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_638349db878ca3_60640450',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c9b41ed81d772782e341bf6d1f5f63cbedfc2e9' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\cscart\\design\\themes\\responsive\\templates\\views\\products\\components\\product_features_short_list.tpl',
      1 => 1669548439,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
    'tygh:common/image.tpl' => 2,
  ),
),false)) {
function content_638349db878ca3_60640450 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->_tplFunction->registerTplFunctions($_smarty_tpl, array (
  'feature_value' => 
  array (
    'compiled_filepath' => 'C:\\XAMPP\\htdocs\\cscart\\var\\cache\\templates\\bright_theme\\2c9b41ed81d772782e341bf6d1f5f63cbedfc2e9_2.tygh.product_features_short_list.tpl.php',
    'uid' => '2c9b41ed81d772782e341bf6d1f5f63cbedfc2e9',
    'call_name' => 'smarty_template_function_feature_value_278494769638349db80b925_71609492',
  ),
));
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\modifier.enum.php','function'=>'smarty_modifier_enum',),1=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\function.set_id.php','function'=>'smarty_function_set_id',),));
if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design'] == "Y" && (defined('AREA') ? constant('AREA') : null) == "C") {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "template_content", null, null);
$_smarty_tpl->_assignInScope('image_size', (($tmp = $_smarty_tpl->tpl_vars['image_size']->value ?? null)===null||$tmp==='' ? 80 ?? null : $tmp));?>


<?php if ($_smarty_tpl->tpl_vars['features']->value) {?>
    <?php if (!$_smarty_tpl->tpl_vars['no_container']->value) {?><div class="ty-features-list"><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['features']->value, 'feature', false, NULL, 'features_list', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['feature']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_features_list']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_features_list']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_features_list']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_features_list']->value['total'];
if ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::DATE") || $_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::NUMBER_FIELD") || $_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::NUMBER_SELECTBOX")) {
echo $_smarty_tpl->tpl_vars['feature']->value['description'];?>
:<?php }
if ($_smarty_tpl->tpl_vars['feature_image']->value && $_smarty_tpl->tpl_vars['feature']->value['variants'][$_smarty_tpl->tpl_vars['feature']->value['variant_id']]['image_pairs']) {
$_smarty_tpl->_assignInScope('obj_id', $_smarty_tpl->tpl_vars['feature']->value['variant_id']);?><a href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['product']->value['main_category'])."&features_hash=".((string)$_smarty_tpl->tpl_vars['feature']->value['features_hash'])), ENT_QUOTES, 'UTF-8');?>
"><?php $_smarty_tpl->_subTemplateRender("tygh:common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('image_width'=>$_smarty_tpl->tpl_vars['image_size']->value,'images'=>$_smarty_tpl->tpl_vars['feature']->value['variants'][$_smarty_tpl->tpl_vars['feature']->value['variant_id']]['image_pairs'],'no_ids'=>true), 0, true);
?></a><?php } else {
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'feature_value', array('feature'=>$_smarty_tpl->tpl_vars['feature']->value), true);
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_features_list']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_features_list']->value['last'] : null)) {?>, <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (!$_smarty_tpl->tpl_vars['no_container']->value) {?></div><?php }
}
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
if (trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content'))) {
if ($_smarty_tpl->tpl_vars['auth']->value['area'] == "A") {?><span class="cm-template-box template-box" data-ca-te-template="views/products/components/product_features_short_list.tpl" id="<?php echo smarty_function_set_id(array('name'=>"views/products/components/product_features_short_list.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');?>
<!--[/tpl_id]--></span><?php } else {
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');
}
}
} else {
$_smarty_tpl->_assignInScope('image_size', (($tmp = $_smarty_tpl->tpl_vars['image_size']->value ?? null)===null||$tmp==='' ? 80 ?? null : $tmp));?>


<?php if ($_smarty_tpl->tpl_vars['features']->value) {?>
    <?php if (!$_smarty_tpl->tpl_vars['no_container']->value) {?><div class="ty-features-list"><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['features']->value, 'feature', false, NULL, 'features_list', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['feature']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_features_list']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_features_list']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_features_list']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_features_list']->value['total'];
if ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::DATE") || $_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::NUMBER_FIELD") || $_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::NUMBER_SELECTBOX")) {
echo $_smarty_tpl->tpl_vars['feature']->value['description'];?>
:<?php }
if ($_smarty_tpl->tpl_vars['feature_image']->value && $_smarty_tpl->tpl_vars['feature']->value['variants'][$_smarty_tpl->tpl_vars['feature']->value['variant_id']]['image_pairs']) {
$_smarty_tpl->_assignInScope('obj_id', $_smarty_tpl->tpl_vars['feature']->value['variant_id']);?><a href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['product']->value['main_category'])."&features_hash=".((string)$_smarty_tpl->tpl_vars['feature']->value['features_hash'])), ENT_QUOTES, 'UTF-8');?>
"><?php $_smarty_tpl->_subTemplateRender("tygh:common/image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('image_width'=>$_smarty_tpl->tpl_vars['image_size']->value,'images'=>$_smarty_tpl->tpl_vars['feature']->value['variants'][$_smarty_tpl->tpl_vars['feature']->value['variant_id']]['image_pairs'],'no_ids'=>true), 0, true);
?></a><?php } else {
$_smarty_tpl->smarty->ext->_tplFunction->callTemplateFunction($_smarty_tpl, 'feature_value', array('feature'=>$_smarty_tpl->tpl_vars['feature']->value), true);
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_features_list']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_features_list']->value['last'] : null)) {?>, <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (!$_smarty_tpl->tpl_vars['no_container']->value) {?></div><?php }
}
}
}
/* smarty_template_function_feature_value_278494769638349db80b925_71609492 */
if (!function_exists('smarty_template_function_feature_value_278494769638349db80b925_71609492')) {
function smarty_template_function_feature_value_278494769638349db80b925_71609492(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\modifier.enum.php','function'=>'smarty_modifier_enum',),1=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

    <?php if ($_smarty_tpl->tpl_vars['feature']->value['features_hash'] && $_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::EXTENDED")) {?><a href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['product']->value['main_category'])."&features_hash=".((string)$_smarty_tpl->tpl_vars['feature']->value['features_hash'])), ENT_QUOTES, 'UTF-8');?>
"><?php }
if ($_smarty_tpl->tpl_vars['feature']->value['prefix']) {?><span class="ty-features-list__item-prefix"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['prefix'], ENT_QUOTES, 'UTF-8');?>
</span><?php }
if ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::DATE")) {
echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['feature']->value['value_int'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format'])), ENT_QUOTES, 'UTF-8');
} elseif ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::MULTIPLE_CHECKBOX")) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['feature']->value['variants'], 'fvariant', false, NULL, 'ffev', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['fvariant']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['fvariant']->value) {
$_smarty_tpl->tpl_vars['fvariant']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_ffev']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_ffev']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_ffev']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_ffev']->value['total'];
echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['fvariant']->value['variant'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['fvariant']->value['value'] ?? null : $tmp), ENT_QUOTES, 'UTF-8');
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_ffev']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_ffev']->value['last'] : null)) {?>, <?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} elseif ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::TEXT_SELECTBOX") || $_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::NUMBER_SELECTBOX") || $_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::EXTENDED")) {
echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['feature']->value['variant'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['feature']->value['value'] ?? null : $tmp), ENT_QUOTES, 'UTF-8');
} elseif ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::SINGLE_CHECKBOX")) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['description'], ENT_QUOTES, 'UTF-8');
} elseif ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::NUMBER_FIELD")) {
echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['feature']->value['value_int']), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['value'], ENT_QUOTES, 'UTF-8');
}
if ($_smarty_tpl->tpl_vars['feature']->value['suffix']) {?><span class="ty-features-list__item-suffix"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['suffix'], ENT_QUOTES, 'UTF-8');?>
</span><?php }
if ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::EXTENDED") && $_smarty_tpl->tpl_vars['feature']->value['features_hash']) {?></a><?php }
}}
/*/ smarty_template_function_feature_value_278494769638349db80b925_71609492 */
/* smarty_template_function_feature_value_278494769638349db80b925_71609492 */
if (!function_exists('smarty_template_function_feature_value_278494769638349db80b925_71609492')) {
function smarty_template_function_feature_value_278494769638349db80b925_71609492(Smarty_Internal_Template $_smarty_tpl,$params) {
foreach ($params as $key => $value) {
$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable($value, $_smarty_tpl->isRenderingCache);
}
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\modifier.enum.php','function'=>'smarty_modifier_enum',),1=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

    <?php if ($_smarty_tpl->tpl_vars['feature']->value['features_hash'] && $_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::EXTENDED")) {?><a href="<?php echo htmlspecialchars(fn_url("categories.view?category_id=".((string)$_smarty_tpl->tpl_vars['product']->value['main_category'])."&features_hash=".((string)$_smarty_tpl->tpl_vars['feature']->value['features_hash'])), ENT_QUOTES, 'UTF-8');?>
"><?php }
if ($_smarty_tpl->tpl_vars['feature']->value['prefix']) {?><span class="ty-features-list__item-prefix"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['prefix'], ENT_QUOTES, 'UTF-8');?>
</span><?php }
if ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::DATE")) {
echo htmlspecialchars(smarty_modifier_date_format($_smarty_tpl->tpl_vars['feature']->value['value_int'],((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['date_format'])), ENT_QUOTES, 'UTF-8');
} elseif ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::MULTIPLE_CHECKBOX")) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['feature']->value['variants'], 'fvariant', false, NULL, 'ffev', array (
  'last' => true,
  'iteration' => true,
  'total' => true,
));
$_smarty_tpl->tpl_vars['fvariant']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['fvariant']->value) {
$_smarty_tpl->tpl_vars['fvariant']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_ffev']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_ffev']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_ffev']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_ffev']->value['total'];
echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['fvariant']->value['variant'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['fvariant']->value['value'] ?? null : $tmp), ENT_QUOTES, 'UTF-8');
if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_ffev']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_ffev']->value['last'] : null)) {?>, <?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
} elseif ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::TEXT_SELECTBOX") || $_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::NUMBER_SELECTBOX") || $_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::EXTENDED")) {
echo htmlspecialchars((($tmp = $_smarty_tpl->tpl_vars['feature']->value['variant'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['feature']->value['value'] ?? null : $tmp), ENT_QUOTES, 'UTF-8');
} elseif ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::SINGLE_CHECKBOX")) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['description'], ENT_QUOTES, 'UTF-8');
} elseif ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::NUMBER_FIELD")) {
echo htmlspecialchars(floatval($_smarty_tpl->tpl_vars['feature']->value['value_int']), ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['value'], ENT_QUOTES, 'UTF-8');
}
if ($_smarty_tpl->tpl_vars['feature']->value['suffix']) {?><span class="ty-features-list__item-suffix"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['suffix'], ENT_QUOTES, 'UTF-8');?>
</span><?php }
if ($_smarty_tpl->tpl_vars['feature']->value['feature_type'] == smarty_modifier_enum("ProductFeatures::EXTENDED") && $_smarty_tpl->tpl_vars['feature']->value['features_hash']) {?></a><?php }
}}
/*/ smarty_template_function_feature_value_278494769638349db80b925_71609492 */
}

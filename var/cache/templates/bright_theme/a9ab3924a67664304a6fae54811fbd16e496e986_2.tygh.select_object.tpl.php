<?php
/* Smarty version 4.1.0, created on 2022-11-27 14:28:12
  from 'C:\XAMPP\htdocs\cscart\design\themes\responsive\templates\common\select_object.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_638349cc058444_56223496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9ab3924a67664304a6fae54811fbd16e496e986' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\cscart\\design\\themes\\responsive\\templates\\common\\select_object.tpl',
      1 => 1669548438,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638349cc058444_56223496 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\function.include_ext.php','function'=>'smarty_function_include_ext',),1=>array('file'=>'C:\\XAMPP\\htdocs\\cscart\\app\\functions\\smarty_plugins\\function.set_id.php','function'=>'smarty_function_set_id',),));
\Tygh\Languages\Helper::preloadLangVars(array('select_descr_lang','select_descr_lang'));
if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design'] == "Y" && (defined('AREA') ? constant('AREA') : null) == "C") {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, "template_content", null, null);
$_smarty_tpl->_assignInScope('language_text', (($tmp = $_smarty_tpl->tpl_vars['text']->value ?? null)===null||$tmp==='' ? $_smarty_tpl->__("select_descr_lang") ?? null : $tmp));?>

<?php if ($_smarty_tpl->tpl_vars['style']->value == "graphic") {?>
    <?php if ($_smarty_tpl->tpl_vars['text']->value) {?><div class="ty-select-block__txt hidden-phone hidden-tablet"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['text']->value, ENT_QUOTES, 'UTF-8');?>
:</div><?php }?>

    <a class="ty-select-block__a cm-combination" id="sw_select_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_id']->value, ENT_QUOTES, 'UTF-8');?>
_wrap_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php if ($_smarty_tpl->tpl_vars['display_icons']->value == true) {?>
            <?php echo smarty_function_include_ext(array('file'=>"common/icon.tpl",'class'=>"ty-flag ty-select-block__a-flag ty-flag-".((string)(mb_strtolower($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->tpl_vars['selected_id']->value]['country_code'], 'UTF-8')))),$_smarty_tpl);?>

        <?php }?>
        <span class="ty-select-block__a-item <?php if ($_smarty_tpl->tpl_vars['link_class']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['link_class']->value, ENT_QUOTES, 'UTF-8');
}?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->tpl_vars['selected_id']->value][$_smarty_tpl->tpl_vars['key_name']->value], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->tpl_vars['selected_id']->value]['symbol']) {?> (<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->tpl_vars['selected_id']->value]['symbol'];?>
)<?php }?></span>
        <?php echo smarty_function_include_ext(array('file'=>"common/icon.tpl",'class'=>"ty-icon-down-micro ty-select-block__arrow"),$_smarty_tpl);?>

    </a>

    <div id="select_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_id']->value, ENT_QUOTES, 'UTF-8');?>
_wrap_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
" class="ty-select-block cm-popup-box hidden">
        <ul class="cm-select-list ty-select-block__list ty-flags">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item', false, 'id');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <li class="ty-select-block__list-item">
                    <a rel="nofollow" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['link_tpl']->value).((string)$_smarty_tpl->tpl_vars['id']->value)), ENT_QUOTES, 'UTF-8');?>
" class="ty-select-block__list-a <?php if ($_smarty_tpl->tpl_vars['selected_id']->value == $_smarty_tpl->tpl_vars['id']->value) {?>is-active<?php }?> <?php if ($_smarty_tpl->tpl_vars['suffix']->value == "live_editor_box") {?>cm-lang-link<?php }?>" <?php if ($_smarty_tpl->tpl_vars['display_icons']->value == true) {?>data-ca-country-code="<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['item']->value['country_code'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
"<?php }?> data-ca-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">
                    <?php if ($_smarty_tpl->tpl_vars['display_icons']->value == true) {?>
                        <?php echo smarty_function_include_ext(array('file'=>"common/icon.tpl",'class'=>"ty-flag ty-flag-".((string)(mb_strtolower($_smarty_tpl->tpl_vars['item']->value['country_code'], 'UTF-8')))),$_smarty_tpl);?>

                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['key_name']->value];
if ($_smarty_tpl->tpl_vars['item']->value['symbol']) {?> (<?php echo $_smarty_tpl->tpl_vars['item']->value['symbol'];?>
)<?php }?>
                    </a>
                </li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    </div>
<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['text']->value) {?><label for="id_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
" class="ty-select-block__txt hidden-phone hidden-tablet"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['text']->value, ENT_QUOTES, 'UTF-8');?>
:</label><?php }?>
    <select id="id_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
" onchange="Tygh.$.redirect(this.value);" class="ty-valign">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item', false, 'id');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <option value="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['link_tpl']->value).((string)$_smarty_tpl->tpl_vars['id']->value)), ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['id']->value == $_smarty_tpl->tpl_vars['selected_id']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['key_name']->value];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
<?php }
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
if (trim($_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content'))) {
if ($_smarty_tpl->tpl_vars['auth']->value['area'] == "A") {?><span class="cm-template-box template-box" data-ca-te-template="common/select_object.tpl" id="<?php echo smarty_function_set_id(array('name'=>"common/select_object.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');?>
<!--[/tpl_id]--></span><?php } else {
echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'template_content');
}
}
} else {
$_smarty_tpl->_assignInScope('language_text', (($tmp = $_smarty_tpl->tpl_vars['text']->value ?? null)===null||$tmp==='' ? $_smarty_tpl->__("select_descr_lang") ?? null : $tmp));?>

<?php if ($_smarty_tpl->tpl_vars['style']->value == "graphic") {?>
    <?php if ($_smarty_tpl->tpl_vars['text']->value) {?><div class="ty-select-block__txt hidden-phone hidden-tablet"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['text']->value, ENT_QUOTES, 'UTF-8');?>
:</div><?php }?>

    <a class="ty-select-block__a cm-combination" id="sw_select_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_id']->value, ENT_QUOTES, 'UTF-8');?>
_wrap_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
">
        <?php if ($_smarty_tpl->tpl_vars['display_icons']->value == true) {?>
            <?php echo smarty_function_include_ext(array('file'=>"common/icon.tpl",'class'=>"ty-flag ty-select-block__a-flag ty-flag-".((string)(mb_strtolower($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->tpl_vars['selected_id']->value]['country_code'], 'UTF-8')))),$_smarty_tpl);?>

        <?php }?>
        <span class="ty-select-block__a-item <?php if ($_smarty_tpl->tpl_vars['link_class']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['link_class']->value, ENT_QUOTES, 'UTF-8');
}?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->tpl_vars['selected_id']->value][$_smarty_tpl->tpl_vars['key_name']->value], ENT_QUOTES, 'UTF-8');
if ($_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->tpl_vars['selected_id']->value]['symbol']) {?> (<?php echo $_smarty_tpl->tpl_vars['items']->value[$_smarty_tpl->tpl_vars['selected_id']->value]['symbol'];?>
)<?php }?></span>
        <?php echo smarty_function_include_ext(array('file'=>"common/icon.tpl",'class'=>"ty-icon-down-micro ty-select-block__arrow"),$_smarty_tpl);?>

    </a>

    <div id="select_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selected_id']->value, ENT_QUOTES, 'UTF-8');?>
_wrap_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['suffix']->value, ENT_QUOTES, 'UTF-8');?>
" class="ty-select-block cm-popup-box hidden">
        <ul class="cm-select-list ty-select-block__list ty-flags">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item', false, 'id');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                <li class="ty-select-block__list-item">
                    <a rel="nofollow" href="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['link_tpl']->value).((string)$_smarty_tpl->tpl_vars['id']->value)), ENT_QUOTES, 'UTF-8');?>
" class="ty-select-block__list-a <?php if ($_smarty_tpl->tpl_vars['selected_id']->value == $_smarty_tpl->tpl_vars['id']->value) {?>is-active<?php }?> <?php if ($_smarty_tpl->tpl_vars['suffix']->value == "live_editor_box") {?>cm-lang-link<?php }?>" <?php if ($_smarty_tpl->tpl_vars['display_icons']->value == true) {?>data-ca-country-code="<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['item']->value['country_code'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
"<?php }?> data-ca-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">
                    <?php if ($_smarty_tpl->tpl_vars['display_icons']->value == true) {?>
                        <?php echo smarty_function_include_ext(array('file'=>"common/icon.tpl",'class'=>"ty-flag ty-flag-".((string)(mb_strtolower($_smarty_tpl->tpl_vars['item']->value['country_code'], 'UTF-8')))),$_smarty_tpl);?>

                    <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['key_name']->value];
if ($_smarty_tpl->tpl_vars['item']->value['symbol']) {?> (<?php echo $_smarty_tpl->tpl_vars['item']->value['symbol'];?>
)<?php }?>
                    </a>
                </li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    </div>
<?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['text']->value) {?><label for="id_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
" class="ty-select-block__txt hidden-phone hidden-tablet"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['text']->value, ENT_QUOTES, 'UTF-8');?>
:</label><?php }?>
    <select id="id_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['var_name']->value, ENT_QUOTES, 'UTF-8');?>
" onchange="Tygh.$.redirect(this.value);" class="ty-valign">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['items']->value, 'item', false, 'id');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
            <option value="<?php echo htmlspecialchars(fn_url(((string)$_smarty_tpl->tpl_vars['link_tpl']->value).((string)$_smarty_tpl->tpl_vars['id']->value)), ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['id']->value == $_smarty_tpl->tpl_vars['selected_id']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value[$_smarty_tpl->tpl_vars['key_name']->value];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
<?php }
}
}
}

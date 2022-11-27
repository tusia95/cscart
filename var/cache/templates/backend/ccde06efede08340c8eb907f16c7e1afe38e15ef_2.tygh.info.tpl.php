<?php
/* Smarty version 4.1.0, created on 2022-11-27 14:27:43
  from 'C:\XAMPP\htdocs\cscart\design\backend\templates\addons\call_requests\settings\info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_638349af9f6fa2_23186153',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccde06efede08340c8eb907f16c7e1afe38e15ef' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\cscart\\design\\backend\\templates\\addons\\call_requests\\settings\\info.tpl',
      1 => 1669304514,
      2 => 'tygh',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_638349af9f6fa2_23186153 (Smarty_Internal_Template $_smarty_tpl) {
\Tygh\Languages\Helper::preloadLangVars(array('call_requests.phone_from_settings'));
?>
<div class="control-group setting-wide call_requests">

    <label for="addon_option_call_requests_phone" class="control-label "><?php echo $_smarty_tpl->__("call_requests.phone_from_settings");?>
:</label>

    <div class="controls">
        <p><bdi><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value['Company']['company_phone'], ENT_QUOTES, 'UTF-8');?>
</bdi></p>
    </div>

</div><?php }
}

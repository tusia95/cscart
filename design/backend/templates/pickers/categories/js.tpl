{if $category_id}
    {assign var="category_data" value=$category_id|fn_get_category_data:$smarty.const.DESCR_SL:'':false:true:false:true}
    {assign var="category" value=$category_data.category|default:"`$ldelim`category`$rdelim`"}
    {if $runtime.company_id && ($owner_company_id && $owner_company_id != $runtime.company_id && $category_data.company_id != $runtime.company_id || $category_data.company_id != $runtime.company_id)}
        {assign var="show_only_name" value=true}
    {/if}
    {if $runtime.company_id && $owner_company_id && $owner_company_id != $runtime.company_id}
        {assign var="hide_delete_button" value=true}
    {/if}
{else}
    {assign var="category" value=$default_name|unescape:url}
{/if}
{if $multiple}
    <tr {if !$clone}id="{$holder}_{$category_id}" {/if}class="cm-js-item {if $clone} cm-clone hidden{/if}">
        {if $position_field}<td width="5%" data-th="{__("position_short")}"><input type="text" name="{$input_name}[{$category_id}]" value="{math equation="a*b" a=$position b=10}" size="3" class="input-micro"{if $clone} disabled="disabled"{/if} /></td>{/if}
        <td data-th="{__("name")}">
            {if !$show_only_name}
                <a href="{"categories.update?category_id=`$category_id`"|fn_url}">{$category}</a>
            {else}
                {$category} {include file="views/companies/components/company_name.tpl" object=$category_data}
            {/if}
        </td>
        {hook name="category_picker:manage_data"}{/hook}
        <td width="5%" class="nowrap" data-th="&nbsp;">
        {if !$view_only || $show_only_name}
            {capture name="tools_list"}
                <li>{btn type="list" text=__("edit") href="categories.update?category_id=`$category_id`"}</li>
                {if !$hide_delete_button}
                    <li>{btn type="list" text=__("remove") onclick="Tygh.$.cePicker('delete_js_item', '{$holder}', '{$category_id}', 'c'); return false;"}</li>
                {/if}
            {/capture}
            <div class="hidden-tools">
                {dropdown content=$smarty.capture.tools_list}
            </div>
        {/if}
        </td>
    </tr>
{else}
    {if $view_mode != "list"}
        <span {if !$clone}id="{$holder}_{$category_id}" {/if}class="cm-js-item {if $clone} cm-clone hidden{/if}">
        {if !$first_item && $single_line}<span class="cm-comma{if $clone} hidden{/if}">,&nbsp;&nbsp;</span>{/if}

        <div class="input-append">
        <input class="cm-picker-value-description {$extra_class}" type="text" value="{$category}" {if $display_input_id}id="{$display_input_id}"{/if} size="10" name="category_name" readonly="readonly" {$extra} id="appendedInputButton">
        {if !$runtime.company_id || $runtime.controller != "companies"}
        {if $multiple}
            {assign var="_but_text" value=$but_text|default:__("add_categories")}
            {assign var="_but_role" value="add"}
            {assign var="_but_icon" value="icon-plus"}
        {else}
            {include_ext file="common/icon.tpl" class="icon-plus" assign=_but_text}
            {assign var="_but_role" value="icon"}
        {/if}
        {include file="buttons/button.tpl" but_id="opener_picker_`$data_id`" but_href="categories.picker?display=`$display`&company_ids=`$company_ids`&picker_for=`$picker_for`&extra=`$extra_var`&checkbox_name=`$checkbox_name`&root=`$default_name`&except_id=`$except_id`&data_id=`$data_id``$extra_url`"|fn_url but_text=$_but_text but_role=$_but_role but_icon=$_but_icon but_target_id="content_`$data_id`" but_meta="`$but_meta` cm-dialog-opener add-on btn cm-dialog-destroy-on-close"}
        {/if}
        </div>
        </span>
    {else}
        {assign var="default_category" value="`$ldelim`category`$rdelim`"}
        {assign var="default_category_id" value="`$ldelim`category_id`$rdelim`"}
        {assign var="default_category_path_items" value="`$ldelim`path_items`$rdelim`"}
        {if $first_item || !$category_id}
            <p class="cm-js-item cm-clone hidden">
                {if $hide_input != "Y"}
                    <label class="radio inline-block" for="category_rb_category_id">
                        <input id="category_rb_category_id" type="radio" name="{$radio_input_name}" value="{$default_category_id}">
                    </label>
                {/if}
                    {if $show_active_path}
                        {$default_category_path_items}
                        <a target="_blank" href="{"categories.update&category_id={$default_category_id}"|fn_url}">{$default_category}</a>
                    {else}
                        {$default_category}
                    {/if}
                    <a class="icon-remove-sign cm-tooltip hand hidden" onclick="Tygh.$.cePicker('delete_js_item', '{$holder}', '{$default_category_id}', 'c'); return false;" title="{__("remove")}"></a>
            </p>
        {/if}
        {if $category_id}
        <div class="cm-js-item {$extra_class}" id="{$holder}_{$category_id}" {$extra}>
            {if $hide_input != "Y"}
                <label class="radio inline-block" for="category_radio_button_{$category_id}">
                    <input id="category_radio_button_{$category_id}" {if $main_category == $category_id}checked{/if} type="radio" name="{$radio_input_name}" value="{$category_id}" />
                </label>
            {/if}

            {if $show_active_path}
                {foreach from=$category_data.path_names key="path_id" item="path_name" name="path_names"}
                    <a target="_blank" class="{if !$smarty.foreach.path_names.last}ty-breadcrumbs__a{else}ty-breadcrumbs__current{/if}" href="{"categories.update&category_id={$path_id}"|fn_url}">{$path_name}</a>{if !$smarty.foreach.path_names.last} / {/if}
                {/foreach}
            {else}
                {$category}
            {/if}
            {if $category_data.company_id}{include file="views/companies/components/company_name.tpl" object=$category_data simple=true}{/if}

            {if "ULTIMATE"|fn_allowed_for}
                {if !$runtime.company_id || ($runtime.company_id && ($category_data.company_id == $runtime.company_id || $runtime.company_id == $owner_company_id))}
                    <a onclick="Tygh.$.cePicker('delete_js_item', '{$holder}', '{$category_id}', 'c'); return false;" class="icon-remove-sign cm-tooltip hand hidden" title="{__("remove")}"></a>
                {/if}
            {else}
                <a onclick="Tygh.$.cePicker('delete_js_item', '{$holder}', '{$category_id}', 'c'); return false;" class="icon-remove-sign cm-tooltip hand hidden" title="{__("remove")}"></a>
            {/if}
        </div>
        {/if}
    {/if}
{/if}

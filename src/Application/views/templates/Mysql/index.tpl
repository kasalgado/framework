<h3>{$lang_mysql}</h3>

<table class="table table-striped">
    <thead>
        <tr>
            <th>{$lang_username}</th>
            <th>{$lang_email}</th>
            <th>{$lang_status}</th>
        </tr>
    </thead>
    {foreach from=$users item=user}
        <tr>
            <td>{$user.username}</td>
            <td>{$user.email}</td>
            <td>{if $user.active}{$lang_enable}{else}{$lang_disable}{/if}</td>
        </tr>
    {/foreach}
</table>
    
<button class="btn btn-primary" onclick="callUrl()">{$lang_new}</button>

{include file='vars.tpl'}
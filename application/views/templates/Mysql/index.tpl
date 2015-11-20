<h3>{$lang_mysql}</h3>

<ul class="col-name">
    <li>{$lang_username}</li>
    <li>{$lang_email}</li>
    <li>{$lang_active}</li>
</ul>
    
{foreach from=$users item=user}
    <ul>
        <li>{$user.username}</li>
        <li>{$user.email}</li>
        <li>{$user.active}</li>
    </ul>
{/foreach}

<ul>
    <li><input type="button" value="{$lang_new}" onclick="callUrl()" /></li>
</ul>

{include file='vars.tpl'}
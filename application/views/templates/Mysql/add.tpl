<h3>{$lang_add}</h3>

{if isset($success)}<h4>{$lang_success}</h4>{/if}

<form name="contact" method="post" action="{$basename|cat:'?ctr=mysqlAdd'}">
    <label class="fl" for="username">{$lang_username}:*</label>
    <input class="fl" type="text" name="username" value="{$data.username}" />
    <div class="clear"></div>
    {if isset($validate.username)}<div>{$validate.username.error}</div>{/if}

    <label class="fl" for="email">{$lang_email}:*</label>
    <input class="fl" type="text" name="email" value="{$data.email}" />
    <div class="clear"></div>
    {if isset($validate.email)}<div>{$validate.email.error}</div>{/if}
    
    <label class="fl" for="status">{$lang_status}:</label>
    <select class="fl" name="status">{html_options options=$select selected=$data.status}</select>
    <div class="clear"></div>
    {if isset($validate.active)}<div>{$validate.active.error}</div>{/if}

    <input type="submit" value="{$lang_add}" />
</form>

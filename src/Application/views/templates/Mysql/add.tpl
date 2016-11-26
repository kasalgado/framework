<h3>{$lang_add}</h3>

{if isset($success)}<h4>{$lang_success}</h4>{/if}

<form class="form-horizontal" name="contact" method="post" action="{$basename|cat:'?ctr=mysqlAdd'}">
    {include file=Form/input.tpl name="username" lang=$lang_username check=true}
    {include file=Form/input.tpl name="email" lang=$lang_email check=true}
    {include file=Form/select.tpl name="status" lang=$lang_status}
    {include file=Form/submit.tpl lang=$lang_add}
</form>

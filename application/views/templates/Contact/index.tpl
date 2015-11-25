<h3>{$lang_contact}</h3>

{if isset($success)}<h4>{$lang_success}</h4>{/if}

<form class="form-horizontal" name="contact" method="post" action="{$basename|cat:'?ctr=contactIndex'}">
    {include file=Form/input.tpl name="firstname" lang=$lang_firstname check=true}
    {include file=Form/input.tpl name="lastname" lang=$lang_lastname check=true}
    {include file=Form/input.tpl name="email" lang=$lang_email check=true}
    {include file=Form/input.tpl name="phone" lang=$lang_phone check=false}
    {include file=Form/select.tpl name="subject" lang=$lang_subject check=true}
    {include file=Form/textarea.tpl name="text" lang=$lang_text check=true}
    {include file=Form/submit.tpl lang=$lang_submit}
</form>

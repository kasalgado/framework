<h3>{$lang_contact}</h3>

{if isset($success)}<h4>{$lang_success}</h4>{/if}

<form name="contact" method="post" action="{$basename|cat:'?ctr=contactIndex'}">
    <label class="fl" for="firstname">{$lang_firstname}:*</label>
    <input class="fl" type="text" name="firstname" value="{$data.firstname}" />
    <div class="clear"></div>
    {if isset($validate.firstname)}<div>{$validate.firstname.error}</div>{/if}

    <label class="fl" for="lastname">{$lang_lastname}:*</label>
    <input class="fl" type="text" name="lastname" value="{$data.lastname}" />
    <div class="clear"></div>
    {if isset($validate.lastname)}<div>{$validate.lastname.error}</div>{/if}

    <label class="fl" for="email">{$lang_email}:*</label>
    <input class="fl" type="text" name="email" value="{$data.email}" />
    <div class="clear"></div>
    {if isset($validate.email)}<div>{$validate.email.error}</div>{/if}
    
    <label class="fl" for="phone">{$lang_phone}:</label>
    <input class="fl" type="text" name="phone" value="{$data.phone}" />
    <div class="clear"></div>
        
    <label class="fl" for="subject">{$lang_subject}:*</label>
    <select class="fl" name="subject">{html_options options=$select selected=$data.subject}</select>
    <div class="clear"></div>
    {if isset($validate.subject)}<div>{$validate.subject.error}</div>{/if}

    <label class="fl" for="text">{$lang_text}:*</label>
    <textarea name="text">{$data.text}</textarea>
    <div class="clear"></div>
    {if isset($validate.text)}<div>{$validate.text.error}</div>{/if}

    <input type="submit" value="{$lang_submit}" />
</form>

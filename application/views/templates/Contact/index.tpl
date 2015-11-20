<h3>{$lang_contact}</h3>

{if !$sendForm}
    {if $errmsg}<div class="error">{$errmsg}</div>
    {else}<div class="dist2">{$lang_contactInfo}</div>
    {/if}

    <form name="contact" method="post" action="{$basename|cat:'?ctr=contactIndex'}">
        <div class="rowForm">
            <div class="fl labelForm"><label for="firstname">{$lang_firstname}:</label></div>
            <div class="fl"><input class="{if $firstname.error} error{/if}" type="text" name="firstname" value="{$firstname.0}" /></div>
            <div class="clear"></div>
        </div>

        <div class="rowForm">
            <div class="fl labelForm"><label for="lastname">{$lang_lastname}:</label></div>
            <div class="fl"><input class="{if $lastname.error} error{/if}" type="text" name="lastname" value="{$lastname.0}" /></div>
            <div class="clear"></div>
        </div>

        <div class="rowForm">
            <div class="fl labelForm"><label for="email">{$lang_email}:</label></div>
            <div class="fl"><input class="long{if $email.error} error{/if}" type="text" name="email" value="{$email.0}" /></div>
            <div class="clear"></div>
        </div>

        <div class="rowForm">
            <div class="fl labelForm"><label for="subject">{$lang_subject}:</label></div>
            <div class="fl">
                <select class="{if $subject.error} error{/if}" name="subject">
                    {html_options options=$select}
                </select>
            </div>
            <div class="clear"></div>
        </div>

        <div class="rowForm">
            <div class="fl labelForm"><label for="text">{$lang_text}:</label></div>
            <div class="fl"><textarea class="{if $text.error} error{/if}" name="text">{$text.0}</textarea></div>
            <div class="clear"></div>
        </div>

        <div class="rowForm">
            <div class="fl labelForm"><label for="captcha">{$lang_captcha}:</label></div>
            <div class="fl"><img id="imgCaptcha" class="captcha" src="img/captcha/img_{if $imgName}{$imgName}{else}{$data.imgName}{/if}.jpg" /></div>
            <div class="clear"></div>
        </div>

        <div class="rowForm">
            <div class="fl labelForm"><label for="code">{$lang_code}:</label></div>
            <div class="fl"><input class="small dist{if $code.error} error{/if}" type="text" name="code" value="{$code.0}" /></div>
            <div class="clear"></div>
        </div>

        <div class="rowForm">
            <div class="fl labelForm"><label for="submit">&nbsp;</label></div>
            <div class="fl"><input type="submit" name="but_sendContact" value="{$lang_submit}" /></div>
            <div class="clear"></div>
        </div>
    </form>
{else}<div>{$lang_sendConfirm}</div>
{/if}
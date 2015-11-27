<ul class="nav nav-tabs">
    <li{if isset($nav_start)} class="active"{/if}>
        <a href="{$basename|cat:'?ctr=startIndex'}">{$lang_start}</a>
    </li>
    <li{if isset($nav_javascript)} class="active"{/if}>
        <a href="{$basename|cat:'?ctr=javascriptIndex'}">{$lang_javascript}</a>
    </li>
    <li{if isset($nav_mysql)} class="active"{/if}>
        <a href="{$basename|cat:'?ctr=mysqlIndex'}">{$lang_mysql}</a>
    </li>
    <li{if isset($nav_contact)} class="active"{/if}>
        <a href="{$basename|cat:'?ctr=contactIndex'}">{$lang_contact}</a>
    </li>
</ul>


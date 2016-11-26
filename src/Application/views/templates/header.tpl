<div class="languages">
    <a href="{$self|cat:'lang=en'}">{$lang_english}</a>&nbsp;|&nbsp;
    <a href="{$self|cat:'lang=es'}">{$lang_spanish}</a>&nbsp;|&nbsp;
    <a href="{$self|cat:'lang=de'}">{$lang_german}</a>
</div>
<div class="navbar navbar-default" role="navigation">
         <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
             </button>
         </div>
        <div class="navbar-collapse collapse">
           <ul class="nav navbar-nav navbar-left">
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
    </div>
</div>


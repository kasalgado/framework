<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>{$lang_web_title}</title>
        <meta name="titel" content="{$lang_head_titel}">
        <meta name="description" content="{$lang_head_description}">
        <meta name="keywords" content="{$lang_head_keywords}">
        <meta name="Content-Language" content="{$lang_head_lang}">
        <meta name="robots" content="index, follow">
        <meta name="revisit-after" content="15 days">
        <meta name="author" content="KASalgado - KAS" />
        <meta name="generator" content="By hand" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {$cssPub}
        {$cssApp}
    </head>

    <body>
        <div class="container">
            <div class="header">{include file="header.tpl"}</div>
            <div class="wraper">{include file=$template}</div>
            <div class="footer">{include file="footer.tpl"}</div>
        </div>
        {$jsPub}
        {$jsApp}
    </body>
</html>

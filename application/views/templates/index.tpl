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
    
    {$cssFiles}
    {$cssFile}
    {if isset( $cssLibrary ) }{$cssLibrary}{/if}
</head>

<body id="page-top" class="index">
    {include file="header.tpl"}
    {include file=$template}
    {$jsFiles}
    {include file="footer.tpl"}
    {$jsFile}
    {if isset( $jsLibrary ) }{$jsLibrary}{/if}
</body>
</html>

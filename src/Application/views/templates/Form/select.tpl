<div class="form-group">
    <label class="col-sm-2 control-label" for="{$name}">{$lang}:{if $check}*{/if}</label>
    <div class="col-sm-3">
        <select class="form-control" name="{$name}">
            {html_options options=$select selected=$data.$name}
        </select>
    </div>
    {if $check}
        {if isset($validate.$name)}
            <div class="col-sm-offset-2 col-sm-10 danger">{$validate.$name.error}</div>
        {/if}
    {/if}
</div>
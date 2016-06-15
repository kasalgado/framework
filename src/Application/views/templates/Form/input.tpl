<div class="form-group">
    <label class="col-sm-2 control-label" for="{$name}">{$lang}:{if $check}*{/if}</label>
    <div class="col-sm-3">
        <input class="form-control" type="text" name="{$name}" value="{$data.$name}" />
    </div>
    {if $check}
        {if isset($validate.$name)}
            <div class="col-sm-offset-2 col-sm-10 danger">{$validate.$name.error}</div>
        {/if}
    {/if}
</div>

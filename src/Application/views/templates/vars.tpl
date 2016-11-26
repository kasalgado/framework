<script>
    {foreach from=$js key=index item=value}
        var {$index} = "{$value}";
    {/foreach}
</script>
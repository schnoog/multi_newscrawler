{include file="head.tpl" title=foo}
{include file="searchbar.tpl" title=foo}

{if is_array($data)}
    {if $cfg.searchtype = "list"}
        <pre>{$data|@print_r}</pre>
    {else}
    {/if}
{/if}


{include file="footer.tpl" title=foo}
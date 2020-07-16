{include file="head.tpl" title=foo}
{include file="searchbar.tpl" title=foo}

{if is_array($data)}
    {if $cfg.searchtype == "list"}
        {include file="resulttable.tpl"}
    {else}
        {include file="resultgraph.tpl"}
    {/if}
{/if}


{include file="footer.tpl" title=foo}
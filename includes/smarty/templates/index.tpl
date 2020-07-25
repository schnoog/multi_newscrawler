{include file="head.tpl" title=foo}
{include file="searchbar.tpl" title=foo}

{if is_array($data)}
    {if $cfg.searchtype == "list"}
        {include file="resulttable.tpl"}
    {else}
        {include file="resultgraph.tpl"}
    {/if}
{/if}

<script type="text/javascript">
$(window).on('load', function () {
  // When the page has loaded
  $("#table").fadeIn(2000);
});         
</script>

{include file="footer.tpl" title=foo}
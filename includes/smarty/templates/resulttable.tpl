
<center>{count($data)} records found</center>
<div class="table-filters">
	<label for="filter-headlines">Headline-filter: (<small id="resultnum"></small>)</label>
	<input type="text" placeholder="enter a search term to filter (also date possible)" class="form-control" id="filter-headlines" data-filter-col="0,1,2">
    
</div>

<table class="table table-condensed" id='table' width='100%'>
<thead>
    <th>Date</th>
    <!--<th>&nbsp;</th>-->
    <th>Newspaper&nbsp;</th>
    <th>Headline</th>
</thead>
<tbody>
{foreach $data as $record}
    <tr class="{$cfg.ns[$record.newssource].lineclass}">
        <td nowrap style='text-align:left' class="light">{$record.label}&nbsp;</td>
        <!--<td>&nbsp;</td>-->
        <td nowrap  style='text-align:left' >{$cfg.ns[$record.newssource].name}&nbsp;</td>
        <td><a href="{$cfg.ns[$record.newssource].link}{$record.link}" target="blank">{$record.headline}</a></td>
    </tr>
{/foreach}

</tbody>
</table>

{literal}
		<script>
            $(function(){
	// Basic Filtable usage - pass in a div with the filters and the plugin will handle it
	            $('#table').filtable({ controlPanel: $('.table-filters') });
            });
		</script>
{/literal}
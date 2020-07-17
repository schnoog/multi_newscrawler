
<table id='results' width='100%'>
<thead>
    <th>Date</th>
    <th>&nbsp;</th>
    <th>Newspaper</th>
    <th>Title</th>
</thead>
<tbody>
{foreach $data as $record}
    <tr>
        <td nowrap style='text-align:right' >{$record.label}</td>
        <td>&nbsp;</td>
        <td nowrap  style='text-align:left' >{$cfg.ns[$record.newssource].name}</td>
        <td><a href="{$cfg.ns[$record.newssource].link}{$record.link}" target="blank">{$record.headline}</a></td>
    </tr>
{/foreach}

</tbody>
</table>

{literal}
		<script>
			$(document).ready(function() {
				$("#results").fancyTable({
				sortColumn:0, // column number for initial sorting
				sortOrder: 'desc', // 'desc', 'descending', 'asc', 'ascending', -1 (descending) and 1 (ascending)
				sortable: true,
				pagination: false, // default: false
				searchable: true,
				globalSearch: true,
				inputStyle: "",
  				inputPlaceholder: "Search...",
				
				});	
			});
		
		
		</script>
{/literal}
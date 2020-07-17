
<center>{count($data)} records found</center>
<table id='table' width='100%'>
<thead>
    <th>Date</th>
    <!--<th>&nbsp;</th>-->
    <th>Newspaper&nbsp;</th>
    <th>Headline</th>
</thead>
<tbody>
{foreach $data as $record}
    <tr>
        <td nowrap style='text-align:left' >{$record.label}&nbsp;</td>
        <!--<td>&nbsp;</td>-->
        <td nowrap  style='text-align:left' >{$cfg.ns[$record.newssource].name}&nbsp;</td>
        <td><a href="{$cfg.ns[$record.newssource].link}{$record.link}" target="blank">{$record.headline}</a></td>
    </tr>
{/foreach}

</tbody>
</table>

{literal}
		<script>
            $('#table').filterTable();
		</script>
{/literal}
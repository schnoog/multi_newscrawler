
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
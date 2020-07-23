
<center>{count($data)} records found within {$cfg.dbquerytime} seconds </center>
<div class="table-filters">
	<label for="filter-headlines">Headline-filter: (<small id="resultnum"></small>)<button onclick="exportTableToCSV('newscrawler_export.csv')">Export HTML Table To CSV File</button></label>
	<input type="text" placeholder="enter a search term to filter (also date possible)" class="form-control" id="filter-headlines" data-filter-col="0,1,2">
    
</div>

<table class="table table-condensed" id='table' width='100%'>
<thead>
    <tr class="resultline">
    <th>Date</th>
    <!--<th>&nbsp;</th>-->
    <th>Newspaper&nbsp;</th>
    <th>Headline</th>
    </tr>
</thead>
{nocache}
<tbody>
{foreach $data as $record}
    <tr class="resultline">
        <td nowrap style='text-align:left' class="light">{$record.label}&nbsp;</td>
        <!--<td>&nbsp;</td>-->
        <td nowrap  style='text-align:left' class="{$cfg.ns[$record.newssource].lineclass}">{$cfg.ns[$record.newssource].name}&nbsp;</td>
        <td><a href="{$cfg.ns[$record.newssource].link}{$record.link}" target="blank">{$record.headline}</a></td>
    </tr>
{/foreach}

</tbody>
{/nocache}
</table>

{literal}
		<script>

        function downloadCSV(csv, filename) {
            var csvFile;
            var downloadLink;

            // CSV file
            csvFile = new Blob([csv], {type: "text/csv"});

            // Download link
            downloadLink = document.createElement("a");

            // File name
            downloadLink.download = filename;

            // Create a link to the file
            downloadLink.href = window.URL.createObjectURL(csvFile);

            // Hide download link
            downloadLink.style.display = "none";

            // Add the link to DOM
            document.body.appendChild(downloadLink);

            // Click download link
            downloadLink.click();
        }

function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll(".resultline:not(.hidden)");
    var tmp; var tmpB;
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');
        
        for (var j = 0; j < cols.length; j++) {
            row.push(cols[j].innerText);
            tmp = cols[j].innerHTML;
            if( tmp.indexOf("href",0) > 0){
                tmpB = tmp.match(/href="([^"]*)/)[1];
                row.push(tmpB);
            }

        }
        csv.push('"' + row.join('","')+ '"');
     //   console.log (row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}


            $(function(){
	// Basic Filtable usage - pass in a div with the filters and the plugin will handle it
	            $('#table').filtable({ controlPanel: $('.table-filters') });
            });
		</script>
{/literal}
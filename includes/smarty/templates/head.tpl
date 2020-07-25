<!DOCTYPE html>
<html>
  <head>
  <title>{$cfg.site_title}</title>
    
  	<script src="bower_components/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bower_components/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="bower_components/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <script src="bower_components/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="includes/my.css?id=1">
    {if $cfg.searchtype != "list"}
      <script src="bower_components/Chart.bundle.min.js" crossorigin="anonymous"></script>
      <script src="bower_components/hammer.js"></script>
      <script src="bower_components/chartjs-plugin-zoom.js"></script>
    {else}
     <script src="bower_components/filtable.js"></script>
      <script src="bower_components/table2CSV.js"></script>
      {literal}
      <script type="text/javascript">
       $(document).ready(function () {
          $('#table').each(function () {
              var $table = $(this);

//              var $button = $("<button type='button'>");
              var $button = $('#csvbtn');
//              $button.text("Export to spreadsheet");
//              $button.insertAfter($table);

              $button.click(function () {
                  var csv = $table.table2CSV({
                      delivery: 'download',
                      filename: 'newscrawler_extract.csv'
                  });
                  window.location.href = 'data:text/csv;charset=UTF-8,' 
                  + encodeURIComponent(csv);
              });
          });
      })
      </script>
      {/literal}
    {/if}


</head>
<body>
    <div class="container-fluid">


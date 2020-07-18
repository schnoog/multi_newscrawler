<!DOCTYPE html>
<html>
  <head>
  <title>{$cfg.site_title}</title>
    
  	<script src="bower_components/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bower_components/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="bower_components/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <script src="bower_components/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="includes/my.css">
    {if $cfg.searchtype != "list"}
      <script src="bower_components/Chart.bundle.min.js" crossorigin="anonymous"></script>
      <script src="bower_components/hammer.js"></script>
      <script src="bower_components/chartjs-plugin-zoom.js"></script>
    {else}
      <script src="bower_components/filtable.js"></script>
    {/if}


</head>
<body>
    <div class="container-fluid">


<?php
include_once("./loader.php");
$data = false;
$time_end = 0;
$cfg['searchtype'] = "list";    
if(isset($_POST['search_type'])){
    $cfg['searchtype'] = "list";
    if($_POST['search_type'] == "Get the Graph"){        
        $cfg['searchtype'] = "graph";
        $time_start = microtime(true);
        $data = ProcessRequest();
        $data = GetGraphData($data);
        $time_end = microtime(true);
    }else{
        $time_start = microtime(true);
        $data = ProcessRequest();
        $time_end = microtime(true);
    }
$cfg['dbquerytime'] = $time_end - $time_start;
}

if(!isset($_POST['year_from'])) $cfg['post']['year_from'] = date("Y") -1;



$smarty->assign('data',$data);
$smarty->assign('cfg', $cfg);
$smarty->display('index.tpl');

if($time_end >0){
 $te = microtime(true);
 $td = $te - $time_end;
    error_log($td);
}
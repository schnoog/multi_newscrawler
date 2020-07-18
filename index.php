<?php
include_once("./loader.php");
$data = false;

$cfg['searchtype'] = "list";
if(isset($_POST['search_type'])){
    $cfg['searchtype'] = "list";
    if($_POST['search_type'] == "Get the Graph"){        
        $cfg['searchtype'] = "graph";
        $data = ProcessRequest();
        $data = GetGraphData($data);
    }else{
        $data = ProcessRequest();
    }
}

if(!isset($_POST['year_from'])) $cfg['post']['year_from'] = date("Y") -1;



$smarty->assign('data',$data);
$smarty->assign('cfg', $cfg);
$smarty->display('index.tpl');
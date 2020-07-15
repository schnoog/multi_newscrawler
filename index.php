<?php
include_once("./loader.php");
$data = false;

if(isset($_POST['search_type'])){
        

    $data = ProcessRequest();

    $cfg['searchtype'] = "list";
    if($_POST['search_type'] == "Get the Graph"){
        $cfg['searchtype'] = "graph";
    }



}




$smarty->assign('data',$data);
$smarty->assign('cfg', $cfg);
$smarty->display('index.tpl');
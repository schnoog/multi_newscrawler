<?php
include_once("./loader.php");
$data = false;

if(isset($_POST['search_type'])){
        

    

    $cfg['searchtype'] = "list";
    if($_POST['search_type'] == "Get the Graph"){
        echo "<h1>GRAPH</h1>";
        $cfg['searchtype'] = "graph";
    }

    $data = ProcessRequest();


}




$smarty->assign('data',$data);
$smarty->assign('cfg', $cfg);
$smarty->display('index.tpl');
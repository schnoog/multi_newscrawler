<?php
include_once("./loader.php");


if(isset($_REQUEST['predef'])){
    if($_REQUEST['predef'] == "0") return;
    $data = DB::queryFirstRow("Select * from searches WHERE id = %i",$_REQUEST['predef']);
    //print_r($data);
    header('Content-type: application/json'); 
    echo json_encode($data); //sending response to ajax



}


/*
$smarty->assign('data',$data);
$smarty->assign('cfg', $cfg);
$smarty->display('index.tpl');
*/
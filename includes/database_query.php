<?php


function ProcessRequest(){
    global $cfg;
      $where = [];
      $newssource = $_POST['newssource'];
      $ans = $cfg['nss'];
      $ans[] = "all";
      if (!in_array($newssource,$ans,true)){
          $cfg['debug'][] = "illegal source";
      }
      if ($newssource != "all") $where[] = ["newssource" => $newssource];

      if(strpos("--".$_POST['searchterm'],",")>1){
        $ssa = explode(",",$_POST['searchterm']);
      }else{
      $ssa[] = $_POST['searchterm'];
      }
      $searchparam = "";
      if($_POST['cisearch'] == 1) $searchparam = "BINARY";
      

      /*
            for($x=0;$x<count($search);$x++){
            $subclause->add('headline LIKE '.$iscase.' %ss', $search[$x]);
            }
      */



      $cfg['debug']['searchstrings'] = $ssa;
      $cfg['debug']['where'] =$where;
}
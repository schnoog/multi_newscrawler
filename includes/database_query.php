<?php

/*
$where = new WhereClause('and'); // create a WHERE statement of pieces joined by ANDs
$where->add('username=%s', 'Joe');
$where->add('password=%s', 'mypass');
 
// SELECT * FROM accounts WHERE (`username`='Joe') AND (`password`='mypass')
$results = DB::query("SELECT * FROM accounts WHERE %l", $where);
 
$subclause = $where->addClause('or'); // add a sub-clause with ORs
$subclause->add('age=%i', 15);
$subclause->add('age=%i', 18);
$subclause->negateLast(); // negate the last thing added (age=18)
 
// SELECT * FROM accounts WHERE (`username`='Joe') AND (`password`='mypass') AND ((`age`=15) OR (NOT(`age`=18)))
$results = DB::query("SELECT * FROM accounts WHERE %l", $where);
   
$subclause->negate(); // negate this entire subclause
 
// SELECT * FROM accounts WHERE (`username`='Joe') AND (`password`='mypass') AND (NOT((`age`=15) OR (NOT(`age`=18))))
$results = DB::query("SELECT * FROM accounts WHERE %l", $where);
*/




function ProcessRequest(){
    
    global $cfg;
      $where = [];
      $ssa = array();
      $excl = array();
      $whereAnd = array();
      
      $where = new WhereClause('and');
      $where->add('id>%i',1);

      $cis = false;
      $cie = false;

          $newssource = $_POST['newssource'];
          $ans = $cfg['nss'];
          $ans[] = "all";
          if (!in_array($newssource,$ans,true)){
              $cfg['debug'][] = "illegal source";
              return false;
          }
      if ($newssource != "all") {
        $where->add("newssource=%s", $newssource);
      }
      
      $where->add('jahr>=%d',$_POST['year_from']);
      $where->add('jahr<=%d',$_POST['year_to']);

      
      if(strlen($_POST['searchterm'])<2){
        $cfg['debug'][] = "search term too short";
        return false;
      }

      $subclauseSearch = $where->addClause('or'); // add a sub-clause with ORs
      
      if(strpos("--".$_POST['searchterm'],",")>1){
        $ssa = explode(",",$_POST['searchterm']);
      }else{
        $ssa[] = $_POST['searchterm'];
      }
      $searchparam = "";
      if(isset($_POST['cisearch'])){ 
        if($_POST['cisearch'] == 1) $searchparam = "BINARY";
        $cis = true;
      }
      for($x=0;$x < count($ssa);$x++){
        if($cis){
          $subclauseSearch->add('headline LIKE '.$searchparam.' %ss', $ssa[$x]);
        }else{
          $subclauseSearch->add('lower(headline) LIKE lower( %ss )', $ssa[$x]);
        }
      }    
  
  
      if(strlen($_POST['exclsearchterm'])>1){
        $subclauseExlude = $where->addClause('or'); // add a sub-clause with ORs

        if(strpos("--".$_POST['exclsearchterm'],",")>1){
          $excl = explode(",",$_POST['exclsearchterm']);
        }else{
        $excl[] = $_POST['exclsearchterm'];
        }
        $exclparam = "";
        if(isset($_POST['ciexclsearch'])){
          if($_POST['ciexclsearch'] == 1) $exclparam = "BINARY";
          $cie = true;
        }
        for($x=0;$x < count($excl);$x++){
          if($cie){
            $subclauseExlude->add('headline LIKE '.$exclparam.' %ss', $excl[$x]);
          }else{
            $subclauseExlude->add('lower(headline) LIKE lower( %ss )', $excl[$x]);
          }
        }  
        $subclauseExlude->negate();
      }
      $limit = "";
      if(isset($_POST['resultlimit'])){
        if(in_array($_POST['resultlimit'],$cfg['resultlimits'])){
              if (is_numeric($_POST['resultlimit']) ) $limit = " LIMIT 0, " . $_POST['resultlimit'];


        }
      }
      if($cfg['searchtype'] == "list"){
        return DB::query( "Select *  from " . $cfg['tableName']  . " WHERE %l ORDER BY label DESC $limit",$where);
      }else{
        //GROUP BY DATE_FORMAT(summaryDateTime,'%Y-%m')
        $togroup = $_POST['graphtype'];
        $grp = "";
        $lblD = "";
        switch ($togroup){
            case "y-m-d":
              $grp = " GROUP BY label ";
              $lblD = ", label AS MYDEF ";
              break;

            case "y-m":
              $grp = "GROUP BY DATE_FORMAT(label,'%Y-%m')";
              $lblD = ", DATE_FORMAT(label,'%Y-%m') AS MYDEF ";
              break;
            case "y-cw":
              $grp = "GROUP BY CONCAT(jahr, '-' ,kalenderwoche)";
              $lblD = ", CONCAT(jahr, '-' ,LPAD(kalenderwoche, 2, 0)) AS MYDEF ";              
              break;

            default:
              break;
        }

        $retData = DB::query( "Select * ". $lblD. " , count(id) AS mycount from " . $cfg['tableName']  . " WHERE %l  $grp ORDER by label ASC",$where);
        $min = $retData[0]['MYDEF'];
        $max = $retData[count($retData)- 1]['MYDEF'];
        //debugout([$retData,$togroup]);
        $retData = fillEmpty($retData,$togroup,"0",$min,$max);
        //debugout($retData);


        return $retData;
      }





}
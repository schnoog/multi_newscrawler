<?php
/**
 * 
 */
function SavePostData(){
    global $cfg;
    print_r($_REQUEST);
    //search_type
    $ins = array();
    foreach($cfg['post'] as $key => $value){
        if($key != "search_type")
        $ins[$key] = $value;

    }
    if(count($ins)>1){
        DB::insertIgnore('searches',$ins);
    }

}

/**
 * 
 */
function GetGraphData($data){
    global $cfg;
    $togroup = $_POST['graphtype'];
    $key = array();
    $item = array();
    $label = "Number of headlines from ";
    if($_POST['newssource'] == "all"){
        $label .=  "all crawled sources (";
        foreach($cfg['ns'] as $akey => $value){
            $src[] =$value['name']; 

        }
        $label .= implode("," , $src);
        
        $label .= ") ";
    }else{
        $label .= $cfg['ns'][$_POST['newssource']]['name'] . "";
    }
    $label .= "containing - " . $cfg['post']['searchterm'] . " - ";
    if(strlen($cfg['post']['exclsearchterm'])>0){
        $label .= "excluding - " . $cfg['post']['exclsearchterm'] . " - ";
    }
    $grp = "";
    for($x=0;$x < count($data);$x++){




        switch ($togroup){
            case "y-m-d":
                $key[] = $data[$x]['MYDEF'];
              $grp = " grouped by date";
              break;

            case "y-m":
              $grp = " grouped by month";
              $key[] = $data[$x]['MYDEF'];
              break;

            case "y-cw":
              $grp = "grouped by calendar week";
              $key[] = $data[$x]['MYDEF'] ;
              break;

            default:
              break;
        }

        $item[] = $data[$x]['mycount'];
        
    }

    $data['labels']= "'" . implode("','",$key) . "'";
    $data['nlabel'] = $label . $grp;
    $data['series'] = "'" . implode("','",$item) . "'"; 
    return $data;
}


/**
 * 
 */
function fixLang($strGet){
    $rep = array(
        'Kalenderwoche' => 'WeekOfYear',
        'Wochentag' => 'DayOfWeek(1=Monday,7=Sunday)',
        'Jahr' => 'Year',
        'Monat' => 'Month',
        'Tag' => 'Day'
    );
    $tmpX = $strGet;
    foreach ($rep as $src => $rpl){
        $tmpX = str_replace($src,$rpl,$tmpX);
    }
    return $tmpX;
}

/**
 * 
 * 
 */

function fillEmpty($given,$selector,$fillwith,$min,$max){

    $tofill = array();

    if($selector == "y-m"){
        $start    = (new DateTime($min . '-02'))->modify('first day of this month');
        $end      = (new DateTime($max . '-06'))->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 month');
        $period   = new DatePeriod($start, $interval, $end);       
        foreach ($period as $dt) {
            $tofill[] = $dt->format("Y-m");
        }
    }
 
    if($selector == "y-m-d"){
        $start    = (new DateTime($min ));
        $end      = (new DateTime($max ));
        $interval = DateInterval::createFromDateString('1 day');
        $period   = new DatePeriod($start, $interval, $end);       
        foreach ($period as $dt) {
            $tofill[] = $dt->format("Y-m-d");
        }
    }    

    if($selector == "y-cw"){
        $start    = (new DateTime(get_first_day_of_week($min) ));
        $end      = (new DateTime(get_first_day_of_week($max) ));
        $interval = DateInterval::createFromDateString('1 week');
        $period   = new DatePeriod($start, $interval, $end);       
        foreach ($period as $dt) {
            $tofill[] = $dt->format("Y-W");
        }
    }

 //   echo "<pre>" . print_r($tofill,true) . "</pre>";
    if(count($tofill)>0){
        $outp = array();
        for($x=0;$x<count($tofill);$x++){
                $lbl = $tofill[$x];
                $nv = findArrayData($given,$lbl,$selector,$fillwith);

                $outp[] = array(
                        'mycount' => $nv,
                        'MYDEF' => $lbl
                );

        }
        return $outp;
    }else{
        return $given;
    }




}
/**
 * 
 * 
 */
function findArrayData($data,$key,$selector,$fill){
    for($x=0 ; $x < count($data) ;$x++){
        if( $data[$x]['MYDEF'] == $key ){
            return $data[$x]['mycount'];
        }
    }
    return $fill;
}
/***
 * 
 * 
 */
function get_first_day_of_week( $y_woy ) {
    list($year_number,$week_number) = explode("-",$y_woy);
    // we need to specify 'today' otherwise datetime constructor uses 'now' which includes current time
    $today = new DateTime( 'today' );
    $today->setISODate( $year_number, $week_number, 0 );
    return $today->format("Y-m-d");

}
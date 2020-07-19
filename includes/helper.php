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
                $key[] = $data[$x]['label'];
              $grp = " grouped by date";
              break;

            case "y-m":
              $grp = " grouped by month";
              $key[] = substr($data[$x]['label'],0,7);
              break;

            case "y-cw":
              $grp = "grouped by calendar week";
              $key[] = $data[$x]['jahr'] . "-" . $data[$x]['kalenderwoche'];
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

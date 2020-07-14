<?php



function CrawlAllSources(){
    ob_implicit_flush(true);
    global $cfg;
    set_time_limit(0);
    $getall = array();
    for($x=0;$x < count($cfg['nss']);$x++){
            $cnt = 0;
            $ns = $cfg['nss'][$x];
            $maxdate = DB::queryFirstField("Select doneday from donedays WHERE newssource = %s ORDER by doneday DESC LIMIT 0,1",$ns);
            if(strlen($maxdate)<6) $maxdate = "2010-1-1";
            $start    = (new DateTime("$maxdate" ));
            $end      = (new DateTime( ));
            $interval = DateInterval::createFromDateString('1 day');
            $period   = new DatePeriod($start, $interval, $end);       
            foreach ($period as $dt) {
                  $getall[$dt->format("Y") . "-" . $dt->format("m") . "-" . $dt->format("d")][] = $ns;
            }
    }
    ksort($getall);
    foreach($getall as $crawldate => $sources){
        list($year,$month,$day)  = explode("-",$crawldate);
        for($y=0;$y<count($sources);$y++){
            $source = $sources[$y];
            echo "Crawl $year-$month-$day from $source ".PHP_EOL;
            buffer_flush();
            DrainNews($source,$year,$month,$day);
        }
    }

    set_time_limit(30);

//debugout($getall);

}





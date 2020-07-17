<?php

/**
 * Wrapper
 */
function DrainNews($newssource,$year,$month,$day){
    global $cfg;
    $cfg['debug'][] = "CRAWL $newssource,$year,$month,$day";
    switch($newssource){
        case "ex":
            DrainEXNews($year,$month,$day);
            break;  

        case "dm":
            DrainDMNews($year,$month,$day);
            break;
        
        default:
            break;
    }

}

/**
 * 
 * Express Crawler
 */
//https://www.express.co.uk/sitearchive/2019/9/2
function DrainEXNews($year,$month,$day){
    global $cfg;
    $pdate = strtotime("$year-$month-$day 05:01");
    $week = date("W",$pdate);
    $dow = date('w');
    $max=0;
    $label = "$year-$month-$day";
    $url = "https://www.express.co.uk/sitearchive/$year/$month/$day";
    @$html = file_get_html($url);
    //$cfg['debug'][]= "Crawl $url";
    if(!$html){
      //  $cfg['debug'][] = "no site response from $url";
        return 0;
    }

    $cnt=1;
    foreach( $html->find('ul[class=section-list]') as $dat){
            foreach ($dat->find('a') as $news){
                    $link =  $news->href;
                    $text = $news->plaintext;
                    list($dump0,$noway,$dump) = explode ("/",$news->href,3);
                    if(strlen($text) > $max) $max = strlen($text);
                    if(!in_array($noway,$cfg['nosafe'])){
                        $cnt++;
                        $checksum= md5("ex". $pdate . $text);
                        $sql ="INSERT INTO headlines (label,newssource,jahr,monat,tag,wochentag,kalenderwoche,headline,link,msgmd5) VALUES (%s,%i,%i,%i,%i,%i,%s,%s,%s) ";
                        $data = [];
                        $data = [
                            'label' => $label,
                            'newssource' => "ex",
                            'jahr' => $year,
                            'monat' => $month,
                            'tag'   => $day,
                            'wochentag' => $dow,
                            'kalenderwoche' => $week,
                            'headline' => $text,
                            'link' => $link,
                            'msgmd5' => $checksum
                        ];
                        //$cfg['debug'][] = $data;
                        $toadd[] = $data;
                    }
            }
            DB::insertIgnore('headlines',$toadd);
            //$cfg['debug'][]= "Added $cnt headlines";
    }
    $dayindex = (new DateTime("$year-$month-$day"))->diff(new DateTime('0001-01-01'))->format('%a days');
    if($cnt>0) DB::insert("donedays",[ 'newssource' => 'ex','doneday' => $label,'donecount' => $cnt, 'daynumber' => $dayindex]);
}

/**
 * 
 * Daily Mails Crawler
 */
function DrainDMNews($year,$month,$day){
    global $cfg;
    $pdate = strtotime("$year-$month-$day 05:01");
    $week = date("W",$pdate);
    $dow = date('w');
    $max=0;
    $label = "$year-$month-$day";
    $url = 'https://www.dailymail.co.uk/home/sitemaparchive/day_'. $year . sprintf('%02d', $month) . sprintf('%02d', $day) . '.html';
    @$html = file_get_html($url);
    //$cfg['debug'][]= "Crawl $url";
    if(!$html){
        //$cfg['debug'][] = "no site response from $url";
        return 0;
    }

    $cnt=1;
    foreach( $html->find('ul[class=archive-articles debate link-box]') as $dat){
            foreach ($dat->find('a') as $news){
                    $link =  $news->href;
                    $text = $news->plaintext;
                    list($dump0,$noway,$dump) = explode ("/",$news->href,3);
                    if(strlen($text) > $max) $max = strlen($text);
                    if(!in_array($noway,$cfg['nosafe'])){
                        $cnt++;
                        $checksum= md5("dm" . $pdate . $text);
                        $sql ="INSERT INTO headlines (label,newssource,jahr,monat,tag,wochentag,kalenderwoche,headline,link,msgmd5) VALUES (%s,%i,%i,%i,%i,%i,%s,%s,%s) ";
                        $data = [];
                        $data = [
                            'label' => $label,
                            'newssource' => "dm",
                            'jahr' => $year,
                            'monat' => $month,
                            'tag'   => $day,
                            'wochentag' => $dow,
                            'kalenderwoche' => $week,
                            'headline' => $text,
                            'link' => $link,
                            'msgmd5' => $checksum
                        ];
                        $toadd[] = $data;
                    }
            }
            DB::insertIgnore('headlines',$toadd);
            if($cfg['tableName'] == "MEM_headline")DB::insertIgnore('MEM_headline',$toadd);
            //$cfg['debug'][]= "Added $cnt headlines";
    }
    $dayindex = (new DateTime("$year-$month-$day"))->diff(new DateTime('0001-01-01'))->format('%a days');
    if($cnt>0) DB::insert("donedays",[ 'newssource' => 'dm','doneday' => $label,'donecount' => $cnt, 'daynumber' => $dayindex]);
}
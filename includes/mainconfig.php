<?php

ini_set('memory_limit', '2048M');
$cfg['url'] = "https://newscrawler.eu";
$cfg['site_title'] = "MyNewscrawler";

$cfg['startyear'] = 2010;
$cfg['endyear'] = date('Y');
$cfg['debugout'] = false;

$cfg['groupings'] = [
                        'y-m' => 'per month',
                        'y-m-d' => 'per day',
                        'y-cw'  => 'per calendar week'
                    ];

/**
 * Skip these topics
 */
$cfg['nosafe'] = array("tvshowbiz","femail","sport","wires",'celebrity-news' , 'expressyourself' , 'entertainment' , 'life-style' , 'showbiz' );
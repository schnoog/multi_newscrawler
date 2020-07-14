<?php

/**
 * global debug message array
 */
$cfg['debug'] = array();

/**
 * MEMORY TABLE - use it if available
 */
$cfg['tableName'] = "headlines";
$tmpTN = DB::tableList();
if (in_array("MEM_headline",$tmpTN)) {
    $cfg['tableName'] = "MEM_headline";
}

/**
 * Get available news sources
 */
$res = DB::query("Select * from newssources");
for($x=0;$x<count($res);$x++){
    $cfg['ns'][$res[$x]['shortname']]['name'] = $res[$x]['fullname'];
    $cfg['ns'][$res[$x]['shortname']]['link'] = $res[$x]['linkbase'];
    $cfg['nss'][] = $res[$x]['shortname'];
}

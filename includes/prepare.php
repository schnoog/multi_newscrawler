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
    $cfg['ns'][$res[$x]['shortname']]['lineclass'] = $res[$x]['lineclass'];
    $cfg['nss'][] = $res[$x]['shortname'];
}

/**
 * SavePOSTRequestData in cfg
 */
$cfg['post'] = $_POST;
$cfg['ns_select'] = "";
if(isset($_POST['newssource'])){
    $cfg['ns_select'] = $_POST['newssource'];
}

/**
 * other stuff
 */
for($x=$cfg['startyear']; $x < $cfg['endyear'] +1 ; $x++) $cfg['years'][] = $x;
/**
 * 
 * Start Up Smarty
 * 
 */

$smarty = new Smarty();

$smarty->setTemplateDir($appbasedir . '/includes/smarty/templates');
$smarty->setCompileDir($appbasedir . '/includes/smarty/templates_c');
$smarty->setCacheDir($appbasedir . '/includessmarty/cache');
$smarty->setConfigDir($appbasedir . '/includessmarty/configs');


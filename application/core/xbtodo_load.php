<?php
if(!defined("XBTODO_SYSCALL")) exit("Direct script access not allowed");
/*
 * XBTODO
 * XBCMP'S TODO LIST SYSTEM FOR DEVELOPERS
 * SEE README.TXT FOR MORE INFORMATIONS
 *
 * xbtodo_load.php : load the todo application
 */
define('DS', DIRECTORY_SEPARATOR);
define("XBTODO_CORE_FOLDER", dirname(__FILE__).DS);

xbtodo_require_once("../config/xbtodo_config.php");
xbtodo_require_once("xbtodo/xbtodo_functions.php");
xbtodo_require_once("xbtodo/xbtodo_pages.php");
xbtodo_require_once("xbtodo/xbtodo_templates.php");
$rdata;
$pageid;
$pagename;
$logged;

function xbtodo_init($page, $data){
	global $rdata;
	global $pageid;
	global $pagename;
	$rdata = $data;
	$pageid = $page;
	xbtodo_templates_init();
	if(XBTODO_RUN_INSTALLATION_WIZARD){
		xbtodo_functions_run_installation_wizard();
	}
	else{
		//$pagename = xbtodo_pages_get_page_name($pageid);
		echo "Hello world !";
	}
}

function xbtodo_require_once($file){
	$file = str_replace("/", DS, $file);
	$require = require_once(XBTODO_CORE_FOLDER.$file);
	return $require;
}
$data = array("gs", 235, "dhi","ds" =>"jdfd");

echo $json = json_encode($data)."<br />";
echo $gz = gzdeflate($json, 9)."<br />";
echo gzinflate($gz)."<br />";
echo $base64 = base64_encode($gz)."<br /><br />";
echo $json = serialize($data)."<br />";
echo $gz = gzdeflate($json, 9)."<br />";
echo $base64 = base64_encode($gz)."<br />";

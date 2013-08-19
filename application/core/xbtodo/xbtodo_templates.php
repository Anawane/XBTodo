<?php
if(!defined("XBTODO_SYSCALL")) exit("Direct script access not allowed");
/*
 *
 */
xbtodo_require_once("../libs/xbtodo/Mustache/Autoloader.php");

$mustache = null;

function xbtodo_templates_init(){
	global $mustache;

	Mustache_Autoloader::register();
	
	$options =  array("extension" => ".html");
	$mustache = new Mustache_Engine(array(
	    "loader" => new Mustache_Loader_FilesystemLoader(XBTODO_CORE_FOLDER.str_replace("/", DS, "../templates/xbtodo/"), $options)
	));
}
class xbtodo_template{
	public $current_template = null;
	public $current_vars = array();
	public function __construct($name, $mustache){
		$this->current_template = $mustache->loadTemplate($name);
	}
	public function __toString(){
		return $this->current_template->render($this->current_vars);
	}
	public function set_vars(Array $vars){
		$this->current_vars = array_merge_recursive($this->current_vars, $vars);
		return $this;
	}
	public function get_info(){
		return array("name" => $this->current_name);
	}
}

function xbtodo_templates_get($name){
	global $mustache;
	return new xbtodo_template("xbtodo_".$name, $mustache);
}
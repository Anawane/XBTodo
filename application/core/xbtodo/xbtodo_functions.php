<?php
if(!defined("XBTODO_SYSCALL")) exit("Direct script access not allowed");
/*
 * 
 */

function xbtodo_functions_run_installation_wizard(){
	/*echo "<!DOCTYPE html>\n";
	echo "<html>\n";
	echo "<head>\n";
	echo xbtodo_templates_get("page_head")->set_vars(array(
		"title" => XBTODO_NAME,
		"responsive" => true,
		"add_styling" => true,
		"assets_css_folder" => XBTODO_ASSETS_CSS_FOLDER,
		"add_custom_css_files" => false,
		"add_inline_css" => array(
			"inline_css" => ".navbar form[role=\"search\"] .form-group{
				position:relative;
			}
			.navbar form[role=\"search\"] .form-group button[type=\"submit\"]{
				position:absolute;
				color:#333;
				top:0;
				right:0;
			}
			.navbar form[role=\"search\"] .form-group button[type=\"submit\"]:hover{
				opacity:.8;
				text-decoration: none;
			}
			.twitter-typeahead .tt-query,
			.twitter-typeahead .tt-hint {
				margin-bottom: 0;
			}
			
			.tt-dropdown-menu {
				min-width: 160px;
				margin-top: 2px;
				padding: 5px 0;
				background-color: #fff;
				border: 1px solid #ccc;
				border: 1px solid rgba(0,0,0,.2);
				*border-right-width: 2px;
				*border-bottom-width: 2px;
				-webkit-border-radius: 6px;
				   -moz-border-radius: 6px;
				        border-radius: 6px;
				-webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
				   -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
				        box-shadow: 0 5px 10px rgba(0,0,0,.2);
				-webkit-background-clip: padding-box;
				   -moz-background-clip: padding;
				        background-clip: padding-box;
			}
			
			.tt-suggestion, .tt-header {
				display: block;
				padding: 3px 20px;
			}
			
			.tt-suggestion.tt-is-under-cursor {
				color: #fff;
				background-color: #0081c2;
				background-image: -moz-linear-gradient(top, #0088cc, #0077b3);
				background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0077b3));
				background-image: -webkit-linear-gradient(top, #0088cc, #0077b3);
				background-image: -o-linear-gradient(top, #0088cc, #0077b3);
				background-image: linear-gradient(to bottom, #0088cc, #0077b3);
				background-repeat: repeat-x;
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0077b3', GradientType=0)
			}
			
			.tt-suggestion.tt-is-under-cursor a {
				color: #fff;
			}

			.tt-suggestion p, .tt-header {
				margin: 0;
			}
			.navbar form[role=\"search\"] .form-group input[type=\"search\"]{
				background:#FFF !important;
			}
			.tt-header{
				font-weight:bold;
			}"
		)
	));
	echo "</head>\n";
	echo "<body>\n";
	echo xbtodo_templates_get("navbar")->set_vars(array(
		"short_name" => XBTODO_SHORT_NAME,
		"logged" => true
	));
	echo xbtodo_templates_get("page_javascript")->set_vars(array(
		"add_needed_javascript" => true,
		"assets_js_folder" => XBTODO_ASSETS_JS_FOLDER,
		"navbar_template_needed_javascript" => true
	));
	echo "</body>\n";
	echo "</html>\n";*/
	global $rdata;
	if(isset($rdata['post']['p']) && $rdata['post']['p'] == "ins2"){
		if(isset($rdata['post']['sysname'], $rdata['post']['syssname'], $rdata['post']['index'], $rdata['post']['css'], $rdata['post']['js'], $rdata['post']['img'], $rdata['post']['login']) && !empty($rdata['post']['sysname']) && !empty($rdata['post']['syssname']) && !empty($rdata['post']['index']) && !empty($rdata['post']['css']) && !empty($rdata['post']['js']) && !empty($rdata['post']['img']) && !empty($rdata['post']['login'])){
			file_put_contents(XBTODO_CORE_FOLDER.str_replace("/", DS, "../config/xbtodo_config.php"), xbtodo_templates_get("system_xbtodo_config.php")->set_vars(array(
				"syssname" => $rdata['post']['syssname'],
				"sysname" => $rdata['post']['sysname'],
				"index" => $rdata['post']['index'],
				"assets_css" => $rdata['post']['css'],
				"assets_js" => $rdata['post']['js'],
				"assets_img" => $rdata['post']['img'],
				"login" => $rdata['post']['login']
			)));
			header("Location: ".$rdata['post']['index']);
		}
		else{
			echo "ERROR : SPECIFY ALL THE INPUTS !<br />";
			echo xbtodo_templates_get("installation");
		}
	}
	else{
		echo xbtodo_templates_get("installation");
	}
}

function xbtodo_functions_get_data($name){
	$file = XBTODO_CORE_FOLDER.str_replace("/", DS, "../data/xbtodo/xbtodo_".$name.".dat");
	if(file_exists($file)){
		return json_decode(gzinflate(file_get_contents($file)));
	}
	return null;
}

function xbtodo_functions_set_data_merge($name, $datas){
	$file = XBTODO_CORE_FOLDER.str_replace("/", DS, "../data/xbtodo/xbtodo_".$name.".dat");
	if(file_exists($file)){
		$array = json_decode(gzinflate(file_get_contents($file)));
	}
	else{
		$array = array();
	}
	$array = array_merge_recursive($array, $datas);
	return file_put_contents($file, gzdeflate(json_encode($array), 9));
}

function xbtodo_functions_set_data_all($name, $datas){
	$file = XBTODO_CORE_FOLDER.str_replace("/", DS, "../data/xbtodo/xbtodo_".$name.".dat");
	return file_put_contents($file, gzdeflate(json_encode($datas), 9));
}
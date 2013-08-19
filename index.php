<?php
define("XBTODO_SYSCALL", true);
require("application/core/xbtodo_load.php");

$current_page = isset($_GET['p']) ? $_GET['p'] : "i1";
$request_data = array("get" => $_GET, "post" => $_POST);

xbtodo_init($current_page, $request_data);

<?php

    require_once("include/config.php");
	require_once(DIR_FS."islogin.php");
    
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    
    $content = "transaction";
	require_once(DIR_WS_TEMPLATES."main_page.tpl.php");

?>
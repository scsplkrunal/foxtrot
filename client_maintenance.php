<?php
    require_once("include/config.php");
    require_once(DIR_FS."islogin.php");
	
    $error = '';
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    
    if(isset($_POST['submit'])&& $_POST['submit']=='Save'){
       
      echo '<pre>'; print_r($_POST);exit;
    }
    
    $content = "client_maintenance";
    include(DIR_WS_TEMPLATES."main_page.tpl.php");
?>
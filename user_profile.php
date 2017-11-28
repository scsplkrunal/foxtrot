<?php
	require_once("include/config.php");
	require_once(DIR_FS."islogin.php");
	
    $error = '';
    $fname = '';
    $lname = '';
    $email = '';
    $uname = '';
    $user_image = array();
    
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    
    $instance = new user_master();
    
    if(isset($_POST['submit'])&&$_POST['submit']=='Submit'){
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $fname = isset($_POST['fname'])?$instance->re_db_input($_POST['fname']):'';
        $lname = isset($_POST['lname'])?$instance->re_db_input($_POST['lname']):'';
        $email = isset($_POST['email'])?$instance->re_db_input($_POST['email']):'';
        $uname = isset($_POST['uname'])?$instance->re_db_input($_POST['uname']):'';
        $user_image = isset($_POST['user_image'])?$_POST['user_image']:array();
        //echo '<pre>';print_r($_POST);exit;
        $return = $instance->insert_update($_POST);
        
        if($return===true){
            header("location:".CURRENT_PAGE_QRY);exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
   
    else if($action=='edit' && $id>0){
        $return = $instance->edit($id);
        $name = $instance->re_db_output($return['user_name']);
    }
    else if(isset($_GET['action'])&&$_GET['action']=='status'&&isset($_GET['id'])&&$_GET['id']>0&&isset($_GET['status'])&&($_GET['status']==0 || $_GET['status']==1))
    {
        $id = $instance->re_db_input($_GET['id']);
        $status = $instance->re_db_input($_GET['status']);
        $return = $instance->status($id,$status);
        if($return==true){
            header('location:'.CURRENT_PAGE);exit;
        }
        else{
            header('location:'.CURRENT_PAGE);exit;
        }
    }  
    else if(isset($_GET['action'])&&$_GET['action']=='delete'&&isset($_GET['id'])&&$_GET['id']>0)
    {
        $id = $instance->re_db_input($_GET['id']);
        $return = $instance->delete($id);
        if($return==true){
            header('location:'.CURRENT_PAGE);exit;
        }
        else{
            header('location:'.CURRENT_PAGE);exit;
        }
    }
    else if($action=='view'){
        
        $return = $instance->select();//echo '<pre>';print_r($return);exit;
        
    }
    
	$content = "user_profile";
	require_once(DIR_WS_TEMPLATES."main_page.tpl.php");
?>
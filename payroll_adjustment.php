<?php
    require_once("include/config.php");
     
    $error = '';
    $advance = '';
    $advertising='';
    $advisor_chanel='';
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    
    $instance = new payroll_master();
    
    if(isset($_POST['submit'])&& $_POST['submit']=='Save'){
        //print_r($_POST);exit;
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $advance = isset($_POST['advance'])?$instance->re_db_input($_POST['advance']):'';
        $advertising=isset($_POST['advertising'])?$instance->re_db_input($_POST['advertising']):'';
        $advisor_chanel = isset($_POST['advisor_chanel'])?$instance->re_db_input($_POST['advisor_chanel']):'';
        $return = $instance->insert_update($_POST);
        
        if($return===true){
            header("location:".CURRENT_PAGE);exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if($action=='edit' && $id>0){
        $return = $instance->edit($id);
        $advance = $instance->re_db_output($return['advance']);
        $advertising = $instance->re_db_output($return['advertising']);
        $advisor_chanel = $instance->re_db_output($return['advisor_chanel']);
        
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
        
        $return = $instance->select_payroll();
        
    }
    
    $content = "payroll_adjustment";
    include(DIR_WS_TEMPLATES."main_page.tpl.php");
?>
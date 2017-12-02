<?php
    require_once("include/config.php");
    
    $error = '';
    $type = '';
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view';
    
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    
    $instance = new client_suitebility_master();
    
    if(isset($_POST['submit_income'])&& $_POST['submit_income']=='Save'){
        //print_r($_POST);exit;
        	 
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $option = isset($_POST['option'])?$instance->re_db_input($_POST['option']):''; 
        $return = $instance->insert_update_income($_POST);       
        if($return===true){
            header("location:".CURRENT_PAGE."?action=view");exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if($action=='edit_income' && $id>0){
        $return = $instance->edit_income($id);
        $option = $instance->re_db_output($return['option']);        
    }
    /*else if(isset($_GET['action'])&&$_GET['action']=='status'&&isset($_GET['id'])&&$_GET['id']>0&&isset($_GET['status'])&&($_GET['status']==0 || $_GET['status']==1))
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
    } */ 
    else if(isset($_GET['action'])&&$_GET['action']=='delete_income'&&isset($_GET['id'])&&$_GET['id']>0)
    {
        $id = $instance->re_db_input($_GET['id']);
        $return = $instance->delete_income($id);
        if($return==true){
            header('location:'.CURRENT_PAGE);exit;
        }
        else{
            header('location:'.CURRENT_PAGE);exit;
        }
    }
    //income End
    // Horigin start 
    else if(isset($_POST['submit_horizon'])&& $_POST['submit_horizon']=='Save'){
        //print_r($_POST);exit;
        	 
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $option = isset($_POST['option'])?$instance->re_db_input($_POST['option']):''; 
        $return = $instance->insert_update_horizon($_POST);       
        if($return===true){
            header("location:".CURRENT_PAGE);exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if($action=='edit_horizon' && $id>0){
        $return = $instance->edit_horizon($id);
        $option = $instance->re_db_output($return['option']);        
    }
    /*else if(isset($_GET['action'])&&$_GET['action']=='status'&&isset($_GET['id'])&&$_GET['id']>0&&isset($_GET['status'])&&($_GET['status']==0 || $_GET['status']==1))
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
    } */ 
    else if(isset($_GET['action'])&&$_GET['action']=='delete_horizon'&&isset($_GET['id'])&&$_GET['id']>0)
    {
        $id = $instance->re_db_input($_GET['id']);
        $return = $instance->delete_horizon($id);
        if($return==true){
            header('location:'.CURRENT_PAGE);exit;
        }
        else{
            header('location:'.CURRENT_PAGE);exit;
        }
    }
    //horigin end
    else if($action=='view_income'){
        
        $return_income = $instance->select_income();
        $return_horizon =$instance->select_horizon();
    }
    
    $content = "client_suitability";
    include(DIR_WS_TEMPLATES."main_page.tpl.php");
?>
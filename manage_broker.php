<?php
	require_once("include/config.php");
	require_once(DIR_FS."islogin.php");
	
    $error = '';
    $fname = '';
    $lname = '';
    $mname = '';
    $suffix = '';
    $fund = '';
    $internal = '';
    $ssn = '';
    $tax_id = '';
    $crd = '';
    $active_status_cdd = '';
    $pay_method = '';
    $branch_manager = '';
    
    $active_status_cdd1 = '';
    $telephone = '';
    $cell = '';
    $fax = '';
    $gender = '';
    $status = '';
    $spouse = '';
    $children = '';
    $email1 = '';
    $email2 = '';
    $web_id = '';
    $web_password = '';
    $dob = '';
    $prospect_date = '';
    $reassign_broker = '';
    $u4 = '';
    $u5 = '';
    $dba_name = '';
    $eft_info = '';
    $start_date = '';
    $transaction_type = '';
    $routing = '';
    $account_no = '';
    $summarize_trailers = '';
    $summarize_direct_imported_trades = '';
    $from_date = '';
    $to_date = '';
    
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    
    /*$instance = new account_master();
    
    if(isset($_POST['submit'])&& $_POST['submit']=='Save'){
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $type = isset($_POST['type'])?$instance->re_db_input($_POST['type']):'';
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
        $type = $instance->re_db_output($return['type']);
        
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
        
        $return = $instance->select_account_type();
        
    }*/
    
	$content = "manage_broker";
	require_once(DIR_WS_TEMPLATES."main_page.tpl.php");
?>
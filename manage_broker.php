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
    $search_text = '';
    
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
    
    $instance = new broker_master();
    
    if(isset($_POST['submit'])&& $_POST['submit']=='Save'){
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $fname = isset($_POST['fname'])?$instance->re_db_input($_POST['fname']):'';
    	$lname = isset($_POST['lname'])?$instance->re_db_input($_POST['lname']):'';
    	$mname = isset($_POST['mname'])?$instance->re_db_input($_POST['mname']):'';
    	$suffix = isset($_POST['suffix'])?$instance->re_db_input($_POST['suffix']):'';
    	$fund = isset($_POST['fund'])?$instance->re_db_input($_POST['fund']):'';
    	$internal = isset($_POST['internal'])?$instance->re_db_input($_POST['internal']):'';
    	$ssn = isset($_POST['ssn'])?$instance->re_db_input($_POST['ssn']):'';
    	$tax_id = isset($_POST['tax_id'])?$instance->re_db_input($_POST['tax_id']):'';
    	$crd = isset($_POST['crd'])?$instance->re_db_input($_POST['crd']):'';
        $active_status_cdd = isset($_POST['active_status_cdd'])?$instance->re_db_input($_POST['active_status_cdd']):'';
    	$pay_method = isset($_POST['pay_method'])?$instance->re_db_input($_POST['pay_method']):'';
    	$branch_manager = isset($_POST['branch_manager'])?$instance->re_db_input($_POST['branch_manager']):'';//echo '<pre>';print_r($_POST);exit;
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
        
        $fname = $instance->re_db_output($return['first_name']);
    	$lname = $instance->re_db_output($return['last_name']);
    	$mname = $instance->re_db_output($return['middle_name']);
    	$suffix = $instance->re_db_output($return['suffix']);
    	$fund = $instance->re_db_output($return['fund']);
    	$internal = $instance->re_db_output($return['internal']);
    	$ssn = $instance->re_db_output($return['ssn']);
    	$tax_id = $instance->re_db_output($return['tax_id']);
    	$crd = $instance->re_db_output($return['crd']);
        $active_status_cdd = $instance->re_db_output($return['active_status']);
    	$pay_method = $instance->re_db_output($return['pay_method']);
    	$branch_manager = $instance->re_db_output($return['branch_manager']);
        
    }
    else if(isset($_POST['submit'])&&$_POST['submit']=='Search'){
        
       $search_text = isset($_POST['search_text'])?$instance->re_db_input($_POST['search_text']):''; 
       $return = $instance->search($search_text);
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
        
        $return = $instance->select();
        
    }
    
	$content = "manage_broker";
	require_once(DIR_WS_TEMPLATES."main_page.tpl.php");
?>
<?php
    require_once("include/config.php");
    require_once(DIR_FS."islogin.php");
	
    $error = '';
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    $fname = '';
    $mi = '';
    $lname = '';
    $client_file = '';
    $account_type = '';
    $broker_name = '';
    $telephone = '';
    $contact_status = '';
    $search_text = '';
    
    $sponsor_company = '';
    
    $instance = new client_maintenance();
    $instance_account_type = new account_master();
    $get_account_type = $instance_account_type->select_account_type();
    $get_state = $instance->select_state();
    $instance_product = new product_maintenance();
    $get_sponsor = $instance_product->select_sponsor();
    $instance_client_suitability = new client_suitebility_master();
    $get_income = $instance_client_suitability->select_income();
    $get_horizon = $instance_client_suitability->select_horizon();
    $get_networth = $instance_client_suitability->select_networth();
    $get_risk_tolerance = $instance_client_suitability->select_risk_tolerance();
    $get_annual_expenses = $instance_client_suitability->select_annual_expenses();
    $get_liqudity_needs = $instance_client_suitability->select_liqudity_needs();
    $get_liquid_net_worth = $instance_client_suitability->select_liquid_net_worth();
    $get_special_expenses = $instance_client_suitability->select_special_expenses();
    $get_portfolio = $instance_client_suitability->select_portfolio();
    $get_time_for_exp = $instance_client_suitability->select_time_for_exp();
    $get_account_use = $instance_client_suitability->select_account_use();
    
    if(isset($_POST['submit'])&& $_POST['submit']=='Save'){
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $fname = isset($_POST['fname'])?$instance->re_db_input($_POST['fname']):'';
        $lname = isset($_POST['lname'])?$instance->re_db_input($_POST['lname']):'';
        $client_file = isset($_POST['client_file'])?$instance->re_db_input($_POST['client_file']):'';
        $account_type = isset($_POST['account_type'])?$instance->re_db_input($_POST['account_type']):'';
        $broker_name = isset($_POST['broker_name'])?$instance->re_db_input($_POST['broker_name']):'';
        $telephone = isset($_POST['telephone'])?$instance->re_db_input($_POST['telephone']):'';
        $contact_status = isset($_POST['contact_status'])?$instance->re_db_input($_POST['contact_status']):'';//print_r($_POST);exit;
        $return = '';//$instance->insert_update($_POST);
        
        if($return===true){
            header("location:".CURRENT_PAGE);exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['submit'])&&$_POST['submit']=='Search'){
        
       $search_text = isset($_POST['search_text'])?$instance->re_db_input($_POST['search_text']):''; 
       $return = $instance->search($search_text);
    }
    else if($action=='edit' && $id>0){
        $return = $instance->edit($id);
        $fname = isset($return['first_name'])?$instance->re_db_output($return['first_name']):'';
        $lname = isset($return['last_name'])?$instance->re_db_output($return['last_name']):'';
        $client_file = isset($return['client_file'])?$instance->re_db_output($return['client_file']):'';
        $account_type = isset($return['account_type'])?$instance->re_db_output($return['account_type']):'';
        $broker_name = isset($return['broker_name'])?$instance->re_db_output($return['broker_name']):'';
        $telephone = isset($return['telephone'])?$instance->re_db_output($return['telephone']):'';
        $contact_status = isset($return['contact_status'])?$instance->re_db_output($return['contact_status']):'';
        
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
    
    $content = "client_maintenance";
    include(DIR_WS_TEMPLATES."main_page.tpl.php");
?>
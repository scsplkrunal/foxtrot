<?php
    require_once("include/config.php");
    require_once(DIR_FS."islogin.php");
	
    $error = '';
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    $fname = '';
    $mi = '';
    $lname = '';
    $do_not_contact = '';
    $active = '';
    $long_name = '';
    $client_file_number = '';
    $clearing_account = '';
    $client_ssn = '';
    $account_type = '';
    $household = '';
    $broker_name = '';
    $split_broker = '';
    $split_rate = '';
    $address1 = '';
    $address2 = '';
    $city = '';
    $state = '';
    $zip_code = '';
    $age = '';
    $ofak_check = '';
    $fincen_check = '';
    $telephone = '';
    $citizenship = '';
    $contact_status = '';
    $birth_date = '';
    $open_date = '';
    $naf_date = '';
    $last_contacted = '';
    $search_text = '';
    
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
    
    if(isset($_POST['submit'])&& $_POST['submit']=='Save'){//echo '<pre>';print_r($_POST);exit;
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $fname = isset($_POST['fname'])?$instance->re_db_input($_POST['fname']):'';
        $lname = isset($_POST['lname'])?$instance->re_db_input($_POST['lname']):'';
        $mi = isset($_POST['mi'])?$instance->re_db_input($_POST['mi']):'';
        $do_not_contact = isset($_POST['do_not_contact'])?$instance->re_db_input($_POST['do_not_contact']):'';
        $active = isset($_POST['active'])?$instance->re_db_input($_POST['active']):'';
        $long_name = isset($_POST['long_name'])?$instance->re_db_input($_POST['long_name']):'';
        $client_file_number = isset($_POST['client_file_number'])?$instance->re_db_input($_POST['client_file_number']):'';
        $clearing_account = isset($_POST['clearing_account'])?$instance->re_db_input($_POST['clearing_account']):'';
        $client_ssn = isset($_POST['client_ssn'])?$instance->re_db_input($_POST['client_ssn']):'';
        $account_type = isset($_POST['account_type'])?$instance->re_db_input($_POST['account_type']):'';
        $household = isset($_POST['household'])?$instance->re_db_input($_POST['household']):'';
        $broker_name = isset($_POST['broker_name'])?$instance->re_db_input($_POST['broker_name']):'';
        $split_broker = isset($_POST['split_broker'])?$instance->re_db_input($_POST['split_broker']):'';
        $split_rate = isset($_POST['split_rate'])?$instance->re_db_input($_POST['split_rate']):'';
        $address1 = isset($_POST['address1'])?$instance->re_db_input($_POST['address1']):'';
        $address2 = isset($_POST['address2'])?$instance->re_db_input($_POST['address2']):'';
        $city = isset($_POST['city'])?$instance->re_db_input($_POST['city']):'';
        $state = isset($_POST['state'])?$instance->re_db_input($_POST['state']):'';
        $zip_code = isset($_POST['zip_code'])?$instance->re_db_input($_POST['zip_code']):'';
        $age = isset($_POST['age'])?$instance->re_db_input($_POST['age']):'';
        $ofak_check = isset($_POST['ofak_check'])?$instance->re_db_input($_POST['ofak_check']):'';
        $fincen_check = isset($_POST['fincen_check'])?$instance->re_db_input($_POST['fincen_check']):'';
        $telephone = isset($_POST['telephone'])?$instance->re_db_input($_POST['telephone']):'';
        $citizenship = isset($_POST['citizenship'])?$instance->re_db_input($_POST['citizenship']):'';
        $contact_status = isset($_POST['contact_status'])?$instance->re_db_input($_POST['contact_status']):'';
        $birth_date = isset($_POST['birth_date'])?$instance->re_db_input($_POST['birth_date']):'';
        $date_established = isset($_POST['date_established'])?$instance->re_db_input($_POST['date_established']):'';
        $open_date = isset($_POST['open_date'])?$instance->re_db_input($_POST['open_date']):'';
        $naf_date = isset($_POST['naf_date'])?$instance->re_db_input($_POST['naf_date']):'';
        $last_contacted = isset($_POST['last_contacted'])?$instance->re_db_input($_POST['last_contacted']):'';
        //print_r($_POST);exit;
        $return = $instance->insert_update($_POST);
        
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
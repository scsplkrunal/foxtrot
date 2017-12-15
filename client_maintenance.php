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
    $date_established = '';
    $contact_status = '';
    $birth_date = '';
    $open_date = '';
    $naf_date = '';
    $last_contacted = '';
    $search_text = '';
    
    $sponsor_company = '';
    
    //employment variable
    
    $occupation = '';
    $employer = '';
    $address_employement = '';
    $position = '';
    $telephone_employment = '';
    $security_related_firm = '';
    $finra_affiliation = '';
    $spouse_name = '';
    $spouse_ssn = '';
    $dependents = '';
    $salutation = '';
    $options = '';
    $other = '';
    $number = '';
    $expiration = '';
    $state_employe = '';
    $date_verified = '';
    
    //account variable
    
    $account_no = '';
    $sponsor_company = '';
    
    //suitability variables
    
    $income = '';
    $goal_horizone = '';
    $net_worth = '';
    $risk_tolerance = '';
    $annual_expenses = '';
    $liquidity_needs = '';
    $liquid_net_worth = '';
    $special_expenses = '';
    $per_of_portfolio = '';
    $timeframe_for_special_exp = '';
    $account_use = '';
    $signed_by = '';
    $sign_date = '';
    $tax_bracket = '';
    $tax_id = '';
    
    $instance = new client_maintenance();
    $instance_account_type = new account_master();
    $get_account_type = $instance_account_type->select_account_type();
    $get_state = $instance->select_state();
    $get_notes = $instance->select_notes();
    $instance_product = new product_maintenance();
    $get_sponsor = $instance_product->select_sponsor();
    $instance_client_suitability = new client_suitebility_master();
    $get_objectives = $instance_client_suitability->select_objective();
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
    $instance_broker = new broker_master();
    $get_broker = $instance_broker->select();
    
    if(isset($_POST['submit'])&& $_POST['submit']=='Save'){
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
        
        $return = $instance->insert_update($_POST);
        
        if($return===true){
            header("location:".CURRENT_PAGE."?action=".$action."&tab=account_no");exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['employment'])&& $_POST['employment']=='Save'){
        $id = isset($_POST['employment_id'])?$instance->re_db_input($_POST['employment_id']):0;
        $occupation = isset($_POST['occupation'])?$instance->re_db_input($_POST['occupation']):'';
        $employer = isset($_POST['employer'])?$instance->re_db_input($_POST['employer']):'';
        $address_employement = isset($_POST['address_employement'])?$instance->re_db_input($_POST['address_employement']):'';
        $position = isset($_POST['position'])?$instance->re_db_input($_POST['position']):'';
        $telephone_employment = isset($_POST['telephone_employment'])?$instance->re_db_input($_POST['telephone_employment']):'';
        $security_related_firm = isset($_POST['security_related_firm'])?$instance->re_db_input($_POST['security_related_firm']):'';
        $finra_affiliation = isset($_POST['finra_affiliation'])?$instance->re_db_input($_POST['finra_affiliation']):'';
        $spouse_name = isset($_POST['spouse_name'])?$instance->re_db_input($_POST['spouse_name']):'';
        $spouse_ssn = isset($_POST['spouse_ssn'])?$instance->re_db_input($_POST['spouse_ssn']):'';
        $dependents = isset($_POST['dependents'])?$instance->re_db_input($_POST['dependents']):'';
        $salutation = isset($_POST['salutation'])?$instance->re_db_input($_POST['salutation']):'';
        $options = isset($_POST['options'])?$instance->re_db_input($_POST['options']):'';
        $other = isset($_POST['other'])?$instance->re_db_input($_POST['other']):'';
        $number = isset($_POST['number'])?$instance->re_db_input($_POST['number']):'';
        $expiration = isset($_POST['expiration'])?$instance->re_db_input($_POST['expiration']):'';
        $state_employe = isset($_POST['state_employe'])?$instance->re_db_input($_POST['state_employe']):'';
        $date_verified = isset($_POST['date_verified'])?$instance->re_db_input($_POST['date_verified']):'';
        
        $return = $instance->insert_update_employment($_POST);
        
        if($return===true){
            header("location:".CURRENT_PAGE."?action=".$action."&tab=suitability");exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['account'])&& $_POST['account']=='Save'){
        $id = isset($_POST['account_id'])?$instance->re_db_input($_POST['account_id']):0;
        $account_no = isset($_POST['account_no'])?$instance->re_db_input($_POST['account_no']):array();
        $sponsor_company = isset($_POST['sponsor'])?$instance->re_db_input($_POST['sponsor']):array();
        
        $return = $instance->insert_update_account($_POST);
        
        if($return===true){
            header("location:".CURRENT_PAGE."?action=".$action."&tab=employment");exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['suitability'])&& $_POST['suitability']=='Save'){
        $id = isset($_POST['suitability_id'])?$instance->re_db_input($_POST['suitability_id']):0;
        $income = isset($_POST['income'])?$instance->re_db_input($_POST['income']):'';
        $goal_horizone = isset($_POST['goal_horizone'])?$instance->re_db_input($_POST['goal_horizone']):'';
        $net_worth = isset($_POST['net_worth'])?$instance->re_db_input($_POST['net_worth']):'';
        $risk_tolerance = isset($_POST['risk_tolerance'])?$instance->re_db_input($_POST['risk_tolerance']):'';
        $annual_expenses = isset($_POST['annual_expenses'])?$instance->re_db_input($_POST['annual_expenses']):'';
        $liquidity_needs = isset($_POST['liquidity_needs'])?$instance->re_db_input($_POST['liquidity_needs']):'';
        $liquid_net_worth = isset($_POST['liquid_net_worth'])?$instance->re_db_input($_POST['liquid_net_worth']):'';
        $special_expenses = isset($_POST['special_expenses'])?$instance->re_db_input($_POST['special_expenses']):'';
        $per_of_portfolio = isset($_POST['per_of_portfolio'])?$instance->re_db_input($_POST['per_of_portfolio']):'';
        $timeframe_for_special_exp = isset($_POST['timeframe_for_special_exp'])?$instance->re_db_input($_POST['timeframe_for_special_exp']):'';
        $account_use = isset($_POST['account_use'])?$instance->re_db_input($_POST['account_use']):'';
        $signed_by = isset($_POST['signed_by'])?$instance->re_db_input($_POST['signed_by']):'';
        $sign_date = isset($_POST['sign_date'])?$instance->re_db_input($_POST['sign_date']):'';
        $tax_bracket = isset($_POST['tax_bracket'])?$instance->re_db_input($_POST['tax_bracket']):'';
        $tax_id = isset($_POST['tax_id'])?$instance->re_db_input($_POST['tax_id']):'';
        
        $return = $instance->insert_update_suitability($_POST);
        
        if($return===true){
            header("location:".CURRENT_PAGE."?action=".$action."&tab=objectives");exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['objectives'])&& $_POST['objectives']=='Save'){
        
        
        $return = true;//$instance->//insert_update_suitability($_POST);
        
        if($return===true){
            header("location:".CURRENT_PAGE);exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['add_notes'])&& $_POST['add_notes']=='Add Notes'){
        
        $return = $instance->insert_update_client_notes($_POST);
        
        if($return===true){
            echo '1';exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
        echo $error;
        exit;
    }
    
    else if(isset($_POST['submit'])&&$_POST['submit']=='Search'){
        
       $search_text = isset($_POST['search_text'])?$instance->re_db_input($_POST['search_text']):''; 
       $return = $instance->search($search_text);
    }
    else if($action=='edit' && $id>0){
        $return = $instance->edit($id);//echo '<pre>';print_r($return);exit;
        $fname = isset($return['first_name'])?$instance->re_db_output($return['first_name']):'';
        $lname = isset($return['last_name'])?$instance->re_db_output($return['last_name']):'';
        $mi = isset($return['mi'])?$instance->re_db_output($return['mi']):'';
        $do_not_contact = isset($return['do_not_contact'])?$instance->re_db_output($return['do_not_contact']):'';
        $active = isset($return['active'])?$instance->re_db_output($return['active']):'';
        $ofac_check = isset($return['ofac_check'])?$instance->re_db_output($return['ofac_check']):'';
        $fincen_check = isset($return['fincen_check'])?$instance->re_db_output($return['fincen_check']):'';
        $long_name = isset($return['long_name'])?$instance->re_db_output($return['long_name']):'';
        $client_file_number = isset($return['client_file_number'])?$instance->re_db_output($return['client_file_number']):'';
        $clearing_account = isset($return['clearing_account'])?$instance->re_db_output($return['clearing_account']):'';
        $client_ssn = isset($return['client_ssn'])?$instance->re_db_output($return['client_ssn']):'';
        $household = isset($return['house_hold'])?$instance->re_db_output($return['house_hold']):'';
        $split_broker = isset($return['split_broker'])?$instance->re_db_output($return['split_broker']):'';
        $split_rate = isset($return['split_rate'])?$instance->re_db_output($return['split_rate']):'';
        $address1 = isset($return['address1'])?$instance->re_db_output($return['address1']):'';
        $address2 = isset($return['address2'])?$instance->re_db_output($return['address2']):'';
        $city = isset($return['city'])?$instance->re_db_output($return['city']):'';
        $state = isset($return['state'])?$instance->re_db_output($return['state']):'';
        $zip_code = isset($return['zip_code'])?$instance->re_db_output($return['zip_code']):'';
        $citizenship = isset($return['citizenship'])?$instance->re_db_output($return['citizenship']):'';
        $birth_date = isset($return['birth_date'])?$instance->re_db_output($return['birth_date']):'';
        $age = isset($return['age'])?$instance->re_db_output($return['age']):'';
        $date_established = isset($return['date_established'])?$instance->re_db_output($return['date_established']):'';
        $open_date = isset($return['open_date'])?$instance->re_db_output($return['open_date']):'';
        $naf_date = isset($return['naf_date'])?$instance->re_db_output($return['naf_date']):'';
        $last_contacted = isset($return['last_contacted'])?$instance->re_db_output($return['last_contacted']):'';
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
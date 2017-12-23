<?php
	require_once("include/config.php");
	require_once(DIR_FS."islogin.php");
	
    $error = '';
    $return = array();
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
    $sponsor_company = '';
    
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    
    $instance = new broker_master();
    $get_state  = $instance->select_state();
    $get_state_new = $instance->select_state_new();
    $get_register=$instance->select_register();
    $get_sponsor = $instance->select_sponsor();
    $select_broker= $instance->select();
    $select_percentage= $instance->select_percentage();
    
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
        
        $home_general = isset($_POST['home_general'])?$instance->re_db_input($_POST['home_general']):'';
		$address1_general = isset($_POST['address1_general'])?$instance->re_db_input($_POST['address1_general']):'';
		$address2_general = isset($_POST['address2_general'])?$instance->re_db_input($_POST['address2_general']):'';
		$city_general = isset($_POST['city_general'])?$instance->re_db_input($_POST['city_general']):'';
		$state_general = isset($_POST['state_general'])?$instance->re_db_input($_POST['state_general']):'';
		$zip_code_general = isset($_POST['zip_code_general'])?$instance->re_db_input($_POST['zip_code_general']):'';
        $telephone_general = isset($_POST['telephone_general'])?$instance->re_db_input($_POST['telephone_general']):'';
        $cell_general = isset($_POST['cell_general'])?$instance->re_db_input($_POST['cell_general']):'';
		$fax_general = isset($_POST['fax_general'])?$instance->re_db_input($_POST['fax_general']):'';
        $gender_general = isset($_POST['gender_general'])?$instance->re_db_input($_POST['gender_general']):'';
		$status_general = isset($_POST['status_general'])?$instance->re_db_input($_POST['status_general']):'';
		$spouse_general = isset($_POST['spouse_general'])?$instance->re_db_input($_POST['spouse_general']):'';
        $children_general = isset($_POST['children_general'])?$instance->re_db_input($_POST['children_general']):'';
		$email1_general = isset($_POST['email1_general'])?$instance->re_db_input($_POST['email1_general']):'';
		$email2_general = isset($_POST['email2_general'])?$instance->re_db_input($_POST['email2_general']):'';
		$web_id_general = isset($_POST['web_id_general'])?$instance->re_db_input($_POST['web_id_general']):'';
		$web_password_general = isset($_POST['web_password_general'])?$instance->re_db_input($_POST['web_password_general']):'';
		$dob_general = isset($_POST['dob_general'])?$instance->re_db_input($_POST['dob_general']):'';
		$prospect_date_general = isset($_POST['prospect_date_general'])?$instance->re_db_input($_POST['prospect_date_general']):'';
		$reassign_broker_general = isset($_POST['reassign_broker_general'])?$instance->re_db_input($_POST['reassign_broker_general']):'';
		$u4_general = isset($_POST['u4_general'])?$instance->re_db_input($_POST['u4_general']):'';
        $u5_general = isset($_POST['u5_general'])?$instance->re_db_input($_POST['u5_general']):'';
		$dba_name_general = isset($_POST['dba_name_general'])?$instance->re_db_input($_POST['dba_name_general']):'';
		$eft_info_general = isset($_POST['eft_info_general'])?$instance->re_db_input($_POST['eft_info_general']):'';
        $start_date_general = isset($_POST['start_date_general'])?$instance->re_db_input($_POST['start_date_general']):'';
		$transaction_type_general = isset($_POST['transaction_type_general'])?$instance->re_db_input($_POST['transaction_type_general']):'';
		$routing_general = isset($_POST['routing_general'])?$instance->re_db_input($_POST['routing_general']):'';
		$account_no_general = isset($_POST['account_no_general'])?$instance->re_db_input($_POST['account_no_general']):'';
		$summarize_trailers_general = isset($_POST['summarize_trailers_general'])?$instance->re_db_input($_POST['summarize_trailers_general']):0;
		$summarize_direct_imported_trades = isset($_POST['summarize_direct_imported_trades'])?$instance->re_db_input($_POST['summarize_direct_imported_trades']):0;
		$from_date_general = isset($_POST['from_date_general'])?$instance->re_db_input($_POST['from_date_general']):'';
		$to_date_general = isset($_POST['to_date_general'])?$instance->re_db_input($_POST['to_date_general']):'';
		$cfp_general = isset($_POST['cfp_general'])?$instance->re_db_input($_POST['cfp_general']):0;
        $chfp_general = isset($_POST['chfp_general'])?$instance->re_db_input($_POST['chfp_general']):0;
		$cpa_general = isset($_POST['cpa_general'])?$instance->re_db_input($_POST['cpa_general']):0;
		$clu_general = isset($_POST['clu_general'])?$instance->re_db_input($_POST['clu_general']):0;
        $cfa_general = isset($_POST['cfa_general'])?$instance->re_db_input($_POST['cfa_general']):0;
        $ria_general = isset($_POST['ria_general'])?$instance->re_db_input($_POST['ria_general']):0;
		$insurance_general = isset($_POST['insurance_general'])?$instance->re_db_input($_POST['insurance_general']):0;//echo '<pre>';print_r($_POST);exit;
    
        
        $return = $instance->insert_update($_POST);
        
        $return = $instance->insert_update_general($_POST);
        
        if($return===true){
            if($action == 'edit')
            {
                header("location:".CURRENT_PAGE."?action=".$action."&id=".$id."&tab=payouts");exit;
            }
            else
            {
                header("location:".CURRENT_PAGE."?action=".$action."&tab=payouts");exit;
            }
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['payout'])&& $_POST['payout']=='Save'){
        echo '<pre>';print_r($_POST);exit;
        $return = $instance->insert_update_licences($_POST);   
        if($return===true){
            if($action == 'edit')
            {
                header("location:".CURRENT_PAGE."?action=".$action."&id=".$id."&tab=licences&sub_tab=insurance");exit;
            }
            else
            {
                header("location:".CURRENT_PAGE."?action=".$action."&tab=licences&sub_tab=insurance");exit;
            }
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
     else if(isset($_POST['securities'])&& $_POST['securities']=='Save'){
        $return = $instance->insert_update_licences($_POST);   
        if($return===true){
            if($action == 'edit')
            {
                header("location:".CURRENT_PAGE."?action=".$action."&id=".$id."&tab=licences&sub_tab=insurance");exit;
            }
            else
            {
                header("location:".CURRENT_PAGE."?action=".$action."&tab=licences&sub_tab=insurance");exit;
            }
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['insurance'])&& $_POST['insurance']=='Save'){
        $return = $instance->insert_update_licences1($_POST);   
        if($return===true){
            if($action == 'edit')
            {
                header("location:".CURRENT_PAGE."?action=".$action."&id=".$id."&tab=licences&sub_tab=ria");exit;
            }
            else
            {
                header("location:".CURRENT_PAGE."?action=".$action."&tab=licences&sub_tab=ria");exit;
            }
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['ria'])&& $_POST['ria']=='Save'){
        $return = $instance->insert_update_licences2($_POST);   
        if($return===true){
            if($action == 'edit')
            {
                header("location:".CURRENT_PAGE."?action=".$action."&id=".$id."&tab=registers");exit;
            }
            else
            {
                header("location:".CURRENT_PAGE."?action=".$action."&tab=registers");exit;
            }
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['register'])&& $_POST['register']=='Save'){
        
            $return = $instance->insert_update_register($_POST); 
            if($return===true){
            if($action == 'edit')
            {
                header("location:".CURRENT_PAGE."?action=".$action."&id=".$id."&tab=required_docs");exit;
            }
            else
            {
                header("location:".CURRENT_PAGE."?action=".$action."&tab=required_docs");exit;
            }
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
     else if(isset($_POST['req_doc'])&& $_POST['req_doc']=='Save'){
             //echo '<pre>';print_r($_POST);exit;
             $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
             
            $return = $instance->insert_update_req_doc($instance->reArrayFiles($_POST['data']),$id); 
            if($return===true){
            if($action == 'edit')
            {
                header("location:".CURRENT_PAGE."?action=".$action."&id=".$id."&tab=required_docs");exit;
            }
            else
            {
                header("location:".CURRENT_PAGE."?action=".$action."&tab=required_docs");exit;
            }
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        } 
    }
    else if(isset($_POST['charges'])&& $_POST['charges']=='Save'){
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $return = $instance->insert_update_charges($_POST);
        
        if($return===true){
            if($action == 'edit')
            {
                header("location:".CURRENT_PAGE."?action=".$action."&id=".$id."&tab=licences");exit;
            }
            else
            {
                header("location:".CURRENT_PAGE."?action=".$action."&tab=licences");exit;
            }
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if($action=='edit' && $id>0){
        $return = $instance->edit($id);
        $edit_general = $instance->edit_general($id);
        $edit_licences_securities = $instance->edit_licences_securities($id);
        $edit_licences_ria = $instance->edit_licences_ria($id);
        $edit_licences_insurance = $instance->edit_licences_insurance($id);
        $edit_registers = $instance->edit_registers($id);
        $edit_required_docs = $instance->edit_required_docs($id);
        
        $_SESSION['last_insert_id']=$id;
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
        
        $home = $instance->re_db_output($edit_general['home/business']);
        $address1 = $instance->re_db_output($edit_general['address1']);
        $address2 = $instance->re_db_output($edit_general['address2']);
        $city = $instance->re_db_output($edit_general['city']);
        $state_id = $instance->re_db_output($edit_general['state_id']);
        $zip_code = $instance->re_db_output($edit_general['zip_code']);
        $telephone = $instance->re_db_output($edit_general['telephone']);
        $cell = $instance->re_db_output($edit_general['cell']);
        $fax = $instance->re_db_output($edit_general['fax']);
        $gender = $instance->re_db_output($edit_general['gender']);
        $marital_status = $instance->re_db_output($edit_general['marital_status']);
        $spouse = $instance->re_db_output($edit_general['spouse']);
        $children = $instance->re_db_output($edit_general['children']);
        $email1 = $instance->re_db_output($edit_general['email1']);
        $email2 = $instance->re_db_output($edit_general['email2']);
        $web_id = $instance->re_db_output($edit_general['web_id']);
        $web_password = $instance->re_db_output($edit_general['web_password']);
        $dob = $instance->re_db_output($edit_general['dob']);
        $prospect_date = $instance->re_db_output($edit_general['prospect_date']);
        $reassign_broker = $instance->re_db_output($edit_general['reassign_broker']);
        $u4 = $instance->re_db_output($edit_general['u4']);
        $u5 = $instance->re_db_output($edit_general['u5']);
        $dba_name = $instance->re_db_output($edit_general['dba_name']);
        $eft_information = $instance->re_db_output($edit_general['eft_information']);
        $start_date = $instance->re_db_output($edit_general['start_date']);
        $transaction_type = $instance->re_db_output($edit_general['transaction_type']);  
        $routing = $instance->re_db_output($edit_general['routing']);
        $account_no = $instance->re_db_output($edit_general['account_no']);
        $cfp = $instance->re_db_output($edit_general['cfp']);
        $chfp = $instance->re_db_output($edit_general['chfp']);
        $cpa = $instance->re_db_output($edit_general['cpa']);
        $clu = $instance->re_db_output($edit_general['clu']);
        $cfa = $instance->re_db_output($edit_general['cfa']);
        $ria = $instance->re_db_output($edit_general['ria']);  
        $insurance = $instance->re_db_output($edit_general['insurance']); 
        
       
        //echo '<pre>';print_r($edit_licences_securities);exit;
           
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
        
        $_SESSION['last_insert_id']='';
        $return = $instance->select();
        
    }
    
	$content = "manage_broker";
	require_once(DIR_WS_TEMPLATES."main_page.tpl.php");
?>
<?php
    require_once("include/config.php");
    
    $search_text = '';
    $name = '';
    $broker = '';
    $b_status = '';
    $contact = '';
    $osj = '';
    $non_registered = '';
    $finra_fee = '';
    $business_address1 = '';
    $business_address2 = '';
    $business_city = '';
    $business_state = '';
    $business_zipcode = '';
    $mailing_address1 = '';
    $mailing_address2 = '';
    $mailing_city = '';
    $mailing_state = '';
    $mailing_zipcode = '';
    $email = '';
    $website = '';
    $phone = '';
    $facsimile = '';
    $date_established = '';
    $date_terminated = '';
    $finra_start_date = '';
    $finra_end_date = '';
    $last_audit_date = '';

    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    
    
    $instance = new branch_maintenance();
    $get_state = $instance->select_state();
    $instance_broker = new broker_master();
    $get_broker = $instance_broker->select();
    
    if(isset($_POST['submit'])&& $_POST['submit']=='Save'){
        
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $name = isset($_POST['branch_name'])?$instance->re_db_input($_POST['branch_name']):'';
        $broker = isset($_POST['manager'])?$instance->re_db_input($_POST['manager']):'';
        $b_status = isset($_POST['status'])?$instance->re_db_input($_POST['status']):'';
        $contact = isset($_POST['contact'])?$instance->re_db_input($_POST['contact']):'';
        $osj = isset($_POST['osj'])?$instance->re_db_input($_POST['osj']):'';
        $non_registered = isset($_POST['non_registered'])?$instance->re_db_input($_POST['non_registered']):'';
        $finra_fee = isset($_POST['finra_fee'])?$instance->re_db_input($_POST['finra_fee']):'';
        $business_address1 = isset($_POST['business_address1'])?$instance->re_db_input($_POST['business_address1']):'';
        $business_address2 = isset($_POST['business_address2'])?$instance->re_db_input($_POST['business_address2']):'';
        $business_city = isset($_POST['business_city'])?$instance->re_db_input($_POST['business_city']):'';
        $business_state = isset($_POST['business_state'])?$instance->re_db_input($_POST['business_state']):'';
        $business_zipcode = isset($_POST['business_zipcode'])?$instance->re_db_input($_POST['business_zipcode']):'';
        $mailing_address1 = isset($_POST['mailing_address1'])?$instance->re_db_input($_POST['mailing_address1']):'';
        $mailing_address2 = isset($_POST['mailing_address2'])?$instance->re_db_input($_POST['mailing_address2']):'';
        $mailing_city = isset($_POST['mailing_city'])?$instance->re_db_input($_POST['mailing_city']):'';
        $mailing_state = isset($_POST['mailing_state'])?$instance->re_db_input($_POST['mailing_state']):'';
        $mailing_zipcode = isset($_POST['mailing_zipcode'])?$instance->re_db_input($_POST['mailing_zipcode']):'';
        $email = isset($_POST['email'])?$instance->re_db_input($_POST['email']):'';
        $website = isset($_POST['website'])?$instance->re_db_input($_POST['website']):'';
        $phone = isset($_POST['phone'])?$instance->re_db_input($_POST['phone']):'';
        $facsimile = isset($_POST['facsimile'])?$instance->re_db_input($_POST['facsimile']):'';
        $date_established = isset($_POST['date_established'])?$instance->re_db_input($_POST['date_established']):'';
        $date_terminated = isset($_POST['date_terminated'])?$instance->re_db_input($_POST['date_terminated']):'';
        $finra_start_date = isset($_POST['finra_start_date'])?$instance->re_db_input($_POST['finra_start_date']):'';
        $finra_end_date = isset($_POST['finra_end_date'])?$instance->re_db_input($_POST['finra_end_date']):'';
        $last_audit_date = isset($_POST['last_audit_date'])?$instance->re_db_input($_POST['last_audit_date']):'';
        
        $return = $instance->insert_update($_POST);
        
        if($return===true){
            header("location:".CURRENT_PAGE.'?action=view');exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if($action=='edit' && $id>0){
        $return = $instance->edit($id);
        $id = isset($return['id'])?$instance->re_db_output($return['id']):0;
        $name = isset($return['name'])?$instance->re_db_output($return['name']):'';
        $broker = isset($return['broker'])?$instance->re_db_output($return['broker']):'';
        $b_status = isset($return['b_status'])?$instance->re_db_output($return['b_status']):'';
        $contact = isset($return['contact'])?$instance->re_db_output($return['contact']):'';
        $osj = isset($return['osj'])?$instance->re_db_output($return['osj']):'';
        $non_registered = isset($return['non_registered'])?$instance->re_db_output($return['non_registered']):'';
        $finra_fee = isset($return['finra_fee'])?$instance->re_db_output($return['finra_fee']):'';
        $business_address1 = isset($return['business_address1'])?$instance->re_db_output($return['business_address1']):'';
        $business_address2 = isset($return['business_address2'])?$instance->re_db_output($return['business_address2']):'';
        $business_city = isset($return['business_city'])?$instance->re_db_output($return['business_city']):'';
        $business_state = isset($return['business_state'])?$instance->re_db_output($return['business_state']):'';
        $business_zipcode = isset($return['business_zipcode'])?$instance->re_db_output($return['business_zipcode']):'';
        $mailing_address1 = isset($return['mailing_address1'])?$instance->re_db_output($return['mailing_address1']):'';
        $mailing_address2 = isset($return['mailing_address2'])?$instance->re_db_output($return['mailing_address2']):'';
        $mailing_city = isset($return['mailing_city'])?$instance->re_db_output($return['mailing_city']):'';
        $mailing_state = isset($return['mailing_state'])?$instance->re_db_output($return['mailing_state']):'';
        $mailing_zipcode = isset($return['mailing_zipcode'])?$instance->re_db_output($return['mailing_zipcode']):'';
        $email = isset($return['email'])?$instance->re_db_output($return['email']):'';
        $website = isset($return['website'])?$instance->re_db_output($return['website']):'';
        $phone = isset($return['phone'])?$instance->re_db_output($return['phone']):'';
        $facsimile = isset($return['facsimile'])?$instance->re_db_output($return['facsimile']):'';
        $date_established = isset($return['date_established'])?$instance->re_db_output($return['date_established']):'';
        $date_terminated = isset($return['date_terminated'])?$instance->re_db_output($return['date_terminated']):'';
        $finra_start_date = isset($return['finra_start_date'])?$instance->re_db_output($return['finra_start_date']):'';
        $finra_end_date = isset($return['finra_end_date'])?$instance->re_db_output($return['finra_end_date']):'';
        $last_audit_date = isset($return['last_audit_date'])?$instance->re_db_output($return['last_audit_date']):'';
    }
    else if(isset($_GET['send'])&&$_GET['send']=='previous' && isset($_GET['id'])&&$_GET['id']>0 && $_GET['id']!='')
    {
        $id = $instance->re_db_input($_GET['id']);
        
        $return = $instance->get_previous_branch($id);
            
        if($return!=false){
            $id=$return['id'];
            header("location:".CURRENT_PAGE."?action=edit&id=".$id."");exit;
        }
        else{
            header("location:".CURRENT_PAGE."?action=edit&id=".$id."");exit;
        }
        
    }
    else if(isset($_GET['send'])&&$_GET['send']=='next' && isset($_GET['id'])&&$_GET['id']>0 && $_GET['id']!='')
    {
        $id = $instance->re_db_input($_GET['id']);
        
        $return = $instance->get_next_branch($id);
            
        if($return!=false){
            $id=$return['id'];
            header("location:".CURRENT_PAGE."?action=edit&id=".$id."");exit;
        }
        else{
            header("location:".CURRENT_PAGE."?action=edit&id=".$id."");exit;
        }
        
    }    
    else if(isset($_GET['action'])&&$_GET['action']=='delete'&&isset($_GET['id'])&&$_GET['id']>0)
    {
        $id = $instance->re_db_input($_GET['id']);
        $return = $instance->delete($id);
        if($return==true){
            header('location:'.CURRENT_PAGE.'?action=view');exit;
        }
        else{
            header('location:'.CURRENT_PAGE.'?action=view');exit;
        }
    }
    else if(isset($_GET['action'])&&$_GET['action']=='status'&&isset($_GET['id'])&&$_GET['id']>0&&isset($_GET['status'])&&($_GET['status']==0 || $_GET['status']==1))
    {
        $id = $instance->re_db_input($_GET['id']);
        $status = $instance->re_db_input($_GET['status']);
        $return = $instance->status($id,$status);
        if($return==true){
            header('location:'.CURRENT_PAGE.'?action=view');exit;
        }
        else{
            header('location:'.CURRENT_PAGE.'?action=view');exit;
        }
    }  
    else if(isset($_POST['search'])&&$_POST['search']=='Search'){
       $search_text = isset($_POST['search_text'])?$instance->re_db_input($_POST['search_text']):''; 
       $return = $instance->search($search_text);
    }
    else if($action=='view'){
        
        $return = $instance->select();
        
    }
    $content = "branch_maintenance";
    include(DIR_WS_TEMPLATES."main_page.tpl.php");

?>
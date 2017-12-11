<?php
    require_once("include/config.php");
    $error = '';
    $return = array();
    $search_text = '';
    $category = '';
    $name = '';
    $sponsor = '';
    $ticker_symbol = '';
    $cusip = '';
    $security = '';
    $receive = '';
    $income = '';
    $networth = '';
    $networthonly = '';
    $minimum_investment = '';
    $minimum_offer = '';
    $maximum_offer = '';
    $objective = '';
    $non_commissionable = '';
    $class_type = '';
    $fund_code = '';
    $sweep_fee = '';
    $threshold = '';
    $rate = '';
    $investment_banking_type = '';
    $ria_specific_type = '';
    $based = '';
    $fee_rate = '';
    $st_bo = '';
    $m_date = '';
    $type = '';
    $var = '';
    $reg_type = '';
    $search_text_product = '';
    $search_product_category = '';
    
    $search_text_sponsor = '';
    $sponser_name = '';
    $saddress1 = '';
    $saddress2 = '';
    $scity = '';
    $sstate = '';
    $szip_code = '';
    $semail = '';
    $swebsite = '';
    $sgeneral_contact = '';
    $sgeneral_phone = '';
    $soperations_contact = '';
    $soperations_phone = '';
    $sdst_system_id = '';
    $sdst_mgmt_code = '';
    $sdst_import = '';
    $sdazl_code = '';
    $sdazl_import = '';
    $sdtcc_nscc = '';
    $sclr_firm = '';
    
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view_product';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    $sponsor_id = isset($_GET['sponsor_id'])&&$_GET['sponsor_id']!=''?$dbins->re_db_input($_GET['sponsor_id']):0;
    $category = isset($_GET['category'])&&$_GET['category']!=''?$dbins->re_db_input($_GET['category']):1;
    
    $instance = new product_maintenance();
    $product_category = $instance->select_category();
    $get_sponsor = $instance->select_sponsor();
    $get_state = $instance->select_state();
    
    if(isset($_POST['next'])&& $_POST['next']=='Next'){
        
        $category = isset($_POST['set_category'])?$instance->re_db_input($_POST['set_category']):'';
        
        if($category!=''){
            header("location:".CURRENT_PAGE.'?action=add_product&category='.$category.'');exit;
        }
    }
    else if(isset($_POST['product'])&& $_POST['product']=='Save'){
        
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $category = isset($_POST['product_category'])?$instance->re_db_input($_POST['product_category']):'';
        $name = isset($_POST['name'])?$instance->re_db_input($_POST['name']):'';
        $sponsor = isset($_POST['sponsor'])?$instance->re_db_input($_POST['sponsor']):'';
        $ticker_symbol = isset($_POST['ticker_symbol'])?$instance->re_db_input($_POST['ticker_symbol']):'';
        $cusip = isset($_POST['cusip'])?$instance->re_db_input($_POST['cusip']):'';
        $security = isset($_POST['security'])?$instance->re_db_input($_POST['security']):'';
        $receive = isset($_POST['allowable_receivable'])?$instance->re_db_input($_POST['allowable_receivable']):'';
        $income = isset($_POST['income'])?$instance->re_db_input($_POST['income']):'';
        $networth = isset($_POST['networth'])?$instance->re_db_input($_POST['networth']):'';
        $networthonly = isset($_POST['networthonly'])?$instance->re_db_input($_POST['networthonly']):'';
        $minimum_investment = isset($_POST['minimum_investment'])?$instance->re_db_input($_POST['minimum_investment']):'';
        $minimum_offer = isset($_POST['minimum_offer'])?$instance->re_db_input($_POST['minimum_offer']):'';
        $maximum_offer = isset($_POST['maximum_offer'])?$instance->re_db_input($_POST['maximum_offer']):'';
        $objective = isset($_POST['objectives'])?$instance->re_db_input($_POST['objectives']):'';
        $non_commissionable = isset($_POST['non_commissionable'])?$instance->re_db_input($_POST['non_commissionable']):'';
        $class_type = isset($_POST['class_type'])?$instance->re_db_input($_POST['class_type']):'';
        $fund_code = isset($_POST['fund_code'])?$instance->re_db_input($_POST['fund_code']):'';
        $sweep_fee = isset($_POST['sweep_fee'])?$instance->re_db_input($_POST['sweep_fee']):'';
        $threshold = isset($_POST['threshold'])?$instance->re_db_input($_POST['threshold']):'';
        $rate = isset($_POST['rate'])?$instance->re_db_input($_POST['rate']):'';
        $investment_banking_type = isset($_POST['investment_banking_type'])?$instance->re_db_input($_POST['investment_banking_type']):'';
        $ria_specific_type = isset($_POST['ria_specific_type'])?$instance->re_db_input($_POST['ria_specific_type']):'';
        $based = isset($_POST['based_type'])?$instance->re_db_input($_POST['based_type']):'';
        $fee_rate = isset($_POST['fee_rate'])?$instance->re_db_input($_POST['fee_rate']):'';
        $st_bo = isset($_POST['stocks_bonds'])?$instance->re_db_input($_POST['stocks_bonds']):'';
        $m_date = isset($_POST['maturity_date'])?$instance->re_db_input($_POST['maturity_date']):'';
        $type = isset($_POST['type'])?$instance->re_db_input($_POST['type']):'';
        $var = isset($_POST['variable_annuities'])?$instance->re_db_input($_POST['variable_annuities']):'';
        $reg_type = isset($_POST['registration_type'])?$instance->re_db_input($_POST['registration_type']):'';
        $return = $instance->insert_update($_POST);
        
        if($return===true){
            header("location:".CURRENT_PAGE.'?action=view_product');exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['sponser'])&& $_POST['sponser']=='Save'){
        
        $sponsor_id = isset($_POST['sponsor_id'])?$instance->re_db_input($_POST['sponsor_id']):0;
        $sponser_name = isset($_POST['sponser_name'])?$instance->re_db_input($_POST['sponser_name']):'';
        $saddress1 = isset($_POST['saddress1'])?$instance->re_db_input($_POST['saddress1']):'';
        $saddress2 = isset($_POST['saddress2'])?$instance->re_db_input($_POST['saddress2']):'';
        $scity = isset($_POST['scity'])?$instance->re_db_input($_POST['scity']):'';
        $sstate = isset($_POST['sstate'])?$instance->re_db_input($_POST['sstate']):'';
        $szip_code = isset($_POST['szip_code'])?$instance->re_db_input($_POST['szip_code']):'';
        $semail = isset($_POST['semail'])?$instance->re_db_input($_POST['semail']):'';
        $swebsite = isset($_POST['swebsite'])?$instance->re_db_input($_POST['swebsite']):'';
        $sgeneral_contact = isset($_POST['sgeneral_contact'])?$instance->re_db_input($_POST['sgeneral_contact']):'';
        $sgeneral_phone = isset($_POST['sgeneral_phone'])?$instance->re_db_input($_POST['sgeneral_phone']):'';
        $soperations_contact = isset($_POST['soperations_contact'])?$instance->re_db_input($_POST['soperations_contact']):'';
        $soperations_phone = isset($_POST['soperations_phone'])?$instance->re_db_input($_POST['soperations_phone']):'';
        $sdst_system_id = isset($_POST['sdst_system_id'])?$instance->re_db_input($_POST['sdst_system_id']):'';
        $sdst_mgmt_code = isset($_POST['sdst_mgmt_code'])?$instance->re_db_input($_POST['sdst_mgmt_code']):'';
        $sdst_import = isset($_POST['sdst_import'])?$instance->re_db_input($_POST['sdst_import']):'';
        $sdazl_code = isset($_POST['sdazl_code'])?$instance->re_db_input($_POST['sdazl_code']):'';
        $sdazl_import = isset($_POST['sdazl_import'])?$instance->re_db_input($_POST['sdazl_import']):'';
        $sdtcc_nscc = isset($_POST['sdtcc_nscc'])?$instance->re_db_input($_POST['sdtcc_nscc']):'';
        $sclr_firm = isset($_POST['sclr_firm'])?$instance->re_db_input($_POST['sclr_firm']):'';
        
        $return = $instance->insert_update_sponsor($_POST);
        
        if($return===true){
            header("location:".CURRENT_PAGE.'?action=view_sponsor');exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['submit']) && ($_POST['submit']=='Add Note' || $_POST['submit']=='Update Note')){
        $note_id = isset($_POST['note_id'])?$instance->re_db_input($_POST['note_id']):0;
        $note_date = isset($_POST['note_date'])?$instance->re_db_input($_POST['note_date']):'';
        $note_user = isset($_POST['note_user'])?$instance->re_db_input($_POST['note_user']):'';
        $product_note = isset($_POST['product_note'])?$instance->re_db_input($_POST['product_note']):'';
        $return = $instance->insert_update($_POST);
        if($return===true){
            echo '1';exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
        echo $error;
        exit;
        
    }
    else if($action=='edit_product' && $id>0 && $category !=''){
        $return = $instance->edit_product($id,$category);
        $id = isset($return['id'])?$instance->re_db_output($return['id']):0;
        $category = isset($return['category'])?$instance->re_db_output($return['category']):'';
        $name = isset($return['name'])?$instance->re_db_output($return['name']):'';
        $sponsor = isset($return['sponsor'])?$instance->re_db_output($return['sponsor']):'';
        $ticker_symbol = isset($return['ticker_symbol'])?$instance->re_db_output($return['ticker_symbol']):'';
        $cusip = isset($return['cusip'])?$instance->re_db_output($return['cusip']):'';
        $security = isset($return['security'])?$instance->re_db_output($return['security']):'';
        $receive = isset($return['receive'])?$instance->re_db_output($return['receive']):0;
        $income = isset($return['income'])?$instance->re_db_output($return['income']):'';
        $networth = isset($return['networth'])?$instance->re_db_output($return['networth']):'';
        $networthonly = isset($return['networthonly'])?$instance->re_db_output($return['networthonly']):'';
        $minimum_investment = isset($return['minimum_investment'])?$instance->re_db_output($return['minimum_investment']):'';
        $minimum_offer = isset($return['minimum_offer'])?$instance->re_db_output($return['minimum_offer']):'';
        $maximum_offer = isset($return['maximum_offer'])?$instance->re_db_output($return['maximum_offer']):'';
        $objective = isset($return['objective'])?$instance->re_db_output($return['objective']):'';
        $non_commissionable = isset($return['non_commissionable'])?$instance->re_db_output($return['non_commissionable']):0;
        $class_type = isset($return['class_type'])?$instance->re_db_output($return['class_type']):0;
        $fund_code = isset($return['fund_code'])?$instance->re_db_output($return['fund_code']):'';
        $sweep_fee = isset($return['sweep_fee'])?$instance->re_db_output($return['sweep_fee']):0;
        $threshold = isset($return['threshold'])?$instance->re_db_output($return['threshold']):'';
        $rate = isset($return['rate'])?$instance->re_db_output($return['rate']):'';
        $investment_banking_type = isset($return['ria_specific'])?$instance->re_db_output($return['ria_specific']):'';
        $ria_specific_type = isset($return['ria_specific_type'])?$instance->re_db_output($return['ria_specific_type']):'';
        $based = isset($return['based'])?$instance->re_db_output($return['based']):0;
        $fee_rate = isset($return['fee_rate'])?$instance->re_db_output($return['fee_rate']):'';
        $st_bo = isset($return['st_bo'])?$instance->re_db_output($return['st_bo']):0;
        $m_date = isset($return['m_date'])?$instance->re_db_output(date('m-d-Y',strtotime($return['m_date']))):'';
        $type = isset($return['type'])?$instance->re_db_output($return['type']):'';
        $var = isset($return['var'])?$instance->re_db_output($return['var']):0;
        $reg_type = isset($return['reg_type'])?$instance->re_db_output($return['reg_type']):'';
        
    }
    else if($action=='edit_sponsor' && $sponsor_id>0){
        $return = $instance->edit_sponsor($sponsor_id);
        $sponsor_id = isset($return['id'])?$instance->re_db_output($return['id']):0;
        $sponser_name = isset($return['name'])?$instance->re_db_output($return['name']):'';
        $saddress1 = isset($return['address1'])?$instance->re_db_output($return['address1']):'';
        $saddress2 = isset($return['address2'])?$instance->re_db_output($return['address2']):'';
        $scity = isset($return['city'])?$instance->re_db_output($return['city']):'';
        $sstate = isset($return['state'])?$instance->re_db_output($return['state']):'';
        $szip_code = isset($return['zip_code'])?$instance->re_db_output($return['zip_code']):'';
        $semail = isset($return['email'])?$instance->re_db_output($return['email']):'';
        $swebsite = isset($return['website'])?$instance->re_db_output($return['website']):'';
        $sgeneral_contact = isset($return['general_contact'])?$instance->re_db_output($return['general_contact']):'';
        $sgeneral_phone = isset($return['general_phone'])?$instance->re_db_output($return['general_phone']):'';
        $soperations_contact = isset($return['operations_contact'])?$instance->re_db_output($return['operations_contact']):'';
        $soperations_phone = isset($return['operations_phone'])?$instance->re_db_output($return['operations_phone']):'';
        $sdst_system_id = isset($return['dst_system_id'])?$instance->re_db_output($return['dst_system_id']):'';
        $sdst_mgmt_code = isset($return['dst_mgmt_code'])?$instance->re_db_output($return['dst_mgmt_code']):'';
        $sdst_import = isset($return['dst_importing'])?$instance->re_db_output($return['dst_importing']):0;
        $sdazl_code = isset($return['dazl_code'])?$instance->re_db_output($return['dazl_code']):'';
        $sdazl_import = isset($return['dazl_importing'])?$instance->re_db_output($return['dazl_importing']):0;
        $sdtcc_nscc = isset($return['dtcc_nscc_id'])?$instance->re_db_output($return['dtcc_nscc_id']):'';
        $sclr_firm = isset($return['clearing_firm_id'])?$instance->re_db_output($return['clearing_firm_id']):0;
        
        
    }
    else if(isset($_GET['action'])&&$_GET['action']=='product_delete' && $_GET['category']!='' &&isset($_GET['id'])&&$_GET['id']>0)
    {
        $id = $instance->re_db_input($_GET['id']);
        $category = $instance->re_db_input($_GET['category']);
        $return = $instance->product_delete($id,$category);
        if($return==true){
            header('location:'.CURRENT_PAGE);exit;
        }
        else{
            header('location:'.CURRENT_PAGE);exit;
        }
    }
    else if(isset($_GET['action'])&&$_GET['action']=='sponsor_delete'&&isset($_GET['sponsor_id'])&&$_GET['sponsor_id']>0)
    {
        $sponsor_id = $instance->re_db_input($_GET['sponsor_id']);
        $return = $instance->sponsor_delete($sponsor_id);
        if($return==true){
            header('location:'.CURRENT_PAGE.'?action=view_sponsor');exit;
        }
        else{
            header('location:'.CURRENT_PAGE.'?action=view_sponsor');exit;
        }
    }
    else if(isset($_GET['action'])&&$_GET['action']=='product_status'&&isset($_GET['id'])&&$_GET['id']>0&&isset($_GET['status'])&&($_GET['status']==0 || $_GET['status']==1))
    {
        $id = $instance->re_db_input($_GET['id']);
        $status = $instance->re_db_input($_GET['status']);
        $category = $instance->re_db_input($_GET['category']);
        $return = $instance->product_status($id,$status,$category);
        if($return==true){
            header('location:'.CURRENT_PAGE);exit;
        }
        else{
            header('location:'.CURRENT_PAGE);exit;
        }
    }
    else if(isset($_GET['action'])&&$_GET['action']=='sponsor_status'&&isset($_GET['sponsor_id'])&&$_GET['sponsor_id']>0&&isset($_GET['status'])&&($_GET['status']==0 || $_GET['status']==1))
    {
        $sponsor_id = $instance->re_db_input($_GET['sponsor_id']);
        $status = $instance->re_db_input($_GET['status']);
        $return = $instance->sponsor_status($sponsor_id,$status);
        if($return==true){
            header('location:'.CURRENT_PAGE.'?action=view_sponsor');exit;
        }
        else{
            header('location:'.CURRENT_PAGE.'?action=view_sponsor');exit;
        }
    }  
    else if(isset($_POST['search_sponsor'])&&$_POST['search_sponsor']=='Search'){
       $search_text_sponsor = isset($_POST['search_text_sponsor'])?$instance->re_db_input($_POST['search_text_sponsor']):''; 
       $return = $instance->search_sponsor($search_text_sponsor);
    }
    else if(isset($_POST['search_product'])&&$_POST['search_product']=='Search'){
        
       $search_text_product = isset($_POST['search_text_product'])?$instance->re_db_input($_POST['search_text_product']):''; 
       $search_product_category = isset($_POST['search_product_category'])?$instance->re_db_input($_POST['search_product_category']):'';
       $return = $instance->search_product($search_text_product,$search_product_category);
    }
    else if($action=='view_product'){
        
        $return = $instance->select_product_category($category);//echo'<pre>';print_r($return);exit;
        
    }
    else if($action=='view_sponsor'){
        
        $return = $instance->select_sponsor();
        
    }
    $content = "product_cate";
    include(DIR_WS_TEMPLATES."main_page.tpl.php");
?>
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
    $ria_specific = '';
    $ria_specific_type = '';
    $based = '';
    $fee_rate = '';
    $st_bo = '';
    $m_date = '';
    $type = '';
    $var = '';
    $reg_type = '';
    
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view_product';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    
    $instance = new product_maintenance();
    $product_category = $instance->select_category();
    $get_sponsor = $instance->select_sponsor();
    $get_state = $instance->select_state();
    
    if(isset($_POST['submit'])&& $_POST['submit']=='Save'){
        
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
        $objective = isset($_POST['objective'])?$instance->re_db_input($_POST['objective']):'';
        $non_commissionable = isset($_POST['non_commissionable'])?$instance->re_db_input($_POST['non_commissionable']):'';
        $class_type = isset($_POST['class_type'])?$instance->re_db_input($_POST['class_type']):'';
        $fund_code = isset($_POST['fund_code'])?$instance->re_db_input($_POST['fund_code']):'';
        $sweep_fee = isset($_POST['sweep_fee'])?$instance->re_db_input($_POST['sweep_fee']):'';
        $threshold = isset($_POST['threshold'])?$instance->re_db_input($_POST['threshold']):'';
        $rate = isset($_POST['rate'])?$instance->re_db_input($_POST['rate']):'';
        $ria_specific = isset($_POST['investment_banking_type'])?$instance->re_db_input($_POST['investment_banking_type']):'';
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
            header("location:".CURRENT_PAGE);exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    if(isset($_POST['sponser'])&& $_POST['sponser']=='Save'){
        
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
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
    else if($action=='edit_new_product' && $id>0){
        $return = $instance->edit($id);
        $id = isset($return['id'])?$instance->re_db_output($return['id']):0;
        $category = isset($return['product_category'])?$instance->re_db_output($return['product_category']):'';
        $name = isset($return['name'])?$instance->re_db_output($return['name']):'';
        $sponsor = isset($return['sponsor'])?$instance->re_db_output($return['sponsor']):'';
        $ticker_symbol = isset($return['ticker_symbol'])?$instance->re_db_output($return['ticker_symbol']):'';
        $cusip = isset($return['cusip'])?$instance->re_db_output($return['cusip']):'';
        $security = isset($return['security'])?$instance->re_db_output($return['security']):'';
        $receive = isset($return['allowable_receivable'])?$instance->re_db_output($return['allowable_receivable']):'';
        $income = isset($return['income'])?$instance->re_db_output($return['income']):'';
        $networth = isset($return['networth'])?$instance->re_db_output($return['networth']):'';
        $networthonly = isset($return['networthonly'])?$instance->re_db_output($return['networthonly']):'';
        $minimum_investment = isset($return['minimum_investment'])?$instance->re_db_output($return['minimum_investment']):'';
        $minimum_offer = isset($return['minimum_offer'])?$instance->re_db_output($return['minimum_offer']):'';
        $maximum_offer = isset($return['maximum_offer'])?$instance->re_db_output($return['maximum_offer']):'';
        $objective = isset($return['objective'])?$instance->re_db_output($return['objective']):'';
        $non_commissionable = isset($return['non_commissionable'])?$instance->re_db_output($return['non_commissionable']):'';
        $class_type = isset($return['class_type'])?$instance->re_db_output($return['class_type']):'';
        $fund_code = isset($return['fund_code'])?$instance->re_db_output($return['fund_code']):'';
        $sweep_fee = isset($return['sweep_fee'])?$instance->re_db_output($return['sweep_fee']):'';
        $threshold = isset($return['threshold'])?$instance->re_db_output($return['threshold']):'';
        $rate = isset($return['rate'])?$instance->re_db_output($return['rate']):'';
        $ria_specific = isset($return['investment_banking_type'])?$instance->re_db_output($return['investment_banking_type']):'';
        $ria_specific_type = isset($return['ria_specific_type'])?$instance->re_db_output($return['ria_specific_type']):'';
        $based = isset($return['based_type'])?$instance->re_db_output($return['based_type']):'';
        $fee_rate = isset($return['fee_rate'])?$instance->re_db_output($return['fee_rate']):'';
        $st_bo = isset($return['stocks_bonds'])?$instance->re_db_output($return['stocks_bonds']):'';
        $m_date = isset($return['maturity_date'])?$instance->re_db_output($return['maturity_date']):'';
        $type = isset($return['type'])?$instance->re_db_output($return['type']):'';
        $var = isset($return['variable_annuities'])?$instance->re_db_output($return['variable_annuities']):'';
        $reg_type = isset($return['registration_type'])?$instance->re_db_output($return['registration_type']):'';
        
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
    else if($action=='view_product'){
        
        $return = $instance->select_product_category();
        
    }
    else if($action=='view_sponsor'){
        
        $return = $instance->select_sponsor();
        
    }
    $content = "product_cate";
    include(DIR_WS_TEMPLATES."main_page.tpl.php");
?>
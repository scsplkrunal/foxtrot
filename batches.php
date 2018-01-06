<?php

    require_once("include/config.php");
	require_once(DIR_FS."islogin.php");
	
    
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view_batches';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    
    $instance = new batches();
    $product_category = $instance->select_category();
    $get_sponsor = $instance->select_sponsor();
    
    if(isset($_POST['batches'])&& $_POST['batches']=='Save'){ 
        //echo '<pre>';print_r($_POST);exit();
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $pro_category = isset($_POST['pro_categoryx'])?$instance->re_db_input($_POST['pro_category']):'';
        $batch_number = isset($_POST['batch_number'])?$instance->re_db_input($_POST['batch_number']):'';
        $batch_desc = isset($_POST['batch_desc'])?$instance->re_db_input($_POST['batch_desc']):'';
        $sponsor = isset($_POST['sponsor'])?$instance->re_db_input($_POST['sponsor']):'';
        $batch_date = isset($_POST['batch_date'])?$instance->re_db_input($_POST['batch_date']):'';
        $deposit_date = isset($_POST['deposit_date'])?$instance->re_db_input($_POST['deposit_date']):'';
        $trade_start_date = isset($_POST['trade_start_date'])?$instance->re_db_input($_POST['trade_start_date']):'';
        $trade_end_date = isset($_POST['trade_end_date'])?$instance->re_db_input($_POST['trade_end_date']):'';
        $check_amount = isset($_POST['check_amount'])?$instance->re_db_input($_POST['check_amount']):'';
        $commission_amount = isset($_POST['commission_amount'])?$instance->re_db_input($_POST['commission_amount']):'';
        $split = isset($_POST['split'])?$instance->re_db_input($_POST['split']):'';
        $prompt_for_check_amount = isset($_POST['prompt_for_check_amount'])?$instance->re_db_input($_POST['prompt_for_check_amount']):'';
        $posted_amounts = isset($_POST['posted_amounts'])?$instance->re_db_input($_POST['posted_amounts']):'';
        
        $return = $instance->insert_update($_POST);
        
        if($return===true){
            header("location:".CURRENT_PAGE."?action=view_batches");exit;
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
 
    }
    else if($action=='edit_batches' && $id>0){
        $return = $instance->edit_batches($id);
        
        //echo '<pre>';print_r($return);exit;
        $id = isset($return['id'])?$instance->re_db_output($return['id']):0;

        $pro_category = isset($return['pro_category'])?$instance->re_db_output($return['pro_category']):'';
        $batch_number = isset($return['batch_number'])?$instance->re_db_output($return['batch_number']):'';
        $batch_desc = isset($return['batch_desc'])?$instance->re_db_output($return['batch_desc']):'';
        $sponsor = isset($return['sponsor'])?$instance->re_db_output($return['sponsor']):'';
        $batch_date = isset($return['batch_date'])?$instance->re_db_output($return['batch_date']):'';
        $deposit_date = isset($return['deposit_date'])?$instance->re_db_output($return['deposit_date']):'';
        $trade_start_date = isset($return['trade_start_date'])?$instance->re_db_output($return['trade_start_date']):'';
        $trade_end_date = isset($return['trade_end_date'])?$instance->re_db_output($return['trade_end_date']):'';
        $check_amount = isset($return['check_amount'])?$instance->re_db_output($return['check_amount']):'';
        $commission_amount = isset($return['commission_amount'])?$instance->re_db_output($return['commission_amount']):'';
        $split = isset($return['split'])?$instance->re_db_output($return['split']):'';
        $prompt_for_check_amount = isset($return['prompt_for_check_amount'])?$instance->re_db_output($return['prompt_for_check_amount']):'';
        $posted_amounts = isset($return['posted_amounts'])?$instance->re_db_output($return['posted_amounts']):'';        
    }
    else if(isset($_GET['action'])&&$_GET['action']=='batches_delete'&&isset($_GET['id'])&&$_GET['id']>0)
    {
        $id = $instance->re_db_input($_GET['id']);
        $return = $instance->delete($id);
        if($return==true){
            header('location:'.CURRENT_PAGE.'?action=view_batches');exit;
        }
        else{
            header('location:'.CURRENT_PAGE.'?action=view_batches');exit;
        }
    }
    else if($action=='view_batches'){
        
        $return = $instance->select();//echo'<pre>';//print_r($return);exit;
        
    }
    $content = "batches";
	require_once(DIR_WS_TEMPLATES."main_page.tpl.php");

?>
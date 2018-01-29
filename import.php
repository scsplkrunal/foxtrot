<?php
    require_once("include/config.php");
    
    $action = isset($_GET['action'])&&$_GET['action']!=''?$dbins->re_db_input($_GET['action']):'view';
    $id = isset($_GET['id'])&&$_GET['id']!=''?$dbins->re_db_input($_GET['id']):0;
    $host_name = '';
    $user_name = '';
    $password = '';
    $confirm_password = '';
    $folder_location = '';
    $status = 1;
    
    $instance = new import();
    
    if(isset($_POST['submit'])&& $_POST['submit']=='Save'){
        $id = isset($_POST['id'])?$instance->re_db_input($_POST['id']):0;
        $host_name = isset($_POST['host_name'])?$instance->re_db_input($_POST['host_name']):'';
        $user_name = isset($_POST['user_name'])?$instance->re_db_input($_POST['user_name']):'';
        $password = isset($_POST['password'])?$instance->re_db_input($_POST['password']):'';
        $confirm_password = isset($_POST['confirm_password'])?$instance->re_db_input($_POST['confirm_password']):'';
        $folder_location = isset($_POST['folder_location'])?$instance->re_db_input($_POST['folder_location']):'';
        $status = isset($_POST['status'])?$instance->re_db_input($_POST['status']):'';
        
        $return = $instance->insert_update_ftp($_POST);   
        if($return===true){
            
            header("location:".CURRENT_PAGE."?tab=open_ftp");exit;
            
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if(isset($_POST['submit_files'])&& $_POST['submit_files']=='Fetch'){
       
        //$file_image = isset($_FILES['file_image'])?$_FILES['file_image']['name']:array();
        $return = $instance->insert_update_files();   
        if($return===true){
            
            header("location:".CURRENT_PAGE);exit;
            
        }
        else{
            $error = !isset($_SESSION['warning'])?$return:'';
        }
    }
    else if($action=='edit_ftp' && $id>0){
        $return = $instance->edit_ftp($id);
        $id = isset($return['id'])?$instance->re_db_output($return['id']):0;
        $host_name = isset($return['host_name'])?$instance->re_db_output($return['host_name']):'';
        $user_name = isset($return['user_name'])?$instance->re_db_output($return['user_name']):'';
        $password = isset($return['password'])?$instance->re_db_output($return['password']):'';
        $folder_location = isset($return['folder_location'])?$instance->re_db_output($return['folder_location']):'';
        $status = isset($return['status'])?$instance->re_db_output($return['status']):'';
    }
    else if(isset($action) && $action=='open_ftp')
    {
        header("location:".CURRENT_PAGE."?tab=open_ftp");exit;
    }
    else if(isset($_GET['tab']) && $_GET['tab'] =='open_ftp')
    {
        $return = $instance->select_ftp();
    }
    else if(isset($_GET['action'])&&$_GET['action']=='ftp_status'&&isset($_GET['id'])&&$_GET['id']>0&&isset($_GET['status'])&&($_GET['status']==0 || $_GET['status']==1))
    {
        $id = $instance->re_db_input($_GET['id']);
        $status = $instance->re_db_input($_GET['status']);
        $return = $instance->ftp_status($id,$status);
        if($return==true){
            header('location:'.CURRENT_PAGE."?tab=open_ftp");exit;
        }
        else{
            header('location:'.CURRENT_PAGE."?tab=open_ftp");exit;
        }
    }
    else if(isset($_GET['action'])&&$_GET['action']=='delete_ftp'&&isset($_GET['id'])&&$_GET['id']>0)
    {
        $id = $instance->re_db_input($_GET['id']);
        $return = $instance->ftp_delete($id);
        if($return==true){
            header('location:'.CURRENT_PAGE."?tab=open_ftp");exit;
        }
        else{
            header('location:'.CURRENT_PAGE."?tab=open_ftp");exit;
        }
    }  
    else if($action=='view'){
        
        $return = $instance->select_current_files();//echo '<pre>';print_r($return);exit;
        //print_r($return);exit;
    }
    
    
    $content = "import";
    include(DIR_WS_TEMPLATES."main_page.tpl.php");

?>
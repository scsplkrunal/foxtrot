<?php
    require_once("include/config.php");
    require_once(DIR_FS."islogin.php");
    
    $instance = new ofac_fincen();
    
    if(isset($_POST['import'])&& $_POST['import']=='OFAC System Scan'){
    
        $filename=$_FILES["file"]["tmp_name"];		
        $array = array();
        $get_array_data = array();
    	 if($_FILES["file"]["size"] > 0)
    	 {
    	  	$file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
             {
                $array[]=array("id_no"=>$getData[0],"sdn_name"=> $getData[1],"program"=>$getData[3]);
             }
             
            foreach($array as $key=>$val)
            { 
                $checkName=$instance->get_ofac_data($val['sdn_name']);
                if(is_array($checkName) && count($checkName)>0){
                    
                    $get_array_data[$key] = $checkName;
                    array_push($get_array_data[$key],$val);                     
                }
                //$get_array_data[$key] = $val;
            }
            $return = $instance->insert_update($get_array_data);
            
            if($return===true){
                
                    header("location:report_ofac_client_check.php");exit;
            }
            else{
                $error = !isset($_SESSION['warning'])?$return:'';
            }
            fclose($file);	
    	 }
    }	 

    $content = "of_fi";
    include(DIR_WS_TEMPLATES."main_page.tpl.php");
?>
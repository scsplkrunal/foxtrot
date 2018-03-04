<?php
	class import extends db{
		
		public $errors = '';
        public $table = IMPORT_CURRENT_FILES;
        /**
		 * @param post array
		 * @return true if success, error message if any errors
		 * */
		
        public function insert_update_ftp($data){
            
			$id = isset($data['id'])?$this->re_db_input($data['id']):0;
            $host_name = isset($data['host_name'])?$this->re_db_input($data['host_name']):'';
            $user_name = isset($data['user_name'])?$this->re_db_input($data['user_name']):'';
            $password = isset($data['password'])?trim($this->re_db_input($data['password'])):'';
			$confirm_password = isset($data['confirm_password'])?trim($this->re_db_input($data['confirm_password'])):'';
            $folder_location = isset($data['folder_location'])?$this->re_db_input($data['folder_location']):'';
            $ftp_file_type = isset($data['ftp_file_type'])?$this->re_db_input($data['ftp_file_type']):'';
            $status = isset($data['status'])?$this->re_db_input($data['status']):1;
            
			if($host_name==''){
				$this->errors = 'Please enter host name.';
			}
            else if($user_name==''){
				$this->errors = 'Please enter user name.';
			}
            else if($password=='' && $id==0){
				$this->errors = 'Please enter password.';
			}
            else if($password!='' && $confirm_password==''){
				$this->errors = 'Please confirm password.';
			}
			else if($password!=$confirm_password){
				$this->errors = 'Confirm password must be same as password.';
			}
            else if($status==''){
				$this->errors = 'Please select status.';
			}
            else if($ftp_file_type==''){
				$this->errors = 'Please select file type.';
			}
            if($this->errors!=''){
				return $this->errors;
			}
            else{
            /* check duplicate record */
			$con = '';
			if($id>0){
				$con = " AND `id`!='".$id."'";
			}
			$q = "SELECT * FROM `".IMPORT_FTP_MASTER."` WHERE `is_delete`='0' AND `user_name`='".$user_name."' ".$con;
			$res = $this->re_db_query($q);
			$return = $this->re_db_num_rows($res);
			if($return>0){
				$this->errors = 'This user is already exists.';
			}
			
			if($this->errors!=''){
				return $this->errors;
			}
			else if($id>=0){
				if($id==0){
				    
					$q = "INSERT INTO `".IMPORT_FTP_MASTER."` SET `host_name`='".$host_name."',`user_name`='".$user_name."',`password`='".$this->encryptor($password)."',`folder_location`='".$folder_location."',`status`='".$status."',`ftp_file_type`='".$ftp_file_type."'".$this->insert_common_sql();
					$res = $this->re_db_query($q);
                    $id = $this->re_db_insert_id();
					if($res){
					    $_SESSION['success'] = INSERT_MESSAGE;
						return true;
					}
					else{
						$_SESSION['warning'] = UNKWON_ERROR;
						return false;
					}
				}
				else if($id>0){
				    $con = '';
					if($password!=''){
						$con .= " , `password`='".$this->encryptor($password)."' ";
					}
                        
				    $q = "UPDATE `".IMPORT_FTP_MASTER."` SET `host_name`='".$host_name."',`user_name`='".$user_name."',`folder_location`='".$folder_location."',`status`='".$status."',`ftp_file_type`='".$ftp_file_type."' ".$con." ".$this->update_common_sql()." WHERE `id`='".$id."'";
                    $res = $this->re_db_query($q);
					if($res){
					    $_SESSION['success'] = UPDATE_MESSAGE;
						return true;
					}
					else{
						$_SESSION['warning'] = UNKWON_ERROR;
						return false;
					}
				}
			}
			else{
				$_SESSION['warning'] = UNKWON_ERROR;
				return false;
			}
            }
		}
        
        
        public function select_ftp(){
			$return = array();
			
			$q = "SELECT `at`.*
					FROM `".IMPORT_FTP_MASTER."` AS `at`
                    WHERE `at`.`is_delete`='0'
                    ORDER BY `at`.`id` ASC";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     array_push($return,$row);
                     
    			}
            }
			return $return;
		}
        
        public function select_ftp_user($id=''){
			$return = array();
			
            if($id !='')
            {
    			$q = "SELECT `at`.*
    					FROM `".IMPORT_FTP_MASTER."` AS `at`
                        WHERE `at`.`is_delete`='0' and `at`.`id`='".$id."'
                        ORDER BY `at`.`id` ASC";
    			$res = $this->re_db_query($q);
                if($this->re_db_num_rows($res)>0){
                  
                    $return = $this->re_db_fetch_array($res);
                }
            }
			return $return;
		}
        
        public function edit_ftp($id){
			$return = array();
			$q = "SELECT `at`.*
					FROM `".IMPORT_FTP_MASTER."` AS `at`
                    WHERE `at`.`is_delete`='0' AND `at`.`id`='".$id."'";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
    			$return = $this->re_db_fetch_array($res);
            }
			return $return;
		}
        
        public function ftp_status($id,$status){
			$id = trim($this->re_db_input($id));
			$status = trim($this->re_db_input($status));
			if($id>0 && ($status==0 || $status==1) ){
				$q = "UPDATE `".IMPORT_FTP_MASTER."` SET `status`='".$status."' WHERE `id`='".$id."'";
				$res = $this->re_db_query($q);
				if($res){
				    $_SESSION['success'] = STATUS_MESSAGE;
					return true;
				}
				else{
				    $_SESSION['warning'] = UNKWON_ERROR;
					return false;
				}
			}
			else{
			     $_SESSION['warning'] = UNKWON_ERROR;
				return false;
			}
		}
		
        public function ftp_delete($id){
			$id = trim($this->re_db_input($id));
			if($id>0 && ($status==0 || $status==1) ){
				$q = "UPDATE `".IMPORT_FTP_MASTER."` SET `is_delete`='1' WHERE `id`='".$id."'";
				$res = $this->re_db_query($q);
				if($res){
				    $_SESSION['success'] = DELETE_MESSAGE;
					return true;
				}
				else{
				    $_SESSION['warning'] = UNKWON_ERROR;
					return false;
				}
			}
			else{
			     $_SESSION['warning'] = UNKWON_ERROR;
				return false;
			}
		}
        public function insert_update_files($data){//echo '<pre>';print_r($data);exit;
            $all_files = $id = isset($_FILES['files'])?$_FILES['files']:array();
            
            if(isset($all_files['name'][0]) && $all_files['name'][0] == ''){
				$this->errors = 'Please select files.';
			}
            if($this->errors!=''){
				return $this->errors;
			}
            else{
            
                $files_array = $this->reArrayFiles($all_files);
                
                foreach($files_array as $file_key=>$file_val)
                {
                    $valid_file = array('zip');
                    $dir = $file_val['tmp_name'];
                    $file_name = $file_val['name'];
                    $path= $dir;
                    
                    $file_import = '';  
                    $ext_filename = '';
                    
                    $ext = strtolower(end(explode('.',$file_name)));
                    
                    if($file_name!='')
                    {
                        if(!in_array($ext,$valid_file))
                        {
                            $this->errors = 'Please select valid file.';
                        }
                        else
                        {
                              $zip = new ZipArchive;
                              $res = $zip->open($path);
                              
                              if ($res === TRUE) {
                                for ($i = 0; $i < $zip->numFiles; $i++) {
                                     
                                     $ext_filename = $zip->getNameIndex($i);
                                     
                                 }
                                 if (!file_exists(DIR_FS."import_files/user_".$_SESSION['user_id'])) {
                                    mkdir(DIR_FS."import_files/user_".$_SESSION['user_id'], 0777, true);
                                 }
                                 //print_r(DIR_FS."import_files/user_".$_SESSION['user_id']);exit;
                                 $zip->extractTo(DIR_FS."import_files/user_".$_SESSION['user_id']);
                                 $zip->close();
                              } 
                        }
                    }
                    if($this->errors!=''){
        				return $this->errors;
        			}
                    else
                    {
                        $already_file_array = $this->check_current_files();
                        if(!in_array($ext_filename,$already_file_array))
                        {
                            $file_type_array = array('07'=>'Non-Financial Activity','08'=>'New Account Activity','09'=>'Account Master Position','C1'=>'DST Commission');
                            $file_name_array = explode('.',$ext_filename);
                            $file_type_checkkey = substr($file_name_array[0], -2);
                            if (array_key_exists($file_type_checkkey, $file_type_array)) 
                            {
                                $q = "INSERT INTO `".IMPORT_CURRENT_FILES."` SET `user_id`='".$_SESSION['user_id']."',`imported_date`='".date('Y-m-d')."',`last_processed_date`='',`file_name`='".$ext_filename."',`file_type`='".$file_type_array[$file_type_checkkey]."',`source`=''".$this->insert_common_sql();
                    			$res = $this->re_db_query($q);
                                $id = $this->re_db_insert_id();
                            }
                            else
                            {
                                $q = "INSERT INTO `".IMPORT_CURRENT_FILES."` SET `user_id`='".$_SESSION['user_id']."',`imported_date`='".date('Y-m-d')."',`last_processed_date`='',`file_name`='".$ext_filename."',`file_type`='-',`source`=''".$this->insert_common_sql();
                    			$res = $this->re_db_query($q);
                                $id = $this->re_db_insert_id();
                            }
                        }
            			
                    }
                    
                }
                if($res){
    			    $_SESSION['success'] = INSERT_MESSAGE;
    				return true;
    			}
    			else{
    				$_SESSION['warning'] = UNKWON_ERROR;
    				return false;
    			}
            }
		}
        public function reArrayFiles($file_post) {
           $file_ary = array();
           $file_count = count($file_post['name']);
           $file_keys = array_keys($file_post);
           for ($i=0; $i<$file_count; $i++) {
               foreach ($file_keys as $key) {
                   $file_ary[$i][$key] = $file_post[$key][$i];
               }
           }
           return $file_ary;
       }
       public function process_current_files($id){
            if($id > 0)
            {
                $file_string_array = array();
                $get_file = $this->select_user_files($id);
                $filename = DIR_FS."import_files/user_".$_SESSION['user_id']."/".$get_file['file_name'];
                $file = fopen($filename, "r");
                while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
                 {
                    array_push($file_string_array,$getData[0]);
                 }
                 $header_array = array();
                 $detail_array = array();
                 $footer_array = array();
                 foreach($file_string_array as $key_string=>$val_string)
                 {
                    $record_type = substr($val_string, 0, 3);
                    if(isset($record_type) && $record_type == 'RHR')
                    {
                        $header_array[] = array("record_type" => substr($val_string, 0, 3),"sequence_number" => substr($val_string, 3, 3),"file_type" => substr($val_string, 6, 15),"super_sheet_date" => substr($val_string, 21, 8),"processed_date" => substr($val_string, 29, 8),"processed_time" => substr($val_string, 37, 8),"job_name" => substr($val_string, 45, 8),"file_format_code" => substr($val_string, 53, 3),"request_number" => substr($val_string, 56, 7),"*" => substr($val_string, 63, 1),"system_id" => substr($val_string, 64, 3),"management_code" => substr($val_string, 67, 2),"**" => substr($val_string, 69, 1),"populated_by_dst" => substr($val_string, 70, 1),"variable_universal_life" => substr($val_string, 71, 1),"unused_header_RHR" => substr($val_string, 72, 88));
                    }
                    else if(isset($record_type) && $record_type == 'PLH')
                    {
                        $header_record_sequence = substr($val_string, 3, 3);
                        if(isset($header_record_sequence) && $header_record_sequence == 001)
                        {
                            $header_array[] = array("record_type" => substr($val_string, 0, 3),"sequence_number" => substr($val_string, 3, 3),"anniversary_date" => substr($val_string, 6, 8),"issue_date" => substr($val_string, 14, 8),"product_code" => substr($val_string, 22, 7),"policy_contract_number" => substr($val_string, 29, 20),"death_benefit_option" => substr($val_string, 49, 2),"current_policy_face_amount" => substr($val_string, 51, 12),"current_sum_of_riders" => substr($val_string, 63, 12),"current_face_amount_including_sum_of_riders" => substr($val_string, 75, 12),"name_of_primary_beneficiary" => substr($val_string, 87, 31),"multiple_primary_beneficiary(M)" => substr($val_string, 118, 1),"name_of_secondary_beneficiary" => substr($val_string, 119, 30),"multiple_secondary_beneficiary(M)" => substr($val_string, 149, 1),"policy_status" => substr($val_string, 150, 2),"unused_header_PLH_001" => substr($val_string, 152, 8));
                        }
                        else if(isset($header_record_sequence) && $header_record_sequence == 002)
                        {
                            $header_array[] = array("record_type" => substr($val_string, 0, 3),"sequence_number" => substr($val_string, 3, 3),"billing_type" => substr($val_string, 6, 1),"billing_frequency" => substr($val_string, 7, 1),"billing_amount" => substr($val_string, 8, 15),"guideline_annual_premium" => substr($val_string, 23, 15),"guideline_single_premium" => substr($val_string, 38, 15),"target_premium" => substr($val_string, 53, 15),"no_lapse_guarantee_premium" => substr($val_string, 68, 15),"seven_pay_premium" => substr($val_string, 83, 15),"MEC_indicator" => substr($val_string, 98, 1),"unused_header_PLH_002" => substr($val_string, 99, 61));
                        }
                    }
                    else if(isset($record_type) && ($record_type == 'NAA' || $record_type == 'NFA' || $record_type == 'AMP' ))
                    {
                        $detail_record_type = substr($val_string, 3, 3);
                        if($detail_record_type == 001)
                        {
                            $detail_array[] = array("record_type" => substr($val_string, 0, 3),"sequence_number" => substr($val_string, 3, 3),"dealer_number" => substr($val_string, 6, 7),"dealer_branch_number" => substr($val_string, 13, 9),"cusip_number" => substr($val_string, 22, 9),"mutual_fund_fund_code" => substr($val_string, 31, 7),"mutual_fund_customer_account_number" => substr($val_string, 38, 20),"account_number_code" => substr($val_string, 58, 1),"mutual_fund_established_date" => substr($val_string, 59, 8),"last_maintenance_date" => substr($val_string, 67, 8),"line_code" => substr($val_string, 75, 1),"alpha_code" => substr($val_string, 76, 10),"mutual_fund_dealer_level_control_code" => substr($val_string, 86, 1),"social_code" => substr($val_string, 87, 3),"resident_state_country_code" => substr($val_string, 90, 3),"social_security_number" => substr($val_string, 93, 9),"ssn_status_code" => substr($val_string, 102, 1),"systematic_withdrawal_plan(SWP)_account" => substr($val_string, 103, 1),"pre_authorized_checking_amount" => substr($val_string, 104, 1),"automated_clearing_house_account(ACH)" => substr($val_string, 105, 1),"mutual_fund_reinvest_to_another_account" => substr($val_string, 106, 1),"mutual_fund_capital_gains_distribution_option" => substr($val_string, 107, 1),"mutual_fund_divident_distribution_option" => substr($val_string, 108, 1),"check_writing_account" => substr($val_string, 109, 1),"expedited_redemption_account" => substr($val_string, 110, 1),"mutual_fund_sub_account" => substr($val_string, 111, 1),"foreign_tax_rate" => substr($val_string, 112, 3),"zip_code" => substr($val_string, 115, 9),"zipcode_future_expansion" => substr($val_string, 124, 2),"cumulative_discount_number" => substr($val_string, 126, 9),"letter_of_intent(LOI)_number" => substr($val_string, 135, 9),"timer_flag" => substr($val_string, 144, 1),"list_bill_account" => substr($val_string, 145, 1),"mutual_fund_monitored_VIP_account" => substr($val_string, 146, 1),"mutual_fund_expedited_exchange_account" => substr($val_string, 147, 1),"mutual_fund_penalty_withholding_account" => substr($val_string, 148, 1),"certificate_issuance_code" => substr($val_string, 149, 1),"mutual_fund_stop_transfer_flag" => substr($val_string, 150, 1),"mutual_fund_blue_sky_exemption_flag" => substr($val_string, 151, 1),"bank_card_issued" => substr($val_string, 152, 1),"fiduciary_account" => substr($val_string, 153, 1),"plan_status_code" => substr($val_string, 154, 1),"mutual_fund_net_asset_value(NAV)_account" => substr($val_string, 155, 1),"mailing_flag" => substr($val_string, 156, 1),"interested_party_code" => substr($val_string, 157, 1),"mutual_fund_share_account_phone_check_redemption_code" => substr($val_string, 158, 1),"mutual_fund_share_account_house_account_code" => substr($val_string, 159, 1));
                        }
                        else if($detail_record_type == 002)
                        {
                            $detail_array[] = array("record_type" => substr($val_string, 0, 3),"sequence_number" => substr($val_string, 3, 3),"mutual_fund_dividend_mail_account" => substr($val_string, 6, 1),"mutual_fund_stop_purchase_account" => substr($val_string, 7, 1),"stop_mail_account" => substr($val_string, 8, 1),"mutual_fund_fractional_check" => substr($val_string, 9, 1),"registration_line1" => substr($val_string, 10, 35),"registration_line2" => substr($val_string, 45, 35),"registration_line3" => substr($val_string, 80, 35),"registration_line4" => substr($val_string, 115, 35),"customer_date_of_birth" => substr($val_string, 150, 8),"mutual_fund_account_price_schedule_code" => substr($val_string, 158, 1),"unused_detail" => substr($val_string, 159, 1));
                        }
                        else if($detail_record_type == 003)
                        {
                            $detail_array[] = array("record_type" => substr($val_string, 0, 3),"sequence_number" => substr($val_string, 3, 3),"account_registration_line5" => substr($val_string, 6, 35),"account_registration_line6" => substr($val_string, 41, 35),"account_registration_line7" => substr($val_string, 76, 35),"representative_number" => substr($val_string, 111, 9),"representative_name" => substr($val_string, 120, 30),"position_close_out_indicator" => substr($val_string, 150, 1),"account_type_indicator" => substr($val_string, 151, 4),"product_identifier_code(VA only)" => substr($val_string, 155, 3),"mutual_fund_alternative_investment_program_managers_variable_annuties_and_VUL" => substr($val_string, 158, 2));
                        }
                        else if($detail_record_type == 004)
                        {
                            $detail_array[] = array("record_type" => substr($val_string, 0, 3),"sequence_number" => substr($val_string, 3, 3),"brokerage_identification_number(BIN)" => substr($val_string, 6, 20),"account_number_code" => substr($val_string, 26, 1),"primary_investor_phone_number" => substr($val_string, 27, 15),"secondary_investor_phone_number" => substr($val_string, 42, 15),"NSCC_trust_company_number" => substr($val_string, 57, 4),"NSCC_third_party_administrator_number" => substr($val_string, 61, 4),"unused" => substr($val_string, 65, 23),"trust_custodian_id_number" => substr($val_string, 88, 7),"third_party_administrator_id_number" => substr($val_string, 95, 7),"unused" => substr($val_string, 102, 58));
                        }
                    }
                    else if(isset($record_type) && $record_type == 'RTR')
                    {
                        $footer_array = array("record_type" => substr($val_string, 0, 3),"sequence_number" => substr($val_string, 3, 3),"file_type" => substr($val_string, 6, 15),"trailer_record_count" => substr($val_string, 21, 9),"unused" => substr($val_string, 30, 130));
                    }
                 }
                 echo'<pre>';print_r($file_string_array);print_r($header_array);print_r($detail_array);print_r($footer_array);exit;
            }
       }
       public function select_current_files(){
			$return = array();
			
			$q = "SELECT `at`.*
					FROM `".IMPORT_CURRENT_FILES."` AS `at`
                    WHERE `at`.`is_delete`='0' and `at`.`user_id`='".$_SESSION['user_id']."'
                    ORDER BY `at`.`imported_date` DESC";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     array_push($return,$row);
                     
    			}
            }
			return $return;
		}
        public function select_user_files($id){
			$return = array();
			
			$q = "SELECT `at`.*
					FROM `".IMPORT_CURRENT_FILES."` AS `at`
                    WHERE `at`.`is_delete`='0' and `at`.`user_id`='".$_SESSION['user_id']."' and `at`.`id`='".$id."'
                    ORDER BY `at`.`imported_date` DESC";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     $return = $row;
                     
    			}
            }
			return $return;
		}
        public function check_current_files(){
			$return = array();
			
			$q = "SELECT `at`.`file_name`
					FROM `".IMPORT_CURRENT_FILES."` AS `at`
                    WHERE `at`.`is_delete`='0'
                    ORDER BY `at`.`id` ASC";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     $return[] = $row['file_name'];
                }
            }
			return $return;
		}
        public function delete_current_files($id){
			$id = trim($this->re_db_input($id));
			if($id>0){
				$q = "UPDATE `".$this->table."` SET `is_delete`='1' WHERE `id`='".$id."'";
				$res = $this->re_db_query($q);
				if($res){
				    $_SESSION['success'] = DELETE_MESSAGE;
					return true;
				}
				else{
				    $_SESSION['warning'] = UNKWON_ERROR;
					return false;
				}
			}
			else{
			     $_SESSION['warning'] = UNKWON_ERROR;
				return false;
			}
		}
        
        
    }
?>
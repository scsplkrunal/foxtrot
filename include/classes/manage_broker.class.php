<?php
	class broker_master extends db{
		
		public $table = BROKER_MASTER;
		public $errors = '';
        public $last_inserted_id = '';
        /**
		 * @param post array
		 * @return true if success, error message if any errors
		 * */
		public function insert_update($data){
			$id = isset($data['id'])?$this->re_db_input($data['id']):0;
			$fname = isset($data['fname'])?$this->re_db_input($data['fname']):'';
			$lname = isset($data['lname'])?$this->re_db_input($data['lname']):'';
			$mname = isset($data['mname'])?$this->re_db_input($data['mname']):'';
			$suffix = isset($data['suffix'])?$this->re_db_input($data['suffix']):'';
			$fund = isset($data['fund'])?$this->re_db_input($data['fund']):'';
			$internal = isset($data['internal'])?$this->re_db_input($data['internal']):'';
			$ssn = isset($data['ssn'])?$this->re_db_input($data['ssn']):'';
			$tax_id = isset($data['tax_id'])?$this->re_db_input($data['tax_id']):'';
			$crd = isset($data['crd'])?$this->re_db_input($data['crd']):'';
            $active_status_cdd = isset($data['active_status_cdd'])?$this->re_db_input($data['active_status_cdd']):'';
			$pay_method = isset($data['pay_method'])?$this->re_db_input($data['pay_method']):'';
			$branch_manager = isset($data['branch_manager'])?$this->re_db_input($data['branch_manager']):'';
			
			
			/*if($fname==''){
				$this->errors = 'Please enter first name.';
			}
            else*/ if($lname==''){
				$this->errors = 'Please enter last name.';
			}
            /*else if($mname==''){
				$this->errors = 'Please enter middle name.';
			}
			else if($suffix==''){
				$this->errors = 'Please enter suffix.';
			}
			else if($fund==''){//echo $fund;exit;
				$this->errors = 'Please enter fund.';
			}
            else if($internal==''){
				$this->errors = 'Please enter internal.';
			}
			else if($ssn==''){
				$this->errors = 'Please enter ssn.';
			}
			else if($tax_id==''){
				$this->errors = 'Please enter tax.';
			}
            else if($crd==''){
				$this->errors = 'Please select crd.';
			}
            else if($active_status_cdd==''){
                $this->errors = 'Please select active status.';
            }
			else if($pay_method==''){
                $this->errors = 'Please select pay type.';
            }*/
            
			if($this->errors!=''){
				return $this->errors;
			}
			else{
				
				/* check duplicate record */
				$con = '';
				if($id>0){
					$con = " AND `id`!='".$id."'";
				}
				$q = "SELECT * FROM `".$this->table."` WHERE `is_delete`='0' AND `first_name`='".$fname."' ".$con;
				$res = $this->re_db_query($q);
				$return = $this->re_db_num_rows($res);
				if($return>0){
					$this->errors = 'This broker is already exists.';
				}
				
				if($this->errors!=''){
					return $this->errors;
				}
				else if($id>=0){
					if($id==0){
						$q = "INSERT INTO `".$this->table."` SET `first_name`='".$fname."',`last_name`='".$lname."',`middle_name`='".$mname."',`suffix`='".$suffix."',`fund`='".$fund."',`internal`='".$internal."',`tax_id`='".$tax_id."',`crd`='".$crd."',`ssn`='".$ssn."',`active_status`='".$active_status_cdd."',`pay_method`='".$pay_method."',`branch_manager`='".$branch_manager."'".$this->insert_common_sql();
						$res = $this->re_db_query($q);
                        $_SESSION['last_insert_id'] = $this->re_db_insert_id();
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
					    $q = "UPDATE `".$this->table."` SET `first_name`='".$fname."',`last_name`='".$lname."',`middle_name`='".$mname."',`suffix`='".$suffix."',`fund`='".$fund."',`internal`='".$internal."',`tax_id`='".$tax_id."',`crd`='".$crd."',`ssn`='".$ssn."',`active_status`='".$active_status_cdd."',`pay_method`='".$pay_method."',`branch_manager`='".$branch_manager."'".$this->update_common_sql()." WHERE `id`='".$id."'";
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
        /** Insert update general data for broker. **/
        public function insert_update_general($data){
			$id = isset($data['id'])?$this->re_db_input($data['id']):0;
			$home_general = isset($data['home_general'])?$this->re_db_input($data['home_general']):'';
			$address1_general = isset($data['address1_general'])?$this->re_db_input($data['address1_general']):'';
			$address2_general = isset($data['address2_general'])?$this->re_db_input($data['address2_general']):'';
			$city_general = isset($data['city_general'])?$this->re_db_input($data['city_general']):'';
			$state_general = isset($data['state_general'])?$this->re_db_input($data['state_general']):'';
			$zip_code_general = isset($data['zip_code_general'])?$this->re_db_input($data['zip_code_general']):'';
            $telephone_mask = isset($data['telephone_general'])?$this->re_db_input($data['telephone_general']):'';
            $telephone_no = str_replace("-", '', $telephone_mask);
            $telephone_brack1 = str_replace("(", '', $telephone_no);
            $telephone_general = str_replace(")", '', $telephone_brack1);
            $cell_mask = isset($data['cell_general'])?$this->re_db_input($data['cell_general']):'';
            $cell_no = str_replace("-", '', $cell_mask);
            $cell_brack1 = str_replace("(", '', $cell_no);
            $cell_general = str_replace(")", '', $cell_brack1);
            $fax_mask = isset($data['fax_general'])?$this->re_db_input($data['fax_general']):'';
            $fax_no = str_replace("-", '', $fax_mask);
            $fax_brack1 = str_replace("(", '', $fax_no);
            $fax_general = str_replace(")", '', $fax_brack1);
			$gender_general = isset($data['gender_general'])?$this->re_db_input($data['gender_general']):'';
			$status_general = isset($data['status_general'])?$this->re_db_input($data['status_general']):'';
			$spouse_general = isset($data['spouse_general'])?$this->re_db_input($data['spouse_general']):'';
            $children_general = isset($data['children_general'])?$this->re_db_input($data['children_general']):'';
			$email1_general = isset($data['email1_general'])?$this->re_db_input($data['email1_general']):'';
			$email2_general = isset($data['email2_general'])?$this->re_db_input($data['email2_general']):'';
			$web_id_general = isset($data['web_id_general'])?$this->re_db_input($data['web_id_general']):'';
			$web_password_general = isset($data['web_password_general'])?$this->re_db_input($data['web_password_general']):'';
			$dob_general = isset($data['dob_general'])?$this->re_db_input(date('Y-m-d',strtotime($data['dob_general']))):'';
			$prospect_date_general = isset($data['prospect_date_general'])?$this->re_db_input(date('Y-m-d',strtotime($data['prospect_date_general']))):'';
			$reassign_broker_general = isset($data['reassign_broker_general'])?$this->re_db_input($data['reassign_broker_general']):'';
			$u4_general = isset($data['u4_general'])?$this->re_db_input(date('Y-m-d',strtotime($data['u4_general']))):'';
            $u5_general = isset($data['u5_general'])?$this->re_db_input(date('Y-m-d',strtotime($data['u5_general']))):'';
			$dba_name_general = isset($data['dba_name_general'])?$this->re_db_input($data['dba_name_general']):'';
			$eft_info_general = isset($data['eft_info_general'])?$this->re_db_input($data['eft_info_general']):'';
            $start_date_general = isset($data['start_date_general'])?$this->re_db_input(date('Y-m-d',strtotime($data['start_date_general']))):'';
			$transaction_type_general = isset($data['transaction_type_general'])?$this->re_db_input($data['transaction_type_general']):'';
			$routing_general = isset($data['routing_general'])?$this->re_db_input($data['routing_general']):'';
			$account_no_general = isset($data['account_no_general'])?$this->re_db_input($data['account_no_general']):'';
			$summarize_trailers_general = isset($data['summarize_trailers_general'])?$this->re_db_input($data['summarize_trailers_general']):0;
			$summarize_direct_imported_trades = isset($data['summarize_direct_imported_trades'])?$this->re_db_input($data['summarize_direct_imported_trades']):0;
			$from_date_general = isset($data['from_date_general'])?$this->re_db_input(date('Y-m-d',strtotime($data['from_date_general']))):'';
			$to_date_general = isset($data['to_date_general'])?$this->re_db_input(date('Y-m-d',strtotime($data['to_date_general']))):'';
			$cfp_general = isset($data['cfp_general'])?$this->re_db_input($data['cfp_general']):0;
            $chfp_general = isset($data['chfp_general'])?$this->re_db_input($data['chfp_general']):0;
			$cpa_general = isset($data['cpa_general'])?$this->re_db_input($data['cpa_general']):0;
			$clu_general = isset($data['clu_general'])?$this->re_db_input($data['clu_general']):0;
            $cfa_general = isset($data['cfa_general'])?$this->re_db_input($data['cfa_general']):0;
            $ria_general = isset($data['ria_general'])?$this->re_db_input($data['ria_general']):0;
			$insurance_general = isset($data['insurance_general'])?$this->re_db_input($data['insurance_general']):0;
			
			/*if($home_general==''){
				$this->errors = 'Please select one option.';
			}
            else if($address1_general==''){
				$this->errors = 'Please enter address.';
			}
            else if($city_general==''){
				$this->errors = 'Please enter city.';
			}
			else if($state_general==''){
				$this->errors = 'Please select state.';
			}
			else if($zip_code_general==''){//echo $fund;exit;
				$this->errors = 'Please enter zip-code.';
			}
            else if($telephone_general==''){
				$this->errors = 'Please enter telephone.';
			}
			else if($cell_general==''){
				$this->errors = 'Please enter cell.';
			}
			else if($fax_general==''){
				$this->errors = 'Please enter fax.';
			}
            else if($gender_general==''){
				$this->errors = 'Please select gender.';
			}
            else if($status_general==''){
                $this->errors = 'Please select status.';
            }
			else if($spouse_general==''){
                $this->errors = 'Please enter spouse.';
            }
            else if($children_general==''){
                $this->errors = 'Please select children.';
            }
            else if($email1_general==''){
                $this->errors = 'Please enter email.';
            }
            else if($web_id_general==''){
                $this->errors = 'Please enter web id.';
            }
            else if($web_password_general==''){
                $this->errors = 'Please enter web password.';
            }
            else if($dob_general==''){
                $this->errors = 'Please enter birth date.';
            }
            else if($prospect_date_general==''){
                $this->errors = 'Please enter prospect date.';
            }
            else if($reassign_broker_general==''){
                $this->errors = 'Please select reassign broker.';
            }
            else if($u4_general==''){
                $this->errors = 'Please enter u4.';
            }
            else if($u5_general==''){
                $this->errors = 'Please enter u5.';
            }
            else if($dba_name_general==''){
                $this->errors = 'Please enter DBA name.';
            }
            
            else if($eft_info_general==''){
                $this->errors = 'Please select one EFT option.';
            }
            else if($start_date_general==''){
                $this->errors = 'Please select start date.';
            }
            else if($transaction_type_general==''){
                $this->errors = 'Please select transaction type.';
            }
            else if($routing_general==''){
                $this->errors = 'Please enter routing.';
            }
            else if($account_no_general==''){
                $this->errors = 'Please enter account no.';
            }
            else if($from_date_general==''){
                $this->errors = 'Please enter from date.';
            }
            else if($to_date_general==''){
                $this->errors = 'Please enter to date.';
            }*/
            /*if($email1_general!='' && $this->validemail($email1_general)==0){
				$this->errors = 'Please enter valid email 1.';
			}
            else if($email2_general!='' && $this->validemail($email2_general)==0){
				$this->errors = 'Please enter valid email 2.';
			}
            if($this->errors!=''){
				return $this->errors;
			}
			else{*/
				
				/* check duplicate record */
				/*$con = '';
				if($id>0){
					$con = " AND `id`!='".$id."'";
				}
				$q = "SELECT * FROM `".$this->table."` WHERE `is_delete`='0' AND `first_name`='".$fname."' ".$con;
				$res = $this->re_db_query($q);
				$return = $this->re_db_num_rows($res);
				if($return>0){
					$this->errors = 'This broker is already exists.';
				}
				*/
				if($this->errors!=''){
					return $this->errors;
				}
				else if($id>=0){
					if($id==0){
						$q = "INSERT INTO `".BROKER_GENERAL."` SET `broker_id`='".$_SESSION['last_insert_id']."',`home/business`='".$home_general."',`address1`='".$address1_general."',`address2`='".$address2_general."',`city`='".$city_general."',`state_id`='".$state_general."',`zip_code`='".$zip_code_general."',`telephone`='".$telephone_general."',`cell`='".$cell_general."',`fax`='".$fax_general."',`gender`='".$gender_general."',`marital_status`='".$status_general."',`spouse`='".$spouse_general."',`children`='".$children_general."',`email1`='".$email1_general."',`email2`='".$email2_general."',`web_id`='".$web_id_general."',`web_password`='".$web_password_general."',`dob`='".$dob_general."',`prospect_date`='".$prospect_date_general."',`reassign_broker`='".$reassign_broker_general."',`u4`='".$u4_general."',`u5`='".$u5_general."',`dba_name`='".$dba_name_general."',`eft_information`='".$eft_info_general."',`start_date`='".$start_date_general."',`transaction_type`='".$transaction_type_general."',`routing`='".$routing_general."',`account_no`='".$account_no_general."',`cfp`='".$cfp_general."',`chfp`='".$chfp_general."',`cpa`='".$cpa_general."',`clu`='".$clu_general."',`cfa`='".$cfa_general."',`ria`='".$ria_general."',`insurance`='".$insurance_general."'".$this->insert_common_sql();
						$res = $this->re_db_query($q);
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
					    $q = "UPDATE `".BROKER_GENERAL."`  SET `home/business`='".$home_general."',`address1`='".$address1_general."',`address2`='".$address2_general."',`city`='".$city_general."',`state_id`='".$state_general."',`zip_code`='".$zip_code_general."',`telephone`='".$telephone_general."',`cell`='".$cell_general."',`fax`='".$fax_general."',`gender`='".$gender_general."',`marital_status`='".$status_general."',`spouse`='".$spouse_general."',`children`='".$children_general."',`email1`='".$email1_general."',`email2`='".$email2_general."',`web_id`='".$web_id_general."',`web_password`='".$web_password_general."',`dob`='".$dob_general."',`prospect_date`='".$prospect_date_general."',`reassign_broker`='".$reassign_broker_general."',`u4`='".$u4_general."',`u5`='".$u5_general."',`dba_name`='".$dba_name_general."',`eft_information`='".$eft_info_general."',`start_date`='".$start_date_general."',`transaction_type`='".$transaction_type_general."',`routing`='".$routing_general."',`account_no`='".$account_no_general."',`cfp`='".$cfp_general."',`chfp`='".$chfp_general."',`cpa`='".$cpa_general."',`clu`='".$clu_general."',`cfa`='".$cfa_general."',`ria`='".$ria_general."',`insurance`='".$insurance_general."'".$this->update_common_sql()." WHERE `broker_id`='".$id."'";
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
				else{
					$_SESSION['warning'] = UNKWON_ERROR;
					return false;
				}
			}
		}
        public function insert_update_licences($data)
        {
            //echo '<pre>';print_r($data);
            $id = isset($data['id'])?$this->re_db_input($data['id']):0;
            $type_of_licences =isset($data['type'])?$this->re_db_input($data['type']):'';
            $waive_home_state_fee = isset($data['pass_through'])?$this->re_db_input($data['pass_through']):'0';
            $product_category = isset($data['product_category'])?$this->re_db_input($data['product_category']):'0';
            if($id>=0){
				if($id==0){
				    foreach($data['data'] as $key=>$val)
                    {        
                        $active_check=isset($val['active_check'])?$this->re_db_input($val['active_check']):'0';
                        $fee=isset($val['fee'])?$this->re_db_input($val['fee']):'';
                        $received=isset($val['received'])?$this->re_db_input($val['received']):'';
                        $terminated=isset($val['terminated'])?$this->re_db_input($val['terminated']):'';
                        $reason=isset($val['reason'])?$this->re_db_input($val['reason']):'';
                        
                        $q = "INSERT INTO `".BROKER_LICENCES_SECURITIES."` SET `broker_id`='".$_SESSION['last_insert_id']."' ,`type_of_licences`='".$type_of_licences."' ,`state_id`='".$key."' , 
                        `waive_home_state_fee`='".$waive_home_state_fee."' , `product_category`='".$product_category."' ,`active_check`='".$active_check."' ,`fee`='".$fee."' ,
                        `received`='".$received."' ,`terminated`='".$terminated."',`reson`='".$reason."' ".$this->insert_common_sql();
    					$res = $this->re_db_query($q);
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
                else if($id>0){
                    foreach($data['data'] as $key=>$val)
                    {
                        $active_check=isset($val['active_check'])?$this->re_db_input($val['active_check']):'0';
                        $fee=isset($val['fee'])?$this->re_db_input($val['fee']):'';
                        $received=isset($val['received'])?$this->re_db_input($val['received']):'';
                        $terminated=isset($val['terminated'])?$this->re_db_input($val['terminated']):'';
                        $reason=isset($val['reason'])?$this->re_db_input($val['reason']):'';
                        
                    
    				    $q = "UPDATE `".BROKER_LICENCES_SECURITIES."`  SET `type_of_licences`='".$type_of_licences."' ,`state_id`='".$key."' , 
                        `waive_home_state_fee`='".$waive_home_state_fee."' , `product_category`='".$product_category."' ,`active_check`='".$active_check."' ,`fee`='".$fee."' ,
                        `received`='".$received."' ,`terminated`='".$terminated."',`reson`='".$reason."' ".$this->update_common_sql()." WHERE `state_id`='".$key."' and `broker_id`='".$id."'";
  					
                        $res = $this->re_db_query($q);
		          }
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
            //echo $id;
            //exit;
        }
        public function insert_update_licences1($data)
        {
            //echo '<pre>';print_r($data);
            $id = isset($data['id'])?$this->re_db_input($data['id']):0;
            $type_of_licences =isset($data['type'])?$this->re_db_input($data['type']):'';
            $waive_home_state_fee = isset($data['pass_through'])?$this->re_db_input($data['pass_through']):'0';
            $product_category = isset($data['product_category'])?$this->re_db_input($data['product_category']):'0';
            if($id>=0){
				if($id==0){
				    foreach($data['data'] as $key=>$val)
                    {        
                        $active_check=isset($val['active_check'])?$this->re_db_input($val['active_check']):'0';
                        $fee=isset($val['fee'])?$this->re_db_input($val['fee']):'';
                        $received=isset($val['received'])?$this->re_db_input($val['received']):'';
                        $terminated=isset($val['terminated'])?$this->re_db_input($val['terminated']):'';
                        $reason=isset($val['reason'])?$this->re_db_input($val['reason']):'';
                        
                        $q = "INSERT INTO `".BROKER_LICENCES_INSURANCE."` SET `broker_id`='".$_SESSION['last_insert_id']."' ,`type_of_licences`='".$type_of_licences."' ,`state_id`='".$key."' , 
                        `waive_home_state_fee`='".$waive_home_state_fee."' , `product_category`='".$product_category."' ,`active_check`='".$active_check."' ,`fee`='".$fee."' ,
                        `received`='".$received."' ,`terminated`='".$terminated."',`reson`='".$reason."' ".$this->insert_common_sql();
    					$res = $this->re_db_query($q);
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
                else if($id>0){
                    foreach($data['data'] as $key=>$val)
                    {
                        $active_check=isset($val['active_check'])?$this->re_db_input($val['active_check']):'0';
                        $fee=isset($val['fee'])?$this->re_db_input($val['fee']):'';
                        $received=isset($val['received'])?$this->re_db_input($val['received']):'';
                        $terminated=isset($val['terminated'])?$this->re_db_input($val['terminated']):'';
                        $reason=isset($val['reason'])?$this->re_db_input($val['reason']):'';
                        
                    
    				    $q = "UPDATE `".BROKER_LICENCES_INSURANCE."`  SET `type_of_licences`='".$type_of_licences."' ,`state_id`='".$key."' , 
                        `waive_home_state_fee`='".$waive_home_state_fee."' , `product_category`='".$product_category."' ,`active_check`='".$active_check."' ,`fee`='".$fee."' ,
                        `received`='".$received."' ,`terminated`='".$terminated."',`reson`='".$reason."' ".$this->update_common_sql()." WHERE `state_id`='".$key."' and `broker_id`='".$id."'";
  					
                        $res = $this->re_db_query($q);
		          }
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
            //echo $id;
            //exit;
        }
        public function insert_update_licences2($data)
        {
            //echo '<pre>';print_r($data);
            $id = isset($data['id'])?$this->re_db_input($data['id']):0;
            $type_of_licences =isset($data['type'])?$this->re_db_input($data['type']):'';
            $waive_home_state_fee = isset($data['pass_through'])?$this->re_db_input($data['pass_through']):'0';
            $product_category = isset($data['product_category'])?$this->re_db_input($data['product_category']):'0';
            if($id>=0){
				if($id==0){
				    foreach($data['data'] as $key=>$val)
                    {        
                        $active_check=isset($val['active_check'])?$this->re_db_input($val['active_check']):'0';
                        $fee=isset($val['fee'])?$this->re_db_input($val['fee']):'';
                        $received=isset($val['received'])?$this->re_db_input($val['received']):'';
                        $terminated=isset($val['terminated'])?$this->re_db_input($val['terminated']):'';
                        $reason=isset($val['reason'])?$this->re_db_input($val['reason']):'';
                        
                        $q = "INSERT INTO `".BROKER_LICENCES_RIA."` SET `broker_id`='".$_SESSION['last_insert_id']."' ,`type_of_licences`='".$type_of_licences."' ,`state_id`='".$key."' , 
                        `waive_home_state_fee`='".$waive_home_state_fee."' , `product_category`='".$product_category."' ,`active_check`='".$active_check."' ,`fee`='".$fee."' ,
                        `received`='".$received."' ,`terminated`='".$terminated."',`reson`='".$reason."' ".$this->insert_common_sql();
    					$res = $this->re_db_query($q);
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
                else if($id>0){
                    foreach($data['data'] as $key=>$val)
                    {
                        $active_check=isset($val['active_check'])?$this->re_db_input($val['active_check']):'0';
                        $fee=isset($val['fee'])?$this->re_db_input($val['fee']):'';
                        $received=isset($val['received'])?$this->re_db_input($val['received']):'';
                        $terminated=isset($val['terminated'])?$this->re_db_input($val['terminated']):'';
                        $reason=isset($val['reason'])?$this->re_db_input($val['reason']):'';
                        
                    
    				    $q = "UPDATE `".BROKER_LICENCES_RIA."`  SET `type_of_licences`='".$type_of_licences."' ,`state_id`='".$key."' , 
                        `waive_home_state_fee`='".$waive_home_state_fee."' , `product_category`='".$product_category."' ,`active_check`='".$active_check."' ,`fee`='".$fee."' ,
                        `received`='".$received."' ,`terminated`='".$terminated."',`reson`='".$reason."' ".$this->update_common_sql()." WHERE `state_id`='".$key."' and `broker_id`='".$id."'";
  					
                        $res = $this->re_db_query($q);
		          }
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
            //echo $id;
            //exit;
        }
        /** Insert update charges data for broker. **/
        public function insert_update_charges1231321564($data){
        $id = isset($data['id'])?$this->re_db_input($data['id']):0;
				if($id==0){
				    
				        foreach($data as $key=>$val)
                        {
                            $charges_type=$key;
                            foreach($val as $key=>$value)
                            {
                                $charges_name=$key;//echo '<pre>';print_r($value);exit;
                                $q = "INSERT INTO `".BROKER_CHARGES_MASTER."` SET `broker_id`='".$_SESSION['last_insert_id']."',`charges_type`='".$charges_type."',`charges_name`='".$charges_name."',`manage_clearing`='".$value['clearing']."',`manage_execution`='".$value['execution']."',`non_manage_clearing`='".$value['non_clearing']."',`non_manage_execution`='".$value['non_execution']."'".$this->insert_common_sql();
        						$res = $this->re_db_query($q);
                            }exit;
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
				else{
					$_SESSION['warning'] = UNKWON_ERROR;
					return false;
				}
		}
        /** Insert update charges data for broker. **/
        public function insert_update_charges($data){
        $id = isset($data['id'])?$this->re_db_input($data['id']):0;
            if($id>0){
			    foreach($data['inp_type'] as $type_id=>$type_vale)
                {
                    foreach($type_vale as $name_id=>$name_val)
                    {
                        foreach($name_val as $accout_type=>$account_val)
                        {
                            foreach($account_val as $account_process=>$value)
                            {
                                $res=$this->re_db_query("SELECT cd.charge_detail_id, cv.value FROM ft_charge_detail cd left join ft_charge_value cv on cd.charge_detail_id=cv.charge_detail_id and cv.broker_id='".$id."' WHERE cd.charge_type_id='".$type_id."' AND cd.charge_name_id='".$name_id."' AND account_type='".$accout_type."' AND account_process='".$account_process."'");
                                $row=$this->re_db_fetch_array($res);
                                if($row['value']!='')
                                {
                                    $r=$this->re_db_query("update ft_charge_value set value='".$value."' where charge_detail_id='".$row['charge_detail_id']."' and broker_id='".$id."'");                           
                                } 
                                else
                                {
                                    $r=$this->re_db_query("INSERT INTO ft_charge_value set charge_detail_id='".$row['charge_detail_id']."',broker_id='".$id."',value='".$value."'");
                                }   
                            }   
                        }
                         
                    }
                }
                if($r){
				    $_SESSION['success'] = INSERT_MESSAGE;
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
        /**
		 * @param int status, default all
		 * @return array of record if success, error message if any errors
		 * */
         
		public function select(){
			$return = array();
			
			$q = "SELECT `at`.*
					FROM `".$this->table."` AS `at`
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
        public function select_sponsor(){
			$return = array();
			
			$q = "SELECT `at`.*
					FROM `".SPONSOR_MASTER."` AS `at`
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
        public function select_state(){
			$return = array();
			
			$q = "SELECT `s`.*
					FROM `".STATE_MASTER."` AS `s`
                    WHERE `s`.`status`='1' and `s`.`is_delete`='0'
                    ORDER BY `s`.`id` ASC";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     array_push($return,$row);
                     
    			}
            }
			return $return;
		}
        public function select_state_new(){
			$return = array();
			
			$q = "SELECT `s`.*
					FROM `".STATE_MASTER."` AS `s`
                    WHERE `s`.`is_delete`='0'
                    ORDER BY `s`.`id` ASC";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     array_push($return,$row);
                     
    			}
            }
			return $return;
		}
        /**
		 * @param int status, default all
		 * @return get state for general information
		 * */
      
        /**
		 * @param int id
		 * @return array of record if success, error message if any errors
		 * */
		public function edit($id){
			$return = array();
			$q = "SELECT `at`.*
					FROM `".$this->table."` AS `at` 
                    WHERE `at`.`is_delete`='0' AND `at`.`id`='".$id."' "; 
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
    			$return = $this->re_db_fetch_array($res);
            }
			return $return;
		}
        public function edit_general($id){
			$return = array();
			$q = "SELECT `at`.*
					FROM `".BROKER_GENERAL."` AS `at`
                    WHERE `at`.`is_delete`='0' AND `at`.`broker_id`='".$id."' "; 
            $res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
    			$return = $this->re_db_fetch_array($res);
            }
			return $return;
		}
        public function search($search_text=''){
			$return = array();
			$con = '';
            if($search_text!='' && $search_text>=0){
				$con .= " AND `clm`.`first_name` LIKE '%".$search_text."%' ";
			}
            
            $q = "SELECT `clm`.*
					FROM `".$this->table."` AS `clm`
                    WHERE `clm`.`is_delete`='0' ".$con."
                    ORDER BY `clm`.`id` ASC ";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     //print_r($row);exit;
                     array_push($return,$row);
                     
    			}
            }
			return $return;
		}
        /**
		 * @param id of record
		 * @param status to update
		 * @return true if success, false message if any errors
		 * */
		public function status($id,$status){
			$id = trim($this->re_db_input($id));
			$status = trim($this->re_db_input($status));
			if($id>0 && ($status==0 || $status==1) ){
				$q = "UPDATE `".$this->table."` SET `status`='".$status."' WHERE `id`='".$id."'";
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
		
		/**
		 * @param id of record
		 * @return true if success, false message if any errors
		 * */
		public function delete($id){
			$id = trim($this->re_db_input($id));
			if($id>0 && ($status==0 || $status==1) ){
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
        public function select_charge_type(){
			$return = array();
			
			$q = "SELECT * FROM `".CHARGE_TYPE_MASTER."`";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     array_push($return,$row);
                     
    			}
            }
			return $return;
		}
        public function select_charge_name($charge_type_id){
			$return = array();
			
			$q = "SELECT cnm.* FROM `".CHARGE_NAME_MASTER."` cnm, `".CHARGE_DETAIL."` cd 
                WHERE cnm.charge_name_id=cd.charge_name_id and cd.charge_type_id='".$charge_type_id."' group by cnm.charge_name_id";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     array_push($return,$row);
                     
    			}
            }
			return $return;
		}
        public function select_charge_detail($charge_type_id,$charge_name_id){
			$return = array();
			
			$q = "SELECT cd.* FROM `".CHARGE_DETAIL."` cd 
                WHERE cd.charge_type_id='".$charge_type_id."' and cd.charge_name_id='".$charge_name_id."'";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     array_push($return,$row);
                     
    			}
            }
			return $return;
		}
        public function select_broker_charge($id){
			$return = array();
			$q="SELECT ctm.charge_type_id,cnm.charge_name_id,cd.account_type,cd.account_process,cv.value FROM `".CHARGE_TYPE_MASTER."` ctm, `".CHARGE_NAME_MASTER."` cnm, `".CHARGE_DETAIL."` cd, `".CHARGE_VALUE."` cv WHERE ctm.charge_type_id=cd.charge_type_id and cnm.charge_name_id=cd.charge_name_id and cd.charge_detail_id=cv.charge_detail_id and cv.broker_id='".$id."'";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     $return[$row['charge_type_id']][$row['charge_name_id']][$row['account_type']][$row['account_process']]=$row['value'];
    			}
            }
			return $return;
		}
        
    }
?>
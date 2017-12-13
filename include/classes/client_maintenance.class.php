<?php
	class client_maintenance extends db{
		
		public $table = CLIENT_MASTER;
		public $errors = '';
        
        /**
		 * @param post array
		 * @return true if success, error message if any errors
		 * */ 
         
		public function insert_update($data){//echo '<pre>';print_r($data);exit;
			$id = isset($data['id'])?$this->re_db_input($data['id']):0;
			$fname = isset($data['fname'])?$this->re_db_input($data['fname']):'';
            $lname = isset($data['lname'])?$this->re_db_input($data['lname']):'';
            $mi = isset($data['mi'])?$this->re_db_input($data['mi']):'';
            $do_not_contact = isset($data['do_not_contact'])?$this->re_db_input($data['do_not_contact']):'';
            $active = isset($data['active'])?$this->re_db_input($data['active']):'';
            $long_name = isset($data['long_name'])?$this->re_db_input($data['long_name']):'';
            $client_file_number = isset($data['client_file_number'])?$this->re_db_input($data['client_file_number']):'';
            $clearing_account = isset($data['clearing_account'])?$this->re_db_input($data['clearing_account']):'';
            $client_ssn = isset($data['client_ssn'])?$this->re_db_input($data['client_ssn']):'';
            $account_type = isset($data['account_type'])?$this->re_db_input($data['account_type']):'';
            $household = isset($data['household'])?$this->re_db_input($data['household']):'';
            $broker_name = isset($data['broker_name'])?$this->re_db_input($data['broker_name']):'';
            $split_broker = isset($data['split_broker'])?$this->re_db_input($data['split_broker']):'';
            $split_rate = isset($data['split_rate'])?$this->re_db_input($data['split_rate']):'';
            $address1 = isset($data['address1'])?$this->re_db_input($data['address1']):'';
            $address2 = isset($data['address2'])?$this->re_db_input($data['address2']):'';
            $city = isset($data['city'])?$this->re_db_input($data['city']):'';
            $state = isset($data['state'])?$this->re_db_input($data['state']):'';
            $zip_code = isset($data['zip_code'])?$this->re_db_input($data['zip_code']):'';
            $age = isset($data['age'])?$this->re_db_input($data['age']):0;
            $ofak_check = isset($data['ofak_check'])?$this->re_db_input($data['ofak_check']):'';
            $fincen_check = isset($data['fincen_check'])?$this->re_db_input($data['fincen_check']):'';
            $citizenship = isset($data['citizenship'])?$this->re_db_input($data['citizenship']):'';
            $telephone_mask = isset($data['telephone'])?$this->re_db_input($data['telephone']):'';
            $telephone_no = str_replace("-", '', $telephone_mask);
            $telephone_brack1 = str_replace("(", '', $telephone_no);
            $telephone = str_replace(")", '', $telephone_brack1);
            $contact_status = isset($data['contact_status'])?$this->re_db_input($data['contact_status']):'';
            $birth_date = isset($data['birth_date'])?$this->re_db_input(date('Y-m-d',strtotime($data['birth_date']))):'';
            $date_established = isset($data['date_established'])?$this->re_db_input(date('Y-m-d',strtotime($data['date_established']))):'';
            $open_date = isset($data['open_date'])?$this->re_db_input(date('Y-m-d',strtotime($data['open_date']))):'';
            $naf_date = isset($data['naf_date'])?$this->re_db_input(date('Y-m-d',strtotime($data['naf_date']))):'';
            $last_contacted = isset($data['last_contacted'])?$this->re_db_input(date('Y-m-d',strtotime($data['last_contacted']))):'';
            
            if($lname==''){
				$this->errors = 'Please enter last name.';
			}
            else if($broker_name==''){
				$this->errors = 'Please select broker name.';
			}
            else if($client_file_number==''){
				$this->errors = 'Please enter client file number.';
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
				$q = "SELECT * FROM `".$this->table."` WHERE `is_delete`='0' AND `first_name`='".$fname."' ".$con;
				$res = $this->re_db_query($q);
				$return = $this->re_db_num_rows($res);
				if($return>0){
					$this->errors = 'This client is already exists.';
				}
				
				if($this->errors!=''){
					return $this->errors;
				}
				else if($id>=0){
					if($id==0){
						$q = "INSERT INTO `".$this->table."` SET `first_name`='".$fname."',`last_name`='".$lname."',`mi`='".$mi."',`do_not_contact`='".$do_not_contact."',`active`='".$active."',`ofac_check`='".$ofak_check."',`fincen_check`='".$fincen_check."',`long_name`='".$long_name."',`client_file_number`='".$client_file_number."',`clearing_account`='".$clearing_account."',`client_ssn`='".$client_ssn."',`house_hold`='".$household."',`split_broker`='".$split_broker."',`split_rate`='".$split_rate."',`address1`='".$address1."',`address2`='".$address2."',`city`='".$city."',`state`='".$state."',`zip_code`='".$zip_code."',`citizenship`='".$citizenship."',`birth_date`='".$birth_date."',`date_established`='".$date_established."',`age`='".$age."',`open_date`='".$open_date."',`naf_date`='".$naf_date."',`last_contacted`='".$last_contacted."',`account_type`='".$account_type."',`broker_name`='".$broker_name."',`telephone`='".$telephone."',`contact_status`='".$contact_status."'".$this->insert_common_sql();
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
						if($client_file_number!=''){
							$con .= " , `client_file`='".$client_file_number."' ";
						}
						$q = "UPDATE `".$this->table."` SET `first_name`='".$fname."',`last_name`='".$lname."',`account_type`='".$account_type."',`broker_name`='".$broker_name."',`telephone`='".$telephone."',`contact_status`='".$contact_status."' ".$con." ".$this->update_common_sql()." WHERE `id`='".$id."'";
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
        
        /**
		 * @param int status, default all
		 * @return array of record if success, error message if any errors
		 * */
		public function select(){
			$return = array();
			
			$q = "SELECT `at`.*,ac.type as account_type
					FROM `".$this->table."` AS `at`
                    LEFT JOIN `".ACCOUNT_TYPE."` as ac on ac.id=at.account_type
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
		 * @param int id
		 * @return array of record if success, error message if any errors
		 * */
		public function edit($id){
			$return = array();
			$q = "SELECT `at`.*
					FROM `".$this->table."` AS `at`
                    WHERE `at`.`is_delete`='0' AND `at`.`id`='".$id."'";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
    			$return = $this->re_db_fetch_array($res);
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
        
    }
?>
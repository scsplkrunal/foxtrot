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
            $client_file = isset($data['client_file'])?$this->re_db_input($data['client_file']):'';
            $account_type = isset($data['account_type'])?$this->re_db_input($data['account_type']):'';
            $broker_name = isset($data['broker_name'])?$this->re_db_input($data['broker_name']):'';
            $telephone = isset($data['telephone'])?$this->re_db_input($data['telephone']):'';
            $contact_status = isset($data['contact_status'])?$this->re_db_input($data['contact_status']):'';
			
			if($fname==''){
				$this->errors = 'Please enter first name.';
			}
            else if($lname==''){
				$this->errors = 'Please enter last name.';
			}
            else if($client_file==''){
				$this->errors = 'Please select file.';
			}
            else if($account_type==''){
				$this->errors = 'Please select account type.';
			}
            else if($broker_name==''){
				$this->errors = 'Please enter broker name.';
			}
            else if($telephone==''){
				$this->errors = 'Please enter telephone.';
			}
            else if($contact_status==''){
				$this->errors = 'Please select contact status.';
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
						$q = "INSERT INTO `".$this->table."` SET `first_name`='".$fname."',`last_name`='".$lname."',`client_file`='".$client_file."',`account_type`='".$account_type."',`broker_name`='".$broker_name."',`telephone`='".$telephone."',`contact_status`='".$contact_status."'".$this->insert_common_sql();
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
						$q = "UPDATE `".$this->table."` SET `first_name`='".$fname."',`last_name`='".$lname."',`client_file`='".$client_file."',`account_type`='".$account_type."',`broker_name`='".$broker_name."',`telephone`='".$telephone."',`contact_status`='".$contact_status."'".$this->update_common_sql()." WHERE `id`='".$id."'";
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
		public function select_account_type(){
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
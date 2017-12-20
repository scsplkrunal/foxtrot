<?php
	class branch_maintenance extends db{
		
		public $errors = '';
        public $table = BRANCH_MASTER;
        /**
		 * @param post array
		 * @return true if success, error message if any errors
		 * */
		
        public function insert_update($data){
            
			$id = isset($data['id'])?$this->re_db_input($data['id']):0;
            $name = isset($data['branch_name'])?$this->re_db_input($data['branch_name']):'';
            $broker = isset($data['manager'])?$this->re_db_input($data['manager']):'';
            $b_status = isset($data['status'])?$this->re_db_input($data['status']):'';
            $contact = isset($data['contact'])?$this->re_db_input($data['contact']):'';
            $osj = isset($data['osj'])?$this->re_db_input($data['osj']):'';
            $non_registered = isset($data['non_registered'])?$this->re_db_input($data['non_registered']):'';
            $finra_fee = isset($data['finra_fee'])?$this->re_db_input($data['finra_fee']):'';
            $business_address1 = isset($data['business_address1'])?$this->re_db_input($data['business_address1']):'';
            $business_address2 = isset($data['business_address2'])?$this->re_db_input($data['business_address2']):'';
            $business_city = isset($data['business_city'])?$this->re_db_input($data['business_city']):'';
            $business_state = isset($data['business_state'])?$this->re_db_input($data['business_state']):'';
            $business_zipcode = isset($data['business_zipcode'])?$this->re_db_input($data['business_zipcode']):'';
            $mailing_address1 = isset($data['mailing_address1'])?$this->re_db_input($data['mailing_address1']):'';
            $mailing_address2 = isset($data['mailing_address2'])?$this->re_db_input($data['mailing_address2']):'';
            $mailing_city = isset($data['mailing_city'])?$this->re_db_input($data['mailing_city']):'';
            $mailing_state = isset($data['mailing_state'])?$this->re_db_input($data['mailing_state']):'';
            $mailing_zipcode = isset($data['mailing_zipcode'])?$this->re_db_input($data['mailing_zipcode']):'';
            $email = isset($data['email'])?$this->re_db_input($data['email']):'';
            $website = isset($data['website'])?$this->re_db_input($data['website']):'';
            $phone = isset($data['phone'])?$this->re_db_input($data['phone']):'';
            $facsimile = isset($data['facsimile'])?$this->re_db_input($data['facsimile']):'';
            $date_established = isset($data['date_established'])?$this->re_db_input(date('Y-m-d',strtotime($data['date_established']))):'';
            $date_terminated = isset($data['date_terminated'])?$this->re_db_input(date('Y-m-d',strtotime($data['date_terminated']))):'';
            $finra_start_date = isset($data['finra_start_date'])?$this->re_db_input(date('Y-m-d',strtotime($data['finra_start_date']))):'';
            $finra_end_date = isset($data['finra_end_date'])?$this->re_db_input(date('Y-m-d',strtotime($data['finra_end_date']))):'';
            $last_audit_date = isset($data['last_audit_date'])?$this->re_db_input(date('Y-m-d',strtotime($data['last_audit_date']))):'';
			
            
			if($name==''){
				$this->errors = 'Please enter branch name.';
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
			$q = "SELECT * FROM `".$this->table."` WHERE `is_delete`='0' AND `name`='".$name."' ".$con;
			$res = $this->re_db_query($q);
			$return = $this->re_db_num_rows($res);
			if($return>0){
				$this->errors = 'This branch is already exists.';
			}
			
			if($this->errors!=''){
				return $this->errors;
			}
			else if($id>=0){
				if($id==0){
					$q = "INSERT INTO `".$this->table."` SET `name`='".$name."',`broker`='".$broker."',`b_status`='".$b_status."',`contact`='".$contact."',`osj`='".$osj."',`non_registered`='".$non_registered."',`finra_fee`='".$finra_fee."',`business_address1`='".$business_address1."',`business_address2`='".$business_address2."',`business_city`='".$business_city."',`business_state`='".$business_state."',`business_zipcode`='".$business_zipcode."',`mailing_address1`='".$mailing_address1."',`mailing_address2`='".$mailing_address2."',`mailing_city`='".$mailing_city."',`mailing_state`='".$mailing_state."',`mailing_zipcode`='".$mailing_zipcode."',`email`='".$email."',`website`='".$website."',`phone`='".$phone."',`facsimile`='".$facsimile."',`date_established`='".$date_established."',`date_terminated`='".$date_terminated."',`finra_start_date`='".$finra_start_date."',`finra_end_date`='".$finra_end_date."',`last_audit_date`='".$last_audit_date."'".$this->insert_common_sql();
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
					$q = "UPDATE `".$this->table."` SET `name`='".$name."',`broker`='".$broker."',`b_status`='".$b_status."',`contact`='".$contact."',`osj`='".$osj."',`non_registered`='".$non_registered."',`finra_fee`='".$finra_fee."',`business_address1`='".$business_address1."',`business_address2`='".$business_address2."',`business_city`='".$business_city."',`business_state`='".$business_state."',`business_zipcode`='".$business_zipcode."',`mailing_address1`='".$mailing_address1."',`mailing_address2`='".$mailing_address2."',`mailing_city`='".$mailing_city."',`mailing_state`='".$mailing_state."',`mailing_zipcode`='".$mailing_zipcode."',`email`='".$email."',`website`='".$website."',`phone`='".$phone."',`facsimile`='".$facsimile."',`date_established`='".$date_established."',`date_terminated`='".$date_terminated."',`finra_start_date`='".$finra_start_date."',`finra_end_date`='".$finra_end_date."',`last_audit_date`='".$last_audit_date."'".$this->update_common_sql()." WHERE `id`='".$id."'";
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
        public function select_state(){
			$return = array();
			
			$q = "SELECT `s`.*
					FROM `".STATE_MASTER."` AS `s`
                    WHERE `s`.`is_delete`='0' AND `s`.`status`='1'
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
        public function search($search_text=''){
			$return = array();
			$con = '';
            if($search_text!='' && $search_text>=0){
				$con .= " AND `clm`.`name` LIKE '%".$search_text."%' ";
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
        public function get_previous_branch($id){
			$return = array();
			
            $q = "SELECT `at`.*
					FROM `".$this->table."` AS `at`
                    WHERE `at`.`is_delete`='0' and `at`.`id`<".$id."
                    ORDER BY `at`.`id` DESC LIMIT 1";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $return = $this->re_db_fetch_array($res);
            }
            else
            {
                return false;
            }
			return $return;
		} 
        public function get_next_branch($id){
			$return = array();
			
            $q = "SELECT `at`.*
					FROM `".$this->table."` AS `at`
                    WHERE `at`.`is_delete`='0' and `at`.`id`>".$id."
                    ORDER BY `at`.`id` ASC LIMIT 1";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $return = $this->re_db_fetch_array($res);
            }
            else
            {
                return false;
            }
			return $return;
		}
        /**
		 * @param int id
		 * @return array of record if success, error message if any errors
		 * */
        public function edit($id){
			$return = array();
			$q = "SELECT `at`.*,`b`.first_name as broker_name
					FROM `".$this->table."` AS `at`
                    LEFT JOIN `".BROKER_MASTER."` as `b` on `b`.`id`=`at`.`broker` 
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
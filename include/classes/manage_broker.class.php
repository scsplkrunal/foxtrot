<?php
	class broker_master extends db{
		
		public $table = BROKER_MASTER;
		public $errors = '';
        
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
			
			
			if($fname==''){
				$this->errors = 'Please enter first name.';
			}
            else if($lname==''){
				$this->errors = 'Please enter last name.';
			}
            else if($mname==''){
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
					$this->errors = 'This broker is already exists.';
				}
				
				if($this->errors!=''){
					return $this->errors;
				}
				else if($id>=0){
					if($id==0){
						$q = "INSERT INTO `".$this->table."` SET `first_name`='".$fname."',`last_name`='".$lname."',`middle_name`='".$mname."',`suffix`='".$suffix."',`fund`='".$fund."',`internal`='".$internal."',`tax_id`='".$tax_id."',`crd`='".$crd."',`ssn`='".$ssn."',`active_status`='".$active_status_cdd."',`pay_method`='".$pay_method."',`branch_manager`='".$branch_manager."'".$this->insert_common_sql();
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
        
    }
?>
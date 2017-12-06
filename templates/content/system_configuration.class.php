<?php
	class system_master extends db{
		
		public $table = SYSTEM_CONFIGURATION;
		public $errors = '';
        
        /**
		 * @param post array
		 * @return true if success, error message if any errors
		 * */
		public function update($data){
			$id = isset($data['id'])?$this->re_db_input($data['id']):0;
			$company_name = isset($data['company_name'])?$this->re_db_input($data['company_name']):'';
			$address1 = isset($data['address1'])?$this->re_db_input($data['address1']):'';
            $address2 = isset($data['address2'])?$this->re_db_input($data['address2']):'';
            $city = isset($data['city'])?$this->re_db_input($data['city']):'';
            $state = isset($data['state'])?$this->re_db_input($data['state']):'';
            $zip = isset($data['zip'])?$this->re_db_input($data['zip']):'';
            $minimum_check_amount = isset($data['minimum_check_amount'])?$this->re_db_input($data['minimum_check_amount']):'';
            $finra = isset($data['finra'])?$this->re_db_input($data['finra']):'';
            $sipc = isset($data['sipc'])?$this->re_db_input($data['sipc']):'';
            $brocker_pick_lists = isset($data['brocker_pick_lists'])?$this->re_db_input($data['brocker_pick_lists']):'';
            $branch_pick_lists = isset($data['branch_pick_lists'])?$this->re_db_input($data['branch_pick_lists']):'';
            $brocker_statement = isset($data['brocker_statement'])?$this->re_db_input($data['brocker_statement']):'';
            
            if($brocker_pick_lists=='on')
            {
                $brocker_pick_lists=1;
            }
            else
            {
                $brocker_pick_lists=0;
            }
            if($branch_pick_lists=='on')
            {
                $branch_pick_lists=1;
            }
            else
            {
                $branch_pick_lists=0;
            }
            if($brocker_statement=='on')
            {
                $brocker_statement=1;
            }
            else
            {
                $brocker_statement=0;
            }
            
            /*$logo=isset($data['logo'])?$this->re_db_input($data['logo']):'';
            
            $file_ext=strtolower(end(explode('.',$_FILES['logo']['name'])));
            $expensions= array("jpeg","jpg","png");
                
                if(in_array($file_ext,$expensions)=== false){
                    $this->$errors +="extension not allowed, please choose a JPEG or PNG file.";
                }*/
            //$ = isset($data[''])?$this->re_db_input($data['']):'';
			if($company_name==''){
				$this->errors += 'Please enter company name.';
			}
			
			if($this->errors!=''){
				return $this->errors;
			}
			else{
					if($id==0){
					$q = "UPDATE `".$this->table."` SET `company_name`='".$company_name."',`address1`='".$address1."',`address2`='".$address2."',`city`='".$city."',
                                `state`='".$state."',`zip`='".$zip."',`minimum_check_amount`='".$minimum_check_amount."',`finra`='".$finra."',`sipc`='".$sipc."',`brocker_pick_lists`='".$brocker_pick_lists."',
                                `branch_pick_lists`='".$branch_pick_lists."',`brocker_statement`='".$brocker_statement."' ".$this->insert_common_sql()."where id=1";
                                
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
		/*public function delete($id){
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
		}*/
        
    }
?>
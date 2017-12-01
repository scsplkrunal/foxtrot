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
            $account_type = isset($data['account_type'])?$this->re_db_input($data['account_type']):'';
            $broker_name = isset($data['broker_name'])?$this->re_db_input($data['broker_name']):'';
            $telephone_mask = isset($data['telephone'])?$this->re_db_input($data['telephone']):'';
            $telephone = str_replace("-", '', $telephone_mask);
            $contact_status = isset($data['contact_status'])?$this->re_db_input($data['contact_status']):'';
            
            $client_file = isset($_FILES['client_file'])?$_FILES['client_file']:array();//print_r($client_file);exit;
            $valid_file = array('xls','pdf','zip','txt');
			
			if($fname==''){
				$this->errors = 'Please enter first name.';
			}
            else if($lname==''){
				$this->errors = 'Please enter last name.';
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
            else if(is_numeric($telephone) == false){
                $this->errors = 'Please enter telephone number numeric.';
            }
            else if($contact_status==''){
				$this->errors = 'Please select contact status.';
			}
			
			else if($client_file['tmp_name']=='' && $id==0){
				$this->errors = 'Please select client file.';
			}
			if($this->errors!=''){
				return $this->errors;
			}
            
            $file_image = '';  
            
            $file_name = isset($client_file['name'])?$client_file['name']:'';
            $tmp_name = isset($client_file['tmp_name'])?$client_file['tmp_name']:'';
            $error = isset($client_file['error'])?$client_file['error']:0;
            $size = isset($client_file['size'])?$client_file['size']:'';
            $type = isset($client_file['type'])?$client_file['type']:'';
            $target_dir = DIR_FS."upload/";
            $ext = strtolower(end(explode('.',$file_name)));
            if($file_name!='')
            {
                if(!in_array($ext,$valid_file))
                {
                    $this->errors = 'Please select valid file.';
                }
                else
                {
                    $attachment_file = time().rand(100000,999999).'.'.$ext;
                    move_uploaded_file($tmp_name,$target_dir.$attachment_file);
                    $file_image = $attachment_file;
                }
                
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
						$q = "INSERT INTO `".$this->table."` SET `first_name`='".$fname."',`last_name`='".$lname."',`client_file`='".$file_image."',`account_type`='".$account_type."',`broker_name`='".$broker_name."',`telephone`='".$telephone."',`contact_status`='".$contact_status."'".$this->insert_common_sql();
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
						if($file_image!=''){
							$con .= " , `client_file`='".$file_image."' ";
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
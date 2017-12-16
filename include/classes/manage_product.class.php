<?php
	class product_master extends db{
		
		public $table = PRODUCT_TYPE;
		public $errors = '';
        
        /**
		 * @param post array
		 * @return true if success, error message if any errors
		 * */
		public function insert_update($data){
			$id = isset($data['id'])?$this->re_db_input($data['id']):0;
			$type = isset($data['type'])?$this->re_db_input($data['type']):'';
			
			if($type==''){
				$this->errors = 'Please enter type.';
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
				$q = "SELECT * FROM `".$this->table."` WHERE `is_delete`='0' AND `type`='".$type."' ".$con;
				$res = $this->re_db_query($q);
				$return = $this->re_db_num_rows($res);
				if($return>0){
					$this->errors = 'This type is already exists.';
				}
				
				if($this->errors!=''){
					return $this->errors;
				}
				else if($id>=0){
					if($id==0){
						$q = "INSERT INTO `".$this->table."` SET `type`='".$type."'".$this->insert_common_sql();
						$res = $this->re_db_query($q);
                        $id = $this->re_db_insert_id();
						if($res){
						    $q = "CREATE TABLE product_category_".$id."
                                    (id INT(12) PRIMARY KEY AUTO_INCREMENT,
                                        category INT(12),
                                        name VARCHAR(100),
                                        sponsor VARCHAR(100),
                                        ticker_symbol VARCHAR(100),
                                        cusip VARCHAR(100),
                                        security VARCHAR(100),
                                        receive TINYINT(1),
                                        income VARCHAR(100),
                                        networth VARCHAR(100),
                                        networthonly VARCHAR(100),
                                        minimum_investment VARCHAR(100),
                                        minimum_offer VARCHAR(100),
                                        maximum_offer VARCHAR(100),
                                        objective VARCHAR(100),
                                        non_commissionable VARCHAR(100),
                                        class_type VARCHAR(100),
                                        fund_code VARCHAR(100),
                                        sweep_fee VARCHAR(100),
                                        min_threshold VARCHAR(100),
                                        max_threshold VARCHAR(100),
                                        min_rate FLOAT(8,2),
                                        max_rate FLOAT(8,2),
                                        ria_specific VARCHAR(100),
                                        ria_specific_type VARCHAR(100),
                                        based VARCHAR(100),
                                        fee_rate VARCHAR(100),
                                        st_bo VARCHAR(100),
                                        m_date DATETIME,
                                        type VARCHAR(100),
                                        var VARCHAR(100),
                                        reg_type VARCHAR(100),
                                        status TINYINT(1) NOT NULL DEFAULT '1',
                                        is_delete TINYINT(1) NOT NULL DEFAULT '0',
                                        created_by  INT(12),
                                        created_time DATETIME,
                                        created_ip VARCHAR(100),
                                        modified_by  INT(12),
                                        modified_time DATETIME,
                                        modified_ip VARCHAR(100)
                                    );";
						    $res = $this->re_db_query($q);
                            
						    $_SESSION['success'] = INSERT_MESSAGE;
							return true;
						}
						else{
							$_SESSION['warning'] = UNKWON_ERROR;
							return false;
						}
					}
					else if($id>0){
						$q = "UPDATE `".$this->table."` SET `type`='".$type."' ".$this->update_common_sql()." WHERE `id`='".$id."'";
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
		public function select_product_type(){
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
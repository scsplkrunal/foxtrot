<?php
	class product_maintenance extends db{
		
		public $table = PRODUCT_MAINTENANCE;
		public $errors = '';
        
        /**
		 * @param post array
		 * @return true if success, error message if any errors
		 * */
		public function insert_update($data){
            
			$id = isset($data['id'])?$this->re_db_input($data['id']):0;
			$category = isset($data['product_category'])?$this->re_db_input($data['product_category']):'';
            $name = isset($data['name'])?$this->re_db_input($data['name']):'';
            $sponsor = isset($data['sponsor'])?$this->re_db_input($data['sponsor']):'';
            $ticker_symbol = isset($data['ticker_symbol'])?$this->re_db_input($data['ticker_symbol']):'';
            $cusip = isset($data['cusip'])?$this->re_db_input($data['cusip']):'';
            $security = isset($data['security'])?$this->re_db_input($data['security']):'';
            $receive = isset($data['allowable_receivable'])?$this->re_db_input($data['allowable_receivable']):'';
            $income = isset($data['income'])?$this->re_db_input($data['income']):'';
            $networth = isset($data['networth'])?$this->re_db_input($data['networth']):'';
            $networthonly = isset($data['networthonly'])?$this->re_db_input($data['networthonly']):'';
            $minimum_investment = isset($data['minimum_investment'])?$this->re_db_input($data['minimum_investment']):'';
            $minimum_offer = isset($data['minimum_offer'])?$this->re_db_input($data['minimum_offer']):'';
            $maximum_offer = isset($data['maximum_offer'])?$this->re_db_input($data['maximum_offer']):'';
            $objective = isset($data['objective'])?$this->re_db_input($data['objective']):'';
            $non_commissionable = isset($data['non_commissionable'])?$this->re_db_input($data['non_commissionable']):'';
            $class_type = isset($data['class_type'])?$this->re_db_input($data['class_type']):'';
            $fund_code = isset($data['fund_code'])?$this->re_db_input($data['fund_code']):'';
            $sweep_fee = isset($data['sweep_fee'])?$this->re_db_input($data['sweep_fee']):'';
            $threshold = isset($data['threshold'])?$this->re_db_input($data['threshold']):'';
            $rate = isset($data['rate'])?$this->re_db_input($data['rate']):'';
            $ria_specific = isset($data['investment_banking_type'])?$this->re_db_input($data['investment_banking_type']):'';
            $ria_specific_type = isset($data['ria_specific_type'])?$this->re_db_input($data['ria_specific_type']):'';
            $based = isset($data['based_type'])?$this->re_db_input($data['based_type']):'';
            $fee_rate = isset($data['fee_rate'])?$this->re_db_input($data['fee_rate']):'';
            $st_bo = isset($data['stocks_bonds'])?$this->re_db_input($data['stocks_bonds']):'';
            $m_date = isset($data['maturity_date'])?$this->re_db_input($data['maturity_date']):'';
            $type = isset($data['type'])?$this->re_db_input($data['type']):'';
            $var = isset($data['variable_annuities'])?$this->re_db_input($data['variable_annuities']):'';
            $reg_type = isset($data['registration_type'])?$this->re_db_input($data['registration_type']):'';
            
			
			if($category==''){
				$this->errors = 'Please enter product category.';
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
				$q = "SELECT * FROM `".$this->table."` WHERE `is_delete`='0' AND `category`='".$category."' ".$con;
				$res = $this->re_db_query($q);
				$return = $this->re_db_num_rows($res);
				if($return>0){
					$this->errors = 'This category is already exists.';
				}
				
				if($this->errors!=''){
					return $this->errors;
				}
				else if($id>=0){
					if($id==0){
						$q = "INSERT INTO `".$this->table."` SET `category`='".$category."',`name`='".$name."',`sponsor`='".$sponsor."',`ticker_symbol`='".$ticker_symbol."',`cusip`='".$cusip."',`security`='".$security."',`receive`='".$receive."',`income`='".$income."',`networth`='".$networth."',`networthonly`='".$networthonly."',`minimum_investment`='".$minimum_investment."',`minimum_offer`='".$minimum_offer."',`maximum_offer`='".$maximum_offer."',`objective`='".$objective."',`non_commissionable`='".$non_commissionable."',`class_type`='".$class_type."',`fund_code`='".$fund_code."',`sweep_fee`='".$sweep_fee."',`threshold`='".$threshold."',`rate`='".$rate."',`ria_specific`='".$ria_specific."',`ria_specific_type`='".$ria_specific_type."',`based`='".$based."',`fee_rate`='".$fee_rate."',`st_bo`='".$st_bo."',`m_date`='".$m_date."',`type`='".$type."',`var`='".$var."',`reg_type`='".$reg_type."'".$this->insert_common_sql();
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
						$q = "UPDATE `".$this->table."` SET `category`='".$category."',`name`='".$name."',`sponsor`='".$sponsor."',`ticker_symbol`='".$ticker_symbol."',`cusip`='".$cusip."',`security`='".$security."',`receive`='".$receive."',`income`='".$income."',`networth`='".$networth."',`networthonly`='".$networthonly."',`minimum_investment`='".$minimum_investment."',`minimum_offer`='".$minimum_offer."',`maximum_offer`='".$maximum_offer."',`objective`='".$objective."',`non_commissionable`='".$non_commissionable."',`class_type`='".$class_type."',`fund_code`='".$fund_code."',`sweep_fee`='".$sweep_fee."',`threshold`='".$threshold."',`rate`='".$rate."',`ria_specific`='".$ria_specific."',`ria_specific_type`='".$ria_specific_type."',`based`='".$based."',`fee_rate`='".$fee_rate."',`st_bo`='".$st_bo."',`m_date`='".$m_date."',`type`='".$type."',`var`='".$var."',`reg_type`='".$reg_type."'".$this->update_common_sql()." WHERE `id`='".$id."'";
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
        public function insert_update_sponsor($data){
            
			$id = isset($data['id'])?$this->re_db_input($data['id']):0;
			$sponser_name = isset($data['sponser_name'])?$this->re_db_input($data['sponser_name']):'';
            $saddress1 = isset($data['saddress1'])?$this->re_db_input($data['saddress1']):'';
            $saddress2 = isset($data['saddress2'])?$this->re_db_input($data['saddress2']):'';
            $scity = isset($data['scity'])?$this->re_db_input($data['scity']):'';
            $sstate = isset($data['sstate'])?$this->re_db_input($data['sstate']):'';
            $szip_code = isset($data['szip_code'])?$this->re_db_input($data['szip_code']):'';
            $semail = isset($data['semail'])?$this->re_db_input($data['semail']):'';
            $swebsite = isset($data['swebsite'])?$this->re_db_input($data['swebsite']):'';
            $sgeneral_contact = isset($data['sgeneral_contact'])?$this->re_db_input($data['sgeneral_contact']):'';
            $sgeneral_phone = isset($data['sgeneral_phone'])?$this->re_db_input($data['sgeneral_phone']):'';
            $soperations_contact = isset($data['soperations_contact'])?$this->re_db_input($data['soperations_contact']):'';
            $soperations_phone = isset($data['soperations_phone'])?$this->re_db_input($data['soperations_phone']):'';
            $sdst_system_id = isset($data['sdst_system_id'])?$this->re_db_input($data['sdst_system_id']):'';
            $sdst_mgmt_code = isset($data['sdst_mgmt_code'])?$this->re_db_input($data['sdst_mgmt_code']):'';
            $sdst_import = isset($data['sdst_import'])?$this->re_db_input($data['sdst_import']):'';
            $sdazl_code = isset($data['sdazl_code'])?$this->re_db_input($data['sdazl_code']):'';
            $sdazl_import = isset($data['sdazl_import'])?$this->re_db_input($data['sdazl_import']):'';
            $sdtcc_nscc = isset($data['sdtcc_nscc'])?$this->re_db_input($data['sdtcc_nscc']):'';
            $sclr_firm = isset($data['sclr_firm'])?$this->re_db_input($data['sclr_firm']):'';
            
			/* check duplicate record */
			$con = '';
			if($id>0){
				$con = " AND `id`!='".$id."'";
			}
			$q = "SELECT * FROM `".SPONSOR_MASTER."` WHERE `is_delete`='0' AND `name`='".$sponser_name."' ".$con;
			$res = $this->re_db_query($q);
			$return = $this->re_db_num_rows($res);
			if($return>0){
				$this->errors = 'This sponser is already exists.';
			}
			
			if($this->errors!=''){
				return $this->errors;
			}
			else if($id>=0){
				if($id==0){
					$q = "INSERT INTO `".SPONSOR_MASTER."` SET `name`='".$sponser_name."',`address1`='".$saddress1."',`address2`='".$saddress2."',`city`='".$scity."',`state`='".$sstate."',`zip_code`='".$szip_code."',`email`='".$semail."',`website`='".$swebsite."',`general_contact`='".$sgeneral_contact."',`general_phone`='".$sgeneral_phone."',`operations_contact`='".$soperations_contact."',`operations_phone`='".$soperations_phone."',`dst_system_id`='".$sdst_system_id."',`dst_mgmt_code`='".$sdst_mgmt_code."',`dst_importing`='".$sdst_import."',`dazl_code`='".$sdazl_code."',`dazl_importing`='".$sdazl_import."',`dtcc_nscc_id`='".$sdtcc_nscc."',`clearing_firm_id`='".$sclr_firm."'".$this->insert_common_sql();
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
					$q = "UPDATE `".SPONSOR_MASTER."` SET `name`='".$sponser_name."',`address1`='".$saddress1."',`address2`='".$saddress2."',`city`='".$scity."',`state`='".$sstate."',`zip_code`='".$szip_code."',`email`='".$semail."',`website`='".$swebsite."',`general_contact`='".$sgeneral_contact."',`general_phone`='".$sgeneral_phone."',`operations_contact`='".$soperations_contact."',`operations_phone`='".$soperations_phone."',`dst_system_id`='".$sdst_system_id."',`dst_mgmt_code`='".$sdst_mgmt_code."',`dst_importing`='".$sdst_import."',`dazl_code`='".$sdazl_code."',`dazl_importing`='".$sdazl_import."',`dtcc_nscc_id`='".$sdtcc_nscc."',`clearing_firm_id`='".$sclr_firm."'".$this->update_common_sql()." WHERE `id`='".$id."'";
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
        /**
		 * @param int status, default all
		 * @return array of record if success, error message if any errors
		 * */
		public function select_product_category(){
			$return = array();
			
			$q = "SELECT `at`.*,pc.type,sp.name as sponsor
					FROM `".$this->table."` AS `at`
                    LEFT JOIN `".PRODUCT_TYPE."` as `pc` on `pc`.`id`=`at`.`category`
                    LEFT JOIN `".SPONSOR_MASTER."` as `sp` on `sp`.`id`=`at`.`sponsor`
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
        public function select_category(){
			$return = array();
			
			$q = "SELECT `at`.*
					FROM `".PRODUCT_TYPE."` AS `at`
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
		/*public function status($id,$status){
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
		}*/
		
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
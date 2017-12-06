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
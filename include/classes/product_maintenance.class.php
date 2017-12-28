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
            $objective = isset($data['objectives'])?$this->re_db_input($data['objectives']):'';
            $non_commissionable = isset($data['non_commissionable'])?$this->re_db_input($data['non_commissionable']):'';
            $class_type = isset($data['class_type'])?$this->re_db_input($data['class_type']):'';
            $fund_code = isset($data['fund_code'])?$this->re_db_input($data['fund_code']):'';
            $sweep_fee = isset($data['sweep_fee'])?$this->re_db_input($data['sweep_fee']):'';
            $min_threshold = isset($data['min_threshold'])?$this->re_db_input($data['min_threshold']):'';
            $max_threshold = isset($data['max_threshold'])?$this->re_db_input($data['max_threshold']):'';
            $min_rate = isset($data['min_rate'])?$this->re_db_input($data['min_rate']):'';
            $max_rate = isset($data['max_rate'])?$this->re_db_input($data['max_rate']):'';
            $ria_specific = isset($data['investment_banking_type'])?$this->re_db_input($data['investment_banking_type']):'';
            $ria_specific_type = isset($data['ria_specific_type'])?$this->re_db_input($data['ria_specific_type']):'';
            $based = isset($data['based_type'])?$this->re_db_input($data['based_type']):'';
            $fee_rate = isset($data['fee_rate'])?$this->re_db_input($data['fee_rate']):'';
            $st_bo = isset($data['stocks_bonds'])?$this->re_db_input($data['stocks_bonds']):'';
            $m_date = isset($data['maturity_date'])?$this->re_db_input(date('Y-m-d',strtotime($data['maturity_date']))):'';
            $type = isset($data['type'])?$this->re_db_input($data['type']):'';
            $var = isset($data['variable_annuities'])?$this->re_db_input($data['variable_annuities']):'';
            $reg_type = isset($data['registration_type'])?$this->re_db_input($data['registration_type']):'';
            
			
			if($name==''){
				$this->errors = 'Please enter product name.';
			}
            else if($category==''){
				$this->errors = 'Please select product category.';
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
				$q = "SELECT * FROM `product_category_".$category."` WHERE `is_delete`='0' AND `name`='".$name."'".$con;
				$res = $this->re_db_query($q);
				$return = $this->re_db_num_rows($res);
				if($return>0){
					$this->errors = 'This product is already exists.';
				}
				
				if($this->errors!=''){
					return $this->errors;
				}
				else if($id>=0){
					if($id==0){
						$q = "INSERT INTO `product_category_".$category."` SET `category`='".$category."',`name`='".$name."',`sponsor`='".$sponsor."',`ticker_symbol`='".$ticker_symbol."',`cusip`='".$cusip."',`security`='".$security."',`receive`='".$receive."',`income`='".$income."',`networth`='".$networth."',`networthonly`='".$networthonly."',`minimum_investment`='".$minimum_investment."',`minimum_offer`='".$minimum_offer."',`maximum_offer`='".$maximum_offer."',`objective`='".$objective."',`non_commissionable`='".$non_commissionable."',`class_type`='".$class_type."',`fund_code`='".$fund_code."',`sweep_fee`='".$sweep_fee."',`min_threshold`='".$min_threshold."',`max_threshold`='".$max_threshold."',`min_rate`='".$min_rate."',`max_rate`='".$max_rate."',`ria_specific`='".$ria_specific."',`ria_specific_type`='".$ria_specific_type."',`based`='".$based."',`fee_rate`='".$fee_rate."',`st_bo`='".$st_bo."',`m_date`='".$m_date."',`type`='".$type."',`var`='".$var."',`reg_type`='".$reg_type."'".$this->insert_common_sql();
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
						$q = "UPDATE `product_category_".$category."` SET `category`='".$category."',`name`='".$name."',`sponsor`='".$sponsor."',`ticker_symbol`='".$ticker_symbol."',`cusip`='".$cusip."',`security`='".$security."',`receive`='".$receive."',`income`='".$income."',`networth`='".$networth."',`networthonly`='".$networthonly."',`minimum_investment`='".$minimum_investment."',`minimum_offer`='".$minimum_offer."',`maximum_offer`='".$maximum_offer."',`objective`='".$objective."',`non_commissionable`='".$non_commissionable."',`class_type`='".$class_type."',`fund_code`='".$fund_code."',`sweep_fee`='".$sweep_fee."',`min_threshold`='".$min_threshold."',`max_threshold`='".$max_threshold."',`min_rate`='".$min_rate."',`max_rate`='".$max_rate."',`ria_specific`='".$ria_specific."',`ria_specific_type`='".$ria_specific_type."',`based`='".$based."',`fee_rate`='".$fee_rate."',`st_bo`='".$st_bo."',`m_date`='".$m_date."',`type`='".$type."',`var`='".$var."',`reg_type`='".$reg_type."'".$this->update_common_sql()." WHERE `id`='".$id."'";
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
        public function insert_update_product_notes($data){//print_r($data);
			$notes_id = isset($data['notes_id'])?$this->re_db_input($data['notes_id']):0;
			$date = isset($data['date'])?$this->re_db_input($data['date']):'';
            $user_id = isset($data['user_id'])?$this->re_db_input($data['user_id']):'';
            $client_note = isset($data['client_note'])?$this->re_db_input($data['client_note']):'';
            
            if($client_note==''){
				$this->errors = 'Please enter notes.';
			}
			if($this->errors!=''){
				return $this->errors;
			}
			else{
                if($notes_id==0){
                    $q = "INSERT INTO `".PRODUCT_NOTES."` SET `date`='".$date."',`user_id`='".$user_id."',`notes`='".$client_note."'".$this->insert_common_sql();
			        $res = $this->re_db_query($q);
                    
                    $notes_id = $this->re_db_insert_id();
    				if($res){
    				    $_SESSION['success'] = INSERT_MESSAGE;
    					return true;
    				}
    				else{
    					$_SESSION['warning'] = UNKWON_ERROR;
    					return false;
    				}
    			}
    			else if($notes_id>0){
    			    
                    $q = "UPDATE `".PRODUCT_NOTES."` SET `date`='".$date."',`user_id`='".$user_id."',`notes`='".$client_note."'".$this->update_common_sql()." WHERE `id`='".$notes_id."'";
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
		}
        public function select_notes(){
			$return = array();
			
			$q = "SELECT `s`.*
					FROM `".PRODUCT_NOTES."` AS `s`
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
        public function delete_notes($id){
			$id = trim($this->re_db_input($id));
			if($id>0){
				$q = "UPDATE `".PRODUCT_NOTES."` SET `is_delete`='1' WHERE `id`='".$id."'";
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
        /**
		 * @param int status, default all
		 * @return array of record if success, error message if any errors
		 * */
		public function select_product_category($category=''){
			$return = array();
			
			$q = "SELECT `at`.*,pc.type,sp.name as sponsor
					FROM `product_category_".$category."` AS `at`
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
        public function search_product($search_text='',$search_category=''){
			$return = array();
			$con = '';
            if($search_text!='' && $search_text>=0){
				$con .= " AND (`clm`.`name` LIKE '".$search_text."%' || `clm`.`cusip` LIKE '".$search_text."%' || `clm`.`ticker_symbol` LIKE '".$search_text."%') ";
			}
            
            $q = "SELECT `clm`.*,pc.type,sp.name as sponsor
					FROM `product_category_".$search_category."` AS `clm`
                    LEFT JOIN `".PRODUCT_TYPE."` as `pc` on `pc`.`id`=`clm`.`category`
                    LEFT JOIN `".SPONSOR_MASTER."` as `sp` on `sp`.`id`=`clm`.`sponsor`
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
		public function edit_product($id,$category=''){
			$return = array();
			$q = "SELECT `at`.*
					FROM `product_category_".$category."` AS `at`
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
		public function product_status($id,$status,$category=''){
			$id = trim($this->re_db_input($id));
			$status = trim($this->re_db_input($status));
			if($id>0 && ($status==0 || $status==1) ){
				$q = "UPDATE `product_category_".$category."` SET `status`='".$status."' WHERE `id`='".$id."'";
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
		public function product_delete($id,$category=''){
			$id = trim($this->re_db_input($id));
            $category = trim($this->re_db_input($category));
			if($id>0 && ($status==0 || $status==1) ){
				$q = "UPDATE `product_category_".$category."` SET `is_delete`='1' WHERE `id`='".$id."'";
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
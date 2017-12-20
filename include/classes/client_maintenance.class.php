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
            //print_r($last_contacted);exit;
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
                        $_SESSION['client_id'] = $this->re_db_insert_id();
                        $get_name = $this->get_client_name($_SESSION['client_id']);//print_r($get_name);exit;
                        $_SESSION['client_full_name'] = $get_name[0]['first_name'].' '.$get_name[0]['mi'].'.'.$get_name[0]['last_name'];
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
					    
						$q = "UPDATE `".$this->table."` SET `first_name`='".$fname."',`last_name`='".$lname."',`mi`='".$mi."',`do_not_contact`='".$do_not_contact."',`active`='".$active."',`ofac_check`='".$ofak_check."',`fincen_check`='".$fincen_check."',`long_name`='".$long_name."',`client_file_number`='".$client_file_number."',`clearing_account`='".$clearing_account."',`client_ssn`='".$client_ssn."',`house_hold`='".$household."',`split_broker`='".$split_broker."',`split_rate`='".$split_rate."',`address1`='".$address1."',`address2`='".$address2."',`city`='".$city."',`state`='".$state."',`zip_code`='".$zip_code."',`citizenship`='".$citizenship."',`birth_date`='".$birth_date."',`date_established`='".$date_established."',`age`='".$age."',`open_date`='".$open_date."',`naf_date`='".$naf_date."',`last_contacted`='".$last_contacted."',`account_type`='".$account_type."',`broker_name`='".$broker_name."',`telephone`='".$telephone."',`contact_status`='".$contact_status."'".$this->update_common_sql()." WHERE `id`='".$id."'";
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
        public function insert_update_employment($data){//echo '<pre>';print_r($data);exit;
			$id = isset($data['employment_id'])?$this->re_db_input($data['employment_id']):0;
			$occupation = isset($data['occupation'])?$this->re_db_input($data['occupation']):'';
            $employer = isset($data['employer'])?$this->re_db_input($data['employer']):'';
            $address_employement = isset($data['address_employement'])?$this->re_db_input($data['address_employement']):'';
            $position = isset($data['position'])?$this->re_db_input($data['position']):'';
            $security_related_firm = isset($data['security_related_firm'])?$this->re_db_input($data['security_related_firm']):'';
            $finra_affiliation = isset($data['finra_affiliation'])?$this->re_db_input($data['finra_affiliation']):'';
            $spouse_name = isset($data['spouse_name'])?$this->re_db_input($data['spouse_name']):'';
            $spouse_ssn_mask = isset($data['spouse_ssn'])?$this->re_db_input($data['spouse_ssn']):'';
            $spouse_ssn = str_replace("-", '', $spouse_ssn_mask);
            $dependents = isset($data['dependents'])?$this->re_db_input($data['dependents']):'';
            $salutation = isset($data['salutation'])?$this->re_db_input($data['salutation']):'';
            $options = isset($data['options'])?$this->re_db_input($data['options']):'';
            $other = isset($data['other'])?$this->re_db_input($data['other']):'';
            $number = isset($data['number'])?$this->re_db_input($data['number']):'';
            $expiration = isset($data['expiration'])?$this->re_db_input(date('Y-m-d',strtotime($data['expiration']))):'';
            $state_employe = isset($data['state_employe'])?$this->re_db_input($data['state_employe']):'';
            $date_verified = isset($data['date_verified'])?$this->re_db_input(date('Y-m-d',strtotime($data['date_verified']))):'';
            $telephone_mask = isset($data['telephone_employment'])?$this->re_db_input($data['telephone_employment']):'';
            $telephone_no = str_replace("-", '', $telephone_mask);
            $telephone_brack1 = str_replace("(", '', $telephone_no);
            $telephone_employment = str_replace(")", '', $telephone_brack1);
            
            if($id==0){
				$q = "INSERT INTO `".CLIENT_EMPLOYMENT."` SET `client_id`='".$_SESSION['client_id']."',`occupation`='".$occupation."',`employer`='".$employer."',`address`='".$address_employement."',`position`='".$position."',`security_related_firm`='".$security_related_firm."',`finra_affiliation`='".$finra_affiliation."',`spouse_name`='".$spouse_name."',`spouse_ssn`='".$spouse_ssn."',`dependents`='".$dependents."',`salutation`='".$salutation."',`options`='".$options."',`other`='".$other."',`number`='".$number."',`expiration`='".$expiration."',`state`='".$state_employe."',`date_verified`='".$date_verified."',`telephone`='".$telephone_employment."'".$this->insert_common_sql();
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
			    
				$q = "UPDATE `".CLIENT_EMPLOYMENT."` SET `client_id`='".$id."',`occupation`='".$occupation."',`employer`='".$employer."',`address`='".$address_employement."',`position`='".$position."',`security_related_firm`='".$security_related_firm."',`finra_affiliation`='".$finra_affiliation."',`spouse_name`='".$spouse_name."',`spouse_ssn`='".$spouse_ssn."',`dependents`='".$dependents."',`salutation`='".$salutation."',`options`='".$options."',`other`='".$other."',`number`='".$number."',`expiration`='".$expiration."',`state`='".$state_employe."',`date_verified`='".$date_verified."',`telephone`='".$telephone_employment."'".$this->update_common_sql()." WHERE `client_id`='".$id."'";
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
        public function insert_update_account($data){
			$id = isset($data['account_id'])?$this->re_db_input($data['account_id']):0;
			$account_no = isset($data['account_no'])?$data['account_no']:array();
            $sponsor = isset($data['sponsor'])?$data['sponsor']:array();
            
            if($id==0){
                foreach($account_no as $key_acc=>$val_acc)
                {
    				$q = "INSERT INTO `".CLIENT_ACCOUNT."` SET `client_id`='".$_SESSION['client_id']."',`account_no`='".$val_acc."',`sponsor_company`='".$sponsor[$key_acc]."'".$this->insert_common_sql();
    				$res = $this->re_db_query($q);
                }
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
			    
                $q = "UPDATE `".CLIENT_ACCOUNT."` SET `is_delete`='1' WHERE `client_id`='".$id."'";
				$res = $this->re_db_query($q);
                foreach($account_no as $key_acc=>$val_acc)
                {
    				$q = "INSERT INTO `".CLIENT_ACCOUNT."` SET `client_id`='".$id."',`account_no`='".$val_acc."',`sponsor_company`='".$sponsor[$key_acc]."'".$this->insert_common_sql();
    				$res = $this->re_db_query($q);
                }
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
        public function insert_update_suitability($data){
            $id = isset($data['suitability_id'])?$this->re_db_input($data['suitability_id']):0;
            $income = isset($data['income'])?$this->re_db_input($data['income']):'';
            $goal_horizone = isset($data['goal_horizone'])?$this->re_db_input($data['goal_horizone']):'';
            $net_worth = isset($data['net_worth'])?$this->re_db_input($data['net_worth']):'';
            $risk_tolerance = isset($data['risk_tolerance'])?$this->re_db_input($data['risk_tolerance']):'';
            $annual_expenses = isset($data['annual_expenses'])?$this->re_db_input($data['annual_expenses']):'';
            $liquidity_needs = isset($data['liquidity_needs'])?$this->re_db_input($data['liquidity_needs']):'';
            $liquid_net_worth = isset($data['liquid_net_worth'])?$this->re_db_input($data['liquid_net_worth']):'';
            $special_expenses = isset($data['special_expenses'])?$this->re_db_input($data['special_expenses']):'';
            $per_of_portfolio = isset($data['per_of_portfolio'])?$this->re_db_input($data['per_of_portfolio']):'';
            $timeframe_for_special_exp = isset($data['timeframe_for_special_exp'])?$this->re_db_input($data['timeframe_for_special_exp']):'';
            $account_use = isset($data['account_use'])?$this->re_db_input($data['account_use']):'';
            $signed_by = isset($data['signed_by'])?$this->re_db_input($data['signed_by']):'';
            $sign_date = isset($data['sign_date'])?$this->re_db_input(date('Y-m-d',strtotime($data['sign_date']))):'';
            $tax_bracket = isset($data['tax_bracket'])?$this->re_db_input($data['tax_bracket']):'';
            $tax_id = isset($data['tax_id'])?$this->re_db_input($data['tax_id']):'';
            
            
            if($id==0){
				$q = "INSERT INTO `".CLIENT_SUITABILITY."` SET `client_id`='".$_SESSION['client_id']."',`income`='".$income."',`goal_horizon`='".$goal_horizone."',`net_worth`='".$net_worth."',`risk_tolerance`='".$risk_tolerance."',`annual_expenses`='".$annual_expenses."',`liquidity_needs`='".$liquidity_needs."',`liquid_net_worth`='".$liquid_net_worth."',`special_expenses`='".$special_expenses."',`per_of_portfolio`='".$per_of_portfolio."',`time_frame_for_special_exp`='".$timeframe_for_special_exp."',`account_use`='".$account_use."',`signed_by`='".$signed_by."',`sign_date`='".$sign_date."',`tax_bracket`='".$tax_bracket."',`tax_id`='".$tax_id."'".$this->insert_common_sql();
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
			    
				$q = "UPDATE `".CLIENT_SUITABILITY."` SET `client_id`='".$id."',`income`='".$income."',`goal_horizon`='".$goal_horizone."',`net_worth`='".$net_worth."',`risk_tolerance`='".$risk_tolerance."',`annual_expenses`='".$annual_expenses."',`liquidity_needs`='".$liquidity_needs."',`liquid_net_worth`='".$liquid_net_worth."',`special_expenses`='".$special_expenses."',`per_of_portfolio`='".$per_of_portfolio."',`time_frame_for_special_exp`='".$timeframe_for_special_exp."',`account_use`='".$account_use."',`signed_by`='".$signed_by."',`sign_date`='".$sign_date."',`tax_bracket`='".$tax_bracket."',`tax_id`='".$tax_id."'".$this->update_common_sql()." WHERE `client_id`='".$id."'";
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
        public function insert_update_objectives($data){
            
            $objectives = isset($data['objectives'])?$this->re_db_input($data['objectives']):'';
            
            $q = "INSERT INTO `".CLIENT_OBJECTIVES."` SET `client_id`='".$_SESSION['client_id']."',`objectives`='".$objectives."'".$this->insert_common_sql();
			$res = $this->re_db_query($q);
            $id = $this->re_db_insert_id();
			if($res){
			    return true;
			}
			else{
				$_SESSION['warning'] = UNKWON_ERROR;
				return false;
			}
			
			
		}
        public function insert_update_allobjectives($data){

			$allobjectives = isset($data['allobjectives'])?$data['allobjectives']:array();
            
            
                foreach($allobjectives as $key=>$val)
                {
    				$q = "INSERT INTO `".CLIENT_OBJECTIVES."` SET `client_id`='".$_SESSION['client_id']."',`objectives`='".$val."'".$this->insert_common_sql();
			        $res = $this->re_db_query($q);
                }
                $id = $this->re_db_insert_id();
				if($res){
    			    return true;
    			}
    			else{
    				$_SESSION['warning'] = UNKWON_ERROR;
    				return false;
    			}
        }
        public function insert_update_client_notes($data){//print_r($data);
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
                    $q = "INSERT INTO `".CLIENT_NOTES."` SET `date`='".$date."',`user_id`='".$user_id."',`notes`='".$client_note."'".$this->insert_common_sql();
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
    			    
                    $q = "UPDATE `".CLIENT_NOTES."` SET `date`='".$date."',`user_id`='".$user_id."',`notes`='".$client_note."'".$this->update_common_sql()." WHERE `id`='".$notes_id."'";
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
        /**
		 * @param int status, default all
		 * @return array of record if success, error message if any errors
		 * */
		public function select(){
			$return = array();
			
			$q = "SELECT `at`.*,ac.type as account_type,bm.first_name as broker
					FROM `".$this->table."` AS `at`
                    LEFT JOIN `".ACCOUNT_TYPE."` as ac on ac.id=at.account_type
                    LEFT JOIN `".BROKER_MASTER."` as bm on bm.id=at.broker_name
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
        public function select_objectives($id){
			$return = array();
			
            if($id>0)
            {
    			$q = "SELECT `o`.*,co.option as oname
    					FROM `".CLIENT_OBJECTIVES."` AS `o`
                        LEFT JOIN `".OBJECTIVE_MASTER."` as co on co.id=o.objectives
                        WHERE `o`.`is_delete`='0' and `o`.`client_id`=".$id."
                        ORDER BY `o`.`id` ASC";
    			$res = $this->re_db_query($q);
                if($this->re_db_num_rows($res)>0){
                    $a = 0;
        			while($row = $this->re_db_fetch_array($res)){
        			     array_push($return,$row);
                         
        			}
                }
            }
			return $return;
		} 
        public function get_client_name($id){
			$return = array();
			
			$q = "SELECT `at`.*
					FROM `".$this->table."` AS `at`
                    WHERE `at`.`is_delete`='0' and `at`.`id`=".$id."
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
        public function get_previous_client($id){
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
        public function get_next_client($id){
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
        public function select_notes(){
			$return = array();
			
			$q = "SELECT `s`.*
					FROM `".CLIENT_NOTES."` AS `s`
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
        public function reArrayFiles($file_post) {
           $file_ary = array();print_r($file_post);exit;
           $file_count = count($file_post['name']);
           $file_keys = array_keys($file_post);
           for ($i=0; $i<$file_count; $i++) {
               foreach ($file_keys as $key) {
                   $file_ary[$i][$key] = $file_post[$key][$i];
               }
           }
           return $file_ary;
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
        public function edit_account($id){
			$return = array();
			$q = "SELECT `at`.*
					FROM `".CLIENT_ACCOUNT."` AS `at`
                    WHERE `at`.`is_delete`='0' AND `at`.`client_id`='".$id."'";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
    			while($row = $this->re_db_fetch_array($res)){
    			     //print_r($row);exit;
                     array_push($return,$row);
                     
    			}
            }
			return $return;
		}
        public function edit_employment($id){
			$return = array();
			$q = "SELECT `at`.*
					FROM `".CLIENT_EMPLOYMENT."` AS `at`
                    WHERE `at`.`is_delete`='0' AND `at`.`client_id`='".$id."'";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
    			$return = $this->re_db_fetch_array($res);
            }
			return $return;
		}
        public function edit_suitability($id){
			$return = array();
            $q = "SELECT `at`.*
					FROM `".CLIENT_SUITABILITY."` AS `at`
                    WHERE `at`.`is_delete`='0' AND `at`.`client_id`='".$id."'";
			
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
         public function delete_objectives($id){
			$id = trim($this->re_db_input($id));
			if($id>0 && ($status==0 || $status==1) ){
				$q = "UPDATE `".CLIENT_OBJECTIVES."` SET `is_delete`='1' WHERE `id`='".$id."'";
				$res = $this->re_db_query($q);
				if($res){
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
        public function delete_allobjectives($id){
			
			$q = "UPDATE `".CLIENT_OBJECTIVES."` SET `is_delete`='1' WHERE `client_id`='".$id."'";
			$res = $this->re_db_query($q);
			if($res){
			    return true;
			}
			else{
			    $_SESSION['warning'] = UNKWON_ERROR;
			    return false;
			}
		}
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
        public function delete_notes($id){
			$id = trim($this->re_db_input($id));
			if($id>0){
				$q = "UPDATE `".CLIENT_NOTES."` SET `is_delete`='1' WHERE `id`='".$id."'";
				$res = $this->re_db_query($q);
				if($res){
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
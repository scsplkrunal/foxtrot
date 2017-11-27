<?php
	class broker_master extends db{
		
		public $table = SUBSCRIPTIONS_MASTER;
		public $errors = '';
        
        /**
		 * @param post array
		 * @return true if success, error message if any errors
		 * */
		public function insert_update($data){
			$id = isset($data['id'])?$this->re_db_input($data['id']):0;
			$name = isset($data['name'])?$this->re_db_input($data['name']):'';
			$duration = isset($data['duration'])?$this->re_db_input($data['duration']):'';
			$duration_type = isset($data['duration_type'])?$this->re_db_input($data['duration_type']):'';
			$price = isset($data['price'])?$this->re_db_input($data['price']):'';
			$currency = isset($data['currency'])?$this->re_db_input($data['currency']):'';
			$features = isset($data['features'])?$data['features']:array();
            $order = isset($data['order'])?$this->re_db_input($data['order']):'';
			
			if($name==''){
				$this->errors = 'Please enter name.';
			}
			else if($duration==''){
				$this->errors = 'Please enter duration.';
			}
			else if(!is_numeric($duration)){
				$this->errors = 'Please enter valid duration.';
			}
            else if($duration_type==''){
				$this->errors = 'Please select duration type.';
			}
			else if($price==''){
				$this->errors = 'Please enter price.';
			}
			else if(!is_numeric($price)){
				$this->errors = 'Please enter valid price.';
			}
            else if($currency==''){
				$this->errors = 'Please select currency.';
			}
            else if(count($features)==0){
                $this->errors = 'Please select atleast one feature.';
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
					$this->errors = 'This feature is already exists.';
				}
				
				if($this->errors!=''){
					return $this->errors;
				}
				else if($id>=0){
					if($id==0){
						$q = "INSERT INTO `".$this->table."` SET `name`='".$name."',`order`='".$order."', `duration`='".$duration."', `duration_type`='".$duration_type."', `price`='".$price."', `currency`='".$currency."' ".$this->insert_common_sql();
						$res = $this->re_db_query($q);
                        $id = $this->re_db_insert_id();
						if($res){
						      $q = "UPDATE `".SUBSCRIPTION_FEATURES."` SET `is_delete`='1' WHERE `subscription_plan`='".$id."'";
                            $this->re_db_query($q);
                            foreach($features as $key=>$val){
                                $q = "INSERT INTO `".SUBSCRIPTION_FEATURES."` SET `subscription_plan`='".$id."', `feature`='".$val."'";
                                $this->re_db_query($q);
                            }
                            
							$_SESSION['success'] = INSERT_MESSAGE;
							return true;
						}
						else{
							$_SESSION['warning'] = UNKWON_ERROR;
							return false;
						}
					}
					else if($id>0){
						$q = "UPDATE `".$this->table."` SET `name`='".$name."',`order`='".$order."', `duration`='".$duration."', `duration_type`='".$duration_type."', `price`='".$price."', `currency`='".$currency."' ".$this->update_common_sql()." WHERE `id`='".$id."'";
						$res = $this->re_db_query($q);
						if($res){
						      $q = "UPDATE `".SUBSCRIPTION_FEATURES."` SET `is_delete`='1' WHERE `subscription_plan`='".$id."'";
                                $this->re_db_query($q);
                                foreach($features as $key=>$val){
                                    $q = "INSERT INTO `".SUBSCRIPTION_FEATURES."` SET `subscription_plan`='".$id."', `feature`='".$val."'";
                                    $this->re_db_query($q);
                                }
                                
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
		public function select($status='',$plan_id=''){
			$return = array();
			$con = '';
			if($status!='' && $status>=0){
				$con .= " AND `sm`.`status`='".$status."' ";
			}
            if($plan_id!='' && $plan_id>=0){
				$con .= " AND `sm`.`id`='".$plan_id."' ";
			}
            /*,(
                    SELECT GROUP_CONCAT(`feature`)
                    FROM `".SUBSCRIPTION_FEATURES."` AS `sf`
                    WHERE `sf`.`subscription_plan`=`sm`.`id`
                    ) AS feature
                    */
			$q = "SELECT `sm`.*,`cm`.`name` AS `currency_name`, `dm`.`name` AS `duration_name`, `fm`.`id` AS `feature_id`, `fm`.`name` AS `feature_name`
					FROM `".$this->table."` AS `sm`
                    LEFT JOIN `".CURRENCY_MASTER."` AS `cm` ON `cm`.`id`=`sm`.`currency`
                    LEFT JOIN `".DURATION_TYPE."` AS `dm` ON `dm`.`id`=`sm`.`duration_type`
                    LEFT JOIN `".SUBSCRIPTION_FEATURES."` AS `sf` ON `sf`.`subscription_plan`=`sm`.`id` AND `sf`.`is_delete`='0'
                    LEFT JOIN `".FEATURES_MASTER."` AS `fm` ON `fm`.`id`=`sf`.`feature`
					WHERE `sm`.`is_delete`='0' ".$con."
                    ORDER BY `sm`.`order` ASC";
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
			$q = "SELECT `sm`.*,`cm`.`name` AS `currency_name`, `dm`.`name` AS `duration_name`,(
                    SELECT GROUP_CONCAT(`feature`)
                    FROM `".SUBSCRIPTION_FEATURES."` AS `sf`
                    WHERE `sf`.`subscription_plan`=`sm`.`id` AND `sf`.`is_delete`='0'
                    ) AS feature
					FROM `".$this->table."` AS `sm`
                    LEFT JOIN `".CURRENCY_MASTER."` AS `cm` ON `cm`.`id`=`sm`.`currency`
                    LEFT JOIN `".DURATION_TYPE."` AS `dm` ON `dm`.`id`=`sm`.`duration_type`
					WHERE `sm`.`is_delete`='0' AND `sm`.`id`='".$id."'";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
    			$return = $this->re_db_fetch_array($res);
                $return['feature'] = explode(',',$return['feature']);
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
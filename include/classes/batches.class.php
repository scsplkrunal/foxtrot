<?php

    class batches extends db{
        
        public $errors = '';
        public $table = BATCH_MASTER;
        
        public function insert_update($data){
            
			$id = isset($data['id'])?$this->re_db_input($data['id']):0;
            $pro_category= isset($data['pro_category'])?$this->re_db_input($data['pro_category']):'';
            $batch_number= isset($data['batch_number'])?$this->re_db_input($data['batch_number']):'';
            $batch_desc= isset($data['batch_desc'])?$this->re_db_input($data['batch_desc']):'';
            $sponsor= isset($data['sponsor'])?$this->re_db_input($data['sponsor']):'';
            $batch_date= isset($data['batch_date'])?$this->re_db_input(date('Y-m-d',strtotime($data['batch_date']))):'';
            $deposit_date= isset($data['deposit_date'])?$this->re_db_input(date('Y-m-d',strtotime($data['deposit_date']))):'';
            $trade_start_date= isset($data['trade_start_date'])?$this->re_db_input(date('Y-m-d',strtotime($data['trade_start_date']))):'';
            $trade_end_date= isset($data['trade_end_date'])?$this->re_db_input(date('Y-m-d',strtotime($data['trade_end_date']))):'';
            $check_amount= isset($data['check_amount'])?$this->re_db_input($data['check_amount']):'';
            $commission_amount= isset($data['commission_amount'])?$this->re_db_input($data['commission_amount']):'';
            $split= isset($data['split'])?$this->re_db_input($data['split']):'';
            $prompt_for_check_amount= isset($data['prompt_for_check_amount'])?$this->re_db_input($data['prompt_for_check_amount']):'';
            $posted_amounts= isset($data['posted_amounts'])?$this->re_db_input($data['posted_amounts']):'';
            			
			if($pro_category==''){
				$this->errors = 'Please select product category.';
			}
            else if($batch_number==''){
				$this->errors = 'Please enter batch number';
			}
			else if($sponsor==''){
				$this->errors = 'Please select sponsor.';
			}
			if($this->errors!=''){
				return $this->errors;
			}
			else{
				if($id>=0){
					if($id==0){
						$q = "INSERT INTO ".$this->table." SET `pro_category`='".$pro_category."',`batch_number`='".$batch_number."',`batch_desc`='".$batch_desc."',
                        `sponsor`='".$sponsor."',`batch_date`='".$batch_date."',`deposit_date`='".$deposit_date."',`trade_start_date`='".$trade_start_date."',
                        `trade_end_date`='".$trade_end_date."',`check_amount`='".$check_amount."',`commission_amount`='".$commission_amount."',`split`='".$split."',
                        `prompt_for_check_amount`='".$prompt_for_check_amount."',`posted_amounts`='".$posted_amounts."'".$this->insert_common_sql();
						
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
						$q = "UPDATE ".$this->table." SET `pro_category`='".$pro_category."',`batch_number`='".$batch_number."',`batch_desc`='".$batch_desc."',
                        `sponsor`='".$sponsor."',`batch_date`='".$batch_date."',`deposit_date`='".$deposit_date."',`trade_start_date`='".$trade_start_date."',
                        `trade_end_date`='".$trade_end_date."',`check_amount`='".$check_amount."',`commission_amount`='".$commission_amount."',`split`='".$split."',
                        `prompt_for_check_amount`='".$prompt_for_check_amount."',`posted_amounts`='".$posted_amounts."'".$this->update_common_sql()." WHERE `id`='".$id."'";
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
        public function edit_batches($id){
			$return = array();
			$q = "SELECT `at`.*
					FROM ".$this->table." AS `at`
                    WHERE `at`.`is_delete`='0' AND `at`.`id`='".$id."'";
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
    			$return = $this->re_db_fetch_array($res);
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
        public function search_batch($data){
            //echo '<pre>';print_r($data);exit;
            $search_type= isset($data['search_type'])?$this->re_db_input($data['search_type']):'';
            $search_text_batches= isset($data['search_text_batches'])?$this->re_db_input($data['search_text_batches']):'';
            
			$return = array();
			if($search_type==''){
				$this->errors = 'Please select search type.';
			}
            if($search_type=='batch_number' || $search_type=='batch_date'){
                $q = "SELECT `at`.*
					FROM `".$this->table."` AS `at`
                    WHERE `".$search_type."` like '".$search_text_batches."%' and `at`.`is_delete`='0'
                    ORDER BY `at`.`id` ASC";
            }
            else if($search_type=='pro_category'){
                $q = "SELECT `at`.*
					FROM `".$this->table."` AS `at`
                    WHERE `".$search_type."` in (SELECT `id` FROM ".PRODUCT_TYPE." where `type` like '".$search_text_batches."%')and `at`.`is_delete`='0'
                    ORDER BY `at`.`id` ASC";
            }
            else if($search_type=='sponsor'){
                $q = "SELECT `at`.*
					FROM `".$this->table."` AS `at`
                    WHERE `".$search_type."` in (SELECT `id` FROM ".SPONSOR_MASTER." where `name` like '".$search_text_batches."%') and `at`.`is_delete`='0'
                    ORDER BY `at`.`id` ASC";
            }
            else{
                $q = "SELECT `at`.*
					FROM `".$this->table."` AS `at`
                    WHERE `at`.`is_delete`='0'
                    ORDER BY `at`.`id` ASC";   
            }
            
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     array_push($return,$row);
    			}
            }
			return $return;
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
    }
?>
<?php

class transaction extends db{
    
    public $errors = '';
    public $table = TRANSACTION_MASTER;
    
    public function insert_update($data){
            
			$id = isset($data['id'])?$this->re_db_input($data['id']):0;
            $client_name = isset($data['client_name'])?$this->re_db_input($data['client_name']):'0';
            $client_number = isset($data['client_number'])?$this->re_db_input($data['client_number']):'0';
            $broker_name = isset($data['broker_name'])?$this->re_db_input($data['broker_name']):'0';
            $product_cate = isset($data['product_cate'])?$this->re_db_input($data['product_cate']):'';
            $sponsor = isset($data['sponsor'])?$this->re_db_input($data['sponsor']):'';
            $product = isset($data['product'])?$this->re_db_input($data['product']):'';
            $batch = isset($data['batch'])?$this->re_db_input($data['batch']):'';
            $invest_amount = isset($data['invest_amount'])?$this->re_db_input($data['invest_amount']):'';
            $charge_amount = isset($data['charge_amount'])?$this->re_db_input($data['charge_amount']):'';
            $commission_received = isset($data['commission_received'])?$this->re_db_input($data['commission_received']):'';
            $trade_date = isset($data['trade_date'])?$this->re_db_input($data['trade_date']):'';
            $settlement_date = isset($data['settlement_date'])?$this->re_db_input($data['settlement_date']):'';
            $split = isset($data['split'])?$this->re_db_input($data['split']):'';
            $split_broker = isset($data['split_broker'])?$this->re_db_input($data['split_broker']):'';
            $split_rate = isset($data['split_rate'])?$this->re_db_input($data['split_rate']):'';
            $another_level = isset($data['another_level'])?$this->re_db_input($data['another_level']):'';
            $cancel = isset($data['cancel'])?$this->re_db_input($data['cancel']):'';
            $buy_sell = isset($data['buy_sell'])?$this->re_db_input($data['buy_sell']):'';
            $hold_commission = isset($data['hold_commission'])?$this->re_db_input($data['hold_commission']):'';
            $hold_resoan = isset($data['hold_resoan'])?$this->re_db_input($data['hold_resoan']):'';
            
            	
			if($client_name=='0'){
				$this->errors = 'Please select Client name.';
			}
            else if($broker_name=='0'){
				$this->errors = 'Please select broker name.';
			}
			else if($product_cate=='0'){
				$this->errors = 'Please select product category.';
			}
            else if($product=='0'){
				$this->errors = 'Please select product name.';
			}
            else if($batch=='0'){
				$this->errors = 'Please select batch name.';
			}
			else if($commission_received==''){
				$this->errors = 'Please enter commission received.';
			}
            else if($trade_date==''){
				$this->errors = 'Please enter trade date.';
			}
            else if($settlement_date==''){
				$this->errors = 'Please enter settlement date.';
			}
            else if($split==''){
				$this->errors = 'Please enter split commission .';
			}
            else if($split_rate==''){
				$this->errors = 'Please enter split rate commission received.';
			}
            else if($hold_commission=='1' && $hold_resoan==''){
                $this->errors = 'Please enter commission hold resons.';
            }
			if($this->errors!=''){
				return $this->errors;
			}
			else{
				if($id>=0){
					if($id==0){
						$q = "INSERT INTO ".$this->table." SET `client_name`='".$client_name."',`client_number`='".$client_number."',`broker_name`='".$broker_name."',
                        `product_cate`='".$product_cate."',`sponsor`='".$sponsor."',`product`='".$product."',`batch`='".$batch."',
                        `invest_amount`='".$invest_amount."',`charge_amount`='".$charge_amount."',`commission_received`='".$commission_received."',`split`='".$split."',
                        `split_broker`='".$split_broker."',`split_rate`='".$split_rate."',`another_level`='".$another_level."',`cancel`='".$cancel."',`buy_sell`='".$buy_sell."',
                        `hold_resoan`='".$hold_resoan."',`hold_commission`='".$hold_commission."'".$this->insert_common_sql();
						
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
						$q = "UPDATE ".$this->table." SET `client_name`='".$client_name."',`client_number`='".$client_number."',`broker_name`='".$broker_name."',
                        `product_cate`='".$product_cate."',`sponsor`='".$sponsor."',`product`='".$product."',`batch`='".$batch."',
                        `invest_amount`='".$invest_amount."',`charge_amount`='".$charge_amount."',`commission_received`='".$commission_received."',`split`='".$split."',
                        `split_broker`='".$split_broker."',`split_rate`='".$split_rate."',`another_level`='".$another_level."',`cancel`='".$cancel."',`buy_sell`='".$buy_sell."',
                        `hold_resoan`='".$hold_resoan."',`hold_commission`='".$hold_commission."'".$this->update_common_sql()." WHERE `id`='".$id."'";
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
        public function get_product($id){
			$return = array();
			
			$q = "SELECT `at`.*
					FROM `product_category_".$id."` AS `at`
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
        public function select_client(){
			$return = array();
			
			$q = "SELECT `at`.*
					FROM `".CLIENT_MASTER."` AS `at`
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
        public function select_broker(){
			$return = array();
			
			$q = "SELECT `at`.*
					FROM `".BROKER_MASTER."` AS `at`
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
        public function select_batch(){
			$return = array();
			
			$q = "SELECT `at`.*
					FROM `".BATCH_MASTER."` AS `at`
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

class RRPDF extends TCPDF {
    //Page header
    public function Header() {
       
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', '', 8);
        $this->Cell(8);
        $this->Cell(0, 10,'Printed On:   '.date('d-M-y h:i:s A').'', 0, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}


?>
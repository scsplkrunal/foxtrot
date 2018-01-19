<?php

    class home extends db{
        
        public $errors = '';
        
        public function select_invest_amount(){
            
			$q = "SELECT SUM(invest_amount) as count 
					FROM `".TRANSACTION_MASTER."` WHERE `created_by`='".$_SESSION['user_id']."' "; 
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
    			$return = $this->re_db_fetch_array($res);
            }
			return $return;
		}
        public function select_charge_amount(){
           
			$q = "SELECT SUM(charge_amount) as count 
					FROM `".TRANSACTION_MASTER."` WHERE `created_by`='".$_SESSION['user_id']."' "; 
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
    			$return = $this->re_db_fetch_array($res);
            }
			return $return;
		}
        public function select_commission_received_amount(){
           
			$q = "SELECT SUM(commission_received) as count 
					FROM `".TRANSACTION_MASTER."` WHERE `created_by`='".$_SESSION['user_id']."' "; 
			$res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
    			$return = $this->re_db_fetch_array($res);
            }
			return $return;
		}
    }
?>
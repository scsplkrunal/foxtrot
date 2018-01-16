<?php 
class ofac_fincen extends db{
    
    public $errors = '';
    public $table = CLIENT_MASTER;
    
    public function get_ofac_data($sdn_name = ''){
		$return = array();
        $con = '';
        $name = isset($sdn_name)?$this->re_db_input($sdn_name):'';
        
        if($name != '')
        {
            $con .= "and `at`.`first_name` LIKE '%".$name."%'";
        
		
    		$q = "SELECT `at`.*
    				FROM `".$this->table."` AS `at`
                    WHERE `at`.`is_delete`='0' ".$con."
                    ";
    		$res = $this->re_db_query($q);
            
            if($this->re_db_num_rows($res)>0){
                $a = 0;
    			while($row = $this->re_db_fetch_array($res)){
    			     $return = $row;
    			}
            }
        }
		return $return;
	}
    public function insert_update($data){
            
            $q = "UPDATE `".OFAC_CHECK_DATA."` SET `is_delete`='1'";
	        $res = $this->re_db_query($q);
			foreach($data as $key=>$val)
            {
                $q = "INSERT INTO `".OFAC_CHECK_DATA."` SET `id_no`='".$val[0]['id_no']."',`sdn_name`='".$val[0]['sdn_name']."',`program`='".$val[0]['program']."',`client_id`='".$val['id']."',`client_name`='".$val['first_name']."',`rep_no`='',`rep_name`=''".$this->insert_common_sql();
    			$res = $this->re_db_query($q);
            }
            
			if($res){
			    $_SESSION['success'] = INSERT_MESSAGE;
				return true;
			}
			else{
				$_SESSION['warning'] = UNKWON_ERROR;
				return false;
			}
					
		}
        public function select_data_report(){
			$return = array();
            
			$q = "SELECT `at`.*
					FROM `".OFAC_CHECK_DATA."` AS `at`
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
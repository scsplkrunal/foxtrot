<?php

class db
{
    // Properties.
    
    // Get file extension of given file
    public function getEXT($str)
    {
        return pathinfo($str, PATHINFO_EXTENSION);
    }
    
    public function __construct($server = DB_SERVER, $username = DB_SERVER_USERNAME, $password = DB_SERVER_PASSWORD, $database = DB_DATABASE, $link = 'db_link') 
    {
        global $$link;
    
        if (USE_PCONNECT == 'true') {
          $$link = mysql_pconnect($server, $username, $password);
        } else {
          $$link = @mysql_connect($server, $username, $password);
        }
    
        if ($$link) mysql_select_db($database);
    
        return $$link;
    }
    
    public function re_db_close($link = 'db_link')
    {
        global $$link;
        return mysql_close($$link);
    }
    
    public function re_db_error($query, $errno, $error) {
        $page_name = basename($_SERVER['PHP_SELF']);
		if(IS_LIVE==0){
        die('<font color="#000000"><b>' . $errno . ' - ' . $error . '<br><br>' . $query . '<br><br><small><font color="#ff0000">[RE STOP]</font></small><br><br></b></font>');
		}
		else{
			die('something went wrong, please try again');
		}
    }
     
    public function re_db_query($query, $link = 'db_link')
    {
        global $$link;
    	if (defined('STORE_DB_TRANSACTIONS') && (STORE_DB_TRANSACTIONS == 'true')) {
    	  error_log('QUERY ' . $query . "\n", 3, STORE_PAGE_PARSE_TIME_LOG);
    	}
    	$_start = explode(' ', microtime());
    	$result = mysql_query($query, $$link) or $this->re_db_error($query, mysql_errno(), mysql_error());
    	$_end = explode(' ', microtime());
    	$_time = number_format(($_end[1] + $_end[0] - ($_start[1] + $_start[0])), 8);
    	if ( defined('EXPLAIN_QUERIES') && (EXPLAIN_QUERIES == 'true') )
    	{
    		/* Initially set to store every query */
    		$explain_this_query = true;
    		/* If the include filter is true just explain queries for those scripts */
    		if ( defined('EXPLAIN_USE_INCLUDE') && (EXPLAIN_USE_INCLUDE == 'true') )
    		{
    			$explain_this_query = ( ( stripos( EXPLAIN_INCLUDE_FILES, basename($_SERVER['PHP_SELF']) ) ) === false ? false : true );
    		}
    		/* If the exclude filter is true just explain queries for those that are not listed */
    		if ( defined('EXPLAIN_USE_EXCLUDE') && (EXPLAIN_USE_EXCLUDE == 'true') )
    		{
    			$explain_this_query = ( ( stripos( EXPLAIN_EXCLUDE_FILES, basename($_SERVER['PHP_SELF']) ) ) === false ? true : false );
    		}
    			/* If it still true after running it through the filters store it */
    		if ($explain_this_query) re_explain_query($query, $_time);
    	} # End if EXPLAIN_QUERIES
    	if (defined('STORE_DB_TRANSACTIONS') && (STORE_DB_TRANSACTIONS == 'true'))
    	{
    	   $result_error = mysql_error();
    	   error_log('RESULT ' . $result . ' ' . $result_error . "\n", 3, STORE_PAGE_PARSE_TIME_LOG);
    	}
        return $result;
    }   
      
      
    public function re_db_fetch_array($db_query) {
        return mysql_fetch_array($db_query, MYSQL_ASSOC);
    }
    
    public function re_db_num_rows($db_query) {
        return mysql_num_rows($db_query);
    }
    
    public function re_db_fetch_assoc($db_query) {
        return mysql_fetch_assoc($db_query);
    }
    
    public function re_db_affected_rows($db_query) {
        return mysql_affected_rows($db_query);
    }
    public function re_db_mysql_affected_rows_count(){
		return mysql_affected_rows();
	}
    public function re_db_data_seek($db_query, $row_number) {
        return mysql_data_seek($db_query, $row_number);
    }
    
    public function re_db_insert_id() {
        return mysql_insert_id();
    }
    
    public function re_db_free_result($db_query) {
        return mysql_free_result($db_query);
    }
    
    public function re_db_fetch_fields($db_query) {
        return mysql_fetch_field($db_query);
    }
    
    public function re_db_output($string)
    {
        $string=preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $string);
        $string= stripslashes($string);
        return htmlspecialchars($string);
        //return $string; //htmlspecialchars($string);
    }
    
    public function re_db_input($string) 
    {
    	// Stripslashes
    	if (get_magic_quotes_gpc()) 
    	{
    		$string = stripslashes($string);
    	}
    	if (!is_numeric($string)) // Quote if not integer
    	{
    		$string = mysql_real_escape_string($string);
    	}
    	else
    		$string=$string;
    
    	return trim($string);
    }
      
    public function re_db_perform($table, $data, $action = 'insert', $parameters = '', $link = 'db_link')
    {
        reset($data);
        if ($action == 'insert')
        {
            $query = 'insert into ' . $table . ' (';
            while (list($columns, ) = each($data)) {
                $query .= $columns . ', ';
            }
            $query = substr($query, 0, -2) . ') values (';
            reset($data);
            while (list(, $value) = each($data))
            {
                switch ((string)$value)
                {
                    case 'now()':
                        $query .= 'now(), ';
                        break;
                    case 'CURRENT_DATE()':
                        $query .= 'CURRENT_DATE(), ';
                        break;		  
                    case 'null':
                        $query .= 'null, ';
                        break;
                    default:
                        if(substr($this->re_db_input($value),0,23)=="date_add(CURRENT_DATE()") {
                            $query .= $this->re_db_input($value) .', ';
                        }
                        else {
                            $query .= '\'' . $this->re_db_input($value) . '\', ';
                        }
                        break;
                }
            }
            $query = substr($query, 0, -2) . ')';
        }
        elseif ($action == 'update')
        {
          $query = 'update ' . $table . ' set ';
          while (list($columns, $value) = each($data)) {
            switch ((string)$value) {
              case 'now()':
                $query .= $columns . ' = now(), ';
                break;
    		  case 'CURRENT_DATE()':
                $query .= 'CURRENT_DATE(), ';
                break;		  
              case 'null':
                $query .= $columns .= ' = null, ';
                break;
              default:
    		  	if(substr($this->re_db_input($value),0,23)=="date_add(CURRENT_DATE()")
    			{
    				$query .= $this->re_db_input($value) .', ';
    			}
    			else{
                	$query .= $columns . ' = \'' . $this->re_db_input($value) . '\', ';
    			}
                break;
            }
          }
          $query = substr($query, 0, -2) . ' where ' . $parameters;
        }
    
        return $this->re_db_query($query, $link);
    }
    public function validemail($email)
    {
        if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
            return 0; 
        }
        else {
    		return 1; 
    	}
    }  
    //public function to get ip address while forgot passowrd
    public function get_ip_address()
    {
        if (isset($_SERVER)) {
          if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
          } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
          } else {
            $ip = $_SERVER['REMOTE_ADDR'];
          }
        } else {
          if (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
          } elseif (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
          } else {
            $ip = getenv('REMOTE_ADDR');
          }
        }
    
        return $ip;
    }
    
    public function re_get_all_get_params($exclude_array = '', $extra='')
    {
    	if(!is_array($exclude_array)) $exclude_array = array();
    
    	$get_url = '';
    	if (is_array($_GET) && (sizeof($_GET) > 0))
    	{
    		reset($_GET);
    	  	while (list($key, $value) = each($_GET))
    		{
                if ( !is_array($value) && (strlen($value) > 0) && ($key != $this->re_session_name()) && ($key != 'error') && (!in_array($key, $exclude_array)) && ($key != 'x') && ($key != 'y') )
    			{
    		   		$get_url .=  '&' .$key . '=' . rawurlencode(stripslashes($value)) ;;
    			}
    	  	}
    	}
    	return ($extra?substr($get_url,1):$get_url);
    }
    
    public function re_session_name($name = '')
    {
        if (!empty($name)) {
            return session_name($name);
        } else {
            return session_name();
        }
    }
    
    public function shortstr($str,$maxlen)
    {
    	if(strlen($str)>$maxlen)
    	{
    		$str=substr($str,0,$maxlen);
    		$str.="...";
    	}
    	return $str;
    }
    
    
    public function front_pagination($totalRecFound, $href_url, $extralink='', $pageno='1', $rec_per_page, $style='subheading', $separator='', $get_var='pageno', $show_first_last_link=true)
    {
        $separator='';	 
    	
    	$totalRecords=$totalRecFound;
        $totalPages=ceil($totalRecords/RECORD_PER_PAGE);    
    
    	$showingpage="";
    	if($pageno=='')
    	{
    		$pageno=1;
    		$initlimit=0;
    	}
    	else
    	{
    		$pageno=$pageno;
    		$initlimit=($pageno*RECORD_PER_PAGE)-RECORD_PER_PAGE;
    	}
    	
    	if($pageno < 6 )
    	{
    		$startpage = 1;
    		if($pageno + 5  > $totalPages )
    		{
    			$endpage = $totalPages;
    		}
    		else
    		{
    			$endpage = 10 ;
    		}
    	}
    	else
    	{
    		$startpage = $pageno - 5 ;
    		if($pageno + 5  > $totalPages )
    		{
    			$endpage = $totalPages;
    		}
    		else
    		{
    			$endpage = $pageno + 5 ;
    		}
    	}
    	
    	for($i=$startpage; $i<=$endpage && $i<=$totalPages; $i++)
    	{
    		if($i==$pageno && $i==$totalPages)
    		{
    			//$showingpage.=" <strong>$i</strong> ";
                $showingpage.=' <li class="active"><a href="javascript:void(0);">'.$i.'</a></li>';
    		}
    		else if($i==$pageno) {
                //$showingpage.=" <strong>$i</strong> ".$separator."";
                $showingpage.=' <li class="active"><a href="javascript:void(0);">'.$i.'</a></li>';
                
    		}
    		else {
                //$showingpage.="<a class='subheading' href='".$href_url."?".$get_var."=$i".$extralink."'>".$i."</a> ".$separator." ";// change link name and give u'r page link
                $showingpage.='<li><a href="'.$href_url.'?'.$get_var.'='.$i.$extralink.'">'.$i.'</a><li>';// change link name and give u'r page link
    		}
    	}
    	
        if($style=="") { $style='subheading'; }
        
        if($totalPages>1)
    	{
    		if($pageno=="1")
    		{
    			$page=$pageno + 1;
    			//$next="&nbsp;<a class='".$style."' href='".$href_url."?".$get_var."=$page".$extralink."'>Next</a>";// change link name and give u'r page link
                $next='<li><a href="'.$href_url.'?'.$get_var.'='.$page.$extralink.'">Next</a></li>';// change link name and give u'r page link
    			$prev="";
    		}
            else if($pageno==$totalPages)
    		{
    			$page=$pageno - 1;
    			$next="";
    			//$prev="<a class='".$style."' href='".$href_url."?".$get_var."=$page".$extralink."'>Previous</a>&nbsp;&nbsp;";// change link name and give u'r page link
                $prev='<li><a href="'.$href_url.'?'.$get_var.'='.$page.$extralink.'">Previous</a></li>';// change link name and give u'r page link
    		}
            else
    		{
    			$page1=$pageno + 1;
    			$page2=$pageno - 1;
    			//$next="&nbsp;<a class='".$style."' href='".$href_url."?".$get_var."=$page1".$extralink."'>Next</a>";// change link name and give u'r page link
    			//$prev="<a class='".$style."' href='".$href_url."?".$get_var."=$page2".$extralink."'>Previous</a>&nbsp;&nbsp;";// change link name and give u'r page link
                $next='<li><a href="'.$href_url.'?'.$get_var.'='.$page1.$extralink.'">Next</a></li>';// change link name and give u'r page link
                $prev='<li><a href="'.$href_url.'?'.$get_var.'='.$page2.$extralink.'">Previous</a></li>';// change link name and give u'r page link
    		}
    	}
        else
    	{
    		$next="";
    		$prev="";		
    	}
    	
    	$firstlink='';
    	$lastlink='';
    	
    	if($next != "")
    	{
    		//$lastlink="... <a class='subheading' href='".$href_url."?".$get_var."=$totalPages".$extralink." ".$status."'>Last&nbsp;<img src="."images/arrow_last.gif"." style='border:0px;'></a> &nbsp;".$next;
            //$lastlink=$next."&nbsp;&nbsp;&nbsp;<a class='subheading' href='".$href_url."?".$get_var."=$totalPages".$extralink."'>Last&nbsp;<img src="."images/next_arrow.gif"." style='border:0px;' class='next_arrow_img'></a>";
            $lastlink=$next.'<li><a href="'.$href_url.'?'.$get_var.'='.$totalPages.$extralink.'">Last&nbsp;<img src="'.SITE_URL.'images/next_arrow.gif" style="border:0px;" class="next_arrow_img"></a></li>';
    	}
    	if($prev != "")
    	{
    		//$firstlink=$prev."&nbsp; <a class='subheading' href='".$href_url."?".$get_var."=1".$extralink." ".$status."'><img src="."images/arrow_first.gif"." style='border:0px;'>&nbsp;First</a> ... ";
            //$firstlink="<a class='subheading' href='".$href_url."?".$get_var."=1".$extralink."'><img src="."images/prev_arrow.gif"." style='border:0px;' class='prev_arrow_img'>&nbsp;First</a>&nbsp;&nbsp;&nbsp;".$prev;
            $firstlink='<li><a href="'.$href_url.'?'.$get_var.'=1'.$extralink.'"><img src="'.SITE_URL.'images/prev_arrow.gif" style="border:0px;" class="prev_arrow_img">&nbsp;First</a></li>'.$prev;
    	}
    	
    	if($show_first_last_link==true)
        $showingpage="".$firstlink.$showingpage.$lastlink;
        else
		$showingpage="".$showingpage.$lastlink;
	
        return $showingpage;
    }
    
    public function noRecordFound()
    {
    	echo '<div style="width:100%; color:#FF0000; font-size:18px; text-align:center; margin:10px 0px 10px 0px; ">No Record Found</div>';
    }
    
    //public function to insert date in databse in yyyy/mm/dd format..................................
    public function input_date($date)
    {
    
    	if($date!="" && strlen($date)>=10)
    	{
    		$dd=substr($date,0,2);
    		$mm=substr($date,3,2);
    		$yyyy=substr($date,6,4);
    		return $yyyy.'-'.$mm.'-'.$dd;
    	}
    	else {
    		return $date;
    	}
    }
    
    //public function to disaplay date in dd/mm/yyyy format..................................
    public function output_date($date)
    {
        if($date!="" && strlen($date)>=10 && $date!="0000-00-00")
    	{
    		$yyyy=substr($date,0,4);
    		$mm=substr($date,5,2);
    		$dd=substr($date,8,2);
    		return $dd.'/'.$mm.'/'.$yyyy;
    	}
    	else
        {
            if($date=="0000-00-00") {
                return "";
            }
            else {
                return $date;
            }
        }
    }
    
    public function output_news_date($date)
    {
    
    	if($date!="" && strlen($date)>=10 && $date!="0000-00-00")
    	{
    		return date('F d, Y',strtotime($date));
    	}
    	else {
    		return $date;
    	}
    }
    
    //date validation public function $str=yyyy-mm-dd........................................
    public function is_date($str)
    {
    	$stamp = strtotime( $str );
    	if (!is_numeric($stamp))
    	{
    		return FALSE;
    	}
    	
    	//$month = date( 'm', $stamp ); $day   = date( 'd', $stamp ); $year  = date( 'Y', $stamp );
        $date_arr = explode('/', $this->output_date($str));    //output_date public function return date in dd/mm/yyyy formate
        $day = isset($date_arr[0]) ? $date_arr[0] : "";
        $month = isset($date_arr[1]) ? $date_arr[1] : "";
        $year = isset($date_arr[2]) ? $date_arr[2] : "";
    	
    	if($day!="" && $month!="" && $year!="" && checkdate($month, $day, $year))
    	{
    	 	return TRUE;
    	}
    	else
    	{
            return FALSE;
    	}
    }
    
    //email validation function.......................
    public function is_email($email)
    {
    	if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
			return 0;
		}
		else{
			return 1;
		}
    }
    
    public function is_username($username)
    {
        if(strlen(trim($username))>=5 && strlen(trim($username))<=30 && preg_match('/^[a-z]+([a-z0-9._]*)?[a-z0-9]+$/i', $username)) {
            return 1;
        }
        else {
            return 0;
        }
    }
    
    public function is_url($url)
    {
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) 
        {
          return 0;
        }
        else 
        {
            return 1;
        }
    }
    
    public function is_mobile($mobile)
    {
        if($mobile!="" && strlen(trim($mobile))==10 && in_array(substr($mobile,0,1),array('7','8','9')) && is_numeric($mobile))
        {
            return true;
        }
        else
        {
            return false;
        }
    }    
    // public function for validate only charactor and wite space............................
    public function is_char_space($name)
    {
        if(!preg_match("/^[a-zA-Z -]+$/",$name))
        {
            return 0;
        }
        else {
            return 1;
        }
    }
    
    //phone number validation function........................................
    public function is_phone_number($phoneNumber)
    {    
        //Check to make sure the phone number format is valid 
        if( !preg_match("/^([1]-)?[0-9]{3}-[0-9]{3}-[0-9]{4}$/i", $phoneNumber)) {
    		return 0; 
    	}
    	else {
    		return 1; 
    	}
    }
    
    public function get_single_value($field,$tabel,$where)
    {
        $q = "select ".$field." from ".$tabel." where ".$where;
        
        $sql=$this->re_db_query($q);
    	if($this->re_db_num_rows($sql)>0)
    	{
    		$rec=$this->re_db_fetch_array($sql);
            return $rec;
    	}
    	else { return ''; }
    }
    
    public function random_password_generate()
    {
        $possible_letters = '23456789bcdfghjkmnpqrstvwxyz';
        $i = 0;
        $code="";
        
        for($i=0; $i<6; $i++)
        { 
            $code .= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1), 1);
        }
        return $code;
    }

    public function random_otp_generate()
    {
        $possible_letters = '1234567890';
        $i = 0;
        $code="";
        
        for($i=0; $i<4; $i++)
        { 
            $code .= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1), 1);
        }
        return $code;
    }
    
    public function display_error_msg(&$error_msg)
    {
        ?>
    	<div style="clear:both;">
        	<?php for($i=0;$i<sizeof($error_msg); $i++) { ?>
                <div style="clear:both;color:#FF0000; text-align: left;"><?php echo ucfirst(strtolower($error_msg[$i])); ?></div>
        	<?php } ?>
    	</div>
    	<?php
    }
    
    
    public function is_url_exist($url)
    {
        $ch = curl_init($url);    
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
        if($code == 200) {
            $status = true;
        } else {
            $status = false;
        }
        curl_close($ch);
        return $status;
    }
    
    public function resize_image($img,$newnm,$new_width,$new_height)
    {
    	$GetH = $new_height;
    	$GetW = $new_width;
        
       	if((image_type_to_mime_type(exif_imagetype($img))=='image/bmp')) $tmpimg=imagecreatefromwbmp($img);
    	else if((image_type_to_mime_type(exif_imagetype($img))=='image/png')) $tmpimg=imagecreatefrompng($img);
    	else if((image_type_to_mime_type(exif_imagetype($img))=='image/gif')) $tmpimg=imagecreatefromgif($img);
    	else if((image_type_to_mime_type(exif_imagetype($img))=='image/jpeg')) $tmpimg=imagecreatefromjpeg($img);
        else $tmpimg=imagecreatefromjpeg($img);
    
    	//die($tmpimg);
    	$w = imagesx( $tmpimg );
    	$h = imagesy( $tmpimg );
    
		$nw = $GetW;
		$nh = $GetH;


        if((image_type_to_mime_type(exif_imagetype($img))=='image/bmp')) {
    
            $img2 = imagecreatetruecolor( $nw, $nh );
        	imagecopyresampled ($img2, $tmpimg, 0, 0, 0 , 0, $nw, $nh, $w, $h );
        	imagejpeg( $img2, $newnm,100);
        	imagedestroy($img2);
        }
    	else if((image_type_to_mime_type(exif_imagetype($img))=='image/png')){
    	   
            $img2 = imagecreatetruecolor( $nw, $nh );
            $background = imagecolorallocate($img2, 0, 0, 0);
            imagecolortransparent($img2, $background);
            imagealphablending($img2, false);
            imagesavealpha($img2, true);
        	imagecopyresampled ($img2, $tmpimg, 0, 0, 0 , 0, $nw, $nh, $w, $h );
        	imagepng( $img2, $newnm);
        	imagedestroy($img2);
    	}
    	else if((image_type_to_mime_type(exif_imagetype($img))=='image/gif')){
    	   
            $img2 = imagecreatetruecolor( $nw, $nh );
            $background = imagecolorallocate($img2, 0, 0, 0);
            imagecolortransparent($img2, $background);
        	imagecopyresampled ($img2, $tmpimg, 0, 0, 0 , 0, $nw, $nh, $w, $h );
        	imagegif( $img2, $newnm);
        	imagedestroy($img2);
    	}
    	else if((image_type_to_mime_type(exif_imagetype($img))=='image/jpeg')){
    	   
            $img2 = imagecreatetruecolor( $nw, $nh );
        	imagecopyresampled ($img2, $tmpimg, 0, 0, 0 , 0, $nw, $nh, $w, $h );
        	imagejpeg( $img2, $newnm,100);
        	imagedestroy($img2);
    	}
        else
        {
            $img2 = imagecreatetruecolor( $nw, $nh );
        	imagecopyresampled ($img2, $tmpimg, 0, 0, 0 , 0, $nw, $nh, $w, $h );
        	imagejpeg( $img2, $newnm,100);
        	imagedestroy($img2);
        }
    }
    
    public function mime_image($img)
    {
        if((image_type_to_mime_type(exif_imagetype($img))=='image/bmp')) {
    
            return 1;
        }
    	else if((image_type_to_mime_type(exif_imagetype($img))=='image/png')){
    	   
            return 1;
    	}
    	else if((image_type_to_mime_type(exif_imagetype($img))=='image/gif')){
    	   
            return 1;
    	}
    	else if((image_type_to_mime_type(exif_imagetype($img))=='image/jpeg')){
    	   
            return 1;
    	}
        else
        {
            return 0;
        }
    }
    public function resize_image_new($img,$newnm,$new_width,$new_height)
    {
    	$GetH = $new_height;
    	$GetW = $new_width;
    	
    	if(substr($img,strlen($img)-3) == 'bmp') $tmpimg=imagecreatefromwbmp($img);
        else if(substr($img,strlen($img)-3) == 'BMP') $tmpimg=imagecreatefromwbmp($img);
    	else if(substr($img,strlen($img)-3) == 'png') $tmpimg=imagecreatefrompng($img);
        else if(substr($img,strlen($img)-3) == 'PNG') $tmpimg=imagecreatefrompng($img);
    	else if(substr($img,strlen($img)-3) == 'gif') $tmpimg=imagecreatefromgif($img);
        else if(substr($img,strlen($img)-3) == 'GIF') $tmpimg=imagecreatefromgif($img);
    	else if(substr($img,strlen($img)-3) == 'jpg') $tmpimg=imagecreatefromjpeg($img);
        else if(substr($img,strlen($img)-3) == 'JPG') $tmpimg=imagecreatefromjpeg($img);
    	else if(substr($img,strlen($img)-4) == 'jpeg') $tmpimg=imagecreatefromjpeg($img);
    	else if(substr($img,strlen($img)-4) == 'JPEG') $tmpimg=imagecreatefromjpeg($img);
    	
    	$w = imagesx( $tmpimg );
    	$h = imagesy( $tmpimg );
    
		$nw = $GetW;
		$nh = $GetH;
    	
    	$img2 = imagecreatetruecolor( $nw, $nh );
        $black = imagecolorallocate($img2, 0, 0, 0);
        imagecolortransparent($img2, $black);
    	imagecopyresampled ($img2, $tmpimg, 0, 0, 0 , 0, $nw, $nh, $w, $h );
    	imagepng( $img2, $newnm);
    	imagedestroy($img2);
    }
    
     function createThumbnails($updir, $img, $MaxWe=100,$MaxHe=150){
        $arr_image_details = getimagesize($updir.$img); 
        $width = $arr_image_details[0];
        $height = $arr_image_details[1];
    
        $percent = 100;
        if($width > $MaxWe) $percent = floor(($MaxWe * 100) / $width);
    
        if(floor(($height * $percent)/100)>$MaxHe)  
        $percent = (($MaxHe * 100) / $height);
    
        if($width > $height) {
            $newWidth=$MaxWe;
            $newHeight=round(($height*$percent)/100);
        }else{
            $newWidth=round(($width*$percent)/100);
            $newHeight=$MaxHe;
        }
    
        $newHeight = 300;
        $newHeight = 260;
    
        if ($arr_image_details[2] == 1) {
            $imgt = "ImageGIF";
            $imgcreatefrom = "ImageCreateFromGIF";
        }
        else if ($arr_image_details[2] == 2) {
            $imgt = "ImageJPEG";
            $imgcreatefrom = "ImageCreateFromJPEG";
        }
        else if ($arr_image_details[2] == 3) {
            $imgt = "ImagePNG";
            $imgcreatefrom = "ImageCreateFromPNG";
        }
        else if ($arr_image_details[2] == 4) {
            $imgt = "ImageBMP";
            $imgcreatefrom = "ImageCreateFromBMP";
        }
    
    
        if ($imgt) {
            $old_image = $imgcreatefrom($updir.$img);
            $new_image = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresized($new_image, $old_image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
            $imgt($new_image, $updir."thumb_".$img);
            //imagealphablending($imgt,true);

            return true;    
        }
    }

    public function encryptor($string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        
        // hash
        $key = hash('sha256', SECRET_KEY);
    
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
    
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    
        return $output;
    }
    public function decryptor($string){
        $output = false;
        $encrypt_method = "AES-256-CBC";
        
        // hash
        $key = hash('sha256', SECRET_KEY);
    
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }
    
    public function format_date($dt)
    {
    	// yyyy/mm/dd format
    	if($dt!='' && $dt!='00-00-0000')
    	{
           return date('Y-m-d',strtotime($dt));
    	}
        else
        {
            return '0000-00-00';
        }
    }
    public function format_date_time($dt)
    {
    	// yyyy/mm/dd format
    	if($dt!='' && $dt!='00-00-0000 00:00:00')
    	{
           return date('Y-m-d h:i:s',strtotime($dt));
    	}
        else
        {
            return '0000-00-00 00:00:00';
        }
    }
    public function format_date_time_display($dt)
    {
    	// yyyy/mm/dd format
    	if($dt!='' && $dt!='0000-00-00 00:00')
    	{
           return date('d-m-Y h:i A',strtotime($dt));
    	}
        else
        {
            return '00-00-0000 00:00';
        }
    }
    public function format_date_display($dt)
    {
    	// yyyy/mm/dd format
    	if($dt!='' && $dt!='0000-00-00')
    	{
           return date('d-m-Y',strtotime($dt));
    	}
        else
        {
            return '00-00-0000';
        }
    }
    public function get_client_ip() 
    {
       $ipaddress = '';
       if (getenv('HTTP_CLIENT_IP'))
           $ipaddress = getenv('HTTP_CLIENT_IP');
       else if(getenv('HTTP_X_FORWARDED_FOR'))
           $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
       else if(getenv('HTTP_X_FORWARDED'))
           $ipaddress = getenv('HTTP_X_FORWARDED');
       else if(getenv('HTTP_FORWARDED_FOR'))
           $ipaddress = getenv('HTTP_FORWARDED_FOR');
       else if(getenv('HTTP_FORWARDED'))
          $ipaddress = getenv('HTTP_FORWARDED');
       else if(getenv('REMOTE_ADDR'))
           $ipaddress = getenv('REMOTE_ADDR');
       else
           $ipaddress = 'UNKNOWN';
       return $ipaddress;
    }

	public function update_common_sql(){
        $update_common_sql = " , `modified_ip`='".$this->get_client_ip()."', `modified_by`='".$_SESSION['user_id']."', `modified_time`='".CURRENT_DATETIME."' ";
        return $update_common_sql;
    }
    
    public function insert_common_sql(){
        $insert_common_sql = " , `created_ip`='".$this->get_client_ip()."', `created_by`='".$_SESSION['user_id']."', `created_time`='".CURRENT_DATETIME."' ";
        return $insert_common_sql;
    }
    public function get_system_logo(){
    	$return = array();
    	$q = "SELECT `at`.`logo`
    			FROM `".SYSTEM_CONFIGURATION."` AS `at`
                WHERE `at`.`is_delete`='0' ORDER BY `at`.`id` ASC LIMIT 1";
    	$res = $this->re_db_query($q);
        if($this->re_db_num_rows($res)>0){
    		$return = $this->re_db_fetch_array($res);
        }
    	return $return;
    }
    public function get_user_image($id){
    	$return = array();
    	$q = "SELECT `at`.`image`
    			FROM `".USER_MASTER."` AS `at`
                WHERE `at`.`is_delete`='0' AND `at`.`id`='".$id."'";
    	$res = $this->re_db_query($q);
        if($this->re_db_num_rows($res)>0){
    		$return = $this->re_db_fetch_array($res);
        }
    	return $return;
    }
    public function get_company_name(){
    	$return = array();
    	$q = "SELECT `at`.`company_name`
    			FROM `".SYSTEM_CONFIGURATION."` AS `at`
                WHERE `at`.`is_delete`='0' ORDER BY `at`.`id` ASC LIMIT 1";
    	$res = $this->re_db_query($q);
        if($this->re_db_num_rows($res)>0){
    		$return = $this->re_db_fetch_array($res);
        }
    	return $return;
    }
/*
    public function send_email($to,$subject,$body,$cc=array(),$bcc=array(),$attachemnt=array()){
        
        // Configuring SMTP server settings
        $mail = new PHPMailer;
	    $mail->isSMTP(true);
	    $mail->Host = SMTP_HOST;
	    $mail->Port = 587; // 465 587
	    $mail->SMTPSecure = 'tls'; //tls ssl
	    $mail->SMTPAuth = true;
	    $mail->setFrom(SMTP_ID,'Foxtrot');
	    $mail->Username = SMTP_ID;
	    $mail->Password = SMTP_PASSWORD;
        
        foreach($to as $key=>$val){
            $mail->addAddress($val);
        }
        foreach($cc as $key=>$val){
            $mail->AddCC($val);
        }
        foreach($bcc as $key=>$val){
            $mail->AddBCC($val);
        }
        foreach($attachemnt as $key=>$val){
            $mail->AddAttachment($val,'Attachment');
        }
        $mail->AddBCC('scspl.amarshi@gmail.com');
        $mail->Subject = $subject;
        $mail->isHTML(true);    
        $mail->msgHTML($body);
        
        // Success or Failure
        if(! @ $mail->send()){
        }
        else {
        }
        
    }
    */
    public function send_email($to,$subject,$body,$cc=array(),$bcc=array(),$attachemnt=array()){
        
        // Configuring SMTP server settings
        $mail = new PHPMailer();
	    $mail->isSMTP();
        //$mail->Mailer = "smtp";
        //$mail->SMTPDebug = true;
        $mail->isMail();
        //$mail->SMTPDebug = 1;
	    $mail->Host = SMTP_HOST;
        
	    $mail->Port = 465; // 465 587
	    $mail->SMTPSecure = 'ssl'; //tls ssl
	    $mail->SMTPAuth = true;
	    $mail->setFrom(SMTP_ID,'FoxtrotSoftware');
	    $mail->Username = SMTP_ID;
	    $mail->Password = SMTP_PASSWORD;
        
        foreach($to as $key=>$val){
            $mail->addAddress($val);
        }
        foreach($cc as $key=>$val){
            $mail->AddCC($val);
        }
        foreach($bcc as $key=>$val){
            $mail->AddBCC($val);
        }
        foreach($attachemnt as $key=>$val){
            $mail->AddAttachment($val,'Attachment');
        }
        //$mail->AddBCC('scspl.amarshi@gmail.com');
        $mail->Subject = $subject;
        $mail->isHTML(true);    
        $mail->msgHTML($body);
        //var_dump($mail->send());exit;
        // Success or Failure
        if($mail->send())
        {
            return true;
        }
        else 
        {
            return false;
        }
        
    }
    public function buildTree(array $elements, $parentId = 0, $id='id', $parent_key='parent_id') {
        $branch = array();
    
        foreach ($elements as $element) {
            if ($element[$parent_key] == $parentId) {
                $children = $this->buildTree($elements, $element[$id]);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }
    
        return $branch;
    }

    public function success_message($msg=''){
		?>
		<div class="alert alert-success alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> <?php echo $msg; ?>
		</div>
		<?php
	}
	public function error_message($msg=''){
		?>
		<div class="alert alert-danger alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Error!</strong> <?php if(!is_array($msg)) echo $msg; ?>
		</div>
		<?php
	}
	public function warning_message($msg=''){
		?>
		<div class="alert alert-warning alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Warning!</strong> <?php echo $msg; ?>
		</div>
		<?php
	}
	public function info_message($msg=''){
		?>
		<div class="alert alert-info alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Info!</strong> <?php echo $msg; ?>
		</div>
		<?php
	}

    public function to_decimal($number,$decimal=2){
        return number_format((float)$number, $decimal, '.', ',');
    }
    
    public function reArrayFiles($file_post) {
        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
        return $file_ary;
    }
    
    public function random_password($lenth=10){
        $string = '1234567890abcdefghijklmnopqirstuvwxyzABCDEFGHIJKLMNOPQIRSTUVWXYZ!@#$%^&*()_+|{}[]?,.';
        $password = '';
        for($i=1;$i<=$lenth;$i++){
            $ch = substr($string,rand(0,strlen($string)-1),1);
            $password .= $ch;
        }
        return $password;
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
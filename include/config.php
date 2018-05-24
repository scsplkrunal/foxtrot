<?php @session_start();
    date_default_timezone_set ("Asia/Calcutta");
	
    ini_set('display_errors',1);
    define('HTTP_HOST','http://'.$_SERVER['HTTP_HOST'].'/');
	define('HTTP_SERVER', HTTP_HOST.'trainee/foxtrotsoftware/'); 
	define('ENABLE_SSL', false);
    define('IS_LIVE',0);
    
    define('SITE_URL', HTTP_HOST.'trainee/foxtrotsoftware/');
    
	define('DIR_FS',$_SERVER['DOCUMENT_ROOT'].'/trainee/foxtrotsoftware/');
	define('DIR_FS_INCLUDES',DIR_FS.'include/');
    define('DIR_FS_CLASSES',DIR_FS_INCLUDES.'classes/');
	define('DIR_WS_TEMPLATES', DIR_FS.'templates/');
	define('DIR_WS_CONTENT', DIR_WS_TEMPLATES.'content/');
    
    define('SITE_ASSETS', SITE_URL.'assets/');
    define('SITE_CSS', SITE_ASSETS.'css/');
    define('SITE_JS', SITE_ASSETS.'js/');
    define('SITE_IMAGES', SITE_ASSETS.'images/');
    define('SITE_PLUGINS', SITE_ASSETS.'plugins/');
    
    define('SITE_URL_ADMIN', SITE_URL.'admin/');
	define('DIR_FS_ADMIN',DIR_FS.'admin/');
    define('DIR_WS_TEMPLATES_ADMIN', DIR_WS_TEMPLATES.'admin/');
	define('DIR_WS_CONTENT_ADMIN', DIR_WS_TEMPLATES_ADMIN.'content/');
    
    define('SITE_ADMIN_ASSETS', SITE_URL_ADMIN.'assets/');
    define('SITE_ADMIN_CSS', SITE_ADMIN_ASSETS.'css/');
    define('SITE_ADMIN_JS', SITE_ADMIN_ASSETS.'js/');
    define('SITE_ADMIN_IMAGES', SITE_ADMIN_ASSETS.'images/');
    define('SITE_ADMIN_PLUGINS', SITE_ADMIN_ASSETS.'plugins/');
    
    define('DIR_IMAGES_ADMIN',DIR_FS.'admin-images/');
    define('SITE_IMAGES_ADMIN',SITE_URL.'admin-images/');
    define('DEFAULT_IMAGE_ADMIN','default.jpg');
    
    define('SITE_LOGO','logo.png');
    define('SITE_FAVICON','favicon.png');
    
    define('SMTP_HOST','smtp.gmail.com');
    define('SMTP_ID','norepaly.kpi@gmail.com');
    define('SMTP_PASSWORD','noreply123');
    include(DIR_FS_INCLUDES.'phpmailer/class.phpmailer.php');
    include(DIR_FS_INCLUDES.'phpmailer/class.smtp.php');
    include(DIR_FS_INCLUDES.'phpmailer/PHPMailerAutoload.php');
    
    // local config
	define('DB_SERVER', 'localhost');
	define('DB_SERVER_USERNAME', 'foxtrot');
	define('DB_SERVER_PASSWORD', 'foxtrot');
	define('DB_DATABASE', 'foxtrot');
	define('USE_PCONNECT', 'false');
	define('STORE_SESSIONS', 'mysql');
    
    //include(DIR_FS_INCLUDES.'constants.php');
    define('SITE_EXCEL',DIR_FS_INCLUDES.'PHPExcel/');
    include(DIR_FS_INCLUDES.'TCPDF-master/tcpdf.php');
    include(DIR_FS_INCLUDES.'tables.php');
    include(DIR_FS_INCLUDES.'db.class.php');
    include(DIR_FS_INCLUDES.'classes.php');
   
    
    $dbins = new db();
    
    include(DIR_FS_INCLUDES.'constants.php');
    include(DIR_FS_INCLUDES.'user.php');
?>
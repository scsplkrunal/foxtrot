<?php
    require_once("include/config.php");
    require_once(DIR_FS."islogin.php");
    $content = "home";
    
    $instance = new home();
    $invest_amount = $instance->select_invest_amount();
    $charge_amount = $instance->select_charge_amount();
    $commission_received_amount = $instance->select_commission_received_amount();
    
    //echo '<pre>';print_r($invest_amount);exit;
    include(DIR_WS_TEMPLATES."main_page.tpl.php");
?> 
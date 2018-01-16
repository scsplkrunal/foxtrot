<?php 
require_once("include/config.php");
require_once(DIR_FS."islogin.php");
$instance = new ofac_fincen();
$get_ofac_data = array();

$get_ofac_data = $instance->select_data_report();

//print_r($get_trans_data);exit();

$total_amount_invested = 0;
$total_matches = count($get_ofac_data);
$total_charges = 0;
?>
<?php

    // create new PDF document
    $pdf = new RRPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // add a page
    $pdf->AddPage('L');
    // Title
    $img = '<img src="'.SITE_IMAGES.'sitelogo.png" height="60px" />';
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0">
                <tr>
                   <td width="100%" style="font-size:10px;font-weight:bold;text-align:left;">'.date('d/m/Y h:i:s A').'</td>
                </tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0" width="100%">
                <tr>
                    <td width="100%" style="font-size:12px;font-weight:bold;text-align:center;">Concorde Investment Services</td>
                </tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0">
                <tr>
                    <td width="100%" style="font-size:16px;font-weight:bold;text-align:center;">SPECIALLY DESIGNATED NATIONALS CLIENT CHECK </td>
                </tr>
           </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0">
                <tr>
                    <td width="100%" style="font-size:14px;font-weight:bold;text-align:center;">File Date - '.date('m/d/Y').'</td>
                </tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
        
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0" cellpadding="5" width="100%">
                <tr style="background-color: #f1f1f1;">
                    <td style="width:20%"><h4>SDN NAME</h4></td>
                    <td style="width:10%"><h4>ID NO.</h4></td>
                    <td style="width:10%"><h4>PROGRAM</h4></td>
                    <td style="width:10%"><h4>CLIENT NO.</h4></td>
                    <td style="width:20%"><h4>FOXTROT CLIENT NAME</h4></td>
                    <td style="width:10%"><h4>REP NO.</h4></td>
                    <td style="width:20%"><h4>REP NAME</h4></td>
                </tr>';
                foreach($get_ofac_data as $key=>$val)
                {
        $html.='<tr>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.$val['sdn_name'].'</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.$val['id_no'].'</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.$val['program'].'</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.$val['client_id'].'</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.$val['client_name'].'</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">-</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">-</td>
                    </tr>';
                }
       
    $html.='</table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    $html='<br/>';
    
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0" cellpadding="5" width="100%">
                <tr>
                   <td style="font-size:13px;font-weight:normal;text-align:right;width:14%">Total Scanned:</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;width:14%">36.696</td>
                </tr>
                <tr>
                   <td style="font-size:13px;font-weight:normal;text-align:right;width:14%">Total Matches:</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;width:14%">'.$total_matches.'</td>
                </tr>
                <tr>
                   <td style="font-size:13px;font-weight:normal;text-align:left;width:18%">*Foxtrot Client Name - </td>
                   <td style="font-size:13px;font-weight:normal;text-align:Left;width:20%">Match found in First name</td>
                </tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
   
    $pdf->lastPage();
    $pdf->Output('report_ofac_client_check.pdf', 'I');
    
    exit;
?>
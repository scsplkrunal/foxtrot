<?php 
require_once("include/config.php");
require_once(DIR_FS."islogin.php");
$instance = new transaction();
$get_trans_data = array();
$batch_id = '';
$get_logo = $instance->get_system_logo();
$system_logo = isset($get_logo['logo'])?$instance->re_db_input($get_logo['logo']):'';
$get_company_name = $instance->get_company_name();
$system_company_name = isset($get_company_name['company_name'])?$instance->re_db_input($get_company_name['company_name']):'';
//print_r($system_logo);exit;
if(isset($_GET['batch_id']) && $_GET['batch_id'] != '')
{
    $batch_id = $_GET['batch_id'];
    $get_trans_data = $instance->select_data_report($batch_id);
}
else
{
    $get_trans_data = $instance->select_data_report();
}
$batch_desc = $get_trans_data[0]['batch_desc'];
$total_amount_invested = 0;
$total_commission_received = 0;
$total_charges = 0;
?>
<?php

    // create new PDF document
    $pdf = new RRPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    // add a page
    $pdf->AddPage('L');
    // Title
    $img = '<img src="'.SITE_URL."upload/logo/".$system_logo.'" height="60px" />';
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0">
                <tr>
                   <td width="50%" style="font-size:10px;font-weight:bold;text-align:left;">'.date('d/m/Y h:i:s A').'</td>';
                   if(isset($system_company_name) && $system_company_name != '')
                   {
                        $html.='<td width="50%" style="font-size:10px;font-weight:bold;text-align:right;">'.$system_company_name.'</td>';
                   }
        $html.='</tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
    if(isset($system_logo) && $system_logo != '')
    {
        $pdf->SetFont('times','B',12);
        $pdf->SetFont('times','',10);
        $html='<table border="0" width="100%">
                    <tr>
                        <td align="center">'.$img.'</td>
                    </tr>
                </table>';
        $pdf->writeHTML($html, false, 0, false, 0);
        $pdf->Ln(5);
    }
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0">
                <tr>';
                    if($batch_id != ''){
                        
                        $html .='<td width="100%" style="font-size:16px;font-weight:bold;text-align:center;">TRANSACTION BY BATCH REPORT : '.strtoupper($batch_desc).'</td>';
                     
                     } else {
                        
                        $html .='<td width="100%" style="font-size:16px;font-weight:bold;text-align:center;">TRANSACTION BY BATCH REPORT : ALL BATCHES</td>';
                     }  
                   
                $html .='</tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0">
                <tr>';
                if($batch_id != ''){
                    
                    $html .='<td width="100%" style="font-size:12px;font-weight:bold;text-align:center;">Batch #'.$batch_id.'</td>';
                 
                 } else {
                    
                    $html .='<td width="100%" style="font-size:12px;font-weight:bold;text-align:center;"></td>';
                 }   
            $html .='</tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
        
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0" cellpadding="5" width="100%">
                <tr style="background-color: #f1f1f1;">
                    <td><h4>TRADE#</h4></td>
                    <td><h4>BROKER</h4></td>
                    <td><h4>CLIENT</h4></td>
                    <td><h4>TRADE DATE</h4></td>
                    <td><h4>DATE RECEIVED</h4></td>
                    <td><h4>AMOUNT INVESTED</h4></td>
                    <td style="width:18%"><h4>COMMISSION RECEIVED</h4></td>
                    <td><h4>CHARGE</h4></td>
                </tr>';
    //$pdf->Line(10, 81, 290, 81);
    if($get_trans_data != array())
    {
        foreach($get_trans_data as $trans_key=>$trans_data)
        {
            $total_amount_invested = ($total_amount_invested+$trans_data['invest_amount']);
            $total_commission_received = ($total_commission_received+$trans_data['commission_received']);
            $total_charges = ($total_charges+$trans_data['charge_amount']);
        $html.='<tr>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.$trans_data['trade_number'].'</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.$trans_data['broker_name'].'</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.$trans_data['client_name'].'</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.date('m-d-Y',strtotime($trans_data['trade_date'])).'</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.date('m-d-Y',strtotime($trans_data['commission_received_date'])).'</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.number_format($trans_data['invest_amount'],2).'</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.number_format($trans_data['commission_received'],2).'</td>
                       <td style="font-size:13px;font-weight:normal;text-align:left;">'.number_format($trans_data['charge_amount'],2).'</td>
                    </tr>';
        } 
    }
    else
    {
        $html.='<tr>
                    <td style="font-size:13px;font-weight:cold;text-align:center;" colspan="8">No Records Found.</td>
                </tr>';
    }           
    $html.='</table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    //$pdf->Line(205, 105, 182, 105);
    //$pdf->Line(238, 105, 215, 105);
    //$pdf->Line(280, 105, 265, 105);
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0" cellpadding="5" width="100%">
                <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td style="font-size:13px;font-weight:bold;text-align:right;" colspan="2">Report Total : </td>
                   <td style="font-size:13px;font-weight:bold;text-align:left;">'.number_format($total_amount_invested,2).'</td>
                   <td style="font-size:13px;font-weight:bold;text-align:left;width:18%;">'.number_format($total_commission_received,2).'</td>
                   <td style="font-size:13px;font-weight:bold;text-align:left;">'.number_format($total_charges,2).'</td>
                </tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
   
    $pdf->lastPage();
    $pdf->Output('report_transaction_by_batch.pdf', 'I');
    
    exit;
?>
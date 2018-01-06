<?php 
require_once("include/config.php");
require_once(DIR_FS."islogin.php");
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
                    <td align="center">'.$img.'</td>
                </tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0">
                <tr>
                   <td width="100%" style="font-size:16px;font-weight:bold;text-align:center;">TRANSACTION BY BATCH REPORT : MUTUAL FUNDS</td>
                </tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0">
                <tr>
                   <td width="100%" style="font-size:12px;font-weight:bold;text-align:center;">Batch #742</td>
                </tr>
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
    $pdf->Line(10, 81, 290, 81);
    $html.='<tr>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">897797</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">kishan</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">aksha</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">06/01/2018</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">08/01/2018</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">1,000.00</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">1,000.00</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">0.00</td>
                </tr>
                <tr>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">897797</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">kishan</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">aksha</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">06/01/2018</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">08/01/2018</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">2,000.00</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">4,000.00</td>
                   <td style="font-size:13px;font-weight:normal;text-align:left;">0.00</td>
                </tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    $pdf->Line(205, 105, 182, 105);
    $pdf->Line(238, 105, 215, 105);
    $pdf->Line(280, 105, 265, 105);
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0" cellpadding="5" width="100%">
                <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td style="font-size:13px;font-weight:bold;text-align:right;" colspan="2">Report Total : </td>
                   <td style="font-size:13px;font-weight:bold;text-align:left;">3,000.00</td>
                   <td style="font-size:13px;font-weight:bold;text-align:left;width:18%;">5,000.00</td>
                   <td style="font-size:13px;font-weight:bold;text-align:left;">0.00</td>
                </tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
   
    $pdf->lastPage();
    $pdf->Output('report_transaction_by_batch.pdf', 'I');
    
    exit;
?>
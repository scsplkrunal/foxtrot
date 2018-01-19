<?php 
require_once("include/config.php");
require_once(DIR_FS."islogin.php");
$instance = new ofac_fincen();
$get_ofac_data = array();
$get_ofac_main_data = array();

$ofac_main_id = isset($_GET['id'])?$instance->re_db_input($_GET['id']):0;
if($ofac_main_id >0)
{
    $get_ofac_main_data = $instance->select_data_master_report($ofac_main_id);
    $get_ofac_data = $instance->select_data_report($ofac_main_id);
}
else
{
    $get_ofac_main_data = $instance->select_data_master_report();
    $ofac_main_id = isset($get_ofac_main_data['id'])?$instance->re_db_input($get_ofac_main_data['id']):0;
    $get_ofac_data = $instance->select_data_report($ofac_main_id);
}
//print_r($get_ofac_data);exit;
$file_date = isset($get_ofac_main_data['created_time'])?$instance->re_db_input(date('m/d/Y',strtotime($get_ofac_main_data['created_time']))):'00/00/0000';
$total_matches = isset($get_ofac_main_data['total_match'])?$instance->re_db_input($get_ofac_main_data['total_match']):0;
$total_scan = isset($get_ofac_main_data['total_scan'])?$instance->re_db_input($get_ofac_main_data['total_scan']):0;
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
                    <td width="100%" style="font-size:14px;font-weight:normal;text-align:center;">Successful Brokerage, Inc</td>
                </tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0">
                <tr>
                    <td width="100%" style="font-size:18px;font-weight:bold;text-align:center;">FinCEN SEARCH </td>
                </tr>
           </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0">
                <tr>
                    <td width="100%" style="font-size:14px;font-weight:bold;text-align:center;">File Date - '.$file_date.'</td>
                </tr>
            </table>';
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    $html='<br/>';
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0" cellpadding="5" width="100%">
                <tr>
                    <td style="width:20%">
                        <table border="0" width="100%">
                            <tr>
                                <td>
                                    FINCEN NAME
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    FINCEN ADDRESS
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    FINCEN COUNTRY, PHONE
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:20%">
                        <table border="0" width="100%">
                            <tr>
                                <td style="text-align:center">
                                    TRACKING#
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    KEY NUMBER
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    NUMBER TYPE
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    DOB
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:20%">
                        <table border="0" width="100%">
                            <tr>
                                <td>
                                    CLIENT NAME
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    CLIENT ADDRESS
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    CLIENT COUNTRY, PHONE
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:20%">
                        <table border="0" width="100%">
                            <tr>
                                <td style="text-align:center">
                                    CLIENT#
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    SOC.SEC#
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    CIP#
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    OPEN DATE
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align:center">
                                    DOB
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:20%">
                        <table border="0" width="100%">
                            <tr>
                                <td>
                                    REP NO
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    REP NAME
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>';
    $html.='</table>';
    $pdf->Line(10, 81, 290, 81);
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
    $pdf->SetFont('times','B',12);
    $pdf->SetFont('times','',10);
    $html='<table border="0" cellpadding="5" width="100%">
                <tr>
                    <td style="width:40%">
                        <table border="0" cellpadding="5" width="100%">
                            <tr>
                                <td style="font-size:14px;font-weight:bold;text-align:left;">
                                    MATCH CRITERIA:  NAME
                                </td>
                            </tr>
                        </table>
                        <BR/>
                        <table border="1" width="100%">
                            <tr>
                                <td>
                                    <table border="0" cellpadding="5" width="100%">
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:60%">
                                                SENCHES-PENALOZA, ARTURO
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:40%">
                                                96268
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:60%">
                                                ARMENTA-LOPEZ, ENRIQUE
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:40%">
                                                531390047
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:60%">
                                                12307 SE 19TH WAY
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:40%">
                                                SOCIAL SECURITY NUMBER
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:60%">
                                                VANCOUVER, WA 98683
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:40%">
                                                11/02/0019
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    
                    <td style="width:60%" >
                        <table border="0" cellpadding="5" width="100%">
                            <tr>
                                <td style="font-size:14px;font-weight:bold;text-align:left;">
                                    
                                </td>
                            </tr>
                        </table>
                        <BR/>
                        <table border="1" width="100%">
                            <tr>
                                <td>
                                    <table border="0" cellpadding="5" width="100%">
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:35%">
                                                SENCHES-PENALOZA, ARTHUR
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:35%">
                                                9898999856
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:30%">
                                                433
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:35%">
                                               
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:35%">
                                                999-25-4512
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:30%">
                                                HABERT, GEORGE
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:35%">
                                               BLAWNOX, PA 15238-
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:35%">
                                                05/14/2004
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:30%">
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:35%">
                                               USA (123)999-5444
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:35%">
                                                09/12/2004
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:30%">
                                                
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="width:40%">
                        <table border="0" cellpadding="5" width="100%">
                            <tr>
                                <td style="font-size:14px;font-weight:bold;text-align:left;">
                                    MATCH CRITERIA:  NAME
                                </td>
                            </tr>
                        </table>
                        <BR/>
                        <table border="1" width="100%">
                            <tr>
                                <td>
                                    <table border="0" cellpadding="5" width="100%">
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:60%">
                                                SENCHES-PENALOZA, ARTURO
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:40%">
                                                96268
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:60%">
                                                ARMENTA-LOPEZ, ENRIQUE
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:40%">
                                                531390047
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:60%">
                                                12307 SE 19TH WAY
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:40%">
                                                SOCIAL SECURITY NUMBER
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:60%">
                                                VANCOUVER, WA 98683
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:40%">
                                                11/02/0019
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    
                    <td style="width:60%" >
                        <table border="0" cellpadding="5" width="100%">
                            <tr>
                                <td style="font-size:14px;font-weight:bold;text-align:left;">
                                    
                                </td>
                            </tr>
                        </table>
                        <BR/>
                        <table border="1" width="100%">
                            <tr>
                                <td>
                                    <table border="0" cellpadding="5" width="100%">
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:35%">
                                                SENCHES-PENALOZA, ARTHUR
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:35%">
                                                9898999856
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:30%">
                                                433
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:35%">
                                               
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:35%">
                                                999-25-4512
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:30%">
                                                HABERT, GEORGE
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:35%">
                                               BLAWNOX, PA 15238-
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:35%">
                                                05/14/2004
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:30%">
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:35%">
                                               USA (123)999-5444
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:35%">
                                                09/12/2004
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:30%">
                                                
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="width:40%">
                        <table border="0" cellpadding="5" width="100%">
                            <tr>
                                <td style="font-size:14px;font-weight:bold;text-align:left;">
                                    MATCH CRITERIA:  NAME
                                </td>
                            </tr>
                        </table>
                        <BR/>
                        <table border="1" width="100%">
                            <tr>
                                <td>
                                    <table border="0" cellpadding="5" width="100%">
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:60%">
                                                SENCHES-PENALOZA, ARTURO
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:40%">
                                                96268
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:60%">
                                                ARMENTA-LOPEZ, ENRIQUE
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:40%">
                                                531390047
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:60%">
                                                12307 SE 19TH WAY
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:40%">
                                                SOCIAL SECURITY NUMBER
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:60%">
                                                VANCOUVER, WA 98683
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:40%">
                                                11/02/0019
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    
                    <td style="width:60%" >
                        <table border="0" cellpadding="5" width="100%">
                            <tr>
                                <td style="font-size:14px;font-weight:bold;text-align:left;">
                                    
                                </td>
                            </tr>
                        </table>
                        <BR/>
                        <table border="1" width="100%">
                            <tr>
                                <td>
                                    <table border="0" cellpadding="5" width="100%">
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:35%">
                                                SENCHES-PENALOZA, ARTHUR
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:35%">
                                                9898999856
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:30%">
                                                433
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:35%">
                                               
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:35%">
                                                999-25-4512
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:30%">
                                                HABERT, GEORGE
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:35%">
                                               BLAWNOX, PA 15238-
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:35%">
                                                05/14/2004
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:30%">
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight:normal;text-align:left;width:35%">
                                               USA (123)999-5444
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:35%">
                                                09/12/2004
                                            </td>
                                            <td style="font-weight:normal;text-align:center;width:30%">
                                                
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>';
    $html.='</table>';
    //echo $html;exit;
    $pdf->Line(10, 81, 290, 81);
    $pdf->writeHTML($html, false, 0, false, 0);
    $pdf->Ln(5);
    
    $pdf->lastPage();
    $pdf->Output('report_fincen_client_check.pdf', 'I');
    
    exit;
?>
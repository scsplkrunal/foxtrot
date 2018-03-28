<script language="javascript">
function GetFileList()
{
    document.getElementsByName("HTTPDL_result").value="";
    //HTTPDL_result.value = "";
    HTTPDL.Host = "filetransfer.financialtrans.com";
    HTTPDL.UseProxy = false;
    HTTPDL.LocalDirectory = "E:\foxtrot_idc_file";
    HTTPDL.UseHttps = true;
    // Note: Test System Information
    HTTPDL.Target = "/tf/FANMail";
    //HTTPDL.Client = "419041819";
	HTTPDL.Client = "415171403";
	//415171403
    // Note: For testing UserID and Password will be supplied by DST
    HTTPDL.UserID = UserID.value;
    HTTPDL.ftpType = ftpType.value;
    HTTPDL.Password = Password.value;
    var list = HTTPDL.GetFileListAsXML();
    //alert(list);
    var dlist = "No file list returned";
    //HTTPs Download Guide Product Guide
    var xmldoc = MSXML3;
    xmldoc.async = false;
    xmldoc.preserveWhiteSpace = true;
    xmldoc.loadXML(list);
	
    var docelement = xmldoc.documentElement;
    
    if(docelement.hasChildNodes())
    {
            dlist = "<form name=\"Selection\">";
            var nodeList = docelement.childNodes;
            var node = nodeList.nextNode();
            while ( node != null )
            {
                var file = node.getAttribute("name");
                var display = node.getAttribute("short-name");
                if(HTTPDL.ftpType == 1)
                {
                    var file_type_array = ["07", "08", "09", "C1"];
                    var file_name_array = display.split('.');
                    var get_file_first_string = file_name_array[0];
                    var get_file_last_character = get_file_first_string.slice(-2);
                    //alert(file_type_array);
                    for (var i = 0; i < file_type_array.length; i++) {
                        if (file_type_array[i] === get_file_last_character) {
                            
                            dlist += "<input type=\"checkbox\" class=\"checkbox\" name=\"sfile\" style=\"display:inline;\" value=\"";
                            dlist += file;
                            dlist += "\">&nbsp;";
                            dlist += display;
                            dlist += "<br>";
                        }
                    }
                }
                else
                {
                    dlist += "<input type=\"checkbox\" class=\"checkbox\" name=\"sfile\" style=\"display:inline;\" value=\"";
                    dlist += file;
                    dlist += "\">&nbsp;";
                    dlist += display;
                    dlist += "<br>";
                }
                node = nodeList.nextNode();
            }
            //HTTPs Download Guide Product Guide            
            dlist += "<br>";
            dlist += "<div class=\"panel-footer\">";
            dlist += "<div class=\"selectwrap\">";
            dlist += "<input type=\"button\" value=\"Download Files\" onclick=\"Download()\">";
            dlist += "&nbsp;<input type=\"button\" value=\"Cancel\" onclick=\"CancelDownload()\">";
            dlist += "</div>";
            dlist += "<br>";
            dlist += "</div>";
            dlist += "</form>";
    }
	
	//document.getElementByID("FileList").innerHTML=dlist;
	document.getElementById("FileList").innerHTML=dlist;
    Download();
    //FileList.innerHTML = dlist;
}
function Download()
{
    HTTPDL.LocalDirectory = DestDir.value;
	document.getElementById('subscribe_frm');
	var selection = document.forms["Selection"].sfile;
    
    //var selection = document.forms[0].sfile;console.log(selection);
    var flist = "";
    for ( index=0; index<selection.length; ++index)
    {//alert(selection[index]);
        /*if ( selection[index].checked )
        {*/
            flist += selection[index].value;
            flist += ";";
        /*}*/
    }
    PostResult("Begin Download");
    //HTTPs Download Guide Product Guide    
    HTTPDL.DownloadFiles( flist );
}
function CancelDownload()
{
    HTTPDL.CancelRequest();
}
function TerminateDownload()
{
    HTTPDL.Terminate();
}
function PostResult( msg )
{
    content = HTTPDL_result.value;
    content += msg;
    content += "\r\n";
    HTTPDL_result.value = content;
}
</script>
<script for="HTTPDL" event="DownloadError( code, msg )" language="javascript">
    PostResult(msg);
</script>
<script for="HTTPDL" event="DownloadComplete()" language="javascript">
//HTTPs Download Guide Product Guide
PostResult("DownloadComplete");
</script>
<script for="HTTPDL" event="DownloadProgress( msg )" language="javascript">
PostResult( msg );
</script>
<!--<div class="container">
<h1>Import</h1>

<div class="col-lg-8 well">
<div class="tab-content col-md-12">
</div>
</div>

<div class="col-lg-4 well">-->

<!--<div class="tab-content col-md-12">
</div>
</div>
</div>-->
<div class="sectionwrapper" style="flex: 1; overflow: auto;">
  <div class="container">
  <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left">
		  <div class="graphbox">
		        <div class="graphboxtitle">Import </div>
				<div class="graphboxcontent">
                <div class="tab-content col-md-12">
                <?php if(isset($_GET['tab']) && ($_GET['tab']=="review_files" || $_GET['tab']=="processed_files") && $_GET['id']>0){
                    $get_file_data = $instance->select_user_files($_GET['id']);
                    ?>
                <h3>Review & Resolve Exceptions</h3><br />
                <h4 style="margin-right: 10% !important; display: inline;">File:<?php if(isset($get_file_data['file_name'])){ echo $get_file_data['file_name']; } ?></h4>
                <h4 style="margin-right: 10% !important; display: inline;">Source: <?php if(isset($get_file_data['source'])){ echo $get_file_data['source']; } ?></h4>
                <h4 style="margin-right: 10% !important; display: inline;">Date:<?php if(isset($get_file_data['last_processed_date']) && $get_file_data['last_processed_date'] != '0000-00-00'){ echo date('m/d/Y',strtotime($get_file_data['last_processed_date']));}else echo '00-00-0000' ?></h4>
                <h4 style="margin-right: 10% !important; display: inline;">Amount: $370.20</h4>
                <?php } ?>
                <div class="tab-pane active" id="tab_a"><?php if(isset($_GET['tab']) && ($_GET['tab']=="current_files" || $_GET['tab']=="archived_files") || !isset($_GET['tab'])){?>
                    <ul class="nav nav-tabs ">
                      <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="current_files"){ echo "active"; }else if(!isset($_GET['tab'])){echo "active";}else{ echo '';} ?>" ><a href="#current_files" data-toggle="tab">Current Files</a></li>
                      <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="archived_files"){ echo "active"; } ?>" ><a href="#archived_files" data-toggle="tab">Archived Files</a></li>
                     </ul> <?php } ?> <br />
                      <!-- Tab 1 is started -->
                        <div class="tab-content">
                        <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="current_files"){ echo "active"; }else if(!isset($_GET['tab'])){echo "active";}else{ echo '';} ?>" id="current_files">
                            
                            <div class="panel-overlay-wrap">
                                <div class="panel-body" style="border: 1px solid #DFDFDF; margin-top: 17px;">
                                    <div class="row">
                                        <!--<div class="row">
                                        <div class="col-md-5"></div>
                                            <a class="btn btn-sm btn-warning col-md-1" href="<?php echo CURRENT_PAGE; ?>?action=open_ftp"> Fetch</a>
                                            <!--<a href="<?php echo CURRENT_PAGE; ?>?action=open_ftp"><!--<button type="button"  name="fetch" value="fetch" style="display: inline;"> Fetch</button></a>-->
                                            <!--<button type="submit" class="btn btn-sm btn-default col-md-2"  name="progress_all" value="progress_all" style="display: inline;"> Process All</button>
                                        </div>
                                        <br />-->
                                        <div class="table-responsive" style="margin: 0px 5px 0px 5px;">
                                            <table id="data-table" class="table table-bordered table-stripped table-hover">
                                                <thead>
                                                    <th>Imported</th>
                                                    <th>Last Proccessed</th>
                                                    <th>File Name</th>
                                                    <th>File Type</th>
                                                    <th>Source</th>
                                                    <th></th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $count = 0;
                                                if(isset($return) && $return != array())
                                                {
                                                $return = $instance->select_current_files();//echo '<pre>';print_r($return);exit;
                                                foreach($return as $key=>$val){
                                                    if(isset($val['imported_date']) && $val['imported_date']!= ''){
                                                   ?>
                                                    <tr>
                                                        <td style="width: 15%;"><?php echo date('m/d/Y',strtotime($val['imported_date']));?></td>
                                                        <td style="width: 10%;"><?php if(isset($val['last_processed_date']) && $val['last_processed_date'] != '0000-00-00'){echo date('m/d/Y',strtotime($val['last_processed_date']));}?></td>
                                                        <td style="width: 10%;"><?php echo $val['file_name'];?></td>
                                                        <td style="width: 15%;"><?php echo $val['file_type'];?></td>
                                                        <td><?php echo $val['source'];?></td>
                                                        <?php 
                                                        if(isset($val['source']) && $val['source'] == 'DSTFANMail')
                                                        {
                                                            $total_processed_data = $instance->get_fanmail_detail_data($val['id']);
                                                            $count_processed_data = count($total_processed_data);
                                                            $total_exception_data = $instance->get_exception_data($val['id']);
                                                            $count_exception_data = count($total_exception_data);
                                                        }
                                                        else
                                                        {
                                                            $total_processed_data = $instance->get_idc_detail_data($val['id']);
                                                            $count_processed_data = count($total_processed_data);
                                                            $total_exception_data = $instance->get_exception_data($val['id']);
                                                            $count_exception_data = count($total_exception_data);
                                                        }
                                                        if(isset($count_processed_data) && $count_processed_data>0)
                                                        {
                                                            $total_uncomplete_process = ($count_exception_data*100)/$count_processed_data;
                                                            $total_complete_process = round(100-$total_uncomplete_process);
                                                        }
                                                        else
                                                        {
                                                            $total_complete_process=0;
                                                        }
                                                        ?>
                                                        <td style="width: 20%;">
                                                        <div class="progress">
                                                        <?php if(isset($total_complete_process) && $total_complete_process < 100){?>
                                                            <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $total_complete_process;?>%">
                                                              <?php echo $total_complete_process.'%';?> Complete
                                                            </div>
                                                        <?php }else{ ?>
                                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $total_complete_process;?>%">
                                                              <?php echo $total_complete_process.'%';?> Complete
                                                            </div>
                                                        <?php } ?>
                                                        </div>
                                                        </td>
                                                        <?php $check_exception_data = $instance->check_exception_data($val['id']);
                                                            $check_processed_data = $instance->check_processed_data($val['id']);                                                        
                                                        ?>
                                                        <td style="width: 30%;">
                                                        <form method="post">
                                                        <select name="process_file_<?php echo $val['id'];?>" id="process_file_<?php echo $val['id'];?>" class="form-control" style=" width: 75% !important;display: inline;">
                                                            <option value="0">Select Options</option>
                                                            <option value="1" >Delete File</option>
                                                            <option value="2" >Reprocess</option>
                                                            <option value="3" <?php if(isset($check_exception_data) && $check_exception_data =='0' && isset($check_processed_data) && $check_processed_data == '3'){echo "selected='selected'";} ?> <?php if($val['processed']==0){echo 'disabled="true"';}?> >Review Process</option>
                                                            <option value="4" <?php if(isset($check_exception_data) && $check_exception_data =='4'){echo "selected='selected'";} ?> <?php if($val['processed']==0){echo 'disabled="true"';}?>>Resolve Exceptions</option>
                                                        </select>
                                                        <input type="hidden" name="id" id="id" value="<?php echo $val['id'];?>" />
                                                        <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                        </form>
                                                        </td>
                                                    </tr>
                                                <?php }} 
                                                }?>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                 </div>
                                    <div class="panel-overlay">
                                        <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                    </div>
                                 </div>
                                
                            </div>
                            <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="archived_files"){ echo "active"; } ?>" id="archived_files">
                                <div class="panel-overlay-wrap">
                                    <div class="panel-body" style="border: 1px solid #DFDFDF; margin-top: 17px;">
                                        <div class="row">
                                            <div class="table-responsive" style="margin: 0px 5px 0px 5px;">
                                                <table id="data-table1" class="table table-bordered table-stripped table-hover">
                                                    <thead>
                                                        <th>Imported</th>
                                                        <th>Last Proccessed</th>
                                                        <th>File Name</th>
                                                        <th>File Type</th>
                                                        <th>Source</th>
                                                        <th></th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $count = 0;
                                                    if(isset($return) && $return != array())
                                                    {
                                                    $return = $instance->select_archive_files();
                                                    foreach($return as $key=>$val){
                                                        $check_exception_data = $instance->check_exception_data($val['id']);
                                                        if(isset($val['imported_date']) && $val['imported_date']!= '' && $check_exception_data <= 0){
                                                       ?>
                                                        <tr>
                                                            <td style="width: 15%;"><?php echo date('m/d/Y',strtotime($val['imported_date']));?></td>
                                                            <td style="width: 10%;"><?php if(isset($val['last_processed_date']) && $val['last_processed_date'] != '0000-00-00'){echo date('m/d/Y',strtotime($val['last_processed_date']));}?></td>
                                                            <td style="width: 10%;"><?php echo $val['file_name'];?></td>
                                                            <td style="width: 15%;"><?php echo $val['file_type'];?></td>
                                                            <td><?php echo $val['source'];?></td>
                                                            <?php 
                                                            if(isset($val['source']) && $val['source'] == 'DSTFANMail')
                                                            {
                                                                $total_processed_data = $instance->get_fanmail_detail_data($val['id']);
                                                                $count_processed_data = count($total_processed_data);
                                                                $total_exception_data = $instance->get_exception_data($val['id']);
                                                                $count_exception_data = count($total_exception_data);
                                                            }
                                                            else
                                                            {
                                                                $total_processed_data = $instance->get_idc_detail_data($val['id']);
                                                                $count_processed_data = count($total_processed_data);
                                                                $total_exception_data = $instance->get_exception_data($val['id']);
                                                                $count_exception_data = count($total_exception_data);
                                                            }
                                                            if(isset($count_processed_data) && $count_processed_data>0)
                                                            {
                                                                $total_uncomplete_process = ($count_exception_data*100)/$count_processed_data;
                                                                $total_complete_process = round(100-$total_uncomplete_process);
                                                            }
                                                            else
                                                            {
                                                                $total_complete_process=0;
                                                            }
                                                            ?>
                                                            <td style="width: 20%;">
                                                            <div class="progress">
                                                            <?php if(isset($total_complete_process) && $total_complete_process < 100){?>
                                                                <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $total_complete_process;?>%">
                                                                  <?php echo $total_complete_process.'%';?> Complete
                                                                </div>
                                                            <?php }else{ ?>
                                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $total_complete_process;?>%">
                                                                  <?php echo $total_complete_process.'%';?> Complete
                                                                </div>
                                                            <?php } ?>
                                                            </div>
                                                            </td>
                                                            <td style="width: 30%;">
                                                            <form method="post">
                                                            <select name="archive_option" id="archive_option" class="form-control" style=" width: 75% !important;display: inline;">
                                                                <option value="0">Select Options</option>
                                                                <option value="1" >View</option>
                                                            </select>
                                                            <input type="hidden" name="id" id="id" value="<?php echo $val['id'];?>" />
                                                            <button type="submit" class="btn btn-sm btn-warning" name="go_archive" value="go_archive" style="display: inline;"> Go</button>
                                                            </form>
                                                            </td>
                                                        </tr>
                                                    <?php }} 
                                                    }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="panel-overlay">
                                         <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="tab-content col-md-12">
                    <div class="tab-pane <?php if(isset($_GET['tab']) && ($_GET['tab']=="review_files" || $_GET['tab']=="processed_files")){ echo "active"; } ?>" id="tab_review"><?php if(isset($_GET['tab']) && ($_GET['tab']=="review_files" || $_GET['tab']=="processed_files") && $_GET['id']>0){?>
                        <ul class="nav nav-tabs ">
                          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="review_files"){ echo "active"; }?>" ><a href="#review_files" data-toggle="tab">For Review</a></li>
                          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="processed_files"){ echo "active"; } ?>" ><a href="#processed_files" data-toggle="tab">Processed</a></li>
                         </ul> <?php } ?> <br />
                          <!-- Tab 1 is started -->
                            <div class="tab-content">
                            <div class="tab-pane <?php if(isset($_GET['tab']) &&$_GET['tab']=="review_files" && $_GET['id']>0){ echo "active"; } ?>" id="review_files">
                                
                                <div class="panel-overlay-wrap">
                                    <div class="panel-body" style="border: 1px solid #DFDFDF; margin-top: 17px;">
                                        <div class="row">
                                            <!--<div class="row">
                                            <div class="col-md-5"></div>
                                                <a class="btn btn-sm btn-warning col-md-1" href="<?php echo CURRENT_PAGE; ?>?action=open_ftp"> Fetch</a>
                                                <!--<a href="<?php echo CURRENT_PAGE; ?>?action=open_ftp"><button type="button"  name="fetch" value="fetch" style="display: inline;"> Fetch</button></a>-->
                                                <!--<button type="submit" class="btn btn-sm btn-default col-md-2"  name="progress_all" value="progress_all" style="display: inline;"> Process All</button>
                                            </div>
                                            <br />-->
                                            <div class="table-responsive" style="margin: 0px 5px 0px 5px;">
                                                <table id="data-table3" class="table table-bordered table-stripped table-hover">
                                                    <thead>
                                                        <th><input type="checkbox" class="checkbox" name="batch_action" /></th>
                                                        <th>Date</th>
                                                        <th>Rep</th>
                                                        <th>Client</th>
                                                        <th>Product</th>
                                                        <th>Amount</th>
                                                        <th>Issue</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $file_id = isset($_GET['id'])?$instance->re_db_input($_GET['id']):0;
                                                        $return_exception = $instance->select_exception_data($file_id);
                                                        foreach($return_exception as $error_key=>$error_val)
                                                        {
                                                        ?>
                                                        <tr>
                                                            <td><input type="checkbox" class="checkbox" name="batch_action"/></td>
                                                            <td><?php echo date('m/d/Y',strtotime($error_val['date']));?></td>
                                                            <td><?php echo $error_val['rep'];?></td>
                                                            <td><?php echo $error_val['client'];?></td>
                                                            <td><?php echo $error_val['product'];?></td>
                                                            <td><?php echo $error_val['amount'];?></td>
                                                            <td><?php echo $error_val['error'];?></td>
                                                            <td style="width: 30%;">
                                                            <form method="post">
                                                            <select name="review_action_" id="review_action_" class="form-control" style=" width: 75% !important;display: inline;">
                                                                <option value="0">ADD</option>
                                                            </select>
                                                            <input type="hidden" name="id" id="id" value="" />
                                                            <a href="#solve_exception_model" data-toggle="modal"><button type="submit" onclick="add_exception_value('<?php echo $error_val['file_id'];?>','<?php echo $error_val['temp_data_id'];?>','<?php echo $error_val['field'];?>','<?php echo $error_val['rep'];?>');" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button></a>
                                                            </form>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                   </tbody>
                                                </table>
                                            </div>
                                        </div>
                                     </div>
                                        <div class="panel-overlay">
                                            <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                        </div>
                                     </div>
                                    
                                </div>
                                <div class="tab-pane <?php if(isset($_GET['tab']) && $_GET['tab']=="processed_files" && $_GET['id']>0){ echo "active"; } ?>" id="processed_files">
                                    <div class="panel-overlay-wrap">
                                        <div class="panel-body" style="border: 1px solid #DFDFDF; margin-top: 17px;">
                                            <div class="row">
                                                <div class="table-responsive" style="margin: 0px 5px 0px 5px;">
                                                    <table id="data-table4" class="table table-bordered table-stripped table-hover">
                                                        <thead>
                                                            <th>Date</th>
                                                            <th>Broker</th>
                                                            <th>Client</th>
                                                            <th>Product</th>
                                                            <th>Amount</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $file_id = isset($_GET['id'])?$instance->re_db_input($_GET['id']):0;
                                                            $return_solved_exception = $instance->select_solved_exception_data($file_id);
                                                            foreach($return_solved_exception as $process_key=>$process_val)
                                                            {
                                                                $broker_name = $process_val['first_name'].' '.$process_val['middle_name']                                                                
.' '.$process_val['last_name']                                                            ?>
                                                            <tr>
                                                                <td><?php echo date('m/d/Y',strtotime($process_val['date']));?></td>
                                                                <td><?php echo $process_val['broker'];?></td>
                                                                <td><?php echo $process_val['client'];?></td>
                                                                <td><?php echo $process_val['product'];?></td>
                                                                <td><?php echo $process_val['amount'];?></td>
                                                            </tr>
                                                            <?php } ?>                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                         </div>
                                         <div class="panel-overlay">
                                             <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content col-md-12">
                    <div class="tab-pane <?php if(isset($_GET['tab']) && $_GET['tab']=="view_processed_files"){ echo "active"; } ?>" id="tab_view"><?php if(isset($_GET['tab']) && $_GET['tab']=="view_processed_files" && $_GET['id']>0){?>
                        <ul class="nav nav-tabs ">
                          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="view_processed_files"){ echo "active"; } ?>" ><a href="#view_processed_files" data-toggle="tab">View Processed Data</a></li>
                         </ul> <?php } ?> <br />
                          <!-- Tab 1 is started -->
                            <div class="tab-content">
                                <div class="tab-pane <?php if(isset($_GET['tab']) && $_GET['tab']=="view_processed_files" && $_GET['id']>0){ echo "active"; } ?>" id="view_processed_files">
                                    <div class="panel-overlay-wrap">
                                        <div class="panel-body" style="border: 1px solid #DFDFDF; margin-top: 17px;">
                                            <div class="row">
                                                <div class="table-responsive" style="margin: 0px 5px 0px 5px;">
                                                    <table id="data-table5" class="table table-bordered table-stripped table-hover">
                                                        <thead>
                                                            <th>Date</th>
                                                            <th>Broker</th>
                                                            <th>Client</th>
                                                            <th>Product</th>
                                                            <th>Amount</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $file_id = isset($_GET['id'])?$instance->re_db_input($_GET['id']):0;
                                                            $return_processed_data = $instance->select_processed_data($file_id);
                                                            foreach($return_processed_data as $process_key=>$process_val)
                                                            {
                                                                $broker_name = $process_val['first_name'].' '.$process_val['middle_name']                                                                
.' '.$process_val['last_name']                                                            ?>
                                                            <tr>
                                                                <td><?php echo date('m/d/Y',strtotime($process_val['date']));?></td>
                                                                <td><?php echo $process_val['broker'];?></td>
                                                                <td><?php echo $process_val['client'];?></td>
                                                                <td><?php echo $process_val['product'];?></td>
                                                                <td><?php echo $process_val['amount'];?></td>
                                                            </tr>
                                                            <?php } ?>                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                         </div>
                                         <div class="panel-overlay">
                                             <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content col-md-12">
                    <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="open_ftp"){ echo "active"; } ?>" id="ftp">
                    <?php
                    if($action=='add_ftp'||($action=='edit_ftp' && $id>0)){
                        ?>
                        <form method="POST">
                        <div class="panel">            
                            <div class="panel-heading">
                                <div class="panel-control" style="float: right;">
                    				<div class="btn-group dropdown">
                    					<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                    					<ul class="dropdown-menu dropdown-menu-right" style="">
                    						<li><a href="<?php echo CURRENT_PAGE; ?>?tab=open_ftp&action=view_ftp"><i class="fa fa-eye"></i> View List</a></li>
                    					</ul>
                    				</div>
                    			</div>
                                <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i><?php echo $action=='add_ftp'?'Add':'Edit'; ?> FTP</h3>
                    		</div>
                            <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Host Name <span class="text-red">*</span></label><br />
                                        <input type="text" class="form-control" name="host_name" value="<?php echo $host_name;?>"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User Name <span class="text-red">*</span></label><br />
                                        <input type="text" class="form-control" name="user_name" value="<?php echo $user_name;?>"  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password <span class="text-red">*</span></label><br />
                                        <input type="password" class="form-control" name="password" value=""  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm Password <span class="text-red">*</span></label><br />
                                        <input type="password" class="form-control" name="confirm_password" value=""  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Folder Location </label><br />
                                        <input type="text" class="form-control" name="folder_location" value="<?php echo $folder_location;?>"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status <span class="text-red">*</span></label><br />
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" <?php if($status != '' && $status == 1){echo "selected='selected'";} ?>>Active</option>
                                            <option value="0" <?php if($status != '' && $status == 0){echo "selected='selected'";} ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                           </div>
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>File Type <span class="text-red">*</span></label><br />
                                        <select name="ftp_file_type" id="ftp_file_type" class="form-control">
                                            <option value="">Select FileType</option>
                                            <option value="1" <?php if($ftp_file_type != '' && $ftp_file_type == 1){echo "selected='selected'";} ?>>DST FANMAIL</option>
                                            <option value="2" <?php if($ftp_file_type != '' && $ftp_file_type == 2){echo "selected='selected'";} ?>>DST IDC</option>
                                        </select>
                                    </div>
                                </div>
                           </div>
                           </div>
                           <div class="panel-footer">
                                <div class="selectwrap">
                                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                                    <input type="submit" name="submit" onclick="waitingDialog.show();" value="Save"/>	
                                    <a href="<?php echo CURRENT_PAGE.'?tab=open_ftp&action=view_ftp';?>"><input type="button" name="cancel" value="Cancel" /></a>
                                </div><br />
                           </div>
                        
                        </div>
                        </form>
                        <?php
                            }else{?>
                        <div class="panel">
                        <form method="post" enctype="multipart/form-data">
                    		<!--<div class="panel-heading">
                                <div class="panel-control">
                                    <div class="btn-group dropdown" style="float: right;">
                                        <button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                    					<ul class="dropdown-menu dropdown-menu-right" style="">
                    						<li><a href="<?php echo CURRENT_PAGE; ?>?tab=open_ftp&action=add_ftp"><i class="fa fa-plus"></i> Add new FTP Site</a></li>
                                            <li><a href="<?php echo CURRENT_PAGE; ?>"><i class="fa fa-minus"></i> Back to List of Current Files Page</a></li>
                    					</ul>
                    				</div>
                    			</div>
                            </div><br />-->
                    		<div class="panel-body">
                                <div class="table-responsive">
                    			<table id="data-table2" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    	            <thead>
                    	                <tr>
                                            <th>Host Name</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th class="text-center">ACTION</th>
                                        </tr>
                    	            </thead>
                    	            <tbody>
                                    <?php
                                    if(isset($_GET['tab']) && $_GET['tab'] =='open_ftp'){
                                    $count = 0;
                                    foreach($return_ftplist as $key=>$val){
                                        ?>
                    	                   <tr>
                                                <td><?php echo $val['host_name'];?></td>
                                                <td><?php echo $val['user_name'];?></td>
                                                <td class="text-center">
                                                    <?php
                                                        if($val['status']==1){
                                                            ?>
                                                            <a href="<?php echo CURRENT_PAGE; ?>?action=ftp_status&id=<?php echo $val['id']; ?>&status=0" class="btn btn-sm btn-success"><i class="fa fa-check-square-o"></i> Active</a>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                            <a href="<?php echo CURRENT_PAGE; ?>?action=ftp_status&id=<?php echo $val['id']; ?>&status=1" class="btn btn-sm btn-warning"><i class="fa fa-warning"></i> Inactive</a>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="<?php echo CURRENT_PAGE; ?>?tab=open_ftp&action=edit_ftp&id=<?php echo $val['id']; ?>" class="btn btn-md btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                    <a onclick="return conf('<?php echo CURRENT_PAGE; ?>?action=delete_ftp&id=<?php echo $val['id']; ?>');" class="btn btn-md btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>
                                                    <a href="<?php echo CURRENT_PAGE; ?>?tab=get_ftp&id=<?php echo $val['id']; ?>" class="btn btn-md btn-warning"><i class="fa fa-download"></i> Fetch</a>
                                                    <!--<button type="submit" class="btn btn-md btn-warning" name="submit_files" value="Fetch"><i class="fa fa-download"></i> Fetch</button>-->
                                                    
                                                </td>
                                            </tr>
                                    <?php } } ?>
                                    </tbody>
                                </table>
                                </div>
                    		</div>
                        </form>
                    	</div>
                        <!--<form method="post" enctype="multipart/form-data">
                            <div class="row">
                				<div class="col-sm-12 form-group">
                					<label>Upload files </label>
                				    <input type="file" class="form-control" name="file" id="file" />
                                    <input type="submit" name="submit_files" onclick="waitingDialog.show();" value="Save"/>
                                </div>
                            </div>
                        </form>-->
                        <?php } ?>                                    
                    </div>
                </div>
                <div class="tab-content col-md-12">
                    <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="get_ftp" && $id>0){ echo "active"; } ?> id="ftp">
                        <div class="panel">            
                            <div class="panel-heading">
                                <div class="panel-control" style="float: right;">
                    				<div class="btn-group dropdown">
                    					<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                    					<ul class="dropdown-menu dropdown-menu-right" style="">
                    						<li><a href="<?php echo CURRENT_PAGE; ?>?tab=open_ftp&action=view_ftp"><i class="fa fa-eye"></i> View List</a></li>
                    					</ul>
                    				</div>
                    			</div>
                                <h3 class="panel-title"><i class="fa fa-file"></i> Download Files (Only used with Internet Explorer)</h3>
                    		</div>
                            
                            <div class="panel-body" onunload="TerminateDownload()" id="fetch_file_div" style="display: none;">
                            
                            <object id="HTTPDL" style="height: 0px !important; width: 0px !important;" classid="CLSID:2DEA82A9-7FEF-4F68-8091-B800ECF54C9F" codeBase="./dsthttpdl.dll"></object>
                        	<!--<object style="display:none" id="SOME_ID" classid="clsid:SOME_CLASS_ID" codebase="./somePath.dll"></object>-->
                            <object id="MSXML3" style="DISPLAY: none" codeBase="http:msxml3.cab#version=8,00,7820,0" type="application/x-oleobject" data="data:application/x-oleobject;base64,EQ/Z9nOc0xGzLgDAT5kLtA==" classid="clsid:f5078f32-c551-11d3-89b9-0000f81fe221"></object>
                                
                            <div id="Main">
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>User ID <span class="text-red">*</span></label><br />
                                        <input type="text" class="form-control" name="UserID" id="UserID" value="<?php echo $return_ftp_host['user_name'];?>" disabled="true" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Destination Directory (local): </label><br />
                                        <input type="text" value="<?php echo $return_ftp_host['folder_location'];?>" id="DestDir" disabled="true" class="form-control"/></p>
                                        <input type="hidden" class="form-control" name="Password" id="Password" disabled="true" value="<?php echo $instance->decryptor($return_ftp_host['password']);?>"  />
                                        <input type="hidden" class="form-control" name="ftpType" id="ftpType" disabled="true" value="<?php echo $return_ftp_host['ftp_file_type'];?>"  />
                                    </div>
                                </div>
                            </div>
                            <!--HTTPs Download Guide Product Guide-->
                            <div class="panel-footer">
                                <div class="selectwrap">
                                    <input type="button" value="Download Files" onclick="GetFileList()"/>
                                    <input type="button" value="Cancel Download" onclick="CancelDownload()"/>                                    
                                    <!--<a href="<?php echo CURRENT_PAGE.'?tab=open_ftp&action=view_ftp';?>"><input type="button" name="cancel" value="Cancel" /></a>-->
                                    <a href="#upload_zip_import" data-toggle="modal"><input type="button" name="import_files" value="Import Files" /></a>
                                </div><br />
                           </div>
                           </div>
                           <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="HTTPDL_result" rows="10" cols="50" wrap="soft" class="form-control"></textarea>
                                    </div>
                            </div>
                           </div>
                           <div class="row" style="display: none;">
                            <div class="col-md-12">
                                    <div id="FileList">
                                    </div>
                            </div>
                           </div>      
                           </div>
                           <!--<div class="panel-footer">
                                <div class="selectwrap">
                                    <input type="button" value="Get FileList" onclick="GeFileList()"/>
                                    <a href="<?php echo CURRENT_PAGE.'?tab=open_ftp&action=view_ftp';?>"><input type="button" name="cancel" value="Cancel" /></a>
                                </div><br />
                           </div>-->
                        
                        </div>
                    </div>
                    <!-- Modal for add files -->
                    	<div id="upload_zip_import" class="modal fade inputpopupwrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    		<div class="modal-dialog">
                    		<div class="modal-content">
                    		<div class="modal-header" style="margin-bottom: 0px !important;">
                    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    			<h4 class="modal-title">Fetch Files</h4>
                    		</div>
                    		<div class="modal-body">
                             <div class="col-md-12">
                                <div id="msg_files">
                                </div>
                            </div>
                            <form id="form_import_files" name="form_import_files" style="padding: 10px;" method="post" onsubmit="return formsubmitfiles();" enctype="multipart/form-data">
    						<div class="inputpopup">
                                <!--<input type="file" class="form-control" name="file_attach" id="file_attach"/>-->
    							<input type="file" id="files" name="files[]" multiple="multiple" accept="zip/*" class="form-control"/>
    						</div>
    						<div class="inputpopup">
                                <input type="hidden" name="fetch_files" value="Fetch Files"  />
    							<button type="submit" class="btn btn-sm btn-warning" id="fetch_files" name="fetch_files" value="Fetch Files"><i class="fa fa-save"></i> Save</button>
    						</div>
                            </form>			
                            </div><!-- End of Modal body -->
                    		</div><!-- End of Modal content -->
                    		</div><!-- End of Modal dialog -->
                    </div><!-- End of Modal -->
                </div>
            </div>
            </div>
        </div>
        
		</div>
    </div>
  </div>
<!-- Lightbox strart -->							
	<!-- Modal for add client notes -->
	<div id="solve_exception_model" class="modal fade inputpopupwrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header" style="margin-bottom: 0px !important;">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
			<h4 class="modal-title">Resolve Exceptions</h4>
		</div>
		<div class="modal-body">
        <div class="col-md-12">
            <div id="msg_exception">
            </div>
        </div>
        <br />
        <div class="col-md-12" style="alignment-adjust: central;">
            <form method="post" id="resolve_exception_form" name="resolve_exception_form" onsubmit="return exception_submit();">
                <div class="row">
                <div class="col-md-5">
                    <div class="inputpopup">
                        <label id="field_label">Add Exception value</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="inputpopup">
                        <input type="text" name="exception_value" id="exception_value" value=""/>
                        <div id="demo-dp-range">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" name="exception_value_date" id="exception_value_date" class="form-control" value="" style="display: none;"/>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row" style="display: none;" id="broker_terminated">
                <div class="col-md-5">
                    <div class="inputpopup">
                        <label id="broker_termination_label">Broker Termination Date</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="inputpopup">
                        <div id="demo-dp-range">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" name="broker_termination_date" id="broker_termination_date" class="form-control" value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="row" id="assign_rep_to_broker" style="display: none;">
                <div class="col-md-5">
                    <div class="inputpopup">
                        <label>Select Broker </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="inputpopup">
                        <select name="rep_for_broker" id="rep_for_broker" class="form-control" onchange="check_u5_date(this.value);">
                            <option value="">Select Broker</option>
                            <?php foreach($get_broker as $key=>$val){?>
                            <option value="<?php echo $val['id'];?>"><?php echo $val['first_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <div class="inputpopup">
                        <input type="hidden" name="exception_data_id" id="exception_data_id" value=""/>
                        <input type="hidden" name="exception_field" id="exception_field" value=""/>
                        <input type="hidden" name="exception_file_id" id="exception_file_id" value=""/>
                        <input type="hidden" name="resolve_exception" id="resolve_exception" value="Resolve Exception" />&nbsp;&nbsp;&nbsp;&nbsp;
        	            <button type="submit" style="alignment-adjust: central !important;" class="btn btn-sm btn-warning" name="resolve_exception" value="Resolve Exception"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
                <div class="col-md-5"></div>
                </div>
            </form>
		</div>
        <br />
        </div><!-- End of Modal body -->
		</div><!-- End of Modal content -->
		</div><!-- End of Modal dialog -->
    </div>
<!-- End of Modal --> 
<style>
#table-scroll {
  height:500px;
  overflow:auto;  
  margin-top:20px;
}
.btn-primary {
    color: #fff;
    background-color: #337ab7 !important;
    border-color: #2e6da4 !important;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('#data-table').DataTable({
        "pageLength": 25,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "dom": '<"toolbar">frtip',
        "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 5,6 ] }, 
                        { "bSearchable": false, "aTargets": [ 5,6 ] }]
        });
        $("div.toolbar").html('<a class="btn btn-sm btn-warning" href="<?php echo CURRENT_PAGE; ?>?action=open_ftp"> Fetch</a>'+
                    '<a class="btn btn-sm btn-default" href="<?php echo CURRENT_PAGE; ?>?action=process_all" style="display:inline;">Process All</a>');
} );
$(document).ready(function() {
        $('#data-table1').DataTable({
        "pageLength": 25,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "dom": '<"toolbar1">frtip',
        "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 5,6 ] }, 
                        { "bSearchable": false, "aTargets": [ 5,6 ] }]
        });
        
        
} );
$(document).ready(function() {
        $('#data-table2').DataTable({
        "pageLength": 25,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "dom": '<"toolbar2">frtip',
        "aoColumnDefs": [{ "bSortable": false, "aTargets": [ 3 ] }, 
                        { "bSearchable": false, "aTargets": [ 3 ] }]
        });
        $("div.toolbar2").html('<div class="panel-control">'+
                    '<div class="btn-group dropdown" style="float: right;">'+
                        '<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>'+
    					'<ul class="dropdown-menu dropdown-menu-right" style="">'+
    						'<li><a href="<?php echo CURRENT_PAGE; ?>?tab=open_ftp&action=add_ftp"><i class="fa fa-plus"></i> Add new FTP Site</a></li>'+
                            '<li><a href="<?php echo CURRENT_PAGE; ?>"><i class="fa fa-minus"></i> Back to List of Current Files Page</a></li>'+
                        '</ul>'+
    				'</div>'+
    			'</div>');
} );
$(document).ready(function() {
        $('#data-table3').DataTable({
        "pageLength": 25,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bSort" : false,
        "bAutoWidth": false,
        "dom": '<"toolbar3">frtip'});
        $("div.toolbar3").html('<div class="panel-control">'+
                    '<div class="btn-group dropdown" style="float: right;">'+
                        '<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>'+
    					'<ul class="dropdown-menu dropdown-menu-right" style="">'+
    						'<li><a href="<?php echo CURRENT_PAGE; ?>"><i class="fa fa-minus"></i> Back to List of Current Files Page</a></li>'+
                        '</ul>'+
    				'</div>'+
    			'</div>');
} );
$(document).ready(function() {
        $('#data-table4').DataTable({
        "pageLength": 25,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bSort" : false,
        "bAutoWidth": false,
        "dom": '<"toolbar4">frtip'
        });
        $("div.toolbar4").html('<div class="panel-control">'+
                    '<div class="btn-group dropdown" style="float: right;">'+
                        '<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>'+
    					'<ul class="dropdown-menu dropdown-menu-right" style="">'+
    						'<li><a href="<?php echo CURRENT_PAGE; ?>"><i class="fa fa-minus"></i> Back to List of Current Files Page</a></li>'+
                        '</ul>'+
    				'</div>'+
    			'</div>');
} );
$(document).ready(function() {
        $('#data-table5').DataTable({
        "pageLength": 25,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bSort" : false,
        "bAutoWidth": false,
        "dom": '<"toolbar5">frtip'
        });
        $("div.toolbar5").html('<div class="panel-control">'+
                    '<div class="btn-group dropdown" style="float: right;">'+
                        '<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>'+
    					'<ul class="dropdown-menu dropdown-menu-right" style="">'+
    						'<li><a href="<?php echo CURRENT_PAGE; ?>?tab=archived_files"><i class="fa fa-minus"></i> Back to List of Archived Files Page</a></li>'+
                        '</ul>'+
    				'</div>'+
    			'</div>');
} );
</script>
<style type="text/css">
.toolbar {
    float: left;
}
.toolbar2 {
    float: right;
    padding-left: 5px;
}
.toolbar3 {
    float: right;
    padding-left: 5px;
}
.toolbar4 {
    float: right;
    padding-left: 5px;
}
.toolbar5 {
    float: right;
    padding-left: 5px;
}
</style>
<script type="text/javascript">
$('#demo-dp-range .input-daterange').datepicker({
    format: "mm/dd/yyyy",
    todayBtn: "linked",
    autoclose: true,
    todayHighlight: true
});
function add_exception_value(exception_file_id,temp_data_id,exception_field,rep_number)
{
    document.getElementById("exception_data_id").value = temp_data_id;
    document.getElementById("exception_field").value = exception_field;
    document.getElementById("exception_file_id").value = exception_file_id;
    if(exception_field == 'u5')
    {
        document.getElementById("field_label").innerHTML = 'Broker Termination Date';
        $("#exception_value_date").css('display','block');
        $("#exception_value").css('display','none');
    }
    else{
        document.getElementById("field_label").innerHTML = exception_field;
        $("#exception_value_date").css('display','none')
        $("#exception_value").css('display','block')
    }
    if(exception_field == 'representative_number')
    {
        document.getElementById("exception_value").value = rep_number;
        $("#assign_rep_to_broker").css('display','block');
        //alert(document.getElementById("exception_value").value);
    }
    else{
        $("#assign_rep_to_broker").css('display','none');
    }
    
}
function exception_submit()
{
   $('#msg_exception').html('<div class="alert alert-info"><i class="fa fa-spinner fa-spin"></i> Please wait...</div>');

   var url = "import.php"; // the script where you handle the form input.
   //alert($("#resolve_exception_form").serialize());
   $.ajax({
      type: "POST",
      url: url,
      data: $("#resolve_exception_form").serialize(), // serializes the form's elements.
      success: function(data){
          if(data=='1'){
               window.location.href = "import.php?tab=review_files&id="+<?php echo $id;?>;//get_client_notes();   
          }
          else{
               $('#msg_exception').html('<div class="alert alert-danger">'+data+'</div>');
          }
          
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
           $('#msg_exception').html('<div class="alert alert-danger">Something went wrong, Please try again.</div>')
      }
      
   });

   //e.preventDefault(); // avoid to execute the actual submit of the form.
   return false;
       
}
function check_u5_date(broker)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            if(data=='1'){
               $("#broker_terminated").css('display','block');
            }
            else
            {
               $("#broker_terminated").css('display','none'); 
            }
        }
    };
    xmlhttp.open("GET", "import.php?broker_termination="+broker, true);
    xmlhttp.send();
}
</script>
<script type="text/javascript">
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    if(isIE == true)
    {
        $('#fetch_file_div').css('display','block');
    }
</script>
<script type="text/javascript">
var waitingDialog = waitingDialog || (function ($) {
    'use strict';

	// Creating modal dialog's DOM
	var $dialog = $(
		'<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
		'<div class="modal-dialog modal-m">' +
		'<div class="modal-content">' +
			'<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
			'<div class="modal-body">' +
				'<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
			'</div>' +
		'</div></div></div>');

	return {
		/**
		 * Opens our dialog
		 * @param message Custom message
		 * @param options Custom options:
		 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
		 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
		 */
		show: function (message, options) {
			// Assigning defaults
			if (typeof options === 'undefined') {
				options = {};
			}
			if (typeof message === 'undefined') {
				message = 'Saving...';
			}
			var settings = $.extend({
				dialogSize: 'm',
				progressType: '',
				onHide: null // This callback runs after the dialog was hidden
			}, options);

			// Configuring dialog
			$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
			$dialog.find('.progress-bar').attr('class', 'progress-bar');
			if (settings.progressType) {
				$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
			}
			$dialog.find('h3').text(message);
			// Adding callbacks
			if (typeof settings.onHide === 'function') {
				$dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
					settings.onHide.call($dialog);
				});
			}
			// Opening dialog
			$dialog.modal();
		},
		/**
		 * Closes dialog
		 */
	
	};

})(jQuery);

</script>
<script>
//submit add notes form data
function formsubmitfiles()
{
    $('#msg_files').html('<div class="alert alert-info"><i class="fa fa-spinner fa-spin"></i> Please wait...</div>');

    var myForm = document.getElementById('form_import_files');
    form_data = new FormData(myForm);
    $.ajax({
        url: 'import.php', // point to server-side PHP script 
        
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(data){
    
           if(data=='1'){
                window.location.href = "import.php";
                
                /*$('#msgnotes').html('<div class="alert alert-success">Thank you.</div>');
                $('#add_notes')[0].reset();
                setTimeout(function(){
    				$('#myModalShare').modal('hide');				
    			}, 2000);*/
                
           }
           else{
                $('#msg_files').html('<div class="alert alert-danger">'+data+'</div>');
           }
           
       },
       error: function(XMLHttpRequest, textStatus, errorThrown) {
            $('#msg_files').html('<div class="alert alert-danger">Something went wrong, Please try again.</div>')
       }
       
    });

    //e.preventDefault(); // avoid to execute the actual submit of the form.
    return false;
        
}
</script>
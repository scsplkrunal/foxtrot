<!--<div class="container">
<h1>Import</h1>
<?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
<div class="col-lg-8 well">
<div class="tab-content col-md-12">
</div>
</div>

<div class="col-lg-4 well">-->

<!--<div class="tab-content col-md-12">
</div>
</div>
</div>-->
<div class="sectionwrapper">
  <div class="container">
  <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 pull-left">
		  <div class="graphbox">
		        <div class="graphboxtitle">Import </div>
				<div class="graphboxcontent">
                <div class="tab-content col-md-12">
                <div class="tab-pane active" id="tab_a">
                    <ul class="nav nav-tabs ">
                      <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="current_files"){ echo "active"; }else if(!isset($_GET['tab'])){echo "active";}else{ echo '';} ?>" ><a href="#current_files" data-toggle="tab">Current Files</a></li>
                      <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="archived_files"){ echo "active"; } ?>" ><a href="#archived_files" data-toggle="tab">Archived Files</a></li>
                      <br />
                      <!-- Tab 1 is started -->
                        <div class="tab-content">
                        <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="current_files"){ echo "active"; }else if(!isset($_GET['tab'])){echo "active";}else{ echo '';} ?>" id="current_files">
                            <div class="panel-overlay-wrap">
                                <div class="panel-body" style="border: 1px solid #DFDFDF; margin-top: 17px;">
                                    <div class="row">
                                        <div class="row">
                                        <div class="col-md-5"></div>
                                       
                                            <button type="submit" class="btn btn-sm btn-warning col-md-1" name="fetch" value="fetch" style="display: inline;"> Fetch</button>
                                       
                                            <button type="submit" class="btn btn-sm btn-default col-md-2"  name="progress_all" value="progress_all" style="display: inline;"> Progress All</button>
                                        
                                        <div class="col-md-4"style="float: right; padding-right: 20px !important;">
                                            <label style="display: inline;">Sort By </label>
                                            <select name="file_type" id="file_type" class="form-control" style="width: 75%; display: inline; float: right;">
                                                <option value="0">File Type</option>
                                                <option value="1" >text</option>
                                                <option value="2" >pdf</option>
                                                <option value="3" >xls</option>
                                            </select> 
                                        </div>
                                        </div>
                                    
                                        <br />
                                        <div class="table-responsive" id="table-scroll" style="margin: 0px 5px 0px 5px;">
                                            <table class="table table-bordered table-stripped table-hover">
                                                <thead>
                                                    <th>Imported</th>
                                                    <th>Last Proccessed</th>
                                                    <th>File Name</th>
                                                    <th>File Type</th>
                                                    <th>Batch#</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>04/01/2018</td>
                                                        <td>04/02/2018</td>
                                                        <td>file_name1.txt</td>
                                                        <td>DST Commissions</td>
                                                        <td>10101</td>
                                                        <td>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                                              40% Complete (success)
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <select name="account_use" id="account_use" class="form-control">
                                                            <option value="0">Select</option>
                                                            <option value="1" >Delete File</option>
                                                            <option value="2" >Reprocess</option>
                                                            <option value="3" >Review Process</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                        <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>03/01/2018</td>
                                                        <td>05/02/2018</td>
                                                        <td>file_name2.txt</td>
                                                        <td>FCC Trailers</td>
                                                        <td>10101</td>
                                                        <td>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                                              60% Complete (success)
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <select name="account_use" id="account_use" class="form-control">
                                                            <option value="0">Select</option>
                                                            <option value="1" >Delete File</option>
                                                            <option value="2" >Reprocess</option>
                                                            <option value="3" >Review Process</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                        <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>01/01/2018</td>
                                                        <td>10/02/2018</td>
                                                        <td>file_name3.txt</td>
                                                        <td>Unknown</td>
                                                        <td>10101</td>
                                                        <td>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                                              90% Complete (success)
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <select name="account_use" id="account_use" class="form-control">
                                                            <option value="0">Select</option>
                                                            <option value="1" >Delete File</option>
                                                            <option value="2" >Reprocess</option>
                                                            <option value="3" >Review Process</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                        <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>01/01/2018</td>
                                                        <td>10/02/2018</td>
                                                        <td>file_name3.txt</td>
                                                        <td>Unknown</td>
                                                        <td>10101</td>
                                                        <td>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                                              90% Complete (success)
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <select name="account_use" id="account_use" class="form-control">
                                                            <option value="0">Select</option>
                                                            <option value="1" >Delete File</option>
                                                            <option value="2" >Reprocess</option>
                                                            <option value="3" >Review Process</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                        <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>01/01/2018</td>
                                                        <td>10/02/2018</td>
                                                        <td>file_name3.txt</td>
                                                        <td>Unknown</td>
                                                        <td>10101</td>
                                                        <td>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                                              90% Complete (success)
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <select name="account_use" id="account_use" class="form-control">
                                                            <option value="0">Select</option>
                                                            <option value="1" >Delete File</option>
                                                            <option value="2" >Reprocess</option>
                                                            <option value="3" >Review Process</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                        <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>01/01/2018</td>
                                                        <td>10/02/2018</td>
                                                        <td>file_name3.txt</td>
                                                        <td>Unknown</td>
                                                        <td>10101</td>
                                                        <td>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                                              90% Complete (success)
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <select name="account_use" id="account_use" class="form-control">
                                                            <option value="0">Select</option>
                                                            <option value="1" >Delete File</option>
                                                            <option value="2" >Reprocess</option>
                                                            <option value="3" >Review Process</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                        <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>01/01/2018</td>
                                                        <td>10/02/2018</td>
                                                        <td>file_name3.txt</td>
                                                        <td>Unknown</td>
                                                        <td>10101</td>
                                                        <td>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                                              90% Complete (success)
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <select name="account_use" id="account_use" class="form-control">
                                                            <option value="0">Select</option>
                                                            <option value="1" >Delete File</option>
                                                            <option value="2" >Reprocess</option>
                                                            <option value="3" >Review Process</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                        <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>01/01/2018</td>
                                                        <td>10/02/2018</td>
                                                        <td>file_name3.txt</td>
                                                        <td>Unknown</td>
                                                        <td>10101</td>
                                                        <td>
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                                              90% Complete (success)
                                                            </div>
                                                        </div>
                                                        </td>
                                                        <td>
                                                        <select name="account_use" id="account_use" class="form-control">
                                                            <option value="0">Select</option>
                                                            <option value="1" >Delete File</option>
                                                            <option value="2" >Reprocess</option>
                                                            <option value="3" >Review Process</option>
                                                        </select>
                                                        </td>
                                                        <td>
                                                        <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                        </td>
                                                    </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                 </div>
                                    <div class="panel-overlay">
                                        <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                    </div>
                                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                                    
                                </div>
                            </div>
                            <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="archived_files"){ echo "active"; } ?>" id="archived_files">
                                <div class="panel-overlay-wrap">
                                    <div class="panel-body" style="border: 1px solid #DFDFDF; margin-top: 17px;">
                                        <div class="row">
                                        <div class="col-md-4"style="float: right;">
                                            <label style="display: inline;">Sort By </label>
                                            <select name="file_type" id="file_type" class="form-control" style="width: 75%; display: inline; float: right;">
                                                <option value="0">File Type</option>
                                                <option value="1" >text</option>
                                                <option value="2" >pdf</option>
                                                <option value="3" >xls</option>
                                            </select>
                                        </div>
                                        </div><br />
                                        <div class="row">
                                            <div class="table-responsive" id="table-scroll" style="margin: 0px 5px 0px 5px;">
                                                <table class="table table-bordered table-stripped table-hover">
                                                    <thead>
                                                        <th>Imported</th>
                                                        <th>Last Proccessed</th>
                                                        <th>File Name</th>
                                                        <th>File Type</th>
                                                        <th>Batch#</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>04/01/2018</td>
                                                            <td>04/02/2018</td>
                                                            <td>file_name1.txt</td>
                                                            <td>DST Commissions</td>
                                                            <td>10101</td>
                                                            <td>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                                                  40% Complete (success)
                                                                </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <select name="account_use" id="account_use" class="form-control">
                                                                <option value="0">Select</option>
                                                                <option value="1" >View</option>
                                                                <option value="2" >Reprocess</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                            <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>03/01/2018</td>
                                                            <td>05/02/2018</td>
                                                            <td>file_name2.txt</td>
                                                            <td>FCC Trailers</td>
                                                            <td>10101</td>
                                                            <td>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                                                  60% Complete (success)
                                                                </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <select name="account_use" id="account_use" class="form-control">
                                                                <option value="0">Select</option>
                                                                <option value="1" >Delete File</option>
                                                                <option value="2" >Reprocess</option>
                                                                <option value="3" >Review Process</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                            <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/01/2018</td>
                                                            <td>10/02/2018</td>
                                                            <td>file_name3.txt</td>
                                                            <td>Unknown</td>
                                                            <td>10101</td>
                                                            <td>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                                                  90% Complete (success)
                                                                </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <select name="account_use" id="account_use" class="form-control">
                                                                <option value="0">Select</option>
                                                                <option value="1" >Delete File</option>
                                                                <option value="2" >Reprocess</option>
                                                                <option value="3" >Review Process</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                            <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/01/2018</td>
                                                            <td>10/02/2018</td>
                                                            <td>file_name3.txt</td>
                                                            <td>Unknown</td>
                                                            <td>10101</td>
                                                            <td>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                                                  90% Complete (success)
                                                                </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <select name="account_use" id="account_use" class="form-control">
                                                                <option value="0">Select</option>
                                                                <option value="1" >Delete File</option>
                                                                <option value="2" >Reprocess</option>
                                                                <option value="3" >Review Process</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                            <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/01/2018</td>
                                                            <td>10/02/2018</td>
                                                            <td>file_name3.txt</td>
                                                            <td>Unknown</td>
                                                            <td>10101</td>
                                                            <td>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                                                  90% Complete (success)
                                                                </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <select name="account_use" id="account_use" class="form-control">
                                                                <option value="0">Select</option>
                                                                <option value="1" >Delete File</option>
                                                                <option value="2" >Reprocess</option>
                                                                <option value="3" >Review Process</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                            <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/01/2018</td>
                                                            <td>10/02/2018</td>
                                                            <td>file_name3.txt</td>
                                                            <td>Unknown</td>
                                                            <td>10101</td>
                                                            <td>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                                                  90% Complete (success)
                                                                </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <select name="account_use" id="account_use" class="form-control">
                                                                <option value="0">Select</option>
                                                                <option value="1" >Delete File</option>
                                                                <option value="2" >Reprocess</option>
                                                                <option value="3" >Review Process</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                            <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/01/2018</td>
                                                            <td>10/02/2018</td>
                                                            <td>file_name3.txt</td>
                                                            <td>Unknown</td>
                                                            <td>10101</td>
                                                            <td>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                                                  90% Complete (success)
                                                                </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <select name="account_use" id="account_use" class="form-control">
                                                                <option value="0">Select</option>
                                                                <option value="1" >Delete File</option>
                                                                <option value="2" >Reprocess</option>
                                                                <option value="3" >Review Process</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                            <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/01/2018</td>
                                                            <td>10/02/2018</td>
                                                            <td>file_name3.txt</td>
                                                            <td>Unknown</td>
                                                            <td>10101</td>
                                                            <td>
                                                            <div class="progress">
                                                                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                                                  90% Complete (success)
                                                                </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <select name="account_use" id="account_use" class="form-control">
                                                                <option value="0">Select</option>
                                                                <option value="1" >Delete File</option>
                                                                <option value="2" >Reprocess</option>
                                                                <option value="3" >Review Process</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                            <button type="submit" class="btn btn-sm btn-warning" name="go" value="go" style="display: inline;"> Go</button>
                                                            </td>
                                                        </tr>
                                                  </tbody>
                                                </table>
                                            </div>
                                        </div>
                                     </div>
                                     <div class="panel-overlay">
                                         <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                     </div>
                                     <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-right">
			<div class="graphbox">
				<div class="graphboxtitle">Daily Importing <i class="fa fa-times-circle"></i><i class="fa fa-chevron-circle-down"></i></div>
				<div class="graphboxcontent">
                    <table width='100%'> 
                        <tr>
                            <td>Completed file</td>
                            <td>16</td>
                            <td rowspan="5" width='60%'><div id="container1" style="min-width: 200px; height: 200px; max-width: 200px; margin:  auto"></div></td>
                        </tr>
                        <tr>
                            <td>Partially Completed</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>New file</td>
                            <td>4</td>
                        </tr>
                    </table>
					<div class="graphimg">
                    <!--img src="images/graphimg.jpg" alt="Graph Image" / --></div>
				</div>
			</div>
   
			<div class="graphbox">
				<div class="graphboxtitle">Commissions <i class="fa fa-times-circle"></i><i class="fa fa-chevron-circle-down"></i></div>
				<div class="graphboxcontent">
                    <table width='100%'> 
                        <tr>
                            <td>Direct</td>
                            <td>$45.000</td>
                            <td rowspan="5" style="width: 60%;"><div id="container_commission" style="min-width: 200px; height: 200px; max-width: 3000px; margin:  auto"></div></td>
                        </tr>
                        <tr>
                            <td>Pending</td>
                            <td>$12.8000</td>
                        </tr>
                        <tr>
                            <td>Advisory</td>
                            <td>$26.8000</td>
                        </tr>
                        <tr>
                            <td>Clearing</td>
                            <td>$8.5000</td>
                        </tr>
                        <tr>
                            <td>Others</td>
                            <td>$2.3000</td>
                        </tr>
                        </table>
        				</div>
                        <div class="graphboxtitle" style="border-top: 2px solid #dfdfdf; font-weight: 10 !important; font-size: 15px !important;">
                        <table>
                            <tr>
                                <td style="width: 28.5% !important;">Total file</td>
                                <td>$192.000</td>
                                <td rowspan="5" style="width: 60%;"></td>
                            </tr>
                        </table>
                        </div>
            </div>
            <div class="graphbox">
    				<div class="graphboxtitle">Compliance <i class="fa fa-times-circle"></i><i class="fa fa-chevron-circle-down"></i></div>
    				<div class="graphboxcontent">
    					<div class="graphimg">
                         <table width='100%'> 
                            <tr>
                                <td align='center'>Complated file</td>
                            </tr>
                            <tr>
                                <td align='center'>4</td>
                            </tr>
                            <tr>
                                <td align='center'>Pendding file</td>
                            </tr>
                            <tr>
                                <td align='center'>4</td>
                            </tr>
                            <tr>
                                <td> <div id="container3" ></div> </td>
                            </tr>
                        </table>
    				</div>
    			</div>
            </div>
            <div class="graphbox">
    				<div class="graphboxtitle">Payroll <i class="fa fa-times-circle"></i><i class="fa fa-chevron-circle-down"></i></div>
    				<div class="graphboxcontent">
                        <table width='100%'> 
                            <tr>
                                <td>Last Cutoff</td>
                                <td>15-11-2017</td>
                                <td rowspan="9" style="width: 60%;"><div id="container_payroll" style="min-width: 200px; height: 200px; max-width: 3000px; margin:  auto"></div></td>
                            </tr>
                            <tr>
                                <td>Gross Commission</td>
                                <td>$325k</td>
                            </tr>
                            <tr>
                                <td>Average Payout Rate</td>
                                <td>$346.512.1</td>
                            </tr>
                            <tr>
                                <td>Charges</td>
                                <td>$1.5k</td>
                            </tr>
                            <tr>
                                <td>Net Commission</td>
                                <td>$228k</td>
                            </tr>
                            <tr>
                                <td>Adjustment</td>
                                <td>$4.5k</td>
                            </tr>
                            <tr>
                                <td>Total Check Amount</td>
                                <td>$265k</td>
                            </tr>
                            <tr>
                                <td>Balance Carried Forword</td>
                                <td>$45k</td>
                            </tr>
                            <tr>
                                <td>Retention</td>
                                <td>$415k</td>
                            </tr>
                        </table>
    					<!--p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p-->
    					<div class="graphimg"><!--img src="images/graphimg.jpg" alt="Graph Image" /--></div>
    				</div>
    			</div>
			</div>
		</div>
    </div>
  </div>
<style>
#table-scroll {
  height:500px;
  overflow:auto;  
  margin-top:20px;
}
</style>
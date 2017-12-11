<script src="http://code.jquery.com/color/jquery.color-2.1.2.min.js" integrity="sha256-H28SdxWrZ387Ldn0qogCzFiUDDxfPiNIyJX7BECQkDE=" crossorigin="anonymous"></script>
<div class="container">
    <h1>Multi-Company Maintenance</h1>
    <div class="col-lg-12 well">
        <div class="tab-content col-md-12">
            <div class="tab-pane active" id="tab_a">
    <!-- Add table data and some process -->
    <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
    <?php
    if($action=='add_new'||($action=='edit' && $id>0)){
        ?>
        <form method="post">
            <ul class="nav nav-tabs ">
                <li class="active"><a href="#tab_aa" data-toggle="tab">General</a></li>
                <li><a href="#tab_bb" data-toggle="tab">Commissions</a></li>
                <li><a href="#tab_cc" data-toggle="tab">Registrations</a></li>

    			<div class="btn-group dropdown" style="float: right;">
    				<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
    				<ul class="dropdown-menu dropdown-menu-right" style="">
    					<li><a href="<?php echo CURRENT_PAGE; ?>"><i class="fa fa-eye"></i> View List</a></li>
    				</ul>
    			</div>
    		  
            </ul>
            <div class="tab-content">           
                <div class="tab-pane active" id="tab_aa">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Company/Practice Name <span class="text-red">*</span></label>
                                <input type="text" name="company_name" id="company_name" value="<?php //echo $company_name; ?>"  class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Business Address 1 <span class="text-red">*</span></label>
                                <input type="text" name="address1" id="address1" value="<?php //echo $address1; ?>" class="form-control" />
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Business Address 2 </label>
                                <input type="text" name="address2" id="address2" value="<?php //echo $address2; ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Business City <span class="text-red">*</span></label>
                                <input type="text" name="business_city" id="business_city" value="<?php //echo $business_city; ?>" class="form-control" />
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State <span class="text-red">*</span></label>
                                <select name="state_general" id="state_general" class="form-control">
                                    <option value="">Select State</option>
                                    <?php foreach($get_state as $statekey=>$stateval){?>
                                    <option value="<?php echo $stateval['id']; ?>"><?php echo $stateval['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Business Zipcode <span class="text-red">*</span></label>
                                <input type="text" name="zip" id="zip" value="<?php //echo $zip; ?>" class="form-control" />
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mailing Address1 </label>
                                <input type="text" name="mail_address1" id="mail_address1" value="<?php //echo $mail_address1; ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mailing Address2 </label>
                                <input type="text" name="mail_address2" id="mail_address2" value="<?php //echo $mail_address2; ?>" class="form-control" />
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mailing City </label>
                                <input type="text" name="m_city" id="m_city" value="<?php //echo $m_city; ?>" class="form-control" />
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Mailing State </label>
                                <select name="state_general" id="state_general" class="form-control">
                                    <option value="">Select State</option>
                                    <?php foreach($get_state as $statekey=>$stateval){?>
                                    <option value="<?php echo $stateval['id']; ?>"><?php echo $stateval['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mailing Zipcode</label>
                                <input type="text" name="m_zip" id="m_zip" value="<?php //echo $m_zip; ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telephone </label>
                                <input type="text" name="telephone" id="telephone" value="<?php //echo $telephone; ?>" class="form-control" />
                            </div>
                        </div>
                   </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Facsimile </label>
                                <input type="text" name="facsimile" id="facsimile" value="<?php //echo $facsimile; ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date Established <span class="text-red">*</span> </label><br />
                                <div id="demo-dp-range">
	                                <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" name="e_date" id="e_date" value="<?php //echo $prospect_date; ?>" class="form-control" />
	                                </div>
	                            </div>
                            </div>
                        </div>
                   </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Inactive Date </label><br />
                                <div id="demo-dp-range">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" name="i_date" id="i_date" value="<?php //echo $prospect_date; ?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
                <div class="tab-pane" id="tab_bb">
                <br />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payout Level </label><br />
                                <label class="radio-inline">
                                  <input type="radio" class="radio" name="payout_level" id="payout_level" value="1" />Company/Practice Level
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" class="radio" name="payout_level" id="payout_level" value="2" />Broker Level
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Clearing Charge Calculation </label><br />
                                <label class="radio-inline">
                                  <input type="radio" class="radio" name="clearing_charge_calculation" id="clearing_charge_calculation" value="1" />Gross Payout
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" class="radio" name="clearing_charge_calculation" id="clearing_charge_calculation" value="2" />Net Payout
                                </label>
                            </div>
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Sliding Scale Commission Basis </label><br />
                                <label class="radio-inline">
                                  <input type="radio" class="radio" name="sliding_scale_commision" id="sliding_scale_commision" value="1" />Payroll-to-Date Concession
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" class="radio" name="sliding_scale_commision" id="sliding_scale_commision" value="2" />Year-to-Date Concession
                                </label>
                                <label class="radio-inline">
                                  <input type="radio" class="radio" name="sliding_scale_commision" id="sliding_scale_commision" value="3" />Year-to-Date Earnings
                                </label>
                            </div>
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Category </label>
                                <select name="state_general" id="state_general" class="form-control">
                                    <option value="">Select Product category</option>
                                    <?php foreach($get_product as $key=>$val){?>
                                    <option value="<?php echo $val['id']; ?>"><?php echo $val['type']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Rate (in percentage) </label>
                                <input type="text" name="p_rate" id="p_rate" value="<?php //echo $p_rate; ?>" class="form-control" />
                            </div>
                        </div>
                    </div><h3>Level 1:</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Threshold(in $ Price) </label>
                                <input type="text" name="threshold1" id="threshold1" value="<?php //echo $threshold1; ?>" class="form-control" />
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Rate (in percentage) </label>
                                <input type="text" name="l1_rate" id="l1_rate" value="<?php //echo $l1_rate; ?>" class="form-control" />
                            </div>
                        </div>
                    </div><h3>Level 2:</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Threshold(in $ Price) </label>
                                <input type="text" name="threshold2" id="threshold2" value="<?php //echo $threshold2; ?>" class="form-control" />
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Rate (in percentage) </label>
                                <input type="text" name="l2_rate" id="l2_rate" value="<?php //echo $l2_rate; ?>" class="form-control" />
                            </div>
                        </div>
                    </div><h3>Level 3:</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Threshold(in $ Price) </label>
                                <input type="text" name="threshold3" id="threshold3" value="<?php //echo $threshold3; ?>" class="form-control" />
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Rate (in percentage) </label>
                                <input type="text" name="l3_rate" id="l3_rate" value="<?php //echo $l3_rate; ?>" class="form-control" />
                            </div>
                        </div>
                    </div><h3>Level 4:</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Threshold(in $ Price) </label>
                                <input type="text" name="threshold4" id="threshold4" value="<?php //echo $threshold4; ?>" class="form-control" />
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Rate (in percentage) </label>
                                <input type="text" name="l4_rate" id="l4_rate" value="<?php //echo $l4_rate; ?>" class="form-control" />
                            </div>
                        </div>
                    </div><h3>Level 5:</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Threshold(in $ Price) </label>
                                <input type="text" name="threshold5" id="threshold5" value="<?php //echo $threshold5; ?>" class="form-control" />
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Rate (in percentage) </label>
                                <input type="text" name="l5_rate" id="l5_rate" value="<?php //echo $l5_rate; ?>" class="form-control" />
                            </div>
                        </div>
                    </div><h3>Level 6:</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Threshold(in $ Price) </label>
                                <input type="text" name="threshold6" id="threshold6" value="<?php //echo $threshold6; ?>" class="form-control" />
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label>Rate (in percentage) </label>
                                <input type="text" name="l6_rate" id="l6_rate" value="<?php //echo $l6_rate; ?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_cc">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-12"><h3>State</h3> </label>
                           
                                <?php foreach($get_state as $statekey=>$stateval){?>
                                <label class="check-inline col-md-2">
                                    <input type="checkbox" class="checkbox" name="state[<?php echo $stateval['id']; ?>]" id="<?php echo $stateval['name']; ?>" value="<?php echo $stateval['id']; ?>" /><?php echo $stateval['name']; ?>
                                </label>
                                <?php } ?>
                                <label class="check-inline col-md-12">
                                    <br /><input type="checkbox" class="checkbox" name="foreign" id="foreign" value="Foreign" />Foreign
                                </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label></label><br />
                                <a href="#client_notes" data-toggle="modal"><input type="button" name="notes" value="Notes" /></a>
                                <a href="#client_attachment" data-toggle="modal"><input type="button" name="attach" value="Attach" /></a>
                            </div>
                         </div>
                    </div>
                    <div class="panel-footer">
                        <div class="selectwrap">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
        					<input type="submit" name="submit" onclick="waitingDialog.show();" value="Save"/>	
                            <a href="<?php echo CURRENT_PAGE;?>"><input type="button" name="cancel" value="Cancel" /></a>
                        </div>
                   </div>
                    
                </div>
            </div>                
        </form> 
        </div>
        </div>
        <?php
    }
    else{?>
    <div class="panel">
		<div class="panel-heading">
            <div class="panel-control">
                <div class="btn-group dropdown" style="float: right;">
					<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
					<ul class="dropdown-menu dropdown-menu-right" style="">
						<li><a href="<?php echo CURRENT_PAGE; ?>?action=add_new"><i class="fa fa-plus"></i> Add a New Practice</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="panel-body">
        <div class="panel-control">
           
                         <form method="post">
                            <div class="row">
                                <div class="col-md-2">
                                <select name="active_search" class="form-control" id="active_search" style="size: auto;">
                                    <option value="" style="size: auto;"> Select </option>
                                    <option <?php if(isset($active_search) && $active_search == 1){echo "selected='selected'";}?> value="1"> Compnay  Name</option>
                                    <option <?php if(isset($active_search) && $active_search == 2){echo "selected='selected'";}?> value="2"> Maneger  Name</option>
                                    <option <?php if(isset($active_search) && $active_search == 3){echo "selected='selected'";}?> value="3"> Company  Type</option>
                                    <option <?php if(isset($active_search) && $active_search == 4){echo "selected='selected'";}?> value="4"> Establish  Date</option>
                                </select>
                                </div>
                                <input type="text" name="search_text" id="search_text" value="<?php //echo $search_text;?>"/>
                            <button type="submit" name="submit" id="submit" value="Search"><i class="fa fa-search"></i> Search</button>
                         </div>
                        </form>
                        </div><br /><br />
        <div class="table-responsive" id="register_data">
			<table id="data-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
	            <thead>
	                <tr>
                        <th class="text-center">#NO</th>
                        <th>Company/Practice Name</th>
                        <th>Manager Name</th>
                        <th>Practice Type</th>
                        <th>Establish Date</th>
                        <th>Termination Date</th>
                        <th class="text-center">ACTION</th>
                    </tr>
	            </thead>
	            <tbody>
	                <?php
                        /*$count = 0;
                        foreach($return as $key=>$val){
                            ?>
                            <tr>
                                <td class="text-center"><?php echo ++$count; ?></td>
                                <td><?php echo $val['type']; ?></td>
                                <td class="text-center">
                                    <?php
                                        if($val['status']==1){
                                            ?>
                                            <a href="<?php echo CURRENT_PAGE; ?>?action=status&id=<?php echo $val['id']; ?>&status=0" class="btn btn-sm btn-success"><i class="fa fa-check-square-o"></i> Enabled</a>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <a href="<?php echo CURRENT_PAGE; ?>?action=status&id=<?php echo $val['id']; ?>&status=1" class="btn btn-sm btn-warning"><i class="fa fa-warning"></i> Disabled</a>
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo CURRENT_PAGE; ?>?action=edit&id=<?php echo $val['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                            <?php
                        }*/
                    ?>
                </tbody>
            </table>
            </div>
		</div>
	</div>
    <?php } ?>
    </div>
    <!-- Lightbox strart -->							
			<!-- Modal for add client notes -->
			<div id="client_notes" class="modal fade inputpopupwrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header" style="margin-bottom: 0px !important;">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">Client's Notes</h4>
				</div>
				<div class="modal-body">
                <form method="post">
                <div class="inputpopup">
                    <a class="btn btn-sm btn-success" style="float: right !important; margin-right: 5px !important;" onclick="addMoreNotes();"><i class="fa fa-plus"></i> Add New</a></li>
    			</div>
                <div class="inputpopup">
                    <div class="table-responsive" id="table-scroll" style="margin: 0px 5px 0px 5px;">
                        <table class="table table-bordered table-stripped table-hover">
                            <thead>
                                <th>#NO</th>
                                <th>Date</th>
                                <th>User</th>
                                <th>Notes</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <tr id="add_row_notes">
                                    <td>1</td>
                                    <td><?php echo date('d/m/Y');?></td>
                                    <td><?php echo $_SESSION['user_name'];?></td>
                                    <td><input type="text" name="client_note" class="form-control" id="client_note"/></td>
                                    <td class="text-center">
                                       <a href="<?php echo CURRENT_PAGE; ?>?action=add" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Save</a>
                                       <a href="<?php echo CURRENT_PAGE; ?>?action=edit&id=" class="btn btn-sm btn-primary" ><i class="fa fa-edit"></i> Edit</a>
                                       <a href="<?php echo CURRENT_PAGE; ?>?action=delete&id=" class="btn btn-sm btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                          </tbody>
                        </table>
                    </div>
				</div>
                </form>
                </div><!-- End of Modal body -->
				</div><!-- End of Modal content -->
				</div><!-- End of Modal dialog -->
		</div><!-- End of Modal -->
        <!-- Lightbox strart -->
        <!-- Lightbox strart -->							
			<!-- Modal for attach -->
			<div id="client_attachment" class="modal fade inputpopupwrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header" style="margin-bottom: 0px !important;">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">Attachments</h4>
				</div>
				<div class="modal-body">
                <form method="post">
                <div class="inputpopup">
                    <a class="btn btn-sm btn-success" style="float: right !important; margin-right: 5px !important;" onclick="addMoreAttach();"><i class="fa fa-plus"></i> Add New</a></li>
    			</div>
                <div class="inputpopup">
                    <div class="table-responsive" id="table-scroll" style="margin: 0px 5px 0px 5px;">
                        <table class="table table-bordered table-stripped table-hover">
                            <thead>
                                <th>#NO</th>
                                <th>Date</th>
                                <th>User</th>
                                <th>Files Name</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <tr id="add_row_attach">
                                    <td>1</td>
                                    <td><?php echo date('d/m/Y');?></td>
                                    <td><?php echo $_SESSION['user_name'];?></td>
                                    <td><input type="file" name="attach" class="form-control" id="attach"/></td>
                                    <td class="text-center">
                                       <a href="<?php echo CURRENT_PAGE; ?>?action=add&id=" class="btn btn-sm btn-warning" onclick="waitingDialog.show();"><i class="fa fa-save"></i> Ok</a>
                                       <a href="<?php echo CURRENT_PAGE; ?>?action=download&id=" class="btn btn-sm btn-success"><i class="fa fa-download"></i> Download</a>
                                       <a href="<?php echo CURRENT_PAGE; ?>?action=delete&id=" class="btn btn-sm btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                          </tbody>
                        </table>
                    </div>
				</div>
                </form>
                </div><!-- End of Modal body -->
				</div><!-- End of Modal content -->
				</div><!-- End of Modal dialog -->
		  </div><!-- End of Modal -->
</div>
<style>
.btn-primary {
    color: #fff;
    background-color: #337ab7 !important;
    border-color: #2e6da4 !important;}
</style>
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
function addMoreNotes(){
    var html = '<tr class="add_row_notes">'+
                    '<td>2</td>'+
                    '<td><?php echo date('d/m/Y');?></td>'+
                    '<td><?php echo $_SESSION['user_name'];?></td>'+
                    '<td><input type="text" name="client_note" class="form-control" id="client_note"/></td>'+
                    '<td class="text-center">'+
                    '<a href="<?php echo CURRENT_PAGE; ?>?action=add" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Save</a>&nbsp;'+
                    '<a href="<?php echo CURRENT_PAGE; ?>?action=edit&id=" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>&nbsp;'+
                    '<a href="<?php echo CURRENT_PAGE; ?>?action=delete&id=" class="btn btn-sm btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>'+
                    '</td>'+
                '</tr>';
                
            
    $(html).insertBefore('#add_row_notes');
}
$(document).on('click','.remove-row',function(){
    $(this).closest('tr').remove();
});
</script>
<script>
function addMoreAttach(){
    var html = '<tr class="add_row_attach">'+
                    '<td>2</td>'+
                    '<td><?php echo date('d/m/Y');?></td>'+
                    '<td><?php echo $_SESSION['user_name'];?></td>'+
                    '<td><input type="file" name="attach" class="form-control" id="attach"/></td>'+
                    '<td class="text-center">'+
                    '<a href="<?php echo CURRENT_PAGE; ?>?action=add&id=" class="btn btn-sm btn-warning"><i class="fa fa-save"></i> Ok</a>&nbsp;'+
                    '<a href="<?php echo CURRENT_PAGE; ?>?action=download&id=" class="btn btn-sm btn-success"><i class="fa fa-download"></i> Download</a>&nbsp;'+
                    '<a href="<?php echo CURRENT_PAGE; ?>?action=delete&id=" class="btn btn-sm btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>'+
                    '</td>'+
                '</tr>';
                
            
    $(html).insertBefore('#add_row_attach');
}
$(document).on('click','.remove-row',function(){
    $(this).closest('tr').remove();
});
</script>
<script>
$('#demo-dp-range .input-daterange').datepicker({
        format: "mm/dd/yyyy",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });
</script>
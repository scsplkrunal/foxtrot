<script>
function addMoreDocs(){
    var html = '<tr class="tr">'+
                    '<td>'+
                        '<input type="checkbox" name="docs_receive" class="checkbox" id="docs_receive"/>'+
                    '</td>'+
                    '<td>'+
                        '<input class="form-control" value="" name="docs_description" id="docs_description" type="text" />'+
                    '</td>'+
                    '<td>'+
                        '<div id="demo-dp-range">'+
                            '<div class="input-daterange input-group" id="datepicker">'+
                                '<input type="text" name="docs_date" id="docs_date" value="" class="form-control" />'+
                            '</div>'+
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<input type="checkbox" name="docs_required" class="checkbox" id="docs_required"/>'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" tabindex="-1" class="btn remove-row btn-icon btn-circle"><i class="fa fa-minus"></i></button>'+
                    '</td>'+
                '</tr>';
                
            
    $(html).insertAfter('#add_row_docs');
}
$(document).on('click','.remove-row',function(){
    $(this).closest('.tr').remove();
});
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
<div class="container">
<h1>Broker Maintenance</h1>
    <div class="col-lg-12 well">
        <?php if($action!='view'){?>
        <ul class="nav nav-pills nav-stacked col-md-2">
          <!--<li class="active"><a href="#tab_default" data-toggle="pill">Home</a></li>-->
          <li class="<?php if($action=="general"){ echo "active"; } ?>"><a href="<?php echo CURRENT_PAGE; ?>#tab_a" data-toggle="pill">General</a></li>
          <li class=""><a href="<?php echo CURRENT_PAGE; ?>#tab_b" data-toggle="pill">Payouts</a></li>
          <li class="<?php if($action=="charges"){ echo "active"; } ?>"><a href="<?php echo CURRENT_PAGE; ?>#tab_c" data-toggle="pill">Charges</a></li>
          <li><a href="<?php echo CURRENT_PAGE; ?>#tab_d" data-toggle="pill">Licences</a></li>
          <li><a href="<?php echo CURRENT_PAGE; ?>#tab_e" data-toggle="pill">Registers</a></li>
          <li><a href="<?php echo CURRENT_PAGE; ?>#tab_f" data-toggle="pill">Required Docs</a></li>
       </ul>
       <div class="tab-content col-md-10">
       <?php } ?>
                <div class="tab-pane <?php if(isset($action) && ($action=="general"||$action=="charges")){ echo ""; }else{echo "active";} ?>" id="tab_default">
                    <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
                    <?php
                    if($action=='add_new'||($action=='edit' && $id>0)){
                        ?>
                        <form method="post">
                            <div class="panel-overlay-wrap">
                                <div class="panel">
                					<div class="panel-heading">
                                        <div class="panel-control" style="float: right;">
                							<div class="btn-group dropdown">
                								<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
                								<ul class="dropdown-menu dropdown-menu-right" style="">
                									<li><a href="<?php echo CURRENT_PAGE; ?>"><i class="fa fa-eye"></i> View List</a></li>
                								</ul>
                							</div>
                						</div>
                                        <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i><?php echo $action=='add_new'?'Add':'Edit'; ?> New Broker/Advisor</h3>
                					</div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name </label>
                                                    <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name </label><span class="text-red">*</span>
                                                    <input type="text" name="lname" id="lname" value="<?php echo $lname; ?>" class="form-control" />
                                                </div>
                                            </div>
                                       </div>
                                       <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Middle Name </label>
                                                    <input type="text" name="mname" id="mname" value="<?php echo $mname; ?>" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Suffix </label>
                                                    <input type="text" name="suffix" id="suffix" value="<?php echo $suffix; ?>" class="form-control" />
                                                </div>
                                            </div>
                                       </div>
                                       <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fund/Clear </label>
                                                    <input type="text" name="fund" id="fund" value="<?php echo $fund; ?>" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Internal </label>
                                                    <input type="text" name="internal" id="internal" value="<?php echo $internal; ?>" class="form-control" />
                                                </div>
                                            </div>
                                       </div>
                                       <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>SSN </label>
                                                    <input type="text" name="ssn" id="ssn" value="<?php echo $ssn; ?>" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tax Id </label>
                                                    <input type="text" name="tax_id" id="tax_id" value="<?php echo $tax_id; ?>" class="form-control" />
                                                </div>
                                            </div>
                                       </div>
                                       <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>CRD </label>
                                                    <input type="text" name="crd" id="crd" value="<?php echo $crd; ?>" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Active status</label>
                                                    <select name="active_status_cdd" id="active_status_cdd" class="form-control">
                                                        <option value="">Select Status</option>
                                                        <option <?php if(isset($active_status_cdd) && $active_status_cdd == 1){echo "selected='selected'";}?> value="1">Active</option>
                                                        <option <?php if(isset($active_status_cdd) && $active_status_cdd == 2){echo "selected='selected'";}?> value="2">Terminated</option>
                                                        <option <?php if(isset($active_status_cdd) && $active_status_cdd == 3){echo "selected='selected'";}?> value="3">Retired</option>
                                                        <option <?php if(isset($active_status_cdd) && $active_status_cdd == 4){echo "selected='selected'";}?> value="4">Deceased</option>
                                                    </select>
                                                </div>
                                            </div>
                                       </div>
                                       <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pay Method </label>
                                                    <select name="pay_method" id="pay_method" class="form-control">
                                                        <option value="">Select Pay Type</option>
                                                        <option <?php if(isset($pay_method) && $pay_method == 1){echo "selected='selected'";}?> value="1">ACH</option>
                                                        <option <?php if(isset($pay_method) && $pay_method == 2){echo "selected='selected'";}?> value="2">Check</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Branch Manager </label><br />
                                                    <input type="checkbox" class="checkbox" name="branch_manager" value="1" id="branch_manager" class="regular-checkbox big-checkbox" <?php if($branch_manager == 1){echo "checked='true'";} ?> /><label for="checkbox-2-1"></label>
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                    <div class="panel-overlay">
                                        <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
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
                        <?php
                    }else{?>
                    <div class="panel">
            		<div class="panel-heading">
                        <div class="panel-control">
                            <div class="btn-group dropdown" style="float: right;">
                                <button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
            					<ul class="dropdown-menu dropdown-menu-right" style="">
            						<li><a href="<?php echo CURRENT_PAGE; ?>?action=add_new"><i class="fa fa-plus"></i> Add New</a></li>
            					</ul>
            				</div>
            			</div>
                        <h3 class="panel-title">List</h3>
            		</div>
            		<div class="panel-body">
                        <div class="panel-control" style="float: right;">
                         <form method="post">
                            <input type="text" name="search_text" id="search_text" value="<?php echo $search_text;?>"/>
                            <button type="submit" name="submit" id="submit" value="Search"><i class="fa fa-search"></i> Search</button>
                        </form>
                        </div><br /><br />
                        <div class="table-responsive">
            			<table id="data-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            	            <thead>
            	                <tr>
                                    <th class="text-center">#NO</th>
                                    <th>Broker Name</th>
                                    <th>Fund</th>
                                    <th>SSN</th>
                                    <th>Tax ID</th>
                                    <th>CRD</th>
                                    <th class="text-center">STATUS</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
            	            </thead>
            	            <tbody>
                            <?php
                            $count = 0;
                            foreach($return as $key=>$val){
                                ?>
            	                   <tr>
                                        <td class="text-center"><?php echo ++$count; ?></td>
                                        <td><?php echo $val['first_name']." ".$val['last_name']; ?></td>
                                        <td><?php echo $val['fund']; ?></td>
                                        <td><?php echo $val['internal']; ?></td>
                                        <td><?php echo $val['ssn']; ?></td>
                                        <td><?php echo $val['tax_id']; ?></td>
                                        <td><?php echo $val['crd']; ?></td>
                                        <td>
                                        <?php 
                                        if($val['active_status']==1)
                                        {
                                            echo "Active";
                                        }
                                        else if($val['active_status']==2)
                                        {
                                            echo "Terminated";
                                        }
                                        else if($val['active_status']==3)
                                        {
                                            echo "Retired";
                                        }
                                        else
                                        {
                                            echo "Deceased";
                                        }
                                        ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo CURRENT_PAGE; ?>?action=edit&id=<?php echo $val['id']; ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                            <a onclick="return conf('<?php echo CURRENT_PAGE; ?>?action=delete&id=<?php echo $val['id']; ?>');" class="btn btn-sm btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        </div>
            		</div>
            	</div>
                <?php } ?>
                </div>
                <?php if($action!='view'){?> 
                <div class="tab-pane <?php if($action=="general"){ echo "active"; } ?>" id="tab_a">
                <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
                    <form method="post">
                        <div class="panel-overlay-wrap">
                            <div class="panel">
            					<div class="panel-heading">
                                    <div class="panel-control" style="float: right;">
            							<div class="btn-group dropdown">
            								<a href="<?php echo CURRENT_PAGE;?> "><i class="fa fa-mail-forward"></i></a>
            							</div>
            						</div>
                                    <h3 class="panel-title" style="font-size: 25px;"><b><i class="fa fa-pencil-square-o"></i> General</b></h3>
            					</div>
                                <div class="panel-body">
                                 <div class="panel" style="border: 1px solid #cccccc !important; padding: 10px !important;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Home/Business</label>
                                                <select name="home_general" id="home_general" class="form-control">
                                                    <option value="">Select Option</option>
                                                    <option value="1">Home</option>
                                                    <option value="2">Business</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address 1 </label>
                                                <input type="text" name="address1_general" id="address1_general" value="<?php echo $telephone; ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address 2 </label>
                                                <input type="text" name="address2_general" id="address2_general" value="<?php echo $telephone; ?>" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City </label>
                                                <input type="text" name="city_general" id="city_general" value="<?php echo $telephone; ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State </label>
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
                                                    <label>Zip code </label>
                                                    <input type="number" name="zip_code_general" id="zip_code_general" value="<?php echo $telephone; ?>" class="form-control" />
                                                </div>
                                            </div>
                                    </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Telephone </label>
                                                <input type="text" name="telephone_general" id="telephone_general" value="<?php echo $telephone; ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cell </label>
                                                <input type="text" name="cell_general" id="cell_general" value="<?php echo $cell; ?>" class="form-control" />
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fax </label>
                                                <input type="text" name="fax_general" id="fax_general" value="<?php echo $fax; ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender </label>
                                                <select name="gender_general" id="gender_general" class="form-control">
                                                    <option value="0">Select Gender</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status  </label>
                                                <select name="status_general" id="status_general" class="form-control">
                                                    <option value="0">Select Status</option>
                                                    <option value="1">Single</option>
                                                    <option value="2">Married</option>
                                                    <option value="3">Divorced</option>
                                                    <option value="4">Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Spouse </label>
                                                <input type="text" name="spouse_general" id="spouse_general" value="<?php echo $spouse; ?>" class="form-control" />
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Children </label>
                                                <select name="children_general" id="children_general" class="form-control">
                                                    <option value="0">Select Children</option>
                                                    <?php for($i=1;$i<10;$i++){?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email 1 </label>
                                                <input type="text" name="email1_general" id="email1_general" value="<?php echo $email1; ?>" class="form-control" />
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email 2 </label>
                                                 <input type="text" name="email2_general" id="email2_general" value="<?php echo $email2; ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Web ID </label>
                                                <input type="text" name="web_id_general" id="web_id_general" value="<?php echo $web_id; ?>" class="form-control" />
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Web Password </label><br />
                                                <input type="password" name="web_password_general" id="web_password_general" value="<?php echo $web_password; ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>DOB </label>
                                                <div id="demo-dp-range">
					                                <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="dob_general" id="dob_general" value="<?php echo $dob; ?>" class="form-control" />
					                                </div>
					                            </div>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Prospect Date </label><br />
                                                <div id="demo-dp-range">
					                                <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="prospect_date_general" id="prospect_date_general" value="<?php echo $prospect_date; ?>" class="form-control" />
					                                </div>
					                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Reassign Broker </label>
                                                <select name="reassign_broker_general" id="reassign_broker_general" class="form-control">
                                                    <option value="0">Select Days</option>
                                                    <?php for($i=0;$i<1000;$i++){?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                 </select>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>U4 </label><br />
                                                <div id="demo-dp-range">
					                                <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="u4_general" id="u4_general" value="<?php echo $u4; ?>" class="form-control" />
					                                </div>
					                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>U5 </label><br />
                                                <div id="demo-dp-range">
    				                                <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="u5_general" id="u5_general" value="<?php echo $u5; ?>" class="form-control" />
    				                                </div>
    				                            </div>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                <label>DBA Name </label><br />
                                                <input type="text" name="dba_name_general" id="dba_name_general" value="<?php echo $dba_name; ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>EFT Information </label><br />
                                                <label class="radio-inline">
                                                  <input type="radio" class="radio" name="eft_info_general" id="eft_info_general" value="1" checked="checked" />Pre-Notes
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" class="radio" name="eft_info_general" id="eft_info_general" value="2" />Direct Deposit
                                                </label>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date </label><br />
                                                <div id="demo-dp-range">
					                                <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="start_date_general" id="start_date_general" value="<?php echo $start_date; ?>" class="form-control" />
					                                </div>
					                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Transaction Type </label><br />
                                                <label class="radio-inline">
                                                  <input type="radio" class="radio" name="transaction_type_general" value="1" id="transaction_type_general" checked="checked" /> Checking
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" class="radio" name="transaction_type_general" value="2" id="transaction_type_general" /> Savings
                                                </label>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Routing </label><br />
                                                <input type="text" name="routing_general" id="routing_general" value="<?php echo $routing; ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Account No </label>
                                                <input type="number" name="account_no_general" id="account_no_general" value="<?php echo $account_no; ?>" class="form-control" />
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Summarize Trailers </label><br />
                                                <input type="checkbox" class="checkbox" value="1" name="summarize_trailers_general" id="summarize_trailers_general" class="regular-checkbox big-checkbox" /><label for="checkbox-2-1"></label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Summarize Direct Imported Trades: </label><br />
                                                <input type="checkbox" class="checkbox" value="1" name="summarize_direct_imported_trades" id="summarize_direct_imported_trades" class="regular-checkbox big-checkbox" /><label for="checkbox-2-1"></label>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Hold Commissions </label><br />
                                                <div id="demo-dp-range">
					                                <div class="input-daterange input-group" id="datepicker">
                                                        <span class="input-group-addon">From</span>
					                                    <input type="text" class="form-control" name="from_date_general" value="<?php echo $from_date ?>" />
					                                    <span class="input-group-addon">To</span>
					                                    <input type="text" class="form-control" name="to_date_general" value="<?php echo $to_date ?>" />
					                                </div>
					                            </div>
                                           </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Professional designations </label><br />
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox"  name="cfp_general" id="cfp_general" style="display: inline;" value="1" />
                                                      </span>
                                                      <label class="form-control">CFP</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox" name="chfp_general" id="chfp_general" value="1" style="display: inline;" />
                                                      </span>
                                                      <label class="form-control">ChFP</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox"  name="cpa_general" id="cpa_general" value="1" style="display: inline;" />
                                                      </span>
                                                      <label class="form-control">CPA</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox" name="clu_general" id="clu_general" value="1" style="display: inline;" />
                                                      </span>
                                                      <label class="form-control">CLU</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox" name="cfa_general" id="cfa_general" value="1" style="display: inline;" />
                                                      </span>
                                                      <label class="form-control">CFA</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox" name="ria_general" id="ria_general" value="1" style="display: inline;" />
                                                      </span>
                                                      <label class="form-control">RIA</label>
                                                    </div>
                                                </div><br />
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox" name="insurance_general" id="insurance_general" value="1" style="display: inline;" />
                                                      </span>
                                                      <label class="form-control">Insurance</label>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-overlay">
                                    <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                </div>
                                <div class="panel-footer">
                                    <div class="selectwrap">
                                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                    					<input type="submit" name="general" onclick="waitingDialog.show();" value="Save"/>	
                                        <a href="<?php echo CURRENT_PAGE;?>"><input type="button" name="cancel" value="Cancel" /></a>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </form>
                 </div>
                 <div class="tab-pane " id="tab_b">
                <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
                    <form method="post">
                        <div class="panel-overlay-wrap">
                            <div class="panel">
                                <div class="panel-control" style="float: right;">
        							<div class="btn-group dropdown">
        								<a href="<?php echo CURRENT_PAGE;?> "><i class="fa fa-mail-forward"></i></a>
        							</div>
        						</div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#">Payouts</a></li>
                                    <li><a href="#">Overrides</a></li>
                                    <li><a href="#">Splits</a></li>
                                </ul>
                                <div class="panel-body">
                                    <div class="row">
                                        <?php echo 'PAyouts'; ?>
                                   </div>
                                </div>
                                <div class="panel-overlay">
                                    <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
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
                 <div class="tab-pane <?php if($action=="charges"){ echo "active"; } ?>" id="tab_c">
                <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
                    <form method="post">
                        <div class="panel-overlay-wrap">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-control" style="float: right;">
            							<div class="btn-group dropdown">
            								<a href="<?php echo CURRENT_PAGE;?> "><i class="fa fa-mail-forward"></i></a>
            							</div>
            						</div>
                                    <h2 class="panel-title" style="font-size: 25px;"><input type="checkbox" class="checkbox" name="pass_through" id="pass_through" style="display: inline !important;"/><b> None (Pass Through)</b></h2>
                                </div>
            					<div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4><b>Non-Managed Accounts</b></h4>
                                           </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4><b>Managed Accounts</b></h4>
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <h4>Clearing</h4>
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <h4>Execution</h4>
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <h4>Clearing</h4>
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <h4>Execution</h4>
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <h4><b>Equities</b></h4>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">Listed</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Equities[Listed][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input class="form-control" value="0.000" name="Equities[Listed][non_execution]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Equities[Listed][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <input class="form-control" value="4.50" name="Equities[Listed][execution]" type="text" />
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">OTC</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input class="form-control" value="25.4" name="Equities[OTC][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input class="form-control" value="40.5" name="Equities[OTC][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                               
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <h4><b>Options</b></h4>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">Up to $1 Premium</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Options[Up to $1 Premium][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input class="form-control" value="0.000" name="Options[Up to $1 Premium][non_execution]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Options[Up to $1 Premium][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <input class="form-control" value="4.50" name="Options[Up to $1 Premium][execution]" type="text" />
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">$1 Premium & Greater</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Options[$1 Premium & Greater][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input class="form-control" value="0.000" name="Options[$1 Premium & Greater][non_execution]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Options[$1 Premium & Greater][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <input class="form-control" value="4.50" name="Options[$1 Premium & Greater][execution]" type="text" />
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <h4><b>Fixed Income</b></h4>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">Listed Corporate</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Fixed Income[Listed Corporate][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input class="form-control" value="0.000" name="Fixed Income[Listed Corporate][non_execution]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Fixed Income[Listed Corporate][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <input class="form-control" value="4.50" name="Fixed Income[Listed Corporate][execution]" type="text" />
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">OTC</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Fixed Income[OTC][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Fixed Income[OTC][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">Goverment Securities</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Fixed Income[Goverment Securities][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Fixed Income[Goverment Securities][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">CMOs</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Fixed Income[CMOs][[non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Fixed Income[CMOs][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">Money Market/CDs</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Fixed Income[Money Market/CDs][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Fixed Income[Money Market/CDs][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">Mortgage Backed Securities</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Fixed Income[Mortgage Backed Securities][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Fixed Income[Mortgage Backed Securities][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">Municipal Bonds</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Fixed Income[Municipal Bonds][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Fixed Income[Municipal Bonds][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">UITs</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Fixed Income[UITs][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Fixed Income[UITs][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">Zero Coupon Bonds</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Fixed Income[Zero Coupon Bonds][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Fixed Income[Zero Coupon Bonds][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">
                                                <h4><b>Mutual Funds</b></h4>
                                            </div>
                                         </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">Buys/Sells</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Mutual Funds[Buys/Sells][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Mutual Funds[Buys/Sells][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">Exchanges</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Mutual Funds[Exchanges][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Mutual Funds[Exchanges][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">PIPs/SWPs</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Mutual Funds[PIPs/SWPs][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Mutual Funds[PIPs/SWPs][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">Transaction Surcharge</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Mutual Funds[Transaction Surcharge][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Mutual Funds[Transaction Surcharge][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4 style="float: right;">Postage/Transaction</h4>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="3.22" name="Mutual Funds[Postage/Transaction][non_clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                              <input class="form-control" value="25.5" name="Mutual Funds[Postage/Transaction][clearing]" type="text" />
                                           </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            
                                           </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-overlay">
                                    <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                </div>
                                <div class="panel-footer">
                                    <div class="selectwrap">
                                        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                    					<input type="submit" name="charges" onclick="waitingDialog.show();" value="Save"/>	
                                        <a href="<?php echo CURRENT_PAGE;?>"><input type="button" name="cancel" value="Cancel" /></a>
                                    </div>
                               </div>
                            </div>
                        </div>
                    </form>
                 </div>
                 <div class="tab-pane" id="tab_d">
                <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
                    <form method="post">
                        <div class="panel-overlay-wrap">
                            <div class="panel">
                                <div class="panel-control" style="float: right;">
        							<div class="btn-group dropdown">
        								<a href="<?php echo CURRENT_PAGE;?> "><i class="fa fa-mail-forward"></i></a>
        							</div>
        						</div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="<?php echo CURRENT_PAGE; ?>#tab_securities" data-toggle="tab">Securities</a></li>
                                    <li><a href="<?php echo CURRENT_PAGE; ?>#tab_insurance" data-toggle="tab">Insurance</a></li>
                                    <li><a href="<?php echo CURRENT_PAGE; ?>#tab_ria" data-toggle="tab">RIA</a></li>
                                </ul>
                                <div id="my-tab-content" class="tab-content">
                                    <div class="tab-pane active" id="tab_securities">
                                        <form method="post">
                                            <div class="panel-overlay-wrap">
                                                <div class="panel">
                                                   <div class="panel-heading">
                                                        <h4 class="panel-title" style="font-size: 20px;"><input type="checkbox" class="checkbox" name="pass_through" id="pass_through" style="display: inline !important;"/> Waive Home State Fee</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Product Category </label>
                                                                    <select name="product_category" id="product_category" class="form-control">
                                                                        <option value="0">Select Category</option>
                                                                        <option value="1">Matual Funds</option>
                                                                        <option value="2">Check</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <h4>Active</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <h4>State</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <h4>Fee</h4>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <h4>Received</h4>  
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <h4>Terminated</h4>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <h4>Reason</h4>
                                                               </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input type="checkbox" name="active_check" id="active_check" class="checkbox"  />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Alaska</label>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input class="form-control" value="120.00" name="fee" type="text" />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div id="demo-dp-range">
                    					                                <div class="input-daterange input-group" id="datepicker">
                                                                            <input type="text" name="received" id="received" value="" class="form-control" />
                    					                                </div>
                    					                            </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="terminated" id="terminated" value="" class="form-control" />
                					                                </div>
                					                              </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <input class="form-control" value="" name="reason" id="reason" type="text" />
                                                               </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-overlay">
                                                        <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
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
                                     <div class="tab-pane" id="tab_insurance">
                                        <form method="post">
                                            <div class="panel-overlay-wrap">
                                                <div class="panel">
                                                   <div class="panel-heading">
                                                        <div class="panel-control" style="float: right;">
                                							<div class="btn-group dropdown">
                                								<a href="<?php echo CURRENT_PAGE;?> "><i class="fa fa-mail-forward"></i></a>
                                							</div>
                                						</div>
                                                        <h4 class="panel-title" style="font-size: 20px;"><input type="checkbox" class="checkbox" name="pass_through" id="pass_through" style="display: inline !important;"/> Waive Home State Fee</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <h4>Active</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <h4>State</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <h4>Fee</h4>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <h4>Received</h4>  
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <h4>Terminated</h4>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <h4>Reason</h4>
                                                               </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input type="checkbox" name="active_check" id="active_check" class="checkbox"  />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Alaska</label>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input class="form-control" value="120.00" name="fee" type="text" />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div id="demo-dp-range">
                    					                                <div class="input-daterange input-group" id="datepicker">
                                                                            <input type="text" name="received" id="received" value="" class="form-control" />
                    					                                </div>
                    					                            </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="terminated" id="terminated" value="" class="form-control" />
                					                                </div>
                					                              </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <input class="form-control" value="" name="reason" id="reason" type="text" />
                                                               </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-overlay">
                                                        <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
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
                                     <div class="tab-pane" id="tab_ria">
                                        <form method="post">
                                            <div class="panel-overlay-wrap">
                                                <div class="panel">
                                                   <div class="panel-heading">
                                                        <h4 class="panel-title" style="font-size: 20px;"><input type="checkbox" class="checkbox" name="pass_through" id="pass_through" style="display: inline !important;"/> Waive Home State Fee</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <h4>Active</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <h4>State</h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <h4>Fee</h4>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <h4>Received</h4>  
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <h4>Terminated</h4>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <h4>Reason</h4>
                                                               </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input type="checkbox" name="active_check" id="active_check" class="checkbox"  />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Alaska</label>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input class="form-control" value="120.00" name="fee" type="text" />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div id="demo-dp-range">
                    					                                <div class="input-daterange input-group" id="datepicker">
                                                                            <input type="text" name="received" id="received" value="" class="form-control" />
                    					                                </div>
                    					                            </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="terminated" id="terminated" value="" class="form-control" />
                					                                </div>
                					                              </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <input class="form-control" value="" name="reason" id="reason" type="text" />
                                                               </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input type="checkbox" name="active_check" id="active_check" class="checkbox"  />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Alaska</label>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input class="form-control" value="120.00" name="fee" type="text" />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div id="demo-dp-range">
                    					                                <div class="input-daterange input-group" id="datepicker">
                                                                            <input type="text" name="received" id="received" value="" class="form-control" />
                    					                                </div>
                    					                            </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="terminated" id="terminated" value="" class="form-control" />
                					                                </div>
                					                              </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <input class="form-control" value="" name="reason" id="reason" type="text" />
                                                               </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-overlay">
                                                        <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
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
                            </div>
                        </div>
                    </form>
                 </div>
                 <div class="tab-pane" id="tab_e">
                <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
                    <form method="post">
                        <div class="panel-overlay-wrap">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-control" style="float: right;">
            							<div class="btn-group dropdown">
            								<a href="<?php echo CURRENT_PAGE;?> "><i class="fa fa-mail-forward"></i></a>
            							</div>
            						</div>
                                    <h3 class="panel-title" style="font-size: 25px;"><b>Register</b></h3>
                                </div>
            					<div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive" id="table-scroll">
                                                <table class="table table-bordered table-stripped table-hover">
                                                    <thead>
                                                        <th>Series</th>
                                                        <th>License Name / Description</th>
                                                        <th>Approval Date</th>
                                                        <th>Expiration Date</th>
                                                        <th>Reason</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Series 1</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Series 2</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Series 4</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Series 5</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Series 6</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Series 7</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>Series 9</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td>Series 10</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td>Series 11</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>14</td>
                                                            <td>Series 14</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>15</td>
                                                            <td>Series 15</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>16</td>
                                                            <td>Series 16</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>17</td>
                                                            <td>Series 17</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>22</td>
                                                            <td>Series 22</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>23</td>
                                                            <td>Series 23</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>24</td>
                                                            <td>Series 24</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>26</td>
                                                            <td>Series 26</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>27</td>
                                                            <td>Series 27</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>28</td>
                                                            <td>Series 28</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>30</td>
                                                            <td>Series 30</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>31</td>
                                                            <td>Series 31</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>32</td>
                                                            <td>Series 32</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>33</td>
                                                            <td>Series 33</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>37</td>
                                                            <td>Series 37</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>38</td>
                                                            <td>Series 38</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>39</td>
                                                            <td>Series 39</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>42</td>
                                                            <td>Series 42</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>51</td>
                                                            <td>Series 51</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>52</td>
                                                            <td>Series 52</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>53</td>
                                                            <td>Series 53</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>55</td>
                                                            <td>Series 55</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>62</td>
                                                            <td>Series 62</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>63</td>
                                                            <td>Series 63</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>64</td>
                                                            <td>Series 64</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>65</td>
                                                            <td>Series 65</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>66</td>
                                                            <td>Series 66</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>72</td>
                                                            <td>Series 72</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>82</td>
                                                            <td>Series 82</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>86</td>
                                                            <td>Series 86</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>87</td>
                                                            <td>Series 87</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Variable Annuities</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Variable Life</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Life Insurance</td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="approval_date" id="approval_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="expiration_date" id="expiration_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="register_reason" id="register_reason" type="text" /></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                                <div class="panel-overlay">
                                    <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
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
                 <div class="tab-pane" id="tab_f">
                <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
                    <form method="post">
                        <div class="panel-overlay-wrap">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-control" style="float: right;">
            							<div class="btn-group dropdown">
            								<a href="<?php echo CURRENT_PAGE;?> "><i class="fa fa-mail-forward"></i></a>
            							</div>
            						</div>
                                    <h3 class="panel-title" style="font-size: 25px;"><b>Required Documents</b></h3>
                                </div>
            					<div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive" id="table-scroll">
                                                <table class="table table-bordered table-stripped table-hover">
                                                    <thead>
                                                        <th>Received</th>
                                                        <th>Description</th>
                                                        <th>Date</th>
                                                        <th>Required</th>
                                                        <th>Add/Remove</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr id="add_row_docs">
                                                            <td>
                                                                <input type="checkbox" name="docs_receive" class="checkbox" id="docs_receive"/>
                                                            </td>
                                                            <td><input class="form-control" value="" name="docs_description" id="docs_description" type="text" /></td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="docs_date" id="docs_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" name="docs_required" class="checkbox" id="docs_required"/>
                                                            </td>
                                                            <td>
                                                                <button type="button" onclick="addMoreDocs();" class="btn btn-purple btn-icon btn-circle"><i class="fa fa-plus"></i></button>
                                                            </td>
                                                        </tr>
                                                  </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </form>
                 </div>
                 <?php }?>
          </div>
   </div>
</div>
<style>
.btn-primary {
    color: #fff;
    background-color: #337ab7 !important;
    border-color: #2e6da4 !important;
}
#table-scroll {
  height:300px;
  overflow:auto;  
  margin-top:20px;
}
</style>
<script type="text/javascript">
function validation()
{
    var x = document.forms["frm"]["uname"].value;
    if (x == "") {
        alert("Username must be filled out");
        document.forms["frm"]["uname"].focus();
        return false;
        }
    var x = document.forms["frm"]["pass"].value;
    if (x == "") {
        alert("Password must be filled out");
        document.forms["frm"]["pass"].focus();
        return false;
        }
}


</script>
<script>
$('#demo-dp-range .input-daterange').datepicker({
        format: "mm/dd/yyyy",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#telephone_general').mask("(999)-999-9999");
});
$(document).ready(function(){
    $('#cell_general').mask("(999)-999-9999");
});
$(document).ready(function(){
    $('#fax_general').mask("(999)-999-9999");
});
</script>
<script>
$("#home_general").on("change", function () {
    document.getElementById("address1_general").value='';
    document.getElementById("address2_general").value='';
    document.getElementById("city_general").value='';
    document.getElementById("state_general").value='';
    document.getElementById("zip_code_general").value='';
});
</script>
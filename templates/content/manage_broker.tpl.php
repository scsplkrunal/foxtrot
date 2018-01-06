<script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
});
</script>
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
span.multiselect-native-select {
	position: relative
}
span.multiselect-native-select select {
	border: 0!important;
	clip: rect(0 0 0 0)!important;
	height: 1px!important;
	margin: -1px -1px -1px -3px!important;
	overflow: hidden!important;
	padding: 0!important;
	position: absolute!important;
	width: 1px!important;
	left: 50%;
	top: 30px
}
.multiselect-container {
	position: absolute;
	list-style-type: none;
	margin: 0;
	padding: 0
}
.multiselect-container .input-group {
	margin: 5px
}
.multiselect-container>li {
	padding: 0
}
.multiselect-container>li>a.multiselect-all label {
	font-weight: 700
}
.multiselect-container>li.multiselect-group label {
	margin: 0;
	padding: 3px 20px 3px 20px;
	height: 100%;
	font-weight: 700
}
.multiselect-container>li.multiselect-group-clickable label {
	cursor: pointer
}
.multiselect-container>li>a {
	padding: 0
}
.multiselect-container>li>a>label {
	margin: 0;
	height: 100%;
	cursor: pointer;
    width: 100%;
	font-weight: 400;
	padding: 3px 0 3px 30px
}
.multiselect-container>li>a>label.radio, .multiselect-container>li>a>label.checkbox {
	margin: 0
}
.multiselect-container>li>a>label>input[type=checkbox] {
	margin-bottom: 5px
}
.btn-group>.btn-group:nth-child(2)>.multiselect.btn {
	border-top-left-radius: 4px;
	border-bottom-left-radius: 4px
}
.form-inline .multiselect-container label.checkbox, .form-inline .multiselect-container label.radio {
	padding: 3px 20px 3px 40px
}
.form-inline .multiselect-container li a label.checkbox input[type=checkbox], .form-inline .multiselect-container li a label.radio input[type=radio] {
	margin-left: -20px;
	margin-right: 0
}
</style>
<script>
var flag2=0;
function add_split(doc1){
    $('#demo-dp-range .input-daterange').datepicker({
        format: "mm/dd/yyyy",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });
    if(flag2==0){
        flag2=doc1+1;
        }
    else{ flag2++ ; }
    var html = '<div class="main_div">'+
    ' <div class="panel" style="border: 1px solid #cccccc !important; padding: 10px !important;">'+
    '<button type="button" tabindex="-1" style="float:right;" class="btn remove-rowdiv btn-icon btn-circle"><i class="fa fa-minus"></i></button><br/>'+
                    '<div class="row">'+
                        '<div class="col-md-6">'+
                            '<div class="form-group">'+
                                '<label>Receiving Rep </label>'+
                                '<select name="split[rap]['+flag2+']" class="form-control">'+
                                '<option value="">Select Broker</option>'+
                                '<option value="1">Broker1</option>'+
                                '<option value="1">Broker2</option>'+
                                '</select>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                            '<div class="form-group">'+
                                '<label>Rate  </label>'+
                                '<select name="split[rate]['+flag2+']"  class="form-control" >'+
                                '<option value="">Select Percentages</option>'+
                                <?php foreach($select_percentage as $key => $val) {?>
                                '<option value="<?php echo $key?>"><?php echo $val['percentage']?></a></option>'+
                                <?php } ?>
                                '</select>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="row">'+
                        '<div class="col-md-6">'+
                            '<div class="form-group">'+
                                '<label>Start </label>'+
                                '<div id="demo-dp-range">'+
                                    '<div class="input-daterange input-group" id="datepicker">'+
                                        '<input type="text" name="split[start]['+flag2+']"  class="form-control" />'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                            '<div class="form-group">'+
                                '<label>Until </label>'+
                                '<div id="demo-dp-range">'+
                                    '<div class="input-daterange input-group" id="datepicker">'+
                                        '<input type="text" name="split[until]['+flag2+']" class="form-control" />'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '</div>'+
                '</div>';
                
            
    $(html).insertAfter('#add_more_split');
}
$(document).on('click','.remove-rowdiv',function(){
    $(this).closest('.main_div').remove();
});var flag1=0;
function add_rate(doc){
    if(flag1==0){
        flag1=doc+1;
        }
    else{ flag1++ ; }
    var html = '<tr class="tr">'+
                    '<td>'+
                        '<input type="text" name="override[from1]['+flag1+']" class="form-control" />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="override[to1]['+flag1+']" class="form-control" />'+
                    '</td>'+
                    '<td>'+
                        '<select name="override[per1]['+flag1+']"  class="form-control" >'+
                        '<option value="">Select Percentages</option>'+
                        <?php foreach($select_percentage as $key => $val) {?>
                        '<option value="<?php echo $key?>"><?php echo $val['percentage']?></a></option>'+
                        <?php } ?>
                        '</select>'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" tabindex="-1" class="btn remove-row btn-icon btn-circle"><i class="fa fa-minus"></i></button>'+
                    '</td>'+
                '</tr>';
                
            
    $(html).insertAfter('#add_rate');
}
$(document).on('click','.remove-row',function(){
    $(this).closest('.tr').remove();
});
var flag=0;
function addlevel(leval){
    if(flag==0){
        flag=leval+1;
        }
    else{ flag++ ; }
    var html = '<tr class="tr">'+
                    '<td>'+
                        '<input type="text" name="leval[from]['+flag+']" class="form-control" />'+
                    '</td>'+
                    '<td>'+
                        '<input type="text" name="leval[to]['+flag+']" class="form-control" />'+
                    '</td>'+
                    '<td>'+
                        '<select name="leval[per]['+flag+']"  class="form-control" >'+
                        '<option value="">Select Percentages</option>'+
                        <?php foreach($select_percentage as $key => $val) {?>
                        '<option value="<?php echo $key?>"><?php echo $val['percentage']?></a></option>'+
                        <?php } ?>
                        '</select>'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" tabindex="-1" class="btn remove-row btn-icon btn-circle"><i class="fa fa-minus"></i></button>'+
                    '</td>'+
                '</tr>';
                
            
    $(html).insertBefore('#add_level');
}
$(document).on('click','.remove-row',function(){
    $(this).closest('.tr').remove();
});var flag=0,test=0;
function addMoreDocs(note_doc){
    $('#demo-dp-range .input-daterange').datepicker({
        format: "mm/dd/yyyy",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });
        if(test==0){
        test=note_doc+1;
        }
    else{ test++ ; }
    
   
    
    var html = '<tr class="tr">'+
                    '<td>'+
                        '<input type="checkbox" name="data[docs_receive]['+test+']" class="checkbox" value="1" id="docs_receive"/>'+
                    '</td>'+
                    '<td>'+
                        '<input class="form-control" value="" name="data[docs_description]['+test+']" id="docs_description" type="text" />'+
                    '</td>'+
                    '<td>'+
                        '<div id="demo-dp-range">'+
                            '<div class="input-daterange input-group" id="datepicker">'+
                                '<input type="text" name="data[docs_date]['+test+']" id="docs_date" value="" class="form-control" />'+
                            '</div>'+
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<input type="checkbox" name="data[docs_required]['+test+']" class="checkbox" value="1" id="docs_required"/>'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" tabindex="-1" class="btn remove-row btn-icon btn-circle"><i class="fa fa-minus"></i></button>'+
                    '</td>'+
                '</tr>';
                
            
    $(html).insertBefore('#add_row_docs');
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
<?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
<div class="col-lg-12 well">
    <div class="tab-content col-md-12">
         <?php
        if($action=='add_new'||($action=='edit' && $id>0)){
            ?>
        <ul class="nav nav-tabs">
          <!--<li class="active"><a href="#tab_default" data-toggle="pill">Home</a></li>-->
          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="general"){ echo "active"; }else if(!isset($_GET['tab'])){echo "active";}else{ echo '';} ?>"><a href="#tab_a" data-toggle="pill">General</a></li>
          <?php if(isset($_SESSION['last_insert_id']) && $_SESSION['last_insert_id']!=''){?>
          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="payouts"){ echo "active"; } ?>"><a href="#tab_b" data-toggle="pill">Payouts</a></li>
          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="charges"){ echo "active"; } ?>"><a href="#tab_c" data-toggle="pill">Charges</a></li>
          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="licences"){ echo "active"; } ?>"><a href="#tab_d" data-toggle="pill">Licences</a></li>
          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="registers"){ echo "active"; } ?>"><a href="#tab_e" data-toggle="pill">Registers</a></li>
          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="required_docs"){ echo "active"; } ?>"><a href="#tab_f" data-toggle="pill">Required Docs</a></li>
          <?php }else{ ?>
          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="payouts"){ echo "active"; } ?>" style="pointer-events: none;"><a href="#tab_b" data-toggle="pill">Payouts</a></li>
          <li class="<<?php if(isset($_GET['tab'])&&$_GET['tab']=="charges"){ echo "active"; } ?>"  style="pointer-events: none;"><a href="#tab_c" data-toggle="pill">Charges</a></li>
          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="licences"){ echo "active"; } ?>" style="pointer-events: none;"><a href="#tab_d" data-toggle="pill">Licences</a></li>
          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="registers"){ echo "active"; } ?>" style="pointer-events: none;"><a href="#tab_e" data-toggle="pill">Registers</a></li>
          <li class="<?php if(isset($_GET['tab'])&&$_GET['tab']=="required_docs"){ echo "active"; } ?>" style="pointer-events: none;"><a href="#tab_f" data-toggle="pill">Required Docs</a></li>
          <?php } ?>
          <div class="panel-control" style="float: right;">
    			<div class="btn-group dropdown">
    				<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
    				<ul class="dropdown-menu dropdown-menu-right" style="">
    					<li><a href="<?php echo CURRENT_PAGE; ?>"><i class="fa fa-eye"></i> View List</a></li>
    				</ul>
    			</div>
    		</div>
       </ul>
       <form method="post">
                <div class="panel-footer">
                    <div class="selectwrap">
                         <?php if($action=='edit' && $id>0){?><a href="<?php echo CURRENT_PAGE; ?>?id=<?php echo $id;?>&send=previous" class="previous next_previous_a" style="float: left;"><input type="button" name="previous" value="&laquo; Previous" /></a><?php } ?>
                         <?php if($action=='edit' && $id>0){?>
                            <a href="#view_changes" data-toggle="modal"><input type="button" name="view_changes" value="View Changes" style="margin-left: 12% !important;"/></a>
                         <?php } ?>
                         <a href="#broker_notes" data-toggle="modal"><input type="button" onclick="get_broker_notes();" name="notes" value="Notes" /></a>
                         <a href="#client_transactions" data-toggle="modal"><input type="button" name="transactions" value="Transactions" /></a>
                         <a href="#broker_attach" data-toggle="modal"><input type="button"  onclick="get_broker_attach();" name="attach" value="Attachments" /></a>
                         <input type="submit" name="submit" onclick="waitingDialog.show();" value="Save"/>	
                         <a href="<?php echo CURRENT_PAGE;?>"><input type="button" name="cancel" value="Cancel" /></a>
                         <?php if($action=='edit' && $id>0){?><a href="<?php echo CURRENT_PAGE; ?>?id=<?php echo $id;?>&send=next" class="next next_previous_a" style="float: right;"><input type="button" name="next" value="Next &raquo;" /></a><?php } ?>
                    </div>
                 </div>
                 
            <br /><br />
             <div class="tab-content">                 
            <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="general"){ echo "active"; }else if(!isset($_GET['tab'])){echo "active";}else{ echo '';} ?>" id="tab_a">
                
                            <div class="panel-overlay-wrap">
                                <div class="panel">
                					<div class="panel-heading">
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
                                                    <input type="text" name="ssn" value="<?php echo $ssn; ?>" class="form-control" />
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
                                 <div class="panel" style="border: 1px solid #cccccc !important; padding: 10px !important;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Home/Business</label>
                                                <select name="home_general" class="form-control">
                                                    <option <?php if(isset($home)&& $home == 0){ ?>selected="true"<?php } ?>  value="">Select Option</option>
                                                    <option <?php if(isset($home)&& $home == 1){ ?>selected="true"<?php } ?> value="1">Home</option>
                                                    <option <?php if(isset($home)&& $home == 2){ ?>selected="true"<?php } ?> value="2">Business</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address 1 </label>
                                                <input type="text" name="address1_general" id="address1_general" value="<?php if($action=='edit'){ echo $address1; } ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address 2 </label>
                                                <input type="text" name="address2_general" id="address2_general" value="<?php if($action=='edit'){ echo $address2; } ?>" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City </label>
                                                <input type="text" name="city_general" id="city_general" value="<?php if($action=='edit'){ echo $city; } ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State </label>
                                                <select name="state_general" id="state_general" class="form-control">
                                                    <option value="">Select State</option>
                                                    <?php foreach($get_state as $statekey=>$stateval){?>
                                                    <option <?php if($action == 'edit' && $state_id == $stateval['id'] ){ echo 'selected="true"';} ?> value="<?php echo $stateval['id']; ?>"><?php echo $stateval['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Zip code </label>
                                                    <input type="number" name="zip_code_general" id="zip_code_general" value="<?php if($action=='edit'){echo $zip_code;} ?>" class="form-control" />
                                                </div>
                                            </div>
                                    </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Telephone </label>
                                                <input type="text" name="telephone_general" id="telephone_general" value="<?php if($action=='edit'){echo $telephone;} ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cell </label>
                                                <input type="text" name="cell_general" id="cell_general" value="<?php if($action=='edit'){echo $cell;} ?>" class="form-control" />
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fax </label>
                                                <input type="text" name="fax_general" id="fax_general" value="<?php if($action=='edit'){ echo $fax;} ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender </label>
                                                <select name="gender_general" id="gender_general" class="form-control">
                                                    <option <?php if($gender=="0"){echo 'selected="true"'; }?> value="0">Select Gender</option>
                                                    <option <?php if($gender=="1"){echo 'selected="true"'; }?> value="1">Male</option>
                                                    <option <?php if($gender=="2"){echo 'selected="true"'; }?> value="2">Female</option>
                                                    <option <?php if($gender=="3"){echo 'selected="true"'; }?> value="3">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status  </label>
                                                <select name="status_general" id="status_general" class="form-control">
                                                    <option <?php if(isset($marital_status) && $marital_status=="0"){echo 'selected="true"'; }?> value="0">Select Status</option>
                                                    <option <?php if(isset($marital_status) && $marital_status=="1"){echo 'selected="true"'; }?> value="1">Single</option>
                                                    <option <?php if(isset($marital_status) && $marital_status=="2"){echo 'selected="true"'; }?> value="2">Married</option>
                                                    <option <?php if(isset($marital_status) && $marital_status=="3"){echo 'selected="true"'; }?> value="3">Divorced</option>
                                                    <option <?php if(isset($marital_status) && $marital_status=="4"){echo 'selected="true"'; }?> value="4">Widowed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Spouse </label>
                                                <input type="text" name="spouse_general" id="spouse_general" value="<?php if($action=='edit'){ echo $spouse; } ?>" class="form-control" />
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
                                                    <option <?php if($children==$i){echo 'selected="true"'; }?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email 1 </label>
                                                <input type="text" name="email1_general" id="email1_general" value="<?php if($action=='edit'){ echo $email1; } ?>" class="form-control" />
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email 2 </label>
                                                 <input type="text" name="email2_general" id="email2_general" value="<?php if($action=='edit'){ echo $email2; } ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Web ID </label>
                                                <input type="text" name="web_id_general" id="web_id_general" value="<?php if($action=='edit'){ echo $web_id; } ?>" class="form-control" />
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Web Password </label><br />
                                                <input type="password" name="web_password_general" id="web_password_general" value="<?php if($action=='edit'){ echo $web_password; } ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>DOB </label>
                                                <div id="demo-dp-range">
					                                <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="dob_general" id="dob_general" value="<?php if($action=='edit'){ echo $dob;} ?>" class="form-control" />
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
                                                        <input type="text" name="prospect_date_general" id="prospect_date_general" value="<?php if($action=='edit'){ echo $prospect_date; } ?>" class="form-control" />
					                                </div>
					                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>U4 </label><br />
                                                <div id="demo-dp-range">
					                                <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="u4_general" id="u4_general" value="<?php if($action=='edit'){ echo $u4; } ?>" class="form-control" />
					                                </div>
					                            </div>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Reassign Broker </label>
                                                <select name="reassign_broker_general" id="reassign_broker_general" class="form-control">
                                                    <option value="0">Select Days</option>
                                                    <?php for($i=0;$i<1000;$i++){?>
                                                    <option <?php if($reassign_broker==$i){echo 'selected="true"';}?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                 </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>U5/Termination Date </label><br />
                                                <div id="demo-dp-range">
    				                                <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="u5_general" id="u5_general" value="<?php if($action=='edit'){ echo $u5;} ?>" class="form-control" />
    				                                </div>
    				                            </div>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-md-6">
                                            <div class="form-group">
                                                <label>DBA Name </label><br />
                                                <input type="text" name="dba_name_general" id="dba_name_general" value="<?php if($action=='edit'){ echo $dba_name; } ?>" class="form-control" />
                                            </div>
                                        </div>
                                   </div>
                                   <h3>EFT Information</h3>
                                   <div class="panel" style="border: 1px solid #cccccc !important; padding: 10px !important;">
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>EFT Information </label><br />
                                                <label class="radio-inline">
                                                  <input type="radio" class="radio" name="eft_info_general" <?php if(isset($eft_information) && $eft_information==1){ echo'checked="true"'; }?>   value="1" checked="checked" />Pre-Notes
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" class="radio" name="eft_info_general" <?php if(isset($eft_information) && $eft_information==2){ echo'checked="true"'; }?> value="2" />Direct Deposit
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start Date </label><br />
                                                <div id="demo-dp-range">
					                                <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="start_date_general" id="start_date_general" value="<?php if($action=='edit'){ echo $start_date; } ?>" class="form-control" />
					                                </div>
					                            </div>
                                            </div>
                                        </div>
                                 </div>
                                 
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Transaction Type </label><br />
                                                <label class="radio-inline">
                                                  <input type="radio" class="radio" name="transaction_type_general" <?php if($transaction_type==1){ echo'checked="true"'; }?> value="1"  checked="checked" /> Checking
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" class="radio" name="transaction_type_general" <?php if($transaction_type==2){ echo'checked="true"'; }?> value="2" /> Savings
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Routing </label><br />
                                                <input type="text" name="routing_general" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="return chech()" id="routing_general" value="<?php if($action=='edit'){ echo $routing;} ?>" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Account No </label>
                                                <input type="number" name="account_no_general" id="account_no_general" value="<?php if($action=='edit'){ echo $account_no; } ?>" class="form-control" />
                                            </div>
                                        </div>
                                   </div></div>
                                   <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Professional designations </label><br />
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox"  name="cfp_general" <?php if(isset($cfp) && $cfp==1){ echo'checked="true"'; }?> id="cfp_general" style="display: inline;" value="1" />
                                                      </span>
                                                      <label class="form-control">CFP</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox" name="chfp_general" <?php if(isset($chfp) && $chfp==1){ echo'checked="true"'; }?> id="chfp_general" value="1" style="display: inline;" />
                                                      </span>
                                                      <label class="form-control">ChFP</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox"  name="cpa_general" <?php if(isset($cpa) &&$cpa==1){ echo'checked="true"'; }?> id="cpa_general" value="1" style="display: inline;" />
                                                      </span>
                                                      <label class="form-control">CPA</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox" name="clu_general" <?php if(isset($clu) &&$clu==1){ echo'checked="true"'; }?> id="clu_general" value="1" style="display: inline;" />
                                                      </span>
                                                      <label class="form-control">CLU</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox" name="cfa_general" <?php if(isset($cfa) &&$cfa==1){ echo'checked="true"'; }?> id="cfa_general" value="1" style="display: inline;" />
                                                      </span>
                                                      <label class="form-control">CFA</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox" name="ria_general" <?php if(isset($ria) &&$ria==1){ echo'checked="true"'; }?> id="ria_general" value="1" style="display: inline;" />
                                                      </span>
                                                      <label class="form-control">RIA</label>
                                                    </div>
                                                </div><br />
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                      <span class="input-group-addon">
                                                         <input type="checkbox" name="insurance_general" <?php if(isset($insurance) &&$insurance==1){ echo'checked="true"'; }?> id="insurance_general" value="1" style="display: inline;" />
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
                                            <input type="hidden" name="id"  value="<?php echo $id; ?>" />
                        					
                                </div>
                            </div>
                        
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
                                        <!--td><?php echo $val['internal']; ?></td-->
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
                <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="payouts"){ echo "active"; } ?>" id="tab_b">
                <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
                        <div class="panel-overlay-wrap">
                            <div class="panel">
            					<div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description </label>
                                                <input type="text" name="description" id="description" disabled="true" value="" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payout on </label><br />
                                                <label class="radio-inline">
                                                  <input type="radio" class="radio" <?php if(isset($edit_payout['transaction_type_general']) && $edit_payout['transaction_type_general']=='1'){?>checked="true"<?php } ?> name="transaction_type_general" value="1"  checked="checked" /> Amount
                                                </label>
                                                <label class="radio-inline">
                                                  <input type="radio" class="radio" <?php if(isset($edit_payout['transaction_type_general']) && $edit_payout['transaction_type_general']=='2'){?>checked="true"<?php } ?> name="transaction_type_general" value="2" /> Percentage
                                                </label>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Payout Grid </label>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-stripped table-hover">
                                                        <thead>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>Percentage</th>
                                                            <th>Add Level</th>
                                                        </thead>
                                                        <tbody>
                                                                <?php $doc_id1=0; 
                                                            if(isset($_GET['action']) && $_GET['action']=='edit' && !empty($edit_grid)){ 
                                                            foreach($edit_grid as $regkey=>$regval){ $doc_id1=$regval['id']; 
                                                                    ?>
                                                                <tr id="add_level">
                                                                    <td>
                                                                        <input type="text" name="leval[from][<?php echo $doc_id1;?>]" value="<?php echo $regval['from']; ?>" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="leval[to][<?php echo $doc_id1;?>]" value="<?php echo $regval['to']; ?>" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <select name="leval[per][<?php echo $doc_id1;?>]"  class="form-control" >
                                                                            <option value="">Select Percentages</option>
                                                                            <?php foreach($select_percentage as $key => $val) {?>
                                                                            <option <?php if(isset($regval['per']) && $regval['per']== $key){?>selected="true"<?php }?> value="<?php echo $key?>"><?php echo $val['percentage']?></a></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" tabindex="-1" class="btn remove-row btn-icon btn-circle"><i class="fa fa-minus"></i></button>
                                                                    </td>
                                                                </tr>
                                                            <?php } }  $doc_id1++;?>
                                                                 <tr id="add_level">
                                                                    <td>
                                                                        <input type="text" name="leval[from][<?php  echo $doc_id1;?>]" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" name="leval[to][<?php  echo $doc_id1;?>]" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <select name="leval[per][<?php  echo $doc_id1;?>]"  class="form-control" >
                                                                            <option value="">Select Percentages</option>
                                                                            <?php foreach($select_percentage as $key => $val) {?>
                                                                            <option value="<?php echo $key?>"><?php echo $val['percentage']?></a></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button" onclick="addlevel(<?php  echo $doc_id1;?>);" class="btn btn-purple btn-icon btn-circle"><i class="fa fa-plus"></i></button>
                                                                    </td>
                                                                </tr>
                                                                <?php   ?>
                                                            
                                                      </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product Categories </label><br />
                                                <input type="checkbox" name="product_category_all" id="product_category_all" value="0"  class="checkbox" style="display: inline;"/>&nbsp;<label>All</label><br />
                                                <input type="checkbox" name="product_category1" <?php if(isset($edit_payout['product_category1']) && $edit_payout['product_category1']=='1'){?>checked="true"<?php } ?> id="product_category1" value="1" class="checkbox" style="display: inline;"/>&nbsp;<label>Mutual Funds</label>&nbsp;&nbsp;
                                                <input type="checkbox" name="product_category2" <?php if(isset($edit_payout['product_category2']) && $edit_payout['product_category2']=='1'){?>checked="true"<?php } ?> id="product_category2" value="1" class="checkbox" style="display: inline;"/>&nbsp;<label>Mutual Fund Trials</label>&nbsp;&nbsp;
                                                <input type="checkbox" name="product_category3" <?php if(isset($edit_payout['product_category3']) && $edit_payout['product_category3']=='1'){?>checked="true"<?php } ?> id="product_category3" value="1" class="checkbox" style="display: inline;"/>&nbsp;<label>Stocks</label>&nbsp;&nbsp;
                                                <input type="checkbox" name="product_category4" <?php if(isset($edit_payout['product_category4']) && $edit_payout['product_category4']=='1'){?>checked="true"<?php } ?> id="product_category4" value="1" class="checkbox" style="display: inline;"/>&nbsp;<label>Bonds</label>&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Basis </label><br />
                                                <input type="radio" name="basis" <?php if(isset($edit_payout['basis']) && $edit_payout['basis']=='1'){?>checked="true"<?php } ?>  class="radio" style="display: inline;" value="1"/>&nbsp;<label>Net Earnings</label>&nbsp;&nbsp;
                                                <input type="radio" name="basis" <?php if(isset($edit_payout['basis']) && $edit_payout['basis']=='2'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="2"/>&nbsp;<label>Gross Concessions</label>&nbsp;&nbsp;
                                                <input type="radio" name="basis" <?php if(isset($edit_payout['basis']) && $edit_payout['basis']=='3'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="3"/>&nbsp;<label>Principal</label>&nbsp;&nbsp;
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cumulative </label><br />
                                                <input type="radio" name="cumulative" <?php if(isset($edit_payout['cumulative']) && $edit_payout['cumulative']=='1'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="1"/>&nbsp;<label>Payroll-To-Date</label>&nbsp;&nbsp;
                                                <input type="radio" name="cumulative" <?php if(isset($edit_payout['cumulative']) && $edit_payout['cumulative']=='2'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="2"/>&nbsp;<label>Month-To-Date</label>&nbsp;&nbsp;
                                                <input type="radio" name="cumulative" <?php if(isset($edit_payout['cumulative']) && $edit_payout['cumulative']=='3'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="3"/>&nbsp;<label>Year-To-Date</label>&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Year </label><br />
                                                <input type="radio" name="year" <?php if(isset($edit_payout['year']) && $edit_payout['year']=='1'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="1"/>&nbsp;<label>Calendar</label>&nbsp;&nbsp;
                                                <input type="radio" name="year" <?php if(isset($edit_payout['year']) && $edit_payout['year']=='2'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="2"/>&nbsp;<label>Rolling</label>&nbsp;&nbsp;
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Calculation Detail </label><br />
                                                <input type="radio" name="calculation_detail" <?php if(isset($edit_payout['calculation_detail']) && $edit_payout['calculation_detail']=='1'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="1"/>&nbsp;<label>Intra-Trade</label>&nbsp;&nbsp;
                                                <input type="radio" name="calculation_detail" <?php if(isset($edit_payout['calculation_detail']) && $edit_payout['calculation_detail']=='2'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="2"/>&nbsp;<label>Inter-Trade</label>&nbsp;&nbsp;
                                                <input type="radio" name="calculation_detail" <?php if(isset($edit_payout['calculation_detail']) && $edit_payout['calculation_detail']=='3'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="3"/>&nbsp;<label>Payroll-Period</label>&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Clearing Charge Deducted From</label><br />
                                                <input type="radio" name="clearing_charge_deducted_from" <?php if(isset($edit_payout['clearing_charge_deducted_from']) && $edit_payout['clearing_charge_deducted_from']=='1'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="1"/>&nbsp;<label>Net</label>&nbsp;&nbsp;
                                                <input type="radio" name="clearing_charge_deducted_from" <?php if(isset($edit_payout['clearing_charge_deducted_from']) && $edit_payout['clearing_charge_deducted_from']=='2'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="2"/>&nbsp;<label>Gross</label>&nbsp;&nbsp;
                                            </div>
                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Reset </label>
                                                <div id="demo-dp-range">
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="reset"  value="<?php if(isset($edit_payout['reset']) && $edit_payout['reset']!=''){ echo $edit_payout['reset']; } ?>"  class="form-control"  />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   </div>
                                  <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <select name="description_type"  class="form-control">
                                                    <option value="0">Select Option</option>
                                                    <option <?php if(isset($edit_payout['description_type']) && $edit_payout['description_type']=='1'){?>selected="true"<?php }?> value="1">This is product type</option>
                                                    <option <?php if(isset($edit_payout['description_type']) && $edit_payout['description_type']=='2'){?>selected="true"<?php }?> value="2">This is product type</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Team Members </label>
                                                <select name="team_member"  class="multiselect-ui form-control" multiple="multiple" >
                                                    <option value="">Select Broker</option>
                                                    <?php foreach($select_broker as $key => $val) {?>
                                                    <option <?php if(isset($edit_payout['team_member']) && $edit_payout['team_member']==$key){?>selected="true"<?php }?> value="<?php echo $key?>"><?php echo $val['first_name']?></a></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div><br />
                                    
                                    <h4>Override </h4>
                                    
                                    <div class="panel" style="border: 1px solid #cccccc !important; padding: 10px !important;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Receiving Rep </label>
                                                <select name="receiving_rep"  class="form-control">
                                                    <option value="">Select Broker</option>
                                                    <?php foreach($select_broker as $key => $val) {?>
                                                    <option <?php if(isset($edit_override['rap']) && $edit_override['rap']==$key) {?>selected="true"<?php } ?> value="<?php echo $key?>"><?php echo $val['first_name']?></a></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Rate </label>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-stripped table-hover">
                                                        <thead>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>Percentage</th>
                                                            <th>Add More</th>
                                                        </thead>
                                                        <tbody>
                                                        <?php $doc_id2=0; 
                                                            if(isset($_GET['action']) && $_GET['action']=='edit' && !empty($edit_override)){
                                                            foreach($edit_override as $regkey=>$regval){
                                                                    ?>
                                                            <tr id="add_rate">
                                                                <?php $doc_id2++; ?>
                                                                <td>
                                                                    <input type="text" name="override[from1][<?php echo $doc_id2;?>]" value="<?php echo $regval['from']; ?>" class="form-control" />
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="override[to1][<?php echo $doc_id2;?>]" value="<?php echo $regval['to']; ?>" class="form-control" />
                                                                </td>
                                                                <td>
                                                                    <select name="override[per1][<?php echo $doc_id2;?>]"  class="form-control" >
                                                                        <option value="">Select Percentages</option>
                                                                        <?php foreach($select_percentage as $key => $val) {?>
                                                                        <option <?php if(isset($regval['per']) && $regval['per']== $key){?>selected="true"<?php }?> value="<?php echo $key?>"><?php echo $val['percentage']?></a></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <button type="button" tabindex="-1" class="btn remove-row btn-icon btn-circle"><i class="fa fa-minus"></i></button>
                                                                </td>
                                                            </tr>
                                                            <?php } } $doc_id2++ ; ?>
                                                                
                                                            <tr id="add_rate">
                                                                <td>
                                                                    <input type="text" name="override[from1][<?php echo $doc_id2;?>]" class="form-control" />
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="override[to1][<?php echo $doc_id2;?>]" class="form-control" />
                                                                </td>
                                                                <td>
                                                                    <select name="override[per1][<?php echo $doc_id2;?>]"  class="form-control" >
                                                                        <option value="">Select Percentages</option>
                                                                        <?php foreach($select_percentage as $key => $val) {?>
                                                                        <option value="<?php echo $key?>"><?php echo $val['percentage']?></a></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <button type="button" onclick="add_rate(<?php echo $doc_id2;?>);" class="btn btn-purple btn-icon btn-circle"><i class="fa fa-plus"></i></button>
                                                                </td>
                                                            </tr>
                                                      </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               </div><br />
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Start </label>
                                            <div id="demo-dp-range">
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" name="start"  class="form-control" value="<?php if(isset($edit_payout['start']) && $edit_payout['start']!=''){echo $edit_payout['start'];} ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Until </label>
                                            <div id="demo-dp-range">
                                                <div class="input-daterange input-group" id="datepicker">
                                                    <input type="text" name="until"  class="form-control" value="<?php if(isset($edit_payout['until']) && $edit_payout['until']!=''){echo $edit_payout['until'];} ?>" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Apply to </label><br />
                                            <input type="radio" name="apply_to" <?php if(isset($edit_payout['apply_to']) && $edit_payout['apply_to']=='1'){?>checked="true"<?php } ?>  class="radio" style="display: inline;" value="1"/>&nbsp;<label>Apply Unpaid Trades</label>&nbsp;&nbsp;
                                            <input type="radio" name="apply_to" <?php if(isset($edit_payout['apply_to']) && $edit_payout['apply_to']=='2'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="2"/>&nbsp;<label>Only Going Forward</label>&nbsp;&nbsp;
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Categories </label><br />
                                            <input type="checkbox" name="product_1" value="1" class="checkbox" style="display: inline;"/>&nbsp;<label>All</label><br />
                                            <input type="checkbox" name="product_2" <?php if(isset($edit_payout['product_2']) && $edit_payout['product_2']=='1'){?>checked="true"<?php } ?> value="1" class="checkbox" style="display: inline;"/>&nbsp;<label>Mutual Funds</label>&nbsp;&nbsp;
                                            <input type="checkbox" name="product_3" <?php if(isset($edit_payout['product_3']) && $edit_payout['product_3']=='1'){?>checked="true"<?php } ?> value="1" class="checkbox" style="display: inline;"/>&nbsp;<label>Mutual Fund Trials</label>&nbsp;&nbsp;
                                            <input type="checkbox" name="product_4" <?php if(isset($edit_payout['product_4']) && $edit_payout['product_4']=='1'){?>checked="true"<?php } ?> value="1" class="checkbox" style="display: inline;"/>&nbsp;<label>Stocks</label>&nbsp;&nbsp;
                                            <input type="checkbox" name="product_5" <?php if(isset($edit_payout['product_5']) && $edit_payout['product_5']=='1'){?>checked="true"<?php } ?> value="1" class="checkbox" style="display: inline;"/>&nbsp;<label>Bonds</label>&nbsp;&nbsp;
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Calculate On  </label><br />
                                            <input type="radio" name="calculate_on" <?php if(isset($edit_payout['calculate_on']) && $edit_payout['calculate_on']=='1'){?>checked="true"<?php } ?>  class="radio" style="display: inline;" value="1"/>&nbsp;<label>Gross</label>&nbsp;&nbsp;
                                            <input type="radio" name="calculate_on" <?php if(isset($edit_payout['calculate_on']) && $edit_payout['calculate_on']=='2'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="2"/>&nbsp;<label>Net</label>&nbsp;&nbsp;
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>  </label><br />
                                            <input type="radio" name="deduct" <?php if(isset($edit_payout['deduct']) && $edit_payout['deduct']=='1'){?>checked="true"<?php } ?>  class="radio" style="display: inline;" value="1"/>&nbsp;<label>Deduct from Rep</label>&nbsp;&nbsp;
                                            <input type="radio" name="deduct" <?php if(isset($edit_payout['deduct']) && $edit_payout['deduct']=='2'){?>checked="true"<?php } ?> class="radio" style="display: inline;" value="2"/>&nbsp;<label>Deduct from ....</label>&nbsp;&nbsp;
                                        </div>
                                    </div>
                               </div><br />
                               <h4>Split </h4>
                               <div class="panel" style="border: 1px solid #cccccc !important; padding: 10px !important;">
                                    <?php $doc_id3=0; 
                                        if(isset($_GET['action']) && $_GET['action']=='edit' && !empty($edit_split)){
                                        foreach($edit_split as $regkey=>$regval){
                                            $doc_id3 = $regval['id'];
                                    ?>
                                    <button type="button" tabindex="-1" style="float:right;" class="btn remove-rowdiv btn-icon btn-circle"><i class="fa fa-minus"></i></button><br />
                                   
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Receiving Rep </label>
                                                <select name="split[rap][<?php echo $doc_id3;?>]"  class="form-control" >
                                                    <option value="0">Select Broker</option>
                                                    <option value="1">Broker1</option>
                                                    <option value="2">Broker2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rate </label>
                                                <select name="split[rate][<?php echo $doc_id3;?>]"  class="form-control" >
                                                    <option value="">Select Percentages</option>
                                                    <?php foreach($select_percentage as $key => $val) {?>
                                                    <option <?php if(isset($regval['per']) && $regval['per']==$key){?>selected="true"<?php } ?> value="<?php echo $key?>"><?php echo $val['percentage']?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start </label>
                                                <div id="demo-dp-range">
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="split[start][<?php echo $doc_id3;?>]"  class="form-control" value="<?php echo $regval['start']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Until </label>
                                                <div id="demo-dp-range">
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="split[until][<?php echo $doc_id3;?>]"  class="form-control" value="<?php echo $regval['until']?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }} $doc_id3++; ?>
                                    <button type="button" onclick="add_split(<?php echo $doc_id3;?>);"  style="float: right;" class="btn btn-purple btn-icon btn-circle"><i class="fa fa-plus"></i></button><br />
                                    <div id="add_more_split">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Receiving Rep </label>
                                                <select name="split[rap][<?php echo $doc_id3;?>]"  class="form-control" >
                                                    <option value="0">Select Broker</option>
                                                    <option value="1">Broker1</option>
                                                    <option value="2">Broker2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rate </label>
                                                <select name="split[rate][<?php echo $doc_id3;?>]"  class="form-control" >
                                                    <option value="">Select Percentages</option>
                                                    <?php foreach($select_percentage as $key => $val) {?>
                                                    <option value="<?php echo $key?>"><?php echo $val['percentage']?></a></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Start </label>
                                                <div id="demo-dp-range">
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="split[start][<?php echo $doc_id3;?>]"  class="form-control" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Until </label>
                                                <div id="demo-dp-range">
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" name="split[until][<?php echo $doc_id3;?>]"  class="form-control" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div><br />
                               </div>
                            </div>
                            <div class="panel-overlay">
                                <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                            </div>
                                    <input type="hidden" name="id"  value="<?php echo $id; ?>" />
                				
                        </div>
                    
                 </div>
                 <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="charges"){ echo "active"; } ?>" id="tab_c">
                 <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
                        <div class="panel-overlay-wrap">
                            <div class="panel">
                                <div class="panel-heading">
                                    
                                    <h2 class="panel-title" style="font-size: 25px;"><input type="checkbox" class="checkbox" name="pass_through" style="display: inline !important;"/><b> None (Pass Through)</b></h2>
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
                                    <?php 
                                    $broker_charge=$instance->select_broker_charge($id);
                                    //echo "<pre>"; print_r($broker_charge);
                                    $charge_type_arr=$instance->select_charge_type();
                                    foreach($charge_type_arr as $charge_type){
                                        ?>
                                        <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <h4><b><?php echo $charge_type['charge_type']; ?></b></h4>
                                                </div>
                                             </div>
                                        </div>
                                        <?php
                                        $charge_name_arr=$instance->select_charge_name($charge_type['charge_type_id']);
                                        foreach($charge_name_arr as $charge_name){
                                        ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <h4 style="float: right;"><?php echo $charge_name['charge_name']; ?></h4>
                                                </div>
                                            </div>
                                            <?php
                                            $charge_detail_arr=$instance->select_charge_detail($charge_type['charge_type_id'],$charge_name['charge_name_id']);
                                            foreach($charge_detail_arr as $charge_detail){
                                                
                                                if($charge_detail['account_type']=='1' && $charge_detail['account_process']=='1')
                                                {
                                                    ?>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                          <input class="form-control charge" onkeypress="return isFloatNumber(this,event)" value="<?php echo (isset($broker_charge[$charge_type['charge_type_id']][$charge_name['charge_name_id']]['1']['1']) && $broker_charge[$charge_type['charge_type_id']][$charge_name['charge_name_id']]['1']['1']!='')?$broker_charge[$charge_type['charge_type_id']][$charge_name['charge_name_id']]['1']['1']:'0.00'; ?>" name="inp_type[<?php echo $charge_type['charge_type_id']; ?>][<?php echo $charge_name['charge_name_id']; ?>][1][1]" type="text" />
                                                       </div>
                                                    </div>
                                                    <?php
                                                    if(count($charge_detail_arr)=='2')
                                                    {
                                                        ?>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                           </div>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                                else if($charge_detail['account_type']=='1' && $charge_detail['account_process']=='2')
                                                {
                                                    ?>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                          <input class="form-control charge" onkeypress="return isFloatNumber(this,event)" value="<?php echo (isset($broker_charge[$charge_type['charge_type_id']][$charge_name['charge_name_id']]['1']['2']) && $broker_charge[$charge_type['charge_type_id']][$charge_name['charge_name_id']]['1']['2']!='')?$broker_charge[$charge_type['charge_type_id']][$charge_name['charge_name_id']]['1']['2']:'0.00'; ?>" name="inp_type[<?php echo $charge_type['charge_type_id']; ?>][<?php echo $charge_name['charge_name_id']; ?>][1][2]" type="text" />
                                                       </div>
                                                    </div>
                                                    <?php
                                                }
                                                else if($charge_detail['account_type']=='2' && $charge_detail['account_process']=='1')
                                                {
                                                    ?>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                          <input class="form-control charge" onkeypress="return isFloatNumber(this,event)" value="<?php echo (isset($broker_charge[$charge_type['charge_type_id']][$charge_name['charge_name_id']]['2']['1']) && $broker_charge[$charge_type['charge_type_id']][$charge_name['charge_name_id']]['2']['1']!='')?$broker_charge[$charge_type['charge_type_id']][$charge_name['charge_name_id']]['2']['1']:'0.00'; ?>" name="inp_type[<?php echo $charge_type['charge_type_id']; ?>][<?php echo $charge_name['charge_name_id']; ?>][2][1]" type="text" />
                                                       </div>
                                                    </div>
                                                    <?php
                                                }
                                                else if($charge_detail['account_type']=='2' && $charge_detail['account_process']=='2')
                                                {
                                                    ?>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                          <input class="form-control charge" onkeypress="return isFloatNumber(this,event)" value="<?php echo (isset($broker_charge[$charge_type['charge_type_id']][$charge_name['charge_name_id']]['2']['2']) && $broker_charge[$charge_type['charge_type_id']][$charge_name['charge_name_id']]['2']['2']!='')?$broker_charge[$charge_type['charge_type_id']][$charge_name['charge_name_id']]['2']['2']:'0.00'; ?>" name="inp_type[<?php echo $charge_type['charge_type_id']; ?>][<?php echo $charge_name['charge_name_id']; ?>][2][2]" type="text" />
                                                       </div>
                                                    </div>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                       </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="panel-overlay">
                                    <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                </div>
                                        <input type="hidden" name="id"  value="<?php echo $id; ?>" />
                    					
                            </div>
                        </div>
                 </div>
                 <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="licences"){ echo "active"; } ?>" id="tab_d">
                 <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
                        <div class="panel-overlay-wrap">
                            <div class="panel">
                                
                                <ul class="nav nav-tabs">
                                    <li class="<?php if(!isset($_GET['sub_tab'])){echo "active";}else{ echo '';} ?>"><a href="<?php echo CURRENT_PAGE; ?>#tab_securities" data-toggle="tab">Securities</a></li>
                                    <li class="<?php if(isset($_GET['sub_tab'])&&$_GET['sub_tab']=="insurance"){ echo "active"; } ?>"><a href="<?php echo CURRENT_PAGE; ?>#tab_insurance" data-toggle="tab">Insurance</a></li>
                                    <li class="<?php if(isset($_GET['sub_tab'])&&$_GET['sub_tab']=="ria"){ echo "active"; } ?>"><a href="<?php echo CURRENT_PAGE; ?>#tab_ria" data-toggle="tab">RIA</a></li>
                                </ul>
                                <div id="my-tab-content" class="tab-content">
                                    <div class="tab-pane <?php if(!isset($_GET['sub_tab'])){echo "active";}else{ echo '';} ?>" id="tab_securities">
                                            <div class="panel-overlay-wrap">
                                                <div class="panel">
                                                <?php if(isset($edit_licences_securities)){foreach($edit_licences_securities as $key=>$val)
                                                {   $row1 = $val['waive_home_state_fee']; $row2 = $val['product_category']; }}  ?>
                                                   <div class="panel-heading">
                                                        <h4 class="panel-title" style="font-size: 20px;"><input type="checkbox" class="checkbox" <?php if(isset($_GET['action']) && $_GET['action'] == 'edit' && (isset($row1) && $row1 == '1'))    { ?>checked="true"<?php }?> name="pass_through" value="1" style="display: inline !important;"/> Waive Home State Fee</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Product Category </label>
                                                                    <select name="product_category"  class="form-control">
                                                                        <option <?php if(isset($_GET['action'])&&$_GET['action']=='edit'){if(isset($row2) && $row2==0){ ?> selected="true"<?php } } ?> value="0">Select Category</option>
                                                                        <option <?php if(isset($_GET['action'])&&$_GET['action']=='edit'){if(isset($row2) && $row2==1){ ?> selected="true"<?php } } ?> value="1">Active</option>
                                                                        <option <?php if(isset($_GET['action'])&&$_GET['action']=='edit'){if(isset($row2) && $row2==2){ ?> selected="true"<?php } } ?> value="2">Received</option>
                                                                        <option <?php if(isset($_GET['action'])&&$_GET['action']=='edit'){if(isset($row2) && $row2==3){ ?> selected="true"<?php } } ?> value="3">Terminated</option>
                                                                        <option <?php if(isset($_GET['action'])&&$_GET['action']=='edit'){if(isset($row2) && $row2==4){ ?> selected="true"<?php } } ?> value="4">Reason</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="type" value="1"/>
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
                                                        <?php if(isset($_GET['action']) && $_GET['action']=='edit' && !empty($edit_licences_securities )){
                                                                foreach($edit_licences_securities as $key=>$val){ //echo '<pre>'; print_r($row);
                                                             foreach($get_state_new as $statekey=>$stateval) { if($val['state_id']== $stateval['id']) {?>
                                                        <div class="panel" style="border: 1px solid #cccccc !important; padding: 10px !important;">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input type="checkbox" name="data1[<?php echo $stateval['id'] ?>][active_check]"  value="1" <?php if($val['active_check']==1){ ?>checked="true"<?php }?> id="data1[<?php echo $stateval['id'] ?>][active_check]" class="checkbox"  />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                        <label><?php echo $stateval['name']; ?></label>
                                                                    
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input class="form-control charge" onkeypress="return isFloatNumber(this,event)" value="<?php echo $val['fee']; ?>" name="data1[<?php echo $stateval['id'] ?>][fee]" type="text" />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div id="demo-dp-range">
                    					                                <div class="input-daterange input-group" id="datepicker">
                                                                            <input type="text" name="data1[<?php echo $stateval['id'] ?>][received]" id="data1[<?php echo $stateval['id'] ?>][received]" value="<?php echo $val['received']; ?>" class="form-control" />
                    					                                </div>
                    					                            </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="data1[<?php echo $stateval['id'] ?>][terminated]" id="data1[<?php echo $stateval['id'] ?>][terminated]" value="<?php echo $val['terminated']; ?>" class="form-control" />
                					                                </div>
                					                              </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="data1[<?php echo $stateval['id'] ?>][reason]" id="data1[<?php echo $stateval['id'] ?>][reason]" value="<?php echo $val['reson']; ?>" type="text" />
                                                               </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <?php } } } } else{?>
                                                        
                                                        <?php foreach($get_state_new   as $statekey=>$stateval){?>
                                                        <div class="panel" style="border: 1px solid #cccccc !important; padding: 10px !important;">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input type="checkbox" name="data1[<?php echo $stateval['id'] ?>][active_check]" value="1" id="data1[<?php echo $stateval['id'] ?>][active_check]" class="checkbox"  />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                        <label><?php echo $stateval['name']; ?></label>
                                                                    
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input class="form-control charge" onkeypress="return isFloatNumber(this,event)" value="" name="data1[<?php echo $stateval['id'] ?>][fee]" type="text" />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div id="demo-dp-range">
                    					                                <div class="input-daterange input-group" id="datepicker">
                                                                            <input type="text" name="data1[<?php echo $stateval['id'] ?>][received]" id="data1[<?php echo $stateval['id'] ?>][received]" value="" class="form-control" />
                    					                                </div>
                    					                            </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="data1[<?php echo $stateval['id'] ?>][terminated]" id="data1[<?php echo $stateval['id'] ?>][terminated]" value="" class="form-control" />
                					                                </div>
                					                              </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <input class="form-control" value="" name="data1[<?php echo $stateval['id'] ?>][reason]" id="data1[<?php echo $stateval['id'] ?>][reason]" type="text" />
                                                               </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <?php } }?>
                                                    </div>
                                                    <div class="panel-overlay">
                                                        <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                                    </div>
                                                            <input type="hidden" name="id"  value="<?php echo $id; ?>" />  
                                                </div>
                                            </div>   
                                     </div>
                                     <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="licences" && $_GET['sub_tab'] == "insurance"){ echo "active"; } ?>" id="tab_insurance">
                                      
                                            <div class="panel-overlay-wrap">
                                                <div class="panel">
                                                   <div class="panel-heading">
                                                    <?php if(isset($edit_licences_insurance) && !empty($edit_licences_insurance)){ foreach($edit_licences_insurance as $key=>$val)
                                                {   $row1 = $val['waive_home_state_fee'];  } }  ?>
                                                        <h4 class="panel-title" style="font-size: 20px;"><input type="checkbox" <?php if(isset($_GET['action'])&&$_GET['action']=='edit' && (isset($row1) && $row1==1 )){ ?>checked="true"<?php } ?> value="1 "  class="checkbox" name="pass_through" style="display: inline !important;"/> Waive Home State Fee</h4>
                                                    </div>
                                                    <input type="hidden" name="type" value="2"/>
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
                                                        <?php if(isset($_GET['action']) && $_GET['action']=='edit' && !empty($edit_licences_insurance)){
                                                                foreach($edit_licences_insurance as $key=>$val){ 
                                                             foreach($get_state_new as $statekey=>$stateval) { if($val['state_id']== $stateval['id']) {?>
                                                        <div class="panel" style="border: 1px solid #cccccc !important; padding: 10px !important;">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input type="checkbox" name="data2[<?php echo $stateval['id'] ?>][active_check]" <?php if($val['active_check']==1){ ?>checked="true"<?php }?> value="1" id="data2[<?php echo $stateval['id'] ?>][active_check]" class="checkbox"  />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                        <label><?php echo $stateval['name']; ?></label>
                                                                    
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input class="form-control charge" onkeypress="return isFloatNumber(this,event)" value="<?php echo $val['fee']; ?>" name="data2[<?php echo $stateval['id'] ?>][fee]"  type="text" />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div id="demo-dp-range">
                    					                                <div class="input-daterange input-group" id="datepicker">
                                                                            <input type="text" name="data2[<?php echo $stateval['id'] ?>][received]" id="data2[<?php echo $stateval['id'] ?>][received]" value="<?php echo $val['received']; ?>" class="form-control" />
                    					                                </div>
                    					                            </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="data2[<?php echo $stateval['id'] ?>][terminated]" id="data2[<?php echo $stateval['id'] ?>][terminated]" value="<?php echo $val['terminated']?>" class="form-control" />
                					                                </div>
                					                              </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <input class="form-control" value="<?php echo $val['reson']?>" name="data2[<?php echo $stateval['id'] ?>][reason]" id="data2[<?php echo $stateval['id'] ?>][reason]" type="text" />
                                                               </div>
                                                            </div>
                                                        </div></div>
                                                        <?php } } } }  else{ ?>
                                                        <?php foreach($get_state_new as $statekey=>$stateval){?>
                                                        <div class="panel" style="border: 1px solid #cccccc !important; padding: 10px !important;">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input type="checkbox" name="data2[<?php echo $stateval['id'] ?>][active_check]" value="1" id="data2[<?php echo $stateval['id'] ?>][active_check]" class="checkbox"  />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                        <label><?php echo $stateval['name']; ?></label>
                                                                    
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input class="form-control charge" onkeypress="return isFloatNumber(this,event)" value="" name="data2[<?php echo $stateval['id'] ?>][fee]" type="text" />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div id="demo-dp-range">
                    					                                <div class="input-daterange input-group" id="datepicker">
                                                                            <input type="text" name="data2[<?php echo $stateval['id'] ?>][received]" id="data2[<?php echo $stateval['id'] ?>][received]" value="" class="form-control" />
                    					                                </div>
                    					                            </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="data2[<?php echo $stateval['id'] ?>][terminated]" id="data2[<?php echo $stateval['id'] ?>][terminated]" value="" class="form-control" />
                					                                </div>
                					                              </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <input class="form-control" value="" name="data2[<?php echo $stateval['id'] ?>][reason]" id="data2[<?php echo $stateval['id'] ?>][reason]" type="text" />
                                                               </div>
                                                            </div>
                                                        </div></div>
                                                        <?php } }?>
                                                        </div>
                                                    <div class="panel-overlay">
                                                        <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                                    </div>
                                                            <input type="hidden" name="id"  value="<?php echo $id; ?>" />
                                        				
                                                </div>
                                            </div>
                                     </div>
                                     <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="licences" && $_GET['sub_tab'] == "ria"){ echo "active"; } ?>" id="tab_ria">
                                       
                                            <div class="panel-overlay-wrap">
                                                <div class="panel">
                                                   <div class="panel-heading">
                                                         <?php if(isset($edit_licences_ria) && !empty($edit_licences_ria)) {foreach($edit_licences_ria as $key=>$val)
                                                        {   $row1 = $val['waive_home_state_fee'];  }  } ?>
                                                        <h4 class="panel-title" style="font-size: 20px;"><input type="checkbox" value="1" <?php if(isset($_GET['action'])&&$_GET['action']=='edit'&& (isset($row1) && $row1==1 )){ ?>checked="true"<?php } ?>  class="checkbox" name="pass_through"  style="display: inline !important;"/> Waive Home State Fee</h4>
                                                    </div>
                                                    <input type="hidden" name="type" value="3"/>
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
                                                        <?php if(isset($_GET['action']) && $_GET['action']=='edit' && !empty($edit_licences_ria)){
                                                                foreach($edit_licences_ria as $key=>$val){ 
                                                             foreach($get_state_new as $statekey=>$stateval) { if($val['state_id']== $stateval['id']) {?>
                                                        <div class="panel" style="border: 1px solid #cccccc !important; padding: 10px !important;">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input type="checkbox" name="data3[<?php echo $stateval['id'] ?>][active_check]" <?php if($val['active_check']==1){ ?>checked="true"<?php }?> value="1" id="data3[<?php echo $stateval['id'] ?>][active_check]" class="checkbox"  />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                        <label><?php echo $stateval['name']; ?></label>
                                                                    
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input class="form-control charge" onkeypress="return isFloatNumber(this,event)" value="<?php echo $val['fee'] ?>" name="data3[<?php echo $stateval['id'] ?>][fee]" type="text" />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div id="demo-dp-range">
                    					                                <div class="input-daterange input-group" id="datepicker">
                                                                            <input type="text" name="data3[<?php echo $stateval['id'] ?>][received]" id="data3[<?php echo $stateval['id'] ?>][received]" value="<?php echo $val['received'] ?>" class="form-control" />
                    					                                </div>
                    					                            </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="data3[<?php echo $stateval['id'] ?>][terminated]" id="data3[<?php echo $stateval['id'] ?>][terminated]" value="<?php echo $val['terminated'] ?>" class="form-control" />
                					                                </div>
                					                              </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <input class="form-control" value="<?php echo $val['reson'] ?>" name="data3[<?php echo $stateval['id'] ?>][reason]" id="data3[<?php echo $stateval['id'] ?>][reason]" type="text" />
                                                               </div>
                                                            </div>
                                                        </div></div>
                                                        <?php } } }  } else{?>
                                                        <?php foreach($get_state_new as $statekey=>$stateval){?>
                                                        <div class="panel" style="border: 1px solid #cccccc !important; padding: 10px !important;">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input type="checkbox" name="data3[<?php echo $stateval['id'] ?>][active_check]" value="1" id="data3[<?php echo $stateval['id'] ?>][active_check]" class="checkbox"  />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                        <label><?php echo $stateval['name']; ?></label>
                                                                    
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <input class="form-control charge" onkeypress="return isFloatNumber(this,event)" value="" name="data3[<?php echo $stateval['id'] ?>][fee]" type="text" />
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div id="demo-dp-range">
                    					                                <div class="input-daterange input-group" id="datepicker">
                                                                            <input type="text" name="data3[<?php echo $stateval['id'] ?>][received]" id="data3[<?php echo $stateval['id'] ?>][received]" value="" class="form-control" />
                    					                                </div>
                    					                            </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                  <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="data3[<?php echo $stateval['id'] ?>][terminated]" id="data3[<?php echo $stateval['id'] ?>][terminated]" value="" class="form-control" />
                					                                </div>
                					                              </div>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <input class="form-control" value="" name="data3[<?php echo $stateval['id'] ?>][reason]" id="data3[<?php echo $stateval['id'] ?>][reason]" type="text" />
                                                               </div>
                                                            </div>
                                                        </div></div>
                                                        <?php } } ?>
                                                        
                                                        </div>
                                                    <div class="panel-overlay">
                                                        <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                                    </div>
                                                            <input type="hidden" name="id"  value="<?php echo $id; ?>" />
                                        					
                                                </div>
                                            </div>      
                                     </div>
                                </div>
                            </div>
                        </div>
                 </div>
                 <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="registers"){ echo "active"; } ?>" id="tab_e">
                 <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
                        <div class="panel-overlay-wrap">
                            <div class="panel">
                                <div class="panel-heading">
                                   
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
                                                    <?php 
                                                    if(isset($_GET['action']) && $_GET['action']=='edit' && !empty($edit_registers)){
                                                    foreach($get_register as $regkey=>$regval){
                                                        foreach($edit_registers as $key=>$val){ 
                                                            if($regval['id'] == $val['license_id']) {
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $regval['id'];?></a></td>
                                                            <td><?php echo $regval['type'];?></td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="data4[<?php echo $regval['id'];?>][approval_date]"  value="<?php echo $val['approval_date'];?>" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="data4[<?php echo $regval['id'];?>][expiration_date]" value="<?php echo $val['expiration_date'];?>" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="<?php echo $val['reason'];?>" name="data4[<?php echo $regval['id'];?>][register_reason]"  type="text" /></td>
                                                            <input type="hidden" name="data4[<?php echo $regval['id'];?>][type]" value="<?php echo $regval['type'];?>"/>
                                                        </tr>
                                                        <?php } } } } else{ ?>
                                                    <?php foreach($get_register as $regkey=>$regval){?>
                                                        <tr>
                                                            <td><?php echo $regval['id'];?></a></td>
                                                            <td><?php echo $regval['type'];?></td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="data4[<?php echo $regval['id'];?>][approval_date]"  value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="data4[<?php echo $regval['id'];?>][expiration_date]" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td><input class="form-control" value="" name="data4[<?php echo $regval['id'];?>][register_reason]"  type="text" /></td>
                                                            <input type="hidden" name="data4[<?php echo $regval['id'];?>][type]" value="<?php echo $regval['type']; ?>"/>
                                                        </tr>
                                                        <?php } } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                   </div>
                                </div>
                                <div class="panel-overlay">
                                    <div class="panel-overlay-content pad-all unselectable"><span class="panel-overlay-icon text-dark"><i class="demo-psi-repeat-2 spin-anim icon-2x"></i></span><h4 class="panel-overlay-title"></h4><p></p></div>
                                </div>
                                        <input type="hidden" name="id"  value="<?php echo $id; ?>" />
                            </div>
                        </div>
                 </div>
                 <div class="tab-pane <?php if(isset($_GET['tab'])&&$_GET['tab']=="required_docs"){ echo "active"; } ?>" id="tab_f">
                 <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
                        <div class="panel-overlay-wrap">
                            <div class="panel">
                                <div class="panel-heading">
                                    
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
                                                        
                                                        <?php $doc_id=0; //echo '<pre>';print_r($edit_required_docs);
                                                        if(isset($_GET['action']) && $_GET['action']=='edit' && isset($edit_required_docs) ){  
                                                        foreach($edit_required_docs as $key=>$val){ $doc_id=$val['id'];?>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" name="data[docs_receive][<?php echo $key;?>]" <?php if($val['received']==1){ ?>checked="true"<?php } ?> value="1" class="checkbox" id="docs_receive"/>
                                                                </td>
                                                                <td><input class="form-control" value="<?php echo $val['description']?>" name="data[docs_description][<?php echo $key;?>]" id="docs_description" type="text" /></td>
                                                                <td>
                                                                    <div id="demo-dp-range">
                    					                                <div class="input-daterange input-group" id="datepicker">
                                                                            <input type="text" name="data[docs_date][<?php echo $key;?>]" id="docs_date" value="<?php echo $val['date']?>" class="form-control" />
                    					                                </div>
                 					                                </div>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="data[docs_required][<?php echo $key;?>]" <?php if($val['required']==1){ ?>checked="true"<?php } ?> class="checkbox" value="1" id="docs_required"/>
                                                                </td>
                                                                <td>
                                                                    <button type="button" tabindex="-1" class="btn remove-row btn-icon btn-circle"><i class="fa fa-minus"></i></button>
                                                                </td>
                                                            </tr>
                                                      <?php } } $doc_id++; ?>
                                                      <tr id="add_row_docs">
                                                            <td>
                                                                <input type="checkbox" value="1" name="data[docs_receive][<?php echo $doc_id;?>]" class="checkbox" id="docs_receive"/>
                                                            </td>
                                                            <td><input class="form-control" value="" name="data[docs_description][<?php echo $doc_id;?>]" id="docs_description" type="text" /></td>
                                                            <td>
                                                                <div id="demo-dp-range">
                					                                <div class="input-daterange input-group" id="datepicker">
                                                                        <input type="text" name="data[docs_date][<?php echo $doc_id;?>]" id="docs_date" value="" class="form-control" />
                					                                </div>
             					                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" name="data[docs_required][<?php echo $doc_id;?>]" value="1" class="checkbox" id="docs_required"/>
                                                            </td>
                                                            <td>
                                                                <button type="button" onclick="addMoreDocs(<?php echo $doc_id; ?>);" class="btn btn-purple btn-icon btn-circle"><i class="fa fa-plus"></i></button>
                                                            </td>
                                                        </tr>
                                                  </tbody>
                                                </table>
                                            </div>
                                        </div>
                                                <input type="hidden" name="id"  value="<?php echo $id; ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>
                 </div>
              </div>
              <div class="panel-footer">
                    <div class="selectwrap">
                         <?php if($action=='edit' && $id>0){?><a href="<?php echo CURRENT_PAGE; ?>?id=<?php echo $id;?>&send=previous" class="previous next_previous_a" style="float: left;"><input type="button" name="previous" value="&laquo; Previous" /></a><?php } ?>
                         <?php if($action=='edit' && $id>0){?>
                            <a href="#view_changes" data-toggle="modal"><input type="button" name="view_changes" value="View Changes" style="margin-left: 12% !important;"/></a>
                         <?php } ?>
                         <a href="#broker_notes" data-toggle="modal"><input type="button" onclick="get_broker_notes();" name="notes" value="Notes" /></a>
                         <a href="#client_transactions" data-toggle="modal"><input type="button" name="transactions" value="Transactions" /></a>
                         <a href="#broker_attach" data-toggle="modal"><input type="button"  onclick="get_broker_attach();" name="attach" value="Attachments" /></a>
                         <input type="submit" name="submit" onclick="waitingDialog.show();" value="Save"/>	
                         <a href="<?php echo CURRENT_PAGE;?>"><input type="button" name="cancel" value="Cancel" /></a>
                         <?php if($action=='edit' && $id>0){?><a href="<?php echo CURRENT_PAGE; ?>?id=<?php echo $id;?>&send=next" class="next next_previous_a" style="float: right;"><input type="button" name="next" value="Next &raquo;" /></a><?php } ?>
                    </div>
                 </div>   
            </form>
                 <?php } ?>
                <!-- Lightbox strart -->							
        	<!-- Modal for add client notes -->
        	<div id="broker_notes" class="modal fade inputpopupwrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        		<div class="modal-dialog">
        		<div class="modal-content">
        		<div class="modal-header" style="margin-bottom: 0px !important;">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        			<h4 class="modal-title">Branch's Notes</h4>
        		</div>
        		<div class="modal-body">
                
                <div class="inputpopup">
                    <a class="btn btn-sm btn-success" style="float: right !important; margin-right: 5px !important;" onclick="open_newnotes();"><i class="fa fa-plus"></i> Add New</a></li>
        		</div>
                
                <div class="col-md-12">
                    <div id="msg_notes">
                    </div>
                </div>
               
                <div class="inputpopup">
                    <div class="table-responsive" id="ajax_notes" style="margin: 0px 5px 0px 5px;">
                        
                    </div>
        		</div>
                </div><!-- End of Modal body -->
        		</div><!-- End of Modal content -->
        		</div><!-- End of Modal dialog -->
        </div><!-- End of Modal -->
            <!-- Lightbox strart -->	
        <!-- Lightbox strart -->							
        	<!-- Modal for add client notes -->
        	<div id="broker_attach" class="modal fade inputpopupwrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        		<div class="modal-dialog">
        		<div class="modal-content">
        		<div class="modal-header" style="margin-bottom: 0px !important;">
        			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        			<h4 class="modal-title">Broker's Attach</h4>
        		</div>
        		<div class="modal-body">
                
                <div class="inputpopup">
                    <a class="btn btn-sm btn-success" style="float: right !important; margin-right: 5px !important;" onclick="open_newattach();"><i class="fa fa-plus"></i> Add New</a></li>
        		</div>
                
                <div class="col-md-12">
                    <div id="msg_attach">
                    </div>
                </div>
               
                <div class="inputpopup">
                    <div class="table-responsive" id="ajax_attach" style="margin: 0px 5px 0px 5px;">
                        
                    </div>
        		</div>
                </div><!-- End of Modal body -->
        		</div><!-- End of Modal content -->
        		</div><!-- End of Modal dialog -->
        </div><!-- End of Modal -->						
        <!-- Modal for view changes list -->
        <div id="view_changes" class="modal fade inputpopupwrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        	<div class="modal-dialog">
        	<div class="modal-content">
        	<div class="modal-header" style="margin-bottom: 0px !important;">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        		<h4 class="modal-title">View Changes</h4>
        	</div>
        	<div class="modal-body">
            <form method="post">
            <div class="inputpopup">
                <div class="table-responsive" id="table-scroll" style="margin: 0px 5px 0px 5px;">
                    <table class="table table-bordered table-stripped table-hover">
                        <thead>
                            <th>#NO</th>
                            <th>User Initials</th>
                            <th>Date of Change</th>
                            <th>Field Changed</th>
                            <th>Previous Value</th>
                            <th>New Value</th>
                        </thead>
                        <tbody>
                        <?php 
                        $count = 0;
                        $feild_name='';
                        $lable_array = array();
                        $lable_array = array('first_name' => 'First Name','last_name' => 'Last Name','middle_name' => 'Middle Name','suffix' => 'Suffix','fund' => 'Fund/Clear','internal' => 'Internal','ssn' => 'SSN','tax_id' => 'Tax Id','crd' => 'CRD','active_status' => 'Active status','branch_manager' => 'Branch Manager','pay_method' => 'Pay Method',
                        
                        'home' => 'Home/Business','address1' => 'Address 1','address2' => 'Address 2','city' => 'City','state_id' => 'State','zip_code' => 'Zip code','telephone' => 'Telephone','cell' => 'Cell','fax' => 'Fax','gender' => 'Gender','marital_status' => 'Status','spouse' => 'Spouse','children' => 'Children','email1' => 'Email 1','email2' => 'Email 2','web_id' => 'Web ID','web_password' => 'Web Password','dob' => 'DOB','prospect_date' => 'Prospect Date','reassign_broker' => 'Reassign Broker','u4' => 'U4','u5' => 'U5/Termination Date','dba_name' => 'DBA Name','eft_information' => 'EFT Information','start_date' => 'Start Date','transaction_type' => 'Transaction Type','routing' => 'Routing','account_no' => 'Account No','cfp' => 'CFP','chfp' => 'ChFP','cpa' => 'CPA','clu' => 'CLU','cfa' => 'CFA','ria' => 'RIA','insurance' => 'Insurance'
                        
                        ,'waive_home_state_fee' => 'Waive Home State Fee','product_category' => 'Product Category','state_id' => 'State','active_check' => 'Active','fee' => 'Fee','received' => 'Received','terminated' => 'Terminated','reson' => 'Reason','	license_name' => 'License Name / Description','approval_date' => 'Approval Date','expiration_date' => 'Expiration Date','reason' => 'Reason');
                        
                        foreach($broker_data as $key=>$val){
                            
                            if(isset($lable_array[$val['field']])){
                                $feild_name = $lable_array[$val['field']];
                            }else {
                                $feild_name = $val['field'];
                            }?>
                            <tr>
                            
                                <td><?php echo ++$count; ?></td>
                                <td><?php echo $val['user_initial'];?></td>
                                <td><?php echo date('m/d/Y',strtotime($val['modified_time']));?></td>
                                <?php if (is_numeric($feild_name))
                                {
                                    $getfull_name = $instance->get_charges_name($feild_name);
                                ?>
                                    <td><?php echo ($getfull_name['charge_type'].'('.$getfull_name['charge_name'].')');;?></td>
                                <?php }
                                else{?>
                                <td><?php echo $feild_name;?></td>
                                <?php } ?>
                               <?php if($feild_name == 'EFT Information'){?>
                                <td>
                                <?php 
                                if($val['old_value'] == 1)
                                {
                                    echo 'Pre-Notes';
                                }
                                else if($val['old_value'] == 2)
                                {
                                    echo 'Direct Deposit';
                                }
                                ?>
                                </td>
                                <td>
                                <?php 
                                if($val['new_value'] == 1)
                                {
                                    echo 'Pre-Notes';
                                }
                                else if($val['new_value'] == 2)
                                {
                                    echo 'Direct Deposit';
                                }
                                ?>
                                </td>
                                <?php }
                                else if($feild_name == 'Pay Method'){?>
                                    <td>
                                    <?php 
                                    if($val['old_value'] == 1)
                                    {
                                        echo 'ACH';
                                    }
                                    else if($val['old_value'] == 2)
                                    {
                                        echo 'Check';
                                    }
                                    ?>
                                    </td>
                                    <td>
                                    <?php 
                                    if($val['new_value'] == 1)
                                    {
                                        echo 'ACH';
                                    }
                                    else if($val['new_value'] == 2)
                                    {
                                        echo 'Check';
                                    }
                                    ?>
                                    </td>
                                    <?php }
                                else if($feild_name == 'Active status'){?>
                                    <td>
                                    <?php 
                                    if($val['old_value'] == 1)
                                    {
                                        echo 'Active';
                                    }
                                    else if($val['old_value'] == 2)
                                    {
                                        echo 'Terminated';
                                    }
                                    else if($val['old_value'] == 3)
                                    {
                                        echo 'Retired';
                                    }
                                    else if($val['old_value'] == 4)
                                    {
                                        echo 'Deceased';
                                    }
                                    ?>
                                    </td>
                                    <td>
                                    <?php 
                                    if($val['new_value'] == 1)
                                    {
                                        echo 'Active';
                                    }
                                    else if($val['new_value'] == 2)
                                    {
                                        echo 'Terminated';
                                    }
                                    else if($val['new_value'] == 3)
                                    {
                                        echo 'Retired';
                                    }
                                    else if($val['new_value'] == 4)
                                    {
                                        echo 'Deceased';
                                    }
                                    ?>
                                    </td>
                                    <?php }
                                else if($feild_name == 'Home/Business'){?>
                                    <td>
                                    <?php 
                                    if($val['old_value'] == 1)
                                    {
                                        echo 'Home';
                                    }
                                    else if($val['old_value'] == 2)
                                    {
                                        echo 'Business';
                                    }
                                    ?>
                                    </td>
                                    <td>
                                    <?php 
                                    if($val['new_value'] == 1)
                                    {
                                        echo 'Home';
                                    }
                                    else if($val['new_value'] == 2)
                                    {
                                        echo 'Business';
                                    }
                                    ?>
                                    </td>
                                    <?php }
                                else if($feild_name == 'Gender'){?>
                                    <td>
                                    <?php 
                                    if($val['old_value'] == 1)
                                    {
                                        echo 'Male';
                                    }
                                    else if($val['old_value'] == 2)
                                    {
                                        echo 'Female';
                                    }
                                    else if($val['old_value'] == 3)
                                    {
                                        echo 'Other';
                                    }
                                    ?>
                                    </td>
                                    <td>
                                    <?php 
                                    if($val['new_value'] == 1)
                                    {
                                        echo 'Male';
                                    }
                                    else if($val['new_value'] == 2)
                                    {
                                        echo 'Female';
                                    }
                                    else if($val['new_value'] == 3)
                                    {
                                        echo 'Other';
                                    }
                                    ?>
                                    </td>
                                    <?php }
                                else if($feild_name == 'Status'){?>
                                    <td>
                                    <?php 
                                    if($val['old_value'] == 1)
                                    {
                                        echo 'Single';
                                    }
                                    else if($val['old_value'] == 2)
                                    {
                                        echo 'Married';
                                    }
                                    else if($val['old_value'] == 3)
                                    {
                                        echo 'Divorced';
                                    }
                                    else if($val['old_value'] == 4)
                                    {
                                        echo 'Widowed';
                                    }
                                    ?>
                                    </td>
                                    <td>
                                    <?php 
                                    if($val['new_value'] == 1)
                                    {
                                        echo 'Single';
                                    }
                                    else if($val['new_value'] == 2)
                                    {
                                        echo 'Married';
                                    }
                                    else if($val['new_value'] == 3)
                                    {
                                        echo 'Divorced';
                                    }
                                    else if($val['new_value'] == 4)
                                    {
                                        echo 'Widowed';
                                    }
                                    ?>
                                    </td>
                                    <?php }
                                else if($feild_name == 'Transaction Type'){?>
                                <td>
                                <?php 
                                if($val['old_value'] == 1)
                                {
                                    echo 'Checking';
                                }
                                else if($val['old_value'] == 2)
                                {
                                    echo 'Savings';
                                }
                                ?>
                                </td>
                                <td>
                                <?php 
                                if($val['new_value'] == 1)
                                {
                                    echo 'Checking';
                                }
                                else if($val['new_value'] == 2)
                                {
                                    echo 'Savings';
                                }
                                ?>
                                </td>
                                <?php }
                                else if($feild_name == 'CFP' && $val['old_value'] == 0){?>
                                <td><?php echo 'UnChecked';?></td>
                                <td><?php echo 'Checked';?></td>
                                <?php } 
                                else if($feild_name == 'CFP' && $val['old_value'] == 1){?>
                                <td><?php echo 'Checked';?></td>
                                <td><?php echo 'UnChecked';?></td>
                                <?php }
                                else if($feild_name == 'ChFP' && $val['old_value'] == 0){?>
                                <td><?php echo 'UnChecked';?></td>
                                <td><?php echo 'Checked';?></td>
                                <?php } 
                                else if($feild_name == 'ChFP' && $val['old_value'] == 1){?>
                                <td><?php echo 'Checked';?></td>
                                <td><?php echo 'UnChecked';?></td>
                                <?php }
                                else if($feild_name == 'CPA' && $val['old_value'] == 0){?>
                                <td><?php echo 'UnChecked';?></td>
                                <td><?php echo 'Checked';?></td>
                                <?php } 
                                else if($feild_name == 'CPA' && $val['old_value'] == 1){?>
                                <td><?php echo 'Checked';?></td>
                                <td><?php echo 'UnChecked';?></td>
                                <?php }
                                else if($feild_name == 'CLU' && $val['old_value'] == 0){?>
                                <td><?php echo 'UnChecked';?></td>
                                <td><?php echo 'Checked';?></td>
                                <?php } 
                                else if($feild_name == 'CLU' && $val['old_value'] == 1){?>
                                <td><?php echo 'Checked';?></td>
                                <td><?php echo 'UnChecked';?></td>
                                <?php }
                                else if($feild_name == 'CFA' && $val['old_value'] == 0){?>
                                <td><?php echo 'UnChecked';?></td>
                                <td><?php echo 'Checked';?></td>
                                <?php } 
                                else if($feild_name == 'CFA' && $val['old_value'] == 1){?>
                                <td><?php echo 'Checked';?></td>
                                <td><?php echo 'UnChecked';?></td>
                                <?php }
                                else if($feild_name == 'RIA' && $val['old_value'] == 0){?>
                                <td><?php echo 'UnChecked';?></td>
                                <td><?php echo 'Checked';?></td>
                                <?php } 
                                else if($feild_name == 'RIA' && $val['old_value'] == 1){?>
                                <td><?php echo 'Checked';?></td>
                                <td><?php echo 'UnChecked';?></td>
                                <?php }
                                else if($feild_name == 'Insurance' && $val['old_value'] == 0){?>
                                <td><?php echo 'UnChecked';?></td>
                                <td><?php echo 'Checked';?></td>
                                <?php } 
                                else if($feild_name == 'Insurance' && $val['old_value'] == 1){?>
                                <td><?php echo 'Checked';?></td>
                                <td><?php echo 'UnChecked';?></td>
                                <?php }
                                else if($feild_name == 'Branch Manager' && $val['old_value'] == 0){?>
                                <td><?php echo 'UnChecked';?></td>
                                <td><?php echo 'Checked';?></td>
                                <?php } 
                                else if($feild_name == 'Branch Manager' && $val['old_value'] == 1){?>
                                <td><?php echo 'Checked';?></td>
                                <td><?php echo 'UnChecked';?></td>
                                <?php }
                                else if($feild_name == 'Active' && $val['old_value'] == 0){?>
                                <td><?php echo 'UnChecked';?></td>
                                <td><?php echo 'Checked';?></td>
                                <?php } 
                                else if($feild_name == 'Active' && $val['old_value'] == 1){?>
                                <td><?php echo 'Checked';?></td>
                                <td><?php echo 'UnChecked';?></td>
                                <?php }
                                else if($feild_name == 'Waive Home State Fee' && $val['old_value'] == 0){?>
                                <td><?php echo 'UnChecked';?></td>
                                <td><?php echo 'Checked';?></td>
                                <?php } 
                                else if($feild_name == 'Waive Home State Fee' && $val['old_value'] == 1){?>
                                <td><?php echo 'Checked';?></td>
                                <td><?php echo 'UnChecked';?></td>
                                <?php }
                                else if($feild_name == 'State'){
                                if($val['old_value']>0){
                                $state = $instance->get_state_name($val['old_value']);?>
                                <td><?php echo $state['state_name'];?></td>
                                <?php } if($val['new_value']>0){?>
                                <?php $state = $instance->get_state_name($val['new_value']);?>
                                <td><?php echo $state['state_name'];?></td>
                                <?php } }
                                else if($feild_name == 'Product Category'){
                                    if($val['old_value']>0){
                                    $product_category_name = $instance->get_product_category_name($val['old_value']);?>
                                    <td><?php echo $product_category_name['product_type'];?></td>
                                    <?php }
                                    else {?><td><?php echo '-';?></td>
                                
                                    <?php }
                                    if($val['new_value']>0){?>
                                    <?php $product_category_name = $instance->get_product_category_name($val['new_value']);?>
                                    <td><?php echo $product_category_name['product_type'];?></td>
                                    <?php }
                                    else{?><td><?php echo '-';?></td>
                                    <?php }} else {?>
                                <td><?php echo $val['old_value'];?></td>
                                <td><?php echo $val['new_value'];?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
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
			<!-- Modal for transaction list -->
			<div id="client_transactions" class="modal fade inputpopupwrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header" style="margin-bottom: 0px !important;">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">Client's Transactions</h4>
				</div>
				<div class="modal-body">
                <form method="post">
                <div class="inputpopup">
                    <div class="table-responsive" id="table-scroll" style="margin: 0px 5px 0px 5px;">
                        <table class="table table-bordered table-stripped table-hover">
                            <thead>
                                <th>#NO</th>
                                <th>Trade No</th>
                                <th>Date</th>
                                <th>Product</th>
                                <th>Client No</th>
                                <th>Trade Amount</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>30</td>
                                    <td>28/11/2017</td>
                                    <td>Electronics</td>
                                    <td>20</td>
                                    <td>$200</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>30</td>
                                    <td>28/11/2017</td>
                                    <td>Mobile accessories</td>
                                    <td>20</td>
                                    <td>$200</td>
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
			<!-- Modal for joint account -->
			
        <!-- Lightbox strart -->							
			<!-- Modal for add joint account -->
			<div id="add_joint_account" class="modal fade inputpopupwrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header" style="margin-bottom: 0px !important;">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
					<h4 class="modal-title">Add Joint Account</h4>
				</div>
				<div class="modal-body">
                <form method="post" id="add_new_note" name="add_new_note" onsubmit="return formsubmit_addnotes();">
                    <div class="inputpopup">
    					<label>Joint Name:<span>*</span></label>
                        <input type="text" name="joint_name" id="joint_name" class="form-control" />
    				</div>
                    <div class="inputpopup">
    					<label>SSN:<span>*</span></label>
                        <input type="text" name="ssn"  class="form-control" />
    				</div>
                    <div class="inputpopup">
    					<label>DOB:<span>*</span></label>
                        <input type="text" name="dob" id="dob" class="form-control" />
                    </div>
                    <div class="inputpopup">
    					<label>Income:<span>*</span></label>
                        <input type="text" name="income" id="income" class="form-control" />
    				</div>
                    <div class="inputpopup">
    					<label>Occupation:<span>*</span></label>
                        <input type="text" name="occupation" id="occupation" class="form-control" />
    				</div>
                    <div class="inputpopup">
    					<label>Position:<span>*</span></label>
                        <input type="text" name="position" id="position" class="form-control" />
    				</div>
                    <div class="inputpopup">
    					<label>Securities-Related Firm?:<span>*</span></label>
                        <input type="checkbox" name="security_related_firm" id="security_related_firm" class="checkbox" />
    				</div>
                    <div class="inputpopup">
    					<label>Employer:<span>*</span></label>
                        <input type="text" name="employer" id="employer" class="form-control" />
    				</div>
                    <div class="inputpopup">
    					<label>Emp. Address:<span>*</span></label>
                        <input type="text" name="employer_add" id="employer_add" class="form-control" />
    				</div>
    				<div class="col-md-12">
                        <div id="msg">
                        </div>
                    </div>
                   	<div class="inputpopup">
    				<label class="labelblank">&nbsp;</label>
                        <input type="hidden" name="submit" value="Ok" />
    					<input type="submit" onclick="waitingDialog.show();" value="Ok" name="submit" />
    				</div>
				</form>					
                
				</div><!-- End of Modal body -->
				</div><!-- End of Modal content -->
			</div><!-- End of Modal dialog -->
		</div><!-- End of Modal -->
        
          </div>
                                <br />
   </div>
</div>

<script>
/*function addMoreDocs(){
    var html = '<div class="row">'+
                    '<div class="col-md-4">'+
                        '<div class="form-group">'+
                            '<label></label><br />'+
                            '<input type="text" name="account_no[]" id="account_no" class="form-control" />'+
                        '</div>'+
                    '</div>'+
                    
                    '<div class="col-md-4">'+
                        '<div class="form-group">'+
                            '<label></label><br />'+
                            '<select class="form-control" name="sponsor[]">'+
                            '<option value="">Select Sponsor</option>'+
                            <?php foreach($get_sponsor as $key=>$val){?>
                            '<option value="<?php echo $val['id'];?>" <?php if($sponsor_company != '' && $sponsor_company==$val['id']){echo "selected='selected'";} ?>><?php echo $val['name'];?></option>'+
                            <?php } ?>
                            '</select>'+
                        '</div>'+
                        /*'<div class="form-group">'+
                            '<label></label><br />'+
                            '<input type="text" name="company" id="company" class="form-control" />'+
                        '</div>'+*/
                    /*'</div>'+
                    '<div class="col-md-2">'+
                        '<div class="form-group">'+
                            '<label></label><br />'+
                            '<button type="button" tabindex="-1" class="btn remove-row btn-icon btn-circle"><i class="fa fa-minus"></i></button>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                
            
    $(html).insertAfter('#account_no_row');
}
$(document).on('click','.remove-row',function(){
    $(this).closest('.row').remove();
});*/
</script>
<script>
function open_newnotes()
{
    document.getElementById("add_row_notes").style.display = "";
}
function open_newattach()
{
    document.getElementById("add_row_attach").style.display = "";
}
</script>
<script>
function get_broker_attach(){
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById("ajax_attach").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ajax_broker_attach.php", true);
        xmlhttp.send();
}
function get_broker_notes(){
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById("ajax_notes").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ajax_broker_notes.php", true);
        xmlhttp.send();
}
function openedit(note_id){
    
    var frm_element = document.getElementById("add_client_notes_"+note_id);
    //var ele = frm_element.getElementById("client_note");
    name = frm_element.elements["client_note"].removeAttribute("style"); 
    //$(name).css('pointer-events','');
    console.log(name);
}
</script>
<script>
//submit share form data
function notessubmit(note_id)
{
   $('#msg').html('<div class="alert alert-info"><i class="fa fa-spinner fa-spin"></i> Please wait...</div>');

   var url = "manage_broker.php"; // the script where you handle the form input.
   //alert("#add_client_notes_"+note_id);
   $.ajax({
      type: "POST",
      url: url,
      data: $("#add_client_notes_"+note_id).serialize(), // serializes the form's elements.
      success: function(data){
          if(data=='1'){
            
            get_broker_notes();
            $('#msg_notes').html('<div class="alert alert-success alert-dismissable" style="opacity: 500;"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><strong>Success!</strong> Data Successfully Saved.</div>');  
          }
          else{
               $('#msg_notes').html('<div class="alert alert-danger">'+data+'</div>');
          }
          
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
           $('#msg_notes').html('<div class="alert alert-danger">Something went wrong, Please try again.</div>')
      }
      
   });
   return false;     
}
function attachsubmit(attach_id)
{ 
        var myForm = document.getElementById('add_client_attach_'+attach_id);
        form_data = new FormData(myForm);
        $.ajax({
            url: 'manage_broker.php',  
            
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(data){
                  if(data=='1'){
                    
                    get_broker_attach();
                    $('#msg_attach').html('<div class="alert alert-success alert-dismissable" style="opacity: 500;"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><strong>Success!</strong> Data Successfully Saved.</div>');
                       
                  }
                  else{
                       $('#msg_attach').html('<div class="alert alert-danger">'+data+'</div>');
                  } 
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                   $('#msg_attach').html('<div class="alert alert-danger">Something went wrong, Please try again.</div>')
              }
        });    
   return false; 
}
function delete_notes(note_id){
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = this.responseText;
                if(data=='1'){
                   get_broker_notes(); 
                   $('#msg_notes').html('<div class="alert alert-success alert-dismissable" style="opacity: 500;"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><strong>Success!</strong> Note deleted Successfully.</div>');
                   //get_client_notes();
                  
                  }
                  else{
                       $('#msg_notes').html('<div class="alert alert-danger">'+data+'</div>');
                  }
                
            }
        };
        xmlhttp.open("GET", "manage_broker.php?delete_action=delete_notes&note_id="+note_id, true);
        xmlhttp.send();
}
function delete_attach(attach_id){
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = this.responseText;
                if(data=='1'){
                   get_broker_attach(); 
                   $('#msg_attach').html('<div class="alert alert-success alert-dismissable" style="opacity: 500;"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><strong>Success!</strong> Attach deleted Successfully.</div>');
                  }
                  else{
                       $('#msg_attach').html('<div class="alert alert-danger">'+data+'</div>');
                  }
            }
        };
        xmlhttp.open("GET", "manage_broker.php?delete_action=delete_attach&attach_id="+attach_id, true);
        xmlhttp.send();
}
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
function chech(){
    var ro=document.getElementById('routing_general').value;
    if (ro != '' && ro.length < 9)
    {
        alert("Enter nine digits.");
        document.getElementById('routing_general').value='';
    return false;
    }
}
(function($) {
$.fn.chargeFormat = function() {
    this.each( function( i ) {
        $(this).change( function( e ){
            if( isNaN( parseFloat( this.value ) ) ) return;
            this.value = parseFloat(this.value).toFixed(2);
        });
    });
    return this; //for chaining
}
})( jQuery );


$( function() {
$('.charge').chargeFormat();
});
</script>
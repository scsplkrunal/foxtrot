<div class="container">
    <h1>Transactions</h1> <div class="col-lg-12 well">
    <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
   
    
        <?php  
    
    if((isset($_GET['action']) && $_GET['action']=='add') || (isset($_GET['action']) && ($_GET['action']=='edit' && $id>0))){
        ?>
        <form name="frm2" method="POST">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group"><br /><div class="selectwrap">
                        <input type="submit" name="transaction" onclick="waitingDialog.show();" value="Save"/>	
                        <a href="<?php echo CURRENT_PAGE.'?action=view';?>"><input type="button" name="cancel" value="Cancel" /></a>
                    </div>
                 </div>
                 </div>
             </div> 
        <div class="panel">            
        
            <div class="panel-footer">
                <div class="selectwrap" style="float: right;">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
                </div>
           </div>
            <div class="panel-heading">
                <div class="panel-control" style="float: right;">
    				<div class="btn-group dropdown">
    					<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
    					<ul class="dropdown-menu dropdown-menu-right" style="">
    						<li><a href="<?php echo CURRENT_PAGE; ?>?action=view"><i class="fa fa-eye"></i> View List</a></li>
    					</ul>
    				</div>
    			</div>
                <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i><?php echo $action=='add'?'Add':'Edit'; ?> Transactions</h3>
    		</div>
            <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Client <span class="text-red">*</span></label><br />
                        <select class="form-control" name="client_name">
                            <option value="0">Select Client</option>
                            <?php foreach($get_client as $key=>$val){?>
                            <option value="<?php echo $val['id'];?>" <?php if(isset($pro_category) && $pro_category==$val['id']){ ?>selected="true"<?php } ?>><?php echo $val['first_name'].' '.$val['mi'].' '.$val['last_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Client Number <span class="text-red">*</span></label><br />
                        <input type="text" maxlength="26" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="client_number"  value="<?php if(isset($batch_number)) {echo $batch_number;}?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Broker Name <span class="text-red">*</span></label><br />
                        <select class="form-control" name="broker_name">
                            <option value="0">Select Broker</option>
                            <?php foreach($get_broker as $key=>$val){?>
                            <option value="<?php echo $val['id'];?>" <?php if(isset($pro_category) && $pro_category==$val['id']){ ?>selected="true"<?php } ?>><?php echo $val['first_name'].' '.$val['middle_name'].' '.$val['last_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Category <span class="text-red">*</span></label><br />
                        <select class="form-control" name="product_cate" onchange="get_product(this.value);">
                            <option value="0">Select Product category</option>
                             <?php foreach($product_category as $key=>$val){?>
                            <option value="<?php echo $val['id'];?>" <?php if(isset($sponsor) && $sponsor==$val['id']){?> selected="true"<?php } ?>><?php echo $val['type'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Sponsor </label><br />
                        <select class="form-control" name="sponsor">
                            <option value="0">Select Sponsor</option>
                             <?php foreach($get_sponsor as $key=>$val){?>
                            <option value="<?php echo $val['id'];?>" <?php if(isset($sponsor) && $sponsor==$val['id']){?> selected="true"<?php } ?>><?php echo $val['name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product <span class="text-red">*</span></label><br />
                        <select class="form-control" name="product"  id="product">
                            <option value="0">Select Product</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Batch <span class="text-red">*</span></label><br />
                        <select class="form-control" name="batch">
                            <option value="0">Select Sponsor</option>
                             <?php foreach($get_batch as $key=>$val){?>
                            <option value="<?php echo $val['id'];?>" <?php if(isset($sponsor) && $sponsor==$val['id']){?> selected="true"<?php } ?>><?php echo $val['batch_number'].' '.$val['batch_desc'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Investment Amount</label><br />
                        <div id="demo-dp-range">
                            <input type="text" maxlength="12" class="form-control" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 ' name="invest_amount"  value="<?php if(isset($batch_number)) {echo $batch_number;}?>"/>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Charge Amount </label><br />
                        <input type="text" maxlength="9" class="form-control" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 ' name="charge_amount"  value="<?php if(isset($batch_number)) {echo $batch_number;}?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Commission Received Amount <span class="text-red">*</span></label><br />
                        <input type="text" maxlength="12" class="form-control" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 ' name="commission_received"  value="<?php if(isset($batch_number)) {echo $batch_number;}?>"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Trade Date <span class="text-red">*</span></label><br />
                        <div id="demo-dp-range">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" name="trade_date" id="trade_date" value="<?php if(isset($batch_date)) {echo $batch_date;}?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Settlement Date <span class="text-red">*</span></label><br />
                        <div id="demo-dp-range">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" name="settlement_date" id="settlement_date" value="<?php if(isset($batch_date)) {echo $batch_date;}?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>*Split Commission<span class="text-red">*</span></label><br />
                        <label class="radio-inline">
                          <input type="radio" class="radio" onclick="open_other()" name="split" <?php if(isset($split) && $split==1){ echo'checked="true"'; }?>   value="1"/>YES
                        </label>
                        <label class="radio-inline">
                          <input type="radio" class="radio" onclick="close_other()" name="split" checked="true" value="2" />NO
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="other_div" class="form-group" <?php // if(isset($split) && $split!=1){?>style="display: none;<?php //} ?>">
                        <div class="form-group">
                            <label>Other <span class="text-red">*</span></label><br />
                            <input class="col-md-4" type="text" name="split_broker" />
                            <input class="col-md-4" type="text" name="split_rate"  placeholder="Enter split rate"  value="<?php if(isset($posted_amounts)) {echo $posted_amounts;}?>"/>
                            <input class="col-md-4" type="text" name="another_level"  placeholder="Another level add"  value="<?php if(isset($posted_amounts)) {echo $posted_amounts;}?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Cancel <span class="text-red">*</span></label><br />
                        <label class="radio-inline">
                          <input type="radio" class="radio" name="cancel"  value="1"/>YES
                        </label>
                        <label class="radio-inline">
                          <input type="radio" class="radio" name="cancel" checked="true" value="2" />NO
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Buy/Sell <span class="text-red">*</span></label><br />
                        <label class="radio-inline">
                          <input type="radio" class="radio"  name="buy_sell" checked="true" value="1"/>Buy    
                        </label>
                        <label class="radio-inline">
                          <input type="radio" class="radio" name="buy_sell"  value="2" />Sell
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hold Commission <span class="text-red">*</span></label><br />
                        <label class="radio-inline">
                          <input type="radio" class="radio"  name="hold_commission"  value="1"/>YES
                        </label>
                        <label class="radio-inline">
                          <input type="radio" class="radio" name="hold_commission" checked="true" value="2" />NO
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hold Reason </label><br />
                        <input type="text"  class="form-control" name="hold_resoan"  />
                    </div>
                </div>
            </div>
            
           </div>
           <div class="row">
                <div class="col-md-12">
                    <div class="form-group "><br /><div class="selectwrap">
                        <input type="submit" name="transaction" onclick="waitingDialog.show();" value="Save"/>	
                        <a href="<?php echo CURRENT_PAGE.'?action=view';?>"><input type="button" name="cancel" value="Cancel" /></a>
                    </div>
                 </div>
                 </div>
             </div></div>
        </form>
        <?php
            }if((isset($_GET['action']) && $_GET['action']=='view') || $action=='view'){?>
        <div class="panel">
    		<div class="panel-heading">
                <div class="panel-control">
                    <div class="btn-group dropdown" style="float: right;">
                        <button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
    					<ul class="dropdown-menu dropdown-menu-right" style="">
    						<li><a href="<?php echo CURRENT_PAGE; ?>?action=add"><i class="fa fa-plus"></i> Add New</a></li>
                            <li><a href="#"><i class="fa fa-minus"></i> Report</a></li> 
    					</ul>
    				</div>
    			</div>
            </div><br />
    		<div class="panel-body">
            <div class="panel-control" style="float: right;">
             <form method="post">
                <input type="text" name="search_text" id="search_text" value=""/>
                <button type="submit" name="search" id="submit" value="Search"><i class="fa fa-search"></i> Search</button>
            </form>
            </div><br /><br />
                <div class="table-responsive">
    			<table id="data-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
    	            <thead>
    	                <tr>
                            <th class="text-center">#NO</th>
                            <th>Trade Number</th>
                            <th>Trade Date</th>
                            <th>Settlement Date</th>
                            <th>Commission Received Date</th>
                            <th>Client Name</th>
                            <th>Client Account Number</th>
                            <th>Broker Name</th>
                            <th>Broker ID</th>
                            <th>Product Description</th>
                            <th>Product Category</th>
                            <th>Batch Number</th>
                            <th>Investment Amount</th>
                            <th>Charge amount</th>
                            <th>Commission Received</th>
                            <th>Buy/Sell</th>
                            <th>Hold Commission</th>
                            <th class="text-center">ACTION</th>
                        </tr>
    	            </thead>
    	            <tbody>
                    <?php /*
                    $count = 0;
                    foreach($return as $key=>$val){
                        ?>
    	                   <tr>
                                <td class="text-center"><?php echo ++$count; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <!--td class="text-center">
                                    <?php
                                        if($val['status']==1){
                                            ?>
                                            <a href="<?php echo CURRENT_PAGE; ?>?action=batches_status&id=<?php echo $val['id']; ?>&status=0" class="btn btn-sm btn-success"><i class="fa fa-check-square-o"></i> Enabled</a>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <a href="<?php echo CURRENT_PAGE; ?>?action=batches_status&id=<?php echo $val['id']; ?>&status=1" class="btn btn-sm btn-warning"><i class="fa fa-warning"></i> Disabled</a>
                                            <?php
                                        }
                                    ?>
                                </td-->
                                <td class="text-center">
                                    <a href="<?php echo CURRENT_PAGE; ?>?action=edit_batches&id=<?php echo $val['id']; ?>" class="btn btn-md btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                    <a onclick="return conf('<?php echo CURRENT_PAGE; ?>?action=batches_delete&id=<?php echo $val['id']; ?>');" class="btn btn-md btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                    <?php } */ ?>
                    </tbody>
                </table>
                </div>
    		</div>
    	</div>
        <?php } ?> 
    
    </div>
</div>

<script>
function get_product(id){
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById("product").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ajax_get_product.php?product_category_id="+id, true);
        xmlhttp.send();
}

function open_other()
{
    $('#other_div').css('display','block');
}
function close_other()
{
    $('#other_div').css('display','none');
}
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


$('#demo-dp-range .input-daterange').datepicker({
        format: "mm/dd/yyyy",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });
</script>
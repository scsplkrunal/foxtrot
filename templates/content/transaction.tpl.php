<script>
function addMoreRow(){
    var html = '<div class="row">'+
                    
                    '<div class="col-md-4">'+
                        '<div class="form-group">'+
                            '<select class="form-control" name="split_broker[]">'+
                            '<option value="">Select Broker</option>'+
                            <?php foreach($get_broker as $key=>$val){?>
                            '<option value="<?php echo $val['id'];?>" <?php if($split_broker != '' && $split_broker==$val['id']){echo "selected='selected'";} ?>><?php echo $val['first_name'].' '.$val['middle_name'].' '.$val['last_name'];?></option>'+
                            <?php } ?>
                            '</select>'+
                        '</div>'+
                        /*'<div class="form-group">'+
                            '<label></label><br />'+
                            '<input type="text" name="company" id="company" class="form-control" />'+
                        '</div>'+*/
                    '</div>'+
                    '<div class="col-md-4">'+
                        '<div class="input-group">'+
                            '<input type="text" name="split_rate[]" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="split_rate" class="form-control" />'+
                            '<span class="input-group-addon">%</span>'+
                        '</div>'+
                    '</div>'+
                    
                    '<div class="col-md-2">'+
                        '<div class="form-group">'+
                            '<button type="button" tabindex="-1" class="btn remove-row btn-icon btn-circle"><i class="fa fa-minus"></i></button>'+
                        '</div>'+
                    '</div>'+
                '</div>';
                
            
    $(html).insertAfter('#add_other_split');
}
$(document).on('click','.remove-row',function(){
    $(this).closest('.row').remove();
});
</script>
<div class="container">
<h1 class="<?php if($action=='add'||($action=='edit_transaction' && $id>0)){ echo 'topfixedtitle';}?>">Transactions</h1> 
    <div class="col-lg-12 well <?php if($action=='add'||($action=='edit_transaction' && $id>0)){ echo 'fixedwell';}?>">
    <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
   
    
        <?php  
    
    if((isset($_GET['action']) && $_GET['action']=='add') || (isset($_GET['action']) && ($_GET['action']=='edit_transaction' && $id>0))){ 
        
          //if((isset($_GET['action']) && ($_GET['action']=='edit_transaction')) || isset($product_cate)){ get_product($product_cate); }
        ?>
        <form name="frm2" method="POST" >
            <!--<div class="row">
                <div class="col-md-12">
                    <div class="form-group"><br /><div class="selectwrap">
                        <input type="submit" name="transaction" onclick="waitingDialog.show();" value="Save"/>	
                        <a href="<?php echo CURRENT_PAGE.'?action=view';?>"><input type="button" name="cancel" value="Cancel" /></a>
                    </div>
                 </div>
                 </div>
             </div> -->
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
                        <label>Trade Number </label><br />
                        <input type="text" name="trade_number" id="trade_number" value="<?php if(isset($trade_number)) {echo $trade_number;}else{echo '0';}?>" disabled="true" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Trade Date <span class="text-red">*</span></label><br />
                        <div id="demo-dp-range">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" name="trade_date" id="trade_date" value="<?php if(isset($trade_date)) {echo date('m/d/Y',strtotime($trade_date));}?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Settlement Date <span class="text-red">*</span></label><br />
                        <div id="demo-dp-range">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" name="settlement_date" id="settlement_date" value="<?php if(isset($settlement_date)) {echo date('m/d/Y',strtotime($settlement_date));}?>" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Client Name <span class="text-red">*</span></label><br />
                        <select class="form-control" name="client_name">
                            <option value="0">Select Client</option>
                            <?php foreach($get_client as $key=>$val){?>
                            <option value="<?php echo $val['id'];?>" <?php if(isset($client_name) && $client_name==$val['id']){ ?>selected="true"<?php } ?>><?php echo $val['first_name'].' '.$val['mi'].' '.$val['last_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Client Number <span class="text-red">*</span></label><br />
                        <input type="text" maxlength="26" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="client_number"  value="<?php if(isset($client_number)) {echo $client_number;}?>"/>
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
                            <option value="<?php echo $val['id'];?>" <?php if(isset($broker_name) && $broker_name==$val['id']){ ?>selected="true"<?php } ?>><?php echo $val['first_name'].' '.$val['middle_name'].' '.$val['last_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Category <span class="text-red">*</span></label><br />
                        <select class="form-control" name="product_cate"  onchange="get_product(this.value);">
                            <option value="0">Select Product category</option>
                             <?php foreach($product_category as $key=>$val){?>
                            <option value="<?php echo $val['id'];?>" <?php if(isset($product_cate) && $product_cate==$val['id']){?> selected="true"<?php } ?>><?php echo $val['type'];?></option>
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
                            <option value="0">Select Batch</option>
                             <?php foreach($get_batch as $key=>$val){?>
                            <option value="<?php echo $val['id'];?>" <?php if(isset($batch) && $batch==$val['id']){?> selected="true"<?php } ?>><?php echo $val['id'].' '.$val['batch_desc'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Investment Amount</label><br />
                        <div id="demo-dp-range">
                            <input type="text" maxlength="12" class="form-control" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 ' name="invest_amount"  value="<?php if(isset($invest_amount)) {echo $invest_amount;}?>"/>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Commission Received Amount <span class="text-red">*</span></label><br />
                        <input type="text" maxlength="12" class="form-control" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 ' name="commission_received"  value="<?php if(isset($commission_received)) {echo $commission_received;}?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Commission Received Date </label><br />
                        <div id="demo-dp-range">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" name="commission_received_date" id="commission_received_date" value="<?php if(isset($commission_received_date)) {echo date('m/d/Y',strtotime($commission_received_date));}?>" class="form-control" />
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
                          <input type="radio" class="radio" onclick="close_other()" name="split" <?php if((isset($split) && $split==2) || (isset($_GET['action']) && $_GET['action']=='add')){ echo'checked="true"'; }?>  value="2" />NO
                        </label>
                    </div>
                </div>
                <!--<div class="col-md-6">
                    <div id="other_div" class="form-group" <?php  if((isset($split) && $split!=1) || (isset($_GET['action']) && $_GET['action']=='add')){?>style="display: none;<?php } ?>">
                        <div class="form-group">
                            <label>Other <span class="text-red">*</span></label><br />
                            <input class="col-md-4" type="text" name="split_broker" value="<?php if(isset($split_broker)) {echo $split_broker;}?>"/>
                            <input class="col-md-4" type="text" name="split_rate"  placeholder="Enter split rate"  value="<?php if(isset($split_rate)) {echo $split_rate;}?>"/>
                            <input class="col-md-4" type="text" name="another_level"  placeholder="Another level add"  value="<?php if(isset($another_level)) {echo $another_level;}?>"/>
                        </div>
                    </div>
                </div>-->
            </div>
            <div class="row" id="add_other_split" <?php  if((isset($split) && $split!=1) || (isset($_GET['action']) && $_GET['action']=='add')){?>style="display: none;"<?php } ?>>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Split Broker </label><br />
                        <select class="form-control" name="split_broker[]">
                            <option value="">Select Broker</option>
                             <?php foreach($get_broker as $key=>$val){?>
                            <option value="<?php echo $val['id'];?>" <?php if($split_broker != '' && $split_broker==$val['id']){echo "selected='selected'";} ?>><?php echo $val['first_name'].' '.$val['middle_name'].' '.$val['last_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Split Rate </label><br />
                        <div class="input-group">
                            <input type="text" name="split_rate[]" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="account_no" class="form-control" value="" />
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label></label><br />
                        <button type="button" onclick="addMoreRow();" class="btn btn-purple btn-icon btn-circle"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <?php
            if($return_splits != '')
            {
            foreach($return_splits as $keyedit_split=>$valedit_split){
                $split_broker = $valedit_split['split_broker'];?>
            <div class="row split_edit_row" <?php  if((isset($split) && $split!=1) || (isset($_GET['action']) && $_GET['action']=='add')){?>style="display: none;"<?php } ?>>
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" name="split_broker[]">
                            <option value="">Select Broker</option>
                             <?php foreach($get_broker as $key=>$val){?>
                            <option value="<?php echo $val['id'];?>" <?php if($split_broker != '' && $split_broker==$val['id']){echo "selected='selected'";} ?>><?php echo $val['first_name'].' '.$val['middle_name'].' '.$val['last_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" name="split_rate[]" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="account_no" class="form-control" value="<?php echo $valedit_split['split_rate'];?>" />
                        <span class="input-group-addon">%</span>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                         <button type="button" tabindex="-1" class="btn remove-row btn-icon btn-circle"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
            </div>
            <?php } }?>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Buy/Sell <span class="text-red">*</span></label><br />
                        <label class="radio-inline">
                          <input type="radio" class="radio"  name="buy_sell" <?php if((isset($buy_sell) && $buy_sell==1) || (isset($_GET['action']) && $_GET['action']=='add')){ echo'checked="true"'; }?> value="1"/>Buy    
                        </label>
                        <label class="radio-inline">
                          <input type="radio" class="radio" name="buy_sell" <?php if(isset($buy_sell) && $buy_sell==2){ echo'checked="true"'; }?> value="2" />Sell
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Hold Commission <span class="text-red">*</span></label><br />
                        <label class="radio-inline">
                          <input type="radio" class="radio"  name="hold_commission" <?php if(isset($hold_commission) && $hold_commission==2){ echo'checked="true"'; }?> value="1"/>YES
                        </label>
                        <label class="radio-inline">
                          <input type="radio" class="radio" name="hold_commission" <?php if((isset($hold_commission) && $hold_commission==1) || (isset($_GET['action']) && $_GET['action']=='add')){ echo'checked="true"'; }?> value="2" />NO
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Cancel <span class="text-red">*</span></label><br />
                        <label class="radio-inline">
                          <input type="radio" class="radio" name="cancel" <?php if(isset($cancel) && $cancel==1){ echo'checked="true"'; }?> value="1"/>YES
                        </label>
                        <label class="radio-inline">
                          <input type="radio" class="radio" name="cancel" <?php if((isset($cancel) && $cancel==2) || (isset($_GET['action']) && $_GET['action']=='add')){ echo'checked="true"'; }?> value="2" />NO
                        </label>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Charge Amount </label><br />
                        <input type="text" maxlength="9" class="form-control" onkeypress='return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 ' name="charge_amount"  value="<?php if(isset($charge_amount)) {echo $charge_amount;}?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hold Reason </label><br />
                        <input type="text"  class="form-control" value="<?php if(isset($hold_resoan)) {echo $hold_resoan;}?>" name="hold_resoan"  />
                    </div>
                </div>
            </div>
          </div>
           <div class="panel-footer fixedbtmenu">
               <!-- <div class="col-md-12">
                    <div class="form-group "><br />-->
                    <div class="selectwrap">
                        <a href="<?php echo CURRENT_PAGE.'?action=view';?>"><input type="button" name="cancel" value="Cancel" style="float: right;"/></a>
                        <input type="submit" name="transaction" onclick="waitingDialog.show();" value="Save" style="float: right;"/>	
                    </div>
                 <!--</div>
                 </div>-->
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
                            <li><a href="<?php echo CURRENT_PAGE; ?>?action=view_report"><i class="fa fa-minus"></i> Report</a></li> 
    					</ul>
    				</div>
    			</div>
            </div><br />
    		<div class="panel-body">
                <div class="panel-control">
                    <div class="row">
                        <div class="col-md-6" style="float: right;">
                             <form method="post">
                                <select name="search_type" class="form-control" style="width: 50%; display: inline;" >
                                    <option value="">Select Type</option>
                                    <option <?php if(isset($search_type) && $search_type=='id'){?>selected="true"<?php }?> value="id">Trade Number</option>
                                    <option <?php if(isset($search_type) && $search_type=='client_name'){?>selected="true"<?php }?> value="client_name">Client Name</option>
                                    <option <?php if(isset($search_type) && $search_type=='client_number'){?>selected="true"<?php }?> value="client_number">Client Account</option>
                                    <option <?php if(isset($search_type) && $search_type=='broker_name'){?>selected="true"<?php }?> value="broker_name">Broker Name</option>
                                    <option <?php if(isset($search_type) && $search_type=='commission_received'){?>selected="true"<?php }?> value="commission_received">Commission Received</option>
                                    <option <?php if(isset($search_type) && $search_type=='trade_date'){?>selected="true"<?php }?> value="trade_date">Trade Date</option>
                                    <option <?php if(isset($search_type) && $search_type=='batch'){?>selected="true"<?php }?> value="batch">Batch Number</option>
                                </select>
                                <input type="text"  name="search_text" id="search_text_batches" value="<?php if(isset($search_text_batches)){echo $search_text_batches;}?>"/>
                                <button type="submit" name="search_transaction" id="submit" value="Search"><i class="fa fa-search"></i> Search</button>
                            </form>
                        </div>
                    </div>
                </div><br /><br />
                <div class="table-responsive" id="table-scroll">
    			<table id="data-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
    	            <thead>
    	                <tr>
                            
                            <th>Trade Number</th>
                            <th>Trade Date</th>
                            <th>Client Name</th>
                            <th>Client Account Number</th>
                            <th>Broker Name</th>
                            <th>Batch Number</th>
                            <th>Investment Amount</th>
                            <th>Commission Received</th>
                            <th class="text-center">ACTION</th>
                        </tr>
    	            </thead>
    	            <tbody>
                    <?php 
                    $count = 0;
                    foreach($return as $key=>$val){
                        ?>
    	                   <tr>
                                
                                <td><?php echo $val['id'];?></td>
                                <td><?php echo date('m/d/Y',strtotime($val['trade_date']));?></td>
                                <td><?php foreach($get_client as $key1 => $val1){ if($val1['id']==$val['client_name']) {echo $val1['mi'];}}?></td>
                                <td><?php echo $val['client_number'];?></td>
                                <td><?php foreach($get_broker as $key1 => $val1){ if($val1['id']==$val['broker_name']) {echo $val1['first_name'];}}?></td>
                                <td><?php foreach($get_batch as $key1 => $val1){ if($val1['id']==$val['batch']) {echo $val1['id'];}}?></td>
                                <td><?php echo $val['invest_amount'];?></td>
                                <td><?php echo $val['commission_received'];?></td>
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
                                    <a href="<?php echo CURRENT_PAGE; ?>?action=edit_transaction&id=<?php echo $val['id']; ?>" class="btn btn-md btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                    <a onclick="return conf('<?php echo CURRENT_PAGE; ?>?action=transaction_delete&id=<?php echo $val['id']; ?>');" class="btn btn-md btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                    <?php }  ?>
                    </tbody>
                </table>
                </div>
            </div>
    	</div>
        <?php } ?> 
        <?php if(isset($_GET['action']) && $_GET['action']=='view_report'){?>
        <div id="view_report">
            <form method="post" target="_blank">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Batch </label><br />
                        <select class="form-control" name="view_batch">
                            <option value="">Select Batch</option>
                             <?php foreach($get_batch as $key=>$val){?>
                            <option value="<?php echo $val['id'];?>" <?php if(isset($batch) && $batch==$val['id']){?> selected="true"<?php } ?>><?php echo $val['batch_number'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group "><br /><div class="selectwrap">
                        <input type="submit" name="view_report" value="View Report"/>
                        <a href="<?php echo CURRENT_PAGE.'?action=view';?>"><input type="button" name="cancel" value="Cancel" /></a>
                        </div>
                    </div>
                 </div>
             </div>
             </form>
        </div>
        <?php } ?>
    </div>
</div>
<style>
.btn-primary {
    color: #fff;
    background-color: #337ab7 !important;
    border-color: #2e6da4 !important;
}
#table-scroll {
  height:400px;
  overflow:auto;  
  margin-top:20px;
}
</style>
<script>
function get_product(id,selected=''){
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById("product").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ajax_get_product.php?product_category_id="+id+'&selected='+selected, true);
        xmlhttp.send();
}

function open_other()
{
    $('#add_other_split').css('display','block');
    $('.split_edit_row').css('display','block');
    
}
function close_other()
{
    $('#add_other_split').css('display','none');
    $('.split_edit_row').css('display','none');
    
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
<?php

    if($product_cate>0){
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                get_product(<?php echo $product_cate; ?>,'<?php echo $product; ?>');
            });
        </script>
        <?php
    }

?>
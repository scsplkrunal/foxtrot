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
<div class="container">
<h1>  Product Maintenance  </h1>
<?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
<div class="col-lg-12 well">
            <?php
                    if(isset($_GET['action']) && $_GET['action']=='view_product') {?>
                <div class="panel">
            		<div class="panel-heading">
                        <div class="panel-control">
                            <div class="btn-group dropdown" style="float: right;">
                                <button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
            					<ul class="dropdown-menu dropdown-menu-right" style="">
            						<li><a href="<?php echo CURRENT_PAGE; ?>?action=add_product&category=<?php echo $category; ?>"><i class="fa fa-plus"></i> Add New</a></li>
            					   <li><a href="<?php echo CURRENT_PAGE; ?>?action=select_cat"><i class="fa fa-minus"></i> Back To Category</a></li>
                                </ul>
            				</div>
            			</div>
                    </div><br />
            		<div class="panel-body">
                        <div class="panel-control" style="float: right;" >
                         <form method="post">
                            <div class="row"> 
                            <div class="col-md-5"></div>
                                <!--div class="col-md-3">
                                    <select class="form-control" name="search_product_category">
                                        <?php foreach($product_category as $key=>$val){?>
                                        <option value="<?php echo $val['id'];?>" <?php if($search_product_category==$val['id']){echo "selected='selected'";} ?>><?php echo $val['type'];?></option>
                                        <?php } ?>
                                    </select>
                                 </div--> 
                                    <input type="hidden" name="search_product_category" value="<?php echo $category; ?>"/> 
                                    <input type="text" name="search_text_product" style=" width:60% !important;"  placeholder="Search Name , Cusip , Ticker" id="search_text_product" value="<?php echo $search_text_product;?>"/>
                                    <button type="submit" name="search_product" id="submit" value="Search"><i class="fa fa-search"></i> Search</button>
                                 
                            </div>
                        </form>
                        </div><br /><br />
                       <div class="table-responsive">
            			<table id="data-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            	            <thead>
            	                <tr>
                                    <th class="text-center">#NO</th>
                                    <th>Product Name</th>
                                    <th>Cusip</th>
                                    <th>Sponsor Name</th>
                                    <th>Status</th>
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
                                        <td><?php echo $val['name'];?></td>
                                        <td><?php echo $val['cusip']; ?></td>
                                        <td><?php echo $val['sponsor']; ?></td>
                                        <td class="text-center">
                                            <?php
                                                if($val['status']==1){
                                                    ?>
                                                    <a href="<?php echo CURRENT_PAGE; ?>?action=product_status&category=<?php echo $val['category']; ?>&id=<?php echo $val['id']; ?>&status=0" class="btn btn-sm btn-success"><i class="fa fa-check-square-o"></i> Enabled</a>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <a href="<?php echo CURRENT_PAGE; ?>?action=product_status&category=<?php echo $val['category']; ?>&id=<?php echo $val['id']; ?>&status=1" class="btn btn-sm btn-warning"><i class="fa fa-warning"></i> Disabled</a>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo CURRENT_PAGE; ?>?action=edit_product&category=<?php echo $val['category']; ?>&id=<?php echo $val['id']; ?>" class="btn btn-md btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                            <a onclick="return conf('<?php echo CURRENT_PAGE; ?>?action=product_delete&category=<?php echo $val['category']; ?>&id=<?php echo $val['id']; ?>');" class="btn btn-md btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        </div>
            		</div>
            	</div>
                <?php } ?>  
            <?php  
            if($action=='select_cat'){
                ?>
                <div class="panel">            
                <form name="frm2" method="POST">
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Category </label><br />
                                <select class="form-control" name="set_category">
                                    <option value="">Select Category</option>
                                    <?php foreach($product_category as $key=>$val){?>
                                    <option value="<?php echo $val['id'];?>" <?php if($category==$val['id']){echo "selected='selected'";} ?>><?php echo $val['type'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="selectwrap">
                            <input type="submit" name="next" value="Next" />
                        </div>
                   </div>
                   </div>
                </form>
                </div>
                <?php
                    }else if($action=='add_product' || ($action=='edit_product' && $id>0)){
                ?>          
                 <div class="row">
                    <div class="col-md-4" style="float: right;">
                        <div class="form-group" style="float: right;">
                            <a href="#product_notes" data-toggle="modal"><input type="button" onclick="get_product_notes();" name="notes" value="Notes" /></a>
                            <a href="#client_attachment" data-toggle="modal"><input type="button" name="attach" value="Attachments" /></a><br />
                        </div>
                     </div>
                 </div>
                <ul class="nav nav-tabs ">
                  <li class="active"><a href="#tab_aa" data-toggle="tab">General</a></li>
                  <li><a href="#tab_bb" data-toggle="tab">Suitability</a></li>
                  <!--<li><a href="#tab_ee" data-toggle="tab">Documents</a></li>-->
                    <div class="btn-group dropdown" style="float: right;">
						<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
						<ul class="dropdown-menu dropdown-menu-right" style="">
							<li><a href="<?php echo CURRENT_PAGE; ?>"><i class="fa fa-eye"></i> View List</a></li>
						</ul>
					</div>
				</ul>
                 <form name="frm" method="POST" onsubmit="return validation();" enctype="multipart/form-data">    
                 <div class="panel-footer">
                        <div class="selectwrap" style="float: right;">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
        					<input type="submit" name="product" onclick="waitingDialog.show();" value="Save"/>	
                            <a href="<?php echo CURRENT_PAGE.'?action=view_product';?>"><input type="button" name="cancel" value="Cancel" /></a>
                        </div>
                 </div><br /><br />
                 <div class="tab-content col-md-12">
                    
                    <div class="tab-pane active" id="tab_aa"> 
                        
        					<div class="row"><br />
                                <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i> <?php echo $action=='add_product'?'Add':'Edit'; ?> Product</h3>
        					</div><br />
                            <input type="hidden" name="product_category" id="product_category1" value="<?php echo $category;?>" />
                            <div class="row">
                                <!--div class="col-md-6">
                                    <?php if($action=='edit_product' && $id>0){?>
                                    <div class="form-group">
                                        <label>Product Category </label><br />
                                        <select class="form-control" name="product_category" id="product_category" disabled="true">
                                            <option value="">Select Category</option>
                                            <?php foreach($product_category as $key=>$val){?>
                                            <option value="<?php echo $val['id'];?>" <?php if($category==$val['id']){echo "selected='selected'";} ?>><?php echo $val['type'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php } else {?>
                                    <input type="text" name="product_category" id="product_category1" value="<?php echo $category;?>" />
                                    <?php } ?>
                                </div-->
                                                            
                                    
                                 
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name </label><br />
                                        <input type="text" maxlength="40" class="form-control" name="name" value="<?php echo $name; ?>"  />
                                    </div>
                                </div>
                                <!--div class="col-md-6">
                                    <div class="form-group">
                                        <label></label><br />
                                        <a href="#client_notes" data-toggle="modal"><input type="button" class="col-md-6" name="notes" value="Notes" /></a>
                                        <a href="#client_attachment" data-toggle="modal"><input type="button" class="col-md-6" name="attach" value="Attach" /></a>
                                    </div>
                                 </div-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sponsor </label><br />
                                        <select class="form-control" name="sponsor">
                                            <option value="">Select Sponsor</option>
                                             <?php foreach($get_sponsor as $key=>$val){?>
                                            <option value="<?php echo $val['id'];?>" <?php if($sponsor != '' && $sponsor==$val['id']){echo "selected='selected'";} ?>><?php echo $val['name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ticker Symbol </label><br />
                                        <input type="text" maxlength="6" class="form-control" name="ticker_symbol" value="<?php echo $ticker_symbol; ?>"  />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CUSIP </label><br />
                                        <input type="text" maxlength="11" class="form-control" name="cusip" value="<?php echo $cusip; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Security Number </label><br />
                                        <input type="text" maxlength="10" class="form-control" name="security" value="<?php echo $security; ?>"   />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Allowable Receivable </label><br />
                                        <input type="checkbox" class="checkbox" name="allowable_receivable" id="allowable_receivable" value="1" style="display: inline;" <?php if($receive>0){echo "checked='checked'";}?>  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Non-Commissionable </label><br />
                                        <input type="checkbox"  class="checkbox" name="non_commissionable" id="non_commissionable" value="1" style="display: inline;" <?php if($non_commissionable>0){echo "checked='checked'";}?>/>
                                    </div>
                                </div>
                            </div>
                           
                           <div style="display: block; border: 1px solid #ddd;">
                           <div class="row" style="padding: 5px;"> 
                                <div class="col-md-12">
                                    <h4><b>Mutual Funds</b></h4><br />
                                </div>
                           </div>
                           <div class="row" style="padding: 5px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Class Type </label><br />
                                        <input type="radio" class="radio" name="class_type" id="cpa" value="1" style="display: inline;" <?php if($class_type==1){echo "checked='checked'";}?>/>&nbsp;<label>A</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="radio" name="class_type" id="cpa" value="2" style="display: inline;" <?php if($class_type==2){echo "checked='checked'";}?>/>&nbsp;<label>B</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="radio" name="class_type" id="cpa" value="3" style="display: inline;" <?php if($class_type==3){echo "checked='checked'";}?>/>&nbsp;<label>C</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" class="radio" name="class_type" id="cpa" value="4" style="display: inline;" <?php if($class_type==4){echo "checked='checked'";}?>/>&nbsp;<label>other</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fund Code </label><br />
                                        <input type="text" maxlength="7" value="<?php echo $fund_code; ?>" class="form-control" name="fund_code"  />
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding: 5px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Rate </label><br />
                                        <input type="text" value="<?php echo $min_rate; ?>" onblur="minrate(this.value)"   maxlength="5" class="form-control" name="min_rate" id="min_rate" placeholder="0.0%"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label></label><br />
                                        <input type="text" value="<?php echo $max_rate; ?>"  onblur="maxrate(this.value)"  maxlength="5" class="form-control" name="max_rate" id="max_rate" placeholder="99.9%" />
                                    </div>
                                </div>
                           </div>
                           <div class="row" style="padding: 5px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Threshold </label><br />
                                        <input type="number" onblur="minthreshold(this.value)" value="<?php echo $min_threshold; ?>"  maxlength="9" class="form-control" id="min_threshold" name="min_threshold" placeholder="$0"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> </label><br />
                                        <input type="number" onblur="maxthreshold(this.value)" value="<?php echo $max_threshold; ?>"  maxlength="9" class="form-control" id="max_threshold" name="max_threshold" placeholder="$99,999,999"  />
                                    </div>
                                </div>
                           </div>
                           <div class="row" style="padding: 5px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Waive Sweep Fee </label><br />
                                        <input type="checkbox" class="checkbox" name="sweep_fee" id="sweep_fee" value="1" style="display: inline;" <?php if($sweep_fee>0){echo "checked='checked'";}?>/>
                                    </div>
                                </div>
                           </div>
                           </div><br />
                           <div style="display: block; border: 1px solid #ddd;">
                           <div class="row" style="padding: 5px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Investment Banking Type </label><br />
                                        <select class="form-control" name="investment_banking_type">
                                            <option value="">Select Banking Type</option>
                                            <option value="1" <?php if($investment_banking_type==1){echo "selected='selected'";} ?>>IPO</option>
                                            <option value="2" <?php if($investment_banking_type==2){echo "selected='selected'";} ?>>Bridge</option>
                                            <option value="3" <?php if($investment_banking_type==3){echo "selected='selected'";} ?>>Reg S</option>
                                            <option value="4" <?php if($investment_banking_type==4){echo "selected='selected'";} ?>>Reg D</option>
                                            <option value="5" <?php if($investment_banking_type==5){echo "selected='selected'";} ?>>Private Placement</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </div><br />
                           <div style="display: block; border: 1px solid #ddd;">
                           <div class="row" style="padding: 5px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>RIA Type </label><br />
                                        <select class="form-control" name="ria_specific_type">
                                            <option value="">Select Type</option>
                                            <option value="1" <?php if($ria_specific_type==1){echo "selected='selected'";} ?>>Fee Based Mutual Funds</option>
                                            <option value="2" <?php if($ria_specific_type==2){echo "selected='selected'";} ?>>Fee Based Stocks, Bonds &amp; Mutual Funds</option>
                                            <option value="3" <?php if($ria_specific_type==3){echo "selected='selected'";} ?>>Financial Planning</option>
                                            <option value="4" <?php if($ria_specific_type==4){echo "selected='selected'";} ?>>Money Managers</option>
                                            <option value="5" <?php if($ria_specific_type==5){echo "selected='selected'";} ?>>Non-Discretionary</option>
                                            <option value="6" <?php if($ria_specific_type==6){echo "selected='selected'";} ?>>Socially Screened</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label></label><br />
                                        <input type="radio"  name="based_type" class="radio"  value="1" style="display: inline;" <?php if($based==1){echo "checked='checked'";}?>/>&nbsp;<label>Asset Based</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio"  name="based_type" class="radio"  value="2" style="display: inline;" <?php if($based==2){echo "checked='checked'";}?>/>&nbsp;<label>Fee Based</label>
                                    </div>
                                </div>
                            </div>   
                            <div class="row" style="padding: 5px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fee Rate </label><br />
                                        <input type="number" value="<?php echo $fee_rate; ?>" onblur="round(this.value);"  maxlength="5"   class="form-control" name="fee_rate" id="fee_rate" placeholder="0.00"  />
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br />   
                           <div style="display: block; border: 1px solid #ddd;">
                           <div class="row" style="padding: 5px;">
                                <div class="col-md-12">
                                    <h4><b>Stocks, Bonds</b></h4><br />
                                </div>
                           </div>
                           
                           <div class="row" style="padding: 5px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="radio" class="radio" name="stocks_bonds" value="1" style="display: inline;" <?php if($st_bo==1){echo "checked='checked'";}?>/>&nbsp;<label>Listed </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                        <input type="radio" class="radio" name="stocks_bonds"  value="2" style="display: inline;" <?php if($st_bo==2){echo "checked='checked'";}?>/>&nbsp;<label>OTC </label>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br />
                           <div style="display: block; border: 1px solid #ddd;">
                            <div class="row" style="padding: 5px;">
                            
                                <div class="col-md-12">
                                    <h4><b>CDs, UITs, Bonds</b></h4><br />
                                </div>
                            </div>
                           
                            <div class="row" style="padding: 5px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Maturity Date </label><br />
                                        <div id="demo-dp-range">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" value="<?php echo $m_date; ?>" name="maturity_date" id="maturity_date" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type </label><br />
                                        <select class="form-control" name="type">
                                            <option value="">Select Type...</option>
                                            <option value="1" <?php if($type==1){echo "selected='selected'";} ?>>Government Municipal</option>
                                            <option value="2" <?php if($type==2){echo "selected='selected'";} ?>>Corporate</option>
                                            <option value="3" <?php if($type==3){echo "selected='selected'";} ?>>Treasury</option>
                                            <option value="4" <?php if($type==4){echo "selected='selected'";} ?>>Zero Coupon</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br />  
                           <div style="display: block; border: 1px solid #ddd;">
                            <div class="row" style="padding: 5px;">
                           
                                <div class="col-md-12">
                                    <h4><b>Variable Annuities</b></h4><br />
                                </div>
                            </div>
                           <div class="row" style="padding: 5px;">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="radio" class="radio" name="variable_annuities" value="1" style="display: inline;" <?php if($var==1){echo "checked='checked'";}?>/>&nbsp;<label>Single </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    
                                        <input type="radio" class="radio" name="variable_annuities"  value="2" style="display: inline;" <?php if($var==2){echo "checked='checked'";}?>/>&nbsp;<label>Recurring </label>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br />
                           <div style="display: block; border: 1px solid #ddd;">
                            <div class="row" style="padding: 5px;">
                                <div class="col-md-12">
                                    <h4><b>Agency Tax Credits, Alternative Investments, Hedge Funds, Secondary Limited Partnerships</b></h4><br />
                                </div>
                            </div>
                           
                            <div class="row" style="padding: 5px;">
                               <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Registration Type </label><br />
                                        <select class="form-control" name="registration_type">
                                            <option value="">Select Registration Type</option>
                                            <option value="1" <?php if($reg_type==1){echo "selected='selected'";} ?>>Public Real Estate</option>
                                            <option value="2" <?php if($reg_type==2){echo "selected='selected'";} ?>>Private Real Estate</option>
                                            <option value="3" <?php if($reg_type==3){echo "selected='selected'";} ?>>Public Oil &amp; Gas</option>
                                            <option value="4" <?php if($reg_type==4){echo "selected='selected'";} ?>>Private Oil &amp; Gas</option>
                                            <option value="5" <?php if($reg_type==5){echo "selected='selected'";} ?>>Public Leasing</option>
                                            <option value="6" <?php if($reg_type==6){echo "selected='selected'";} ?>>Private Leasing</option>
                                            <option value="7" <?php if($reg_type==7){echo "selected='selected'";} ?>>Public Mortgage</option>
                                            <option value="8" <?php if($reg_type==8){echo "selected='selected'";} ?>>Private Mortgage</option>
                                            <option value="9" <?php if($reg_type==9){echo "selected='selected'";} ?>>Public Raw Land</option>
                                            <option value="10" <?php if($reg_type==10){echo "selected='selected'";} ?>>Private Raw Land</option>
                                            <option value="11" <?php if($reg_type==11){echo "selected='selected'";} ?>>REIT</option>
                                            <option value="12" <?php if($reg_type==12){echo "selected='selected'";} ?>>Subsidized Housing</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                          </div><br />
                         </div>  
                    <div class="tab-pane" id="tab_bb"> 
                        <div class="row">
                                <div class="col-md-12">
                                    <h4><b>Suitability</b></h4><br />
                                </div>
                           </div>
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Income </label><br />
                                        <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" value="<?php echo $income; ?>"  name="income"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Net Worth </label><br />
                                        <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" value="<?php echo $networth; ?>"  name="networth"  />
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Net Worth Only </label><br />
                                        <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" value="<?php echo $networthonly; ?>"  name="networthonly"  />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Minimum Investment </label><br />
                                        <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="minimum_investment" value="<?php echo $minimum_investment; ?>"  />
                                    </div>
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Minimum Offer </label><br />
                                        <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="minimum_offer" value="<?php echo $minimum_offer; ?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Maximum Offer </label><br />
                                        <input type="text" maxlength="9" value="<?php echo $maximum_offer; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="maximum_offer"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Objectives </label><br />
                                        <select class="form-control" name="objectives">
                                            <option value="">Select Objectives</option>
                                            <option value="1" <?php if($objective==1){echo "selected='selected'";} ?>>Growth</option>
                                            <option value="2" <?php if($objective==2){echo "selected='selected'";} ?>>Income</option>
                                            <option value="3" <?php if($objective==3){echo "selected='selected'";} ?>>Growth &amp; Income</option>
                                            <option value="4" <?php if($objective==4){echo "selected='selected'";} ?>>Speculative</option>
                                            <option value="5" <?php if($objective==5){echo "selected='selected'";} ?>>Preservation of Capital</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                   
                </div>
                <div class="panel-footer">
                        <div class="selectwrap">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
        					<input type="submit" name="product" onclick="waitingDialog.show();" value="Save"/>	
                            <a href="<?php echo CURRENT_PAGE.'?action=view_product';?>"><input type="button" name="cancel" value="Cancel" /></a>
                        </div>
                    </div>
			    </form>
                <?php
                    }
                ?> 
            <!-- Lightbox strart -->							
            	<!-- Modal for add client notes -->
            	<div id="product_notes" class="modal fade inputpopupwrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
    
</div>
<script>
function set_Category(val){
    var category = val;
    var a = document.getElementById("product_category").value;
    alert(a);
}
</script>
<script>
function round(feerate)
{
    if(feerate>100)
    {
        var rounded = 99.9;
    }
    else
    {
        var round = Math.round( feerate * 10 ) / 10;
        var rounded = round.toFixed(1);
    }
    document.getElementById("fee_rate").value = rounded;
    
}
function minrate(feerate)
{
    if(feerate>100)
    {
        var rounded = 99.9;
    }
    else
    {
        var round = Math.round( feerate * 10 ) / 10;
        var rounded = round.toFixed(1);
    }
    document.getElementById("min_rate").value = rounded;
    
}
function maxrate(feerate)
{
    if(feerate>100)
    {
        var rounded = 99.9;
    }
    else
    {
        var round = Math.round( feerate * 10 ) / 10;
        var rounded = round.toFixed(1);
    }
    document.getElementById("max_rate").value = rounded;
    
}
function minthreshold(feerate)
{
    if(feerate>99999999)
    {
        var rounded = 99999999;
    }
    else if(feerate == '')
    {
        var rounded = 0;
    }
    else{
        var rounded = feerate;
    }
    document.getElementById("min_threshold").value = rounded;
    
}
function maxthreshold(feerate)
{
    if(feerate>99999999)
    {
        var rounded = 99999999;
    }
    else if(feerate == '')
    {
        var rounded = 0;
    }
    else{
        var rounded = feerate;
    }
    document.getElementById("max_threshold").value = rounded;
    
}
</script>
<script>
function open_newnotes()
{
    document.getElementById("add_row_notes").style.display = "";
}
</script>
<script>
function get_product_notes(){
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById("ajax_notes").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ajax_product_notes.php", true);
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

   var url = "product_cate.php"; // the script where you handle the form input.
   //alert("#add_client_notes_"+note_id);
   $.ajax({
      type: "POST",
      url: url,
      data: $("#add_client_notes_"+note_id).serialize(), // serializes the form's elements.
      success: function(data){
          if(data=='1'){
            
            get_product_notes();
            $('#msg_notes').html('<div class="alert alert-success alert-dismissable" style="opacity: 500;"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><strong>Success!</strong> Data Successfully Saved.</div>');
            //window.location.href = "client_maintenance.php";//get_client_notes();   
          }
          else{
               $('#msg_notes').html('<div class="alert alert-danger">'+data+'</div>');
          }
          
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
           $('#msg_notes').html('<div class="alert alert-danger">Something went wrong, Please try again.</div>')
      }
      
   });

   //e.preventDefault(); // avoid to execute the actual submit of the form.
   return false;
       
}
function delete_notes(note_id){
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var data = this.responseText;
                if(data=='1'){
                   get_product_notes(); 
                   $('#msg_notes').html('<div class="alert alert-success alert-dismissable" style="opacity: 500;"><a href="#" class="close" data-dismiss="alert" aria-label="close">x</a><strong>Success!</strong> Note deleted Successfully.</div>');
                   //get_client_notes();
                  
                  }
                  else{
                       $('#msg_notes').html('<div class="alert alert-danger">'+data+'</div>');
                  }
                
            }
        };
        xmlhttp.open("GET", "product_cate.php?delete_action=delete_notes&note_id="+note_id, true);
        xmlhttp.send();
}



$('#demo-dp-range .input-daterange').datepicker({
        format: "mm/dd/yyyy",
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });
function checkLength(el) {
  if (el.value.length != 2) {
    alert("length grater than 2 characters")
  }
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
		 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "md", "m";
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
<style>
.btn-primary {
    color: #fff;
    background-color: #337ab7 !important;
    border-color: #2e6da4 !important;
    }
</style>
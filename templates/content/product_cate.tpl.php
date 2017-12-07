<div class="container">
<h1>Product category</h1>
<div class="col-lg-12 well">
    <ul class="nav nav-pills nav-stacked col-md-2">
      <li <?php if((isset($_GET['action'])&& $_GET['action']=='add_new_product') || (isset($_GET['action'])&& $_GET['action']=='view_product') || (isset($_GET['action'])&& $_GET['action']=='edit_product')){ ?> class="active"<?php }if($action=='view_product'){?>class="active" <?php }?>><a href="<?php echo CURRENT_PAGE; ?>?action=view_product" >Products</a></li>
      <li <?php if((isset($_GET['action'])&& $_GET['action']=='add_new_sponsor')||(isset($_GET['action'])&& $_GET['action']=='edit_sponsor') || (isset($_GET['action'])&& $_GET['action']=='view_sponsor') ){ ?> class="active"<?php }?>><a href="<?php echo CURRENT_PAGE; ?>?action=view_sponsor">Sponsors</a></li>
    </ul>
    <div class="tab-content col-md-10">
            <div class="tab-pane <?php if((isset($_GET['action'])&& $_GET['action']=='add_new_product') || (isset($_GET['action'])&& $_GET['action']=='view_product')|| $action=='view_product' || (isset($_GET['action'])&& $_GET['action']=='edit_product')){?>active<?php }?>" id="tab_a">
            <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
            <?php
             if($action=='add_new_product' || ($action=='edit_product' && $id>0)){
                ?>            
                <form name="frm" action="<?php echo CURRENT_PAGE ?>" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
					<div class="row">
                        <div class="panel-control" style="float: right;">
							<div class="btn-group dropdown">
								<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
								<ul class="dropdown-menu dropdown-menu-right" style="">
									<li><a href="<?php echo CURRENT_PAGE; ?>?view_product"><i class="fa fa-eye"></i> View List</a></li>
								</ul>
							</div>
						</div>
                        <h3 class="panel-title"><i class="ti-pencil-alt"></i> <?php echo $action=='add_new'?'Add':'Edit'; ?> Product Category</h3>
					</div><br />
                    <div class="row">
                        <div  class="col-md-3 form-group">
                            <label>Product Category:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <select class="form-control" name="product_category">
                                <option value="">Select Product Category...</option>
                                <?php foreach($product_category as $key=>$val){?>
                                <option value="<?php echo $val['id'];?>" <?php if($category != '' && $category==$val['id']){echo "selected='selected'";} ?>><?php echo $val['type'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Name:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" maxlength="40" class="form-control" name="name" value="<?php echo $name; ?>"  />
                        </div>
                    </div>
                    <div class="row">
                        <div  class="col-md-3 form-group">
                            <label>Sponsor :</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <select class="form-control" name="sponsor">
                                <option value="">Select Sponsor Category...</option>
                                 <?php foreach($get_sponsor as $key=>$val){?>
                                <option value="<?php echo $val['id'];?>" <?php if($sponsor != '' && $sponsor==$val['id']){echo "selected='selected'";} ?>><?php echo $val['type'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Ticker Symbol:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" maxlength="6" class="form-control" name="ticker_symbol" value="<?php echo $ticker_symbol; ?>"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>CUSIP:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" maxlength="11" class="form-control" name="cusip" value="<?php echo $cusip; ?>" />
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Security:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" maxlength="10" class="form-control" name="security" value="<?php echo $security; ?>"   />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="checkbox"  name="allowable_receivable" id="allowable_receivable" value="receive" style="display: inline;"   />
                              </span>
                              <label class="form-control">Allowable Receivable</label>
                            </div>
                        </div>
                   </div >
                   <div class="row">
                        <div class="col-md-12">
                            <h4><b>Suitability</b></h4><br />
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Income:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" value="<?php echo $income; ?>"  name="income"  />
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Net Worth:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" value="<?php echo $networth; ?>"  name="networth"  />
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Net Worth Only:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" value="<?php echo $networthonly; ?>"  name="networthonly"  />
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Minimum Investment:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="minimum_investment" value="<?php echo $minimum_investment; ?>"  />
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Minimum Offer:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="minimum_offer" value="<?php echo $minimum_offer; ?>"   />
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Maximum Offer:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" maxlength="9" value="<?php echo $maximum_offer; ?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="maximum_offer"  />
                        </div>
                   </div>
                   <div class="row">
                        <div  class="col-md-3 form-group">
                            <label>Objectives :</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <select class="form-control" name="objectives">
                                <option value="">Select Objective...</option>
                                <option value="1">Growth</option>
                                <option value="2">Income</option>
                                <option value="3">Growth &amp; Income</option>
                                <option value="4">Speculative</option>
                                <option value="5">Preservation of Capital</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="checkbox"  name="non_commissionable" id="non_commissionable" value="non_commissionable" style="display: inline;" />
                              </span>
                              <label class="form-control">Non-Commissionable</label>
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-12">
                            <h4><b>Mutual Funds</b></h4><br />
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-lg-3">
                            <label class="form-group">Class Type:</label>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="class_type" id="cpa" value="A" style="display: inline;" />
                              </span>
                              <label class="form-control">A</label>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="class_type" id="cpa" value="B" style="display: inline;" />
                              </span>
                              <label class="form-control">B</label>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="class_type" id="cpa" value="C" style="display: inline;" />
                              </span>
                              <label class="form-control">C</label>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="class_type" id="cpa" value="other" style="display: inline;" />
                              </span>
                              <label class="form-control">Other</label>
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Fund Code</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" maxlength="7" value="<?php echo $fund_code; ?>" class="form-control" name="fund_code"  />
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="checkbox"  name="sweep_fee" id="cpa" value="Waive Sweep Fee" style="display: inline;" />
                              </span>
                              <label class="form-control">Waive Sweep Fee</label>
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Threshold</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" value="<?php echo $threshold; ?>"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="9" class="form-control" name="threshold"  />
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Rate </label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" value="<?php echo $rate; ?>"  onblur="checkLength(this)" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="5" class="form-control" name="Rate"  />
                        </div>
                   </div>
                   <div class="row">
                        <div  class="col-md-3 form-group">
                            <label>Investment Banking Type :</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <select class="form-control" name="investment_banking_type">
                                <option value="">Select Type...</option>
                                <option value="1">IPO</option>
                                <option value="2">Bridge</option>
                                <option value="3">Reg S</option>
                                <option value="4">Reg D</option>
                                <option value="5">Private Placement</option>
                            </select>
                        </div>
                        <div  class="col-md-3 form-group">
                            <label>RIA specific Type :</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <select class="form-control" name="ria_specific_type">
                                <option value="">Select Type...</option>
                                <option value="1">Fee Based Mutual Funds</option>
                                <option value="2">Fee Based Stocks, Bonds &amp; Mutual Funds</option>
                                <option value="3">Financial Planning</option>
                                <option value="4">Money Managers</option>
                                <option value="5">Non-Discretionary</option>
                                <option value="6">Socially Screened</option>
                            </select>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-lg-3">
                            <label class="form-group">Based Type:</label>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="based_type" value="asset based" style="display: inline;" />
                              </span>
                              <label class="form-control">Asset Based</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="based_type"  value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">Fee Based</label><br />
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Fee Rate:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" value="<?php echo $fee_rate; ?>" onblur="checkLength(this)" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="5"   class="form-control" name="fee_rate"  />
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-12">
                            <h4><b>Stocks, Bonds</b></h4><br />
                        </div>
                   </div>
                   <div class="row"> 
                         <div class="col-lg-3">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="stocks_bonds" value="listed" style="display: inline;" />
                              </span>
                              <label class="form-control">Listed</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="stocks_bonds"  value="otc" style="display: inline;" />
                              </span>
                              <label class="form-control">OTC</label><br />
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-12">
                            <h4><b>CDs, UITs, Bonds</b></h4><br />
                        </div>
                   </div>
                   <div class="row"> 
                        <div class="col-md-3 form-group">
                            <label>Maturity Date :</label>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                <div id="demo-dp-range">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" value="<?php echo $m_date; ?>" name="maturity_date" id="maturity_date" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="col-md-3 form-group">
                            <label>Type :</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <select class="form-control" name="type">
                                <option value="">Select Type...</option>
                                <option value="1">Government Municipal</option>
                                <option value="2">Corporate</option>
                                <option value="3">Treasury</option>
                                <option value="4">Zero Coupon</option>
                            </select>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-md-12">
                            <h4><b>Variable Annuities</b></h4><br />
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-lg-3">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="variable_annuities" value="single" style="display: inline;" />
                              </span>
                              <label class="form-control">Single</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="variable_annuities"  value="recurring" style="display: inline;" />
                              </span>
                              <label class="form-control">Recurring</label><br />
                            </div>
                        </div>
                   </div><br />
                   <div class="row">
                        <div class="col-md-12">
                            <h4><b>Agency Tax Credits, Alternative Investments, Hedge Funds, Secondary Limited Partnerships</b></h4><br />
                        </div>
                    </div>
                   <div class="row">
                        <div  class="col-md-3 form-group">
                            <label>Registrtion Type:</label>
                        </div>
                        <div class="col-md-3 form-group">
                            <select class="form-control" name="registration_type">
                                <option value="">Select Registration Type...</option>
                                <option value="1">Public Real Estate</option>
                                <option value="2">Private Real Estate</option>
                                <option value="3">Public Oil &amp; Gas</option>
                                <option value="4">Private Oil &amp; Gas</option>
                                <option value="5">Public Leasing</option>
                                <option value="6">Private Leasing</option>
                                <option value="7">Public Mortgage</option>
                                <option value="8">Private Mortgage</option>
                                <option value="9">Public Raw Land</option>
                                <option value="10">Private Raw Land</option>
                                <option value="11">REIT</option>
                                <option value="12">Subsidized Housing</option>
                            </select>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="selectwrap">
        					<input type="submit" name="submit"  class="btn btn-warning btn-lg btn3d " value="Save"/>
        					<input type="button" name="cancel" class="btn btn-warning btn-lg btn3d " value="Cancel"/>
                        </div>
                    </div>
			    </form> 
                <?php
                    }if(isset($_GET['action'])=='' || $_GET['action']=='view_product' || $action =='view_product'){?>
                <div class="panel">
            		<div class="panel-heading">
                        <div class="panel-control">
                            <div class="btn-group dropdown" style="float: right;">
                                <button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
            					<ul class="dropdown-menu dropdown-menu-right" style="">
            						<li><a href="<?php echo CURRENT_PAGE; ?>?action=add_new_product"><i class="fa fa-plus"></i> Add New</a></li>
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
                                    <th>Product Category</th>
                                    <th>Product Name</th>
                                    <th>Sponsor Name</th>
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
                                        <td><?php echo $val['type'];?></td>
                                        <td><?php echo $val['name']; ?></td>
                                        <td><?php echo $val['sponsor']; ?></td>
                                        <td>
                                        <?php /*
                                        if($val['contact_status']==1)
                                        {
                                            echo "Yes";
                                        }
                                        else
                                        {
                                            echo "No"; 
                                        }*/ ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo CURRENT_PAGE; ?>?action=edit_new_product&id=<?php echo $val['id']; ?>" class="btn btn-md btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                            <a onclick="return conf('<?php echo CURRENT_PAGE; ?>?action=delete&id=<?php echo $val['id']; ?>');" class="btn btn-md btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>
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
            <div class="tab-pane  <?php if((isset($_GET['action'])&& $_GET['action']=='add_new_sponsor') || (isset($_GET['action'])&& $_GET['action']=='view_sponsor') || (isset($_GET['action'])&& $_GET['action']=='edit_sponsor')){?>active<?php }?>" id="tab_b">
            <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
            <?php  
            if($_GET['action']=='add_new_sponsor' || ($_GET['action']=='edit_sponsor' && $id>0)){
                ?>
                <div class="panel">            
                <form name="frm2" method="POST">
                    <div class="panel-heading">
                        <div class="panel-control" style="float: right;">
							<div class="btn-group dropdown">
								<button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
								<ul class="dropdown-menu dropdown-menu-right" style="">
									<li><a href="<?php echo CURRENT_PAGE; ?>?action=view_sponsor"><i class="fa fa-eye"></i> View List</a></li>
								</ul>
							</div>
						</div>
                        <h3 class="panel-title"><i class="fa fa-pencil-square-o"></i><?php echo $action=='add_new_sponsor'?'Add':'Edit'; ?> Sponsor</h3>
					</div>
                    <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sponsor Name </label><br />
                                <input type="text" maxlength="25" class="form-control" name="sponser_name"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address 1 </label><br />
                                <input type="text" maxlength="50" class="form-control" name="saddress1"  />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address 2 </label><br />
                                <input type="text" maxlength="50" class="form-control" name="saddress2"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City </label><br />
                                <input type="text" maxlength="25" class="form-control" name="scity"  />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State </label><br />
                                <select class="form-control" name="sstate">
                                    <option value="">Select State</option>
                                    <?php foreach($get_state as $key=>$val){ ?>
                                        <option value="<?php echo $val['id'];?>"><?php echo $val['name'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Zip Code </label><br />
                                <input type="text" maxlength="10" class="form-control" name="szip_code"  />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-Mail </label><br />
                                <input type="text" maxlength="50" class="form-control" name="semail"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Web Site </label><br />
                                <input type="text" maxlength="50" class="form-control" name="swebsite"  />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>General Contact </label><br />
                                <input type="text"  class="form-control" maxlength="30" name="sgeneral_contact" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>General Phone </label><br />
                                <input type="text"  class="form-control" maxlength="13" name="sgeneral_phone" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Operations Contact </label><br />
                                <input type="text"  class="form-control" maxlength="30" name="soperations_contact" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Operations Phone </label><br />
                                <input type="text"  class="form-control" maxlength="13" name="soperations_phone" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>DST System ID </label><br />
                                <input type="text" maxlength="15" class="form-control" name="sdst_system_id"  />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>DST Mgmt Code </label><br />
                                <input type="text" maxlength="15" class="form-control" name="sdst_mgmt_code"  />
                            </div>
                        </div>
                    </div>
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Exclude from DST Importing </label><br />
                                <input type="checkbox" class="checkbox"  name="sdst_import" id="cpa" value="1" style="display: inline;" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>DAZL Code </label><br />
                                <input type="text" maxlength="15" class="form-control" name="sdazl_code"  />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Exclude from DAZL Importing </label><br />
                                <input type="checkbox" class="checkbox"  name="sdazl_import" id="" value="1" style="display: inline;" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>DTCC/NSCC ID </label><br />
                                <input type="text" maxlength="15" class="form-control" name="sdtcc_nscc"  />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Clearing Firm ID </label><br />
                                <input type="checkbox" class="checkbox"  name="sclr_firm" id="" value="1" style="display: inline;" />
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="selectwrap">
                            <input type="hidden" name="id" id="id" value="<?php //echo $id; ?>" />
        					<input type="submit" name="sponser" onclick="waitingDialog.show();" value="Save"/>	
                            <a href="<?php echo CURRENT_PAGE;?>"><input type="button" name="cancel" value="Cancel" /></a>
                        </div>
                   </div>
                   </div>
                </form>
                </div>
                <?php
                    }if($_GET['action']=='view_sponsor'){?>
                <div class="panel">
            		<div class="panel-heading">
                        <div class="panel-control">
                            <div class="btn-group dropdown" style="float: right;">
                                <button type="button" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></button>
            					<ul class="dropdown-menu dropdown-menu-right" style="">
            						<li><a href="<?php echo CURRENT_PAGE; ?>?action=add_new_sponsor"><i class="fa fa-plus"></i> Add New</a></li>
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
                                         <td class="text-center">
                                            <?php
                                                if($val['status']==1){
                                                    ?>
                                                    <a href="<?php echo CURRENT_PAGE; ?>?action=sponsor_status&id=<?php echo $val['id']; ?>&status=0" class="btn btn-sm btn-success"><i class="fa fa-check-square-o"></i> Enabled</a>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <a href="<?php echo CURRENT_PAGE; ?>?action=sponsor_status&id=<?php echo $val['id']; ?>&status=1" class="btn btn-sm btn-warning"><i class="fa fa-warning"></i> Disabled</a>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo CURRENT_PAGE; ?>?action=edit_sponsor&id=<?php echo $val['id']; ?>" class="btn btn-md btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                            <a onclick="return conf('<?php echo CURRENT_PAGE; ?>?action=delete_sponsor&id=<?php echo $val['id']; ?>');" class="btn btn-md btn-danger confirm" ><i class="fa fa-trash"></i> Delete</a>
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
        </div>
    </div>
</div>
<script>
$('#demo-dp-range .input-daterange').datepicker({
        format: "mm/dd/yy",
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
</style>
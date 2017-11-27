<div class="container">
<h1>Product category</h1>
<div class="col-lg-12 well">
    <ul class="nav nav-pills nav-stacked col-md-2">
      <li><a href="#tab_a" data-toggle="pill">Products</a></li>
      <li><a href="#tab_b" data-toggle="pill">Sponsors</a></li>
    </ul>
    <div class="tab-content col-md-10">
            <div class="tab-pane" id="tab_a">
                <form name="frm" action="#" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
					<div class="row">
                        <div  class="col-sm-3 form-group">
                            <label>Product Category:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <select class="form-control" name="category">
                                <option value="">Select Product Category...</option>
                                <option value="1">529 Plans</option>
                                <option value="2">Agency Tax Credits</option>
                                <option value="3">Alternative Investments</option>
                                <option value="4">Bonds</option>
                                <option value="5">CDs</option>
                                <option value="6">Fixed Annuities</option>
                                <option value="7">Fixed Assets</option>
                                <option value="8">Hedge Funds</option>
                                <option value="9">Investment Banking</option>
                                <option value="10">Life Insurance</option>
                                <option value="11">Limited Partnerships</option>
                                <option value="12">Mutual Fund Trails</option>
                                <option value="13">Mutual Funds</option>
                                <option value="14">Options</option>
                                <option value="15">Private Placement</option>
                                <option value="16">REIT Trails</option>
                                <option value="17">REITs</option>
                                <option value="18">RIA</option>
                                <option value="19">Secondary Limited Partnerships</option>
                                <option value="20">Stocks</option>
                                <option value="21">UITs</option>
                                <option value="22">Variable Annuities</option>
                                <option value="23">Variable Annuity Trails</option>
                                <option value="24">Variable Universal Life</option>
                            </select>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Name:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="40" class="form-control" name="name"  />
                        </div>
                    </div>
                    <div class="row">
                        <div  class="col-sm-3 form-group">
                            <label>Sponsor :</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <select class="form-control" name="sponsor">
                                <option value="">Select Sponsor Category...</option>
                                <option value="1">Not required for Stocks</option>
                                <option value="2">Bonds</option>
                                <option value="3">Options</option>
                                <option value="4">CDs or UITs</option>
                            </select>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Ticker Symbol:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="6" class="form-control" name="ticker_symbol"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>CUSIP:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="11" class="form-control" name="cusip"  />
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Security:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="10" class="form-control" name="security"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="checkbox"  name="cpa" id="cpa" value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">Allowable Receivable</label>
                            </div>
                        </div>
                   </div><br />
                   <h3>Suitability:</h3>
                   <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>Income:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="income"  />
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Net Worth:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="networth"  />
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>Net Worth Only:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="networthonly"  />
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Minimum Investment:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="minimum_investment"  />
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>Minimum Offer:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="minimum_offer"  />
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Maximum Offer:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="9" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" name="maximum_ffer"  />
                        </div>
                   </div>
                   <div class="row">
                        <div  class="col-sm-3 form-group">
                            <label>Objectives :</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <select class="form-control" name="sponsor">
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
                                 <input type="checkbox"  name="cpa" id="cpa" value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">Non-Commissionable</label>
                            </div>
                        </div>
                   </div>
                   <h3>Mutual Funds:</h3>
                   <div class="row">
                        <div class="col-lg-3">
                            <label class="form-group">Class Type:</label>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="cpa" id="cpa" value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">A</label>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="cpa" id="cpa" value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">B</label>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="cpa" id="cpa" value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">C</label>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="cpa" id="cpa" value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">Other</label>
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>Fund Code</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="7" class="form-control" name="fund_code"  />
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="checkbox"  name="sweep_fee" id="cpa" value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">Waive Sweep Fee</label>
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>Threshold</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="9" class="form-control" name="threshold"  />
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Rate </label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" onblur="checkLength(this)" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="5" class="form-control" name="Rate"  />
                        </div>
                   </div>
                   <div class="row">
                        <div  class="col-sm-3 form-group">
                            <label>Investment Banking Type :</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <select class="form-control" name="ria_specific">
                                <option value="">Select Type...</option>
                                <option value="1">IPO</option>
                                <option value="2">Bridge</option>
                                <option value="3">Reg S</option>
                                <option value="4">Reg D</option>
                                <option value="5">Private Placement</option>
                            </select>
                        </div>
                        <div  class="col-sm-3 form-group">
                            <label>RIA specific Type :</label>
                        </div>
                        <div class="col-sm-3 form-group">
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
                                 <input type="radio"  name="based" value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">Asset Based</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="based"  value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">Fee Based</label><br />
                            </div>
                        </div>
                   </div><br />
                   <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>Fee Rate:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" onblur="checkLength(this)" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="5"   class="form-control" name="fee_rate"  />
                        </div>
                   </div>
                   <h3>Stocks, Bonds:</h3>
                   <div class="row"> 
                         <div class="col-lg-3">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="st_bo" value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">Listed</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="st_bo"  value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">OTC</label><br />
                            </div>
                        </div>
                   </div><br />
                   <h3>CDs, UITs, Bonds :</h3>
                   <div class="row"> 
                        <div class="col-sm-3 form-group">
                            <label>Maturity Date :</label>
                        </div>
                         <div class="col-sm-3">
                            <div class="form-group">
                                <div id="demo-dp-range">
                                    <div class="input-daterange input-group" id="datepicker">
                                        <input type="text" name="u4" id="u4" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div  class="col-sm-3 form-group">
                            <label>Type :</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <select class="form-control" name="type">
                                <option value="">Select Type...</option>
                                <option value="1">Government Municipal</option>
                                <option value="2">Corporate</option>
                                <option value="3">Treasury</option>
                                <option value="4">Zero Coupon</option>
                            </select>
                        </div>
                   </div>
                   
                   <h3>Variable Annuities:</h3>
                   <div class="row">
                        <div class="col-lg-3">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="var" value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">Single</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="radio"  name="var"  value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">Recurring</label><br />
                            </div>
                        </div>
                   </div><br />
                   <h4>Agency Tax Credits, Alternative Investments, Hedge Funds, Secondary Limited Partnerships:</h4>
                   <div class="row">
                        <div  class="col-sm-3 form-group">
                            <label>Registrtion Type:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <select class="form-control" name="reg_type">
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
        					<input type="button" name="proceed" class="btn btn-warning btn-lg btn3d " value="Proceed"/>
        					<input type="button" name="cancel" class="btn btn-warning btn-lg btn3d " value="Cancel"/>
                        </div>
                    </div>
			    </form> 
            </div>
            <div class="tab-pane" id="tab_b">
                <form name="frm2" method="POST" action="#">
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>Sponsor Name:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="25" class="form-control" name="sname"  />
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Address 1:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="50" class="form-control" name="saddress1"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>Address 2:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="50" class="form-control" name="saddress2"  />
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>City:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="25" class="form-control" name="scity"  />
                        </div>
                    </div>
                    <div class="row">
                        <div  class="col-sm-3 form-group">
                            <label>State:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <select class="form-control" name="reg_type">
                                <option value="">Select State...</option>
                            </select>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Zip Code:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="10" class="form-control" name="zip"  />
                        </div>                
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>E-Mail:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="50" class="form-control" name="smail"  />
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Web Site:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="50" class="form-control" name="swebsite"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>General Contact:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text"  class="form-control" name="scontact"  />
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>General Phone:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text"  class="form-control" name="sphone"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>Operations Contact:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text"  class="form-control" name="s_op_contact"  />
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>Operations Phone:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text"  class="form-control" name="s_op_phone"  />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>DST System:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="15" class="form-control" name="sdst"  />
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>DST Mgmt Code:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="15" class="form-control" name="sdstcode"  />
                        </div>        
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="checkbox"  name="dst_inmport" id="cpa" value="cpa" style="display: inline;" />
                              </span>
                              <label class="form-control">Exclude from DST Importing</label>
                            </div>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>DAZL Code:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="15" class="form-control" name="sdazl"  />
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
                              <span class="input-group-addon">
                                 <input type="checkbox"  name="sdaim" value="dazl_import" style="display: inline;" />
                              </span>
                              <label class="form-control">Exclude from DAZL Importing</label>
                            </div>
                        </div>
                        <div class="col-sm-3 form-group">
                            <label>DTCC/NSCC ID:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="15" class="form-control" name="dtcc_nscc"  />
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <label>Clearing Firm ID:</label>
                        </div>
                        <div class="col-sm-3 form-group">
                            <input type="text" maxlength="15" class="form-control" name="clr_firm"  />
                        </div> 
                    </div>
                    <div class="panel-footer">
                        <div class="selectwrap">
        					<input type="button" name="proceed" class="btn btn-warning btn-lg btn3d " value="Proceed"/>
        					<input type="button" name="cancel" class="btn btn-warning btn-lg btn3d " value="Cancel"/>
                        </div>
                    </div>
                </form>
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
</script>
<div class="container">
<h1>System Configuration</h1>
    <div class="col-lg-12 well">
        <form name="frm" action="#" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label style="float: right;">Company Name:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="cname"  />
                </div>
                <div class="col-sm-3 form-group">
                    <label style="float: right;">City:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="city"  />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label style="float: right;">Address 1:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="address1"  />
                </div>
                <div class="col-sm-3 form-group">
                    <label style="float: right;">Address 2:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="address2"  />
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label style="float: right;">State:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="state"  />
                </div>
                <div class="col-sm-3 form-group">
                    <label style="float: right;">Zip code:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="zip"  />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label style="float: right;">Logo:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="file" class="form-control" name="logo"  />
                </div>
                <div class="col-sm-3 form-group">
                    <label style="float: right;">Minimum Check Amount :</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="ch_amount"  />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label style="float: right;">FINRA Assessment:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="checkLength(this)" maxlength="8"  class="form-control" name="finra"  />
                </div>
                <div class="col-sm-3 form-group">
                    <label style="float: right;">SIPC Assessment:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="checkLength(this)" maxlength="8"  class="form-control" name="sipc"  />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-11">
                    <div class="form-group">
                        <input type="checkbox" class="checkbox" name="summarize_direct_imported_trades" style="display: inline;" id="summarize_direct_imported_trades" />&nbsp;
                        <label>Display Terminated Brokers on Pick-Lists</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <input type="checkbox" class="checkbox" name="summarize_direct_imported_trades" style="display: inline;" id="summarize_direct_imported_trades" />&nbsp;
                        <label>Display Terminated Branches of Pick-lists</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <input type="checkbox" class="checkbox" name="summarize_direct_imported_trades" style="display: inline;" id="summarize_direct_imported_trades" />&nbsp;
                        <label>Exclude Terminated Brokers on Statements</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
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
<script type="text/javascript">
function checkLength(el) {
  if (el.value.length < 6) {
    alert("length grater than 6 characters")
  }
}
</script>
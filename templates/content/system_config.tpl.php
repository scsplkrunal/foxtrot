<div class="container">
<h1>System Configurtion</h1>
    <div class="col-lg-12 well">
        <form name="frm" action="#" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label>Company Name:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="cname"  />
                </div>
                <div class="col-sm-3 form-group">
                    <label>Address 1:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="address1"  />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label>Address 2:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="address2"  />
                </div>
                <div class="col-sm-3 form-group">
                    <label>City:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="city"  />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label>State:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="state"  />
                </div>
                <div class="col-sm-3 form-group">
                    <label>Zip code:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="zip"  />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label>Logo:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="file" class="form-control" name="logo"  />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label>Minimum Check Amount :</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="ch_amount"  />
                </div>
                <div class="col-sm-3 form-group">
                    <label>FINRA Assessment:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="checkLength(this)" maxlength="8"  class="form-control" name="finra"  />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label>SIPC Assessment:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="checkLength(this)" maxlength="8"  class="form-control" name="sipc"  />
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                      <span class="input-group-addon">
                         <input type="checkbox"  name="broker" value="broker" style="display: inline;" />
                      </span>
                      <label class="form-control">Display Terminated Brokers on Pick-Lists</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                      <span class="input-group-addon">
                         <input type="checkbox"  name="branch" value="branch" style="display: inline;" />
                      </span>
                      <label class="form-control">Display Terminated Branches of Pick-lists</label>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                      <span class="input-group-addon">
                         <input type="checkbox"  name="bro_sta" value="bro_sta" style="display: inline;" />
                      </span>
                      <label class="form-control">Exclude Terminated Brokers on Statements</label>
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
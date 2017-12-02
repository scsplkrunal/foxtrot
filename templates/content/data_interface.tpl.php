<div class="container">
<h1>Date Interfaces</h1>
    <div class="col-lg-12 well">
        <ul class="nav nav-pills nav-stacked col-md-2">
          <li class="active"><a href="#tab_a" data-toggle="pill">DST IDC</a></li>
          <li><a href="#tab_b" data-toggle="pill">DST FANMail</a></li>
          <li><a href="#tab_c" data-toggle="pill">DAZL Daily</a></li>
          <li><a href="#tab_d" data-toggle="pill">DAZL Commissions</a></li>
          <li><a href="#tab_e" data-toggle="pill">NFS/Fidelity</a></li>
          <li><a href="#tab_f" data-toggle="pill">Pershing</a></li>
          <li><a href="#tab_g" data-toggle="pill">Raymond James</a></li>
          <li><a href="#tab_h" data-toggle="pill">RBC Dain</a></li>
        </ul>
        <div class="tab-content col-md-10">
                <div class="tab-pane active" id="tab_a">
                    <form name="frm" action="data_interface.php" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
    					<div class="col-sm-12">				
    						<div class="row">
    							<div class="col-sm-6 form-group">
    								<label>UserName</label>
    								<input type="text" name="uname" placeholder="Enter Username Here.." class="form-control" />
    							</div>		
    							<div class="col-sm-6 form-group">
    								<label>Password</label>
    								<input type="password" name="pass" placeholder="Enter Password Here.." class="form-control" />
    							</div>	
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Exclude Non-Commissionable Trade Activity </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch1" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Add Clients if Not Found </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch2" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Update Existing Clients </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch3" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Local Folder </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="file" name="flup" class="form-control" webkitdirectory mozdirectory msdirectory odirectory directory  />
                                    <!--input type="file" name="file1"   /-->
                                </div>
                            </div>	
                            <div class="selectwrap">
            					<input type="submit" onclick="waitingDialog.show();" name="submit1" value="Save"/>	
                                <input type="button" name="clear" value="Clear" />
                            </div>				
    					</div>
				    </form> 
                </div>
                <div class="tab-pane" id="tab_b">
                     <form name="frm" action="#" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
    					<div class="col-sm-12">				
    						<div class="row">
    							<div class="col-sm-6 form-group">
    								<label>UserName</label>
    								<input type="text" name="uname" placeholder="Enter Username Here.." class="form-control" />
    							</div>		
    							<div class="col-sm-6 form-group">
    								<label>Password</label>
    								<input type="password" name="pass" placeholder="Enter Password Here.." class="form-control" />
    							</div>	
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Exclude Non-Commissionable Trade Activity </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch1" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Add Clients if Not Found </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch2" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Update Existing Clients </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch3" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Local Folder </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="file" class="form-control" name="flup" class="form-control" webkitdirectory mozdirectory msdirectory odirectory directory />
                                </div>
                            </div>	
                            <div class="selectwrap">
            					<input type="submit" onclick="waitingDialog.show();" name="submit" value="Save"/>	
                                <input type="button" name="clear" value="Clear" />
                            </div>				
    					</div>
				    </form> 
                </div>
                <div class="tab-pane" id="tab_c">
                     <form name="frm" action="#" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
    					<div class="col-sm-12">				
    						<div class="row">
    							<div class="col-sm-6 form-group">
    								<label>UserName</label>
    								<input type="text" name="uname" placeholder="Enter Username Here.." class="form-control" />
    							</div>		
    							<div class="col-sm-6 form-group">
    								<label>Password</label>
    								<input type="password" name="pass" placeholder="Enter Password Here.." class="form-control" />
    							</div>	
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Exclude Non-Commissionable Trade Activity </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch1" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Add Clients if Not Found </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch2" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Update Existing Clients </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch3" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Local Folder </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="file" class="form-control" name="flup" class="form-control" webkitdirectory mozdirectory msdirectory odirectory directory />
                                </div>
                            </div>	
                            <div class="selectwrap">
            					<input type="submit" onclick="waitingDialog.show();" name="submit" value="Save"/>	
                                <input type="button" name="clear" value="Clear" />
                            </div>				
    					</div>
				    </form> 
                </div>
                <div class="tab-pane" id="tab_d">
                     <form name="frm" action="#" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
    					<div class="col-sm-12">				
    						<div class="row">
    							<div class="col-sm-6 form-group">
    								<label>UserName</label>
    								<input type="text" name="uname" placeholder="Enter Username Here.." class="form-control" />
    							</div>		
    							<div class="col-sm-6 form-group">
    								<label>Password</label>
    								<input type="password" name="pass" placeholder="Enter Password Here.." class="form-control" />
    							</div>	
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Exclude Non-Commissionable Trade Activity </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch1" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Add Clients if Not Found </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch2" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Update Existing Clients </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch3" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Local Folder </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="file" class="form-control" name="flup" class="form-control" webkitdirectory mozdirectory msdirectory odirectory directory />
                                </div>
                            </div>	
                            <div class="selectwrap">
            					<input type="submit" onclick="waitingDialog.show();" name="submit" value="Save"/>	
                                <input type="button" name="clear" value="Clear" />
                            </div>				
    					</div>
				    </form> 
                </div>
                <div class="tab-pane" id="tab_e">
                    <form name="frm" action="#" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
    					<div class="col-sm-12">
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Exclude Non-Commissionable Trade Activity </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch1" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Add Clients if Not Found </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch2" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Update Existing Clients </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch3" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Local Folder </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="file" class="form-control" name="flup" class="form-control" webkitdirectory mozdirectory msdirectory odirectory directory />
                                </div>
                            </div>	
                            <div class="selectwrap">
            					<input type="submit" onclick="waitingDialog.show();" name="submit" value="Save"/>	
                                <input type="button" name="clear" value="Clear" />
                            </div>				
    					</div>
				    </form> 
                </div>
                <div class="tab-pane" id="tab_f">
                     <form name="frm" action="#" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
    					<div class="col-sm-12">				
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Exclude Non-Commissionable Trade Activity </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch1" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Add Clients if Not Found </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch2" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Update Existing Clients </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch3" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Local Folder </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="file" class="form-control" name="flup" class="form-control" webkitdirectory mozdirectory msdirectory odirectory directory />
                                </div>
                            </div>	
                            <div class="selectwrap">
            					<input type="submit" onclick="waitingDialog.show();" name="submit" value="Save"/>	
                                <input type="button" name="clear" value="Clear" />
                            </div>				
    					</div>
				    </form> 
                </div>
                <div class="tab-pane" id="tab_g">
                     <form name="frm" action="#" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
    					<div class="col-sm-12">				
    						<div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Exclude Non-Commissionable Trade Activity </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch1" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Add Clients if Not Found </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch2" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Update Existing Clients </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch3" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Local Folder </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="file"  class="form-control" name="flup" class="form-control" webkitdirectory mozdirectory msdirectory odirectory directory />
                                </div>
                            </div>	
                            <div class="selectwrap">
            					<input type="submit" onclick="waitingDialog.show();" name="submit" value="Save"/>	
                                <input type="button" name="clear" value="Clear" />
                            </div>				
    					</div>
				    </form> 
                </div>
                <div class="tab-pane" id="tab_h">
                     <form name="frm" action="#" method="POST" onsubmit="return validation();" enctype="multipart/form-data">
    					<div class="col-sm-12">			
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Exclude Non-Commissionable Trade Activity </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch1" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Add Clients if Not Found </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch2" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Update Existing Clients </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="checkbox" name="ch3" onclick="chk_all_class(this.checked)"  class="form-control" />
                                </div>
                            </div>	
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Local Folder </label>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="file" class="form-control" name="flup" class="form-control" webkitdirectory mozdirectory msdirectory odirectory directory />
                                </div>
                            </div>	
                            <div class="selectwrap">
            					<input type="submit" onclick="waitingDialog.show();" name="submit" value="Save"/>	
                                <input type="button" name="clear" value="Clear" />
                            </div>				
    					</div>
				    </form> 
                </div>
        </div>
   </div>
</div>

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
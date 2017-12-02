<div class="container">
<h1>System Configuration</h1>
    <div class="col-lg-12 well">
        <form class="form-validate-system" name="frm" action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label style="float: right;">Company Name:</label>
                </div>
                <div class="col-sm-3 form-group">
                
                    <input type="text" class="form-control"  name="cname" required="required" />
                </div>
                <div class="col-sm-3 form-group">
                    <label style="float: right;">Address 1:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="address1" required="required" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label style="float: right;">Address 2:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="address2"   required="required"/>
                </div>
                <div class="col-sm-3 form-group">
                    <label style="float: right;">City:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="city"  required="required"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label style="float: right;">State:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="state"  required="required"/>
                </div>
                <div class="col-sm-3 form-group">
                    <label style="float: right;">Zip code:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" name="zip" required="required" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label style="float: right;">Minimum Check Amount :</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" class="form-control" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="ch_amount"  />
                </div>
                <div class="col-sm-3 form-group">
                    <label style="float: right;">FINRA Assessment:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8" required="required"  class="form-control" name="finra"  />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 form-group">
                    <label style="float: right;">SIPC Assessment:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="8" required="required"  class="form-control" name="sipc"  />
                </div>
                <div class="col-sm-3 form-group">
                    <label style="float: right;">Logo:</label>
                </div>
                <div class="col-sm-3 form-group">
                    <input type="file" class="form-control" name="logo"  />
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
					<input type="submit" class="btn btn-warning btn-lg btn3d " value="Proceed"/>
                    <!-- <input type="button" name="proceed" onclick="waitingDialog.show();" class="btn btn-warning btn-lg btn3d " value="Proceed"/> -->
					<input type="button" name="cancel" class="btn btn-warning btn-lg btn3d " value="Cancel"/>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">

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
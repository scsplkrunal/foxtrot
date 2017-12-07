<div class="container">
<h1>Client Reassignment</h1>
    <div class="col-md-12 well">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>From Broker </label>
                    <select class="form-control" name="from_broker">
                        <option value="">Select From</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>To Broker </label>
                    <select class="form-control" name="to_broker">
                        <option value="">Select To</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                        <option value="4">Option 4</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>List Of Ressigned Client </label><br />
                    <input type="radio" class="radio" name="output" id="output_to_screen" style="display: inline;" checked="checked" /> Output to Screen&nbsp;&nbsp;&nbsp;
                    <input type="radio" class="radio" name="output" id="output_to_printer" style="display: inline;" /> Output to Printer&nbsp;&nbsp;&nbsp;
                    <input type="radio" class="radio" name="output" id="output_to_pdf" style="display: inline;" /> Output to PDF
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="selectwrap">
				<div class="selectwrap">
                    <input type="hidden" name="id" id="id" value="<?php //echo $id; ?>" />
					<input type="submit" name="submit" onclick="waitingDialog.show();" value="Save"/>	
                    <a href="<?php echo CURRENT_PAGE;?>"><input type="button" name="cancel" value="Cancel" /></a>
                </div>
            </div>
        </div>
        
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
				message = 'processing...';
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
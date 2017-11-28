<div class="container">
<h1>OFAC &amp; FINCEN</h1>
    <div class="col-lg-12 well">
        <ul class="nav nav-pills nav-stacked col-md-2">
          <li class="active"><a href="#tab_a" data-toggle="pill">Connect &amp; Download OFAC</a></li>
          <li><a href="#tab_b" data-toggle="pill">OFAC Complete System Scan</a></li>
          <li><a href="#tab_c" data-toggle="pill">Connect &amp; Download FINCEN</a></li>
          <li><a href="#tab_d" data-toggle="pill">FINCEN Complete System Scan</a></li>
        </ul>
        <div class="tab-content col-md-10">
                <div class="tab-pane active" id="tab_a">
                        <div class="selectwrap"><center>
                					<input type="button" name="connect" class="btn btn-warning btn-lg btn3d" onclick="waitingDialog.show();setTimeout(function () {waitingDialog.hide();}, 5000);" value="OFAC Connect And Download" />
                        </div>
                   
                </div>
                <div class="tab-pane " id="tab_b">
                    <div class="selectwrap">
                        <div class="row"><center>
            					<input type="button" name="connect" class="btn btn-warning btn-lg btn3d" onclick="waitingDialog.show();setTimeout(function () {waitingDialog.hide();}, 5000);" value="OFAC System Scan"/></center>
                        </div>
                    </div>
                </div>
                <div class="tab-pane " id="tab_c">
                    <div class="selectwrap">
                        <div class="row"><center>
            					<input type="button" name="connect" class="btn btn-warning btn-lg btn3d" onclick="waitingDialog.show();setTimeout(function () {waitingDialog.hide();}, 5000);" value="FINCEN Connect And Sownload"/>	
                        </div>
                    </div>
                </div>
                <div class="tab-pane " id="tab_d">
                    <div class="selectwrap">
                        <div class="row"><center>
            					<input type="button" name="connect" class="btn btn-warning btn-lg btn3d" onclick="waitingDialog.show();setTimeout(function () {waitingDialog.hide();}, 5000);" value="FINCEN System Scan"/></center>
                        </div>
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
				message = 'Connecting...';
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
		hide: function () {
			$dialog.modal('hide');
            window.open('http://www.website.com/page');
		}
	};

})(jQuery);
</script>
/**
 * THESE LINES OF CODES BELOW NEEDS JQUERY
 */

/* EXPAND WIDGETS AREA - THE TRIGGER BUTTON */
jQuery(document).ready(function($) {

	$(document).scroll(function() {
    	var y = $(this).scrollTop();
    	if ( y > 100 ) {
      		$( '#toggle-modal-scroll' ).fadeIn();
    	} else {
      		$( '#toggle-modal-scroll' ).fadeOut();
    	}
  	});

  	$(function () {
  		$('[data-toggle="tooltip"]').tooltip();
	});

});

(function ($) {
	"use strict";

	$(window).load(function() {
      var menu      =  $('#xshop-menu');
        menu.slicknav({
        	'allowParentLinks': true,
        	'nestedParentLinks': true
        });
	});
	
    //document ready function
    jQuery(document).ready(function($){
		

		 $("#xshop-menu").xblogAccessibleDropDown();

        }); // end document ready

    	

    	    $.fn.xblogAccessibleDropDown = function () {
			    var el = $(this);

			    /* Make dropdown menus keyboard accessible */

			    $("a", el).focus(function() {
			        $(this).parents("li").addClass("hover");
			    }).blur(function() {
			        $(this).parents("li").removeClass("hover");
			    });
			}

}(jQuery));	
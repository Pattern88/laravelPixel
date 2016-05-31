/**
 * File: pixel.js
 *
 * Handle popup snipet script
 *
 */
 

/**
 * Check if jquery script is loaded, if not... load it automatically
 *
 * 
 */ 
function checkIfJquerySet(){
	// To Do: create the function
}


/**
 * get popup configuration data and acrivate it
 *
 * @params string popupLocation, popupTrigger
 * 
 */ 
function activatePopup(popupTrigger,popupLocation){
	createAndInjectPopup(popupLocation);
	setPopupTrigger(popupTrigger);
}

/**
 * Generate boostrap model as popup and inject it to the website
 *
 * @params string popupLocation
 * 
 */ 
function createAndInjectPopup(popupLocation)
{
	//get the popup location setting
    popupLocationStyle = getPopupLocation(popupLocation);
	
	popup = '<div id="myModal" class="modal fade" role="dialog" '+popupLocationStyle+'>';
	popup +=			'<div class="modal-dialog" style="width:300px;margin:0px auto;background-color:white;"';
	popup +=				'<div class="modal-content">';
	popup +=					'<div class="modal-header">';
	popup +=						'<button type="button" class="close" data-dismiss="modal">&times;</button>';
	popup +=						'<h4 class="modal-title">Pupup</h4>';
	popup +=					'</div>';
	popup +=					'<div class="modal-body">';
	popup +=						'Hello World!!!';
	popup +=					'</div>';
	popup +=					'<div class="modal-footer">';
	popup +=						'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
	popup +=					'</div>';
	popup +=				'</div>';
	popup +=		    '</div>';
	popup +=		'</div>';
	
	// insert popup into body tag
    $("body").append(popup);
}


/**
 * Show return the popup location via style attribute
 *
 * @params string popupLocation
 * @return string
 */
function getPopupLocation(popupLocation){
	// top right
	if (popupLocation == "top_right"){
		return 'style="left:initial;bottom:initial"';

	//bottom left
	}else if (popupLocation == "bottom_left"){
		return 'style="top:initial;right:initial"';
		
	// center	
	}else if (popupLocation == "screen_center"){
		return 'style="margin-top:200px"';
	}
}

/**
 * Set the popup trigger and toggle it
 *
 * @params string popupLocation
 */ 
function setPopupTrigger(popupTrigger){
	
	// trigger if User close tab
	if (popupTrigger == "user_close_tab"){
		mouseleaveFlag = true;
		$(document).mouseleave(function () {
			if (mouseleaveFlag){
				$('#myModal').modal('show');
				mouseleaveFlag = false;
			}
		});

	// trigger if 5 seconds was passed after page load
	}else if (popupTrigger == "5_second_after_load"){
		$(function() {
			setTimeout(function() {
			   $('#myModal').modal('show');
			}, 5000);
		});
			
	// // trigger if user scroll down 25% of the page
	}else if (popupTrigger == "scroll_25_percent_down"){
		var pageHeight = $( window ).height();
		var scrolToTrigger = pageHeight*0.25;
		var scrollFlag = true;
		$( window ).scroll(function() {   
			if ($(document).scrollTop() >= scrolToTrigger && scrollFlag) {
				$('#myModal').modal('show');
				scrollFlag = false;
			}
		});
	}
}


/**
 * Genrate the popup injection
 *
 * 
 */ 
function initiatePopup(){
	
	// checkIfJquerySet()
	
	domain = window.location.href;

	$.get( "http://homestead.app/popups/"+user_id+"?domain="+domain,{

	}, "json")
		.done(function(data) {
			activatePopup(data.popupTrigger,data.popupLocation);
		})
		.fail(function(data) {
			alert("Error! Try again later!");
		});
}

initiatePopup();
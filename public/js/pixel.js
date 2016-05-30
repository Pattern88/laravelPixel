/**
 *
 *
 *
 *
 */

function checkIfJquerySet(){
	// To Do: Check if jquery script is loaded, if not... load it automatically
}

// checkIfJquerySet()


var domain = window.location.href;

//$( document ).ready(function(){
	$.get( "http://homestead.app/pixels/"+user_id+"?domain="+domain,{

	}, "json")
		.done(function(data) {
			activatePopup(data.popupTrigger,data.popupLocation);
		})
		.fail(function(data) {
			alert("Error! Try again later!");
		});
//});

	
function activatePopup(popupTrigger,popupLocation){
	createAndInjectPopup(popupLocation);
	setPopupTrigger(popupTrigger);
}
		
function createAndInjectPopup(popupLocation)
{
    popupLocationStyle = getPopupLocation(popupLocation);
	model = '<div id="myModal" class="modal fade" role="dialog" '+popupLocationStyle+'>';
	model +=			'<div class="modal-dialog" style="width:300px;margin:0px auto;"';
	model +=				'<div class="modal-content">';
	model +=					'<div class="modal-header">';
	model +=						'<button type="button" class="close" data-dismiss="modal">&times;</button>';
	model +=						'<h4 class="modal-title">Pupup</h4>';
	model +=					'</div>';
	model +=					'<div class="modal-body">';
	model +=						'Hello World!!!';
	model +=					'</div>';
	model +=					'<div class="modal-footer">';
	model +=						'<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
	model +=					'</div>';
	model +=				'</div>';
	model +=		    '</div>';
	model +=		'</div>';
	
    $("body").append(model);
}


function getPopupLocation(popupLocation){
	// top right
	if (popupLocation == 1){
		return 'style="left:initial;bottom:initial"';

	//bottom left
	}else if (popupLocation == 2){
		return 'style="top:initial;right:initial"';
		
	// center	
	}else if (popupLocation == 3){
		return 'style="margin-top:100px"';
	}
}


function setPopupTrigger(popupTrigger){
	// top right
	if (popupTrigger == 1){
		mouseleaveFlag = true;
		$(document).mouseleave(function () {
			if (mouseleaveFlag){
				$('#myModal').modal('show');
				mouseleaveFlag = false;
			}
		});

	//bottom left
	}else if (popupTrigger == 2){
		$(function() {
			// setTimeout() function will be fired after page is loaded
			// it will wait for 5 sec. and then will fire
			setTimeout(function() {
			   $('#myModal').modal('show');
			}, 5000);
		});
			
	// center	
	}else if (popupTrigger == 3){
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
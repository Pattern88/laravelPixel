
function setPopupLocation(popupLocation){
	// top right
	if (popupLocation == 1){
		$('.model').css('left', 'initial !important' );
		$('.model').css('bottom', 'initial !important' );

	//bottom left
	}else if (popupLocation == 2){
		$('.model').css('right', 'initial !important' );
		$('.model').css('top', 'initial !important' );
		
	// center	
	}else if (popupLocation == 3){
		$('.modal-dialog').css('margin-yop', '100px !important' );
	}
}


function setPopupTrigger(popupTrigger){
	// top right
	if (popupTrigger == 1){
		var mouseleaveFlag = true;
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
		var height = $( window ).height();
		var scrolTo = height*0.25;
		var scrollFlag = true;
		$( window ).scroll(function() {   
			if ($(document).scrollTop() >= scrolTo && scrollFlag) {
				$('#myModal').modal('show');
				scrollFlag = false;
			}
		});
	}
}

var domain      = window.location.href;
var	popupTrigger = 2;
var	popupLocation = 1;
$.get( "http://homestead.app/pixels/"+user_id+"?domain="+domain,{

}, "json")
	.done(function(data) {
		console.log(data);
		activatePopup(data.popupTrigger,data.popupLocation);
		console.log( "second success" );
	})
	.fail(function(data) {
		console.log( data);
		activatePopup(1,2);
	  })
	.always(function(data) {
		console.log( data);
		console.log( "finished" );
	});

	
function activatePopup(popupTrigger,popupLocation){
	doModal();
	setPopupTrigger(popupTrigger);
	setPopupLocation(popupLocation);
}
		
function doModal()
{
    
	model = '<div id="myModal" class="modal fade" role="dialog" data-user="test">';
	model +=			'<div class="modal-dialog">';
	model +=				'<div class="modal-content">';
	model +=					'<div class="modal-header">';
	model +=						'<button type="button" class="close" data-dismiss="modal">&times;</button>';
	model +=						'<h4 class="modal-title">Pup-Up Pixel</h4>';
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
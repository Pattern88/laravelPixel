@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	@include('popups.message')

		<div class="panel panel-default">
			<div class="panel-heading">
				Popup Pixel
			<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-info pull-right btn-xs" data-toggle="modal" data-target="#myModal">Create Popup</button>
							
			</div>
				<div class="panel-body">
					&lt;!-- Popup snipet script - Start --&gt <br>
					&lt;script language="javascript"&gt<br>
					var user_id={{Auth::user()->id}};			
					document.addEventListener("DOMContentLoaded", function (event) {
					(function(){
					  var script=document.createElement('script');
					  script.async=true;
					  script.src='http://ec2-52-38-72-95.us-west-2.compute.amazonaws.com/js/pixel.js';
					  document.getElementsByTagName('script')[0].appendChild(script);
					})();});<br>
					&lt;/script&gt <br>
					&lt;!-- Popup Snipet script - End --&gt <br>
					
					<!--img src="http://homestead.app/test/test?uid={{Auth::user()->id}}-->
				</div>
		</div>
	</div>	

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Create New Popup</h4>
		  </div>

		  <div class="modal-body">
			{!! Form::open(array('url' => 'popups/store', 'role' => 'form')) !!}
				<div class="form-group">
					{!! Form::label('url', 'Website Url',$attributes = array('for'=>'url')) !!}
					{!! Form::text('url', $value = null, $attributes = array('class' => 'form-control')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('popup trigger', 'Popup Trigger',$attributes = array('for'=>'popup trigger')) !!}
					{!! Form::select('popupTrigger', array('user_close_tab' => 'When user closing tab', '5_second_after_load' => '5 second after page loading', 'scroll_25_percent_down' => 'After scrolling 25% down'), null, ['placeholder' => 'Select the pop-up trigger...' , 'class' => 'form-control']) !!}
				</div>
				
				<div class="form-group">
					{!! Form::label('popup location', 'Popup Location',$attributes = array('for'=>'popup location')) !!}
					{!! Form::select('popupLocation', array('screen_center' => 'Center of the screen', 'top_right' => 'Top right side', 'bottom_left' => 'Bottom left side'), null, ['placeholder' => 'Select the pop-up location...' , 'class' => 'form-control']) !!}
				</div>
		  </div>
		  <div class="modal-footer">
			{!! Form::submit('Create Popup!', array('class' => 'btn btn-primary')) !!}
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		  {!! Form::close() !!}
		</div>

	  </div>
	</div>	
</div>
@endsection

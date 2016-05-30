@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	@include('pixels.message')

		<div class="panel panel-default">
			<div class="panel-heading">Popup Pixel </div>
				<div class="panel-body">
					&lt;!-- Pop-Up snipet script - Start --&gt <br>
					&lt;script language="javascript"&gt<br>
					var user_id={{Auth::user()->id}};			
					document.addEventListener("DOMContentLoaded", function (event) {
					(function(){
					  var script=document.createElement('script');
					  script.async=true;
					  script.src='http://homestead.app/js/pixel.js';
					  document.getElementsByTagName('script')[0].appendChild(script);
					})();});<br>
					&lt;/script&gt <br>
					&lt;!-- Pop-Up Snipet script - End --&gt <br>
					
					<!--img src="http://homestead.app/test/test?uid={{Auth::user()->id}}-->
				</div>
		</div>
	</div>
	<div class="row">	
		<h2>
			Popup's 	
			<a href="/pixels/create" class="btn btn-success pull-right">Create New Popup</a>
			<!-- Trigger the modal with a button 
			<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal">Open Popup</button-->
			
		</h2>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>url</th>
					<th>Popup Trigger</th>
					<th>Popup Location</th>
					<th>Created Time</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($pixels->all() as $popup)
				<tr>
					<td><a href="{{$popup->url}}" target="_blank">{{$popup->url}}</td>
					<td>{{$popup->popup_trigger}}</td>
					<td>{{$popup->popup_location}}</td>
					<td>{{$popup->created_at}}</td>
					<td>
					<!-- delete the user (uses the destroy method DESTROY /users/{id} -->
						<!-- we will add this later since its a little more complicated than the other two buttons -->
						{!! Form::open(array('url' => 'pixels/' . $popup->id.'/delete', 'role' => 'form')) !!}
							{!! Form::hidden('_method', 'DELETE') !!}
							{!! Form::submit('Delete Popup', array('class' => 'btn btn-danger')) !!}
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>	

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Create New Pup-Up Pixel</h4>
		  </div>

		  <div class="modal-body">
			{!! Form::open(array('url' => 'pixels/store', 'role' => 'form')) !!}
				<div class="form-group">
					{!! Form::label('url', 'Website Url',$attributes = array('for'=>'url')) !!}
					{!! Form::text('url', $value = null, $attributes = array('class' => 'form-control')) !!}
				</div>

				<div class="form-group">
					{!! Form::label('popup trigger', 'Popup Trigger',$attributes = array('for'=>'popup trigger')) !!}
					{!! Form::select('popupTrigger', array('1' => 'When user closing tab', '2' => '5 second after page loading', '3' => 'After scrolling 25% down'), null, ['placeholder' => 'Select the pop-up trigger...' , 'class' => 'form-control']) !!}
				</div>
				
				<div class="form-group">
					{!! Form::label('popup location', 'Popup Location',$attributes = array('for'=>'popup location')) !!}
					{!! Form::select('popupLocation', array('1' => 'Center of the screen', '2' => 'Top right side', '3' => 'Bottom left side'), null, ['placeholder' => 'Select the pop-up location...' , 'class' => 'form-control']) !!}
				</div>
		  </div>
		  <div class="modal-footer">
			{!! Form::submit('Create Pop-Up!', array('class' => 'btn btn-primary')) !!}
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		  {!! Form::close() !!}
		</div>

	  </div>
	</div>	
</div>
@endsection
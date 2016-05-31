@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	@include('popups.message')
	</div>
	<div class="row">	
		<h2>
			Popup's 	
			<a href="/popups/create" class="btn btn-success pull-right">Create New Popup</a>
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
				@foreach ($popups->all() as $popup)
				<tr>
					<td><a href="{{$popup->url}}" target="_blank">{{$popup->url}}</td>
					<td>{{$popup->popup_trigger}}</td>
					<td>{{$popup->popup_location}}</td>
					<td>{{$popup->created_at}}</td>
					<td>
					<!-- delete the user (uses the destroy method DESTROY /users/{id} -->
						<!-- we will add this later since its a little more complicated than the other two buttons -->
						{!! Form::open(array('url' => 'popups/' . $popup->id.'/delete', 'role' => 'form')) !!}
							{!! Form::hidden('_method', 'DELETE') !!}
							{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
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
			{!! Form::open(array('url' => 'popups/store', 'role' => 'form')) !!}
				<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
					{!! Form::label('url', 'Website Url',$attributes = array('for'=>'url', 'class' => 'control-label')) !!}
					{!! Form::text('url', $value = null, $attributes = array('class' => 'form-control')) !!}
					@if ($errors->has('url'))
						<span class="help-block">
							<strong>{{ $errors->first('url') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group{{ $errors->has('popupTrigger') ? ' has-error' : '' }}">
					{!! Form::label('popup trigger', 'Popup Trigger',$attributes = array('for'=>'popup trigger', 'class' => 'control-label')) !!}
					{!! Form::select('popupTrigger', array('user_close_tab' => 'When user closing tab', '5_second_after_load' => '5 second after page loading', 'scroll_25_percent_down' => 'After scrolling 25% down'), null, ['placeholder' => 'Select the pop-up trigger...' , 'class' => 'form-control']) !!}
					@if ($errors->has('popupTrigger'))
						<span class="help-block">
							<strong>{{ $errors->first('popupTrigger') }}</strong>
						</span>
					@endif
				</div>
				
				<div class="form-group{{ $errors->has('popupLocation') ? ' has-error' : '' }}">
					{!! Form::label('popup location', 'Popup Location',$attributes = array('for'=>'popup location', 'class' => 'control-label')) !!}
					{!! Form::select('popupLocation', array('screen_center' => 'Center of the screen', 'top_right' => 'Top right side', 'bottom_left' => 'Bottom left side'), null, ['placeholder' => 'Select the pop-up location...' , 'class' => 'form-control']) !!}
					@if ($errors->has('popupLocation'))
						<span class="help-block">
							<strong>{{ $errors->first('popupLocation') }}</strong>
						</span>
					@endif							
				</div>
		</div>
		<div class="modal-footer">
			{!! Form::submit('Create Pop-Up!', array('class' => 'btn btn-primary')) !!}
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			{!! Form::close() !!}
		</div>
		
	</div>

	  </div>
	</div>	
</div>
@endsection
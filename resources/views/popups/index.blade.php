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
							{!! Form::submit('Delete', array('class' => 'btn btn-danger bth-xs')) !!}
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	  </div>
	</div>	
</div>
@endsection
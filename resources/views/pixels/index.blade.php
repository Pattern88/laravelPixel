@extends('layouts.app')

@section('content')
<div class="container">
  <!-- will be used to show any messages -->
	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	
	<!-- if there are creation errors, they will show here -->
	@foreach ($errors->all() as $error)
		<div class="alert alert-danger">{{ $error }}</div>
	@endforeach
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Pixel</div>
					<div class="panel-body">
						&lt;img src="http://homestead.app/test/test?uid={{Auth::user()->id}}"&gt;
					</div>
            </div>
        </div>
					<!-- Trigger the modal with a button -->
			<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

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
</div>
@endsection
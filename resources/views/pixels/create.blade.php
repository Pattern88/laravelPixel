@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-md-6 col-md-offset-2">
			 <!-- will be used to show any messages -->
			@if (Session::has('message'))
				<div class="alert alert-info">{{ Session::get('message') }}</div>
			@endif
			
			<!-- if there are creation errors, they will show here -->
			@if ($errors->all())
				<div class="alert alert-danger">
					<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
					</ul>
				</div>
			@endif
            <div class="panel panel-default">
                <div class="panel-heading">Create New Pop-Up</div>
					<div class="panel-body">
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
							{!! Form::submit('Create Pop-Up!', array('class' => 'btn btn-primary')) !!}
						{!! Form::close() !!}
					</div>
            </div>
        </div>
    </div>
</div>
@endsection
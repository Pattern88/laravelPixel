@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	@include('popups.message')
		<div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Create New Popup</div>
					<div class="panel-body">
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
							{!! Form::submit('Create Popup!', array('class' => 'btn btn-primary pull-right')) !!}
						{!! Form::close() !!}
					</div>
            </div>
        </div>
    </div>
</div>
@endsection
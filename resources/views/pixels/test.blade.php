@extends('layouts.app')

@section('content')

		<h1>Showing {{ $user->email }}</h1>

		<div class="jumbotron text-center">
			<h2>{{$user->email }}</h2>
			<p>
				<strong>Email:</strong> {{ $user->email }}
			</p>
		</div>	
@stop
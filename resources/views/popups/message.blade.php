
	<!-- will be used to show any messages -->
	@if (Session::has('message'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('message') }}
		</div>
	@endif

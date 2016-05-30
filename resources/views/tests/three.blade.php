@extends('layouts.app')

@section('content')

<div class="container" height="1900" width="200">
    <div class="row">
    </div>
</div>
@endsection

<!-- Pop-Up snipet script - Start -->
<script language="javascript">
var user_id = {{Auth::user()->id}};
document.addEventListener("DOMContentLoaded", function (event) {
(function(){
	var script = document.createElement('script');
	script.async = true;
	script.src = 'http://homestead.app/js/pixel.js';
	document.getElementsByTagName('script')[0].appendChild(script);
})();
});
</script>
<!-- Pop-Up Snipet script - End -->

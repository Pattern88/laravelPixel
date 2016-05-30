@extends('layouts.app')

@section('content')

<style>
.modal-dialog{
	width: 300px;
	margin: 0px auto;
}
</style>
<div class="container" height="1900" width="200">
    <div class="row">
    </div>
</div>
@endsection
	<!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 
<!-- Pop-Up snipet script - Start -->
<script language="javascript">
var user_id = {{Auth::user()->id}};

(function(){
  var script = document.createElement('script');
  script.async = true;
  script.src = 'http://homestead.app/js/pixel.js';
  var ref = document.getElementsByTagName('script')[0];
  ref.parentNode.insertBefore(script, ref);
})();
</script>
<!-- Pop-Up Snipet script - End -->

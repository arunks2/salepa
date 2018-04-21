@extends('layout')

@section('title')
Signing out...
@stop

@section('footer_scripts')
<script type="text/javascript">
	window.fbAsyncInit = function() {

	  FB.init({
	    appId      : '1628642044119324',
	    xfbml      : true,
	    version    : 'v2.6'
	  });

	  FB.getLoginStatus(function(response) {
        console.log(response);
    	});
	 
	};

	(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

@stop
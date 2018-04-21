<?php $__env->startSection('title'); ?>
Login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="wrapper" class="login animated fadeInUp">

		<div id="top">
			<div id="topBar" class="clearfix widget-content pad10">
					<a class="logo" href="<?php echo e(route('home')); ?>">
						<img src="<?php echo e(asset('images/logo.png')); ?>" rel="logo">
					</a>
				
			</div> <!-- /topBar -->
			
		</div> <!-- /top -->

		<div class="widget-content pad20 clearfix login-box">
				<span class="center light">Login</span>
				<a class="fb btn btn-blue btn-full" href="index.html" id="fbLogin"><i class="fa fa-facebook"></i>Login through Facebook</a>
				<span class="center light info">We keep your information private. We never share anything on your behalf.</span>
		</div>	<!-- /widget-content -->	


</div>  <!-- /wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<script>
  window.fbAsyncInit = function() {

    FB.init({
      appId      : '1628642044119324',
      xfbml      : true,
      version    : 'v2.6'
    });

    FB.getLoginStatus(function(response) {
        console.log(response);
        //checkResponseAndTakeAction(response);
    });
   
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  $(document).ready(function() {
  	$('#fbLogin').on('click', function(event) {
  		event.preventDefault();
  		FB.login(function(response){
  			checkResponseAndTakeAction(response);
  		}, {scope: 'public_profile,email'})
  	});
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
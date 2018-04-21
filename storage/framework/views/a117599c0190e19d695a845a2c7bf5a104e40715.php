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
  			checkResponseAndTakeAction(response,'buyer');
  		}, {scope: 'public_profile,email'})
  	});
  });
</script>
<style type="text/css">
  #owl-demo .item {
      margin: 3px;
  }
  #owl-demo .item img {
      display: block;
      width: 50%;
      height: auto;
  }
</style>
<script>
  $(document).ready(function () {
      $("#owl-demo").owlCarousel({

          autoPlay: 3000, //Set AutoPlay to 3 seconds
          dots: true,
          items: 2,
          itemsDesktop: [1199, 3],
          itemsDesktopSmall: [979, 3]
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#owl-demo2").owlCarousel({
        navigation : true, 
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true
    });
  });
</script>
<?php $__env->stopSection(); ?>
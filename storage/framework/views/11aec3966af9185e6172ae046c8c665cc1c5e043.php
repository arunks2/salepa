<?php $__env->startSection('title'); ?>
Create Sale
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="wrapper" class="container">
	<div id="top">
	<?php echo $__env->make('user.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('user.stats', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>

	<?php echo $__env->make('user.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div id="main" class="clearfix">
			<div class="breadcrumbs-container">
				<ol class="breadcrumb">
				  <li><a href="<?php echo e(route('usersales')); ?>">My Sales</a></li>
				  <li class="active">Create Sale</li>
				</ol>
			</div>
		<div class="topTabs">
				<div id="topTabs-container-home">
					<div class="topTabs-header clearfix">
						<div class="secInfo sec-dashboard">			    
							<h1 class="secTitle">Create New Sale</h1>
						</div>
					</div><!-- /topTabs-header -->
				</div> <!-- /tab-container -->
		</div> <!-- /topTabs -->

		<div class="fluid sales-table">
			<div class="widget grid12">
				<div class="widget-content pad10">
					<?php echo $__env->make('user.errorList', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<?php echo e(Form::open(['route'=>'storesale','method'=>'post','id'=>'form','data-parsley-validate'=>'true'])); ?>

						<div class="create-sale">
							<h4>Basic Info :</h4>
							<div class="sales_information">
								<div class="field">
									<label>Sale Name</label>
									<input type="text" class="input-text" name="name" placeholder="e.g Arun`s Yard sale" data-parsley-required="true" value="<?php echo e(old('name')); ?>" />
									<!-- TODO : Change 'name' to something else. Its clashing with autfill -->
								</div>
								<div class="field">
									<label>Sales Description</label>
									<p>In a few words, describe why you are selling your stuff. Is it because you are moving? Or maybe you're going to buy new things. Descriptions help potential buyers gauge the sincerety in sale.</p>
									<textarea class="textarea" rows="3" name="description" placeholder="Why are you creating this sale?" data-parsley-required="true"><?php echo e(old('description')); ?></textarea>
								<!-- SLPDO : Do something -->
								</div>

								<div class="row">
									<div class="col-md-6 field">
										<label>Start Date</label>
										<input type="text" id="starts_on_temp" name="starts_on_temp" class="input-text" data-parsley-required="true" placeholder="When does the sale start?">
										<input type="hidden" name="starts_on" id="starts_on" value="">
									</div>
									<div class="col-md-6 field">
										<label>End Date <span>- optional</span></label>	
										<input type="text" class="input-text" id="ends_on_temp" name="ends_on_temp" placeholder="When does it end?" >
										<input type="hidden" name="ends_on" id="ends_on">
									</div>
								</div>
								<br>
								<input type="radio" id="radio-2" value="0" name="is_private" checked="checked">
								<label for="radio-2" style="margin-left:8px;">Public Sale - visible on our website (more views)</label>
								<br>
								<input type="radio" id="radio-1" value="1" name="is_private">
								<label for="radio-1" style="margin-left:8px;">Private Sale - shared by link only (more control)</label>
								
							</div>	
							<br>
							<h4>Publically Visible Contact info:</h4>
							<div class="sales_information">
								<div class="field">
									<label>Pick Up Area</label>
									<p>This information is visible to anyone who visits the sale. Let's give them a sense of where they need to pick up the stuff from.</p>
									<input type="text" data-parsley-required class="input-text" placeholder="e.g. Vasant Vihar, Delhi" name="address" placeholder="" value="<?php echo e(old('address')); ?>" />
								</div>
								<div class="field">
									<label>Contact Number <span>- optional</span></label>
									<p>If you want, you can give a public contact number.</p>
									<input type="tel" class="input-text" placeholder="xxxxxxxxxx" value="<?php echo e(old('contact_info')); ?>" name="contact_info" placeholder="" />
								</div>
							</div>
							<br>
							<h4>Private Contact info:</h4>
							<div class="sales_information">			
								<div class="field">
									<label>Pick Up Address</label>
									<p>This information is shared only when you approve during a conversation with a buyer.</p>
									<input type="text" data-parsley-required class="input-text" placeholder="Full Pickup Address" name="pvt_address" placeholder="" value="<?php echo e(old('pvt_address')); ?>" />
								</div>
								<div class="field">
									<label>Contact Number</label>
									<p>Please enter you ten digit mobile number with country code. This number will be <strong>verified via SMS</strong>.</p>
									<input type="text" data-parsley-required data-parsley-phone="3" class="input-text" placeholder="e.g. +919871069987" name="pvt_contact_info" value="<?php echo e(old('pvt_address')); ?>" />
								</div>
							</div>
							<br>
                             <div class="center">
                            	<input type="submit" class="btn btn-lg" value="Create Sale" style="margin:0 auto;" />
                         	</div>
												
							</div> <!-- /widget-content -->
						<?php echo e(Form::close()); ?>

					</div>
				</div>
			</div>
		</div> <!-- /main -->
	</div>	
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<script>
  $(document).ready(function(){
  		$('#starts_on').val(moment().format('Y-M-D'));
        $('#starts_on_temp').datetimepicker({
        	format:"dddd, MMMM Do YYYY",
        	minDate:new Date(),
        });
        
        $('#ends_on_temp').datetimepicker({
        	format:"dddd, MMMM Do YYYY",
        	minDate:new Date(),
            useCurrent: false //Important! See issue #1075
        });
        $("#starts_on_temp").on("dp.change", function (e) {
        
        	$('#starts_on').val(moment(e.date).format('Y-M-D'));
        	if(e.date)
            	 { $('#ends_on_temp').data("DateTimePicker").minDate(e.date); }
            else
            	{ $('#ends_on_temp').data("DateTimePicker").minDate(new Date()); }
        });
        $("#ends_on_temp").on("dp.change", function (e) {
        	$('#ends_on').val(moment(e.date).format('Y-M-D'));
            $('#starts_on_temp').data("DateTimePicker").maxDate(e.date);
        });
  });
  </script>

	<?php if(!Auth::check()): ?>
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
		  			checkResponseAndTakeAction(response, 'buyer');
		  		}, {scope: 'public_profile,email'})
		  	});
		  });
		</script>

	<?php endif; ?>
	<script type="text/javascript">
		window.Parsley
		  .addValidator('phone', {
		    validateString: function(value, requirement) {
		      var pattern=/^\+[1-9]{1}[0-9]{3,14}$/i;
		      console.log(pattern);
		      return pattern.test(value);
		    },
		    messages: {
		      en: 'Should be a valid mobile number',
		    }
		  });
		  window.Parsley.on('form:error', function() {
			  // This global callback will be called for any field that fails validation.
			  notify('You missed a few details, let\s sort them out','error','bottomCenter')
			});
		 
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title'); ?>
Dashboard
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
			  <li class="active">Dashboard</li>
			</ol>
		</div>

		<div class="topTabs">
				<div id="topTabs-container-home">
					<div class="topTabs-header clearfix">
						<div class="secInfo sec-dashboard">
							<h1 class="secTitle">Dashboard</h1>
							<span class="secExtra">All sales I've created</span>
						</div> <!-- /SecInfo -->
						<a href='/user/sales/create'>
							<button class="btn btn-info new-button">Create a New Sale</button>
						</a>
					</div><!-- /topTabs-header -->
				</div> <!-- /tab-container -->
		</div> <!-- /topTabs -->
		
		<?php echo $__env->make('user.allSalesTable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		
	</div> <!-- /main -->

</div> <!-- /wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<script>
	  $(document).ready(function(){
	  	  $( "#starts_on" ).datepicker({
	  		dateFormat: "yy-mm-dd"
			});
	  	  $('#starts_on').on('changeDate', function(ev){
	  	        $('#starts_on').val(ev.target.value);
	  	     });
	  	  $("#ends_on" ).datepicker({
	  		dateFormat: "yy-mm-dd"
			});
	  	  $.ajax({
	  	  	url: "/user/"+<?php echo e($user->id); ?>+"/getvisitstats",
  			cache: false,
  			success: function(html){
  				html='<div class="stat-badge">+'+html+'</div>';
  				$('.stat-badge').replaceWith(html);
  			}
	  	  });
	  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
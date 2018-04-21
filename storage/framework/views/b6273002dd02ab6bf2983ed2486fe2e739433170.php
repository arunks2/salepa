<?php $__env->startSection('title'); ?>
Sales
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="wrapper" class="container">
	<div id="top">
	<?php echo $__env->make('user.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<div id="main" class="viewSale clearfix">
		<div class="breadcrumbs-container">
			<ol class="breadcrumb">
			  <li><a href="/sales">Dashboard</a></li>
			  <li class="active"><?php echo e(ucwords($sale->slug)); ?></li>
			</ol>
		</div>
		<div class="topTabs">
				<div id="topTabs-container-home">
					<div class="topTabs-header clearfix">
						<div class="fluid">
							<div class="widget grid6">
								<div class="widget-header">
									<h3 class="widget-title"><?php echo e($sale->name); ?>

										
									</h3>
								</div>
								<div class="widget-content pad30f">
									<p><?php echo e($sale->description); ?></p>
									<div class="contactInfo">
										<h4 class="infoHeading">Status:</h4>
										<p><?php if(\Carbon\Carbon::now()<$sale->starts_on): ?>
								<h3 class="infoTitle upcoming">Upcoming</h3>
							<?php else: ?>
								<?php if($sale->ends_on->format('Y')=='-0001'): ?>
									<h3 class="infoTitle ongoing">Ongoing</h3>
								<?php else: ?>
									<?php if($sale->ends_on>\Carbon\Carbon::now()): ?>
										<h3 class="infoTitle ongoin">Ongoing</h3>
									<?php else: ?>
										<h3 class="infoTitle past">Past Sale</h3>
									<?php endif; ?>
								<?php endif; ?>
							<?php endif; ?></p>
								<h4 class="infoHeading">Starts On:</h4>
									<p><?php echo e($sale->starts_on->format('d M y')); ?></p>
								<h4 class="infoHeading">Ends On:</h4>
									<p><?php if($sale->ends_on->format('Y')=='-0001'): ?>
									----
								<?php else: ?>
									<?php echo e($sale->ends_on->format('d M y')); ?>

								<?php endif; ?></p>
									</div>
								</div>
							</div>
							<div class="widget grid6">
								<div class="widget-header">
									<h3 class="widget-title">
										Contact Information
										
									</h3>
								</div>
								<div class="widget-content pad30f">
									
									<div class="contactInfo">
										<h4 class="infoHeading">Pickup Area</h4>
										<p><?php echo e($sale->address); ?></p>
										<h4 class="infoHeading">Contact Number</h4>
										<p><?php echo e($sale->contact_info); ?></p>
									</div>
									<div class="secInfo">
										<span class="secExtra"></span>
										<h3 class="infoTitle">
											<a  href="/user/generatepdf/<?php echo e($sale->id); ?>" role="button" class="new-button" data-toggle="modal" >
												<button class="btn btn-info new-button">Download</button>
											</a>
										</h3>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /topTabs-header -->
				</div> <!-- /tab-container -->
			</div> <!-- /topTabs -->
				<?php if($sale->products->count()==0): ?>
					<h3>No products in the current Sale</h3>
				<?php else: ?>
					<?php foreach($sale->products as $product): ?>
					<div class="fluid">
						<div class="widget leftcontent grid6">
							<div class="widget-header">
								<h3 class="widget-title ">Images</h3>
							</div>
							<div class="widget-content">
								<div id="owl-demo2" class="owl-carousel owl-theme">
								 <?php if($product->photos->count()>0): ?>
								 	<?php foreach($product->photos as $photo): ?>
								  		<div class="item"><img src="/<?php echo e($photo->thumbnail_path); ?>" /></div>
								  	<?php endforeach; ?>
								 <?php endif; ?> 
								</div>
							</div> <!-- /widget-content -->
						</div> <!-- /widget -->
						<div class="widget grid6">
							<div class="widget-header">
								<h3 class="widget-title">Product Information</h3>
							</div>
							<div class="widget-content">
								<p>
									<div class="secInfo">
										<a href="/sales/<?php echo e($sale->slug); ?>/<?php echo e($product->id); ?>"><h3 class="infoTitle"><?php echo e(ucwords($product->name)); ?> - <?php echo e($product->purchase_year); ?></h3>
										</a>
											<p><?php echo e($product->description); ?></p>
											<div class="contactInfo">
												<h4 class="infoHeading">Selling Price:</h4>
											<p><?php echo e($product->sell_price); ?></p>
												<h4 class="infoHeading">Condition</h4>
											<p><?php echo e($product->condition); ?></p>
											</div>
									</div>
								</p>
							</div> <!-- /widget-content -->
						</div> <!-- /widget -->
					</div> <!-- /fluid:6+6 -->
					<?php endforeach; ?>
				<?php endif; ?>
		</div>
	</div>	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('guest.sharedloginscript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
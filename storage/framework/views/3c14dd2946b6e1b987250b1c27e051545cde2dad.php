<div class="topTabs">
		<div id="topTabs-container-home">
			<div class="topTabs-header clearfix">
				<a href="#" id="more-button">Details</a>
				<div class="less-container clearfix">
					<div class="secInfo sec-dashboard">
						<h3 class="widget-title">
							<?php echo e($sale->name); ?>

							<a  
								href="#saleHeaderEditModal" 
								role="button" 
								class="heading-button" 
								data-toggle="modal" 
								data-target="#saleHeaderEditModal"
							>
								<i class="fa fa-pencil"></i>
							</a>
						</h3>
						<span class="secExtra"><?php echo e(str_limit($sale->description, $limit = 50, $end = '...')); ?></span>
					</div>
					<div class="secInfo">
						<span class="secExtra">Status</span>
						<?php if(\Carbon\Carbon::now()<$sale->starts_on): ?>
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
						<?php endif; ?>
					</div>
					<div class="secInfo">
						<span class="secExtra">Starts on</span>
						<h3 class="infoTitle"><?php echo e($sale->starts_on->format('d M y')); ?></h3>
					</div>
					<div class="secInfo">
						<span class="secExtra">Ends on</span>
						<h3 class="infoTitle">
							<?php if($sale->ends_on->format('Y')=='-0001'): ?>
								----
							<?php else: ?>
								<?php echo e($sale->ends_on->format('d M y')); ?>

							<?php endif; ?>
						</h3>
					</div>
				</div>
				<div class="more-container clearfix" id="more-content">
					<div class="fluid">
						<div class="widget grid6">
							<div class="widget-header">
								<h3 class="widget-title">Private Information
									<a  href="#salePrivateEditModal" role="button" class="heading-button" data-toggle="modal" data-target="#salePrivateEditModal">
										<i class="fa fa-pencil"></i>
									</a>
								</h3>
							</div>
							<div class="widget-content pad30f">
								<p>This information is only visible to the potential buyers when you decide.</p>
								<div class="contactInfo">
									<h4 class="infoHeading">Exact Pickup Address</h4>
									<p><?php echo e($sale->pvt_address); ?></p>
									<h4 class="infoHeading">Contact Number</h4>
									<p><?php echo e($sale->pvt_contact_info); ?></p>
								</div>
							</div>
						</div>
						<div class="widget grid6">
							<div class="widget-header">
								<h3 class="widget-title">
									Public Information
									<a  href="#salePublicEditModal" role="button" class="heading-button" data-toggle="modal" data-target="#salePublicEditModal">
										<i class="fa fa-pencil"></i>
									</a>
								</h3>
							</div>
							<div class="widget-content pad30f">
								<p>This information is visible to all visitors to identify you location area and feasibility.</p>
								<div class="contactInfo">
									<h4 class="infoHeading">Pickup Area</h4>
									<p><?php echo e($sale->address); ?></p>
									<h4 class="infoHeading">Contact Number</h4>
									<p><?php echo e($sale->contact_info); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /topTabs-header -->

		</div> <!-- /tab-container -->
</div> <!-- /topTabs -->

<?php echo $__env->make('user.saleEditModals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
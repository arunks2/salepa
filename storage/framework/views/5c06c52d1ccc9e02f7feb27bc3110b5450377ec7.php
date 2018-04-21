
<div id="topBar">
	<div class="wrapper20">
	<div class="fluid sales-table">
		<div class="widget leftcontent grid6">
			
			<div class="widget-content">
				<p>
					<div class="less-container clearfix">
						<div class="secInfo">
							<span class="secExtra"><?php echo e($sale->name); ?></span>
							<h3 class="infoTitle"><?php echo e(($sale->description)); ?></h3>
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

				</p>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
		<div class="widget grid6">
			<div class="widget-content">
				<p>
					<div class="less-container clearfix">
						<div class="secInfo">
							<span class="secExtra">Created By: </span>
							<h3 class="infoTitle"><?php echo e($sale->owner->name); ?></h3>
						</div>
						<div class="secInfo">
							<span class="secExtra">Email: </span>
							<h3 class="infoTitle"><?php echo e($sale->owner->email); ?></h3>
						</div>
						<div class="secInfo">
							<span class="secExtra">Profile Picture:</span>
							<h3 class="infoTitle">
								<!-- <image src="/<?php echo e($sale->owner->profile_pic_path); ?>" style="width:100px; height:100px"/> -->
							</h3>
						</div>
					</div>
				</p>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	<hr>
	<?php if($sale->products): ?>
	<?php foreach($sale->products as $product): ?>
	<div class="fluid sales-table">
		<div class="widget leftcontent grid4">	
		<div class="widget-content">
			<p>
				<div class="less-container clearfix">
					<div class="secInfo">
						<span class="secExtra"><?php echo e($product->name); ?> </span>
						<h3 class="infoTitle"><?php echo e($product->description); ?></h3>
					</div>
					<div class="secInfo">
						<span class="secExtra">Purchase Year </span>
						<h3 class="infoTitle"><?php echo e($product->purchase_year); ?></h3>
					</div>
				</div>
			</p>
		</div> <!-- /widget-content -->
		</div>
		<div class="widget grid4">
			<div class="widget-content">
				<p>
					<div class="less-container clearfix">
						<div class="secInfo">
							<span class="secExtra">Cost Price</span>
							<h3 class="infoTitle"><?php echo e(getCostPrice($product,$user)); ?></h3>
						</div>
						<div class="secInfo">
							<span class="secExtra">Sale Price</span>
							<h3 class="infoTitle"><?php echo e(getSellPrice($product, $user)); ?></h3>
						</div>
						<div class="secInfo">
							<span class="secExtra">Condition</span>
							<h3 class="infoTitle"><?php echo e($product->condition); ?></h3>
						</div>
					</div>
				</p>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->

		<div class="widget grid4">
			<div class="widget-content">
				<p>
					<div class="less-container clearfix">
						<div class="secInfo">
							<span class="secExtra">Product Image</span>
							<h3 class="infoTitle">
							<!-- <img 
								class="product-image"
								src="/
								<?php if($product->photos->first()['thumbnail_path']): ?>
									<?php echo e($product->photos->first()['thumbnail_path']); ?>

								<?php else: ?>
									images/nophoto.jpg
								<?php endif; ?>
								"
								/> -->
							</h3>
						</div>
					</div>
				</p>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /fluid:4+4+4-->	
	<hr>
	<?php endforeach; ?>
	<?php endif; ?>
</div>
</div>
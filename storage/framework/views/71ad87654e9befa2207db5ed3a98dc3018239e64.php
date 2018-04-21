<?php $__env->startSection('title'); ?>
Create Sale
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="wrapper" class="container">
	<div id="top">
	<?php echo $__env->make('user.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	<div id="main" class="clearfix">
		<div class="breadcrumbs-container">
			<ol class="breadcrumb">
			  <li><a href="/sales">Dashboard</a></li>
			  <li><a href="/sales/<?php echo e($product->sale->slug); ?>"><?php echo e(ucwords($product->sale->slug)); ?></a></li>
			  <li class="active"><?php echo e($product->name); ?></li>
			</ol>
		</div>
		<div class="topTabs">
				<div id="topTabs-container-home">
					<div class="topTabs-header clearfix">
					<div id="owl-demo">
					<?php if($product->photos->count()>0): ?>
					<?php foreach($product->photos as $photo): ?>
					    <div class="item">
					        <img src="/<?php echo e($photo->path); ?>" />
					    </div>
					<?php endforeach; ?>
					<?php endif; ?>
					</div>


						<div class="fluid">
							<div class="widget grid6">
								<div class="widget-header">
									<h3 class="widget-title"><?php echo e($product->name); ?>

										
									</h3>
								</div>
								<div class="widget-content pad30f">
									<p><?php echo e($product->description); ?></p>
									<div class="contactInfo">
										<h4 class="infoHeading">Purchase_Year</h4>
										<p><?php echo e($product->purchase_year); ?></p>
								<h4 class="infoHeading">Selling Price:</h4>
									<p><?php echo e($product->sell_price); ?></p>
								<h4 class="infoHeading">Condition</h4>
									<p><?php echo e($product->condition); ?></p>
									</div>
								</div>
							</div>
							<div class="widget grid6">
								<div class="widget-header">

								</div>
								<div class="widget-content pad30f">
									<?php if(Auth::check()): ?>
									<a  href="#sendMessageModal" role="button" class=" btn btn-blue btn-half heading-button" data-toggle="modal" data-target="#sendMessageModal">Send a message</a>
									<?php else: ?>
									<a class="fb btn btn-blue btn-full" href="index.html" id="fbLogin" style="float:right"><i class="fa fa-facebook"></i>Login through Facebook</a>
									<?php endif; ?>
									
								</div>
							</div>
						</div>
					</div><!-- /topTabs-header -->
				</div> <!-- /tab-container -->
		</div> <!-- /topTabs -->
				<!-- sendMessageModal -->
				<div class="modal fade" id="sendMessageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">Send Message</h4>
				      </div>
				      <?php echo e(Form::open(['url'=>'/user/send_message','method'=>'post','id'=>'form'])); ?>

				      	<div class="widget-content pad20f">
				      		<input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
				      		<textarea class="textarea" rows="4" name="text" placeholder="Type your message"></textarea>
                            <span class="custom-input">   
                            	<button type="submit">Save</button>
                            </span>
				      							
						</div> <!-- /widget-content -->
				      <?php echo e(Form::close()); ?>

				      
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.sendMessageModal -->

			<?php if(conversationProduct($product)): ?>
				<?php foreach(conversationProduct($product) as $conservation): ?>
					<?php if($conservation->messages): ?>
					<?php foreach($conservation->messages as $message): ?>
						<?php echo e($message->text); ?>

					<?php endforeach; ?>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else: ?>
				<h3>No Conversations</h3>
			<?php endif; ?>
		</div>	<!-- /widget-content -->
 <?php $__env->startSection('footer_scripts'); ?>
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
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
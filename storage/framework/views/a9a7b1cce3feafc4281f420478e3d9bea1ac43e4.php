<?php $__env->startSection('title'); ?>
All Products
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
			  <li><a href="/user/dashboard">Dashboard</a></li>
			 
			</ol>
		</div>

		<div class="topTabs">
				<div id="topTabs-container-home">
					<div class="topTabs-header clearfix">
						<table id="example" class="display" cellspacing="0" width="100%">
					        <thead>
					            <tr>
					                <th>Image</th>
					                <th>Name</th>
					                <th>Condition</th>
					                <th>Selling Price</th>
					            </tr>
					        </thead>
					        <tfoot>
					            <tr>
					                <th>Image</th>
					                <th>Name</th>
					                <th>Condition</th>
					                <th>Selling Price</th>
					            </tr>
					        </tfoot>
					        <tbody>
					            <tr>
					            	<?php if($products->count()>0): ?>
					            	<?php foreach($products as $product): ?>
					            		<td><img src="
											<?php if($product->photos->first()['thumbnail_path']): ?> 
											/<?php echo e($product->photos->first()['thumbnail_path']); ?>

											<?php endif; ?>
					            			" /></td>
					            		<td><?php echo e($product->name); ?>

					            		<td><?php echo e($product->condition); ?></td>
					            		<td><?php echo e($product->sale_price); ?></td>
					            	
					            </tr>
					            <?php endforeach; ?>
					            <?php endif; ?>
					        </tbody>
					    </table>
					</div><!-- /topTabs-header -->								
				</div> <!-- /tab-container -->
		</div> <!-- /topTabs -->
		</div> <!-- /main -->
	</div>		
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
<style>
	tr td img{
		height: 50px;
		width: 50px;
	}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
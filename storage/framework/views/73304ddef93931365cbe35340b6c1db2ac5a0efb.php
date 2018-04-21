<?php $__env->startSection('title'); ?>
Guest View
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="wrapper" class="container">
	<div id="top">
	<?php echo $__env->make('user.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div> 
	<div id="main" class="clearfix">
		<div class="breadcrumbs-container">
			<ol class="breadcrumb">
			  <li class="active">All Sale</li>
			</ol>
		</div>
	<div class="fluid sales-table">
		<div class="widget grid12">
			<div class="widget-content pad10">
				<table class="table table-hover my-table">
					<thead>
						<tr>
							<td>Name</td>
							<td>Starts on</td>
							<td>Ends on</td>
							<td>Total Products</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>					
							<?php if($sales): ?>
								<?php foreach($sales as $sale): ?>
							<tr>
							<td><a href="/sales/<?php echo e($sale->slug); ?>"><?php echo e($sale->name); ?></a></td>
							<td><?php echo e($sale->starts_on->format('d M Y')); ?></td>
							<td>
								<?php if($sale->ends_on->format('Y') != '-0001'): ?>
									<?php echo e($sale->ends_on->format('d M Y')); ?>

								<?php else: ?>
									Not Defined
								<?php endif; ?>
								</td>
							<td><?php echo e(count($sale->products)); ?></td>
							<td>
														
							</td>
							</tr>
							<div class="modal fade" id="editSaleModal<?php echo e($sale->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							        <h4 class="modal-title" id="myModalLabel">Create Product</h4>
							      </div>
	
							    </div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
								<?php endforeach; ?>
							<?php endif; ?>						
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('guest.sharedloginscript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
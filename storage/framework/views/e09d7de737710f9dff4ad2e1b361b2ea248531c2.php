<div class="fluid sales-table">
	<div class="widget grid12">
		<div class="widget-content pad10">
			<?php if($sales->count()==0): ?>
				<div class="no-content no-sale">
				    It's lonely here. Let's <a href='<?php echo e(route('createsale')); ?>'>create a sale</a>
				</div>
			<?php else: ?>
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
							<?php foreach($sales as $sale): ?>
							<tr>
								<td><a href="<?php echo e(route('sale_show', $sale->slug)); ?>"><?php echo e($sale->name); ?></a></td>
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
									<div class="btn-group xtra"> <!-- btn dd -->
										<a href="#" onclick="return false;" class="icon-button dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear"></i></a>
										<ul class="dropdown-menu pull-right">
											 <li><a href="#editSaleModal<?php echo e($sale->id); ?>" role="button" data-toggle="modal" data-target="#editSaleModal<?php echo e($sale->id); ?>">Edit</a></li>
											 <li><a href="#deleteSaleModal<?php echo e($sale->id); ?>" role="button" data-toggle="modal" data-target="#deleteSaleModal<?php echo e($sale->id); ?>">Delete</a></li>
			                            </ul>

									</div>
								</td>
							</tr>
							<?php echo $__env->make('user.editSaleModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php endforeach; ?>
							</tbody>
						</table>	
			<?php endif; ?>						
			</div>
		</div>
	</div>	
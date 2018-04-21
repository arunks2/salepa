<div class="widget-content">
	<div class="fluid sales-table">
		<div class="widget grid12">
			<div class="widget-content pad10">
				<?php if($sale->products->count()==0): ?>
				<div class="no-content no-products">
					There are no products. Let's <a href="#myModal" role="button" data-toggle="modal" data-target="#myModal">add some</a>
				</div>
				<?php else: ?>
				<table class="table table-striped my-table products-table">
					<thead>
						<tr>
							<td>Image</td>
							<td>Product Name</td>
							<td>

								Cost Price</td>
								<td>Selling Price</td>
								<td>Sold Status</td>
								<td>Actions</td>
							</tr>
						</thead>
						<tbody>		
							<?php foreach($sale->products as $product): ?>
								<?php echo $__env->make('user.products.tableRow', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								<?php echo $__env->make('user.products.editModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							<?php endforeach; ?>
						</tbody>
					</table>
					<?php endif; ?>			
				</div>
			</div>
		</div>
	</div>

<tr>
	<td>	
		<a
		href="#uploadModal<?php echo e($product->id); ?>" 
		role="button" 
		data-toggle="modal" 
		data-target="#uploadModal<?php echo e($product->id); ?>"
		class="hint--bottom"
		aria-label="Manage Images"
		>
		<img 
		class="product-image"
		src="/
		<?php if($product->photos->first()['thumbnail_path']): ?>
			<?php echo e($product->photos->first()['thumbnail_path']); ?>

		<?php else: ?>
			images/nophoto.jpg
		<?php endif; ?>
		"
		/>
	</a>
</td>
<td>
	<a href="/user/products/<?php echo e($product->id); ?>">
		<?php echo e($product->name); ?>

	</a>
</td>

<td>
	<?php echo e(getCostPrice($product, $user)); ?>

</td>
<td>
	<?php echo e(getSellPrice($product, $user)); ?>

</td>
<td>
	<?php if($product->is_sold==0): ?>
	<a 
	href='#' 
	class="btn btn-blue ajaxSoldButton" 
	id="soldButton" 
	data-productid="" 
	data-id="<?php echo e($product->id); ?>"
	>
	<i class="fa fa-check"></i>
	<span class="btn-content" id="sold">Mark as Sold</span>
</a>
<?php else: ?>
<a href='#' class="btn btn-red disabled" id="" data-productid="" data-id="<?php echo e($product->id); ?>">
	<i class="fa fa-check" ></i>
	<span class="btn-content" id="sold">Mark as Sold</span>
	<?php endif; ?>
</td>
<td>
	<div class="btn-group xtra"> <!-- btn dd -->
		<a href="#" onclick="return false;" class="icon-button dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear"></i></a>
		<ul class="dropdown-menu pull-right">
			<li>
				<a href="#uploadModal<?php echo e($product->id); ?>" 
					role="button" 
					data-toggle="modal" 
					data-target="#uploadModal<?php echo e($product->id); ?>">
					Manage Product Images
				</a>
			</li>
			<li>
				<a href="#editProductModal<?php echo e($product->id); ?>" role="button" data-toggle="modal" data-target="#editProductModal<?php echo e($product->id); ?>">Edit Product</a></li>
				<li><a href="#deleteProductModal<?php echo e($product->id); ?>" role="button" data-toggle="modal" data-target="#deleteProductModal<?php echo e($product->id); ?>">Delete Product</a></li>
			</ul>
		</div>
		<!-- uploadModal -->
		<?php echo $__env->make('user.products.manageProductImagesModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('user.products.deleteProductModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		
	</td>
</tr>
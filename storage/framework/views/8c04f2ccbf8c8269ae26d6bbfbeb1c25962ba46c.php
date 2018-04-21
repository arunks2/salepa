<!-- Delete Edit Modal -->
		<div class="modal fade" id="deleteProductModal<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Delete this actual Product</h4>
					</div>
					<div class="modal-body">
						Are You Sure you want to delete this product?? <span class="info">(This action dd is not reversible)</span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light-grey" data-dismiss="modal">Cancel</button>
						<a href="/user/products/<?php echo e($product->id); ?>/delete"><button type="button" class="btn">Delete</button>
						</a>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /Product modal -->

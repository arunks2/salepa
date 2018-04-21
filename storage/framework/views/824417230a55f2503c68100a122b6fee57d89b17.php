<div class="modal fade" id="uploadModal<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel"><?php echo e($product->name); ?></h4>
					</div>
					
					<div class="modal-body">
						<div class="large-8 columns">
							<h4>Product Pictures</h4>
							<p class="info">You can upload .jpg, .png files here.</p>
							<form action="<?php echo e(url('/user/'.$product->id.'/addphotos')); ?>"
								class="dropzone"
								id="addPhotosForm"
								data-id="<?php echo e($product->id); ?>">
								
							</form>
						</div>
						<div class="allimages" id="allimages<?php echo e($product->id); ?>">
							<?php if($product->photos->count()==0): ?>
							
							<?php else: ?>
							<?php foreach($product->photos as $photo): ?>
							<img src="/<?php echo e($photo->thumbnail_path); ?>">
							<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
					
					
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
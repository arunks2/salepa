<!-- Product Edit Modal -->
<div class="modal fade" id="editProductModal<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Edit Product</h4>
			</div>
			<?php echo e(Form::open(['url'=>'/user/products/'.$product->id.'/edit_product','method'=>'post','id'=>'form'])); ?>

			
			<div class="modal-body">
				<label>Input Name:</label>
				<input type="text" class="input-text" placeholder="Product Name" name="name" placeholder="e.g Iphone6.." value="<?php echo e($product->name); ?>" />
				<label>Purchase Year:</label>
				<input type="number" class="input-text" name="purchase_year" id="purchase_year" value="<?php echo e($product->purchase_year); ?>" />
				<label>Cost Price</label>
				<div class="row">
					<div class="col-xs-3">
						<div class="dropdown">
							<?php if(allCurrencies()): ?>
							<select name="short_symbol_cost" class="dropdown-select">
								<?php foreach(allCurrencies() as $currency): ?>
								<option value="<?php echo e($currency->id); ?>"
									<?php if($currency->id==$user->currency->id): ?>
									selected
									<?php endif; ?>
									><?php echo e($currency->short_symbol); ?></option>  
									<?php endforeach; ?>      		
								</select>
								<?php endif; ?>
							</div>
						</div>
						<div class="col-xs-9">
							<input type="text" class="input-text" placeholder="Cost Price" name="cost_price"/>
						</div>
					</div>		        
					<label>Selling Price</label>
					<div class="row">
						<div class="col-xs-3">
							<div class="dropdown">
								<?php if(allCurrencies()): ?>
								<select name="short_symbol_sell" class="dropdown-select">
									<?php foreach(allCurrencies() as $currency): ?>
									<option value="<?php echo e($currency->id); ?>"
										<?php if($currency->id==$user->currency->id): ?>
										selected
										<?php endif; ?>
										><?php echo e($currency->short_symbol); ?></option>  
										<?php endforeach; ?>      		
									</select>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-xs-9">
								<input type="number" class="input-text" placeholder="Sale Price" name="sale_price"/>
							</div>
						</div>
						<label>Description:</label> 
						<textarea class="textarea" rows="3" name="description"><?php echo e($product->description); ?></textarea>

						<div class="dropdown">
							<select name="condition" class="dropdown-select">
								<option value="New">New</option>
								<option value="Relatively New">Relatively New</option>
								<option value="Old">Old</option>
								<option value="Quite Old">Quite Old</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn">Save changes</button>
					</div>
					<?php echo e(Form::close()); ?>

				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
									</div><!-- /Product modal -->
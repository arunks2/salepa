<!-- Create Product Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Add a Product</h4>
		      </div>
		      <?php echo e(Form::open(['route'=>'createProduct','method'=>'post','id'=>'form', 'files' => true, 'data-parsley-validate'=>'true'])); ?>

		      
		      <div class="modal-body">
		        <div class="field">
		        	<label>Name of the Product:</label>
		        	<p>Include the Brand and Product Name here</p>
		        	<input type="text" class="input-text" placeholder='e.g. Samsung 42" TV' name="name" data-parsley-required />
		        </div>
		        <div class="field">
		        	<label>Describe the product:</label> 
		        	<input type="hidden" name="sale_id" value="<?php echo e($sale->id); ?>">
		        	<textarea class="textarea" rows="3" name="description" data-parsley-required></textarea>
		        </div>
		        <hr>
		        <div class="field">
		        	<label>Year of Purchase:</label>
		        	<p>Maximum allowed age of products is 10 years</p>
		        	<div class="dropdown">
				        <select name="purchase_year" class="dropdown-select" data-parsley-required>
				       		<?php for($i=0;$i<=10;$i++): ?>
								<option value="<?php echo e(\Carbon\Carbon::now()->year-$i); ?>">
									<?php echo e(\Carbon\Carbon::now()->year-$i); ?>

								</option>
				       		<?php endfor; ?>
				        </select>
		        	</div>
		        </div>
		        <div class="field">
			        <label>Condition of the product:</label>
        	        <div class="dropdown">
        				<select name="condition" class="dropdown-select" data-parsley-required>
        					<option value="New">New</option>
        					<option value="Relatively New">Relatively New</option>
        					<option value="Old">Old</option>
        					<option value="Quite Old">Quite Old</option>
        				</select>
        			</div>
		        </div>
		        <hr>
		        <div class="field">
		        	<label>Cost Price</label>
		        	<div class="row">
						<div class="col-xs-3">
							<div class="dropdown">
							<?php if(allCurrencies()): ?>
							    <select name="short_symbol_cost" class="dropdown-select" data-parsley-required>
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
				        	<input type="text" class="input-text" placeholder="Cost Price" name="cost_price"  data-parsley-required />
						</div>
					</div>
		        </div>

		        <div class="field">
		        	<label>Selling Price</label>
		        	<div class="row">
						<div class="col-xs-3">
							<div class="dropdown">
							    <?php if(allCurrencies()): ?>
								    <select name="short_symbol_sell" class="dropdown-select" data-parsley-required>
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
				        	<input type="number" class="input-text" placeholder="Sale Price" name="sale_price" data-parsley-required/>
				        </div>
		        	</div>
		        </div>
				<hr>
		        
		        <div class="field">
		        	<label>Product Image</label>
		        	<p>You can upload many more later.</p>
		        	<input type="file" accept="image/x-png, image/gif, image/jpeg" id="uploader" multiple name="photos[]" data-parsley-required multiple/>
		        	<label for="uploader">Select 1 Image</label>
		        </div>
		        
		      	</div>
		      <div class="modal-footer">
		        <button type="submit" class="btn">Add Product</button>
		      </div>
		      <?php echo e(Form::close()); ?>

		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
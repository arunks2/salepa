<!-- saleHeaderEditModal -->
		<div class="modal fade" id="saleHeaderEditModal" tabindex="-1" role="dialog" data-backdrop="true" aria-labelledby="editSaleModal" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="editSaleModal"">Edit Sale</h4>
		      </div>
		      <?php echo e(Form::open(['route'=>array('sale_edit', $sale->id),'method'=>'post','id'=>'form', 'data-parsley-validate'=>'true'])); ?>

		      	<div class="widget-content pad20f">
		      		<div class="sales_information">
		      			<div class="field">
		      				<label>Sale Name</label>
		      				<input type="text" class="input-text" placeholder="Sales Name" name="name" placeholder="e.g Arun`s Yard sale" value="<?php echo e($sale->name); ?>" data-parsley-required />
		      			</div>
		      			<div class="field">
		      				<label>Sales Description</label>
		      				<textarea class="textarea" rows="3" name="description" data-parsley-required ><?php echo e($sale->description); ?></textarea>
		      			</div>
		      			<div class="row">
		      				<div class="col-md-6">
		      					<div class="field">
		      						<label>Start Date</label>
		      						<input type="text" id="starts_on" name="starts_on" class="input-text" value="<?php echo e($sale->starts_on->format('Y-m-d')); ?>" data-parsley-required >
		      					</div>
		      				</div>
		      				<div class="col-md-6">
		      					<div class="field">
		      						<label>End Date <span>- optional</span></label>	
		      						<input 
		      							type="text" 
		      							class="input-text" 
		      							id="ends_on" 
		      							name="ends_on" 
		      							value="<?php if($sale->ends_on->format('Y')!=='-0001'): ?> 
		      										<?php echo e($sale->ends_on->format('Y-m-d')); ?> 
		      									<?php endif; ?>" 
		      						/>
		      					</div>
		      				</div>
		      			</div>
		      			<br>
						<input type="radio" id="radio-2" value="0" name="is_private" <?php if(!$sale->is_private): ?> checked <?php endif; ?>>
						<label for="radio-2" style="margin-left:8px;">Public Sale - visible on our website (more views)</label>
						<br>
						<input type="radio" id="radio-1" value="1" name="is_private" <?php if($sale->is_private): ?> checked <?php endif; ?>>
						<label for="radio-1" style="margin-left:8px;">Private Sale - shared by link only (more control)</label>
		      		</div>	
					<br>
                    <div class="center">
                    	<input type="submit" class="btn btn-lg" value="Save Changes" style="margin:0 auto;" />
                 	</div>
		      							
		      	</div> <!-- /widget-content -->
		      <?php echo e(Form::close()); ?>

		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.saleHeaderEditModal -->

		<!-- salePrivateEditModal -->
		<div class="modal fade" id="salePrivateEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Edit Private Sale Information</h4>
		      </div>
		      <?php echo e(Form::open(['route'=>array('sale_edit', $sale->id),'method'=>'post','id'=>'form_edit1', 'data-parsley-validate'=>'true'])); ?>

		      	<div class="widget-content pad20f">
		      		<h4>Private Contact info:</h4>
		      		<div class="sales_information">			
		      			<div class="field">
		      				<label>Pick Up Address</label>
							<p>This information is shared only when you approve during a conversation with a buyer.</p>
		      				<input type="text" class="input-text" data-parsley-required name="pvt_address" value="<?php echo e($sale->pvt_address); ?>" />
		      			</div>
		      			<div class="field">
		      				<label>Contact Number</label>
							<p>Please enter you ten digit mobile number with country code. This number will be <strong>verified via SMS</strong>.</p>
		      				<input type="text" class="input-text" data-parsley-required name="pvt_contact_info" value="<?php echo e($sale->pvt_contact_info); ?>" />
		      			</div>
		      		</div>
                    <br>
                    <div class="center">
                    	<input type="submit" class="btn btn-lg" value="Save Changes" style="margin:0 auto;" />
                 	</div>			
				</div> <!-- /widget-content -->
		      <?php echo e(Form::close()); ?>

		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.salePrivateEditModal -->

		<!-- salePublicEditModal -->
		<div class="modal fade" id="salePublicEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Edit Public Sale Information</h4>
		      </div>
		      <?php echo e(Form::open(['route'=>array('sale_edit', $sale->id),'method'=>'post','id'=>'form_edit1', 'data-parsley-validate'=>'true'])); ?>

		      	<div class="widget-content pad20f">
		      		<h4>Public Visible Contact info:</h4>
		      		<div class="sales_information">
		      			<div class="field">
		      				<label>Pick Up Area</label>
							<p>This information is visible to anyone who visits the sale. Let's give them a sense of where they need to pick up the stuff from.</p>
		      				<input type="text" class="input-text" name="address" value="<?php echo e($sale->address); ?>" />
		      			</div>
		      			<div class="field">
		      				<label>Contact Number <span>- optional</span></label>
							<p>If you want, you can give a public contact number.</p>
		      				<input type="text" class="input-text"  name="contact_info" value="<?php echo e($sale->contact_info); ?>" />
		      			</div>
		      		</div>
                    <br>
                    <div class="center">
                    	<input type="submit" class="btn btn-lg" value="Save Changes" style="margin:0 auto;" />
                 	</div>		
		      							
				</div> <!-- /widget-content -->
		      <?php echo e(Form::close()); ?>

		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.salePublicEditModal -->
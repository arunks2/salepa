<?php $__env->startSection('title'); ?>
Product Details
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
			  <li><a href="/user/sales/<?php echo e($product->sale->slug); ?>"><?php echo e(ucwords($product->sale->slug)); ?></a></li>
			  <li class="active"><?php echo e($product->name); ?></li>
			</ol>
		</div>

		<div class="topTabs">
				<div id="topTabs-container-home">
					<div class="topTabs-header clearfix">
						<div class="secInfo sec-dashboard">
							<h3 class="widget-title">
								<?php echo e($product->name); ?>

									<a  href="#ProductEditModal" role="button" class="heading-button" data-toggle="modal" data-target="#ProductEditModal">
										<i class="fa fa-pencil"></i>
									</a>
								</h3>
									<span 
									class="secExtra"><?php echo e(str_limit($product->description, $limit = 50, $end = '...')); ?></span>
						</div>
						<div class="secInfo">
							<span class="secExtra">Selling Year</span>
								<h3 class="infoTitle upcoming"><?php echo e($product->sale_price); ?></h3>
						</div>
						<div class="secInfo">
							<span class="secExtra">Purchase Year</span>
							<h3 class="infoTitle">
								<?php if($product->purchase_year=='0000'): ?>
									----
								<?php else: ?>
									<?php echo e($product->purchase_year); ?>

								<?php endif; ?>
							</h3>
						</div>

												

						<div class="secInfo">
							<span class="secExtra">Condition</span>
							<h3 class="infoTitle">
								<?php if($product->condition): ?>
								<?php echo e($product->condition); ?>

								<?php endif; ?>
							</h3>
						</div>
						
					</div><!-- /topTabs-header -->
					<div class="allimages" id="allimages<?php echo e($product->id); ?>">
						<?php if($product->photos): ?>
							<?php foreach($product->photos as $photo): ?>
								<div class="show-image">
									<img src="/<?php echo e($photo->thumbnail_path); ?>">
										<form id="delete-form<?php echo e($photo->id); ?>" action="<?php echo e(url('user/photos/'.$photo->id)); ?>" method="POST">
									<?php echo e(csrf_field()); ?> 
									<?php echo e(method_field('DELETE')); ?> 	           
											<button type="submit" id="delete-photo-<?php echo e($photo->id); ?>" style="margin-bottom:0px" class="button tiny radius alert delete-photo" data-id="<?php echo e($photo->id); ?>">
											  Delete
											</button>
										</form>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>

					<div class="uploadimage">
						<h4>Product Pictures</h4>
						<p class="info">You can upload .jpg, .png files here.</p>
						<form action="<?php echo e(url('/user/'.$product->id.'/addphotos')); ?>"
							class="dropzone"
							id="addPhotosForm"
						>		     	
						</form>
					</div>
					<div class="fluid sales-table">
			<div class="widget grid12">
				<div class="widget-content pad10">
					<?php echo e(Form::open(['url'=>'/user/message_create','method'=>'post','id'=>'form'])); ?>

						<div class="widget-content pad20f">
								<textarea class="textarea" rows="5" name="text" placeholder="Leave a message...."></textarea>
								<input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
								<input type="hidden" name="owner_id" value="<?php echo e($product->owner->id); ?>">			
							<span class="custom-input">   
                        	<button type="submit">Submit</button>
                        	</span>	
   						</div> <!-- /widget-content -->
					<?php echo e(Form::close()); ?>

				</div>
			</div>
		</div>
					<div class="divider"></div>
						<div class="widget leftcontent grid8">
							<div class="widget-header">
							<h3 class="widget-title">Messaging System</h3>
							<div class="widget-controls">
								<input type="checkbox" class="sl" id="slider-inputs" checked />
		  						<label class="slider" for="slider-inputs"></label>
		  						<div class="btn-group xtra"> <!-- btn dd -->
									<a href="#" onclick="return false;" class="icon-button dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear"></i></a>
									<ul class="dropdown-menu pull-right">
		                                <li><a href="#"><i class="fa fa-pencil"></i> Edit</a></li>
						                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
						                <li><a href="#"><i class="fa fa-ban"></i> Ban</a></li>
						                <li class="divider"></li>
						                <li><a href="#"> Other actions</a></li>
						            </ul>
					            </div><!-- /btn dd -->
							</div>
						</div>
										
						<div class="widget-content pad10">
							<div class="comment							<div class="comment-header">
									<div class="comment-person">
										<div class="comment-img">
											<img src="images/comm-1.jpg" rel="comment-1">
										</div>
										<div class="comment-hex hex-green"></div>
									</div>
									<div class="comment-info">
										<div class="c-name">John Stone</div>
										<div class="c-time">3 hours ago</div>
									</div>
										<a href="#" onclick="return false;" class="icon-button btn-reply">
										<i class="fa fa-reply"></i>
										</a>
									<div class="c-ip">IP: <span class="ip">172.10.56.3</span></div>
							</div> <!-- /comment-header -->
											
							<div class="comment-text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...
							</div> <!-- /comment-text -->
								</div> <!-- /comment -->
									<div class="comment">
										<div class="comment-header">
											<div class="comment-person">
												<div class="comment-img">
													<img src="images/comm-3.jpg" rel="comment-1">
												</div>
												<div class="comment-hex hex-green"></div>
											</div>
												<div class="comment-info">
													<div class="c-name">John Stone</div>
													<div class="c-time">3 hours ago</div>
												</div>
												<a href="#" onclick="return false;" class="icon-button btn-reply"><i class="fa fa-reply"></i></a>
												<div class="c-ip">IP: <span class="ip">172.10.56.3</span></div>
											</div> <!-- /comment-header -->
											
									<div class="comment-text">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...
									</div> <!-- /comment-text -->

									<div class="comment-reply">
										<div class="reply-header">
											<div class="reply-person">
												<div class="comment-img">
													<img src="images/comm-3.jpg" rel="comment-1">
												</div>
												<div class="comment-hex hex-green"></div>
											</div>
											<div class="reply-info">
												<div class="c-name">John Stone</div>
												<div class="c-time">2:36 pm</div>
											</div>
											<div class="c-ip">IP: <span class="ip">172.10.55.3</span></div>
										</div>

										<div class="comment-text">
											Sed ut perspiciatis unde omnis iste natus error sit voluptatem
										</div> <!-- /comment-text -->
									</div> <!-- /comment-reply -->
									<div class="comment-reply">
										<div class="reply-header">
											<div class="reply-person">
												<div class="comment-img">
													<img src="images/comm-3.jpg" rel="comment-1">
												</div>
												<div class="comment-hex hex-green"></div>
											</div>
											<div class="reply-info">
												<div class="c-name">John Stone</div>
												<div class="c-time">2:36 pm</div>
											</div>
											<div class="c-ip">IP: <span class="ip">172.10.55.3</span></div>
										</div>

										<div class="comment-text">
											Sed ut perspiciatis unde omnis iste natus error sit voluptatem
										</div> <!-- /comment-text -->
									</div> <!-- /comment-reply -->
									</div> <!-- /comment -->

										<div class="comment">
											<div class="comment-header">
												<div class="comment-person">
													<div class="comment-img">
														<img src="images/comm-2.jpg" rel="comment-1">
													</div>
													<div class="comment-hex hex-yellow"></div>
												</div>
												<div class="comment-info">
													<div class="c-name">Anna Andreson</div>
													<div class="c-time">6 hours ago</div>
												</div>
												<a href="#" onclick="return false;" class="icon-button btn-reply"><i class="fa fa-reply"></i></a>
												<div class="c-ip">IP: <span class="ip">172.10.56.3</span></div>
											</div> <!-- /comment-header -->
											
											<div class="comment-text">
												Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
											</div> <!-- /comment-text -->

											<div class="comment-reply">
												<div class="reply-header">
													<div class="reply-person">
														<div class="comment-img">
															<img src="images/comm-3.jpg" rel="comment-1">
														</div>
														<div class="comment-hex hex-green"></div>
													</div>
													<div class="reply-info">
														<div class="c-name">John Stone</div>
														<div class="c-time">2:36 pm</div>
													</div>
													<div class="c-ip">IP: <span class="ip">172.10.55.3</span></div>
												</div>

												<div class="comment-text">
													Sed ut perspiciatis unde omnis iste natus error sit voluptatem
												</div> <!-- /comment-text -->
											</div> <!-- /comment-reply -->

										</div> <!-- /comment -->
										
									</div> <!-- /widget-content -->

								</div> <!-- /widget -->
						
				</div> <!-- /tab-container -->

		</div> <!-- /topTabs -->
		
		</div>
		</div> <!-- /main -->
	<!-- Product Edit Modal -->
	<div class="modal fade" id="ProductEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
	</div>
		
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<style>
	div.sales_information {
	    border-radius: 2px;
	    border: 1px solid #eae0e0;
	    padding: 20px;
	    
	}
	div.show-image {
	    position: relative;
	    float:left;
	    margin:5px;
	}
	div.show-image:hover img{
	    opacity:0.5;
	}
	div.show-image:hover button {
	    display: block;
	}
	div.show-image button {
	    position:absolute;
	    display:none;
	}
	div.show-image button.delete-photo {
	    top:23px;
	    left:15%;
	}
	div.allimages{
		padding-bottom:90px;
	}
</style>
<script type="text/javascript" src="<?php echo e(asset('js/dropzone.js')); ?>"></script>
<script>
Dropzone.autoDiscover=false;
console.log($('meta[name="csrf-token"]').attr('content'));
$('.dropzone').each(function() {
	$(this).dropzone({
		paramName:'photo',
		maxFilesize:6,
		sending: function(file, xhr, formData) {
				formData.append('_token',$('meta[name="csrf-token"]').attr('content'));
				
			},
		success: function(html) {
			notify('Images uploaded', 'success','topRight');
			
			var productId= html['xhr'].responseText;
			
			$.ajax({
  				url: "/user/"+productId+"/productimage",
  				
  				cache: false,
  				success: function(html){
  					var image='<div class="allimages" id="allimages';
  					image+=productId;
  					image+='">';
  					for(i in html)
  					{
  						image+='<img src="/';
  						image+=html[i].thumbnail_path;
  						image+='"/>';
  					}
  						image+='</div>';
  						console.log(image);	
  					$('#allimages'+productId).replaceWith(image);
				}
			});
			
		}
			
	});
});
</script>
<script>
	$('.delete-photo').on('click', function(event) {
	event.preventDefault();
	x=confirm('Are you sure you want to delete?');
	if(x) {
	    $('#delete-form'+$(this).data('id')).submit();
	 }
	 });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	

<?php $__env->startSection('title'); ?>
<?php echo e($sale->name); ?>

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
			  <li><a href="<?php echo e(route('usersales')); ?>">My Sales</a></li>
			  <li class="active"><?php echo e($sale->name); ?></li>
			</ol>
		</div>

		<?php echo $__env->make('user.saleDetails', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<div class="fluid">	
				<div class="fluid">		
					<div class="widget grid12">
						<div class="widget-header">
							<h3 class="widget-title">Products</h3>
							<a  href="#myModal" role="button" class="new-button" data-toggle="modal" data-target="#myModal">
								<button class="btn btn-info new-button">+ Add a Product</button>
							</a>
						</div>

					<?php echo $__env->make('user.salesTable', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
					
					</div>
				</div>
		</div>

		<?php echo $__env->make('user.createProductModal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</div>
		
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<script>
// Edit Form Set Date Fields 
	$('#starts_on').datetimepicker({
		format:"Y-M-D",
		minDate:new Date(),
		useCurrent:false,
		defaultDate: '<?php echo e($sale->starts_on->format('Y-m-d')); ?>',
	});

	$('#ends_on').datetimepicker({
		format:"Y-M-D",
		minDate:new Date(),
	  useCurrent: false //Important! See issue #1075
	});

	$("#starts_on").on("dp.change", function (e) {
		if(e.date)
	    	 { $('#ends_on').data("DateTimePicker").minDate(e.date); }
	    else
	    	{ $('#ends_on').data("DateTimePicker").minDate(new Date()); }
	});

	$("#ends_on").on("dp.change", function (e) {
		$('#starts_on').data("DateTimePicker").maxDate(e.date);
	});

	// TODO : editing start date to more than end date is possible right now.
</script>


<script>
Dropzone.autoDiscover=false;
$('.dropzone').each(function() {
	$(this).dropzone({
		paramName:'photo',
		maxFilesize:6,
		sending: function(file, xhr, formData) {
				formData.append('_token',$('meta[name="csrf-token"]').attr('content'));
				console.log(xhr);
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
  					$('#allimages'+productId).replaceWith(image);
				}
			});
			
		}
	});
});
		
</script>
<script>
$(document).ready(function(){

	$('#more-button').on('click', function(event) {
		event.preventDefault();
		$('#more-content').toggle(200);
	});

	$('.ajaxSoldButton').each(function() {
		$(this).on('click',function(event){
			var t=$(this);
			event.preventDefault();
			$(this).removeClass('btn-blue').addClass('btn-green');
			$(this).children('.fa-check').removeClass('fa-check').addClass('fa-spinner fa-spin fa-1x fa-fw');
			var productId= $(this).data('id');
			$.ajax({
				url: "/user/"+productId+"/changestatus",
				cache: false,
				success: function(html){
				if(html==1)
						{
							 t.removeClass('btn-blue').addClass('btn-red disabled');
							 t.children('.fa-spin').removeClass('fa-spinner fa-spin fa-1x fa-fw').addClass('fa-check');
						}
					}
			});
		});
	});

	$('#currentCostCurrency').on('change', 'select', function (e) {
		var val = $(e.target).val();
		var text = $(e.target).find("option:selected").text();  
		var name = $(e.target).attr('name');
		console.log(text);
	});
  	  
});
</script>

<?php if(session('product_created')): ?>
<script>
	notify('Product created','success','bottomCenter');
</script>
<?php endif; ?>
<?php if(session('sale_edited')): ?>
<script>
	notify('Sale information edited and saved.','success','bottomCenter');
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
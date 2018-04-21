<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $__env->yieldContent('title'); ?></title>

	<link rel="apple-touch-icon" sizes="144x144" href="apple-touch-icon-ipad-retina.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="apple-touch-icon-iphone-retina.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="apple-touch-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="apple-touch-icon-iphone.png" />
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

	<!-- bootstrap -->
    <link href="<?php echo e(asset('css/bootstrap/bootstrap.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('css/hint.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome-4.0.3/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery-ui.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/toastr.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/dropzone.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-datetimepicker.css')); ?>">
	<link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(asset('css/parsley.css')); ?>" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
 
</head>
<body>
	<div id="loading">
		<div>
			<div></div>
		    <div></div>
		    <div></div>
		</div>
	</div>
	
	<?php echo $__env->yieldContent('content'); ?>

	<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<!--<script type="text/javascript" src="js/prefixfree.min.js"></script>-->
	<script type="text/javascript" src="<?php echo e(asset('js/jquery-1.10.2.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/jquery.sparkline.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/jquery.easytabs.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/excanvas.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/jquery.flot.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/jquery.flot.resize.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/jquery.noty.packaged.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/dropzone.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/parsley.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/datetimepicker.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/functions.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/main.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('js/owl.carousel.js')); ?>"></script>
	
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
	
	<?php echo $__env->yieldContent('footer_scripts'); ?>
	
</body>
</html>
<!-- Localized -->
@extends('layout')

@section('title')
My Sales
@stop

@section('content')

<div id="wrapper" class="container">
		
		<div id="top">
		@include('user.topbar')
		@include('user.stats')
		</div>
	

	@include('user.sidebar')
	<div id="main" class="clearfix">
		<div class="breadcrumbs-container">
			<ol class="breadcrumb">
			  <li class="active">My Sales</li>
			</ol>
		</div>

		<div class="topTabs">
				<div id="topTabs-container-home">
					<div class="topTabs-header clearfix">
						<div class="secInfo sec-dashboard">
							<h1 class="secTitle">My Sales</h1>
							<span class="secExtra">All sales I've created</span>
						</div> <!-- /SecInfo -->
						<a href='{{ route('createsale') }}'>
							<button class="btn btn-info new-button">Create a New Sale</button>
						</a>
					</div><!-- /topTabs-header -->
				</div> <!-- /tab-container -->
		</div> <!-- /topTabs -->
		
		@include('user.allSalesTable')
		
	</div> <!-- /main -->

</div> <!-- /wrapper -->
@stop
@section('footer_scripts')
<script>
	  $(document).ready(function(){
	  	  $( "#starts_on" ).datepicker({
	  		dateFormat: "yy-mm-dd"
			});
	  	  $('#starts_on').on('changeDate', function(ev){
	  	        $('#starts_on').val(ev.target.value);
	  	     });
	  	  $("#ends_on" ).datepicker({
	  		dateFormat: "yy-mm-dd"
			});
	  });
</script>
@stop
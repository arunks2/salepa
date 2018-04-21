@extends('layout')

@section('title')
Sales
@stop

@section('content')
<div id="wrapper" class="container">
	<div id="top">
	@include('user.topbar')
	</div>
	<div id="main" class="viewSale clearfix">
		<div class="breadcrumbs-container">
			<ol class="breadcrumb">
			  <li><a href="/sales">Dashboard</a></li>
			  <li class="active">{{ucwords($sale->slug)}}</li>
			</ol>
		</div>
		<div class="topTabs">
				<div id="topTabs-container-home">
					<div class="topTabs-header clearfix">
						<div class="fluid">
							<div class="widget grid6">
								<div class="widget-header">
									<h3 class="widget-title">{{$sale->name}}
										
									</h3>
								</div>
								<div class="widget-content pad30f">
									<p>{{$sale->description}}</p>
									<div class="contactInfo">
										<h4 class="infoHeading">Status:</h4>
										<p>@if(\Carbon\Carbon::now()<$sale->starts_on)
								<h3 class="infoTitle upcoming">Upcoming</h3>
							@else
								@if($sale->ends_on->format('Y')=='-0001')
									<h3 class="infoTitle ongoing">Ongoing</h3>
								@else
									@if($sale->ends_on>\Carbon\Carbon::now())
										<h3 class="infoTitle ongoin">Ongoing</h3>
									@else
										<h3 class="infoTitle past">Past Sale</h3>
									@endif
								@endif
							@endif</p>
								<h4 class="infoHeading">Starts On:</h4>
									<p>{{$sale->starts_on->format('d M y')}}</p>
								<h4 class="infoHeading">Ends On:</h4>
									<p>@if($sale->ends_on->format('Y')=='-0001')
									----
								@else
									{{ $sale->ends_on->format('d M y') }}
								@endif</p>
									</div>
								</div>
							</div>
							<div class="widget grid6">
								<div class="widget-header">
									<h3 class="widget-title">
										Contact Information
										
									</h3>
								</div>
								<div class="widget-content pad30f">
									
									<div class="contactInfo">
										<h4 class="infoHeading">Pickup Area</h4>
										<p>{{$sale->address}}</p>
										<h4 class="infoHeading">Contact Number</h4>
										<p>{{$sale->contact_info}}</p>
									</div>
									<div class="secInfo">
										<span class="secExtra"></span>
										<h3 class="infoTitle">
											<a  href="/user/generatepdf/{{$sale->id}}" role="button" class="new-button" data-toggle="modal" >
												<button class="btn btn-info new-button">Download</button>
											</a>
										</h3>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /topTabs-header -->
				</div> <!-- /tab-container -->
			</div> <!-- /topTabs -->
				@if($sale->products->count()==0)
					<h3>No products in the current Sale</h3>
				@else
					@foreach($sale->products as $product)
					<div class="fluid">
						<div class="widget leftcontent grid6">
							<div class="widget-header">
								<h3 class="widget-title ">Images</h3>
							</div>
							<div class="widget-content">
								<div id="owl-demo2" class="owl-carousel owl-theme">
								 @if($product->photos->count()>0)
								 	@foreach($product->photos as $photo)
								  		<div class="item"><img src="/{{$photo->thumbnail_path}}" /></div>
								  	@endforeach
								 @endif 
								</div>
							</div> <!-- /widget-content -->
						</div> <!-- /widget -->
						<div class="widget grid6">
							<div class="widget-header">
								<h3 class="widget-title">Product Information</h3>
							</div>
							<div class="widget-content">
								<p>
									<div class="secInfo">
										<a href="/sales/{{$sale->slug}}/{{$product->id}}"><h3 class="infoTitle">{{ucwords($product->name)}} - {{$product->purchase_year}}</h3>
										</a>
											<p>{{$product->description}}</p>
											<div class="contactInfo">
												<h4 class="infoHeading">Selling Price:</h4>
											<p>{{$product->sell_price}}</p>
												<h4 class="infoHeading">Condition</h4>
											<p>{{$product->condition}}</p>
											</div>
									</div>
								</p>
							</div> <!-- /widget-content -->
						</div> <!-- /widget -->
					</div> <!-- /fluid:6+6 -->
					@endforeach
				@endif
		</div>
	</div>	
</div>
@stop
@include('guest.sharedloginscript')
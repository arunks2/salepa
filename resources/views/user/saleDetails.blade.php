<div class="topTabs">
		<div id="topTabs-container-home">
			<div class="topTabs-header clearfix">
				<a href="#" id="more-button">Details</a>
				<div class="less-container clearfix">
					<div class="secInfo sec-dashboard">
						<h3 class="widget-title">
							{{$sale->name}}
							<a  
								href="#saleHeaderEditModal" 
								role="button" 
								class="heading-button" 
								data-toggle="modal" 
								data-target="#saleHeaderEditModal"
							>
								<i class="fa fa-pencil"></i>
							</a>
						</h3>
						<span class="secExtra">{{ str_limit($sale->description, $limit = 50, $end = '...') }}</span>
					</div>
					<div class="secInfo">
						<span class="secExtra">Status</span>
						@if(\Carbon\Carbon::now()<$sale->starts_on)
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
						@endif
					</div>
					<div class="secInfo">
						<span class="secExtra">Starts on</span>
						<h3 class="infoTitle">{{ $sale->starts_on->format('d M y') }}</h3>
					</div>
					<div class="secInfo">
						<span class="secExtra">Ends on</span>
						<h3 class="infoTitle">
							@if($sale->ends_on->format('Y')=='-0001')
								----
							@else
								{{ $sale->ends_on->format('d M y') }}
							@endif
						</h3>
					</div>
				</div>
				<div class="more-container clearfix" id="more-content">
					<div class="fluid">
						<div class="widget grid6">
							<div class="widget-header">
								<h3 class="widget-title">Private Information
									<a  href="#salePrivateEditModal" role="button" class="heading-button" data-toggle="modal" data-target="#salePrivateEditModal">
										<i class="fa fa-pencil"></i>
									</a>
								</h3>
							</div>
							<div class="widget-content pad30f">
								<p>This information is only visible to the potential buyers when you decide.</p>
								<div class="contactInfo">
									<h4 class="infoHeading">Exact Pickup Address</h4>
									<p>{{$sale->pvt_address}}</p>
									<h4 class="infoHeading">Contact Number</h4>
									<p>{{$sale->pvt_contact_info}}</p>
								</div>
							</div>
						</div>
						<div class="widget grid6">
							<div class="widget-header">
								<h3 class="widget-title">
									Public Information
									<a  href="#salePublicEditModal" role="button" class="heading-button" data-toggle="modal" data-target="#salePublicEditModal">
										<i class="fa fa-pencil"></i>
									</a>
								</h3>
							</div>
							<div class="widget-content pad30f">
								<p>This information is visible to all visitors to identify you location area and feasibility.</p>
								<div class="contactInfo">
									<h4 class="infoHeading">Pickup Area</h4>
									<p>{{$sale->address}}</p>
									<h4 class="infoHeading">Contact Number</h4>
									<p>{{$sale->contact_info}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /topTabs-header -->

		</div> <!-- /tab-container -->
</div> <!-- /topTabs -->

@include('user.saleEditModals')
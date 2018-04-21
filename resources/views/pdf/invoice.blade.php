
<div id="topBar">
	<div class="wrapper20">
	<div class="fluid sales-table">
		<div class="widget leftcontent grid6">			
			<div class="widget-content">
				<p>
					<div class="less-container clearfix">
						<div class="secInfo">
							<span class="secExtra">{{$sale->name}}</span>
							<h3 class="infoTitle">{{ ($sale->description) }}</h3>
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

				</p>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
		<div class="widget grid6">
			<div class="widget-content">
				<p>
					<div class="less-container clearfix">
						<div class="secInfo">
							<span class="secExtra">Created By: </span>
							<h3 class="infoTitle">{{ $sale->owner->name}}</h3>
						</div>
						<div class="secInfo">
							<span class="secExtra">Email: </span>
							<h3 class="infoTitle">{{ $sale->owner->email}}</h3>
						</div>
						<div class="secInfo">
							<span class="secExtra">Profile Picture:</span>
							<h3 class="infoTitle">
								<img src="./{{$sale->owner->profile_pic_path}}" style="width:100px; height:100px"/>
							</h3>
						</div>
					</div>
				</p>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	<hr>
	@if($sale->products)
	@foreach($sale->products as $product)
	<div class="fluid sales-table">
		<div class="widget leftcontent grid4">	
		<div class="widget-content">
			<p>
				<div class="less-container clearfix">
					<div class="secInfo">
						<span class="secExtra">{{$product->name}} </span>
						<h3 class="infoTitle">{{ $product->description}}</h3>
					</div>
					<div class="secInfo">
						<span class="secExtra">Purchase Year </span>
						<h3 class="infoTitle">{{ $product->purchase_year}}</h3>
					</div>
				</div>
			</p>
		</div> <!-- /widget-content -->
		</div>
		<div class="widget grid4">
			<div class="widget-content">
				<p>
					<div class="less-container clearfix">
						<div class="secInfo">
							<span class="secExtra">Cost Price</span>
							<h3 class="infoTitle">{{getCostPrice($product,$user)}}</h3>
						</div>
						<div class="secInfo">
							<span class="secExtra">Sale Price</span>
							<h3 class="infoTitle">{{ getSellPrice($product, $user)}}</h3>
						</div>
						<div class="secInfo">
							<span class="secExtra">Condition</span>
							<h3 class="infoTitle">{{$product->condition}}</h3>
						</div>
					</div>
				</p>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->

		<div class="widget grid4">
			<div class="widget-content">
				<p>
					<div class="less-container clearfix">
						<div class="secInfo">
							<span class="secExtra">Product Image</span>
							<h3 class="infoTitle">
							<img 
								class="product-image"
								src="<? 
								if($product->photos->first()['thumbnail_path']) :
								
							echo $_SERVER['DOCUMENT_ROOT'] .'/'.$product->photos->first()['thumbnail_path'];
								else:
									echo $_SERVER['DOCUMENT_ROOT'].'/'."images/nophoto.jpg";
								endif; ?>"
								/>
							</h3>
						</div>
					</div>
				</p>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /fluid:4+4+4-->	
	<hr>
	@endforeach
	@endif
</div>
</div>

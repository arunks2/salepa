<div class="fluid sales-table">
	<div class="widget grid12">
		<div class="widget-content pad10">
			@if($sales->count()==0)
				<div class="no-content no-sale">
				    It's lonely here. Let's <a href='{{ route('createsale') }}'>create a sale</a>
				</div>
			@else
						<table class="table table-hover my-table">
							<thead>
								<tr>
									<td>Name</td>
									<td>Starts on</td>
									<td>Ends on</td>
									<td>Total Products</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>	
							@foreach($sales as $sale)
							<tr>
								<td><a href="{{ route('sale_show', $sale->slug) }}">{{$sale->name}}</a></td>
								<td>{{ $sale->starts_on->format('d M Y') }}</td>
								<td>
									@if($sale->ends_on->format('Y') != '-0001')
										{{ $sale->ends_on->format('d M Y') }}
									@else
										Not Defined
									@endif
									</td>
								<td>{{ count($sale->products) }}</td>
								<td>
									<div class="btn-group xtra"> <!-- btn dd -->
										<a href="#" onclick="return false;" class="icon-button dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear"></i></a>
										<ul class="dropdown-menu pull-right">
											 <li><a href="#editSaleModal{{$sale->id}}" role="button" data-toggle="modal" data-target="#editSaleModal{{$sale->id}}">Edit</a></li>
											 <li><a href="#deleteSaleModal{{$sale->id}}" role="button" data-toggle="modal" data-target="#deleteSaleModal{{$sale->id}}">Delete</a></li>
			                            </ul>

									</div>
								</td>
							</tr>
							@include('user.editSaleModal')
							@endforeach
							</tbody>
						</table>	
			@endif						
			</div>
		</div>
	</div>	
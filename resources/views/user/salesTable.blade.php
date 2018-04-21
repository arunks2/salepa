<div class="widget-content">
	<div class="fluid sales-table">
		<div class="widget grid12">
			<div class="widget-content pad10">
				@if($sale->products->count()==0)
				<div class="no-content no-products">
					There are no products. Let's <a href="#myModal" role="button" data-toggle="modal" data-target="#myModal">add some</a>
				</div>
				@else
				<table class="table table-striped my-table products-table">
					<thead>
						<tr>
							<td>Image</td>
							<td>Product Name</td>
							<td>

								Cost Price</td>
								<td>Selling Price</td>
								<td>Sold Status</td>
								<td>Actions</td>
							</tr>
						</thead>
						<tbody>		
							@foreach($sale->products as $product)
								@include('user.products.tableRow')
								@include('user.products.editModal')
							@endforeach
						</tbody>
					</table>
					@endif			
				</div>
			</div>
		</div>
	</div>

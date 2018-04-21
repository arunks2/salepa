<tr>
	<td>	
		<a
		href="#uploadModal{{$product->id}}" 
		role="button" 
		data-toggle="modal" 
		data-target="#uploadModal{{$product->id}}"
		class="hint--bottom"
		aria-label="Manage Images"
		>
		<img 
		class="product-image"
		src="/
		@if($product->photos->first()['thumbnail_path'])
			{{$product->photos->first()['thumbnail_path']}}
		@else
			images/nophoto.jpg
		@endif
		"
		/>
	</a>
</td>
<td>
	<a href="/user/products/{{$product->id}}">
		{{$product->name}}
	</a>
</td>

<td>
	{{ getCostPrice($product, $user)}}
</td>
<td>
	{{ getSellPrice($product, $user)}}
</td>
<td>
	@if($product->is_sold==0)
	<a 
	href='#' 
	class="btn btn-blue ajaxSoldButton" 
	id="soldButton" 
	data-productid="" 
	data-id="{{$product->id}}"
	>
	<i class="fa fa-check"></i>
	<span class="btn-content" id="sold">Mark as Sold</span>
</a>
@else
<a href='#' class="btn btn-red disabled" id="" data-productid="" data-id="{{$product->id}}">
	<i class="fa fa-check" ></i>
	<span class="btn-content" id="sold">Mark as Sold</span>
	@endif
</td>
<td>
	<div class="btn-group xtra"> <!-- btn dd -->
		<a href="#" onclick="return false;" class="icon-button dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear"></i></a>
		<ul class="dropdown-menu pull-right">
			<li>
				<a href="#uploadModal{{$product->id}}" 
					role="button" 
					data-toggle="modal" 
					data-target="#uploadModal{{$product->id}}">
					Manage Product Images
				</a>
			</li>
			<li>
				<a href="#editProductModal{{$product->id}}" role="button" data-toggle="modal" data-target="#editProductModal{{$product->id}}">Edit Product</a></li>
				<li><a href="#deleteProductModal{{$product->id}}" role="button" data-toggle="modal" data-target="#deleteProductModal{{$product->id}}">Delete Product</a></li>
			</ul>
		</div>
		<!-- uploadModal -->
		@include('user.products.manageProductImagesModal')
		@include('user.products.deleteProductModal')
		
	</td>
</tr>
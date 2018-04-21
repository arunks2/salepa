@extends('layout')

@section('title')
All Products
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
			  <li><a href="/user/dashboard">Dashboard</a></li>
			 
			</ol>
		</div>

		<div class="topTabs">
				<div id="topTabs-container-home">
					<div class="topTabs-header clearfix">
						<table id="example" class="display" cellspacing="0" width="100%">
					        <thead>
					            <tr>
					                <th>Image</th>
					                <th>Name</th>
					                <th>Condition</th>
					                <th>Selling Price</th>
					            </tr>
					        </thead>
					        <tfoot>
					            <tr>
					                <th>Image</th>
					                <th>Name</th>
					                <th>Condition</th>
					                <th>Selling Price</th>
					            </tr>
					        </tfoot>
					        <tbody>
					            <tr>
					            	@if($products->count()>0)
					            	@foreach($products as $product)
					            		<td><img src="
											@if($product->photos->first()['thumbnail_path']) 
											/{{ $product->photos->first()['thumbnail_path']}}
											@endif
					            			" /></td>
					            		<td>{{$product->name}}
					            		<td>{{$product->condition}}</td>
					            		<td>{{$product->sale_price}}</td>
					            	
					            </tr>
					            @endforeach
					            @endif
					        </tbody>
					    </table>
					</div><!-- /topTabs-header -->								
				</div> <!-- /tab-container -->
		</div> <!-- /topTabs -->
		</div> <!-- /main -->
	</div>		
</div>
@stop
@section('footer_scripts')
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
<style>
	tr td img{
		height: 50px;
		width: 50px;
	}
</style>
@stop
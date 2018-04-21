@extends('layout')

@section('title')
Guest View
@stop

@section('content')
<div id="wrapper" class="container">
	<div id="top">
	@include('user.topbar')
	</div> 
	<div id="main" class="clearfix">
		<div class="breadcrumbs-container">
			<ol class="breadcrumb">
			  <li class="active">All Sale</li>
			</ol>
		</div>
	<div class="fluid sales-table">
		<div class="widget grid12">
			<div class="widget-content pad10">
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
							@if($sales)
								@foreach($sales as $sale)
							<tr>
							<td><a href="/sales/{{$sale->slug}}">{{$sale->name}}</a></td>
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
														
							</td>
							</tr>
							<div class="modal fade" id="editSaleModal{{$sale->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							        <h4 class="modal-title" id="myModalLabel">Create Product</h4>
							      </div>
	
							    </div><!-- /.modal-content -->
							  </div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
								@endforeach
							@endif						
					</tbody>
				</table>	
			</div>
		</div>
	</div>
</div>
@stop
@include('guest.sharedloginscript')
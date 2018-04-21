@extends('layout')

@section('title')
Create Sale
@stop

@section('content')
<div id="wrapper" class="container">
	<div id="top">
	@include('user.topbar')
	</div>
	<div id="main" class="clearfix">
		<div class="breadcrumbs-container">
			<ol class="breadcrumb">
			  <li><a href="/sales">Dashboard</a></li>
			  <li><a href="/sales/{{$product->sale->slug}}">{{ucwords($product->sale->slug)}}</a></li>
			  <li class="active">{{$product->name}}</li>
			</ol>
		</div>
		<div class="topTabs">
				<div id="topTabs-container-home">
					<div class="topTabs-header clearfix">
					<div id="owl-demo">
					@if($product->photos->count()>0)
					@foreach($product->photos as $photo)
					    <div class="item">
					        <img src="/{{$photo->path}}" />
					    </div>
					@endforeach
					@endif
					</div>


						<div class="fluid">
							<div class="widget grid6">
								<div class="widget-header">
									<h3 class="widget-title">{{$product->name}}
										
									</h3>
								</div>
								<div class="widget-content pad30f">
									<p>{{$product->description}}</p>
									<div class="contactInfo">
										<h4 class="infoHeading">Purchase_Year</h4>
										<p>{{$product->purchase_year}}</p>
								<h4 class="infoHeading">Selling Price:</h4>
									<p>{{$product->sell_price}}</p>
								<h4 class="infoHeading">Condition</h4>
									<p>{{$product->condition}}</p>
									</div>
								</div>
							</div>
							<div class="widget grid6">
								<div class="widget-header">

								</div>
								<div class="widget-content pad30f">
									@if(Auth::check())
									<a  href="#sendMessageModal" role="button" class=" btn btn-blue btn-half heading-button" data-toggle="modal" data-target="#sendMessageModal">Send a message</a>
									@else
									<a class="fb btn btn-blue btn-full" href="/index.html" id="fbLogin" style="float:right"><i class="fa fa-facebook"></i>Login through Facebook</a>
									@endif
									
								</div>
							</div>
						</div>
					</div><!-- /topTabs-header -->
				</div> <!-- /tab-container -->
		</div> <!-- /topTabs -->
				<!-- sendMessageModal -->
				<div class="modal fade" id="sendMessageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">Send Message</h4>
				      </div>
				      {{ Form::open(['url'=>'/user/send_message','method'=>'post','id'=>'form']) }}
				      	<div class="widget-content pad20f">
				      		<input type="hidden" name="product_id" value="{{$product->id}}">
				      		<textarea class="textarea" rows="4" name="text" placeholder="Type your message"></textarea>
                            <span class="custom-input">   
                            	<button type="submit">Save</button>
                            </span>
				      							
						</div> <!-- /widget-content -->
				      {{ Form::close() }}
				      
				    </div><!-- /.modal-content -->
				  </div><!-- /.modal-dialog -->
				</div><!-- /.sendMessageModal -->
			@if(Auth::User())
			@if(conversationProduct($product))
				@foreach(conversationProduct($product) as $conservation)
					@if($conservation->messages)
					@foreach($conservation->messages as $message)
						{{$message->text}}
					@endforeach
					@endif
				@endforeach
			@else
				<h3>No Conversations</h3>
			@endif
			@endif
		</div>	<!-- /widget-content -->
@include('guest.sharedloginscript')
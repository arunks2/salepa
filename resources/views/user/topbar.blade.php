
<div id="topBar">
	<div class="wrapper20">
		<a class="logo" href="{{ route('dashboard') }}" title="">
			<img src="{{ asset('images/logo.png') }}" rel="logo">
		</a>
		<div class="topNav clearfix">
			@if(Auth::check())
				<input class="topSearch" type="text" placeholder="Search...">
				<ul class="tNav clearfix">
					<li><a href="#" onclick="return false;"><i class="fa fa-search icon-white"></i></a></li>
					<li>
						<a data-toggle="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-gear icon-white"></i></a>
						  <ul class="dropdown-menu pull-right">
						    <li><a href="#editUserModal" role="button" data-toggle="modal" data-target="#editUserModal"><i class="fa fa-pencil"></i>Edit</a></li>
	                        <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
	                        <li><a href="#"><i class="fa fa-ban"></i> Ban</a></li>
	                        <li class="divider"></li>
	                        <li><a href="#"> Other actions</a></li>
						  </ul>
					</li>
					<li>
						<a href="messages.html"><i class="fa fa-comment icon-white"></i></a>
						<span class="badge badge-tNav">4</span>
					</li>
					<li><a href="{{ route('logout') }}"><i class="fa fa-times icon-white"></i></a></li>
				</ul>
					<!-- Edit User Model -->
					<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					        <h4 class="modal-title" id="myModalLabel">Edit User Settings</h4>
					      </div>
					      <div class="sales_information">			
							<div class="widget-content pad30f">
								<div class="contactInfo">
									<h4 class="infoHeading">Name:</h4>
									<p>
										@if(Auth::User()->name)
										{{Auth::User()->name}}
										@endif
									</p>
								</div>
								<div class="contactInfo">
									<h4 class="infoHeading">Email:</h4>
									<p>
									@if(Auth::User()->email)
									{{Auth::User()->email}}
									@endif
									</p>
								</div>
								<div class="contactInfo">
									<h4 class="infoHeading">Profile Picture</h4>
									<p><img 
									src="/
									@if(isset(Auth::User()->profile_pic_path))
									{{Auth::User()->profile_pic_path}}
									@else
									  images/default.png
									@endif" /></p>
									<div class="change-pic">
										<a class="fb btn btn-blue btn-half change-pic" href="" id="fbLogin" style="float:right"><i class="fa fa-facebook"></i>Change Picture</a>
									</div>
								</div>
							</div>
							{{ Form::open(['url'=>'/user/user_edit','method'=>'post','id'=>'form']) }}
								<div class="widget-content pad20f">
									<div class="sales_information">
										<label>Select Default Currency</label>			
										<div class="dropdown">
										@if(allCurrencies())
										    <select name="currency_id" class="dropdown-select" data-parsley-required>
										    @foreach(allCurrencies() as $currency)
									    		<option value="{{$currency->id}}"
												@if($currency->id==Auth::User()->currency->id)
													selected
												@endif
									    		>{{$currency->short_symbol}}</option>  
									    	@endforeach      		
									    	</select>
									    @endif
										</div>
										<label>About</label>
										<textarea class="textarea" rows="3" name="about_text" placeholder="Something about yourself?">
										@if(isset(Auth::User()->about))
										{{Auth::User()->about}}
										@endif
										</textarea>
					                	<span class="custom-input">   
						                	<button type="submit">Save</button>
						                </span>
					                </div>
								</div> <!-- /widget-content -->
							{{ Form::close() }}
					    </div><!-- /.modal-content -->
					  </div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					</div>
			@else
				<a class="fb btn btn-blue btn-full" href="/index.html" id="fbLogin" style="float:right"><i class="fa fa-facebook"></i>Login through Facebook</a>
			@endif
		</div> <!-- /topNav -->
	</div>
</div> <!-- /topBar -->


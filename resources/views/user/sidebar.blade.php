<div id="sidebar">
	<ul class="mainNav">
		<li @if(Request::is('user/dashboard')) class="active" @endif>
			<a href="{{ route('dashboard') }}"><i class="fa fa-th"></i><br>Dashboard</a>
		</li>
		<li @if(Request::is('user/sales') || Request::is('user/sales/*')) class="active" @endif>
			<a href="{{ route('usersales') }}"><i class="fa fa-bullhorn"></i><br>My Sales</a>
		</li>
		<li>
			<a href="/user/allproducts"><i class="fa fa-asterisk"></i><br>My Products</a>
		</li>
		<li>
			<a href="messages.html"><i class="fa fa-comments"></i><br>Messages</a>
			<span class="badge badge-mNav">4</span>
		</li>
		<li>
			<a href="charts.html"><i class="fa fa-bar-chart-o"></i><br>Reports</a>
		</li>
	</ul>
</div> <!-- /sidebar -->
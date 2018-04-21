
<div id="profile">
	<div class="wrapper20">
		<div class="userInfo">
			<div class="userImg">
				<img src="/{{ $user->profile_pic_path }}" rel="user">
			</div>
			<div class="userTxt">
				<span class="fullname">{{$user->name}}</span> <i class="fa fa-chevron-right"></i><br>
				<span class="username">{{ $user->email }}</span>
			</div>
		</div> <!-- /userInfo -->
		<div class="userStats">
			<div class="uStat">
				<div class="stat-name">
					Live Sales
				</div>
				<div class="stat-number">{{count($user->sales)}}</div>
			</div>
			<div class="uStat">
				<div class="stat-name">
					Products
				</div>
				<div class="stat-number">{{count($user->products)}}</div>
			</div>
			<div class="uStat">
				
				<div class="stat-name">
					Visits <div class="stat-badge">+0</div>
				</div>
				<div class="stat-number">
					{{$user->salevisits}}
				</div>

			</div>
			<div class="uStat">
				
				<div class="stat-name">
					Conversations
				</div>
				<div class="stat-number">12</div>
			</div>
		</div>

		<i class="fa fa-bars icon-nav-mobile"></i>

	</div>
</div> <!-- /profile -->

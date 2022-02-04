@php
$sidebarClass = (!empty($sidebarTransparent)) ? 'sidebar-transparent' : '';
@endphp
<!-- begin #sidebar -->
<div id="sidebar" class="sidebar {{ $sidebarClass }}">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		@if (!$sidebarSearch)
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<a href="javascript:;" data-toggle="nav-profile">
					<div class="cover with-shadow"></div>
					<div class="image">
						<img src="/assets/img/user/user-2.jpg" alt="" />
					</div>
					<div class="info">
						<b class="caret pull-right"></b>
						Sean Ngu
						<small>Front end developer</small>
					</div>
				</a>
			</li>
			<li>
				<ul class="nav nav-profile">
					<li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
					<li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
					<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
				</ul>
			</li>
		</ul>
		<!-- end sidebar user -->
		@endif
		<!-- begin sidebar nav -->
		<ul class="nav">
			@if ($sidebarSearch)
			<li class="nav-search">
				<input type="text" class="form-control" placeholder="Sidebar menu filter..." data-sidebar-search="true" />
			</li>
			@endif
			<li class="nav-header">Navigation</li>
			<li class="has-sub closed">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-key"></i>
					<span>Login &amp; Register</span>
				</a>
				<ul class="sub-menu" style="display: none;">
					<li class=" ">
						<a href="/login/v3">Login</a>
					</li>
					<li class=" ">
						<a href="/register/v3">Register</a>
					</li>
				</ul>
			</li>
			<!-- begin sidebar minify button -->
			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			<!-- end sidebar minify button -->
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->
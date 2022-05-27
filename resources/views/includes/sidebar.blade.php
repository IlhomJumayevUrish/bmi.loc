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
						<img src="{{session()->get('admin_photo')}}" alt="" />
					</div>
					<div class="info">
						{{session()->get('admin_fio')}}
						<small>Администрация сайта</small>
					</div>
				</a>
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
			<li class="nav-header">Меню сайта</li>
			<li class="{{ Request::is('*news*') ? 'active' : '' }}"><a href="{{ route('news-index')}}">
					<i class="fa fa-newspaper"></i>
					<span>Новости</span>
				</a></li>
			<li class="{{ Request::is('*about*') ? 'active' : '' }}"><a href="{{ route('about-index')}}">
					<i class="fas fa-home fa-fw"></i>
					<span>Онас</span>
				</a></li>
			<!-- <li class="{{ Request::is('*message*') ? 'active' : '' }}"><a href="#">
					<i class="fas fa-sliders-h"></i>
					<span>Слайдеры +</span>
				</a></li> -->
			<li class="{{ Request::is('*product*') ? 'active' : '' }}"><a href="{{ route('product-index')}}">
					<i class="fas fa-shopping-bag"></i>
					<span>Продукты</span>
				</a></li>
			<li class="{{ Request::is('*service*') ? 'active' : '' }}"><a href="{{ route('service-index')}}">
					<i class="far fa-lg fa-fw m-r-10 fa-handshake"></i>
					<span>Услуга</span>
				</a></li>
			<li class="{{ Request::is('*user/contact*') ? 'active' : '' }}"><a href="{{route('contact-user-index')}}">
					<i class="fab fa-lg fa-fw m-r-10 fa-facebook-messenger"></i>
					<span>Контакты</span>
				</a></li>
			<li class="{{ Request::is('*partner*') ? 'active' : '' }}"><a href="{{ route('partner-index')}}">
					<i class="fas fa-users"></i>
					<span>Партнеры</span>
				</a></li>

			@if(session()->get('admin_type') == "admin")
			<li class="{{ Request::is('*employee*') ? 'active' : '' }}"><a href="{{ route('employee-index')}}">
					<i class="fa fa-users"></i>
					<span>Пользователи</span>
				</a></li>
			@endif
			<li class="{{ Request::is('*social/contact*') ? 'active' : '' }}"><a href="{{ route('contact-index')}}">
					<i class="fa fa-phone"></i>
					<span>Социальные сети</span>
				</a></li>

			<li class="has-sub expand">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fas fa-cog fa-fw"></i>
					<span>Настройки</span>
				</a>
				<ul class="sub-menu" style="display: block;">
					<li class=" ">
						<a href="{{ route('category-index')}}">Категории</a>
					</li>
					<li class=" ">
						<a href="{{ route('country-index')}}">Страны</a>
					</li>
					<li class=" ">
						<a href="{{ route('region-index')}}">Регионы</a>

					</li>
					<li class=" ">
						<a href="{{ route('district-index')}}">Районы</a>
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
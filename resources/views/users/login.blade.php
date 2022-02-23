@extends('layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])

@section('title', 'Войти')

@section('content')
<!-- begin login -->
<div class="login login-with-news-feed">
	<!-- begin news-feed -->
	<div class="news-feed">
		<div class="news-image" style="background-image: url(/assets/img/login-bg/login-bg-11.jpg)"></div>
	</div>
	<!-- end news-feed -->
	<!-- begin right-content -->
	<div class="right-content">
		<!-- begin login-header -->
		<div class="login-header">
			<div class="brand">
				<span class="logo"></span> <b>Администратор</b>
				<small class="text-red">
					@if(Session::has('response'))
					{{Session::get('response')}}
					@endif
				</small>
			</div>
			<div class="icon">
				<i class="fa fa-sign-in-alt"></i>
			</div>
		</div>
		<!-- end login-header -->
		<!-- begin login-content -->
		<div class="login-content">
			<form action="{{ route('enter') }}" method="POST" class="margin-bottom-0">
				@csrf
				<div class="form-group m-b-15">
					<input type="email" name="email" class="form-control form-control-lg" placeholder="Email Address" required />
				</div>
				<div class="form-group m-b-15">
					<input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required />
				</div>
				<div class="login-buttons">
					<button type="submit" class="btn btn-success btn-block btn-lg">Войти</button>
				</div>

				<hr />

			</form>
		</div>
		<!-- end login-content -->
	</div>
	<!-- end right-container -->
</div>
<!-- end login -->
@endsection
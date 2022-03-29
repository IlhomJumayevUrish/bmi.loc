@extends('frontend.wrapper')

@section('content')




<!-- Slider Start -->
<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing ">Total Health care solution</span>
					<h1 class="mb-3 mt-3">Your most trusted health partner</h1>

					<p class="mb-4 pr-5">A repudiandae ipsam labore ipsa voluptatum quidem quae laudantium quisquam aperiam maiores sunt fugit, deserunt rem suscipit placeat.</p>
					<div class="btn-container ">
						<a href="{{ route('contact-page')}}" class="btn btn-main-2 btn-round-full">Получить контакт<i class="icofont-simple-right  ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<span>24 часа обслуживания</span>
						<h4 class="mb-3">Онлайн-запись</h4>
						<p class="mb-4">Получайте постоянную поддержку в экстренных случаях. Мы внедрили принцип 1С товар и услуга.</p>
					</div>

					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-ui-clock"></i>
						</div>
						<span>График работы</span>
						<h4 class="mb-3">Рабочее время</h4>
						<ul class="w-hours list-unstyled">
							<li class="d-flex justify-content-between">Вс - Ср : <span>8:00 - 17:00</span></li>
							<li class="d-flex justify-content-between">Чт - Пт : <span>9:00 - 17:00</span></li>
							<li class="d-flex justify-content-between">Cб - вс : <span>10:00 - 17:00</span></li>
						</ul>
					</div>

					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>Экстренные случаи</span>
						<h4 class="mb-3">{{$about->phone}}</h4>
						<p>Получите постоянную поддержку в экстренных случаях. Мы внедрили принцип 1С товар и услуга. Свяжитесь с нами для любой срочности.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="cta-section mt-5">
	<div class="container">
		<div class="cta position-relative">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-doctor"></i>
						<span class="h3">58</span>k
						<p>Работяги</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-company"></i>
						<span class="h3">700</span>+
						<p>Счастливые клиенты
						</p>
					</div>
				</div>

				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-badge"></i>
						<span class="h3">40</span>+
						<p>Часы поддержки
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-globe"></i>
						<span class="h3">20</span>
						<p>Проекты</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section doctor-single mt-2">
	<div class="container">
		<div class="section-title text-center">
			<h2>Наши новые статьи</h2>
		</div>
		@foreach($news as $new)
		<div class="row mt-5">
			<div class="col-lg-4 col-md-6">
				<div class="doctor-img-block">
					<img src="{{$new->image}}" alt="" class="img-fluid w-100">


				</div>
			</div>
			<div class="col-lg-8 col-md-6">
				<div class="doctor-details mt-5 mt-lg-0">
					<h5 class="text">{{$new->title}}</h5>

					<div class="divider my-4"></div>
					<a href="{{ route('blog-get',$new->id)}}">
						<p>
							{!! Str::words($new->description,40, '...')!!}
						</p>
					</a>


				</div>
			</div>
		</div>
		@endforeach
	</div>
</section>
<section class="section clients">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>Партнеры, которые нас поддерживают</h2>

				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row clients-logo">


			@foreach($partners as $partner)
			<div class="col-lg-2">
				<div class="client-thumb">
					<a href="{{$partner->url}}">
						<img src="{{$partner->image}}" alt="" class="img-fluid">
					</a>

				</div>
			</div>
			@endforeach

		</div>
	</div>
</section>

@endsection
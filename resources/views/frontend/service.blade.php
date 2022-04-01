@extends('frontend.wrapper')
@section('content')
<section class="page-title bg-1">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block text-center">
					<span class="text-white">Наш сервис</span>
					<h1 class="text-capitalize mb-5 text-lg">Что мы делаем
					</h1>

					<ul class="list-inline breadcumb-nav">
						<li class="list-inline-item"><a href="{{ route('service-page')}}" class="text-white">Home</a></li>
						<li class="list-inline-item"><span class="text-white">/</span></li>
						<li class="list-inline-item"><a href="#" class="text-white-50">Our services</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section service-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2>О Компании</h2>

				</div>
			</div>
		</div>
		<div class="row">
			@foreach($services as $service)
			<div class="col-lg-4 col-md-6 ">
				<div class="department-block mb-5">
					<img src="{{$service->photo}}" alt="" class="img-fluid w-100">
					<div class="content">
						<h6 class="mt-4 mb-2 title-color">{{$service->name}}</h6>
						<p class="mb-4">
							{!! Str::words($service->description,8, '...')!!}
						</p>
						<a href="{{ route('department-single-page', $service->id)}}" class="read-more">Узнать больше <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>
<section class="section cta-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="cta-content">
					<div class="divider mb-4"></div>
					<h2 class="mb-5 text-lg">Мы рады предложить вам качественные услуги</h2>
					<a href="{{ route('contact-page')}}" class="btn btn-main-2 btn-round-full">Получить контакт<i class="icofont-simple-right  ml-2"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
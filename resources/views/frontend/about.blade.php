@extends('frontend.wrapper')

@section('content')

<section class="page-title bg-1">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block text-center">
					<span class="text-white">Наш сервис</span>
					<h1 class="text-capitalize mb-5 text-lg"> О Компании </h1>
					<ul class="list-inline breadcumb-nav">
						<li class="list-inline-item"><a href="{{ route('service-page')}}" class="text-white">Дом</a></li>
						<li class="list-inline-item"><span class="text-white">/</span></li>
						<li class="list-inline-item"><a href="#" class="text-white-50">Наши сервисы</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section doctor-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="doctor-img-block">
					<img src="{{$about->image}}" alt="" class="img-fluid w-100">
					<p>Следите за нами в социальных сетях</p>
					<div class="info-block mt-4">
						@foreach($contacts as $contact)
						<li class="list-inline-item"><a href="{{$contact->url}}" style="padding-top: 0;">
								<div class="testimonial-thumb">
									<img src="{{$contact->image}}" alt="" class="img-fluid" width="40" style="border-radius: 50%; ">
								</div>
							</a></li>
						@endforeach
					</div>
				</div>
			</div>

			<div class="col-lg-8 col-md-6">
				<div class="doctor-details mt-4 mt-lg-0">
					<h2 class="text-md">{{$about->title}}</h2>
					<div class="divider my-4"></div>
					<p>{!!$about->description!!}</p>
				</div>
			</div>
		</div>
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
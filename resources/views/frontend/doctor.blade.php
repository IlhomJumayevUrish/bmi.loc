@extends('frontend.wrapper')
@section('content')



<section class="page-title bg-1">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block text-center">
					<span class="text-white">Наши продукты</span>
					<h1 class="text-capitalize mb-5 text-lg">Что мы делаем
					</h1>

					<ul class="list-inline breadcumb-nav">
						<li class="list-inline-item"><a href="#" class="text-white">Дома</a></li>
						<li class="list-inline-item"><span class="text-white">/</span></li>
						<li class="list-inline-item"><a href="#" class="text-white-50">Наши продукты</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section department-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="department-img">
					<img src="{{$product->photo}}" alt="" class="img-fluid w-100" style="height: 450px;">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="department-content mt-5">
					<h3 class="text-md">{{$product->name}}</h3>
					<div class="divider my-4"></div>
					<p>{!!$product->description!!}</p>
					<a href="{{$product->url}}" class="btn btn-main-2 btn-round-full">Получить контакт<i class="icofont-simple-right ml-2  "></i></a>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection
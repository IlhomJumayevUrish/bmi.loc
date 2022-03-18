@extends('frontend.wrapper')

@section('content')


<section class="page-title bg-1">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block text-center">
					<span class="text-white">Our blog</span>
					<h1 class="text-capitalize mb-5 text-lg">Blog articles</h1>

					<!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our blog</a></li>
          </ul> -->
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section blog-wrap">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					@foreach($news as $new)
					<div class="col-lg-12 col-md-12">
						<div class="blog-item">
							<div class="blog-thumb">
								<img src="images/blog/blog-1.jpg" alt="" class="img-fluid w-100">
							</div>

							<div class="blog-item-content">
								<div class="blog-item-meta mb-3 mt-4">
									<span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i>{{$new->comments->count()}} Комментарии</span>
									<span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-1"></i> {{$new->created_at->isoFormat(' d MMM Y ')}}</span>
								</div>

								<h2 class="mt-3 mb-3"><a href="blog-single.html">{{$new->title}}</a></h2>

								<p class="mb-4">{!! Str::words($new->description,40, '...')!!}</p>

								<a href="{{ route('blog-get',$new->id)}}" class="btn btn-main btn-icon btn-round-full mb-5">Подробнее <i class="icofont-simple-right ml-2  "></i></a>
							</div>
						</div>
					</div>
					@endforeach



				</div>
			</div>

		</div>

		<div class="row mt-5">
			<div class="col-lg-12">
				<nav class="pagination py-2 d-inline-block">
					<div class="nav-links">
						<span aria-current="page" class="page-numbers current">1</span>
						<a class="page-numbers" href="#">2</a>
						<a class="page-numbers" href="#">3</a>
						<a class="page-numbers" href="#"><i class="icofont-thin-double-right"></i></a>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>

@endsection
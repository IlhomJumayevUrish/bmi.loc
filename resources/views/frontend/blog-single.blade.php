@extends('frontend.wrapper')

@section('content')



<section class="page-title bg-1">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block text-center">
					<span class="text-white">News details</span>
					<h1 class="text-capitalize mb-5 text-lg">Blog Single</h1>

					<ul class="list-inline breadcumb-nav">
						<li class="list-inline-item"><a href="{{ route('index')}}" class="text-white">Home</a></li>
						<li class="list-inline-item"><span class="text-white">/</span></li>
						<li class="list-inline-item"><a href="#" class="text-white-50">News details</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="section blog-wrap">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 w-100">
				<div class="row">
					<div class="col-lg-12 mb-5">
						<div class="single-blog-item">
							<img src="{{$news->image}}" alt="" class="img-fluid w-100">

							<div class="blog-item-content mt-5">
								<div class="blog-item-meta mb-3">
									<span class="text-color-2 text-capitalize mr-3"><i class="icofont-book-mark mr-2"></i> Оборудование</span>
									<span class="text-muted text-capitalize mr-3"><i class="icofont-comment mr-2"></i>комментариев</span>
									<span class="text-black text-capitalize mr-3"><i class="icofont-calendar mr-2"></i> {{$news->created_at}}</span>
								</div>

								<h2 class="mb-4 text-md">{{$news->title}}</h2>
								<p>{!!$news->description!!}</p>
							</div>
						</div>
					</div>

					<div class="col-lg-12">
						<div class="comment-area mt-4 mb-5">
							<h4 class="mb-4">{{$news->comments->count()}} комментария</h4>
							<ul class="comment-tree list-unstyled">
								@foreach($news->comments as $comment)
								<li class="mb-5">
									<div class="comment-area-box">
										<div class="comment-thumb float-left">
											<img alt="" src="{{$news->image_s}}" class="img-fluid">
										</div>

										<div class="comment-info">
											<h5 class="mb-1">{{$comment->name}}</h5>
											<span class="date-comm">{{$comment->created_at->isoFormat(' d MMM Y ')}}</span>
										</div>
										<div class="comment-meta mt-2">
											<i class="icofont-reply mr-2 text-muted"></i>Reply
										</div>

										<div class="comment-content mt-3">
											<p>{{$comment->description}}</p>
										</div>
									</div>
								</li>
								@endforeach

							</ul>
						</div>
					</div>


					<div class="col-lg-12">
						<form class="comment-form my-5" id="comment-form" action="{{ route('comment-store')}}" method="POST">
							<h4 class="mb-4">Написать комментарий</h4>
							@csrf
							<input type="hidden" value="{{$news->id}}" name="news_id">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" type="text" name="name" id="name" placeholder="Полное имя" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" type="email" name="email" id="mail" placeholder="Эл. адрес" required>
									</div>
								</div>
							</div>


							<textarea class="form-control mb-4" name="description" id="comment" cols="30" rows="5" placeholder="Комментарий" required></textarea>

							<input class="btn btn-main-2 btn-round-full" type="submit" id="submit_contact" value="Отправил">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
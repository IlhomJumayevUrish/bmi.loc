@extends('layouts.default')

@section('title', 'Gallery V1')

@push('css')
<link href="/assets/plugins/lightbox2/dist/css/lightbox.css" rel="stylesheet" />
@endpush

@section('content')
<!-- begin #gallery -->
<div id="gallery" class="gallery">
	<!-- begin image -->
	<div class="row">
		<div class="col-md-4 p-5">
			<div class="w-100">
				<a href="{{$news->image}}" data-lightbox="gallery-group-4" class="w-100">
					<img src="{{$news->image}}" class="w-100" alt="">
				</a>
			</div>
		</div>
		<div class="col-md-8 image">

			<div class="image-info">
				<p> Type:
					<cite>{{$news->type}}</cite>
				</p>
				<p> Key word:
					<cite>{{$news->keyword}}</cite>
				</p>
				<h5 class="title">{{$news->title}}</h5>
				Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam magnam fugit ipsum, ex aspernatur sapiente dolore maxime nihil explicabo quo libero eius, minima eum magni mollitia enim quas corporis voluptates.
				<code>{{$news->created_at}}</code>
		
			</div>
		</div>

	</div>

	<!-- end image -->
</div>
<!-- end #gallery -->
@endsection

@push('scripts')
<script src="/assets/plugins/isotope-layout/dist/isotope.pkgd.min.js"></script>
<script src="/assets/plugins/lightbox2/dist/js/lightbox.min.js"></script>
<script src="/assets/js/demo/gallery.demo.js"></script>
@endpush
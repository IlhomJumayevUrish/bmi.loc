@extends('layouts.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />

@section('title', 'Изменить новость')

@section('content')


<!-- begin row -->
<div class="row">
	<!-- begin col-6 -->
	<div class="col-md-12">
		<!-- begin panel -->
		<div class="panel panel-inverse" data-sortable-id="form-validation-1">
			<!-- begin panel-heading -->
			<div class="panel-heading">
				<h4 class="panel-title">Изменить новость</h4>
				<div class="panel-heading-btn">
					<a href="{{ route('news-index')}}" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-hand-point-left"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				</div>
			</div>
			<!-- end panel-heading -->
			<!-- begin panel-body -->
			<div class="panel-body">
				<form class="form-horizontal" data-parsley-validate="true" name="demo-form " action="{{ route('news-update',$news->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-md-10">

							<div class="row">
								<div class="col-md-12">

									<label class="col-md-12 col-form-label" for="fullname">Заголовок<span class="text-red">*</span></label>
									<div class="col-md-12 ">
										<input class="form-control" type="text" id="fullname" value="{{ old('title',$news->title)}}" name="title" placeholder="Заголовок" data-parsley-required="true" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label class="col-md-12  col-form-label">Тип<span class="text-red">*</span></label>
									<div class="col-md-12 ">
										<input class="form-control" type="text" id="digits" value="{{ old('type',$news->type)}}" name="type" data-parsley-required="true" placeholder="Тип" />
									</div>
								</div>
								<div class="col-md-6">
									<label class="col-md-12 col-form-label" >Ключ<span class="text-red">*</span></label>
									<div class="col-md-12 ">
										<input class="form-control" type="text"  value="{{ old('key',$news->keyword)}}" name="key" data-parsley-required="true" placeholder="Ключ" />
									</div>

								</div>
							</div>

						</div>
						<div class="col-md-2">
							<label class="col-form-label" for="image">Фото<span class="text-red">*</span></label>
							<a href="#" onclick="upload_image()">
								<img src="{{$news->image}}" alt="" id="blah" class="w-100">
								<input type="file"  name="image" id="upload_image" style="display: none;" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
								<span id="photo" style="color:red">@error('image'){{$message}}@enderror</span>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<textarea class="textarea form-control" id="wysihtml5" required name="description" rows="4" placeholder="Description...">{{ old('description',$news->description)}}</textarea>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 mt-3  right">
							<button type="submit" class="btn btn-primary w-100">Отправить</button>
						</div>
					</div>


				</form>
			</div>
			<!-- end panel-body -->

		</div>
		<!-- end panel -->
	</div>
	<!-- end col-6 -->

</div>
<!-- end row -->
@endsection
<script>
	function upload_image() {
		document.getElementById('upload_image').click();
	}
</script>
@push('scripts')
<script src="/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
<script src="/assets/plugins/highlight.js/highlight.min.js"></script>
<script src="/assets/js/demo/render.highlight.js"></script>
<script src="/assets/plugins/ckeditor/ckeditor.js"></script>
<script src="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/assets/js/demo/form-wysiwyg.demo.js"></script>
@endpush
@extends('layouts.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<!-- end panel-heading -->
			<!-- begin panel-body -->
			<div class="panel-body">
				<form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="{{ route('news-update',$news->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					<label class="col-md-12 col-sm-12 col-form-label" for="fullname">Title<span class="text-red">*</span></label>
					<div class="col-md-12 col-sm-12">
						<input class="form-control" type="text" id="fullname" value="{{$news->title}}" name="title" placeholder="Title" data-parsley-required="true" />
					</div>
					<div class="row">
						<div class="col-md-6">
							<label class="col-md-12 col-sm-12 col-form-label" for="message">Key<span class="text-red">*</span></label>
							<div class="col-md-12 col-sm-12">
								<input class="form-control" type="text" id="digits" value="{{$news->keyword}}" name="key" data-parsley-required="true" placeholder="Key" />
							</div>
						</div>
						<div class="col-md-6">
							<label class="col-md-12 col-sm-12 col-form-label" for="message">Type<span class="text-red">*</span></label>
							<div class="col-md-12 col-sm-12">
								<input class="form-control" type="text" id="digits" value="{{$news->type}}" name="type" data-parsley-required="true" placeholder="Type" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">

							<label class="col-md-1 col-sm-1 col-form-label">Description<span class="text-red">*</span></label>
							<div class="col-md-12 col-sm-12">
								<textarea class="form-control" required id="message" name="description" rows="4" placeholder="Description...">{{$news->description}}</textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-10 mt-3 pl-4">
							<input class="form-control" type="file" name="image" /><br />
							<span id="image" style="color:red">@error('image'){{$message}}@enderror</span>
						</div>
						<div class="col-md-2 mt-3  right">
							<button type="submit" class="btn btn-primary">Submit</button>
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

@push('scripts')
<script src="/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
<script src="/assets/plugins/highlight.js/highlight.min.js"></script>
<script src="/assets/js/demo/render.highlight.js"></script>
@endpush
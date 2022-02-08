@extends('layouts.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('title', 'Form Validation')

@section('content')


<!-- begin row -->
<div class="row">
	<!-- begin col-6 -->
	<div class="col-md-12">
		<!-- begin panel -->
		<div class="panel panel-inverse" data-sortable-id="form-validation-1">
			<!-- begin panel-heading -->
			<div class="panel-heading">
				<h4 class="panel-title">Add news</h4>
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
				<form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="{{ route('news-store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="form-group row m-b-15">
						<label class="col-md-1 col-sm-1 col-form-label" for="fullname">Title<span class="text-red">*</span></label>
						<div class="col-md-3 col-sm-3">
							<input class="form-control" type="text" id="fullname" name="title" placeholder="Title" data-parsley-required="true" />
						</div>
						<label class="col-md-1 col-sm-1 col-form-label" for="message">Key<span class="text-red">*</span></label>
						<div class="col-md-3 col-sm-3">
							<input class="form-control" type="text" id="digits" name="key" data-parsley-required="true" placeholder="Key" />
						</div>
						<label class="col-md-1 col-sm-1 col-form-label" for="message">Type<span class="text-red">*</span></label>
						<div class="col-md-3 col-sm-3">
							<input class="form-control" type="text" id="digits" name="type" data-parsley-required="true" placeholder="Type" />
						</div>
					</div>
					<div class="form-group row m-b-15">
						<label class="col-md-1 col-sm-1 col-form-label">Description<span class="text-red">*</span></label>
						<div class="col-md-12 col-sm-12">
							<textarea class="form-control" required id="message" name="description" rows="4" placeholder="Description..."></textarea>
						</div>
					</div>
					<div class="form-group row m-b-15">
						<div id="frames">
							<img src="/assets/img/flag/plus.png" id="img_value" alt="" width="100px" height="100px" style="margin:20px;" onclick="onimage()">
						</div>
						<input type="file" id="image" name="image" style="display: none;" /><br />

					</div>
					<div class="form-group row m-b-0">
						<div class="col-md-12 col-sm-12">
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
<script>
	function onimage() {
		document.getElementById('image').click();
	}
	$(document).ready(function() {
		$('#image').change(function() {
			document.getElementById('img_value').src = window.URL.createObjectURL(this.files[0]);
		});
	});
</script>
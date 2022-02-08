@extends('layouts.default')

@section('title', 'Media Object')

@section('content')

	<!-- begin row -->
	<div class="row">
		<!-- begin col-6 -->
		<div class="col-md-12">
			<!-- begin panel -->
			<div class="panel panel-inverse" data-sortable-id="ui-media-object-2">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Media List</h4>
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
					<ul class="media-list">
						<li class="media media-sm">
							<a class="media-left" href="javascript:;">
								<img src="/assets/img/user/user-5.jpg" alt="" class="media-object rounded-corner" />
							</a>
							<div class="media-body">
								<h5 class="media-heading">Media heading</h5>
								<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
							</div>
						</li>
						<li class="media media-sm">
							<div class="media-body">
								<h5 class="media-heading">Media heading</h5>
								<p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
							</div>
							<a class="media-right" href="javascript:;">
								<img src="/assets/img/user/user-9.jpg" alt="" class="media-object rounded-corner" />
							</a>
						</li>
					</ul>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end col-6 -->
	</div>
	<!-- end row -->

@endsection
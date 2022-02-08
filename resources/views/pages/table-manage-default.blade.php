@extends('layouts.default')

@section('title', 'Managed Tables')

@push('css')
<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
@endpush

@section('content')
<!-- begin breadcrumb -->

<!-- end page-header -->
<!-- begin panel -->
<div class="panel panel-inverse">
	<!-- begin panel-heading -->
	<div class="panel-heading">
		<h4 class="panel-title">All news list</h4>
		<div class="panel-heading-btn">
			<a href="{{route('news-create')}}" class="btn btn-green m-r-5"><i class="fa fa-plus"></i> create</a>
		</div>
	</div>
	<!-- end panel-heading -->
	<!-- begin panel-body -->
	<div class="panel-body">
		<table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
			<thead>
				<tr>
					<th width="1%"></th>
					<th width="1%" data-orderable="false"></th>
					<th class="text-nowrap">Title</th>
					<th class="text-nowrap">Type</th>
					<th class="text-nowrap">Description</th>
					<th class="text-nowrap">Created date</th>
					<th class="text-nowrap">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($news as $new)
				<tr class="odd gradeA">
					<td class="f-s-600 text-inverse">{{$loop->index+1}}</td>
					@if($new->image)
					<td class="with-img"><img src="{{$new->image_s}}" class="img-rounded height-30" /></td>
					@else
					<td class="with-img"><img src="/assets/img/user/user-3.jpg" class="img-rounded height-30" /></td>
					@endif
					<td>{{$new->title}}</td>
					<td>{{$new->type}}</td>
					<td>{{substr($new->description,0,15)}}...</td>
					<td>{{$new->created_at}}</td>
					<td>
						<a href="#" class="btn btn-default btn-icon btn-circle btn-lg">
							<i class="fa fa-eye"></i>
						</a>
						<a href="#" class="btn btn-default btn-icon btn-circle btn-lg">
							<i class="fa fa-edit"></i>
						</a>
						<a href="#" class="btn btn-default btn-icon btn-circle btn-lg">
							<i class="fa fa-trash fa-fw m-r-5"></i>
						</a>

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- end panel-body -->
</div>
<!-- end panel -->
@endsection

@push('scripts')
<script src="/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/js/demo/table-manage-default.demo.js"></script>
@endpush
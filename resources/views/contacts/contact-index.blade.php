@extends('layouts.default')

@section('title', 'Social contact list')

@push('css')
<link href="/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
<link href="/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
<link href="/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />

@endpush

@section('content')
<!-- begin breadcrumb -->

<!-- end page-header -->
<!-- begin panel -->
<div class="panel panel-inverse">
    <!-- begin panel-heading -->
    <div class="panel-heading">
        <h1 class="panel-title">SOCUIAL CONTACT LIST</h1>
        <div class="panel-heading-btn">
            <a href="{{route('contact-create')}}" class="btn btn-icon btn-green m-r-5"><i class="fa fa-plus"></i></a>
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
                    <th class="text-nowrap">Name</th>
                    <th class="text-nowrap">URL</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr class="odd gradeA">
                    <td class="f-s-600 text-inverse">{{$loop->index+1}}</td>
                    @if($contact->image)
                    <td class="with-img"><img src="{{$contact->image}}" class="img-rounded height-30" /></td>
                    @else
                    <td class="with-img"><img src="/assets/img/user/user-3.jpg" class="img-rounded height-30" /></td>
                    @endif
                    <td>{{$contact->name}}</td>
                    <td>{{substr($contact->url,0,50)}}</td>
                    @if($contact->status=='active')
                    <td class="text-green">Active</td>
                    @else
                    <td class="text-danger">Inactive</td>
                    @endif
                    <td>
                        <a href="{{ route('contact-edit',$contact->id)}}" class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-edit" style="color: green;"></i>
                        </a>
                        <a href="javascript:void(0)" onclick='delete_contact("{{$contact->id}}")' class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-trash fa-fw m-r-5" style="color: red;"></i>
                            <form action="{{ route('contact-delete',$contact->id)}}" method="POST" id="contact-delete{{$contact->id}}">
                                @csrf
                            </form>
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
<script src="/assets/plugins/gritter/js/jquery.gritter.js"></script>
<script src="/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function delete_contact(id) {
        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this imaginary file!',
            icon: 'error',
            buttons: {
                cancel: {
                    text: 'Cancel',
                    value: null,
                    visible: true,
                    className: 'btn btn-default',
                    closeModal: true,
                },
                confirm: {
                    text: 'Delete',
                    value: true,
                    visible: true,
                    className: 'btn btn-danger',
                    closeModal: true
                }
            }
        }).then(function(willDelete) {
            if (willDelete) {
                document.getElementById('contact-delete' + id.toString()).submit();

            }

        });;
    }
</script>
@endpush
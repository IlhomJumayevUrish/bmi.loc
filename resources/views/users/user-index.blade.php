@extends('layouts.default')

@section('title', 'Список пользователей')

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
        <h1 class="panel-title">Список пользователей</h1>
        <div class="panel-heading-btn">
            <a href="{{route('employee-create')}}" class="btn btn-green btn-xs ">Создайте</a>
        </div>
    </div>
    <!-- end panel-heading -->
    <!-- begin panel-body -->
    <div class="panel-body">
        <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
                <tr>
                    <th width="1%">№</th>
                    <th width="1%" data-orderable="false">Фото</th>
                    <th class="text-nowrap">Полное имя</th>
                    <th class="text-nowrap">Имя пользователя</th>
                    <th class="text-nowrap">Телефон</th>
                    <th class="text-nowrap">Электронное письмо</th>
                    <th class="text-nowrap">Статус</th>
                    <th class="text-nowrap">Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="odd gradeA">
                    <td class="f-s-600 text-inverse">{{$loop->index+1}}</td>
                    @if($user->photo)
                    <td class="with-img"><img src="{{$user->photo}}" class="img-rounded height-30" /></td>
                    @else
                    <td class="with-img"><img src="/assets/img/gallery/add.png" class="img-rounded height-30" /></td>
                    @endif
                    <td>{{$user->fio}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->email}}</td>
                    @if($user->status=='active')
                    <td class="text-green">Активный</td>
                    @else
                    <td class="text-danger">Неактивный</td>
                    @endif
                    <td>
                        <a href="#modal-alert{{$loop->index}}" data-toggle="modal" class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-eye" style="color: blue;"></i>
                        </a>
                        <a href="{{ route('employee-edit',$user->id)}}" class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-edit" style="color: green;"></i>
                        </a>
                        <a href="javascript:void(0)" onclick='delete_news("{{$user->id}}")' class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-trash fa-fw m-r-5" style="color: red;"></i>
                            <form action="{{ route('employee-delete',$user->id)}}" method="POST" id="news-delete{{$user->id}}">
                                @csrf
                            </form>
                        </a>
                    </td>
                </tr>
                <div class="modal fade" id="modal-alert{{$loop->index}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="media-heading">Пользователь</h5>
                            </div>
                            <div class="modal-header">
                                <div class="media-body">
                                    <h6><i class="fas fa-user fa-fw text-green"></i> {{$user->username}}</h6>
                                    <h6><i class="fas fa-user fa-fw text-green"></i> {{$user->fio}}</h6>
                                    <h6><i class="fas fa-toggle-on text-green"></i> {{ucfirst($user->status)}}</h6>
                                    <h6><i class="fas fa-home fa-fw text-green"></i> {{$user->country->name}}</h6>
                                    <h6><i class="fas fa-home fa-fw text-green"></i> {{$user->region->name}}</h6>
                                    <h6><i class="fas fa-home fa-fw text-green"></i> {{$user->district->name}}</h6>
                                    <h6><i class="fas fa-phone fa-fw text"></i><a href="tel: {{$user->phone}}"> {{$user->phone}}</a></h6>
                                    <h6><i class="fas fa-envelope fa-fw text"></i> <a href="mailto:{{$user->email}}" target="_top">{{$user->email}}</a></h6>
                                </div>
                                <a class="media-right" href="javascript:;">
                                    <img src="{{$user->photo}}" alt="" width="200" />
                                </a>
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Закрыть</a>
                            </div>

                        </div>
                    </div>
                </div>
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
<!-- <script src="/assets/js/demo/ui-modal-notification.demo.js"></script> -->
<script>
    /*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 4.6.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/admin/
*/


    function delete_news(id) {
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
                document.getElementById('news-delete' + id.toString()).submit();

            }

        });;
    }
</script>
@endpush
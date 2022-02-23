@extends('layouts.default')

@section('title', 'Список новостей')

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
        <h1 class="panel-title">Список новостей</h1>
        <div class="panel-heading-btn">
            <a href="{{ route('news-index')}}" class="btn btn-green btn-xs "><i class="fa fa-hand-point-left"></i></a>
        </div>
    </div>
    <!-- end panel-heading -->
    <!-- begin panel-body -->
    <div class="panel-body">
            <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                <thead>
                    <tr>
                        <th width="1%">№</th>
                        <th class="text-nowrap">Полное имя</th>
                        <th class="text-nowrap">Электронное письмо</th>
                        <th class="text-nowrap">Телефон</th>
                        <th class="text-nowrap" >Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{$loop->index+1}}</td>

                        <td>{{$contact->fio}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->phone1}}</td>
                        <td>
                            <a href="#modal-alert{{$loop->index}}" data-toggle="modal" class="btn btn-default btn-icon btn-circle btn-lg">
                                <i class="fa fa-eye" style="color: blue;"></i>
                            </a>

                            <a href="javascript:void(0)" onclick='delete_contact("{{$contact->id}}")' class="btn btn-default btn-icon btn-circle btn-lg">
                                <i class="fa fa-trash fa-fw m-r-5" style="color: red;"></i>
                                <form action="{{ route('contact-user-delete',$contact->id)}}" method="POST" id="contact-delete{{$contact->id}}">
                                    @csrf
                                </form>
                            </a>
                            <div class="modal fade W-80" id="modal-alert{{$loop->index}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="media-body">
                                                <h5 class="media-heading">Контакт</h5>
                                                <h6><i class="fas fa-user fa-fw text-green"></i> {{$contact->fio}}</h6>
                                                <h6><i class="fas fa-envelope fa-fw text-green"></i> {{$contact->email}}</h6>
                                                <h6><i class="fas fa-phone fa-fw text-green"></i> {{$contact->phone1}}</h6>
                                                <P>{{$contact->description}}</P>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Закрыть</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
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
<!-- <script src="/assets/js/demo/ui-modal-notification.demo.js"></script> -->
<script>
    /*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Version: 4.6.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/admin/
*/


    function delete_contact(id) {
        swal({
            title: 'Уверены ли вы?',
            text: 'Вы не сможете восстановить этот воображаемый файл!',
            icon: 'error',
            buttons: {
                cancel: {
                    text: 'Отмена',
                    value: null,
                    visible: true,
                    className: 'btn btn-default',
                    closeModal: true,
                },
                confirm: {
                    text: 'Удалить',
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

        });
    }
</script>
@endpush
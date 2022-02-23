@extends('layouts.default')

@section('title', 'Страны')

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
        <h1 class="panel-title">Страны</h1>
        <div class="panel-heading-btn">
            <a href="#modal-alertx" data-toggle="modal" class="btn btn-xs btn-green m-r-5">Создавать </a>
        </div>
    </div>
    <div class="modal fade" id="modal-alertx">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('country-store')}}" method="post" enctype="multipart/form-data">

                    <div class="modal-header">
                        <h4 class="modal-title">Добавить cтраны</h4>
                    </div>
                    <div class="media-body ">
                        <div class="media m-10">
                            <div class="media-body">
                                @csrf
                                <div class="container">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="name">Название <span class="text-red">*</span></label>
                                                    <input type="text" id="name" required name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="key">Ключ <span class="text-red">*</span></label>
                                                    <input type="text" id="key" required name="key" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Закрыть</a>
                        <input type="submit" class="btn btn-blue" value="Отправить">
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- end panel-heading -->
    <!-- begin panel-body -->
    <div class="panel-body">
        <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
            <thead>
                <tr>
                    <th width="1%">№</th>
                    <th class="text-nowrap">Название</th>
                    <th class="text-nowrap">Ключ</th>
                    <th class="text-nowrap" >Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                <tr class="odd gradeA">
                    <td class="f-s-600 text-inverse">{{$loop->index+1}}</td>
                    <td>{{$country->name}}</td>
                    <td>{{$country->key}}</td>

                    <td>
                        <a href="#modal-alertx{{$loop->index}}" data-toggle="modal" class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-edit" style="color: green;"></i>
                        </a>
                        <a href="javascript:void(0)" onclick='delete_news("{{$country->id}}")' class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-trash fa-fw m-r-5" style="color: red;"></i>
                            <form action="{{ route('category-delete',$country->id)}}" method="POST" id="partner-delete{{$country->id}}">
                                @csrf
                            </form>
                        </a>
                    </td>
                </tr>
                <div class="modal fade" id="modal-alertx{{$loop->index}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Изменить категорию</h4>
                            </div>
                            <form action="{{route('country-update',$country->id)}}" method="post" enctype="multipart/form-data">
                                <div class="media-body ">
                                    <div class="media m-10">
                                        <div class="media-body">
                                            @csrf
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="name">Заголовок <span class="text-red">*</span></label>
                                                                <input type="text" id="name" required name="name" value="{{$country->name}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="key">Ключ <span class="text-red">*</span></label>
                                                                <input type="text" id="key" required name="key" value="{{$country->key}}" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Закрыть</a>
                                    <input type="submit" value="Отправить" class="btn btn-blue">
                                </div>
                            </form>

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

    function upload_image(id) {
        document.getElementById('upload_image' + id).click();
    }

    function upload_imagex() {
        document.getElementById('upload_image').click();
    }

    function delete_news(id) {
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
                document.getElementById('partner-delete' + id.toString()).submit();

            }

        });;
    }
</script>
@endpush
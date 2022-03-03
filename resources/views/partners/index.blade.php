@extends('layouts.default')

@section('title', 'Партнер')

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
        <h1 class="panel-title">Партнер</h1>
        <div class="panel-heading-btn">
            <a href="#modal-alertx" data-toggle="modal" class="btn btn-xs btn-green m-r-5">Создавать </a>
        </div>
    </div>
    <div class="modal fade" id="modal-alertx">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('partner-store')}}" method="post" enctype="multipart/form-data">

                    <div class="modal-header">
                        <h4 class="modal-title">Добавить партнера</h4>
                    </div>
                    <div class="media-body ">
                        <div class="media m-10">
                            <div class="media-body">
                                @csrf

                                <div class="container">
                                    <div class="row">

                                        <div class="col-md-9">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="title">Заголовок <span class="text-red">*</span></label>
                                                    <input type="text" id="title" required name="title" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="url">URL-адрес <span class="text-red">*</span></label>
                                                    <input type="text" id="url" required name="url" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="#" onclick="upload_imagex()">
                                                <label for="image">Фото <span class="text-red">*</span></label>
                                                <img src="/assets/img/gallery/add.png" alt="" id="blah" class="w-100">
                                                <input type="file" required name="image" id="upload_image" style="display: none;" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                <span id="photo" style="color:red">@error('photo'){{$message}}@enderror</span>
                                            </a>
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
                    <th width="1%" data-orderable="false">Фото</th>
                    <th class="text-nowrap">Заголовок</th>
                    <th class="text-nowrap">URL-адрес</th>
                    <th class="text-nowrap">Дата создания</th>
                    <th class="text-nowrap" colspan="2">Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partners as $partner)
                <tr class="odd gradeA">
                    <td class="f-s-600 text-inverse">{{$loop->index+1}}</td>
                    <td class="with-img">
                        <img src="{{$partner->image}}" class="img img-rounded height-30" />

                    </td>

                    <td>{{$partner->title}}</td>
                    <td>{{substr($partner->url,0,50)}}</td>
                    <td>{{$partner->created_at->format('d-m-Y')}}</td>

                    <td>
                        <a href="#modal-alert{{$loop->index}}" data-toggle="modal" class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-eye" style="color: blue;"></i>
                        </a>
                        <a href="#modal-alertx{{$loop->index}}" data-toggle="modal" class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-edit" style="color: green;"></i>
                        </a>

                        <a href="javascript:void(0)" onclick='delete_news("{{$partner->id}}")' class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-trash fa-fw m-r-5" style="color: red;"></i>
                            <form action="{{ route('partner-delete',$partner->id)}}" method="POST" id="partner-delete{{$partner->id}}">
                                @csrf
                            </form>
                        </a>
                    </td>
                </tr>
                <div class="modal fade" id="modal-alertx{{$loop->index}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Изменить партнера</h4>
                            </div>
                            <form action="{{route('partner-update',$partner->id)}}" method="post" enctype="multipart/form-data">
                                <div class="media-body ">
                                    <div class="media m-10">
                                        <div class="media-body">
                                            @csrf
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="title">Заголовок <span class="text-red">*</span></label>
                                                                <input type="text" id="title" required name="title" value="{{$partner->title}}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="url">URL-адрес <span class="text-red">*</span></label>
                                                                <input type="text" id="url" required name="url" value="{{$partner->url}}" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="image">Фото <span class="text-red">*</span></label>
                                                        <a href="#" onclick="upload_image('{{$partner->id}}')">
                                                            <img src="{{$partner->image}}" alt="" id="blah{{$partner->id}}" class="w-100">
                                                            <input type="file" name="image" id="upload_image{{$partner->id}}" style="display: none;" onchange="document.getElementById('blah{{$partner->id}}').src = window.URL.createObjectURL(this.files[0])">
                                                            <span id="photo" style="color:red">@error('photo'){{$message}}@enderror</span>
                                                        </a>
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


                <div class="modal fade" id="modal-alert{{$loop->index}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Посмотреть партнера</h4>
                            </div>
                            <div class="media-body ">
                                <div class="media m-10">
                                    <a class="media-left" href="javascript:;">
                                        <img src="{{$partner->image}}" alt="" class="media-object rounded">
                                    </a>
                                    <div class="media-body">
                                        <h5 class="media-heading">{{$partner->title}}</h5>
                                        <a href="{{$partner->url}}"> {{substr($partner->url,0,40)}}</a>
                                        <p> {{$partner->created_at}}</p>

                                    </div>
                                </div>
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
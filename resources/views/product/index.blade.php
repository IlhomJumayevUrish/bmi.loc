@extends('layouts.default')

@section('title', 'Список продуктов')

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
        <h1 class="panel-title">Список продуктов</h1>
        <div class="panel-heading-btn">
            <a href="{{route('product-create')}}" class="btn btn-green btn-xs ">Создавать</a>
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
                    <th class="text-nowrap">Название</th>
                    <th class="text-nowrap">Категория</th>
                    <th class="text-nowrap">URL-адрес</th>
                    <th class="text-nowrap">Файл</th>
                    <th class="text-nowrap">Время создания</th>
                    <th class="text-nowrap" colspan="2">Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="odd gradeA">
                    <td class="f-s-600 text-inverse">{{$loop->index+1}}</td>
                    @if($product->photo)
                    <td class="with-img"><img src="{{$product->photo}}" class="img-rounded height-30" /></td>
                    @else
                    <td class="with-img"><img src="/assets/img/user/user-3.jpg" class="img-rounded height-30" /></td>
                    @endif
                    <td>{{substr($product->name,0,30)}}</td>
                    <td>{{$product->category->name}}</td>
                    <td><a href="{{ $product->url}}">{{substr($product->url,0,20)}}</a> </td>
                    <td><a href="{{$product->file}}" target="_link">File</a></td>
                    <td>{{$product->created_at->format('Y-m-d')}}</td>
                    <td>
                        <a href="#modal-alert{{$loop->index}}" data-toggle="modal" class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-eye" style="color: blue;"></i>
                        </a>
                        <a href="{{ route('product-edit',$product->id)}}" class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-edit" style="color: green;"></i>
                        </a>
                        <a href="javascript:void(0)" onclick='delete_news("{{$product->id}}")' class="btn btn-default btn-icon btn-circle btn-lg">
                            <i class="fa fa-trash fa-fw m-r-5" style="color: red;"></i>
                            <form action="{{ route('product-delete',$product->id)}}" method="POST" id="product-delete{{$product->id}}">
                                @csrf
                            </form>
                        </a>
                    </td>
                </tr>
                <div class="modal fade" id="modal-alert{{$loop->index}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Просмотр продукта</h4>
                            </div>
                            <div class="media-body ">
                                <div class="media m-10">
                                    <a class="media-left" href="javascript:;">
                                        <img src="{{$product->photo}}" alt="" class="media-object rounded">
                                    </a>
                                    <div class="media-body">
                                        <h5 class="media-heading">{{$product->name}}|{{$product->category->name}}</h5>
                                        <a href="{{$product->file}}" target="_link"> File</a><br>
                                        <a href="{{$product->url}}"> {{$product->url}}</a>
                                        <p> {!!$product->description!!} <br>
                                            <code> {{$product->created_at}}</code>
                                        </p>

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
                document.getElementById('product-delete' + id.toString()).submit();

            }

        });;
    }
</script>
@endpush
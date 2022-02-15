@extends('layouts.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />

@section('title', 'Добавить новость')

@section('content')


<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Добавить новость</h4>
                <div class="panel-heading-btn">
                    <a href="{{ route('about-index')}}" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-hand-point-left"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="{{ route('contact-user-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-md-12  col-form-label" for="message">Полное имя<span class="text-red">*</span></label>
                            <div class="col-md-12 ">
                                <input class="form-control" type="text" id="name" value="{{ old('fio')}}" name="fio" data-parsley-required="true" placeholder="Полное имя" />
                                <span id="image" style="color:red">@error('fio'){{$message}}@enderror</span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-12 col-form-label" for="email">Почта<span class="text-red">*</span></label>
                            <div class="col-md-12 ">
                                <input class="form-control" type="email" id="email" value="{{ old('email')}}" name="email" data-parsley-required="true" placeholder="Почта" />
                                <span id="image" style="color:red">@error('email'){{$message}}@enderror</span>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-md-12  col-form-label" for="phone1">Сначала позвоните<span class="text-red">*</span></label>
                            <div class="col-md-12 ">
                                <input class="form-control" type="text" id="phone1" value="{{ old('phone1')}}" name="phone1" data-parsley-required="true" placeholder="+998903306022" />
                                <span id="image" style="color:red">@error('phone1'){{$message}}@enderror</span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-12 col-form-label" for="phone2">Телефон второй<span class="text-red">*</span></label>
                            <div class="col-md-12 ">
                                <input class="form-control" type="text" id="phone2" value="{{ old('phone2')}}" name="phone2" data-parsley-required="true" placeholder="+998906603322" />
                                <span id="image" style="color:red">@error('phone2'){{$message}}@enderror</span>
                            </div>

                        </div>
                    </div>

                    <label class="col-md-1 col-sm-1 col-form-label">Описание<span class="text-red">*</span></label>
                    <div class="col-md-12 col-sm-12">
                        <textarea class="textarea form-control" id="wysihtml5" required name="description" rows="4" placeholder="описание...">{{ old('description')}}</textarea>
                        <span id="image" style="color:red">@error('description'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12 mt-3  right">
                        <button type="submit" class="btn btn-primary w-100">Отправить</button>
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
<script src="/assets/plugins/ckeditor/ckeditor.js"></script>
<script src="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/assets/js/demo/form-wysiwyg.demo.js"></script>
@endpush
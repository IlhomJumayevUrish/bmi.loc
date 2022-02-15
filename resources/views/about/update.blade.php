@extends('layouts.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />

@section('title', 'Редактировать')

@section('content')


<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Редактировать</h4>
                <div class="panel-heading-btn">
                    <a href="{{ route('about-index')}}" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-hand-point-left"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="{{ route('about-update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">

                            <div class="col-md-10">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-md-12 col-form-label" for="title">Заголовок<span class="text-red">*</span></label>
                                        <div class="col-md-12 ">
                                            <input class="form-control" type="text" id="title" value="{{ old('title',$about->title)}}" name="title" placeholder="Title" data-parsley-required="true" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-12 col-form-label" for="address">Адрес<span class="text-red">*</span></label>
                                        <div class="col-md-12 ">
                                            <input class="form-control" type="text" id="address" value="{{ old('address',$about->address)}}" name="address" placeholder="Address" data-parsley-required="true" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-md-12 col-form-label" for="email">Электронное письмо<span class="text-red">*</span></label>
                                        <div class="col-md-12 ">
                                            <input class="form-control" type="text" id="email" value="{{ old('email',$about->email)}}" name="email" placeholder="Email" data-parsley-required="true" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-12 col-form-label" for="phone">Телефон<span class="text-red">*</span></label>
                                        <div class="col-md-12 ">
                                            <input class="form-control" type="text" id="phone" value="{{ old('phone',$about->phone)}}" name="phone" placeholder="Phone" data-parsley-required="true" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="col-md-12 col-form-label">Дата работы<span class="text-red">*</span></label>
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" value="{{ old('working_date',$about->working_date)}}" required name="working_date" placeholder="Дата работы">

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <textarea class="textarea form-control" id="wysihtml5" required name="description" rows="5" placeholder="описание...">{{ old('description',$about->description)}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="col-md-12 col-form-label">Фото<span class="text-red">*</span></label>
                                <a href="#" onclick="upload_image()">
                                    <img src="{{$about->image}}" alt="" id="blah" class="w-100">
                                    <input type="file" name="image" id="upload_image" style="display: none;" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    <span id="photo" style="color:red">@error('image'){{$message}}@enderror</span>
                                </a>
                                <label class="col-md-12 col-form-label">Логотип<span class="text-red">*</span></label>
                                <a href="#" onclick="upload_imagex()">
                                    <img src="{{$about->logo}}" alt="" id="blahx" class="w-100">
                                    <input type="file" name="logo" id="upload_imagex" style="display: none;" onchange="document.getElementById('blahx').src = window.URL.createObjectURL(this.files[0])">
                                    <span id="photo" style="color:red">@error('image'){{$message}}@enderror</span>
                                </a>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12 mt-3">
                                    <input class="btn btn-primary w-100" type="submit" value="Отправить" /><br />
                                </div>
                            </div>
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
<script>
    function upload_image() {
        document.getElementById('upload_image').click();
    }

    function upload_imagex() {
        document.getElementById('upload_imagex').click();
    }
</script>
@push('scripts')
<script src="/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
<script src="/assets/plugins/highlight.js/highlight.min.js"></script>
<script src="/assets/js/demo/render.highlight.js"></script>
<script src="/assets/plugins/ckeditor/ckeditor.js"></script>
<script src="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/assets/js/demo/form-wysiwyg.demo.js"></script>

@endpush
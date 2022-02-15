@extends('layouts.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />

@section('title', 'Добавить продукт')

@section('content')


<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Добавить продукт</h4>
                <div class="panel-heading-btn">
                    <a href="{{ route('product-index')}}" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-hand-point-left"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="{{ route('product-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">

                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="fullname">Название<span class="text-red">*</span></label>
                                        <input class="form-control" type="text" id="fullname" value="{{ old('name')}}" name="name" placeholder="название" data-parsley-required="true" />
                                        <span id="image" style="color:red">@error('name'){{$message}}@enderror</span>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="category">Категория<span class="text-red">*</span></label>
                                        <select name="category" class="form-control" id="category">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <span id="category" style="color:red">@error('category'){{$message}}@enderror</span>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="url">URL-адрес<span class="text-red">*</span></label>
                                        <input class="form-control" type="text" id="url" value="{{ old('url')}}" name="url" placeholder="URL-адрес" data-parsley-required="true" />
                                        <span id="image" style="color:red">@error('username'){{$message}}@enderror</span>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea class="form-control" id="wysihtml5" required name="description" rows="4" placeholder="Описание...">{{ old('description')}}</textarea>
                                        <span id="type" style="color:red">@error('description'){{$message}}@enderror</span>

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <label class="col-form-label" for="image">Фото<span class="text-red">*</span></label>
                                <a href="#" onclick="upload_image()">
                                    <img src="/assets/img/gallery/add.png" alt="" id="blah" class="w-100">
                                    <input type="file" required name="image" id="upload_image" style="display: none;" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    <span id="photo" style="color:red">@error('photo'){{$message}}@enderror</span>
                                </a>
                                <label class="col-form-label" for="file">Файл<span class="text-red">*</span>
                                </label>
                                <button type="button" onclick="document.getElementById('file').click()" class="form-control btn-blue w-100">Select file</button>
                                <input type="file" data-parsley-required="true" id="file" class="form-control" name="file" style="display: none;">
                                <span id="file" style="color:red">@error('file'){{$message}}@enderror</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary form-control w-100">Отправить</button>
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

@push('scripts')
<script src="/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
<script src="/assets/plugins/highlight.js/highlight.min.js"></script>
<script src="/assets/js/demo/render.highlight.js"></script>
<script src="/assets/plugins/ckeditor/ckeditor.js"></script>
<script src="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/assets/js/demo/form-wysiwyg.demo.js"></script>
@endpush
<script>
    function upload_image() {
        document.getElementById('upload_image').click();
    }

    function getCountry(id) {
        $.get('/countries/show/' + id, function(district) {
            var x = '';
            for (var obj in district['country']) {
                x += '<option value="' + district['country'][obj].id + '">' + district['country'][obj].name + '</option>';
            }
            document.getElementById("regions").innerHTML = x;
        });
    }

    function getRegion(id) {
        $.get('/regions/show/' + id, function(district) {
            console.log(district);
            var x = '';
            for (var obj in district['region']) {
                x += '<option value="' + district['region'][obj].id + '">' + district['region'][obj].name + '</option>';
            }
            document.getElementById("districts").innerHTML = x;
        });
    }
</script>
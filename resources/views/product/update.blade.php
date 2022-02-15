@extends('layouts.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="/assets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css" rel="stylesheet" />

@section('title', 'Изменить продукт')

@section('content')


<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Изменить продукт</h4>
                <div class="panel-heading-btn">
                    <a href="{{ route('product-index')}}" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-hand-point-left"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="{{ route('product-update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">

                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="fullname">Название<span class="text-red">*</span></label>
                                        <input class="form-control" type="text" id="fullname" value="{{ old('name',$product->name)}}" name="name" placeholder="название" data-parsley-required="true" />
                                        <span id="image" style="color:red">@error('name'){{$message}}@enderror</span>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="category">Категория<span class="text-red">*</span></label>
                                        <select name="category" class="form-control" id="category">
                                            @foreach($categories as $category)
                                            <option {{ $category->id==$product->category_id?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <span id="category" style="color:red">@error('category'){{$message}}@enderror</span>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="url">URL-адрес<span class="text-red">*</span></label>
                                        <input class="form-control" type="text" id="url" value="{{ old('url',$product->url)}}" name="url" placeholder="URL-адрес" data-parsley-required="true" />
                                        <span id="image" style="color:red">@error('username'){{$message}}@enderror</span>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="description">Описание<span class="text-red">*</span></label>
                                        <textarea class="form-control" required id="wysihtml5" name="description" rows="4" placeholder="Описание...">{{ old('description',$product->description)}}</textarea>
                                        <span id="type" style="color:red">@error('description'){{$message}}@enderror</span>

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <label class="col-form-label" for="image">Фото<span class="text-red">*</span></label>
                                <a href="#" onclick="upload_image()">
                                    <img src="{{$product->photo}}" alt="" id="blah" class="w-100">
                                    <input type="file" name="image" id="upload_image" style="display: none;" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    <span id="photo" style="color:red">@error('photo'){{$message}}@enderror</span>
                                </a>
                                <label class="col-form-label" for="filex">Файл<span class="text-red">*</span>
                                    <button onclick="onFile()" type="button" class="btn btn-primary form-control ">Update file</button>
                                </label>
                                <input type="file" id="filex" class="form-control" name="file" style="display:none;">
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

    function onFile() {
        document.getElementById('filex').click()
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
@extends('layouts.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('title', 'Добавить пользователя')

@section('content')


<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Добавить пользователя</h4>
                <div class="panel-heading-btn">
                    <a href="{{ route('employee-index')}}" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-hand-point-left"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="{{ route('employee-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="fullname">Полное имя<span class="text-red">*</span></label>
                            <input class="form-control" type="text" id="fullname" value="{{ old('fio')}}" name="fio" placeholder="Полное имя" data-parsley-required="true" />
                            <span id="image" style="color:red">@error('fio'){{$message}}@enderror</span>

                        </div>
                        <div class="col-md-4">
                            <label for="email">Электронное письмо<span class="text-red">*</span></label>
                            <input class="form-control" type="text" id="email" value="{{ old('email')}}" name="email" placeholder="email@gamil.com" data-parsley-required="true" />
                            <span id="image" style="color:red">@error('email'){{$message}}@enderror</span>
                        </div>

                        <div class="col-md-4">
                            <label for="phone">Телефон<span class="text-red">*</span></label>
                            <input class="form-control" type="text" id="phone" value="{{ old('phone')}}" name="phone" placeholder="+998903306022" data-parsley-required="true" />
                            <span id="image" style="color:red">@error('phone'){{$message}}@enderror</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="username">Имя пользователя<span class="text-red">*</span></label>
                                    <input class="form-control" type="text" id="username" value="{{ old('username')}}" name="username" placeholder="Имя пользователя" data-parsley-required="true" />
                                    <span id="image" style="color:red">@error('username'){{$message}}@enderror</span>

                                </div>
                                <div class="col-md-4">
                                    <label for="password">Пароль<span class="text-red">*</span></label>
                                    <input class="form-control" type="password" id="password" name="password" data-parsley-required="true" />
                                    <span id="image" style="color:red">@error('password'){{$message}}@enderror</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="password_confirmation">Подтверждение пароля<span class="text-red">*</span></label>
                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" data-parsley-required="true" />
                                    <span id="image" style="color:red">@error('password_confirmation'){{$message}}@enderror</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="country">Страна<span class="text-red">*</span></label>
                                    <select class="form-control" name="country" onchange="getCountry(this.options[this.selectedIndex].value)">
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                    <span id="image" style="color:red">@error('country'){{$message}}@enderror</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="region">Область<span class="text-red">*</span></label>
                                    <select class="form-control" name="region" id="regions" onchange="getRegion(this.options[this.selectedIndex].value)">
                                        @foreach($countries->first()->regions as $region)
                                        <option value=" {{$region->id}}">{{$region->name}}</option>
                                        @endforeach
                                    </select>
                                    <span id="image" style="color:red">@error('region'){{$message}}@enderror</span>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="district">Округ<span class="text-red">*</span></label>
                                    <select class="form-control" name="district" id="districts">
                                        @foreach($countries->first()->regions->first()->districts as $district)
                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                        @endforeach

                                    </select>
                                    <span id="image" style="color:red">@error('district'){{$message}}@enderror</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="status">Статус<span class="text-red">*</span></label>
                                    <select class="form-control" name="status">
                                        <option value="active">Активный</option>
                                        <option value="inactive">Неактивный</option>
                                    </select>
                                    <span id="image" style="color:red">@error('status'){{$message}}@enderror</span>

                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary w-100">Отправить</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label" for="image">Фото<span class="text-red">*</span></label>
                            <a href="#" onclick="upload_image()">
                                <img src="/assets/img/gallery/add.png" alt="" id="blah" class="w-100">
                                <input type="file"  name="photo" id="upload_image" style="display: none;" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                <span id="photo" style="color:red">@error('photo'){{$message}}@enderror</span>
                            </a>
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
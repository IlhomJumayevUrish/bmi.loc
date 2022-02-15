@extends('layouts.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title', 'Профиль пользователя')
@push('css')
<link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" />
<link href="/assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
<link href="/assets/plugins/@danielfarrell/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
<link href="/assets/plugins/tag-it/css/jquery.tagit.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
<link href="/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
<link href="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
<link href="/assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
<link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
<link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
<link href="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />
@endpush
@section('content')


<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Профиль пользователя</h4>
                <div class="panel-heading-btn">
                    <a href="{{ route('news-index')}}" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-hand-point-left"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="{{ route('profile-update',$user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fullname">Полное имя<span class="text-red">*</span></label>
                                    <input class="form-control" type="text" id="fullname" value="{{ old('fio',$user->fio)}}" name="fio" placeholder="Полное имя" data-parsley-required="true" />
                                    <span id="image" style="color:red">@error('fio'){{$message}}@enderror</span>

                                </div>
                                <div class="col-md-6">
                                    <label for="email">Электронное письмо<span class="text-red">*</span></label>
                                    <input class="form-control" type="text" id="email" value="{{ old('email',$user->email)}}" name="email" placeholder="email@gamil.com" data-parsley-required="true" />
                                    <span id="image" style="color:red">@error('email'){{$message}}@enderror</span>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label for="username">Имя пользователя<span class="text-red">*</span></label>
                                    <input class="form-control" type="text" id="username" value="{{ old('username',$user->username)}}" name="username" placeholder="Имя пользователя" data-parsley-required="true" />
                                    <span id="image" style="color:red">@error('username'){{$message}}@enderror</span>

                                </div>

                                <div class="col-md-6">
                                    <label for="phone">Телефон<span class="text-red">*</span></label>
                                    <input class="form-control" type="text" id="phone" value="{{ old('phone',$user->phone)}}" name="phone" placeholder="+998903306022" data-parsley-required="true" />
                                    <span id="image" style="color:red">@error('phone'){{$message}}@enderror</span>
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
                                    <label for="address">Адрес<span class="text-red">*</span></label>
                                    <input class="form-control" type="text" id="address" value="{{ old('address',$user->address)}}" name="address" placeholder="Адрес" />
                                    <span id="image" style="color:red">@error('address'){{$message}}@enderror</span>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="series">Паспорт №<span class="text-red">*</span></label>
                                    <input class="form-control" type="text" id="series" value="{{ old('series',$user->series)}}" name="series" placeholder="AB" />
                                    <span id="image" style="color:red">@error('series'){{$message}}@enderror</span>
                                </div>
                                <div class="col-md-4">
                                    <label for="number">Номер паспорта<span class="text-red">*</span></label>
                                    <input class="form-control" type="text" id="number" value="{{ old('number',$user->number)}}" name="number" placeholder="456123" />
                                    <span id="number" style="color:red">@error('number'){{$message}}@enderror</span>
                                </div>
                                <div class="col-md-6">
                                    <label for="birthday">День рождения<span class="text-red">*</span></label>
                                    <div class="input-group date" id="datepicker-disabled-past3" data-date-format="dd-mm-yyyy" data-date-start-date="Date.default">
                                        <input type="text" class="form-control" name="birthday" value="{{date('d-m-Y', strtotime($user->birthday))}}" placeholder="Выберите дату" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <span id="birthday" style="color:red">@error('birthday'){{$message}}@enderror</span>
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="number">Выдан<span class="text-red">*</span></label>
                                    <input class="form-control" type="text" id="issued_by" value="{{ old('issued_by',$user->issued_by)}}" name="issued_by" placeholder="Выдан" />
                                    <span id="issued_by" style="color:red">@error('issued_by'){{$message}}@enderror</span>
                                </div>

                                <div class="col-md-6">
                                    <label for="series">Когда выпущено<span class="text-red">*</span></label>
                                    <div class="input-group date" id="datepicker-disabled-past1" data-date-format="dd-mm-yyyy" data-date-start-date="Date.default">
                                        <input type="text" class="form-control" name="when_issued" value="{{date('d-m-Y', strtotime($user->when_issued))}}" placeholder="Выберите дату" />
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <span id="when_issued" style="color:red">@error('when_issued'){{$message}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password">Прежний пароль<span class="text-red">*</span></label>
                                    <input class="form-control" type="password" id="password" name="password" />
                                    @if(Session::has('password_confirmation'))
                                    <span class="text-red"> {{Session::get('password_confirmation')}}</span>
                                    @endif
                                 

                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation">Новый пароль<span class="text-red">*</span></label>
                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" />
                                    <span id="image" style="color:red">@error('password_confirmation'){{$message}}@enderror</span>
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
                                @if($user->photo)
                                <img src="{{$user->photo}}" alt="" id="blah" class="w-100">
                                @else
                                <img src="/assets/img/gallery/add.png" alt="" id="blah" class="w-100">
                                @endif
                                <input type="file" name="photo" id="upload_image" style="display: none;" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                <span id="photo" style="color:red">@error('photo'){{$message}}@enderror</span>
                            </a>
                            <label class="col-form-label" for="image">Паспорт фото<span class="text-red">*</span></label>
                            <a href="#" onclick="password_image()">
                                @if($user->password_image)
                                <img src="{{$user->password_image}}" alt="" id="blahx" class="w-100">
                                @else
                                <img src="/assets/img/gallery/add.png" alt="" id="blahx" class="w-100">
                                @endif
                                <input type="file" name="password_image" id="password_image" style="display: none;" onchange="document.getElementById('blahx').src = window.URL.createObjectURL(this.files[0])">
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
<script src="/assets/plugins/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/assets/plugins/moment/moment.js"></script>
<script src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
<script src="/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="/assets/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
<script src="/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="/assets/plugins/pwstrength-bootstrap/dist/pwstrength-bootstrap.min.js"></script>
<script src="/assets/plugins/@danielfarrell/bootstrap-combobox/js/bootstrap-combobox.js"></script>
<script src="/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/assets/plugins/tag-it/js/tag-it.min.js"></script>
<script src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/assets/plugins/select2/dist/js/select2.min.js"></script>
<script src="/assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="/assets/plugins/bootstrap-show-password/dist/bootstrap-show-password.js"></script>
<script src="/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
<script src="/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
<script src="/assets/plugins/clipboard/dist/clipboard.min.js"></script>
<script src="/assets/js/demo/form-plugins.demo.js"></script>

@endpush
<script>
    function upload_image() {
        document.getElementById('upload_image').click();
    }

    function password_image() {
        document.getElementById('password_image').click();
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
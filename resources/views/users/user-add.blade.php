@extends('layouts.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('title', 'Employee add')

@section('content')


<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Add Employee</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="{{ route('employee-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="fullname">Full name<span class="text-red">*</span></label>
                            <input class="form-control" type="text" id="fullname" value="{{ old('fio')}}" name="fio" placeholder="full name" data-parsley-required="true" />
                            <span id="image" style="color:red">@error('fio'){{$message}}@enderror</span>

                        </div>
                        <div class="col-md-6">
                            <label for="username">Username<span class="text-red">*</span></label>
                            <input class="form-control" type="text" id="username" value="{{ old('username')}}" name="username" placeholder="username" data-parsley-required="true" />
                            <span id="image" style="color:red">@error('username'){{$message}}@enderror</span>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="phone">Phone<span class="text-red">*</span></label>
                            <input class="form-control" type="text" id="phone" value="{{ old('phone')}}" name="phone" placeholder="+998903306022" data-parsley-required="true" />
                            <span id="image" style="color:red">@error('phone'){{$message}}@enderror</span>

                        </div>
                        <div class="col-md-6">
                            <label for="email">Email<span class="text-red">*</span></label>
                            <input class="form-control" type="text" id="email" value="{{ old('email')}}" name="email" placeholder="email@gamil.com" data-parsley-required="true" />
                            <span id="image" style="color:red">@error('email'){{$message}}@enderror</span>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="country">Country<span class="text-red">*</span></label>
                            <select class="form-control" name="country" onchange="getCountry(this.options[this.selectedIndex].value)">
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            <span id="image" style="color:red">@error('country'){{$message}}@enderror</span>

                        </div>

                        <div class="col-md-6">
                            <label for="status">Status<span class="text-red">*</span></label>
                            <select class="form-control" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>

                            </select>
                            <span id="image" style="color:red">@error('status'){{$message}}@enderror</span>

                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <label for="region">Region<span class="text-red">*</span></label>
                            <select class="form-control" name="region" id="regions" onchange="getRegion(this.options[this.selectedIndex].value)">
                                @foreach($countries->first()->regions as $region)
                                <option value=" {{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                            <span id="image" style="color:red">@error('region'){{$message}}@enderror</span>

                        </div>
                        <div class="col-md-6">
                            <label for="password">Password<span class="text-red">*</span></label>
                            <input class="form-control" type="password" id="password" name="password" data-parsley-required="true" />
                            <span id="image" style="color:red">@error('password'){{$message}}@enderror</span>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="district">District<span class="text-red">*</span></label>
                            <select class="form-control" name="district" id="districts">
                                @foreach($countries->first()->regions->first()->districts as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                                @endforeach

                            </select>
                            <span id="image" style="color:red">@error('district'){{$message}}@enderror</span>

                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation">Password confirmation<span class="text-red">*</span></label>
                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" data-parsley-required="true" />
                            <span id="image" style="color:red">@error('password_confirmation'){{$message}}@enderror</span>

                        </div>
                    </div>

                    <div class="form-group row m-b-15 mt-3">
                        <div class="col-md-10 col-sm-10">
                            <input class="form-control" type="file" name="photo" /><br />
                            <span id="photo" style="color:red">@error('photo'){{$message}}@enderror</span>
                        </div>

                        <div class="col-md-2 col-sm-2 right">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
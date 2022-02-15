@extends('layouts.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="{{ route('contact-user-update',$contact->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-md-12  col-form-label" for="message">Full name<span class="text-red">*</span></label>
                            <div class="col-md-12 ">
                                <input class="form-control" type="text" id="name" value="{{ old('fio',$contact->fio)}}" name="fio" data-parsley-required="true" placeholder="full name" />
                                <span id="image" style="color:red">@error('fio'){{$message}}@enderror</span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-12 col-form-label" for="email">Email<span class="text-red">*</span></label>
                            <div class="col-md-12 ">
                                <input class="form-control" type="email" id="email" value="{{ old('email',$contact->email)}}" name="email" placeholder="email" />
                                <span id="image" style="color:red">@error('email'){{$message}}@enderror</span>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-md-12  col-form-label" for="phone1">Phone first<span class="text-red">*</span></label>
                            <div class="col-md-12 ">
                                <input class="form-control" type="text" id="phone1" value="{{ old('phone1',$contact->phone1)}}" name="phone1"  placeholder="+998903306022" />
                                <span id="image" style="color:red">@error('phone1'){{$message}}@enderror</span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-12 col-form-label" for="phone2">Phone second<span class="text-red">*</span></label>
                            <div class="col-md-12 ">
                                <input class="form-control" type="text" id="phone2" value="{{ old('phone2',$contact->phone2)}}" name="phone2" placeholder="+998906603322" />
                                <span id="image" style="color:red">@error('phone2'){{$message}}@enderror</span>
                            </div>

                        </div>
                    </div>

                    <label class="col-md-1 col-sm-1 col-form-label">Description<span class="text-red">*</span></label>
                    <div class="col-md-12 col-sm-12">
                        <textarea class="form-control" id="message" name="description" rows="4" placeholder="description">{{ old('description',$contact->description)}}</textarea>
                        <span id="image" style="color:red">@error('description'){{$message}}@enderror</span> </div>
                        <div class="row">
                            <div class="col-md-2 mt-3  right">
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
@endpush1
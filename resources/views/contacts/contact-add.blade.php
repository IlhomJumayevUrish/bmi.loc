@extends('layouts.default')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('title', 'Social contact add')

@section('content')


<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Add Social contact</h4>
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
                <form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="{{ route('contact-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row m-b-15">
                        <div class="col-md-6">
                            <label class="col-md-12 col-sm-12 col-form-label" for="fullname">Name<span class="text-red">*</span></label>
                            <div class="col-md-12 col-sm-12">
                                <input class="form-control" type="text" id="fullname" value="{{ old('name')}}" name="name" placeholder="Name" data-parsley-required="true" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-12 col-sm-12 col-form-label" for="message">URL<span class="text-red">*</span></label>
                            <div class="col-md-12 col-sm-12">
                                <input class="form-control" type="text" id="digits" value="{{ old('url')}}" name="url" data-parsley-required="true" placeholder="URL" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-12 col-sm-12 col-form-label" for="message">Status<span class="text-red">*</span></label>
                            <div class="col-md-12 col-sm-12">
                                <select name="status" id="status" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-12 col-sm-12 col-form-label">Image<span class="text-red">*</span></label>
                            <div class="col-md-12 col-sm-12">
                                <input class="form-control" type="file" name="image" /><br />
                                <span id="image" style="color:red">@error('image'){{$message}}@enderror</span>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 ml-3">
                            <button type="submit" class="btn btn-primary" >Submit</button>
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
<script src="/assets/js/demo/form-plugins.demo.js"></script>

@endpush
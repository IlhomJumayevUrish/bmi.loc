@extends('layouts.default')
@section('title', 'Изменить социальный контакт')

@section('content')


<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="form-validation-1">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Изменить социальный контакт</h4>
                <div class="panel-heading-btn">
                    <a href="{{ route('contact-index')}}" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-hand-point-left"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>

                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <form class="form-horizontal" data-parsley-validate="true" name="demo-form" action="{{ route('contact-update',$contact->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class=" col-form-label" for="fullname">Название<span class="text-red">*</span></label>
                                    <input class="form-control" type="text" id="fullname" value="{{ old('name',$contact->name)}}" name="name" placeholder="Название" data-parsley-required="true" />
                                </div>
                                <div class="col-md-6">
                                    <label class=" col-form-label" for="message">Статус<span class="text-red">*</span></label>
                                    <select name="status" id="status" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white">
                                        <option value="active" {{ $contact->status=="active"?'selected':''}}>Активный</option>
                                        <option value="inactive" {{ $contact->status=="inactive"?'selected':''}}>Неактивный</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label class="col-form-label" for="message">URL-адрес<span class="text-red">*</span></label>
                                    <input class="form-control" type="text" id="digits" value="{{ old('url',$contact->url)}}" name="url" data-parsley-required="true" placeholder="URL-адрес" />
                                </div>
                            </div>

                        </div>
                        <div class="col-md-2">
                            <label class="col-form-label" for="image">Фото<span class="text-red">*</span></label>
                            <a href="#" onclick="upload_image()">
                                <img src="{{$contact->image}}" alt="" id="blah" class="w-100" height="130">
                                <input type="file"  name="image" id="upload_image" style="display: none;" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary w-100">Отправить</button>
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
</script>
@push('scripts')
<script src="/assets/plugins/parsleyjs/dist/parsley.min.js"></script>
<script src="/assets/plugins/highlight.js/highlight.min.js"></script>
<script src="/assets/js/demo/render.highlight.js"></script>

@endpush
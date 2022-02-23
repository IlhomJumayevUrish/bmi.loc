@extends('layouts.default')

@section('title', 'Онас')

@section('content')

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="ui-media-object-2">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Онас</h4>
                <div class="panel-heading-btn">
                    <a href="{{ route('about-edit')}}" class="btn btn-green btn-xs ">Редактировать</a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <div class="media media-lg">
                    <a class="media-left" href="javascript:;">
                        <img src="{{$about->image}}" alt="" class="media-object rounded" />
                    </a>
                    <div class="media-body">
                        <ul class="media-list">
                            <li class="media media-sm">
                                <div class="media-body">
                                    <h5 class="media-heading">{{$about->title}}</h5>
                                    <p>{!!$about->description!!} <code> {{$about->working_date}} </code></p>
                                    <h6><span>Phone: </span> <a href="tel:{{$about->phone}}">{{$about->phone}}</a> </h6>
                                    <h6><span>Email: </span> <a href="https://{{$about->email}}">{{$about->email}}</a> </h6>
                                    <h6>
                                        <address> <span>Address: </span> {{$about->address}}</address>
                                        <address> <span>Koordinata:</span> {{$about->coor_x}},{{$about->coor_y}}</address>
                                    </h6>
                                </div>
                                <a class="media-right" href="javascript:;">
                                    <img src="{{$about->logo}}" alt="" class="media-object rounded-corner" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end panel-body -->
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->
</div>
<!-- end row -->

@endsection
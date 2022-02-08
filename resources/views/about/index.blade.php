@extends('layouts.default')

@section('title', 'Насчет нас')

@section('content')

<!-- begin row -->
<div class="row">
    <!-- begin col-6 -->
    <div class="col-md-12">
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="ui-media-object-2">
            <!-- begin panel-heading -->
            <div class="panel-heading">
                <h4 class="panel-title">Насчет нас</h4>
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-green btn-icon btn-default btn-lg"><i class="fa fa-pencil-alt"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <div class="media media-lg">
                    <a class="media-left" href="javascript:;">
                        <img src="/assets/img/gallery/gallery-1.jpg" alt="" class="media-object rounded" />
                    </a>
                    <div class="media-body">
                        <ul class="media-list">
                            <li class="media media-sm">
                                <div class="media-body">
                                    <h5 class="media-heading">{{$about->title}}</h5>
                                    <p>{{$about->description}} <code> {{$about->working_date}} </code></p>
                                    <h6><span>Phone: </span> <a href="tel:{{$about->phone}}">{{$about->phone}}</a> </h6>
                                    <h6><span>Email: </span> <a href="https://{{$about->email}}">{{$about->email}}</a> </h6>
                                    <h6>
                                        <address> <span>Address: </span> {{$about->address}} ({{$about->coor_x}},{{$about->coor_y}})</address>
                                    </h6>
                                </div>
                                <a class="media-right" href="javascript:;">
                                    <img src="/assets/img/user/user-9.jpg"  alt="" class="media-object rounded-corner" />
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
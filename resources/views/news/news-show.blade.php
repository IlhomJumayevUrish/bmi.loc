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
                <h4 class="panel-title">О нас</h4>
                <div class="panel-heading-btn">
                    <a href="{{ route('news-index')}}" class="btn btn-xs btn-icon btn-circle btn-default"><i class="fa fa-hand-point-left"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                </div>
            </div>
            <!-- end panel-heading -->
            <!-- begin panel-body -->
            <div class="panel-body">
                <div class="media media-lg">
                    <a class="media-left" href="javascript:;">
                        <img src="{{$news->image}}" alt="" class="media-object rounded" />
                    </a>
                    <div class="media-body">
                        <ul class="media-list">
                            <li class="media media-sm">
                                <div class="media-body">
                                    <h5 class="media-heading">{{$news->title}}</h5>
                                    <p>{!!$news->description!!}</p>
                                    <p class="m-0"><span>Key: </span> <side>{{$news->keyword}}</side> </p>
                                    <p class="m-0"><span>Type: </span> <site>{{$news->type}}</site> </p>

                                </div>

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
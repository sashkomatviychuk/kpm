@extends('laravel-bootstrap::layouts.interface-edit')

@section('title')
    Редагування групи
@stop

@section('breadcrumbs')
    <li><a href="{{route('universities')}}">Університети</a></li>
    <li class="active">{{$faculty->university->name}}</li>
    <li class=""><a href="{{route('faculties', $faculty->university->id)}}">Факультети</a></li>
    <li class=""><a href="{{route('groups', $faculty->id)}}">Групи</a></li>
    <li class="active">Редагування групи</li>
@stop

@section('heading')
    <h1>Редагування групи <br /><small>{{$faculty->title}} факультет <br />{{$faculty->university->name}}</small></h1>
@stop

@section('form-items')
    <div class="form-group">
        <div class="col-lg-10">
            {{Form::hidden('faculty_id', Input::old( "faculty_id", $item->faculty_id ),array( 'class'=>'form-control'))}}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "title" , 'Назва' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "title" , Input::old( "title", $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>'Назва' ) ) }}
        </div>
    </div>

@stop

@section('form-additional-block')
    <a href="{{route('groups', $faculty->id)}}" class="btn btn-danger">Назад</a>
@stop

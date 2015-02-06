@extends('laravel-bootstrap::layouts.interface')

@section('title')
    Список кафедр
@stop

@section('breadcrumbs')
    <li><a href="{{route('universities')}}">Університети</a></li>
    <li class="active">{{$faculty->university->name}}</li>
    <li class=""><a href="{{route('faculties', $faculty->university->id)}}">Факультети</a></li>
    <li class="active">Кафедри</li>
@stop

@section('content')

    <h1>Кафедри факультету: <small>{{$faculty->title}}</small></h1>
    <h2>{{$faculty->university->name}}</h2>

    {{-- The error / success messaging partial --}}
    @include('laravel-bootstrap::partials.messaging')

    @if( !$items->isEmpty() )
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Назва</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td><a href="{{$edit_url.$item->id}}">{{$item->id}}</a></td>
                        <td><a href="{{$edit_url.$item->id}}">{{$item->title}}</a>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Опції <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    @if (allowed('departments', 'edit'))<li><a href="{{$edit_url.$item->id}}">
                                    <i class="glyphicon glyphicon-edit"></i> Редагувати</a></li>@endif
                                    @if (allowed('departments', 'delete'))
                                    <li><a href="{{$delete_url.$item->id.'/?token='.Hash::make('delete')}}" class="js-delete" data-message="Видалити?"><i class="glyphicon glyphicon-trash"></i> Видалити</a></li>
                                    @endif
                                    <li class="divider"></li>
                                    @if (allowed('teachers', 'index'))
                                    <li><a href="{{route('teachers', array($item->id))}}">Викладачі</a></li>
                                    @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">
            <strong>Список порожній</strong>
        </div>
    @endif
    <div class="pull-left">
        {{$items->links()}}
    </div>
    <div class="pull-right">
        @if (allowed('departments', 'new'))
            <a href="{{route('departmentAdd', $id)}}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Додати</a>
        @endif
    </div>
@stop
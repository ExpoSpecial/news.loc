@extends('layouts.admin')

@section('content')
    @if(count($categories) != 0)
        <h1>Категории</h1>

        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <h3>{!! $category->title !!}</h3>

                            <p>{!! $category->created_at !!}</p>
                            <a href="{{ route('admin.category.edit', ['slug' => $category->slug]) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <form class="pull-right" action="{{ route('admin.category.destroy', ['id' => $category->id]) }}" method="post" class="form-inline">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" onclick="return confirm('Удалить?')" class="btn btn-danger" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info" role="alert">Категорий нет</div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.category.create') }}" class="btn btn-success pull-right" style="margin-bottom:30px;">Новая категория</a>
        </div>
    </div>


@endsection
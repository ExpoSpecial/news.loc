@extends('layouts.admin')

@section('content')
    @if(count($tags) != 0)
        <h1>Теги</h1>

        <div class="row">
            @foreach ($tags as $tag)
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <h3>{!! $tag->title !!}</h3>

                            <p>{!! $tag->created_at !!}</p>
                            <a href="{{ route('admin.tag.edit', ['slug' => $tag->slug]) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <form class="pull-right" action="{{ route('admin.tag.destroy', ['id' => $tag->id]) }}" method="post" class="form-inline">
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
        <div class="alert alert-info" role="alert">Тегов нет</div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.tag.create') }}" class="btn btn-success pull-right" style="margin-bottom:30px;">Новый тег</a>
        </div>
    </div>


@endsection
@extends('layouts.admin')

@section('content')
        @if(count($posts) != 0)
            <h1>Записи</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.post.create') }}" class="btn btn-success pull-right" style="margin-bottom:30px;">Новая запись</a>
                </div>
            </div>

            <div class="row">
            @foreach ($posts as $post)
                    <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <h3>{!! $post->title !!}</h3>
                        @if(!empty($post->category_id))
                            <h5>
                                <strong>Категория: </strong>
                                @foreach($categories as $category)
                                    @if($post->category_id == $category->id)
                                        {{ $category->title }}
                                    @endif
                                @endforeach
                            </h5>
                        @endif
                        <time>{!! $post->created_at->format('F j, Y') !!}</time>
                        <p>{!! $post->text_post !!}</p>
                        <a href="{{ route('admin.post.edit', ['slug' => $post->slug]) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <form class="pull-right" action="{{ route('admin.post.destroy', ['id' => $post->id]) }}" method="post" class="form-inline">
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
            {{ $posts->links() }}
        @else
            <div class="alert alert-info" role="alert">Новостей нет</div>
        @endif


@endsection
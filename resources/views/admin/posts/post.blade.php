@extends('layouts.admin')

@section('content')
    <h1>Изменить запись</h1>

    <div class="row">
        <form action="{{ route('admin.post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title"><h4>Заголовок</h4></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Кирилица" value="{{ $post->title }}">
                        </div>

                        <div class="form-group to-link">
                            <label for="slug"><h4>Слаг</h4></label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ $post->slug }}">
                        </div>

                        <div class="form-group">
                            <label for="body"><h4>Текст</h4></label>
                            <textarea class="form-control" name="body" rows="20" id="body">{{ $post->body }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="submit" value="сохранить" class="btn btn-info">
                </div>
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> установить миниатюру
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="hidden" name="filepath">
                        </div>
                        <img src="@if(!empty($post->thumbnail)){{$post->thumbnail}}@endif" id="holder" style="margin-top:15px;width:100%;">
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="category_id"><h4>Выбрать категорию</h4></label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tag_id"><h4>Выбрать Тег</h4></label>
                            <select name="tag_id" id="tag_id" class="form-control">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
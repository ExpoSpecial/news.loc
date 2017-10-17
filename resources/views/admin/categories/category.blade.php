@extends('layouts.admin')

@section('content')
    <h1>Изменить категорию</h1>

    <div class="row">
        <form action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title"><h4>Заголовок</h4></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Кирилица" value="{{ $category->title }}">
                        </div>

                        <div class="form-group to-link">
                            <label for="slug"><h4>Слаг</h4></label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="submit" value="сохранить" class="btn btn-info">
                </div>
            </div>
        </form>
    </div>

@endsection
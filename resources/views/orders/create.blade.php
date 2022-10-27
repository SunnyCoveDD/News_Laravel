@extends('welcome')
@section('title', 'Добавление')
@section('content')
    <div class="container p-4">
        <h2 class="text-center p-5">Добавить пост</h2>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="orderTitle" class="form-label">Название</label>
                        <input type="text" class="form-control @error('news') is-invalid @enderror" name="news" id="orderTitle" aria-describedby="orderTitle">
                        @error('news')
                        <div id="invalidNews" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="orderTextarea" class="form-label">Описание</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="orderTextarea" rows="3"></textarea>
                        @error('description')
                        <div id="invalidNews" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="orderStatus">Статус</label>
                        <select id="orderStatus" name="category_id" class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected>Выберите нужный раздел</option>
                            @foreach($categories as $category)
                                <option value="{{$category -> id}}">{{$category -> name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div id="invalidNews" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="orderFile" class="form-label @error('photo') is-invalid @enderror">Выбрать фото</label>
                        <input name="photo" class="form-control" type="file" id="orderFile" multiple>
                        @error('photo')
                        <div id="invalidNews" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" name="btnOrder" class="btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection

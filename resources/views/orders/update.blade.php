@extends('welcome')
@section('title', 'Редактирование')
@section('content')
    <div class="container p-4">
        <h2 class="text-center p-5">Изменить пост</h2>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="orderTitle" class="form-label">Название</label>
                        <input value="{{$order->news}}" type="text" class="form-control @error('news') is-invalid @enderror" name="news" id="orderTitle" aria-describedby="orderTitle">
                        @error('news')
                        <div id="invalidNews" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="orderTextarea" class="form-label">Описание</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="orderTextarea" rows="3">{{$order->description}}</textarea>
                        @error('description')
                        <div id="invalidNews" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="orderStatus">Статус</label>
                        <select id="orderStatus" name="category_id" class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example">
                            <option selected value="{{$orderCategory->id}}">{{$orderCategory->name}}</option>
                            @foreach($categories as $category)
                                @if($category->id !== $orderCategory->id)
                                    <option value="{{$category -> id}}">{{$category -> name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                        <div id="invalidNews" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    @if(\Illuminate\Support\Facades\Auth::user()->isAdmin)
                            <select name="status_id" class="form-select">
                                <option selected value="{{$orderStatus->id}}">{{$orderStatus->name}}</option>
                                @foreach($statuses as $status)
                                    @if($status->id !== $orderStatus_id)
                                        <option value="{{$status->id}}">{{$status->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                    @endif
                    </div>
                    <div class="mb-3">
                        <label for="orderPhoto" class="form-label">Старое фото</label>
                        <img id="orderPhoto" width="100px" src="{{asset('storage/app/public/'.$order->photo)}}" alt="Старая картинка">
                    </div>
                    <div class="mb-3">
                        <label for="orderFile" class="form-label">Новое фото</label>
                        <input name="photo_new" class="form-control" type="file" id="orderFile" multiple>
                    </div>
                    <a class="link-secondary text-decoration-none me-2" href="@if(\Illuminate\Support\Facades\Auth::user()->isAdmin){{route('admin')}}@else{{route('acc')}}@endif">Отмена операции</a>
                    <button type="submit" name="btnOrder" class="ms-2 btn btn-primary">Отправить</button>
                </form>
            </div>
        </div>
    </div>
@endsection

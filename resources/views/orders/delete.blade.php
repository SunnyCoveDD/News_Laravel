@extends('welcome')
@section('title', 'Удаление')
@section('content')
    <div class="container p-4">
        <div class="row d-grid justify-content-center">
            <div class="col"></div>
            <div class="col-m6">
                <h2 class="pt-5 pb-5">Удаление заявки</h2>
                <p>Название заявки - {{$order->news}}</p>
                <p>Описание заявки - {{$order->description}}</p>
                <p>Категории заявки - {{$order->category()}}</p>
                <p class="text text-danger">Вы точно хотите удалить заявку?</p>
                <form method="post">
                    @csrf
                    <a class="link-secondary text-decoration-none" href="@if(\Illuminate\Support\Facades\Auth::user()->isAdmin){{route('admin')}}@else{{route('acc')}}@endif">Отмена операции</a>
                    <button type="submit" class="btn btn-danger ms-3">Удалить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection

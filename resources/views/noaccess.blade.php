@extends('welcome')
@section('title', 'Ухади')
@section('content')
    <div class="container">
        <div class="p-5 d-grid justify-content-center">
            <div>
                <img width="80%" class="d-block m-auto" src="/resources/img/access.png" alt="Я вам запрещаю переходить на эту страницу">
            </div>
            <div class="nav-item text-center pt-4">
                <a type="button" class="btn btn-success" href="{{route('/')}}">Вернуться на главную</a>
            </div>
        </div>
    </div>
@endsection

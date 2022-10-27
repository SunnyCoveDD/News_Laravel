@extends('welcome')
@section('title', 'Главная страница')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col"></div>
            <div class="dol-12">
                <h2 class="text-center p-5">Решенные заявки</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Название заявки</th>
                        <th scope="col">Описание завявки</th>
                        <th scope="col">Категории</th>
                        <th scope="col">Фото</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->news}}</td>
                            <td>{{$order->description}}</td>
                            <td>{{$order->category()}}</td>
                            <td>
                                <img width="100px" src="{{asset('storage/app/public/'.$order->photo)}}" alt="Картинка">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection

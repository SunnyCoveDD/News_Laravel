@extends('welcome')
@section('title', 'Аккаунт')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col"></div>
        <div class="dol-12">
            <h2 class="text-center p-5">Личный кабинет</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Временная метка</th>
                    <th scope="col">Название заявки</th>
                    <th scope="col">Описание завявки</th>
                    <th scope="col">Категории</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Фото</th>
                    <th scope="col">Фото новое</th>
                    <th scope="col">Изменение заявки</th>
                    <th scope="col">Удаление заявки</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->news}}</td>
                        <td>{{$order->description}}</td>
                        <td>{{$order->category()}}</td>
                        <td>{{$order->status()}}</td>
                        <td>
                            <img width="100px" src="{{asset('storage/app/public/'.$order->photo)}}" alt="Картинка">
                        </td>
                        <td>
                            <img width="100px" src="{{asset('storage/app/public/'.$order->photo_new)}}" alt="Картинка">
                        </td>
                        <td><a class="link-secondary text-decoration-none" href="{{route('update', $order->id)}}">Изменить заявку</a></td>
                        <td><a class="link-secondary text-decoration-none" href="{{route('delete', $order->id)}}">Удалить заявку</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection

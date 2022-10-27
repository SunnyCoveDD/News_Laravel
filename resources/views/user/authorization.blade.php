@extends('welcome')
@section('title', 'Авторизация')
@section('content')
    <div class="container p-4">
        <h2 class="text-center p-5">Авторизация</h2>
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <form method="POST">
                    @if(session()->has('errorLogin'))
                        <div class="alert alert-danger">{{session()->get('errorLogin')}}</div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="Login" class="form-label @error('login') is-invalid @enderror()">Логин</label>
                        <input type="text" class="form-control" name="login" id="Login">
                        @error('login')
                            <div id="invalidLogin" class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Пароль</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="Password">
                        @error('password')
                        <div id="invalidPassword" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Авторизоваться</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection

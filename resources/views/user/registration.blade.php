@extends('welcome')
@section('title', 'Регистрация')
@section('content')
    <div class="container p-4">
        <h2 class="text-center pt-5">Регистрация</h2>
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <form method="POST">
                    @if(session()->has('success'))
                        <div class="alert alert-success">{{session()->get('success')}}</div>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="Name" class="form-label">ФИО</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="Name">
                        @error('name')
                        <div id="invalidName" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Login" class="form-label">Логин</label>
                        <input type="text" class="form-control @error('login') is-invalid @enderror" name="login" id="Login">
                        @error('login')
                        <div id="invalidLogin" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Password" class="form-label">Пароль</label>
                        <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="Password">
                        @error('password')
                        <div id="invalidPassword" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Password_confirmation" class="form-label">Пароль еще раз</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="Password_confirmation">
                        @error('password_confirmation')
                        <div id="invalidPasswordConfirmation" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input @error('success') is-invalid @enderror" name="success" id="Success">
                        <label class="form-check-label" for="Success">Согласен на обработку данных</label>
                        @error('success')
                        <div id="invalidPasswordConfirmation" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

@endsection

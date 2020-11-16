@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')

    <div class="row justify-content-center">
        <div class="card " style="width: 40rem; padding: 20px;">
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <h3>Авторизоваться</h3>
                </div>
            </div>

            <form>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                            <label class="form-check-label" for="gridCheck1">
                                Запомнить меня
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

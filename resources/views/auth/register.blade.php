@extends('layouts.app')

@section('content')
<div class="col-12 py-3  p-0 m-0" id="nuestraciudad">
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card color-black-trasnparent ">
                    <div class="card-header">
                        <img width="30%" src="{{asset('assets/images/ekklesiaManizales.png')}}" alt="">
                    </div>

                    <div class="card-body text-white">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="titulo-Myraid col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                <div class="col-md-8">
                                    <input id="name"  type="text" class="input-decoration color-transparent col-8 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="titulo-Myraid col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="input-decoration col-8 color-transparent @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="titulo-Myraid col-md-4 col-form-label col-8 text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="input-decoration col-8 color-transparent @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="titulo-Myraid col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="input-decoration col-8 color-transparent" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-outline-light titulo-Myraid">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 p-0 m-0 item-black pt-4 pb-5 row justify-content-center">
    <div class="col-4 pb-3 px-5 mx-5">
        <img width="100%" src="{{asset('assets/images/Logo-un-lugar-para-todos.png')}}" alt="">
    </div>
</div>
@endsection

@extends('layout.app')
@section('title', 'Registrar')
@section('content')
  <div class="bg-primary-color h-100 w-100 d-flex">
    <div class="d-flex align-items-center justify-content-center form-container">
      <form action="{{ route('auth.store') }}" method="POST"
        class="bg-secondary-color form-cadastro">
        @csrf

        <a href="{{ route('home') }}"
          class="w-100 d-flex justify-content-center align-items-center">
          <img src="{{ asset('img/logo-horizontal.png') }}" alt=""
            class="w-50">
        </a>

        <h2 class="title-var">Entrar na conta</h2>
        <div class="d-flex flex-column w-75">
          <label for="" class="label-var">Email</label>
          <input name="email" value="{{ old('email') }}" type="email"
            class="input-var email">
        </div>

        <div class="d-flex flex-column w-75">
          <label for="" class="label-var">Senha</label>
          <input name="password" value="{{ old('password') }}" type="password"
            class="input-var senha">
        </div>

        <div class="d-flex flex-column w-75">
          <label for="" class="label-var">Repita a senha</label>
          <input
            name="password_confirmation"value="{{ old('password_confirmation') }}"
            type="password" class="input-var rep_senha">
        </div>

        <div class="d-flex flex-column w-75 gap-3">
          <button class="btn-var-primary" type="submit">Criar conta</button>
          <a href="{{ route('auth.login') }}" class="link-var-primary">
            Entrar em uma conta existente
          </a>
        </div>
      </form>
    </div>
    <div class="image-container">
      <img src="{{ asset('img/img-bg-login.png') }}" alt="Banner worknet">
    </div>
  </div>
@endsection
@section('js')
  <script src="{{ asset('js/validacao_cadastro.js') }}"></script>
@endsection

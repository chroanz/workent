@extends('layout.app')
@section('title', 'Login')
@section('content')
  <div class="bg-primary-color h-100 w-100 d-flex">
    <div class="d-flex align-items-center justify-content-center form-container">
      <form action="{{ route('auth.authenticate') }}" method="POST"
        class="bg-secondary-color form">
        @csrf
        <h2 class="title-var">Entrar na conta</h2>
        <div class="d-flex flex-column w-75">
          <label for="" class="label-var">Email</label>
          <input type="email" value="{{ old('email') }}" class="input-var"
            name="email">
        </div>

        <div class="d-flex flex-column w-75">
          <label for="" class="label-var">Senha</label>
          <input type="password" class="input-var" name="password">
        </div>

        <div class="d-flex w-75 justify-content-end">
          <a href="">Esqueci a senha</a>
        </div>

        <div class="d-flex flex-column w-75 gap-3">
          <button type="submit" class="btn-var-primary">Entrar</button>
          <a href="{{ route('auth.create') }}" class="link-var-primary">
            Criar uma conta
          </a>
        </div>
      </form>
    </div>
    <div class="image-container">
      <img src="{{ asset('img/img-bg-login.png') }}" alt="Banner worknet">
    </div>
  </div>
@endsection

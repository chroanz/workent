@extends('layout.app')
@section('title', 'Registrar')
@section('content')
  <div class="bg-primary-color h-100 w-100 d-flex">
    <div class="d-flex align-items-center justify-content-center form-container">
      <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" 
        class="bg-secondary-color form-cadastro">
        @csrf
        <h2 class="title-var">Finalizar cadastro</h2>
        <div class="d-flex flex-column w-75">
          <label for="" class="label-var">Nome</label>
          <input name="name" type="text" class="input-var nome">
        </div>

        <div class="d-flex flex-column w-75">
          <label for="" class="label-var">Data de nascimento</label>
          <input name="birthday" type="date" class="input-var senha">
        </div>

        <div class="d-flex flex-column w-75">
          <label for="" class="label-var">Endereço completo</label>
          <textarea name="address" id="" class="input-var textarea"></textarea>
        </div>
         <div class="d-flex flex-column w-75">
          <label for="" class="label-var">Imagem de Perfil</label>
          <input name="url_img" type="file" class="input-var" >

        </div>

        <div class="d-flex flex-column w-75 gap-3">
          <button class="btn-var-primary" type="submit">Criar conta</button>
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

@extends('layout.app')

@section('title', 'Admin - Criar sala')

@section('css')
<link rel="stylesheet" href="{{ asset('css/criar-sala.css') }}">
@endsection

@section('content')
@include('components.header')

<div class="w-100 h-100 bg-amber-950 d-flex flex-column align-center py-5">
  <h2 class="text-center m5 title" style="color:#1531df;">Adicionar sala</h2>

  <form method="POST" enctype="multipart/form-data" action="{{ route('admin.room.store') }}" class="form">
    @csrf

    <div class="mb-3 container-form-group">
      <label for="name" class="form-label">Nome da sala</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Nome da sala" required>
    </div>

    <div class="mb-3 container-form-group">
      <label for="price" class="form-label">Valor da diária</label>
      <input type="number" name="price" id="price" class="form-control" placeholder="R$ 129,99" step="0.01" required>
    </div>

    <div class="mb-3 container-form-group">
      <label for="capacity" class="form-label">Número de vagas</label>
      <input type="number" name="capacity" id="capacity" class="form-control" placeholder="Digite o número" step="1" required>
    </div>

    <div class="box-container">
      <div class="image-box">
        <input type="file" accept="image/*" name="image_1" id="imageInput1" class="d-none">
        <button type="button" class="btn-blue btn-sm" onclick="document.getElementById('imageInput1').click()">Imagem 1</button>
      </div>

      <div class="image-box">
        <input type="file" accept="image/*" name="image_2" id="imageInput2" class="d-none">
        <button type="button" class="btn-blue btn-sm" onclick="document.getElementById('imageInput2').click()">Imagem 2</button>
      </div>

      <div class="image-box">
        <input type="file" accept="image/*" name="image_3" id="imageInput3" class="d-none">
        <button type="button" class="btn-blue btn-sm" onclick="document.getElementById('imageInput3').click()">Imagem 3</button>
      </div>
    </div>

    <div class="text-center" style="width: 100%; max-width: 400px;">
      <button type="submit" class="btn-blue w-100">Adicionar</button>
    </div>
  </form>
</div>

@include('components.footer')
@endsection

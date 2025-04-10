@extends('layout.app')
@section('title', 'Admin - Criar de sala')
@section('content')
  @include('components.header')
  <div>
    <h1>Criar sala</h1>
    <form method="POST">
      <div>
        <label for="images">Imagens</label>
        <input type="file" name="images[]" multiple accept="image/*">
      </div>
      <div>
        <label for="name">Nome</label>
        <input type="text" name="name"required>
      </div>
      <div>
        <label for="capacity">Capacidade</label>
        <input type="number" name="capacity" step="1" required>
      </div>
      <div>
        <label for="price">Valor da diária</label>
        <input type="number" name="price"step="0.01" required>
      </div>
      <div>
        <label for="name">Localização</label>
        <input type="text" name="location"required>
      </div>
      <button type="submit">Criar sala</button>
    </form>
  </div>
  @include('components.footer')
@endsection

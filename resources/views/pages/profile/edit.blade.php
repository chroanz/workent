@extends('layout.app')
@section('title', 'Perfil')
@section('content')
  @include('components.header')

  <form method="POST" enctype="multipart/form-data">
    <div>
      <label for="profile_image">Imagem de Perfil</label>
      <input type="file" name="profile_image" accept="image/*">
    </div>
    <div>
      <label for="name">Nome</label>
      <input type="text" name="name" required>
    </div>

    <div>
      <label for="email">Email</label>
      <input type="email" name="email" required>
    </div>

    <div>
      <label for="birthday">Data de nascimento</label>
      <input type="date" name="birthday" required>
    </div>

    <div>
      <label for="address">Endereço</label>
      <textarea id="address" name="address"></textarea>
    </div>

    <div>
      <button type="submit">Confirmar edição</button>
    </div>
  </form>
  @include('components.footer')
@endsection

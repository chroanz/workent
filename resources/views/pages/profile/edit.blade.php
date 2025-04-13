@extends('layout.app')
@section('title', 'Perfil')
@section('content')
  @include('components.header')

  <form action="{{ route('profile.update') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
      <label for="name">Nome</label>
      <input name="name" type="text" value="{{ $client->name }}" required>
    </div>

    <div>
      <label for="birthday">Data de nascimento</label>
      <input type="date" name="birthday" value="{{ $client->birthday }}"
        required>
    </div>

    <div>
      <label for="address">Endereço</label>
      <textarea id="address" name="address">{{ $client->address }}</textarea>
    </div>

    <div>
      <button type="submit">Confirmar edição</button>
    </div>
  </form>
  @include('components.footer')
@endsection

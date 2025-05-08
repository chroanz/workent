@extends('layout.app')
@section('title', 'Perfil')
@section('content')
  @include('components.header')

  <main class="perfil-container">
    <section class="perfil-info">
      <div class="avatar-nome">
        <div class="avatar">
          <img src="{{ asset('images/avatar-icon.svg') }}" alt="Avatar" />
        </div>
        <h2>{{ $client->name }}</h2>
      </div>

      <form class="dados" action="{{ route('profile.update') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Nome completo</label>
        <input name="name" type="text" value="{{ $client->name }}"
          required />

        <label>Data de nascimento</label>
        <input ttype="date" name="birthday" value="{{ $client->birthday }}"
          required />

        <label>Endereço</label>
        <textarea id="address" name="address">{{ $client->address }}</textarea>

        <div class="botoes">
          <button class="sair" type="button">Sair</button>
          <button class="editar" type="submit">Editar</button>
        </div>
      </form>
    </section>

    <section class="foto-perfil">
      <img src="{{ asset('images/foto-usuario.jpg') }}" alt="Foto do usuário" />
    </section>
  </main>
  @include('components.footer')
@endsection

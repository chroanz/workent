@extends('layouts.app')

@section('title', 'Perfil - Workent')

@section('content')
<header class="navbar">
  <div class="logo">
    <img src="{{ asset('images/logo.png') }}" alt="Workent Logo">
    <span>WORKENT</span>
    <small>Espaços de coworking</small>
  </div>
  <nav class="nav-links">
    <a href="#">Salas</a>
    <a href="#"><strong>Auditórios</strong></a>
    <div class="search-container">
      <input type="text" placeholder="Pesquisar">
      <button><img src="{{ asset('images/search-icon.svg') }}" alt="Buscar" /></button>
    </div>
  </nav>
  <div class="user-menu">
    <img src="{{ asset('images/user-icon.svg') }}" alt="Usuário">
  </div>
</header>

<main class="perfil-container">
  <section class="perfil-info">
    <div class="avatar-nome">
      <div class="avatar">
        <img src="{{ asset('images/avatar-icon.svg') }}" alt="Avatar" />
      </div>
      <h2>João</h2>
    </div>

    <form class="dados">
      <label>Nome completo</label>
      <input type="text" value="João Dias Alves Cabral" readonly />

      <label>Email</label>
      <input type="email" value="JoaoDias123@gmail.com" readonly />

      <label>Data de nascimento</label>
      <input type="text" value="12/12/2000" readonly />

      <label>Endereço</label>
      <textarea readonly>Rua Principal, 123, Bairro Jardim América, São Paulo, SP, 01234-567</textarea>

      <div class="botoes">
        <button class="sair" type="button">Sair</button>
        <button class="editar" type="button">Editar</button>
      </div>
    </form>
  </section>

  <section class="foto-perfil">
    <img src="{{ asset('images/foto-usuario.jpg') }}" alt="Foto do usuário" />
  </section>
</main>
@endsection

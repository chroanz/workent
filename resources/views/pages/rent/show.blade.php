@extends('layout.app')
@section('title', 'Admin - Lista de reservas')
@section('content')
  @include('components.header')
  <div>
    <div>
      <div class="image">
        <img src="{{ asset('img/exemplo-sala.png') }}" alt="Imagem da sala">
      </div>

      <h2>Sala de reuniões</h2>
      <p><strong>R$</strong> 89,90/dia</p>
      <ul>
        <li><strong>Capacidade:</strong> 8 pessoas</li>
        <li><strong>Localização:</strong> Rua Exemplo, 123</li>
      </ul>
      <ul>
        <li><strong>Caracteristicas</strong></li>
        <li>Mesa com tomadas</li>
        <li>Wi-Fi</li>
        <li>Televisão</li>
        <li>Ar-condicionado</li>
      </ul>
    </div>

    <div>
      <p><strong>Início</strong> 05/01/1960</p>
      <p><strong>Térmimo</strong> 10/05/2005</p>

      <p><strong>Locador</strong> Ciço Tadeu</p>

      <div>
        <strong>Convidados</strong>
        <ul>
          <li>Jhonatta Pietro</li>
          <li>Caetano Segundo</li>
          <li>Fabricio Carneiro Fortão</li>
        </ul>
      </div>

      <p><strong>R$</strong> 889,90</p>
      <button type="button">Editar</button>
    </div>
  </div>
  @include('components.footer')
@endsection

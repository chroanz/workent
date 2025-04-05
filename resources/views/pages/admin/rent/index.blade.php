@extends('layout.app')
@section('title', 'Admin - Lista de reservas')
@section('content')
  @include('components.header')
  <div>
    <h1>Reservas</h1>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>ID Sala</th>
          <th>Nome da sala</th>
          <th>Locador</th>
          <th>Início</th>
          <th>Fim</th>
          <th>Convidados</th>
        </tr>
      </thead>
      <tbody>
        @for ($index = 0; $index < 5; $index++)
          <tr>
            <td>2</td>
            <td>1</td>
            <td>Auditório</td>
            <td>Ciço Tadeu</td>
            <td>05/01/1960</td>
            <td>10/05/2005</td>
            <td>8 pessoas</td>
          </tr>
        @endfor
      </tbody>
    </table>
  </div>
  <div>
    <p>Paginação</p>
    <div>
      <a href="#">1</a> -
      <a href="#">2</a> -
      <a href="#">3</a> -
      <a href="#">4</a>
    </div>
  </div>
  @include('components.footer')
@endsection

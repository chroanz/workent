@extends('layout.app')
@section('title', 'Admin - Lista de salas')
@section('content')
  @include('components.header')
  <div>
    <h1>Salas</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nome da sala</th>
          <th>Capacidade</th>
          <th>Locatário do dia</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
        @for ($index = 0; $index < 5; $index++)
          <tr>
            <td>2</td>
            <td>Auditório</td>
            <td>8 pessoas</td>
            <td>Ciço Tadeu</td>
            <td>Alugada</td>
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

@extends('layout.app')
@section('title', 'Admin - Lista de Pagamentos')
@section('content')
  @include('components.header')
  <div>
    <h1>Pagamentos</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Locador</th>
          <th>Valor</th>
          <th>Data</th>
        </tr>
      </thead>
      <tbody>
        @for ($index = 0; $index < 5; $index++)
          <tr>
            <td>2</td>
            <td>Ciço Tadeu</td>
            <td>R$ 5000,00</td>
            <td>10/05/2025</td>
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

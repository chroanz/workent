@extends('layout.app')
@section('title', 'Salas')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/reservas-style.css') }}">
@endsection
@section('content')
  @include('components.header')
  <div class="listagem-container">
    <h2 class="title">Salas</h2>
    <a href="/salas/criar">
      criar sala
    </a>
    <table>
      <thead>
        <tr>
          <th class="thead">Nome Sala</th>
          <th class="thead">Estrelas</th>
          <th class="thead">Dia livre</th>
          <th class="thead">Ações</th>
        </tr>
      </thead>
      <tbody>
        @forelse($rooms as $room)
          <tr class="trdata">
            <td class="tdata td-first">
              <a href="/salas/{{ $room->id }}">
                {{ $room->name }}
            </td>
            </a>
            <td class="tdata">
              {{ $room->getAverageStars() }}
            </td>
            <td class="tdata">
              {{ $room->getWhenRoomIsFree()->format('d/m/Y') }}
            </td>
            <td class="tdata">
              <a href="/salas/{{ $room->id }}/editar">
                Editar
              </a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center">
              Nenhuma sala alugada até o momento.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
    <div class="pagination-container">
      {{ $rooms->links() }}
    </div>
  </div>
  <br>
  <br>
  @include('components.footer')
@endsection
@section('js')
@endsection

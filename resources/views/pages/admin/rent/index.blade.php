@extends('layout.app')
@section('title', 'Reservas')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/reservas-style.css') }}">
@endsection
@section('content')
  @include('components.header')
  <div class="listagem-container">
    <h2 class="title">Reservas</h2>
    <table>
      <thead>
        <tr>
          <th class="thead">ID</th>
          <th class="thead">Locador</th>
          <th class="thead">Sala</th>
          <th class="thead">Inicio</th>
          <th class="thead">Fim</th>
          <th class="thead">Valor</th>
          <th class="thead">Conv.</th>
        </tr>
      </thead>
      <tbody>
        @forelse($rents as $rent)
          <tr class="trdata">
            <td class="tdata td-first">{{ $rent->id }}</td>
            <td class="tdata">{{ $rent->client->name }}</td>
            <td class="tdata">
              <a href="{{ route('room.show', $rent->room->id) }}">
                {{ $rent->room->name }}
              </a>
            </td>
            <td class="tdata">{{ $rent->rentStart->format('d/m/Y') }}</td>
            <td class="tdata">{{ $rent->rentEnd->format('d/m/Y') }}</td>
            @if ($rent->payment)
              <td class="tdata text-nowrap">R$ {{ $rent->payment->price }}</td>
            @else
              <td class="tdata">Pendente</td>
            @endif
            <td class="tdata td-last">
              {{ sizeof($rent->guests) }}
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
      {{ $rents->links() }}
    </div>
  </div>
@endsection
@section('js')
@endsection

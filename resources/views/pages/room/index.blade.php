@extends('layout.app')
@section('content')
  @include('components.header')
  <div class="bg-white w-100 d-flex justify-content-center align-items-start"
    style="min-height: 100%">
    <div class="pagina-salas d-flex flex-wrap py-5">
      @foreach ($rooms as $room)
        <a href="/salas/{{ $room->id }}"
          class="card-sala text-decoration-none text-dark  d-flex flex-column justify-content-start gap-2 p-2">
          <img src="{{ asset('img/exemplo-sala.png') }}" alt="Sala de exemplo">
          <div
            class="card-descricao d-flex justify-content-between align-items-start">
            <div>
              <p class="fs-5">{{ $room->name }}</p>
              <p>Até {{ $room->capacity }} pessoas</p>
              <p>Disponível em
                {{ $room->getWhenRoomIsFree()->format('d/m/Y') }}</p>
              <p>
                <strong>R$ {{ number_format($room->price, 2, ',', '.') }}</strong>
                das 09h às 18h
              </p>
            </div>
            <div class="d-flex gap-1 align-items-baseline">
              <img src="{{ asset('img/estrela-apagada.svg') }}"
                alt="Estrela apagada">
              <p>{{ number_format($room->getAverageStars(), 2) }}</p>
            </div>
          </div>
        </a>
      @endforeach
    </div>
  </div>
  @include('components.footer')
@endsection

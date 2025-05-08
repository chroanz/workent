@extends('layout.app')
@section('content')
  @include('components.header')
  <div class="bg-white w-100 d-flex justify-content-center align-items-start"
    style="min-height: 100%">
    <div class="pagina-detalhes p-5 gap-5">
      <div id="galeria" class="carousel slide" data-bs-ride="carousel"
        style="max-width: 100%; overflow: hidden;">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset('img/exemplo-sala.png') }}"
              alt="sala de exemplo"
              style="object-fit: contain; max-height: 500px;">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/exemplo-sala.png') }}"
              alt="sala de exemplo"
              style="object-fit: contain; max-height: 500px;">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/exemplo-sala.png') }}"
              alt="sala de exemplo"
              style="object-fit: contain; max-height: 500px;">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/exemplo-sala.png') }}"
              alt="sala de exemplo"
              style="object-fit: contain; max-height: 500px;">
          </div>
        </div>
        <button class="carousel-control-prev" type="button"
          data-bs-target="#galeria" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button"
          data-bs-target="#galeria" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div
        class="w-100 d-flex gap-5 align-items-start justify-content-between flex-wrap px-5">
        <div class="sala-descricao flex-grow-1 d-flex flex-column gap-2">
          <h1 class="titulo-sala">{{ $room->name }}</h1>
          <div class="avaliacoes">
            <img src="{{ asset('img/estrela-amarela.svg') }}"
              alt="estrela amarela">
            <img src="{{ asset('img/estrela-amarela.svg') }}"
              alt="estrela amarela">
            <img src="{{ asset('img/estrela-amarela.svg') }}"
              alt="estrela amarela">
            <img src="{{ asset('img/estrela-amarela.svg') }}"
              alt="estrela amarela">
            <img src="{{ asset('img/estrela-apagada.svg') }}"
              alt="estrela apagada">
          </div>
          <ul>
            <li>{{ $room->capacity }} lugares</li>
            <li>Mesa com tomadas</li>
            <li>Ar-condicionado</li>
            <li>Televisão para apresentações</li>
          </ul>
        </div>
        <div
          class="sala-acoes flex-grow-1 d-flex flex-column gap-2 align-items-end">
          <p>
            <strong class="fs-1">
              R$ {{ number_format($room->price, 2, ',', '.') }}
            </strong>
            /dia
          </p>
          <p class="fs-5">Disponível de 8 da manhã até 18 da tarde</p>
          <a href="{{ route('rent.create', ['room_id' => $room->id]) }}"
            class="btn-var-primary fs-5 py-2 text-decoration-none text-center"
            style="width: 250px">
            Reservar
          </a>
        </div>
      </div>
    </div>
  </div>
  @include('components.footer')
@endsection

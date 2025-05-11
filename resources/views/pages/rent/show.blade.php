@extends('layout.app')
@section('title', 'Detalhe da reserva')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/detalhes-reserva.css') }}">
@endsection
@section('content')
  @include('components.header')
  <section class="detalhes-section d-flex p-2 justify-content-between">
    <section
      class="section-left h-100 d-flex flex-column p-4 justify-content-center align-items-center gap-4">
      <figure class="w-100">
        <img src="{{ asset('img/exemplo-sala.png') }}" alt="" class="w-100">
      </figure>
      <div class="area-titulos">
        <h2>
          {{ $rent->room->name }}
        </h2>
        <h3>
          R$ {{ number_format($rent->room->price, 2, ',', '.') }}
        </h3>
      </div>
      <ul class="lista">
        <li class="lista-item">{{ $rent->room->capacity }} lugares</li>
        <li class="lista-item">Mesa com tomadas</li>
        <li class="lista-item">Ar-condicionado</li>
        <li class="lista-item">Televisão para apresentação</li>
      </ul>
    </section>
    <section class="section-right h-100 p-5">
      <form action="" class="w-100 p-4 d-flex flex-wrap gap-4">
        <div class="espaco-40-por d-flex flex-column gap-2">
          <label for="" class="label">Inicio</label>
          <input class="input" type="text"
            value="{{ $rent->rentStart->format('d/m/Y') }}" readonly>
        </div>
        <div class="espaco-40-por d-flex flex-column gap-2">
          <label for="" class="label">Término</label>
          <input class="input" type="text"
            value="{{ $rent->rentEnd->format('d/m/Y') }}" readonly>
        </div>
        <div class="w-100 d-flex flex-column gap-2">
          <label for="" class="label">Locatário</label>
          <input class="input" type="text" value="{{ $rent->client->name }}"
            disabled>
        </div>

        <div class="w-100 d-flex flex-column gap-2">
          <h4 class="label">Acompanhantes</h4>
          <ul>
            <li class="acompanhantes-name">Eduardo</li>
            <li class="acompanhantes-name">Lucas</li>
          </ul>
        </div>

        <div class="w-100 d-flex flex-column gap-2">
          <label for="" class="label">Data de Pagamento</label>
          <input class="input" type="text"
            value="{{ isset($rent->payment) ? $rent->payment->created_at->format('d/m/Y') : 'PENDENTE' }}"
            readonly>
        </div>

        <div class="w-100 d-flex justify-content-between">
          <a href="{{ route('rent.index') }}" class="btn btn-outline-primary">
            Voltar
          </a>

        </div>
      </form>
    </section>
  </section>
@endsection

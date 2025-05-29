@extends('layout.app')
@section('title', 'Reservar sala')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/detalhes-reserva.css') }}">
@endsection
@section('content')
  @include('components.header')
  <div class="container-fluid d-flex flex-column justify-content-center"
    style="width: clamp(300px, 100%, 1200px)">
      <div class="area-titulos" >
        <h1>Reservar</h1>
      </div>
      <section class="detalhes-section d-flex p-2 justify-content-between">
        <section
          class="section-left h-100 d-flex flex-column p-4 justify-content-center align-items-center gap-4">
          <figure class="w-100">
            <img src="{{ asset('img/exemplo-sala.png') }}" alt="" class="w-100">
          </figure>

          <ul class="lista">
            <li class="lista-item">{{ $room->description }}</li>
          </ul>
        </section>
        <section class="section-right h-100 p-5">
            <form action="" class="w-100 p-4 d-flex flex-column flex-wrap gap-4" method="POST">
            @csrf
            <div class="d-flex gap-2">
              <div class="w-50 d-flex flex-column gap-2 ">
                <label for="rentStart" class="label">Início do Aluguel</label>
                <input type="text" id="rentStart" value="{{ $rentStart }}"
                  readonly disabled class="w-75 input">
              </div>
              <div class="w-50 d-flex flex-column gap-2">
                <label for="rentEnd" class="label">Final do Aluguel</label>
                    <input type="date" id="rentEnd" name="rentEnd" required class="w-75 input">
              </div>
            </div>
            <div class="max-height">
              <div class="area-titulos">
                <h3 class="left">Convidados</h3>
              </div>

              @for ($i = 0; $i < $room->capacity; $i++)
                <div class="d-flex flex-column gap-2">
                      <label for="guest_name_{{ $i }}" class="label">Nome do convidado
                    {{ $i + 1 }}</label>
                  <input type="text" id="guest_name_{{ $i }}"
                    name="guests[{{ $i }}][name]" class="input">
                </div>
                <div class="d-flex flex-column gap-2 mb-4">
                      <label for="guest_email_{{ $i }}" class="label">Email</label>
                  <input type="email" id="guest_email_{{ $i }}"
                    name="guests[{{ $i }}][email]" class="input">
                </div>
              @endfor
            </div>
            <div class="mb-5">
              <button type="submit" class="button">Enviar</button>
            </div>
          </form>
        </section>
      </section>
  </div>
  <div class="mt-5 pt-5 mb-5">
    @include('components.footer')
  </div>
@endsection

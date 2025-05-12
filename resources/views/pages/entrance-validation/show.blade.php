@extends('layout.app')
@section('content')
  @include('components.header')
  <div class="container py-5 d-flex justify-content-center " style="height: 600px;">

    <div class="rounded overflow-hidden shadow-sm" style="width: 60vw;">
      <img src="{{ asset('img/exemplo-sala.png') }}" alt="Sala de reunião"
        class="img-fluid" style="border-radius: 20px;">
    </div>

    <form class="formulario-sala p-4 shadow-sm rounded-5" method="POST"
      style="width: 30vw; border: 1px solid #ccc;"
      action="{{ route('entrance-validation.validate', $rent->id) }}">
      @csrf
      <h4 class="mb-4 text-center ">{{ $room->name }}</h4>

      <div class="d-flex justify-content-around">
        <div class="mb-3">
          <label class="form-label fw-bold "
            style="color: #1D227C;">Início</label>
          <input type="text" class="form-control"
            value="{{ $rent->rentStart->format('d/m/Y') }}" readonly>
        </div>

        <div class="mb-3">
          <label class="form-label fw-bold "
            style="color: #1D227C;">Término</label>
          <input type="text" class="form-control"
            value="{{ $rent->rentEnd->format('d/m/Y') }}" readonly>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold "
          style="color: #1D227C;">Locatário</label>
        <input type="text" class="form-control" value="{{ $client->name }}"
          readonly>
      </div>

      <div class="mb-3">
        <label class="form-label fw-bold " style="color: #1D227C;">Email</label>
        <input type="email" class="form-control" placeholder="exemplo@gmail.com"
          name="email">
      </div>

      <div class="mb-4">
        <label class="form-label fw-bold" style="color: #1D227C;">
          Código de validação
        </label>
        <input type="text" class="form-control"
          placeholder="Código de validação" name="entrance_code">
      </div>

      <button class="btn btn-azul-escuro w-100" type="submit">Validar</button>
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      @if (session('failure'))
        <div class="alert alert-error">
          {{ session('failure') }}
        </div>
      @endif
    </form>

  </div>

  <style>
    .btn-azul-escuro {
      background-color: #1D227C;
      color: white;
      border: none;
    }
  </style>

  @include('components.footer')
@endsection

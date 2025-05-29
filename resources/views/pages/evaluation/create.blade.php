@extends('layout.app')
@section('title', 'Avaliação de Sala')
@section('content')
  @include('components.header')
  <div
    class="container-fluid bg-var-primary d-flex justify-content-between align-items-center"
    style="width: clamp(300px, 100%, 1200px)">
    <div class="w-50">
      <img class="w-100" src="{{ asset('img/avaliacao.png') }}"
        alt="Avaliação" />
    </div>
    <div class="form-side w-50 d-flex justify-content-start">
      <div class="form p-5">
        <h2 class="title-var">Avaliação de Sala</h2>
        <form action="{{ route('evaluation.store', $rent->id) }}" method="POST"
          class="w-100 d-flex flex-column gap-3">
          @csrf
          <label class="label-var" for="nota">Nota:</label>
          <div class="radio-group d-flex flex-row gap-3">
            <label><input type="radio" name="stars" value="1"> 1</label>
            <label><input type="radio" name="stars" value="2"> 2</label>
            <label><input type="radio" name="stars" value="3"> 3</label>
            <label><input type="radio" name="stars" value="4"> 4</label>
            <label><input type="radio" name="stars" value="5"> 5</label>
          </div>

          <label class="label-var" for="comentario">Comentário:</label>
          <br>
          <textarea id="comentario" name="comment"
            placeholder="Digite o que você achou da sala">{{ old('comentario') }}</textarea>
          <br>
          <button class="btn-var-primary" type="submit">Enviar avaliação</button>
        </form>
      </div>
    </div>
  </div>
  @include('components.footer')
@endsection

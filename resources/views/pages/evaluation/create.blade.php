@extends('layout.app')
@section('title', 'Avaliação de sala')
@section('content')
  @include('components.header')
  <form action="{{ route('evaluation.store') }}" method="POST">
    @csrf
    <div>
      <label for="stars">Avalie de 1 a 5</label>
      <div>
        @for ($i = 1; $i <= 5; $i++)
          <label>
            <input type="radio" name="stars" value="{{ $i }}">
            {{ $i }}
          </label>
        @endfor
      </div>
    </div>

    <label for="comment">Comentário (opcional)</label>
    <div>
      <textarea name="comment" id="comment" rows="4"
        placeholder="Comente o que você achou da sala..."></textarea>
    </div>

    <div>
      <button type="submit">Enviar avaliação</button>
    </div>
  </form>
  @include('components.footer')
@endsection

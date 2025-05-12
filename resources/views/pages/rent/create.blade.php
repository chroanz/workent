@extends('layout.app')
@section('title', 'Reservar sala')
@section('content')
  @include('components.header')
  <div>
    <h1>Reservar</h1>
    <form action="{{ route('rent.store', ['room_id' => $room->id]) }}"
      method="POST">
      @csrf
      <div>
        <label for="rentStart">Rent Start</label>
        <input type="date" id="rentStart" name="rentStart" required>
      </div>
      <div>
        <label for="rentEnd">Rent End</label>
        <input type="date" id="rentEnd" name="rentEnd" required>
      </div>
      <div>
        <h3>Convidados</h3>
        @for ($i = 0; $i < $room->capacity; $i++)
          <div>
            <label for="guest_name_{{ $i }}">Nome do convidado
              {{ $i + 1 }}</label>
            <input type="text" id="guest_name_{{ $i }}"
              name="guests[{{ $i }}][name]">
          </div>
          <div>
            <label for="guest_email_{{ $i }}">Email</label>
            <input type="email" id="guest_email_{{ $i }}"
              name="guests[{{ $i }}][email]">
          </div>
        @endfor
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>
  @include('components.footer')
@endsection

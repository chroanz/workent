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
      <button type="submit">Submit</button>
    </form>
  </div>
  @include('components.footer')
@endsection

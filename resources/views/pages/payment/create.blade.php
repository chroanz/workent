@extends('layout.app')
@section('content')
  @include('components.header')

  <div class="w-100 d-flex justify-content-center py-5">
    <div
      class="d-flex flex-wrap gap-5 p-5 justify-content-center align-items-start"
      style="max-width: 1200px">
      <div class="payment-img">
        <img src="{{ asset('img/povo-feliz-trampando.png') }}"
          alt="Imagem de pessoas felizes trabalhando">
      </div>
      <form method="POST"
        action="{{ route('payment.store', ['rent_id' => $rent->id]) }}"
        class="d-flex flex-column gap-2">
        @csrf
        <p class="fs-1">Formas de pagamento</p>
        <p class="fs-5">Escolha o tipo de pagamento</p>
        <div class="d-flex flex-column gap-5">
          <div class="d-flex flex-wrap gap-2">
            <label class="btn-var-primary flex-grow-1" style="cursor: pointer;">
              <input type="radio" name="payment_method" value="credit_card"
                class="d-none" onchange="updateSelection(this)"> Cartão de crédito
            </label>
            <label class="btn-var-primary flex-grow-1" style="cursor: pointer;">
              <input type="radio" name="payment_method" value="pix"
                class="d-none" onchange="updateSelection(this)"> Pix
            </label>
            <label class="btn-var-primary flex-grow-1" style="cursor: pointer;">
              <input type="radio" name="payment_method" value="debit_card"
                class="d-none" onchange="updateSelection(this)"> Cartão de débito
            </label>
          </div>
          <div class="d-flex gap-2 justify-content-between align-items-center">
            <div>
              <p class="fs-1">R$ {{ number_format($room->price, 2, ',', '.') }}
              </p>
              <input type="number" name="price" value="{{ $room->price }}"
                class="d-none">
            </div>
            <div>
              {{-- <input type="date" name="data" id="data" value="{{ date('Y-m-d') }}" class="form-control"> --}}
            </div>
          </div>
          <button type="submit" class="btn-var-primary">Confirmar e
            pagar</button>
        </div>
      </form>
    </div>
  </div>


  <style>
    .btn-var-primary.selected {
      background-color: #007bff;
      color: white;
      border-color: #0056b3;
    }
  </style>

  <script>
    function updateSelection(input) {
      document.querySelectorAll('.btn-var-primary').forEach(label => {
        label.classList.remove('selected');
      });
      if (input.checked) {
        input.parentElement.classList.add('selected');
      }
    }
  </script>


  @include('components.footer')
@endsection

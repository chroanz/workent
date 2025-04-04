@extends('layout.app')
@section('content')
@include('components.header')
<div class="w-100 d-flex justify-content-center py-5">
    <div class="d-flex flex-wrap gap-5 p-5 justify-content-center align-items-start" style="max-width: 1200px">
        <div class="payment-img">
            <img src="/img/povo-feliz-trampando.png" alt="Imagem de pessoas felizes trabalhando">
        </div>
        <div class="d-flex flex-column gap-2">
            <p class="fs-1">Formas de pagamento</p>
            <p class="fs-5">Escolha o tipo de pagamento</p>
            <div class="d-flex flex-column gap-5">
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn-var-primary flex-grow-1">Cartão de crédito</button>
                    <button class="btn-var-primary flex-grow-1">Pix</button>
                    <button class="btn-var-primary flex-grow-1">Boleto</button>
                </div>
                    <div class="d-flex gap-2 justify-content-between align-items-center">
                        <div>
                            <p class="fs-1">R$ 89,90</p>
                        </div>
                        <div>
                            <input value="<?= date('Y-m-d') ?>" type="date" name="data" id="data" class="form-control">
                        </div>
                    </div>
                <button type="submit" class="btn-var-primary">Confirmar e pagar</button>
            </div>
        </div>
    </div>
</div>
@include('components.footer')
@endsection
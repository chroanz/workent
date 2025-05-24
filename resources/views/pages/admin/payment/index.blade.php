@extends("layout.app")
@section("title", "Pagamentos por Data")
@section("css")
<link rel="stylesheet" href="{{ asset('css/reservas-style.css') }}">
@endsection
@section("content")
@include("components.header")

<div class="listagem-container">
    <h2 class="title">Pagamentos</h2>
    <table>
        <thead>
            <tr>
                <th class="thead">ID</th>
                <th class="thead">Valor</th>
                <th class="thead">Método de pagamento</th>
                <th class="thead">Aluguel ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr class="trdata">
                <td class="tdata td-first">
                    {{ str_pad($payment->id + 1, 2, '0', STR_PAD_LEFT) }}
                </td>
                <td class="tdata">R$ {{ $payment->price }}</td>
                <td class="tdata">{{ $payment->getReadablePaymentMethod() }}</td>
                <td class="tdata">{{ $payment->rent_id }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include("components.footer")
@endsection
@section("js")
@endsection

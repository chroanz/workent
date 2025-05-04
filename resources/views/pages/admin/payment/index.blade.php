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
                    <th class="thead">Titular da fatura</th>
                    <th class="thead">Valor</th>
                    <th class="thead">Data</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 6; $i++)
                    <tr class="trdata">
                        <td class="tdata td-first">01</td>
                        <td class="tdata">Cícero Tadeu</td>
                        <td class="tdata">R$ 89,90</td>
                        <td class="tdata">01/04/2025</td>
                    </tr>
                @endfor
            </tbody>
        </table>
        <nav aria-label="...">
            <ul class="pagination pagination-lg">
              <li class="page-item active" aria-current="page">
                <span class="page-link">1</span>
              </li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
            </ul>
          </nav>
    </div>
    @include("components.footer")
@endsection
@section("js")
@endsection
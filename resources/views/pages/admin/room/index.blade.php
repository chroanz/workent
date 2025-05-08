@extends("layout.app")
@section("title", "Salas")
@section("css")
<link rel="stylesheet" href="{{ asset('css/reservas-style.css') }}">
@endsection
@section("content")
    @include("components.header")
    <div class="listagem-container">
        <h2 class="title">Salas</h2>
        <table>
            <thead>
                <tr>
                    <th class="thead">Nome Sala</th>
                    <th class="thead">Locador</th>
                    <th class="thead">Estado</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < 6; $i++)
                    <tr class="trdata">
                        <td class="tdata td-first">Sala de Reunião</td>
                        <td class="tdata">Cleiton</td>
                        <td class="tdata">Alugada</td>
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
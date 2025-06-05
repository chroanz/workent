@extends('layout.app')
@section('content')
  @include('components.header')

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div
            class="card-header d-flex justify-content-between align-items-center">
            <h3>Lista de salas alugadas</h3>
          </div>

          <div class="card-body">
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome do Quarto</th>
                    <th>Data de Início</th>
                    <th>Data de Término</th>
                    <th>Pagamento</th>
                    <th>Avaliação</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($rents as $rent)
                    <tr>
                      <td>{{ $rent->id }}</td>
                      <td>{{ $rent->room->name }}</td>
                      <td>{{ $rent->rentStart->format('d/m/Y') }}</td>
                      <td>{{ $rent->rentEnd->format('d/m/Y') }}</td>
                      <td>
                        @if ($rent->payment)
                          {{ 'R$ ' . $rent->payment->price }}
                        @else
                          <a href="{{ route('payment.create', $rent->id) }}"
                            class="btn btn-sm btn-primary me-2">
                            Pagar
                          </a>
                        @endif
                      </td>
                      <td>
                        @if ($rent->payment && !$rent->evaluation)
                          <a href="{{ route('evaluation.create', $rent->id) }}"
                            class="btn btn-sm btn-primary me-2">
                            Avaliar
                          </a>
                        @else
                          {{ $rent->evaluation ? $rent->evaluation->stars . ' estrelas' : '' }}
                        @endif
                      </td>
                      <td class="d-flex">
                        <a href="{{ route('rent.show', $rent->id) }}"
                          class="btn btn-sm btn-primary me-2">
                          Ver detalhes
                        </a>
                        <a href="{{ route('entrance-validation.show', $rent->id) }}"
                          class="btn btn-sm btn-primary me-2">
                          Validar entrada
                        </a>
                        @if (!$rent->payment)
                        <form action="{{ route('rent.destroy', $rent->id) }}"
                          method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit"
                            class="btn btn-sm btn-danger">Cancelar</button>
                        </form>
                        @endif
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center">
                        Nenhuma sala alugada até o momento.
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('components.footer')
@endsection

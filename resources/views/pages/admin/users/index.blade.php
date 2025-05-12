@extends('layout.app')
@section('content')
  @include('components.header')

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div
            class="card-header d-flex justify-content-between align-items-center">
            <h3>Lista de usuários</h3>
            <a href="{{ route('user.admin.create') }}" class="btn btn-primary">
              Adicionar usuário
            </a>
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
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->type }}</td>
                      <td class="d-flex">
                        <a href="{{ route('user.admin.edit', $user->id) }}"
                          class="btn btn-sm btn-primary me-2">Editar</a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="4" class="text-center">
                        Nenhum usuário encontrado
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

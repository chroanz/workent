@extends('layout.app')
@section('content')
  @include('components.header')

  <div class="container p-5">

    <div class="row justify-content-center">

      <div class="col-md-8">
        <div class="card mt-4">
          <div class="card-header">
            <h2>Editar usuário</h2>
          </div>
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ route('user.update', $user->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email"
                  name="email" value="{{ old('email', $user->email) }}"
                  required>
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Cargo</label>
                <select class="form-select" id="type" name="type"
                  required>
                  <option value="admin"
                    {{ $user->type === 'admin' ? 'selected' : '' }}>
                    Administrador
                  </option>
                  <option value="user"
                    {{ $user->type === 'user' ? 'selected' : '' }}>
                    Usuário comum
                  </option>
                </select>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">
                  Nova Senha (opcional)
                </label>
                <input type="password" class="form-control" id="password"
                  name="password">
              </div>

              <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                  Confirme a senha (opcional)
                </label>
                <input type="password" class="form-control"
                  id="password_confirmation" name="password_confirmation">
              </div>

              <button type="submit" class="btn btn-primary">
                Salvar Alterações
              </button>
              <a href="{{ route('user.index') }}" class="btn btn-secondary">
                Cancelar
              </a>
            </form>
          </div>
        </div>
      </div>

    </div>

  </div>
  @include('components.footer')
@endsection

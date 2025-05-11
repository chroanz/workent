@extends('layout.app')
@section('content')
  @include('components.header')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card mt-4">
          <div class="card-header">
            <h3>Adicionar usuário</h3>
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

            <form action="{{ route('user.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email"
                  name="email" value="{{ old('email') }}" required>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password"
                  name="password" required>
              </div>

              <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                  Repita a senha
                </label>
                <input id="password_confirmation" name="password_confirmation"
                  type="password" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="type" class="form-label">Tipo de usuário</label>
                <select class="form-select" id="type" name="type"
                  required>
                  <option value="" disabled selected>
                    Selecione o tipo de usuário
                  </option>
                  <option value="admin">Administrador</option>
                  <option value="user">Usuário comum</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Salvar</button>
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

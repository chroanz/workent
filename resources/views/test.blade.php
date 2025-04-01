<div>
  <form method="POST" action="{{ route('auth.store') }}"
    enctype="multipart/form-data">
    @csrf
    <div>
      <label for="email">E-mail</label>
      <input type="text" name="email" value="{{ old('email') }}"
        placeholder="Digite seu e-mail" />
      @error('email')
        <p>{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="password">Senha</label>
      <input type="password" name="password" value="{{ old('password') }}"
        placeholder="Mínimo 6 carateres" />
      @error('password')
        <p>{{ $message }}</p>
      @enderror
    </div>
    <div>
      <label for="password_confirmation">Senha</label>
      <input type="password" name="password_confirmation"
        value="{{ old('password_confirmation') }}"
        placeholder="Repita a senha" />
      @error('password_confirmation')
        <p>{{ $message }}</p>
      @enderror
    </div>
    <button type="submit">
      <b>
        Cadastrar
      </b>
    </button>

  </form>
</div>

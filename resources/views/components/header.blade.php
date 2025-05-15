<header class="d-flex justify-content-center align-items-center">
  <nav class="d-flex justify-content-between align-items-center"
    style="width: clamp(300px, 100%, 1200px)">
    <a href="{{ route('home') }}" class="logo">
      <img src="{{ asset('img/logo-horizontal.png') }}" alt=""
        class="logo">
    </a>
    <div class="barra-busca shadow-sm">
      @auth
        @if (auth()->user()->isAdmin())
          <div>
            <a href="{{ route('admin.rent.index') }}"
              class="text-decoration-none text-dark">
              Painel de admin
            </a>
          </div>
        @else
          <div>
            <a href="{{ route('rent.index') }}"
              class="text-decoration-none text-dark">
              Alugueis
            </a>
          </div>
        @endif
        <div>
          <a href="{{ route('profile.edit') }}"
            class="text-decoration-none text-dark">
            Perfil
          </a>
        </div>
        <div>
          <form action="{{ route('auth.logout') }}" method="POST"
            class="d-flex justify-content-center align-items-center w-100">
            @csrf
            <button type="submit"
              class="btn btn-link text-decoration-none text-dark p-0 m-0 text-center"
              style="background: none; border: none;">
              Logout
            </button>
          </form>
        </div>
      @else
        <div>
          <a href="{{ route('auth.login') }}"
            class="text-decoration-none text-dark">
            Login
          </a>
        </div>
        <div>
          <a href="{{ route('auth.store') }}"
            class="text-decoration-none text-dark">
            Registro
          </a>
        </div>
      @endauth
    </div>
  </nav>
</header>

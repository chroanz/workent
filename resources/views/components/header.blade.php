<header class="d-flex justify-content-center align-items-center">
  <nav class="d-flex justify-content-between align-items-center"
    style="width: clamp(300px, 100%, 1200px)">
    <img src="{{ asset('img/logo-horizontal.png') }}" alt=""
      class="logo">
    <div class="barra-busca shadow-sm">
      <div>
        <a href="#" class="text-decoration-none text-dark">Salas</a>
      </div>
      <div>
        <a href="#" class="text-decoration-none text-dark">Auditórios</a>
      </div>
      <div>
        <input type="search" name="busca" id="busca" class="border-0"
          placeholder="Pesquisar">
        <button class="bg-white border-0 rounded-pill">
          <img class="bg-white border-0 rounded-pill"
            src="{{ asset('img/lupa-header.svg') }}"
            alt="icone de lupa com fundo azul">
        </button>
      </div>
    </div>
    <div class="acesso-usuario">
      <a href="/auth/login">
        <img src="{{ asset('img/user-icon.png') }}" alt="User Icon"
          class="me-2">
      </a>
    </div>
  </nav>
</header>

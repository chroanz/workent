@extends("layout.app")
@section("content")
<div class="bg-primary-color h-100 w-100 d-flex">
<div class="w-50 d-flex align-items-center justify-content-center">
    <form action="" class="bg-secondary-color w-50 h-50">
        <h2>Entrar na conta</h2>
        <div>
            <label for="">Email</label>
            <input type="email">
        </div>

        <div>
            <label for="">Senha</label>
            <input type="password">
        </div>
        <div>
            <a href="">Esqueci a senha</a>
        </div>
        <button>Entrar</button>
        <button>Criar uma conta</button>
    </form>
</div>
<div class="w-50">
    <img src="{{asset('img/img-bg-login.png')}}" alt="" class="w-100 h-100">
</div>
</div>
@endsection
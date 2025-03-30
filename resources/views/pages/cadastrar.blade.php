@extends("layout.app")
@section("title", "Cadastrar")
@section("content")
<div class="bg-primary-color h-100 w-100 d-flex">
    <div class="d-flex align-items-center justify-content-center form-container">
        <form action="#" method="post" class="bg-secondary-color form-cadastro">
            <h2 class="title-var">Entrar na conta</h2>
            <div class="d-flex flex-column w-75">
                <label for="" class="label-var">Email</label>
                <input type="email" class="input-var email">
            </div>

            <div class="d-flex flex-column w-75">
                <label for="" class="label-var">Senha</label>
                <input type="password" class="input-var senha">
            </div>

            <div class="d-flex flex-column w-75">
                <label for="" class="label-var">Repita a senha</label>
                <input type="password" class="input-var rep_senha">
            </div>

            <div class="d-flex flex-column w-75 gap-3">
                <button class="btn-var-primary" type="submit">Criar conta</button>
                <a href="{{route('login')}}" class="link-var-primary">Entrar em uma conta existente</a>
            </div>
        </form>
    </div>
    <div class="image-container">
        <img src="{{asset('img/img-bg-login.png')}}" alt="Banner worknet">
    </div>
</div>
@endsection
@section("js")
<script src="{{asset('js/validacao_cadastro.js')}}"></script>
@endsection
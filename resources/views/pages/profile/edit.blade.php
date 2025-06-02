@extends('layout.app')
@section('title', 'Perfil')
@section('content')
  @include('components.header')


  <div class="container my-5">
  <div class="row justify-content-center align-items-center"> 

    <div class="col d-flex justify-content-center">
      <div class="placeholder w-50 p-4">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="text-center mb-4 d-flex justify-content-center">
            <div class="shadow-lg rounded text-white h-100 rounded p-3" style="width: 65%; background-color: #263AD1;">
              <div class="mb-3 text-center">
                <label for="profile_image" class="form-label" style="cursor: pointer;">
                  <img src="{{ asset('images/' . $client->url_img)  }}" style="width: 65%;" alt="Imagem de Perfil" />
                </label>
                <input type="file" name="profile_image" id="profile_image" accept="image/*" class="d-none">
              </div>
              <i class="bi bi-person-circle fs-1"></i>
              <h4 class="mt-2 mb-0">{{ $client->name }}</h4>
            </div>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label fw-bold">Nome completo</label>
            <input type="text" name="name" class="form-control border border-dark" style="border-radius: 15px;" value="{{ $client->name }}" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control border border-dark" style="border-radius: 15px;" value="{{ $client->email }}" required>
          </div>

          <div class="mb-3">
            <label for="birthday" class="form-label fw-bold">Data de nascimento</label>
            <input type="date" name="birthday" class="form-control border border-dark" style="border-radius: 15px;" value="{{ $client->birthday }}" required>
          </div>

          <div class="mb-4">
            <label for="address" class="form-label fw-bold">Endereço</label>
            <textarea name="address" id="address" style="border-radius: 15px;" class="form-control border border-dark" rows="2">{{ $client->address }}</textarea>
          </div>

          <div class="d-flex justify-content-between">
            <button type="button" class="btn fw-semibold" style="width: 30%; color: #263AD1; border-color: #263AD1;">Sair</button>
            <button type="submit" class="btn fw-bold" style="width: 30%; color: aliceblue; background-color: #263AD1;">Editar</button>
          </div>
        </form> 
      </div>
    </div>

    <div class="col-lg-6 text-center">
      <img src="{{ asset('img\Img Perfil.png') }}" alt="Foto do usuário" class="img-fluid rounded" style="max-height: 700px;">
    </div>
  </div>
</div>


  @include('components.footer')
@endsection
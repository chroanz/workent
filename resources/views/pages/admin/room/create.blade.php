@extends('layout.app')
@section('title', 'Admin - Criar de sala')
@section('content')
  @include('components.header')
  <head>

  <title>Adicionar Sala</title>
  
  <style>
    .form-container {
      max-width: 900px;
      margin-top: 50px auto;
    }

    .title {
      color: #1531df;
    }

    .image-box {
      border: 1px solid black;
      border-radius: 10px;
      width: 220px;
      height: 220px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .btn-blue {
      background-color: #1531df;
      color: #fff;
      border-radius: 10px
    }

    .btn-blue:hover {
      background-color: #0f25a5;
      border-radius: 10px
    }

    .form-label {
      color: #1531df;
      font-weight: 600;
    }

    .form-control{
      border: 1px solid black;
      border-radius: 10px
    }
  </style>
</head>
<body>
  <div class="container form-container ">
    <h2 class="text-center m5 title">Adicionar sala</h2>
    <form method="POST" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-7">
          <div class="mb-3">
            <label for="room_number" class="form-label">Número da sala</label>
            <input type="text" name="room_number" class="form-control" placeholder="1024" required>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="price" class="form-label">Valor da diária</label>
              <input type="text" name="price" class="form-control" placeholder="R$ 129,99" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="capacity" class="form-label">Número de vagas</label>
              <input type="number" name="capacity" class="form-control" placeholder="Digite o número" required>
              
            </div>
          </div>

          <div class="mb-4">
            <label for="location" class="form-label">Local</label>
            <input type="text" name="location" class="form-control" placeholder="Digite o número" required>
          </div>
        </div>

        <div class="col-md-5 d-flex justify-content-center align-items-center mb-4">
          <div class="image-box">
            <input type="file" name="image" accept="image/*" id="imageInput" class="d-none">
            <button type="button" class="btn btn-blue btn-sm" onclick="document.getElementById('imageInput').click()">Adicionar Imagem</button>
          </div>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" style="border-radius: 20px" class="btn btn-blue w-75 py-3 fs-5">Adicionar</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
  @include('components.footer')
@endsection

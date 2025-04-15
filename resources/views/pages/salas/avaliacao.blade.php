@extend('layouts.app')

@section('title', 'Avaliação de Sala')

@section('content')
<div class="container">
    <div class="image-side">
        <img src="{{ asset('images/avaliacao.png') }}" alt="Avaliação" />
    </div>
    <div class="form-side">
        <div class="form-container">
            <h2>Avaliação de Sala</h2>
            <form action="{{ route('evaluation.create') }}" method="POST">
                
                <label for="nota">Nota:</label>
                    <div class="radio-group">
                        <label><input type="radio" name="nota" value="1"> 1</label>
                        <label><input type="radio" name="nota" value="2"> 2</label>
                        <label><input type="radio" name="nota" value="3"> 3</label>
                        <label><input type="radio" name="nota" value="4"> 4</label>
                        <label><input type="radio" name="nota" value="5"> 5</label>
                    </div>

                <label for="comentario">Comentário:</label>
                <textarea id="comentario" name="comentario" placeholder="Digite o que você achou da sala">{{ old('comentario') }}</textarea>

                <button type="submit">Enviar avaliação</button>
            </form>
        </div>
    </div>
</div>
@endsection

<div class="container">
    <h1>Generar PDF proyecto</h1>

    <form action="{{ route('projectes.generarPDF') }}" method="POST">
        @csrf
        @method('POST')
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        <br>
        <div class="form-group">
            <label for="CodiProj">Código de proyecto</label>
            <input type="text" class="form-control" id="CodiProj" name="CodiProj" value="{{ old('CodiProj') }}" required>
        </div>

        <button type="submit" class="btn btn-danger">Generar</button>
        <br>
        <a href="{{ url('/menuProjectes') }}">Tornar al menu principal</a>
    </form>
</div>
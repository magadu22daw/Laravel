<div class="container">
    <h1>Eliminar proyecto</h1>

    <form action="{{ route('projectes.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
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

        <button type="submit" class="btn btn-danger">Eliminar</button>
        <br>
        <a href="{{ url('/menuProjectes') }}">Tornar al menu principal</a>
    </form>
</div>
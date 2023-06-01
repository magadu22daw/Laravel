<div class="container">
    <h1>Eliminar Participacio</h1>

    <form action="{{ route('participa.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        <br>
        <div class="form-group">
            <label for="Passaport">Passaport</label>
            <input type="text" class="form-control" id="Passaport" name="Passaport" value="{{ old('Passaport') }}" required>

            
            <label for="CodiProj">CodiProj</label>
            <input type="text" class="form-control" id="CodiProj" name="CodiProj" value="{{ old('CodiProj') }}" required>
        </div>

        <button type="submit" class="btn btn-danger">Eliminar</button>
        <br>
        <a href="{{ url('/menuParticipacions') }}">Tornar al menu principal</a>
    </form>
</div>
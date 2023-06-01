<div class="container">
    <h1>Modificar Participacion</h1>

    <form action="{{ route('participa.update') }}" method="POST">
        @csrf
        @method('PUT')
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif

        <div class="form-group">
            <label for="CodiProj">Código de proyecto</label>
            <input type="text" class="form-control" id="CodiProj" name="CodiProj" required>
            <label for="Passaport">Passaport</label>
            <input type="text" class="form-control" id="Passaport" name="Passaport" required>
        </div>

        <div class="form-group">
            <label for="atributo">Atributo a modificar</label>
            <select class="form-control" id="atributo" name="atributo" required>
                <option value="Retribucio">Retribucion</option>
                <option value="DataInici">Fecha de inicio</option>
                <option value="Retribucio">Fecha de finalización</option>
                <option value="ParticipacioProrrogable">Participacion Prorrogable</option>
                <option value="ParticipacioPublicacio">Participacion Publicacion</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nuevoValor">Nuevo valor</label>
            <input type="text" class="form-control" id="nuevoValor" name="nuevoValor" required>
        </div>

        <button type="submit" class="btn btn-primary">Modificar</button>
        <br>
        <a href="{{ url('/menuParticipacions') }}">Tornar al menu principal</a>
    </form>
</div>
<div class="container">
    <h1>Crear participación</h1>

    <form action="{{ route('participa.store') }}" method="POST">
        @csrf
        @method('POST')
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        <div class="form-group">
            <label for="Passaport">Passaport</label>
            <input type="text" class="form-control" id="Passaport" name="Passaport" required>
        </div>

        <div class="form-group">
            <label for="CodiProj">CodiProj</label>
            <input type="text" class="form-control" id="CodiProj" name="CodiProj" required>
        </div>

        <div class="form-group">
            <label for="DataInici">Data Inici</label>
            <input type="date" class="form-control" id="DataInici" name="DataInici" required>
        </div>

        <div class="form-group">
            <label for="DataFinal">Data Final</label>
            <input type="date" class="form-control" id="DataFinal" name="DataFinal" required>
        </div>

        <div class="form-group">
            <label for="Retribucio">Retribució</label>
            <input type="text" class="form-control" id="Retribucio" name="Retribucio" required>
        </div>

        <div class="form-group">
            <label for="ParticipacioProrrogable">Participació Prorrogable</label>
            <select class="form-control" id="ParticipacioProrrogable" name="ParticipacioProrrogable" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ParticipacioPublicacio">Participació Publicació</label>
            <select class="form-control" id="ParticipacioPublicacio" name="ParticipacioPublicacio" required>
                <option value="Sí">Sí</option>
                <option value="No">No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <br>
        <a href="{{ url('/menuParticipacions') }}">Tornar al menu principal</a>
    </form>
</div>
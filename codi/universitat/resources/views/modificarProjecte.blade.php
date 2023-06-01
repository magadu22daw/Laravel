<div class="container">
    <h1>Modificar proyecto</h1>

    <form action="{{ route('projectes.update') }}" method="POST">
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
        </div>

        <div class="form-group">
            <label for="atributo">Atributo a modificar</label>
            <select class="form-control" id="atributo" name="atributo" required>
                <option value="Nom">Nombre</option>
                <option value="DataInici">Fecha de inicio</option>
                <option value="DataFinalitzacio">Fecha de finalización</option>
                <option value="Classificacio">Clasificación</option>
                <option value="HoresAssignades">Horas asignadas</option>
                <option value="PressupostAssignat">Presupuesto asignado</option>
                <option value="MaxInvestigadors">Máximo número de investigadores asignables</option>
                <option value="Responsable">Responsable del proyecto</option>
                <option value="Investigacio">Investigación</option>
                <option value="IdiomaTreball">Idioma de trabajo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nuevoValor">Nuevo valor</label>
            <input type="text" class="form-control" id="nuevoValor" name="nuevoValor" required>
        </div>

        <button type="submit" class="btn btn-primary">Modificar</button>
        <br>
        <a href="{{ url('/menuProjectes') }}">Tornar al menu principal</a>
    </form>
</div>
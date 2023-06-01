<div class="container">
    <h1>Añadir proyecto</h1>
    <br>
    <form action="{{ route('projectes.store') }}" method="POST">
        @csrf
        @method('POST')
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        <div class="form-group">
            <label for="CodiProj">Código de proyecto</label>
            <input type="text" class="form-control" id="CodiProj" name="CodiProj" value="{{ old('CodiProj') }}" required>
        </div>

        <div class="form-group">
            <label for="Nom">Nombre del proyecto</label>
            <input type="text" class="form-control" id="Nom" name="Nom" value="{{ old('Nom') }}" required>
        </div>

        <div class="form-group">
            <label for="DataInici">Fecha de inicio</label>
            <input type="date" class="form-control" id="DataInici" name="DataInici" value="{{ old('DataInici') }}" required>
        </div>

        <div class="form-group">
            <label for="DataFinalitzacio">Fecha de finalización</label>
            <input type="date" class="form-control" id="DataFinalitzacio" name="DataFinalitzacio" value="{{ old('DataFinalitzacio') }}" >
        </div>

        <div class="form-group">
            <label for="Classificacio">Clasificación de investigación</label>
            <select class="form-control" id="Classificacio" name="Classificacio" required>
                <option value="Tènica">Tècnica</option>
                <option value="Salut">Salut</option>
                <option value="Científica">Científica</option>
                <option value="Altres">Altres</option>
            </select>
        </div>

        <div class="form-group">
            <label for="HoresAssignades">Horas asignadas</label>
            <input type="number" class="form-control" id="HoresAssignades" name="HoresAssignades" value="{{ old('HoresAssignades') }}" required>
        </div>

        <div class="form-group">
            <label for="PressupostAssignat">Presupuesto asignado</label>
            <input type="number" class="form-control" id="PressupostAssignat" name="PressupostAssignat" value="{{ old('PressupostAssignat') }}" required>
        </div>

        <div class="form-group">
            <label for="MaxInvestigadorsAssignables">Máximo número de investigadores asignables</label>
            <input type="number" class="form-control" id="MaxInvestigadorsAssignables" name="MaxInvestigadorsAssignables" value="{{ old('MaxInvestigadorsAssignables') }}" required>
        </div>

        <div class="form-group">
            <label for="Responsable">Nombre y apellidos del responsable del proyecto</label>
            <input type="text" class="form-control" id="Responsable" name="Responsable" value="{{ old('Responsable') }}" required>
        </div>

        <div class="form-group">
            <label for="Investigacio">Investigación</label>
            <select class="form-control" id="Investigacio" name="Investigacio" required>
                <option value="Nacional">Nacional</option>
                <option value="Europea">Europea</option>
                <option value="Internacional">Internacional</option>
            </select>
        </div>

        <div class="form-group">
            <label for="IdiomaTreball">Idioma de trabajo</label>
            <input type="text" class="form-control" id="IdiomaTreball" name="IdiomaTreball" value="{{ old('IdiomaTreball') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <br>
        <a href="{{ url('/menuProjectes') }}">Tornar al menu principal</a>
</div>
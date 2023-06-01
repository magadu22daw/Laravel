<div class="container">

        @csrf
        @method('DELETE')
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        <h1>Mostrar proyecto</h1>

        <form action="{{ route('projectes.show') }}" method="GET">
            <div class="form-group">
                <label for="CodiProj">Código de proyecto</label>
                <input type="text" class="form-control" id="CodiProj" name="CodiProj" required>
            </div>
            <button type="submit" class="btn btn-primary">Mostrar</button>
        </form>

        @if (isset($projecte))
            <h2>Detalles del proyecto</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Código de proyecto</th>
                        <th>Nombre</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de finalización</th>
                        <th>Clasificación</th>
                        <th>Horas asignadas</th>
                        <th>Presupuesto asignado</th>
                        <th>Máximo número de investigadores asignables</th>
                        <th>Responsable del proyecto</th>
                        <th>Investigación</th>
                        <th>Idioma de trabajo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $projecte->CodiProj }}</td>
                        <td>{{ $projecte->Nom }}</td>
                        <td>{{ $projecte->DataInici }}</td>
                        <td>{{ $projecte->DataFinalitzacio }}</td>
                        <td>{{ $projecte->Classificacio }}</td>
                        <td>{{ $projecte->HoresAssignades }}</td>
                        <td>{{ $projecte->PressupostAssignat }}</td>
                        <td>{{ $projecte->MaxInvestigadorsAssignables }}</td>
                        <td>{{ $projecte->Responsable }}</td>
                        <td>{{ $projecte->Investigacio }}</td>
                        <td>{{ $projecte->IdiomaTreball }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
        <a href="{{ url('/menuProjectes') }}">Tornar al menu principal</a>
    </div>
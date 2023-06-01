<div class="container">
    @csrf

    <h1>Mostrar investigador</h1>

    <form action="{{ route('investigadors.show') }}" method="GET">
        <div class="form-group">
            <label for="Passaport">Pasaporte</label>
            <input type="text" class="form-control" id="Passaport" name="Passaport" required>
        </div>

        <button type="submit" class="btn btn-primary">Mostrar</button>
    </form>

    @if (isset($investigador))
        <h2>Detalles del investigador</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Pasaporte</th>
                    <th>Código de aseguranza</th>
                    <th>Nombre y apellidos</th>
                    <th>Especialidad</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>País</th>
                    <th>Email</th>
                    <th>Titulación</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $investigador->Passaport }}</td>
                    <td>{{ $investigador->CodiAsseguranca }}</td>
                    <td>{{ $investigador->NomCognoms }}</td>
                    <td>{{ $investigador->Especialitat }}</td>
                    <td>{{ $investigador->Telefon }}</td>
                    <td>{{ $investigador->Adreca }}</td>
                    <td>{{ $investigador->Ciutat }}</td>
                    <td>{{ $investigador->Pais }}</td>
                    <td>{{ $investigador->Email }}</td>
                    <td>{{ $investigador->Titulacio }}</td>
                </tr>
            </tbody>
        </table>
        
    @endif
    <a href="{{ url('/menuInvestigadors') }}">Volver al menú principal</a>
</div>

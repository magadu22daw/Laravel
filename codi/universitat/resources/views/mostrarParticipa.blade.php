<div class="container">

        @csrf
        @method('DELETE')
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        <h1>Mostrar proyecto</h1>

        <form action="{{ route('participa.show') }}" method="GET">
            <div class="form-group">
                <label for="CodiProj">CodiProj</label>
                <input type="text" class="form-control" id="CodiProj" name="CodiProj" required>
            </div>
            <div class="form-group">
                <label for="Passaport">Passaport</label>
                <input type="text" class="form-control" id="Passaport" name="Passaport" required>
            </div>
            <button type="submit" class="btn btn-primary">Mostrar</button>
        </form>

        @if (isset($participa))
            <h2>Detalles del participa</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Passaport</th>
                        <th>CodiProj</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de finalización</th>
                        <th>Retribucio</th>
                        <th>Participacio Prorrogable</th>                        
                        <th>ParticipacioPublicacio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $participa->Passaport }}</td>
                        <td>{{ $participa->CodiProj }}</td>
                        <td>{{ $participa->DataInici }}</td>
                        <td>{{ $participa->DataFinal }}</td>
                        <td>{{ $participa->Retribucio }}</td>
                        <td>{{ $participa->ParticipacioProrrogable }}</td>
                        <td>{{ $participa->ParticipacioPublicacio }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
        <a href="{{ url('/menuParticipacions') }}">Tornar al menu principal</a>
    </div>
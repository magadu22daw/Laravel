<div class="container">
    <h1>Modificar investigador</h1>

    <form action="{{ route('investigadors.update') }}" method="POST">
        @csrf
        @method('PUT')
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
            <label for="atributo">Atributo a modificar</label>
                <select class="form-control" id="atributo" name="atributo" required>
                    <option value="Passaport">Passaport</option>
                    <option value="CodiAsseguranca">CodiAsseguranca</option>
                    <option value="NomCognoms">NomCognoms</option>
                    <option value="Especialitat">Especialitat</option>
                    <option value="Telefon">Telefon</option>
                    <option value="Adreca">Adreca</option>
                    <option value="Ciutat">Ciutat</option>
                    <option value="Pais">Pais</option>
                    <option value="Email">Email</option>
                    <option value="Titulacio">Titulacio</option>
                </select>
        </div>

        <div class="form-group">
            <label for="nuevoValor">Nuevo valor</label>
            <input type="text" class="form-control" id="nuevoValor" name="nuevoValor" required>
        </div>

        <button type="submit" class="btn btn-primary">Modificar</button>
        <br>
        <a href="{{ url('/menuInvestigadors') }}">Tornar al menu principal</a>
    </form>
</div>
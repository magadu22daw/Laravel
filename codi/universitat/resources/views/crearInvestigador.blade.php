<div class="container">
    <h1>Crear investigador</h1>

    <form action="{{ route('investigadors.store') }}" method="POST">
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
            <label for="CodiAsseguranca">Codi Assegurança</label>
            <input type="text" class="form-control" id="CodiAsseguranca" name="CodiAsseguranca" required>
        </div>

        <div class="form-group">
            <label for="NomCognoms">Nom i cognoms</label>
            <input type="text" class="form-control" id="NomCognoms" name="NomCognoms" required>
        </div>

        <div class="form-group">
            <label for="Especialitat">Especialitat</label>
            <input type="text" class="form-control" id="Especialitat" name="Especialitat" required>
        </div>

        <div class="form-group">
            <label for="Telefon">Telèfon</label>
            <input type="text" class="form-control" id="Telefon" name="Telefon" required>
        </div>

        <div class="form-group">
            <label for="Adreca">Adreça</label>
            <input type="text" class="form-control" id="Adreca" name="Adreca" required>
        </div>

        <div class="form-group">
            <label for="Ciutat">Ciutat</label>
            <input type="text" class="form-control" id="Ciutat" name="Ciutat" required>
        </div>

        <div class="form-group">
            <label for="Pais">País</label>
            <input type="text" class="form-control" id="Pais" name="Pais" required>
        </div>

        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" required>
        </div>

        <div class="form-group">
            <label for="Titulacio">Titulació</label>
            <select class="form-control" id="Titulacio" name="Titulacio" required>
                <option value="Doctor">Doctor</option>
                <option value="Master">Master</option>
                <option value="Grau">Grau</option>
                <option value="Estudiant">Estudiant</option>
                <option value="Altres">Altres</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <br>
        <a href="{{ url('/menuInvestigadors') }}">Tornar al menu principal</a>
    </form>
</div>

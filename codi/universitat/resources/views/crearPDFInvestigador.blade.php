<div class="container">
    <h1>Generar PDF investigador</h1>
    <form action="{{ route('investigadors.generarPDF') }}" method="POST">

        @csrf
        @method('POST')
        <div class="form-group">
            <label for="Passaport">Pasaporte</label>
            <input type="text" class="form-control" id="Passaport" name="Passaport" required>
        </div>

        <button type="submit" class="btn btn-primary">Generar</button>
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
    </form>
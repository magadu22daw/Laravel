<div class="container">
    <h1>Eliminar Investigador</h1>

    <form action="{{ route('investigadors.destroyAll') }}" method="POST">
        @csrf
        @method('DELETE')
        @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <br>
        <a href="{{ url('/menuInvestigadors') }}">Tornar al menu principal</a>
    </form>
</div>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Empresa</title> 
</head>


<body>
<h2>Menu de participacions</h2>
@if (Route::has('login'))
@auth
<form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>
    <br>
<a href="{{ url('/crearParticipa') }}">Afegir participacio</a>
<a href="{{ url('/eliminarParticipa') }}">Esborrar participacio</a>
<a href="{{ url('/modificarParticipa') }}">Modificar participacio</a>
<a href="{{ url('/mostrarParticipa') }}">Visualitzar participacio</a>
<a href="{{ url('/crearPDFParticipa') }}">Generar PDF de participacio</a>

<br><br>
<a href="{{ url('/menuPrincipal') }}">Tornar al menu principal</a>
@else
<a href="{{ route('login') }}">Log in</a><br>
@if (Route::has('register'))
<a href="{{ route('register') }}">Register</a><br>
@endif
@endauth 
@endif 
</body>
</html>   
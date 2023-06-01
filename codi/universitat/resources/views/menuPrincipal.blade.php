<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Empresa</title>
</head>

<body>
    <h2>Menú de la aplicación web de proyectos de investigación</h2>
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
    <a href="{{ url('/menuProjectes') }}">Gestionar proyectos</a>
    <a href="{{ url('/menuInvestigadors') }}">Gestionar investigadores</a>
    <a href="{{ url('/menuParticipacions') }}">Gestionar participaciones</a>
    @else
    <a href="{{ route('login') }}">Iniciar sesión</a><br>
    @if (Route::has('register'))
    @endif
    @endauth
    @endif
</body>

</html>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <!-- Fecha de entrada -->
            <div class="mt-4">
                <x-label for="fecha_entrada" :value="__('Fecha de entrada')" />

                <x-input id="fecha_entrada" class="block mt-1 w-full"
                                type="date"
                                name="fecha_entrada" required />
            </div>

            <!-- Fecha de salida -->
            <div class="mt-4">
                <x-label for="fecha_salida" :value="__('Fecha de salida')" />

                <x-input id="fecha_salida" class="block mt-1 w-full"
                                type="date"
                                name="fecha_salida" required />
            </div>

            <!-- Tipo de usuario -->
            <div class="mt-4">
                <x-label for="tipo_usuario" :value="__('Tipo de usuario')" />

                <select id="tipo_usuario" name="tipo_usuario" class="block mt-1 w-full">
                    <option value="gestor">Gestor</option>
                    <option value="director">Director</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
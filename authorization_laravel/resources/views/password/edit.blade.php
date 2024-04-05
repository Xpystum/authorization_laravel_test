@extends('templates.main')


@section('main.content')



<x-layouts.auth>

    <x-slot:title>
        {{ __('Изменение пароля')  }}
    </x-slot:title>

    <x-card>

        <x-card.body>

            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                {{ __('Восстановить пароль') }}
            </h1>

            <x-form action="{{ route('password.update', $password->uuid) }}" method="POST" class="form space-y-4 md:space-y-6">

                <x-form.item>
                    <x-form.label>
                        {{ __("Новый пароль") }}
                    </x-form.label>
                    <x-form.input type="password" name="password" placeholder="******" autofocus/>
                </x-form.item>

                <x-button type="submit">
                    {{ __('Измнить пароль') }}
                </x-button>

            </x-form>

            <p class="text-center text-sm font-light text-gray-500 dark:text-gray-400">
                <x-link to="{{ route('login') }}">
                    {{ __('Войти в аккаунт') }}
                </x-link>
            </p>

        </x-card.body>



    </x-card>



</x-layouts.auth>

@endsection




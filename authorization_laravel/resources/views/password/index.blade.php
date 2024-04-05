@extends('templates.main')


@section('main.content')



<x-layouts.auth>

    <x-slot:title>
        {{ __('Восстановление пароля')  }}
    </x-slot:title>

    @auth
        <div class="py-4 text-center">

            {{ Auth::user()?->email }}

        </div>
    @endauth

    <x-card>

        <x-card.body>

            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                {{ __('Восстановить пароль') }}
            </h1>

            <x-form action="{{ route('password.store') }}" method="POST" class="form space-y-4 md:space-y-6">

                <x-form.item>
                    <x-form.label>
                        {{ __("Ваш email") }}
                    </x-form.label>
                    <x-form.input type="email" name="email" placeholder="email@example.com" autofocus/>
                </x-form.item>

                <x-button type="submit">
                    {{ __('Продолжить') }}
                </x-button>

                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    <x-link to="{{ route('login') }}">
                        {{ __('Войти в аккаунт') }}
                    </x-link>
                </p>

            </x-form>

        </x-card.body>

    </x-card>

</x-layouts.auth>

@endsection




@extends('templates.main')


@section('main.content')



<x-layouts.auth>

    <x-slot:title>
        {{ __('Вход в аккаунт')  }}
    </x-slot:title>

    @auth
        <div class="py-4 text-center">

            {{ Auth::user()?->email }}

        </div>
    @endauth

    <x-card>

        <x-card.body>

            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                {{ __('Войти в аккаунт') }}
            </h1>

            <x-form action="{{ route('login.store') }}" method="POST" class="form space-y-4 md:space-y-6">

                <x-form.item>
                    <x-form.label>
                        {{ __("Ваш email") }}
                    </x-form.label>
                    <x-form.input type="email" name="email" placeholder="email@example.com" />
                </x-form.item>

                <x-form.item>
                    <x-form.label>
                        {{ __("Ваш пароль") }}
                    </x-form.label>
                    <x-form.input type="password" name="password" placeholder="*******" />
                </x-form.item>


                <x-form.item>
                   <x-form.check name="remember">
                        {{ __('Запомнить меня') }}
                   </x-form.check>
                </x-form.item>

                <x-button type="submit">Войти</x-button>

                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    {{ __("У вас нету аккаунта?") }}
                    <x-link to="{{ route('registration') }}">
                        {{ __('Зарегистрироваться') }}
                    </x-link>
                </p>

            </x-form>

        </x-card.body>

    </x-card>

</x-layouts.auth>

@endsection




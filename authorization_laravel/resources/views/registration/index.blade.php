@extends('templates.main')


@section('main.content')

<x-layouts.auth>

    <x-slot:title>
        {{ __('Регистрация')  }}
    </x-slot:title>

    <x-card>

        <x-card.body>

            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                {{ __('Создание аккаунта') }}
            </h1>

            <x-form action="{{ route('registration.store') }}" method="POST" class="form space-y-4 md:space-y-6">

                <x-form.item>

                    <x-form.label>
                        {{ __("Ваш логин") }}
                    </x-form.label>
                    <x-form.input type="text" name="login" placeholder="Login" autofocus/>

                </x-form.item>

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

                    <x-form.label>
                        {{ __("Повторите пароль") }}
                    </x-form.label>
                    <x-form.input type="password" name="password_confirmation" placeholder="*******"/>

                </x-form.item>

                <x-form.item>

                   <x-form.check name="agreement">
                        {{ __('Я Принимаю') }}
                   </x-form.check>

                </x-form.item>

                <x-button type="submit">Зарегистрироваться</x-button>

                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    {{ __("У вас уже есть аккаунта?") }}
                    <x-link to="{{ route('login') }}">
                        {{ __('Войти в аккаунт') }}
                    </x-link>
                </p>
            </x-form>

        </x-card.body>

    </x-card>

</x-layouts.auth>

@endsection




@extends('templates.main')


@section('main.content')


<section class="bg-gray-50 dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
            Регистрация
        </a>
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">

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

                            {{ __("Вы уже зарегистрированы?") }} <a href="{{  route('login') }}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">{{ __('Нажмите войти') }}</a>
                        </p>

                    </x-form>

                </x-card.body>

            </x-card>

        </div>
    </div>
</section>



@endsection




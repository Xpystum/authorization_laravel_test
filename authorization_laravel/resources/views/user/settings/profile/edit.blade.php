@extends('templates.main')

@section('main.content')

    <x-layouts.settings>

        <x-title size="sm">
            {{ __('Изменить профиль') }}

            <x-slot:description>
                {{ __('Введите новые персональные данные.') }}
            </x-slot:description>
        </x-title>

        <x-form action="{{ route('user.settings.profile.update') }}" method="POST">
            <x-list>

                <x-list.item>

                    <x-slot:name>

                        {{ __('Имя аккаунта (Login)') }}

                    </x-slot:name>

                    <x-slot:value>

                        <div class="grid grid-cols-2">
                            <div class="col-span-2 md:col-span-1">
                                <x-form.input name="login" :value="$user->login" />
                            </div>
                        </div>


                    </x-slot:value>

                </x-list.item>

                <x-list.item>

                    <x-slot:name>

                        {{ __('Пол') }}

                    </x-slot:name>

                    <x-slot:value>

                    <div class="grid grid-cols-2">
                        <div class="col-span-2 md:col-span-1">
                            <x-form.select
                                name='gender'
                                :value="$user->gender?->value"
                                :options="App\Enums\GenderEnum::select()"
                            />
                        </div>
                    </div>

                    </x-slot:value>

                </x-list.item>

            </x-list>

            <x-form.footer>


                <x-slot:buttons>

                    <x-button color="white" href="{{ route('user.settings') }}">
                        {{ __('Отменить') }}
                    </x-button>

                    <x-button type="submit">
                        {{ __('Сохранить') }}
                    </x-button>
                </x-slot:buttons>

            </x-form.footer>
        </x-form>


    </x-layouts.settings>

@endsection

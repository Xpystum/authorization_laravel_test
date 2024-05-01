<div class="profile">


    <x-title size="sm">
        {{ __('Ваши Контакты') }}

        <x-slot:description>
            {{ __('Посмотреть и изменить контактые данные') }}
        </x-slot:description>
    </x-title>

    <x-list>

        {{-- <x-list.item>

            <x-slot:name>

                {{ __('Имя аккаунта (Login)') }}

            </x-slot:name>

            <x-slot:value>

                {{ $user->login }}

            </x-slot:value>

            <x-slot:action>

                <x-link href="{{ route('user.settings.profile.edit')  }}">{{ __('Изменить') }}</x-link>

            </x-slot:action>

        </x-list.item> --}}

        <x-list.item>

            <x-slot:name>

                {{ __('Email адресс') }}

            </x-slot:name>

            <x-slot:value>

                {{ str($user->email)->mask('*', 3 , -4) }}

            </x-slot:value>

            <x-slot:action>

                <x-link href="{{ route('user.settings.email.edit')  }}" wire:navigate>

                    {{ __('Изменить') }}

                </x-link>

            </x-slot:action>

        </x-list.item>

    </x-list>





    </div>

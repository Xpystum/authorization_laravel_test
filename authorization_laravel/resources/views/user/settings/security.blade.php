<div class="security">

    <x-title size="sm">
        {{ __('Безопасность') }}

        <x-slot:description>
            {{ __('Настройки безопаности вашего аккаунта.') }}
        </x-slot:description>
    </x-title>

    <x-list>

        <x-list.item>

            <x-slot:name>

                {{ __('Пароль') }}

            </x-slot:name>

            <x-slot:value>

                @if($user->password_at)
                    {{ __('Изменён') }} {{ $user->password_at->translatedFormat('j F Y') }}
                @else
                    {{ __('Не изменялся') }}
                @endif

            </x-slot:value>

            <x-slot:action>

                <x-link href="{{ route('user.settings.password.edit')  }}">{{ __('Изменить') }}</x-link>

            </x-slot:action>

        </x-list.item>

    </x-list>

</div>

<div class="profile">


<x-title size="sm">
    {{ __('Ваш Профиль') }}

    <x-slot:description>
        {{ __('Посмотреть и изменить персональные данные') }}
    </x-slot:description>
</x-title>

<x-list>

    <x-list.item>

        <x-slot:name>

            {{ __('Имя аккаунта (Login)') }}

        </x-slot:name>

        <x-slot:value>

            {{ $user->login }}

        </x-slot:value>

        <x-slot:action>

            <x-link href="{{ route('user.settings.profile.edit')  }}">{{ __('Изменить') }}</x-link>

        </x-slot:action>

    </x-list.item>

    <x-list.item>

        <x-slot:name>

            {{ __('Email адресс') }}

        </x-slot:name>

        <x-slot:value>

            {{ $user->email }}

        </x-slot:value>

        <x-slot:action>

            <x-link href="{{ route('user.settings.profile.edit')  }}" > {{ __('Изменить') }} </x-link>

        </x-slot:action>

    </x-list.item>

    <x-list.item>

        <x-slot:name>

            {{ __('Пол') }}

        </x-slot:name>

        <x-slot:value>

            {{ ($user->gender?->name()) ?: "Не указано" }}

        </x-slot:value>

        <x-slot:action>

            <x-link href="{{  route('user.settings.profile.edit')  }}" >{{ __('Изменить') }}</x-link>

        </x-slot:action>

    </x-list.item>

</x-list>





</div>

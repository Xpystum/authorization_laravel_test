@extends('templates.main')


@section('main.content')



<x-layouts.auth>

    <x-slot:title>
        {{ __('Подтверждение Почты')  }}
    </x-slot:title>


    <x-card>

        <x-card.body>

            {{ __('Перейдите по ссылке из письма, отправленного на ваш email для подтверждения пароля.') }}

        </x-card.body>

    </x-card>

</x-layouts.auth>

@endsection



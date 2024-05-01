@extends('templates.main')

@section('main.content')

    <x-layouts.settings>

        <x-title size="sm">
            {{ __('Изменить email') }}

            <x-slot:description>
                {{ __('Введите email и новый email') }}
            </x-slot:description>
        </x-title>

        <livewire:user.settings.email.update-email-component />


    </x-layouts.settings>

@endsection

@extends('templates.main')

@section('main.content')

    <x-layouts.user>

        <x-slot:title>
            {{ __('Настройки') }}
        </x-slot:title>

        <x-slot:slot>
            {{ $slot }}
        </x-slot:slot>

    </x-layouts.user>

@endsection

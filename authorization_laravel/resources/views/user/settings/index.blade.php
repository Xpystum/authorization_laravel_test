@extends('templates.main')

{{-- Можно использовать библиотеку Alpine.js --}}
@section('main.content')

    <x-layouts.settings>
        @include('user.settings.profile')
    </x-layouts.settings>

@endsection

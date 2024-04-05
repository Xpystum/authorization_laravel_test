@extends('templates.main')

{{-- Можно использовать библиотеку Alpine.js --}}
@section('main.content')

    <x-layouts.settings>

        <div class="space-y-12">
            @include('user.settings.profile')

            @include('user.settings.security')
        </div>

    </x-layouts.settings>

@endsection

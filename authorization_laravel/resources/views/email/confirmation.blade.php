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





        <x-link class="btn" href="#" x-data x-on:click.prevent="$refs.form.submit">
            {{ __('Отправить ещё раз') }}
            <x-form x-ref="form" action={{ route('email.confirmation.send') }} method="post" class="d-none"/>
        </x-link>

    </x-card>



</x-layouts.auth>



@endsection



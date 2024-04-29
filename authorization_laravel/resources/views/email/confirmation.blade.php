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


        <div class="flex items-center justify-center pb-5">
            <x-link x-data x-on:click.prevent="$refs.form.submit()" >
                {{ __('Отправить ещё раз') }}

                <x-form class="d-none" x-ref="form" action="{{ route('email.confirmation.send') }}" method="post"/>
            </x-link>

        </div>


    </x-card>

    <script>
        // let button = document.querySelector('#btnClassEmail');
        // console.log(button);

        // button.addEventListener('click', function (event) {
        //     event = event.preventDefault();
        //     // let form = document.querySelector('#formIdEmail');
        //     document.getElementById('formIdEmail').dispatchEvent(new Event('submit'));
        //     // console.log(form);
        //     // form.requestSubmit();
        // });

        // document.getElementById("btnClassEmail").onclick = function() {
        //     document.getElementById("formIdEmail").submit();
        // }

    </script>

</x-layouts.auth>



@endsection



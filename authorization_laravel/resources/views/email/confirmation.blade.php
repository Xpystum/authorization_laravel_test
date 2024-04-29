@extends('templates.main')


@section('main.content')



<x-layouts.auth>

    <x-slot:title>
        {{ __('Подтверждение Почты')  }}
    </x-slot:title>


    <x-card>

        <x-card.body>

            {{ __('Перейдите по ссылке из письма, отправленного на ваш email для подтверждения пароля.') }}

            <div class="pt-4">
                {{ __('Или введите код подтверждения:') }}

                <x-form class="mt-3" action="{{ route('email.confirmation.code', $email->uuid) }}" method="post">
                    <div class="grid grid-cols-5 gap-x-3">
                        <div class="col-span-3">
                            <x-form.input name="code" placeholder="123456" inputmode="decimal" autofocus>

                            </x-form.input>
                        </div>

                        <div class="col-span-2">

                            <x-button type="submit">
                                {{ __('Подтвердить') }}
                            </x-button>

                        </div>
                    </div>
                </x-form>
            </div>


        </x-card.body>


        <div class="flex items-center justify-center pb-5">
            <x-link x-data x-on:click.prevent="$refs.form.submit()" >
                {{ __('Отправить ещё раз') }}

                <x-form class="d-none" x-ref="form" action="{{ route('email.confirmation.send', $email->uuid) }}" method="post"/>
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



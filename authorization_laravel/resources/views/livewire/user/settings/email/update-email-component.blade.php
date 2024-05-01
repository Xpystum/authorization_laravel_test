<div>

    @if ($step === 'start')

        <x-form wire:key="start-email" wire:submit="startEmail">

            <x-list>

                <x-list.item>

                    <x-slot:name>

                        {{ __('Новый email') }}

                    </x-slot:name>

                    <x-slot:value>

                        <div class="grid grid-cols-2">
                            <div class="col-span-2 md:col-span-1">
                                <x-form.input wire:model="email" type='email' name="email" placeholder="test@gmail.com" autofocus/>
                            </div>
                        </div>

                    </x-slot:value>

                </x-list.item>

            </x-list>

            <x-form.footer>


                <x-slot:buttons>

                    <x-button color="white" href="{{ route('user.settings') }}" wire:navigate>
                        {{ __('Отменить') }}
                    </x-button>

                    <x-button type="submit">
                        {{ __('Продолжить') }}
                    </x-button>
                </x-slot:buttons>

            </x-form.footer>
        </x-form>

    @elseif ($step === 'confirm')

        <x-form wire:key="confirm-email" wire:submit="confirmEmail">

            <x-list>

                <x-list.item>

                    <x-slot:name>

                        {{ __('Код подтверждения') }}

                    </x-slot:name>

                    <x-slot:value>

                        <div class="grid grid-cols-2">
                            <div class="col-span-2 md:col-span-1">
                                <x-form.input wire:model="code" type='password' name="code" autofocus/>
                            </div>
                        </div>

                    </x-slot:value>

                </x-list.item>

            </x-list>

            <x-form.footer>


                <x-slot:buttons>

                    <x-button type='button' wire:click="setStep('start')" color="white">
                        {{ __('Назад') }}
                    </x-button>

                    <x-button type="submit">
                        {{ __('Подтвердить') }}
                    </x-button>
                </x-slot:buttons>

            </x-form.footer>
        </x-form>

    @endif

</div>

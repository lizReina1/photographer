<x-app-layout>

    <x-slot name="header">
        @livewire('navigation-menu')

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @hasanyrole('organizador')
                @livewire('event-component')
                @endhasanyrole
                @hasanyrole('fotografo')
                <section class="w-full md:w-2/3 flex flex-col items-center px-3">
                    @livewire('catalogo-fotograafo.catalogo-fotografo')
                </section>
                @endhasanyrole
                @hasanyrole('cliente')
              
                @livewire('tienda.tienda')
                @endhasanyrole
          
        </div>
    </div>
</x-app-layout>
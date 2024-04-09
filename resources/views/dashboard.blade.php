<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Sistema De Gestion De PQRS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                            <div class="flex items-center justify-center mb-6">
                                <x-application-logo class="block h-12 w-auto" />
                            </div>
                            <h2 class="text-3xl font-bold text-gray-800 mb-4">¡Bienvenido al Portal de PQRS de la Alcaldía de San Antonio del Tequendama!</h2>
                            <p class="text-lg text-gray-700 leading-7">Sumérgete en una experiencia única de participación ciudadana y transparencia administrativa. Este portal es el espacio donde tus ideas, opiniones y solicitudes se convierten en acciones concretas para mejorar la calidad de vida de nuestra comunidad.</p>
                            <p class="text-lg text-gray-700 leading-7">En este portal, puedes realizar tus Peticiones, Quejas, Reclamos y Sugerencias de forma ágil y sencilla. Nuestro compromiso es brindarte una atención cercana y eficiente, escuchando tus inquietudes y trabajando juntos para encontrar soluciones.</p>
                            <p class="text-lg text-gray-700 leading-7">Tu participación es fundamental para construir un San Antonio del Tequendama más inclusivo, justo y próspero. ¡Únete a nosotros y sé parte del cambio!</p>
                            <p class="text-lg text-gray-700 leading-7">Juntos, transformamos realidades. ¡Gracias por confiar en nosotros!</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>

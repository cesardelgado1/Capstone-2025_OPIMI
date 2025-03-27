<x-layout>
    <x-slot:heading>
        Planes Estratégicos de UPRM - Asuntos del {{ $strategicplan->sp_institution }}
    </x-slot:heading>

    <div class="px-6 py-4">
        @if(count($topics) > 0)
            <div class="space-y-4">
                @foreach($topics as $topic)
                    <a href="#" class="block px-4 py-4 bg-white border border-gray-300 rounded-lg shadow-md hover:bg-gray-100 transition">
                        <div class="font-bold text-gray-700 text-sm">
                            Asunto #{{ $topic->t_num }}
                        </div>
                        <div class="text-gray-500">
                            {{ $topic->t_text }}
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No hay asuntos relacionados con este plan estratégico.</p>
        @endif
    </div>
</x-layout>


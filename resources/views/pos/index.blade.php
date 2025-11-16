<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Point of Sale (POS) - Pesanan Masuk') }}
        </h2>
    </x-slot>

    {{-- KONTEN UTAMA --}}
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">

            {{-- ALERT SUCCESS --}}
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            {{-- KANBAN WRAPPER --}}
            <div id="kanban-board-container">

                {{-- LOAD PERTAMA SAAT PAGE DIBUKA --}}
                @include('pos._kanban-board', [
                    'pendingOrders' => $pendingOrders,
                    'paidOrders' => $paidOrders,
                    'processingOrders' => $processingOrders
                ])

            </div>

        </div>
    </div>

    {{-- SCRIPT AUTO REFRESH --}}
    <script>
        /**
         * Memuat ulang papan kanban setiap 5 detik.
         * Mengambil HTML partial dari controller via route: pos.boardData
         */
        const fetchKanbanData = () => {
            fetch("{{ route('pos.boardData') }}")
                .then(response => response.text())
                .then(html => {
                    document.getElementById('kanban-board-container').innerHTML = html;
                })
                .catch(error => console.error('Error fetching kanban data:', error));
        };

        setInterval(fetchKanbanData, 5000);
    </script>

</x-app-layout>

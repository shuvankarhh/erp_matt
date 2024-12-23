@extends('layouts.vertical', ['title' => 'Support', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Support Pipelines</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add"
                        onclick="openModal('{{ route('support-pipelines.create') }}')">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <div class="h-64 overflow-y-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                    <tr>
                                        <x-th>No</x-th>
                                        <x-th>Name</x-th>
                                        <x-th align="text-end">Action</x-th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($support_pipelines as $key => $support_pipeline)
                                        <tr>
                                            <x-td>{{ $loop->iteration }}</x-td>
                                            <x-td>{{ $support_pipeline->name }}</x-td>
                                            <x-action-td :editModal="[
                                                'route' => route('support-pipelines.edit', [
                                                    'support_pipeline' => $support_pipeline->encrypted_id(),
                                                ]),
                                            ]" :simpleDelete="[
                                                'name' => $support_pipeline->name,
                                                'route' => route('support-pipelines.destroy', [
                                                    'support_pipeline' => $support_pipeline->encrypted_id(),
                                                ]),
                                            ]" />
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @section('script')
    <script>
        function toggleSwitch(element) {
            const toggleCircle = element.querySelector('span');
            const isActive = element.classList.contains('bg-blue-500');

            // Toggle the background color
            if (isActive) {
                element.classList.remove('bg-blue-500');
                element.classList.add('bg-gray-300');
                toggleCircle.style.transform = 'translateX(0)';
                document.getElementById('switchStatus').innerText = 'Off';
            } else {
                element.classList.remove('bg-gray-300');
                element.classList.add('bg-blue-500');
                toggleCircle.style.transform = 'translateX(100%)';
                document.getElementById('switchStatus').innerText = 'On';
            }
        }
    </script>
@endsection --}}

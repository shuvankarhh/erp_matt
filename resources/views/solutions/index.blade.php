@extends('layouts.vertical', ['title' => 'Solution', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Solutions</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add"
                        onclick="openModal('{{ route('solutions.create') }}')">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                <tr>
                                    <x-th>No</x-th>
                                    <x-th>Name</x-th>
                                    <x-th>Sku</x-th>
                                    <x-th>Type</x-th>
                                    <x-th>Image</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($solutions as $key => $solution)
                                    <tr>
                                        <x-td>{{ $solutions->firstItem() + $key }}</x-td>
                                        <x-td>{{ $solution->name ?? null }}</x-td>
                                        <x-td>{{ $solution->sku ?? null }}</x-td>
                                        <x-td>{{ $solution->type == 1 ? 'Product' : 'Service' }}</x-td>
                                        <x-td>
                                            <a class="img block">
                                                @if (isset($solution->image_path) && Storage::disk('public')->exists($solution->image_path))
                                                    <img class="w-12 h-12 rounded"
                                                        src="{{ asset('storage/' . $solution->image_path) }} ?? {{ asset($solution->image_path) }}"
                                                        alt="solution">
                                                @else
                                                    <img class="w-12 h-12 rounded"
                                                        src="{{ asset('storage/images/default.png') }}" alt="solution">
                                                @endif
                                            </a>
                                        </x-td>
                                        <x-action-td :editModal="[
                                            'route' => route('solutions.edit', [
                                                'solution' => $solution->encrypted_id(),
                                            ]),
                                        ]" :simpleDelete="[
                                            'name' => $solution->name,
                                            'route' => route('solutions.destroy', [
                                                'solution' => $solution->encrypted_id(),
                                            ]),
                                        ]" />
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination :paginator="$solutions" />
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        window.storeOrUpdate = async (formId, event) => {
            event.preventDefault();

            const form = document.getElementById(formId);
            const url = form.action;
            const formData = new FormData(form);

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData,
                });

                if (!response.ok) {
                    if (response.status === 422) {
                        const data = await response.json();
                        notyf.error(data.message);
                        handleValidationErrors(data.errors);
                    } else {
                        notyf.error(response.statusText);
                    }
                    return;
                }

                const data = await response.json();

                if (data.success) {
                    window.location.href = data.redirect;
                    localStorage.setItem('success_message', data.message);
                } else {
                    notyf.error(data.error);
                }
            } catch (error) {
                console.error("Error submitting employee edit form", error);
                notyf.error(error);
            }
        };
    </script>
@endsection

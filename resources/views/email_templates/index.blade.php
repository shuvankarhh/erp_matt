@extends('layouts.vertical', ['title' => 'Email Template', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-white border-b px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">All Email Templates</h2>
            <div class="flex items-center">
            </div>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <x-th>No</x-th>
                                    <x-th>Template Name</x-th>
                                    <x-th>Email Subject</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($email_templates as $key => $email_template)
                                    <tr>
                                        <x-td>{{ $email_templates->firstItem() + $key }}</x-td>
                                        <x-td>{{ $email_template->name ?? null }}</x-td>
                                        <x-td>{{ $email_template->subject ?? null }}</x-td>
                                        <x-action-td :show="route('email-templates.show', [
                                            'email_template' => $email_template->encrypted_id(),
                                        ])" :editModal="[
                                            'route' => route('email-templates.edit', [
                                                'email_template' => $email_template->encrypted_id(),
                                            ]),
                                        ]" {{-- :simpleDelete="[
                                            'name' => $email_template->name,
                                            'route' => route('email-template.destroy', [
                                                'email_template' => $email_template->encrypted_id(),
                                            ]),
                                        ]" --}} />
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                    <x-pagination :paginator="$email_templates" />
                </div>
            </div>
        </div>
    </div>
@endsection

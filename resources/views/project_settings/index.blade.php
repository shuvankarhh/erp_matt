@extends('layouts.vertical', ['title' => 'Project Settings', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    {{-- Referrer Info Start Here --}}
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-white border-b px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">All Referrer Infos</h2>
            <div class="flex items-center">
                <a href="#" onclick="openModal('{{ route('referrer-infos.create') }}')"
                    class="flex items-center bg-blue-500 text-white hover:bg-blue-700 font-semibold text-sm p-2 rounded-lg dark:bg-slate-700 dark:text-gray-400 dark:hover:text-white"
                    title="Add">
                    <i class="fa fa-plus text-md"></i>
                    <span class="ml-1">Add</span>
                </a>
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
                                        <x-th>No</x-th>
                                        <x-th>Organization Name</x-th>
                                        <x-th>First Name</x-th>
                                        <x-th>Last Name</x-th>
                                        <x-th>Email</x-th>
                                        <x-th align="text-end">Action</x-th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($referrer_infos as $key => $referrer_info)
                                        <tr>
                                            {{-- <x-td>{{ $loop->iteration }}</x-td> --}}
                                            <x-td>{{ $referrer_infos->firstItem() + $key }}</x-td>
                                            <x-td>{{ $referrer_info->organization_name ?? null }}</x-td>
                                            <x-td>{{ $referrer_info->contact_first_name ?? null }}</x-td>
                                            <x-td>{{ $referrer_info->contact_last_name ?? null }}</x-td>
                                            <x-td>{{ $referrer_info->email ?? null }}</x-td>
                                            <x-action-td :editModal="[
                                                'route' => route('referrer-infos.edit', [
                                                    'referrer_info' => $referrer_info->encrypted_id(),
                                                ]),
                                            ]" :simpleDelete="[
                                                'name' =>
                                                    $referrer_info->contact_first_name .
                                                    ' ' .
                                                    $referrer_info->contact_last_name,
                                                'route' => route('referrer-infos.destroy', [
                                                    'referrer_info' => $referrer_info->encrypted_id(),
                                                ]),
                                            ]" />
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($referrer_infos->total() > 15)
                            <x-pagination :paginator="$referrer_infos" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Referrer Info End Here --}}

    {{-- Referrer Info Start Here --}}
    <div class=" mt-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-white border-b px-6 py-4 flex justify-between items-center mt-4">
                <h2 class="text-xl font-semibold text-gray-800">All Referrer Infos</h2>
                <div class="flex items-center">
                    <a href="#" onclick="openModal('{{ route('referrer-infos.create') }}')"
                        class="flex items-center bg-blue-500 text-white hover:bg-blue-700 font-semibold text-sm p-2 rounded-lg dark:bg-slate-700 dark:text-gray-400 dark:hover:text-white"
                        title="Add">
                        <i class="fa fa-plus text-md"></i>
                        <span class="ml-1">Add</span>
                    </a>
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
                                            <x-th>No</x-th>
                                            <x-th>Organization Name</x-th>
                                            <x-th>First Name</x-th>
                                            <x-th>Last Name</x-th>
                                            <x-th>Email</x-th>
                                            <x-th align="text-end">Action</x-th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($referrer_infos as $key => $referrer_info)
                                            <tr>
                                                {{-- <x-td>{{ $loop->iteration }}</x-td> --}}
                                                <x-td>{{ $referrer_infos->firstItem() + $key }}</x-td>
                                                <x-td>{{ $referrer_info->organization_name ?? null }}</x-td>
                                                <x-td>{{ $referrer_info->contact_first_name ?? null }}</x-td>
                                                <x-td>{{ $referrer_info->contact_last_name ?? null }}</x-td>
                                                <x-td>{{ $referrer_info->email ?? null }}</x-td>
                                                <x-action-td :editModal="[
                                                    'route' => route('referrer-infos.edit', [
                                                        'referrer_info' => $referrer_info->encrypted_id(),
                                                    ]),
                                                ]" :simpleDelete="[
                                                    'name' =>
                                                        $referrer_info->contact_first_name .
                                                        ' ' .
                                                        $referrer_info->contact_last_name,
                                                    'route' => route('referrer-infos.destroy', [
                                                        'referrer_info' => $referrer_info->encrypted_id(),
                                                    ]),
                                                ]" />
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($referrer_infos->total() > 15)
                                <x-pagination :paginator="$referrer_infos" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Referrer Info End Here --}}

    {{-- Team Start Here --}}
    <div class="card mt-4">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Teams</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add"
                        onclick="openModal('{{ route('teams.create') }}')">
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

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($teams as $key => $team)
                                        <tr>
                                            <x-td>{{ $loop->iteration }}</x-td>
                                            <x-td>{{ $team->name }}</x-td>
                                            <x-action-td :editModal="[
                                                'route' => route('teams.edit', [
                                                    'team' => $team->encrypted_id(),
                                                ]),
                                            ]" :simpleDelete="[
                                                'name' => $team->name,
                                                'route' => route('teams.destroy', [
                                                    'team' => $team->encrypted_id(),
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
    {{-- Team End Here --}}

    {{-- Designation Start Here --}}
    <div class="card mt-4">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Designations</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add"
                        onclick="openModal('{{ route('designations.create') }}')">
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

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($designations as $key => $designation)
                                        <tr>
                                            <x-td>{{ $loop->iteration }}</x-td>
                                            <x-td>{{ $designation->name }}</x-td>
                                            <x-action-td :editModal="[
                                                'route' => route('designations.edit', [
                                                    'designation' => $designation->encrypted_id(),
                                                ]),
                                            ]" :simpleDelete="[
                                                'name' => $designation->name,
                                                'route' => route('designations.destroy', [
                                                    'designation' => $designation->encrypted_id(),
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
    {{-- Designation End Here --}}
@endsection

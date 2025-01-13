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

    {{-- Project Type Start Here --}}
    <div class=" mt-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-white border-b px-6 py-4 flex justify-between items-center mt-4">
                <h2 class="text-xl font-semibold text-gray-800">All Project Types</h2>
                <div class="flex items-center">
                    <a href="#" onclick="openModal('{{ route('project-types.create') }}')"
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
                                            <x-th>Name</x-th>
                                            <x-th align="text-end">Action</x-th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($project_types as $key => $project_type)
                                            <tr>
                                                {{-- <x-td>{{ $loop->iteration }}</x-td> --}}
                                                <x-td>{{ $project_types->firstItem() + $key }}</x-td>
                                                <x-td>{{ $project_type->name ?? null }}</x-td>
                                                <x-action-td :editModal="[
                                                    'route' => route('project-types.edit', [
                                                        'project_type' => $project_type->encrypted_id(),
                                                    ]),
                                                ]" :simpleDelete="[
                                                    'name' => $project_type->name,
                                                    'route' => route('project-types.destroy', [
                                                        'project_type' => $project_type->encrypted_id(),
                                                    ]),
                                                ]" />
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($project_types->total() > 15)
                                <x-pagination :paginator="$project_types" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Project Type End Here --}}

    {{-- Service Type Start Here --}}
    <div class=" mt-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-white border-b px-6 py-4 flex justify-between items-center mt-4">
                <h2 class="text-xl font-semibold text-gray-800">All Service Types</h2>
                <div class="flex items-center">
                    <a href="#" onclick="openModal('{{ route('service-types.create') }}')"
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
                                            <x-th>Project Type</x-th>
                                            <x-th>Name</x-th>
                                            <x-th align="text-end">Action</x-th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($service_types as $key => $service_type)
                                            <tr>
                                                {{-- <x-td>{{ $loop->iteration }}</x-td> --}}
                                                <x-td>{{ $service_types->firstItem() + $key }}</x-td>
                                                <x-td>{{ $service_type->project_type->name ?? null }}</x-td>
                                                <x-td>{{ $service_type->name ?? null }}</x-td>
                                                <x-action-td :editModal="[
                                                    'route' => route('service-types.edit', [
                                                        'service_type' => $service_type->encrypted_id(),
                                                    ]),
                                                ]" :simpleDelete="[
                                                    'name' => $service_type->name,
                                                    'route' => route('service-types.destroy', [
                                                        'service_type' => $service_type->encrypted_id(),
                                                    ]),
                                                ]" />
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($service_types->total() > 15)
                                <x-pagination :paginator="$service_types" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Service Type End Here --}}

    {{-- Price List Start Here --}}
    <div class=" mt-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-white border-b px-6 py-4 flex justify-between items-center mt-4">
                <h2 class="text-xl font-semibold text-gray-800">All Price Lists</h2>
                <div class="flex items-center">
                    <a href="#" onclick="openModal('{{ route('price-lists.create') }}')"
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
                                            <x-th>From Price</x-th>
                                            <x-th>To Price</x-th>
                                            <x-th align="text-end">Action</x-th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($price_lists as $key => $price_list)
                                            <tr>
                                                <x-td>{{ $price_lists->firstItem() + $key }}</x-td>
                                                <x-td>{{ $price_list->from_price ?? null }}</x-td>
                                                <x-td>{{ $price_list->to_price ?? null }}</x-td>
                                                <x-action-td :editModal="[
                                                    'route' => route('price-lists.edit', [
                                                        'price_list' => $price_list->encrypted_id(),
                                                    ]),
                                                ]" :simpleDelete="[
                                                    'name' => $price_list->from_price . ' ' . $price_list->to_price,
                                                    'route' => route('price-lists.destroy', [
                                                        'price_list' => $price_list->encrypted_id(),
                                                    ]),
                                                ]" />
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($price_lists->total() > 15)
                                <x-pagination :paginator="$price_lists" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Price List End Here --}}
@endsection

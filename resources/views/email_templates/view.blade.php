@extends('layouts.vertical', ['title' => 'Email Templates', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-white border-b px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">View Email Template</h2>
            <div class="flex items-center">
                <a href="#"
                    onclick="openModal('{{ route('email-templates.edit', ['email_template' => $email_template->encrypted_id()]) }}')"
                    class="flex items-center bg-green-500 text-white hover:bg-green-700 font-semibold text-sm p-2 rounded-lg dark:bg-slate-700 dark:text-gray-400 dark:hover:text-white"
                    title="Edit">
                    <i class="fa fa-pen-to-square text-md"></i>
                    <span class="ml-1">Edit</span>
                </a>
            </div>
        </div>
        <div class="p-6">
            <div class="flex flex-col gap-3">
                <div class="grid grid-cols-4 items-center">
                    <label for="inputEmail3" class="text-gray-800 text-sm font-medium inline-block">Email
                        Type : </label>
                    <div class="md:col-span-3">
                        {{-- <input type="email" class="form-input" id="inputEmail3" placeholder="Email"> --}}
                        <span>{{ $email_template->name }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-4 items-center">
                    <label for="inputPassword3" class="text-gray-800 text-sm font-medium inline-block">Email
                        Subject : </label>
                    <div class="md:col-span-3">
                        <span>{{ $email_template->subject }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-4 items-center mt-6">
                    <label for="inputPassword5" class="text-gray-800 text-sm font-medium inline-block">Email
                        Body : </label>
                    <div class="md:col-span-3">
                        {!! $email_template->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

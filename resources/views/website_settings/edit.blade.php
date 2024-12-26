@extends('layouts.vertical', ['title' => 'Website Settings', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Website Settings</h4>
            </div>
        </div>
        <div class="p-6">
            <form action="{{ route('website-settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <x-input label="Company Name" name="company_name"
                        value="{{ old('company_name') ?? ($website_setting->company_name ?? null) }}" required />

                    <x-input label="Company Address" name="company_address"
                        value="{{ old('company_address') ?? ($website_setting->company_address ?? null) }}" />

                    <x-input label="Company Email" name="company_email"
                        value="{{ old('company_email') ?? ($website_setting->company_email ?? null) }}" />

                    <x-input label="Company Phone" name="company_phone"
                        value="{{ old('company_phone') ?? ($website_setting->company_phone ?? null) }}" />

                    <div class="mb-4">
                        <label for="company_logo" class="text-gray-800 text-sm font-medium inline-block mb-3">Company
                            Logo</label>
                        <div class="mt-2 flex items-center space-x-6">
                            <img src="{{ $website_setting->company_logo ? asset('storage/images/' . $website_setting->company_logo) : asset('storage/images/default_logo.png') }}"
                                alt="logo" class="h-16 w-auto rounded-md border border-gray-300 object-contain">

                            <input type="file" id="company_logo" name="company_logo" class="hidden"
                                onchange="updateFileName(this, 'company_logo_name_output')">

                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                onclick="clickSingleFileInput('company_logo', 'company_logo_name_output')">
                                <i class="mgc_upload_2_line text-lg"></i>
                            </button>

                            <span id="company_logo_name_output" class="text-sm text-gray-600"></span>
                        </div>

                        <div class="mt-2">
                            @error('company_logo')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="favicon" class="text-gray-800 text-sm font-medium inline-block mb-3">Favicon</label>
                        <div class="mt-2 flex items-center space-x-6">
                            <img src="{{ $website_setting->favicon ? asset('storage/images/' . $website_setting->favicon) : asset('storage/images/default_logo.png') }}"
                                alt="favicon" class="h-8 w-8 rounded-md border border-gray-300 object-contain">

                            <input type="file" id="favicon" name="favicon" class="hidden"
                                onchange="updateFileName(this, 'favicon_name_output')">

                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                onclick="clickSingleFileInput('favicon', 'favicon_name_output')">
                                <i class="mgc_upload_2_line text-lg"></i>
                            </button>

                            <span id="favicon_name_output" class="text-sm text-gray-600"></span>
                        </div>

                        <div class="mt-2">
                            @error('favicon')
                                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <x-textarea label="SEO Description" name="seo_description"
                        value="{{ $website_setting->seo_description }}" placeholder="Enter SEO Description" required />

                    <x-select label="Auto Report Scedule" name="auto_report_scedule" :options="$autoReportScedules"
                        selected="{{ old('auto_report_scedule') ?? ($website_setting->auto_report_scedule ?? null) }}"
                        required />

                    <div class="flex items-center space-x-2">
                        <label for="is_auto_report" class="text-sm font-medium text-gray-900 cursor-pointer">
                            Auto Report
                        </label>
                        <input type="checkbox" id="is_auto_report" name="is_auto_report" value="1"
                            {{ $website_setting->is_auto_report == 1 ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                    </div>
                </div>

                <button type="submit"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Trigger file input click
        function clickSingleFileInput(inputId, outputId) {
            document.getElementById(inputId).click();
        }

        // Update displayed file name
        function updateFileName(input, outputId) {
            const fileName = input.files[0]?.name || "No file selected";
            document.getElementById(outputId).textContent = fileName;
        }
    </script>
@endsection

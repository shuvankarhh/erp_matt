@php
    use App\Services\LocalTime;
@endphp

<x-dashboard-layout pagename="Website Setting">
    <x-slot name='css'>
        {{-- datetimepicker --}}
        <link href="/css/datetimepicker/tempusdominus-bootstrap-4.css" rel="stylesheet">
        {{-- datetimepicker end --}}
    </x-slot>

    <br>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">Website Settings</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="col-12">
                        
                        @include('vendor._errors')

                        <form action="{{ route('website_settings_update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Company Name <span  style="color:red" >*</span></label>
                                    <input type="text" class="form-control" placeholder="Company Name" name="company_name" value="{{ old('company_name') ?? $website_setting->company_name }}" required>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Company Address</label>
                                    <input type="text" class="form-control" placeholder="Company Address" name="company_address" value="{{ old('company_address') ?? $website_setting->company_address }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Company Email</label>
                                    <input type="text" class="form-control" placeholder="Company Email" name="company_email" value="{{ old('company_email') ?? $website_setting->company_email }}">
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Company Phone</label>
                                    <input type="text" class="form-control" placeholder="Company Phone" name="company_phone" value="{{ old('company_phone') ?? $website_setting->company_phone }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Company Logo</label>
                                    <div>
                                        <img src="{{ asset('storage/images/' . $website_setting->company_logo) }}" alt="logo" style="max-height: 60px;max-width: 100%;margin-bottom: 10px;margin-right: 15px;">

                                        <input type="file" name="company_logo" style="display: none;">
                                        <button type="button" class="btn btn-primary" onclick="clickSingleFileInput('company_logo', 'company_logo_name_output')"><i class="flaticon-file-upload-line"></i></button>
                                        <span id="company_logo_name_output" style="margin-left: 10px;"></span>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Favicon</label>
                                    <div>
                                        <img src="{{ asset('storage/images/' . $website_setting->favicon) }}" alt="logo" style="max-height: 60px;height: 30px;">

                                        <input type="file" name="favicon" style="display: none;">
                                        <button type="button" class="btn btn-primary" style="margin-left: 15px;" onclick="clickSingleFileInput('favicon', 'favicon_name_output')"><i class="flaticon-file-upload-line"></i></button>
                                        <span id="favicon_name_output" style="margin-left: 10px;"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Seo Description <span  style="color:red" >*</span></label>
                                    <input type="text" class="form-control" placeholder="Seo Description" name="seo_description" value="{{ old('seo_description') ?? $website_setting->seo_description }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Auto Report Scedule <span  style="color:red" >*</span></label>
                                    
                                    <select class="form-control" name="auto_report_scedule" required>
                                        @if(old('auto_report_scedule') != null)
                                            @if(old('auto_report_scedule') == 1)
                                                <option value="1" selected>Weekly</option>
                                            @else
                                                <option value="1">Weekly</option>
                                            @endif

                                            @if(old('auto_report_scedule') == 2)
                                                <option value="2" selected>Monthly</option>
                                            @else
                                                <option value="2">Monthly</option>
                                            @endif

                                            @if(old('auto_report_scedule') == 3)
                                                <option value="3" selected>Quarterly</option>
                                            @else
                                                <option value="3">Quarterly</option>
                                            @endif

                                            @if(old('auto_report_scedule') == 4)
                                                <option value="4" selected>Annual</option>
                                            @else
                                                <option value="4">Annual</option>
                                            @endif
                                        @else
                                            @if($website_setting->auto_report_scedule == 1)
                                                <option value="1" selected>Weekly</option>
                                            @else
                                                <option value="1">Weekly</option>
                                            @endif

                                            @if($website_setting->auto_report_scedule == 2)
                                                <option value="2" selected>Monthly</option>
                                            @else
                                                <option value="2">Monthly</option>
                                            @endif

                                            @if($website_setting->auto_report_scedule == 3)
                                                <option value="3" selected>Quarterly</option>
                                            @else
                                                <option value="3">Quarterly</option>
                                            @endif

                                            @if($website_setting->auto_report_scedule == 4)
                                                <option value="4" selected>Annual</option>
                                            @else
                                                <option value="4">Annual</option>
                                            @endif
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label style="float: left;">Auto Report</label>
                                    <div style="float: left;margin-top: 3px;margin-left: 15px;">
                                        <label class="switch s-primary  mb-4 mr-2">
                                            @php
                                                $is_auto_report_checked = null;

                                                if($website_setting->is_auto_report == 1) {
                                                    $is_auto_report_checked = 'checked';
                                                }

                                                if(session('_old_input') != null) {
                                                    $is_auto_report_checked = null;

                                                    if(old('is_auto_report') != null) {
                                                        if(old('is_auto_report')  == 'on') {
                                                            $is_auto_report_checked = 'checked';
                                                        }
                                                    }
                                                }
                                            @endphp
                                            <input type="checkbox" name="is_auto_report" {{ $is_auto_report_checked }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center mb-4">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            
            </div>
        </div>
    </div>


    
    <x-slot name='scripts'>
        {{-- datetimepicker --}}
        <script src="/js/moment-with-locales.js"></script>
        <script src="/js/datetimepicker/tempusdominus-bootstrap-4.js"></script>

        <script>
            $('#datetimepicker1').datetimepicker({
                format: datetimepicker_options.format,
                icons: datetimepicker_options.icons,
            });
            $('#datetimepicker2').datetimepicker({
                format: datetimepicker_options.format,
                icons: datetimepicker_options.icons,
            });
        </script>
        {{-- datetimepicker end --}}
    </x-slot>
</x-dashboard-layout>
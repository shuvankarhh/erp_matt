{{-- @extends('layouts.vertical', ['title' => 'Email Templates', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <p class="card-heading">{{ __('lang_file.Edit Email Template') }}</p>
                    </div>
                </div>

                <div class="user-profile mb-primary">
                    <div class="card-body py-4">
                        <form
                            action="{{ route('email-templates.update', ['email_template' => $email_template->encrypted_id()]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $email_template->id }}">
                            <div class="row">
                                <div class="col-4 mb-3">
                                    <label for="name" class="form-label">{{ __('lang_file.Email Type') }}</label>
                                    <input type="text" value="{{ $email_template->name }}" name="name" id="name"
                                        class="form-control" readonly>
                                </div>
                                <div class="col-4 mb-3">
                                    <label for="subject" class="form-label">{{ __('lang_file.Email Subject') }}</label>
                                    <input type="text" value="{{ $email_template->subject }}" name="subject" id="subject"
                                        class="form-control" required>
                                    @if ($errors->has('subject'))
                                        <span class="text-danger">{{ $errors->first('subject') }}</span>
                                    @endif
                                </div>
                                <div class="mt-4">
                                    <div class="col-12 d-flex">
                                        <div class="col-2 d-flex align-items-center">
                                            <label for="body"
                                                class="form-label">{{ __('lang_file.Email Body :') }}</label>
                                        </div>

                                        <div class="col-10">
                                            <textarea name="body" cols="40" rows="20" id="body">{{ $email_template->body }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

<x-modal-form title="Edit Email Template"
    action="{{ route('email-templates.update', ['email_template' => $email_template->encrypted_id()]) }}" put>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">



    </div>

    <x-input class="mb-2" label="Email Type" name="name" value="{{ old('name') ?? $email_template->name }}" required />

    <x-input class="mb-2" label="Email Subject" name="subject" value="{{ old('subject') ?? $email_template->subject }}"
        required />

    <x-textarea class="mb-2" label="Email Body" name="body" value="{!! $email_template->body !!}" required />
</x-modal-form>

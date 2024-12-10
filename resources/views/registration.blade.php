

<x-auth-layout pagename="Registration" action="{{ route('registration_store') }}">
    <div class="col-md-12">
        {{-- <h6>Registration</h6> --}}
        <style>
            .form-login label {
                text-transform:capitalize;
            }
        </style>
        <label for="inputbankname" class="">Organization Name <span  style="color:red" >*</span></label>
        
        <select name="fi_code" class="form-control mb-4" id="inputbankname" >

            @if( old('fi_code') != null )
                @foreach ($schemes as $scheme)
                    @if ( old('fi_code')  == $scheme->fi_code )
                        <option value="{{ $scheme->fi_code }}" data-fi-details="{{ json_encode($scheme->fi_short_name) }}">{{ $scheme->fi_full_name }}</option>
                    @else
                        <option value="{{ $scheme->fi_code }}" data-fi-details="{{ json_encode($scheme->fi_short_name) }}">{{ $scheme->fi_full_name }}</option>
                    @endif
                    
                @endforeach
            @else
                <option value="">Select Your Organization</option>
                @foreach ($schemes as $scheme)
                    <option value="{{ $scheme->fi_code }}" data-fi-details="{{ json_encode($scheme->fi_short_name) }}">{{ $scheme->fi_full_name }}</option>
                @endforeach
            @endif
        </select>
        {{-- <input type="text" name="bank_name" id="inputbankname" class="form-control mb-4" placeholder="Bank Name" required > --}}


        <label for="inputName" class="">Your Name <span  style="color:red" >*</span></label>
        <input type="text" name="full_name" id="inputName" class="form-control mb-4" placeholder="Email" value="{{ old('full_name') }}" >

        <label for="inputUserName" class="">Your Username<span  style="color:red" >*</span></label>

        <div class="row">
            <div class="col-3">
                <input type="text" name="user_name_code" id="inputFIDetails" class="form-control mb-4"  value="{{ old('user_name_code') }}"  required readonly>
            </div>
            <div class="col-9">
                <input type="text" name="username" id="userName2" class="form-control mb-4" placeholder="Username" value="{{ old('username') }}" required>
            </div>
        </div>

        <label for="inputEmail" class="">Your Email <span  style="color:red" >*</span></label>
        <input type="email" name="email" id="inputEmail" class="form-control mb-4" placeholder="Email" value="{{ old('email') }}" required >

        <label for="inputPhone" class="">Your Phone Number<span  style="color:red" >*</span></label>
        <input type="text" name="phone" id="inputPhone" class="form-control mb-4" placeholder="Phone" value="{{ old('phone') }}" required >

        

        <label for="inputPassword" class="">Password <span  style="color:red" >*</span></label>
        <input type="password" name="password" id="inputPassword" class="form-control mb-5" placeholder="Password" required>

        <label for="inputconfirmPassword" class="">Confirm Password<span  style="color:red" >*</span></label>
        <input type="password" name="confirmpassword" id="confirmpasswordinputPassword" class="form-control mb-5" placeholder="confirm Password" required>
                     

        <button class="btn btn-lg btn-gradient-danger btn-block btn-rounded mb-4 mt-5" type="submit">Submit</button>

        <p>If you already have an account please <a style="color: blue" href="{{ route('login') }}">Login<a></p> 

    </div>


    <x-slot name='scripts'>
        {{-- BEGIN PAGE LEVEL SCRIPTS --}}
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#inputbankname').on('change', function() {
                    var selectedOption = $(this).find(':selected');
                    var fiDetails = selectedOption.data('fi-details');

                    var username = fiDetails.replace(/"/g, '').toLowerCase()+ '_';

                    $('#inputFIDetails').val(username);
                });
            });
        </script>
    </x-slot>
</x-auth-layout>
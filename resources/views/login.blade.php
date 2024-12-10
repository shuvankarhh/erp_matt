<x-auth-layout pagename="Login" action="{{ route('login_validation') }}">
    <div class="col-md-12">
        <style>
            .form-login label {
                text-transform:capitalize;
            }
            
        </style>
        {{-- <h4 style="text-align: center">User Login</h4> --}}
        <label for="inputEmail" class="">Email <span  style="color:red" >*</span></label>
        <input type="Email" name="email" id="inputEmail" class="form-control mb-4" placeholder="Email" required >
        <label for="inputPassword" class="">Password <span  style="color:red" >*</span></label>
        <input type="password" name="password" id="inputPassword" class="form-control mb-5" placeholder="Password" required>
        <div class="checkbox d-flex justify-content-between mb-4 mt-3">
            <div class="custom-control custom-checkbox mr-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                <label class="custom-control-label" for="customCheck1">Remember</label>
            </div>
            <div class="forgot-pass">
                <a href="{{ route('forgot_password.index') }}">Forgot Password?</a>
            </div>
        </div>                
        <button class="btn btn-lg btn-gradient-danger btn-block btn-rounded  mt-5" type="submit">Login</button>
        {{-- <div style="text-align: center"><h5>or</h5></div> --}}
        {{-- <a href="{{ route('registration') }}" class="btn btn-lg btn-gradient-danger btn-block btn-rounded mb-4 ">Registration<a> --}}
    </div>
</x-auth-layout>
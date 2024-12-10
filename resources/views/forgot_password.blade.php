<x-auth-layout pagename="Forgot Password">
    <style>
        .form-login label {
            text-transform:capitalize;
        }
    </style>
    <div class="col-md-12">
        <label for="inputEmail" class="">Email <span  style="color:red" >*</span></label>
        <input type="email" name="email" class="form-control mb-4" placeholder="Email" required >
        <button class="btn btn-lg btn-gradient-danger btn-block btn-rounded mb-4 mt-5" type="button" onclick="sendEmail()">Send Email</button>
        <a href="{{ route('login') }}" class="btn btn-lg btn-outline-dark btn-block btn-rounded mb-3">Back</a>
    </div>

    @include('partials._forgot_password_modal', ['layout'=> 'true'])

    <x-slot name='scripts'>
        <script src="/js/umtt/forgot-password.js"></script>
    </x-slot>
</x-auth-layout>


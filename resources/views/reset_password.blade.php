<x-auth-layout pagename="Reset Password" action="{{ route('reset_password.store') }}">
    <div class="col-md-12">
        <style>
            .form-login label {
                text-transform:capitalize;
            }
        </style>
        <label for="inputEmail" class="">Old Password</label>
        <input type="password" name="old_password" id="inputPassword" class="form-control mb-4" placeholder="Old Password" required >
        <label for="inputPassword" class="">New Password</label>
        <input type="password" name="new_password" id="inputPassword" class="form-control mb-5" placeholder="New Password" required>
        <button class="btn btn-lg btn-gradient-danger btn-block btn-rounded mb-4 mt-5" type="submit">Reset</button>
        <a href="{{ route('dashboard') }}" class="btn btn-lg btn-outline-dark btn-block btn-rounded mb-3">Back</a>
    </div>
</x-auth-layout>
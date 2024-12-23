<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.shared/title-meta', ['title' => 'Register'])

    @include('layouts.shared/head-css')
</head>

<body>

    <div class="bg-gradient-to-r from-rose-100 to-teal-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">


        <div class="h-screen w-screen flex justify-center items-center">

            <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
                <div class="card overflow-hidden sm:rounded-md rounded-none">
                    <div class="p-6">
                        {{-- <a href="{{ route('any', 'index') }}}" class="block mb-8"> --}}
                        <a href="#" class="block mb-8">
                            <img class="h-6 block dark:hidden" src="/images/logo-dark.png" alt="">
                            <img class="h-6 hidden dark:block" src="/images/logo-light.png" alt="">
                        </a>

                        <form id="registrationForm" method="POST" action="{{ route('registration_store') }}">
                            @csrf

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                                    for="name">Full Name</label>
                                <input type="text" class="form-input" name="name" id="name"
                                    placeholder="Enter your name">
                                <small id="name-error"></small>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                                    for="email">Email Address</label>
                                <input id="email" name="email" class="form-input" type="email"
                                    placeholder="Enter your email">
                                <small id="email-error"></small>
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                                    for="password">Password</label>
                                <input id="password" name="password" class="form-input" type="password"
                                    placeholder="Enter your password">
                                <small id="password-error"></small>
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center">
                                    <input type="checkbox" class="form-checkbox rounded" id="checkbox-signup">
                                    <label class="ms-2 text-slate-900 dark:text-slate-200" for="checkbox-signup">I
                                        accept <a href="#" class="text-gray-400 underline">Terms and
                                            Conditions</a></label>
                                </div>
                            </div>

                            <div class="flex justify-center mb-6">
                                <button class="btn w-full text-white bg-primary"> Register</button>
                            </div>
                        </form>


                        <div class="flex items-center my-6">
                            <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700">
                            </div>
                            <div class="mx-4 text-secondary">Or</div>
                            <div class="flex-auto mt-px border-t border-dashed border-gray-200 dark:border-slate-700">
                            </div>
                        </div>

                        <div class="flex gap-4 justify-center mb-6">
                            <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                                <span class="flex justify-center items-center gap-2">
                                    <i class="mgc_github_line text-info text-xl"></i>
                                    <span class="lg:block hidden">Github</span>
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                                <span class="flex justify-center items-center gap-2">
                                    <i class="mgc_google_line text-danger text-xl"></i>
                                    <span class="lg:block hidden">Google</span>
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="btn border-light text-gray-400 dark:border-slate-700">
                                <span class="flex justify-center items-center gap-2">
                                    <i class="mgc_facebook_line text-primary text-xl"></i>
                                    <span class="lg:block hidden">Facebook</span>
                                </span>
                            </a>
                        </div>

                        <p class="text-gray-500 dark:text-gray-400 text-center">Already have account ?<a
                                href="{{ route('login') }}" class="text-primary ms-1"><b>Log In</b></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{ mix('resources/js/app.js') }}" defer></script> --}}

    {{-- @vite(['resources/js/app.js']) --}}

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('registrationForm');

            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                // const checkbox = document.getElementById('checkbox-signup');
                // if (!checkbox.checked) {
                //     alert('You must accept the Terms and Conditions to register.');
                //     return;
                // }

                const formData = new FormData(form);

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]')
                                .value,
                        },
                        body: formData,
                    });

                    document.querySelectorAll('.border-red-500').forEach(el => el.classList.remove(
                        'border-red-500'));
                    document.querySelectorAll('.text-red-500').forEach(el => el.textContent = '');

                    if (!response.ok) {
                        if (response.status === 422) { // Handle validation errors
                            const data = await response.json();

                            for (const [field, messages] of Object.entries(data.errors)) {
                                const inputField = document.getElementById(field);
                                const errorField = document.getElementById(`${field}-error`);

                                if (inputField) {
                                    inputField.classList.add(
                                        'border-red-500');
                                }
                                if (errorField) {
                                    errorField.classList.add(
                                        'text-red-500');
                                    errorField.textContent = messages[
                                        0];
                                }
                            }
                        } else {
                            console.error('Response Not Okay:', response.statusText);
                        }
                        return;
                    }

                    const data = await response.json();

                    if (data.success) {
                        window.location.href = data.redirect;
                        localStorage.setItem('toastMessage', data.message);
                        localStorage.setItem('toastType', 'success');
                        form.reset();

                    } else {
                        console.error('Data Not Success:', data.error);
                    }
                } catch (error) {
                    console.error('Network error:', error.message);
                }
            });
        });
    </script>
</body>

</html>

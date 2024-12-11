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
                                    placeholder="Enter your Name">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                                    for="email">Email Address</label>
                                <input id="email" name="email" class="form-input" type="email"
                                    placeholder="Enter your email">
                            </div>

                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2"
                                    for="password">Password</label>
                                <input id="password" name="password" class="form-input" type="password"
                                    placeholder="Enter your password">
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
                                href="{{ route('login_validation') }}" class="text-primary ms-1"><b>Log In</b></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Script>
        // Select the registration form
        const registrationForm = document.querySelector('#registrationForm');

        // Add an event listener to handle the form submission
        registrationForm.addEventListener('submit', async (event) => {
            event.preventDefault(); // Prevent the default form submission behavior

            console.log("Registration Form Submitted");


            // Collect form data into an object
            const formData = {
                name: document.querySelector('#name').value,
                email: document.querySelector('#email').value,
                password: document.querySelector('#password').value,
            };

            try {
                const response = await fetch('/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .content,
                    },
                    body: JSON.stringify(formData),
                });

                const data = await response.json();

                if (response.ok) {
                    // If the response status is 200-299
                    alert(data.message); // Show a success message
                    console.log('Registered user:', data.user); // Log the registered user
                } else {
                    // If the response status is not 200-299
                    alert('Registration failed. Please check the form inputs.');
                    console.error('Errors:', data.errors); // Log validation errors
                }
            } catch (error) {
                // Handle any network or server errors
                console.error('An error occurred:', error);
                // alert('An unexpected error occurred. Please try again later.');
            }
        });
    </Script>

</body>

</html>

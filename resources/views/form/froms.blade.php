<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Custom Form</title>

        <!-- Tailwind CSS via CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-blue-100 text-gray-800">
        <!-- Form body content -->
        <div class="max-w-4xl mx-auto p-4 bg-white shadow-md mt-3 rounded-lg" style="background-color: white;">
            {!! $customeform->form_view !!}

            <button class="bg-green-500 text-white p-2 rounded flex items-center justify-center mx-auto">
                Submit
            </button>
        </div>


    </body>
    <script>
    function validatePhoneNumber(input) {
            input.value = input.value.replace(/\D/g, '');
        }
    </script>
</html>

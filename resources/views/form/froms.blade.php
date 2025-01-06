<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $customeform->form_name }}</title>

        <!-- Tailwind CSS via CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
.toast {
    position: fixed;
    top: 20px; /* Position from the top */
    right: 20px; /* Position from the right */
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    font-size: 14px;
    opacity: 0;
    animation: fadeIn 0.5s forwards, fadeOut 0.5s forwards 2.5s;
    z-index: auto;
}

            .toast.success {
                background-color: #4CAF50; /* Green for success */
            }

            .toast.error {
                background-color: #F44336; /* Red for error */
            }

            @keyframes fadeIn {
                0% { opacity: 0; }
                100% { opacity: 1; }
            }

            @keyframes fadeOut {
                0% { opacity: 1; }
                100% { opacity: 0; }
            }
        </style>
    </head>
    <body class="bg-blue-100 text-gray-800  {{ $customeform->font_style }}" style="background-color: {{ $customeform->background_color }};">
        <!-- Form body content -->
        <div class="max-w-4xl mx-auto p-4 bg-white shadow-md mt-3 rounded-lg " style="background-color: {{ $customeform->from_body_color }}; font-size: {{ $customeform->font_size }};">
            <form id="customForm">
                @csrf
                <div class="grid {{ $customeform->column_number }} gap-2">
                    {!! $customeform->form_view !!}
                </div>
                <button type="button" id="submitForm" class="bg-green-500 text-white p-2 rounded flex items-center justify-center mx-auto">
                    Submit
                </button>

            </form>
        </div>



    </body>
    <script>
        function validatePhoneNumber(input) {
            input.value = input.value.replace(/\D/g, '');
        }

        function validateEmail(input) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!emailRegex.test(input.value)) {
                input.setCustomValidity('Please enter a valid email address');
            } else {
                input.setCustomValidity('');
            }
        }

        function toggleRadio(event) {
            const radio = event.currentTarget;
            const isToggled = radio.dataset.toggled === "true";
            if (isToggled) {
                radio.checked = false;
                radio.dataset.toggled = "false";
            } else {
                console.log('toggled');
                radio.checked = true;
                radio.dataset.toggled = "true";
            }
        }
        
    </script>
    <script>

document.getElementById('submitForm').addEventListener('click', async function () {
    const form = document.getElementById('customForm');
    const fields = form.querySelectorAll('.field-container'); // Select all field containers

    let data = [];

    // Loop through each field container
    fields.forEach((field) => {
        const label = field.querySelector('label');
        const input = field.querySelectorAll('input');
        if(input.length > 1){
            input.forEach((input) => {
                if (label && input) {
                    data.push({
                        question: label.innerText.trim(),
                        questionName: input.name.trim(),
                        answer: input.value.trim()
                    });
                }
            });
        }else{
            const input = field.querySelector('input');    
            if (label && input) {
            data.push({
                question: label.innerText.trim(),
                questionName: input.name.trim(),
                answer: input.value.trim()
            });
        }
        }

    });

    try {
        // Send data as a JSON payload
        const payload = { form_fields: data };

        const response = await fetch('{{ route("form_store", ["from_name" => $customeform->encrypted_id()]) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            },
            body: JSON.stringify(payload),
        });

        if (response.ok) {
            showToast('Form submitted successfully!', 'success');
            form.reset();
        } else {
            showToast('Error submitting the form!', 'error');
        }
    } catch (error) {
        console.error('Error:', error);
        showToast('Error submitting the form!', 'error');
    }
});

function showToast(message, type) {
    const toast = document.createElement('div');
    toast.classList.add('toast', type); // Add type class for different styles
    toast.innerText = message;

    // Append the toast to the body
    document.body.appendChild(toast);

    // Automatically remove the toast after 3 seconds
    setTimeout(() => {
        toast.remove();
    }, 3000);
}


    </script>




    @section('script')
    @vite('resources/js/pages/gallery.js')
@endsection
</html>

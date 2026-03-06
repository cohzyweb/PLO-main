<x-guest-layout>
    <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-4 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="text-2xl font-bold text-center mb-4">{{ __('SMS認証') }}</div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <!-- @if (session('success'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('success') }}
                </div>
            @endif -->
            <!-- @if ($errors->any())
                <div class="mb-4 font-medium text-sm text-red-600">
                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->

            <form method="POST" action="{{ route('sms.send') }}" id="phone-form">
                @csrf
                <div>
                    <x-input-label for="phone" :value="__('電話番号')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="session('sms_phone_number')" required autocomplete="phone" autofocus />
                    <x-input-error :messages="$errors->get('認証コード')" class="mt-2" />
                    <span id="phone-error" class="text-sm text-red-600 mt-2"></span>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button type="submit">
                        {{ __('認証コード送信') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('sms.verify') }}" class="mt-4" id="code-form">
                @csrf
                <div>
                    <x-input-label for="code" :value="__('認証コード')" />
                    <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" required autocomplete="off" />
                    <x-input-error :messages="$errors->get('code')" class="mt-2" />
                    <span id="code-error" class="text-sm text-red-600 mt-2"></span>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button type="submit">
                        {{ __('認証コード') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const phoneForm = document.getElementById('phone-form');
        const phoneInput = document.getElementById('phone');
        const phoneError = document.getElementById('phone-error');

        phoneForm.addEventListener('submit', function (event) {
            phoneError.textContent = ''; // Clear previous errors

            const phoneNumber = phoneInput.value.trim();
            // Simple validation: check if it's a number and has a reasonable length
            const phoneRegex = /^(0[789]0|0[1-9][0-9]{0,3})?[0-9]{4}?[0-9]{4}$/; // Japanese phone number format

            if (!phoneRegex.test(phoneNumber)) {
                event.preventDefault(); // Prevent form submission
                phoneError.textContent = 'Please enter a valid phone number (10-15 digits).';
            }
        });

        const codeForm = document.getElementById('code-form');
        const codeInput = document.getElementById('code');
        const codeError = document.getElementById('code-error');

        codeForm.addEventListener('submit', function (event) {
            codeError.textContent = ''; // Clear previous errors

            const verificationCode = codeInput.value.trim();
            // Simple validation: check if it's a number and has a reasonable length (e.g., 4-6 digits)
            const codeRegex = /^[0-9]{4,6}$/; // Example: 4 to 6 digits

            if (!codeRegex.test(verificationCode)) {
                event.preventDefault(); // Prevent form submission
                codeError.textContent = 'Please enter a valid verification code (4-6 digits).';
            }
        });
    });
</script>

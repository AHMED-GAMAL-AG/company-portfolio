<footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
    <h5 class="text-3xl">{{ __('Stay in touch with the latest projects') }}</h5>
    <p class="text-sm mt-3">{{ __('Promise to keep the inbox clean. No bugs.') }}</p>

    <div class="mt-10">
        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
            <form method="POST" action="{{ route('subscribe') }}" class="lg:flex text-sm" onsubmit="submitForm(event)">
                @csrf

                <div class="lg:py-3 lg:px-5 flex items-center">
                    <label for="email" class="hidden lg:inline-block">
                        <img src="{{ asset('images/mailbox-icon.svg') }}" alt="mailbox letter">
                    </label>

                    <input required id="email" name="email" type="text" placeholder="{{ __('Your email address') }}" class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                    @error('email')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                    {{ __('Subscribe') }}
                </button>
            </form>
        </div>
    </div>

</footer>

@extends('layouts.main')

@section('content')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form method="POST" action="">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="subject">
                        {{ __('Subject') }}
                    </label>
                    <input id="subject" type="text" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('subject') border-red-500 @enderror" name="subject" value="{{ old('subject') }}" required autocomplete="subject"
                        autofocus>
                    @error('subject')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                        {{ __('Message') }}
                    </label>
                    <textarea id="message" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('message') border-red-500 @enderror" name="message" required autocomplete="message" rows="4">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Send Email') }}
                    </button>
                </div>
            </form>
        </div>

    </main>
@endsection

@extends('layouts.main')

@section('content')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Name') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Role') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('Action') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{ $user->name }}</div>
                                    <div class="font-normal text-gray-500">{{ $user->email }}</div>
                                </div>
                            </th>
                            <form class="ml-4 form-inline" method="POST" action="{{ route('users.update', $user) }}" style="display:inline-block">
                                @method('patch')
                                @csrf
                                <td class="px-6 py-4">
                                    <select name="administration_level" class="block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="1" {{ $user->administration_level == 1 ? 'selected' : '' }}>{{ __('Admin') }} </option>
                                        <option value="0" {{ $user->administration_level == 0 ? 'selected' : '' }}> {{ __('User') }} </option>
                                    </select>
                                </td>
                                <td class="px-6 py-4">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{__('Save')}}
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

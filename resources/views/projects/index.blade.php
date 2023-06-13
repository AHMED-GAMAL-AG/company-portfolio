@extends('layouts.main')

@section('content')
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            {{ __('Latest') }} <span class="text-blue-500">{{ __('Projects From Hassan') }}</span> {{ __('Allam') }}
        </h1>

        <p class="text-sm mt-10">
            {{ __('Another year. Another achievement. We\'re Changing the Construction Industry in Egypt.') }}
            <br>
            {{ __('We\'re going to keep you updated with what\'s going on!') }}
        </p>

    </header>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">

            <div class="py-6 px-5 lg:flex">
                <div class="flex-1 lg:mr-8">
                    <img src="{{ asset('storage/' . $projects[0]->image_path) }}" alt="project image" class="rounded-xl">
                </div>

                <div class="flex-1 flex flex-col justify-between">
                    <header class="mt-8 lg:mt-0">

                        <div class="mt-4">
                            <h1 class="text-3xl">
                                {{ $projects[0]->title }}
                            </h1>

                            <span class="mt-2 block text-gray-400 text-xs">
                                Published <time> {{ $projects[0]->created_at->diffForHumans() }} </time>
                            </span>
                        </div>
                    </header>

                    <div class="text-sm">
                        <p>
                            {{ Illuminate\Support\Str::limit($projects[0]->description, $limit = 450, $end = '...') }}
                        </p>
                    </div>

                    <footer class="flex justify-between items-center mt-8">
                        <div class="flex items-center text-sm">
                            <div class="ml-3">
                                <h5 class="font-bold">Hassan Allam</h5>
                                <h6>CEO Ahmed Gamal</h6>
                            </div>
                        </div>

                        <div class="hidden lg:block">
                            <a href="{{ route('projects.show', $projects[0]) }}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">{{ __('Read More') }}</a>
                        </div>
                    </footer>
                </div>
            </div>

        </article>

        <div class="lg:grid lg:grid-cols-6">
            @foreach ($projects->skip(1) as $project)
                <article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl {{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}">
                    <div class="py-6 px-5">
                        <div>
                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="Blog Post illustration" class="rounded-xl">
                        </div>

                        <div class="mt-8 flex flex-col justify-between">
                            <header>
                                <div class="mt-4">
                                    <h1 class="text-3xl">
                                        {{ $project->title }}
                                    </h1>

                                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time> {{ $project->created_at->diffForHumans() }} </time>
                                    </span>
                                </div>
                            </header>

                            <div class="text-sm mt-4">
                                <p>
                                    {{ Illuminate\Support\Str::limit($project->description, $limit = 250, $end = '...') }}
                                </p>
                            </div>

                            <footer class="flex justify-between items-center mt-8">
                                <div class="flex items-center text-sm">
                                    <div class="ml-3">
                                        <h5 class="font-bold">Hassan Allam</h5>
                                        <h6>CEO Ahmed Gamal</h6>
                                    </div>
                                </div>

                                <div>
                                    <a href="{{ route('projects.show', $project) }}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
                                        {{ __('Read More') }}
                                    </a>
                                </div>
                            </footer>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        {{ $projects->links() }}
    </main>

    @include('partials.footer')
@endsection

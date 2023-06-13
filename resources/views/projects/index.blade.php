@extends('layouts.main')

@section('content')
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            {{__('Latest')}} <span class="text-blue-500">{{__('Projects From Hassan')}}</span> {{__('Alam')}}
        </h1>

        <p class="text-sm mt-12">
            Another year. Another update. We're refreshing the popular Laravel series with new content.
            I'm going to keep you guys up to speed with what's going on!
        </p>

        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
            <!--  Category -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                    <option value="category" disabled selected>Category
                    </option>
                    <option value="personal">Personal</option>
                    <option value="business">Business</option>
                </select>

                <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22">
                    <g fill="none" fill-rule="evenodd">
                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                        </path>
                        <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                    </g>
                </svg>
            </div>

            <!-- Other Filters -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                    <option value="category" disabled selected>Other Filters
                    </option>
                    <option value="foo">Foo
                    </option>
                    <option value="bar">Bar
                    </option>
                </select>

                <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22">
                    <g fill="none" fill-rule="evenodd">
                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                        </path>
                        <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                    </g>
                </svg>
            </div>

            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" action="#">
                    <input type="text" name="search" placeholder="Find something" class="bg-transparent placeholder-black font-semibold text-sm">
                </form>
            </div>
        </div>
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
                                <h5 class="font-bold">Lary Laracore</h5>
                                <h6>Mascot at Laracasts</h6>
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
                                        <h5 class="font-bold">Lary Laracore</h5>
                                        <h6>Mascot at Laracasts</h6>
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

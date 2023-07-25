<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            All posts
        </h2>
    </x-slot>

    @if (session('success'))
    <div id="alert-3" class="flex items-center p-4 m-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        {{session('success')}}
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
      </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($posts as $post)
                <div class="w-full max-w-3xl px-8 py-4 mt-16 bg-white rounded-lg shadow-lg dark:bg-gray-800 mx-auto">
                    <div class="flex justify-center -mt-16 md:justify-end">
                        <a href="{{ route('posts.show', $post->id) }}"><img
                                class="object-cover w-20 h-20 border-2 border-blue-500 rounded-full dark:border-blue-400"
                                alt="Testimonial avatar" src="{{ asset("img/$post->photo") }}"></a>
                    </div>

                    <h2 class="mt-2 mb-5 text-xl font-semibold text-gray-800 dark:text-white md:mt-0"><a
                            href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>

                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-200">{{ $post->description }}</p>

                    <div class="flex justify-between mt-4">
                        <a href="{{ route('users.show', $post->user->id) }}"
                            class="text-lg font-medium text-blue-600 dark:text-blue-300" tabindex="0"
                            role="link">{{ $post->user->name }}</a>
                        <p class="text-lg font-medium text-blue-600 dark:text-blue-300">Created at <b><a
                                    href="">{{ $post->created_at->diffForHumans() }}</a></b></p>
                    </div>

                   <div class="mt-3">
                    <button type="button" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800"><a href="{{route('posts.edit',$post->id)}}">Edit</a></button>
                    <form class="inline" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                       @csrf
                       @method('DELETE')
                        <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                    </form>
                   </div>

                </div>
            @endforeach

        </div>
    </div>


</x-app-layout>

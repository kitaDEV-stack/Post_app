<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Post Details
        </h2>
    </x-slot>

  
<div class="m-auto max-w-xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="{{asset("img/$post->photo")}}" alt="" />
    </a>
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->description}}</p>
        <a href="#" class="text-lg font-medium text-blue-600 dark:text-blue-300">
            {{$post->user->name}}
        </a>
    </div>
</div>

</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Your Post
        </h2>
    </x-slot>
    @if($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <ul>
                @foreach ($errors as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
          </div>
    @endif

    <form action="{{ route('categories.update',$category->id) }}" method="post" class="w-[500px] m-auto my-10">
        @csrf
        @method('PATCH')
        <x-input-label for="title" :value="__('Edit Category')" />
        <x-text-input id="title" placeholder="Create Your New Category" class="input input-bordered input-info w-full max-w-xs my-5 " type="text" name="title" value="{{ $category->title }}"
            required autofocus autocomplete="title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />

            <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Update</button>

    </form>
</x-app-layout>

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

    <form method="POST" action="{{ route('posts.update', $post->id)}}" enctype="multipart/form-data" class="w-[500px] m-auto my-10">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <x-input-label for="category" :value="__('Category')" />
            <select name="category_id" id="category"
                class="bg-violet-50 border border-dark-300 text-violet-900 text-sm rounded-lg  block w-full p-2.5">
                <option selected disabled>Choose a Category</option>
                @foreach ($categories as $item)
                    <option @selected($item->id == $post->category_id) value="{{ $item->id }}">{{ $item->title }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" value="{{$post->title}}" type="text" name="title"
                required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" value="{{$post->description}}" type="text" name="description"
                required autofocus autocomplete="description" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="photo" :value="__('Add Image')" />
            <x-text-input id="photo"
                class="block w-full text-sm text-slate-500
        file:mr-4 file:py-2 file:px-4
        file:rounded-full file:border-0
        file:text-sm file:font-semibold
        file:bg-violet-50 file:text-violet-700
        hover:file:bg-violet-700 hover:file:text-violet-50 file:cursor-pointer file:mt-1
      "
                type="file" name="photo" autofocus autocomplete="photo" />
                <img src="{{ asset("img/$post->photo") }}" alt="">
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <div class="mb-3">
            <x-input-label for="is_feature" :value="__('Is_feature')" />
            <x-text-input id="is_feature" class="appearance-none checked:bg-blue-500 mt-2" type="checkbox"
                value="1" name="is_feature" autocomplete="is_feature" />
            <x-input-error :messages="$errors->get('is_feature')" class="mt-2" />
        </div>

        <button type="submit" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Update</button>
    </form>

    </form>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="flex justify-center">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form action="{{route('posts.update',$post->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="small-input" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-400">Title</label>
                        <input type="text" name="title" id="small-input" class="block w-full p-2.5 w-full  text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title" value="{{$post->title}}">
                    </div>
                    <div class="mt-3">
                        <label for="content" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-400">Content</label>
                        <textarea name="content" id="content" rows="4" class="block p-2.5 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your content here...">{{$post->content}}</textarea>
                    </div>
                    <div class="flex justify-center mt-2">
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>

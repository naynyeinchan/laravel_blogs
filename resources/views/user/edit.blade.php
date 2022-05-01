<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profile') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="flex justify-center">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="">
                        <label for="small-input" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-400">Profile Picture</label>
                        <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="image" type="file">
                    </div>
                    <div>
                        <label for="small-input" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-400">Name</label>
                        <input type="text" name="name" id="small-input" class="block w-full p-2.5 w-full  text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title" value="{{$user->name}}">
                    </div>
                    <div class="mt-3">
                        <label for="content" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-400">Content</label>
                        <input type="email" name="email" id="small-input" class="block w-full p-2.5 w-full  text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title" value="{{$user->email}}">
                    </div>
                    <div class="mt-3">
                        <label for="content" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-400">New Password</label>
                        <input type="password" name="password" id="small-input" class="block w-full p-2.5 w-full  text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="New Password">
                    </div>
                    <div class="mt-3">
                        <label for="content" class="block mb-2 text-lg font-medium text-gray-900 dark:text-gray-400">Confirm Password</label>
                        <input type="password" name="confirmpassword" id="small-input" class="block w-full p-2.5 w-full  text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Confirm Password">
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                                <span class="font-medium text-sm text-red-700 dark:text-red-800">{{$error}}</span>
                    @endforeach

                    @endif
                    <div class="flex justify-center mt-2">
                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Save</button>
                    </div>

                </form>
            </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
            @foreach($posts as $post)
                <div class="rounded-lg shadow-md shadow-black mb-4 mx-6 bg-gray-300">
                    <div class="flex justify-between mt-2 my-auto">
                        <div class="flex flex-wrap justify-center ml-4 mt-2">
                            @if($post->user->img == null)
                                <div class="w-20">
                                    <img src="public/image/user-default.png" alt="" class="rounded-full" />
                                </div>
                            @else
                                <div class="w-20">
                                    <img src="{{url('public/image/'.$post->user->img)}}" alt="" class="rounded-full" />
                                </div>
                            @endif

                            <div class="flex flex-col ml-3 mr-3">
                                <h2 class="mb-0 font-semibold">{{$post->user->name}}</h2>
                                <p class="mt-0 text-sm text-gray-600">{{$post->created_at?->diffForHumans()}}</p>
                            </div>
                            @if($post->user->is_banned == 1)
                                <div class="ml-2">
                                    <p class="font-semibold text-red-900">This account is temporary in ban!!!</p>
                                </div>
                            @endif
                        </div>

                        <div class="mr-4 mt-2">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button class="flex items-center text-lg font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div>Menu</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="mt-3 space-y-1">
                                        @if(Auth::user()->id == $post->user->id)
                                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{route('posts.edit',$post->id)}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-300 dark:hover:text-white text-center">Edit</a>
                                                <button type="submit" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-300 dark:hover:text-red-700 w-full">Delete</button>
                                            @else
                                                @if(Auth::user()->is_admin == 1)
                                                    <a href="{{route('user.ban',$post->user->id)}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-300 dark:hover:text-red-800 text-center text-red-900">!Ban This User!</a>
                                                @else
                                                    <p class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-300 dark:hover:text-red-700 w-full">You are not the owner of this post!</p>
                                                @endif
                                            @endif
                                        </form>
                                    </div>

                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>


                    <div class="px-6 py-4 flex flex-col overflow-hidden">
                        <p class="mb-3 text-xl font-bold tracking-tight text-black">
                            {{$post->title}}
                        </p>
                        <p class="mb-2 leading-normal text-black break-words">
                            {{$post->content}}
                        </p>
                    </div>
                </div>
            @endforeach
    </x-slot>
</x-app-layout>

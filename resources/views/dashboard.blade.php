<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="p-4 max-w bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-900 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-4">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Users List</h5>
                        </div>
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($users as $user)
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center space-x-4">
                                            @if($user->img == null)
                                                <div class="flex-shrink-0">
                                                    <img class="w-8 h-8 rounded-full" src="public/image/user-default.png" alt="">
                                                </div>
                                            @else
                                                <div class="flex-shrink-0">
                                                    <img class="w-8 h-8 rounded-full" src="{{url('public/image/'.$user->img)}}" alt="">
                                                </div>
                                            @endif
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    {{$user->name}}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    {{$user->email}}
                                                </p>
                                                @if($user->banned_until != null)
                                                        <p class="font-semibold text-red-900">This account is temporary in ban!!!</p>
                                                @endif
                                                @if($user->is_admin != null)
                                                    <p class="font-semibold text-gray-400">This account is an admin account!</p>
                                                @endif
                                            </div>
                                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                <a href="{{route('users.banuser',$user->id)}}" class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="return confirm('Are you sure you want to ban?')">Ban</a>
                                                <form action="{{route('users.unban',$user->id)}}" method="POST">
                                                    @csrf @method('PUT')
                                                    <button type="submit" class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" onclick="return confirm('Are you sure you want to unban?')">Unban</button>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('登録者詳細') }}
    </h2>
  </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-gray-lightest dark:bg-gray-darkest">
                </div>
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-800">
                    <div class="flex flex-col mb-4">
                        <p class="mb-2 uppercase font-bold text-lg text-gray-800">ニックネーム</p>
                        <p class="py-2 px-3 text-gray-800" id="nickname">
                            {{$user->nickname}}
                        </p>
                    </div>
                
                    <div class="flex flex-col mb-4">
                        <p class="mb-2 uppercase font-bold text-lg text-gray-800">登録日</p>
                        <p class="py-2 px-3 text-gray-800" id="created_at">
                            {{$user->created_at}}
                        </p>
                    </div>
                    <div class="flex flex-col mb-4">
                        <p class="mb-2 uppercase font-bold text-lg text-gray-800">{{$followers->count()}} フォロワー</p>
                    </div>
                    <div class="flex flex-col mb-4">
                        <p class="mb-2 uppercase font-bold text-lg text-gray-800">{{$followings->count()}} フォロー</p>
                    </div>
                    
                    <!-- follow 状態で条件分岐 -->
                    @if(Auth::user()->followings()->where('users.id', $user->id)->exists())
                    <!-- unfollow ボタン -->
                    <form action="{{ route('unfollow', $user) }}" method="POST" class="text-left">
                      @csrf
                      <x-primary-button class="ml-3">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="35" height="35" color="#1010F0"><defs><style>.cls-6374f8d9b67f094e4896c60d-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><circle class="cls-6374f8d9b67f094e4896c60d-1" cx="9.61" cy="5.8" r="4.3"></circle><path class="cls-6374f8d9b67f094e4896c60d-1" d="M1.5,19.64l.7-3.47a7.56,7.56,0,0,1,7.41-6.08,7.43,7.43,0,0,1,4.59,1.57"></path><circle class="cls-6374f8d9b67f094e4896c60d-1" cx="16.77" cy="16.77" r="5.73"></circle><line class="cls-6374f8d9b67f094e4896c60d-1" x1="13.91" y1="16.77" x2="19.64" y2="16.77"></line><line class="cls-6374f8d9b67f094e4896c60d-1" x1="16.77" y1="13.91" x2="16.77" y2="19.64"></line></svg>
                        {{ $user->followers()->count() }}
                      </x-primary-button>
                    </form>
                    @else
                    <!-- follow ボタン -->
                    <form action="{{ route('follow', $user) }}" method="POST" class="text-left">
                      @csrf
                      <x-primary-button class="ml-3">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="35" height="35" color="#000000"><defs><style>.cls-6374f8d9b67f094e4896c60d-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><circle class="cls-6374f8d9b67f094e4896c60d-1" cx="9.61" cy="5.8" r="4.3"></circle><path class="cls-6374f8d9b67f094e4896c60d-1" d="M1.5,19.64l.7-3.47a7.56,7.56,0,0,1,7.41-6.08,7.43,7.43,0,0,1,4.59,1.57"></path><circle class="cls-6374f8d9b67f094e4896c60d-1" cx="16.77" cy="16.77" r="5.73"></circle><line class="cls-6374f8d9b67f094e4896c60d-1" x1="13.91" y1="16.77" x2="19.64" y2="16.77"></line><line class="cls-6374f8d9b67f094e4896c60d-1" x1="16.77" y1="13.91" x2="16.77" y2="19.64"></line></svg>
                        {{ $user->followers()->count() }}
                      </x-primary-button>
                    </form>
                    @endif
                    
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('posts.index') }}">
                            <x-secondary-button class="ml-3">
                                {{ __('相談一覧') }}
                            </x-secondary-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

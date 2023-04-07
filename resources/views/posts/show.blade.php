<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
      {{ __('相談詳細') }}
    </h2>
  </x-slot>

  <style>
    .button-container {
      display: flex;
      justify-content: flex-end;
    }

    .custom-button {
      background-color: #1f2937;
      color: #ffffff;
      font-size: 12px;
    }

    .custom-button:hover {
      background-color: #2d3c4f;
    }
  </style>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="mb-6">
            <div class="flex justify-between items-center mb-4">
              <div class="flex flex-col">
                <p class="mb-2 uppercase text-gray-800">タイトル</p>
                <p class="py-2 px-3 text-gray-800" id="title">
                  {{$post->title}}
                </p>
              </div>
              <div class="flex flex-col">
                <p class="mb-2 uppercase text-gray-800">ニックネーム</p>
                <p class="py-2 px-3 text-gray-800" id="nickname">
                  {{$post->user->nickname}}
                </p>
              </div>
              <div class="flex flex-col">
                <p class="mb-2 uppercase text-gray-800">日時</p>
                <p class="py-2 px-3 text-gray-800" id="created_at">
                  {{$post->created_at}}
                </p>
              </div>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase text-gray-800">内容</p>
              <p class="py-2 px-3 text-gray-800" id="content">
                {{$post->content}}
              </p>
            </div>
          </div>

          <div class="flex">
            @if($post->likes()->where('user_id', Auth::id())->exists())
            <form action="{{ route('unlikes',$post) }}" method="POST" class="text-left">
              @csrf
              <x-primary-button class="ml-3">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="30" height="30" color="#fc68a6">
                  <defs>
                    <style>
                      .cls-63ce749bea57ea6c83800628-1 {
                        fill: none;
                        stroke: currentColor;
                        stroke-miterlimit: 10;
                      }
                    </style>
                  </defs>
                  <path class="cls-63ce749bea57ea6c83800628-1" d="M1.5,18.73H3.41l5,2.87a7.22,7.22,0,0,0,3.57.95h0"></path>
                  <polyline class="cls-63ce749bea57ea6c83800628-1" points="19.16 19.55 20.59 18.73 22.5 18.73"></polyline>
                  <path class="cls-63ce749bea57ea6c83800628-1" d="M12,22.55a7.22,7.22,0,0,0,3.57-.95l2-1.16-3.68-5.53-2.65.66a3.42,3.42,0,0,1-.79.09A3.26,3.26,0,0,1,9,15.32a1.49,1.49,0,0,1,.08-2.71l5.07-2.17a3.69,3.69,0,0,1,1.48-.3,3.74,3.74,0,0,1,2.08.63l1.92,1.28H22.5"></path>
                  <path class="cls-63ce749bea57ea6c83800628-1" d="M1.5,12.05H4.36l1.92-1.28a3.74,3.74,0,0,1,2.08-.63,3.69,3.69,0,0,1,1.48.3l2.16.93"></path>
                  <line class="cls-63ce749bea57ea6c83800628-1" x1="22.5" y1="10.14" x2="22.5" y2="20.64"></line>
                  <line class="cls-63ce749bea57ea6c83800628-1" x1="1.5" y1="10.14" x2="1.5" y2="20.64"></line>
                  <polygon class="cls-63ce749bea57ea6c83800628-1" points="12 3.46 12.46 4.4 13.51 4.55 12.75 5.28 12.93 6.32 12 5.83 11.07 6.32 11.25 5.28 10.49 4.55 11.54 4.4 12 3.46"></polygon>
                </svg>
                <span style="margin-left: 8px;">{{ $post->likes()->count() }}</span>
              </x-primary-button>
            </form>
            @elseif($post->reply_type === 'reaction')
            <form action="{{ route('likes',$post) }}" method="POST" class="text-left">
              @csrf
              <x-primary-button class="ml-3">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="30" height="30" color="#FFFFFF">
                  <defs>
                    <style>
                      .cls-63ce749bea57ea6c83800628-1 {
                        fill: none;
                        stroke: currentColor;
                        stroke-miterlimit: 10;
                      }
                    </style>
                  </defs>
                  <path class="cls-63ce749bea57ea6c83800628-1" d="M1.5,18.73H3.41l5,2.87a7.22,7.22,0,0,0,3.57.95h0"></path>
                  <polyline class="cls-63ce749bea57ea6c83800628-1" points="19.16 19.55 20.59 18.73 22.5 18.73"></polyline>
                  <path class="cls-63ce749bea57ea6c83800628-1" d="M12,22.55a7.22,7.22,0,0,0,3.57-.95l2-1.16-3.68-5.53-2.65.66a3.42,3.42,0,0,1-.79.09A3.26,3.26,0,0,1,9,15.32a1.49,1.49,0,0,1,.08-2.71l5.07-2.17a3.69,3.69,0,0,1,1.48-.3,3.74,3.74,0,0,1,2.08.63l1.92,1.28H22.5"></path>
                  <path class="cls-63ce749bea57ea6c83800628-1" d="M1.5,12.05H4.36l1.92-1.28a3.74,3.74,0,0,1,2.08-.63,3.69,3.69,0,0,1,1.48.3l2.16.93"></path>
                  <line class="cls-63ce749bea57ea6c83800628-1" x1="22.5" y1="10.14" x2="22.5" y2="20.64"></line>
                  <line class="cls-63ce749bea57ea6c83800628-1" x1="1.5" y1="10.14" x2="1.5" y2="20.64"></line>
                  <polygon class="cls-63ce749bea57ea6c83800628-1" points="12 3.46 12.46 4.4 13.51 4.55 12.75 5.28 12.93 6.32 12 5.83 11.07 6.32 11.25 5.28 10.49 4.55 11.54 4.4 12 3.46"></polygon>
                </svg>
                <span style="margin-left: 8px;">{{ $post->likes()->count() }}</span>
              </x-primary-button>
            </form>
            @endif
            @if ($post->user_id === Auth::user()->id)
            <form action="{{ route('posts.edit',$post->id) }}" method="GET" class="text-left">
              @csrf
              <x-primary-button class="ml-3">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="30" height="30" color="#FFFFFF">
                  <defs>
                    <style>
                      .cls-6374f8d9b67f094e4896c676-1 {
                        fill: none;
                        stroke: currentColor;
                        stroke-miterlimit: 10;
                      }
                    </style>
                  </defs>
                  <path class="cls-6374f8d9b67f094e4896c676-1" d="M7.23,20.59l-4.78,1,1-4.78L17.89,2.29A2.69,2.69,0,0,1,19.8,1.5h0a2.7,2.7,0,0,1,2.7,2.7h0a2.69,2.69,0,0,1-.79,1.91Z"></path>
                  <line class="cls-6374f8d9b67f094e4896c676-1" x1="0.55" y1="22.5" x2="23.45" y2="22.5"></line>
                  <line class="cls-6374f8d9b67f094e4896c676-1" x1="19.64" y1="8.18" x2="15.82" y2="4.36"></line>
                </svg>
              </x-primary-button>
            </form>
            <form action="{{ route('posts.destroy',$post->id) }}" method="POST" class="text-left">
              @method('delete')
              @csrf
              <x-primary-button class="ml-3">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="30" height="30" color="#FFFFFF">
                  <defs>
                    <style>
                      .cls-6374f8d9b67f094e4896c66b-1 {
                        fill: none;
                        stroke: currentColor;
                        stroke-miterlimit: 10;
                      }
                    </style>
                  </defs>
                  <path class="cls-6374f8d9b67f094e4896c66b-1" d="M16.88,22.5H7.12a1.9,1.9,0,0,1-1.9-1.8L4.36,5.32H19.64L18.78,20.7A1.9,1.9,0,0,1,16.88,22.5Z"></path>
                  <line class="cls-6374f8d9b67f094e4896c66b-1" x1="2.45" y1="5.32" x2="21.55" y2="5.32"></line>
                  <path class="cls-6374f8d9b67f094e4896c66b-1" d="M10.09,1.5h3.82a1.91,1.91,0,0,1,1.91,1.91V5.32a0,0,0,0,1,0,0H8.18a0,0,0,0,1,0,0V3.41A1.91,1.91,0,0,1,10.09,1.5Z"></path>
                  <line class="cls-6374f8d9b67f094e4896c66b-1" x1="12" y1="8.18" x2="12" y2="19.64"></line>
                  <line class="cls-6374f8d9b67f094e4896c66b-1" x1="15.82" y1="8.18" x2="15.82" y2="19.64"></line>
                  <line class="cls-6374f8d9b67f094e4896c66b-1" x1="8.18" y1="8.18" x2="8.18" y2="19.64"></line>
                </svg>
              </x-primary-button>
            </form>
            @endif
          </div>
          @if ($post->reply_type === 'reply')
          <section class="bg-gray-100 py-2 px-4">
            <form action="{{ route('replies.store', $post) }}" method="post" class="mt-8">
              @csrf
              <textarea name="content" id="content" rows="1" class="w-full p-2 rounded-lg focus:outline-none focus:border-blue-500" style="border: 1px solid rgb(209, 213, 219);" placeholder="ここに返信を入力してください。">{{ old('content') }}</textarea>
              @error('content')
              <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
              @enderror
              <div class="button-container">
                <button type="submit" class="custom-button text-gray px-4 py-2 rounded-lg">返信</button>
              </div>
            </form>
            <h2 class="text-xl font-bold mb-4 text-center">返信一覧</h2>
            @forelse($replies as $reply)
            <div class="bg-white rounded-lg shadow mb-4 p-4">
              <div class="text-sm">{{ $reply->content }}</div>
              <div class="text-sm">{{ $reply->user->nickname }}</div>
              <div class="text-sm">{{ $reply->created_at }}</div>
            </div>
            @empty
            <p class="text-center">まだ返信はありません。</p>
            @endforelse
          </section>
          @endif
          <div class="flex items-center justify-end mt-4">
            <a href="{{ route('posts.index') }}">
              <x-primary-button class="ml-3">
                {{ __('相談一覧') }}
              </x-primary-button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
      {{ __('検索') }}
    </h2>
  </x-slot>

  <style>
    input::placeholder {
      color: #d0d0d0;
    }
  
    input::-webkit-input-placeholder {
      color: #d0d0d0;
    }
  
    input::-moz-placeholder {
      color: #d0d0d0;
    }
  
    input:-ms-input-placeholder {
      color: #d0d0d0;
    }
  
    input:-moz-placeholder {
      color: #d0d0d0;
    }
  </style>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          @include('common.errors')
          <form class="mb-6" action="{{ route('search.result') }}" method="GET">
            @csrf
            <div class="flex flex-col mb-4 mt-4">
              <x-input-label for="keyword" :value="__('キーワード')" />
              <x-text-input id="keyword" class="block mt-1 w-full" type="text" name="keyword" :value="old('keyword')" autofocus placeholder="" />
            </div>
            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-3">
                {{ __('検索') }}
              </x-primary-button>
            </div>
          </form>
          <div class="mt-6">
            <div class="keyword-tags mt-2">
              @foreach (session('search_history', []) as $history)
                <a href="{{ route('search.result', ['keyword' => $history]) }}" class="rounded bg-blue-500 text-white text-lg px-3 py-1 mb-2 mr-2 inline-block">{{ $history }}</a>
              @endforeach
            </div>
          </div>
          @if (isset($posts) && $posts->count() > 0)
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
              @foreach ($posts as $post)
                <div class="bg-white p-4 rounded-lg shadow-md">
                  <a href="{{ route('posts.show', $post->id) }}" class="text-lg font-semibold text-blue-600 hover:text-blue-800">{{ $post->title }}</a>
                  <p class="text-gray-600 text-sm">{{ Str::limit($post->content, 100) }}</p>
                  <p class="text-gray-500 text-xs mt-2">{{ $post->user->nickname }} - {{ $post->created_at->format('Y/m/d') }}</p>
                </div>
              @endforeach
            </div>
          @elseif (isset($posts))
            <div class="mt-6 text-center">
              <p class="text-gray-500">一致する結果は見つかりませんでした。</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const titlePlaceholderTexts = [
        '検索対象：ニックネーム、タイトル、内容',
        ''
      ];
      const titleInput = document.getElementById('keyword');
      titleInput.placeholder = titlePlaceholderTexts[0];
    });
  </script>

</x-app-layout>

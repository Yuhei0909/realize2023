<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
      {{ __('会話') }}
    </h2>
  </x-slot>

  <style>
    .rounded-select {
      border-radius: 6px;
      border-color: rgb(209, 213, 219);
    }

    .conversation-box {
      display: flex;
      flex-direction: column;
    }

    .conversation-box .sent {
      align-self: flex-end;
    }

    .conversation-box .received {
      align-self: flex-start;
    }

    .messages-container {
      max-height: 40vh;
      overflow-y: auto;
    }
  </style>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="flex flex-col mb-4">
            <x-input-label for="selected_user" :value="__('会話したい相手（相互フォローユーザー）')" class="text-left mt-4" />
            <select id="selected_user" class="block mt-1 w-full rounded-select" name="selected_user" style="font-size: 14px;">
              <option value="" selected disabled>会話したい相手を選んでください。</option>
              @foreach($mutual_follows as $mutual_follow)
              <option value="{{ $mutual_follow->id }}">{{ $mutual_follow->nickname }}</option>
              @endforeach
            </select>
            @if(isset($selected_user))
            <p class="mt-4 text-gray-800">{{ __('会話の相手: ') . $selected_user->nickname }}</p>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="col-span-1">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            @if(isset($selected_user))
            <div class="mb-6 conversation-box messages-container">
              @foreach($conversations as $conversation)
              @if($conversation->from_user_id == auth()->user()->id)
              <div class="sent text-right mb-4">
                <p class="inline-block bg-blue-100 rounded px-4 py-2">{{ $conversation->content }}</p>
                <p class="text-xs text-gray-800" style="text-align: right; padding-left: 1rem; padding-right: 1rem;">{{ $conversation->created_at->format('Y-m-d H:i') }}</p>
              </div>
              @else
              <div class="received text-left mb-4">
                <p class="inline-block bg-gray-200 rounded px-4 py-2">{{ $conversation->content }}</p>
                <p class="text-xs text-gray-800" style="text-align: left; padding-left: 1rem; padding-right: 1rem;">{{ $conversation->created_at->format('Y-m-d H:i') }}</p>
              </div>
              @endif
              @endforeach
            </div>
            <form action="{{ route('conversations.store', $selected_user->id) }}" method="post" class="mt-6">
              @csrf
              <div class="mb-4">
                <label for="content" class="sr-only">Content</label>
                <input type="text" name="content" id="content" placeholder="メッセージを入力してください。" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('content') border-red-500 @enderror" value="{{ old('content') }}">
                @error('content')
                <div class="text-red-500 mt-2 text-sm">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                  {{ __('送信') }}
                </x-primary-button>
              </div>
            </form>
            @else
            <p class="text-gray-800">会話したい相手を選ぶと、これまでの会話が表示されます。</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const selectedUser = document.getElementById('selected_user');
      selectedUser.addEventListener('change', function() {
        const selectedUserId = this.value;
          if (selectedUserId) {
            window.location.href = `{{ url('conversations') }}/${selectedUserId}`;
          }
        });
      });

      function scrollToBottom() {
        const messagesContainer = document.querySelector('.messages-container');
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
      }

      document.addEventListener('DOMContentLoaded', function() {
        scrollToBottom();
      });
  </script>
</x-app-layout>

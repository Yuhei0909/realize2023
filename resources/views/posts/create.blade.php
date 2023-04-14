<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
      {{ __('相談') }}
    </h2>
  </x-slot>
  
  <style>
    .rounded-input {
      border-radius: 6px;
      border-color: rgb(209, 213, 219);
    }

    .rounded-select {
      border-radius: 6px;
      border-color: rgb(209, 213, 219);
    }
    
    input::placeholder,
    textarea::placeholder {
      color: #d0d0d0;
    }
  
    input::-webkit-input-placeholder,
    textarea::-webkit-input-placeholder {
      color: #d0d0d0;
    }
  
    input::-moz-placeholder,
    textarea::-moz-placeholder {
      color: #d0d0d0;
    }
  
    input:-ms-input-placeholder,
    textarea:-ms-input-placeholder {
      color: #d0d0d0;
    }
  
    input:-moz-placeholder,
    textarea:-moz-placeholder {
      color: #d0d0d0;
    }
  </style>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            <tbody>
              <tr>
                <td>
                  @include('common.errors')
                  <form class="mb-6" action="{{ route('posts.store') }}" method="POST">
                  @csrf
                    <div class="flex flex-col mb-4">
                      <x-input-label for="title" :value="__('タイトル')" class="text-left mt-4" />
                      <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus placeholder="" />
                      <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div class="flex flex-col mb-4">
                      <x-input-label for="content" :value="__('内容')" class="text-left" />
                      <x-textarea id="content" name="content" class="rounded-input" required placeholder="">{{ old('content') }}</x-textarea>
                      <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>
                    <div class="flex flex-col mb-4">
                      <x-input-label for="reply_type" :value="__('相談に対して、みんなからどんな反応が欲しいですか？')" class="text-left" />
                        <select id="reply_type" class="block mt-1 w-full rounded-select" name="reply_type" style="font-size: 14px;">
                          <option value="reaction">共感して欲しい</option>
                          <option value="reply">返信して欲しい</option>
                        </select>
                      <x-input-error :messages="$errors->get('reply_type')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                      <x-primary-button class="ml-3">
                        {{ __('相談') }}
                      </x-primary-button>
                    </div>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const titlePlaceholderTexts = [
        '短く簡潔に、わかりやすく伝えましょう。',
        '内容に関するキーワードを含めると、検索しやすくなります。'
      ];
      const titleInput = document.getElementById('title');
      titleInput.placeholder = titlePlaceholderTexts[Math.floor(Math.random() * titlePlaceholderTexts.length)];
  
      const contentPlaceholderTexts = [
        '重要な情報は省略しないようにしましょう。',
        '背景や状況の説明は、適切な返信が得やすくなります。',
        '丁寧な言葉遣い、表現を心掛けましょう。'
      ];
      const contentInput = document.getElementById('content');
      contentInput.placeholder = contentPlaceholderTexts[Math.floor(Math.random() * contentPlaceholderTexts.length)];
    });
  </script>

</x-app-layout>

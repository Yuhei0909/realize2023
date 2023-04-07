<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
      {{ __('相談編集') }}
    </h2>
  </x-slot>
  
  <style>
    .rounded-input {
      border-radius: 6px;
      border-color: rgb(209, 213, 219);
    }
  </style>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            <tbody>
              <tr>
                <td class="text-left">
                  @include('common.errors')
                  <form class="mb-6" action="{{ route('posts.update',$post->id) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="flex flex-col mb-4">
                      <x-input-label for="title" :value="__('タイトル')" class="mt-4" />
                      <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$post->title}}" required autofocus />
                      <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div class="flex flex-col mb-4">
                      <x-input-label for="content" :value="__('内容')" />
                      <x-textarea id="content" name="content" class="rounded-input" required>{{ $post->content }}</x-textarea>
                      <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                      <a href="{{ url()->previous() }}">
                        <x-primary-button class="ml-3">
                          {{ __('相談一覧') }}
                        </x-primary-button>
                      </a>
                      <x-primary-button class="ml-3">
                        {{ __('更新') }}
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
</x-app-layout>

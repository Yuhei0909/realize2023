<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
      {{ __('ユーザーリスト') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            <div class="mt-4 mb-4">
              {{ $users->links() }}
            </div>
            <thead>
              <tr>
                <th class="border px-4 py-2">{{ __('ニックネーム') }}</th>
                <th class="border px-4 py-2">{{ __('登録日') }}</th>
                <th class="border px-4 py-2">{{ __('詳細') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td class="border px-4 py-2">{{ $user->nickname }}</td>
                <td class="border px-4 py-2">{{ $user->created_at }}</td>
                <td class="border px-4 py-2">
                  <div class="items-center">
                    <a href="{{ route('user.show', $user->id) }}">
                      <x-primary-button class="ml-3">
                        {{ __('詳細') }}
                      </x-primary-button>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

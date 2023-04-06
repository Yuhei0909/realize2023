<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('登録者一覧') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            <div class="mt-4 mb-4">
              {{ $users->links() }}
            </div>
            <thead>
              <tr>
                <th class="border px-4 py-2">{{ __('ニックネーム') }}</th>
                <th class="border px-4 py-2">{{ __('Eメール') }}</th>
                <th class="border px-4 py-2">{{ __('Actions') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td class="border px-4 py-2">{{ $user->nickname }}</td>
                  <td class="border px-4 py-2">{{ $user->email }}</td>
                  <td class="border px-4 py-2">
                    <a href="{{ route('user.show', $user->id) }}" class="bg-blue-500 text-gray px-4 py-2 rounded">{{ __('View') }}</a>
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

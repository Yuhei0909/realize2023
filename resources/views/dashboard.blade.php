<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('ダッシュボード') }}
    </h2>
  </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            {{ __("ログインしました。") }}
          </div>
        </div>
      </div>
    </div>
</x-app-layout>

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-center text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('相談一覧') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            @foreach ($posts as $post)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                  <div class="flex justify-between items-center">
                    <div>
                      <a href="{{ route('posts.show',$post->id) }}">
                        <h3 class="text-gray-800 dark:text-gray-200">{{$post->title}}</h3>
                      </a>
                    </div>
                    <div class="flex items-center space-x-8">
                      <a href="{{ route('user.show', $post->user->id) }}">
                        <p class="text-gray-dark dark:text-gray-200">{{$post->user->nickname}}</p>
                      </a>
                      <p class="text-gray-dark dark:text-gray-200">{{$post->created_at}}</p>
                      <div class="flex items-center">
                        @if ($post->reply_type === 'reaction')
                          <!-- 共感数を表示 -->
                          <div class="flex items-center">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="35" height="35" color="#1e90ff"><defs><style>.cls-63ce749bea57ea6c83800628-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><path class="cls-63ce749bea57ea6c83800628-1" d="M1.5,18.73H3.41l5,2.87a7.22,7.22,0,0,0,3.57.95h0"></path><polyline class="cls-63ce749bea57ea6c83800628-1" points="19.16 19.55 20.59 18.73 22.5 18.73"></polyline><path class="cls-63ce749bea57ea6c83800628-1" d="M12,22.55a7.22,7.22,0,0,0,3.57-.95l2-1.16-3.68-5.53-2.65.66a3.42,3.42,0,0,1-.79.09A3.26,3.26,0,0,1,9,15.32a1.49,1.49,0,0,1,.08-2.71l5.07-2.17a3.69,3.69,0,0,1,1.48-.3,3.74,3.74,0,0,1,2.08.63l1.92,1.28H22.5"></path><path class="cls-63ce749bea57ea6c83800628-1" d="M1.5,12.05H4.36l1.92-1.28a3.74,3.74,0,0,1,2.08-.63,3.69,3.69,0,0,1,1.48.3l2.16.93"></path><line class="cls-63ce749bea57ea6c83800628-1" x1="22.5" y1="10.14" x2="22.5" y2="20.64"></line><line class="cls-63ce749bea57ea6c83800628-1" x1="1.5" y1="10.14" x2="1.5" y2="20.64"></line><polygon class="cls-63ce749bea57ea6c83800628-1" points="12 3.46 12.46 4.4 13.51 4.55 12.75 5.28 12.93 6.32 12 5.83 11.07 6.32 11.25 5.28 10.49 4.55 11.54 4.4 12 3.46"></polygon></svg>
                            <span class="ml-3">{{ $post->likes()->count() }}</span>
                          </div>
                        @else
                          <!-- 返信数を表示 -->
                          <div class="flex items-center">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" width="35" height="35" color="#1e90ff"><defs><style>.cls-637642e7c3a86d32eae6f18f-1{fill:none;stroke:currentColor;stroke-miterlimit:10;}</style></defs><path class="cls-637642e7c3a86d32eae6f18f-1" d="M1.5,5.3v9.54a3.82,3.82,0,0,0,3.82,3.82H7.23v2.86L13,18.66h5.73a3.82,3.82,0,0,0,3.82-3.82V5.3a3.82,3.82,0,0,0-3.82-3.82H5.32A3.82,3.82,0,0,0,1.5,5.3Z"></path><line class="cls-637642e7c3a86d32eae6f18f-1" x1="15.82" y1="10.07" x2="17.73" y2="10.07"></line><line class="cls-637642e7c3a86d32eae6f18f-1" x1="11.05" y1="10.07" x2="12.95" y2="10.07"></line><line class="cls-637642e7c3a86d32eae6f18f-1" x1="6.27" y1="10.07" x2="8.18" y2="10.07"></line></svg>
                            <span class="ml-3">{{ $post->replies()->count() }}</span>
                          </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

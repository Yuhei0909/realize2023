<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
      {{ __('ホーム') }}
    </h2>
  </x-slot>

  <style>
    .scrollable-table {
      max-height: 680px;
      overflow-y: scroll;
      display: block;
    }
  </style>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="scrollable-table">
            <table class="text-center w-full border-collapse">
              @foreach ($posts as $post)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light">
                  <div class="flex justify-between items-center">
                    <div>
                      <a href="{{ route('posts.show',$post->id) }}">
                        <h3 class="text-gray-800">{{$post->title}}</h3>
                      </a>
                    </div>
                    <div class="flex items-center space-x-8">
                      <a href="{{ route('user.show', $post->user->id) }}">
                        <p class="text-gray-800">{{$post->user->nickname}}</p>
                      </a>
                      <p class="text-gray-800">{{$post->created_at}}</p>
                      <div class="flex items-center">
                        @if ($post->reply_type === 'reaction')
                        <!-- 共感数を表示 -->
                        <div class="flex items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="35" height="35" viewBox="0 0 200 200" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0,200) scale(0.1,-0.1)" fill="#F63B82" stroke="none">
                              <path d="M461 1860 c-295 -78 -472 -363 -410 -662 14 -71 79 -203 124 -255 27 -31 35 -48 30 -63 -26 -83 67 -200 159 -200 20 0 25 -6 31 -40 4 -22 16 -54 28 -72 25 -37 98 -78 139 -78 25 0 28 -4 28 -31 0 -76 72 -150 149 -152 34 -2 41 -6 41 -22 1 -37 38 -102 74 -130 47 -36 111 -43 170 -21 31 12 69 43 125 101 74 78 85 85 120 85 85 0 171 76 171 151 0 37 2 39 30 39 42 0 104 33 130 71 13 17 25 51 28 75 4 42 6 44 39 44 96 0 180 111 155 203 -9 33 -8 40 20 74 202 254 136 632 -142 812 -105 68 -174 86 -325 86 -117 -1 -137 -3 -199 -28 -38 -15 -94 -44 -125 -66 l-57 -38 -34 24 c-144 102 -330 137 -499 93z m1083 -82 c147 -45 272 -171 317 -319 41 -135 15 -301 -64 -412 l-32 -45 -280 273 c-154 151 -286 274 -293 275 -8 0 -84 -67 -169 -149 -103 -100 -165 -152 -185 -156 -64 -15 -126 44 -113 106 5 20 55 75 171 186 179 172 218 202 302 233 115 43 223 46 346 8z m-783 2 c65 -20 169 -74 169 -88 0 -4 -57 -63 -126 -132 -136 -136 -155 -162 -156 -219 -1 -52 10 -81 41 -114 38 -42 74 -57 134 -57 67 0 76 6 245 167 l129 122 271 -272 c176 -177 273 -282 277 -300 16 -65 -44 -125 -112 -112 -27 5 -67 38 -183 151 -81 79 -154 144 -162 144 -19 0 -38 -20 -38 -40 0 -8 67 -83 150 -165 137 -137 150 -153 150 -185 0 -20 -7 -45 -15 -57 -19 -27 -75 -46 -102 -36 -12 5 -91 75 -177 156 -137 130 -159 146 -176 137 -42 -23 -24 -50 132 -200 150 -144 153 -147 153 -189 0 -35 -6 -48 -28 -67 -16 -13 -41 -24 -57 -24 -25 0 -31 5 -40 39 -5 21 -20 51 -32 66 -25 32 -91 64 -130 65 -24 0 -28 4 -28 30 0 69 -70 144 -145 155 -39 6 -45 10 -45 32 0 68 -73 145 -149 157 -37 6 -40 9 -46 47 -13 77 -91 139 -174 139 -61 0 -88 -15 -167 -91 l-72 -71 -32 44 c-72 98 -100 185 -100 310 0 184 89 334 250 422 106 58 273 73 391 36z m-222 -735 c34 -17 55 -64 46 -103 -4 -19 -35 -58 -84 -106 -75 -72 -81 -76 -124 -76 -38 0 -49 5 -71 31 -45 53 -37 80 52 171 98 101 123 113 181 83z m212 -204 c21 -22 29 -39 29 -66 0 -32 -9 -46 -67 -107 -74 -76 -107 -98 -150 -98 -54 0 -102 61 -89 113 3 12 43 60 89 105 75 73 89 82 122 82 27 0 44 -7 66 -29z m194 -186 c19 -18 25 -35 25 -66 0 -37 -6 -47 -67 -111 -38 -38 -81 -77 -97 -85 -62 -32 -140 14 -140 83 0 32 10 46 86 120 79 78 88 84 127 84 31 0 48 -6 66 -25z m198 -196 c46 -49 36 -89 -42 -173 -93 -100 -158 -120 -212 -67 -22 22 -29 39 -29 66 0 33 9 47 81 121 45 45 91 85 103 87 38 7 70 -4 99 -34z" />
                            </g>
                          </svg>
                          <span class="ml-3">{{ $post->likes()->count() }}</span>
                        </div>
                        @else
                        <!-- 返信数を表示 -->
                        <div class="flex items-center">
                          <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1" width="35" height="35" color="#3B82F6">
                            <defs>
                              <style>
                                .cls-637642e7c3a86d32eae6f18f-1 {
                                  fill: none;
                                  stroke: currentColor;
                                  stroke-miterlimit: 10;
                                }
                              </style>
                            </defs>
                            <path class="cls-637642e7c3a86d32eae6f18f-1" d="M1.5,5.3v9.54a3.82,3.82,0,0,0,3.82,3.82H7.23v2.86L13,18.66h5.73a3.82,3.82,0,0,0,3.82-3.82V5.3a3.82,3.82,0,0,0-3.82-3.82H5.32A3.82,3.82,0,0,0,1.5,5.3Z"></path>
                            <line class="cls-637642e7c3a86d32eae6f18f-1" x1="15.82" y1="10.07" x2="17.73" y2="10.07"></line>
                            <line class="cls-637642e7c3a86d32eae6f18f-1" x1="11.05" y1="10.07" x2="12.95" y2="10.07"></line>
                            <line class="cls-637642e7c3a86d32eae6f18f-1" x1="6.27" y1="10.07" x2="8.18" y2="10.07"></line>
                          </svg>
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
  </div>
</x-app-layout>

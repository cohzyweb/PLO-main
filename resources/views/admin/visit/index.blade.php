<x-admin-layout>
  <div class="p-4 mx-auto max-w-full md:p-6">

    <div x-data="{ pageName: `来店管理`}">
      {{-- <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
        <a
          href="{{ url('/admin/cast/add') }}"
          class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition ring-1 ring-inset ring-gray-300 rounded-lg bg-white shadow-theme-xs hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]"
        >
          キャストを追加
        </a>
      </div> --}}
    </div>
    <!-- Search & Limit -->
    <form
      action="{{ route('admin.visit.index') }}"
      method="get"
      id="search_form"
      class="flex align-center justify-between mb-2 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
    >

      <!-- Search -->
      <div
        class="flex p-5 sm:p-6 dark:border-gray-800"
      >
      @role('admin')
      <div class="mr-2">
        <div class="relative z-20 bg-transparent">
          <select
            name="shop"
            {{-- id="search_form_shop" --}}
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
          >
            <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
              全ての店舗
            </option>
            @foreach ($shops as $shop)
              <option
                value="{{ $shop->id }}"
                class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                @selected($shop->slug === request()->shop)
              >
                {{ $shop->name }}
              </option>
            @endforeach
          </select>
          <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
        </div>
      </div>
      @endrole
      <div class="mr-2">
        <div class="relative">
          <input
            name="created_at"
            {{-- id="search_form_created" --}}
            type="date"
            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            onclick="this.showPicker()"
            value="{{ old('created_at') }}"
          >
          <span class="pointer-events-none absolute top-1/2 right-3 -translate-y-1/2 text-gray-500 dark:text-gray-400">
            <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66659 1.5415C7.0808 1.5415 7.41658 1.87729 7.41658 2.2915V2.99984H12.5833V2.2915C12.5833 1.87729 12.919 1.5415 13.3333 1.5415C13.7475 1.5415 14.0833 1.87729 14.0833 2.2915V2.99984L15.4166 2.99984C16.5212 2.99984 17.4166 3.89527 17.4166 4.99984V7.49984V15.8332C17.4166 16.9377 16.5212 17.8332 15.4166 17.8332H4.58325C3.47868 17.8332 2.58325 16.9377 2.58325 15.8332V7.49984V4.99984C2.58325 3.89527 3.47868 2.99984 4.58325 2.99984L5.91659 2.99984V2.2915C5.91659 1.87729 6.25237 1.5415 6.66659 1.5415ZM6.66659 4.49984H4.58325C4.30711 4.49984 4.08325 4.7237 4.08325 4.99984V6.74984H15.9166V4.99984C15.9166 4.7237 15.6927 4.49984 15.4166 4.49984H13.3333H6.66659ZM15.9166 8.24984H4.08325V15.8332C4.08325 16.1093 4.30711 16.3332 4.58325 16.3332H15.4166C15.6927 16.3332 15.9166 16.1093 15.9166 15.8332V8.24984Z" fill=""></path>
            </svg>
          </span>
        </div>
      </div>
        <!-- 携帯番号 filter -->
        <div class="mr-2 hidden lg:block">
          <div class="relative">
            <span class="absolute top-1/2 left-4 -translate-y-1/2">
              <svg class="fill-gray-500 dark:fill-gray-400" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04175 9.37363C3.04175 5.87693 5.87711 3.04199 9.37508 3.04199C12.8731 3.04199 15.7084 5.87693 15.7084 9.37363C15.7084 12.8703 12.8731 15.7053 9.37508 15.7053C5.87711 15.7053 3.04175 12.8703 3.04175 9.37363ZM9.37508 1.54199C5.04902 1.54199 1.54175 5.04817 1.54175 9.37363C1.54175 13.6991 5.04902 17.2053 9.37508 17.2053C11.2674 17.2053 13.003 16.5344 14.357 15.4176L17.177 18.238C17.4699 18.5309 17.9448 18.5309 18.2377 18.238C18.5306 17.9451 18.5306 17.4703 18.2377 17.1774L15.418 14.3573C16.5365 13.0033 17.2084 11.2669 17.2084 9.37363C17.2084 5.04817 13.7011 1.54199 9.37508 1.54199Z" fill=""></path>
              </svg>
            </span>
            <input
              type="text"
              name="cast_name"
              {{-- id="search_form_cast_name" --}}
              placeholder="キャスト名"
              value="{{ request()->cast_name }}"
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-2 pl-12 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden xl:w-[300px] dark:border-gray-800 dark:bg-gray-900 dark:bg-white/[0.03] dark:text-white/90 dark:placeholder:text-white/30"
            >
            <button type="submit" class="absolute top-1/2 right-2.5 inline-flex -translate-y-1/2 items-center gap-0.5 rounded-lg border border-gray-200 bg-gray-50 px-[7px] py-[4.5px] text-xs -tracking-[0.2px] text-gray-500 dark:border-gray-800 dark:bg-white/[0.03] dark:text-gray-400">
              <span> 検索 </span>
            </button>
          </div>
        </div>
        <div class="mr-2">
          <button type="submit" class="relative z-20 bg-transparent inline-flex items-center justify-center w-40 h-11 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 hover:border-gray-400 transition-colors duration-200 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-900 dark:hover:bg-gray-700 dark:hover:border-gray-600">
            <span>検索</span>
          </button>
        </div>
      </div>

      <!-- Limit -->
      <div
        id="diary_index_limit_form"
        class="p-5 sm:p-6 dark:border-gray-800"
      >
        <div>
          <div class="relative z-20 bg-transparent">
            <select
              name="limit"
              id="search_form_limit"
              class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
            >
              @foreach ([30, 50,100] as $limit_option)
                <option
                  value="{{ $limit_option }}"
                  class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                  @selected($limit_option == request()->limit)
                >
                  {{ $limit_option }}件
                </option>
              @endforeach
            </select>
            <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
              <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </span>
          </div>
        </div>
      </div>
    </form>

    <!-- Page -->
    <p class="px-2 py-2 text-sm text-gray-500 dark:text-gray-400 text-right">
      {{ $total }}件中 {{ ($page - 1) * $limit + 1 }} - {{ $page * $limit > $total ? $total : $page * $limit }}件を表示
    </p>

    <!-- Table -->
    <div
      class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
    >
      <div class="max-w-full overflow-x-auto">
        <table class="min-w-full">
          <!-- table header start -->
          <thead>
            <tr class="border-b border-gray-100 dark:border-gray-800">
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  日時
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                    ニックネーム
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  来店数
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  グループ来店数
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  店舗名
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  キャスト名
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  指名
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  コース
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  延長
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  料金
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  ポイント
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  利用ポイント
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  合計ポイント
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                  会員メモ
                  </p>
                </div>
              </th>
            </tr>
          </thead>
          <!-- table header end -->

          <!-- table body start -->
          <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
            @foreach ($datas as $data)
              <tr>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->created_at }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center justify-end">
                    <a
                      href="{{ url('/admin/member/' . $data->user_id) }}"
                      class="flex items-center justify-center gap-2 rounded-full border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 white-space-nowrap shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 lg:inline-flex lg:w-auto"
                    >
                      <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z" fill=""></path>
                      </svg>
                      詳細
                    </a>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->user_name }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->history_shop_count }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->history_count }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->shop_name }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->casts_name }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">

                      {{ $data->call_name }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->course_name }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->extension_name}}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->price }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->point_pay }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->point_use }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->point_valid }}
                    </p>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <p class="text-gray-500 text-theme-sm white-space-nowrap dark:text-gray-400">
                      {{ $data->user_comment }}
                    </p>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
          <!-- table body end -->
        </table>
      </div>
    </div>

    <!-- Pagination -->
    <div class="mb-10 flex justify-center">
      <div class="flex align-center rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        @if ($page > 1)
          <a
            href="{{ route('admin.visit.index', array_merge(request()->all(), ['page' => $page - 1])) }}"
            class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800"
          >
            <svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
              <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path>
            </svg>
          </a>
        @else
          <span
            class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800"
          >
            <svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
              <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path>
            </svg>
          </span>
        @endif

        @php
          $start = max(1, $page - 2);
          $end = min($pages, $page + 2);
        @endphp

        @if ($start > 1)
          <a
            href="{{ route('admin.visit.index', array_merge(request()->all(), ['page' => 1])) }}"
            class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800"
          >
            1
          </a>
          @if ($start > 2)
            <span class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800">
              ...
            </span>
          @endif
        @endif

        @for ($i = $start; $i <= $end; $i++)
          @if ($i === $page)
            <span
              class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 bg-gray-100 dark:bg-gray-800 dark:text-white"
            >
              {{ $i }}
            </span>
          @else
            <a
              href="{{ route('admin.visit.index', array_merge(request()->all(), ['page' => $i])) }}"
              class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800"
            >
              {{ $i }}
            </a>
          @endif
        @endfor

        @if ($end < $pages)
          @if ($end < $pages - 1)
            <span class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800">
              ...
            </span>
          @endif
          <a
            href="{{ route('admin.visit.index', array_merge(request()->all(), ['page' => $pages])) }}"
            class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800"
          >
            {{ $pages }}
          </a>
        @endif

        @if ($page < $pages)
          <a
            href="{{ route('admin.visit.index', array_merge(request()->all(), ['page' => $page + 1])) }}"
            class="flex items-center justify-center w-10 h-10 hover:bg-gray-100 dark:hover:bg-gray-800"
          >
            <svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
              <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"></path>
            </svg>
          </a>
        @else
          <span
            class="flex items-center justify-center w-10 h-10"
          >
            <svg class="w-4 h-4 fill-current text-gray-500 dark:text-gray-400" viewBox="0 0 24 24">
              <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6-6-6z"></path>
            </svg>
          </span>
        @endif
      </div>
    </div>

  </div>
</x-admin-layout>

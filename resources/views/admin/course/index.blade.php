<x-admin-layout>
  <div class="p-4 mx-auto max-w-full md:p-6">

    <div x-data="{ pageName: `コース管理`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
        <a
          href="{{ url('/admin/course/add') }}"
          class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition ring-1 ring-inset ring-gray-300 rounded-lg bg-white shadow-theme-xs hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]"
        >
          コース追加
        </a>
      </div>
    </div>

    @if (session('success'))
      <div class="alert alert-success" style="position: relative; padding: 1rem; margin-bottom: 1rem; border: 1px solid #badbcc; border-radius: 0.375rem; color: #0f5132; background-color: #d1e7dd;">
        {{ session('success') }}
      </div>
    @endif

    <!-- Search & Limit -->
    <form
      action="{{ route('admin.course.index') }}"
      method="get"
      id="search_form"
      class="flex align-center justify-between mb-2 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
    >
    <div
        class="flex p-5 sm:p-6 dark:border-gray-800"
      >
    <!-- Shop filter -->
        @can('edit other shops diaries')
        <div>
          <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-transparent">
            <select
              name="shop"
              id="search_form_shop"
              class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
            >
              <option value="" class="text-gray-700">
                全ての店舗
              </option>
              @foreach ($shops as $shop)
                <option
                  value="{{ $shop->slug }}"
                  class="text-gray-700"
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
        @endcan
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
              @foreach ([30, 50, 100] as $limit_option)
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
                    ID
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
                    コース
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                    値段	
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                    説明		
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                  <p
                    class="font-medium text-gray-500 text-theme-xs dark:text-gray-400 white-space-nowrap"
                  >
                    
                  </p>
                </div>
              </th>
              <th class="px-5 py-3 sm:px-6">
                <div class="flex items-center">
                </div>
              </th>
            </tr>
          </thead>
          <!-- table header end -->
          <!-- table body start -->
          <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
            @foreach ($courses as $course)
              <tr>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <div class="flex flex-col items-end">
                      <span
                        class="block font-medium text-gray-800 white-space-nowrap text-theme-sm dark:text-white/90"
                      >
                        {{ $course->id }}
                      </span>
                    </div>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <div>
                      <span
                        class="block font-medium text-gray-800 white-space-nowrap text-theme-sm dark:text-white/90"
                      >
                        {{ $course->shop->name }}
                      </span>
                    </div>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <div>
                      <span
                        class="block font-medium text-gray-800 white-space-nowrap text-theme-sm dark:text-white/90"
                      >
                        {{ $course->course }}
                      </span>
                    </div>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <div class="flex items-center gap-3">
                        <span
                        class="block font-medium text-gray-800 white-space-nowrap text-theme-sm dark:text-white/90"
                      >
                      {{ $course->price }}
                    </span>
                    </div>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center">
                    <div class="flex items-center gap-3">
                        <span
                        class="block font-medium text-gray-800 white-space-nowrap text-theme-sm dark:text-white/90"
                      >
                      {{ $course->description }}
                    </span>
                    </div>
                  </div>
                </td>
                <td class="px-5 py-4 sm:px-6">
                  <div class="flex items-center justify-end">
                    <a
                      href="{{ url('/admin/course/' . $course->id) }}"
                      class="flex items-center justify-center gap-2 rounded-full border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 white-space-nowrap shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 lg:inline-flex lg:w-auto"
                    >
                      <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0911 2.78206C14.2125 1.90338 12.7878 1.90338 11.9092 2.78206L4.57524 10.116C4.26682 10.4244 4.0547 10.8158 3.96468 11.2426L3.31231 14.3352C3.25997 14.5833 3.33653 14.841 3.51583 15.0203C3.69512 15.1996 3.95286 15.2761 4.20096 15.2238L7.29355 14.5714C7.72031 14.4814 8.11172 14.2693 8.42013 13.9609L15.7541 6.62695C16.6327 5.74827 16.6327 4.32365 15.7541 3.44497L15.0911 2.78206ZM12.9698 3.84272C13.2627 3.54982 13.7376 3.54982 14.0305 3.84272L14.6934 4.50563C14.9863 4.79852 14.9863 5.2734 14.6934 5.56629L14.044 6.21573L12.3204 4.49215L12.9698 3.84272ZM11.2597 5.55281L5.6359 11.1766C5.53309 11.2794 5.46238 11.4099 5.43238 11.5522L5.01758 13.5185L6.98394 13.1037C7.1262 13.0737 7.25666 13.003 7.35947 12.9002L12.9833 7.27639L11.2597 5.55281Z" fill=""></path>
                      </svg>
                      詳細
                    </a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!-- Pagination -->
    <div class="mb-10 flex justify-center">
      <div class="flex align-center rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        @if ($page > 1)
          <a
            href="{{ route('admin.course.index', array_merge(request()->all(), ['page' => $page - 1])) }}"
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

        @for ($i = 1; $i <= $pages; $i++)
          @if ($i === $page)
            <span
              class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 bg-gray-100 dark:bg-gray-800 dark:text-white"
            >
              {{ $i }}
            </span>
          @else
            <a
              href="{{ route('admin.course.index', array_merge(request()->all(), ['page' => $i])) }}"
              class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800"
            >
              {{ $i }}
            </a>
          @endif
        @endfor

        @if ($page < $pages)
          <a
            href="{{ route('admin.course.index', array_merge(request()->all(), ['page' => $page + 1])) }}"
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

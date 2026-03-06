<x-admin-layout>
    <div class="p-4 mx-auto max-w-full md:p-6">
        <form id="search_form" class="flex align-center justify-between mb-2 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <!-- Search -->
            <div class="flex p-5 sm:p-6 dark:border-gray-800">
                <!-- Shop filter -->
                @role('admin')
                    <div class="mr-2">
                    <div class="relative z-20 bg-transparent">
                        <select
                            name="shop"
                            id="search_shop"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                        >
                        <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                            全ての店舗
                        </option>
                        @foreach ($shops as $shop)
                            <option
                            value="{{ $shop->id }}"
                            class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                            @selected($shop->id === request()->shop)
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

            </div>
            <!-- Limit -->
            <div
            id="work_index_limit_form"
            class="p-5 sm:p-6 dark:border-gray-800"
            >
                <div>
                    <div class="relative z-20 bg-transparent">
                        <select
                            name="limit"
                            id="search_limit"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                        >
                            @foreach ([30, 50] as $limit_option)
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
    </div>

    <div class="work-container px-4 mx-auto max-w-full md:px-6">
        <div class="date-action">
            <button class="prev-week-btn"><<&nbsp;&nbsp;&nbsp;先週</button>
            <button class="next-week-btn">翌週&nbsp;&nbsp;&nbsp;>></button>
        </div>
        <div class="work-navigation">
            <div class="table-cols">
                {{-- <div class="date-col cast-col">キャスト</div>
                <div class="date-col active">
                    06/08(日)
                    <div class="active-indicator"></div>
                </div>
                <div class="date-col">06/09(月)</div>
                <div class="date-col">06/10(火)</div>
                <div class="date-col">06/11(水)</div>
                <div class="date-col">06/12(木)</div>
                <div class="date-col">06/13(金)</div>
                <div class="date-col">06/14(土)</div> --}}
            </div>
        </div>
        <div class="work-content">
        </div>
    </div>
    <!-- Pagination -->
    <div class="mb-10 flex justify-center pagination-container">
    {{--    <div class="flex align-center rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            @if ($page > 1)
            <a
                href="{{ route('admin.schedule.index', array_merge(request()->all(), ['page' => $page - 1])) }}"
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
                href="{{ route('admin.schedule.index', array_merge(request()->all(), ['page' => $i])) }}"
                class="flex items-center justify-center w-10 h-10 border-r border-gray-200 dark:border-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800"
                >
                {{ $i }}
                </a>
            @endif
            @endfor

            @if ($page < $pages)
            <a
                href="{{ route('admin.schedule.index', array_merge(request()->all(), ['page' => $page + 1])) }}"
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
        </div> --}}
    </div>
    <!-- Attendance Time Modal -->
    <div id="attendanceTimeModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="attendance-modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-xs relative">
            <button id="attendanceTimeClose" type="button" class="">&times;</button>
            <h2 id="attendanceDate" class="text-lg font-semibold mb-4">出勤時間の編集</h2>
            <div class="flex gap-4 mb-4">
                <select id="attendanceStartTime" class="w-full border rounded px-2 py-1"></select>
                <select id="attendanceEndTime" class="w-full border rounded px-2 py-1"></select>
            </div>
            <p class="attendance-time-error">
            </p>
            <div class="flex justify-end gap-2">
                <button id="attendanceTimeSave" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 attendanceTimeSave">保存</button>
            </div>
        </div>
    </div>
</x-admin-layout>
<script>
    window.apiToken = "{{ $token }}"
</script>
@once
    @vite(['resources/js/admin/work.js','resources/scss/admin/work.scss'])
@endonce

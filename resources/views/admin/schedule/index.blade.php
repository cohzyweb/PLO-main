<x-admin-layout>
    <div class="p-4 mx-auto max-w-full md:p-6">
        <form id="search_form" class="flex align-center justify-between mb-2 rounded-2xl border border-gray-200 bg-white">
            <!-- Search -->
            <div class="flex p-5 sm:p-6">
                <!-- Cast filter -->
                <div class="mr-2 hidden lg:block">
                    <div class="relative">
                        <span class="absolute top-1/2 left-4 -translate-y-1/2">
                            <svg class="fill-gray-500" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.04175 9.37363C3.04175 5.87693 5.87711 3.04199 9.37508 3.04199C12.8731 3.04199 15.7084 5.87693 15.7084 9.37363C15.7084 12.8703 12.8731 15.7053 9.37508 15.7053C5.87711 15.7053 3.04175 12.8703 3.04175 9.37363ZM9.37508 1.54199C5.04902 1.54199 1.54175 5.04817 1.54175 9.37363C1.54175 13.6991 5.04902 17.2053 9.37508 17.2053C11.2674 17.2053 13.003 16.5344 14.357 15.4176L17.177 18.238C17.4699 18.5309 17.9448 18.5309 18.2377 18.238C18.5306 17.9451 18.5306 17.4703 18.2377 17.1774L15.418 14.3573C16.5365 13.0033 17.2084 11.2669 17.2084 9.37363C17.2084 5.04817 13.7011 1.54199 9.37508 1.54199Z" fill=""></path>
                            </svg>
                        </span>
                        <input
                            type="text"
                            name="cast"
                            id="search_cast"
                            placeholder="キャスト名"
                            value="{{ request()->cast }}"
                            class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pr-2 pl-12 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden xl:w-[300px]"
                        >
                    </div>
                </div>

                <!-- Shop filter -->
                @role('admin')
                    <div class="mr-2">
                        <div class="relative z-20 bg-transparent">
                            <select
                                name="shop"
                                id="search_shop"
                                class="shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden"
                            >
                                <option value="" class="text-gray-700 dark:bg-gray-900">
                                    全ての店舗
                                </option>
                                @foreach ($shops as $shop)
                                    <option
                                    value="{{ $shop->slug }}"
                                    class="text-gray-700 dark:bg-gray-900"
                                    @selected($shop->slug === request()->shop)
                                    >
                                    {{ $shop->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500">
                                <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </div>
                    </div>
                @endrole

                <div class="ml-2">
                    <button type="submit" class="relative z-20 bg-transparent inline-flex items-center justify-center h-11 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 hover:bg-gray-50 hover:border-gray-400 transition-colors duration-200">
                      <span>検索</span>
                    </button>
                </div>
            </div>

            <!-- Limit -->
            <div class="p-5 sm:p-6">
                <div>
                    <div class="relative z-20 bg-transparent">
                        <select
                            name="limit"
                            id="search_form_limit"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
                        >
                            @foreach ([30, 50] as $limit_option)
                            <option
                                value="{{ $limit_option }}"
                                class="text-gray-700 dark:bg-gray-900"
                                @selected($limit_option == request()->limit)
                            >
                                {{ $limit_option }}件
                            </option>
                            @endforeach
                        </select>
                        <span class="pointer-events-none absolute top-1/2 right-4 z-30 -translate-y-1/2 text-gray-500">
                            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="schedule-container">
        <div class="schedule-date">
            {{-- 2025年06月08日(日)の予約状況 --}}
        </div>
        <div class="schedule-navigation">
            <button class="prev-week-btn">先週</button>
            <div class="date-tabs">
                {{-- <div class="date-tab active">
                    06/08(日)
                    <div class="active-indicator"></div>
                </div>
                <div class="date-tab">06/09(月)</div>
                <div class="date-tab">06/10(火)</div>
                <div class="date-tab">06/11(水)</div>
                <div class="date-tab">06/12(木)</div>
                <div class="date-tab">06/13(金)</div>
                <div class="date-tab">06/14(土)</div> --}}
            </div>
            <button class="next-week-btn">翌週</button>
        </div>
    </div>
    <div class="schedule-content">
        <!-- キャスト　予約状況 タイトル-->
        <div class="schedule-header">
            <div class="cast-column">キャスト</div>
            <div class="schedule-column">予約状況</div>
        </div>
        <div class="schedule-casts">

        </div>
    </div>
    <!-- Pagination -->
    <div class="mb-10 flex justify-center pagination-container">
    </div>
</x-admin-layout>
<script>
    window.apiToken = "{{ $token }}"
</script>
@once
    @vite(['resources/js/admin/schedule.js','resources/scss/admin/schedule.scss'])
@endonce

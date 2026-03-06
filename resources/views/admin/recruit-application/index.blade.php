<x-admin-layout>
  <div class="p-4 mx-auto max-w-full md:p-6">
    <div x-data="{ pageName: `求人応募管理` }">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName"></h2>
      </div>
    </div>

    <form
      action="{{ route('admin.recruit-application.index') }}"
      method="get"
      id="search_form"
      class="mb-4 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]"
    >
      <div class="grid gap-3 md:grid-cols-2 xl:grid-cols-4">
        <div class="relative">
          <select
            name="type"
            class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
          >
            <option value="">応募種別（全て）</option>
            <option value="male" @selected(request('type') === 'male')>男性</option>
            <option value="female" @selected(request('type') === 'female')>女性</option>
          </select>
          <span class="pointer-events-none absolute top-1/2 right-4 -translate-y-1/2 text-gray-500 dark:text-gray-400">
            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
        </div>

        <div class="relative">
          <select
            name="status"
            class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
          >
            <option value="">ステータス（全て）</option>
            <option value="new" @selected(request('status') === 'new')>新規</option>
            <option value="processing" @selected(request('status') === 'processing')>対応中</option>
            <option value="done" @selected(request('status') === 'done')>対応完了</option>
          </select>
          <span class="pointer-events-none absolute top-1/2 right-4 -translate-y-1/2 text-gray-500 dark:text-gray-400">
            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
        </div>

        <div class="relative">
          <input
            type="text"
            name="shop"
            value="{{ request('shop') }}"
            placeholder="店舗名"
            class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
          >
        </div>

        <div class="relative">
          <input
            type="text"
            name="q"
            value="{{ request('q') }}"
            placeholder="名前 / メール / 電話 / 内容"
            class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
          >
        </div>
      </div>

      <div class="mt-3 grid gap-3 md:grid-cols-3 xl:grid-cols-5">
        <div class="relative">
          <input
            type="text"
            name="date_from"
            value="{{ request('date_from') }}"
            placeholder="yyyy-mm-dd"
            class="recruit-date-input h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
            data-date-from
          >
        </div>
        <div class="relative">
          <input
            type="text"
            name="date_to"
            value="{{ request('date_to') }}"
            placeholder="yyyy-mm-dd"
            class="recruit-date-input h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
            data-date-to
          >
        </div>
        <div class="relative">
          <select
            name="limit"
            id="search_form_limit"
            class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
          >
            @foreach ([30, 50, 100] as $limitOption)
              <option value="{{ $limitOption }}" @selected((int) request('limit', 30) === $limitOption)>{{ $limitOption }}件</option>
            @endforeach
          </select>
          <span class="pointer-events-none absolute top-1/2 right-4 -translate-y-1/2 text-gray-500 dark:text-gray-400">
            <svg class="stroke-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.79175 7.396L10.0001 12.6043L15.2084 7.396" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
        </div>
        <button
          type="submit"
          class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 transition-colors duration-200 hover:border-gray-400 hover:bg-gray-50"
        >
          検索
        </button>
        <a
          href="{{ route('admin.recruit-application.index') }}"
          class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 transition-colors duration-200 hover:border-gray-400 hover:bg-gray-50"
        >
          リセット
        </a>
      </div>
    </form>

    <p class="px-2 py-2 text-right text-sm text-gray-500 dark:text-gray-400">
      {{ $applications->total() }}件中
      @if ($applications->total() > 0)
        {{ $applications->firstItem() }} - {{ $applications->lastItem() }}件を表示
      @else
        0件を表示
      @endif
    </p>

    <div class="mb-6 overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="max-w-full overflow-x-auto">
        <table class="min-w-full">
          <thead>
            <tr class="border-b border-gray-100 dark:border-gray-800">
              <th class="px-4 py-3 text-left text-theme-xs font-medium text-gray-500 dark:text-gray-400">受付日時</th>
              <th class="px-4 py-3 text-left text-theme-xs font-medium text-gray-500 dark:text-gray-400">種別</th>
              <th class="px-4 py-3 text-left text-theme-xs font-medium text-gray-500 dark:text-gray-400">店舗</th>
              <th class="px-4 py-3 text-left text-theme-xs font-medium text-gray-500 dark:text-gray-400">名前</th>
              <th class="px-4 py-3 text-left text-theme-xs font-medium text-gray-500 dark:text-gray-400">メール</th>
              <th class="px-4 py-3 text-left text-theme-xs font-medium text-gray-500 dark:text-gray-400">電話</th>
              <th class="px-4 py-3 text-left text-theme-xs font-medium text-gray-500 dark:text-gray-400">ステータス</th>
              <th class="px-4 py-3 text-left text-theme-xs font-medium text-gray-500 dark:text-gray-400">詳細</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
            @forelse ($applications as $application)
              <tr>
                <td class="px-4 py-3 text-theme-sm text-gray-700 dark:text-gray-300">
                  {{ optional($application->created_at)->format('Y-m-d H:i') }}
                </td>
                <td class="px-4 py-3 text-theme-sm text-gray-700 dark:text-gray-300">
                  {{ $application->type === 'male' ? '男性' : '女性' }}
                </td>
                <td class="px-4 py-3 text-theme-sm text-gray-700 dark:text-gray-300">{{ $application->shop }}</td>
                <td class="px-4 py-3 text-theme-sm text-gray-700 dark:text-gray-300">{{ $application->name }}</td>
                <td class="px-4 py-3 text-theme-sm text-gray-700 dark:text-gray-300">{{ $application->email }}</td>
                <td class="px-4 py-3 text-theme-sm text-gray-700 dark:text-gray-300">{{ $application->phone ?: '-' }}</td>
                <td class="px-4 py-3 text-theme-sm text-gray-700 dark:text-gray-300">
                  @php
                    $statusLabel = match ($application->status) {
                        'processing' => '対応中',
                        'done' => '対応完了',
                        default => '新規',
                    };
                  @endphp
                  {{ $statusLabel }}
                </td>
                <td class="px-4 py-3">
                  <a
                    href="{{ route('admin.recruit-application.detail', $application->id) }}"
                    class="inline-flex items-center justify-center rounded-full border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50"
                  >
                    詳細
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="px-4 py-8 text-center text-sm text-gray-500">応募データがありません。</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    @if ($applications->hasPages())
      <div class="flex items-center justify-end gap-2">
        @if ($applications->onFirstPage())
          <span class="rounded-lg border border-gray-200 px-3 py-2 text-sm text-gray-400">前へ</span>
        @else
          <a href="{{ $applications->previousPageUrl() }}" class="rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50">前へ</a>
        @endif

        @foreach ($applications->getUrlRange(max(1, $applications->currentPage() - 2), min($applications->lastPage(), $applications->currentPage() + 2)) as $page => $url)
          @if ($page === $applications->currentPage())
            <span class="rounded-lg border border-brand-500 bg-brand-500 px-3 py-2 text-sm text-white">{{ $page }}</span>
          @else
            <a href="{{ $url }}" class="rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50">{{ $page }}</a>
          @endif
        @endforeach

        @if ($applications->hasMorePages())
          <a href="{{ $applications->nextPageUrl() }}" class="rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50">次へ</a>
        @else
          <span class="rounded-lg border border-gray-200 px-3 py-2 text-sm text-gray-400">次へ</span>
        @endif
      </div>
    @endif
  </div>
</x-admin-layout>


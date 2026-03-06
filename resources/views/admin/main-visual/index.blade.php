<x-admin-layout>
  <div class="p-4 mx-auto max-w-full md:p-6">
    <div x-data="{ pageName: `メインビジュアル画像管理`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
      </div>
    </div>
    
    @if (session('success'))
      <div class="alert alert-success" style="position: relative; padding: 1rem; margin-bottom: 1rem; border: 1px solid #badbcc; border-radius: 0.375rem; color: #0f5132; background-color: #d1e7dd;">
        {{ session('success') }}
      </div>
    @endif

    <!-- Shop Selection -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="p-4 sm:p-6">
        <form method="get" action="{{ route('admin.main-visual.index') }}" class="flex items-center gap-4">
          <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
            店舗
          </label>
          @if (!$isShopManager)
            <div class="relative z-20 w-full max-w-[300px] bg-transparent">
              <select
                name="shop_id"
                onchange="this.form.submit()"
                class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30"
              >
                <option value="" class="text-gray-700 dark:bg-gray-900 dark:text-gray-400">
                  グループサイト
                </option>
                @foreach ($shops as $shop)
                  <option
                    value="{{ $shop->id }}"
                    class="text-gray-700 dark:bg-gray-900 dark:text-gray-400"
                    @selected($selectedShopId == $shop->id)
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
          @else
            <div class="text-sm text-gray-700 dark:text-gray-400">
              {{ $shops->first()->name ?? '店舗' }}
            </div>
          @endif
        </form>
      </div>
    </div>

    <!-- Instructions -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="p-4 sm:p-6">
        <h3 class="mb-3 text-base font-medium text-gray-800 dark:text-white/90">使い方</h3>
        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
          <li>・店舗のプルダウンで登録先店舗を選ぶ。</li>
          <li>※店舗管理者でログインした場合は店舗名を表示</li>
          <li>・TOP画像は5つ登録可能</li>
          <li>※リンク先URLは特に登録しなくてもいい。その倍は画像をクリックしてもリンク先に飛ばない。</li>
          <li>・詳細で画像とリンク先を登録・編集・削除</li>
          <li>・画像1のみ必須</li>
        </ul>
      </div>
    </div>

    <!-- Main Visual Images Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @for ($i = 1; $i <= 5; $i++)
        @php
          $visual = $mainVisuals[$i] ?? null;
        @endphp
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
          <div class="p-4 sm:p-6">
            <h3 class="mb-4 text-base font-medium text-gray-800 dark:text-white/90">
              画像{{ $i }}
              @if ($i === 1)
                <span class="text-error-500 text-sm">*必須</span>
              @endif
            </h3>
            
            <!-- Image Preview -->
            <div class="mb-4">
              @if ($visual && $visual->image_path)
                <div class="relative w-full aspect-video rounded-lg overflow-hidden bg-gray-100 dark:bg-gray-800">
                  <img 
                    src="{{ asset('storage/' . $visual->image_path) }}" 
                    alt="画像{{ $i }}"
                    class="w-full h-full object-cover"
                  >
                </div>
              @else
                <div class="w-full aspect-video rounded-lg border-2 border-dashed border-gray-300 dark:border-gray-700 flex items-center justify-center bg-gray-50 dark:bg-gray-900">
                  <span class="text-gray-400 dark:text-gray-500 text-sm">画像未登録</span>
                </div>
              @endif
            </div>

            <!-- Link URL Display -->
            <div class="mb-4">
              <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                リンク先URL
              </label>
              <div class="text-sm text-gray-600 dark:text-gray-400 break-all">
                {{ $visual && $visual->link_url ? $visual->link_url : '未設定' }}
              </div>
            </div>

            <!-- Action Button -->
            <div class="flex gap-2">
              @if ($visual)
                <a
                  href="{{ route('admin.main-visual.detail', $visual->id) }}"
                  class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600"
                >
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                  </svg>
                  詳細
                </a>
              @else
                <a
                  href="{{ route('admin.main-visual.detail', 'new') }}?shop_id={{ $selectedShopId }}&image_order={{ $i }}"
                  class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600"
                >
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                  </svg>
                  登録
                </a>
              @endif
            </div>
          </div>
        </div>
      @endfor
    </div>
  </div>
</x-admin-layout>

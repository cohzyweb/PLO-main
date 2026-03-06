<x-admin-layout>
  <div class="p-4 mx-auto max-w-full md:p-6">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
      <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">求人応募詳細</h2>
      <a
        href="{{ route('admin.recruit-application.index') }}"
        class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
      >
        一覧へ戻る
      </a>
    </div>

    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
      <dl class="grid gap-4 md:grid-cols-2">
        <div>
          <dt class="mb-1 text-xs font-medium text-gray-500">受付日時</dt>
          <dd class="text-sm text-gray-800 dark:text-gray-100">{{ optional($application->created_at)->format('Y-m-d H:i:s') }}</dd>
        </div>
        <div>
          <dt class="mb-1 text-xs font-medium text-gray-500">応募種別</dt>
          <dd class="text-sm text-gray-800 dark:text-gray-100">{{ $application->type === 'male' ? '男性' : '女性' }}</dd>
        </div>
        <div>
          <dt class="mb-1 text-xs font-medium text-gray-500">ステータス</dt>
          <dd class="text-sm text-gray-800 dark:text-gray-100">{{ $application->status }}</dd>
        </div>
        <div>
          <dt class="mb-1 text-xs font-medium text-gray-500">希望店舗</dt>
          <dd class="text-sm text-gray-800 dark:text-gray-100">{{ $application->shop }}</dd>
        </div>
        <div>
          <dt class="mb-1 text-xs font-medium text-gray-500">名前</dt>
          <dd class="text-sm text-gray-800 dark:text-gray-100">{{ $application->name }}</dd>
        </div>
        <div>
          <dt class="mb-1 text-xs font-medium text-gray-500">フリガナ</dt>
          <dd class="text-sm text-gray-800 dark:text-gray-100">{{ $application->furigana ?: '-' }}</dd>
        </div>
        <div>
          <dt class="mb-1 text-xs font-medium text-gray-500">メール</dt>
          <dd class="text-sm text-gray-800 dark:text-gray-100">{{ $application->email }}</dd>
        </div>
        <div>
          <dt class="mb-1 text-xs font-medium text-gray-500">電話番号</dt>
          <dd class="text-sm text-gray-800 dark:text-gray-100">{{ $application->phone ?: '-' }}</dd>
        </div>
        <div>
          <dt class="mb-1 text-xs font-medium text-gray-500">年齢</dt>
          <dd class="text-sm text-gray-800 dark:text-gray-100">{{ $application->age ?: '-' }}</dd>
        </div>
        <div>
          <dt class="mb-1 text-xs font-medium text-gray-500">経験</dt>
          <dd class="text-sm text-gray-800 dark:text-gray-100">{{ $application->experience ?: '-' }}</dd>
        </div>
        <div>
          <dt class="mb-1 text-xs font-medium text-gray-500">件名</dt>
          <dd class="text-sm text-gray-800 dark:text-gray-100">{{ $application->subject ?: '-' }}</dd>
        </div>
        <div>
          <dt class="mb-1 text-xs font-medium text-gray-500">プライバシー同意</dt>
          <dd class="text-sm text-gray-800 dark:text-gray-100">{{ $application->privacy_agreed ? '同意済み' : '未同意' }}</dd>
        </div>
      </dl>

      <div class="mt-6">
        <p class="mb-2 text-xs font-medium text-gray-500">お問い合わせ内容</p>
        <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 text-sm leading-7 text-gray-800 whitespace-pre-wrap dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100">{{ $application->inquiry }}</div>
      </div>

      <div class="mt-6 grid gap-4 md:grid-cols-2">
        <div>
          <p class="mb-2 text-xs font-medium text-gray-500">送信IP</p>
          <p class="text-sm text-gray-800 dark:text-gray-100">{{ data_get($application->meta, 'ip', '-') }}</p>
        </div>
        <div>
          <p class="mb-2 text-xs font-medium text-gray-500">ユーザーエージェント</p>
          <p class="text-sm text-gray-800 break-all dark:text-gray-100">{{ data_get($application->meta, 'user_agent', '-') }}</p>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>


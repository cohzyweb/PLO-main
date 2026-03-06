<x-admin-layout>
  <form
    class="p-4 mx-auto max-w-full md:p-6"
    method="post"
    action="{{ url('/admin/fee/' . $shop->id) }}"
  >
    @method('PUT')
    @csrf

    <div x-data="{ pageName: `料金システムを編集`}">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2
          class="text-xl font-semibold text-gray-800 dark:text-white/90"
          x-text="pageName"
        ></h2>
      </div>
    </div>

    <!-- Name, Shop, Profile -->
    <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
      <div class="p-4 sm:p-6">
        <div class="px-6 py-5">
          <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
            本文
          </h3>
        </div>
        <div class="p-4 border-t border-gray-100 dark:border-gray-800 sm:p-6">
          <textarea
            name="fee_content"
            id="fee_content"
            class="w-full"
            rows="10"
          >{{ $shop->fee }}</textarea>
        </div>
      </div>

    </div>

    <!-- Buttons -->
    <div class="px-5 flex items-center justify-between">
      <button
        type="submit"
        class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600"
      >
        保存する
      </button>
    </div>
  </form>
</x-admin-layout>
@once
  @vite('resources/js/admin/fee.js')
@endonce

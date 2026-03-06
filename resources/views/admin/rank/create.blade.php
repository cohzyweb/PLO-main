<x-admin-layout>
    <form class="p-4 mx-auto max-w-full md:p-6" method="post" action="{{ url('/admin/rank/add') }}">
        @method('POST')
        @csrf

        <div x-data="{ pageName: `ランキング追加` }">
            <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName"></h2>
            </div>
        </div>

        <!-- Name, Description -->
        <div class="mb-6 rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="p-4 sm:p-6">

                <!-- Name -->
                <div class="mb-6">
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        ランキング名 <span class="text-error-500">*</span>
                    </label>
                    <input name="rank_name" type="text" value="{{ old('rank_name') }}"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full max-w-[380px] rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">
                    @if ($errors->has('rank_name'))
                        <p class="mt-1.5 text-xs text-error-500">{{ $errors->first('rank_name') }}</p>
                    @endif
                </div>

                <!-- Description -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        説明
                    </label>
                    <textarea name="description"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30">{{ old('description') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="px-5 flex items-center justify-between">
            <button type="submit"
                class="inline-flex items-center gap-2 px-4 py-3.5 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">
                保存する
            </button>
        </div>

    </form>
</x-admin-layout>

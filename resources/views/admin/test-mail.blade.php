<x-admin-layout>
  <div class="p-4 mx-auto max-w-full md:p-6">
    <div x-data="{ pageName: `メールテスト` }">
      <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90" x-text="pageName"></h2>
      </div>
    </div>

    <div class="mb-4 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
      <h3 class="mb-4 text-lg font-medium text-gray-800 dark:text-white/90">現在のメール設定</h3>
      <div class="grid gap-3 md:grid-cols-2">
        <div>
          <p class="text-sm text-gray-600 dark:text-gray-400">Default Mailer:</p>
          <p class="font-medium text-gray-800 dark:text-white/90">{{ config('mail.default') }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-600 dark:text-gray-400">SMTP Host:</p>
          <p class="font-medium text-gray-800 dark:text-white/90">{{ config('mail.mailers.smtp.host') }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-600 dark:text-gray-400">SMTP Port:</p>
          <p class="font-medium text-gray-800 dark:text-white/90">{{ config('mail.mailers.smtp.port') }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-600 dark:text-gray-400">SMTP Encryption:</p>
          <p class="font-medium text-gray-800 dark:text-white/90">{{ config('mail.mailers.smtp.encryption') }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-600 dark:text-gray-400">SMTP Username:</p>
          <p class="font-medium text-gray-800 dark:text-white/90">{{ config('mail.mailers.smtp.username') }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-600 dark:text-gray-400">SMTP Password:</p>
          <p class="font-medium text-gray-800 dark:text-white/90">{{ config('mail.mailers.smtp.password') ? '***' : 'NOT SET' }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-600 dark:text-gray-400">EHLO Domain:</p>
          <p class="font-medium text-gray-800 dark:text-white/90">{{ config('mail.mailers.smtp.local_domain') }}</p>
        </div>
        <div>
          <p class="text-sm text-gray-600 dark:text-gray-400">From Address:</p>
          <p class="font-medium text-gray-800 dark:text-white/90">{{ config('mail.from.address') }}</p>
        </div>
      </div>
    </div>

    <form
      id="test-mail-form"
      class="mb-4 rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]"
    >
      <h3 class="mb-4 text-lg font-medium text-gray-800 dark:text-white/90">テストメール送信</h3>
      
      <div class="mb-4">
        <label for="to" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
          送信先メールアドレス
        </label>
        <input
          type="email"
          id="to"
          name="to"
          value="todinhthi@gmail.com"
          required
          class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
          placeholder="test@example.com"
        >
      </div>

      <div class="mb-4">
        <label for="mailer" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
          メーラー
        </label>
        <select
          id="mailer"
          name="mailer"
          class="h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90"
        >
          <option value="smtp">smtp (Default)</option>
          <option value="en_smtp">en_smtp</option>
        </select>
      </div>

      <button
        type="submit"
        class="inline-flex h-11 items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-900 transition-colors duration-200 hover:border-gray-400 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:hover:bg-gray-800"
      >
        テストメール送信
      </button>
    </form>

    <div id="result" class="hidden rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]"></div>
  </div>

  <script>
    document.getElementById('test-mail-form').addEventListener('submit', async function(e) {
      e.preventDefault();
      
      const form = e.target;
      const resultDiv = document.getElementById('result');
      const submitBtn = form.querySelector('button[type="submit"]');
      
      const formData = new FormData(form);
      const data = {
        to: formData.get('to'),
        mailer: formData.get('mailer'),
      };

      submitBtn.disabled = true;
      submitBtn.textContent = '送信中...';
      resultDiv.classList.add('hidden');
      resultDiv.innerHTML = '';

      try {
        const response = await fetch('{{ route("admin.test-mail.send") }}', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
          },
          body: JSON.stringify(data),
        });

        const result = await response.json();
        
        resultDiv.classList.remove('hidden');
        
        if (result.success) {
          resultDiv.className = 'rounded-2xl border border-green-200 bg-green-50 p-5 dark:border-green-800 dark:bg-green-900/20';
          resultDiv.innerHTML = `
            <div class="flex items-start gap-3">
              <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <div>
                <h4 class="mb-2 font-semibold text-green-800 dark:text-green-200">送信成功</h4>
                <p class="text-sm text-green-700 dark:text-green-300">${result.message}</p>
                <div class="mt-3 text-xs text-green-600 dark:text-green-400">
                  <p><strong>Mailer:</strong> ${result.mailer_used}</p>
                  <p><strong>Host:</strong> ${result.config.smtp_host}</p>
                  <p><strong>Port:</strong> ${result.config.smtp_port}</p>
                </div>
              </div>
            </div>
          `;
        } else {
          resultDiv.className = 'rounded-2xl border border-red-200 bg-red-50 p-5 dark:border-red-800 dark:bg-red-900/20';
          resultDiv.innerHTML = `
            <div class="flex items-start gap-3">
              <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              <div>
                <h4 class="mb-2 font-semibold text-red-800 dark:text-red-200">送信失敗</h4>
                <p class="mb-2 text-sm text-red-700 dark:text-red-300">${result.message}</p>
                <details class="mt-2">
                  <summary class="cursor-pointer text-xs text-red-600 dark:text-red-400">詳細を見る</summary>
                  <pre class="mt-2 overflow-auto rounded bg-red-100 p-2 text-xs text-red-800 dark:bg-red-900/50 dark:text-red-200">${JSON.stringify(result, null, 2)}</pre>
                </details>
              </div>
            </div>
          `;
        }
      } catch (error) {
        resultDiv.classList.remove('hidden');
        resultDiv.className = 'rounded-2xl border border-red-200 bg-red-50 p-5 dark:border-red-800 dark:bg-red-900/20';
        resultDiv.innerHTML = `
          <div class="flex items-start gap-3">
            <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
              <h4 class="mb-2 font-semibold text-red-800 dark:text-red-200">エラー</h4>
              <p class="text-sm text-red-700 dark:text-red-300">${error.message}</p>
            </div>
          </div>
        `;
      } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = 'テストメール送信';
      }
    });
  </script>
</x-admin-layout>

<x-admin-layout>
  <div class="p-4 mx-auto max-w-7xl md:p-6">
    {{-- <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
      <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">QRコード読取</h2>
      <a href="{{ route('admin.member.index') }}" class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 transition ring-1 ring-inset ring-gray-300 rounded-lg bg-white shadow-theme-xs hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:ring-gray-700 dark:hover:bg-white/[0.03]">
        戻る
      </a>
    </div> --}}

    <div class="bg-white rounded-lg shadow-xl overflow-hidden border border-gray-200 dark:border-gray-800 dark:bg-white/[0.03]" style="width: 100%; max-width: 1024px; margin: 0 auto;">
      <div class="flex justify-between items-center p-4 border-b">
        <h3 class="text-lg font-semibold">QRコード読取</h3>
      </div>
      @error('error')
          <div style="padding: 1rem; background-color: rgb(254 226 226); border: 1px solid rgb(248 113 113); color: rgb(185 28 28); border-radius: 0.5rem; margin-bottom: 1rem;">
            {{ $message }}
        </div>
      @enderror
      @if (session('error'))
        <div style="padding: 1rem; background-color: rgb(254 226 226); border: 1px solid rgb(248 113 113); color: rgb(185 28 28); border-radius: 0.5rem; margin-bottom: 1rem;">
          {{ session('error') }}
        </div>
      @endif
      <div class="p-6 flex-grow flex flex-col items-center justify-center" style="min-height: 600px;">
        <div style="width: 80%;">
        <form action="{{ route('admin.member.qrresult') }}" method="get">
            <div class="flex items-center w-full mb-4">
            <input type="text" name="search" placeholder="会員番号、携帯番号で検索" class="border border-gray-500 p-2 flex-grow" style="width: 80%;">
            <button type="submit" class="p-2 border border-gray-500 ml-5 flex-shrink-0 text-center" style="background-color: #2563eb; color: white; border-radius: 0.375rem; border: none; cursor: pointer; width: 100px; margin-left: 20px; display: inline-block; text-decoration: none;">検索</button>
          </div>
        </form>
        <div class="flex justify-center items-center border-2 border-gray-400 mt-4 w-full" style="height: 400px;">
            <p class="text-2xl text-gray-500">QRコードを読み込んでください</p>
          </div>
        </div>
      </div>
      
      <div class="p-4 border-t flex justify-end bg-gray-50">
        <a href="{{ route('admin.member.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 text-center" style="display: inline-block; text-decoration: none; color: inherit;">戻る</a>
      </div>
    </div>
  </div>
</x-admin-layout>
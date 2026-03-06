<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />
  <!-- Newcomer -->
    <!-- 新人情報 - New Face -->
    <section class="newface">
      <div class="section-title --{{ $shop->slug }}">
        <span class="section-title-en title-font-midashi">
          CAST LIST
          {{-- <img src="{{ asset('assets/img/group/newface/title-en.svg') }}" alt="New Face"> --}}
        </span>
        <h2 class="section-title-ja title-font-sm-midashi">キャスト一覧</h2>
      </div>
      <div class="newcomer-list content-wrapper-shop">
        @foreach ($castlist as $cast)
          <div class="newcomer-item">
            <x-public.group.castlist :cast="$cast" />
          </div>
        @endforeach
      </div>
      <div class="newcomer-pagination">
        {{ $castlist->links('pagination::bootstrap-4') }}
      </div>
    </section>
</x-public-shop-layout>
@once
  @vite(['resources/scss/shop/newcomer.scss', 'resources/scss/shop/newface.scss'])
@endonce
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.newcomer-item');
    const prevBtn = document.querySelector('.newcomer-pagination__prev');
    const nextBtn = document.querySelector('.newcomer-pagination__next');
    const numbersContainer = document.querySelector('.newcomer-pagination__numbers');
    
    const isMobile = window.innerWidth <= 767;
    const itemsPerPage = isMobile ? 6 : 9;
    const totalPages = Math.ceil(items.length / itemsPerPage);
    let currentPage = 1;
  
    // ページ番号の生成
    function createPageNumbers() {
      numbersContainer.innerHTML = '';
      for (let i = 1; i <= totalPages; i++) {
        const pageNumber = document.createElement('button');
        pageNumber.textContent = i;
        pageNumber.classList.add('newcomer-pagination__number');
        if (i === currentPage) {
          pageNumber.classList.add('active');
        }
        pageNumber.addEventListener('click', () => goToPage(i));
        numbersContainer.appendChild(pageNumber);
      }
    }
  
    // ページ切り替え
    function goToPage(page) {
      currentPage = page;
      const start = (page - 1) * itemsPerPage;
      const end = start + itemsPerPage;
  
      items.forEach((item, index) => {
        if (index >= start && index < end) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
  
      // ボタンの状態更新
      prevBtn.disabled = currentPage === 1;
      nextBtn.disabled = currentPage === totalPages;
  
      // ページ番号のアクティブ状態更新
      document.querySelectorAll('.newcomer-pagination__number').forEach((btn, index) => {
        btn.classList.toggle('active', index + 1 === currentPage);
      });
    }
  
    // イベントリスナーの設定
    prevBtn.addEventListener('click', () => {
      if (currentPage > 1) {
        goToPage(currentPage - 1);
      }
    });
  
    nextBtn.addEventListener('click', () => {
      if (currentPage < totalPages) {
        goToPage(currentPage + 1);
      }
    });
  
    // 初期化
    createPageNumbers();
    goToPage(1);
  
    // リサイズ時の処理
    window.addEventListener('resize', () => {
      const newIsMobile = window.innerWidth <= 767;
      if (newIsMobile !== isMobile) {
        location.reload();
      }
    });
  });
  </script>

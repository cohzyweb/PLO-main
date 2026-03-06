<x-public-front-layout>

  <!-- Main Visual -->
  <x-public.group.mv />

  <!-- Pickup -->
 <!-- ピックアップ - Pickup Girl -->
 <section class="pickup">
  <div class="section-title">
    <span class="section-title-en title-font front-title">
      <span>P</span><span>I</span><span>C</span><span>K</span><span>U</span><span>P</span> <span>G</span><span>I</span><span>R</span><span>L</span>
      {{-- <img src="{{ asset('assets/img/group/pickup/title-en.svg') }}" alt="Pickup Girl"> --}}
    </span>
    <h2 class="section-title-ja title-font-sm">ピックアップ</h2>
  </div>
  <ul class="pickup-shops ">
    <div class="pickup-shop-button content-wrapper" >
      <li class="pickup-shop-detail" data-shop="all">
        <span class="shop-text">
          <span class="shop-name">ALL</span>
        </span>
      </li>
      <li class="pickup-shop-detail" data-shop="pussycat">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="shop-text">
          <span class="shop-slug">pussycat</span>
          <span class="shop-name">プッシー<br class="sm">キャット</span>
        </span>
      </li>
      <li class="pickup-shop-detail" data-shop="shizuku">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="shop-text">
          <span class="shop-slug">shizuku</span>
          <span class="shop-name">雫</span>
        </span>
      </li>
      <li class="pickup-shop-detail" data-shop="miyabi">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="shop-text">
          <span class="shop-slug">miyabi</span>
          <span class.shop-name>雅</span>
        </span>
      </li>
      <li class="pickup-shop-detail" data-shop="en">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="shop-text">
          <span class="shop-slug">en</span>
          <span class="shop-name">艶</span>
        </span>
      </li>
      <li class="pickup-shop-detail" data-shop="siroganeze">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="shop-text">
          <span class="shop-slug">siroganeze</span>
          <span class="shop-name">シロガネーゼ</span>
        </span>
      </li>
      <li class="pickup-shop-detail" data-shop="lovestory">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="shop-text">
          <span class="shop-slug">lovestory</span>
          <span class="shop-name">ラブストーリー</span>
        </span>
      </li>
    </div>

    <div class="pickup-list-detail content-wrapper" data-shop="all" >
    @foreach ($pickups as $pickup)
    <a
    href="{{ route('public.shop.cast.profile', ['shop' => $pickup->cast->shop->slug, 'id' => $pickup->cast->id]) }}"
    class="pickup-item --{{ $pickup->cast->shop->slug }}" data-display="show">
    <div class="pickup-photo --{{ $pickup->cast->shop->slug }}">
      <img src="{{ asset('storage/' . $pickup->cast->gallery_1) }}" alt="{{ $pickup->cast->name }}">
    </div>
    <span class="pickup-shop">
      {{ $pickup->cast->shop->name }}
    </span>
    <span class="pickup-name">
      {{ $pickup->cast->name }} <small>{{ $pickup->cast->age ? '(' . $pickup->cast->age . ')' : '' }}</small>
    </span>
    <span class="pickup-size --{{ $pickup->cast->shop->slug }}">
      B{{ $pickup->cast->bust }}　W{{ $pickup->cast->waist }}　H{{ $pickup->cast->hip }}
    </span>
    <span class="pickup-intro --{{ $pickup->cast->shop->slug }}">
      {{ $pickup->cast->appeal_point }}
    </span>
  </a>
    @endforeach
  </ul>
  </div>
  {{-- <a href="{{ route('public.group.pickup') }}" class="pickup-more more-button">もっと見る</a> --}}
  <div class="pagination content-wrapper">

  </div>
</section>
</x-public-front-layout>
@once
  @vite(['resources/scss/group/_pickup.scss'])
@endonce
<script>
/** 詳細ピックアップの「店舗名」ボタン */
document.addEventListener('DOMContentLoaded', function() {
  const shopButtons = document.querySelectorAll('.pickup-shop-detail');
  const pickupItems = document.querySelectorAll('.pickup-item');
  const pagination = document.querySelector('.pagination');
  const perPage = window.innerWidth < 768 ? 7 : 9;
  let currentPage = 1;
  let totalPages = Math.ceil(pickupItems.length / perPage);
  const isMobile = window.innerWidth < 768;

  // 初期表示
  if (document.querySelector('.pickup-list-detail').dataset.shop === 'all') {
    showAllItems();
    initializePagination();
  }

  // リサイズ時の処理
  window.addEventListener('resize', () => {
    const newIsMobile = window.innerWidth < 768;
    if (newIsMobile !== isMobile) {
      location.reload();
    }
  });

  // 店舗ボタンクリックイベント
  shopButtons.forEach(button => {
    button.addEventListener('click', () => {
      const selectedShop = button.dataset.shop;

      // ボタンのアクティブ状態を更新
      shopButtons.forEach(btn => btn.classList.remove('is-active'));
      button.classList.add('is-active');

      if (selectedShop === 'all') {
        showAllItems();
        initializePagination();
      } else {
        showShopItems(selectedShop);
      }
    });
  });

  // 全アイテム表示（ページネーション用）
  function showAllItems() {
    if (pagination) {
      pagination.style.display = 'flex';
    }
    showPage(1);
  }

  // 店舗別アイテム表示
  function showShopItems(shop) {
    if (pagination) {
      pagination.style.display = 'none';
    }

    let isFirst = true;
    pickupItems.forEach(item => {
      if (item.classList.contains(`--${shop}`)) {
        if (isFirst && isMobile) {
          item.style.display = 'flex';
          item.style.gridColumn = '1 / -1';
          isFirst = false;
        } else {
          item.style.display = 'flex';
          item.style.gridColumn = 'auto';
        }
      } else {
        item.style.display = 'none';
        item.style.gridColumn = 'auto';
      }
    });
  }

  // ページネーション機能
  function showPage(page) {
    const start = (page - 1) * perPage;
    const end = start + perPage;

    pickupItems.forEach((item, index) => {
      if (index >= start && index < end) {
        if (index === start && isMobile) {
          item.style.display = 'flex';
          item.style.gridColumn = '1 / -1';
        } else {
          item.style.display = 'flex';
          item.style.gridColumn = 'auto';
        }
      } else {
        item.style.display = 'none';
        item.style.gridColumn = 'auto';
      }
    });

    currentPage = page;
    renderPagination();
  }

  function initializePagination() {
    currentPage = 1;
    totalPages = Math.ceil(pickupItems.length / perPage);
    showPage(1);
    renderPagination();
  }

  function renderPagination() {
    if (!pagination) return;

    let html = '<ul class="pagination">';

    // 前へボタン
    html += `
      <li class="pagination-item ${currentPage === 1 ? 'disabled' : ''}">
        <a class="page-link" href="#" data-page="prev">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </li>
    `;

    // ページ番号
    let startPage = Math.max(1, currentPage - 1);
    let endPage = Math.min(totalPages, currentPage + 1);

    if (startPage > 1) {
      html += `
        <li class="pagination-item">
          <a class="page-link" href="#" data-page="1">1</a>
        </li>
      `;
      if (startPage > 2) {
        html += `
          <li class="pagination-item disabled">
            <span class="page-link">...</span>
          </li>
        `;
      }
    }

    for (let i = startPage; i <= endPage; i++) {
      html += `
        <li class="pagination-item ${i === currentPage ? 'active' : ''}">
          <a class="page-link" href="#" data-page="${i}">${i}</a>
        </li>
      `;
    }

    if (endPage < totalPages) {
      if (endPage < totalPages - 1) {
        html += `
          <li class="pagination-item disabled">
            <span class="page-link">...</span>
          </li>
        `;
      }
      html += `
        <li class="pagination-item">
          <a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a>
        </li>
      `;
    }

    // 次へボタン
    html += `
      <li class="pagination-item ${currentPage === totalPages ? 'disabled' : ''}">
        <a class="page-link" href="#" data-page="next">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </li>
    `;

    html += '</ul>';
    pagination.innerHTML = html;

    // ページネーションのクリックイベント
    const paginationLinks = pagination.querySelectorAll('.page-link');
    paginationLinks.forEach(link => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const pageData = link.dataset.page;

        if (pageData === 'prev' && currentPage > 1) {
          showPage(currentPage - 1);
        } else if (pageData === 'next' && currentPage < totalPages) {
          showPage(currentPage + 1);
        } else if (!isNaN(pageData)) {
          showPage(parseInt(pageData));
        }
      });
    });
  }
});
</script>

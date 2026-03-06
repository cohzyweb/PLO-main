<x-public-front-layout>

  <!-- Main Visual -->
  <x-public.group.mv />

  <!-- Newcomer -->
    <!-- 新人情報 - New Face -->
    <section class="newface">
      <div class="section-title">
        <span class="section-title-en title-font front-title">
          <span>N</span><span>E</span><span>W</span> <span>C</span><span>O</span><span>M</span><span>E</span><span>R</span>
        </span>
        <h2 class="section-title-ja title-font-sm">新人情報</h2>
      </div>
      <div class="newcomer-list content-wrapper">
        @foreach ($newcomers as $cast)
          <div class="newcomer-item">
            <a
            href="{{ route('public.shop.cast.profile', ['shop' => $cast->shop->slug, 'id' => $cast->id]) }}"
            class="newface-item is-{{ $cast->shop->slug }}"
          >
            <div class="newface-photo --{{ $cast->shop->slug }}">
              <img src="{{ asset('storage/' . $cast->gallery_1) }}" alt="{{ $cast->name }}">
            </div>
            <div class="newface-date">
              <div class="newface-date-shop">
                  {{ $cast->shop->name }}
              </div>
              <div class="newface-date-date">
                {{ $cast->created_at ? \Carbon\Carbon::createFromTimeString($cast->created_at)->format('n/j') : '' }}
              </div>
            </div>
            {{-- <span class="newface-name">
              {{ $cast->name }} <small>{{ $cast->age ? '(' . $cast->age . ')' : '' }}</small>
            </span> --}}
            <span class="newface-name">
              {{ $cast->name }}<small>{{ $cast->age ? '(' . $cast->age . ')' : '' }}</small>
            </span>
            <span class="newface-size --{{ $cast->shop->slug }}">
              B{{ $cast->bust }}　W{{ $cast->waist }}　H{{ $cast->hip }}
            </span>
            {{-- <span class="newface-size">
              B{{ $cast->bust }}　W{{ $cast->waist }}　H{{ $cast->hip }}
            </span> --}}
            <p class="newface-intro --{{ $cast->shop->slug }}">
              {{ $cast->appeal_point }}
            </p>
          </a>

          </div>
        @endforeach
      </div>
      <div class="newcomer-pagination content-wrapper">
        {{ $newcomers->links('pagination::bootstrap-4') }}
      </div>
    </section>

</x-public-front-layout>
@once
  @vite(['resources/scss/group/_newcomer.scss','resources/scss/group/newfacelist.scss'])
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

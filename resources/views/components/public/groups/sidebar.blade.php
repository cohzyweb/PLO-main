@php
  $shopNavs = [
    'shizuku' => [
      'name' => 'Shizuku',
      'japanese' => '雫',
      'description' => 'ハイグレードヘルス',
      'logo' => 'shizuku-logo.png',
      'link' => route('public.shops.shop.home', ['shop' => 'shizuku']),
      'banner' => 'shizuku.png',
      'xlink' => 'http://localhost/shizuku'
      // 'xlink' => 'https://plo-group.jp/shizuku'
    ],
    'siroganeze' => [
      'name' => 'Siroganeze',
      'japanese' => 'シロガネーゼ',
      'description' => '大人の回春メンズエステ',
      'logo' => 'siroganeze-logo.png',
      'link' => route('public.shops.shop.home', ['shop' => 'siroganeze']),
      'banner' => 'siroganeze.png',
      'xlink' => 'http://localhost/siroganeze'
      // 'xlink' => 'https://plo-group.jp/siroganeze'
    ],
    'lovestory' => [
      'name' => 'Love Story',
      'japanese' => 'ラブストーリー',
      'description' => '育成型ヘルス',
      'logo' => 'lovestory-logo.png',
      'link' => route('public.shops.shop.home', ['shop' => 'lovestory']),
      'banner' => 'lovestory.png',
      'xlink' => 'http://localhost/lovestory'
      // 'xlink' => 'https://plo-group.jp/lovestory'
    ],
    'pussycat' => [
      'name' => 'Pussycat',
      'japanese' => 'プッシーキャット',
      'description' => 'エンターテイメントヘルス',
      'logo' => 'pussycat-logo.png',
      'link' => route('public.shops.shop.home', ['shop' => 'pussycat']),
      'banner' => 'pussycat.png',
      'xlink' => 'http://localhost/pussycat'
      // 'xlink' => 'https://plo-group.jp/pussycat'
    ],

    'miyabi' => [
      'name' => 'Miyabi',
      'japanese' => '雅',
      'description' => '人妻ヘルス',
      'logo' => 'miyabi-logo.png',
      'link' => route('public.shops.shop.home', ['shop' => 'miyabi']),
      'banner' => 'miyabi.png',
      'xlink' => 'http://localhost/miyabi'
      // 'xlink' => 'https://plo-group.jp/miyabi'
    ],
    'en' => [
      'name' => 'En',
      'japanese' => '艶',
      'description' => '素人系人妻ヘルス',
      'logo' => 'en-logo.png',
      'link' => route('public.shops.shop.home', ['shop' => 'en']),
      'banner' => 'en.png',
      'xlink' => 'http://localhost/en'
      // 'xlink' => 'https://plo-group.jp/en'
    ],

  ];
@endphp

<aside class="pg-fixed-sidebar">
  <div class="pg-fixed-sidebar__inner">
    <div class="pg-fixed-sidebar__logo">
      <a href="{{ route('public.groups.home') }}">
        <img src="{{ asset('assets/img/groups/plo-logo-black.png') }}" alt="PLO Group"/>
      </a>
    </div>

    <nav class="pg-fixed-sidebar__shops">
        @foreach($shopNavs as $shopNav)
          <a class="pg-fixed-sidebar__shop" href="{{ $shopNav['link'] }}">
            <img src="{{ asset('assets/img/logo/' . $shopNav['logo']) }}" alt="{{ $shopNav['name'] }}"/>
            <div class="pg-fixed-sidebar__shop-label">
                <span class="pg-fixed-sidebar__shop-label-name">{{ strtoupper($shopNav['name']) }}</span>
                <span class="pg-fixed-sidebar__shop-label-japanese">{{ $shopNav['japanese'] }}</span>
                <span class="pg-fixed-sidebar__shop-label-name">{{ $shopNav['description'] }}</span>
            </div>
          </a>
        @endforeach
    </nav>

    <div class="pg-fixed-sidebar__phone">
      <div class="pg-phone">
        <div class="pg-phone__content">
          <div class="pg-phone__banner" data-phone-banner>
            <div class="pg-phone__banner-track" data-banner-track>
              @foreach($shopNavs as $shopKey => $shopNav)
                <!-- <div class="pg-phone__banner-item" data-xlink="{{ $shopNav['xlink'] }}">
                  <iframe class="pg-phone__iframe" src="{{ $shopNav['xlink'] }}" loading="lazy" referrerpolicy="no-referrer"></iframe>
                </div> -->
              @endforeach
              <div class="pg-phone__banner-item" data-xlink="https://x.com/ShizukuHealth">
                <img src="{{ asset('assets/img/shop banner/phone-shizuku.png' ) }}" alt="Shizuku" />
              </div>
              <div class="pg-phone__banner-item" data-xlink="https://x.com/sapporoenn0219">
                <img src="{{ asset('assets/img/shop banner/phone-en.png' ) }}" alt="En" />
              </div>
              <div class="pg-phone__banner-item" data-xlink="https://x.com/EstheSiroganeze">
                <img src="{{ asset('assets/img/shop banner/phone-siroganeze.png' ) }}" alt="siroganeze" />
              </div>
              <div class="pg-phone__banner-item" data-xlink="https://x.com/lovestory9911">
                <img src="{{ asset('assets/img/shop banner/phone-lovestory.png' ) }}" alt="Love Story" />
              </div>
            </div>
          </div>
        </div>
        <img src="{{ asset('assets/img/phone.png') }}" alt="phone" class="pg-phone__frame" />
      </div>
    </div>
  </div>
</aside>

@push('scripts')
  <script>
    (function(){
      const track = document.querySelector('[data-banner-track]');
      const banner = document.querySelector('[data-phone-banner]');
      if(!track || !banner) return;
      let index = 0;
      let currentHref = '';
      const updateCurrent = () => {
        const items = Array.from(track.children);
        if(items.length === 0) return;
        const current = items[index];
        currentHref = current.getAttribute('data-xlink') || '';
      };
      const step = () => {
        const items = track.children;
        if(items.length === 0) return;
        index = (index + 1) % items.length;
        const itemWidth = items[0].getBoundingClientRect().width + 8; // width + gap
        const x = -index * itemWidth;
        track.style.transform = `translateX(${x}px)`;
        updateCurrent();
      };
      updateCurrent();
      setInterval(step, 2500);
      banner.addEventListener('click', function(){
        if(currentHref){ window.open(currentHref, '_blank', 'noopener'); }
      });
    })();
  </script>
@endpush

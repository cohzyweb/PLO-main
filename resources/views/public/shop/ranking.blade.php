<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />

  <!-- Ranking -->
  <section class="ranking">
    <div class="ranking-title --{{ $shop->slug }}">
      <div class="ranking-title-en title-font-midashi">
        RANKING
      </div>
      <h2 class="title-font-sm-midashi">ランキング</h2>
    </div>
    @if ($rankings[0]->ranking_rank === 1)
    <div class="ranking-one content-wrapper-shop">
      <a class="ranking-one-item" href="{{ route('public.shop.cast.profile',['shop'=>$shop->slug,'id'=>$rankings[0]->cast_id]) }}">
        <div class="ranking-one-item-content">
          <div class="ranking-one-item-content-rank">
            <img src="{{ asset('assets/img/shop/no1.png') }}" alt="1位" class="ranking-badge">
          </div>
          <div class="ranking-one-item-content-info">
            <div class="ranking-one-item-content-info-name">
              {{ $rankings[0]->cast->name}}
            </div>
            <div class="ranking-one-item-content-info-bwh">
              <span class="ranking-item-age">{{ $rankings[0]->cast->age.'歳 / ' }}</span>              
              <span class="ranking-item-bwh-bust">{{ 'H.'.$rankings[0]->cast->height }}</span>
              <span class="ranking-item-bwh-bust">{{ 'B.'.$rankings[0]->cast->bust }}</span>
              <span class="ranking-item-bwh-waist">{{ 'W.'.$rankings[0]->cast->waist }}</span>
              <span class="ranking-item-bwh-hip">{{ 'H.'.$rankings[0]->cast->hip }}</span>
            </div>
          </div>
          <div class="ranking-one-item-content-appeal pc-only">
            <span class="ranking-one-item-content-appeal-text">{{ $rankings[0]->cast->appeal_point }}</span>
          </div>
        </div>
        <div class="ranking-one-item-image pc-only">
          <div class="ranking-one-item-image-photo1">
            <img src="{{ asset('storage/' . $rankings[0]->cast->gallery_1) }}" alt="{{ $rankings[0]->cast->name }}">
          </div>
          <div class="ranking-one-item-image-photo2">
            <img src="{{ asset('storage/' . $rankings[0]->cast->gallery_2) }}" alt="{{ $rankings[0]->cast->name }}">
          </div>
          <div class="ranking-one-item-image-photo3">
            <img src="{{ asset('storage/' . $rankings[0]->cast->gallery_3) }}" alt="{{ $rankings[0]->cast->name }}">
          </div>
        </div>
        <div class="ranking-one-item-image-sp sp-only swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="ranking-one-item-image-sp-photo">
                <img src="{{ asset('storage/' . $rankings[0]->cast->gallery_1) }}" alt="{{ $rankings[0]->cast->name }}">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="ranking-one-item-image-sp-photo">
                <img src="{{ asset('storage/' . $rankings[0]->cast->gallery_2) }}" alt="{{ $rankings[0]->cast->name }}">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="ranking-one-item-image-sp-photo">
                <img src="{{ asset('storage/' . $rankings[0]->cast->gallery_3) }}" alt="{{ $rankings[0]->cast->name }}">
              </div>
            </div>
          </div>
          <div class="swiper-pagination"></div>
            <div class="ranking-one-item-image-sp-prev">
            <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
          </div>
          <div class="ranking-one-item-image-sp-next">
            <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
          </div>
        </div>
        <div class="ranking-one-item-content-appeal sp-only">
          <span class="ranking-one-item-content-appeal-text">{{ $rankings[0]->cast->appeal_point }}</span>
        </div>
    </a>

    </div>
    @endif
    <div class="ranking-two content-wrapper-shop">
    @foreach ($rankings as $ranking)
      @if($ranking->ranking_rank === 2)
        <a class="ranking-two-item" href="{{ route('public.shop.cast.profile',['shop'=>$shop->slug,'id'=>$ranking->cast_id]) }}">
          <div class="ranking-two-item-content">
            <div class="ranking-two-item-content-rank">
              <img src="{{ asset('assets/img/shop/no2.png') }}" alt="2位" class="ranking-badge">
            </div>
            <div class="ranking-two-item-content-info2">
              <div class="ranking-two-item-content-info2-name">
                {{ $ranking->cast->name}}
              </div>
              <div class="ranking-two-item-content-info2-bwh">
                <span class="ranking-item-age">{{ $ranking->cast->age.'歳 / ' }}</span>              
                <span class="ranking-item-bwh-bust">{{ 'H.'.$ranking->cast->height }}</span>
                <span class="ranking-item-bwh-bust">{{ 'B.'.$ranking->cast->bust }}</span>
                <span class="ranking-item-bwh-waist">{{ 'W.'.$ranking->cast->waist }}</span>
                <span class="ranking-item-bwh-hip">{{ 'H.'.$ranking->cast->hip }}</span>
              </div>
            </div>
          </div>
          <div class="ranking-two-item-image pc-only">
            <div class="ranking-two-item-image-photo1">
              <img src="{{ asset('storage/' . $ranking->cast->gallery_1) }}" alt="{{ $ranking->cast->name }}">
            </div>
            <div class="ranking-two-item-image-photo2">
              <img src="{{ asset('storage/' . $ranking->cast->gallery_2) }}" alt="{{ $ranking->cast->name }}">
            </div>
          </div>
          <div class="ranking-two-item-image-two-sp sp-only swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="ranking-two-item-image-two-sp-photo">
                  <img src="{{ asset('storage/' . $ranking->cast->gallery_1) }}" alt="{{ $ranking->cast->name }}">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="ranking-two-item-image-two-sp-photo">
                  <img src="{{ asset('storage/' . $ranking->cast->gallery_2) }}" alt="{{ $ranking->cast->name }}">
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="ranking-two-item-image-two-sp-prev">
              <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
            </div>
            <div class="ranking-two-item-image-two-sp-next">
              <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
            </div>
          </div>
          <div class="ranking-two-item-appeal">
            <span class="ranking-two-item-appeal-text">{{ $ranking->cast->appeal_point }}</span>
          </div>
        </a>
      @endif
      
      @if($ranking->ranking_rank === 3)
        <a class="ranking-two-item" href="{{ route('public.shop.cast.profile',['shop'=>$shop->slug,'id'=>$ranking->cast_id]) }}">
          <div class="ranking-two-item-content">
            <div class="ranking-two-item-content-rank">
              <img src="{{ asset('assets/img/shop/no3.png') }}" alt="2位" class="ranking-badge">
            </div>
            <div class="ranking-two-item-content-info3">
              <div class="ranking-two-item-content-info3-name">
                {{ $ranking->cast->name}}
              </div>
              <div class="ranking-two-item-content-info3-bwh">
                <span class="ranking-item-age">{{ $ranking->cast->age.'歳 / ' }}</span>              
                <span class="ranking-item-bwh-bust">{{ 'H.'.$ranking->cast->height }}</span>
                <span class="ranking-item-bwh-bust">{{ 'B.'.$ranking->cast->bust }}</span>
                <span class="ranking-item-bwh-waist">{{ 'W.'.$ranking->cast->waist }}</span>
                <span class="ranking-item-bwh-hip">{{ 'H.'.$ranking->cast->hip }}</span>
              </div>
            </div>
          </div>
          <div class="ranking-two-item-image pc-only">
            <div class="ranking-two-item-image-photo1">
              <img src="{{ asset('storage/' . $ranking->cast->gallery_1) }}" alt="{{ $ranking->cast->name }}">
            </div>
            <div class="ranking-two-item-image-photo2">
              <img src="{{ asset('storage/' . $ranking->cast->gallery_2) }}" alt="{{ $ranking->cast->name }}">
            </div>
          </div>
          <div class="ranking-two-item-image-three-sp sp-only swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="ranking-two-item-image-three-sp-photo">
                  <img src="{{ asset('storage/' . $ranking->cast->gallery_1) }}" alt="{{ $ranking->cast->name }}">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="ranking-two-item-image-three-sp-photo">
                  <img src="{{ asset('storage/' . $ranking->cast->gallery_2) }}" alt="{{ $ranking->cast->name }}">
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="ranking-two-item-image-three-sp-prev">
              <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
            </div>
            <div class="ranking-two-item-image-three-sp-next">
              <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
            </div>
          </div>


          <div class="ranking-two-item-appeal">
            <span class="ranking-two-item-appeal-text">{{ $ranking->cast->appeal_point }}</span>
          </div>
        </a>
      @endif
    @endforeach
    </div>
    <div class="ranking-four content-wrapper-shop">
      @foreach ($rankings as $ranking)
        @if($ranking->ranking_rank === 4)
          <a class="ranking-four-item" href="{{ route('public.shop.cast.profile',['shop'=>$shop->slug,'id'=>$ranking->cast_id]) }}">
            <div class="ranking-four-item-content">
              <div class="ranking-four-item-content-rank">
                <img src="{{ asset('assets/img/shop/no4.png') }}" alt="4位" class="ranking-badge">
              </div>
            </div>
            <div class="ranking-four-item-image">
              <div class="ranking-four-item-image-photo1">
                <img src="{{ asset('storage/' . $ranking->cast->gallery_1) }}" alt="{{ $ranking->cast->name }}">
              </div>
            </div>
            <div class="ranking-four-item-context">
              <div class="ranking-four-item-context-info">
                <div class="ranking-four-item-context-info-name">
                  {{ $ranking->cast->name}}
                </div>
                <div class="ranking-four-item-context-info-bwh">
                  <span class="ranking-item-age">{{ $ranking->cast->age.'歳 / ' }}</span>              
                  <span class="ranking-item-bwh-bust">{{ 'H.'.$rankings[0]->cast->height }}</span>
                  <span class="ranking-item-bwh-bust">{{ 'B.'.$rankings[0]->cast->bust }}</span>
                  <span class="ranking-item-bwh-waist">{{ 'W.'.$rankings[0]->cast->waist }}</span>
                  <span class="ranking-item-bwh-hip">{{ 'H.'.$rankings[0]->cast->hip }}</span>
                </div>
              </div>
              <div class="ranking-four-item-context-appeal">
                <span class="ranking-four-item-context-appeal-text">{{ $ranking->cast->appeal_point }}</span>
              </div>
            </div>
          </a>
        @endif
        @if($ranking->ranking_rank === 5)
          <a class="ranking-four-item" href="{{ route('public.shop.cast.profile',['shop'=>$shop->slug,'id'=>$ranking->cast_id]) }}">
            <div class="ranking-four-item-content">
              <div class="ranking-four-item-content-rank">
                <img src="{{ asset('assets/img/shop/no5.png') }}" alt="5位" class="ranking-badge">
              </div>
            </div>
            <div class="ranking-four-item-image">
              <div class="ranking-four-item-image-photo1">
                <img src="{{ asset('storage/' . $ranking->cast->gallery_1) }}" alt="{{ $ranking->cast->name }}">
              </div>
            </div>
            <div class="ranking-four-item-context">
              <div class="ranking-four-item-context-info">
                <div class="ranking-four-item-context-info-name">
                  {{ $ranking->cast->name}}
                </div>
                <div class="ranking-four-item-context-info-bwh">
                  <span class="ranking-item-age">{{ $ranking->cast->age.'歳 / ' }}</span>              
                  <span class="ranking-item-bwh-bust">{{ 'H.'.$rankings[0]->cast->height }}</span>
                  <span class="ranking-item-bwh-bust">{{ 'B.'.$rankings[0]->cast->bust }}</span>
                  <span class="ranking-item-bwh-waist">{{ 'W.'.$rankings[0]->cast->waist }}</span>
                  <span class="ranking-item-bwh-hip">{{ 'H.'.$rankings[0]->cast->hip }}</span>
                </div>
              </div>
              <div class="ranking-four-item-context-appeal">
                <span class="ranking-four-item-context-appeal-text">{{ $ranking->cast->appeal_point }}</span>
              </div>
            </div>
          </a>
        @endif
        @if($ranking->ranking_rank === 6)
          <a class="ranking-four-item" href="{{ route('public.shop.cast.profile',['shop'=>$shop->slug,'id'=>$ranking->cast_id]) }}">
            <div class="ranking-four-item-content">
              <div class="ranking-four-item-content-rank">
                <img src="{{ asset('assets/img/shop/no6.png') }}" alt="5位" class="ranking-badge">
              </div>
            </div>
            <div class="ranking-four-item-image">
              <div class="ranking-four-item-image-photo1">
                <img src="{{ asset('storage/' . $ranking->cast->gallery_1) }}" alt="{{ $ranking->cast->name }}">
              </div>
            </div>
            <div class="ranking-four-item-context">
              <div class="ranking-four-item-context-info">
                <div class="ranking-four-item-context-info-name">
                  {{ $ranking->cast->name}}
                </div>
                <div class="ranking-four-item-context-info-bwh">
                  <span class="ranking-item-age">{{ $ranking->cast->age.'歳 / ' }}</span>              
                  <span class="ranking-item-bwh-bust">{{ 'H.'.$rankings[0]->cast->height }}</span>
                  <span class="ranking-item-bwh-bust">{{ 'B.'.$rankings[0]->cast->bust }}</span>
                  <span class="ranking-item-bwh-waist">{{ 'W.'.$rankings[0]->cast->waist }}</span>
                  <span class="ranking-item-bwh-hip">{{ 'H.'.$rankings[0]->cast->hip }}</span>
                </div>
              </div>
              <div class="ranking-four-item-context-appeal">
                <span class="ranking-four-item-context-appeal-text">{{ $ranking->cast->appeal_point }}</span>
              </div>
            </div>
          </a>
        @endif
        @if($ranking->ranking_rank === 7)
          <a class="ranking-four-item" href="{{ route('public.shop.cast.profile',['shop'=>$shop->slug,'id'=>$ranking->cast_id]) }}">
            <div class="ranking-four-item-content">
              <div class="ranking-four-item-content-rank">
                <img src="{{ asset('assets/img/shop/no7.png') }}" alt="5位" class="ranking-badge">
              </div>
            </div>
            <div class="ranking-four-item-image">
              <div class="ranking-four-item-image-photo1">
                <img src="{{ asset('storage/' . $ranking->cast->gallery_1) }}" alt="{{ $ranking->cast->name }}">
              </div>
            </div>
            <div class="ranking-four-item-context">
              <div class="ranking-four-item-context-info">
                <div class="ranking-four-item-context-info-name">
                  {{ $ranking->cast->name}}
                </div>
                <div class="ranking-four-item-context-info-bwh">
                  <span class="ranking-item-age">{{ $ranking->cast->age.'歳 / ' }}</span>              
                  <span class="ranking-item-bwh-bust">{{ 'H.'.$rankings[0]->cast->height }}</span>
                  <span class="ranking-item-bwh-bust">{{ 'B.'.$rankings[0]->cast->bust }}</span>
                  <span class="ranking-item-bwh-waist">{{ 'W.'.$rankings[0]->cast->waist }}</span>
                  <span class="ranking-item-bwh-hip">{{ 'H.'.$rankings[0]->cast->hip }}</span>
                </div>
              </div>
              <div class="ranking-four-item-context-appeal">
                <span class="ranking-four-item-context-appeal-text">{{ $ranking->cast->appeal_point }}</span>
              </div>
            </div>
          </a>
        @endif
      @endforeach
    </div>

  </section>
</x-public-shop-layout>
@once
  @vite(['resources/scss/shop/_ranking.scss', 'resources/js/shop/ranking.js'])
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> --}}
@endonce
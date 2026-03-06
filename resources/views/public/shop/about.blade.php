<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />

  <section class="about">
    <div class="about-container">
      <h2 class="about-title --{{ $shop->slug }} title-font-midashi">
        About
      </h2>
      <div class="about-content content-wrapper">
        <div class="about-content-title">
            店舗詳細
        </div>
        <div class="about-content-text">
            <div class="shop-info">
                <div class="info-item">
                    <div class="info-label --{{ $shop->slug }}">住所</div>
                    <div class="info-value">{{ $shop->address1."　　".$shop->address2 }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label --{{ $shop->slug }}">電話番号</div>
                    <div class="info-value">{{ $shop->tel }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label --{{ $shop->slug }}">営業時間</div>
                    @if($shop->open_start && $shop->open_end)
                    <div class="info-value">{{ $shop->open_start->format('H:i')."〜".$shop->open_end->format('H:i') }}</div>
                    @endif
                </div>
                <div class="info-item">
                    <div class="info-label --{{ $shop->slug }}">店舗情報</div>
                    <div class="info-value">{{ $shop->memo }}</div>
                </div>
            </div>
        </div>
      </div>
      <h2 class="about-title --{{ $shop->slug }} title-font-midashi">
        MAP
      </h2>
      <div class="about-content content-wrapper">
        <div class="about-content-map-title">
          所在地マップ
        </div>
        @if($shop->address1!="")
        <div class="about-content-map-content">
          <iframe
            style="border:0"
            loading="lazy"
            allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps?q={{ $shop->address1." ".$shop->address2 }}&output=embed">
          </iframe>
        </div>
        @endif
      </div>
    </div>
  </section>

</x-public-shop-layout>
@once
    @vite('resources/scss/shop/_about.scss')
@endonce
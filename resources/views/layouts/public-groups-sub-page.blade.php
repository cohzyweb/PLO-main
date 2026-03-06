<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'PLOグループ') }}</title>
    <link rel="icon" href="favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    @vite(['resources/scss/groups.scss', 'resources/js/groups.js'])
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @stack('styles')
  </head>
  <body class="">

    <!-- 年齢確認モーダル -->
    {{-- <x-age-verification-modal /> --}}

    <!-- Header -->
    <x-public.groups.header-sub />

    <!-- Dynamic Banner -->
    @php
      $isMaleRecruit = request()->routeIs('public.recruit.male');
      // All recruit pages (male / female / others) should bypass groups wrapper
      $isSimpleRecruitLayout = request()->routeIs('public.recruit.*');
      // On male recruit page we want to control the banner background purely via CSS
      // so we skip passing the background image prop.
      $computedBannerImage = $isMaleRecruit ? null : $bannerImage;
      $bannerExtraClass = $isMaleRecruit
        ? 'banner-photodiary--male'
        : (request()->routeIs('public.recruit.female') ? 'banner-photodiary--female' : '');
    @endphp
    <x-public.groups.banner
      :backgroundImage="$computedBannerImage"
      :titleEn="$titleEn"
      :titleJa="$titleJa"
      :vectorImage="$vectorImage"
      :extraClass="$bannerExtraClass"
    />

    <!-- Main -->
    @if($isSimpleRecruitLayout)
      {{-- Recruit pages: simple main that renders slot directly --}}
      <main class="main" id="main">
        {{ $slot }}
      </main>
    @else
      <main class="main" id="main">
        <div class="groups-page-wrapper">
          <div class="groups-content-container {{ request()->routeIs('public.groups.photodiary') ? 'groups-content-container--photodiary' : '' }} {{ request()->routeIs('public.groups.newface') ? 'groups-content-container--newface' : '' }}">

            @if($showDateSearchBar)
              <x-public.groups.date-search-bar
                :icon="$dateSearchIcon"
                :heading="$dateSearchHeading"
                :dates="$dateSearchDates"
                :activeDate="$dateSearchActiveDate"
              />
            @endif

            @if($searchHeading)
              <h1 class="groups-search-heading">{{ $searchHeading }}</h1>
            @endif

            @if($showButtonGroup)
              @if(request()->routeIs('public.groups.newface') || request()->routeIs('public.groups.photodiary') || request()->routeIs('public.groups.schedule') || request()->routeIs('public.groups.event') || request()->routeIs('public.groups.movie') || request()->routeIs('public.groups.pickup'))
                <form method="GET" action="{{ url()->current() }}" class="groups-shops-buttons">
                  @foreach(request()->except('shop', 'page', 'date') as $key => $value)
                    @if(is_scalar($value))
                      <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                  @endforeach

                  @php $isAllActive = blank(request('shop')); @endphp
                  <button
                    class="groups-shop-button--main {{ $isAllActive ? 'is-active' : '' }}"
                    type="submit"
                    name="shop"
                    value=""
                    aria-pressed="{{ $isAllActive ? 'true' : 'false' }}"
                  >
                    全店舗
                  </button>

                  <div class="groups-shops-grid">
                    @if($buttonGroup)
                      @foreach($buttonGroup as $row)
                        <div class="groups-shops-grid-row">
                          @foreach($row as $button)
                            @php $isActive = request('shop') === ($button['shop'] ?? null); @endphp
                            <button
                              type="submit"
                              name="shop"
                              value="{{ $button['shop'] ?? '' }}"
                              class="groups-shop-button--shop {{ $button['class'] ?? '' }} {{ $isActive ? 'is-active' : '' }}"
                              aria-pressed="{{ $isActive ? 'true' : 'false' }}"
                            >
                              <img src="{{ asset($button['image']) }}" alt="{{ $button['alt'] ?? '' }}">
                            </button>
                          @endforeach
                        </div>
                      @endforeach
                    @endif
                  </div>
                </form>
              @else
                <div class="groups-shops-buttons">
                  <button class="groups-shop-button--main" type="button">
                    全店舗
                  </button>
                  <div class="groups-shops-grid">
                    @if($buttonGroup)
                      @foreach($buttonGroup as $row)
                        <div class="groups-shops-grid-row">
                          @foreach($row as $button)
                            <a href="{{ $button['url'] }}" class="groups-shop-button--shop {{ $button['class'] ?? '' }}">
                              <img src="{{ asset($button['image']) }}" alt="{{ $button['alt'] ?? '' }}">
                            </a>
                          @endforeach
                        </div>
                      @endforeach
                    @else
                      {{-- Default button group for photo diary --}}
                      <div class="groups-shops-grid-row">
                        <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'shizuku']) }}" class="groups-shop-button--shop all-shops-button--shizuku">
                          <img src="{{ asset('assets/img/groups/photo-diary-button1.png') }}" alt="Shizuku">
                        </a>
                        <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'siroganeze']) }}" class="groups-shop-button--shop">
                          <img src="{{ asset('assets/img/groups/photo-diary-button2.png') }}" alt="Siroganeze">
                        </a>
                        <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'lovestory']) }}" class="groups-shop-button--shop">
                          <img src="{{ asset('assets/img/groups/photo-diary-button3.png') }}" alt="Love Story">
                        </a>
                      </div>
                      <div class="groups-shops-grid-row">
                        <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'pussycat']) }}" class="groups-shop-button--shop all-shops-button--pussycat">
                          <img src="{{ asset('assets/img/groups/photo-diary-button4.png') }}" alt="Pussycat">
                        </a>
                        <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'miyabi']) }}" class="groups-shop-button--shop all-shops-button--miyabi">
                          <img src="{{ asset('assets/img/groups/photo-diary-button5.png') }}" alt="Miyabi">
                        </a>
                        <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'en']) }}" class="groups-shop-button--shop">
                          <img src="{{ asset('assets/img/groups/photo-diary-button6.png') }}" alt="En">
                        </a>
                      </div>
                    @endif
                  </div>
                </div>
              @endif
            @endif

            {{ $slot }}
          </div>
        </div>

        @if($showLoadMore)
          <a class="go-to-top-page" href="{{ route('public.groups.home') }}">
            <p>
              トップページへもどる
            </p>
          </a>
        @endif
      </main>
    @endif

    <!-- Footer -->
    <x-public.groups.footer />

    @stack('scripts')
  </body>
</html>

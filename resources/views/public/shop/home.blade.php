<x-public-shop-layout :shop="$shop">

    <!-- Main Visual -->
    <x-public.shop.mv :shop="$shop" />
    {{-- <div class="phone-link-container --mv">
    <x-public.shop.phone-link :shop="$shop" />
  </div> --}}

    @if ($todayCasts->count() > 0)
        <!-- Today Schedule -->
        <div class="today">
            <h2 class="today-title title-font-midashi --{{ $shop->slug }}">
                {{-- <img src="{{ asset('assets/img/shop/' . $shop->slug . '/today/title.svg') }}" alt="Today Schedule"> --}}
                Today Schedule
                {{-- <img src="{{ asset('assets/img/shop/calender-b.png') }}" alt="Today Schedule"> --}}
            </h2>
            <div class="today-description">
                <div class="today-description-title">
                    <img src="{{ asset('assets/img/shop/calender-g.png') }}" alt="Today Schedule">
                    <span>出勤情報</span>
                </div>
                <div class="today-description-content">
                    本日出勤する女性情報になります。
                </div>
            </div>
            <div class="today-lists --{{ $shop->slug }}">
                <div class="today-list content-wrapper-shop">
                    @foreach ($todayCasts as $cast)
                        <x-public.shop.today :cast="$cast" />
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    {{-- <!-- Mock -->
  <div class="mock mock">
    <picture>
      <source media="(max-width: 767px)" srcset="{{ asset('assets/img/shop-mock-sp.png') }}">
      <img src="{{ asset('assets/img/shop-mock-pc.png') }}" alt="">
    </picture>
  </div> --}}
    <!-- New Girls -->
    {{-- <div class="new-girls mock mock">
    <h2 class="new-girls-title">
      <picture>
        <source media="(max-width: 767px)" srcset="{{ asset('assets/img/shop/newgirls-sm.png') }}">
        <img src="{{ asset('assets/img/shop/newgirls.png') }}" alt="New Girls">
      </picture>
    </h2>
    <div class="new-girls-list"></div>
  </div> --}}
    <div class="new-girls">
        @if ($new_girls_month->count() > 0)
            <div class="new-girls-header --{{ $shop->slug }}">
                {{-- <div class="new-girls-header"> --}}
                <div class="new-girls-header-title title-font-midashi">
                    New Girls
                    <img src="{{ asset('assets/img/shop/attachment2.png') }}" alt="New Girls" />
                </div>
                <div class="new-girls-header-button">
                    <a href="{{ route('public.shop.newcomer', ['shop' => $shop->slug]) }}"
                        class="new-girls-header-button-link">
                        一覧を見る
                    </a>
                </div>
            </div>
        @endif
        @if ($new_girls->count() > 0)
            <div class="new-girls-list content-wrapper-shop">
                @foreach ($new_girls as $new_girl)
                    {{-- <div class="new-girls-item"> --}}
                    <a class="new-girls-item"
                        href="{{ route('public.shop.cast.profile', ['shop' => $shop->slug, 'id' => $new_girl->id]) }}">
                        {{-- <a href="{{ route('public.shop.cast.profile', ['shop' => $shop->slug, 'id' => $new_girl->id]) }}"> --}}
                        <div class="new-girls-item-left">
                            <div class="new-girls-item-left-image">
                                <img src="{{ asset('storage/' . $new_girl->gallery_1) }}" alt="{{ $new_girl->name }}">
                            </div>
                            <div class="new-girls-item-left-contents-hr">

                            </div>
                            <div class="new-girls-item-left-contents">
                                <div class="new-girls-item-left-contents-date">
                                    <img src="{{ asset('assets/img/shop/calender-y.png') }}" alt="Today Schedule">
                                    {{ $new_girl->created_at->format('Y:m:d') . ' 入店' }}
                                </div>
                                <div class="new-girls-item-left-contents-name">
                                    <img src="{{ asset('assets/img/shop/star-w.png') }}" alt="Name">
                                    {{ $new_girl->name . '(' . $new_girl->age . ')' }}
                                </div>
                                <div class="new-girls-item-left-contents-size">
                                    <img src="{{ asset('assets/img/shop/heart-w.png') }}" alt="Size">
                                    {{ 'T:' . $new_girl->height . ' B:' . $new_girl->bust . ' W:' . $new_girl->waist . ' H:' . $new_girl->hip }}
                                </div>
                                <div class="new-girls-item-left-contents-note --{{ $shop->slug }}">
                                    <div class="new-girls-item-left-contents-note-memo">
                                        {{ $new_girl->appeal_point }}
                                    </div>
                                    <div class="new-girls-item-left-contents-note-comment">
                                        {{ $new_girl->manager_comment }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="new-girls-item-middle">
              <div class="new-girls-item-middle-name">
                {{ $new_girl->name }}
              </div>
            </div> --}}
                        <div class="new-girls-item-right">
                            <div class="new-girls-item-right-name --{{ $shop->slug }}">
                                {{ $new_girl->name }}
                            </div>
                            <div class="new-girls-item-right-image">
                                <img src="{{ asset('storage/' . $new_girl->gallery_1) }}" alt="{{ $new_girl->name }}">
                            </div>
                            {{-- <div class="new-girls-item-right-note --{{ $shop->slug }}">
                <div class="new-girls-item-right-note-contents">
                  <div class="new-girls-item-right-note-contents-memo">
                    {{ "性格：".$new_girl->pointpersonality }}
                  </div>
                  <div class="new-girls-item-right-note-contents-comment">
                    {{ "スタイル：".$new_girl->style }}
                  </div>
                </div>
              </div> --}}
                        </div>
                        {{-- <div class="new-girls-item-image">
              <img src="{{ asset('storage/' . $new_girl->gallery_1) }}" alt="{{ $new_girl->name }}">
              <div class="new-girls-item-image-overlay">
                <div class="new-girls-item-image-overlay-text">
                  {{ $new_girl->created_at->format('Y:m:d')."入店" }}
                </div>
                <div class="new-girls-item-image-overlay-name">
                  {{ $new_girl->name."(".$new_girl->age.")" }}
                </div>
                <div class="new-girls-item-image-overlay-property">
                  {{ "T:" . $new_girl->height." B:".$new_girl->bust." W:".$new_girl->waist." H:".$new_girl->hip }}
                </div>
                <div class="new-girls-item-image-overlay-appeal">
                  {{ $new_girl->appeal_point }}
                </div>
              </div>
            </div> --}}
                        {{-- </a> --}}
                    </a>
                    {{-- </div> --}}
                @endforeach
            </div>
            <div class="new-girls-sp-slider content-wrapper-shop">
                <div class="news-girls-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach ($new_girls as $new_girl)
                            <div class="swiper-slide">
                                <div class="new-girls-slider-item new-girls-item-wrapper">
                                    <a
                                        href="{{ route('public.shop.cast.profile', ['shop' => $shop->slug, 'id' => $new_girl->id]) }}">
                                        <div class="new-girls-slider-item-image">
                                            <img src="{{ asset('storage/' . $new_girl->gallery_1) }}"
                                                alt="{{ $new_girl->name }}">
                                            <div class="new-girls-slider-item-image-overlay">
                                                <div class="new-girls-slider-item-image-overlay-text">
                                                    {{ $new_girl->created_at->format('Y:m:d') . '入店' }}
                                                </div>
                                                <div class="new-girls-slider-item-image-overlay-name">
                                                    {{ $new_girl->name . '(' . $new_girl->age . ')' }}
                                                </div>
                                                <div class="new-girls-slider-item-image-overlay-property">
                                                    {{ 'T:' . $new_girl->height . ' B:' . $new_girl->bust . ' W:' . $new_girl->waist . ' H:' . $new_girl->hip }}
                                                </div>
                                                <div class="new-girls-slider-item-image-overlay-appeal">
                                                    <div class="new-girls-slider-item-image-overlay-appeal-text">
                                                        {{ $new_girl->appeal_point }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="new-girls-slide-prev">
                        <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
                    </div>
                    <div class="new-girls-slide-next">
                        <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
                    </div>
                </div>
            </div>
        @endif
        @if ($new_girls_month->count() > 0)
            <div class="new-girls-footer-button">
                <a href="{{ route('public.shop.newcomer', ['shop' => $shop->slug]) }}"
                    class="new-girls-footer-button-link content-font">
                    一覧を見る
                </a>
            </div>
        @endif
    </div>
    <div class="news_diary">
        <div class="news-diary content-wrapper-shop">
            <div class="news --{{ $shop->slug }}">
                <div class="news-header --{{ $shop->slug }}">
                    <div class="news-header-title">
                        <h2 class="news-title title-font-midashi">
                            News
                        </h2>
                        <img src="{{ asset('assets/img/shop/attachment3-b.png') }}" alt="News" />
                    </div>
                    <div class="news-header-button">
                        <a href="{{ route('public.shop.newslist', ['shop' => $shop->slug]) }}"
                            class="news-header-button-link content-font">
                            一覧を見る
                        </a>
                    </div>
                </div>
                <div class="news-body">
                    <div class="news-body-items">
                        @foreach ($news as $new)
                            <div class="news-body-item">
                                <a
                                    href="{{ route('public.shop.newsdetail', ['shop' => $shop->slug, 'id' => $new->id]) }}">
                                    <div class="news-body-item-image">
                                        <img src="{{ asset('storage/' . $new->thumbnail) }}"
                                            alt="{{ $new->title }}">
                                    </div>
                                    <div class="news-body-item-published">
                                        {{ $new->published_at ? \Carbon\Carbon::createFromTimeString($new->published_at)->format('y.m.d') : '' }}
                                    </div>
                                    <div class="news-body-item-contents">
                                        {{-- {!! $new->contents !!} --}}
                                        {{ $new->title }}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="diary-top --{{ $shop->slug }}">
                <div class="diary-top-header --{{ $shop->slug }}">
                    <div class="diary-top-header-title">
                        <h2 class="diary-top-title title-font-midashi">
                            Photo Diary
                        </h2>
                        <img src="{{ asset('assets/img/shop/attachment4-b.png') }}" alt="Photo Diary" />
                    </div>
                    <div class="diary-top-header-button">
                        <a href="{{ route('public.shop.diarylist', ['shop' => $shop->slug]) }}"
                            class="diary-top-header-button-link content-font">
                            もっと見る
                        </a>
                    </div>
                </div>
                <div class="diary-top-body">
                    <div class="diary-top-items">
                        @foreach ($diaries as $diary)
                            <div class="diary-top-item">
                                <a
                                    href="{{ route('public.shop.diarydetail', ['shop' => $shop->slug, 'id' => $diary->id]) }}">
                                    <div class="diary-top-item-image">
                                        <img src="{{ asset('storage/diary/' . $diary->photo) }}"
                                            alt="{{ $diary->subject }}">
                                        <div class="diary-top-item-title">
                                            {{ $diary->subject }}
                                        </div>
                                    </div>
                                    <div class="diary-top-item-name">
                                        {{ $diary->name }}
                                    </div>
                                    <div class="diary-top-item-date">
                                        {{ $diary->created_at->format('y.m.d') }}
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($events->count() > 0)
        <div class="event">
            <div class="event-title --{{ $shop->slug }}">
                <h2 class="title-font-midashi">Event</h2>
                <img src="{{ asset('assets/img/shop/attachment.png') }}" alt="Event" />
            </div>
            <div class="event-slider swiper content-wrapper-shop">
                <div class="swiper-wrapper">
                    @foreach ($events as $event)
                        <div class="swiper-slide">
                            <div class="event-main">
                                <div class="event-main-content">
                                    {{-- <div class="event-main-date">{{ $event->published_at->format('y.m.d')."  |  " }}</div> --}}
                                    <h3 class="event-main-title">
                                        {{ $event->published_at->format('y.m.d') . '  |  ' . $event->title }}</h3>
                                </div>
                                <div class="event-main-image">
                                    <a href="{{ route('public.group.event.detail', ['id' => $event->id]) }}">
                                        <img src="{{ asset('storage/' . $event->thumbnail) }}"
                                            alt="{{ $event->title }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="event-pagination">
                    <div class="swiper-wrapper">
                        @foreach ($events as $event)
                            <div class="swiper-slide" data-swiper-slide-index="{{ $loop->index }}">
                                <div class="event-slide-image">
                                    <img src="{{ asset('storage/' . $event->thumbnail) }}"
                                        alt="{{ $event->title }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button class="event-slide-prev">
                    <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
                </button>
                <button class="event-slide-next">
                    <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
                </button>
            </div>
            {{-- <div class="event-main">
      <div class="event-main-image">
        <a href="{{ route('public.shop.event.detail', ['shop' => $shop->slug, 'id' => $events[0]->id]) }}">
          <img src="{{ asset('storage/' . $events[0]->thumbnail) }}" alt="{{ $events[0]->title }}">
        </a>
      </div>
      <div class="event-slider swiper">
        <div class="swiper-wrapper">
          @foreach ($events->skip(1) as $event)
            <div class="swiper-slide">
              <div class="event-slide">
                <div class="event-slide-image">
                  <a href="{{ route('public.shop.event.detail', ['shop' => $shop->slug, 'id' => $event->id]) }}">
                    <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="event-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </div>
        <div class="event-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </div>

      </div>
    </div> --}}
        </div>
    @endif

    <div class="castlist">
        <div class="castlist-header --{{ $shop->slug }}">
            <div class="castlist-header-title ">
                <h2 class="castlist-header-title-content title-font-midashi">
                    Cast List
                    {{-- <img src="{{ asset('assets/img/shop/attachment1.png') }}" alt="Cast List"/> --}}
                </h2>
                <div class="castlist-header-button">
                    <a href="{{ route('public.shop.castlist', ['shop' => $shop->slug]) }}"
                        class="castlist-header-button-link content-font">
                        一覧を見る
                    </a>
                </div>
            </div>
        </div>
        <div class="castlist-description">
            <div class="castlist-description-title">
                <img src="{{ asset('assets/img/shop/attachment1-g.png') }}" alt="Cast List">
                <span>在籍女性</span>
            </div>
            <div class="castlist-description-content">
                当店に在籍する女性情報になります。
            </div>
        </div>

        <div class="castlist-body --{{ $shop->slug }}">
            <div class="castlist-body-items content-wrapper-shop">
                <div class="castlist-body-items-slider swiper">
                    <div class="swiper-wrapper">
                        @foreach ($castlist as $cast)
                            <div class="swiper-slide">
                                <a
                                    href="{{ route('public.shop.cast.profile', ['shop' => $shop->slug, 'id' => $cast->id]) }}">
                                    {{-- <div class="castlist-photo">
                  <img src="{{ asset('storage/' . $cast->gallery_1) }}" alt="{{ $cast->name }}">
                  <div class="castlist-status --{{ $cast->shop_slug }}">
                    <img src="{{ asset('assets/img/shop/clock-icon-y.png') }} " class="pc-only" alt="本日出勤">
                    <span class="castlist-status-label pc-only">本日出勤</span>
                    <span class="castlist-status-label sp-only">出勤</span>
                    @if ($cast->start_datetime && $cast->end_datetime)
                      <span class="castlist-status-time --{{ $cast->shop_slug }}">{{ date('H:i', strtotime($cast->start_datetime)) }} ～ {{ date('H:i', strtotime($cast->end_datetime)) }}</span>
                    @else
                      <span class="castlist-status-time --{{ $cast->shop_slug }}">　　休み中　　</span>
                    @endif
                  </div>
                  <div class="castlist-profile pc-only">
                    <span class="castlist-profile-schedule">
                      <img src="{{ asset('assets/img/shop/clock-icon-y.png') }}" alt="移動時間のみ">
                      待機中
                    </span>
                    <span class="castlist-profile-name">
                      <img src="{{ asset('assets/img/shop/star-w.png') }}" alt="移動時間のみ">
                      {{ $cast->name }}({{ $cast->age }})
                    </span>
                    <span class="castlist-profile-size ">
                      <img src="{{ asset('assets/img/shop/heart-w.png') }}" alt="移動時間のみ">
                      T{{ $cast->height }} B{{ $cast->bust }} W{{ $cast->waist }} H{{ $cast->hip }}
                    </span>
                  </div>
                  <div class="castlist-profile-sp sp-only">
                    <span class="castlist-profile-sp-name --{{ $cast->shop_slug }}">
                      {{ $cast->name }}({{ $cast->age }})
                    </span>
                    <span class="castlist-profile-sp-size ">
                      T{{ $cast->height }} B{{ $cast->bust }} W{{ $cast->waist }} H{{ $cast->hip }}
                    </span>
                  </div>
                </div>
               --}}

                                    <div class="castlist-body-items-time">
                                        <div class="castlist-slide-image">
                                            <img src="{{ asset('storage/' . $cast->gallery_1) }}"
                                                alt="{{ $cast->name }}">
                                            <div class="castlist-body-item-name">
                                                {{ $cast->name }}
                                            </div>
                                        </div>
                                        <div class="castlist-body-item-property">
                                            {{ 'T:' . $cast->height . ' B:' . $cast->bust . ' W:' . $cast->waist . ' H:' . $cast->hip }}
                                        </div>
                                        <div class="castlist-body-item-appeal">
                                            {{ $cast->appeal_point }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="castlist-body-footer-slide-prev">
                        <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
                    </div>
                    <div class="castlist-body-footer-slide-next">
                        <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
                    </div>
                </div>
                {{-- <div class="castlist-body-footer">
        <div class="castlist-body-footer-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </div>
        <div class="castlist-body-footer-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </div>
      </div> --}}
            </div>
        </div>
    </div>
    {{-- <div class="castlist mock mock">
    <h2 class="castlist-title">
      <picture>
        <source media="(max-width: 767px)" srcset="{{ asset('assets/img/shop/castlist-sm.png') }}">
        <img src="{{ asset('assets/img/shop/castlist.png') }}" alt="Castlist">
      </picture>
    </h2>
  </div> --}}
    <!-- 相互リンク - Link -->
    @if ($banners->count() > 0)
        <div class="banner">
            {{-- <div class="banner-title">
      <img src="{{ asset('assets/img/link.svg') }}" alt="相互リンク">
      <h2 class="banner-title-ja">相互リンク</h2>
    </div> --}}
            <div class="banner-list content-wrapper-shop">
                @foreach ($banners as $banner)
                    <a href="{{ $banner->link_url }}" target="_blank">
                        <img src="{{ asset('storage/' . $banner->thumbnail) }}" alt="{{ $banner->title }}">
                    </a>
                @endforeach
            </div>
        </div>
    @endif
    <!-- Fixed Phone Link (SP Only) -->
    <!-- <div class="phone-link-container --fixed">
    <x-public.shop.phone-link :shop="$shop" />
  </div> -->
</x-public-shop-layout>
@production
    @vite(['resources/scss/shop/_today.scss', 'resources/scss/shop/newgirls.scss', 'resources/scss/shop/event.scss', 'resources/scss/shop/newsdiary.scss', 'resources/scss/shop/banner.scss'])
@endonce
@push('scripts')
    <script>
        // import { Autoplay, Navigation, Pagination } from 'swiper/modules'
        document.addEventListener('DOMContentLoaded', function() {
            // if (typeof Swiper !== 'undefined') {
            //   const eventSlider = new Swiper('.event-slider', {
            //     modules: [Navigation, Pagination, Autoplay],
            //     slidesPerView: 'auto',
            //     spaceBetween: 20,
            //     centeredSlides: true,
            //     loop: true,
            //     speed: 1000,
            //     autoplay: {
            //       delay: 3000,
            //       disableOnInteraction: false,
            //       reverseDirection: false,
            //     },
            //     pagination: {
            //       el: '.swiper-pagination',
            //       clickable: true,
            //     },
            //     navigation: {
            //       nextEl: '.event-slide-next',
            //       prevEl: '.event-slide-prev',
            //     },
            //     breakpoints: {
            //       320: {
            //         slidesPerView: 2,
            //         spaceBetween: 20,
            //       },
            //       768: {
            //         slidesPerView: 3,
            //         spaceBetween: 30,
            //         centeredSlides: false,
            //       }
            //     }
            //   });
            // } else {
            //   console.error('Swiper is not loaded');
            // }

            const mvLink = document.querySelector('.phone-link-container.--mv');
            const fixedLink = document.querySelector('.phone-link-container.--fixed');
            const mvElement = document.querySelector('.mv');

            function updatePhoneLinkVisibility() {
                // SPの場合のみ実行
                if (window.innerWidth > 767) {
                    mvLink.style.display = 'none';
                    fixedLink.style.display = 'none';
                    return;
                }

                const scrollY = window.scrollY;
                const mvBottom = mvElement.getBoundingClientRect().bottom + scrollY;

                if (scrollY === 0) {
                    // ページトップではMVの下に表示
                    mvLink.style.display = 'block';
                    fixedLink.style.display = 'none';
                } else if (scrollY >= mvBottom) {
                    // MVが画面外に出たら固定表示
                    mvLink.style.display = 'none';
                    fixedLink.style.display = 'block';
                } else {
                    // MVが画面内にある間はMVの下に表示
                    mvLink.style.display = 'block';
                    fixedLink.style.display = 'none';
                }
            }

            // 初期表示時とスクロール時に表示を更新
            updatePhoneLinkVisibility();
            window.addEventListener('scroll', updatePhoneLinkVisibility);
            window.addEventListener('resize', updatePhoneLinkVisibility);
        });
    </script>
@endpush
@once
    @vite(['resources/js/shop/newGirls.js', 'resources/js/shop/castlist_top.js', 'resources/scss/shop/castlist_top.scss'])
@endonce

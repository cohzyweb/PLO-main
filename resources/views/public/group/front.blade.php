<x-public-front-layout>
    <!-- Sidebar -->
    <x-public.group.sidebar />

  <!-- Main Visual -->
  <x-public.group.mv />
  {{-- @if($news->count() > 0)
  <section class="plo_news content-wrapper">
    <div class="plo_news-title">
      <div class="plo_news-title-en title-font">
        PLO NEWS
      </div>
      <h2 class="plo_news-title-ja title-font-sm">新着情報</h2>
    </div>
    <ul class="plo_news-shops">
      <a class="plo_news-shops-shop --all content-font" href="{{ route('public.group.newslist',['shop' => 'all']) }}">
        ALL
      </a>
      @foreach($shops as $shop)
        @if($shop->slug == 'headquarter')
          <a class="plo_news-shops-shop --headquarter content-font" href="{{ route('public.group.newslist', ['shop' => 'headquarter']) }}"><img src="{{ asset('assets/img/search.png') }}" alt="search"><span class="shop-text"><span class="shop-slug">headquarters</span><span class="shop-name">{{ $shop->name }}</span></span></a>
        @else
          <a class="plo_news-shops-shop --{{ $shop->slug }} content-font" href="{{ route('public.shop.newslist', ['shop' => $shop->slug]) }}"><img src="{{ asset('assets/img/search.png') }}" alt="search"><span class="shop-text"><span class="shop-slug">{{$shop->slug}}</span><span class="shop-name">{{ $shop->name }}</span></span></a>
        @endif
      @endforeach
    </ul>
    <div class="plo_news-list pc-only">
      @foreach($news as $news_item)
        <div class="plo_news-list-item">
          @if($news_item->slug == 'headquarter')
          <a href="{{ route('public.group.newsdetail', ['id' => $news_item->id]) }}">
          @else
          <a href="{{ route('public.shop.newsdetail', ['shop' => $news_item->slug, 'id' => $news_item->id]) }}">
          @endif
          <div class="plo_news-list-item-image">
            <img src="{{ asset('storage/' . $news_item->thumbnail) }}" alt="{{ $news_item->title }}">
          </div>
          <div class="plo_news-list-item-date">
            {{ $news_item->published_at? \Carbon\Carbon::createFromTimeString($news_item->published_at)->format('y.m.d') : '' }}
          </div>
          <div class="plo_news-list-item-title --{{ $news_item->slug }} content-font">
            {{ $news_item->title }}
          </div>
          <div class="plo_news-list-item-content content-font">
            {!! $news_item->contents !!}
          </div>
          </a>
        </div>
      @endforeach
    </div>
    <div class="plo_news-items sp-only">
      <div class="plo_news-items-top">
        @if($news_item->slug == 'headquarter')
        <a href="{{ route('public.group.newsdetail', ['id' => $news_item->id]) }}">
        @else
        <a href="{{ route('public.shop.newsdetail', ['shop' => $news_item->slug, 'id' => $news_item->id]) }}">
        @endif
        <div class="plo_news-items-top-image">
          <img src="{{ asset('storage/' . $news[0]->thumbnail) }}" alt="{{ $news[0]->title }}">
        </div>
        <div class="plo_news-items-top-title">
          <div class="plo_news-items-top-title-date">
            {{ $news[0]->published_at? \Carbon\Carbon::createFromTimeString($news[0]->published_at)->format('y.m.d') : '' }}
          </div>
          <div class="plo_news-items-top-title-text --{{ $news[0]->slug }}">
            {{ $news[0]->title }}
          </div>
        </div>
        <div class="plo_news-items-top-content">
          {!! $news[0]->contents !!}
        </div>
        </a>
      </div>
      <div class="plo_news-items-list">
      @foreach($news->skip(1) as $news_item)
        <div class="plo_news-items-list-item">
          @if($news_item->slug == 'headquarter')
          <a href="{{ route('public.group.newsdetail', ['id' => $news_item->id]) }}">
          @else
          <a href="{{ route('public.shop.newsdetail', ['shop' => $news_item->slug, 'id' => $news_item->id]) }}">
          @endif
          <div class="plo_news-items-list-item-image">
            <img src="{{ asset('storage/' . $news_item->thumbnail) }}" alt="{{ $news_item->title }}">
          </div>
          <div class="plo_news-items-list-item-date">
            {{ $news_item->published_at? \Carbon\Carbon::createFromTimeString($news_item->published_at)->format('y.m.d') : '' }}
          </div>
          <div class="plo_news-items-list-item-title --{{ $news_item->slug }}">
            {{ $news_item->title }}
          </div>
          <div class="plo_news-items-list-item-content">
            {!! $news_item->contents !!}
          </div>
          </a>
        </div>
      @endforeach
      </div>
    </div>
    <div class="plo_news-more ">
      <a href="{{ route('public.group.newslist', ['shop' => 'all']) }}" class="plo_news-more-button">もっと見る</a>
    </div>
  </section>
  @endif --}}
  @if($todayCasts->count() > 0)
  <section class="today">
    <div class="today-title">
      <h2 class="today-title-lg title-font front-title">
        <span>T</span><span>O</span><span>D</span><span>A</span><span>Y</span> <span>S</span><span>C</span><span>H</span><span>E</span><span>D</span><span>U</span><span>L</span><span>E</span>
      </h2>
      <h3 class="today-title-sm title-font-sm">出勤情報</h3>
    </div>
    <div class="content-wrapper today-container">
    <ul class="today-shops ">
      <li class="today-shops-item" data-shop="all">
        <span class="today-shops-item-text">
          <span class="today-shops-item-slug">SHOP ALL</span>
        </span>
      </li>
      {{-- @foreach($shops as $shop)
      <li class="today-shops-item" data-shop="{{$shop->slug}}">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="today-shops-item-text">
          <span class="today-shops-item-slug">{{$shop->name}}</span>
          <span class="today-shops-item-name">{{$shop->slug}}</span>
        </span>
      </li>

      @endforeach --}}
      <li class="today-shops-item" data-shop="lovestory">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="today-shops-item-text">
          <span class="today-shops-item-text-slug">ラブストーリー</span>
          <span class="today-shops-item-text-name">育成型ヘルス</span>
        </span>
      </li>
      <li class="today-shops-item" data-shop="pussycat">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="today-shops-item-text">
          <span class="today-shops-item-text-slug">プッシーキャット</span>
          <span class="today-shops-item-text-name">エンターテイメントヘルス</span>
        </span>
      </li>
      <li class="today-shops-item" data-shop="en">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="today-shops-item-text">
          <span class="today-shops-item-text-slug">艶</span>
          <span class="today-shops-item-text-name">素人系人妻ヘルス</span>
        </span>
      </li>
      <li class="today-shops-item" data-shop="miyabi">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="today-shops-item-text">
          <span class="today-shops-item-text-slug">雅</span>
          <span class="today-shops-item-text-name">人妻ヘルス</span>
        </span>
      </li>
      <li class="today-shops-item" data-shop="shizuku">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="today-shops-item-text">
          <span class="today-shops-item-text-slug">雫</span>
          <span class="today-shops-item-text-name">ハイグレードヘルス</span>
        </span>
      </li>
      <li class="today-shops-item" data-shop="siroganeze">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="today-shops-item-text">
          <span class="today-shops-item-text-slug">シロガネーゼ</span>
          <span class="today-shops-item-text-name">大人の回春メンズエステ</span>
        </span>
      </li>

    </ul>
    {{-- <div class="content-wrapper"> --}}
    @php
      $homeScheduleImages = collect(glob(public_path('assets/img/home/*')) ?: [])
        ->filter(function ($path) {
          if (!is_file($path)) {
            return false;
          }

          return in_array(strtolower(pathinfo($path, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'webp', 'gif', 'avif'], true);
        })
        ->sort()
        ->values()
        ->map(function ($path) {
          return asset('assets/img/home/' . rawurlencode(basename($path)));
        });
    @endphp
    <div class="today-casts ">
      @foreach($todayCasts as $todayCast)
        @php
          $scheduleImageUrl = $homeScheduleImages->isNotEmpty()
            ? $homeScheduleImages[$loop->index % $homeScheduleImages->count()]
            : (
              !empty($todayCast->gallery_1)
                ? asset('storage/' . ltrim($todayCast->gallery_1, '/'))
                : asset('assets/img/groups/pickup-cast-1.png')
            );
        @endphp
        <a href="{{ route('public.shop.cast.profile', ['shop' => $todayCast->shop_slug, 'id' => $todayCast->id]) }}" class="today-casts-item --{{ $todayCast->shop_slug }}">
          <div class="today-casts-item-image --{{ $todayCast->shop_slug }}">
            <img src="{{ $scheduleImageUrl }}" alt="{{ $todayCast->name }}">
          </div>
          <div class="today-casts-item-shop --{{ $todayCast->shop_slug }}">
            <span class="today-casts-item-shop-name">{{ $todayCast->shop_name }}</span>
          </div>
          <div class="today-casts-item-content --{{ $todayCast->shop_slug }}">
            <div class="today-casts-item-content-name --{{ $todayCast->shop_slug }}">
              <span class="today-casts-item-content-name-text">{{ $todayCast->name}}<small>{{$todayCast->age ? ' (' . $todayCast->age . ')' :'' }}</small></span>
            </div>
            <div class="today-casts-item-content-schedule --{{ $todayCast->shop_slug }}">
              <span class="today-casts-item-content-schedule-text">
                {{ date('H:i', strtotime($todayCast->start_datetime)) }} ～ {{ date('H:i', strtotime($todayCast->end_datetime)) }}
              </span>
            </div>
            <div class="today-casts-item-content-size">
              <span class="today-casts-item-content-size-text">B{{ $todayCast->bust }}　W{{ $todayCast->waist }}　H{{ $todayCast->hip }}</span>
            </div>
            <div class="today-casts-item-content-appeal">
              <span class="today-casts-item-content-appeal-text">{{ $todayCast->appeal_point }}</span>
            </div>
          </div>
        </a>
      @endforeach
    </div>
    </div>
    {{-- </div> --}}
    <a href="{{ route('public.group.schedule') }}" class="today-more more-button more-button-title">もっと見る</a>

  </section>
  @endif
  <!-- 新着情報 - PLO News -->
  @if($events->count() > 0)
  <div class="event-1">
    <div class="section-title">
      <h2 class="section-title-news title-font front-title">
        <span>E</span><span>V</span><span>E</span><span>N</span><span>T</span>
      </h2>
      <h3 class="section-title-news title-font-sm">イベント</h3>
    </div>
    <div class="event-slider swiper content-wrapper">
      <div class="swiper-wrapper">
        @foreach($events as $event)
          <div class="swiper-slide">
            <div class="event-main">
              <div class="event-main-content">
                {{-- <div class="event-main-date">{{ $event->published_at->format('y.m.d')."  |  " }}</div> --}}
                <h3 class="event-main-title">{{ $event->published_at->format('y.m.d')."  |  " .$event->title}}</h3>
              </div>
              <div class="event-main-image">
                <a href="{{ route('public.group.event.detail', ['id' => $event->id]) }}">
                  <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="event-pagination">
        <div class="swiper-wrapper">
          @foreach($events as $event)
            <div class="swiper-slide" data-swiper-slide-index="{{ $loop->index }}">
              <div class="event-slide-image">
                <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
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
  </div>
  @else
  <div class="blank-space">
  </div>
  @endif
  <!-- 新人情報 - New Face -->
  @if($newfaces_this_month->count() > 0)
  <section class="newface">
  @endif
    @if($newfaces_this_month->count() > 0)
    <div class="newface-main">
    <div class="section-title">
      <div class="newface-border">
      <span class="section-title-en title-font front-title">
        {{-- <img src="{{ asset('assets/img/group/newface/title-en.svg') }}" alt="New Face"> --}}
        <span>N</span><span>E</span><span>W</span> <span>F</span><span>A</span><span>C</span><span>E</span>
      </span>
      <h2 class="newface-title-sm title-font-sm">新人情報</h2>
      </div>
    </div>
    </div>

    @endif
    @if($newfaces_this_week->count() > 0)
    <div class="newface-slide content-wrapper">
      {{-- <div class="newface-slide-nav">
        <button class="newface-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </button>
        <button class="newface-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </button>
      </div> --}}
      <div class="swiper-wrapper">
        @foreach ($newfaces_this_week as $cast)
          <div class="swiper-slide">
            <x-public.group.newface :cast="$cast" />
          </div>
        @endforeach
      </div>
      <div class="newface-slide-nav">
        <button class="newface-slide-prev">
          <img src="{{ asset('assets/img/group/newface/prev.svg') }}" alt="">
        </button>
        <button class="newface-slide-next">
          <img src="{{ asset('assets/img/group/newface/next.svg') }}" alt="">
        </button>
      </div>
    </div>
    @endif
    <div class="newface-list is-hidden">
      @foreach ($newfaces_this_month as $cast)
        <x-public.group.newface :cast="$cast" />
      @endforeach
    </div>
    @if($newfaces_this_month->count() > 0)
    <a href="{{ route('public.group.newcomer') }}"  class="newface-more more-button more-button-title">もっと見る</a>
    @endif
  @if($newfaces_this_month->count() > 0)
  {{-- </div> --}}
  </section>
  @endif

  @if($pickups->count() > 0)
  <!-- ピックアップ - Pickup Girl -->
  <section class="pickup-top" >
    <div class="section-title" >
      <span class="pickup-title title-font front-title">
        <span>P</span><span>I</span><span>C</span><span>K</span><span>U</span><span>P</span> <span>G</span><span>I</span><span>R</span><span>L</span>
        {{-- <img src="{{ asset('assets/img/group/pickup/title-en.svg') }}" alt="Pickup Girl"> --}}
      </span>
      {{-- <h2 class="pcikup-title-sm title-font-sm">ピックアップ</h2> --}}
    </div>
  </section>
  <section class="pickup">
    <div class="section-title">
      <h2 class="pcikup-title-sm title-font-sm">ピックアップ</h2>
    </div>
    <div class="content-wrapper pickup-content">
    <ul class="pickup-shops">
      <li class="pickup-shop" data-shop="all">
        <span class="shop-text">
          <span class="shop-slug">SHOP ALL</span>
        </span>
      </li>
      <li class="pickup-shop" data-shop="lovestory">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="shop-text">
          {{-- <span class="shop-slug">lovestory</span>
          <span class="shop-name">ラブストーリー</span> --}}
          <span class="shop-slug">ラブストーリー</span>
          <span class="shop-name">育成型ヘルス</span>
        </span>
      </li>
      <li class="pickup-shop" data-shop="pussycat">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="shop-text">
          {{-- <span class="shop-slug">pussycat</span>
          <span class="shop-name">プッシー<br class="sm">キャット</span> --}}
          <span class="shop-slug">プッシーキャット</span>
          <span class="shop-name">エンターテイメントヘルス</span>
        </span>
      </li>
      <li class="pickup-shop" data-shop="en">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="shop-text">
          {{-- <span class="shop-slug">en</span>
          <span class="shop-name">艶</span> --}}
          <span class="shop-slug">艶</span>
          <span class="shop-name">素人系人妻ヘルス</span>
        </span>
      </li>
      <li class="pickup-shop" data-shop="miyabi">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="shop-text">
          {{-- <span class="shop-slug">miyabi</span>
          <span class.shop-name>雅</span> --}}
          <span class="shop-slug">雅</span>
          <span class="shop-name">人妻ヘルス</span>
        </span>
      </li>
      <li class="pickup-shop" data-shop="shizuku">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="shop-text">
          {{-- <span class="shop-slug">shizuku</span>
          <span class="shop-name">雫</span> --}}
          <span class="shop-slug">雫</span>
          <span class="shop-name">ハイグレードヘルス</span>
        </span>
      </li>
      <li class="pickup-shop" data-shop="siroganeze">
        <img src="{{ asset('assets/img/search.png') }}" alt="search">
        <span class="shop-text">
          {{-- <span class="shop-slug">siroganeze</span>
          <span class="shop-name">シロガネーゼ</span> --}}
          <span class="shop-slug">シロガネーゼ</span>
          <span class="shop-name">大人の回春メンズエステ</span>
        </span>
      </li>
    </ul>
    <div class="pickup-list-wrapper">
      <div class="pickup-list ">
        @foreach ($pickups as $pickup)
          <a
            href="{{ route('public.shop.cast.profile', ['shop' => $pickup->cast->shop->slug, 'id' => $pickup->cast->id]) }}"
            class="pickup-item --{{ $pickup->cast->shop->slug }}"
          >
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
            <div class="pickup-intro --{{ $pickup->cast->shop->slug }}">
              <div class="pickup-intro-text">
                {{ $pickup->cast->appeal_point }}
              </div>
            </div>
          </a>
        @endforeach
      </div>
    </div>
    </div>
    <a href="{{ route('public.group.pickup') }}" class="pickup-more more-button more-button-title">もっと見る</a>
  </section>
  @endif

  <!-- 最新写メ日記 - Photo Diary -->
  {{-- <div class="mock">
    <picture>
      <source media="(max-width: 767px)" srcset="{{ asset('assets/img/mock-diary-sm.png') }}">
      <img src="{{ asset('assets/img/mock-diary-lg.png') }}" alt="">
    </picture>
  </div> --}}
  <div class="diary" >
    <div class="section-title">
      <h2 class="section-title-lg title-font front-title">
        <span>P</span><span>H</span><span>O</span><span>T</span><span>O</span> <span>D</span><span>I</span><span>A</span><span>R</span><span>Y</span>
      </h2>
      <h3 class="section-title-sm title-font-sm">最新写メ日記</h3>
    </div>
    <div class="diary-content content-wrapper">
      <div class="diary-content-top">
        <img src="{{ asset('assets/img/group/diary-top-pc.png') }}" alt="" class="pc-only">
        <img src="{{ asset('assets/img/group/diary-top-sp.png') }}" alt="" class="sp-only">
      </div>
      <div class="diary-content-list">
        @foreach ($diaries as $diary)
          <div class="diary-content-item">
            <a href="{{ route('public.shop.diarydetail', ['shop' => $diary->shop_slug, 'id' => $diary->id]) }}">
              <div class="diary-content-item-image">
                <img src="{{ asset('storage/diary/' . $diary->photo) }}" alt="{{ $diary->cast_id }}">
                <div class="diary-content-item-title">
                  {{ $diary->subject }}
                </div>
              </div>
              <div class="diary-content-item-name">
                {{ $diary->name }}
              </div>
              <div class="diary-content-item-date">
                {{-- {{ $diary->updated_at->format('y.m.d') }} --}}
                {{ $diary->updated_at }}
              </div>
            </a>
          </div>
        @endforeach
      </div>
      <div class="diary-content-bottom">
        <img src="{{ asset('assets/img/group/diary-bottom-pc.png') }}" alt="" class="pc-only">
        <img src="{{ asset('assets/img/group/diary-bottom-sp.png') }}" alt="" class="sp-only">
        <div class="diary-content-bottom-more">
          <a href="#" class="diary-content-bottom-more-button more-button-title" id="diary_more_button">もっと見る</a>
        </div>
      </div>
    </div>
    <ul class="diary-content-bottom-shops ">
      <a href="{{ route('public.shop.diarylist', ['shop' => 'pussycat']) }}"><li class="diary-content-bottom-shops-item " data-shop="pussycat">プッシー<br class="sm">キャット</li></a>
      <a href="{{ route('public.shop.diarylist', ['shop' => 'shizuku']) }}"><li class="diary-content-bottom-shops-item " data-shop="shizuku">雫</li></a>
      <a href="{{ route('public.shop.diarylist', ['shop' => 'miyabi']) }}"><li class="diary-content-bottom-shops-item " data-shop="miyabi">雅</li></a>
      <a href="{{ route('public.shop.diarylist', ['shop' => 'en']) }}"><li class="diary-content-bottom-shops-item " data-shop="en">艶</li></a>
      <a href="{{ route('public.shop.diarylist', ['shop' => 'siroganeze']) }}"><li class="diary-content-bottom-shops-item " data-shop="siroganeze">シロガネーゼ</li></a>
      <a href="{{ route('public.shop.diarylist', ['shop' => 'lovestory']) }}"><li class="diary-content-bottom-shops-item " data-shop="lovestory">ラブストーリー</li></a>
    </ul>

  </div>
  <!-- 各お店の最新動画 - Shop Movie -->
  {{-- <div class="mock">
    <picture>
      <source media="(max-width: 767px)" srcset="{{ asset('assets/img/mock-movie-sm.png') }}">
      <img src="{{ asset('assets/img/mock-movie-lg.png') }}" alt="">
    </picture>
  </div> --}}
  <div class="movie">
    <div class="movie-title">
      <h2 class="movie-title-en title-font front-title">
        <span>S</span><span>H</span><span>O</span><span>P</span> <span>M</span><span>O</span><span>V</span><span>I</span><span>E</span>
      </h2>
      <h3 class="movie-title-ja title-font-sm">各お店の最新動画</h3>
    </div>
    <div class="movie-list content-wrapper">
      @foreach ($videos as $video)
      <div class="movie-list-item">
        {{-- <a href="#" target="_blank"> --}}
          <div class="movie-list-item-shop --{{ $video->shop_slug }} sp-only">
            {{ $video->shop_name }}
          </div>
          {{-- <div class="movie-list-item-movie">
            <img src="{{ asset('storage/' . $video->thumb_url) }}" alt="movie-1">
          </div> --}}
          <video class="movie-list-item-movie" controls autoplay muted  poster="{{ asset('storage/' . $video->thumb_url) }}">
            <source src="{{ $video->video_url }}" type="video/mp4">
          </video>
          <div class="movie-list-item-shop --{{ $video->shop_slug }} pc-only">
            {{ $video->shop_name }}
          </div>
          <div class="movie-list-item-content">
            <div class="movie-list-item-content-name --{{ $video->shop_slug }}">
              {{ $video->name }}<small>{{ $video->age ? '(' . $video->age . ')' : '' }}</small>
            </div>
            <div class="movie-list-item-content-size --{{ $video->shop_slug }}">
              B{{ $video->bust }}　W{{ $video->waist }}　H{{ $video->hip }}
            </div>
            <div class="movie-list-item-content-intro --{{ $video->shop_slug }}">
              {{ $video->appeal_point }}
            </div>
          </div>
        {{-- </a> --}}
      </div>
      @endforeach
      {{-- <div class="movie-list-item">
        <a href="#" target="_blank">
          <div class="movie-list-item-shop --pussycat sp-only">
            店舗名
          </div>
          <div class="movie-list-item-movie">
            <img src="{{ asset('assets/img/group/movie1.png') }}" alt="movie-1">
          </div>
          <div class="movie-list-item-shop --pussycat pc-only">
            店舗名
          </div>
          <div class="movie-list-item-content">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
          </div>
        </a>
      </div>
      <div class="movie-list-item">
        <a href="#" target="_blank">
          <div class="movie-list-item-shop --shizuku sp-only">
            店舗名
          </div>
          <div class="movie-list-item-movie">
            <img src="{{ asset('assets/img/group/movie2.png') }}" alt="movie-2">
          </div>
          <div class="movie-list-item-shop --shizuku pc-only">
            店舗名
          </div>
          <div class="movie-list-item-content">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
          </div>
        </a>
      </div>
      <div class="movie-list-item">
        <a href="#" target="_blank">
          <div class="movie-list-item-shop --miyabi sp-only">
            店舗名
          </div>
          <div class="movie-list-item-movie">
            <img src="{{ asset('assets/img/group/movie3.png') }}" alt="movie-3">
          </div>
          <div class="movie-list-item-shop --miyabi pc-only">
            店舗名
          </div>
          <div class="movie-list-item-content">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
          </div>
        </a>
      </div>
      <div class="movie-list-item">
        <a href="#" target="_blank">
          <div class="movie-list-item-shop --en sp-only">
            店舗名
          </div>
          <div class="movie-list-item-movie">
            <img src="{{ asset('assets/img/group/movie1.png') }}" alt="movie-4">
          </div>
          <div class="movie-list-item-shop --en pc-only">
            店舗名
          </div>
          <div class="movie-list-item-content">
            テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
          </div>
        </a>
      </div> --}}
    </div>
    <a href="#"  class="movie-more more-button more-button-title" id="movie_more_button">もっと見る</a>
    <ul class="movie-content-bottom-shops ">
      <a href="{{ route('public.shop.movielist', ['shop' => 'pussycat']) }}"><li class="movie-content-bottom-shops-item " data-shop="pussycat">プッシー<br class="sm">キャット</li></a>
      <a href="{{ route('public.shop.movielist', ['shop' => 'shizuku']) }}"><li class="movie-content-bottom-shops-item " data-shop="shizuku">雫</li></a>
      <a href="{{ route('public.shop.movielist', ['shop' => 'miyabi']) }}"><li class="movie-content-bottom-shops-item " data-shop="miyabi">雅</li></a>
      <a href="{{ route('public.shop.movielist', ['shop' => 'en']) }}"><li class="movie-content-bottom-shops-item " data-shop="en">艶</li></a>
      <a href="{{ route('public.shop.movielist', ['shop' => 'siroganeze']) }}"><li class="movie-content-bottom-shops-item " data-shop="siroganeze">シロガネーゼ</li></a>
      <a href="{{ route('public.shop.movielist', ['shop' => 'lovestory']) }}"><li class="movie-content-bottom-shops-item " data-shop="lovestory">ラブストーリー</li></a>
    </ul>

  </div>
  <!-- 相互リンク - Link -->
  @if ($banners->count() > 0)
  <div class="banner" >
    <div class="banner-title">
      <span class="banner-title-en title-font front-title">
        <span>L</span><span>I</span><span>N</span><span>K</span>
      </span>
      {{-- <img src="{{ asset('assets/img/link.svg') }}" alt="相互リンク"> --}}
      <h2 class="banner-title-ja title-font-sm">相互リンク</h2>
    </div>
    <div class="banner-list content-wrapper">
    @foreach ($banners as $banner)
      <a href="{{ $banner->link_url }}" target="_blank">
        <img src="{{ asset('storage/' . $banner->thumbnail) }}" alt="{{ $banner->title }}">
        </a>
      @endforeach
    </div>
  </div>
  @endif

  {{-- <div class="law">
    <div class="law-content content-wrapper pc-only">
      <p>当グループは、風俗関連営業等の規制及び業務の適正化等に関する法律</p>
      <p>(第27条第2項、第33条第2項)の規定を取得しておりますので安心してお遊び頂けます。</p>
      <p>このサイトにはアダルトコンテンツが含まれています。</p>
      <p>18歳未満の方の閲覧は固くお断りいたします。</p>
    </div>
    <div class="law-content content-wrapper sp-only">
      <p>当グループは、風俗関連営業等の規制及び</p><p>業務の適正化等に関する法律</p>
      <p>(第27条第2項、第33条第2項)の規定</p><p>を取得しておりますので</p><p>安心してお遊び頂けます。</p>
      <p>このサイトには</p><p>アダルトコンテンツが含まれています。</p>
      <p>18歳未満の方の閲覧は固くお断りいたします。</p>
    </div>

  </div> --}}

</x-public-front-layout>

<!-- Drawer Component -->
<x-public.group.drawer />

@once
  @vite(['resources/scss/group/sidebar.scss','resources/scss/group/front.scss','resources/scss/group/today.scss', 'resources/scss/group/pickup_top_fron.scss','resources/scss/group/event.scss','resources/scss/group/newface.scss','resources/scss/group/diary_top.scss','resources/scss/group/banner.scss','resources/scss/group/movie.scss'])
@endonce
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Diary more button functionality
  const moreButton = document.getElementById('diary_more_button');
  const shopsList = document.querySelector('.diary-content-bottom-shops');

  if (moreButton && shopsList) {
    moreButton.addEventListener('click', function(e) {
      e.preventDefault();
      shopsList.style.display = 'flex';
    });
  }

  const movieMoreButton = document.getElementById('movie_more_button');
  const movieShopsList = document.querySelector('.movie-content-bottom-shops');

  if (movieMoreButton && movieShopsList) {
    movieMoreButton.addEventListener('click', function(e) {
      e.preventDefault();
      movieShopsList.style.display = 'flex';
    });
  }

  // Video.js functionality
  // videojs(document.querySelectorAll('.video-js'));
  // Drawer functionality
  // const drawerToggle = document.getElementById('drawer-toggle');
  // const drawer = document.getElementById('drawer');

  // if (drawerToggle && drawer) {
  //   let isOpen = false;

  //   drawerToggle.addEventListener('click', function(e) {
  //     e.preventDefault();

  //     if (isOpen) {
  //       // Close drawer
  //       drawer.style.right = '-100%';
  //       drawerToggle.classList.remove('active');
  //       document.body.style.overflow = '';
  //       isOpen = false;
  //     } else {
  //       // Open drawer
  //       drawer.style.right = '0';
  //       drawerToggle.classList.add('active');
  //       document.body.style.overflow = 'hidden';
  //       isOpen = true;
  //     }
  //   });

  //   // Close drawer when clicking on a link
  //   const drawerLinks = drawer.querySelectorAll('a');
  //   drawerLinks.forEach(link => {
  //     link.addEventListener('click', function() {
  //       drawer.style.right = '-100%';
  //       drawerToggle.classList.remove('active');
  //       document.body.style.overflow = '';
  //       isOpen = false;
  //     });
  //   });

  //   // Close drawer when clicking outside
  //   drawer.addEventListener('click', function(e) {
  //     if (e.target === drawer) {
  //       drawer.style.right = '-100%';
  //       drawerToggle.classList.remove('active');
  //       document.body.style.overflow = '';
  //       isOpen = false;
  //     }
  //   });

  //   // Close drawer on escape key
  //   document.addEventListener('keydown', function(e) {
  //     if (e.key === 'Escape' && isOpen) {
  //       drawer.style.right = '-100%';
  //       drawerToggle.classList.remove('active');
  //       document.body.style.overflow = '';
  //       isOpen = false;
  //     }
  //   });
  // }

  // // Pickup title color animation
  // const pickupTitle = document.querySelector('.pickup-title');
  // if (pickupTitle) {
  //   const characters = pickupTitle.querySelectorAll('span');
  //   const colors = ['#DC53D7', '#4068fb', '#FF8C71', '#FFC557', '#009162', '#FF5AA2'];
  //   let colorIndex = 0;

  //   function changeColors() {
  //     characters.forEach((char, index) => {
  //       const delay = index * 100; // 100ms delay between each character
  //       setTimeout(() => {
  //         char.style.color = colors[colorIndex];
  //       }, delay);
  //     });

  //     colorIndex = (colorIndex + 1) % colors.length;
  //   }

  //   // Change colors every 2 seconds
  //   setInterval(changeColors, 2000);

  //   // Initial color change
  //   changeColors();
  // }
});
</script>

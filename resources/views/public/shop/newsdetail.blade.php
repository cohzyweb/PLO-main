<x-public-shop-layout :shop="$shop">
  <x-public.shop.mv :shop="$shop" />
  <section class="news-detail">
    <div class="news-detail-header --{{ $shop->slug }}">
      <div class="news-detail-header-title title-font-midashi">
        NEWS
      </div>
    </div>
    <div class="news-detail-content-wrapper content-wrapper">
    <div class="news-detail-published-at">
      <p>{{ $news->published_at ? \Carbon\Carbon::createFromTimeString($news->published_at)->format('y.m.d') : '' }}</p>
    </div>
    <div class="news-detail-title">
      <h2 class="news-detail-title-ja">{{ $news->title }}</h2>
    </div>
    <div class="news-detail-image">
      <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}">
    </div>
    <div class="news-detail-contents content-font">
      <p>{!! $news->contents !!}</p>
    </div>
  </div>
  </section>

</x-public-shop-layout>
@once
  @vite('resources/scss/shop/newsdetail.scss')
@endonce


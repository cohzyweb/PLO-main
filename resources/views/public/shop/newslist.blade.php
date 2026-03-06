<x-public-shop-layout :shop="$shop">
  <x-public.shop.mv :shop="$shop" />
  
  <section class="news-list">
    <div class="news-list-title --{{ $shop->slug }}">
      <h2 class="news-list-title-ja title-font-midashi">NEWS一覧</h2>
    </div>
    <div class="news-list-items content-wrapper">
      @foreach ($news as $new)
        <div class="news-list-item"> 
          <a href="{{ route('public.shop.newsdetail', ['shop' => $shop->slug, 'id' => $new->id]) }}">
          <div class="news-list-item-image">
            <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="{{ $new->title }}">
          </div>
          <div class="news-list-item-published-at">
            <p>{{ $new->published_at ? \Carbon\Carbon::createFromTimeString($new->published_at)->format('y.m.d') : '' }}</p>
          </div>
          <div class="news-list-item-title">
            <h3 class="news-list-item-title-ja">{{ $new->title }}</h3>
          </div>
          <div class="news-list-item-contents">
            <p>{!! $new->contents !!}</p>
          </div>
          </a>
        </div>
      @endforeach
    </div>
    <div class="news-list-pagination">
      {{ $news->links('pagination::bootstrap-4') }}
    </div>
  </section>

</x-public-shop-layout>
@once
  @vite('resources/scss/shop/newslist.scss')
@endonce

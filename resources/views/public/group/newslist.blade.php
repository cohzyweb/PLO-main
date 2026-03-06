<x-public-front-layout>

  <section class="news-list">
    <div class="news-list-title">
      <h2 class="news-list-title-ja title-font">NEWS一覧</h2>
    </div>
    <div class="news-list-items content-wrapper">
      @foreach ($news as $new)
        <div class="news-list-item">
          @if($new->shop_slug == 'headquarter')
            <a href="{{ route('public.group.newsdetail', ['id' => $new->id]) }}">
          @else
            <a href="{{ route('public.shop.newsdetail', ['shop' => $new->shop_slug, 'id' => $new->id]) }}">
          @endif
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

</x-public-front-layout>
@once
  @vite('resources/scss/group/newslist.scss')
@endonce

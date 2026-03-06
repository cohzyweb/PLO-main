<x-siroganeze-page-layout -page-layout page-title="NEWS" page-subtitle="新着情報"
    breadcrumb="すすきの Premium Men’s Esthe シロガネーゼ ＞ トップページ ＞ 新着情報 ＞ {{ $news['title'] }}" :assets="['resources/scss/shops/siroganeze/news-detail.scss']"
    :banners="$banners">
    <section class="news-detail-section">
        <p class="news-detail-title">{{ $news->title }}</p>
        <p class="news-detail-date">
            {{ $news->published_at ? \Carbon\Carbon::createFromTimeString($news->published_at)->format('y/m/d') : '' }}
        </p>
        <div class="news-detail-card">
            <div class="news-detail-image">
                <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}">
            </div>
            <div class="news-detail-content">
                <div class="news-detail-body">
                    {{-- {!! nl2br(e($news->contents)) !!} --}}
                    {!! nl2br($news->contents) !!}
                </div>
            </div>
        </div>
        @php
            // $shop = request()->route('shop', 'shizuku');
        @endphp

    </section>
    <div class="news-detail-pagination">
        <div class="news-detail-pagination-left">
            @if ($prevNews)
                <a href="{{ route('public.shops.shop.news.detail', ['shop' => $shop->slug, 'id' => $prevNews->id]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.292282 7.071L5.94928 12.728L7.36328 11.314L2.41328 6.364L7.36328 1.414L5.94928 0L0.292282 5.657C0.104811 5.84453 -0.000504971 6.09884 -0.000504971 6.364C-0.000504971 6.62916 0.104811 6.88347 0.292282 7.071Z"
                            fill="#010307" />
                    </svg>
                    &nbsp;{{ $prevNews->title }}
                </a>
            @else
                {{-- <span class="news-detail-pagination-disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.292282 7.071L5.94928 12.728L7.36328 11.314L2.41328 6.364L7.36328 1.414L5.94928 0L0.292282 5.657C0.104811 5.84453 -0.000504971 6.09884 -0.000504971 6.364C-0.000504971 6.62916 0.104811 6.88347 0.292282 7.071Z"
                            fill="white" />
                    </svg>&nbsp;前の記事のタイトル</span> --}}
            @endif
        </div>
        <div class="news-detail-pagination-center">
            <a href="{{ route('public.shops.shop.news', ['shop' => $shop->slug]) }}">NEWS TOP</a>
        </div>
        <div class="news-detail-pagination-right">
            @if ($nextNews)
                <a href="{{ route('public.shops.shop.news.detail', ['shop' => $shop->slug, 'id' => $nextNews->id]) }}">
                    {{ $nextNews->title }}&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.071 7.071L1.414 12.728L0 11.314L4.95 6.364L0 1.414L1.414 0L7.071 5.657C7.25847 5.84453 7.36379 6.09884 7.36379 6.364C7.36379 6.62916 7.25847 6.88347 7.071 7.071Z"
                            fill="#010307" />
                    </svg>
                </a>
            @else
                {{-- <span class="news-detail-pagination-disabled">
                    次の記事のタイトル&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.071 7.071L1.414 12.728L0 11.314L4.95 6.364L0 1.414L1.414 0L7.071 5.657C7.25847 5.84453 7.36379 6.09884 7.36379 6.364C7.36379 6.62916 7.25847 6.88347 7.071 7.071Z"
                            fill="white" />
                    </svg>
                </span> --}}
            @endif
        </div>
    </div>
</x-siroganeze-page-layout>

<x-en-page-layout -page-layout page-title="EVENT" page-subtitle="イベント情報"
    breadcrumb="fashion health 艶 ＞ トップページ ＞ イベント情報 ＞ {{ $event->title }}" :assets="['resources/scss/shops/en/event-detail.scss']"
    :banners="$banners">
    <section class="event-detail-section">
        <div class="event-detail-card">
            <div class="event-detail-image">
                <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->title }}">
            </div>
            <div class="event-detail-content">
                <p class="event-detail-title">{{ $event->title }}</p>
                <div class="event-detail-body">
                    {!! nl2br($event->contents) !!}
                </div>
            </div>
        </div>

    </section>
    <div class="event-detail-pagination">
        <div class="event-detail-pagination-left">
            @if ($prevEvent)
                <a
                    href="{{ route('public.shops.shop.event.detail', ['shop' => $shop->slug, 'id' => $prevEvent->id]) }}">
                    <div class="pc-only">
                      <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13"
                          fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M0.292282 7.071L5.94928 12.728L7.36328 11.314L2.41328 6.364L7.36328 1.414L5.94928 0L0.292282 5.657C0.104811 5.84453 -0.000504971 6.09884 -0.000504971 6.364C-0.000504971 6.62916 0.104811 6.88347 0.292282 7.071Z"
                              fill="#EBEBEB" />
                      </svg>
                    </div>
                    <div class="sp-only">
                      <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13"
                          fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M0.292282 7.071L5.94928 12.728L7.36328 11.314L2.41328 6.364L7.36328 1.414L5.94928 0L0.292282 5.657C0.104811 5.84453 -0.000504971 6.09884 -0.000504971 6.364C-0.000504971 6.62916 0.104811 6.88347 0.292282 7.071Z"
                              fill="#0D0709" />
                      </svg>
                    </div>
                    &nbsp;{{ $prevEvent->title }}
                </a>
            @else
                {{-- <span class="event-detail-pagination-disabled">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.292282 7.071L5.94928 12.728L7.36328 11.314L2.41328 6.364L7.36328 1.414L5.94928 0L0.292282 5.657C0.104811 5.84453 -0.000504971 6.09884 -0.000504971 6.364C-0.000504971 6.62916 0.104811 6.88347 0.292282 7.071Z"
                            fill="white" />
                    </svg>&nbsp;前のイベントのタイトル</span> --}}
            @endif
        </div>
        <div class="event-detail-pagination-center">
            <a href="{{ route('public.shops.shop.event', ['shop' => $shop->slug]) }}">EVENT TOP</a>
        </div>
        <div class="event-detail-pagination-right">
            @if ($nextEvent)
                <a
                    href="{{ route('public.shops.shop.event.detail', ['shop' => $shop->slug, 'id' => $nextEvent->id]) }}">
                    {{ $nextEvent->title }}&nbsp;
                    <div class="pc-only">
                      <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13"
                          fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.071 7.071L1.414 12.728L0 11.314L4.95 6.364L0 1.414L1.414 0L7.071 5.657C7.25847 5.84453 7.36379 6.09884 7.36379 6.364C7.36379 6.62916 7.25847 6.88347 7.071 7.071Z"
                              fill="#EBEBEB" />
                      </svg>
                    </div>
                    <div class="sp-only">
                      <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13"
                          fill="none">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.071 7.071L1.414 12.728L0 11.314L4.95 6.364L0 1.414L1.414 0L7.071 5.657C7.25847 5.84453 7.36379 6.09884 7.36379 6.364C7.36379 6.62916 7.25847 6.88347 7.071 7.071Z"
                              fill="#0D0709" />
                      </svg>
                    </div>
                </a>
            @else
                {{-- <span class="event-detail-pagination-disabled">
                    次のイベントのタイトル&nbsp;
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
</x-en-page-layout>

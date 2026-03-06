<x-en-page-layout page-title="EVENT" page-subtitle="イベント情報"
    breadcrumb="fashion health 艶 ＞ トップページ ＞ イベント情報" :assets="['resources/scss/shops/en/event.scss']" :banners="$banners">
    <section class="event-section">
        @foreach ($events as $event)
            <x-public.shops.event-card image="{{ asset('storage/' . $event->thumbnail) }}" image-alt="event-image"
                title="{{ $event->title }}" :url="route('public.shops.shop.event.detail', ['shop' => 'en', 'id' => $event->id])"
                scss="resources/scss/shops/en/component/event-card.scss">
                {!! nl2br($event->contents) !!}
            </x-public.shops.event-card>
        @endforeach
        <div class="event-pagination">
            {{ $events->links('pagination::shops') }}
        </div>
    </section>
</x-en-page-layout>

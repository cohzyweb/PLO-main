<x-miyabi-page-layout page-title="EVENT" page-subtitle="イベント情報" breadcrumb="すすきの Luxury Room 雅 ＞ トップページ ＞ イベント情報"
    :assets="['resources/scss/shops/miyabi/event.scss']" :banners="$banners">
    <section class="event-section">
        @foreach ($events as $event)
            <x-public.shops.event-card image="{{ asset('storage/' . $event->thumbnail) }}" image-alt="event-image"
                title="{{ $event->title }}" :url="route('public.shops.shop.event.detail', ['shop' => 'miyabi', 'id' => $event->id])"
                scss="resources/scss/shops/miyabi/component/event-card.scss">
                {!! nl2br($event->contents) !!}
            </x-public.shops.event-card>
        @endforeach
        <div class="event-pagination">
            {{ $events->links('pagination::shops') }}
        </div>
    </section>
</x-miyabi-page-layout>

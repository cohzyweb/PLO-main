<x-pussycat-page-layout page-title="EVENT" page-subtitle="イベント情報" breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ イベント情報"
    :assets="['resources/scss/shops/pussycat/event.scss']" :banners="$banners">
    <section class="event-section">
        @foreach ($events as $event)
            <x-public.shops.event-card image="{{ asset('storage/' . $event->thumbnail) }}" image-alt="event-image"
                title="{{ $event->title }}" :url="route('public.shops.shop.event.detail', ['shop' => 'pussycat', 'id' => $event->id])"
                scss="resources/scss/shops/pussycat/component/event-card.scss">
                {!! nl2br($event->contents) !!}
            </x-public.shops.event-card>
        @endforeach
        <div class="event-pagination">
            {{ $events->links('pagination::shops') }}
        </div>
    </section>
</x-pussycat-page-layout>

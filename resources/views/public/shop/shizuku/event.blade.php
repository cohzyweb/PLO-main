<x-shizuku-page-layout page-title="EVENT" page-subtitle="イベント情報" breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ イベント情報"
    :assets="['resources/scss/shops/shizuku/event.scss']" :banners="$banners">
    <section class="event-section">
        @foreach ($events as $event)
            <x-public.shops.event-card image="{{ asset('storage/' . $event->thumbnail) }}" image-alt="event-image"
                title="{{ $event->title }}" :url="route('public.shops.shop.event.detail', ['shop' => 'shizuku', 'id' => $event->id])">
                {!! nl2br($event->contents) !!}
            </x-public.shops.event-card>
        @endforeach
        <div class="event-pagination">
            {{ $events->links('pagination::shops') }}
        </div>
    </section>
</x-shizuku-page-layout>

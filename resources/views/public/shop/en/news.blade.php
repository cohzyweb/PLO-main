<x-en-page-layout page-title="NEWS" page-subtitle="新着情報"
    breadcrumb="fashion health 艶 ＞ トップページ ＞ 新着情報" :assets="['resources/scss/shops/en/news.scss']" :banners="$banners">
    <section class="news-section">
        @foreach ($news as $new)
            <x-public.shops.news-card image="{{ asset('storage/' . $new->thumbnail) }}" image-alt="news-image"
                title="{{ $new->title }}"
                date="{{ $new->published_at ? \Carbon\Carbon::createFromTimeString($new->published_at)->format('y/m/d') : '' }}"
                :url="route('public.shops.shop.news.detail', ['shop' => 'en', 'id' => $new->id])" scss="resources/scss/shops/en/component/news-card.scss">
                {!! nl2br($new->contents) !!}
            </x-public.shops.news-card>
        @endforeach
        <div class="news-pagination">
            {{ $news->links('pagination::shops') }}
        </div>
        {{-- <x-public.shops.news-card image="assets/img/shops/shizuku/news-card-image1.png" image-alt="news-image"
            title="タイトルタイトルタイトルタイトルタイ" date="カテゴリ名 | 00.00.00" :url="route('public.shops.shop.news.detail', ['shop' => 'shizuku', 'id' => 1])">
            本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文

            本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文
        </x-public.shops.news-card>
        <x-public.shops.news-card image="assets/img/shops/shizuku/news-card-image2.png" image-alt="news-image"
            title="タイトルタイトルタイトルタイトルタイ" date="カテゴリ名 | 00.00.00" :url="route('public.shops.shop.news.detail', ['shop' => 'shizuku', 'id' => 2])">
            本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文
        </x-public.shops.news-card>
        <x-public.shops.news-card image="assets/img/shops/shizuku/news-card-image3.png" image-alt="news-image"
            title="タイトルタイトルタイトルタイトルタイ" date="カテゴリ名 | 00.00.00" :url="route('public.shops.shop.news.detail', ['shop' => 'shizuku', 'id' => 3])">
            本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文
        </x-public.shops.news-card>
        <x-public.shops.news-card image="assets/img/shops/shizuku/news-card-image4.png" image-alt="news-image"
            title="タイトルタイトルタイトルタイトルタイ" date="カテゴリ名 | 00.00.00" :url="route('public.shops.shop.news.detail', ['shop' => 'shizuku', 'id' => 4])">
            本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文本文
        </x-public.shops.news-card> --}}
    </section>
</x-en-page-layout>

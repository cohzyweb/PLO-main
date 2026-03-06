<x-pussycat-page-layout page-title="ACCESS" page-subtitle="アクセス情報" breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ アクセス情報"
    :assets="['resources/scss/shops/pussycat/access.scss']" :banners="$banners">
    <section class="access-section">
        <h1 class="access-title">ABOUT</h1>
        <div class="access-content">
            <div class="access-content-item">
                <h2> 住所 </h2>
                <p> {{ $shop_item->address1 . '　　' . $shop_item->address2 }} </p>
            </div>
            <div class="access-content-item">
                <h2> 電話番号 </h2>
                <p> {{ $shop_item->tel }} </p>
            </div>
            <div class="access-content-item">
                <h2> 営業時間 </h2>
                <p>
                    @if ($shop_item->open_start && $shop_item->open_end)
                        {{ $shop_item->open_start->format('H:i') . '〜' . $shop_item->open_end->format('H:i') }}
                    @elseif($shop_item->open_start)
                        {{ $shop_item->open_start->format('H:i') }}
                    @elseif($shop_item->open_end)
                        {{ $shop_item->open_end->format('H:i') }}
                    @endif
                </p>
            </div>
            <div class="access-content-item">
                <h2> 店舗情報 </h2>
                <p> {{ $shop_item->memo }} </p>
            </div>
        </div>
        <h1 class="map-title">MAP</h1>
        <div class="map-content">
            <iframe style="border:0" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q={{ $shop_item->address1 . ' ' . $shop_item->address2 }}&output=embed">
            </iframe>

            {{-- <img src="{{ asset('assets/img/shops/shizuku/map.png') }}" alt="Map" class="pc-only">
            <img src="{{ asset('assets/img/shops/shizuku/map-sp.png') }}" alt="Map" class="sp-only"> --}}
        </div>
    </section>
</x-pussycat-page-layout>

<x-shizuku-page-layout page-title="NEW CAST" page-subtitle="新人情報" breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ 新人情報"
    :assets="['resources/scss/shops/shizuku/newcast.scss']" :banners="$banners">
    <section class="newcast-section">
        {{-- @for ($i = 0; $i < 6; $i++)
            <x-public.shops.new-girl-card background-image="assets/img/shops/shizuku/new-girl.png"
                photo-image="assets/img/shops/shizuku/new-girl.png" date="2025.00.00 SUN" date-label="入店" name="名前名前"
                name-vertical="Name" age="00" measurements="T.000 B.000(C) W.00 H.00"
                description="テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト"
                gradient-id="calendar-gradient-{{ $i }}" gradient-start="#FFF2D7" gradient-end="#BD902F"
                overlay-opacity="0.7" name-color="#FFFFFF" measurements-color="#FFFFFF" />
        @endfor --}}
        @foreach ($new_girls as $new_girl)
            <x-public.shops.new-girl-card
                href_cast_profile="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $new_girl->id]) }}"
                background-image="{{ asset('storage/' . $new_girl->gallery_1) }}"
                photo-image="{{ asset('storage/' . $new_girl->gallery_1) }}"
                date="{{ $new_girl->joined_at ? \Carbon\Carbon::parse($new_girl->joined_at)->format('m/d') : '' }}"
                date-label="入店" name="{{ $new_girl->name }}" name-vertical="{{ $new_girl->name }}"
                age="{{ $new_girl->age }}"
                measurements="T.{{ $new_girl->height }} B.{{ $new_girl->bust }}(C) W.{{ $new_girl->waist }} H.{{ $new_girl->hip }}"
                description="{{ $new_girl->appeal_point }}" gradient-id="calendar-gradient-{{ $loop->index }}"
                gradient-start="#FFF2D7" gradient-end="#BD902F" overlay-opacity="0.7" name-color="#FFFFFF"
                measurements-color="#FFFFFF" />
        @endforeach
    </section>
    <div class="newcast-pagination">
        {{ $new_girls->links('pagination::shops') }}
    </div>
</x-shizuku-page-layout>

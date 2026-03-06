<x-miyabi-page-layout page-title="NEW CAST" page-subtitle="新人情報" breadcrumb="すすきの Luxury Room 雅 ＞ トップページ ＞ 新人情報"
    :assets="['resources/scss/shops/miyabi/newcast.scss']" :banners="$banners">
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
                :gradient=false datetextColor="#8C0712" newGirlCardBgLeftColor="rgba(255,255,255,0.7)"
                name-color="#0F0002" measurements-color="#0F0002" :cardGradient=false carddividerColor="#8C0712"
                :carddividerverticalGradient=false
                carddividerverticalColor="linear-gradient(180deg, #73071A 0%, #D90D32 100%)"
                iconSvg='<svg xmlns="http://www.w3.org/2000/svg" width="27" height="25" viewBox="0 0 27 25" fill="none">
<path d="M22.0836 20.2H17.6669V16.16H22.0836V20.2ZM15.4585 10.1H11.0418V14.14H15.4585V10.1ZM22.0836 10.1H17.6669V14.14H22.0836V10.1ZM8.83343 16.16H4.41671V20.2H8.83343V16.16ZM15.4585 16.16H11.0418V20.2H15.4585V16.16ZM8.83343 10.1H4.41671V14.14H8.83343V10.1ZM26.5003 2.02V24.24H0V2.02H3.31253V3.03C3.31253 4.141 4.3063 5.05 5.52089 5.05C6.73549 5.05 7.72925 4.141 7.72925 3.03V2.02H18.771V3.03C18.771 4.141 19.7648 5.05 20.9794 5.05C22.194 5.05 23.1877 4.141 23.1877 3.03V2.02H26.5003ZM24.2919 8.08H2.20836V22.22H24.2919V8.08ZM22.0836 1.01C22.0836 0.404 21.6419 0 20.9794 0C20.3169 0 19.8752 0.404 19.8752 1.01V3.03C19.8752 3.636 20.3169 4.04 20.9794 4.04C21.6419 4.04 22.0836 3.636 22.0836 3.03V1.01ZM6.62507 3.03C6.62507 3.636 6.1834 4.04 5.52089 4.04C4.85838 4.04 4.41671 3.636 4.41671 3.03V1.01C4.41671 0.404 4.85838 0 5.52089 0C6.1834 0 6.62507 0.404 6.62507 1.01V3.03Z" fill="#8C0712"/>
</svg>' />
        @endforeach
    </section>
    <div class="newcast-pagination">
        {{ $new_girls->links('pagination::shops') }}
    </div>
</x-miyabi-page-layout>

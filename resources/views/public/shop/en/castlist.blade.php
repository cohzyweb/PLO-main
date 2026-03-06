<x-en-page-layout page-title="CAST LIST" page-subtitle="キャスト一覧"
    breadcrumb="fashion health 艶 ＞ トップページ ＞ キャスト一覧" :assets="['resources/scss/shops/en/castlist.scss']" :banners="$banners">
    <div class="castlist-card-list">
        {{-- @for ($i = 1; $i <= 20; $i++)
        <x-public.shops.schedule-card
            background-image="assets/img/shops/shizuku/castlist.png"
            frame-image="assets/img/shops/shizuku/card-frame.png"
            badge-shift="本日出勤"
            badge-time="12:00〜24:00"
            status-icon=''
            status-text=""
            name="かれん（20）"
            measurements="T.160 B.85(C) W.60 H.83"
            message="キャストメッセージが出ますキャ"
            badge-border-color="#B90000"
            badge-bg-color="#B90000"
            badge-text-color="#FFDA89"
            badge-time-color="#2A1A08"
            status-text-color="#FFE500"
            name-color="#FFFFFF"
            measurements-color="#FFFFFF"
            message-gradient-start="#FFF2D7"
            message-gradient-end="#BD902F"
            content-gradient-start="rgba(42, 26, 8, 0.80)"
            content-gradient-end="rgba(0, 0, 0, 0.00)"
            variant="castlist"
        />
    @endfor --}}
        {{-- {{ dd($castlist) }} --}}
        @foreach ($castlist as $cast)
            <x-public.shops.schedule-card
                href_cast_profile="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $cast->id]) }}"
                background-image="{{ asset('storage/' . $cast->gallery_1) }}"
                frame-image="assets/img/shops/en/card-frame.png" badge-shift="本日出勤"
                badge-time="{{ $cast->start_datetime ? date('H:i', strtotime($cast->start_datetime)) . '~' . date('H:i', strtotime($cast->end_datetime)) : '' }}"
                status-icon='' status-text="" name="{{ $cast->name . '　（' . $cast->age . ')' }}"
                measurements="{{ 'T.' . $cast->height . ' B.' . $cast->bust . ' W.' . $cast->waist . ' H.' . $cast->hip }}"
                message="{{ $cast->appeal_point }}" variant="castlist"                                     contentGradientStart="rgba(255, 255, 255, 0.00)"
                contentGradientStartPercent="4.33%"
                contentGradientEnd="rgba(255, 255, 255, 0.85)" contentGradientEndPercent="36.06%"
                badgeBorderColor="#523C47" badgeBgColor="#523C47" badgeTextColor="#F2FF00"
                badgeTimeColor="#2A1A08" :messageGradient=false measurementsColor="#132126"
                nameColor="#132126" messageColor="#132126" />
        @endforeach
    </div>
    <div class="castlist-pagination">
        {{ $castlist->links('pagination::shops') }}
    </div>
    </x-en-page-layout>
    {{-- @once
    @vite(['resources/scss/shops/pagination.scss'])
@endonce --}}

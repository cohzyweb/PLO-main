<x-pussycat-page-layout page-title="SCHEDULE" page-subtitle="出勤情報" breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ 出勤情報"
    :assets="['resources/scss/shops/pussycat/schedule.scss']" :banners="$banners">
    {{-- your custom page content here --}}
    <div class="schedule-menu">
        <div class="search-list">
            {{-- <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect width="35" height="35" fill="url(#pattern0_10_1529)"/>
                <defs>
                <pattern id="pattern0_10_1529" patternContentUnits="objectBoundingBox" width="1" height="1">
                <use xlink:href="#image0_10_1529" transform="scale(0.00390625)"/>
                </pattern>
                <image id="image0_10_1529" width="256" height="256" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
                </defs>
            </svg>          --}}
            <img src="{{ asset('assets/img/shops/pussycat/schedule-icon.png') }}" alt="出勤日で検索" class="schedule-icon">
            <p>出勤日で検索</p>
        </div>
        <form action="{{ route('public.shops.shop.schedule', ['shop' => 'pussycat']) }}" method="get"
            class="search-buttons" id="schedule-form">
            <button class="search-button {{ $select_day == $days[0] ? 'active' : '' }}" name="date"
                value="{{ $days[0] }}">
                <p>{{ $days[0] }}</p>
            </button>
            <button class="search-button {{ $select_day == $days[1] ? 'active' : '' }}" name="date"
                value="{{ $days[1] }}">
                <p>{{ $days[1] }}</p>
            </button>
            <button class="search-button {{ $select_day == $days[2] ? 'active' : '' }}" name="date"
                value="{{ $days[2] }}">
                <p>{{ $days[2] }}</p>
            </button>
            <button class="search-button {{ $select_day == $days[3] ? 'active' : '' }}" name="date"
                value="{{ $days[3] }}">
                <p>{{ $days[3] }}</p>
            </button>
            <button class="search-button {{ $select_day == $days[4] ? 'active' : '' }}" name="date"
                value="{{ $days[4] }}">
                <p>{{ $days[4] }}</p>
            </button>
            <button class="search-button {{ $select_day == $days[5] ? 'active' : '' }}" name="date"
                value="{{ $days[5] }}">
                <p>{{ $days[5] }}</p>
            </button>
        </form>
    </div>
    <div class="schedule-card-list">
        {{-- @for ($i = 1; $i <= 20; $i++)
            <x-public.shops.schedule-card background-image="assets/img/shops/shizuku/castlist.png"
                frame-image="assets/img/shops/shizuku/card-frame.png" badge-shift="本日出勤" badge-time="12:00〜24:00"
                status-icon='<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5 0C5.6075 0 0 5.6075 0 12.5C0 19.3925 5.6075 25 12.5 25C19.3925 25 25 19.3925 25 12.5C25 5.6075 19.3925 0 12.5 0ZM19.6875 13.75H11.25V5H13.75V11.25H19.6875V13.75Z" fill="#FFE600"/></svg>'
                status-text="待機中" name="かれん（20）" measurements="T.160 B.85(C) W.60 H.83" message="キャストメッセージが出ますキャ"
                badge-border-color="#B90000" badge-bg-color="#B90000" badge-text-color="#FFDA89"
                badge-time-color="#2A1A08" status-text-color="#FFE500" name-color="#FFFFFF" measurements-color="#FFFFFF"
                message-gradient-start="#FFF2D7" message-gradient-end="#BD902F"
                content-gradient-start="rgba(42, 26, 8, 0.80)" content-gradient-end="rgba(0, 0, 0, 0.00)"
                variant="castlist" />
        @endfor --}}
        @foreach ($todayCasts as $todayCast)
            @if ($todayCast->reservation == '')
                <x-public.shops.schedule-card
                    href_cast_profile="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $todayCast->id]) }}"
                    background-image="{{ asset('storage/' . $todayCast->gallery_1) }}"
                    frame-image="assets/img/shops/pussycat/card-frame.png" badge-shift="本日出勤"
                    badge-time="{{ date('H:i', strtotime($todayCast->start_datetime)) . '~' . date('H:i', strtotime($todayCast->end_datetime)) }}"
                    status-icon='<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5 0C5.6075 0 0 5.6075 0 12.5C0 19.3925 5.6075 25 12.5 25C19.3925 25 25 19.3925 25 12.5C25 5.6075 19.3925 0 12.5 0ZM19.6875 13.75H11.25V5H13.75V11.25H19.6875V13.75Z" fill="#FFE600"/></svg>'
                    status-text="待機中" name="{{ $todayCast->name . '(' . $todayCast->age . ')' }}"
                    measurements="{{ ' T' . $todayCast->height . ' B' . $todayCast->bust . ' W' . $todayCast->waist . ' H' . $todayCast->hip }}"
                    message="{{ $todayCast->appeal_point }}" variant="schedule" contentGradientStart="#7E002A"
                    contentGradientStartPercent="48.08%" contentGradientEnd="rgba(255, 0, 246, 0.20)"
                    contentGradientEndPercent="100%" badgeBorderColor="#F2138E" badgeBgColor="#F2138E"
                    badgeTextColor="#FFDA89" badgeTimeColor="#10040E" :messageGradient=false
                    measurementsColor="#FFFFFF" />
            @else
                <x-public.shops.schedule-card
                    href_cast_profile="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $todayCast->id]) }}"
                    background-image="{{ asset('storage/' . $todayCast->gallery_1) }}"
                    frame-image="assets/img/shops/pussycat/card-frame.png" badge-shift="本日出勤"
                    badge-time="{{ date('H:i', strtotime($todayCast->start_datetime)) . '~' . date('H:i', strtotime($todayCast->end_datetime)) }}"
                    status-icon='<svg xmlns="http://www.w3.org/2000/svg" width="15" height="25" viewBox="0 0 15 25" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M15 0V6.76622L9.26748 12.5L15 18.2313V25H0V18.2313L5.73123 12.5L0 6.76622V0H15ZM7.5 14.2675L2.50002 19.2675V21.875L7.5 18.75L12.5 21.875V19.2675L7.5 14.2675ZM12.5 2.50002H2.50002V5.73123L4.27166 7.50333L10.7435 7.4881L12.5 5.73123V2.50002Z" fill="#F5F5F5"/>
</svg>'
                    status-text="{{ '次回' . \Carbon\Carbon::createFromTimeString($todayCast->reservation)->format('H:i') . '~' }}"
                    name="{{ $todayCast->name . '(' . $todayCast->age . ')' }}"
                    measurements="{{ ' T' . $todayCast->height . ' B' . $todayCast->bust . ' W' . $todayCast->waist . ' H' . $todayCast->hip }}"
                    message="{{ $todayCast->appeal_point }}" variant="schedule" status-text-color="#ffffff"
                    contentGradientStart="#7E002A" contentGradientStart="#7E002A" contentGradientStartPercent="48.08%"
                    contentGradientEnd="rgba(255, 0, 246, 0.20)" contentGradientEndPercent="100%"
                    badgeBorderColor="#F2138E" badgeBgColor="#F2138E" badgeTextColor="#FFDA89" badgeTimeColor="#10040E"
                    :messageGradient=false measurementsColor="#FFFFFF" />
            @endif
        @endforeach
    </div>
    <div class="schedule-pagination">
        {{ $todayCasts->links('pagination::shops') }}
    </div>
</x-pussycat-page-layout>

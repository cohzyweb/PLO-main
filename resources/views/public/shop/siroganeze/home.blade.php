<x-shizuku-layout>
    <div class="home">
        <div class="banner-image">
            {{-- <img class="pc-only" src="/assets/img/shops/shizuku/home-banner.png" alt="home gradient overlay">
            <img class="sp-only" src="/assets/img/shops/shizuku/home-banner-sp.jpg" alt="home gradient overlay"> --}}
        </div>
        <div class="home-gradient-overlay"></div>

        <!-- Menu Overlay Component -->
        <x-public.shops.menu-overlay logo-image="assets/img/shops/siroganeze/footer-logo.png" logo-alt="Shizuku Logo"
            :menu-links="[
                'top' => route('public.shops.shop.home', ['shop' => 'siroganeze']),
                'schedule' => route('public.shops.shop.schedule', ['shop' => 'siroganeze']),
                'pricing' => route('public.shops.shop.system', ['shop' => 'siroganeze']),
                'new' => route('public.shops.shop.newcast', ['shop' => 'siroganeze']),
                'cast' => route('public.shops.shop.castlist', ['shop' => 'siroganeze']),
                'news' => route('public.shops.shop.news', ['shop' => 'siroganeze']),
                'event' => route('public.shops.shop.event', ['shop' => 'siroganeze']),
                'diary' => route('public.shops.shop.photo-diary', ['shop' => 'siroganeze']),
                'movie' => route('public.shops.shop.movie', ['shop' => 'siroganeze']),
                'review' => route('public.shops.shop.review', ['shop' => 'siroganeze']),
                'ranking' => route('public.shops.shop.ranking', ['shop' => 'siroganeze']),
                'shop' => route('public.shops.shop.shop-list', ['shop' => 'siroganeze']),
                'access' => route('public.shops.shop.access', ['shop' => 'siroganeze']),
                'recruit-male' => '#',
                'login' => route('login'),
                'recruit-female' => '#',
                'register' => route('register'),
            ]" :bottom-buttons="[
                'group' => '#',
                'recruit' => '#',
            ]" :bottom-button-images="[
                'group' => 'assets/img/shops/shizuku/plo-group-btn.png',
                'recruit' => 'assets/img/shops/shizuku/recruit-btn.png',
            ]"
            mobile-image="assets/img/shops/shizuku/credit_system.png" mobile-image-alt="女の子募集中" menuCloseColor="#0B0B07"
            twitterColor="#2A1A08" menuRectColor="rgba(255, 255, 255, 0.9)" :menuIconColor="[
                'top' => '#BF848F',
                'new' => '#52B845',
                'event' => '#FFD775',
                'review' => '#BF848F',
                'shop' => '#BF848F',
                'schedule' => '#525CF6',
                'cast' => '#B31723',
                'diary' => '#BF848F',
                'ranking' => '#D6AD01',
                'login' => '#0B0B07',
                'register' => '#0B0B07',
                'pricing' => '#DCC305',
                'news' => '#BF848F',
                'movie' => '#0B0B07',
                'access' => '#BF848F',
                'recruit-female' => '#D42032',
                'recruit-male' => '#525CF6',
            ]" />

        <div class="banner">
            <x-public.shops.contact-info phone-icon="assets/img/shops/siroganeze/phone.png" phone-number="011-521-3593"
                email="@EstheSiroganeze" address="〒064-0805</br>
北海道札幌市中央区南5条西5丁目 第8旭観光ビル2F" hours="9:00 ~ 0:00"
                credit-text="クレジット決済可能" note="電話予約の対応時間は朝8:30~となります。" phone-background="#132126"
                address-background="#fff" />
            <div class="register">
                <x-public.shops.register-button text="新規会員登録はコチラ！" background-color="#FFF5FB" text-color="#FF3498" />
            </div>
        </div>
        <div class="home-content">
            <!-- Breadcrumb Navigation -->
            <div class="breadcrumb-navigation">
                <p>すすきの Premium Men’s Esthe シロガネーゼ ＞ トップページ</p>
            </div>
            <x-public.shops.home-header logo-image="assets/img/shops/siroganeze/footer-logo-black.png"
                logo-alt="Shizuku Logo" stroke-color="#E2EAF5" :menu-items="[
                    [
                        'title' => 'トップページ',
                        'subtitle' => 'top page',
                        'url' => route('public.shops.shop.home', ['shop' => 'siroganeze']),
                    ],
                    [
                        'title' => 'キャスト一覧',
                        'subtitle' => 'cast list',
                        'url' => route('public.shops.shop.castlist', ['shop' => 'siroganeze']),
                    ],
                    [
                        'title' => '出勤情報',
                        'subtitle' => 'schedule',
                        'url' => route('public.shops.shop.schedule', ['shop' => 'siroganeze']),
                    ],
                    [
                        'title' => '写メ日記',
                        'subtitle' => 'photo diary',
                        'url' => route('public.shops.shop.photo-diary', ['shop' => 'siroganeze']),
                    ],
                    [
                        'title' => 'イベント一覧',
                        'subtitle' => 'event',
                        'url' => route('public.shops.shop.event', ['shop' => 'siroganeze']),
                    ],
                    [
                        'title' => '料金システム',
                        'subtitle' => 'system',
                        'url' => route('public.shops.shop.system', ['shop' => 'siroganeze']),
                    ],
                    [
                        'title' => '新人情報',
                        'subtitle' => 'new cast',
                        'url' => route('public.shops.shop.newcast', ['shop' => 'siroganeze']),
                    ],
                    ['title' => 'ログイン', 'subtitle' => 'login', 'url' => route('login')],
                ]" menu-button-id="mobileMenuButton"
                background-color="#132126" :mobileMenuBttonItems="[
                    [
                        'title' => 'トップページ',
                        'subtitle' => 'top page',
                        'url' => route('public.shops.shop.home', ['shop' => 'siroganeze']),
                    ],
                    [
                        'title' => '出勤情報',
                        'subtitle' => 'schedule',
                        'url' => route('public.shops.shop.schedule', ['shop' => 'siroganeze']),
                    ],
                    [
                        'title' => '料金システム',
                        'subtitle' => 'system',
                        'url' => route('public.shops.shop.system', ['shop' => 'siroganeze']),
                    ],
                    ['title' => 'ログイン', 'subtitle' => 'login', 'url' => route('login')],
                ]"
                social-svg='<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
<path d="M5.71429 0C2.5625 0 0 2.5625 0 5.71429V34.2857C0 37.4375 2.5625 40 5.71429 40H34.2857C37.4375 40 40 37.4375 40 34.2857V5.71429C40 2.5625 37.4375 0 34.2857 0H5.71429ZM32.2411 7.5L22.9732 18.0893L33.875 32.5H25.3393L18.6607 23.7589L11.0089 32.5H6.76786L16.6786 21.1696L6.22321 7.5H14.9732L21.0179 15.4911L28 7.5H32.2411ZM28.8661 29.9643L13.6964 9.90179H11.1696L26.5089 29.9643H28.8571H28.8661Z" fill="#BF5A75"/>
</svg>' />
            @if ($todayCasts->count() > 0)
                <div class="home-schedule">
                    <x-public.shops.section-title text="schedule" letter-spacing="6px" color="#F2F2F2" :gradient=false
                        :backgroundGradient=false color="#394022" backgroundColor="rgba(255, 255, 255, 0.90)" />
                    <x-public.shops.schedule-info icon-image="assets/img/shops/siroganeze/calender-g.png"
                        icon-alt="出勤情報" title="出勤情報" description="本日出勤するキャスト一覧になります。" button-text="一覧を見る"
                        background-color="rgba(255, 255, 255, 0.90)" text-color="#132126" border-color="#132126"
                        underlineColor="#132126" responsive-variant="new-girl" :gradient='false'
                        buttonHref="{{ route('public.shops.shop.schedule', ['shop' => 'siroganeze']) }}" />
                    <div class="home-schedule-cards">
                        {{-- @for ($i = 0; $i < 12; $i++)
                            <x-public.shops.schedule-card
                                background-image="assets/img/shops/shizuku/coming-soon-card.png"
                                frame-image="assets/img/shops/shizuku/card-frame.png" badge-shift="本日出勤"
                                badge-time="12:00~24:00"
                                status-icon='<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.5 0C5.6075 0 0 5.6075 0 12.5C0 19.3925 5.6075 25 12.5 25C19.3925 25 25 19.3925 25 12.5C25 5.6075 19.3925 0 12.5 0ZM19.6875 13.75H11.25V5H13.75V11.25H19.6875V13.75Z" fill="#FFE600"/></svg>'
                                status-text="待機中" name="のんたん（20）" measurements="T.160 B.85(C) W.60 H.83"
                                message="キャストメッセージが出ます" variant="schedule" />
                        @endfor --}}
                        @foreach ($todayCasts as $todayCast)
                            @if ($todayCast->reservation == '')
                                <x-public.shops.schedule-card
                                    href_cast_profile="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $todayCast->id]) }}"
                                    background-image="{{ asset('storage/' . $todayCast->gallery_1) }}"
                                    frame-image="assets/img/shops/siroganeze/card-frame.png" badge-shift="本日出勤"
                                    badge-time="{{ date('H:i', strtotime($todayCast->start_datetime)) . '~' . date('H:i', strtotime($todayCast->end_datetime)) }}"
                                    status-icon='<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
<path d="M12.5 0C5.6075 0 0 5.6075 0 12.5C0 19.3925 5.6075 25 12.5 25C19.3925 25 25 19.3925 25 12.5C25 5.6075 19.3925 0 12.5 0ZM19.6875 13.75H11.25V5H13.75V11.25H19.6875V13.75Z" fill="#BF5A75"/>
</svg>'
                                    status-text="待機中" name="{{ $todayCast->name . '(' . $todayCast->age . ')' }}"
                                    measurements="{{ ' T' . $todayCast->height . ' B' . $todayCast->bust . ' W' . $todayCast->waist . ' H' . $todayCast->hip }}"
                                    message="{{ $todayCast->appeal_point }}" variant="schedule"
                                    statusTextColor="#BF5A75" contentGradientStart="#FFF "
                                    contentGradientStartPercent="50%" contentGradientEnd="rgba(255, 255, 255, 0.00)"
                                    contentGradientEndPercent="100%" badgeBorderColor="#171923" badgeBgColor="#171923"
                                    badgeTextColor="#FFF" badgeTimeColor="#000" :messageGradient=false
                                    measurementsColor="#000" nameColor="#000" messageColor="#000" />
                            @else
                                <x-public.shops.schedule-card
                                    href_cast_profile="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $todayCast->id]) }}"
                                    background-image="{{ asset('storage/' . $todayCast->gallery_1) }}"
                                    frame-image="assets/img/shops/siroganeze/card-frame.png" badge-shift="本日出勤"
                                    badge-time="{{ date('H:i', strtotime($todayCast->start_datetime)) . '~' . date('H:i', strtotime($todayCast->end_datetime)) }}"
                                    status-text="{{ '次回' . \Carbon\Carbon::createFromTimeString($todayCast->reservation)->format('H:i') . '~' }}"
                                    name="{{ $todayCast->name . '(' . $todayCast->age . ')' }}"
                                    measurements="{{ ' T' . $todayCast->height . ' B' . $todayCast->bust . ' W' . $todayCast->waist . ' H' . $todayCast->hip }}"
                                    message="{{ $todayCast->appeal_point }}" variant="schedule"
                                    status-text-color="#BFA893"
                                    statusIcon='<svg xmlns="http://www.w3.org/2000/svg" width="15" height="25" viewBox="0 0 15 25" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M15 0V6.76622L9.26748 12.5L15 18.2313V25H0V18.2313L5.73123 12.5L0 6.76622V0H15ZM7.5 14.2675L2.50002 19.2675V21.875L7.5 18.75L12.5 21.875V19.2675L7.5 14.2675ZM12.5 2.50002H2.50002V5.73123L4.27166 7.50333L10.7435 7.4881L12.5 5.73123V2.50002Z" fill="#BFA893"/>
</svg>'
                                    contentGradientStart="#FFF " contentGradientStartPercent="50%"
                                    contentGradientEnd="rgba(255, 255, 255, 0.00)" contentGradientEndPercent="100%"
                                    badgeBorderColor="#171923" badgeBgColor="#171923" badgeTextColor="#FFF"
                                    badgeTimeColor="#000" :messageGradient=false measurementsColor="#000"
                                    nameColor="#000" messageColor="#000" />
                            @endif
                        @endforeach
                    </div>
                    <div class="home-schedule-button-mobile">
                        <a class="schedule-info-button schedule-info-button-mobile"
                            href="{{ route('public.shops.shop.schedule', ['shop' => 'siroganeze']) }}"
                            style="background: #FFFFFF; border-left-color: #2A1A08;">
                            <p style="color: #2A1A08;">一覧を見る</p>
                            <div class="schedule-info-underline" style="background: #BF5A75;"></div>
                        </a>
                    </div>
                </div>
            @endif
            <div class="home-news">
                @if (count($news) > 0)
                    <x-public.shops.news-section title="news" slider-id="newsSlider"
                        default-image="assets/img/shops/shizuku/news-image.png" variant="news" :titleBackgroundGradient='false'
                        :items="$news" :shop="$shop" titleBackgroundColor="#132126" :titleGradient=false
                        titleColor="#FEFEFE" />
                @endif
                @if (count($diaries) > 0)
                    <x-public.shops.news-section title="photo diary" slider-id="diarySlider"
                        default-image="assets/img/shops/shizuku/diary-image.png" variant="diary" :titleBackgroundGradient='false'
                        :items="$diaries" :shop="$shop" titleBackgroundColor="#132126" :titleGradient=false
                        titleColor="#FEFEFE" />
                @endif
            </div>
            @php
                $pickupImages = [
                    ['image' => asset('storage/' . $pickups[0]->gallery_1), 'alt' => 'Cast 1'],
                    ['image' => asset('storage/' . $pickups[1]->gallery_1), 'alt' => 'Cast 2'],
                ];
            @endphp
            <x-public.shops.pickup-section header-background-image="assets/img/shops/siroganeze/pickup-bg.png"
                title-en="PICK UP" title-ja="ピックアップ" description="当店の女の子イチオシ情報です" badge-text="当店一押し"
                :cast-images="$pickupImages" frame-image="assets/img/shops/siroganeze/card-frame-2.png" :Colorchange=false
                badgeDiamondSvg='<svg xmlns="http://www.w3.org/2000/svg" width="228" height="228" viewBox="0 0 228 228" fill="none">
<g filter="url(#filter0_d_701_11446)">
<path d="M114 20L161.525 66.4754L208 114L161.525 161.525L114 208L66.4754 161.525L20 114L66.4754 66.4754L114 20Z" fill="#132126"/>
</g>
<defs>
<filter id="filter0_d_701_11446" x="0" y="0" width="228" height="228" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
<feFlood flood-opacity="0" result="BackgroundImageFix"/>
<feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
<feOffset/>
<feGaussianBlur stdDeviation="10"/>
<feComposite in2="hardAlpha" operator="out"/>
<feColorMatrix type="matrix" values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 1 0"/>
<feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_701_11446"/>
<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_701_11446" result="shape"/>
</filter>
</defs>
</svg>' />
            @if ($new_girls->count() > 0)
                <div class="home-new-girl-section">
                    <x-public.shops.section-title text="NEW GIRL" color="#394022" :gradient=false
                        :backgroundGradient=true backgroundColor="#FFF" letter-spacing="0.375rem" opacity="1.0"
                        small="true" />
                    @php
                        $newGirlIconSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="35" viewBox="0 0 26 35" fill="none">
<path d="M3.48938 0L5.03394 0.68188L12.8051 8.17029L20.4795 0.68188L22.0241 0H22.6956C24.5021 0.486863 25.226 1.46741 25.3791 3.34258C25.0769 9.26539 25.7887 15.6069 25.3872 21.4806C25.1991 24.2313 24.3167 24.5872 22.6244 26.311C20.3573 28.6212 17.5878 31.7183 15.1756 33.7476C14.5014 34.3149 13.8849 34.6818 13.0253 34.9055C12.8507 34.8905 12.6587 34.9286 12.4881 34.9055C11.7212 34.7991 11.055 34.3709 10.4721 33.884C8.13514 31.9325 5.48791 28.9472 3.29195 26.7202C1.48415 24.8873 0.327746 24.4331 0.126282 21.4806C-0.275302 15.6069 0.436537 9.26539 0.134341 3.34258C0.284767 1.49195 1.05167 0.492318 2.81784 0H3.48938ZM12.7567 29.9959C14.304 28.8122 15.5974 27.2834 16.9834 25.9019C17.7691 25.1205 20.7978 22.5471 21.0208 21.6824L21.014 7.50205C20.7051 7.00837 20.2042 6.95382 19.7475 7.30157L12.7581 14.2486L12.7567 29.9959Z" fill="#545928"/>
</svg>';
                    @endphp
                    <x-public.shops.schedule-info :icon-svg="$newGirlIconSvg" title="新人情報"
                        description="新入デビュー♪ シロガネーゼの新人入店情報になります" button-text="一覧を見る" background-color="#fff"
                        text-color="#0B0B07" border-color="#394022" underlineColor="#132126"
                        responsive-variant="new-girl" :gradient=false
                        button-href="{{ route('public.shops.shop.newcast', ['shop' => 'siroganeze']) }}" />
                </div>
                <div class="home-new-girl-slider">
                    <div class="new-girl-slider-cards">
                        <div class="new-girl-slider-content">
                            {{-- @for ($i = 0; $i < 6; $i++)
                                <x-public.shops.new-girl-card background-image="assets/img/shops/shizuku/new-girl.png"
                                    photo-image="assets/img/shops/shizuku/new-girl.png" date="2025.00.00 SUN"
                                    date-label="入店" name="名前名前" name-vertical="Name" age="00"
                                    measurements="T.000 B.000(C) W.00 H.00"
                                    description="テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト"
                                    gradient-id="calendar-gradient-{{ $i }}" gradient-start="#FFF2D7"
                                    gradient-end="#BD902F" overlay-opacity="0.7" name-color="#FFFFFF"
                                    measurements-color="#FFFFFF" />
                            @endfor --}}
                            @foreach ($new_girls as $new_girl)
                                <x-public.shops.new-girl-card
                                    href_cast_profile="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $new_girl->id]) }}"
                                    background-image="{{ asset('storage/' . $new_girl->gallery_1) }}"
                                    photo-image="{{ asset('storage/' . $new_girl->gallery_1) }}"
                                    date="{{ $new_girl->joined_at ? \Carbon\Carbon::parse($new_girl->joined_at)->format('Y:m:d D') : '' }}"
                                    date-label="入店" name="{{ $new_girl->name }}"
                                    name-vertical="{{ $new_girl->name }}" age="{{ $new_girl->age }}"
                                    measurements="{{ 'T.' . $new_girl->height . ' B.' . $new_girl->bust . ' W.' . $new_girl->waist . ' H.' . $new_girl->hip }}"
                                    description="{{ $new_girl->appeal_point }}"
                                    gradient-id="calendar-gradient-{{ $loop->index }}" :gradient=false
                                    datetextColor="#48593F" newGirlCardBgLeftColor="rgba(255,255,255,0.7)"
                                    name-color="#132126" measurements-color="#132126" :cardGradient=false
                                    carddividerColor="#48593F" :carddividerverticalGradient=false
                                    carddividerverticalColor="#48593F"
                                    iconSvg='<svg xmlns="http://www.w3.org/2000/svg" width="27" height="25" viewBox="0 0 27 25" fill="none">
<path d="M22.0836 20.2H17.6669V16.16H22.0836V20.2ZM15.4585 10.1H11.0418V14.14H15.4585V10.1ZM22.0836 10.1H17.6669V14.14H22.0836V10.1ZM8.83343 16.16H4.41671V20.2H8.83343V16.16ZM15.4585 16.16H11.0418V20.2H15.4585V16.16ZM8.83343 10.1H4.41671V14.14H8.83343V10.1ZM26.5003 2.02V24.24H0V2.02H3.31253V3.03C3.31253 4.141 4.3063 5.05 5.52089 5.05C6.73549 5.05 7.72925 4.141 7.72925 3.03V2.02H18.771V3.03C18.771 4.141 19.7648 5.05 20.9794 5.05C22.194 5.05 23.1877 4.141 23.1877 3.03V2.02H26.5003ZM24.2919 8.08H2.20836V22.22H24.2919V8.08ZM22.0836 1.01C22.0836 0.404 21.6419 0 20.9794 0C20.3169 0 19.8752 0.404 19.8752 1.01V3.03C19.8752 3.636 20.3169 4.04 20.9794 4.04C21.6419 4.04 22.0836 3.636 22.0836 3.03V1.01ZM6.62507 3.03C6.62507 3.636 6.1834 4.04 5.52089 4.04C4.85838 4.04 4.41671 3.636 4.41671 3.03V1.01C4.41671 0.404 4.85838 0 5.52089 0C6.1834 0 6.62507 0.404 6.62507 1.01V3.03Z" fill="#48593F"/>
</svg>' />
                            @endforeach
                        </div>
                    </div>
                    <div class="new-girl-slider-controls">
                        <div class="slider-dots">
                            <button class="dot active" aria-label="Go to page 1"></button>
                            <button class="dot" aria-label="Go to page 2"></button>
                            <button class="dot" aria-label="Go to page 3"></button>
                        </div>
                        <div class="slider-buttons">
                            <button class="new-girl-slider-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="61" height="61"
                                    viewBox="0 0 61 61" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M60.5 30.5C60.5 31.4283 60.1313 32.3185 59.4749 32.9749C58.8185 33.6313 57.9283 34 57 34H11.5L23.75 46.25C24.0948 46.5948 24.3688 47.0038 24.556 47.4542C24.7432 47.9046 24.8401 48.3879 24.8413 48.8762C24.8426 49.3645 24.7482 49.8483 24.5634 50.2996C24.3786 50.7509 24.1069 51.1613 23.7638 51.5081C23.4207 51.855 23.0129 52.1311 22.5631 52.3203C22.1133 52.5095 21.6304 52.6084 21.1421 52.6118C20.6538 52.6151 20.1696 52.5228 19.7171 52.3398C19.2646 52.1568 18.8527 51.8867 18.5042 51.5458L0.979167 34.0208C0.32282 33.3645 -0.0457764 32.4748 -0.0457764 31.5466C-0.0457764 30.6185 0.32282 29.7288 0.979167 29.0725L18.5042 11.5475C19.1708 10.9236 20.0465 10.5793 20.9543 10.5859C21.8621 10.5925 22.7326 10.9496 23.3901 11.5828C24.0476 12.216 24.4417 13.0759 24.4919 13.9828C24.5421 14.8898 24.2444 15.7866 23.6625 16.4875L11.5 28.5H57C57.9283 28.5 58.8185 28.8687 59.4749 29.5251C60.1313 30.1815 60.5 31.0717 60.5 32V30.5Z"
                                        fill="white" />
                                </svg>
                            </button>
                            <button class="new-girl-slider-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="52" height="37"
                                    viewBox="0 0 52 37" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M-4.57764e-05 18.038C-4.57764e-05 18.7964 0.301212 19.5237 0.837448 20.0599C1.37368 20.5962 2.10098 20.8974 2.85933 20.8974H41.7087L31.3387 31.2674C31.0578 31.5292 30.8324 31.8449 30.6762 32.1956C30.5199 32.5464 30.4358 32.925 30.4291 33.3089C30.4223 33.6929 30.4929 34.0742 30.6367 34.4303C30.7805 34.7863 30.9946 35.1097 31.2661 35.3813C31.5376 35.6528 31.8611 35.8668 32.2171 36.0106C32.5732 36.1545 32.9545 36.2251 33.3384 36.2183C33.7224 36.2115 34.101 36.1275 34.4518 35.9712C34.8025 35.8149 35.1182 35.5896 35.38 35.3087L50.63 20.0587C51.1654 19.5225 51.4662 18.7958 51.4662 18.038C51.4662 17.2803 51.1654 16.5536 50.63 16.0174L35.38 0.767425C34.8379 0.262345 34.121 -0.0126246 33.3802 0.000445479C32.6394 0.0135156 31.9327 0.313605 31.4088 0.837492C30.8849 1.36138 30.5848 2.06816 30.5717 2.80893C30.5587 3.54971 30.8336 4.26663 31.3387 4.80868L41.7087 15.1787H2.85933C2.10098 15.1787 1.37368 15.4799 0.837448 16.0162C0.301212 16.5524 -4.57764e-05 17.2797 -4.57764e-05 18.038Z"
                                        fill="white" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="new-girl-slider-mobile-controls">
                        <button class="new-girl-slider-mobile-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12"
                                viewBox="0 0 16 12" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.755 5.52184C15.755 5.75399 15.6628 5.97663 15.4986 6.14078C15.3344 6.30494 15.1118 6.39716 14.8797 6.39716H2.98699L6.16148 9.57164C6.24747 9.65178 6.31645 9.74841 6.36429 9.85578C6.41214 9.96316 6.43786 10.0791 6.43993 10.1966C6.44201 10.3141 6.42039 10.4309 6.37636 10.5399C6.33234 10.6488 6.26681 10.7479 6.18369 10.831C6.10058 10.9141 6.00157 10.9796 5.89257 11.0236C5.78358 11.0677 5.66684 11.0893 5.54931 11.0872C5.43178 11.0851 5.31587 11.0594 5.2085 11.0116C5.10113 10.9637 5.00449 10.8948 4.92436 10.8088L0.25599 6.1404C0.0920714 5.97628 0 5.7538 0 5.52184C0 5.28988 0.0920714 5.06741 0.25599 4.90328L4.92436 0.234926C5.09029 0.0803095 5.30976 -0.00386466 5.53652 0.000136371C5.76329 0.00413741 5.97965 0.0960014 6.14003 0.256375C6.3004 0.416748 6.39226 0.633109 6.39627 0.859876C6.40027 1.08664 6.31609 1.30611 6.16148 1.47204L2.98699 4.64652H14.8797C15.1118 4.64652 15.3344 4.73874 15.4986 4.9029C15.6628 5.06705 15.755 5.28969 15.755 5.52184Z"
                                    fill="white" />
                            </svg>
                        </button>
                        <button class="new-girl-slider-mobile-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12"
                                viewBox="0 0 16 12" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M1.90735e-06 5.52183C1.90735e-06 5.75398 0.0922232 5.97662 0.256377 6.14077C0.420531 6.30493 0.643171 6.39715 0.87532 6.39715H12.768L9.5935 9.57163C9.5075 9.65176 9.43852 9.7484 9.39068 9.85577C9.34284 9.96314 9.31711 10.079 9.31504 10.1966C9.31297 10.3141 9.33459 10.4309 9.37861 10.5398C9.42263 10.6488 9.48816 10.7478 9.57128 10.831C9.6544 10.9141 9.75341 10.9796 9.8624 11.0236C9.97139 11.0677 10.0881 11.0893 10.2057 11.0872C10.3232 11.0851 10.4391 11.0594 10.5465 11.0116C10.6538 10.9637 10.7505 10.8947 10.8306 10.8087L15.499 6.14039C15.6629 5.97627 15.755 5.75379 15.755 5.52183C15.755 5.28987 15.6629 5.0674 15.499 4.90328L10.8306 0.234925C10.6647 0.0803094 10.4452 -0.00386466 10.2185 0.000136371C9.99168 0.0041374 9.77532 0.0960012 9.61495 0.256374C9.45457 0.416747 9.36271 0.633108 9.35871 0.859874C9.35471 1.08664 9.43888 1.30611 9.5935 1.47204L12.768 4.64652H0.87532C0.643171 4.64652 0.420531 4.73874 0.256377 4.90289C0.0922232 5.06705 1.90735e-06 5.28969 1.90735e-06 5.52183Z"
                                    fill="white" />
                            </svg>
                        </button>
                    </div>
                </div>
                @php
                    $newGirlButtonHref = route('public.shops.shop.newcast', ['shop' => 'siroganeze']); // Add href if needed
                    $newGirlButtonOnClick = null; // Add onClick if needed
                @endphp
                <div class="home-new-girl-button-mobile">
                    @if ($newGirlButtonHref)
                        <a href="{{ $newGirlButtonHref }}" class="schedule-info-button schedule-info-button-mobile"
                            style="background: #FFFFFF; border-left-color: #2A1A08;">
                            <p style="color: #48593F;">一覧を見る</p>
                            <div class="schedule-info-underline" style="background: #48593F;"></div>
                        </a>
                    @else
                        <div class="schedule-info-button schedule-info-button-mobile"
                            style="background: #FFFFFF; border-left-color: #2A1A08;"
                            @if ($newGirlButtonOnClick) onclick="{{ $newGirlButtonOnClick }}" @endif>
                            <p style="color: #48593F;">一覧を見る</p>
                            <div class="schedule-info-underline" style="background: #48593F;"></div>
                        </div>
                    @endif
                </div>
            @endif
            @if (count($castlist) > 0)
                <div class="home-castlist">
                    <x-public.shops.section-title text="cast list" background-color="#fff" opacity="1.0"
                        :gradient=false color="#48593F" letter-spacing="0.375rem" />
                    <div class="home-castlist-info">
                        <div class="castlist-info-header">
                            <img src="{{ asset('assets/img/shops/siroganeze/girl-icon.png') }}" alt="出勤情報"
                                class="castlist-info-icon">
                            <p class="castlist-info-title">キャスト一覧</p>
                        </div>
                        <div class="castlist-info-description">
                            <p>シロガネーゼのキャスト一覧になります。</p>
                        </div>
                        <a class="castlist-info-button"
                            href="{{ route('public.shops.shop.castlist', ['shop' => 'siroganeze']) }}">
                            <p>一覧を見る</p>
                            <div class="castlist-info-underline"></div>
                        </a>
                    </div>
                    <div class="castlist-slider-wrapper">
                        <button class="castlist-slider-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="19"
                                viewBox="0 0 26 19" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.53674e-06 9.01713C9.53674e-06 9.39623 0.150606 9.7598 0.418667 10.0279C0.686729 10.2959 1.0503 10.4465 1.4294 10.4465H20.85L15.6661 15.6304C15.5257 15.7613 15.413 15.9191 15.3349 16.0944C15.2568 16.2698 15.2148 16.459 15.2114 16.651C15.208 16.8429 15.2433 17.0335 15.3152 17.2115C15.3871 17.3895 15.4941 17.5512 15.6298 17.6869C15.7655 17.8226 15.9272 17.9296 16.1052 18.0015C16.2832 18.0734 16.4738 18.1087 16.6658 18.1053C16.8577 18.102 17.047 18.06 17.2223 17.9818C17.3976 17.9037 17.5554 17.7911 17.6863 17.6506L25.3097 10.0272C25.5774 9.75922 25.7277 9.39592 25.7277 9.01713C25.7277 8.63834 25.5774 8.27504 25.3097 8.00703L17.6863 0.383632C17.4153 0.131145 17.0569 -0.00631097 16.6866 0.000222693C16.3163 0.00675636 15.963 0.15677 15.7011 0.418658C15.4392 0.680547 15.2892 1.03386 15.2827 1.40417C15.2762 1.77448 15.4136 2.13287 15.6661 2.40383L20.85 7.58774H1.4294C1.0503 7.58774 0.686729 7.73834 0.418667 8.0064C0.150606 8.27446 9.53674e-06 8.63803 9.53674e-06 9.01713Z"
                                    fill="white" />
                            </svg>
                        </button>
                        <div class="home-castlist-cards">
                            {{-- @for ($i = 0; $i < 12; $i++)
                                <x-public.shops.schedule-card background-image="assets/img/shops/shizuku/castlist.png"
                                    frame-image="assets/img/shops/shizuku/card-frame.png" badge-shift="本日出勤"
                                    badge-time="12:00〜24:00" status-icon="" status-text="" name="かれん (20)"
                                    measurements="T.160 B.85(C) W.60 H.83" message="キャストメッセージが出ます"
                                    badge-border-color="#B90000" badge-bg-color="#B90000" badge-text-color="#FFDA89"
                                    badge-time-color="#2A1A08" status-text-color="#FFE500" name-color="#FFFFFF"
                                    measurements-color="#FFFFFF" message-gradient-start="#FFF2D7"
                                    message-gradient-end="#BD902F" content-gradient-start="rgba(42, 26, 8, 0.80)"
                                    content-gradient-end="rgba(0, 0, 0, 0.00)" variant="castlist_top" />
                            @endfor --}}
                            @foreach ($castlist as $cast)
                                <x-public.shops.schedule-card
                                    href_cast_profile="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $cast->id]) }}"
                                    background-image="{{ asset('storage/' . $cast->gallery_1) }}"
                                    frame-image="assets/img/shops/siroganeze/card-frame.png" badge-shift="本日出勤"
                                    badge-time="{{ $cast->start_datetime ? date('H:i', strtotime($cast->start_datetime)) . '~' . date('H:i', strtotime($cast->end_datetime)) : '' }}"
                                    status-icon="" status-text="" name="{{ $cast->name . '　（' . $cast->age . ')' }}"
                                    measurements=" {{ 'T.' . $cast->height . ' B.' . $cast->bust . ' W.' . $cast->waist . ' H.' . $cast->hip }}"
                                    message="{{ $cast->appeal_point }}"
                                    contentGradientStart="rgba(255, 255, 255, 0.80)"
                                    contentGradientStartPercent="58.65%"
                                    contentGradientEnd="rgba(255, 255, 255, 0.00)" contentGradientEndPercent="100%"
                                    badgeBorderColor="#171923" badgeBgColor="#171923" badgeTextColor="#FFF"
                                    badgeTimeColor="#000" :messageGradient=false measurementsColor="#132126"
                                    nameColor="#132126" messageColor="#132126" variant="castlist_top" />
                            @endforeach
                        </div>
                        <button class="castlist-slider-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="19"
                                viewBox="0 0 26 19" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M9.53674e-06 9.01713C9.53674e-06 9.39623 0.150606 9.7598 0.418667 10.0279C0.686729 10.2959 1.0503 10.4465 1.4294 10.4465H20.85L15.6661 15.6304C15.5257 15.7613 15.413 15.9191 15.3349 16.0944C15.2568 16.2698 15.2148 16.459 15.2114 16.651C15.208 16.8429 15.2433 17.0335 15.3152 17.2115C15.3871 17.3895 15.4941 17.5512 15.6298 17.6869C15.7655 17.8226 15.9272 17.9296 16.1052 18.0015C16.2832 18.0734 16.4738 18.1087 16.6658 18.1053C16.8577 18.102 17.047 18.06 17.2223 17.9818C17.3976 17.9037 17.5554 17.7911 17.6863 17.6506L25.3097 10.0272C25.5774 9.75922 25.7277 9.39592 25.7277 9.01713C25.7277 8.63834 25.5774 8.27504 25.3097 8.00703L17.6863 0.383632C17.4153 0.131145 17.0569 -0.00631097 16.6866 0.000222693C16.3163 0.00675636 15.963 0.15677 15.7011 0.418658C15.4392 0.680547 15.2892 1.03386 15.2827 1.40417C15.2762 1.77448 15.4136 2.13287 15.6661 2.40383L20.85 7.58774H1.4294C1.0503 7.58774 0.686729 7.73834 0.418667 8.0064C0.150606 8.27446 9.53674e-06 8.63803 9.53674e-06 9.01713Z"
                                    fill="white" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            @if (count($rankings) > 0)
                <div class="home-ranking">
                    <div class="ranking-cast-card">
                        <div class="ranking-cast-image">
                            <img src="{{ asset('storage/' . $rankings[0]->cast_gallery_1) }}" alt="Cast 1"
                                class="cast-image">
                            <img src="{{ asset('assets/img/shops/siroganeze/card-frame-3.png') }}" alt="Frame"
                                class="cast-frame">
                            <div class="ranking-badge ranking-no1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="240" height="154"
                                    viewBox="0 0 240 154" fill="none">
                                    <path d="M0 0H240V154H0V0Z" fill="url(#paint0_linear_no1)" fill-opacity="0.7" />
                                    <path
                                        d="M127.408 45.6182C126.506 45.1777 125.813 44.5654 125.33 43.7812C124.846 42.9863 124.604 42.1108 124.604 41.1548C124.604 39.6938 125.152 38.437 126.248 37.3843C127.354 36.3315 128.767 35.8052 130.486 35.8052C131.893 35.8052 133.112 36.1489 134.144 36.8364H137.27C137.731 36.8364 138 36.8525 138.075 36.8848C138.15 36.9062 138.204 36.9492 138.236 37.0137C138.301 37.1104 138.333 37.2822 138.333 37.5293C138.333 37.8086 138.306 38.002 138.252 38.1094C138.22 38.1631 138.161 38.2061 138.075 38.2383C138 38.2705 137.731 38.2866 137.27 38.2866H135.352C135.954 39.0601 136.254 40.0483 136.254 41.2515C136.254 42.6265 135.728 43.8027 134.675 44.7803C133.623 45.7578 132.21 46.2466 130.438 46.2466C129.707 46.2466 128.96 46.1392 128.198 45.9243C127.725 46.3325 127.403 46.6924 127.231 47.0039C127.07 47.3047 126.989 47.5625 126.989 47.7773C126.989 47.96 127.075 48.1372 127.247 48.3091C127.43 48.481 127.779 48.6045 128.294 48.6797C128.595 48.7227 129.347 48.7603 130.55 48.7925C132.763 48.8462 134.197 48.9214 134.853 49.0181C135.852 49.1577 136.646 49.5283 137.237 50.1299C137.839 50.7314 138.14 51.4727 138.14 52.3535C138.14 53.5674 137.57 54.7061 136.432 55.7695C134.756 57.3379 132.57 58.1221 129.874 58.1221C127.8 58.1221 126.049 57.6548 124.621 56.7202C123.815 56.1831 123.412 55.6245 123.412 55.0444C123.412 54.7866 123.471 54.5288 123.589 54.271C123.772 53.8735 124.148 53.3203 124.717 52.6113C124.792 52.5146 125.34 51.9346 126.361 50.8711C125.802 50.5381 125.405 50.2427 125.168 49.9849C124.943 49.7163 124.83 49.4155 124.83 49.0825C124.83 48.7065 124.98 48.2661 125.281 47.7612C125.593 47.2563 126.302 46.542 127.408 45.6182ZM130.212 36.5786C129.417 36.5786 128.751 36.8955 128.214 37.5293C127.677 38.1631 127.408 39.1353 127.408 40.4458C127.408 42.1431 127.773 43.459 128.504 44.3936C129.062 45.1025 129.771 45.457 130.631 45.457C131.447 45.457 132.119 45.1509 132.645 44.5386C133.171 43.9263 133.435 42.9648 133.435 41.6543C133.435 39.9463 133.064 38.6089 132.323 37.6421C131.775 36.9331 131.071 36.5786 130.212 36.5786ZM127.247 51C126.742 51.5479 126.361 52.0581 126.103 52.5308C125.845 53.0034 125.716 53.4385 125.716 53.8359C125.716 54.3516 126.028 54.8027 126.651 55.1895C127.725 55.8555 129.277 56.1885 131.308 56.1885C133.241 56.1885 134.665 55.8447 135.578 55.1572C136.501 54.4805 136.963 53.7554 136.963 52.9819C136.963 52.4233 136.689 52.0259 136.142 51.7896C135.583 51.5532 134.477 51.4136 132.822 51.3706C130.405 51.3062 128.547 51.1826 127.247 51Z"
                                        fill="white" />
                                    <path
                                        d="M111.263 38.9312C112.992 36.8472 114.641 35.8052 116.209 35.8052C117.015 35.8052 117.708 36.0093 118.288 36.4175C118.868 36.8149 119.33 37.4756 119.674 38.3994C119.91 39.0439 120.028 40.0322 120.028 41.3643V47.6646C120.028 48.5991 120.104 49.2329 120.254 49.5659C120.372 49.8345 120.56 50.0439 120.818 50.1943C121.086 50.3447 121.575 50.4199 122.284 50.4199V51H114.985V50.4199H115.291C115.979 50.4199 116.457 50.3179 116.725 50.1138C117.004 49.8989 117.198 49.5874 117.305 49.1792C117.348 49.0181 117.37 48.5132 117.37 47.6646V41.6221C117.37 40.2793 117.192 39.3071 116.838 38.7056C116.494 38.0933 115.909 37.7871 115.082 37.7871C113.803 37.7871 112.53 38.4854 111.263 39.8818V47.6646C111.263 48.6636 111.322 49.2812 111.44 49.5176C111.59 49.8291 111.794 50.0601 112.052 50.2104C112.321 50.3501 112.858 50.4199 113.664 50.4199V51H106.364V50.4199H106.687C107.438 50.4199 107.943 50.2319 108.201 49.856C108.47 49.4692 108.604 48.7388 108.604 47.6646V42.186C108.604 40.4136 108.561 39.334 108.475 38.9473C108.4 38.5605 108.276 38.2974 108.104 38.1577C107.943 38.0181 107.723 37.9482 107.444 37.9482C107.143 37.9482 106.783 38.0288 106.364 38.1899L106.123 37.6099L110.57 35.8052H111.263V38.9312Z"
                                        fill="white" />
                                    <path
                                        d="M101.53 28.0869C101.981 28.0869 102.363 28.248 102.674 28.5703C102.997 28.8818 103.158 29.2632 103.158 29.7144C103.158 30.1655 102.997 30.5522 102.674 30.8745C102.363 31.1968 101.981 31.3579 101.53 31.3579C101.079 31.3579 100.692 31.1968 100.37 30.8745C100.048 30.5522 99.8867 30.1655 99.8867 29.7144C99.8867 29.2632 100.042 28.8818 100.354 28.5703C100.676 28.248 101.068 28.0869 101.53 28.0869ZM102.868 35.8052V47.6646C102.868 48.5884 102.932 49.2061 103.061 49.5176C103.201 49.8184 103.399 50.0439 103.657 50.1943C103.926 50.3447 104.409 50.4199 105.107 50.4199V51H97.937V50.4199C98.6567 50.4199 99.1401 50.3501 99.3872 50.2104C99.6343 50.0708 99.8276 49.8398 99.9673 49.5176C100.118 49.1953 100.193 48.5776 100.193 47.6646V41.9766C100.193 40.376 100.145 39.3394 100.048 38.8667C99.9727 38.5229 99.8545 38.2866 99.6934 38.1577C99.5322 38.0181 99.312 37.9482 99.0327 37.9482C98.7319 37.9482 98.3667 38.0288 97.937 38.1899L97.7114 37.6099L102.159 35.8052H102.868Z"
                                        fill="white" />
                                    <path
                                        d="M85.6426 28.0869V42.7822L89.397 39.3501C90.1919 38.6196 90.6538 38.1577 90.7827 37.9644C90.8687 37.8354 90.9116 37.7065 90.9116 37.5776C90.9116 37.3628 90.8203 37.1802 90.6377 37.0298C90.4658 36.8687 90.1758 36.7773 89.7676 36.7559V36.2402H96.1807V36.7559C95.2998 36.7773 94.564 36.9116 93.9731 37.1587C93.3931 37.4058 92.7539 37.8462 92.0557 38.48L88.269 41.9766L92.0557 46.7622C93.1084 48.0835 93.8174 48.9214 94.1826 49.2759C94.6982 49.7808 95.1494 50.1084 95.5361 50.2588C95.8047 50.3662 96.272 50.4199 96.938 50.4199V51H89.7676V50.4199C90.1758 50.4092 90.4497 50.3501 90.5894 50.2427C90.7397 50.1245 90.8149 49.9634 90.8149 49.7593C90.8149 49.5122 90.6001 49.1147 90.1704 48.5669L85.6426 42.7822V47.6807C85.6426 48.6367 85.707 49.2651 85.8359 49.5659C85.9756 49.8667 86.1689 50.0815 86.416 50.2104C86.6631 50.3394 87.2002 50.4092 88.0273 50.4199V51H80.5186V50.4199C81.2705 50.4199 81.8345 50.3286 82.2104 50.146C82.436 50.0278 82.6079 49.8452 82.7261 49.5981C82.8872 49.2437 82.9678 48.6313 82.9678 47.7612V34.3228C82.9678 32.6147 82.9302 31.5728 82.855 31.1968C82.7798 30.8101 82.6562 30.5469 82.4844 30.4072C82.3125 30.2568 82.0869 30.1816 81.8076 30.1816C81.582 30.1816 81.2437 30.2729 80.7925 30.4556L80.5186 29.8916L84.9014 28.0869H85.6426Z"
                                        fill="white" />
                                    <path
                                        d="M69.0781 38.9312C70.8076 36.8472 72.4565 35.8052 74.0249 35.8052C74.8306 35.8052 75.5234 36.0093 76.1035 36.4175C76.6836 36.8149 77.1455 37.4756 77.4893 38.3994C77.7256 39.0439 77.8438 40.0322 77.8438 41.3643V47.6646C77.8438 48.5991 77.9189 49.2329 78.0693 49.5659C78.1875 49.8345 78.3755 50.0439 78.6333 50.1943C78.9019 50.3447 79.3906 50.4199 80.0996 50.4199V51H72.8003V50.4199H73.1064C73.7939 50.4199 74.272 50.3179 74.5405 50.1138C74.8198 49.8989 75.0132 49.5874 75.1206 49.1792C75.1636 49.0181 75.1851 48.5132 75.1851 47.6646V41.6221C75.1851 40.2793 75.0078 39.3071 74.6533 38.7056C74.3096 38.0933 73.7241 37.7871 72.897 37.7871C71.6187 37.7871 70.3457 38.4854 69.0781 39.8818V47.6646C69.0781 48.6636 69.1372 49.2812 69.2554 49.5176C69.4058 49.8291 69.6099 50.0601 69.8677 50.2104C70.1362 50.3501 70.6733 50.4199 71.479 50.4199V51H64.1797V50.4199H64.502C65.2539 50.4199 65.7588 50.2319 66.0166 49.856C66.2852 49.4692 66.4194 48.7388 66.4194 47.6646V42.186C66.4194 40.4136 66.3765 39.334 66.2905 38.9473C66.2153 38.5605 66.0918 38.2974 65.9199 38.1577C65.7588 38.0181 65.5386 37.9482 65.2593 37.9482C64.9585 37.9482 64.5986 38.0288 64.1797 38.1899L63.938 37.6099L68.3853 35.8052H69.0781V38.9312Z"
                                        fill="white" />
                                    <path
                                        d="M58.4756 48.873C56.9609 50.0439 56.0103 50.7207 55.6235 50.9033C55.0435 51.1719 54.4258 51.3062 53.7705 51.3062C52.75 51.3062 51.9067 50.957 51.2407 50.2588C50.5854 49.5605 50.2578 48.6421 50.2578 47.5034C50.2578 46.7837 50.4189 46.1606 50.7412 45.6343C51.1816 44.9038 51.9443 44.2163 53.0293 43.5718C54.125 42.9272 55.9404 42.1431 58.4756 41.2192V40.6392C58.4756 39.1675 58.2393 38.1577 57.7666 37.6099C57.3047 37.062 56.6279 36.7881 55.7363 36.7881C55.0596 36.7881 54.5225 36.9707 54.125 37.3359C53.7168 37.7012 53.5127 38.1201 53.5127 38.5928L53.5449 39.5273C53.5449 40.0215 53.416 40.4028 53.1582 40.6714C52.9111 40.9399 52.5835 41.0742 52.1753 41.0742C51.7778 41.0742 51.4502 40.9346 51.1924 40.6553C50.9453 40.376 50.8218 39.9946 50.8218 39.5112C50.8218 38.5874 51.2944 37.7388 52.2397 36.9653C53.1851 36.1919 54.5117 35.8052 56.2197 35.8052C57.5303 35.8052 58.6045 36.0254 59.4424 36.4658C60.0762 36.7988 60.5435 37.3198 60.8442 38.0288C61.0376 38.4907 61.1343 39.436 61.1343 40.8647V45.876C61.1343 47.2832 61.1611 48.1479 61.2148 48.4702C61.2686 48.7817 61.3545 48.9912 61.4727 49.0986C61.6016 49.2061 61.7466 49.2598 61.9077 49.2598C62.0796 49.2598 62.23 49.2222 62.3589 49.147C62.5845 49.0073 63.0195 48.6152 63.6641 47.9707V48.873C62.4609 50.4844 61.3115 51.29 60.2158 51.29C59.6895 51.29 59.2705 51.1074 58.959 50.7422C58.6475 50.377 58.4863 49.7539 58.4756 48.873ZM58.4756 47.8257V42.2021C56.8535 42.8467 55.8062 43.3032 55.3335 43.5718C54.4849 44.0444 53.8779 44.5386 53.5127 45.0542C53.1475 45.5698 52.9648 46.1338 52.9648 46.7461C52.9648 47.5195 53.1958 48.1641 53.6577 48.6797C54.1196 49.1846 54.6514 49.437 55.2529 49.437C56.0693 49.437 57.1436 48.8999 58.4756 47.8257Z"
                                        fill="white" />
                                    <path
                                        d="M49.3716 51H43.5386L36.1426 40.7842C35.5947 40.8057 35.1489 40.8164 34.8052 40.8164C34.6655 40.8164 34.5151 40.8164 34.354 40.8164C34.1929 40.8057 34.0264 40.7949 33.8545 40.7842V47.1328C33.8545 48.5078 34.0049 49.3618 34.3057 49.6948C34.7139 50.1675 35.3262 50.4038 36.1426 50.4038H36.9966V51H27.6348V50.4038H28.4565C29.3804 50.4038 30.041 50.103 30.4385 49.5015C30.6641 49.1685 30.7769 48.3789 30.7769 47.1328V33.0176C30.7769 31.6426 30.6265 30.7886 30.3257 30.4556C29.9067 29.9829 29.2837 29.7466 28.4565 29.7466H27.6348V29.1504H35.5947C37.915 29.1504 39.623 29.3223 40.7188 29.666C41.8252 29.999 42.7598 30.6221 43.5225 31.5352C44.2959 32.4375 44.6826 33.5171 44.6826 34.7739C44.6826 36.1167 44.2422 37.2822 43.3613 38.2705C42.4912 39.2588 41.1377 39.957 39.3008 40.3652L43.8125 46.6333C44.8438 48.0728 45.73 49.0288 46.4712 49.5015C47.2124 49.9741 48.1792 50.2749 49.3716 50.4038V51ZM33.8545 39.769C34.0586 39.769 34.2358 39.7744 34.3862 39.7852C34.5366 39.7852 34.6602 39.7852 34.7568 39.7852C36.8408 39.7852 38.4092 39.334 39.4619 38.4316C40.5254 37.5293 41.0571 36.3799 41.0571 34.9834C41.0571 33.6191 40.6274 32.5127 39.7681 31.6641C38.9194 30.8047 37.7915 30.375 36.3843 30.375C35.7612 30.375 34.918 30.4771 33.8545 30.6812V39.769Z"
                                        fill="white" />
                                    <path
                                        d="M141.074 120.854C142.39 120.854 143.496 121.315 144.392 122.239C145.287 123.135 145.735 124.227 145.735 125.515C145.735 126.802 145.273 127.908 144.35 128.832C143.454 129.728 142.362 130.176 141.074 130.176C139.786 130.176 138.681 129.728 137.757 128.832C136.861 127.908 136.413 126.802 136.413 125.515C136.413 124.199 136.861 123.093 137.757 122.197C138.681 121.301 139.786 120.854 141.074 120.854Z"
                                        fill="white" />
                                    <path
                                        d="M108.824 89.4014C114.647 89.4014 119.322 91.613 122.85 96.0361C125.845 99.8154 127.343 104.155 127.343 109.054C127.343 112.497 126.517 115.982 124.865 119.51C123.214 123.037 120.932 125.697 118.021 127.488C115.137 129.28 111.918 130.176 108.362 130.176C102.567 130.176 97.9622 127.866 94.5469 123.247C91.6634 119.356 90.2217 114.989 90.2217 110.146C90.2217 106.618 91.0895 103.119 92.8252 99.6475C94.5889 96.1481 96.8984 93.5726 99.7539 91.9209C102.609 90.2412 105.633 89.4014 108.824 89.4014ZM107.522 92.1309C106.039 92.1309 104.541 92.5788 103.029 93.4746C101.546 94.3424 100.342 95.8822 99.418 98.0938C98.4941 100.305 98.0322 103.147 98.0322 106.618C98.0322 112.217 99.138 117.046 101.35 121.105C103.589 125.165 106.529 127.194 110.168 127.194C112.883 127.194 115.123 126.075 116.887 123.835C118.65 121.595 119.532 117.746 119.532 112.287C119.532 105.456 118.062 100.081 115.123 96.1621C113.135 93.4746 110.602 92.1309 107.522 92.1309Z"
                                        fill="white" />
                                    <path
                                        d="M24.042 72.0586H39.4951L74.3066 114.765V81.9268C74.3066 78.4274 73.9147 76.2438 73.1309 75.376C72.0951 74.2002 70.4574 73.6123 68.2178 73.6123H66.2441V72.0586H86.0645V73.6123H84.0488C81.6413 73.6123 79.9336 74.3402 78.9258 75.7959C78.3099 76.6917 78.002 78.7354 78.002 81.9268V129.924H76.4902L38.9492 84.0684V119.132C38.9492 122.631 39.3271 124.815 40.083 125.683C41.1468 126.858 42.7845 127.446 44.9961 127.446H47.0117V129H27.1914V127.446H29.165C31.6006 127.446 33.3223 126.718 34.3301 125.263C34.946 124.367 35.2539 122.323 35.2539 119.132V79.5332C33.6022 77.6016 32.3424 76.3278 31.4746 75.7119C30.6348 75.096 29.389 74.5221 27.7373 73.9902C26.9255 73.7383 25.6937 73.6123 24.042 73.6123V72.0586Z"
                                        fill="white" />
                                    <path
                                        d="M167.711 40.022L191.72 28.3086H194.121V111.612C194.121 117.141 194.339 120.585 194.775 121.943C195.26 123.301 196.23 124.344 197.686 125.071C199.141 125.799 202.099 126.211 206.562 126.308V129H169.457V126.308C174.113 126.211 177.12 125.823 178.479 125.144C179.837 124.417 180.782 123.471 181.316 122.307C181.849 121.094 182.116 117.529 182.116 111.612V58.356C182.116 51.1776 181.874 46.5698 181.389 44.5327C181.049 42.9806 180.419 41.8408 179.497 41.1133C178.624 40.3857 177.557 40.022 176.296 40.022C174.501 40.022 172.003 40.7738 168.802 42.2773L167.711 40.022Z"
                                        fill="white" />
                                    <defs>
                                        <linearGradient id="paint0_linear_no1" x1="12.5" y1="154"
                                            x2="240" y2="-1.12639e-05" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.524038" stop-color="#AA7E2B" />
                                            <stop offset="1" stop-color="#D3CCA8" stop-opacity="0" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="ranking-cast-card">
                        <div class="ranking-cast-image">
                            <img src="{{ asset('storage/' . $rankings[1]->cast_gallery_1) }}" alt="Cast 2"
                                class="cast-image">
                            <img src="{{ asset('assets/img/shops/siroganeze/card-frame-3.png') }}" alt="Frame"
                                class="cast-frame">
                            <div class="ranking-badge ranking-no2">
                                <svg width="220" height="137" viewBox="0 0 220 137" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0H220V137H0V0Z" fill="url(#paint0_linear_8_59)" fill-opacity="0.7" />
                                    <path
                                        d="M102.951 39.249C102.322 38.9421 101.839 38.5153 101.502 37.9688C101.166 37.4147 100.997 36.8045 100.997 36.1382C100.997 35.12 101.379 34.244 102.143 33.5103C102.914 32.7765 103.898 32.4097 105.096 32.4097C106.077 32.4097 106.927 32.6493 107.646 33.1284H109.824C110.146 33.1284 110.333 33.1396 110.386 33.1621C110.438 33.1771 110.476 33.207 110.498 33.252C110.543 33.3193 110.565 33.4391 110.565 33.6113C110.565 33.806 110.547 33.9408 110.509 34.0156C110.487 34.0531 110.446 34.083 110.386 34.1055C110.333 34.1279 110.146 34.1392 109.824 34.1392H108.488C108.907 34.6782 109.117 35.367 109.117 36.2056C109.117 37.1639 108.75 37.9837 108.016 38.665C107.282 39.3464 106.298 39.687 105.062 39.687C104.553 39.687 104.033 39.6121 103.501 39.4624C103.172 39.7469 102.947 39.9977 102.828 40.2148C102.715 40.4245 102.659 40.6042 102.659 40.7539C102.659 40.8812 102.719 41.0047 102.839 41.1245C102.966 41.2443 103.209 41.3304 103.569 41.3828C103.778 41.4128 104.303 41.439 105.141 41.4614C106.683 41.4989 107.683 41.5513 108.14 41.6187C108.836 41.716 109.39 41.9743 109.802 42.3936C110.221 42.8128 110.431 43.3294 110.431 43.9434C110.431 44.7894 110.034 45.583 109.24 46.3242C108.072 47.4173 106.549 47.9639 104.669 47.9639C103.224 47.9639 102.004 47.6382 101.008 46.9868C100.447 46.6125 100.166 46.2231 100.166 45.8188C100.166 45.6392 100.207 45.4595 100.29 45.2798C100.417 45.0028 100.679 44.6172 101.076 44.123C101.128 44.0557 101.51 43.6514 102.221 42.9102C101.832 42.6781 101.555 42.4722 101.39 42.2925C101.233 42.1053 101.154 41.8957 101.154 41.6636C101.154 41.4015 101.259 41.0946 101.469 40.7427C101.686 40.3908 102.18 39.8929 102.951 39.249ZM104.905 32.9487C104.351 32.9487 103.887 33.1696 103.513 33.6113C103.138 34.0531 102.951 34.7306 102.951 35.644C102.951 36.827 103.206 37.7441 103.715 38.3955C104.104 38.8896 104.598 39.1367 105.197 39.1367C105.766 39.1367 106.234 38.9233 106.601 38.4966C106.968 38.0698 107.151 37.3997 107.151 36.4863C107.151 35.2959 106.893 34.3638 106.376 33.6899C105.995 33.1958 105.504 32.9487 104.905 32.9487ZM102.839 43C102.487 43.3818 102.221 43.7375 102.042 44.0669C101.862 44.3963 101.772 44.6995 101.772 44.9766C101.772 45.3359 101.989 45.6504 102.423 45.9199C103.172 46.3841 104.254 46.6162 105.669 46.6162C107.017 46.6162 108.009 46.3766 108.645 45.8975C109.289 45.4258 109.611 44.9204 109.611 44.3813C109.611 43.992 109.42 43.715 109.038 43.5503C108.649 43.3856 107.878 43.2882 106.725 43.2583C105.04 43.2134 103.745 43.1273 102.839 43Z"
                                        fill="white" />
                                    <path
                                        d="M91.6982 34.5884C92.9036 33.1359 94.0529 32.4097 95.146 32.4097C95.7075 32.4097 96.1904 32.5519 96.5947 32.8364C96.999 33.1134 97.321 33.5739 97.5605 34.2178C97.7253 34.667 97.8076 35.3558 97.8076 36.2842V40.6753C97.8076 41.3267 97.86 41.7684 97.9648 42.0005C98.0472 42.1877 98.1782 42.3337 98.3579 42.4385C98.5451 42.5433 98.8857 42.5957 99.3799 42.5957V43H94.2925V42.5957H94.5059C94.985 42.5957 95.3182 42.5246 95.5054 42.3823C95.7 42.2326 95.8348 42.0155 95.9097 41.731C95.9396 41.6187 95.9546 41.2668 95.9546 40.6753V36.4639C95.9546 35.528 95.8311 34.8504 95.584 34.4312C95.3444 34.0044 94.9364 33.791 94.3599 33.791C93.4689 33.791 92.5817 34.2777 91.6982 35.251V40.6753C91.6982 41.3716 91.7394 41.8021 91.8218 41.9668C91.9266 42.1839 92.0688 42.3449 92.2485 42.4497C92.4357 42.547 92.8101 42.5957 93.3716 42.5957V43H88.2842V42.5957H88.5088C89.0329 42.5957 89.3848 42.4647 89.5645 42.2026C89.7516 41.9331 89.8452 41.424 89.8452 40.6753V36.8569C89.8452 35.6216 89.8153 34.8691 89.7554 34.5996C89.703 34.3301 89.6169 34.1466 89.4971 34.0493C89.3848 33.952 89.2313 33.9033 89.0366 33.9033C88.827 33.9033 88.5762 33.9595 88.2842 34.0718L88.1157 33.6675L91.2153 32.4097H91.6982V34.5884Z"
                                        fill="white" />
                                    <path
                                        d="M84.915 27.0303C85.2295 27.0303 85.4953 27.1426 85.7124 27.3672C85.937 27.5843 86.0493 27.8501 86.0493 28.1646C86.0493 28.479 85.937 28.7485 85.7124 28.9731C85.4953 29.1978 85.2295 29.3101 84.915 29.3101C84.6006 29.3101 84.3311 29.1978 84.1064 28.9731C83.8818 28.7485 83.7695 28.479 83.7695 28.1646C83.7695 27.8501 83.8781 27.5843 84.0952 27.3672C84.3198 27.1426 84.5931 27.0303 84.915 27.0303ZM85.8472 32.4097V40.6753C85.8472 41.3192 85.8921 41.7497 85.9819 41.9668C86.0793 42.1764 86.2178 42.3337 86.3975 42.4385C86.5846 42.5433 86.9215 42.5957 87.4082 42.5957V43H82.4106V42.5957C82.9123 42.5957 83.2492 42.547 83.4214 42.4497C83.5936 42.3524 83.7284 42.1914 83.8257 41.9668C83.9305 41.7422 83.9829 41.3117 83.9829 40.6753V36.7109C83.9829 35.5954 83.9492 34.8729 83.8818 34.5435C83.8294 34.3039 83.7471 34.1392 83.6348 34.0493C83.5225 33.952 83.369 33.9033 83.1743 33.9033C82.9647 33.9033 82.7101 33.9595 82.4106 34.0718L82.2534 33.6675L85.353 32.4097H85.8472Z"
                                        fill="white" />
                                    <path
                                        d="M73.8418 27.0303V37.2725L76.4585 34.8804C77.0125 34.3713 77.3345 34.0493 77.4243 33.9146C77.4842 33.8247 77.5142 33.7349 77.5142 33.645C77.5142 33.4953 77.4505 33.368 77.3232 33.2632C77.2035 33.1509 77.0013 33.0872 76.7168 33.0723V32.7129H81.1865V33.0723C80.5726 33.0872 80.0597 33.1808 79.6479 33.353C79.2437 33.5252 78.7982 33.8322 78.3115 34.2739L75.6724 36.7109L78.3115 40.0464C79.0452 40.9673 79.5394 41.5513 79.7939 41.7983C80.1533 42.1502 80.4678 42.3786 80.7373 42.4834C80.9245 42.5583 81.2502 42.5957 81.7144 42.5957V43H76.7168V42.5957C77.0013 42.5882 77.1922 42.547 77.2896 42.4722C77.3944 42.3898 77.4468 42.2775 77.4468 42.1353C77.4468 41.9631 77.297 41.686 76.9976 41.3042L73.8418 37.2725V40.6865C73.8418 41.3529 73.8867 41.7909 73.9766 42.0005C74.0739 42.2101 74.2087 42.3599 74.3809 42.4497C74.5531 42.5396 74.9274 42.5882 75.5039 42.5957V43H70.2705V42.5957C70.7946 42.5957 71.1877 42.5321 71.4497 42.4048C71.6069 42.3224 71.7267 42.1951 71.8091 42.0229C71.9214 41.7759 71.9775 41.3491 71.9775 40.7427V31.3765C71.9775 30.186 71.9513 29.4598 71.8989 29.1978C71.8465 28.9282 71.7604 28.7448 71.6406 28.6475C71.5208 28.5426 71.3636 28.4902 71.1689 28.4902C71.0117 28.4902 70.7759 28.5539 70.4614 28.6812L70.2705 28.2881L73.3252 27.0303H73.8418Z"
                                        fill="white" />
                                    <path
                                        d="M62.2969 34.5884C63.5023 33.1359 64.6515 32.4097 65.7446 32.4097C66.3062 32.4097 66.7891 32.5519 67.1934 32.8364C67.5977 33.1134 67.9196 33.5739 68.1592 34.2178C68.3239 34.667 68.4062 35.3558 68.4062 36.2842V40.6753C68.4062 41.3267 68.4587 41.7684 68.5635 42.0005C68.6458 42.1877 68.7769 42.3337 68.9565 42.4385C69.1437 42.5433 69.4844 42.5957 69.9785 42.5957V43H64.8911V42.5957H65.1045C65.5837 42.5957 65.9168 42.5246 66.104 42.3823C66.2987 42.2326 66.4334 42.0155 66.5083 41.731C66.5382 41.6187 66.5532 41.2668 66.5532 40.6753V36.4639C66.5532 35.528 66.4297 34.8504 66.1826 34.4312C65.943 34.0044 65.535 33.791 64.9585 33.791C64.0675 33.791 63.1803 34.2777 62.2969 35.251V40.6753C62.2969 41.3716 62.3381 41.8021 62.4204 41.9668C62.5252 42.1839 62.6675 42.3449 62.8472 42.4497C63.0343 42.547 63.4087 42.5957 63.9702 42.5957V43H58.8828V42.5957H59.1074C59.6315 42.5957 59.9834 42.4647 60.1631 42.2026C60.3503 41.9331 60.4438 41.424 60.4438 40.6753V36.8569C60.4438 35.6216 60.4139 34.8691 60.354 34.5996C60.3016 34.3301 60.2155 34.1466 60.0957 34.0493C59.9834 33.952 59.8299 33.9033 59.6353 33.9033C59.4256 33.9033 59.1748 33.9595 58.8828 34.0718L58.7144 33.6675L61.814 32.4097H62.2969V34.5884Z"
                                        fill="white" />
                                    <path
                                        d="M54.9072 41.5176C53.8516 42.3337 53.189 42.8053 52.9194 42.9326C52.5151 43.1198 52.0846 43.2134 51.6279 43.2134C50.9167 43.2134 50.3289 42.9701 49.8647 42.4834C49.408 41.9967 49.1797 41.3566 49.1797 40.563C49.1797 40.0614 49.292 39.6271 49.5166 39.2603C49.8236 38.7511 50.3551 38.272 51.1113 37.8228C51.875 37.3735 53.1403 36.827 54.9072 36.1831V35.7788C54.9072 34.7531 54.7425 34.0493 54.4131 33.6675C54.0911 33.2856 53.6195 33.0947 52.998 33.0947C52.5264 33.0947 52.152 33.222 51.875 33.4766C51.5905 33.7311 51.4482 34.0231 51.4482 34.3525L51.4707 35.0039C51.4707 35.3483 51.3809 35.6141 51.2012 35.8013C51.029 35.9884 50.8006 36.082 50.5161 36.082C50.2391 36.082 50.0107 35.9847 49.8311 35.79C49.6589 35.5954 49.5728 35.3296 49.5728 34.9927C49.5728 34.3488 49.9022 33.7573 50.561 33.2183C51.2199 32.6792 52.1445 32.4097 53.335 32.4097C54.2484 32.4097 54.9971 32.5632 55.5811 32.8701C56.0228 33.1022 56.3485 33.4653 56.5581 33.9595C56.6929 34.2814 56.7603 34.9403 56.7603 35.936V39.4287C56.7603 40.4095 56.779 41.0122 56.8164 41.2368C56.8538 41.4539 56.9137 41.5999 56.9961 41.6748C57.0859 41.7497 57.187 41.7871 57.2993 41.7871C57.4191 41.7871 57.5239 41.7609 57.6138 41.7085C57.771 41.6112 58.0742 41.3379 58.5234 40.8887V41.5176C57.6849 42.6406 56.8838 43.2021 56.1201 43.2021C55.7533 43.2021 55.4613 43.0749 55.2441 42.8203C55.027 42.5658 54.9147 42.1315 54.9072 41.5176ZM54.9072 40.7876V36.8682C53.7767 37.3174 53.0467 37.6356 52.7173 37.8228C52.1258 38.1522 51.7028 38.4966 51.4482 38.856C51.1937 39.2153 51.0664 39.6084 51.0664 40.0352C51.0664 40.5742 51.2274 41.0234 51.5493 41.3828C51.8713 41.7347 52.2419 41.9106 52.6611 41.9106C53.2301 41.9106 53.9788 41.5363 54.9072 40.7876Z"
                                        fill="white" />
                                    <path
                                        d="M48.562 43H44.4966L39.3418 35.8799C38.96 35.8949 38.6493 35.9023 38.4097 35.9023C38.3123 35.9023 38.2075 35.9023 38.0952 35.9023C37.9829 35.8949 37.8669 35.8874 37.7471 35.8799V40.3047C37.7471 41.263 37.8519 41.8582 38.0615 42.0903C38.346 42.4198 38.7728 42.5845 39.3418 42.5845H39.937V43H33.4121V42.5845H33.9849C34.6287 42.5845 35.0892 42.3748 35.3662 41.9556C35.5234 41.7235 35.6021 41.1732 35.6021 40.3047V30.4668C35.6021 29.5085 35.4972 28.9132 35.2876 28.6812C34.9956 28.3517 34.5614 28.187 33.9849 28.187H33.4121V27.7715H38.96C40.5771 27.7715 41.7676 27.8913 42.5312 28.1309C43.3024 28.363 43.9538 28.7972 44.4854 29.4336C45.0244 30.0625 45.2939 30.8149 45.2939 31.6909C45.2939 32.6268 44.987 33.4391 44.373 34.1279C43.7666 34.8167 42.8232 35.3034 41.543 35.5879L44.6875 39.9565C45.4062 40.9598 46.0239 41.6261 46.5405 41.9556C47.0571 42.285 47.731 42.4946 48.562 42.5845V43ZM37.7471 35.1724C37.8893 35.1724 38.0129 35.1761 38.1177 35.1836C38.2225 35.1836 38.3086 35.1836 38.376 35.1836C39.8284 35.1836 40.9216 34.8691 41.6553 34.2402C42.3965 33.6113 42.7671 32.8102 42.7671 31.8369C42.7671 30.8861 42.4676 30.1149 41.8687 29.5234C41.2772 28.9245 40.491 28.625 39.5103 28.625C39.076 28.625 38.4883 28.6961 37.7471 28.8384V35.1724Z"
                                        fill="white" />
                                    <path
                                        d="M121.625 98.9375C122.604 98.9375 123.427 99.2812 124.094 99.9688C124.76 100.635 125.094 101.448 125.094 102.406C125.094 103.365 124.75 104.188 124.062 104.875C123.396 105.542 122.583 105.875 121.625 105.875C120.667 105.875 119.844 105.542 119.156 104.875C118.49 104.188 118.156 103.365 118.156 102.406C118.156 101.427 118.49 100.604 119.156 99.9375C119.844 99.2708 120.667 98.9375 121.625 98.9375Z"
                                        fill="white" />
                                    <path
                                        d="M97.625 75.5312C101.958 75.5312 105.438 77.1771 108.062 80.4688C110.292 83.2812 111.406 86.5104 111.406 90.1562C111.406 92.7188 110.792 95.3125 109.562 97.9375C108.333 100.562 106.635 102.542 104.469 103.875C102.323 105.208 99.9271 105.875 97.2812 105.875C92.9688 105.875 89.5417 104.156 87 100.719C84.8542 97.8229 83.7812 94.5729 83.7812 90.9688C83.7812 88.3438 84.4271 85.7396 85.7188 83.1562C87.0312 80.5521 88.75 78.6354 90.875 77.4062C93 76.1562 95.25 75.5312 97.625 75.5312ZM96.6562 77.5625C95.5521 77.5625 94.4375 77.8958 93.3125 78.5625C92.2083 79.2083 91.3125 80.3542 90.625 82C89.9375 83.6458 89.5938 85.7604 89.5938 88.3438C89.5938 92.5104 90.4167 96.1042 92.0625 99.125C93.7292 102.146 95.9167 103.656 98.625 103.656C100.646 103.656 102.312 102.823 103.625 101.156C104.938 99.4896 105.594 96.625 105.594 92.5625C105.594 87.4792 104.5 83.4792 102.312 80.5625C100.833 78.5625 98.9479 77.5625 96.6562 77.5625Z"
                                        fill="white" />
                                    <path
                                        d="M34.5312 62.625H46.0312L71.9375 94.4062V69.9688C71.9375 67.3646 71.6458 65.7396 71.0625 65.0938C70.2917 64.2188 69.0729 63.7812 67.4062 63.7812H65.9375V62.625H80.6875V63.7812H79.1875C77.3958 63.7812 76.125 64.3229 75.375 65.4062C74.9167 66.0729 74.6875 67.5938 74.6875 69.9688V105.688H73.5625L45.625 71.5625V97.6562C45.625 100.26 45.9062 101.885 46.4688 102.531C47.2604 103.406 48.4792 103.844 50.125 103.844H51.625V105H36.875V103.844H38.3438C40.1562 103.844 41.4375 103.302 42.1875 102.219C42.6458 101.552 42.875 100.031 42.875 97.6562V68.1875C41.6458 66.75 40.7083 65.8021 40.0625 65.3438C39.4375 64.8854 38.5104 64.4583 37.2812 64.0625C36.6771 63.875 35.7604 63.7812 34.5312 63.7812V62.625Z"
                                        fill="white" />
                                    <path
                                        d="M189.56 90.5991L184.318 105H140.178V102.958C153.162 91.1141 162.303 81.4399 167.6 73.936C172.897 66.4321 175.545 59.5719 175.545 53.3555C175.545 48.6104 174.092 44.7113 171.187 41.6582C168.281 38.6051 164.805 37.0786 160.758 37.0786C157.08 37.0786 153.769 38.1637 150.827 40.334C147.921 42.4674 145.769 45.6125 144.371 49.769H142.33C143.249 42.964 145.603 37.7407 149.392 34.0991C153.218 30.4575 157.981 28.6367 163.683 28.6367C169.752 28.6367 174.81 30.5863 178.856 34.4854C182.939 38.3844 184.98 42.9824 184.98 48.2793C184.98 52.068 184.098 55.8568 182.332 59.6455C179.61 65.6045 175.196 71.9129 169.09 78.5708C159.931 88.576 154.211 94.6086 151.93 96.6685H171.462C175.435 96.6685 178.212 96.5213 179.794 96.2271C181.412 95.9328 182.865 95.3442 184.153 94.4614C185.44 93.5418 186.562 92.2544 187.519 90.5991H189.56Z"
                                        fill="white" />
                                    <defs>
                                        <linearGradient id="paint0_linear_8_59" x1="11.4583" y1="137"
                                            x2="216.03" y2="-5.69119" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.524038" stop-color="#5D5D5D" />
                                            <stop offset="1" stop-color="#D3CCA8" stop-opacity="0" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="ranking-badge-button">
                        <div class="ranking-badge-diamond">
                            <svg xmlns="http://www.w3.org/2000/svg" width="228" height="228"
                                viewBox="0 0 228 228" fill="none">
                                <g filter="url(#filter0_d_701_11478)">
                                    <path
                                        d="M114 20L161.525 66.4754L208 114L161.525 161.525L114 208L66.4754 161.525L20 114L66.4754 66.4754L114 20Z"
                                        fill="#BF5A75" />
                                </g>
                                <defs>
                                    <filter id="filter0_d_701_11478" x="0" y="0" width="228" height="228"
                                        filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                        <feColorMatrix in="SourceAlpha" type="matrix"
                                            values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                        <feOffset />
                                        <feGaussianBlur stdDeviation="10" />
                                        <feComposite in2="hardAlpha" operator="out" />
                                        <feColorMatrix type="matrix"
                                            values="0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 1 0" />
                                        <feBlend mode="normal" in2="BackgroundImageFix"
                                            result="effect1_dropShadow_701_11478" />
                                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_701_11478"
                                            result="shape" />
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                        <a href="{{ route('public.shops.shop.ranking', ['shop' => 'siroganeze']) }}"
                            class="ranking-badge-text">一覧を見る</a>
                    </div>
                    <div class="ranking-header">
                        <div class="ranking-header-bg">
                            <img src="{{ asset('assets/img/shops/siroganeze/ranking.png') }}" alt="Background">
                            <div class="ranking-header-overlay"></div>
                            <div class="ranking-header-shadow"></div>
                        </div>
                        <div class="ranking-header-content">
                            <h1 class="ranking-title-en">RANKING</h1>
                            <div class="ranking-title-ja-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="30"
                                    viewBox="0 0 34 30" fill="none">
                                    <path
                                        d="M5 30V26.6667H28.3333V30H5ZM5 24.1667L2.875 10.7917C2.81945 10.7917 2.75667 10.7989 2.68667 10.8133C2.61667 10.8278 2.55445 10.8344 2.5 10.8333C1.80556 10.8333 1.21556 10.59 0.730004 10.1033C0.244448 9.61667 0.0011149 9.02667 3.78788e-06 8.33334C-0.00110732 7.64 0.242226 7.05 0.730004 6.56334C1.21778 6.07667 1.80778 5.83334 2.5 5.83334C3.19223 5.83334 3.78278 6.07667 4.27167 6.56334C4.76056 7.05 5.00334 7.64 5 8.33334C5 8.52778 4.97889 8.70834 4.93667 8.875C4.89445 9.04167 4.84612 9.19445 4.79167 9.33334L10 11.6667L15.2083 4.54167C14.9028 4.31945 14.6528 4.02778 14.4583 3.66667C14.2639 3.30556 14.1667 2.91667 14.1667 2.5C14.1667 1.80556 14.41 1.215 14.8967 0.728337C15.3833 0.241671 15.9733 -0.00110731 16.6667 3.79651e-06C17.36 0.00111491 17.9506 0.244448 18.4383 0.730004C18.9261 1.21556 19.1689 1.80556 19.1667 2.5C19.1667 2.91667 19.0695 3.30556 18.875 3.66667C18.6806 4.02778 18.4306 4.31945 18.125 4.54167L23.3333 11.6667L28.5417 9.33334C28.4861 9.19445 28.4372 9.04167 28.395 8.875C28.3528 8.70834 28.3322 8.52778 28.3333 8.33334C28.3333 7.63889 28.5767 7.04834 29.0633 6.56167C29.55 6.075 30.14 5.83223 30.8333 5.83334C31.5267 5.83445 32.1172 6.07778 32.605 6.56334C33.0928 7.04889 33.3356 7.63889 33.3333 8.33334C33.3311 9.02778 33.0883 9.61834 32.605 10.105C32.1217 10.5917 31.5311 10.8344 30.8333 10.8333C30.7778 10.8333 30.7156 10.8267 30.6467 10.8133C30.5778 10.8 30.515 10.7928 30.4583 10.7917L28.3333 24.1667H5Z"
                                        fill="#132126" />
                                </svg>
                                <h2 class="ranking-title-ja">ランキング</h2>
                            </div>
                            <p class="ranking-description">当店の女の子ランキング情報です</p>
                        </div>
                    </div>
                </div>
            @endif
            @php
                $event_list = [];
                $i = 0;
                foreach ($events as $event) {
                    $event_list[$i]['image'] = asset('storage/' . $event->thumbnail);
                    $event_list[$i]['alt'] = $event->title;
                    $i += 1;
                }
            @endphp
            @if (count($events) > 0)
                <x-public.shops.event-section background-image="assets/img/shops/siroganeze/event-bg.jpeg"
                    background-alt="Event Background" {{-- main-banner-image="assets/img/shops/shizuku/event-main.png" --}} main-banner-alt="Main Banner Background"
                    :sub-banner-images="$event_list" />
            @endif
            {{-- <x-public.shops.event-section background-image="assets/img/shops/shizuku/event-bg.png"
            background-alt="Event Background" main-banner-image="assets/img/shops/shizuku/event-main.png"
            main-banner-alt="Main Banner Background" :sub-banner-images="[
                ['image' => 'assets/img/shops/shizuku/event-main.png', 'alt' => 'Event Sub Banner'],
                ['image' => 'assets/img/shops/shizuku/event-second.png', 'alt' => 'Event Sub Banner'],
                ['image' => 'assets/img/shops/shizuku/event-main.png', 'alt' => 'Event Sub Banner'],
                ['image' => 'assets/img/shops/shizuku/event-second.png', 'alt' => 'Event Sub Banner'],
                ['image' => 'assets/img/shops/shizuku/event-main.png', 'alt' => 'Event Sub Banner'],
                ['image' => 'assets/img/shops/shizuku/event-second.png', 'alt' => 'Event Sub Banner'],
                ['image' => 'assets/img/shops/shizuku/event-main.png', 'alt' => 'Event Sub Banner'],
                ['image' => 'assets/img/shops/shizuku/event-second.png', 'alt' => 'Event Sub Banner'],
            ]" /> --}}
            @php
                $banner_list = [];
                $i = 0;
                foreach ($banners as $banner) {
                    # code...
                    $banner_list[$i]['image'] = asset('storage/' . $banner->thumbnail);
                    $banner_list[$i]['alt'] = $banner->title;
                    if ($banner->link_url) {
                        $banner_list[$i]['url'] = $banner->link_url;
                    } else {
                        $banner_list[$i]['url'] = '#';
                    }
                    $i += 1;
                }
            @endphp
            <x-public.shops.footer :shops="[
                [
                    'image' => 'assets/img/shops/shizuku/001.jpg',
                    'alt' => 'Shop 1',
                    'text1' => '上品な空間、時を忘れる美貌とおもてなしが魅力のヘルス',
                    'text2' => '',
                    'url' => route('public.shops.shop.home', ['shop' => 'shizuku']),
                ],
                [
                    'image' => 'assets/img/shops/shizuku/002.jpg',
                    'alt' => 'Shop 2',
                    'text1' => '女の子を見て選べる唯一無二のエンターテインメントヘルス',
                    'text2' => '',
                    'url' => route('public.shops.shop.home', ['shop' => 'pussycat']),
                ],
                [
                    'image' => 'assets/img/shops/shizuku/003.jpg',
                    'alt' => 'Shop 3',
                    'text1' => '雅は、すすきの屈指の人妻・痴女が在籍するヘルス',
                    'text2' => '',
                    'url' => route('public.shops.shop.home', ['shop' => 'miyabi']),
                ],
                [
                    'image' => 'assets/img/shops/shizuku/004.jpg',
                    'alt' => 'Shop 4',
                    'text1' => '若妻、人妻、淫乱妻など大人のエロさ溢れる人妻ヘルス店',
                    'text2' => '',
                    'url' => route('public.shops.shop.home', ['shop' => 'en']),
                ],
                [
                    'image' => 'assets/img/shops/shizuku/005.jpg',
                    'alt' => 'Shop 5',
                    'text1' => '女の子を見て選べる唯一無二のエンターテインメントヘルス',
                    'text2' => '',
                    'url' => route('public.shops.shop.home', ['shop' => 'siroganeze']),
                ],
                [
                    'image' => 'assets/img/shops/shizuku/006.jpg',
                    'alt' => 'Shop 6',
                    'text1' => 'アナタ色のエッチな女の子に育てられる育成型ヘルス',
                    'text2' => '',
                    'url' => route('public.shops.shop.home', ['shop' => 'lovestory']),
                ],
            ]" :menu-links="[
                ['text' => '店舗TOP', 'url' => route('public.shops.shop.home', ['shop' => 'siroganeze'])],
                ['text' => '出勤情報', 'url' => route('public.shops.shop.schedule', ['shop' => 'siroganeze'])],
                ['text' => '料金システム', 'url' => route('public.shops.shop.system', ['shop' => 'siroganeze'])],
                ['text' => 'キャスト一覧', 'url' => route('public.shops.shop.castlist', ['shop' => 'siroganeze'])],
                ['text' => '新着情報', 'url' => route('public.shops.shop.newcast', ['shop' => 'siroganeze'])],
                ['text' => 'SNS', 'url' => '#'],
                ['text' => '店舗一覧', 'url' => route('public.shops.shop.shop-list', ['shop' => 'siroganeze'])],
                ['text' => 'ログイン', 'url' => route('login')],
                ['text' => '新規会員登録', 'url' => route('register')],
                [
                    'text' => 'メルマガ',
                    'url' => 'https://17auto.biz/plogroup/registp/entryform2.htm',
                    'target' => '_blank',
                ],
                ['text' => '女性求人', 'url' => route('public.recruit.female')],
                ['text' => '男性求人', 'url' => route('public.recruit.male')],
                ['text' => '個人情報保護方針', 'url' => 'https://plo-group.jp/privacy-policy', 'target' => '_blank'],
                ['text' => 'グループTOP', 'url' => 'https://plo-group.jp/', 'target' => '_blank'],
            ]" :external-links="$banner_list"
                footerLogo="{{ asset('assets/img/shops/siroganeze/footer-logo.png') }}" svgIconColor="#132126"
                ploLogo="{{ asset('assets/img/shops/siroganeze/plo-logo.png') }}"
                groupSiteLogo="{{ asset('assets/img/shops/siroganeze/plo-logo.png') }}" />
        </div>

        <!-- Fixed Phone Button -->
        <x-public.shops.fixed-phone-button phone-number="0115213593" phone-display="011-521-3593"
            hours="8:30〜24:00まで" mobile-text="TEL"
            icon-svg='<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
<path d="M23.5316 24.9894C20.6394 24.9894 17.7762 24.3646 14.9422 23.1152C12.1083 21.8657 9.5339 20.084 7.21915 17.7702C4.90439 15.4564 3.12274 12.888 1.8742 10.0652C0.625659 7.24229 0.000925532 4.37314 0 1.45771V0H8.19096L9.47513 6.9762L5.51848 10.9676C6.02753 11.8699 6.59441 12.7261 7.21915 13.5359C7.84388 14.3457 8.51489 15.0977 9.23218 15.7919C9.90319 16.4629 10.6381 17.1052 11.4368 17.7188C12.2355 18.3325 13.0972 18.9049 14.0218 19.4362L18.0479 15.4101L24.9894 16.8331V24.9894H23.5316Z" fill="white"/>
</svg>'
            mobileImage="{{ asset('assets/img/shops/siroganeze/TEL-y1.png') }}" />

        <!-- Fixed Side Buttons -->
        <x-public.shops.fixed-side-buttons
            newGirlLink="{{ route('public.shops.shop.newcast', ['shop' => 'siroganeze']) }}" />
    </div>
    @push('styles')
        @vite(['resources/scss/shops/siroganeze/home.scss', 'resources/js/shops/shizuku/home.js', 'resources/js/shops/home-header.js', 'resources/js/shops/news-section.js', 'resources/js/shops/new-girl-slider.js', 'resources/js/shops/castlist-slider.js'])
    @endpush
</x-shizuku-layout>

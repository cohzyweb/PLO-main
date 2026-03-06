<x-shizuku-layout>
    <div class="home">
        <div class="banner-image"></div>

        <div class="home-gradient-overlay"></div>
        <!-- Menu Overlay Component -->
        <x-public.shops.menu-overlay logo-image="{{ asset('assets/img/shops/siroganeze/footer-logo.png') }}"
            logo-alt="siroganeze Logo" :menu-links="[
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
                'recruit-male' => route('public.recruit.male'),
                'login' => route('login'),
                'recruit-female' => route('public.recruit.female'),
                'register' => route('register'),
            ]" :bottom-buttons="[
                'group' => route('public.groups.home'),
                'recruit' => route('public.recruit.male'),
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
            <div class="page-title">
                <h1>{{ $pageTitle }}</h1>
                <p>{{ $pageSubtitle }}</p>
            </div>
            <div class="page-breadcrumb">
                <p>{{ $breadcrumb }}</p>
            </div>
        </div>
        <div class="page-content">
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
            {{ $slot }}
            <div class="top-page-link-button">
                <a href="{{ route('public.shops.shop.home', ['shop' => 'siroganeze']) }}" class="top-page-link">
                    トップページはこちら
                </a>
            </div>
            @php
                $banner_list = [];
                if (
                    !empty($banners) &&
                    (is_array($banners) || (is_object($banners) && method_exists($banners, 'toArray')))
                ) {
                    $bannersArray = is_array($banners) ? $banners : $banners->toArray();
                    $i = 0;
                    foreach ($banners as $banner) {
                        $banner_list[$i]['image'] = asset('storage/' . $banner->thumbnail);
                        $banner_list[$i]['alt'] = $banner->title;
                        if ($banner->link_url) {
                            $banner_list[$i]['url'] = $banner->link_url;
                        } else {
                            $banner_list[$i]['url'] = '#';
                        }
                        $i += 1;
                    }
                }
            @endphp

            <x-public.shops.footer :showExternalLink="false" :showExternalLinksGrid="true" :shops="[
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
            ]" :external-links="$banner_list"
                footerLogo="{{ asset('assets/img/shops/siroganeze/footer-logo.png') }}" svgIconColor="#132126"
                :menu-links="[
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
                    [
                        'text' => '個人情報保護方針',
                        'url' => 'https://plo-group.jp/privacy-policy',
                        'target' => '_blank',
                    ],
                    ['text' => 'グループTOP', 'url' => 'https://plo-group.jp/', 'target' => '_blank'],
                ]" ploLogo="{{ asset('assets/img/shops/siroganeze/plo-logo.png') }}"
                groupSiteLogo="{{ asset('assets/img/shops/siroganeze/plo-logo.png') }}" />
        </div>
        <!-- Fixed Phone Button -->
        <x-public.shops.fixed-phone-button phone-number="0115213593" phone-display="011-521-3593" hours="8:30〜24:00まで"
            mobile-text="TEL"
            icon-svg='<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
<path d="M23.5316 24.9894C20.6394 24.9894 17.7762 24.3646 14.9422 23.1152C12.1083 21.8657 9.5339 20.084 7.21915 17.7702C4.90439 15.4564 3.12274 12.888 1.8742 10.0652C0.625659 7.24229 0.000925532 4.37314 0 1.45771V0H8.19096L9.47513 6.9762L5.51848 10.9676C6.02753 11.8699 6.59441 12.7261 7.21915 13.5359C7.84388 14.3457 8.51489 15.0977 9.23218 15.7919C9.90319 16.4629 10.6381 17.1052 11.4368 17.7188C12.2355 18.3325 13.0972 18.9049 14.0218 19.4362L18.0479 15.4101L24.9894 16.8331V24.9894H23.5316Z" fill="white"/>
</svg>'
            mobileImage="{{ asset('assets/img/shops/siroganeze/TEL-y1.png') }}" />

        <!-- Fixed Side Buttons -->
        <x-public.shops.fixed-side-buttons
            newGirlLink="{{ route('public.shops.shop.newcast', ['shop' => 'siroganeze']) }}" />
    </div>
    @push('styles')
        @vite(['resources/scss/shops/siroganeze/page-layout.scss', ...$assets])
        @vite(['resources/js/shops/home-header.js'])
    @endpush
</x-shizuku-layout>

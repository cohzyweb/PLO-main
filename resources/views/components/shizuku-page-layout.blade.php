<x-shizuku-layout>
    <div class="home">
        <div class="banner-image"></div>

        <div class="home-gradient-overlay"></div>
        <!-- Menu Overlay Component -->
        <x-public.shops.menu-overlay logo-image="{{ asset('assets/img/shops/shizuku/footer-logo-black.png') }}" menuRectColor="#ffffff" menuCloseColor="#000000"
            logo-alt="Shizuku Logo" :menu-links="[
                'top' => route('public.shops.shop.home', ['shop' => 'shizuku']),
                'schedule' => route('public.shops.shop.schedule', ['shop' => 'shizuku']),
                'pricing' => route('public.shops.shop.system', ['shop' => 'shizuku']),
                'new' => route('public.shops.shop.newcast', ['shop' => 'shizuku']),
                'cast' => route('public.shops.shop.castlist', ['shop' => 'shizuku']),
                'news' => route('public.shops.shop.news', ['shop' => 'shizuku']),
                'event' => route('public.shops.shop.event', ['shop' => 'shizuku']),
                'diary' => route('public.shops.shop.photo-diary', ['shop' => 'shizuku']),
                'movie' => route('public.shops.shop.movie', ['shop' => 'shizuku']),
                'review' => route('public.shops.shop.review', ['shop' => 'shizuku']),
                'ranking' => route('public.shops.shop.ranking', ['shop' => 'shizuku']),
                'shop' => route('public.shops.shop.shop-list', ['shop' => 'shizuku']),
                'access' => route('public.shops.shop.access', ['shop' => 'shizuku']),
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
            mobile-image="assets/img/shops/shizuku/credit_system.png" mobile-image-alt="女の子募集中" />
        <div class="banner">
            <x-public.shops.contact-info phone-icon="assets/img/shops/shizuku/phone.png" phone-number="011-533-8988"
                email="@ShizukuHealth" address="〒064-0806</br> 北海道札幌市中央区南6条西5丁目" hours="9:00 ~ 0:00"
                credit-text="クレジット決済可能" note="電話予約の対応時間は朝8:30~となります。"
                phone-background="linear-gradient(180deg, rgba(255, 242, 215, 0.8) 20.67%, rgba(189, 144, 47, 0.8) 100%)"
                address-background="#160B00" />
            <div class="page-title">
                <h1>{{ $pageTitle }}</h1>
                <p>{{ $pageSubtitle }}</p>
            </div>
            <div class="page-breadcrumb">
                <p>{{ $breadcrumb }}</p>
            </div>
        </div>
        <div class="page-content">
            <x-public.shops.home-header logo-image="assets/img/shops/shizuku/footer-logo.png" logo-alt="Shizuku Logo"
                :menu-items="[
                    [
                        'title' => 'トップページ',
                        'subtitle' => 'top page',
                        'url' => route('public.shops.shop.home', ['shop' => 'shizuku']),
                    ],
                    [
                        'title' => 'キャスト一覧',
                        'subtitle' => 'cast list',
                        'url' => route('public.shops.shop.castlist', ['shop' => 'shizuku']),
                    ],
                    [
                        'title' => '出勤情報',
                        'subtitle' => 'schedule',
                        'url' => route('public.shops.shop.schedule', ['shop' => 'shizuku']),
                    ],
                    [
                        'title' => '写メ日記',
                        'subtitle' => 'photo diary',
                        'url' => route('public.shops.shop.photo-diary', ['shop' => 'shizuku']),
                    ],
                    [
                        'title' => 'イベント一覧',
                        'subtitle' => 'event',
                        'url' => route('public.shops.shop.event', ['shop' => 'shizuku']),
                    ],
                    [
                        'title' => '料金システム',
                        'subtitle' => 'system',
                        'url' => route('public.shops.shop.system', ['shop' => 'shizuku']),
                    ],
                    [
                        'title' => '新人情報',
                        'subtitle' => 'new cast',
                        'url' => route('public.shops.shop.newcast', ['shop' => 'shizuku']),
                    ],
                    ['title' => 'ログイン', 'subtitle' => 'login', 'url' => route('login')],
                ]" menu-button-id="mobileMenuButton" background-color="#160B00" :mobile-menu-button-items="[
                    [
                        'title' => 'トップページ',
                        'subtitle' => 'top page',
                        'url' => route('public.shops.shop.home', ['shop' => 'shizuku']),
                    ],
                    [
                        'title' => '出勤情報',
                        'subtitle' => 'schedule',
                        'url' => route('public.shops.shop.schedule', ['shop' => 'shizuku']),
                    ],
                    [
                        'title' => '料金システム',
                        'subtitle' => 'system',
                        'url' => route('public.shops.shop.system', ['shop' => 'shizuku']),
                    ],
                    ['title' => 'ログイン', 'subtitle' => 'login', 'url' => route('login')],
                ]" />
            {{ $slot }}
            <div class="top-page-link-button">
                <a href="{{ route('public.shops.shop.home', ['shop' => 'shizuku']) }}" class="top-page-link">
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
                :menu-links="[
                    ['text' => '店舗TOP', 'url' => '#'],
                    ['text' => '出勤情報', 'url' => '#'],
                    ['text' => '料金システム', 'url' => '#'],
                    ['text' => 'キャスト一覧', 'url' => '#'],
                    ['text' => '新着情報', 'url' => '#'],
                    ['text' => 'SNS', 'url' => '#'],
                    ['text' => '店舗一覧', 'url' => '#'],
                    ['text' => 'ログイン', 'url' => '#'],
                    ['text' => '新規会員登録', 'url' => '#'],
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
                ]" />
        </div>
        <!-- Fixed Phone Button -->
        <x-public.shops.fixed-phone-button phone-number="0115338988" phone-display="011-533-8988" hours="8:30〜24:00まで"
            mobile-text="TEL" />

        <!-- Fixed Side Buttons -->
        <x-public.shops.fixed-side-buttons />
    </div>
    @push('styles')
        @vite(['resources/scss/shops/shizuku/page-layout.scss', ...$assets])
        @vite(['resources/js/shops/home-header.js'])
    @endpush
</x-shizuku-layout>

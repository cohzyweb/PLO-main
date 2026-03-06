<x-shizuku-layout>
    <div class="home">
        <div class="banner-image"></div>

        <div class="home-gradient-overlay"></div>
        <!-- Menu Overlay Component -->
        <x-public.shops.menu-overlay logo-image="assets/img/shops/lovestory/footer-logo-black.png" logo-alt="Lovestory Logo"
            :menu-links="[
                'top' => route('public.shops.shop.home', ['shop' => 'lovestory']),
                'schedule' => route('public.shops.shop.schedule', ['shop' => 'lovestory']),
                'pricing' => route('public.shops.shop.system', ['shop' => 'lovestory']),
                'new' => route('public.shops.shop.newcast', ['shop' => 'lovestory']),
                'cast' => route('public.shops.shop.castlist', ['shop' => 'lovestory']),
                'news' => route('public.shops.shop.news', ['shop' => 'lovestory']),
                'event' => route('public.shops.shop.event', ['shop' => 'lovestory']),
                'diary' => route('public.shops.shop.photo-diary', ['shop' => 'lovestory']),
                'movie' => route('public.shops.shop.movie', ['shop' => 'lovestory']),
                'review' => route('public.shops.shop.review', ['shop' => 'lovestory']),
                'ranking' => route('public.shops.shop.ranking', ['shop' => 'lovestory']),
                'shop' => route('public.shops.shop.shop-list', ['shop' => 'lovestory']),
                'access' => route('public.shops.shop.access', ['shop' => 'lovestory']),
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
                'top' => '#8A6620',
                'new' => '#52B845',
                'event' => '#FFD775',
                'review' => '#8A6B20',
                'shop' => '#1C2D48',
                'schedule' => '#1D47AA',
                'cast' => '#F2387C',
                'diary' => '#A30ABA',
                'ranking' => '#D6AD01',
                'login' => '#1C2D48',
                'register' => '#1C2D48',
                'pricing' => '#DCC305',
                'news' => '#8A6620',
                'movie' => '#1C2D48',
                'access' => '#8A6B20',
                'recruit-female' => '#D42032',
                'recruit-male' => '#363B8D',
            ]" />
        <div class="banner">
          <x-public.shops.contact-info phone-icon="assets/img/shops/lovestory/phone.png" phone-number="011-530-0050"
                email="@lovestory" address="〒064-0805</br>
札幌市中央区南5条西5丁目3-3 第8旭観光ビル1F" hours="9:00 ~ 0:00"
                credit-text="クレジット決済可能" note="電話予約の対応時間は朝8:30~となります。" phone-background="#F2BBCF"
                address-background="rgba(11, 158, 217, 0.80)" />
            <div class="page-title">
                <h1>{{ $pageTitle }}</h1>
                <p>{{ $pageSubtitle }}</p>
            </div>
            <div class="page-breadcrumb">
                <p>{{ $breadcrumb }}</p>
            </div>
        </div>
        <div class="page-content">
          <x-public.shops.home-header logo-image="assets/img/shops/lovestory/footer-logo.png"
                logo-alt="Lovestory Logo" stroke-color="#FFF" :menu-items="[
                    [
                        'title' => 'トップページ',
                        'subtitle' => 'top page',
                        'url' => route('public.shops.shop.home', ['shop' => 'lovestory']),
                    ],
                    [
                        'title' => 'キャスト一覧',
                        'subtitle' => 'cast list',
                        'url' => route('public.shops.shop.castlist', ['shop' => 'lovestory']),
                    ],
                    [
                        'title' => '出勤情報',
                        'subtitle' => 'schedule',
                        'url' => route('public.shops.shop.schedule', ['shop' => 'lovestory']),
                    ],
                    [
                        'title' => '写メ日記',
                        'subtitle' => 'photo diary',
                        'url' => route('public.shops.shop.photo-diary', ['shop' => 'lovestory']),
                    ],
                    [
                        'title' => 'イベント一覧',
                        'subtitle' => 'event',
                        'url' => route('public.shops.shop.event', ['shop' => 'lovestory']),
                    ],
                    [
                        'title' => '料金システム',
                        'subtitle' => 'system',
                        'url' => route('public.shops.shop.system', ['shop' => 'lovestory']),
                    ],
                    [
                        'title' => '新人情報',
                        'subtitle' => 'new cast',
                        'url' => route('public.shops.shop.newcast', ['shop' => 'lovestory']),
                    ],
                    ['title' => 'ログイン', 'subtitle' => 'login', 'url' => route('login')],
                ]" menu-button-id="mobileMenuButton"
                background-color="#fff" :mobileMenuBttonItems="[
                    [
                        'title' => 'トップページ',
                        'subtitle' => 'top page',
                        'url' => route('public.shops.shop.home', ['shop' => 'lovestory']),
                    ],
                    [
                        'title' => '出勤情報',
                        'subtitle' => 'schedule',
                        'url' => route('public.shops.shop.schedule', ['shop' => 'lovestory']),
                    ],
                    [
                        'title' => '料金システム',
                        'subtitle' => 'system',
                        'url' => route('public.shops.shop.system', ['shop' => 'lovestory']),
                    ],
                    ['title' => 'ログイン', 'subtitle' => 'login', 'url' => route('login')],
                ]"
                social-svg='<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
<path d="M5.71429 0C2.5625 0 0 2.5625 0 5.71429V34.2857C0 37.4375 2.5625 40 5.71429 40H34.2857C37.4375 40 40 37.4375 40 34.2857V5.71429C40 2.5625 37.4375 0 34.2857 0H5.71429ZM32.2411 7.5L22.9732 18.0893L33.875 32.5H25.3393L18.6607 23.7589L11.0089 32.5H6.76786L16.6786 21.1696L6.22321 7.5H14.9732L21.0179 15.4911L28 7.5H32.2411ZM28.8661 29.9643L13.6964 9.90179H11.1696L26.5089 29.9643H28.8571H28.8661Z" fill="#F2387C"/>
</svg>' />
            {{ $slot }}
            <div class="top-page-link-button">
                <a href="{{ route('public.shops.shop.home', ['shop' => 'en']) }}" class="top-page-link">
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
  ['text' => '店舗TOP', 'url' => route('public.shops.shop.home', ['shop' => 'lovestory'])],
  ['text' => '出勤情報', 'url' => route('public.shops.shop.schedule', ['shop' => 'lovestory'])],
  ['text' => '料金システム', 'url' => route('public.shops.shop.system', ['shop' => 'lovestory'])],
  ['text' => 'キャスト一覧', 'url' => route('public.shops.shop.castlist', ['shop' => 'lovestory'])],
  ['text' => '新着情報', 'url' => route('public.shops.shop.newcast', ['shop' => 'lovestory'])],
  ['text' => 'SNS', 'url' => '#'],
  ['text' => '店舗一覧', 'url' => route('public.shops.shop.shop-list', ['shop' => 'lovestory'])],
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
  footerLogo="{{ asset('assets/img/shops/lovestory/footer-logo.png') }}" svgIconColor="#F2387C"
  ploLogo="{{ asset('assets/img/shops/lovestory/plo-logo.png') }}"
  groupSiteLogo="{{ asset('assets/img/shops/lovestory/plo-logo.png') }}" />
        </div>
        <!-- Fixed Phone Button -->
        <x-public.shops.fixed-phone-button phone-number="0115300050" phone-display="011-530-0050"
            hours="8:30〜24:00まで" mobile-text="TEL"
            icon-svg='<svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
<rect x="0.5" y="0.5" width="32.3191" height="32.3191" stroke="#FFE355"/>
<path d="M27.6966 29.1543C24.8043 29.1543 21.9411 28.5295 19.1072 27.2801C16.2732 26.0306 13.6988 24.249 11.3841 21.9351C9.06931 19.6213 7.28766 17.0529 6.03912 14.2301C4.79058 11.4072 4.16584 8.53806 4.16492 5.62263V4.16492H12.3559L13.64 11.1411L9.6834 15.1325C10.1924 16.0349 10.7593 16.891 11.3841 17.7008C12.0088 18.5107 12.6798 19.2627 13.3971 19.9568C14.0681 20.6278 14.803 21.2701 15.6017 21.8838C16.4004 22.4974 17.2621 23.0698 18.1867 23.6011L22.2128 19.575L29.1543 20.998V29.1543H27.6966Z" fill="#F2387C"/>
</svg>'
            mobileImage="{{ asset('assets/img/shops/lovestory/TEL-y1.png') }}" />

        <!-- Fixed Side Buttons -->
        <div class="fixed-side-trans-button">
          <img src="{{ asset('assets/img/shops/lovestory/trans.png') }}" alt="Transparent BG">
        </div>
        <div class="trans-dialog">
          <div class="trans-dialog-header">
          </div>
          <div class="trans-dialog-content">
            <div class="trans-dialog-content-header">
              <button class="trans-dialog-close"> close </button>
            </div>
            <h3>Translation Page</h3>
            <div class="trans-dialog-content-btns">
              <a href="{{ route('public.shops.shop.trans', ['shop' => 'lovestory', 'lang' => 'en']) }}" class="trans-dialog-content-btn-link">
                <span>English
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M12 24C5.36471 24 0 18.6353 0 12C0 5.36471 5.36471 0 12 0C18.6353 0 24 5.36471 24 12C24 18.6353 18.6353 24 12 24ZM12 1.41176C6.14118 1.41176 1.41176 6.14118 1.41176 12C1.41176 17.8588 6.14118 22.5882 12 22.5882C17.8588 22.5882 22.5882 17.8588 22.5882 12C22.5882 6.14118 17.8588 1.41176 12 1.41176Z" fill="white"/>
                  <path d="M11.7883 18.8471L10.8 17.8588L16.6589 12L10.8 6.14117L11.7883 5.15293L18.6353 12L11.7883 18.8471Z" fill="white"/>
                  <path d="M5.64706 11.2941H17.6471V12.7059H5.64706V11.2941Z" fill="white"/>
                </svg>
              </a>
                <a href="{{ route('public.shops.shop.trans', ['shop' => 'lovestory', 'lang' => 'zh-CN']) }}" class="trans-dialog-content-btn-link">
                  <span>简体字
                  </span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 24C5.36471 24 0 18.6353 0 12C0 5.36471 5.36471 0 12 0C18.6353 0 24 5.36471 24 12C24 18.6353 18.6353 24 12 24ZM12 1.41176C6.14118 1.41176 1.41176 6.14118 1.41176 12C1.41176 17.8588 6.14118 22.5882 12 22.5882C17.8588 22.5882 22.5882 17.8588 22.5882 12C22.5882 6.14118 17.8588 1.41176 12 1.41176Z" fill="white"/>
                    <path d="M11.7883 18.8471L10.8 17.8588L16.6589 12L10.8 6.14117L11.7883 5.15293L18.6353 12L11.7883 18.8471Z" fill="white"/>
                    <path d="M5.64706 11.2941H17.6471V12.7059H5.64706V11.2941Z" fill="white"/>
                    </svg>
              </a>
                <a href="{{ route('public.shops.shop.trans', ['shop' => 'lovestory', 'lang' => 'zh-TW']) }}" class="trans-dialog-content-btn-link">
                  <span>台湾語
                  </span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 24C5.36471 24 0 18.6353 0 12C0 5.36471 5.36471 0 12 0C18.6353 0 24 5.36471 24 12C24 18.6353 18.6353 24 12 24ZM12 1.41176C6.14118 1.41176 1.41176 6.14118 1.41176 12C1.41176 17.8588 6.14118 22.5882 12 22.5882C17.8588 22.5882 22.5882 17.8588 22.5882 12C22.5882 6.14118 17.8588 1.41176 12 1.41176Z" fill="white"/>
                    <path d="M11.7883 18.8471L10.8 17.8588L16.6589 12L10.8 6.14117L11.7883 5.15293L18.6353 12L11.7883 18.8471Z" fill="white"/>
                    <path d="M5.64706 11.2941H17.6471V12.7059H5.64706V11.2941Z" fill="white"/>
                    </svg>
              </a>
                <a href="{{ route('public.shops.shop.trans', ['shop' => 'lovestory', 'lang' => 'ko']) }}" class="trans-dialog-content-btn-link">
                  <span>한국어
                  </span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 24C5.36471 24 0 18.6353 0 12C0 5.36471 5.36471 0 12 0C18.6353 0 24 5.36471 24 12C24 18.6353 18.6353 24 12 24ZM12 1.41176C6.14118 1.41176 1.41176 6.14118 1.41176 12C1.41176 17.8588 6.14118 22.5882 12 22.5882C17.8588 22.5882 22.5882 17.8588 22.5882 12C22.5882 6.14118 17.8588 1.41176 12 1.41176Z" fill="white"/>
                    <path d="M11.7883 18.8471L10.8 17.8588L16.6589 12L10.8 6.14117L11.7883 5.15293L18.6353 12L11.7883 18.8471Z" fill="white"/>
                    <path d="M5.64706 11.2941H17.6471V12.7059H5.64706V11.2941Z" fill="white"/>
                    </svg>
              </a>
            </div>
            <div class="trans-dialog-content-footer">
              <span>Opne in a new window</span>
            </div>
          </div>
        </div>
        <x-public.shops.fixed-side-buttons
            newGirlLink="{{ route('public.shops.shop.newcast', ['shop' => 'lovestory']) }}" />
    </div>
    @push('styles')
        @vite(['resources/scss/shops/lovestory/page-layout.scss', ...$assets])
        @vite(['resources/js/shops/home-header.js','resources/js/shops/en/home.js'])
    @endpush
</x-shizuku-layout>

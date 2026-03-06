@props([
    // Show/Hide parameters
    'showShopInfo' => true,
    'showExternalLink' => true,
    'showExternalLinksGrid' => true,
    'showFooterMenu' => true,
    'showFooterCopyright' => true,

    // Shop Info Section
    'ploLogo' => 'assets/img/shops/shizuku/plo-logo.png',
    'areaText' => 'すすきのエリア 全６店舗',
    'groupSiteUrl' => '#',
    'groupSiteLogo' => 'assets/img/shops/shizuku/plo-logo.png',
    'shopGridHeader' => '店舗一覧',
    'shops' => [],

    // External Link Section
    'externalLinkTitle' => '外部リンク',
    'externalLinkDescription' => '当店の情報が載っている外部広告サイトになります',
    'externalLinks' => [],

    // Footer Menu
    'menuLinks' => [],
    'footerLogo' => 'assets/img/shops/shizuku/footer-logo.png',
    'footerLogoAlt' => 'Villa Cort Shizuku',

    // Footer Copyright
    'copyrightText' => 'Copyright © PLO Group All Rights Reserved.',
    'svgIconColor' => '#fff',
])

@if ($showShopInfo)
    <div class="home-shop-info">
        <div class="shop-info-logo-section">
            <div class="shop-info-plo-logo">
                <img src="{{ asset($ploLogo) }}" alt="PLO Logo">
            </div>
            <div class="shop-info-area-text">
                <p>{{ $areaText }}</p>
            </div>
            <a href="{{ $groupSiteUrl }}" class="shop-info-group-site">
                <div class="shop-info-group-site-logo">
                    <img src="{{ asset($groupSiteLogo) }}" alt="PLO Logo">
                </div>
                <p class="shop-info-group-site-text">GROUP SITE</p>
            </a>
        </div>
        <div class="shop-info-grid">
            <div class="shop-info-grid-header">
                <p>{{ $shopGridHeader }}</p>
            </div>
            {{-- @foreach ($shops as $shop)
        <a href="{{ $shop['url'] ?? '#' }}" class="shop-info-card">
            <div class="shop-info-card-image">
                <img src="{{ asset($shop['image'] ?? '') }}" alt="{{ $shop['alt'] ?? '' }}">
            </div>
            <div class="shop-info-card-text">
                <p>{{ $shop['text1'] ?? '' }}</p>
                @if (!empty($shop['text2']))
                <p>{{ $shop['text2'] }}</p>
                @endif
            </div>
        </a> --}}
            <a href="{{ $shops[0]['url'] ?? '#' }}" class="shop-info-card">
                <div class="shop-info-card-image">
                    <img src="{{ asset($shops[0]['image'] ?? '') }}" alt="{{ $shops[0]['alt'] ?? '' }}">
                </div>
                <div class="shop-info-card-text">
                    <p class="pc-only">上品な空間、時を忘れる美貌と<br>おもてなしが魅力のヘルス</p>
                    <p class="sp-only">上品な空間、時を忘れる美貌とおもてなしが魅力のヘルス</p>
                </div>
            </a>
            <a href="{{ $shops[1]['url'] ?? '#' }}" class="shop-info-card">
                <div class="shop-info-card-image">
                    <img src="{{ asset($shops[1]['image'] ?? '') }}" alt="{{ $shop['alt'] ?? '' }}">
                </div>
                <div class="shop-info-card-text">
                    <p class="pc-only">女の子を見て選べる唯一無二の<br>エンターテインメントヘルス</p>
                    <p class="sp-only">女の子を見て選べる唯一無二のエンターテインメントヘルス</p>
                </div>
            </a>
            <a href="{{ $shops[2]['url'] ?? '#' }}" class="shop-info-card">
                <div class="shop-info-card-image">
                    <img src="{{ asset($shops[2]['image'] ?? '') }}" alt="{{ $shops[2]['alt'] ?? '' }}">
                </div>
                <div class="shop-info-card-text">
                    <p class="pc-only">雅は、すすきの屈指の人妻・痴女が<br>在籍するヘルス</p>
                    <p class="sp-only">雅は、すすきの屈指の人妻・痴女が在籍するヘルス</p>
                </div>
            </a>
            <a href="{{ $shops[3]['url'] ?? '#' }}" class="shop-info-card">
                <div class="shop-info-card-image">
                    <img src="{{ asset($shops[3]['image'] ?? '') }}" alt="{{ $shops[3]['alt'] ?? '' }}">
                </div>
                <div class="shop-info-card-text">
                    <p class="pc-only">若妻、人妻、淫乱妻など大人のエロさ溢れる<br>人妻ヘルス店</p>
                    <p class="sp-only">若妻、人妻、淫乱妻など大人のエロさ溢れる人妻ヘルス店</p>
                </div>
            </a>
            <a href="{{ $shops[4]['url'] ?? '#' }}" class="shop-info-card">
                <div class="shop-info-card-image">
                    <img src="{{ asset($shops[4]['image'] ?? '') }}" alt="{{ $shops[4]['alt'] ?? '' }}">
                </div>
                <div class="shop-info-card-text">
                    <p class="pc-only">容姿端麗なオトナ女性による<br>丁寧な本格マッサージ店</p>
                    <p class="sp-only">容姿端麗なオトナ女性による丁寧な本格マッサージ店</p>
                </div>
            </a>
            <a href="{{ $shops[5]['url'] ?? '#' }}" class="shop-info-card">
                <div class="shop-info-card-image">
                    <img src="{{ asset($shops[5]['image'] ?? '') }}" alt="{{ $shops[5]['alt'] ?? '' }}">
                </div>
                <div class="shop-info-card-text">
                    <p class="pc-only">アナタ色のエッチな女の子に育てられる<br>育成型ヘルス</p>
                    <p class="sp-only">アナタ色のエッチな女の子に育てられる育成型ヘルス</p>
                </div>
            </a>
        </div>
    </div>
@endif

@if ($showExternalLink)
    <!-- Footer External Link Section -->
    <div class="footer-external-link">
        <div class="footer-external-link-header">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                <path
                    d="M20.4722 16.4644L18.4676 14.4613L20.4736 12.4581C21.5363 11.3952 22.1333 9.95362 22.1332 8.45055C22.133 6.94749 21.5358 5.50604 20.4729 4.4433C19.41 3.38057 17.9684 2.78361 16.4653 2.78374C14.9623 2.78387 13.5208 3.38109 12.4581 4.44401L10.4549 6.44718L8.44893 4.44401L10.4535 2.44084C12.052 0.86823 14.2071 -0.00905999 16.4494 7.0563e-05C18.6917 0.00920112 20.8396 0.904012 22.4252 2.48959C24.0108 4.07517 24.9056 6.22306 24.9147 8.46539C24.9238 10.7077 24.0465 12.8628 22.4739 14.4613L20.4722 16.4644ZM16.4644 20.4722L14.4613 22.4753C12.8628 24.048 10.7077 24.9252 8.46539 24.9161C6.22306 24.907 4.07517 24.0122 2.48959 22.4266C0.904012 20.841 0.00920112 18.6931 7.0563e-05 16.4508C-0.00905999 14.2085 0.86823 12.0534 2.44085 10.4549L4.44401 8.45176L6.44718 10.4549L4.44401 12.4581C3.38128 13.5208 2.78424 14.9622 2.78424 16.4651C2.78424 17.9681 3.38128 19.4094 4.44401 20.4722C5.50675 21.5349 6.94812 22.1319 8.45105 22.1319C9.95399 22.1319 11.3954 21.5349 12.4581 20.4722L14.4613 18.469L16.4644 20.4722ZM16.4644 6.44718L18.469 8.45176L8.45034 18.4676L6.44718 16.4644L16.4644 6.44718Z"
                    fill="{{ $svgIconColor }}"" />
            </svg>
            <p>{{ $externalLinkTitle }}</p>
        </div>
        <div class="footer-external-link-description">
            <p>{{ $externalLinkDescription }}</p>
        </div>
    </div>
@endif

@if ($showExternalLinksGrid)
    <!-- Footer External Links Grid -->
    <div class="footer-external-links-grid">
        @foreach ($externalLinks as $link)
            <a href="{{ $link['url'] ?? '#' }}" target="_blank" rel="noopener noreferrer"
                class="footer-external-link-item">
                <img src="{{ asset($link['image'] ?? '') }}" alt="{{ $link['alt'] ?? '' }}">
            </a>
        @endforeach
    </div>
@endif

@if ($showFooterMenu)
    <!-- Footer Menu Section -->
    <div class="footer-menu">
        <div class="footer-menu-content">
            <div class="footer-menu-links">
                <div class="footer-menu-row">
                    @foreach ($menuLinks as $index => $link)
                        <a href="{{ $link['url'] ?? '#' }}"
                            @if (!empty($link['target'])) target="{{ $link['target'] }}" rel="noopener noreferrer" @endif
                            class="footer-menu-link">{{ $link['text'] ?? '' }}</a>
                        @if ($index < count($menuLinks) - 1)
                            <span class="footer-menu-separator">|</span>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="footer-logo">
            <img src="{{ asset($footerLogo) }}" alt="{{ $footerLogoAlt }}">
        </div>
    </div>
@endif

@if ($showFooterCopyright)
    <div class="footer-copyright">
        <p>{{ $copyrightText }}</p>
    </div>
@endif

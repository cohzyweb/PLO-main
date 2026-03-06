@props([
    'headerBackgroundImage' => 'assets/img/shops/shizuku/pickup-bg.png',
    'titleEn' => 'PICK UP',
    'titleJa' => 'ピックアップ',
    'description' => '当店の女の子イチオシ情報です',
    'badgeText' => '当店一押し',
    'lightningIcon' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="32" viewBox="0 0 18 32" fill="none">
                            <path d="M17.4396 14.9991L9.51595 12.8759L12.966 7.80923e-05L-2.36381e-06 16.6955L7.92361 18.8187L4.47353 31.6945L17.4396 14.9991Z" fill="white"/>
                        </svg>',
    'badgeDiamondSvg' => '<svg width="188" height="188" viewBox="0 0 188 188" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M94 0L188 94L94 188L0 94L94 0Z" fill="url(#paint0_linear_badge)"/>
                            <defs>
                                <linearGradient id="paint0_linear_badge" x1="94" y1="0" x2="94" y2="188" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FFF2D7"/>
                                    <stop offset="1" stop-color="#BD902F"/>
                                </linearGradient>
                            </defs>
                        </svg>',
    'castImages' => [
        ['image' => 'assets/img/shops/shizuku/pickup-cast-1.png', 'alt' => 'Cast 1'],
        ['image' => 'assets/img/shops/shizuku/pickup-cast-2.png', 'alt' => 'Cast 2'],
    ],
    'frameImage' => 'assets/img/shops/shizuku/card-frame-2.png',
    'overlayOpacity' => '0.6',
    'badgeGradientStart' => '#FFF2D7',
    'badgeGradientEnd' => '#BD902F',
    'Colorchange' => false,
    'overlay' => 'rgba(0,0,0,0.6)',
])

<div class="home-pickup">
    <div class="pickup-header">
        <div class="pickup-header-bg">
            <img src="{{ asset($headerBackgroundImage) }}" alt="Background">
            <div class="pickup-header-overlay" style="background: {{ $overlay }};"></div>
            <div class="pickup-header-shadow"></div>
        </div>
        <div class="pickup-header-content">
            @if ($Colorchange)
                <div class="pickup-title-en-wrapper">
                    <span class="pickup-title-en" style="color: #05F2DB;">P</span>
                    <span class="pickup-title-en" style="color: #F2138E;">I</span>
                    <span class="pickup-title-en" style="color: #EAF205;">C</span>
                    <span class="pickup-title-en" style="color: #05F2DB;">K</span>
                    <span class="pickup-title-en" style="color: #F2138E;">&nbsp;U</span>
                    <span class="pickup-title-en" style="color: #EAF205;">P</span>
                </div>
            @else
                <h1 class="pickup-title-en">{{ $titleEn }}</h1>
            @endif
            <div class="pickup-title-ja-wrapper">
                {!! $lightningIcon !!}
                <h2 class="pickup-title-ja">{{ $titleJa }}</h2>
            </div>
            <p class="pickup-description">{{ $description }}</p>
        </div>
    </div>
    <div class="pickup-badge">
        <div class="pickup-badge-diamond">
            {!! $badgeDiamondSvg !!}
        </div>
        <p class="pickup-badge-text">{{ $badgeText }}</p>
    </div>
    @foreach ($castImages as $cast)
        <div class="pickup-cast-card">
            <div class="pickup-cast-image">
                <img src="{{ asset($cast['image']) }}" alt="{{ $cast['alt'] }}" class="cast-image">
                <img src="{{ asset($frameImage) }}" alt="Frame" class="cast-frame">
            </div>
        </div>
    @endforeach
</div>

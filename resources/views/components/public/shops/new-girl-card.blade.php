@props([
    'iconImage' => 'assets/img/shop/calender-g.png',
    'iconAlt' => 'Icon',

    'backgroundImage' => 'assets/img/shops/shizuku/new-girl.png',
    'photoImage' => 'assets/img/shops/shizuku/new-girl.png',
    'date' => '2025.00.00 SUN',
    'dateLabel' => '入店',
    'name' => '名前名前',
    'nameVertical' => 'Name',
    'age' => '00',
    'measurements' => 'T.000 B.000(C) W.00 H.00',
    'description' =>
        'テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト',
    'gradientId' => null,
    'gradientStart' => '#FFF2D7',
    'gradientEnd' => '#BD902F',
    'overlayOpacity' => '0.7',
    'nameColor' => '#FFFFFF',
    'measurementsColor' => '#FFFFFF',
    'iconSvg' => '<svg xmlns="http://www.w3.org/2000/svg" width="26.5" height="24.24" viewBox="0 0 14 13" fill="none">
            <path d="M11.6617 10.7449H9.32935V8.59588H11.6617V10.7449ZM8.16318 5.37243H5.83084V7.5214H8.16318V5.37243ZM11.6617 5.37243H9.32935V7.5214H11.6617V5.37243ZM4.66467 8.59588H2.33234V10.7449H4.66467V8.59588ZM8.16318 8.59588H5.83084V10.7449H8.16318V8.59588ZM4.66467 5.37243H2.33234V7.5214H4.66467V5.37243ZM13.994 1.07449V12.8938H0V1.07449H1.74925V1.61173C1.74925 2.2027 2.27403 2.68621 2.91542 2.68621C3.55681 2.68621 4.08159 2.2027 4.08159 1.61173V1.07449H9.91243V1.61173C9.91243 2.2027 10.4372 2.68621 11.0786 2.68621C11.72 2.68621 12.2448 2.2027 12.2448 1.61173V1.07449H13.994ZM12.8279 4.29794H1.16617V11.8193H12.8279V4.29794ZM11.6617 0.537243C11.6617 0.214897 11.4284 0 11.0786 0C10.7287 0 10.4955 0.214897 10.4955 0.537243V1.61173C10.4955 1.93407 10.7287 2.14897 11.0786 2.14897C11.4284 2.14897 11.6617 1.93407 11.6617 1.61173V0.537243ZM3.49851 1.61173C3.49851 1.93407 3.26527 2.14897 2.91542 2.14897C2.56557 2.14897 2.33234 1.93407 2.33234 1.61173V0.537243C2.33234 0.214897 2.56557 0 2.91542 0C3.26527 0 3.49851 0.214897 3.49851 0.537243V1.61173Z" fill="url(#paint0_linear_10_3122)"/>
            <defs>
                <linearGradient id="paint0_linear_10_3122" x1="6.99701" y1="0" x2="6.99701" y2="12.8938" gradientUnits="userSpaceOnUse">
                <stop offset="0.206731" stop-color="#FFF2D7"/>
                <stop offset="1" stop-color="#BD902F"/>
                </linearGradient>
            </defs>
            </svg>',
    'gradient' => true,
    'datetextColor' => '#EAF205',
    'cardGradient' => true,
    'carddividerColor' => '#FFF',
    'carddividerverticalGradient' => true,
    'carddividerverticalColor' => '#05F2DB',
    'href_cast_profile' => null,
    'newGirlCardBgLeftColor' => 'rgba(0,0,0,0.7)',
])

@php
    $uniqueId = $gradientId ?? 'calendar-gradient-' . uniqid();
@endphp

<a class="new-girl-card" href="{{ $href_cast_profile }}">
    <div class="new-girl-card-left">
        <div class="new-girl-card-bg-left">
            <img src="{{ asset($backgroundImage) }}" alt="Background" class="card-bg-image">
            <div class="card-bg-overlay" style="background: {{ $newGirlCardBgLeftColor }};"></div>
        </div>
        <div class="new-girl-card-date">
            @if ($iconSvg)
                {!! $iconSvg !!}
            @else
                <img src="{{ asset($iconImage) }}" alt="{{ $iconAlt }}" class="schedule-info-icon">
            @endif
            @if ($gradient)
                <p class="date-text"
                    style="background: linear-gradient(180deg, {{ $gradientStart }} 20.67%, {{ $gradientEnd }} 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    {{ $date }} <span class="date-label">{{ $dateLabel }}</span>
                </p>
            @else
                <p class="date-text"
                    style="color: {{ $datetextColor }}; background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: {{ $datetextColor }};">
                    {{ $date }} <span class="date-label">{{ $dateLabel }}</span>
                </p>
            @endif
        </div>
        @if ($cardGradient)
            <div class="new-girl-card-divider"
                style="background: linear-gradient(180deg, {{ $gradientStart }} 20.67%, {{ $gradientEnd }} 100%);">
            </div>
        @else
            <div class="new-girl-card-divider" style="background: {{ $carddividerColor }};"></div>
        @endif
        <div class="new-girl-card-info">
            <div class="card-name-section">
                <p class="card-name" style="color: {{ $nameColor }};">{{ $name }}</p>
            </div>
            <p class="card-measurements pc-only" style="color: {{ $measurementsColor }};">
                {{ $age }}歳／{{ $measurements }}</p>
            <p class="card-measurements sp-only" style="color: {{ $measurementsColor }};">
                {{ $age }}歳</p>
            <p class="card-measurements sp-only" style="color: {{ $measurementsColor }};">
                {{ $measurements }}</p>
            <div class="card-description">
                <p>{{ $description }}</p>
            </div>
        </div>
    </div>
    @if ($carddividerverticalGradient)
        <div class="new-girl-card-divider-vertical"
            style="background: linear-gradient(180deg, {{ $gradientStart }} 20.67%, {{ $gradientEnd }} 100%);">
            <p class="divider-name-text">{{ $nameVertical }}</p>
        </div>
    @else
        <div class="new-girl-card-divider-vertical" style="background: {{ $carddividerverticalColor }};">
            <p class="divider-name-text">{{ $nameVertical }}</p>
        </div>
    @endif
    <div class="new-girl-card-right">
        <img src="{{ asset($photoImage) }}" alt="Cast Photo" class="card-photo">
    </div>
</a>

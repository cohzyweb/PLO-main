@props([
    'iconImage' => 'assets/img/shop/calender-g.png',
    'iconSvg' => null,
    'iconAlt' => 'Icon',
    'title' => '出勤情報',
    'gradient' => true,
    'description' => '本日出勤するキャスト一覧になります。',
    'buttonText' => '一覧を見る',
    'backgroundColor' => '#FFFFFF',
    'borderColor' => '#2A1A08',
    'textColor' => '#2A1A08',
    'underlineGradientStart' => '#FFF2D7',
    'underlineGradientEnd' => '#BD902F',
    'buttonHref' => null,
    'buttonOnClick' => null,
    'responsiveVariant' => 'schedule',
    'underlineColor' => '#05F2DB',
])

<div class="schedule-info schedule-info-{{ $responsiveVariant }}" style="background: {{ $backgroundColor }};">
    <div class="schedule-info-header" style="background: {{ $backgroundColor }};">
        @if ($iconSvg)
            {!! $iconSvg !!}
        @else
            <img src="{{ asset($iconImage) }}" alt="{{ $iconAlt }}" class="schedule-info-icon">
        @endif
        <p class="schedule-info-title" style="color: {{ $textColor }};">{{ $title }}</p>
    </div>
    <div class="schedule-info-description"
        style="background: {{ $backgroundColor }}; border-left-color: {{ $borderColor }};">
        <p style="color: {{ $textColor }};">{{ $description }}</p>
    </div>
    @if ($buttonHref)
        <a href="{{ $buttonHref }}" class="schedule-info-button"
            style="background: {{ $backgroundColor }}; border-left-color: {{ $borderColor }};">
            <p style="color: {{ $textColor }};">{{ $buttonText }}</p>
            @if ($gradient)
                <div class="schedule-info-underline"
                    style="background: linear-gradient(180deg, {{ $underlineGradientStart }} 20.67%, {{ $underlineGradientEnd }} 100%);">
                </div>
            @else
                <div class="schedule-info-underline" style="background: {{ $underlineColor }};"></div>
            @endif
        </a>
    @else
        <div class="schedule-info-button"
            style="background: {{ $backgroundColor }}; border-left-color: {{ $borderColor }};"
            @if ($buttonOnClick) onclick="{{ $buttonOnClick }}" @endif>
            <p style="color: {{ $textColor }};">{{ $buttonText }}</p>
            @if ($gradient)
                <div class="schedule-info-underline"
                    style="background: linear-gradient(180deg, {{ $underlineGradientStart }} 20.67%, {{ $underlineGradientEnd }} 100%);">
                </div>
            @else
                <div class="schedule-info-underline" style="background: {{ $underlineColor }};"></div>
            @endif
        </div>
    @endif
</div>

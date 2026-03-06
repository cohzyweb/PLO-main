@props([
    'text' => 'schedule',
    'backgroundColor' => '#2A1A08',
    'gradient' => true,
    'gradientStart' => '#FFF2D7',
    'gradientEnd' => '#BD902F',
    'color' => '#FFF2D7',
    'letterSpacing' => '6px',
    'opacity' => null,
    'small' => false,
    'backgroundGradient' => false,
])
@if ($backgroundGradient)
    <div class="section-title @if ($small) section-title-small @endif"
        style="background: {{ $backgroundColor }}; @if ($opacity) opacity: {{ $opacity }}; @endif">
        @if ($gradient)
            <h2
                style="background: linear-gradient(180deg, {{ $gradientStart }} 20.67%, {{ $gradientEnd }} 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: {{ $letterSpacing }};">
                {{ $text }}
            </h2>
        @else
            <h2
                style="color: {{ $color }}; -webkit-text-fill-color: {{ $color }}; letter-spacing: {{ $letterSpacing }};">
                {{ $text }}
            </h2>
        @endif
    </div>
@else
    <div class="section-title @if ($small) section-title-small @endif"
        style="background-color: {{ $backgroundColor }}; @if ($opacity) opacity: {{ $opacity }}; @endif">
        @if ($gradient)
            <h2
                style="background: linear-gradient(180deg, {{ $gradientStart }} 20.67%, {{ $gradientEnd }} 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: {{ $letterSpacing }};">
                {{ $text }}
            </h2>
        @else
            <h2
                style="color: {{ $color }}; -webkit-text-fill-color: {{ $color }}; letter-spacing: {{ $letterSpacing }};">
                {{ $text }}
            </h2>
        @endif
    </div>
@endif

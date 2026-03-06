@props([
    'href_cast_profile' => null,
    'backgroundImage' => 'assets/img/shops/shizuku/coming-soon-card.png',
    'frameImage' => 'assets/img/shops/shizuku/card-frame.png',
    'badgeShift' => '本日出勤',
    'badgeTime' => '12:00〜24:00',
    'statusIcon' => '<svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.5 0C5.6075 0 0 5.6075 0 12.5C0 19.3925 5.6075 25 12.5 25C19.3925 25 25 19.3925 25 12.5C25 5.6075 19.3925 0 12.5 0ZM19.6875 13.75H11.25V5H13.75V11.25H19.6875V13.75Z" fill="#FFE600"/>
                    </svg>',
    'statusText' => '待機中',
    'name' => 'のんたん（20）',
    'measurements' => 'T.160 B.85(C) W.60 H.83',
    'message' => 'キャストメッセージが甲斐キキキャ',
    'badgeBorderColor' => '#B90000',
    'badgeBgColor' => '#B90000',
    'badgeTextColor' => '#FFDA89',
    'badgeTimeColor' => '#2A1A08',
    'statusTextColor' => '#FFE500',
    'nameColor' => '#FFFFFF',
    'measurementsColor' => '#FFFFFF',
    'messageGradientStart' => '#FFF2D7',
    'messageGradientEnd' => '#BD902F',
    'messageGradient' => true,
    'messageColor' => '#FFFFFF',
    'contentGradientStart' => 'rgba(42, 26, 8, 0.80)',
    'contentGradientEnd' => 'rgba(0, 0, 0, 0.00)',
    'contentGradientStartPercent' => '58.65%',
    'contentGradientEndPercent' => '100%',
    'variant' => 'schedule', // 'schedule' or 'castlist' or 'castlist_top'
])

<a class="schedule-card @if ($variant === 'castlist' || $variant === 'castlist_top') castlist-card @endif"
    @if ($href_cast_profile) href="{{ $href_cast_profile }}" @endif>
    <div class="schedule-card-image @if ($variant === 'castlist' || $variant === 'castlist_top') castlist-card-image @endif">
        <img src="{{ asset($backgroundImage) }}" alt="Background" class="card-bg">
        <img src="{{ asset($frameImage) }}" alt="Frame" class="card-frame">
        {{-- <div class="schedule-card-content @if ($variant === 'castlist') castlist-card-content @endif"
            style="background: linear-gradient(90deg, {{ $contentGradientStart }} {{ $contentGradientStartPercent }}, {{ $contentGradientEnd }} {{ $contentGradientEndPercent }});"> --}}
        @if ($variant === 'schedule' || $variant === 'castlist')
            <div class="schedule-card-content @if ($variant === 'castlist') castlist-card-content @endif"
                style="background: linear-gradient(90deg, {{ $contentGradientStart }} {{ $contentGradientStartPercent }}, {{ $contentGradientEnd }} {{ $contentGradientEndPercent }});">
                @if ($badgeTime != '')
                    <div class="schedule-card-badge @if ($variant === 'castlist') castlist-card-badge @endif"
                        style="border-color: {{ $badgeBorderColor }};">
                        <div class="badge-red-bg" style="background: {{ $badgeBgColor }};">
                            <span class="badge-shift" style="color: {{ $badgeTextColor }};">{{ $badgeShift }}</span>
                        </div>
                        <div class="badge-content">
                            <span class="badge-time" style="color: {{ $badgeTimeColor }};">{{ $badgeTime }}</span>
                        </div>
                    </div>
                @else
                    <div class="schedule-card-badge @if ($variant === 'castlist') castlist-card-badge @endif"
                        style="border-color: #fff;">
                        <div class="badge-content-empty">
                            <span class="badge-time" style="color: {{ $badgeTimeColor }};">本日おやすみ</span>
                        </div>
                    </div>
                @endif
            </div>
        @elseif($variant === 'castlist_top')
            <div class="castlist-top-card-content"
                style="background: linear-gradient(90deg, {{ $contentGradientStart }} {{ $contentGradientStartPercent }}, {{ $contentGradientEnd }} {{ $contentGradientEndPercent }});">
                @if ($badgeTime != '')
                    <div class="schedule-card-badge @if ($variant === 'castlist_top') castlist-top-card-badge @endif"
                        style="border-color: {{ $badgeBorderColor }};">
                        <div class="badge-red-bg" style="background: {{ $badgeBgColor }};">
                            <span class="badge-shift" style="color: {{ $badgeTextColor }};">{{ $badgeShift }}</span>
                        </div>
                        <div class="badge-content">
                            <span class="badge-time" style="color: {{ $badgeTimeColor }};">{{ $badgeTime }}</span>
                        </div>
                        {{-- <div class="badge-red-bg" style="background: {{ $badgeBgColor }};">
                        <span class="badge-shift" style="color: {{ $badgeTextColor }};">{{ $badgeShift }}</span>
                    </div>
                    <div class="badge-content">
                        <span class="badge-time" style="color: {{ $badgeTimeColor }};">{{ $badgeTime }}</span>
                    </div> --}}
                    </div>
                @else
                    <div class="schedule-card-badge @if ($variant === 'castlist_top') castlist-top-card-badge @endif"
                        style="border-color: #fff;">
                        {{-- <div class="badge-red-bg" style="background: {{ $badgeBgColor }};">
                        <span class="badge-shift" style="color: {{ $badgeTextColor }};">{{ $badgeShift }}</span>
                    </div> --}}
                        <div class="badge-content-empty">
                            <span class="badge-time" style="color: {{ $badgeTimeColor }};">本日おやすみ</span>
                        </div>
                    </div>
                @endif
                <div class="castlist-top-card-info sp-only">
                    <p class="schedule-card-name @if ($variant === 'castlist' || $variant === 'castlist_top') castlist-card-name @endif"
                        style="color: {{ $nameColor }};">{{ $name }}</p>
                    <p class="schedule-card-measurements @if ($variant === 'castlist' || $variant === 'castlist_top') castlist-card-measurements @endif"
                        style="color: {{ $measurementsColor }};">{{ $measurements }}</p>
                </div>
            </div>
        @endif
    </div>
    <div
        class="schedule-card-info @if ($variant === 'castlist' || $variant === 'castlist_top') castlist-card-info @endif @if ($variant === 'castlist_top') pc-only @endif">
        @if ($variant === 'schedule')
            <div class="schedule-card-status @if ($variant === 'castlist' || $variant === 'castlist_top') castlist-card-status @endif">
                {!! $statusIcon !!}
                <span class="status-text" style="color: {{ $statusTextColor }};">{{ $statusText }}</span>
            </div>
        @endif
        <p class="schedule-card-name @if ($variant === 'castlist' || $variant === 'castlist_top') castlist-card-name @endif"
            style="color: {{ $nameColor }};">{{ $name }}</p>
        <p class="schedule-card-measurements @if ($variant === 'castlist' || $variant === 'castlist_top') castlist-card-measurements @endif"
            style="color: {{ $measurementsColor }};">{{ $measurements }}</p>
        @if ($messageGradient)
          <div class="schedule-card-message-container">
            <textarea class="schedule-card-message @if ($variant === 'castlist' || $variant === 'castlist_top') castlist-card-message @endif" style="background: linear-gradient(180deg, {{ $messageGradientStart }} 20.67%, {{ $messageGradientEnd }} 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{!! $message !!}</textarea>
          </div>
        @else
        <div class="schedule-card-message-container">
            <textarea class="schedule-card-message @if ($variant === 'castlist' || $variant === 'castlist_top') castlist-card-message @endif"
                style="color: {{ $messageColor }}; -webkit-text-fill-color: {{ $messageColor }};">{!! $message !!}</textarea>
                {{-- <span
                    class="@if ($variant === 'schedule') schedule-card-message-text @else schedule-card-message-text-castlist @endif"
                    style="color: {{ $messageColor }}; -webkit-text-fill-color: {{ $messageColor }};">{{ $message }}　{{ $message }}</span> --}}
                {{-- <span class="schedule-card-message-text"
                    style="color: {{ $messageColor }}; -webkit-text-fill-color: {{ $messageColor }};">{!! $message !!}</span> --}}
        </div>

        @endif
    </div>

</a>

@once
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const messageElements = document.querySelectorAll('.schedule-card-message');
                const scrollSpeed = 50; // ピクセル/秒の固定速度

                messageElements.forEach(function(messageEl) {
                    const textSpan = messageEl.querySelector('.schedule-card-message-text');
                    // castlistバリアントの場合はスライドアニメーションを適用しない
                    if (!textSpan || textSpan.classList.contains('schedule-card-message-text-castlist')) return;

                    // メッセージの幅を取得（2回繰り返しているので、実際の幅は scrollWidth）
                    const messageWidth = textSpan.scrollWidth;

                    // メッセージを2回繰り返しているので、50%移動すれば1周
                    const distance = messageWidth / 2;
                    // 一定の速度で移動するためのアニメーション時間を計算
                    const duration = distance / scrollSpeed;

                    // 常にアニメーションを適用（メッセージの長さに関係なく）
                    textSpan.style.animation = `scroll-left ${duration}s linear infinite`;
                });
            });
        </script>
    @endpush
@endonce

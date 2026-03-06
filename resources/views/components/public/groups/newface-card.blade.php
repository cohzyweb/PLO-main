@props([
    'date' => '12/25',
    'joinDate' => '2025.00.00',
    'name' => 'キャスト名',
    'age' => '00',
    'height' => '160',
    'bust' => '85',
    'braSize' => 'C',
    'waist' => '60',
    'hip' => '83',
    'message' => '女の子メッセージ',
    'shopName' => 'ラブストーリー',
    'shopSlug' => 'lovestory',
    'imageUrl' => null,
    'imageUrls' => [],
    'frameImageUrl' => null,
    'profileUrl' => '#',
    'showNew' => true,
])

@php
    $formattedDate = $date;
    if (is_string($showNew)) {
        $showNew = $showNew === 'true' || $showNew === '1';
    }

    $normalizeImageUrl = function ($url) {
        if (blank($url)) {
            return null;
        }

        if (\Illuminate\Support\Str::startsWith($url, ['http://', 'https://'])) {
            return $url;
        }

        $trimmedUrl = ltrim($url, '/');
        if (\Illuminate\Support\Str::startsWith($trimmedUrl, ['storage/', 'assets/'])) {
            return asset($trimmedUrl);
        }

        return asset('storage/' . $trimmedUrl);
    };

	    $normalizedImageUrls = collect(is_array($imageUrls) ? $imageUrls : [])
	        ->map($normalizeImageUrl)
	        ->filter()
	        ->values();

	    if ($normalizedImageUrls->isEmpty() && !empty($imageUrl)) {
	        $normalizedImageUrls = collect([$normalizeImageUrl($imageUrl)])->filter()->values();
	    }
	    $displayImageUrl = $normalizedImageUrls->first();
	@endphp

	<div class="newface-card {{ $shopSlug ? 'newface-card--' . $shopSlug : '' }}">
	    <div class="newface-card-image" aria-label="{{ $name }}">
	        @if($displayImageUrl)
	            <img src="{{ $displayImageUrl }}" alt="{{ $name }}" class="newface-card-image-photo">
	        @else
	            <div class="newface-card-image-placeholder" aria-hidden="true"></div>
	        @endif

        @if(!empty($frameImageUrl))
            <img src="{{ $frameImageUrl }}" alt="" class="newface-card-image-frame" aria-hidden="true">
        @endif
    </div>

    <div class="newface-card-info">
        <div class="newface-card-header">
            <div class="newface-card-date-new">
                <span class="newface-card-date">{{ $formattedDate }}</span>
                @if($showNew)
                    <span class="newface-card-new">New</span>
                @endif
            </div>
            <div class="newface-card-divider"></div>
        </div>

        <div class="newface-card-stats-group">
            <h3 class="newface-card-name">{{ $name }}（{{ $age }}）</h3>
            <p class="newface-card-measurements">
                T.{{ $height }} B.{{ $bust }}({{ $braSize }}) W.{{ $waist }} H.{{ $hip }}
            </p>
        </div>

        <div class="newface-card-message">
            <div class="newface-card-message-content">
                <p class="newface-card-message-text">{{ $message }}</p>
            </div>
        </div>

        <a href="{{ $profileUrl }}" class="newface-card-shop-button">
            <span class="newface-card-shop-button-text">{{ $shopName }}</span>
        </a>
    </div>
</div>

@once
  @vite(['resources/scss/groups/newface-card.scss'])
@endonce

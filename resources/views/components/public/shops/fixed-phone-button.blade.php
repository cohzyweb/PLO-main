@props([
    'phoneNumber' => '0115338988',
    'phoneDisplay' => '011-533-8988',
    'hours' => '8:30〜24:00まで',
    'mobileText' => 'TEL',
    'mobileImage' => 'assets/img/shops/shizuku/TEL-y1.png',
    'iconSvg' => '<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                    <path d="M23.5316 24.9894C20.6394 24.9894 17.7762 24.3646 14.9422 23.1152C12.1083 21.8657 9.5339 20.084 7.21915 17.7702C4.90439 15.4564 3.12274 12.888 1.8742 10.0652C0.625659 7.24229 0.000925532 4.37314 0 1.45771V0H8.19096L9.47513 6.9762L5.51848 10.9676C6.02753 11.8699 6.59441 12.7261 7.21915 13.5359C7.84388 14.3457 8.51489 15.0977 9.23218 15.7919C9.90319 16.4629 10.6381 17.1052 11.4368 17.7188C12.2355 18.3325 13.0972 18.9049 14.0218 19.4362L18.0479 15.4101L24.9894 16.8331V24.9894H23.5316Z" fill="#FFF"/>
                  </svg>',
])

<a href="tel:{{ $phoneNumber }}" class="fixed-phone-button">
    <div class="desktop-content">
        <div class="flex justify-center">
            <span class="desktop-icon">{!! $iconSvg !!}</span>
            <p class="phone-number">{{ $phoneDisplay }}</p>
        </div>
        <p class="phone-hours">
            <span class="desktop-hours">{{ $hours }}</span>
        </p>
    </div>
    <img src="{{ asset($mobileImage) }}" alt="TEL" class="mobile-image">
</a>

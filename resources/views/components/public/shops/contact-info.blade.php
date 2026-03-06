@props([
    'phoneIcon' => 'assets/img/shops/shizuku/phone.png',
    'phoneNumber' => '011-533-8988',
    'email' => '@ShizukuHealth',
    'address' => '〒064-0806</br> 北海道札幌市中央区南6条西5丁目',
    'hours' => '9:00 ~ 0:00',
    'creditText' => 'クレジット決済可能',
    'note' => '電話予約の対応時間は朝8:30~となります。',
    'phoneBackground' => 'linear-gradient(180deg, rgba(255, 242, 215, 0.8) 20.67%, rgba(189, 144, 47, 0.8) 100%)',
    'addressBackground' => '#160B00',
])

<div class="contact-info">
    <div class="contact-wrapper">
        <div class="contact-phone" style="background: {{ $phoneBackground }};">
            {{-- <div class="contact-phone"> --}}
            <div class="contact-phone-content">
                <div class="contact-phone-main">
                    <div class="contact-phone-icon">
                        <img src="{{ asset($phoneIcon) }}" alt="Phone">
                    </div>
                    <p class="contact-phone-number">{{ $phoneNumber }}</p>
                </div>
                <div class="contact-email">
                    <p>{{ $email }}</p>
                </div>
            </div>
        </div>
        <div class="contact-address" style="background-color: {{ $addressBackground }};">
            <div class="contact-address-content">
                <p class="contact-address-text">{!! $address !!}</p>
                <div class="contact-buttons">
                    <button class="contact-button-hours">
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.5 3V7.5H4.125M14.25 7.5C14.25 8.38642 14.0754 9.26417 13.7362 10.0831C13.397 10.9021 12.8998 11.6462 12.273 12.273C11.6462 12.8998 10.9021 13.397 10.0831 13.7362C9.26417 14.0754 8.38642 14.25 7.5 14.25C6.61358 14.25 5.73583 14.0754 4.91689 13.7362C4.09794 13.397 3.35382 12.8998 2.72703 12.273C2.10023 11.6462 1.60303 10.9021 1.26381 10.0831C0.924594 9.26417 0.75 8.38642 0.75 7.5C0.75 5.70979 1.46116 3.9929 2.72703 2.72703C3.9929 1.46116 5.70979 0.75 7.5 0.75C9.29021 0.75 11.0071 1.46116 12.273 2.72703C13.5388 3.9929 14.25 5.70979 14.25 7.5Z"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>{{ $hours }}</p>
                    </button>
                    <button class="contact-button-credit">
                        <p>{{ $creditText }}</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-note">
        <p>{{ $note }}</p>
    </div>
</div>

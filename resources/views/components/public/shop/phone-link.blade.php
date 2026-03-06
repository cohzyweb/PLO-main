@props(['shop'])
<div class="phone-link-container">
  <div class="phone-link-wrapper">
    <div class="phone-link-note">
      <span class="phone-link-note-text">朝8:30〜予約可能</span>
    </div>
    <a href="tel:{{ $shop->tel }}" class="phone-link --{{ $shop->slug }}">
      <img src="{{ asset('assets/img/shop/phone-icon.svg') }}" alt="電話" class="phone-icon">
      <span>{{ $shop->tel }}</span>
    </a>
  </div>
</div>

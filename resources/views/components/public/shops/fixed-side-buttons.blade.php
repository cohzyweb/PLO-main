@props([
    'newGirlImage' => 'assets/img/shops/shizuku/side-new-girl.png',
    'newGirlAlt' => '新人情報',
    'newGirlLink' => '#',
    'recruitImage' => 'assets/img/shops/shizuku/side-recruit.png',
    'recruitAlt' => '女の子募集中',
    'recruitLink' => '#',
])

<div class="fixed-side-buttons">
    <a href="{{ $newGirlLink }}" class="side-button side-button-new">
        <img src="{{ asset($newGirlImage) }}" alt="{{ $newGirlAlt }}">
    </a>
    <a href="{{ $recruitLink }}" class="side-button side-button-recruit">
        <img src="{{ asset($recruitImage) }}" alt="{{ $recruitAlt }}">
    </a>
</div>


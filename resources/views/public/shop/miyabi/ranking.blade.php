<x-miyabi-page-layout page-title="RANKING" page-subtitle="女の子ランキング" breadcrumb="すすきの Luxury Room 雅 ＞ トップページ ＞ 女の子ランキング"
    :assets="['resources/scss/shops/miyabi/ranking.scss', 'resources/js/shops/shizuku/ranking.js']" :banners="$banners">
    <section class="ranking-section">
        <form action="{{ route('public.shops.shop.ranking', ['shop' => 'miyabi']) }}" method="get"
            class="ranking-searchbar" name="ranking-searchbar">
            <select name="rank_id" onchange="this.form.submit()"
                class="ranking-filter-btn-mobile ranking-filter-btn-active">
                @foreach ($ranks as $rank)
                    <option value="{{ $rank->id }}" {{ $rank->id == $rank_id ? 'selected' : '' }}>
                        {{ $rank->name }}</option>
                @endforeach
            </select>
            {{-- <button class="ranking-filter-btn-mobile ranking-filter-btn-active">
                <span>本指名ランキング</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7L12 13L18 7L20 9L12 17L4 9L6 7Z" fill="#2A1A08"/>
                </svg>
            </button> --}}
            <div class="ranking-filter-buttons-desktop">
                @foreach ($ranks as $rank)
                    <button
                        class="ranking-filter-btn {{ $rank->id == $rank_id ? 'ranking-filter-btn-active' : '' }} ranking-btn-{{ $rank->id }}"
                        name="rank_id" value="{{ $rank->id }}"
                        onclick="ranking_filter_btn_click({{ $rank->id }})">
                        <span>{{ $rank->name }}</span>
                    </button>
                @endforeach
                <script>
                    function ranking_filter_btn_click(rank_id) {
                        document.querySelectorAll('.ranking-filter-btn').forEach(btn => {
                            btn.classList.remove('ranking-filter-btn-active');
                        });
                        document.querySelector('.ranking-btn-{{ $rank->id }}').classList.add('ranking-filter-btn-active');
                        // document.querySelector('.ranking-filter-btn-active').classList.add('ranking-filter-btn');
                        document.querySelector('form[name="ranking-searchbar"]').submit();
                    }
                </script>
                {{-- <button class="ranking-filter-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7L12 13L18 7L20 9L12 17L4 9L6 7Z" fill="#A58C1B"/>
                      </svg>
                    <span>巨乳ランキング</span>
                </button>
                <button class="ranking-filter-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7L12 13L18 7L20 9L12 17L4 9L6 7Z" fill="#A58C1B"/>
                      </svg>
                    <span>〇〇ランキング</span>
                </button>
                <button class="ranking-filter-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7L12 13L18 7L20 9L12 17L4 9L6 7Z" fill="#A58C1B"/>
                    </svg>
                    <span>〇〇ランキング</span>
                </button>
                <button class="ranking-filter-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 7L12 13L18 7L20 9L12 17L4 9L6 7Z" fill="#A58C1B"/>
                      </svg>
                    <span>〇〇ランキング</span>
                </button> --}}
            </div>
        </form>
        <div class="ranking-list-no1">
            <div class="ranking-no1-header">
                <div class="ranking-no1-image">
                    <img src="{{ asset('assets/img/shops/shizuku/no1.png') }}" alt="ranking-no1">
                </div>
                <div class="no1-person-info pc-only">
                    <h2 class="no1-person-name">
                        {{ $rankings[0]->cast->name }}
                    </h2>
                    <p class="no1-person-details">
                        {{ $rankings[0]->cast->age }}歳／T.{{ $rankings[0]->cast->height }}
                        B.{{ $rankings[0]->cast->bust }}({{ $rankings[0]->cast->bra_size }})
                        W.{{ $rankings[0]->cast->waist }} H.{{ $rankings[0]->cast->hip }}
                    </p>
                </div>
                <div class="no1-person-services pc-only">
                    <p>
                        {{ $rankings[0]->cast->appeal_point }}
                    </p>
                </div>
            </div>
            <a class="rankig-no1-content" href="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $rankings[0]->cast_id]) }}">
                <div class="ranking-no1-content-item">
                    <div class="ranking-no1-content-item-image">
                        <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}" alt="ranking-frame"
                            class="ranking-frame">
                        <img src="{{ asset('storage/' . $rankings[0]->cast->gallery_1) }}" alt="ranking-image"
                            class="ranking-image">
                    </div>
                </div>
                <div class="ranking-no1-content-item">
                    <div class="ranking-no1-content-item-image">
                        <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}" alt="ranking-frame"
                            class="ranking-frame">
                        <img src="{{ asset('storage/' . $rankings[0]->cast->gallery_2) }}" alt="ranking-image"
                            class="ranking-image">
                    </div>
                </div>
                <div class="ranking-no1-content-item">
                    <div class="ranking-no1-content-item-image">
                        <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}" alt="ranking-frame"
                            class="ranking-frame">
                        <img src="{{ asset('storage/' . $rankings[0]->cast->gallery_3) }}" alt="ranking-image"
                            class="ranking-image">
                    </div>
                </div>
            </a>
            <div class="no1-person-info-container sp-only">
                <div class="no1-person-info">
                    <h2 class="no1-person-name">
                        {{ $rankings[0]->cast->name }}
                    </h2>
                    <p class="no1-person-details">
                        {{ $rankings[0]->cast->age }}歳／T.{{ $rankings[0]->cast->height }}
                        B.{{ $rankings[0]->cast->bust }}({{ $rankings[0]->cast->bra_size }})
                        W.{{ $rankings[0]->cast->waist }} H.{{ $rankings[0]->cast->hip }}
                    </p>
                </div>
                <div class="no1-person-services">
                    <p>
                        {!! nl2br($rankings[0]->cast->appeal_point) !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="ranking-list-no23">
            <div class="ranking-no23-container">
                <div class="ranking-no23-header">
                    <div class="ranking-no23-image">
                        <img src="{{ asset('assets/img/shops/shizuku/no2.png') }}" alt="ranking-no2">
                    </div>
                    <div class="no23-person-info pc-only">
                        <h2 class="no23-person-name">
                            {{ $rankings[1]->cast->name }}
                        </h2>
                        <p class="no23-person-details pc-only">
                            {{ $rankings[1]->cast->age }}歳／T.{{ $rankings[1]->cast->height }}
                            B.{{ $rankings[1]->cast->bust }}({{ $rankings[1]->cast->bra_size }})
                            W.{{ $rankings[1]->cast->waist }} H.{{ $rankings[1]->cast->hip }}
                        </p>
                    </div>
                </div>
                <a class="ranking-no23-content" href="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $rankings[1]->cast_id]) }}">
                    <div class="ranking-no23-content-item">
                        <div class="ranking-no23-content-item-image">
                            <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}" alt="ranking-frame"
                                class="ranking-frame">
                            <img src="{{ asset('storage/' . $rankings[1]->cast->gallery_1) }}" alt="ranking-image"
                                class="ranking-image">
                        </div>
                    </div>
                    <div class="ranking-no23-content-item pc-only">
                        <div class="ranking-no23-content-item-image">
                            <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}" alt="ranking-frame"
                                class="ranking-frame">
                            <img src="{{ asset('storage/' . $rankings[1]->cast->gallery_2) }}" alt="ranking-image"
                                class="ranking-image">
                        </div>
                    </div>
                </a>
                <div class="no23-person-info-container sp-only">
                    <div class="no23-person-info">
                        <h2 class="no23-person-name">
                            {{ $rankings[1]->cast->name }}
                        </h2>
                        <p class="no23-person-details">
                            {{ $rankings[1]->cast->age }}歳／T.{{ $rankings[1]->cast->height }}
                            B.{{ $rankings[1]->cast->bust }}({{ $rankings[1]->cast->bra_size }})
                            W.{{ $rankings[1]->cast->waist }} H.{{ $rankings[1]->cast->hip }}
                        </p>
                    </div>
                </div>
                <div class="ranking-no23-services">
                    <p>
                        {{ $rankings[1]->cast->appeal_point }}
                    </p>
                </div>
            </div>
            <div class="ranking-no23-container">
                <div class="ranking-no23-header">
                    <div class="ranking-no23-image">
                        <img src="{{ asset('assets/img/shops/shizuku/no3.png') }}" alt="ranking-no2">
                    </div>
                    <div class="no23-person-info pc-only">
                        <h2 class="no23-person-name">
                            {{ $rankings[2]->cast->name }}
                        </h2>
                        <p class="no23-person-details pc-only">
                            {{ $rankings[2]->cast->age }}歳／T.{{ $rankings[2]->cast->height }}
                            B.{{ $rankings[2]->cast->bust }}({{ $rankings[2]->cast->bra_size }})
                            W.{{ $rankings[2]->cast->waist }} H.{{ $rankings[2]->cast->hip }}
                        </p>
                    </div>
                </div>
                <a class="ranking-no23-content" href="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $rankings[2]->cast_id]) }}">
                    <div class="ranking-no23-content-item">
                        <div class="ranking-no23-content-item-image">
                            <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}" alt="ranking-frame"
                                class="ranking-frame">
                            <img src="{{ asset('storage/' . $rankings[2]->cast->gallery_1) }}" alt="ranking-image"
                                class="ranking-image">
                        </div>
                    </div>
                    <div class="ranking-no23-content-item pc-only">
                        <div class="ranking-no23-content-item-image">
                            <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}" alt="ranking-frame"
                                class="ranking-frame">
                            <img src="{{ asset('storage/' . $rankings[2]->cast->gallery_2) }}" alt="ranking-image"
                                class="ranking-image">
                        </div>
                    </div>
                </a>
                <div class="no23-person-info-container sp-only">
                    <div class="no23-person-info">
                        <h2 class="no23-person-name">
                            {{ $rankings[2]->cast->name }}
                        </h2>
                        <p class="no23-person-details">
                            {{ $rankings[2]->cast->age }}歳／T.{{ $rankings[2]->cast->height }}
                            B.{{ $rankings[2]->cast->bust }}({{ $rankings[2]->cast->bra_size }})
                            W.{{ $rankings[2]->cast->waist }} H.{{ $rankings[2]->cast->hip }}
                        </p>
                    </div>
                </div>
                <div class="ranking-no23-services">
                    <p>
                        {{ $rankings[2]->cast->appeal_point }}
                    </p>
                </div>
            </div>
        </div>
        <div class="ranking-list-no4567">
            <div class="ranking-no4567-container">
                <div class="ranking-no4567-header">
                    <div class="ranking-no4567-image">
                        <img src="{{ asset('assets/img/shops/shizuku/no4.png') }}" alt="ranking-no4">
                    </div>
                </div>
                <div class="ranking-no4567-content-container">
                    <a class="ranking-no4567-content" href="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $rankings[3]->cast_id]) }}">
                        <div class="ranking-no4567-content-item">
                            <div class="ranking-no4567-content-item-image">
                                <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}"
                                    alt="ranking-frame" class="ranking-frame">
                                <img src="{{ asset('storage/' . $rankings[3]->cast->gallery_1) }}"
                                    alt="ranking-image" class="ranking-image">
                            </div>
                        </div>
                    </a>
                    <div class="ranking-no4567-info-container">
                        <div class="ranking-no4567-info">
                            <h2 class="no4567-person-name">
                                {{ $rankings[3]->cast->name }}
                            </h2>
                            <p class="no4567-person-details">
                                {{ $rankings[3]->cast->age }}歳／T.{{ $rankings[3]->cast->height }}
                                B.{{ $rankings[3]->cast->bust }}({{ $rankings[3]->cast->bra_size }})
                                W.{{ $rankings[3]->cast->waist }} H.{{ $rankings[3]->cast->hip }}
                            </p>
                        </div>
                        <hr class="ranking-no4567-hr pc-only">
                        <div class="ranking-no4567-services">
                            <p>
                                {{ $rankings[3]->cast->appeal_point }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ranking-no4567-container">
                <div class="ranking-no4567-header">
                    <div class="ranking-no4567-image">
                        <img src="{{ asset('assets/img/shops/shizuku/no5.png') }}" alt="ranking-no4">
                    </div>
                </div>
                <div class="ranking-no4567-content-container">
                    <a class="ranking-no4567-content" href="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $rankings[4]->cast_id]) }}">
                        <div class="ranking-no4567-content-item">
                            <div class="ranking-no4567-content-item-image">
                                <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}"
                                    alt="ranking-frame" class="ranking-frame">
                                <img src="{{ asset('storage/' . $rankings[4]->cast->gallery_1) }}"
                                    alt="ranking-image" class="ranking-image">
                            </div>
                        </div>
                    </a>
                    <div class="ranking-no4567-info-container">
                        <div class="ranking-no4567-info">
                            <h2 class="no4567-person-name">
                                {{ $rankings[4]->cast->name }}
                            </h2>
                            <p class="no4567-person-details">
                                {{ $rankings[4]->cast->age }}歳／T.{{ $rankings[4]->cast->height }}
                                B.{{ $rankings[4]->cast->bust }}({{ $rankings[4]->cast->bra_size }})
                                W.{{ $rankings[4]->cast->waist }} H.{{ $rankings[4]->cast->hip }}
                            </p>
                        </div>
                        <hr class="ranking-no4567-hr pc-only">
                        <div class="ranking-no4567-services">
                            <p>
                                {{ $rankings[4]->cast->appeal_point }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ranking-no4567-container">
                <div class="ranking-no4567-header">
                    <div class="ranking-no4567-image">
                        <img src="{{ asset('assets/img/shops/shizuku/no6.png') }}" alt="ranking-no4">
                    </div>
                </div>
                <div class="ranking-no4567-content-container">
                    <a class="ranking-no4567-content" href="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $rankings[5]->cast_id]) }}">
                        <div class="ranking-no4567-content-item">
                            <div class="ranking-no4567-content-item-image">
                                <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}"
                                    alt="ranking-frame" class="ranking-frame">
                                <img src="{{ asset('storage/' . $rankings[5]->cast->gallery_1) }}"
                                    alt="ranking-image" class="ranking-image">
                            </div>
                        </div>
                    </a>
                    <div class="ranking-no4567-info-container">
                        <div class="ranking-no4567-info">
                            <h2 class="no4567-person-name">
                                {{ $rankings[5]->cast->name }}
                            </h2>
                            <p class="no4567-person-details">
                                {{ $rankings[5]->cast->age }}歳／T.{{ $rankings[5]->cast->height }}
                                B.{{ $rankings[5]->cast->bust }}({{ $rankings[5]->cast->bra_size }})
                                W.{{ $rankings[5]->cast->waist }} H.{{ $rankings[5]->cast->hip }}
                            </p>
                        </div>
                        <hr class="ranking-no4567-hr pc-only">
                        <div class="ranking-no4567-services">
                            <p>
                                {{ $rankings[5]->cast->appeal_point }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ranking-no4567-container">
                <div class="ranking-no4567-header">
                    <div class="ranking-no4567-image">
                        <img src="{{ asset('assets/img/shops/shizuku/no7.png') }}" alt="ranking-no4">
                    </div>
                </div>
                <div class="ranking-no4567-content-container">
                    <a class="ranking-no4567-content" href="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, 'id' => $rankings[6]->cast_id]) }}">
                        <div class="ranking-no4567-content-item">
                            <div class="ranking-no4567-content-item-image">
                                <img src="{{ asset('assets/img/shops/shizuku/card-frame-2.png') }}"
                                    alt="ranking-frame" class="ranking-frame">
                                <img src="{{ asset('storage/' . $rankings[6]->cast->gallery_1) }}"
                                    alt="ranking-image" class="ranking-image">
                            </div>
                        </div>
                    </a>
                    <div class="ranking-no4567-info-container">
                        <div class="ranking-no4567-info">
                            <h2 class="no4567-person-name">
                                {{ $rankings[6]->cast->name }}
                            </h2>
                            <p class="no4567-person-details">
                                {{ $rankings[6]->cast->age }}歳／T.{{ $rankings[6]->cast->height }}
                                B.{{ $rankings[6]->cast->bust }}({{ $rankings[6]->cast->bra_size }})
                                W.{{ $rankings[6]->cast->waist }} H.{{ $rankings[6]->cast->hip }}
                            </p>
                        </div>
                        <hr class="ranking-no4567-hr pc-only">
                        <div class="ranking-no4567-services">
                            <p>
                                {{ $rankings[6]->cast->appeal_point }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-miyabi-page-layout>

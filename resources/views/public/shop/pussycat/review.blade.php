<x-pussycat-page-layout page-title="REVIEW" page-subtitle="口コミ一覧" breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ 口コミ一覧"
    :assets="['resources/scss/shops/pussycat/review.scss']" :banners="$banners">
    <section class="review-section">
        <div class="review-header">
            <h2 class="review-header-label">名前で検索 </h2>
            <form action="{{ route('public.shops.shop.review', ['shop' => 'shizuku', 'id' => null]) }}" method="get"
                class="review-header-search">
                <select class="review-header-search-input" name="cast_id" onchange="cast_change(this.value)">
                    <option value="">女の子の名前</option>
                    @foreach ($casts as $cast)
                        <option value="{{ $cast->id }}" {{ $cast_id == $cast->id ? 'selected' : '' }}>
                            {{ $cast->name }}</option>
                    @endforeach
                </select>
                {{-- <div class="review-header-search-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path d="M7 10L12 15L17 10" stroke="#2A1A08" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div> --}}
            </form>
        </div>
        <div class="review-body">
            {{-- @for ($i = 0; $i < 6; $i++)
                <x-public.shops.review-card />
                <div class="review-row-border" data-index="{{ $i }}"></div>
            @endfor --}}
            @foreach ($reviews as $review)
                <x-public.shops.review-card girl-name="{{ $review->cast_name }}"
                    measurements="{{ $review->cast_age }}歳 / T.{{ $review->cast_height }} B.{{ $review->cast_bust }} ({{ $review->cast_cup }}) W.{{ $review->cast_waist }} H.{{ $review->cast_hip }}"
                    rating="{{ $review->review_average_point }}" girl-rating="{{ $review->review_cast_point }}"
                    play-rating="{{ $review->review_play_point }}" staff-rating="{{ $review->review_stuff_point }}"
                    frame-image="assets/img/shops/shizuku/card-frame.png"
                    girl-image="{{ asset('storage/' . $review->cast_gallery) }}"
                    reviewer-name="{{ $review->member_name }}" comment="{{ $review->review_content }}"
                    shop-reply-title="お店からの返信コメント" shop-reply="{{ $review->review_manager_comment }}" />
                <div class="review-row-border" data-index="{{ $loop->index }}"></div>
            @endforeach
        </div>
        <div class="review-pagination">
            {{ $reviews->links('pagination::shops') }}
            {{-- <nav class="page-navigation">
                <a href="#" class="page-nav-btn prev" aria-label="Previous">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <g clip-path="url(#clip0_559_4)">
                            <path d="M15.41 16.59L10.83 12L15.41 7.41L14 6L8 12L14 18L15.41 16.59Z" fill="#2A1A08" />
                        </g>
                        <defs>
                            <clipPath id="clip0_559_4">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <a href="#" class="page-number active">1</a>
                <a href="#" class="page-number">2</a>
                <a href="#" class="page-number">3</a>
                <a href="#" class="page-nav-btn next" aria-label="Next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <g clip-path="url(#clip0_559_17)">
                            <path
                                d="M8.58984 16.59L13.1698 12L8.58984 7.41L9.99984 6L15.9998 12L9.99984 18L8.58984 16.59Z"
                                fill="#2A1A08" />
                        </g>
                        <defs>
                            <clipPath id="clip0_559_17">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </nav> --}}
        </div>
    </section>
    </x-shizuku-page-layout>
    <script>
        function cast_change(value) {
            if (value) {
                window.location.href = "{{ route('public.shops.shop.review', ['shop' => 'pussycat']) }}/" + value;
            } else {
                window.location.href = "{{ route('public.shops.shop.review', ['shop' => 'pussycat']) }}";
            }
        }
    </script>

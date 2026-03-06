@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.css" rel="stylesheet">
@endpush

<x-miyabi-page-layout page-title="PHOTO DIARY" page-subtitle="写メ日記" breadcrumb="すすきの Luxury Room 雅 ＞ トップページ ＞ 写メ日記"
    :assets="['resources/scss/shops/miyabi/photo-diary.scss']" :banners="$banners">
    <section class="photo-diary-section">
        <div class="diary-body-left-calendar pc-only">
            <div class="diary-body-left-calendar-content" id="diary-calendar">
            </div>
        </div>
        <div class="diary-body-right-content">
            <div class="diary-post-cards">
                @foreach ($diarys as $diary)
                    <a class="diary-post-card pc-only"
                        href="{{ route('public.shops.shop.photo-diary.detail', ['shop' => $shop->slug, 'id' => $diary->id]) }}">
                        <div class="diary-post-title">
                            <h1>{{ $diary->cast_name }}</h1>
                            <span>{{ $diary->subject }}</span>
                            <hr>
                            </hr>
                            <p>{{ $diary->created_at->format('Y.m.d.') }}</p>
                        </div>
                        <div class="diary-post-image">
                            <img src="{{ asset('storage/diary/' . $diary->photo) }}">
                        </div>
                        <div class="diary-post-content">
                            <p>{!! nl2br($diary->body) !!}</p>
                        </div>
                    </a>
                    <div class="sp-only">
                        <a class="diary-post-sp-card"
                            href="{{ route('public.shops.shop.photo-diary.detail', ['shop' => $shop->slug, 'id' => $diary->id]) }}">
                            <div class="diary-post-image">
                                <img src="{{ asset('storage/diary/' . $diary->photo) }}">
                            </div>
                            <div class="diary-post-title">
                                <h1>{{ $diary->cast_name }}</h1>
                                <span>{{ $diary->subject }}</span>
                                <hr>
                                </hr>
                                <p>{{ $diary->created_at->format('Y/m/d') }}</p>
                                <div class="diary-post-content">
                                    <p>{!! nl2br($diary->body) !!}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                {{-- @foreach (range(1, 4) as $index)
                    <div class="diary-post-card pc-only">
                        <div class="diary-post-title">
                            <h1>投稿者名</h1>
                            <span>ブログタイトル</span>
                            <hr>
                            </hr>
                            <p>00.00.00.</p>
                        </div>
                        <div class="diary-post-image">
                            <img src="{{ asset('assets/img/shops/shizuku/diary-image.png') }}">
                        </div>
                        <div class="diary-post-content">
                            <p>ブログ本文が入りますブログ本文が入りますブログ本文が入りますブログ本文が入りますブログ本文が入りますブログ本文が入ります<br><br>
                                ブログ本文が入りますブログ本文が入りますブログ本文が入りますブログ本文が入ります ブログ本文が入ります ブログ本文が入ります ブログ本文が入ります ブログ本
                            </p>
                        </div>
                        </a>
                        <div class="sp-only">
                            <a href="{{ route('public.shops.shop.photo-diary.detail', ['shop' => 'shizuku', 'id' => $index]) }}"
                                class="diary-post-sp-card">
                                <div class="diary-post-image">
                                    <img src="{{ asset('assets/img/shops/shizuku/diary-image2.png') }}">
                                </div>
                                <div class="diary-post-title">
                                    <h1>投稿者名</h1>
                                    <span>ブログタイトル</span>
                                    <hr>
                                    </hr>
                                    <p>00.00.00.</p>
                                    <div class="diary-post-content">
                                        <p>ブログ本文が入りますブログ本文が入りますブログ本文が入りますブログ本文が入りますブログ本文が入りますブログ本文が入ります<br><br>
                                            ブログ本文が入りますブログ本文が入りますブログ本文が入りますブログ本文が入ります ブログ本文が入ります ブログ本文が入ります ブログ本文が入ります
                                            ブログ本
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                @endforeach --}}
            </div>
            <div class="diary-pagination pc-only">
                {{ $diarys->links('pagination::shops') }}
                {{-- <nav class="page-navigation">
                    <a href="#" class="page-nav-btn prev" aria-label="Previous">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <g clip-path="url(#clip0_559_4)">
                                <path d="M15.41 16.59L10.83 12L15.41 7.41L14 6L8 12L14 18L15.41 16.59Z"
                                    fill="#2A1A08" />
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
        </div>
    </section>
    <div class="diary-pagination sp-only">
        {{ $diarys->links('pagination::shops') }}
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
                        <path d="M8.58984 16.59L13.1698 12L8.58984 7.41L9.99984 6L15.9998 12L9.99984 18L8.58984 16.59Z"
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
    <div class="diary-body-mobile-calendar sp-only">
        <div class="diary-body-left-calendar-content" id="diary-calendar-mobile">
        </div>
    </div>
</x-miyabi-page-layout>
<script>
    // let cast_id = "";
    let shop_id = "{{ $shop->id }}";
    let shop_slug = "{{ $shop->slug }}";
    let date = "{{ $date }}";
    let diarys_date = {!! json_encode($diarys_date) !!};
</script>
@once
    @vite(['resources/scss/shops/miyabi/photo-diary.scss', 'resources/js/shops/miyabi/photo-diary.js'])
@endonce

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.css" rel="stylesheet">
@endpush

<x-lovestory-page-layout page-title="PHOTO DIARY DETAIL" page-subtitle="写メ日記詳細"
    breadcrumb="エッチな女の子育成ヘルス ラブストーリー ＞ トップページ ＞ 写メ日記 ＞ 写メ日記詳細" :assets="['resources/scss/shops/lovestory/photo-diary-detail.scss']" :banners="$banners">
    <section class="photo-diary-details-section">
        <h1 class="photo-diary-details-section-title">写メ日記詳細</h1>
        <div class="photo-diary-details-section-content">
            <div class="photo-diary-details-section-content-left">
                <a class="profile-button"
                    href="{{ route('public.shops.shop.profile', ['shop' => $shop->slug, $diary->cast_id]) }}">
                    <p>プロフィール</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="13" viewBox="0 0 8 13"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.071 7.071L1.414 12.728L0 11.314L4.95 6.364L0 1.414L1.414 0L7.071 5.657C7.25847 5.84453 7.36379 6.09884 7.36379 6.364C7.36379 6.62916 7.25847 6.88347 7.071 7.071Z"
                            fill="white" />
                    </svg>
                </a>
                @if ($schedule)
                    <div class="today-work-content">
                        <div class="today-work-content-title">
                            <p>本日出勤</p>
                        </div>
                        <div class="today-work-content-time">
                            {{-- <p>12:00〜24:00</p> --}}
                            <p>{{ $schedule->start_time . '~' . $schedule->end_time }}</p>
                        </div>
                    </div>
                @else
                    <div class="today-work-content-empty">
                        <div class="today-work-content-title-empty">
                            <p>お休み</p>
                        </div>
                        {{-- <div class="today-work-content-time">
                        <p>12:00〜24:00</p>
                    </div> --}}
                    </div>
                @endif
                <div class="photo-diary-details-section-content-left-calendar pc-only"
                    id="photo-diary-details-section-content-left-calendar">
                </div>
            </div>
            <div class="photo-diary-details-section-content-right">
                <div class="photo-diary-image sp-only">
                    <img src="{{ asset('storage/diary/' . $diary->photo) }}">
                </div>
                <div class="blog-title">
                    <p>{{ $diary->subject }}</p>
                    <hr>
                </div>
                <div class="blog-time">
                    <p class="pc-only">{{ $diary->created_at->format('Y/m/d H:i:s') }}</p>
                    <p class="sp-only">{{ $diary->created_at->format('y/m/d') }}</p>
                </div>
                <div class="photo-diary-image pc-only">
                    <img src="{{ asset('storage/diary/' . $diary->photo) }}">
                </div>
                <div class="blog-content">
                    <p>{!! nl2br($diary->body) !!}
                    </p>
                </div>
                <hr>
                <div class="blog-pagination">
                    @if ($prevDiary)
                        <a href="{{ route('public.shops.shop.photo-diary.detail', ['shop' => 'lovestory', 'id' => $prevDiary->id]) }}"
                            class="blog-pagination-btn blog-pagination-prev">
                            <p>前の投稿</p>
                        </a>
                    @else
                        <div class="blog-pagination-btn blog-pagination-prev blog-pagination-disabled">
                            <p>前の投稿</p>
                        </div>
                    @endif
                    <a href="{{ route('public.shops.shop.photo-diary', ['shop' => 'lovestory']) }}"
                        class="blog-pagination-btn blog-pagination-list">
                        <p>一覧へ</p>
                    </a>
                    @if ($nextDiary)
                        <a href="{{ route('public.shops.shop.photo-diary.detail', ['shop' => 'lovestory', 'id' => $nextDiary->id]) }}"
                            class="blog-pagination-btn blog-pagination-next">
                            <p>次の投稿</p>
                        </a>
                    @else
                        <div class="blog-pagination-btn blog-pagination-next blog-pagination-disabled">
                            <p>次の投稿</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <div class="p-[20px]">
        <div class="diary-details-mobile-calendar sp-only">
            <div class="diary-details-left-calendar-content" id="diary-details-calendar-mobile">
            </div>
        </div>
    </div>
</x-lovestory-page-layout>
<script>
    let cast_id = "{{ $diary->cast_id }}";
    let shop_id = "{{ $shop->id }}";
    let shop_slug = "{{ $shop->slug }}";
    let date = "{{ $date }}";
    let diarys_date = {!! json_encode($diarys_date) !!};
</script>
@once
    @vite(['resources/scss/shops/lovestory/photo-diary-detail.scss', 'resources/js/shops/lovestory/photo-diary-detail.js'])
@endonce

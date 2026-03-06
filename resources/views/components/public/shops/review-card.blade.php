@props([
    'girlName' => '女の子の名前',
    'measurements' => '00歳／T.000 B.000(C) W.00 H.00',
    'rating' => 3,
    'girlRating' => 3,
    'playRating' => 3,
    'staffRating' => 3,
    'frameImage' => 'assets/img/shops/shizuku/card-frame.png',
    'girlImage' => 'assets/img/shops/shizuku/review1.png',
    'reviewerName' => '投稿者名',
    'comment' =>
        'テキストテキストテキストテキストテキストテキストテストテキストテキストテキストテストテキストテキストテキストテストテキストテキストテキストテストテキストテキストテキストテストテキストテキストテキストテストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストストテキストストテキストストテキスト',
    'shopReplyTitle' => 'お店からの返信コメント',
    'shopReply' =>
        'お店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメントお店からの返信コメント',
    'scss' => 'resources/scss/shops/review-card.scss',
    'fillStarColor' => '#FFE500',
    'emptyStarColor' => 'none',
    'fillStarColorFull' => '#FFE500',
    'emptyStarColorFull' => 'none',
    'fillStarColorEmpty' => '#D9D9D9',
    'emptyStarColorEmpty' => 'none',
])

<div class="reivew-card-item">
    <div class="review-card-name-mobile-section">
        <h3 class="review-card-name">{{ $girlName }}</h3>
        <p class="review-card-measurements">{{ $measurements }}</p>
    </div>
    <div class="review-card-rating-mobile-section">
        <div class="review-card-stars">
            @for ($i = 0; $i < $rating; $i++)
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.0557 6.46289L11.1699 6.74609L11.4746 6.77441L16.8252 7.2627L12.7578 10.9756L12.5449 11.1699L12.6064 11.4521L13.8105 16.9336L9.26758 14.0488L9 13.8789L8.73242 14.0488L4.18848 16.9336L5.39355 11.4521L5.45508 11.1699L5.24219 10.9756L1.17383 7.2627L6.52539 6.77441L6.83008 6.74609L6.94434 6.46289L9 1.3418L11.0557 6.46289Z" fill="{{ $fillStarColorFull }}" stroke="{{ $fillStarColorFull }}"/>
              </svg>
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="{{ $emptyStarColorFull }}">
                    <path
                        d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                        fill="{{ $fillStarColorFull }}" />
                </svg> --}}
            @endfor
            @for ($i = 0; $i < 5 - $rating; $i++)
            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M11.0596 6.12305L11.1777 6.40039L11.4766 6.42578L16.7744 6.88281L12.7686 10.3359L12.5391 10.5332L12.6084 10.8281L13.8027 15.9639L9.25684 13.2383L9 13.084L8.74316 13.2383L4.19629 15.9639L5.3916 10.8281L5.46094 10.5332L5.23145 10.3359L1.22461 6.88281L6.52344 6.42578L6.82227 6.40039L6.94043 6.12305L9 1.27734L11.0596 6.12305Z" stroke="{{ $fillStarColorEmpty }}" stroke-width="1.5"/>
              </svg>

                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="{{ $emptyStarColorEmpty }}">
                    <path
                        d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                        fill="{{ $emptyStarColorEmpty }}" stroke="{{ $fillStarColorEmpty }}" stroke-width="1.5" />
                </svg> --}}
            @endfor
            <span class="review-card-rating-number">{{ $rating }}</span>
        </div>
        <p class="review-card-tags">女の子 {{ $girlRating }}　プレイ {{ $playRating }}　スタッフ {{ $staffRating }}</p>
    </div>
    <div class="review-card-info">
        <div class="review-card-image-wrapper">
            <img src="{{ asset($frameImage) }}" class="review-card-frame" alt="Frame">
            <img src="{{ asset($girlImage) }}" class="review-card-image" alt="Girl">
        </div>
        <div class="review-card-content">
            <div class="review-card-header">
                <div class="review-card-name-section pc-only">
                    <h3 class="review-card-name">{{ $girlName }}</h3>
                    <p class="review-card-measurements">{{ $measurements }}</p>
                </div>
                <div class="review-card-rating-section pc-only">
                    <div class="review-card-stars">
                        @for ($i = 0; $i < $rating; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="{{ $emptyStarColorFull }}">
                                <path
                                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                    fill="{{ $fillStarColorFull }}" />
                            </svg>
                        @endfor
                        @for ($i = 0; $i < 5 - $rating; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="{{ $emptyStarColorEmpty }}">
                                <path
                                    d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"
                                    fill="{{ $emptyStarColorEmpty }}" stroke="{{ $fillStarColorEmpty }}" stroke-width="1.5" />
                            </svg>
                        @endfor
                        <span class="review-card-rating-number">{{ $rating }}</span>
                    </div>
                    <p class="review-card-tags">女の子 {{ $girlRating }}　プレイ {{ $playRating }}　スタッフ
                        {{ $staffRating }}</p>
                </div>
            </div>
            <div class="review-card-comment-section">
                <div class="review-card-comment">
                    <p class="review-card-comment-author">{{ $reviewerName }}</p>
                    <div class="review-card-comment-text">
                        <textarea class="review-card-comment-textarea" readonly>{{ $comment }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="review-card-details">
        <div class="review-card-shop-reply">
            <p class="review-card-shop-reply-title">{{ $shopReplyTitle }}</p>
            <p class="review-card-shop-reply-text">{{ $shopReply }}</p>
        </div>
    </div>
</div>

@once
    @vite($scss)
@endonce

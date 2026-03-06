<x-public-shop-layout :shop="$shop">
  <x-public.shop.mv :shop="$shop" />
  <div class="reviewlist__container">
    <!-- Filter and Comment Count -->
    <div class="reviewlist__header content-wrapper-shop">
      <div class="reviewlist__filter">
        <select class="reviewlist__filter-select" id="cast-select">
          <option value="">女の子を選んでください</option>
          @foreach($casts as $cast)
          <option value="{{ $cast->id }}" {{ $cast_id == $cast->id ? 'selected' : '' }}>{{ $cast->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="reviewlist__count">コメント数　{{ count($reviews) }}件</div>
    </div>
    @if (count($reviews) > 0)
    <!-- Review Cards -->
    <div class="reviewlist__cards content-wrapper-shop">
      {{-- @foreach(range(1, 5) as $i) --}}
      @foreach($reviews as $review)
      <div class="review-item">
        <div class="review-item-head">
          <div class="review-item-head-top">
            <div class="review-item-shopnameButton">
              {{-- <p class="userrank">
                <span style="background-image: url('//img2.cityheaven.net/img/myheaven/icon-user.svg'); width: 50px;height: 50px;border:1px solid #fff;border-radius: 50%;background-size: cover;background-position: center;float: left;" id="iconimage">
                </span>
              </p> --}}
              <div class="userrank_box">
                {{-- <p class="userrank_icon">愛の狩人</p> --}}
                <p class="userrank_nickname_shogo">
                  {{-- <a href="/userpage/12732714/review-list/">{{$review->member_name}}</a> --}}
                  {{$review->member_name}}
                </p>
              </div>
            </div>
            {{-- <span class="special_thanks_icon">
              <img src="//img2.cityheaven.net/img/specialthanks.png?imgopt=y">
            </span> --}}
          </div>
          <div class="review-visit">
            <div class="visit-time">
              <dl class="list">
              <dt>訪問日</dt>
              <dd>{{$review->review_created_at ? \Carbon\Carbon::parse($review->review_created_at)->format('Y年m月d日') : ''}}</dd>
              <dd>
              </dd>
              </dl>
            </div>
            <div class="visit-date">
              <div class="shop-icon inner">
              <a href="{{route('public.shop.cast.profile', ['shop' => $shop->slug, 'id' => $review->cast_id])}}">
                <img name="osusume" itemprop="image url" class="type-girls" oncontextmenu="return false"
                src="{{ asset('storage/'.$review->cast_gallery) }}"
                style="background-image: none; background-repeat: no-repeat; background-position: center center; animation-duration: 0.8s;">
              </a>
              </div>
              <div class="visit-date-list">
                <dl class="list">
                <dt>遊んだ女の子</dt>
                {{-- <dd class="name">夢野凪彩7/24Debut[23歳] --}}
                  <dd class="name">{{$review->cast_name." [".$review->cast_age."] "}}
                  </dd>
                </dl>
                <p class="girls-spec">
                  T{{ $review->cast_height }} B{{ $review->cast_cup }} W{{ $review->cast_waist }} H{{ $review->cast_hip }}</p>
                <p class="more-girlsinfo"><a href="{{route('public.shop.cast.profile', ['shop' => $shop->slug, 'id' => $review->cast_id])}}">プロフを見る</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="review-item-header">
          <div class="review-item-star">
            @php
                $averagePoint = $review->review_average_point;
                $fullStars = floor($averagePoint);
                $hasHalfStar = ($averagePoint - $fullStars) >= 0.5;
                $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
            @endphp

            @for ($i = 0; $i < $fullStars; $i++)
                <div class="review-average-star-icon star_on in_item"></div>
            @endfor

            @if ($hasHalfStar)
                <div class="review-average-star-icon star_half in_item"></div>
            @endif

            @for ($i = 0; $i < $emptyStars; $i++)
                <div class="review-average-star-icon star_off in_item"></div>
            @endfor

            <span class="total_rate">{{$review->review_average_point}}</span>

            {{-- <div class="review-item-icons">
              <span class="review-item-icon _reserve">ネット予約で行きました</span>
            </div> --}}
          </div>

          <ul class="review-item-rate">
            <li>女の子 <span>{{$review->review_cast_point}}</span></li>
            <li>プレイ <span>{{$review->review_play_point}}</span></li>
            <li>料金 <span>{{$review->review_price_point}}</span></li>
            <li>スタッフ <span>{{$review->review_stuff_point}}</span></li>
            <li>写真 <span>{{$review->review_photo_point}}</span></li>
          </ul>
        </div>
        <div class="review-item-content">

          <div class="review-item-title">
            <span class="review_bold">{{$review->review_title}}</span>
          </div>
          <p class="review-item-post">{{$review->review_content}}</p>

          <div class="review-item-reply">
            <div class="review-item-reply-inner is_open">
              <div class="review-item-reply-head">
                お店からの返信コメント
                <img src="//img2.cityheaven.net/img/icon/baseline-chat_bubble_outline-24px.svg">
              </div>
              <p class="review-item-reply-body">
                {{$review->cast_manager_comment}}
              </p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endif

    <!-- Pagination and Footer -->
    {{-- <div class="reviewlist__footer">コメントを１０掲載</div>
    <div class="reviewlist__pagination">
      <ul class="pagination">
        <li class="pagination-item disabled">
          <a class="page-link" href="#" data-page="prev">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
          </a>
        </li>

        <li class="pagination-item active">
          <a class="page-link" href="#" data-page="1">1</a>
        </li>

        <li class="pagination-item ">
          <a class="page-link" href="#" data-page="2">2</a>
        </li>

        <li class="pagination-item ">
          <a class="page-link" href="#" data-page="3">3</a>
        </li>

        <li class="pagination-item ">
          <a class="page-link" href="#" data-page="4">4</a>
        </li>

        <li class="pagination-item ">
          <a class="page-link" href="#" data-page="next">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div> --}}
</x-public-shop-layout>
<script>
const shop = {!! json_encode($shop) !!};
document.addEventListener('DOMContentLoaded', function() {
  const castSelect = document.getElementById('cast-select');
  castSelect.addEventListener('change', function() {
    const castId = this.value;
    console.log(castId);
    window.location.href = `/${shop.slug}/reviewlist/${castId}`;
  });
});
</script>
@once
  @vite(['resources/scss/shop/reviewlist.scss', 'resources/scss/shop/newface.scss'])
@endonce

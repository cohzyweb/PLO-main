<x-public-shop-layout :shop="$shop">

  <!-- Main Visual -->
  <x-public.shop.mv :shop="$shop" />

  <!-- 料金 -->
  <section class="fee">
    <div class="fee-title --{{ $shop->slug }}">
      <h2 class="fee-title-ja title-font-midashi">料金システム</h2>
    </div>
    <div class="fee-main">
      <div class="fee-sub-title --{{ $shop->slug }}">
        <span class="fee-sub-title-small">BASIC PRICE</span>
        <span class="fee-sub-title-content">
          基本料金
        </span>
      </div>
      @if ($shop->slug != 'pussycat')
      <div class="fee-main-content">
        @foreach ($course_groups as $course_group)
          <div class="fee-main-content-item">
            <div class="fee-main-content-item-course --{{ $shop->slug }}">
              <span class="fee-main-content-item-course-number">
                {{ str_replace('分', '', $course_group->course) }}
              </span>
              <span class="fee-main-content-item-course-small">min</span>
            </div>
            <div class="fee-main-content-item-price">
              <span class="fee-main-content-item-price-number --{{ $shop->slug }}">
                {{ "¥".Number::format($course_group->price)."-" }}
              </span>
              <span class="fee-main-content-item-price-small">(税込)</span>
            </div>
          </div>
        @endforeach
      </div>
      @else
      <div class="fee-main-pussycat">
        <img src="{{ asset('assets/img/shop/pussycat-price.png') }}" alt="料金システム">
      </div>
      @endif
    </div>
    <div class="fee-option">
      <div class="fee-sub-title --{{ $shop->slug }}">
        <span class="fee-sub-title-small">OPTION</span>
        <span class="fee-sub-title-content">
          オプション
        </span>
      </div>
      <div class="fee-option-content">
        <div class="fee-option-content-title">
          <span>女の子によってNGもございますので、事前にご確認ください。</span>
        </div>
        <div class="fee-option-content-items">
          @foreach ($option_rs as $option_r)
            <div class="fee-option-content-items-item">
              <div class="fee-option-content-items-item-title --{{ $shop->slug }}">
                <span>{{ $option_r->option_name }}</span>
              </div>
              <div class="fee-option-content-items-item-price">
                <span class="fee-option-content-items-item-price-number --{{ $shop->slug }}">
                  {{ "¥".Number::format($option_r->price)."-" }}
                </span>
                <span class="fee-option-content-items-item-price-small">
                  (税込)
                </span>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="fee-play">
      <div class="fee-sub-title --{{ $shop->slug }}">
        <span class="fee-sub-title-small">BASIC PLAY</span>
        <span class="fee-sub-title-content">
          基本プレイ
        </span>
      </div>
      <div class="fee-play-content --{{ $shop->slug }}">
        @if ($shop->slug == 'shizuku')
        <span>キス･全身リップ･フェラ･玉舐め･スマタ</span>
        @elseif ($shop->slug == 'miyabi')
        <span>店舗にてお問い合わせください</span>
        @elseif ($shop->slug == 'en')
        <span>店舗にてお問い合わせください</span>
        @elseif ($shop->slug == 'siroganeze')
        <span>オイルマッサージ	回春マッサージ	鼠径部マッサージ	ハンドフィニッシュ</span>
        @elseif ($shop->slug == 'lovestory')
        <span>シャワー	濃厚キス	全身リップ	全力素股</span>
        @elseif ($shop->slug == 'pussycat')
        <span>店舗にてお問い合わせください</span>
        @endif
      </div>
    </div>
    <div class="fee-service">
      <div class="fee-sub-title --{{ $shop->slug }}">
        <span class="fee-sub-title-small">PROHIBITED MATTERS</span>
        <span class="fee-sub-title-content">
          禁止事項
        </span>
      </div>
      <div class="fee-service-content">
        <div class="fee-service-content-title">
          <p>当グループの禁止事項</p>
          <p>ご来店前に必ずご確認ください。</p>
        </div>
        <div class="fee-service-content-text">
          <p class="fee-service-content-text-alert">当店は、最大限心のこもったサービスをご提供させていただく為に、申し訳ありませんが下記の方の入店は固くお断りさせていただております。</p>
          <ul class="fee-service-content-text-list">
            <li>18歳未満の方</li>
            <li>暴力団及び関係者の方</li>
            <li>刺青や玉入れがある方</li>
            <li>薬物や危険ドラッグ、シンナー等を使用している方</li>
            <li>当店コンパニオンに対して乱暴な行為、嫌がる行為、変態行為をされる方</li>
            <li>本番行為の要求、強要またはそれに準ずる行為</li>
            <li>見た目や言葉使い、振舞いが乱暴な方</li>
            <li>当店スタッフが酔っていると判断された方</li>
            <li>店外デートやスカウト、その他あらゆる勧誘行為をされる方</li>
            <li>スマートフォンやビデオカメラに撮影機器や録音機器による撮影や盗撮、盗聴行為をされる方</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="fee-other">
      <div class="fee-sub-bar --{{ $shop->slug }}"></div>
      <div class="fee-other-title pc-only">
        <span>お支払いは現金の他、各種クレジットカードの利用が可能です。</span>
      </div>
      <div class="fee-other-title sp-only">
        <span>お支払いは現金の他、</span>
        <span>各種クレジットカードの利用が可能です。</span>
      </div>
      <div class="fee-other-content">
        <div class="fee-other-content-bank">
          <img src="{{ asset('assets/img/shop/bank1.png') }}" alt="銀行">
        </div>
        <div class="fee-other-content-text pc-only">
          {{-- <div class="pc-only"> --}}
          <p>各種カードご利用いただけます。詳しくはお尋ね下さい。</p>
          {{-- <p>詳しくはお尋ね下さい。</p> --}}
          <p>領収書の発行もいたしております。お気軽にお申し付けください。</p>
          {{-- <p>お気軽にお申し付けください。</p> --}}
          {{-- </div> --}}
        </div>
        <div class="fee-other-content-text sp-only">
          <p>各種カードご利用いただけます。</p>
          <p>詳しくはお尋ね下さい。</p>
          <p>領収書の発行もいたしております。</p>
          <p>お気軽にお申し付けください。</p>
        </div>
      </div>
      {{-- <div class="fee-other-content">
        <img src="{{ asset('assets/img/shop/feebanner-1.png') }}" alt="料金システム">
      </div> --}}
      <div class="fee-sub-bar --{{ $shop->slug }}"></div>

    </div>
    {{-- <div class="container">
      <h2 class="shop-fee__title">料金システム</h2>
      <div class="shop-fee__content content-wrapper">
        <div class="shop-fee__content-item">
          <div class="shop-fee__content-item-description">
            {!! $shop->fee !!}
          </div>
        </div>
        <div class="shop-fee__content-banner">
          <img src="{{ asset('assets/img/shop/feebanner-1.png') }}" alt="料金システム">
          <img src="{{ asset('assets/img//shop/feebanner-2.png') }}" alt="料金システム">
        </div>
      </div>
    </div> --}}
  </section>

</x-public-shop-layout>
@once
  @vite('resources/scss/shop/_fee.scss')
@endonce

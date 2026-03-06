<x-public-groups-sub-page-layout
  titleEn=""
  titleJa=""
  :bannerImage="asset('assets/img/female/home-page.png')"
  :vectorImage="asset('')"
  :showButtonGroup="false"
  :showLoadMore="false"
  :showDateSearchBar="false"
>
  @push('styles')
    <style>
      @media screen and (min-width: 1280px) {
        .banner-photodiary--female ~ .main {
          margin-left: auto !important;
          margin-right: auto !important;
          width: min(100%, 1440px) !important;
          max-width: 1440px !important;
          display: flex;
          flex-direction: column;
          align-items: center;
          background: #ececec;
          padding-bottom: 36px;
        }

        .banner-photodiary--female ~ .main > .recruit-line-cta,
        .banner-photodiary--female ~ .main > .recruit-female-shop,
        .banner-photodiary--female ~ .main > .recruit-female-movie,
        .banner-photodiary--female ~ .main > .recruit-female-treatment,
        .banner-photodiary--female ~ .main > .recruit-female-flow,
        .banner-photodiary--female ~ .main > .recruit-female-faq,
        .banner-photodiary--female ~ .main > .recruit-female-blog,
        .banner-photodiary--female ~ .main > .recruit-female-contact,
        .banner-photodiary--female ~ .main > .recruit-female-staff-link,
        .banner-photodiary--female ~ .main > .recruit-stores,
        .banner-photodiary--female ~ .main > .recruit-female-footer {
          width: 100%;
          max-width: 1440px;
          margin-left: 0;
          margin-right: 0;
        }
      }

      @media screen and (min-width: 1441px) {
        .banner-photodiary--female ~ .main .recruit-female-shop__inner {
          min-height: 1675.63px;
          height: 1675.63px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__grid {
          grid-template-columns: repeat(2, 600px);
          gap: 39px 40px;
          max-width: 1240px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__cardLink {
          width: 600px;
          height: 433.54px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__card {
          width: 600px;
          height: 433.54px;
          box-sizing: border-box;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__image {
          height: 327px;
          aspect-ratio: auto;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__body {
          min-height: calc(433.54px - 327px);
          box-sizing: border-box;
        }
      }

      .recruit-female-shop__cardLink,
      .recruit-stores__cardLink {
        display: block;
        text-decoration: none;
        color: inherit;
      }

      .recruit-female-shop__cardLink {
        height: 100%;
      }

      .recruit-female-shop__card {
        height: 100%;
      }

      .recruit-female-blog {
        display: none !important;
      }

      .banner-photodiary--female ~ .main .recruit-female-movie__video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border-radius: 20px;
        background: #000;
      }

      .banner-photodiary--female ~ .main .recruit-female-movie__thumbs {
        overflow-x: auto;
        overflow-y: hidden;
      }

      .banner-photodiary--female ~ .main .recruit-female-movie__thumb {
        flex: 0 0 220px;
        width: 220px;
        padding: 0;
        border: 0;
        background: transparent;
        cursor: pointer;
      }

      .banner-photodiary--female ~ .main .recruit-female-movie__thumbVideo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
      }

      @media screen and (max-width: 1024px) {
        .banner-photodiary--female ~ .main .recruit-female-shop__inner {
          padding: 0 16px 28px;
          gap: 16px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__heading {
          margin-top: -28px;
          font-size: 56px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__grid {
          grid-template-columns: repeat(2, minmax(0, 1fr));
          max-width: 100%;
          gap: 12px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__card {
          flex-direction: column;
          border-width: 2px;
          border-radius: 14px;
          align-items: stretch;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__image {
          width: 100%;
          aspect-ratio: 600 / 327;
          flex-shrink: 0;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__image img {
          border-top-left-radius: 12px;
          border-top-right-radius: 12px;
          border-bottom-left-radius: 0;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__body {
          width: 100%;
          align-items: center;
          text-align: center;
          justify-content: flex-start;
          padding: 8px 8px 10px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__name {
          width: 100%;
          text-align: center;
          font-size: 16px;
          margin-bottom: 2px;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__text {
          width: 100%;
          text-align: center;
          font-size: 10px;
          font-weight: 600;
          line-height: 1.45;
        }

        .banner-photodiary--female ~ .main .recruit-female-shop__br {
          display: inline;
        }

        .banner-photodiary--female ~ .main .recruit-female-movie__video {
          border-radius: 1vw;
        }

        .banner-photodiary--female ~ .main .recruit-female-movie__thumb {
          flex: 0 0 24vw;
          width: 24vw;
        }
      }
    </style>
  @endpush

  @if (session('success'))
    <div style="max-width: 960px; margin: 16px auto; padding: 12px 16px; border-radius: 8px; background: #e8f7ec; color: #165b2c; font-weight: 700;">
      {{ session('success') }}
    </div>
  @endif

  @if ($errors->any())
    <div style="max-width: 960px; margin: 16px auto; padding: 12px 16px; border-radius: 8px; background: #fdeaea; color: #7d1d1d;">
      <ul style="margin: 0; padding-left: 20px;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <section class="recruit-line-cta recruit-line-cta--female" aria-label="LINEとメールで簡単応募バナー">
    <div class="recruit-line-cta__inner">
      <div class="recruit-message__line-cta recruit-message__line-cta--female">
        <span class="recruit-message__line-ctaLead">LINEで簡単応募！</span>
        <a href="#recruit-form" class="recruit-message__line-ctaLink recruit-message__line-ctaLink--line-female">
          <span class="recruit-message__line-ctaIcon">
            <img src="{{ asset('assets/img/male/line.png') }}" alt="LINE公式アカウント">
          </span>
          <span class="recruit-message__line-ctaText">公式LINE</span>
        </a>
        <a href="#recruit-form" class="recruit-message__line-ctaLink recruit-message__line-ctaLink--mail-female">
          <span class="recruit-message__line-ctaIcon">
            <img src="{{ asset('assets/img/female/mail.png') }}" alt="お問い合わせフォーム">
          </span>
          <span class="recruit-message__line-ctaText">お問い合わせ</span>
        </a>
      </div>
    </div>
  </section>

  <section class="recruit-female-shop" aria-labelledby="recruit-female-shop-title">
    <div class="recruit-female-shop__inner">
      <h2 id="recruit-female-shop-title" class="recruit-female-shop__heading">
        SHOP
      </h2>

      <div class="recruit-female-shop__grid">
        <a class="recruit-female-shop__cardLink" href="https://hokkaido-tohoku.qzin.jp/siroganeze/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-female-shop__card">
            <div class="recruit-female-shop__image">
              <img src="{{ asset('assets/img/female/section1.png') }}" alt="シロガネーゼ 求人イメージ">
            </div>
            <div class="recruit-female-shop__body">
              <h3 class="recruit-female-shop__name">シロガネーゼ</h3>
              <p class="recruit-female-shop__text">
                着衣のまま接客可能で<br class="recruit-female-shop__br">30～40代も活躍できる<br class="recruit-female-shop__br">メンズエステ
              </p>
            </div>
          </article>
        </a>

        <a class="recruit-female-shop__cardLink" href="https://hokkaido-tohoku.qzin.jp/pussycat011/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-female-shop__card">
            <div class="recruit-female-shop__image">
              <img src="{{ asset('assets/img/female/section1-1.png') }}" alt="プッシーキャット 求人イメージ">
            </div>
            <div class="recruit-female-shop__body">
              <h3 class="recruit-female-shop__name">プッシーキャット</h3>
              <p class="recruit-female-shop__text">
                フルリニューアルオー<br class="recruit-female-shop__br">プン！安定した高収入<br class="recruit-female-shop__br">をお約束
              </p>
            </div>
          </article>
        </a>

        <a class="recruit-female-shop__cardLink" href="https://hokkaido-tohoku.qzin.jp/lovesS/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-female-shop__card">
            <div class="recruit-female-shop__image">
              <img src="{{ asset('assets/img/female/section1-2.png') }}" alt="ラブストーリー 求人イメージ">
            </div>
            <div class="recruit-female-shop__body">
              <h3 class="recruit-female-shop__name">ラブストーリー</h3>
              <p class="recruit-female-shop__text">
                20代の未経験ならラブ<br class="recruit-female-shop__br">ストでスタートがおす<br class="recruit-female-shop__br">すめ
              </p>
            </div>
          </article>
        </a>

        <a class="recruit-female-shop__cardLink" href="https://hokkaido-tohoku.qzin.jp/miyabi0930/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-female-shop__card">
            <div class="recruit-female-shop__image">
              <img src="{{ asset('assets/img/female/section1-3.png') }}" alt="雅 MIYABI 求人イメージ">
            </div>
            <div class="recruit-female-shop__body">
              <h3 class="recruit-female-shop__name">雅 〜MIYABI〜</h3>
              <p class="recruit-female-shop__text">
                従来の人妻店とは違い<br class="recruit-female-shop__br">即サービスがないのが<br class="recruit-female-shop__br">働き易さのポイント
              </p>
            </div>
          </article>
        </a>

        <a class="recruit-female-shop__cardLink" href="https://hokkaido-tohoku.qzin.jp/group/hinaShizuku/1/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-female-shop__card">
            <div class="recruit-female-shop__image">
              <img src="{{ asset('assets/img/female/section1-4.png') }}" alt="艶 求人イメージ">
            </div>
            <div class="recruit-female-shop__body">
              <h3 class="recruit-female-shop__name">艶</h3>
              <p class="recruit-female-shop__text">
                既婚者さんでも働きや<br class="recruit-female-shop__br">すい人妻店
              </p>
            </div>
          </article>
        </a>

        <a class="recruit-female-shop__cardLink" href="https://hokkaido-tohoku.qzin.jp/8988/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-female-shop__card">
            <div class="recruit-female-shop__image">
              <img src="{{ asset('assets/img/female/section1-5.png') }}" alt="雫 求人イメージ">
            </div>
            <div class="recruit-female-shop__body">
              <h3 class="recruit-female-shop__name">雫</h3>
              <p class="recruit-female-shop__text">
                ★ソフトサービスヘル<br class="recruit-female-shop__br">ス！一切オプション無<br class="recruit-female-shop__br">し★
              </p>
            </div>
          </article>
        </a>
      </div>
    </div>
  </section>

  <section class="recruit-female-movie" aria-labelledby="recruit-female-movie-title">
    @php
      $staffVideos = collect(glob(public_path('assets/video/スタッフインタビュー動画/*.mp4')) ?: [])
        ->sort()
        ->values()
        ->map(fn ($path) => 'assets/video/スタッフインタビュー動画/' . basename($path))
        ->all();

      $girlVideos = collect(glob(public_path('assets/video/女の子インタビュー動画/*.mp4')) ?: [])
        ->sort()
        ->values()
        ->map(fn ($path) => 'assets/video/女の子インタビュー動画/' . basename($path))
        ->all();

      $staffPrimaryVideo = $staffVideos[0] ?? 'assets/video/female/staff-interview.mp4';
      $girlPrimaryVideo = $girlVideos[0] ?? 'assets/video/female/girl-interview.mp4';
    @endphp

    <div class="recruit-female-movie__inner">
      <header class="recruit-female-movie__header">
        <h2 id="recruit-female-movie-title" class="recruit-female-movie__heading">MOVIE</h2>
        <p class="recruit-female-movie__subheading">スタッフや在籍中の女の子に聞く！</p>
      </header>

      <div class="recruit-female-movie__blocks">
        {{-- Staff interview block (turquoise) --}}
        <section class="recruit-female-movie__block">
          <div class="recruit-female-movie__main recruit-female-movie__main--teal">
            <div class="recruit-female-movie__frame">
              <video
                id="staff-main-video"
                class="recruit-female-movie__video"
                controls
                playsinline
                preload="metadata"
                poster="{{ asset('assets/img/female/section2-1.png') }}"
              >
                <source src="{{ asset($staffPrimaryVideo) }}" type="video/mp4">
              </video>
            </div>

            <div class="recruit-female-movie__ribbon">
              <img src="{{ asset('assets/img/female/section2.png') }}" alt="" aria-hidden="true">
              <p class="recruit-female-movie__ribbonText">スタッフ interview</p>
            </div>

            <button type="button" class="recruit-female-movie__arrow recruit-female-movie__arrow--prev" aria-label="前の動画へ">
              <img src="{{ asset('assets/img/female/left.png') }}" alt="">
            </button>
            <button type="button" class="recruit-female-movie__arrow recruit-female-movie__arrow--next" aria-label="次の動画へ">
              <img src="{{ asset('assets/img/female/right.png') }}" alt="">
            </button>
          </div>

          <div class="recruit-female-movie__thumbs">
            @forelse ($staffVideos as $videoPath)
              <button
                type="button"
                class="recruit-female-movie__thumb recruit-female-movie__thumbButton"
                data-target-video="staff-main-video"
                data-video-src="{{ asset($videoPath) }}"
                aria-label="スタッフインタビュー動画を再生"
              >
                <video class="recruit-female-movie__thumbVideo" muted playsinline preload="metadata">
                  <source src="{{ asset($videoPath) }}" type="video/mp4">
                </video>
              </button>
            @empty
              <div class="recruit-female-movie__thumb">
                <img src="{{ asset('assets/img/female/section2-1.png') }}" alt="スタッフインタビュー サムネイル">
              </div>
            @endforelse
          </div>
        </section>

        {{-- Girl interview block (pink) --}}
        <section class="recruit-female-movie__block">
          <div class="recruit-female-movie__main recruit-female-movie__main--pink">
            <div class="recruit-female-movie__frame">
              <video
                id="girl-main-video"
                class="recruit-female-movie__video"
                controls
                playsinline
                preload="metadata"
                poster="{{ asset('assets/img/female/section2-1.png') }}"
              >
                <source src="{{ asset($girlPrimaryVideo) }}" type="video/mp4">
              </video>
            </div>

            <div class="recruit-female-movie__ribbon">
              <img src="{{ asset('assets/img/female/section2-2.png') }}" alt="" aria-hidden="true">
              <p class="recruit-female-movie__ribbonText">女の子 interview</p>
            </div>

            <button type="button" class="recruit-female-movie__arrow recruit-female-movie__arrow--prev recruit-female-movie__arrow--pink" aria-label="前の動画へ">
              <img src="{{ asset('assets/img/female/left1.png') }}" alt="">
            </button>
            <button type="button" class="recruit-female-movie__arrow recruit-female-movie__arrow--next recruit-female-movie__arrow--pink" aria-label="次の動画へ">
              <img src="{{ asset('assets/img/female/right1.png') }}" alt="">
            </button>
          </div>

          <div class="recruit-female-movie__thumbs">
            @forelse ($girlVideos as $videoPath)
              <button
                type="button"
                class="recruit-female-movie__thumb recruit-female-movie__thumbButton"
                data-target-video="girl-main-video"
                data-video-src="{{ asset($videoPath) }}"
                aria-label="女の子インタビュー動画を再生"
              >
                <video class="recruit-female-movie__thumbVideo" muted playsinline preload="metadata">
                  <source src="{{ asset($videoPath) }}" type="video/mp4">
                </video>
              </button>
            @empty
              <div class="recruit-female-movie__thumb">
                <img src="{{ asset('assets/img/female/section2-1.png') }}" alt="女の子インタビュー サムネイル">
              </div>
            @endforelse
          </div>
        </section>
      </div>
    </div>
  </section>

  <section class="recruit-female-treatment" aria-labelledby="recruit-female-treatment-title">
    <div class="recruit-female-treatment__inner">
      <header class="recruit-female-treatment__header">
        <h2 id="recruit-female-treatment-title" class="recruit-female-treatment__heading">
          TREATMENT
        </h2>
        <p class="recruit-female-treatment__subheading">
          気になる待遇！
        </p>
      </header>

      <div class="recruit-female-treatment__grid">
        {{-- POINT 1 --}}
        <article class="recruit-female-treatment__card">
          <div class="recruit-female-treatment__cloud">
            <img src="{{ asset('assets/img/female/section3-1.png') }}" alt="" class="recruit-female-treatment__img-pc">
            <img src="{{ asset('assets/img/female/section3.png') }}" alt="" class="recruit-female-treatment__img-sp">
          </div>
          <div class="recruit-female-treatment__content recruit-female-treatment__content--pc-light recruit-female-treatment__content--sp-dark">
            <p class="recruit-female-treatment__point">POINT 1</p>
            <div class="recruit-female-treatment__titleWrapper">
              <p class="recruit-female-treatment__title">体験入店あり</p>
            </div>
            <p class="recruit-female-treatment__text">
              <span class="recruit-female-treatment__text--pc">
                体験入店された方には必ず報酬をご用意！<br>
                未経験でも短期間・短時間でも、ライフス<br>
                タイルに合わせた働き方が可能です。
              </span>
              <span class="recruit-female-treatment__text--sp">
                体験入店された方には必ず報酬をご用<br>
                意！未経験でも短期間・短時間でも、<br>
                ライフスタイルに合わせた働き方が可<br>
                能です。
              </span>
            </p>
          </div>
        </article>

        {{-- POINT 2 --}}
        <article class="recruit-female-treatment__card">
          <div class="recruit-female-treatment__cloud">
            <img src="{{ asset('assets/img/female/section3.png') }}" alt="" class="recruit-female-treatment__img-pc">
            <img src="{{ asset('assets/img/female/section3-1.png') }}" alt="" class="recruit-female-treatment__img-sp">
          </div>
          <div class="recruit-female-treatment__content recruit-female-treatment__content--pc-dark recruit-female-treatment__content--sp-light">
            <p class="recruit-female-treatment__point">POINT 2</p>
            <div class="recruit-female-treatment__titleWrapper">
              <p class="recruit-female-treatment__title">
                徹底した<br>身バレ対策
              </p>
            </div>
            <p class="recruit-female-treatment__text">
              <span class="recruit-female-treatment__text--pc">
                接客前にお客様の顔を確認できたり、アリ<br>
                バイ対策・露出する顔写真もモザイク加工<br>
                をするため、 みなさんが不安な身バレを<br>
                徹底的に防ぎます。
              </span>
              <span class="recruit-female-treatment__text--sp">
                接客前にお客様の顔を確認できたり、<br>
                アリバイ対策・露出する顔写真もモザ<br>
                イク加工をするため、みなさんが不安<br>
                な身バレを徹底的に防ぎます。
              </span>
            </p>
          </div>
        </article>

        {{-- POINT 3 --}}
        <article class="recruit-female-treatment__card">
          <div class="recruit-female-treatment__cloud">
            <img src="{{ asset('assets/img/female/section3.png') }}" alt="" class="recruit-female-treatment__img-pc">
            <img src="{{ asset('assets/img/female/section3.png') }}" alt="" class="recruit-female-treatment__img-sp">
          </div>
          <div class="recruit-female-treatment__content recruit-female-treatment__content--pc-dark recruit-female-treatment__content--sp-dark">
            <p class="recruit-female-treatment__point">POINT 3</p>
            <div class="recruit-female-treatment__titleWrapper">
              <p class="recruit-female-treatment__title">完全日払い制</p>
            </div>
            <p class="recruit-female-treatment__text">
              <span class="recruit-female-treatment__text--pc">
                お給料はその日のお仕事終わりに全額お<br>
                支払いいたします。 ノルマもないので、安<br>
                心して働くことができます。
              </span>
              <span class="recruit-female-treatment__text--sp">
                お給料はその日のお仕事終わりに全額<br>
                お支払いいたします。ノルマもないの<br>
                で、安心して働くことができます。
              </span>
            </p>
          </div>
        </article>

        {{-- POINT 4 --}}
        <article class="recruit-female-treatment__card">
          <div class="recruit-female-treatment__cloud">
            <img src="{{ asset('assets/img/female/section3-1.png') }}" alt="" class="recruit-female-treatment__img-pc">
            <img src="{{ asset('assets/img/female/section3-1.png') }}" alt="" class="recruit-female-treatment__img-sp">
          </div>
          <div class="recruit-female-treatment__content recruit-female-treatment__content--pc-light recruit-female-treatment__content--sp-light">
            <p class="recruit-female-treatment__point">POINT 4</p>
            <div class="recruit-female-treatment__titleWrapper">
              <p class="recruit-female-treatment__title">女性が講習</p>
            </div>
            <p class="recruit-female-treatment__text">
              <span class="recruit-female-treatment__text--pc">
                各店女性スタッフが多く、実際のお仕事<br>
                の講習は女性スタッフが対応するので、<br>
                不安な方でも安心です！
              </span>
              <span class="recruit-female-treatment__text--sp">
                各店女性スタッフが多く、実際のお仕<br>
                事の講習は女性スタッフが対応するの<br>
                で、不安な方でも安心です！
              </span>
            </p>
          </div>
        </article>

        {{-- POINT 5 --}}
        <article class="recruit-female-treatment__card">
          <div class="recruit-female-treatment__cloud">
            <img src="{{ asset('assets/img/female/section3-1.png') }}" alt="" class="recruit-female-treatment__img-pc">
            <img src="{{ asset('assets/img/female/section3.png') }}" alt="" class="recruit-female-treatment__img-sp">
          </div>
          <div class="recruit-female-treatment__content recruit-female-treatment__content--pc-light recruit-female-treatment__content--sp-dark">
            <p class="recruit-female-treatment__point">POINT 5</p>
            <div class="recruit-female-treatment__titleWrapper">
              <p class="recruit-female-treatment__title">短期OK</p>
            </div>
            <p class="recruit-female-treatment__text">
              <span class="recruit-female-treatment__text--pc">
                体験入店の数日間だけでも可能！お金が<br>
                必要な時だけ働きたいといった理由で<br>
                も、 大歓迎です。
              </span>
              <span class="recruit-female-treatment__text--sp">
                体験入店の数日間だけでも可能！お金<br>
                が必要な時だけ働きたいといった理由<br>
                でも、大歓迎です。
              </span>
            </p>
          </div>
        </article>

        {{-- POINT 6 --}}
        <article class="recruit-female-treatment__card">
          <div class="recruit-female-treatment__cloud">
            <img src="{{ asset('assets/img/female/section3.png') }}" alt="" class="recruit-female-treatment__img-pc">
            <img src="{{ asset('assets/img/female/section3-1.png') }}" alt="" class="recruit-female-treatment__img-sp">
          </div>
          <div class="recruit-female-treatment__content recruit-female-treatment__content--pc-dark recruit-female-treatment__content--sp-light">
            <p class="recruit-female-treatment__point">POINT 6</p>
            <div class="recruit-female-treatment__titleWrapper">
              <p class="recruit-female-treatment__title">
                入未経験・出戻り<br>大歓迎店あり
              </p>
            </div>
            <p class="recruit-female-treatment__text">
              <span class="recruit-female-treatment__text--pc">
                未経験の方でも事前講習があるので安心<br>
                して稼げます！ また以前働いたことがあ<br>
                る方でも問題ありません。
              </span>
              <span class="recruit-female-treatment__text--sp">
                未経験の方でも事前講習があるので安<br>
                心して稼げます！また以前働いたこと<br>
                がある方でも問題ありません。
              </span>
            </p>
          </div>
        </article>
      </div>

      <div class="recruit-female-treatment__icons">
        <div class="recruit-female-treatment__iconItem">
          <span class="recruit-female-treatment__iconCircle recruit-female-treatment__iconCircle--pink">
            <img src="{{ asset('assets/img/female/section3-2.png') }}" alt="">
          </span>
          <p class="recruit-female-treatment__iconLabel">送迎あり</p>
        </div>
        <div class="recruit-female-treatment__iconItem">
          <span class="recruit-female-treatment__iconCircle recruit-female-treatment__iconCircle--gold">
            <img src="{{ asset('assets/img/female/section3-3.png') }}" alt="">
          </span>
          <p class="recruit-female-treatment__iconLabel">寮あり</p>
        </div>
        <div class="recruit-female-treatment__iconItem">
          <span class="recruit-female-treatment__iconCircle recruit-female-treatment__iconCircle--pink">
            <img src="{{ asset('assets/img/female/section3-4.png') }}" alt="">
          </span>
          <p class="recruit-female-treatment__iconLabel">個室待機</p>
        </div>
      </div>
    </div>
  </section>

  <section class="recruit-female-flow" aria-labelledby="recruit-female-flow-title">
    <div class="recruit-female-flow__inner">
      <header class="recruit-female-flow__header">
        <h2 id="recruit-female-flow-title" class="recruit-female-flow__heading">FLOW</h2>
        <p class="recruit-female-flow__subheading">入店までの流れ</p>
      </header>

      <div class="recruit-female-flow__list" role="list">
        <article class="recruit-female-flow__item" role="listitem">
          <div class="recruit-female-flow__icon">
            <img src="{{ asset('assets/img/female/section4.png') }}" alt="step 01">
          </div>
          <div class="recruit-female-flow__content">
            <h3 class="recruit-female-flow__title">
              <span class="recruit-female-flow__title--pc">まずはお問い合わせください！</span>
              <span class="recruit-female-flow__title--sp">まずはお問い合わせ<br>ください！</span>
            </h3>
            <p class="recruit-female-flow__text">
              <span class="recruit-female-flow__text--pc">電話・HP・メール・LINEいずれかから応募できます！</span>
              <span class="recruit-female-flow__text--sp">電話・HP・メール・LINEいずれかから<br>応募できます！</span>
            </p>
          </div>
        </article>

        <article class="recruit-female-flow__item" role="listitem">
          <div class="recruit-female-flow__icon">
            <img src="{{ asset('assets/img/female/section4-1.png') }}" alt="step 02">
          </div>
          <div class="recruit-female-flow__content">
            <h3 class="recruit-female-flow__title">
              <span class="recruit-female-flow__title--pc">あなたのお話を聞かせてください！</span>
              <span class="recruit-female-flow__title--sp">あなたのお話を<br>聞かせてください！</span>
            </h3>
            <p class="recruit-female-flow__text">
              <span class="recruit-female-flow__text--pc">
                面接にて、お仕事についてお話しします。<br>
                不安や疑問などあればなんでもお尋ねください。
              </span>
              <span class="recruit-female-flow__text--sp">
                面接にて、お仕事についてお話しします。<br>
                不安や疑問などあればなんでもお尋ねくだ<br>
                さい。
              </span>
            </p>
          </div>
        </article>

        <article class="recruit-female-flow__item" role="listitem">
          <div class="recruit-female-flow__icon">
            <img src="{{ asset('assets/img/female/section4-2.png') }}" alt="step 03">
          </div>
          <div class="recruit-female-flow__content">
            <h3 class="recruit-female-flow__title">
              <span class="recruit-female-flow__title--pc">面接に受かったら宣材撮影！</span>
              <span class="recruit-female-flow__title--sp">面接に受かったら<br>宣材撮影！</span>
            </h3>
            <p class="recruit-female-flow__text">
              <span class="recruit-female-flow__text--pc">
                お仕事に大事な撮影をします。プロのカメラマン・ヘアメイクが完全サポートするので、お任せください！
              </span>
              <span class="recruit-female-flow__text--sp">
                お仕事に大事な撮影をします。<br>
                プロのカメラマン・ヘアメイクが<br>
                完全サポートするので、お任せください！
              </span>
            </p>
          </div>
        </article>

        <article class="recruit-female-flow__item" role="listitem">
          <div class="recruit-female-flow__icon">
            <img src="{{ asset('assets/img/female/section4-3.png') }}" alt="step 04">
          </div>
          <div class="recruit-female-flow__content">
            <h3 class="recruit-female-flow__title">
              <span class="recruit-female-flow__title--pc">
                <span>女性講習員が丁寧に</span><br>
                <span>お仕事をお教えします！</span>
              </span>
              <span class="recruit-female-flow__title--sp">
                女性講習員が丁寧に<br>
                お仕事をお教えします！
              </span>
            </h3>
            <p class="recruit-female-flow__text">
              <span class="recruit-female-flow__text--pc">
                お仕事に入る前に、接客の流れを講習いたします。<br>
                講習員は現場をよく知る女性なのでご安心ください！
              </span>
              <span class="recruit-female-flow__text--sp">
                お仕事に入る前に、<br>
                接客の流れを講習いたします。<br>
                講習員は現場をよく知る女性なので<br>
                ご安心ください！
              </span>
            </p>
          </div>
        </article>

        <article class="recruit-female-flow__item recruit-female-flow__item--last" role="listitem">
          <div class="recruit-female-flow__icon">
            <img src="{{ asset('assets/img/female/section4-4.png') }}" alt="step 05">
          </div>
          <div class="recruit-female-flow__content">
            <h3 class="recruit-female-flow__title">
              <span class="recruit-female-flow__title--pc">講習が終わったらお仕事デビュー！</span>
              <span class="recruit-female-flow__title--sp">講習が終わったら<br>お仕事デビュー！</span>
            </h3>
            <p class="recruit-female-flow__text">
              <span class="recruit-female-flow__text--pc">デビューの時から完全日払いですので、初日からお給料日♪</span>
              <span class="recruit-female-flow__text--sp">デビューの時から完全日払い日ですので、<br>初日からお給料日♪</span>
            </p>
          </div>
        </article>
      </div>

      <a class="recruit-female-flow__cta" href="#recruit-form" aria-label="お問い合わせ・応募はこちら！">
        <img src="{{ asset('assets/img/female/section4-5.png') }}" alt="" aria-hidden="true">
        <span class="recruit-female-flow__ctaText">お問い合わせ・応募はこちら！</span>
      </a>
    </div>
  </section>

  <section class="recruit-female-faq" aria-labelledby="recruit-female-faq-title">
    <div class="recruit-female-faq__inner">
      <header class="recruit-female-faq__header">
        <h2 id="recruit-female-faq-title" class="recruit-female-faq__heading">FAQ</h2>
        <p class="recruit-female-faq__subheading">よくある質問</p>
      </header>

      <div class="recruit-female-faq__frame">
        <div class="recruit-female-faq__list">
          <details class="recruit-female-faq__item" open>
            <summary class="recruit-female-faq__question">
              <span class="recruit-female-faq__q">Q</span>
              <span class="recruit-female-faq__questionText">
                <span class="recruit-female-faq__text--pc">質問が入ります質問が入ります質問が入ります</span>
                <span class="recruit-female-faq__text--sp">質問が入ります質問が<br>入ります質問が入りま<br>す</span>
              </span>
              <span class="recruit-female-faq__toggle" aria-hidden="true">+</span>
            </summary>
            <div class="recruit-female-faq__answer">
              <span class="recruit-female-faq__a">A</span>
              <p class="recruit-female-faq__answerText">
                <span class="recruit-female-faq__text--pc">
                  回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります
                </span>
                <span class="recruit-female-faq__text--sp">
                  回答が入ります回答が入ります回答<br>
                  が入ります回答が入ります回答が入<br>
                  ります回答が入ります回答が入りま<br>
                  す回答が入ります回答が入ります回<br>
                  答が入ります回答が入ります回答が<br>
                  入ります回答が入ります回答が入り<br>
                  ます
                </span>
              </p>
            </div>
          </details>

          @for ($i = 0; $i < 4; $i++)
            <details class="recruit-female-faq__item">
              <summary class="recruit-female-faq__question">
                <span class="recruit-female-faq__q">Q</span>
                <span class="recruit-female-faq__questionText">
                  <span class="recruit-female-faq__text--pc">質問が入ります質問が入ります質問が入ります</span>
                  <span class="recruit-female-faq__text--sp">質問が入ります質問が<br>入ります質問が入りま<br>す</span>
                </span>
                <span class="recruit-female-faq__toggle" aria-hidden="true">+</span>
              </summary>
              <div class="recruit-female-faq__answer">
                <span class="recruit-female-faq__a">A</span>
                <p class="recruit-female-faq__answerText">
                  <span class="recruit-female-faq__text--pc">
                    回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります
                  </span>
                  <span class="recruit-female-faq__text--sp">
                    回答が入ります回答が入ります回答<br>
                    が入ります回答が入ります回答が入<br>
                    ります回答が入ります回答が入りま<br>
                    す回答が入ります回答が入ります回<br>
                    答が入ります回答が入ります回答が<br>
                    入ります回答が入ります回答が入り<br>
                    ます
                  </span>
                </p>
              </div>
            </details>
          @endfor
        </div>

        <div class="recruit-female-faq__ornament" aria-hidden="true">
          <img src="{{ asset('assets/img/female/section5.png') }}" alt="">
        </div>
      </div>
    </div>
  </section>

  <section class="recruit-female-blog" aria-labelledby="recruit-female-blog-title">
    <div class="recruit-female-blog__inner">
      <header class="recruit-female-blog__header">
        <h2 id="recruit-female-blog-title" class="recruit-female-blog__heading">STAFF BLOG</h2>
        <p class="recruit-female-blog__subheading">お店のスタッフブログ</p>
      </header>

      <div class="recruit-female-blog__grid">
        @for ($i = 0; $i < 6; $i++)
          <article class="recruit-female-blog__card">
            <div class="recruit-female-blog__cardHeader">
              <p class="recruit-female-blog__shop">プッシーキャット</p>
            </div>
            <div class="recruit-female-blog__cardBody">
              <div class="recruit-female-blog__thumb">
                <img src="{{ asset('assets/img/female/section6.png') }}" alt="スタッフブログサムネイル">
              </div>
              <div class="recruit-female-blog__content">
                <div class="recruit-female-blog__titleWrapper">
                  <h3 class="recruit-female-blog__title">
                    <span class="recruit-female-blog__title--pc">スタッフブログタイトル</span>
                    <span class="recruit-female-blog__title--sp">スタッフブログタ<br>イトル</span>
                  </h3>
                </div>
                <p class="recruit-female-blog__excerpt">
                  <span class="recruit-female-blog__excerpt--pc">
                    テキストテキストテキストテキストテキストテキストテキストテキストテキスト...
                  </span>
                  <span class="recruit-female-blog__excerpt--sp">
                    テキストテキストテキ<br>
                    ストテキストテキスト<br>
                    テキスト...
                  </span>
                </p>
                <p class="recruit-female-blog__date">00.00.00 UP</p>
              </div>
            </div>
          </article>
        @endfor
      </div>
    </div>
  </section>

  <section class="recruit-female-contact" id="recruit-form" aria-labelledby="recruit-female-contact-title">
    <div class="recruit-female-contact__inner">
      <header class="recruit-female-contact__header">
        <h2 id="recruit-female-contact-title" class="recruit-female-contact__heading">CONTACT</h2>
        <p class="recruit-female-contact__subheading">お問い合わせ＆応募フォーム</p>
      </header>

      <form action="{{ route('public.recruit.submit') }}" method="POST" class="recruit-female-contact__form">
        @csrf
        <input type="hidden" name="type" value="female">

        <div class="recruit-female-contact__row">
          <div class="recruit-female-contact__label">希望するお店</div>
          <div class="recruit-female-contact__req">必須</div>
          <div class="recruit-female-contact__field">
            <select name="shop" class="recruit-female-contact__select" required>
              <option value="shizuku" @selected(old('shop') === 'shizuku')>雫</option>
              <option value="miyabi" @selected(old('shop') === 'miyabi')>雅</option>
              <option value="pussycat" @selected(old('shop') === 'pussycat')>プッシーキャット</option>
              <option value="en" @selected(old('shop') === 'en')>艶</option>
              <option value="siroganeze" @selected(old('shop') === 'siroganeze')>シロガネーゼ</option>
              <option value="lovestory" @selected(old('shop') === 'lovestory')>ラブストーリー</option>
            </select>
          </div>
        </div>

        <div class="recruit-female-contact__row">
          <div class="recruit-female-contact__label">お名前</div>
          <div class="recruit-female-contact__req">必須</div>
          <div class="recruit-female-contact__field">
            <input type="text" name="name" value="{{ old('name') }}" class="recruit-female-contact__input" placeholder="ニックネーム可" required>
          </div>
        </div>

        <div class="recruit-female-contact__row">
          <div class="recruit-female-contact__label">ご年齢</div>
          <div class="recruit-female-contact__req recruit-female-contact__req--empty" aria-hidden="true"></div>
          <div class="recruit-female-contact__field">
            <input type="text" name="age" value="{{ old('age') }}" class="recruit-female-contact__input">
          </div>
        </div>

        <div class="recruit-female-contact__row">
          <div class="recruit-female-contact__label">お仕事経験</div>
          <div class="recruit-female-contact__req recruit-female-contact__req--empty" aria-hidden="true"></div>
          <div class="recruit-female-contact__field">
            <div class="recruit-female-contact__radios">
              <label class="recruit-female-contact__radio">
                <input type="radio" name="experience" value="yes" @checked(old('experience') === 'yes')>
                <span>あり</span>
              </label>
              <label class="recruit-female-contact__radio">
                <input type="radio" name="experience" value="no" @checked(old('experience') === 'no')>
                <span>なし</span>
              </label>
              <label class="recruit-female-contact__radio">
                <input type="radio" name="experience" value="working" @checked(old('experience') === 'working')>
                <span>働いている</span>
              </label>
            </div>
          </div>
        </div>

        <div class="recruit-female-contact__row">
          <div class="recruit-female-contact__label">件名</div>
          <div class="recruit-female-contact__req">必須</div>
          <div class="recruit-female-contact__field">
            <div class="recruit-female-contact__radios">
              <label class="recruit-female-contact__radio">
                <input type="radio" name="subject" value="trial" @checked(old('subject', 'trial') === 'trial') required>
                <span>体験入店希望</span>
              </label>
              <label class="recruit-female-contact__radio">
                <input type="radio" name="subject" value="join" @checked(old('subject') === 'join')>
                <span>入店希望</span>
              </label>
              <label class="recruit-female-contact__radio">
                <input type="radio" name="subject" value="inquiry" @checked(old('subject') === 'inquiry')>
                <span>お問い合わせ</span>
              </label>
            </div>
          </div>
        </div>

        <div class="recruit-female-contact__row recruit-female-contact__row--textarea">
          <div class="recruit-female-contact__label">問い合わせ内容</div>
          <div class="recruit-female-contact__req">必須</div>
          <div class="recruit-female-contact__field">
            <textarea name="inquiry" class="recruit-female-contact__textarea" rows="6" placeholder="ご質問など" required>{{ old('inquiry') }}</textarea>
          </div>
        </div>

        <div class="recruit-female-contact__row">
          <div class="recruit-female-contact__label">メールアドレス</div>
          <div class="recruit-female-contact__req">必須</div>
          <div class="recruit-female-contact__field">
            <input type="email" name="email" value="{{ old('email') }}" class="recruit-female-contact__input" placeholder="ニックネーム可" required>
          </div>
        </div>

        <div class="recruit-female-contact__row">
          <div class="recruit-female-contact__label">メールアドレス（確認）</div>
          <div class="recruit-female-contact__req">必須</div>
          <div class="recruit-female-contact__field">
            <input type="email" name="email_confirmation" value="{{ old('email_confirmation') }}" class="recruit-female-contact__input" placeholder="ニックネーム可" required>
          </div>
        </div>

        <div class="recruit-female-contact__row recruit-female-contact__row--policy">
          <div class="recruit-female-contact__label"></div>
          <div class="recruit-female-contact__req recruit-female-contact__req--empty" aria-hidden="true"></div>
          <div class="recruit-female-contact__field">
            <label class="recruit-female-contact__radio recruit-female-contact__radio--policy">
              <input type="checkbox" name="privacy" value="1" @checked(old('privacy')) required>
              <span>「プライバシーポリシー」に同意します</span>
            </label>
          </div>
        </div>

        <div class="recruit-female-contact__actions">
          <button type="submit" class="recruit-female-contact__submit">送信内容を確認する</button>
        </div>
      </form>
    </div>
  </section>

  <section class="recruit-female-staff-link" aria-labelledby="recruit-female-staff-link-title">
    <div class="recruit-female-staff-link__inner">
      <div class="recruit-female-staff-link__bg" aria-hidden="true">
        <img src="{{ asset('assets/img/female/section7.png') }}" alt="">
      </div>

      <div class="recruit-female-staff-link__content">
        <h2 id="recruit-female-staff-link-title" class="recruit-female-staff-link__heading">
          <span class="recruit-female-staff-link__text--pc">女性も活躍中！スタッフ求人はこちら</span>
          <span class="recruit-female-staff-link__text--sp">女性も活躍中！<br>スタッフ求人はこちら</span>
        </h2>

        <div class="recruit-female-staff-link__banner">
          <a href="{{ route('public.recruit.male') }}">
            <img src="{{ asset('assets/img/female/section7-1.png') }}" alt="スタッフ求人バナー">
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="recruit-stores">
    <div class="recruit-stores__inner">
      <div class="recruit-stores__logo">
        <img
          src="{{ asset('assets/img/female/logo.png') }}"
          alt="Passion Leisure Office"
        >
      </div>
      <div class="recruit-stores__grid">
        <a class="recruit-stores__cardLink" href="https://hokkaido-tohoku.qzin.jp/8988/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-stores__card">
            <div class="recruit-stores__image">
              <img src="{{ asset('assets/img/male/section7.png') }}" alt="">
            </div>
            <div class="recruit-stores__text">
              <p>上品な空間、時を忘れる美貌と</p>
              <p>おもてなしが魅力のヘルス</p>
            </div>
          </article>
        </a>

        <a class="recruit-stores__cardLink" href="https://hokkaido-tohoku.qzin.jp/pussycat011/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-stores__card">
            <div class="recruit-stores__image">
              <img src="{{ asset('assets/img/male/section7-1.png') }}" alt="">
            </div>
            <div class="recruit-stores__text">
              <p>女の子を見て選べる唯一無二の</p>
              <p>エンターテインメントヘルス</p>
            </div>
          </article>
        </a>

        <a class="recruit-stores__cardLink" href="https://hokkaido-tohoku.qzin.jp/miyabi0930/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-stores__card">
            <div class="recruit-stores__image">
              <img src="{{ asset('assets/img/male/section7-2.png') }}" alt="">
            </div>
            <div class="recruit-stores__text">
              <p>雅は、すすきの屈指の人妻・痴女が</p>
              <p>在籍するヘルス</p>
            </div>
          </article>
        </a>

        <a class="recruit-stores__cardLink" href="https://hokkaido-tohoku.qzin.jp/group/hinaShizuku/1/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-stores__card">
            <div class="recruit-stores__image">
              <img src="{{ asset('assets/img/male/section7-3.png') }}" alt="">
            </div>
            <div class="recruit-stores__text">
              <p>若妻、人妻、淫乱妻など大人のエロさ溢れる</p>
              <p>人妻ヘルス店</p>
            </div>
          </article>
        </a>

        <a class="recruit-stores__cardLink" href="https://hokkaido-tohoku.qzin.jp/siroganeze/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-stores__card">
            <div class="recruit-stores__image">
              <img src="{{ asset('assets/img/male/section7-5.png') }}" alt="">
            </div>
            <div class="recruit-stores__text">
              <p>容姿端麗なオトナ女性による</p>
              <p>丁寧な本格マッサージ店</p>
            </div>
          </article>
        </a>

        <a class="recruit-stores__cardLink" href="https://hokkaido-tohoku.qzin.jp/lovesS/" target="_blank" rel="noopener noreferrer">
          <article class="recruit-stores__card">
            <div class="recruit-stores__image">
              <img src="{{ asset('assets/img/male/section7-4.png') }}" alt="">
            </div>
            <div class="recruit-stores__text">
              <p>アナタ色のエッチな女の子に育てられる</p>
              <p>育成型ヘルス</p>
            </div>
          </article>
        </a>
      </div>
    </div>
  </section>

  <footer class="recruit-female-footer">
    <p class="recruit-female-footer__copy">
      Copyright © PLO Group All Rights Reserved.
    </p>
  </footer>

  @push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var thumbButtons = document.querySelectorAll('.recruit-female-movie__thumbButton');

        thumbButtons.forEach(function(button) {
          button.addEventListener('click', function() {
            var targetId = button.getAttribute('data-target-video');
            var nextSrc = button.getAttribute('data-video-src');
            var targetVideo = document.getElementById(targetId);

            if (!targetVideo || !nextSrc) {
              return;
            }

            var source = targetVideo.querySelector('source');
            if (!source) {
              return;
            }

            if (source.getAttribute('src') === nextSrc) {
              return;
            }

            targetVideo.pause();
            source.setAttribute('src', nextSrc);
            targetVideo.load();
          });
        });
      });
    </script>
  @endpush

</x-public-groups-sub-page-layout>

{{-- Styles are included in groups.scss --}}

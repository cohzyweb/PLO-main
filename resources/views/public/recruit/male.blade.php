<x-public-groups-sub-page-layout
  titleEn=""
  titleJa=""
  :bannerImage="asset('')"
  :vectorImage="asset('')"
  :showButtonGroup="false"
  :showLoadMore="false"
  :showDateSearchBar="false"
>
  @push('styles')
    <style>
      @media screen and (min-width: 1280px) {
        .banner-photodiary--male ~ .main {
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

        .banner-photodiary--male ~ .main > .recruit-line-cta,
        .banner-photodiary--male ~ .main > .recruit-message,
        .banner-photodiary--male ~ .main > .recruit-point,
        .banner-photodiary--male ~ .main > .recruit-job,
        .banner-photodiary--male ~ .main > .recruit-interview,
        .banner-photodiary--male ~ .main > .recruit-blog,
        .banner-photodiary--male ~ .main > .recruit-faq,
        .banner-photodiary--male ~ .main > .recruit-requirements,
        .banner-photodiary--male ~ .main > .recruit-form-male,
        .banner-photodiary--male ~ .main > .recruit-footer-logo,
        .banner-photodiary--male ~ .main > .recruit-stores--male,
        .banner-photodiary--male ~ .main > .recruit-female-footer--male {
          width: 100%;
          max-width: 1440px;
          margin-left: 0;
          margin-right: 0;
        }
      }

      @media screen and (min-width: 1441px) {
        .banner-photodiary--male ~ .main .recruit-message__content {
          min-height: 838px;
          height: 838px;
        }

        .banner-photodiary--male ~ .main .recruit-point__content {
          min-height: 1305px;
          height: 1305px;
        }

        .banner-photodiary--male ~ .main .recruit-job__inner {
          min-height: 2689px;
          height: 2689px;
        }

        .banner-photodiary--male ~ .main .recruit-interview__inner {
          min-height: 838px;
          height: 838px;
        }

        .banner-photodiary--male ~ .main .recruit-blog__inner {
          min-height: 1004.97px;
          height: 1004.97px;
        }

        .banner-photodiary--male ~ .main .recruit-faq__inner {
          min-height: 955px;
          height: 955px;
        }

        .banner-photodiary--male ~ .main .recruit-requirements__inner {
          min-height: 1149px;
          height: 1149px;
        }

        .banner-photodiary--male ~ .main .recruit-requirements__card {
          max-width: 500px;
          height: 733px;
        }

        .banner-photodiary--male ~ .main .recruit-form-male__inner {
          min-height: 1214px;
          height: 1214px;
        }

        .banner-photodiary--male ~ .main .recruit-stores__inner {
          min-height: 320px;
          height: 320px;
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

  <section class="recruit-line-cta" id="top" aria-label="公式LINEから簡単応募バナー">
    <div class="recruit-line-cta__inner">
      <div class="recruit-message__line-cta">
        <a href="#recruit-form" class="recruit-message__line-ctaLink">
          <span class="recruit-message__line-ctaIcon">
            <img src="{{ asset('assets/img/male/line.png') }}" alt="LINE公式アカウント">
          </span>
          <span class="recruit-message__line-ctaText">公式LINEから簡単応募！</span>
        </a>
      </div>
    </div>
  </section>

  <section class="recruit-message">
    <div class="recruit-message__inner">
      <div class="recruit-message__content">
        <div class="recruit-message__text">
          <div class="recruit-message__headline">
            <span class="recruit-message__script">Message</span>
          </div>
          <h2 class="recruit-message__title">
            <span>しっかり休んで、</span>
            <span>きっちり稼ぐ。</span>
          </h2>
          <div class="recruit-message__points">
            <p>平均月給25.5万円！</p>
            <p>月6回は必ず休み！</p>
          </div>
          <div class="recruit-message__paragraphs">
            <p>物価高騰など、暮らしに不安を感じる時代。<br>PLOグループでは、社員一人ひとりが<br>安心して働ける職場環境づくりに取り組んでいます。</p>

            <p>年中無休の職場であっても、月6回は必ず休みを確保。<br>プライベートの時間もしっかり大切にできます。<br>また、年齢や業界経験は問いません。<br>「挑戦してみたい」という気持ちがあれば、<br>どなたでも歓迎いたします。</p>

            <p>創業約20年、安定した運営を続けてきた私たちだからこそ、<br>未経験の方でも安心してスタートできる環境があります。<br>ぜひPLOグループで新しい一歩を踏み出してください。</p>
          </div>
        </div>
        <div class="recruit-message__image">
          <img src="{{ asset('assets/img/male/section1.png') }}" alt="男性スタッフイメージ">
        </div>
      </div>
    </div>
  </section>

  <section class="recruit-point">
    <div class="recruit-point__inner">
      <div class="recruit-point__decor" aria-hidden="true">
        <img src="{{ asset('assets/img/male/Point.png') }}" alt="">
      </div>

      <div class="recruit-point__content">
        <div class="recruit-point__heading">
          <h2 class="recruit-point__headingTitle">
            <span>このお仕事の</span><span class="recruit-point__headingAccent">ポイント</span>
          </h2>
        </div>

        <div class="recruit-point__cards">
          <article class="recruit-point__card">
            <div class="recruit-point__cardBody">
              <h3 class="recruit-point__cardTitle">幅広く活躍中！</h3>
              <p class="recruit-point__cardText">
                年齢関係なく、幅広く活躍中。女性もいる職場で、業界特有の風俗感もない人ばかり。未経験も多く、転職やダブルワークといった様々な人材が集まっています。
              </p>
            </div>
            <div class="recruit-point__cardImage">
              <img src="{{ asset('assets/img/male/section2-1.png') }}" alt="スタッフ写真">
            </div>
          </article>

          <article class="recruit-point__card">
            <div class="recruit-point__cardBody">
              <h3 class="recruit-point__cardTitle">食事補助金付き！</h3>
              <p class="recruit-point__cardText">
                業界では数少ない、“食事補助金”が出るグループです。以前まではまかない料理を提供しておりましたが社員の希望により変更となりました。
              </p>
            </div>
            <div class="recruit-point__cardImage">
              <img src="{{ asset('assets/img/male/section2.png') }}" alt="食事補助イメージ">
            </div>
          </article>

          <article class="recruit-point__card">
            <div class="recruit-point__cardBody">
              <h3 class="recruit-point__cardTitle">未経験歓迎！</h3>
              <p class="recruit-point__cardText">
                最初のお仕事は単純業務ばかり。一つ一つ先輩が教えていきます。まずは清掃から。わからないことは気軽に聞ける環境なのでご安心ください。
              </p>
            </div>
            <div class="recruit-point__cardImage">
              <img src="{{ asset('assets/img/male/section2-2.png') }}" alt="受付業務イメージ">
            </div>
          </article>
        </div>

        <div class="recruit-point__guarantee">
          <div class="recruit-point__guaranteeHeading">
            <h2 class="recruit-point__guaranteeTitle">
              <span>充実の</span><span class="recruit-point__headingAccent">保証</span><span>！</span>
            </h2>
          </div>
          <p class="recruit-point__guaranteeLead">
            頑張った分だけ評価される制度と、充実した保証で、働くスタッフの安定をサポートしております。
          </p>

          <ul class="recruit-point__benefits" aria-label="福利厚生・制度">
            <li class="recruit-point__benefit">昇給制度あり</li>
            <li class="recruit-point__benefit">大入り手当あり</li>
            <li class="recruit-point__benefit">暖房手当あり</li>
            <li class="recruit-point__benefit">交通機関時間外の送迎あり</li>
            <li class="recruit-point__benefit">社会保険完備</li>
            <li class="recruit-point__benefit">制服貸与</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <section class="recruit-job" id="job-content">
    <div class="recruit-job__inner">
      <div class="recruit-job__decor" aria-hidden="true">
        <img src="{{ asset('assets/img/male/Job.png') }}" alt="">
      </div>

      <div class="recruit-job__content">
        <header class="recruit-job__header">
          <div class="recruit-job__titleWrapper">
            <h2 class="recruit-job__title">主なお仕事内容</h2>
          </div>
          <p class="recruit-job__subtitle">
            <span>仕事内容は主に</span>
            <span>「接客」「清掃」「発信」です。</span>
          </p>
        </header>

        <div class="recruit-job__rows">
          <article class="recruit-job__row">
            <div class="recruit-job__rowMedia">
              <div class="recruit-job__rowImage">
                <img src="{{ asset('assets/img/male/section3.png') }}" alt="受付業務イメージ">
              </div>
              <div class="recruit-job__rowTag recruit-job__rowTag--image">
                <img src="{{ asset('assets/img/male/icon3-1.png') }}" alt="">
                <span class="recruit-job__rowTagText">受付業務</span>
              </div>
            </div>
            <div class="recruit-job__rowBody">
              <h3 class="recruit-job__rowHeading">
                <span>お客様からの問い合わせ</span><br>
                <span>予約確認・受付対応</span>
              </h3>
              <p class="recruit-job__rowText">
                さまざまなお客様がご利用いただいているので、丁寧な接客とコミュニケーション能力が求められます。
              </p>
            </div>
          </article>

          <article class="recruit-job__row">
            <div class="recruit-job__rowMedia">
              <div class="recruit-job__rowImage">
                <img src="{{ asset('assets/img/male/section3-1.png') }}" alt="接客・案内業務イメージ">
              </div>
              <div class="recruit-job__rowTag recruit-job__rowTag--image">
                <img src="{{ asset('assets/img/male/icon3-1.png') }}" alt="">
                <span class="recruit-job__rowTagText">接客・案内<br>業務</span>
              </div>
            </div>
            <div class="recruit-job__rowBody">
              <h3 class="recruit-job__rowHeading">
                <span>お客様を待合室やお部屋へ</span><br>
                <span>ご案内する接客業務</span>
              </h3>
              <p class="recruit-job__rowText">
                会計、待ち時間の案内、注意事項喚起やお手洗の確認などをお願いしております。
              </p>
            </div>
          </article>

          <article class="recruit-job__row">
            <div class="recruit-job__rowMedia">
              <div class="recruit-job__rowImage">
                <img src="{{ asset('assets/img/male/section3-2.png') }}" alt="WEB情報更新業務イメージ">
              </div>
              <div class="recruit-job__rowTag recruit-job__rowTag--image">
                <img src="{{ asset('assets/img/male/icon3-1.png') }}" alt="">
                <span class="recruit-job__rowTagText">WEB情報<br>更新業務</span>
              </div>
            </div>
            <div class="recruit-job__rowBody">
              <h3 class="recruit-job__rowHeading">
                <span>お客様が来店の参考にされる</span><br>
                <span>WEBサイトの情報更新</span>
              </h3>
              <p class="recruit-job__rowText">
                キャストの出勤情報や、ブログの更新、ニュースの発信の他、日々の日報などもPC入力で行います。
              </p>
            </div>
          </article>

          <article class="recruit-job__row">
            <div class="recruit-job__rowMedia">
              <div class="recruit-job__rowImage">
                <img src="{{ asset('assets/img/male/section3-3.png') }}" alt="清掃業務イメージ">
              </div>
              <div class="recruit-job__rowTag recruit-job__rowTag--image">
                <img src="{{ asset('assets/img/male/icon3-1.png') }}" alt="">
                <span class="recruit-job__rowTagText">清掃業務</span>
              </div>
            </div>
            <div class="recruit-job__rowBody">
              <h3 class="recruit-job__rowHeading">
                <span>タオル等備品の整理・整頓や</span><br>
                <span>清掃など</span>
              </h3>
              <p class="recruit-job__rowText">
                お客様やスタッフが気持ちよく利用できるよう、掃き掃除や拭き掃除・備品の整理といった清掃を行います。
              </p>
            </div>
          </article>
        </div>

        <section class="recruit-flow" id="daily-flow">
          <header class="recruit-flow__header">
            <div class="recruit-flow__titleWrapper">
              <h2 class="recruit-flow__title">1日の流れ</h2>
            </div>
          </header>

          <div class="recruit-flow__timeline">
            <div class="recruit-flow__line" aria-hidden="true">
              <img src="{{ asset('assets/img/male/Line2.png') }}" alt="">
            </div>
            <div class="recruit-flow__row">
              <div class="recruit-flow__label">出勤</div>
              <div class="recruit-flow__icon">
                <img src="{{ asset('assets/img/male/icon-3.png') }}" alt="">
              </div>
              <div class="recruit-flow__text">
                出勤したらまずは制服に着替えて、勤務準備
              </div>
            </div>

            <div class="recruit-flow__row">
              <div class="recruit-flow__label">清掃</div>
              <div class="recruit-flow__icon">
                <img src="{{ asset('assets/img/male/icon-3.png') }}" alt="">
              </div>
              <div class="recruit-flow__text">
                お客様とスタッフが気持ちよく利用できるよう隅々まできれいにします
              </div>
            </div>

            <div class="recruit-flow__row">
              <div class="recruit-flow__label">補充作業等</div>
              <div class="recruit-flow__icon">
                <img src="{{ asset('assets/img/male/icon-3.png') }}" alt="">
              </div>
              <div class="recruit-flow__text">
                前日営業時に不足しているものがあれば買い出し・補充をします。
              </div>
            </div>

            <div class="recruit-flow__row">
              <div class="recruit-flow__label">
                <span>受付・接客</span><br>
                <span>情報更新等</span>
              </div>
              <div class="recruit-flow__icon">
                <img src="{{ asset('assets/img/male/icon-3.png') }}" alt="">
              </div>
              <div class="recruit-flow__text">
                来店いただいたお客様をご案内いたします。また、店舗ホームページやスタッフブログの更新。出勤情報などを発信も大切な仕事です。
              </div>
            </div>

            <div class="recruit-flow__row">
              <div class="recruit-flow__label">清掃</div>
              <div class="recruit-flow__icon">
                <img src="{{ asset('assets/img/male/icon-3.png') }}" alt="">
              </div>
              <div class="recruit-flow__text">
                お客様にまたきていただけるようの、きれいに清掃いたします。
              </div>
            </div>

            <div class="recruit-flow__row">
              <div class="recruit-flow__label">退勤</div>
              <div class="recruit-flow__icon">
                <img src="{{ asset('assets/img/male/icon-3.png') }}" alt="">
              </div>
              <div class="recruit-flow__text">
                日報など記入し、業務終了です。
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>

  <section class="recruit-interview" id="interview">
    <div class="recruit-interview__inner">
      <div class="recruit-interview__script" aria-hidden="true">
        <img src="{{ asset('assets/img/male/Interview.png') }}" alt="">
      </div>

      <div class="recruit-interview__layout">
        <div class="recruit-interview__visual">
          <img src="{{ asset('assets/img/male/section4.png') }}" alt="先輩スタッフ">
        </div>

        <div class="recruit-interview__content">
          <header class="recruit-interview__header">
            <p class="recruit-interview__lead">
              <span>先輩に</span><span>聞いてみた</span>
            </p>
            <div class="recruit-interview__meta">
              <p class="recruit-interview__name">
                <span class="recruit-interview__nameMain">平野さん</span>
                <span class="recruit-interview__nameSub">34歳 ／ 店舗スタッフ</span>
              </p>
              <p class="recruit-interview__profile">年収400万円以上 / 勤続年数0年1ヶ月</p>
            </div>
          </header>

          <div class="recruit-interview__qas">
            <article class="recruit-interview__qa recruit-interview__qa--active">
              <div class="recruit-interview__question">
                <p>Q なぜこのお店を選んだのですか？</p>
                <span class="recruit-interview__icon">▲</span>
              </div>
              <div class="recruit-interview__answer">
                <p>物価高騰など、暮らしに不安を感じる時代。</p>
                <p>PLOグループでは、社員一人ひとりが</p>
                <p>安心して働ける職場環境づくりに取り組んでいます。</p>
              </div>
            </article>

            <article class="recruit-interview__qa">
              <div class="recruit-interview__question">
                <p>Q なぜこのお店を選んだのですか？</p>
                <span class="recruit-interview__icon">▲</span>
              </div>
            </article>

            <article class="recruit-interview__qa">
              <div class="recruit-interview__question">
                <p>Q なぜこのお店を選んだのですか？</p>
                <span class="recruit-interview__icon">▲</span>
              </div>
            </article>

            <article class="recruit-interview__qa">
              <div class="recruit-interview__question">
                <p>Q なぜこのお店を選んだのですか？</p>
                <span class="recruit-interview__icon">▲</span>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="recruit-blog">
    <div class="recruit-blog__inner">
      <header class="recruit-blog__header">
        <div class="recruit-blog__titleWrapper">
          <h2 class="recruit-blog__title">店舗スタッフブログ</h2>
        </div>
      </header>

      <div class="recruit-blog__carousel-wrapper">
        <div class="recruit-blog__carousel" data-recruit-blog-carousel>
          @for ($i = 0; $i < 5; $i++)
            <article class="recruit-blog__card">
              <div class="recruit-blog__cardImage">
                <img src="{{ asset('assets/img/male/section5.png') }}" alt="スタッフブログサムネイル">
              </div>
              <div class="recruit-blog__cardBody">
                <div class="recruit-blog__cardMeta">
                  <p class="recruit-blog__cardDate">00.00.00</p>
                  <div class="recruit-blog__cardText">
                    <p>現代は、物価高騰など生活が安定しない</p>
                    <p>不安を抱えている方々が多い時代です。</p>
                    <p>PLOグループでは、社員皆さんの不安を少</p>
                  </div>
                </div>
                <p class="recruit-blog__cardShop">SHOPS／雫</p>
              </div>
            </article>
          @endfor
        </div>
      </div>

      <div class="recruit-blog__arrows">
        <button
          type="button"
          class="recruit-blog__arrow recruit-blog__arrow--prev"
          data-recruit-blog-prev
          aria-label="前のブログへ"
        >
          <img src="{{ asset('assets/img/male/heroicons-solid_arrow-left.png') }}" alt="">
        </button>
        <button
          type="button"
          class="recruit-blog__arrow recruit-blog__arrow--next"
          data-recruit-blog-next
          aria-label="次のブログへ"
        >
          <img src="{{ asset('assets/img/male/heroicons-solid_arrow-right.png') }}" alt="">
        </button>
      </div>
    </div>
  </section>

  <section class="recruit-faq" id="faq">
    <div class="recruit-faq__inner">
      <header class="recruit-faq__header">
        <div class="recruit-faq__titleWrapper">
          <h2 class="recruit-faq__title">よくあるご質問</h2>
        </div>
      </header>

      <div class="recruit-faq__list">
        <article class="recruit-faq__item recruit-faq__item--active">
          <div class="recruit-faq__question">
            <p class="recruit-faq__questionText">よくある質問</p>
            <span class="recruit-faq__icon">▲</span>
          </div>
          <div class="recruit-faq__divider"></div>
          <div class="recruit-faq__answer">
            <p>
              回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります回答が入ります
            </p>
          </div>
        </article>

        <article class="recruit-faq__item">
          <div class="recruit-faq__question">
            <p class="recruit-faq__questionText">よくある質問</p>
            <span class="recruit-faq__icon">▼</span>
          </div>
        </article>

        <article class="recruit-faq__item">
          <div class="recruit-faq__question">
            <p class="recruit-faq__questionText">よくある質問</p>
            <span class="recruit-faq__icon">▼</span>
          </div>
        </article>
      </div>
    </div>
  </section>

<section class="recruit-requirements" id="requirements">
    <div class="recruit-requirements__inner">
      <header class="recruit-requirements__header">
        <div class="recruit-requirements__titleWrapper">
          <h2 class="recruit-requirements__title">募集要項</h2>
        </div>
      </header>

      <div class="recruit-requirements__cards" data-requirements-carousel>
        <article class="recruit-requirements__card">
          <header class="recruit-requirements__cardHeader">
            <div class="recruit-requirements__cardHeaderMain">
              <p class="recruit-requirements__position">店舗スタッフ</p>
              <p class="recruit-requirements__updated">更新日：00.00.00</p>
            </div>
          </header>

          <div class="recruit-requirements__rows">
            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label recruit-requirements__label--highlight">
                <p>募集店舗</p>
              </div>
              <div class="recruit-requirements__value">
                <p>雫</p>
              </div>
            </div>

            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label">
                <p>雇用形態</p>
              </div>
              <div class="recruit-requirements__value">
                <p>正社員／アルバイト</p>
              </div>
            </div>

            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label">
                <p>給与/報酬</p>
              </div>
              <div class="recruit-requirements__value">
                <p>正社員　月給 25万5000円～</p>
                <p>25.5万円～（昇給・昇格査定あり）</p>
                <p>ーーーーーーーーー</p>
                <p>◆準社員　月給：20万円～</p>
                <p>アルバイト　時給 1,300円～</p>
              </div>
            </div>

            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label">
                <p>応募年齢・資格</p>
              </div>
              <div class="recruit-requirements__value">
                <p>18歳以上～</p>
                <p class="bullet-text">・18歳以上の方</p>
                <p class="bullet-text">・能力不問</p>
                <p class="bullet-text">・学歴 / 職歴不問</p>
                <p class="bullet-text">・経験不問 未経験歓迎</p>
                <p class="bullet-text">・必要最低限のコミュニケーション能力<br>があればOK</p>
                <p class="bullet-text">・女性も活躍中</p>
              </div>
            </div>

            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label">
                <p>休日</p>
              </div>
              <div class="recruit-requirements__value">
                <p>■正社員</p>
                <p class="bullet-text">・月6休（週5～6日勤務）</p>
                <p class="bullet-text">・年末年始、お盆、GW期間に休暇あり</p>
                <p class="bullet-text">・慶弔休暇あり</p>
                <p>希望休ご相談受けます。</p>
                <p class="mt-2">■アルバイトの場合はシフト制</p>
              </div>
            </div>
          </div>
        </article>

        <article class="recruit-requirements__card">
          <header class="recruit-requirements__cardHeader">
            <div class="recruit-requirements__cardHeaderMain">
              <p class="recruit-requirements__position">店舗スタッフ</p>
              <p class="recruit-requirements__updated">更新日：00.00.00</p>
            </div>
          </header>

          <div class="recruit-requirements__rows">
            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label recruit-requirements__label--highlight">
                <p>募集店舗</p>
              </div>
              <div class="recruit-requirements__value">
                <p>雫</p>
              </div>
            </div>

            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label">
                <p>雇用形態</p>
              </div>
              <div class="recruit-requirements__value">
                <p>正社員／アルバイト</p>
              </div>
            </div>

            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label">
                <p>給与/報酬</p>
              </div>
              <div class="recruit-requirements__value">
                <p>正社員　月給 25万5000円～</p>
                <p>25.5万円～（昇給・昇格査定あり）</p>
                <p>ーーーーーーーーー</p>
                <p>◆準社員　月給：20万円～</p>
                <p>アルバイト　時給 1,300円～</p>
              </div>
            </div>

            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label">
                <p>応募年齢・資格</p>
              </div>
              <div class="recruit-requirements__value">
                <p>18歳以上～</p>
                <p class="bullet-text">・18歳以上の方</p>
                <p class="bullet-text">・能力不問</p>
                <p class="bullet-text">・学歴 / 職歴不問</p>
                <p class="bullet-text">・経験不問 未経験歓迎</p>
                <p class="bullet-text">・必要最低限のコミュニケーション能力<br>があればOK</p>
                <p class="bullet-text">・女性も活躍中</p>
              </div>
            </div>

            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label">
                <p>休日</p>
              </div>
              <div class="recruit-requirements__value">
                <p>■正社員</p>
                <p class="bullet-text">・月6休（週5～6日勤務）</p>
                <p class="bullet-text">・年末年始、お盆、GW期間に休暇あり</p>
                <p class="bullet-text">・慶弔休暇あり</p>
                <p>希望休ご相談受けます。</p>
                <p class="mt-2">■アルバイトの場合はシフト制</p>
              </div>
            </div>
          </div>
        </article>

        <article class="recruit-requirements__card">
          <header class="recruit-requirements__cardHeader">
            <div class="recruit-requirements__cardHeaderMain">
              <p class="recruit-requirements__position">店舗スタッフ</p>
              <p class="recruit-requirements__updated">更新日：00.00.00</p>
            </div>
          </header>

          <div class="recruit-requirements__rows">
            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label recruit-requirements__label--highlight">
                <p>募集店舗</p>
              </div>
              <div class="recruit-requirements__value">
                <p>雫</p>
              </div>
            </div>

            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label">
                <p>雇用形態</p>
              </div>
              <div class="recruit-requirements__value">
                <p>正社員／アルバイト</p>
              </div>
            </div>

            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label">
                <p>給与/報酬</p>
              </div>
              <div class="recruit-requirements__value">
                <p>正社員　月給 25万5000円～</p>
                <p>25.5万円～（昇給・昇格査定あり）</p>
                <p>ーーーーーーーーー</p>
                <p>◆準社員　月給：20万円～</p>
                <p>アルバイト　時給 1,300円～</p>
              </div>
            </div>

            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label">
                <p>応募年齢・資格</p>
              </div>
              <div class="recruit-requirements__value">
                <p>18歳以上～</p>
                <p class="bullet-text">・18歳以上の方</p>
                <p class="bullet-text">・能力不問</p>
                <p class="bullet-text">・学歴 / 職歴不問</p>
                <p class="bullet-text">・経験不問 未経験歓迎</p>
                <p class="bullet-text">・必要最低限のコミュニケーション能力<br>があればOK</p>
                <p class="bullet-text">・女性も活躍中</p>
              </div>
            </div>

            <div class="recruit-requirements__row">
              <div class="recruit-requirements__label">
                <p>休日</p>
              </div>
              <div class="recruit-requirements__value">
                <p>■正社員</p>
                <p class="bullet-text">・月6休（週5～6日勤務）</p>
                <p class="bullet-text">・年末年始、お盆、GW期間に休暇あり</p>
                <p class="bullet-text">・慶弔休暇あり</p>
                <p>希望休ご相談受けます。</p>
                <p class="mt-2">■アルバイトの場合はシフト制</p>
              </div>
            </div>
          </div>
        </article>
      </div>

      <div class="recruit-requirements__dots" data-requirements-dots>
        <span class="recruit-requirements__dot recruit-requirements__dot--active" data-requirements-dot></span>
        <span class="recruit-requirements__dot" data-requirements-dot></span>
        <span class="recruit-requirements__dot" data-requirements-dot></span>
      </div>
    </div>
  </section>

  <section class="recruit-form-male" id="recruit-form">
    <div class="recruit-form-male__inner">
      <div class="recruit-form-male__script" aria-hidden="true">
        <img src="{{ asset('assets/img/male/Form.png') }}" alt="">
      </div>

      <div class="recruit-form-male__content">
        <h2 class="recruit-form-male__title">
          <span>お問い合わせ＆</span>
          <span>応募フォーム</span>
        </h2>

        <form action="{{ route('public.recruit.submit') }}" method="POST" class="recruit-form-male__form">
          @csrf
          <input type="hidden" name="type" value="male">

          <div class="recruit-form-male__row">
            <div class="recruit-form-male__label">
              <span>希望勤務店舗</span>
              <span class="required">※必須</span>
            </div>
            <div class="recruit-form-male__field">
              <select name="shop" id="male_shop" class="recruit-form-male__select" required>
                <option value="">選択してください</option>
                <option value="shizuku">雫</option>
                <option value="miyabi">雅</option>
                <option value="pussycat">プッシーキャット</option>
                <option value="en">艶</option>
                <option value="siroganeze">シロガネーゼ</option>
                <option value="lovestory">ラブストーリー</option>
              </select>
            </div>
          </div>

          <div class="recruit-form-male__row">
            <div class="recruit-form-male__label">
              <span>氏名</span>
              <span class="required">※必須</span>
            </div>
            <div class="recruit-form-male__field">
              <input type="text" name="name" id="male_name" class="recruit-form-male__input" required>
            </div>
          </div>

          <div class="recruit-form-male__row">
            <div class="recruit-form-male__label">
              <span>フリガナ</span>
              <span class="required">※必須</span>
            </div>
            <div class="recruit-form-male__field">
              <input type="text" name="furigana" id="male_furigana" class="recruit-form-male__input" required>
            </div>
          </div>

          <div class="recruit-form-male__row">
            <div class="recruit-form-male__label">
              <span>メールアドレス</span>
              <span class="required">※必須</span>
            </div>
            <div class="recruit-form-male__field">
              <input type="email" name="email" id="male_email" class="recruit-form-male__input" required>
            </div>
          </div>

          <div class="recruit-form-male__row">
            <div class="recruit-form-male__label">
              <span>年齢</span>
              <span class="required">※必須</span>
            </div>
            <div class="recruit-form-male__field">
              <select name="age" id="male_age" class="recruit-form-male__select" required>
                <option value="">選択してください</option>
                @for ($i = 18; $i <= 60; $i++)
                  <option value="{{ $i }}">{{ $i }}歳</option>
                @endfor
              </select>
            </div>
          </div>

          <div class="recruit-form-male__row">
            <div class="recruit-form-male__label">
              <span>風俗店での業務経験</span>
              <span class="required">※必須</span>
            </div>
            <div class="recruit-form-male__field recruit-form-male__field--radio">
              <label class="recruit-form-male__radioLabel">
                <input type="radio" name="experience" value="yes">
                <span>あり</span>
              </label>
              <label class="recruit-form-male__radioLabel">
                <input type="radio" name="experience" value="no" checked>
                <span>なし</span>
              </label>
            </div>
          </div>

          <div class="recruit-form-male__row recruit-form-male__row--textarea">
            <div class="recruit-form-male__label">
              <span>問い合わせ内容</span>
              <span class="required">※必須</span>
            </div>
            <div class="recruit-form-male__field">
              <textarea
                name="inquiry"
                id="male_inquiry"
                class="recruit-form-male__textarea"
                rows="6"
                placeholder="ご質問のほか、求人希望の有無などもご記入ください"
                required
              ></textarea>
            </div>
          </div>

          <div class="recruit-form-male__actions">
            <button type="submit" class="recruit-form-male__submit">送信確認画面へ</button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <section class="recruit-footer-logo" aria-label="PLOグループ フッターロゴ">
    <div class="recruit-footer-logo__inner">
      <img
        src="{{ asset('assets/img/male/logo_footer.png') }}"
        alt="Passion Leisure Office"
        class="recruit-footer-logo__image"
        width="250"
        height="139"
      >
    </div>
  </section>

  <section class="recruit-stores recruit-stores--male">
    <div class="recruit-stores__inner">
      <div class="recruit-stores__grid">
        <article class="recruit-stores__card">
          <div class="recruit-stores__image">
            <img src="{{ asset('assets/img/male/section7.png') }}" alt="">
          </div>
          <div class="recruit-stores__text">
            <p>上品な空間、時を忘れる美貌と</p>
            <p>おもてなしが魅力のヘルス</p>
          </div>
        </article>

        <article class="recruit-stores__card">
          <div class="recruit-stores__image">
            <img src="{{ asset('assets/img/male/section7-1.png') }}" alt="">
          </div>
          <div class="recruit-stores__text">
            <p>女の子を見て選べる唯一無二の</p>
            <p>エンターテインメントヘルス</p>
          </div>
        </article>

        <article class="recruit-stores__card">
          <div class="recruit-stores__image">
            <img src="{{ asset('assets/img/male/section7-2.png') }}" alt="">
          </div>
          <div class="recruit-stores__text">
            <p>雅は、すすきの屈指の人妻・痴女が</p>
            <p>在籍するヘルス</p>
          </div>
        </article>

        <article class="recruit-stores__card">
          <div class="recruit-stores__image">
            <img src="{{ asset('assets/img/male/section7-3.png') }}" alt="">
          </div>
          <div class="recruit-stores__text">
            <p>若妻、人妻、淫乱妻など大人のエロさ溢れる</p>
            <p>人妻ヘルス店</p>
          </div>
        </article>

        <article class="recruit-stores__card">
          <div class="recruit-stores__image">
            <img src="{{ asset('assets/img/male/section7-5.png') }}" alt="">
          </div>
          <div class="recruit-stores__text">
            <p>容姿端麗なオトナ女性による</p>
            <p>丁寧な本格マッサージ店</p>
          </div>
        </article>

        <article class="recruit-stores__card">
          <div class="recruit-stores__image">
            <img src="{{ asset('assets/img/male/section7-4.png') }}" alt="">
          </div>
          <div class="recruit-stores__text">
            <p>アナタ色のエッチな女の子に育てられる</p>
            <p>育成型ヘルス</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <footer class="recruit-female-footer recruit-female-footer--male">
    <p class="recruit-female-footer__copy">
      Copyright © PLO Group All Rights Reserved.
    </p>
  </footer>

</x-public-groups-sub-page-layout>

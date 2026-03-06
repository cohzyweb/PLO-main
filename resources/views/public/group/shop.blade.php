<x-public-front-layout>

  <!-- Main Visual -->
  <x-public.group.mv />

  <!-- Shop -->
 <!-- ピックアップ - Pickup Girl -->
  <section class="shop">
    <div class="section-title">
      <span class="section-title-en front-title title-font">
        <span>S</span><span>H</span><span>O</span><span>P</span> <span>L</span><span>I</span><span>S</span><span>T</span>
      </span>
      <h2 class="section-title-ja title-font-sm">店舗一覧</h2>
    </div>
    <div class="shop-group content-wrapper">
      {{-- <div class="shop-group-contents">
      <div class="shop-group-title title-font-sm">
        PLOグループ
      </div> --}}
      <div class="shop-group-list">
        @foreach ($shops as $shop)
          <a href="{{ route('public.shop.home', $shop->slug) }}">
          <div class="shop-group-item">
            <div class="shop-group-item-title --{{ $shop->slug }}">
              {{ $shop->name }}
            </div>
            @switch($shop->slug)
              @case('pussycat')
                <div class="shop-group-item-logo">
                  <img src="{{ asset('assets/img/logo/pussycat-logo.png') }}" alt="pussycat">
                </div>
                <div class="shop-group-item-text">
                  <div class="shop-group-item-text-content">
                    プッシーキャットは、すすきので屈指の開店前から長蛇の列ができる有名ヘルスです。その理由は、女の子を実際に目で見てから選べる他店にはシステム。札幌のみならず全国でも有名なお店となっており、お仲間と入場するだけでも、これまでに味わったことのない楽しい時間を過ごすことができます。
                  </div>
                </div>
                @break
              @case('shizuku')
                <div class="shop-group-item-logo">
                  <img src="{{ asset('assets/img/logo/shizuku-logo.png') }}" alt="shizuku">
                </div>
                <div class="shop-group-item-text">
                  <div class="shop-group-item-text-content">
                    雫は、札幌の歓楽街「すすきの」でハイレベルな女性のみが在籍する高級ヘルス。ススキノに数多くあるヘルス街から少し離れた場所にあり、外観もオシャレな見た目となっています。また他のお客様と目が合わぬよう、それぞれ仕切りで独立した待合スペースをご用意しております。
                  </div>
                </div>
                @break
              @case('miyabi')
                <div class="shop-group-item-logo">
                  <img src="{{ asset('assets/img/logo/miyabi-logo-m.png') }}" alt="miyabi">
                </div>
                <div class="shop-group-item-text">
                  <div class="shop-group-item-text-content">
                    雅は、王様イスを使った密着洗体が人気のラグジュアリーなヘルスです。淡白なサービスではなく、濃厚で肌と肌が触れ合う密着度が高いサービスを求めている貴方にはぴったり。エロさ×密着度300％で快楽に溺れられる空間です。
                  </div>
                </div>
                @break
              @case('en')
                <div class="shop-group-item-logo">
                  <img src="{{ asset('assets/img/logo/en-logo-m.png') }}" alt="en">
                </div>
                <div class="shop-group-item-text">
                  <div class="shop-group-item-text-content">
                    ファッションヘルス「艶~エン~」は、人妻や若妻などの大人女性によるヘルスサービスが楽しめるお店。サラリーマンや学生の方でも、ご来店頂きやすい激安料金システムが魅力。
                  </div>
                </div>
                @break
              @case('siroganeze')
                <div class="shop-group-item-logo">
                  <img src="{{ asset('assets/img/logo/siroganeze-logo.png') }}" alt="siroganeze">
                </div>
                <div class="shop-group-item-text">
                  <div class="shop-group-item-text-content">
                    シロガネーゼは、ススキノで屈指の腕前を持ったセラピストが在籍するプレミアムメンズエステです。体のコリをほぐしてくれる本格的なアロママッサージと共に、回春サービスが一緒になっているので全身をリフレッシュしたい方のおすすめのお店となっています。ネーミングだけのエステに嫌気がさしている方は是非1度、高級メンズエステ「シロガネーゼ」にご来店してみてください。
                  </div>
                </div>
                @break
              @case('lovestory')
                <div class="shop-group-item-logo">
                  <img src="{{ asset('assets/img/logo/lovestory-logo.png') }}" alt="lovestory">
                </div>
                <div class="shop-group-item-text">
                  <div class="shop-group-item-text-content">
                    ラブストーリーは、20代前半のあどけない美少女を育てられる育成型ヘルスです。男性経験が少ないけど、大人の世界を知りたい・・・そんな女の子を成長させられる楽しみがある新感覚ヘルスになっています。料金も35分6,700円からと超リーズナブルなので、推しの女の子を探して、自分色に染めてみませんか？
                  </div>
                </div>
                @break
            @endswitch
            <div class="shop-group-item-intro --{{ $shop->slug }}">
              <table class="shop-group-item-intro-table">
                <tr class="shop-group-item-intro-table-tr-address">
                  <td class="shop-group-item-intro-table-td-label --{{ $shop->slug }}">
                    住所
                  </td>
                  <td class="shop-group-item-intro-table-td-value">
                    {{ $shop->address1}}<br>{{ $shop->address2 }}
                  </td>
                </tr>
                <tr>
                  <td class="shop-group-item-intro-table-td-label --{{ $shop->slug }}">
                    TEL
                  </td>
                  <td class="shop-group-item-intro-table-td-value">
                    {{ $shop->tel }}
                  </td>
                </tr>
                <tr>
                  <td class="shop-group-item-intro-table-td-label --{{ $shop->slug }}">
                    営業時間　
                  </td>
                  <td class="shop-group-item-intro-table-td-value">
                    {{ $shop->open_start ? \Carbon\Carbon::parse($shop->open_start)->format('H:i') : '' }}
                    {{ $shop->open_end ? 'から'.\Carbon\Carbon::parse($shop->open_end)->format('H:i') : '' }}
                  </td>
                </tr>
              </table>
              {{-- <div class="shop-group-item-intro-address">
                {{ $shop->name }}
              </div>
              <div class="shop-group-item-intro-tel">
                {{ $shop->intro }}
              </div>
              <div class="shop-group-item-intro-time">
                {{ $shop->intro }}
              </div> --}}
              <div class="shop-group-item-intro-memo --{{ $shop->slug }}">
                {{-- ※電話受付予約（当日8:30） --}}
                {{ $shop->memo }}
              </div>
            </div>
          </div>
          </a>
        @endforeach
      </div>
    {{-- </div> --}}
    </div>
    {{-- <div class="shop-list">
      @foreach ($shops as $shop)
        <div class="shop-item">
          <div class="shop-name">
            {{ $shop->name }}
          </div>
          <div class="shop-address1">
            {{ $shop->address1 }}
          </div>
          <div class="shop-address2">
            {{ $shop->address2 }}
          </div>
          <div class="shop-tel">
            {{ $shop->tel }}
          </div>
          <a href="{{ route('public.shop.home', $shop->slug) }}" class="shop-more ">店舗詳細</a>
        </div>
        @endforeach
    </div> --}}

  </section>
</x-public-front-layout>
@once
  @vite(['resources/scss/group/_shop.scss'])
@endonce

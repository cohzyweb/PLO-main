<x-shizuku-layout>
  <div class="home">
      <div class="banner-image">
          {{-- <img class="pc-only" src="/assets/img/shops/shizuku/home-banner.png" alt="home gradient overlay">
          <img class="sp-only" src="/assets/img/shops/shizuku/home-banner-sp.jpg" alt="home gradient overlay"> --}}
      </div>
      <div class="home-gradient-overlay"></div>

      <!-- Menu Overlay Component -->
      <x-public.shops.menu-overlay logo-image="assets/img/shops/en/footer-logo-black.png" logo-alt="En Logo"
          :menu-links="[
              'top' => route('public.shops.shop.home', ['shop' => 'en']),
              'schedule' => route('public.shops.shop.schedule', ['shop' => 'en']),
              'pricing' => route('public.shops.shop.system', ['shop' => 'en']),
              'new' => route('public.shops.shop.newcast', ['shop' => 'en']),
              'cast' => route('public.shops.shop.castlist', ['shop' => 'en']),
              'news' => route('public.shops.shop.news', ['shop' => 'en']),
              'event' => route('public.shops.shop.event', ['shop' => 'en']),
              'diary' => route('public.shops.shop.photo-diary', ['shop' => 'en']),
              'movie' => route('public.shops.shop.movie', ['shop' => 'en']),
              'review' => route('public.shops.shop.review', ['shop' => 'en']),
              'ranking' => route('public.shops.shop.ranking', ['shop' => 'en']),
              'shop' => route('public.shops.shop.shop-list', ['shop' => 'en']),
              'access' => route('public.shops.shop.access', ['shop' => 'en']),
              'recruit-male' => '#',
              'login' => route('login'),
              'recruit-female' => '#',
              'register' => route('register'),
          ]" :bottom-buttons="[
              'group' => '#',
              'recruit' => '#',
          ]" :bottom-button-images="[
              'group' => 'assets/img/shops/shizuku/plo-group-btn.png',
              'recruit' => 'assets/img/shops/shizuku/recruit-btn.png',
          ]"
          mobile-image="assets/img/shops/shizuku/credit_system.png" mobile-image-alt="女の子募集中" menuCloseColor="#0B0B07"
          twitterColor="#2A1A08" menuRectColor="rgba(255, 255, 255, 0.9)" :menuIconColor="[
              'top' => '#8A6620',
              'new' => '#52B845',
              'event' => '#FFD775',
              'review' => '#8A6B20',
              'shop' => '#590202',
              'schedule' => '#1D47AA',
              'cast' => '#9668B6',
              'diary' => '#A30ABA',
              'ranking' => '#D6AD01',
              'login' => '#260101',
              'register' => '#260101',
              'pricing' => '#DCC305',
              'news' => '#8A6620',
              'movie' => '#260101',
              'access' => '#8A6B20',
              'recruit-female' => '#D42032',
              'recruit-male' => '#363B8D',
          ]" />

      <div class="banner">
          <x-public.shops.contact-info phone-icon="assets/img/shops/en/phone.png" phone-number="011-563-6969"
              email="@sapporoenn0219" address="〒064-0806</br>
北海道札幌市中央区南5条西5丁目 第8旭観光ビル2F" hours="9:00 ~ 0:00"
              credit-text="クレジット決済可能" note="電話予約の対応時間は朝8:30~となります。" phone-background="#905148"
              address-background="#FFF9FE" />
          <div class="register">
              <x-public.shops.register-button text="新規会員登録はコチラ！" background-color="#FFF5FB" text-color="#FF3498" />
          </div>
      </div>
      <div class="home-content">
          <!-- Breadcrumb Navigation -->
          <div class="breadcrumb-navigation">
              <p>fashion health 艶 ＞ トップページ</p>
          </div>
          <x-public.shops.home-header logo-image="assets/img/shops/en/footer-logo.png"
              logo-alt="En Logo" stroke-color="#FFF" :menu-items="[
                  [
                      'title' => 'トップページ',
                      'subtitle' => 'top page',
                      'url' => route('public.shops.shop.home', ['shop' => 'en']),
                  ],
                  [
                      'title' => 'キャスト一覧',
                      'subtitle' => 'cast list',
                      'url' => route('public.shops.shop.castlist', ['shop' => 'en']),
                  ],
                  [
                      'title' => '出勤情報',
                      'subtitle' => 'schedule',
                      'url' => route('public.shops.shop.schedule', ['shop' => 'en']),
                  ],
                  [
                      'title' => '写メ日記',
                      'subtitle' => 'photo diary',
                      'url' => route('public.shops.shop.photo-diary', ['shop' => 'en']),
                  ],
                  [
                      'title' => 'イベント一覧',
                      'subtitle' => 'event',
                      'url' => route('public.shops.shop.event', ['shop' => 'en']),
                  ],
                  [
                      'title' => '料金システム',
                      'subtitle' => 'system',
                      'url' => route('public.shops.shop.system', ['shop' => 'en']),
                  ],
                  [
                      'title' => '新人情報',
                      'subtitle' => 'new cast',
                      'url' => route('public.shops.shop.newcast', ['shop' => 'en']),
                  ],
                  ['title' => 'ログイン', 'subtitle' => 'login', 'url' => route('login')],
              ]" menu-button-id="mobileMenuButton"
              background-color="#3A2D35" :mobileMenuBttonItems="[
                  [
                      'title' => 'トップページ',
                      'subtitle' => 'top page',
                      'url' => route('public.shops.shop.home', ['shop' => 'en']),
                  ],
                  [
                      'title' => '出勤情報',
                      'subtitle' => 'schedule',
                      'url' => route('public.shops.shop.schedule', ['shop' => 'en']),
                  ],
                  [
                      'title' => '料金システム',
                      'subtitle' => 'system',
                      'url' => route('public.shops.shop.system', ['shop' => 'en']),
                  ],
                  ['title' => 'ログイン', 'subtitle' => 'login', 'url' => route('login')],
              ]"
              social-svg='<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
<path d="M5.71429 0C2.5625 0 0 2.5625 0 5.71429V34.2857C0 37.4375 2.5625 40 5.71429 40H34.2857C37.4375 40 40 37.4375 40 34.2857V5.71429C40 2.5625 37.4375 0 34.2857 0H5.71429ZM32.2411 7.5L22.9732 18.0893L33.875 32.5H25.3393L18.6607 23.7589L11.0089 32.5H6.76786L16.6786 21.1696L6.22321 7.5H14.9732L21.0179 15.4911L28 7.5H32.2411ZM28.8661 29.9643L13.6964 9.90179H11.1696L26.5089 29.9643H28.8571H28.8661Z" fill="#FFF9FE"/>
</svg>' />


          <div class="trans-concept">
            <div class="trans-concept-header">
              <h2>{!! __('trans.concept') !!}</h2>
            </div>
            <div class="trans-concept-content">
              {!! __('trans.concept_content') !!}
            </div>
            <div class="trans-concept-playguide-header">
              <h2>{!! __('trans.playguide') !!}</h2>
            </div>
            <div class="trans-concept-playguide-subject">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="35" viewBox="0 0 26 35" fill="none">
                  <path d="M3.48938 0L5.03394 0.68188L12.8051 8.17029L20.4795 0.68188L22.0241 0H22.6956C24.5021 0.486863 25.226 1.46741 25.3791 3.34258C25.0769 9.26539 25.7887 15.6069 25.3872 21.4806C25.1991 24.2313 24.3167 24.5872 22.6244 26.311C20.3573 28.6212 17.5878 31.7183 15.1756 33.7476C14.5014 34.3149 13.8849 34.6818 13.0253 34.9055C12.8507 34.8905 12.6587 34.9286 12.4881 34.9055C11.7212 34.7991 11.055 34.3709 10.4721 33.884C8.13514 31.9325 5.48791 28.9472 3.29195 26.7202C1.48415 24.8873 0.327746 24.4331 0.126282 21.4806C-0.275302 15.6069 0.436537 9.26539 0.134341 3.34258C0.284767 1.49195 1.05167 0.492318 2.81784 0H3.48938ZM12.7567 29.9959C14.304 28.8122 15.5974 27.2834 16.9834 25.9019C17.7691 25.1205 20.7978 22.5471 21.0208 21.6824L21.014 7.50205C20.7051 7.00837 20.2042 6.95382 19.7475 7.30157L12.7581 14.2486L12.7567 29.9959Z" fill="#795085"/>
                  </svg>
                  <span>
                    {!! __('trans.playguide_subject') !!}
                  </span>
            </div>
            <div class="trans-concept-playguide-content">
              <div class="trans-concept-playguide-content-list">
                  {!! __('trans.playguide_content') !!}
              </div>
              <div class="trans-concept-playguide-content-note">
                {!! __('trans.playguide_note') !!}
              </div>
            </div>
            <div class="trans-concept-playguide-image">
              <img src="{{ asset('assets/img/shops/en/playguide-image.png') }}" alt="Playguide Image">
            </div>
            <div class="trans-concept-notes-header">
              <h2>{!! __('trans.notes') !!}</h2>
            </div>
            <div class="trans-concept-notes-subject">
                {!! __('trans.notes_subject') !!}
            </div>
            <div class="trans-concept-notes-content">
              @for ($i = 1; $i <= 12; $i++)
              <div class="trans-concept-notes-content-item">
                <div class="trans-concept-notes-content-item-img">
                  <img src="{{ asset('assets/img/shops/en/note-' . $i . '.png') }}" alt="Notes Image">
                </div>
                <div class="trans-concept-notes-content-item-text">
                    {!! __('trans.notes_content_' . $i) !!}
                </div>
              </div>

              @endfor
            </div>
            <div class="trans-concept-access-header">
              <h2>{!! __('trans.access') !!}</h2>
            </div>
            <div class="trans-concept-access-content">
              <h2>{!! __('trans.access_about') !!}</h2>
              <div class="trans-concept-access-content-list">
                @for ($i = 1; $i <= 4; $i++)
                <div class="trans-concept-access-content-list-item">
                  <h3>{!! __('trans.access_about_item_' . $i) !!}</h3>
                  <p>{!! __('trans.access_about_item_' . $i . '_en_content') !!}</p>
                </div>
                @endfor
              </div>
              <h2>{!! __('trans.access_map') !!}</h2>
              <div class="trans-concept-access-content-map">
                <iframe src="https://www.google.com/maps?q='Dai-8 Asahi Kanko Building,Minami 5-jo Nishi 5-chome,Chuo-ku, Sapporo-shi,Hokkaido, Japan'&output=embed" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>

          @php
              $banner_list = [];
              $i = 0;
              foreach ($banners as $banner) {
                  # code...
                  $banner_list[$i]['image'] = asset('storage/' . $banner->thumbnail);
                  $banner_list[$i]['alt'] = $banner->title;
                  if ($banner->link_url) {
                      $banner_list[$i]['url'] = $banner->link_url;
                  } else {
                      $banner_list[$i]['url'] = '#';
                  }
                  $i += 1;
              }
          @endphp
          <x-public.shops.footer :shops="[
              [
                  'image' => 'assets/img/shops/shizuku/001.jpg',
                  'alt' => 'Shop 1',
                  'text1' => '上品な空間、時を忘れる美貌とおもてなしが魅力のヘルス',
                  'text2' => '',
                  'url' => '#',
              ],
              [
                  'image' => 'assets/img/shops/shizuku/002.jpg',
                  'alt' => 'Shop 2',
                  'text1' => '女の子を見て選べる唯一無二のエンターテインメントヘルス',
                  'text2' => '',
                  'url' => '#',
              ],
              [
                  'image' => 'assets/img/shops/shizuku/003.jpg',
                  'alt' => 'Shop 3',
                  'text1' => '雅は、すすきの屈指の人妻・痴女が在籍するヘルス',
                  'text2' => '',
                  'url' => '#',
              ],
              [
                  'image' => 'assets/img/shops/shizuku/004.jpg',
                  'alt' => 'Shop 4',
                  'text1' => '若妻、人妻、淫乱妻など大人のエロさ溢れる人妻ヘルス店',
                  'text2' => '',
                  'url' => '#',
              ],
              [
                  'image' => 'assets/img/shops/shizuku/005.jpg',
                  'alt' => 'Shop 5',
                  'text1' => '女の子を見て選べる唯一無二のエンターテインメントヘルス',
                  'text2' => '',
                  'url' => '#',
              ],
              [
                  'image' => 'assets/img/shops/shizuku/006.jpg',
                  'alt' => 'Shop 6',
                  'text1' => 'アナタ色のエッチな女の子に育てられる育成型ヘルス',
                  'text2' => '',
                  'url' => '#',
              ],
          ]" :menu-links="[
              ['text' => '店舗TOP', 'url' => route('public.shops.shop.home', ['shop' => 'en'])],
              ['text' => '出勤情報', 'url' => route('public.shops.shop.schedule', ['shop' => 'en'])],
              ['text' => '料金システム', 'url' => route('public.shops.shop.system', ['shop' => 'en'])],
              ['text' => 'キャスト一覧', 'url' => route('public.shops.shop.castlist', ['shop' => 'en'])],
              ['text' => '新着情報', 'url' => route('public.shops.shop.newcast', ['shop' => 'en'])],
              ['text' => 'SNS', 'url' => '#'],
              ['text' => '店舗一覧', 'url' => route('public.shops.shop.shop-list', ['shop' => 'en'])],
              ['text' => 'ログイン', 'url' => route('login')],
              ['text' => '新規会員登録', 'url' => route('register')],
              [
                  'text' => 'メルマガ',
                  'url' => 'https://17auto.biz/plogroup/registp/entryform2.htm',
                  'target' => '_blank',
              ],
              ['text' => '女性求人', 'url' => '#'],
              ['text' => '男性求人', 'url' => '#'],
              ['text' => '個人情報保護方針', 'url' => 'https://plo-group.jp/privacy-policy', 'target' => '_blank'],
              ['text' => 'グループTOP', 'url' => 'https://plo-group.jp/', 'target' => '_blank'],
          ]" :external-links="$banner_list"
              footerLogo="{{ asset('assets/img/shops/en/footer-logo.png') }}" svgIconColor="#A24395"
              ploLogo="{{ asset('assets/img/shops/en/plo-logo.png') }}"
              groupSiteLogo="{{ asset('assets/img/shops/en/plo-logo.png') }}" />
      </div>

      <!-- Fixed Phone Button -->
      <x-public.shops.fixed-phone-button phone-number="0115636969" phone-display="011-563-6969"
          hours="8:30〜24:00まで" mobile-text="TEL"
          icon-svg='<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
<path d="M23.5316 24.9894C20.6394 24.9894 17.7762 24.3646 14.9422 23.1152C12.1083 21.8657 9.5339 20.084 7.21915 17.7702C4.90439 15.4564 3.12274 12.888 1.8742 10.0652C0.625659 7.24229 0.000925532 4.37314 0 1.45771V0H8.19096L9.47513 6.9762L5.51848 10.9676C6.02753 11.8699 6.59441 12.7261 7.21915 13.5359C7.84388 14.3457 8.51489 15.0977 9.23218 15.7919C9.90319 16.4629 10.6381 17.1052 11.4368 17.7188C12.2355 18.3325 13.0972 18.9049 14.0218 19.4362L18.0479 15.4101L24.9894 16.8331V24.9894H23.5316Z" fill="white"/>
</svg>'
          mobileImage="{{ asset('assets/img/shops/en/TEL-y1.png') }}" />

      <!-- Fixed Side Buttons -->
      <div class="fixed-side-trans-button">
        <img src="{{ asset('assets/img/shops/en/trans.png') }}" alt="Transparent BG">
      </div>
      <div class="trans-dialog">
        <div class="trans-dialog-header">
          {{-- <button class="trans-dialog-close">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
              <path d="M23.5316 24.9894C20.6394 24.9894 17.7762 24.3646 14.9422 23.1152C12.1083 21.8657 9.5339 20.084 7.21915 17.7702C4.90439 15.4564 3.12274 12.888 1.8742 10.0652C0.625659 7.24229 0.000925532 4.37314 0 1.45771V0H8.19096L9.47513 6.9762L5.51848 10.9676C6.02753 11.8699 6.59441 12.7261 7.21915 13.5359C7.84388 14.3457 8.51489 15.0977 9.23218 15.7919C9.90319 16.4629 10.6381 17.1052 11.4368 17.7188C12.2355 18.3325 13.0972 18.9049 14.0218 19.4362L18.0479 15.4101L24.9894 16.8331V24.9894H23.5316Z" fill="white"/>
            </svg>
          </button> --}}
        </div>
        <div class="trans-dialog-content">
          <div class="trans-dialog-content-header">
            <button class="trans-dialog-close"> close </button>
          </div>
          <h3>Translation Page</h3>
          <div class="trans-dialog-content-btns">
            <a href="{{ route('public.shops.shop.trans', ['shop' => 'en', 'lang' => 'en']) }}" class="trans-dialog-content-btn-link">
              <span>English
              </span>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 24C5.36471 24 0 18.6353 0 12C0 5.36471 5.36471 0 12 0C18.6353 0 24 5.36471 24 12C24 18.6353 18.6353 24 12 24ZM12 1.41176C6.14118 1.41176 1.41176 6.14118 1.41176 12C1.41176 17.8588 6.14118 22.5882 12 22.5882C17.8588 22.5882 22.5882 17.8588 22.5882 12C22.5882 6.14118 17.8588 1.41176 12 1.41176Z" fill="white"/>
                <path d="M11.7883 18.8471L10.8 17.8588L16.6589 12L10.8 6.14117L11.7883 5.15293L18.6353 12L11.7883 18.8471Z" fill="white"/>
                <path d="M5.64706 11.2941H17.6471V12.7059H5.64706V11.2941Z" fill="white"/>
              </svg>
            </a>
              <a href="{{ route('public.shops.shop.trans', ['shop' => 'en', 'lang' => 'zh-CN']) }}" class="trans-dialog-content-btn-link">
                <span>简体字
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M12 24C5.36471 24 0 18.6353 0 12C0 5.36471 5.36471 0 12 0C18.6353 0 24 5.36471 24 12C24 18.6353 18.6353 24 12 24ZM12 1.41176C6.14118 1.41176 1.41176 6.14118 1.41176 12C1.41176 17.8588 6.14118 22.5882 12 22.5882C17.8588 22.5882 22.5882 17.8588 22.5882 12C22.5882 6.14118 17.8588 1.41176 12 1.41176Z" fill="white"/>
                  <path d="M11.7883 18.8471L10.8 17.8588L16.6589 12L10.8 6.14117L11.7883 5.15293L18.6353 12L11.7883 18.8471Z" fill="white"/>
                  <path d="M5.64706 11.2941H17.6471V12.7059H5.64706V11.2941Z" fill="white"/>
                  </svg>
            </a>
              <a href="{{ route('public.shops.shop.trans', ['shop' => 'en', 'lang' => 'zh-TW']) }}" class="trans-dialog-content-btn-link">
                <span>台湾語
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M12 24C5.36471 24 0 18.6353 0 12C0 5.36471 5.36471 0 12 0C18.6353 0 24 5.36471 24 12C24 18.6353 18.6353 24 12 24ZM12 1.41176C6.14118 1.41176 1.41176 6.14118 1.41176 12C1.41176 17.8588 6.14118 22.5882 12 22.5882C17.8588 22.5882 22.5882 17.8588 22.5882 12C22.5882 6.14118 17.8588 1.41176 12 1.41176Z" fill="white"/>
                  <path d="M11.7883 18.8471L10.8 17.8588L16.6589 12L10.8 6.14117L11.7883 5.15293L18.6353 12L11.7883 18.8471Z" fill="white"/>
                  <path d="M5.64706 11.2941H17.6471V12.7059H5.64706V11.2941Z" fill="white"/>
                  </svg>
            </a>
              <a href="{{ route('public.shops.shop.trans', ['shop' => 'en', 'lang' => 'ko']) }}" class="trans-dialog-content-btn-link">
                <span>한국어
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M12 24C5.36471 24 0 18.6353 0 12C0 5.36471 5.36471 0 12 0C18.6353 0 24 5.36471 24 12C24 18.6353 18.6353 24 12 24ZM12 1.41176C6.14118 1.41176 1.41176 6.14118 1.41176 12C1.41176 17.8588 6.14118 22.5882 12 22.5882C17.8588 22.5882 22.5882 17.8588 22.5882 12C22.5882 6.14118 17.8588 1.41176 12 1.41176Z" fill="white"/>
                  <path d="M11.7883 18.8471L10.8 17.8588L16.6589 12L10.8 6.14117L11.7883 5.15293L18.6353 12L11.7883 18.8471Z" fill="white"/>
                  <path d="M5.64706 11.2941H17.6471V12.7059H5.64706V11.2941Z" fill="white"/>
                  </svg>
            </a>
          </div>
          <div class="trans-dialog-content-footer">
            <span>Opne in a new window</span>
          </div>
        </div>
      </div>
      <x-public.shops.fixed-side-buttons
          newGirlLink="{{ route('public.shops.shop.newcast', ['shop' => 'en']) }}" />
  </div>
  @push('styles')
      @vite(['resources/scss/shops/en/home.scss', 'resources/js/shops/en/home.js', 'resources/js/shops/home-header.js', 'resources/js/shops/news-section.js', 'resources/js/shops/new-girl-slider.js', 'resources/js/shops/castlist-slider.js'])
  @endpush
</x-shizuku-layout>

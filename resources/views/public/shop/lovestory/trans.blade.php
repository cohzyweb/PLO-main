<x-shizuku-layout>
  <div class="home">
      <div class="banner-image">
          {{-- <img class="pc-only" src="/assets/img/shops/shizuku/home-banner.png" alt="home gradient overlay">
          <img class="sp-only" src="/assets/img/shops/shizuku/home-banner-sp.jpg" alt="home gradient overlay"> --}}
      </div>
      <div class="home-gradient-overlay"></div>

      <!-- Menu Overlay Component -->
      <x-public.shops.menu-overlay logo-image="assets/img/shops/lovestory/footer-logo-black.png" logo-alt="Lovestory Logo"
          :menu-links="[
              'top' => route('public.shops.shop.home', ['shop' => 'lovestory']),
              'schedule' => route('public.shops.shop.schedule', ['shop' => 'lovestory']),
              'pricing' => route('public.shops.shop.system', ['shop' => 'lovestory']),
              'new' => route('public.shops.shop.newcast', ['shop' => 'lovestory']),
              'cast' => route('public.shops.shop.castlist', ['shop' => 'lovestory']),
              'news' => route('public.shops.shop.news', ['shop' => 'lovestory']),
              'event' => route('public.shops.shop.event', ['shop' => 'lovestory']),
              'diary' => route('public.shops.shop.photo-diary', ['shop' => 'lovestory']),
              'movie' => route('public.shops.shop.movie', ['shop' => 'lovestory']),
              'review' => route('public.shops.shop.review', ['shop' => 'lovestory']),
              'ranking' => route('public.shops.shop.ranking', ['shop' => 'lovestory']),
              'shop' => route('public.shops.shop.shop-list', ['shop' => 'lovestory']),
              'access' => route('public.shops.shop.access', ['shop' => 'lovestory']),
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
              'shop' => '#1C2D48',
              'schedule' => '#1D47AA',
              'cast' => '#F2387C',
              'diary' => '#A30ABA',
              'ranking' => '#D6AD01',
              'login' => '#1C2D48',
              'register' => '#1C2D48',
              'pricing' => '#DCC305',
              'news' => '#8A6620',
              'movie' => '#1C2D48',
              'access' => '#8A6B20',
              'recruit-female' => '#D42032',
              'recruit-male' => '#363B8D',
          ]" />

      <div class="banner">
          <x-public.shops.contact-info phone-icon="assets/img/shops/lovestory/phone.png" phone-number="011-530-0050"
              email="@lovestory" address="〒064-0805</br>
札幌市中央区南5条西5丁目3-3 第8旭観光ビル1F" hours="9:00 ~ 0:00"
              credit-text="クレジット決済可能" note="電話予約の対応時間は朝8:30~となります。" phone-background="#F2BBCF"
              address-background="rgba(11, 158, 217, 0.80)" />
          <div class="register">
              <x-public.shops.register-button text="新規会員登録はコチラ！" background-color="#FFF5FB" text-color="#FF3498" />
          </div>
      </div>
      <div class="home-content">
          <!-- Breadcrumb Navigation -->
          <div class="breadcrumb-navigation">
              <p>エッチな女の子育成ヘルス ラブストーリー ＞ トップページ</p>
          </div>
          <x-public.shops.home-header logo-image="assets/img/shops/lovestory/footer-logo.png"
              logo-alt="Lovestory Logo" stroke-color="#FFF" :menu-items="[
                  [
                      'title' => 'トップページ',
                      'subtitle' => 'top page',
                      'url' => route('public.shops.shop.home', ['shop' => 'lovestory']),
                  ],
                  [
                      'title' => 'キャスト一覧',
                      'subtitle' => 'cast list',
                      'url' => route('public.shops.shop.castlist', ['shop' => 'lovestory']),
                  ],
                  [
                      'title' => '出勤情報',
                      'subtitle' => 'schedule',
                      'url' => route('public.shops.shop.schedule', ['shop' => 'lovestory']),
                  ],
                  [
                      'title' => '写メ日記',
                      'subtitle' => 'photo diary',
                      'url' => route('public.shops.shop.photo-diary', ['shop' => 'lovestory']),
                  ],
                  [
                      'title' => 'イベント一覧',
                      'subtitle' => 'event',
                      'url' => route('public.shops.shop.event', ['shop' => 'lovestory']),
                  ],
                  [
                      'title' => '料金システム',
                      'subtitle' => 'system',
                      'url' => route('public.shops.shop.system', ['shop' => 'lovestory']),
                  ],
                  [
                      'title' => '新人情報',
                      'subtitle' => 'new cast',
                      'url' => route('public.shops.shop.newcast', ['shop' => 'lovestory']),
                  ],
                  ['title' => 'ログイン', 'subtitle' => 'login', 'url' => route('login')],
              ]" menu-button-id="mobileMenuButton"
              background-color="#fff" :mobileMenuBttonItems="[
                  [
                      'title' => 'トップページ',
                      'subtitle' => 'top page',
                      'url' => route('public.shops.shop.home', ['shop' => 'lovestory']),
                  ],
                  [
                      'title' => '出勤情報',
                      'subtitle' => 'schedule',
                      'url' => route('public.shops.shop.schedule', ['shop' => 'lovestory']),
                  ],
                  [
                      'title' => '料金システム',
                      'subtitle' => 'system',
                      'url' => route('public.shops.shop.system', ['shop' => 'lovestory']),
                  ],
                  ['title' => 'ログイン', 'subtitle' => 'login', 'url' => route('login')],
              ]"
              social-svg='<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
<path d="M5.71429 0C2.5625 0 0 2.5625 0 5.71429V34.2857C0 37.4375 2.5625 40 5.71429 40H34.2857C37.4375 40 40 37.4375 40 34.2857V5.71429C40 2.5625 37.4375 0 34.2857 0H5.71429ZM32.2411 7.5L22.9732 18.0893L33.875 32.5H25.3393L18.6607 23.7589L11.0089 32.5H6.76786L16.6786 21.1696L6.22321 7.5H14.9732L21.0179 15.4911L28 7.5H32.2411ZM28.8661 29.9643L13.6964 9.90179H11.1696L26.5089 29.9643H28.8571H28.8661Z" fill="#F2387C"/>
</svg>' />


          <div class="trans-concept">
            <div class="trans-concept-header">
              <h2>{!! __('trans-lovestory.concept') !!}</h2>
            </div>
            <div class="trans-concept-content">
              {!! __('trans-lovestory.concept_content') !!}
            </div>
            <div class="trans-concept-playguide-header">
              <h2>{!! __('trans-lovestory.playguide') !!}</h2>
            </div>
            <div class="trans-concept-playguide-subject">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="35" viewBox="0 0 26 35" fill="none">
                  <path d="M3.48938 0L5.03394 0.68188L12.8051 8.17029L20.4795 0.68188L22.0241 0H22.6956C24.5021 0.486863 25.226 1.46741 25.3791 3.34258C25.0769 9.26539 25.7887 15.6069 25.3872 21.4806C25.1991 24.2313 24.3167 24.5872 22.6244 26.311C20.3573 28.6212 17.5878 31.7183 15.1756 33.7476C14.5014 34.3149 13.8849 34.6818 13.0253 34.9055C12.8507 34.8905 12.6587 34.9286 12.4881 34.9055C11.7212 34.7991 11.055 34.3709 10.4721 33.884C8.13514 31.9325 5.48791 28.9472 3.29195 26.7202C1.48415 24.8873 0.327746 24.4331 0.126282 21.4806C-0.275302 15.6069 0.436537 9.26539 0.134341 3.34258C0.284767 1.49195 1.05167 0.492318 2.81784 0H3.48938ZM12.7567 29.9959C14.304 28.8122 15.5974 27.2834 16.9834 25.9019C17.7691 25.1205 20.7978 22.5471 21.0208 21.6824L21.014 7.50205C20.7051 7.00837 20.2042 6.95382 19.7475 7.30157L12.7581 14.2486L12.7567 29.9959Z" fill="#795085"/>
                  </svg>
                  <span>
                    {!! __('trans-lovestory.playguide_subject') !!}
                  </span>
            </div>
            <div class="trans-concept-playguide-content">
              <div class="trans-concept-playguide-content-list">
                  {!! __('trans-lovestory.playguide_content') !!}
              </div>
              <div class="trans-concept-playguide-content-note">
                {!! __('trans-lovestory.playguide_note') !!}
              </div>
            </div>
            <div class="trans-concept-playguide-image">
              <img src="{{ asset('assets/img/shops/en/playguide-image.png') }}" alt="Playguide Image">
            </div>
            <div class="trans-concept-notes-header">
              <h2>{!! __('trans-lovestory.notes') !!}</h2>
            </div>
            <div class="trans-concept-notes-subject">
                {!! __('trans-lovestory.notes_subject') !!}
            </div>
            <div class="trans-concept-notes-content">
              @for ($i = 1; $i <= 12; $i++)
              <div class="trans-concept-notes-content-item">
                <div class="trans-concept-notes-content-item-img">
                  <img src="{{ asset('assets/img/shops/en/note-' . $i . '.png') }}" alt="Notes Image">
                </div>
                <div class="trans-concept-notes-content-item-text">
                    {!! __('trans-lovestory.notes_content_' . $i) !!}
                </div>
              </div>

              @endfor
            </div>
            <div class="trans-concept-access-header">
              <h2>{!! __('trans-lovestory.access') !!}</h2>
            </div>
            <div class="trans-concept-access-content">
              <h2>{!! __('trans-lovestory.access_about') !!}</h2>
              <div class="trans-concept-access-content-list">
                @for ($i = 1; $i <= 4; $i++)
                <div class="trans-concept-access-content-list-item">
                  <h3>{!! __('trans-lovestory.access_about_item_' . $i) !!}</h3>
                  <p>{!! __('trans-lovestory.access_about_item_' . $i . '_en_content') !!}</p>
                </div>
                @endfor
              </div>
              <h2>{!! __('trans-lovestory.access_map') !!}</h2>
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
              ['text' => '店舗TOP', 'url' => route('public.shops.shop.home', ['shop' => 'lovestory'])],
              ['text' => '出勤情報', 'url' => route('public.shops.shop.schedule', ['shop' => 'lovestory'])],
              ['text' => '料金システム', 'url' => route('public.shops.shop.system', ['shop' => 'lovestory'])],
              ['text' => 'キャスト一覧', 'url' => route('public.shops.shop.castlist', ['shop' => 'lovestory'])],
              ['text' => '新着情報', 'url' => route('public.shops.shop.newcast', ['shop' => 'lovestory'])],
              ['text' => 'SNS', 'url' => '#'],
              ['text' => '店舗一覧', 'url' => route('public.shops.shop.shop-list', ['shop' => 'lovestory'])],
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
              footerLogo="{{ asset('assets/img/shops/lovestory/footer-logo.png') }}" svgIconColor="#F2387C"
              ploLogo="{{ asset('assets/img/shops/lovestory/plo-logo.png') }}"
              groupSiteLogo="{{ asset('assets/img/shops/lovestory/plo-logo.png') }}" />
      </div>

      <!-- Fixed Phone Button -->
      <x-public.shops.fixed-phone-button phone-number="0115300050" phone-display="011-530-0050"
          hours="8:30〜24:00まで" mobile-text="TEL"
          icon-svg='<svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
<rect x="0.5" y="0.5" width="32.3191" height="32.3191" stroke="#FFE355"/>
<path d="M27.6966 29.1543C24.8043 29.1543 21.9411 28.5295 19.1072 27.2801C16.2732 26.0306 13.6988 24.249 11.3841 21.9351C9.06931 19.6213 7.28766 17.0529 6.03912 14.2301C4.79058 11.4072 4.16584 8.53806 4.16492 5.62263V4.16492H12.3559L13.64 11.1411L9.6834 15.1325C10.1924 16.0349 10.7593 16.891 11.3841 17.7008C12.0088 18.5107 12.6798 19.2627 13.3971 19.9568C14.0681 20.6278 14.803 21.2701 15.6017 21.8838C16.4004 22.4974 17.2621 23.0698 18.1867 23.6011L22.2128 19.575L29.1543 20.998V29.1543H27.6966Z" fill="#F2387C"/>
</svg>'
          mobileImage="{{ asset('assets/img/shops/lovestory/TEL-y1.png') }}" />

      <!-- Fixed Side Buttons -->
      <div class="fixed-side-trans-button">
        <img src="{{ asset('assets/img/shops/lovestory/trans.png') }}" alt="Transparent BG">
      </div>
      <div class="trans-dialog">
        <div class="trans-dialog-header">
        </div>
        <div class="trans-dialog-content">
          <div class="trans-dialog-content-header">
            <button class="trans-dialog-close"> close </button>
          </div>
          <h3>Translation Page</h3>
          <div class="trans-dialog-content-btns">
            <a href="{{ route('public.shops.shop.trans', ['shop' => 'lovestory', 'lang' => 'en']) }}" class="trans-dialog-content-btn-link">
              <span>English
              </span>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 24C5.36471 24 0 18.6353 0 12C0 5.36471 5.36471 0 12 0C18.6353 0 24 5.36471 24 12C24 18.6353 18.6353 24 12 24ZM12 1.41176C6.14118 1.41176 1.41176 6.14118 1.41176 12C1.41176 17.8588 6.14118 22.5882 12 22.5882C17.8588 22.5882 22.5882 17.8588 22.5882 12C22.5882 6.14118 17.8588 1.41176 12 1.41176Z" fill="white"/>
                <path d="M11.7883 18.8471L10.8 17.8588L16.6589 12L10.8 6.14117L11.7883 5.15293L18.6353 12L11.7883 18.8471Z" fill="white"/>
                <path d="M5.64706 11.2941H17.6471V12.7059H5.64706V11.2941Z" fill="white"/>
              </svg>
            </a>
              <a href="{{ route('public.shops.shop.trans', ['shop' => 'lovestory', 'lang' => 'zh-CN']) }}" class="trans-dialog-content-btn-link">
                <span>简体字
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M12 24C5.36471 24 0 18.6353 0 12C0 5.36471 5.36471 0 12 0C18.6353 0 24 5.36471 24 12C24 18.6353 18.6353 24 12 24ZM12 1.41176C6.14118 1.41176 1.41176 6.14118 1.41176 12C1.41176 17.8588 6.14118 22.5882 12 22.5882C17.8588 22.5882 22.5882 17.8588 22.5882 12C22.5882 6.14118 17.8588 1.41176 12 1.41176Z" fill="white"/>
                  <path d="M11.7883 18.8471L10.8 17.8588L16.6589 12L10.8 6.14117L11.7883 5.15293L18.6353 12L11.7883 18.8471Z" fill="white"/>
                  <path d="M5.64706 11.2941H17.6471V12.7059H5.64706V11.2941Z" fill="white"/>
                  </svg>
            </a>
              <a href="{{ route('public.shops.shop.trans', ['shop' => 'lovestory', 'lang' => 'zh-TW']) }}" class="trans-dialog-content-btn-link">
                <span>台湾語
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <path d="M12 24C5.36471 24 0 18.6353 0 12C0 5.36471 5.36471 0 12 0C18.6353 0 24 5.36471 24 12C24 18.6353 18.6353 24 12 24ZM12 1.41176C6.14118 1.41176 1.41176 6.14118 1.41176 12C1.41176 17.8588 6.14118 22.5882 12 22.5882C17.8588 22.5882 22.5882 17.8588 22.5882 12C22.5882 6.14118 17.8588 1.41176 12 1.41176Z" fill="white"/>
                  <path d="M11.7883 18.8471L10.8 17.8588L16.6589 12L10.8 6.14117L11.7883 5.15293L18.6353 12L11.7883 18.8471Z" fill="white"/>
                  <path d="M5.64706 11.2941H17.6471V12.7059H5.64706V11.2941Z" fill="white"/>
                  </svg>
            </a>
              <a href="{{ route('public.shops.shop.trans', ['shop' => 'lovestory', 'lang' => 'ko']) }}" class="trans-dialog-content-btn-link">
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
          newGirlLink="{{ route('public.shops.shop.newcast', ['shop' => 'lovestory']) }}" />
  </div>
  @push('styles')
      @vite(['resources/scss/shops/lovestory/home.scss', 'resources/js/shops/en/home.js', 'resources/js/shops/home-header.js', 'resources/js/shops/news-section.js', 'resources/js/shops/new-girl-slider.js', 'resources/js/shops/castlist-slider.js'])
  @endpush
</x-shizuku-layout>

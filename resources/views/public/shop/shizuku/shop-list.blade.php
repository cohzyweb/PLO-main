<x-shizuku-page-layout page-title="SHOP LIST" page-subtitle="店舗一覧" breadcrumb="すすきのhigh grade health 雫 ＞ トップページ ＞ 店舗一覧"
    :assets="['resources/scss/shops/shizuku/shop-list.scss']" :banners="$banners">
    <section class="shop-list-section">
        <a href="{{ route('public.shops.shop.home', ['shop' => 'shizuku']) }}" class="shop-list-card">
            <div class="shop-list-card-image">
                <img src="{{ asset('assets/img/shops/shizuku/001.jpg') }}" alt="Shop List Card Image">
            </div>
            <div class="shop-list-card-content">
                <p class="shop-list-details">
                    雫は、札幌の歓楽街「すすきの」でハイレベルな女性のみが在籍する高級ヘルス。ススキノに数多くあるヘルス街から少し離れた場所にあり、外観もオシャレな見た目となっています。また他のお客様と目が合わぬよう、それぞれ仕切りで独立した待合スペースをご用意しております。
                </p>
                <div class="shop-list-contact">
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label">住　　所</p>
                        <div class="shop-list-contact-separator"></div>
                        <div class="shop-list-contact-content">
                            <p class="pc-only">{{ $shops[0]->address1 }}</p>
                            <p class="pc-only">{{ $shops[0]->address2 }}</p>
                            <p class="sp-only">{{ $shops[0]->address1 . ' ' . $shops[0]->address2 }}</p>
                        </div>
                    </div>
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label shop-list-contact-label-tel">TEL</p>
                        <div class="shop-list-contact-separator"></div>
                        <p class="shop-list-contact-content">{{ $shops[0]->tel }}</p>
                    </div>
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label">営業時間</p>
                        <div class="shop-list-contact-separator"></div>
                        <p class="shop-list-contact-content">
                            @if ($shops[0]->open_start && $shops[0]->open_end)
                                {{ $shops[0]->open_start->format('H:i') . ' から' . $shops[0]->open_end->format('H:i') }}
                            @else
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('public.shops.shop.home', ['shop' => 'pussycat']) }}" class="shop-list-card">
            <div class="shop-list-card-image">
                <img src="{{ asset('assets/img/shops/shizuku/002.jpg') }}" alt="Shop List Card Image">
            </div>
            <div class="shop-list-card-content">
                <p class="shop-list-details">
                    プッシーキャットは、すすきので屈指の開店前から長蛇の列ができる有名ヘルスです。その理由は、女の子を実際に目で見てから選べる他店にはないシステム。札幌のみならず全国でも有名なお店となっており、お仲間と入場するだけでも、これまでに味わったことのない楽しい時間を過ごすことができます。
                </p>
                <div class="shop-list-contact">
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label">住　　所</p>
                        <div class="shop-list-contact-separator"></div>
                        <div class="shop-list-contact-content">
                            <p class="pc-only">{{ $shops[2]->address1 }}</p>
                            <p class="pc-only">{{ $shops[2]->address2 }}</p>
                            <p class="sp-only">{{ $shops[2]->address1 . ' ' . $shops[2]->address2 }}</p>
                        </div>
                    </div>
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label shop-list-contact-label-tel">TEL</p>
                        <div class="shop-list-contact-separator"></div>
                        <p class="shop-list-contact-content">{{ $shops[2]->tel }}</p>
                    </div>
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label">営業時間</p>
                        <div class="shop-list-contact-separator"></div>
                        <p class="shop-list-contact-content">
                            @if ($shops[2]->open_start && $shops[2]->open_end)
                                {{ $shops[2]->open_start->format('H:i') . ' から' . $shops[2]->open_end->format('H:i') }}
                            @else
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="shop-list-card">
            <div class="shop-list-card-image">
                <img src="{{ asset('assets/img/shops/shizuku/003.jpg') }}" alt="Shop List Card Image">
            </div>
            <div class="shop-list-card-content">
                <p class="shop-list-details">
                    雅は、王様イスを使った密着洗体が人気のラグジュアリーなヘルスです。淡白なサービスではなく、濃厚で肌と肌が触れ合う密着度が高いサービスを求めている貴方にはぴったり。エロさ×密着度300％で快楽に溺れられる空間です。
                </p>
                <div class="shop-list-contact">
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label">住　　所</p>
                        <div class="shop-list-contact-separator"></div>
                        <div class="shop-list-contact-content">
                            <p class="pc-only">{{ $shops[1]->address1 }}</p>
                            <p class="pc-only">{{ $shops[1]->address2 }}</p>
                            <p class="sp-only">{{ $shops[1]->address1 . ' ' . $shops[1]->address2 }}</p>
                        </div>
                    </div>
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label shop-list-contact-label-tel">TEL</p>
                        <div class="shop-list-contact-separator"></div>
                        <p class="shop-list-contact-content">{{ $shops[1]->tel }}</p>
                    </div>
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label">営業時間</p>
                        <div class="shop-list-contact-separator"></div>
                        <p class="shop-list-contact-content">
                            @if ($shops[1]->open_start && $shops[1]->open_end)
                                {{ $shops[1]->open_start->format('H:i') . ' から' . $shops[1]->open_end->format('H:i') }}
                            @else
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="shop-list-card">
            <div class="shop-list-card-image">
                <img src="{{ asset('assets/img/shops/shizuku/006.jpg') }}" alt="Shop List Card Image">
            </div>
            <div class="shop-list-card-content">
                <p class="shop-list-details">
                    ラブストーリーは、20代前半のあどけない美少女を育てられる育成型ヘルスです。男性経験が少ないけど、大人の世界を知りたい…そんな女の子を成長させられる楽しみがある新感覚ヘルスになっています。料金もリーズナブルなので、推しの女の子を探して、自分色に染めてみませんか？
                </p>
                <div class="shop-list-contact">
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label">住　　所</p>
                        <div class="shop-list-contact-separator"></div>
                        <div class="shop-list-contact-content">
                            <p class="pc-only">{{ $shops[5]->address1 }}</p>
                            <p class="pc-only">{{ $shops[5]->address2 }}</p>
                            <p class="sp-only">{{ $shops[5]->address1 . ' ' . $shops[5]->address2 }}</p>
                        </div>
                    </div>
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label shop-list-contact-label-tel">TEL</p>
                        <div class="shop-list-contact-separator"></div>
                        <p class="shop-list-contact-content">{{ $shops[5]->tel }}</p>
                    </div>
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label">営業時間</p>
                        <div class="shop-list-contact-separator"></div>
                        <p class="shop-list-contact-content">
                            @if ($shops[5]->open_start && $shops[5]->open_end)
                                {{ $shops[5]->open_start->format('H:i') . ' から' . $shops[5]->open_end->format('H:i') }}
                            @else
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="shop-list-card">
            <div class="shop-list-card-image">
                <img src="{{ asset('assets/img/shops/shizuku/004.jpg') }}" alt="Shop List Card Image">
            </div>
            <div class="shop-list-card-content">
                <p class="shop-list-details">
                    ファッションヘルス「艶〜エン〜」は、人妻や若妻などの大人女性によるヘルスサービスが楽しめるお店。サラリーマンや学生の方でも、ご来店頂きやすい激安料金システムが魅力。
                </p>
                <div class="shop-list-contact">
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label">住　　所</p>
                        <div class="shop-list-contact-separator"></div>
                        <div class="shop-list-contact-content">
                            <p class="pc-only">{{ $shops[3]->address1 }}</p>
                            <p class="pc-only">{{ $shops[3]->address2 }}</p>
                            <p class="sp-only">{{ $shops[3]->address1 . ' ' . $shops[3]->address2 }}</p>
                        </div>
                    </div>
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label shop-list-contact-label-tel">TEL</p>
                        <div class="shop-list-contact-separator"></div>
                        <p class="shop-list-contact-content">{{ $shops[3]->tel }}</p>
                    </div>
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label">営業時間</p>
                        <div class="shop-list-contact-separator"></div>
                        <p class="shop-list-contact-content">
                            @if ($shops[3]->open_start && $shops[3]->open_end)
                                {{ $shops[3]->open_start->format('H:i') . ' から' . $shops[3]->open_end->format('H:i') }}
                            @else
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </a>
        <a href="#" class="shop-list-card">
            <div class="shop-list-card-image">
                <img src="{{ asset('assets/img/shops/shizuku/005.jpg') }}" alt="Shop List Card Image">
            </div>
            <div class="shop-list-card-content">
                <p class="shop-list-details">
                    シロガネーゼは、ススキノ屈指の腕前を持つセラピストが在籍するプレミアムメンズエステです。体のコリをほぐす本格的なアロママッサージと共に、回春サービスが一緒なので全身をリフレッシュしたい方にオススメのお店となっております。
                </p>
                <div class="shop-list-contact">
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label">住　　所</p>
                        <div class="shop-list-contact-separator"></div>
                        <div class="shop-list-contact-content">
                            <p class="pc-only">{{ $shops[4]->address1 }}</p>
                            <p class="pc-only">{{ $shops[4]->address2 }}</p>
                            <p class="sp-only">{{ $shops[4]->address1 . ' ' . $shops[4]->address2 }}</p>
                        </div>
                    </div>
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label shop-list-contact-label-tel">TEL</p>
                        <div class="shop-list-contact-separator"></div>
                        <p class="shop-list-contact-content">{{ $shops[4]->tel }}</p>
                    </div>
                    <div class="shop-list-contact-row">
                        <p class="shop-list-contact-label">営業時間</p>
                        <div class="shop-list-contact-separator"></div>
                        <p class="shop-list-contact-content">
                            @if ($shops[4]->open_start && $shops[4]->open_end)
                                {{ $shops[4]->open_start->format('H:i') . ' から' . $shops[4]->open_end->format('H:i') }}
                            @else
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </a>
    </section>
</x-shizuku-page-layout>

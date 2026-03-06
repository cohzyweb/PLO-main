<x-mypage-layout>
  <section class="mypage">
    <div class="mypage-container">
      <div class="mypage-container-sidebar">
        <ul class="mypage-container-sidebar-list">
          @if (request()->routeIs('public.group.mypage'))
          <li class="mypage-container-sidebar-list-item active">
            <a href="{{route('public.group.mypage')}}">
              <span>マイページ</span>
            </a>
          </li>
          @else
          <li class="mypage-container-sidebar-list-item">
            <a href="{{route('public.group.mypage')}}">
              <span>マイページ</span>
            </a>
          </li>
          @endif
          @if (request()->routeIs('public.group.memberinfo'))
          <li class="mypage-container-sidebar-list-item active">
            <a href="{{route('public.group.memberinfo')}}">
              <span>会員情報変更</span>
            </a>
          </li>
          @else
          <li class="mypage-container-sidebar-list-item">
            <a href="{{route('public.group.memberinfo')}}">
              <span>会員情報変更</span>
            </a>
          </li>
          @endif
          @if (request()->routeIs('public.group.password'))
          <li class="mypage-container-sidebar-list-item active">
            <a href="{{route('public.group.password')}}">
              <span>パスワード変更</span>
            </a>
          </li>
          @else
          <li class="mypage-container-sidebar-list-item">
            <a href="{{route('public.group.password')}}">
              <span>パスワード変更</span>
            </a>
          </li>
          @endif
          {{-- <li class="mypage-container-sidebar-list-item">
            <a href="#mdf_password">
              <span>パスワード変更</span>
            </a>
          </li> --}}
        </ul>
      </div>
      <div class="mypage-container-main">
        <div class="mypage-container-main-nav sp-only">
          <ul class="mypage-container-main-nav-list">
            @if (request()->routeIs('public.group.mypage'))
            <li class="mypage-container-main-nav-list-item active">
              <a href="{{route('public.group.mypage')}}">
                <span>マイページ</span>
              </a>
            </li>
            @else
            <li class="mypage-container-main-nav-list-item">
              <a href="{{route('public.group.mypage')}}">
                <span>マイページ</span>
              </a>
            </li>
            @endif
            @if (request()->routeIs('public.group.memberinfo'))
            <li class="mypage-container-main-nav-list-item active">
              <a href="{{route('public.group.memberinfo')}}">
                <span>会員情報</span>
              </a>
            </li>
            @else
            <li class="mypage-container-main-nav-list-item">
              <a href="{{route('public.group.memberinfo')}}">
                <span>会員情報</span>
              </a>
            </li>
            @endif
            @if (request()->routeIs('public.group.password'))
            <li class="mypage-container-main-nav-list-item active">
              <a href="{{route('public.group.password')}}">
                <span>パスワード</span>
              </a>
            </li>
            @else
            <li class="mypage-container-main-nav-list-item">
              <a href="{{route('public.group.password')}}">
                <span>パスワード</span> 
              </a>
            </li>
            @endif
          </ul>
        </div>
        <div class="mypage-container-main-mypage" id="mypage">
          {{-- <div class="mypage-container-main-mypage-title title-font">マイページ</div> --}}
          <div class="mypage-container-main-mypage-content pc-only">
            <div class="mypage-container-main-mypage-content-info">
              <div class="mypage-container-main-mypage-content-info-title">
                <img src="{{ asset('assets/img/member.png') }}" alt="会員情報">
                <span>会員情報</span>
              </div>
              <div class="mypage-container-main-mypage-content-info-item">
                <div class="mypage-container-main-mypage-content-info-item-label">会員番号：{{ $member->id }}</div>
                <div class="mypage-container-main-mypage-content-info-item-value">
                  <div class="mypage-container-main-mypage-content-info-item-value-info">
                    <div class="mypage-container-main-mypage-content-info-item-value-info-label">
                      <span>ニックネーム</span>
                    </div>
                    <div class="mypage-container-main-mypage-content-info-item-value-info-value">
                      <span>{{ $member->name }}</span>
                    </div>
                    <div class="mypage-container-main-mypage-content-info-item-value-info-label">
                      <span>登録日</span>
                    </div>
                    <div class="mypage-container-main-mypage-content-info-item-value-info-value">
                      <span>{{ $member->created_at->format('Y-m-d') }}</span>
                    </div>
                  </div>
                  <div class="mypage-container-main-mypage-content-info-item-value-qr">
                    <img src="{{ $qr_code }}" alt="QRコード">
                  </div>
                </div>
              </div>
            </div>
            <div class="mypage-container-main-mypage-content-info">
              <div class="mypage-container-main-mypage-content-info-title">
                <img src="{{ asset('assets/img/point.png') }}" alt="現在のポイント">
                <span>現在のポイント</span>
              </div>
              <div class="mypage-container-main-mypage-content-info-point">
                <div class="mypage-container-main-mypage-content-info-point-label">
                  <span>{{ number_format($today_point) }}pt</span>
                </div>
                <div class="mypage-container-main-mypage-content-info-point-value">
                  <span class="mypage-container-main-mypage-content-info-point-value-title">ポイント利用履歴</span>
                  @foreach($histories as $history)
                  <div class="mypage-container-main-mypage-content-info-point-value-history">
                    <span class="mypage-container-main-mypage-content-info-point-value-history-date">
                      {{ $history->created_at ? \Carbon\Carbon::parse($history->created_at)->format('Y年m月d日') : '' }}
                    </span>
                    <span class="mypage-container-main-mypage-content-info-point-value-history-point">
                      {{ $history->point_use }}pt
                    </span>
                    <span class="mypage-container-main-mypage-content-info-point-value-history-shop">
                      （{{ $history->shop_name }}）
                    </span>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="mypage-container-main-mypage-content-history">
              <div class="mypage-container-main-mypage-content-history-title">
                <img src="{{ asset('assets/img/history.png') }}" alt="来店履歴">
                <span>来店履歴</span>
              </div>
              <div class="mypage-container-main-mypage-content-history-content">
                @foreach($shop_histories as $shop_history)
                <div class="mypage-container-main-mypage-content-history-content-item">
                  <div class="mypage-container-main-mypage-content-history-content-item-info">
                    <span class="mypage-container-main-mypage-content-history-content-item-info-label">
                      来店日
                    </span>
                    <span class="mypage-container-main-mypage-content-history-content-item-info-value">
                      {{ $shop_history->created_at ? \Carbon\Carbon::parse($shop_history->created_at)->format('Y年m月d日') : '' }}
                    </span>
                    <span class="mypage-container-main-mypage-content-history-content-item-info-label">
                      店舗名
                    </span>
                    <span class="mypage-container-main-mypage-content-history-content-item-info-value">
                      {{ $shop_history->shop_name }}
                    </span>
                    <span class="mypage-container-main-mypage-content-history-content-item-info-label">
                      遊んだ女の子
                    </span>
                    <span class="mypage-container-main-mypage-content-history-content-item-info-value">
                      {{ $shop_history->casts_name }}
                    </span>
                  </div>
                  <div class="mypage-container-main-mypage-content-history-content-item-review">
                    <input type="hidden" id="history_id" value="{{ $shop_history->id }}">
                    @if($shop_history->review_id == 0)
                    <button class="mypage-container-main-mypage-content-history-content-item-review-button review-button" id="btn-write-review-{{ $shop_history->id }}">ロコミを書く</button>
                    @else
                    <button class="mypage-container-main-mypage-content-history-content-item-review-button review-button disabled" id="btn-write-review-{{ $shop_history->id }}" disabled>ロコミを書く</button>
                    @endif
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="mypage-container-main-mypage-content-sp sp-only">
            <div class="mypage-container-main-mypage-content-sp-qr">
              <div class="mypage-container-main-mypage-content-sp-title">
                <img src="{{ asset('assets/img/member.png') }}" alt="会員マイページ">
                <span>会員マイページ</span>
              </div>
              <div class="mypage-container-main-mypage-content-sp-qr-content">
                <img src="{{ $qr_code }}" alt="QRコード">
              </div>
            </div>
            <div class="mypage-container-main-mypage-content-sp-member">
              <div class="mypage-container-main-mypage-content-sp-title">
                <img src="{{ asset('assets/img/info.png') }}" alt="会員情報">
                <span>会員情報</span>
              </div>
              <div class="mypage-container-main-mypage-content-sp-member-content">
                <div class="mypage-container-main-mypage-content-sp-member-content-number">
                  会員番号：{{ $member->id }}
                </div>
                <div class="mypage-container-main-mypage-content-sp-member-content-info">
                  <div class="mypage-container-main-mypage-content-sp-member-content-info-name">
                    <span>ニックネーム</span>
                    <span>{{ $member->name }}</span>
                  </div>
                  <hr class="mypage-container-main-mypage-content-sp-member-content-info-hr">
                  <div class="mypage-container-main-mypage-content-sp-member-content-info-date">
                    <span>登録日</span>
                    <span>{{ $member->created_at->format('Y-m-d') }}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="mypage-container-main-mypage-content-sp-point">
              <div class="mypage-container-main-mypage-content-sp-title">
                <img src="{{ asset('assets/img/point.png') }}" alt="現在のポイント">
                <span>現在のポイント</span>
              </div>
              <div class="mypage-container-main-mypage-content-sp-point-content">
                <div class="mypage-container-main-mypage-content-sp-point-content-point">
                  {{ number_format($today_point) }}pt
                </div>
                <div class="mypage-container-main-mypage-content-sp-point-content-history">
                  <span class="mypage-container-main-mypage-content-sp-point-content-history-title">ポイント利用履歴</span>
                  @foreach($histories as $history)
                  <div class="mypage-container-main-mypage-content-sp-point-content-history-item">
                    <span class="mypage-container-main-mypage-content-sp-point-content-history-item-date">
                      {{ $history->created_at ? \Carbon\Carbon::parse($history->created_at)->format('Y年m月d日') : '' }}
                    </span>
                    <span class="mypage-container-main-mypage-content-sp-point-content-history-item-point">
                      {{ $history->point_pay }}pt
                    </span>
                    <span class="mypage-container-main-mypage-content-sp-point-content-history-item-shop">
                      （{{ $history->shop_name }}）
                    </span>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="mypage-container-main-mypage-content-sp-history">
              <div class="mypage-container-main-mypage-content-sp-title">
                <img src="{{ asset('assets/img/history.png') }}" alt="来店履歴">
                <span>来店履歴</span>
              </div>
            </div>
            <div class="mypage-container-main-mypage-content-sp-history-content">
              @foreach($shop_histories as $shop_history)
              <div class="mypage-container-main-mypage-content-sp-history-content-item">
                <div class="mypage-container-main-mypage-content-sp-history-content-item-info">
                  <div class="mypage-container-main-mypage-content-sp-history-content-item-date">
                    来店日　{{ $shop_history->created_at ? \Carbon\Carbon::parse($shop_history->created_at)->format('Y年m月d日') : '' }}
                  </div>
                  <div class="mypage-container-main-mypage-content-sp-history-content-item-shop">
                    店舗名　{{ $shop_history->shop_name }}
                  </div>
                  <div class="mypage-container-main-mypage-content-sp-history-content-item-cast">
                    遊んだ女の子　{{ $shop_history->cast_name }}
                  </div>
                </div>
                <div class="mypage-container-main-mypage-content-sp-history-content-item-review">
                  <input type="hidden" id="history_id" value="{{ $shop_history->id }}"> 
                  @if($shop_history->review_id == 0)
                  <button class="mypage-container-main-mypage-content-sp-history-content-item-review-button review-button" id="btn-write-review-{{ $shop_history->id }}">ロコミを書く</button>
                  @else
                  <button class="mypage-container-main-mypage-content-sp-history-content-item-review-button review-button disabled" id="btn-write-review-{{ $shop_history->id }}" disabled>ロコミを書く</button>
                  @endif
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        
        {{-- <div class="mypage-container-main-member" id="member">
          <h2>会員情報変更</h2>
        </div>
        <div class="mypage-container-main-password" id="mdf_password">
          <h2>パスワード変更</h2>
        </div>
      </div> --}}
    </div>
  </section>
</x-mypage-layout>
@once
  @vite(['resources/scss/mypage.scss'])
@endonce
<script>
window.addEventListener('load', () => {
  const fullWidth = document.querySelector('body').clientWidth;
  if (fullWidth < 768) {
    const header_logo = document.querySelector('.header-child-logo');
    if (header_logo) {
      const header_logo_height = header_logo.offsetHeight;
      const mypage = document.querySelector('.mypage');
      if (mypage) {
        mypage.style.marginTop = `${header_logo_height}px`;
      }
    }
  }
  else if (fullWidth >= 768 && fullWidth < 1440) {
    const header_logo = document.querySelector('.header-child-user');
    if (header_logo) {
      const header_logo_height = header_logo.offsetHeight;
      const mypage = document.querySelector('.mypage');
      if (mypage) {
        mypage.style.marginTop = `${header_logo_height + 5}px`;
      }
    }

  }else{
    const header_logo = document.querySelector('.header-child-user-logo');
    if (header_logo) {
      const header_logo_height = header_logo.offsetHeight;
      const mypage = document.querySelector('.mypage');
      if (mypage) {
        mypage.style.marginTop = `${header_logo_height + 10}px`;
      }
    }

  }
  // const mypage_container_main = document.querySelector('.mypage-container-main');
  // if (mypage_container_main) {
  //   const mypage_container_main_mypage = document.querySelector('.mypage-container-main-mypage');
  //   if (mypage_container_main_mypage) {
  //     mypage_container_main_mypage.style.display = 'block';
  //   }
  //   const mypage_container_main_member = document.querySelector('.mypage-container-main-member');
  //   if (mypage_container_main_member) {
  //     mypage_container_main_member.style.display = 'none';
  //   }
  //   const mypage_container_main_password = document.querySelector('.mypage-container-main-password');
  //   if (mypage_container_main_password) {
  //     mypage_container_main_password.style.display = 'none';
  //   }
  // }

  document.querySelectorAll('.review-button').forEach(btn => {
    btn.addEventListener('click', function () {
      const historyId = document.getElementById('history_id').value;
      window.location.href = `/review?history_id=${historyId}`;
    })
  });
});
document.addEventListener('DOMContentLoaded', function () {
  // const header_logo = document.querySelector('.header-child-user-logo');
  // if (header_logo) {
  //   const header_logo_height = header_logo.offsetHeight;
  //   const mypage = document.querySelector('.mypage');
  //   if (mypage) {
  //     mypage.style.marginTop = `${header_logo_height + 10}px`;
  //   }
  // }
  // const mypage_container_main = document.querySelector('.mypage-container-main');
  // if (mypage_container_main) {
  //   const mypage_container_main_mypage = document.querySelector('.mypage-container-main-mypage');
  //   if (mypage_container_main_mypage) {
  //     mypage_container_main_mypage.style.display = 'block';
  //   }
  //   const mypage_container_main_member = document.querySelector('.mypage-container-main-member');
  //   if (mypage_container_main_member) {
  //     mypage_container_main_member.style.display = 'none';
  //   }
  //   const mypage_container_main_password = document.querySelector('.mypage-container-main-password');
  //   if (mypage_container_main_password) {
  //     mypage_container_main_password.style.display = 'none';
  //   }
  // }

  // document.querySelectorAll('.review-button').forEach(btn => {
  //   btn.addEventListener('click', function () {
  //     const historyId = document.getElementById('history_id').value;
  //     window.location.href = `/review?history_id=${historyId}`;
  //   })
  // });

});

// document.querySelector('a[href="#mypage"]').addEventListener('click', function (e) {
//   const target = e.target;

//   const sidebar_items = document.querySelectorAll('.mypage-container-sidebar-list-item');
//   if (sidebar_items) {
//     sidebar_items.forEach(item => {
//       item.classList.remove('active');
//     });
//   }
//   if (!target.parentElement.parentElement.classList.contains('active')) {
//     target.parentElement.parentElement.classList.add('active');
//   }

//   const mypage_section = document.querySelector('.mypage-container-main-mypage');
//   const member_section = document.querySelector('.mypage-container-main-member');
//   const password_section = document.querySelector('.mypage-container-main-password');
  
//   if (mypage_section) mypage_section.style.display = 'block';
//   if (member_section) member_section.style.display = 'none';
//   if (password_section) password_section.style.display = 'none';
// });
// document.querySelector('a[href="#member"]').addEventListener('click', function (e) {
//   // e.preventDefault();
//   const target = e.target;  
//   // Show member section and hide others
//   const mypage_section = document.querySelector('.mypage-container-main-mypage');
//   const member_section = document.querySelector('.mypage-container-main-member');
//   const password_section = document.querySelector('.mypage-container-main-password');
  
//   if (mypage_section) mypage_section.style.display = 'none';
//   if (member_section) member_section.style.display = 'block';
//   if (password_section) password_section.style.display = 'none';

//   const sidebar_items = document.querySelectorAll('.mypage-container-sidebar-list-item');
//   if (sidebar_items) {
//     sidebar_items.forEach(item => {
//       item.classList.remove('active');
//     });
//   }
//   if (!target.parentElement.parentElement.classList.contains('active')) {
//     target.parentElement.parentElement.classList.add('active');
//   }
// });
// document.querySelector('a[href="#mdf_password"]').addEventListener('click', function (e) {
//   const target = e.target;
//   const sidebar_items = document.querySelectorAll('.mypage-container-sidebar-list-item');
//   if (sidebar_items) {
//     sidebar_items.forEach(item => {
//       item.classList.remove('active');
//     });
//   }
//   if (!target.parentElement.parentElement.classList.contains('active')) {
//     target.parentElement.parentElement.classList.add('active');
//   }
//   const mypage_section = document.querySelector('.mypage-container-main-mypage');
//   const member_section = document.querySelector('.mypage-container-main-member');
//   const password_section = document.querySelector('.mypage-container-main-password');
  
//   if (mypage_section) mypage_section.style.display = 'none';
//   if (member_section) member_section.style.display = 'none';
//   if (password_section) password_section.style.display = 'block';
// });
</script>


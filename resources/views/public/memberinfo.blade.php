<x-mypage-layout>
    <section class="member">
      <div class="member-container">
        <div class="member-container-sidebar">
          <ul class="member-container-sidebar-list">
            @if (request()->routeIs('public.group.mypage'))
            <li class="mypage-container-sidebar-list-item active">
              <a href="{{route('public.group.mypage')}}">
                <span>マイページ</span>
              </a>
            </li>
            @else
            <li class="member-container-sidebar-list-item">
              <a href="{{route('public.group.mypage')}}">
                <span>マイページ</span>
              </a>
            </li>
            @endif
            @if (request()->routeIs('public.group.memberinfo'))
            <li class="member-container-sidebar-list-item active">
              <a href="{{route('public.group.memberinfo')}}">
                <span>会員情報変更</span>
              </a>
            </li>
            @else
            <li class="member-container-sidebar-list-item">
              <a href="{{route('public.group.memberinfo')}}">
                <span>会員情報変更</span>
              </a>
            </li>
            @endif
            @if (request()->routeIs('public.group.password'))
            <li class="member-container-sidebar-list-item active">
              <a href="{{route('public.group.password')}}">
                <span>パスワード変更</span>
              </a>
            </li>
            @else
            <li class="member-container-sidebar-list-item">
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
        <div class="member-container-main">
          <div class="member-container-main-nav sp-only">
            <ul class="member-container-main-nav-list">
              @if (request()->routeIs('public.group.mypage'))
              <li class="member-container-main-nav-list-item active">
                <a href="{{route('public.group.mypage')}}">
                  <span>マイページ</span>
                </a>
              </li>
              @else
              <li class="member-container-main-nav-list-item">
                <a href="{{route('public.group.mypage')}}">
                  <span>マイページ</span>
                </a>
              </li>
              @endif
              @if (request()->routeIs('public.group.memberinfo'))
              <li class="member-container-main-nav-list-item active">
                <a href="{{route('public.group.memberinfo')}}">
                  <span>会員情報</span>
                </a>
              </li>
              @else
              <li class="member-container-main-nav-list-item">
                <a href="{{route('public.group.memberinfo')}}">
                  <span>会員情報</span>
                </a>
              </li>
              @endif
              @if (request()->routeIs('public.group.password'))
              <li class="member-container-main-nav-list-item active">
                <a href="{{route('public.group.password')}}">
                  <span>パスワード</span>
                </a>
              </li>
              @else
              <li class="member-container-main-nav-list-item">
                <a href="{{route('public.group.password')}}">
                  <span>パスワード</span> 
                </a>
              </li>
              @endif
  
            </ul>
          </div>
          <div class="member-container-main-content" >
            <div class="member-container-main-content-title">
              <img src="{{asset('assets/img/member.png')}}" alt="会員情報">
              <span>会員情報</span>
            </div>
            {{-- <div class="member-container-main-content-form"> --}}
              <form action="{{route('public.group.memberinfo')}}" method="post" class="member-container-main-content-form">
                @csrf
                <div class="member-container-main-content-form-items">
                  <div class="member-container-main-content-form-items-item">
                    <label for="member_id">会員番号</label>
                    <div class="member-container-main-content-form-items-item-input">
                      <input type="text" name="member_id" id="member_id" value="{{$member->id}} " readonly>
                    </div>
                  </div>
                  <div class="member-container-main-content-form-items-item">
                    <label for="name">ニックネーム</label>
                    <div class="member-container-main-content-form-items-item-input">
                      <input type="text" name="name" id="name" value="{{old('name', $member->name)}}">
                      @error('name')
                      <span class="error-message">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                <div class="member-container-main-content-form-items-item">
                    <label for="tel">電話番号</label>
                    <div class="member-container-main-content-form-items-item-input">
                      <input type="text" name="tel" id="tel" value="{{old('tel', $member->tel)}}">
                      @error('tel')
                      <span class="error-message">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="member-container-main-content-form-items-item">
                    <label for="email">メールアドレス</label>
                    <div class="member-container-main-content-form-items-item-input">
                      <input type="text" name="email" id="email" value="{{old('email', $member->email)}}">
                      @error('email')
                      <span class="error-message">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="member-container-main-content-form-button">
                  <button type="submit" class="member-container-main-content-form-button-submit">変更</button>
                </div>
              </form>
            {{-- </div> --}}
          </div>
          
      </div>
    </section>
  </x-mypage-layout>
  @once
    @vite(['resources/scss/member.scss'])
  @endonce
  <script>
  window.addEventListener('load', () => {
    const fullWidth = document.querySelector('body').clientWidth;
    if (fullWidth < 768) {
      const header_logo = document.querySelector('.header-child-logo');
      if (header_logo) {
        const header_logo_height = header_logo.offsetHeight;
        const mypage = document.querySelector('.member');
        if (mypage) {
          mypage.style.marginTop = `${header_logo_height}px`;
        }
      }
    }
    else if (fullWidth >= 768 && fullWidth < 1440) {
      const header_logo = document.querySelector('.header-child-user');
      if (header_logo) {
        const header_logo_height = header_logo.offsetHeight;
        const mypage = document.querySelector('.member');
        if (mypage) {
          mypage.style.marginTop = `${header_logo_height + 5}px`;
        }
      }
  
    }else{
      const header_logo = document.querySelector('.header-child-user-logo');
      if (header_logo) {
        const header_logo_height = header_logo.offsetHeight;
        const mypage = document.querySelector('.member');
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
  
    // document.querySelectorAll('.review-button').forEach(btn => {
    //   btn.addEventListener('click', function () {
    //     const historyId = document.getElementById('history_id').value;
    //     window.location.href = `/review?history_id=${historyId}`;
    //   })
    // });
  });
  
  </script>
  
  
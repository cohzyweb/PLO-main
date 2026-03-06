<x-mypage-layout>
    <section class="password">
      <div class="password-container">
        <div class="password-container-sidebar">
          <ul class="password-container-sidebar-list">
            @if (request()->routeIs('public.group.mypage'))
            <li class="password-container-sidebar-list-item active">
              <a href="{{route('public.group.mypage')}}">
                <span>マイページ</span>
              </a>
            </li>
            @else
            <li class="password-container-sidebar-list-item">
              <a href="{{route('public.group.mypage')}}">
                <span>マイページ</span>
              </a>
            </li>
            @endif
            @if (request()->routeIs('public.group.memberinfo'))
            <li class="password-container-sidebar-list-item active">
              <a href="{{route('public.group.memberinfo')}}">
                <span>会員情報変更</span>
              </a>
            </li>
            @else
            <li class="password-container-sidebar-list-item">
              <a href="{{route('public.group.memberinfo')}}">
                <span>会員情報変更</span>
              </a>
            </li>
            @endif
            @if (request()->routeIs('public.group.password'))
            <li class="password-container-sidebar-list-item active">
              <a href="{{route('public.group.password')}}">
                <span>パスワード変更</span>
              </a>
            </li>
            @else
            <li class="password-container-sidebar-list-item">
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
        <div class="password-container-main">
          <div class="password-container-main-nav sp-only">
            <ul class="password-container-main-nav-list">
              @if (request()->routeIs('public.group.mypage'))
              <li class="password-container-main-nav-list-item active">
                <a href="{{route('public.group.mypage')}}">
                  <span>マイページ</span>
                </a>
              </li>
              @else
              <li class="password-container-main-nav-list-item">
                <a href="{{route('public.group.mypage')}}">
                  <span>マイページ</span>
                </a>
              </li>
              @endif
              @if (request()->routeIs('public.group.memberinfo'))
              <li class="password-container-main-nav-list-item active">
                <a href="{{route('public.group.memberinfo')}}">
                  <span>会員情報</span>
                </a>
              </li>
              @else
              <li class="password-container-main-nav-list-item">
                <a href="{{route('public.group.memberinfo')}}">
                  <span>会員情報</span>
                </a>
              </li>
              @endif
              @if (request()->routeIs('public.group.password'))
              <li class="password-container-main-nav-list-item active">
                <a href="{{route('public.group.password')}}">
                  <span>パスワード</span>
                </a>
              </li>
              @else
              <li class="password-container-main-nav-list-item">
                <a href="{{route('public.group.password')}}">
                  <span>パスワード</span> 
                </a>
              </li>
              @endif
  
            </ul>
          </div>
          <div class="password-container-main-content" >
            <div class="password-container-main-content-title">
              <img src="{{asset('assets/img/password.png')}}" alt="会員情報">
              <span>パスワード変更</span>
            </div>
            {{-- <div class="member-container-main-content-form"> --}}
              <form action="{{route('public.group.password')}}" method="post" class="password-container-main-content-form">
                @csrf
                @if (session('success'))
                <div class="password-container-main-content-form-success">
                  <span>{{session('success')}}</span>
                </div>
                @endif
                <div class="password-container-main-content-form-items">
                  <div class="password-container-main-content-form-items-item">
                    <label for="password">以前のパスワード</label>
                    <div class="password-container-main-content-form-items-item-input">
                      <input type="password" name="password" id="password" value="">
                      @error('password')
                      <span class="error-message">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="password-container-main-content-form-items-item">
                    <label for="new_password">新しいパスワード</label>
                    <div class="password-container-main-content-form-items-item-input">
                      <input type="password" name="new_password" id="new_password" value="{{old('new_password')}}">
                      @error('new_password')
                      <span class="error-message">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                <div class="password-container-main-content-form-items-item">
                    <label for="new_password_confirmation">パスワード確認</label>
                    <div class="password-container-main-content-form-items-item-input">
                      <input type="password" name="new_password_confirmation" id="new_password_confirmation" value="{{old('new_password_confirmation')}}">
                      @error('new_password_confirmation')
                      <span class="error-message">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="password-container-main-content-form-button">
                  <button type="submit" class="password-container-main-content-form-button-submit">変更</button>
                </div>
              </form>
            {{-- </div> --}}
          </div>
          
      </div>
    </section>
  </x-mypage-layout>
  @once
    @vite(['resources/scss/password.scss'])
  @endonce
  <script>
  window.addEventListener('load', () => {
    const fullWidth = document.querySelector('body').clientWidth;
    if (fullWidth < 768) {
      const header_logo = document.querySelector('.header-child-logo');
      if (header_logo) {
        const header_logo_height = header_logo.offsetHeight;
        const password = document.querySelector('.password');
        if (password) {
          password.style.marginTop = `${header_logo_height}px`;
        }
      }
    }
    else if (fullWidth >= 768 && fullWidth < 1440) {
      const header_logo = document.querySelector('.header-child-user');
      if (header_logo) {
        const header_logo_height = header_logo.offsetHeight;
        const password = document.querySelector('.password');
        if (password) {
          password.style.marginTop = `${header_logo_height + 5}px`;
        }
      }
  
    }else{
      const header_logo = document.querySelector('.header-child-user-logo');
      if (header_logo) {
        const header_logo_height = header_logo.offsetHeight;
        const password = document.querySelector('.password');
        if (password) {
          password.style.marginTop = `${header_logo_height + 10}px`;
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
  
  
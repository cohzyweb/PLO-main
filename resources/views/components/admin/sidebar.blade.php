@php
    $is_shop_manager = auth()->user()->hasRole('shop') && auth()->user()->shops->first();
    if ($is_shop_manager) {
        $shop_id = auth()->user()->shops->first()->id;
    }
@endphp

<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar dark fixed top-0 left-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-auto border-r border-gray-200 bg-gray-900 px-5 border-gray-800 transition-all duration-300 lg:static lg:translate-x-0 -translate-x-full">

    <!-- Sidebar Header -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-2 pt-8 sidebar-header pb-7">
        <a href="{{ url('/admin') }}" class="text-2xl font-bold text-white">
            PLO<span :class="sidebarToggle ? 'lg:hidden' : ''">グループ</span>
        </a>
    </div>

    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
        <!-- Sidebar Menu -->
        <nav x-data="{ selected: $persist('Home') }">

            <!-- Menu Group -->
            <div>
                <ul class="flex flex-col gap-4 mb-6">
                  <li>
                    <a href="#" @click.prevent="selected = (selected === 'Members' ? '':'Members')"
                        class="menu-item group"
                        :class="(selected === 'Members') || (page === 'member') ? 'menu-item-active' :
                        'menu-item-inactive'">
                        <svg :class="(selected === 'Members') || (page === 'member') ? 'menu-item-icon-active' :
                        'menu-item-icon-inactive'"
                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                fill="" />
                        </svg>
                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                            会員管理
                        </span>
                        <svg class="menu-item-arrow"
                            :class="[(selected === 'Members') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive',
                                sidebarToggle ? 'lg:hidden' : ''
                            ]"
                            width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                      </a>

                      <!-- Dropdown Menu Start -->
                      <div class="overflow-hidden transform translate block"
                          :class="(selected === 'Members') ? 'block' : 'hidden'">
                          <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                              class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                              <li>
                                  <a href="{{ url('/admin/member') }}" class="menu-dropdown-item group"
                                      :class="page === 'option' ? 'menu-dropdown-item-active' :
                                          'menu-dropdown-item-inactive'">
                                      会員一覧
                                  </a>
                              </li>

                              <li>
                                  <a href="{{ url('/admin/visit') }}" class="menu-dropdown-item group"
                                      :class="page === 'option' ? 'menu-dropdown-item-active' :
                                          'menu-dropdown-item-inactive'">
                                      来店一覧
                                  </a>
                              </li>
                              <li>
                                  <a href="{{ url('/admin/recruit-application') }}" class="menu-dropdown-item group"
                                      :class="page === 'recruit-application' ? 'menu-dropdown-item-active' :
                                          'menu-dropdown-item-inactive'">
                                      求人応募一覧
                                  </a>
                              </li>
                          </ul>
                      </div>
                      <!-- Dropdown Menu End -->
                    </li>

                    <li>
                        <a href="{{ route('admin.recruit-application.index') }}" @click="selected = (selected === 'RecruitApplications' ? '' : 'RecruitApplications')"
                            class="menu-item group"
                            :class="(selected === 'RecruitApplications') || (page === 'recruit-application') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(selected === 'RecruitApplications') || (page === 'recruit-application') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.25 3.5C5.73122 3.5 4.5 4.73122 4.5 6.25V17.75C4.5 19.2688 5.73122 20.5 7.25 20.5H16.75C18.2688 20.5 19.5 19.2688 19.5 17.75V8.41421C19.5 7.68586 19.2107 6.98796 18.695 6.47227L16.5277 4.30497C16.012 3.78928 15.3141 3.5 14.5858 3.5H7.25ZM6 6.25C6 5.55964 6.55964 5 7.25 5H14.5858C14.9168 5 15.2343 5.13147 15.4683 5.36563L17.6344 7.53171C17.8685 7.76566 18 8.0832 18 8.41421V17.75C18 18.4404 17.4404 19 16.75 19H7.25C6.55964 19 6 18.4404 6 17.75V6.25ZM8.25 10C8.25 9.58579 8.58579 9.25 9 9.25H15C15.4142 9.25 15.75 9.58579 15.75 10C15.75 10.4142 15.4142 10.75 15 10.75H9C8.58579 10.75 8.25 10.4142 8.25 10ZM8.25 14C8.25 13.5858 8.58579 13.25 9 13.25H15C15.4142 13.25 15.75 13.5858 15.75 14C15.75 14.4142 15.4142 14.75 15 14.75H9C8.58579 14.75 8.25 14.4142 8.25 14Z"
                                    fill="" />
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                求人応募管理
                            </span>
                        </a>
                    </li>
                    {{-- <!-- News -->
                    <li>
                        <a href="{{ url('/admin/news') }}" @click="selected = (selected === 'News' ? '':'News')"
                            class="menu-item group"
                            :class="(selected === 'News') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(selected === 'News') && (page === 'news') ? 'menu-item-icon-active' :
                            'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5001C19.7427 20.75 20.7501 19.7426 20.7501 18.5V5.5C20.7501 4.25736 19.7427 3.25 18.5001 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5001C18.9143 4.75 19.2501 5.08579 19.2501 5.5V18.5C19.2501 18.9142 18.9143 19.25 18.5001 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25005 9.7143C6.25005 9.30008 6.58583 8.9643 7.00005 8.9643L17 8.96429C17.4143 8.96429 17.75 9.30008 17.75 9.71429C17.75 10.1285 17.4143 10.4643 17 10.4643L7.00005 10.4643C6.58583 10.4643 6.25005 10.1285 6.25005 9.7143ZM6.25005 14.2857C6.25005 13.8715 6.58583 13.5357 7.00005 13.5357H17C17.4143 13.5357 17.75 13.8715 17.75 14.2857C17.75 14.6999 17.4143 15.0357 17 15.0357H7.00005C6.58583 15.0357 6.25005 14.6999 6.25005 14.2857Z"
                                    fill=""></path>
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                News管理
                            </span>
                        </a>
                    </li> --}}

                    <!-- Member -->
                    {{-- <li>
            <a
              href="{{ url('/admin/member') }}"
              @click="selected = (selected === 'Member' ? '':'Member')"
              class="menu-item group"
              :class=" (selected === 'Member') ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                :class="(selected === 'Member') && (page === 'member') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                  fill=""
                />
              </svg>
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                会員管理
              </span>
            </a>
          </li> --}}

                    <!-- Casts -->
                    <li>
                        @role('admin')
                            <a href="#" @click.prevent="selected = (selected === 'Casts' ? '':'Casts')"
                                class="menu-item group"
                                :class="(selected === 'Casts') || (page === 'touchvip-cast' || page === 'cast') ?
                                'menu-item-active' : 'menu-item-inactive'">
                                <svg :class="(selected === 'Casts') || (page === 'touchvip-cast' || page === 'cast') ?
                                'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                        fill="" />
                                </svg>
                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    キャスト管理
                                </span>
                                <svg class="menu-item-arrow"
                                    :class="[(selected === 'Casts') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive',
                                        sidebarToggle ? 'lg:hidden' : ''
                                    ]"
                                    width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>

                            <!-- Dropdown Menu Start -->
                            <div class="overflow-hidden transform translate block"
                                :class="(selected === 'Casts') ? 'block' : 'hidden'">
                                <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                    class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                    {{-- <li>
                  <a
                    href="{{ url('/admin/cast') }}"
                    class="menu-dropdown-item group"
                    :class="page === 'option' ? 'menu-dropdown-item-active' : 'menu-dropdown-item-inactive'"
                  >
                    店舗キャスト管理
                  </a>
                </li> --}}
                                    <li>
                                        <a href="{{ url('/admin/cast/sort') }}" class="menu-dropdown-item group"
                                            :class="page === 'cast-sort' ? 'menu-dropdown-item-active' :
                                                'menu-dropdown-item-inactive'">
                                            店舗キャスト並び替え管理
                                        </a>
                                    </li>
                                    <li>
                                      <a href="{{ url('/admin/cast/add') }}" class="menu-dropdown-item group"
                                          :class="page === 'option' ? 'menu-dropdown-item-active' :
                                              'menu-dropdown-item-inactive'">
                                          キャスト追加
                                      </a>
                                  </li>

                                    <li>
                                        <a href="{{ url('/admin/touchvip-cast') }}" class="menu-dropdown-item group"
                                            :class="page === 'option' ? 'menu-dropdown-item-active' :
                                                'menu-dropdown-item-inactive'">
                                            タッチVIPキャスト管理
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <!-- Dropdown Menu End -->
                        @endrole

                        @hasexactroles('shop')
                            <a {{-- href="{{ url('/admin/cast') }}" --}} href="#" @click="selected = (selected === 'Cast' ? '':'Cast')"
                                class="menu-item group"
                                :class="(selected === 'Cast') ? 'menu-item-active' : 'menu-item-inactive'">
                                <svg :class="(selected === 'Cast') && (page === 'cast') ? 'menu-item-icon-active' :
                                'menu-item-icon-inactive'"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                        fill="" />
                                </svg>
                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    キャスト管理
                                </span>
                                <svg class="menu-item-arrow"
                                    :class="[(selected === 'Cast') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive',
                                        sidebarToggle ? 'lg:hidden' : ''
                                    ]"
                                    width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>

                            <!-- Dropdown Menu Start -->
                            <div class="overflow-hidden transform translate block"
                                :class="(selected === 'Cast') ? 'block' : 'hidden'">
                                <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                    class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                    <li>
                                        <a href="{{ url('/admin/cast/sort') }}" class="menu-dropdown-item group"
                                            :class="page === 'cast-sort' ? 'menu-dropdown-item-active' :
                                                'menu-dropdown-item-inactive'">
                                            店舗キャスト並び替え管理
                                        </a>
                                    </li>
                                    <li>
                                      <a href="{{ url('/admin/cast/add') }}" class="menu-dropdown-item group"
                                          :class="page === 'cast-sort' ? 'menu-dropdown-item-active' :
                                              'menu-dropdown-item-inactive'">
                                          キャスト追加
                                      </a>
                                  </li>
                              </ul>
                            </div>
                            <!-- Dropdown Menu End -->
                        @endhasexactroles

                        @role('touchvip')
                            <a href="{{ url('/admin/touchvip-cast') }}"
                                @click="selected = (selected === 'Cast' ? '':'Cast')" class="menu-item group"
                                :class="(selected === 'Cast') ? 'menu-item-active' : 'menu-item-inactive'">
                                <svg :class="(selected === 'Cast') && (page === 'cast') ? 'menu-item-icon-active' :
                                'menu-item-icon-inactive'"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                        fill="" />
                                </svg>
                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    キャスト管理
                                </span>
                            </a>
                        @endrole
                    </li>
                    <li>
                      <a href="#" @click.prevent="selected = (selected === 'Schedule' ? '':'Schedule')"
                          class="menu-item group"
                          :class="(selected === 'Schedule') || (page === 'schedule') ? 'menu-item-active' :
                          'menu-item-inactive'">
                          <svg :class="(selected === 'Schedule') || (page === 'schedule') ? 'menu-item-icon-active' :
                          'menu-item-icon-inactive'"
                              width="24" height="24" viewBox="0 0 24 24" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                  fill="" />
                          </svg>
                          <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                              出勤・予約管理
                          </span>
                          <svg class="menu-item-arrow"
                              :class="[(selected === 'Schedule') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive',
                                  sidebarToggle ? 'lg:hidden' : ''
                              ]"
                              width="20" height="20" viewBox="0 0 20 20" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg>
                      </a>

                      <!-- Dropdown Menu Start -->
                      <div class="overflow-hidden transform translate block"
                          :class="(selected === 'Schedule') ? 'block' : 'hidden'">
                          <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                              class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                              <li>
                                  <a href="{{ url('/admin/work') }}" class="menu-dropdown-item group"
                                      :class="page === 'option' ? 'menu-dropdown-item-active' :
                                          'menu-dropdown-item-inactive'">
                                      出勤管理
                                  </a>
                              </li>

                              <li>
                                  <a href="{{ url('/admin/schedule') }}" class="menu-dropdown-item group"
                                      :class="page === 'option' ? 'menu-dropdown-item-active' :
                                          'menu-dropdown-item-inactive'">
                                      予約管理
                                  </a>
                              </li>
                          </ul>
                        </div>
                      <!-- Dropdown Menu End -->
                      </li>
                    <!-- Review -->
                    <li>
                      <a href="{{ url('/admin/review') }}"
                          @click="selected = (selected === 'Review' ? '':'Review')" class="menu-item group"
                          :class="(selected === 'Review') ? 'menu-item-active' : 'menu-item-inactive'">
                          <svg :class="(selected === 'Review') && (page === 'review') ? 'menu-item-icon-active' :
                          'menu-item-icon-inactive'"
                              width="24" height="24" viewBox="0 0 24 24" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M12 2C11.5858 2 11.25 2.33579 11.25 2.75V12C11.25 12.4142 11.5858 12.75 12 12.75H21.25C21.6642 12.75 22 12.4142 22 12C22 6.47715 17.5228 2 12 2ZM12.75 11.25V3.53263C13.2645 3.57761 13.7659 3.66843 14.25 3.80098V3.80099C15.6929 4.19606 16.9827 4.96184 18.0104 5.98959C19.0382 7.01734 19.8039 8.30707 20.199 9.75C20.3316 10.2341 20.4224 10.7355 20.4674 11.25H12.75ZM2 12C2 7.25083 5.31065 3.27489 9.75 2.25415V3.80099C6.14748 4.78734 3.5 8.0845 3.5 12C3.5 16.6944 7.30558 20.5 12 20.5C15.9155 20.5 19.2127 17.8525 20.199 14.25H21.7459C20.7251 18.6894 16.7492 22 12 22C6.47715 22 2 17.5229 2 12Z"
                                  fill=""></path>
                          </svg>
                          <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                              クチコミ管理
                          </span>
                      </a>
                    </li>
                    <!-- Event -->
                    <li>
                      <a href="{{ url('/admin/event') }}" @click="selected = (selected === 'Event' ? '':'Event')"
                          class="menu-item group"
                          :class="(selected === 'Event') ? 'menu-item-active' : 'menu-item-inactive'">
                          <svg :class="(selected === 'Event') && (page === 'event') ? 'menu-item-icon-active' :
                          'menu-item-icon-inactive'"
                              width="24" height="24" viewBox="0 0 24 24" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M3.25 5.5C3.25 4.25736 4.25736 3.25 5.5 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V18.5C20.75 19.7426 19.7426 20.75 18.5 20.75H5.5C4.25736 20.75 3.25 19.7426 3.25 18.5V5.5ZM5.5 4.75C5.08579 4.75 4.75 5.08579 4.75 5.5V8.58325L19.25 8.58325V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H5.5ZM19.25 10.0833H15.416V13.9165H19.25V10.0833ZM13.916 10.0833L10.083 10.0833V13.9165L13.916 13.9165V10.0833ZM8.58301 10.0833H4.75V13.9165H8.58301V10.0833ZM4.75 18.5V15.4165H8.58301V19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5ZM10.083 19.25V15.4165L13.916 15.4165V19.25H10.083ZM15.416 19.25V15.4165H19.25V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15.416Z"
                                  fill=""></path>
                          </svg>
                          <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                              イベント管理
                          </span>
                      </a>
                    </li>
                       <!-- News -->
                       <li>
                        <a href="{{ url('/admin/news') }}" @click="selected = (selected === 'News' ? '':'News')"
                            class="menu-item group"
                            :class="(selected === 'News') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(selected === 'News') && (page === 'news') ? 'menu-item-icon-active' :
                            'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5001C19.7427 20.75 20.7501 19.7426 20.7501 18.5V5.5C20.7501 4.25736 19.7427 3.25 18.5001 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5001C18.9143 4.75 19.2501 5.08579 19.2501 5.5V18.5C19.2501 18.9142 18.9143 19.25 18.5001 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25005 9.7143C6.25005 9.30008 6.58583 8.9643 7.00005 8.9643L17 8.96429C17.4143 8.96429 17.75 9.30008 17.75 9.71429C17.75 10.1285 17.4143 10.4643 17 10.4643L7.00005 10.4643C6.58583 10.4643 6.25005 10.1285 6.25005 9.7143ZM6.25005 14.2857C6.25005 13.8715 6.58583 13.5357 7.00005 13.5357H17C17.4143 13.5357 17.75 13.8715 17.75 14.2857C17.75 14.6999 17.4143 15.0357 17 15.0357H7.00005C6.58583 15.0357 6.25005 14.6999 6.25005 14.2857Z"
                                    fill=""></path>
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                News管理
                            </span>
                        </a>
                    </li>
                    <!-- Pickup -->
                    <li>
                        @role('admin')
                            <a href="{{ url('/admin/pickup') }}" @click="selected = (selected === 'Pickup' ? '':'Pickup')"
                                class="menu-item group"
                                :class="(selected === 'Pickup') ? 'menu-item-active' : 'menu-item-inactive'">
                                <svg :class="(selected === 'Pickup') && (page === 'pickup') ? 'menu-item-icon-active' :
                                'menu-item-icon-inactive'"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5001C19.7427 20.75 20.7501 19.7426 20.7501 18.5V5.5C20.7501 4.25736 19.7427 3.25 18.5001 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5001C18.9143 4.75 19.2501 5.08579 19.2501 5.5V18.5C19.2501 18.9142 18.9143 19.25 18.5001 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25005 9.7143C6.25005 9.30008 6.58583 8.9643 7.00005 8.9643L17 8.96429C17.4143 8.96429 17.75 9.30008 17.75 9.71429C17.75 10.1285 17.4143 10.4643 17 10.4643L7.00005 10.4643C6.58583 10.4643 6.25005 10.1285 6.25005 9.7143ZM6.25005 14.2857C6.25005 13.8715 6.58583 13.5357 7.00005 13.5357H17C17.4143 13.5357 17.75 13.8715 17.75 14.2857C17.75 14.6999 17.4143 15.0357 17 15.0357H7.00005C6.58583 15.0357 6.25005 14.6999 6.25005 14.2857Z"
                                        fill=""></path>
                                </svg>
                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    ピックアップ管理
                                </span>
                            </a>
                        @endrole

                        @hasexactroles('shop')
                            <a href="{{ url('/admin/pickup/' . $shop_id) }}"
                                @click="selected = (selected === 'Pickup' ? '':'Pickup')" class="menu-item group"
                                :class="(selected === 'Pickup') ? 'menu-item-active' : 'menu-item-inactive'">
                                <svg :class="(selected === 'Pickup') && (page === 'pickup') ? 'menu-item-icon-active' :
                                'menu-item-icon-inactive'"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5001C19.7427 20.75 20.7501 19.7426 20.7501 18.5V5.5C20.7501 4.25736 19.7427 3.25 18.5001 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5001C18.9143 4.75 19.2501 5.08579 19.2501 5.5V18.5C19.2501 18.9142 18.9143 19.25 18.5001 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25005 9.7143C6.25005 9.30008 6.58583 8.9643 7.00005 8.9643L17 8.96429C17.4143 8.96429 17.75 9.30008 17.75 9.71429C17.75 10.1285 17.4143 10.4643 17 10.4643L7.00005 10.4643C6.58583 10.4643 6.25005 10.1285 6.25005 9.7143ZM6.25005 14.2857C6.25005 13.8715 6.58583 13.5357 7.00005 13.5357H17C17.4143 13.5357 17.75 13.8715 17.75 14.2857C17.75 14.6999 17.4143 15.0357 17 15.0357H7.00005C6.58583 15.0357 6.25005 14.6999 6.25005 14.2857Z"
                                        fill=""></path>
                                </svg>
                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    ピックアップ管理
                                </span>
                            </a>
                        @endhasexactroles
                    </li>

                    <!-- Ranking -->
                    <li>
                        @role('admin')
                            <a href="{{ url('/admin/ranking') }}"
                                @click="selected = (selected === 'Ranking' ? '':'Ranking')" class="menu-item group"
                                :class="(selected === 'Ranking') ? 'menu-item-active' : 'menu-item-inactive'">
                                <svg :class="(selected === 'Ranking') && (page === 'ranking') ? 'menu-item-icon-active' :
                                'menu-item-icon-inactive'"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5001C19.7427 20.75 20.7501 19.7426 20.7501 18.5V5.5C20.7501 4.25736 19.7427 3.25 18.5001 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5001C18.9143 4.75 19.2501 5.08579 19.2501 5.5V18.5C19.2501 18.9142 18.9143 19.25 18.5001 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25005 9.7143C6.25005 9.30008 6.58583 8.9643 7.00005 8.9643L17 8.96429C17.4143 8.96429 17.75 9.30008 17.75 9.71429C17.75 10.1285 17.4143 10.4643 17 10.4643L7.00005 10.4643C6.58583 10.4643 6.25005 10.1285 6.25005 9.7143ZM6.25005 14.2857C6.25005 13.8715 6.58583 13.5357 7.00005 13.5357H17C17.4143 13.5357 17.75 13.8715 17.75 14.2857C17.75 14.6999 17.4143 15.0357 17 15.0357H7.00005C6.58583 15.0357 6.25005 14.6999 6.25005 14.2857Z"
                                        fill=""></path>
                                </svg>
                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    ランキング管理
                                </span>
                            </a>
                        @endrole

                        @hasexactroles('shop')
                            <a href="{{ url('/admin/ranking/' . $shop_id) }}"
                                @click="selected = (selected === 'Ranking' ? '':'Ranking')" class="menu-item group"
                                :class="(selected === 'Ranking') ? 'menu-item-active' : 'menu-item-inactive'">
                                <svg :class="(selected === 'Ranking') && (page === 'ranking') ? 'menu-item-icon-active' :
                                'menu-item-icon-inactive'"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                        fill="" />
                                </svg>
                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    ランキング管理
                                </span>
                            </a>
                        @endhasexactroles
                    </li>
                    <!-- Diary -->
                    <li>
                        <a href="{{ url('/admin/diary') }}" @click="selected = (selected === 'Diary' ? '':'Diary')"
                            class="menu-item group"
                            :class="(selected === 'Diary') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(selected === 'Diary') && (page === 'diary') ? 'menu-item-icon-active' :
                            'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 2C8.41421 2 8.75 2.33579 8.75 2.75V3.75H15.25V2.75C15.25 2.33579 15.5858 2 16 2C16.4142 2 16.75 2.33579 16.75 2.75V3.75H18.5C19.7426 3.75 20.75 4.75736 20.75 6V9V19C20.75 20.2426 19.7426 21.25 18.5 21.25H5.5C4.25736 21.25 3.25 20.2426 3.25 19V9V6C3.25 4.75736 4.25736 3.75 5.5 3.75H7.25V2.75C7.25 2.33579 7.58579 2 8 2ZM8 5.25H5.5C5.08579 5.25 4.75 5.58579 4.75 6V8.25H19.25V6C19.25 5.58579 18.9142 5.25 18.5 5.25H16H8ZM19.25 9.75H4.75V19C4.75 19.4142 5.08579 19.75 5.5 19.75H18.5C18.9142 19.75 19.25 19.4142 19.25 19V9.75Z"
                                    fill="" />
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                写メ日記管理
                            </span>
                        </a>
                    </li>
                    <!-- Video -->
                    <li>
                        <a href="{{ url('/admin/video') }}" @click="selected = (selected === 'Video' ? '':'Video')"
                            class="menu-item group"
                            :class="(selected === 'Video') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(selected === 'Video') && (page === 'video') ? 'menu-item-icon-active' :
                            'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5001C19.7427 20.75 20.7501 19.7426 20.7501 18.5V5.5C20.7501 4.25736 19.7427 3.25 18.5001 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5001C18.9143 4.75 19.2501 5.08579 19.2501 5.5V18.5C19.2501 18.9142 18.9143 19.25 18.5001 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25005 9.7143C6.25005 9.30008 6.58583 8.9643 7.00005 8.9643L17 8.96429C17.4143 8.96429 17.75 9.30008 17.75 9.71429C17.75 10.1285 17.4143 10.4643 17 10.4643L7.00005 10.4643C6.58583 10.4643 6.25005 10.1285 6.25005 9.7143ZM6.25005 14.2857C6.25005 13.8715 6.58583 13.5357 7.00005 13.5357H17C17.4143 13.5357 17.75 13.8715 17.75 14.2857C17.75 14.6999 17.4143 15.0357 17 15.0357H7.00005C6.58583 15.0357 6.25005 14.6999 6.25005 14.2857Z"
                                    fill=""></path>
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                動画一覧
                            </span>
                        </a>
                    </li>

                    <!-- Schedule -->
                    {{-- <li>
                        <a href="#" @click.prevent="selected = (selected === 'Schedule' ? '':'Schedule')"
                            class="menu-item group"
                            :class="(selected === 'Schedule') || (page === 'schedule') ? 'menu-item-active' :
                            'menu-item-inactive'">
                            <svg :class="(selected === 'Schedule') || (page === 'schedule') ? 'menu-item-icon-active' :
                            'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                    fill="" />
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                出勤・予約管理
                            </span>
                            <svg class="menu-item-arrow"
                                :class="[(selected === 'Schedule') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive',
                                    sidebarToggle ? 'lg:hidden' : ''
                                ]"
                                width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>

                        <!-- Dropdown Menu Start -->
                        <div class="overflow-hidden transform translate block"
                            :class="(selected === 'Schedule') ? 'block' : 'hidden'">
                            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                <li>
                                    <a href="{{ url('/admin/work') }}" class="menu-dropdown-item group"
                                        :class="page === 'option' ? 'menu-dropdown-item-active' :
                                            'menu-dropdown-item-inactive'">
                                        出勤管理
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/admin/schedule') }}" class="menu-dropdown-item group"
                                        :class="page === 'option' ? 'menu-dropdown-item-active' :
                                            'menu-dropdown-item-inactive'">
                                        予約管理
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li> --}}


                    {{-- <!-- Booking -->
          <li>
            <a
              href="{{ url('/admin/booking') }}"
              @click="selected = (selected === 'Booking' ? '':'Booking')"
              class="menu-item group"
              :class=" (selected === 'Booking') ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                :class="(selected === 'Booking') && (page === 'booking') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 5.5C3.25 4.25736 4.25736 3.25 5.5 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V18.5C20.75 19.7426 19.7426 20.75 18.5 20.75H5.5C4.25736 20.75 3.25 19.7426 3.25 18.5V5.5ZM5.5 4.75C5.08579 4.75 4.75 5.08579 4.75 5.5V8.58325L19.25 8.58325V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H5.5ZM19.25 10.0833H15.416V13.9165H19.25V10.0833ZM13.916 10.0833L10.083 10.0833V13.9165L13.916 13.9165V10.0833ZM8.58301 10.0833H4.75V13.9165H8.58301V10.0833ZM4.75 18.5V15.4165H8.58301V19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5ZM10.083 19.25V15.4165L13.916 15.4165V19.25H10.083ZM15.416 19.25V15.4165H19.25V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15.416Z" fill=""></path>
              </svg>
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                予約管理
              </span>
            </a>
          </li> --}}

                    {{-- <li>
                        <a href="#" @click.prevent="selected = (selected === 'Members' ? '':'Members')"
                            class="menu-item group"
                            :class="(selected === 'Members') || (page === 'member') ? 'menu-item-active' :
                            'menu-item-inactive'">
                            <svg :class="(selected === 'Members') || (page === 'member') ? 'menu-item-icon-active' :
                            'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                    fill="" />
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                会員管理
                            </span>
                            <svg class="menu-item-arrow"
                                :class="[(selected === 'Members') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive',
                                    sidebarToggle ? 'lg:hidden' : ''
                                ]"
                                width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>

                        <!-- Dropdown Menu Start -->
                        <div class="overflow-hidden transform translate block"
                            :class="(selected === 'Members') ? 'block' : 'hidden'">
                            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                <li>
                                    <a href="{{ url('/admin/member') }}" class="menu-dropdown-item group"
                                        :class="page === 'option' ? 'menu-dropdown-item-active' :
                                            'menu-dropdown-item-inactive'">
                                        会員一覧
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/admin/visit') }}" class="menu-dropdown-item group"
                                        :class="page === 'option' ? 'menu-dropdown-item-active' :
                                            'menu-dropdown-item-inactive'">
                                        来店一覧
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li> --}}

                    {{-- <!-- Member -->
          <li>
            <a
              href="{{ url('/admin/member') }}"
              @click="selected = (selected === 'Member' ? '':'Member')"
              class="menu-item group"
              :class=" (selected === 'Member') ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                :class="(selected === 'Member') && (page === 'member') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                  fill=""
                />
              </svg>
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                会員管理
              </span>
            </a>
          </li>
          <!-- 来店管理 -->
          <li>
            <a
              href="{{ url('/admin/visit') }}"
              @click="selected = (selected === 'Visit' ? '':'Visit')"
              class="menu-item group"
              :class=" (selected === 'Visit') ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                :class="(selected === 'Visit') && (page === 'visit') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                  fill=""
                />
              </svg>
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                来店管理
              </span>
            </a>
          </li> --}}
                    {{-- <!-- Review -->
                    <li>
                        <a href="{{ url('/admin/review') }}"
                            @click="selected = (selected === 'Review' ? '':'Review')" class="menu-item group"
                            :class="(selected === 'Review') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(selected === 'Review') && (page === 'review') ? 'menu-item-icon-active' :
                            'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 2C11.5858 2 11.25 2.33579 11.25 2.75V12C11.25 12.4142 11.5858 12.75 12 12.75H21.25C21.6642 12.75 22 12.4142 22 12C22 6.47715 17.5228 2 12 2ZM12.75 11.25V3.53263C13.2645 3.57761 13.7659 3.66843 14.25 3.80098V3.80099C15.6929 4.19606 16.9827 4.96184 18.0104 5.98959C19.0382 7.01734 19.8039 8.30707 20.199 9.75C20.3316 10.2341 20.4224 10.7355 20.4674 11.25H12.75ZM2 12C2 7.25083 5.31065 3.27489 9.75 2.25415V3.80099C6.14748 4.78734 3.5 8.0845 3.5 12C3.5 16.6944 7.30558 20.5 12 20.5C15.9155 20.5 19.2127 17.8525 20.199 14.25H21.7459C20.7251 18.6894 16.7492 22 12 22C6.47715 22 2 17.5229 2 12Z"
                                    fill=""></path>
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                クチコミ管理
                            </span>
                        </a>
                    </li> --}}

                    {{-- <!-- Banner -->
          <li>
            <a
              href="{{ url('/admin/banner') }}"
              @click="selected = (selected === 'Banner' ? '':'Banner')"
              class="menu-item group"
              :class=" (selected === 'Banner') ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                :class="(selected === 'Banner') && (page === 'banner') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.50391 4.25C8.50391 3.83579 8.83969 3.5 9.25391 3.5H15.2777C15.4766 3.5 15.6674 3.57902 15.8081 3.71967L18.2807 6.19234C18.4214 6.333 18.5004 6.52376 18.5004 6.72268V16.75C18.5004 17.1642 18.1646 17.5 17.7504 17.5H16.248V17.4993H14.748V17.5H9.25391C8.83969 17.5 8.50391 17.1642 8.50391 16.75V4.25ZM14.748 19H9.25391C8.01126 19 7.00391 17.9926 7.00391 16.75V6.49854H6.24805C5.83383 6.49854 5.49805 6.83432 5.49805 7.24854V19.75C5.49805 20.1642 5.83383 20.5 6.24805 20.5H13.998C14.4123 20.5 14.748 20.1642 14.748 19.75L14.748 19ZM7.00391 4.99854V4.25C7.00391 3.00736 8.01127 2 9.25391 2H15.2777C15.8745 2 16.4468 2.23705 16.8687 2.659L19.3414 5.13168C19.7634 5.55364 20.0004 6.12594 20.0004 6.72268V16.75C20.0004 17.9926 18.9931 19 17.7504 19H16.248L16.248 19.75C16.248 20.9926 15.2407 22 13.998 22H6.24805C5.00541 22 3.99805 20.9926 3.99805 19.75V7.24854C3.99805 6.00589 5.00541 4.99854 6.24805 4.99854H7.00391Z" fill=""></path>
              </svg>
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                広告バナー管理
              </span>
            </a>
          </li> --}}

                    {{-- <!-- Booking -->
          <li>
            <a
              href="{{ url('/admin/booking') }}"
              @click="selected = (selected === 'Booking' ? '':'Booking')"
              class="menu-item group"
              :class=" (selected === 'Booking') ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                :class="(selected === 'Booking') && (page === 'booking') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.25 5.5C3.25 4.25736 4.25736 3.25 5.5 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V18.5C20.75 19.7426 19.7426 20.75 18.5 20.75H5.5C4.25736 20.75 3.25 19.7426 3.25 18.5V5.5ZM5.5 4.75C5.08579 4.75 4.75 5.08579 4.75 5.5V8.58325L19.25 8.58325V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H5.5ZM19.25 10.0833H15.416V13.9165H19.25V10.0833ZM13.916 10.0833L10.083 10.0833V13.9165L13.916 13.9165V10.0833ZM8.58301 10.0833H4.75V13.9165H8.58301V10.0833ZM4.75 18.5V15.4165H8.58301V19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5ZM10.083 19.25V15.4165L13.916 15.4165V19.25H10.083ZM15.416 19.25V15.4165H19.25V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15.416Z" fill=""></path>
              </svg>
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                予約管理
              </span>
            </a>
          </li> --}}

                    {{-- <!-- Diary -->
          <li>
            <a
              href="{{ url('/admin/diary') }}"
              @click="selected = (selected === 'Diary' ? '':'Diary')"
              class="menu-item group"
              :class=" (selected === 'Diary') ? 'menu-item-active' : 'menu-item-inactive'"
            >
              <svg
                :class="(selected === 'Diary') && (page === 'diary') ? 'menu-item-icon-active'  :'menu-item-icon-inactive'"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M8 2C8.41421 2 8.75 2.33579 8.75 2.75V3.75H15.25V2.75C15.25 2.33579 15.5858 2 16 2C16.4142 2 16.75 2.33579 16.75 2.75V3.75H18.5C19.7426 3.75 20.75 4.75736 20.75 6V9V19C20.75 20.2426 19.7426 21.25 18.5 21.25H5.5C4.25736 21.25 3.25 20.2426 3.25 19V9V6C3.25 4.75736 4.25736 3.75 5.5 3.75H7.25V2.75C7.25 2.33579 7.58579 2 8 2ZM8 5.25H5.5C5.08579 5.25 4.75 5.58579 4.75 6V8.25H19.25V6C19.25 5.58579 18.9142 5.25 18.5 5.25H16H8ZM19.25 9.75H4.75V19C4.75 19.4142 5.08579 19.75 5.5 19.75H18.5C18.9142 19.75 19.25 19.4142 19.25 19V9.75Z"
                  fill=""
                />
              </svg>
              <span
                class="menu-item-text"
                :class="sidebarToggle ? 'lg:hidden' : ''"
              >
                写メ日記管理
              </span>
            </a>
          </li> --}}

                    {{-- <!-- Event -->
                    <li>
                        <a href="{{ url('/admin/event') }}" @click="selected = (selected === 'Event' ? '':'Event')"
                            class="menu-item group"
                            :class="(selected === 'Event') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(selected === 'Event') && (page === 'event') ? 'menu-item-icon-active' :
                            'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.25 5.5C3.25 4.25736 4.25736 3.25 5.5 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V18.5C20.75 19.7426 19.7426 20.75 18.5 20.75H5.5C4.25736 20.75 3.25 19.7426 3.25 18.5V5.5ZM5.5 4.75C5.08579 4.75 4.75 5.08579 4.75 5.5V8.58325L19.25 8.58325V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H5.5ZM19.25 10.0833H15.416V13.9165H19.25V10.0833ZM13.916 10.0833L10.083 10.0833V13.9165L13.916 13.9165V10.0833ZM8.58301 10.0833H4.75V13.9165H8.58301V10.0833ZM4.75 18.5V15.4165H8.58301V19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5ZM10.083 19.25V15.4165L13.916 15.4165V19.25H10.083ZM15.416 19.25V15.4165H19.25V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15.416Z"
                                    fill=""></path>
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                イベント管理
                            </span>
                        </a>
                    </li> --}}
                    <!-- Banner -->
                    <li>
                        <a href="{{ url('/admin/banner') }}"
                            @click="selected = (selected === 'Banner' ? '':'Banner')" class="menu-item group"
                            :class="(selected === 'Banner') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(selected === 'Banner') && (page === 'banner') ? 'menu-item-icon-active' :
                            'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.50391 4.25C8.50391 3.83579 8.83969 3.5 9.25391 3.5H15.2777C15.4766 3.5 15.6674 3.57902 15.8081 3.71967L18.2807 6.19234C18.4214 6.333 18.5004 6.52376 18.5004 6.72268V16.75C18.5004 17.1642 18.1646 17.5 17.7504 17.5H16.248V17.4993H14.748V17.5H9.25391C8.83969 17.5 8.50391 17.1642 8.50391 16.75V4.25ZM14.748 19H9.25391C8.01126 19 7.00391 17.9926 7.00391 16.75V6.49854H6.24805C5.83383 6.49854 5.49805 6.83432 5.49805 7.24854V19.75C5.49805 20.1642 5.83383 20.5 6.24805 20.5H13.998C14.4123 20.5 14.748 20.1642 14.748 19.75L14.748 19ZM7.00391 4.99854V4.25C7.00391 3.00736 8.01127 2 9.25391 2H15.2777C15.8745 2 16.4468 2.23705 16.8687 2.659L19.3414 5.13168C19.7634 5.55364 20.0004 6.12594 20.0004 6.72268V16.75C20.0004 17.9926 18.9931 19 17.7504 19H16.248L16.248 19.75C16.248 20.9926 15.2407 22 13.998 22H6.24805C5.00541 22 3.99805 20.9926 3.99805 19.75V7.24854C3.99805 6.00589 5.00541 4.99854 6.24805 4.99854H7.00391Z"
                                    fill=""></path>
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                広告バナー管理
                            </span>
                        </a>
                    </li>
                    <!-- Fee -->
                    <li>
                        <a {{-- href="{{ url('/admin/fee') }}" --}} href="{{ url('#') }}"
                            @click="selected = (selected === 'Fee' ? '':'Fee')" class="menu-item group"
                            :class="(selected === 'Fee') ? 'menu-item-active' : 'menu-item-inactive'">
                            <svg :class="(selected === 'Fee') && (page === 'fee') ? 'menu-item-icon-active' :
                            'menu-item-icon-inactive'"
                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.50391 4.25C8.50391 3.83579 8.83969 3.5 9.25391 3.5H15.2777C15.4766 3.5 15.6674 3.57902 15.8081 3.71967L18.2807 6.19234C18.4214 6.333 18.5004 6.52376 18.5004 6.72268V16.75C18.5004 17.1642 18.1646 17.5 17.7504 17.5H16.248V17.4993H14.748V17.5H9.25391C8.83969 17.5 8.50391 17.1642 8.50391 16.75V4.25ZM14.748 19H9.25391C8.01126 19 7.00391 17.9926 7.00391 16.75V6.49854H6.24805C5.83383 6.49854 5.49805 6.83432 5.49805 7.24854V19.75C5.49805 20.1642 5.83383 20.5 6.24805 20.5H13.998C14.4123 20.5 14.748 20.1642 14.748 19.75L14.748 19ZM7.00391 4.99854V4.25C7.00391 3.00736 8.01127 2 9.25391 2H15.2777C15.8745 2 16.4468 2.23705 16.8687 2.659L19.3414 5.13168C19.7634 5.55364 20.0004 6.12594 20.0004 6.72268V16.75C20.0004 17.9926 18.9931 19 17.7504 19H16.248L16.248 19.75C16.248 20.9926 15.2407 22 13.998 22H6.24805C5.00541 22 3.99805 20.9926 3.99805 19.75V7.24854C3.99805 6.00589 5.00541 4.99854 6.24805 4.99854H7.00391Z"
                                    fill=""></path>
                            </svg>
                            <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                料金管理
                            </span>
                            <svg class="menu-item-arrow"
                                :class="[(selected === 'Fee') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive',
                                    sidebarToggle ? 'lg:hidden' : ''
                                ]"
                                width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>

                        <!-- Dropdown Menu Start -->
                        <div class="overflow-hidden transform translate block"
                            :class="(selected === 'Fee') ? 'block' : 'hidden'">
                            <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                <li>
                                    <a href="{{ url('/admin/system') }}" class="menu-dropdown-item group"
                                        :class="page === 'system' ? 'menu-dropdown-item-active' :
                                            'menu-dropdown-item-inactive'">
                                        料金画面管理
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/admin/course') }}" class="menu-dropdown-item group"
                                        :class="page === 'course' ? 'menu-dropdown-item-active' :
                                            'menu-dropdown-item-inactive'">
                                        コース管理
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/admin/option_rs') }}" class="menu-dropdown-item group"
                                        :class="page === 'option' ? 'menu-dropdown-item-active' :
                                            'menu-dropdown-item-inactive'">
                                        オプション管理
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/admin/extend') }}" class="menu-dropdown-item group"
                                        :class="page === 'extend' ? 'menu-dropdown-item-active' :
                                            'menu-dropdown-item-inactive'">
                                        延長管理
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url(route('admin.appoint.index')) }}"
                                        class="menu-dropdown-item group"
                                        :class="page === 'qa' ? 'menu-dropdown-item-active' :
                                            'menu-dropdown-item-inactive'">
                                        パネル管理
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>
                    <!-- Masters -->
                    @canany(['edit options', 'edit personalities', 'edit styles'])
                        <li>
                            <a href="#" @click.prevent="selected = (selected === 'Masters' ? '':'Masters')"
                                class="menu-item group"
                                :class="(selected === 'Masters') || (page === 'option' || page === 'personality' ||
                                    page === 'style') ? 'menu-item-active' : 'menu-item-inactive'">
                                <svg :class="(selected === 'Masters') || (page === 'option' || page === 'personality' ||
                                    page === 'style') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                        fill=""></path>
                                </svg>
                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    マスター管理
                                </span>
                                <svg class="menu-item-arrow"
                                    :class="[(selected === 'Masters') ? 'menu-item-arrow-active' : 'menu-item-arrow-inactive',
                                        sidebarToggle ? 'lg:hidden' : ''
                                    ]"
                                    width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>

                            <!-- Dropdown Menu Start -->
                            <div class="overflow-hidden transform translate block"
                                :class="(selected === 'Masters') ? 'block' : 'hidden'">
                                <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                    class="flex flex-col gap-1 mt-2 menu-dropdown pl-9">
                                    <li>
                                        <a href="{{ url('/admin/shop') }}" class="menu-dropdown-item group"
                                            :class="page === 'shop' ? 'menu-dropdown-item-active' :
                                                'menu-dropdown-item-inactive'">
                                            店舗マスター
                                        </a>
                                    </li>

                                    @can('edit options')
                                        <li>
                                            <a href="{{ url('/admin/option') }}" class="menu-dropdown-item group"
                                                :class="page === 'option' ? 'menu-dropdown-item-active' :
                                                    'menu-dropdown-item-inactive'">
                                                オプションマスター
                                            </a>
                                        </li>
                                    @endcan

                                    @can('edit personalities')
                                        <li>
                                            <a href="{{ url('/admin/personality') }}" class="menu-dropdown-item group"
                                                :class="page === 'option' ? 'menu-dropdown-item-active' :
                                                    'menu-dropdown-item-inactive'">
                                                性格マスター
                                            </a>
                                        </li>
                                    @endcan
                                    <li>
                                        <a href="{{ url('/admin/individuality') }}" class="menu-dropdown-item group"
                                            :class="page === 'option' ? 'menu-dropdown-item-active' :
                                                'menu-dropdown-item-inactive'">
                                            個性マスター
                                        </a>
                                    </li>

                                    @can('edit styles')
                                        <li>
                                            <a href="{{ url('/admin/style') }}" class="menu-dropdown-item group"
                                                :class="page === 'option' ? 'menu-dropdown-item-active' :
                                                    'menu-dropdown-item-inactive'">
                                                体型マスター
                                            </a>
                                        </li>
                                    @endcan
                                    <li>
                                        <a href="{{ url('/admin/playstyle') }}" class="menu-dropdown-item group"
                                            :class="page === 'option' ? 'menu-dropdown-item-active' :
                                                'menu-dropdown-item-inactive'">
                                            プレイスタイルマスター
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/rank') }}" class="menu-dropdown-item group"
                                            :class="page === 'option' ? 'menu-dropdown-item-active' :
                                                'menu-dropdown-item-inactive'">
                                            ランキングマスター
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/qa') }}" class="menu-dropdown-item group"
                                            :class="page === 'qa' ? 'menu-dropdown-item-active' :
                                                'menu-dropdown-item-inactive'">
                                            Q&Aマスター
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Dropdown Menu End -->
                        </li>
                    @endcanany

                </ul>
            </div>
        </nav>
    </div>
</aside>

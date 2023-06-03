<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        <span class="brand-logo">
            <img alt="Logo" src="{{ asset('cp/assets/media/logos/logo-letter-1.png') }}"/>
        </span>
        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                              fill="#000000" fill-rule="nonzero"
                              transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"/>
                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                              fill="#000000" fill-rule="nonzero" opacity="0.3"
                              transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"/>
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
             data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">

                <li class="menu-item {{ request()->url() == route('adminPanel.dashboard') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('adminPanel.dashboard') }}" class="menu-link">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                 viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                          fill="#000000" fill-rule="nonzero"/>
                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                          fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">صفحه اصلی</span>
                    </a>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect> <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect> <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path></g></svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">صفحه</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu menu-item-active">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">صفحه</span>
												</span>
                            </li>
                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                <a href="{{ route('adminPanel.pages.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">مدیریت</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.pages.create') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">ایجاد</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Stockholm-icons / Files / Pictures1</title> <desc>Created with Sketch.</desc> <defs></defs> <g id="Stockholm-icons-/-Files-/-Pictures1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect id="bound" x="0" y="0" width="24" height="24"></rect> <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path> <polygon id="Path" fill="#000000" opacity="0.3" points="4 19 10 11 16 19"></polygon> <polygon id="Path-Copy" fill="#000000" points="11 19 15 14 19 19"></polygon> <path d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z" id="Path" fill="#000000" opacity="0.3"></path></g></svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">گالری</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">گالری</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.galleries.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">مدیریت</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Stockholm-icons / Home / Picture</title> <desc>Created with Sketch.</desc> <defs></defs> <g id="Stockholm-icons-/-Home-/-Picture" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon> <rect id="Rectangle-25" fill="#000000" opacity="0.3" x="2" y="4" width="20" height="16" rx="2"></rect> <polygon id="Path" fill="#000000" opacity="0.3" points="4 20 10.5 11 17 20"></polygon> <polygon id="Path-Copy" fill="#000000" points="11 20 15.5 14 20 20"></polygon> <circle id="Oval-76" fill="#000000" opacity="0.3" cx="18.5" cy="8.5" r="1.5"></circle></g></svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">تصاویر گالری</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">تصاویر گالری</span>
												</span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.gallery_images.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">مدیریت</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                <title>Stockholm-icons / Communication / Chat6</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Stockholm-icons-/-Communication-/-Chat6" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                    <path d="M14.486222,18 L12.7974954,21.0565532 C12.530414,21.5399639 11.9220198,21.7153335 11.4386091,21.4482521 C11.2977127,21.3704077 11.1776907,21.2597005 11.0887419,21.1255379 L9.01653358,18 L5,18 C3.34314575,18 2,16.6568542 2,15 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,16.6568542 20.6568542,18 19,18 L14.486222,18 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                    <path d="M6,7 L15,7 C15.5522847,7 16,7.44771525 16,8 C16,8.55228475 15.5522847,9 15,9 L6,9 C5.44771525,9 5,8.55228475 5,8 C5,7.44771525 5.44771525,7 6,7 Z M6,11 L11,11 C11.5522847,11 12,11.4477153 12,12 C12,12.5522847 11.5522847,13 11,13 L6,13 C5.44771525,13 5,12.5522847 5,12 C5,11.4477153 5.44771525,11 6,11 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">تیکت</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">تیکت</span>
												</span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.tickets.department.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">دپارتمان ها</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.tickets.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">تیکت ها</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
											<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                                <title>Stockholm-icons / Text / Bullet-list</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs></defs>
                                                <g id="Stockholm-icons-/-Text-/-Bullet-list" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z" id="Combined-Shape" fill="#000000"></path>
                                                    <path d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
										</span>
                        <span class="menu-text">دسته بندی</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">دسته بندی</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.work_categories.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">مدیریت</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.work_categories.create') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">ایجاد</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle menu-icon-force-hover">
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Bucket.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24.766 24.69" fill="#494b74">
                                  <g id="review" transform="translate(-2.748 -5.944)">
                                    <g id="Group_4" data-name="Group 4" transform="translate(2.748 5.944)">
                                      <path id="Path_8" data-name="Path 8" d="M3.361,54H7.7a.614.614,0,0,1,.611.614v9.236a.614.614,0,0,1-.611.614H3.361a.615.615,0,0,1-.614-.614V54.61A.615.615,0,0,1,3.361,54Zm2.165,9.035a1.1,1.1,0,1,0-1.1-1.1A1.1,1.1,0,0,0,5.527,63.032Z" transform="translate(16.454 -39.77)"/>
                                      <path id="Path_9" data-name="Path 9" d="M26.047,34.363a1.18,1.18,0,0,1,1.18-1.18h7.036c-1.493-3.521-.765-5.346-.765-5.346.475-1.055,1.051-1.316,1.471-1.34a.552.552,0,0,1,.571.544,7.949,7.949,0,0,0,4.976,7.251v8.777l-.347.27a3.805,3.805,0,0,1-2.336.8H28.3a1.333,1.333,0,1,1,0-2.666H27.38a1.333,1.333,0,0,1-1.333-1.333A1.454,1.454,0,0,1,27.5,38.688a1.454,1.454,0,0,1-1.454-1.454A1.435,1.435,0,0,1,27.482,35.8,1.435,1.435,0,0,1,26.047,34.363Z" transform="translate(-21.882 -19.454)"/>
                                      <path id="Path_10" data-name="Path 10" d="M58.085,10.583l.541,1.661a.189.189,0,0,1-.29.212L56.92,11.427,55.5,12.456a.189.189,0,0,1-.29-.212l.541-1.661L54.34,9.554a.19.19,0,0,1,.112-.342H56.2l.541-1.661a.188.188,0,0,1,.358,0l.538,1.661h1.75a.19.19,0,0,1,.112.342Z" transform="translate(-48.325 -7.035)"/>
                                      <path id="Path_11" data-name="Path 11" d="M77.092,29.014h1.75l.538-1.664a.188.188,0,0,1,.358,0l.541,1.664h1.75a.188.188,0,0,1,.112.34l-1.416,1.029.541,1.664a.188.188,0,0,1-.29.209L79.56,31.229l-1.416,1.027a.188.188,0,0,1-.29-.209l.541-1.664L76.98,29.354A.188.188,0,0,1,77.092,29.014Z" transform="translate(-76.903 -21.145)"/>
                                      <path id="Path_12" data-name="Path 12" d="M21.549,10.981a.189.189,0,0,1-.29-.212L21.8,9.105,20.384,8.079a.189.189,0,0,1,.11-.342h1.75l.541-1.661a.188.188,0,0,1,.358,0l.541,1.661h1.75a.189.189,0,0,1,.11.342L24.127,9.105l.541,1.664a.189.189,0,0,1-.29.212L22.962,9.952Z" transform="translate(-5.462 -5.944)"/>
                                    </g>
                                  </g>
                                </svg>

                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-text">مدیریت نظرات</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">مدیریت نظرات</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/admin/panel/reviews/index" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">لیست نظرات</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/admin/panel/reviews/rate-group/index" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">مدیریت گروه ها</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle menu-icon-force-hover">
                        <span class="svg-icon menu-icon">
                            <svg style="opacity: 0.8" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" viewBox="0 0 100 100" version="1.1" x="0px" y="0px" fill="#494b74" ><g transform="translate(0,-952.36216)"><path style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;letter-spacing:normal;word-spacing:normal;text-transform:none;direction:ltr;block-progression:tb;writing-mode:lr-tb;baseline-shift:baseline;text-anchor:start;white-space:normal;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;opacity:1;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-opacity:1;fill-rule:evenodd;stroke:none;stroke-width:8;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate" d="M 23.40625 9.1699219 A 0.74253873 0.74253873 0 0 0 23.001953 9.28125 L 15.923828 13.691406 L 11.396484 12.654297 L 9.328125 9.6992188 A 0.74253873 0.74253873 0 0 0 8.3515625 9.4804688 L 5.3730469 11.181641 A 0.74253873 0.74253873 0 0 0 5.0019531 11.884766 L 5.640625 19.753906 A 0.74253873 0.74253873 0 0 0 5.6953125 19.982422 L 10.162109 30.615234 A 0.74253873 0.74253873 0 0 0 10.636719 31.039062 L 13.658203 31.929688 L 13.3125 35.208984 L 10.191406 41.035156 A 0.74253873 0.74253873 0 0 0 10.304688 41.892578 L 13.28125 45.083984 A 0.74253873 0.74253873 0 0 0 13.380859 45.171875 L 19.599609 49.794922 L 22.074219 52.921875 L 20.689453 55.1875 A 0.74253873 0.74253873 0 0 0 20.648438 55.884766 L 21.550781 57.839844 A 0.74253873 0.74253873 0 0 0 22.371094 58.255859 L 22.794922 58.171875 L 22.398438 60.248047 A 0.74253873 0.74253873 0 0 0 22.589844 60.898438 L 25.447266 63.904297 A 0.74253873 0.74253873 0 0 0 26.035156 64.134766 L 28.291016 63.984375 A 0.74253873 0.74253873 0 0 0 28.984375 63.244141 L 28.984375 62.660156 L 31.589844 63.638672 A 0.74253873 0.74253873 0 0 0 32.232422 63.578125 L 33.044922 63.091797 L 39.154297 75.453125 A 0.74253873 0.74253873 0 0 0 39.779297 75.865234 L 42.277344 76.003906 L 43.960938 77.167969 L 45.693359 79.478516 A 0.74253873 0.74253873 0 0 0 46.167969 79.765625 L 48.175781 80.089844 L 49.123047 81.542969 A 0.74253873 0.74253873 0 0 0 49.787109 81.878906 L 52.222656 81.744141 L 54.412109 83.386719 A 0.74253873 0.74253873 0 0 0 55.449219 83.242188 L 56.654297 81.654297 L 58.091797 81.654297 A 0.74253873 0.74253873 0 0 0 58.820312 81.058594 L 58.912109 80.59375 L 60.646484 79.355469 L 62.847656 78.939453 L 64.792969 81.189453 L 64.792969 82.642578 A 0.74253873 0.74253873 0 0 0 64.941406 83.087891 L 65.269531 83.525391 L 64.960938 83.902344 A 0.74253873 0.74253873 0 0 0 64.894531 84.746094 L 65.947266 86.550781 A 0.74253873 0.74253873 0 0 0 66.509766 86.914062 L 68.230469 87.099609 L 68.419922 87.439453 A 0.74253873 0.74253873 0 0 0 69.40625 87.738281 L 69.425781 87.791016 A 0.74253873 0.74253873 0 0 0 70.064453 88.269531 L 71.042969 88.34375 A 0.74253873 0.74253873 0 0 0 71.544922 88.197266 L 71.621094 88.140625 L 72.980469 88.244141 L 73.457031 88.826172 A 0.74253873 0.74253873 0 0 0 73.982422 89.095703 L 75.109375 89.171875 A 0.74253873 0.74253873 0 0 0 75.445312 89.117188 L 76.044922 88.867188 L 76.875 89.253906 A 0.74253873 0.74253873 0 0 0 77.208984 89.324219 L 79.896484 89.251953 L 81.759766 89.681641 A 0.74253873 0.74253873 0 0 0 81.796875 89.691406 L 83.826172 90.054688 L 85.636719 90.777344 A 0.74253873 0.74253873 0 0 0 86.486328 90.558594 L 87.162109 89.732422 A 0.74253873 0.74253873 0 0 0 87.322266 89.367188 L 88.019531 84.564453 L 89.476562 83.835938 A 0.74253873 0.74253873 0 0 0 89.853516 83.388672 L 90.023438 82.839844 L 94.394531 82.021484 A 0.74253873 0.74253873 0 0 0 94.994141 81.203125 L 94.787109 79.472656 L 94.896484 79.089844 A 0.74253873 0.74253873 0 0 0 94.919922 78.802734 L 94.845703 78.126953 A 0.74253873 0.74253873 0 0 0 94.058594 77.466797 L 92.832031 77.548828 L 92.945312 77.119141 A 0.74253873 0.74253873 0 0 0 92.960938 76.818359 L 92.523438 73.972656 L 92.591797 73.158203 A 0.74253873 0.74253873 0 0 0 92.359375 72.554688 L 91.15625 71.425781 A 0.74253873 0.74253873 0 0 0 90.861328 71.257812 L 88.044922 70.412109 L 87.105469 69.417969 L 87.105469 68.810547 A 0.74253873 0.74253873 0 0 0 87.03125 68.488281 L 86.128906 66.609375 A 0.74253873 0.74253873 0 0 0 86.025391 66.447266 L 84.226562 64.345703 L 88.410156 59.189453 A 0.74253873 0.74253873 0 0 0 88.570312 58.642578 L 88.251953 55.666016 A 0.74253873 0.74253873 0 0 0 87.603516 55.007812 L 83.957031 54.5625 L 84.212891 51.662109 A 0.74253873 0.74253873 0 0 0 84.162109 51.320312 L 82.302734 46.724609 L 83.734375 44.9375 A 0.74253873 0.74253873 0 0 0 83.613281 43.888672 L 82.3125 42.869141 L 82.023438 41.855469 L 82.380859 40.962891 L 82.623047 40.962891 A 0.74253873 0.74253873 0 0 0 83.318359 40.480469 L 83.636719 39.630859 A 0.74253873 0.74253873 0 0 0 83.669922 39.222656 L 83.595703 38.853516 L 83.759766 38.8125 A 0.74253873 0.74253873 0 0 0 84.267578 38.369141 L 86.394531 33.052734 A 0.74253873 0.74253873 0 0 0 86.355469 32.416016 L 85.46875 30.820312 L 85.644531 30.410156 A 0.74253873 0.74253873 0 0 0 85.695312 30.003906 L 85.164062 26.601562 A 0.74253873 0.74253873 0 0 0 84.410156 25.972656 L 81.013672 26.064453 L 80.664062 25.083984 A 0.74253873 0.74253873 0 0 0 80.394531 24.726562 L 76.353516 21.857422 A 0.74253873 0.74253873 0 0 0 76.138672 21.751953 L 72.689453 20.707031 L 71.044922 19.884766 A 0.74253873 0.74253873 0 0 0 70.824219 19.814453 L 67.667969 19.335938 L 66.675781 17.623047 A 0.74253873 0.74253873 0 0 0 65.990234 17.253906 L 62.480469 17.466797 A 0.74253873 0.74253873 0 0 0 61.791016 18.103516 L 58.271484 18.103516 A 0.74253873 0.74253873 0 0 0 57.746094 18.322266 L 54.886719 21.181641 L 50.578125 22.71875 A 0.74253873 0.74253873 0 0 0 50.087891 23.480469 L 50.212891 24.960938 L 49.755859 24.832031 A 0.74253873 0.74253873 0 0 0 49.363281 24.832031 L 41.865234 26.810547 L 38.037109 26.123047 L 34.941406 23.994141 L 34.283203 22.486328 A 0.74253873 0.74253873 0 0 0 33.777344 22.0625 L 29.714844 21.072266 L 29.089844 20.056641 L 28.478516 17.306641 A 0.74253873 0.74253873 0 0 0 27.640625 16.734375 L 26.646484 16.886719 L 24.824219 14.923828 L 25.640625 14.517578 A 0.74253873 0.74253873 0 0 0 25.857422 13.353516 L 25.421875 12.873047 L 26.310547 12.373047 A 0.74253873 0.74253873 0 0 0 26.375 11.121094 L 23.824219 9.3125 A 0.74253873 0.74253873 0 0 0 23.40625 9.1757812 L 23.40625 9.1699219 z " transform="translate(0,952.36216)"/></g></svg>
                        </span>
                        <span class="menu-text">استان</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">استان</span>
                                </span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.provinces.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">مدیریت</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.provinces.create') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">ایجاد</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"></polygon> <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path> <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path></g></svg>
                        </span>
                        <span class="menu-text">کاربران</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">کاربران</span>
												</span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.users.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">مدیریت</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.users.create') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">ایجاد</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                <title>Stockholm-icons / Communication / Shield-user</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Stockholm-icons-/-Communication-/-Shield-user" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" id="Path-50" fill="#000000" opacity="0.3"></path>
                                    <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" id="Mask" fill="#000000" opacity="0.3"></path>
                                    <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" id="Mask-Copy" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-text">مدیران</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">مدیران</span>
												</span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.admins.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">مدیریت</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.admins.create') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">ایجاد</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="svg-icon menu-icon">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                <title>Stockholm-icons / General / Star</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Stockholm-icons-/-General-/-Star" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                    <path d="M12,18 L7.91561963,20.1472858 C7.42677504,20.4042866 6.82214789,20.2163401 6.56514708,19.7274955 C6.46280801,19.5328351 6.42749334,19.309867 6.46467018,19.0931094 L7.24471742,14.545085 L3.94038429,11.3241562 C3.54490071,10.938655 3.5368084,10.3055417 3.92230962,9.91005817 C4.07581822,9.75257453 4.27696063,9.65008735 4.49459766,9.61846284 L9.06107374,8.95491503 L11.1032639,4.81698575 C11.3476862,4.32173209 11.9473121,4.11839309 12.4425657,4.36281539 C12.6397783,4.46014562 12.7994058,4.61977315 12.8967361,4.81698575 L14.9389263,8.95491503 L19.5054023,9.61846284 C20.0519472,9.69788046 20.4306287,10.2053233 20.351211,10.7518682 C20.3195865,10.9695052 20.2170993,11.1706476 20.0596157,11.3241562 L16.7552826,14.545085 L17.5353298,19.0931094 C17.6286908,19.6374458 17.263103,20.1544017 16.7187666,20.2477627 C16.5020089,20.2849396 16.2790408,20.2496249 16.0843804,20.1472858 L12,18 Z" id="Star" fill="#000000"></path>
                                </g>
                            </svg>
                        </span>
                        <span class="menu-text">نقش ها</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">نقش ها</span>
												</span>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.roles.index') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">مدیریت</span>
                                </a>
                            </li>
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('adminPanel.roles.create') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">ایجاد</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>


            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
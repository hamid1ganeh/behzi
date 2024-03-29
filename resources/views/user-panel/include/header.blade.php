<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container d-flex align-items-stretch justify-content-between">
        <!--begin::Left-->
        <div class="d-flex align-items-stretch mr-3">
            <!--begin::Header Logo-->
            <div class="header-logo">
                <a href="{{ route('userPanel.index') }}">
                    <img alt="Logo" src="{{ asset('cp/assets/media/logos/logo-letter-9.png') }}" class="logo-default max-h-40px" />
                    <img alt="Logo" src="{{ asset('cp/assets/media/logos/logo-letter-1.png') }}" class="logo-sticky max-h-40px" />
                </a>
            </div>
            <!--end::Header Logo-->
            <!--begin::Header Menu Wrapper-->
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                <!--begin::Header Menu-->
                <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
                    <!--begin::Header Nav-->
                    <ul class="menu-nav">
                        <li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here" data-menu-toggle="click" aria-haspopup="true">
                            <a href="{{ route('userPanel.index') }}" onClick="window.location='{{ route('userPanel.index') }}'" class="menu-link menu-toggle">
                                <span class="menu-text">داشبورد</span>
                                <i class="menu-arrow"></i>
                            </a>
{{--                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">--}}
{{--                                <ul class="menu-subnav">--}}
{{--                                    <li class="menu-item menu-item-active" aria-haspopup="true">--}}
{{--                                        <a href="index.html" class="menu-link">--}}
{{--                                            <span class="menu-text">Latest Updated</span>--}}
{{--                                            <span class="menu-desc"></span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item" aria-haspopup="true">--}}
{{--                                        <a target="_blank" href="https://keenthemes.com/metronic/preview/demo2/builder.html" class="menu-link">--}}
{{--                                            <span class="menu-text">Layout Builder</span>--}}
{{--                                            <span class="menu-desc"></span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                        </li>
                        <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
                            <a href="{{ route('userPanel.pages.index') }}" class="menu-link">
                                <span class="menu-text">مدیریت صفحات</span>
                                <span class="menu-desc"></span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
{{--                        Dropdown Start--}}

{{--                        <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">--}}
{{--                            <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                <span class="menu-text">امکانات</span>--}}
{{--                                <span class="menu-desc"></span>--}}
{{--                                <i class="menu-arrow"></i>--}}
{{--                            </a>--}}
{{--                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">--}}
{{--                                <ul class="menu-subnav">--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="{{ route('userPanel.pages.index') }}" onClick="window.location='{{ route('userPanel.pages.index') }}'" class="menu-link menu-toggle">--}}
{{--                                            <span class="svg-icon menu-icon">--}}
{{--                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                            <rect x="0" y="0" width="24" height="24"/>--}}
{{--                                                            <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>--}}
{{--                                                            <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/>--}}
{{--                                                    </g>--}}
{{--                                                </svg>--}}
{{--                                                <!--end::Svg Icon-->--}}
{{--                                            </span>--}}
{{--                                            <span class="menu-text">مدیریت صفحات</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="features/bootstrap/typography.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Typography</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="features/bootstrap/buttons.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Buttons</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="features/bootstrap/button-group.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Button Group</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="features/bootstrap/dropdown.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Dropdown</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="features/bootstrap/navs.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Navs</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="features/bootstrap/tables.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Tables</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="features/bootstrap/progress.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Progress</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="features/bootstrap/modal.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Modal</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="features/bootstrap/alerts.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Alerts</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="features/bootstrap/popover.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Popover</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="features/bootstrap/tooltip.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Tooltip</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        Dropdown End    --}}

{{--<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">--}}
{{--                            <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                <span class="menu-text">Crud</span>--}}
{{--                                <span class="menu-desc"></span>--}}
{{--                                <i class="menu-arrow"></i>--}}
{{--                            </a>--}}
{{--                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">--}}
{{--                                <ul class="menu-subnav">--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                                    <span class="svg-icon menu-icon">--}}
{{--                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg-->--}}
{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                                <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />--}}
{{--                                                                                <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />--}}
{{--                                                                            </g>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <!--end::Svg Icon-->--}}
{{--                                                                    </span>--}}
{{--                                            <span class="menu-text">Forms &amp; Controls</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Form Controls</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/controls/base.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Base Inputs</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/controls/input-group.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Input Groups</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/controls/checkbox.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Checkbox</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/controls/radio.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Radio</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/controls/switch.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Switch</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/controls/option.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Mega Options</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Form Widgets</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/bootstrap-datepicker.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Datepicker</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/bootstrap-datetimepicker.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Datetimepicker</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/bootstrap-timepicker.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Timepicker</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/bootstrap-daterangepicker.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Daterangepicker</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/tagify.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Tagify</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/bootstrap-touchspin.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Touchspin</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/bootstrap-maxlength.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Maxlength</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/bootstrap-switch.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Switch</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/bootstrap-multipleselectsplitter.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Multiple Select Splitter</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/bootstrap-select.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Bootstrap Select</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/select2.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Select2</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/typeahead.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Typeahead</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Form Widgets 2</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/nouislider.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">noUiSlider</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/form-repeater.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Form Repeater</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/ion-range-slider.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Ion Range Slider</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/input-mask.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Input Masks</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/autosize.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Autosize</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/clipboard.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Clipboard</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/widgets/recaptcha.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Google reCaptcha</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Form Text Editors</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/editors/tinymce.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">TinyMCE</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                                <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">CKEditor</span>--}}
{{--                                                                    <i class="menu-arrow"></i>--}}
{{--                                                                </a>--}}
{{--                                                                <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                                    <ul class="menu-subnav">--}}
{{--                                                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                            <a href="crud/forms/editors/ckeditor-classic.html" class="menu-link">--}}
{{--                                                                                <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                                    <span></span>--}}
{{--                                                                                </i>--}}
{{--                                                                                <span class="menu-text">CKEditor Classic</span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </li>--}}
{{--                                                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                            <a href="crud/forms/editors/ckeditor-inline.html" class="menu-link">--}}
{{--                                                                                <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                                    <span></span>--}}
{{--                                                                                </i>--}}
{{--                                                                                <span class="menu-text">CKEditor Inline</span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </li>--}}
{{--                                                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                            <a href="crud/forms/editors/ckeditor-balloon.html" class="menu-link">--}}
{{--                                                                                <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                                    <span></span>--}}
{{--                                                                                </i>--}}
{{--                                                                                <span class="menu-text">CKEditor Balloon</span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </li>--}}
{{--                                                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                            <a href="crud/forms/editors/ckeditor-balloon-block.html" class="menu-link">--}}
{{--                                                                                <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                                    <span></span>--}}
{{--                                                                                </i>--}}
{{--                                                                                <span class="menu-text">CKEditor Balloon Block</span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </li>--}}
{{--                                                                        <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                            <a href="crud/forms/editors/ckeditor-document.html" class="menu-link">--}}
{{--                                                                                <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                                    <span></span>--}}
{{--                                                                                </i>--}}
{{--                                                                                <span class="menu-text">CKEditor Document</span>--}}
{{--                                                                            </a>--}}
{{--                                                                        </li>--}}
{{--                                                                    </ul>--}}
{{--                                                                </div>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/editors/quill.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Quill Text Editor</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/editors/summernote.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Summernote WYSIWYG</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/editors/bootstrap-markdown.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Markdown Editor</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Form Layouts</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/layouts/default-forms.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Default Forms</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/layouts/multi-column-forms.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Multi Column Forms</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/layouts/action-bars.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Basic Action Bars</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/layouts/sticky-action-bar.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Sticky Action Bar</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Form Validation</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/validation/states.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Validation States</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/validation/form-controls.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Form Controls</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/forms/validation/form-widgets.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Form Widgets</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                                    <span class="svg-icon menu-icon">--}}
{{--                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->--}}
{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                                <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000" />--}}
{{--                                                                                <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3" />--}}
{{--                                                                            </g>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <!--end::Svg Icon-->--}}
{{--                                                                    </span>--}}
{{--                                            <span class="menu-text">KTDatatable</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Base</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/base/data-local.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Local Data</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/base/data-json.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">JSON Data</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/base/data-ajax.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Ajax Data</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/base/html-table.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">HTML Table</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/base/local-sort.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Local Sort</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/base/translation.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Translation</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Advanced</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/advanced/record-selection.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Record Selection</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/advanced/row-details.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Row Details</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/advanced/modal.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Modal Examples</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/advanced/column-rendering.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Column Rendering</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/advanced/column-width.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Column Width</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/advanced/vertical.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Vertical Scrolling</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Child Datatables</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/child/data-local.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Local Data</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/child/data-ajax.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Remote Data</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">API</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/api/methods.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">API Methods</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/ktdatatable/api/events.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Events</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                                    <span class="svg-icon menu-icon">--}}
{{--                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Gift.svg-->--}}
{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                                <path d="M4,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M5,11 L10,11 C10.5522847,11 11,11.4477153 11,12 L11,19 C11,19.5522847 10.5522847,20 10,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,12 C4,11.4477153 4.44771525,11 5,11 Z M14,11 L19,11 C19.5522847,11 20,11.4477153 20,12 L20,19 C20,19.5522847 19.5522847,20 19,20 L14,20 C13.4477153,20 13,19.5522847 13,19 L13,12 C13,11.4477153 13.4477153,11 14,11 Z" fill="#000000" />--}}
{{--                                                                                <path d="M14.4452998,2.16794971 C14.9048285,1.86159725 15.5256978,1.98577112 15.8320503,2.4452998 C16.1384028,2.90482849 16.0142289,3.52569784 15.5547002,3.83205029 L12,6.20185043 L8.4452998,3.83205029 C7.98577112,3.52569784 7.86159725,2.90482849 8.16794971,2.4452998 C8.47430216,1.98577112 9.09517151,1.86159725 9.5547002,2.16794971 L12,3.79814957 L14.4452998,2.16794971 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />--}}
{{--                                                                            </g>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <!--end::Svg Icon-->--}}
{{--                                                                    </span>--}}
{{--                                            <span class="menu-text">Datatables.net</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Basic</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/basic/basic.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Basic Tables</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/basic/scrollable.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Scrollable Tables</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/basic/headers.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Complex Headers</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/basic/paginations.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Pagination Options</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Advanced</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/advanced/column-rendering.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Column Rendering</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/advanced/multiple-controls.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Multiple Controls</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/advanced/column-visibility.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Column Visibility</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/advanced/row-callback.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Row Callback</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/advanced/row-grouping.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Row Grouping</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/advanced/footer-callback.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Footer Callback</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Data sources</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/data-sources/html.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">HTML</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/data-sources/javascript.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Javascript</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/data-sources/ajax-client-side.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Ajax Client-side</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/data-sources/ajax-server-side.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Ajax Server-side</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Search Options</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/search-options/column-search.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Column Search</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/search-options/advanced-search.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Advanced Search</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Extensions</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/extensions/buttons.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Buttons</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/extensions/colreorder.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">ColReorder</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/extensions/keytable.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">KeyTable</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/extensions/responsive.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Responsive</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/extensions/rowgroup.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">RowGroup</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/extensions/rowreorder.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">RowReorder</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/extensions/scroller.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Scroller</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="crud/datatables/extensions/select.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Select</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                                    <span class="svg-icon menu-icon">--}}
{{--                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Gift.svg-->--}}
{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                                <path d="M4,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M5,11 L10,11 C10.5522847,11 11,11.4477153 11,12 L11,19 C11,19.5522847 10.5522847,20 10,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,12 C4,11.4477153 4.44771525,11 5,11 Z M14,11 L19,11 C19.5522847,11 20,11.4477153 20,12 L20,19 C20,19.5522847 19.5522847,20 19,20 L14,20 C13.4477153,20 13,19.5522847 13,19 L13,12 C13,11.4477153 13.4477153,11 14,11 Z" fill="#000000" />--}}
{{--                                                                                <path d="M14.4452998,2.16794971 C14.9048285,1.86159725 15.5256978,1.98577112 15.8320503,2.4452998 C16.1384028,2.90482849 16.0142289,3.52569784 15.5547002,3.83205029 L12,6.20185043 L8.4452998,3.83205029 C7.98577112,3.52569784 7.86159725,2.90482849 8.16794971,2.4452998 C8.47430216,1.98577112 9.09517151,1.86159725 9.5547002,2.16794971 L12,3.79814957 L14.4452998,2.16794971 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />--}}
{{--                                                                            </g>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <!--end::Svg Icon-->--}}
{{--                                                                    </span>--}}
{{--                                            <span class="menu-text">File Upload</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="crud/file-upload/image-input.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Image Input</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="crud/file-upload/dropzonejs.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">DropzoneJS</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="crud/file-upload/uppy.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Uppy</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">--}}
{{--                            <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                <span class="menu-text">Apps</span>--}}
{{--                                <span class="menu-desc"></span>--}}
{{--                                <i class="menu-arrow"></i>--}}
{{--                            </a>--}}
{{--                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">--}}
{{--                                <ul class="menu-subnav">--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                                    <span class="svg-icon menu-icon">--}}
{{--                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Address-card.svg-->--}}
{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                                <path d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000" />--}}
{{--                                                                            </g>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <!--end::Svg Icon-->--}}
{{--                                                                    </span>--}}
{{--                                            <span class="menu-text">Users</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/user/list-default.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">List - Default</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/user/list-datatable.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">List - Datatable</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/user/list-columns-1.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">List - Columns 1</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/user/list-columns-2.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">List - Columns 2</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/user/add-user.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Add User</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/user/edit-user.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Edit User</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                                    <span class="svg-icon menu-icon">--}}
{{--                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Address-card.svg-->--}}
{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                                <path d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000" />--}}
{{--                                                                            </g>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <!--end::Svg Icon-->--}}
{{--                                                                    </span>--}}
{{--                                            <span class="menu-text">Profile</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                                    <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Profile 1</span>--}}
{{--                                                        <i class="menu-arrow"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                                        <ul class="menu-subnav">--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="custom/apps/profile/profile-1/overview.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Overview</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="custom/apps/profile/profile-1/personal-information.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Personal Information</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="custom/apps/profile/profile-1/account-information.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Account Information</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="custom/apps/profile/profile-1/change-password.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Change Password</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                            <li class="menu-item" aria-haspopup="true">--}}
{{--                                                                <a href="custom/apps/profile/profile-1/email-settings.html" class="menu-link">--}}
{{--                                                                    <i class="menu-bullet menu-bullet-line">--}}
{{--                                                                        <span></span>--}}
{{--                                                                    </i>--}}
{{--                                                                    <span class="menu-text">Email Settings</span>--}}
{{--                                                                </a>--}}
{{--                                                            </li>--}}
{{--                                                        </ul>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/profile/profile-2.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Profile 2</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/profile/profile-3.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Profile 3</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/profile/profile-4.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Profile 4</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                                    <span class="svg-icon menu-icon">--}}
{{--                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Adress-book1.svg-->--}}
{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                                <path d="M17,2 L19,2 C20.6568542,2 22,3.34314575 22,5 L22,19 C22,20.6568542 20.6568542,22 19,22 L17,22 L17,2 Z" fill="#000000" opacity="0.3" />--}}
{{--                                                                                <path d="M4,2 L16,2 C17.6568542,2 19,3.34314575 19,5 L19,19 C19,20.6568542 17.6568542,22 16,22 L4,22 C3.44771525,22 3,21.5522847 3,21 L3,3 C3,2.44771525 3.44771525,2 4,2 Z M11.1176481,13.709585 C10.6725287,14.1547043 9.99251947,14.2650547 9.42948307,13.9835365 C8.86644666,13.7020183 8.18643739,13.8123686 7.74131803,14.2574879 L6.2303083,15.7684977 C6.17542087,15.8233851 6.13406645,15.8902979 6.10952004,15.9639372 C6.02219616,16.2259088 6.16377615,16.5090688 6.42574781,16.5963927 L7.77956724,17.0476658 C9.07965249,17.4810276 10.5130001,17.1426601 11.4820264,16.1736338 L15.4812434,12.1744168 C16.3714821,11.2841781 16.5921828,9.92415954 16.0291464,8.79808673 L15.3965752,7.53294436 C15.3725414,7.48487691 15.3409156,7.44099843 15.302915,7.40299777 C15.1076528,7.20773562 14.7910703,7.20773562 14.5958082,7.40299777 L13.0032662,8.99553978 C12.5581468,9.44065914 12.4477965,10.1206684 12.7293147,10.6837048 C13.0108329,11.2467412 12.9004826,11.9267505 12.4553632,12.3718698 L11.1176481,13.709585 Z" fill="#000000" />--}}
{{--                                                                            </g>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <!--end::Svg Icon-->--}}
{{--                                                                    </span>--}}
{{--                                            <span class="menu-text">Contacts</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/contacts/list-columns.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">List - Columns</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/contacts/list-datatable.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">List - Datatable</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/contacts/view-contact.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">View Contact</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/contacts/add-contact.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Add Contact</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/contacts/edit-contact.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Edit Contact</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                                    <span class="svg-icon menu-icon">--}}
{{--                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->--}}
{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                                <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3" />--}}
{{--                                                                                <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000" />--}}
{{--                                                                            </g>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <!--end::Svg Icon-->--}}
{{--                                                                    </span>--}}
{{--                                            <span class="menu-text">Chat</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/chat/private.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Private</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/chat/group.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Group</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/chat/popup.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Popup</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                                    <span class="svg-icon menu-icon">--}}
{{--                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg-->--}}
{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                                <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />--}}
{{--                                                                                <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />--}}
{{--                                                                            </g>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <!--end::Svg Icon-->--}}
{{--                                                                    </span>--}}
{{--                                            <span class="menu-text">Projects</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/projects/list-columns-1.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">List - Columns 1</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/projects/list-columns-2.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">List - Columns 2</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/projects/list-columns-3.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">List - Columns 3</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/projects/list-columns-4.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">List - Columns 4</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/projects/list-datatable.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">List - Datatable</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/projects/view-project.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">View Project</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/projects/add-project.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Add Project</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/projects/edit-project.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Edit Project</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                                    <span class="svg-icon menu-icon">--}}
{{--                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Shield-check.svg-->--}}
{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />--}}
{{--                                                                                <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000" />--}}
{{--                                                                            </g>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <!--end::Svg Icon-->--}}
{{--                                                                    </span>--}}
{{--                                            <span class="menu-text">Support Center</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/support-center/home-1.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Home 1</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/support-center/home-2.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Home 2</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/support-center/faq-1.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">FAQ 1</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/support-center/faq-2.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">FAQ 2</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/support-center/faq-3.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">FAQ 3</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/support-center/feedback.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Feedback</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/support-center/license.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">License</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                                                    <span class="svg-icon menu-icon">--}}
{{--                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Clipboard-list.svg-->--}}
{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />--}}
{{--                                                                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />--}}
{{--                                                                                <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1" />--}}
{{--                                                                                <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1" />--}}
{{--                                                                                <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1" />--}}
{{--                                                                                <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1" />--}}
{{--                                                                                <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1" />--}}
{{--                                                                                <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1" />--}}
{{--                                                                            </g>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <!--end::Svg Icon-->--}}
{{--                                                                    </span>--}}
{{--                                            <span class="menu-text">Todo</span>--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/todo/tasks.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Tasks</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/todo/docs.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Docs</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/apps/todo/files.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Files</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item" aria-haspopup="true">--}}
{{--                                        <a href="custom/apps/inbox.html" class="menu-link">--}}
{{--                                                                    <span class="svg-icon menu-icon">--}}
{{--                                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Shield-check.svg-->--}}
{{--                                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                                <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />--}}
{{--                                                                                <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000" />--}}
{{--                                                                            </g>--}}
{{--                                                                        </svg>--}}
{{--                                                                        <!--end::Svg Icon-->--}}
{{--                                                                    </span>--}}
{{--                                            <span class="menu-text">Inbox</span>--}}
{{--                                            <span class="menu-label">--}}
{{--                                                                        <span class="label label-danger label-inline">new</span>--}}
{{--                                                                    </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="menu-item menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">--}}
{{--                            <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--                                <span class="menu-text">Pages</span>--}}
{{--                                <span class="menu-desc"></span>--}}
{{--                                <i class="menu-arrow"></i>--}}
{{--                            </a>--}}
{{--                            <div class="menu-submenu menu-submenu-fixed menu-submenu-center" style="width:1000px">--}}
{{--                                <div class="menu-subnav">--}}
{{--                                    <ul class="menu-content">--}}
{{--                                        <li class="menu-item">--}}
{{--                                            <h3 class="menu-heading menu-toggle">--}}
{{--                                                <span class="menu-text">Pricing Tables</span>--}}
{{--                                                <i class="menu-arrow"></i>--}}
{{--                                            </h3>--}}
{{--                                            <ul class="menu-inner">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/pricing/pricing-1.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Pricing Tables 1</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/pricing/pricing-2.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Pricing Tables 2</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/pricing/pricing-3.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Pricing Tables 3</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/pricing/pricing-4.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Pricing Tables 4</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item">--}}
{{--                                            <h3 class="menu-heading menu-toggle">--}}
{{--                                                <span class="menu-text">Wizards</span>--}}
{{--                                                <i class="menu-arrow"></i>--}}
{{--                                            </h3>--}}
{{--                                            <ul class="menu-inner">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/wizard/wizard-1.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Wizard 1</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/wizard/wizard-2.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Wizard 2</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/wizard/wizard-3.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Wizard 3</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/wizard/wizard-4.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Wizard 4</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item">--}}
{{--                                            <h3 class="menu-heading menu-toggle">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Invoices &amp; FAQ</span>--}}
{{--                                                <i class="menu-arrow"></i>--}}
{{--                                            </h3>--}}
{{--                                            <ul class="menu-inner">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/invoices/invoice-1.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Invoice 1</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/invoices/invoice-2.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Invoice 2</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item">--}}
{{--                                            <h3 class="menu-heading menu-toggle">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">User Pages</span>--}}
{{--                                                <i class="menu-arrow"></i>--}}
{{--                                            </h3>--}}
{{--                                            <ul class="menu-inner">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/users/login-1.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Login 1</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/users/login-2.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Login 2</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/users/login-3.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Login 3</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/users/login-4.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Login 4</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/users/login-5.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Login 5</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/users/login-6.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Login 6</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu-item">--}}
{{--                                            <h3 class="menu-heading menu-toggle">--}}
{{--                                                <i class="menu-bullet menu-bullet-dot">--}}
{{--                                                    <span></span>--}}
{{--                                                </i>--}}
{{--                                                <span class="menu-text">Error Pages</span>--}}
{{--                                                <i class="menu-arrow"></i>--}}
{{--                                            </h3>--}}
{{--                                            <ul class="menu-inner">--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/errors/error-1.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Error 1</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/errors/error-2.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Error 2</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/errors/error-3.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Error 3</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/errors/error-4.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Error 4</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/errors/error-5.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Error 5</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li class="menu-item" aria-haspopup="true">--}}
{{--                                                    <a href="custom/pages/errors/error-6.html" class="menu-link">--}}
{{--                                                        <i class="menu-bullet menu-bullet-line">--}}
{{--                                                            <span></span>--}}
{{--                                                        </i>--}}
{{--                                                        <span class="menu-text">Error 6</span>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                    </ul>
                    <!--end::Header Nav-->
                </div>
                <!--end::Header Menu-->
            </div>
            <!--end::Header Menu Wrapper-->
        </div>
        <!--end::Left-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::Search-->
{{--            <div class="dropdown">--}}
{{--                <!--begin::Toggle-->--}}
{{--                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">--}}
{{--                    <div class="btn btn-icon btn-hover-transparent-white btn-lg btn-dropdown mr-1">--}}
{{--                                                <span class="svg-icon svg-icon-xl">--}}
{{--                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                            <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />--}}
{{--                                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />--}}
{{--                                                        </g>--}}
{{--                                                    </svg>--}}
{{--                                                    <!--end::Svg Icon-->--}}
{{--                                                </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end::Toggle-->--}}
{{--                <!--begin::Dropdown-->--}}
{{--                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">--}}
{{--                    <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">--}}
{{--                        <!--begin:Form-->--}}
{{--                        <form method="get" class="quick-search-form">--}}
{{--                            <div class="input-group">--}}
{{--                                <div class="input-group-prepend">--}}
{{--                                                            <span class="input-group-text">--}}
{{--                                                                <span class="svg-icon svg-icon-lg">--}}
{{--                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->--}}
{{--                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                            <rect x="0" y="0" width="24" height="24" />--}}
{{--                                                                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />--}}
{{--                                                                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />--}}
{{--                                                                        </g>--}}
{{--                                                                    </svg>--}}
{{--                                                                    <!--end::Svg Icon-->--}}
{{--                                                                </span>--}}
{{--                                                            </span>--}}
{{--                                </div>--}}
{{--                                <input type="text" class="form-control" placeholder="Search..." />--}}
{{--                                <div class="input-group-append">--}}
{{--                                                            <span class="input-group-text">--}}
{{--                                                                <i class="quick-search-close ki ki-close icon-sm text-muted"></i>--}}
{{--                                                            </span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                        <!--end::Form-->--}}
{{--                        <!--begin::Scroll-->--}}
{{--                        <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325" data-mobile-height="200"></div>--}}
{{--                        <!--end::Scroll-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end::Dropdown-->--}}
{{--            </div>--}}
            <!--end::Search-->
            <!--begin::Notifications-->
            <div class="my-auto">
                <!--begin-->
                <a href="{{ route('userPanel.tickets.index') }}" title="چت">
                    <div class="topbar-item" data-offset="10px,0px">
                        <div class="btn btn-icon btn-hover-transparent-white btn-lg mr-1">
                        <span class="svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 50.2 (55047) - http://www.bohemiancoding.com/sketch -->
                                <defs></defs>
                                <g id="Stockholm-icons-/-Communication-/-Group-chat" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                    <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" id="Combined-Shape" fill="#000000"></path>
                                    <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        </div>
                    </div>
                </a>
                <!--end-->
            </div>
            <!--end::Notifications-->
            <div class="my-auto">
                <!--begin-->
                <a href="{{ route('userPanel.profile.index') }}" title="پروفایل">
                    <div class="topbar-item" data-offset="10px,0px">
                        <div class="btn btn-icon btn-hover-transparent-white btn-lg mr-1">
                        <span class="svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                            <i class="fa fa-id-card" style="color:#e5f0f9"></i>
                            <!--end::Svg Icon-->
                        </span>
                        </div>
                    </div>
                </a>
                <!--end-->
            </div>
            <!--begin::Quick Actions-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1">
                                                <span class="svg-icon svg-icon-xl">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <!--begin:Header-->
                    <div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url({{ asset('cp/assets/media/misc/bg-1.jpg') }})">
                        <h4 class="text-white font-weight-bold">Quick Actions</h4>
                        <span class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">23 tasks pending</span>
                    </div>
                    <!--end:Header-->
                    <!--begin:Nav-->
                    <div class="row row-paddingless">
                        <!--begin:Item-->
                        <div class="col-6">
                            <a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-right border-bottom">
                                                        <span class="svg-icon svg-icon-3x svg-icon-success">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Euro.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" fill="#000000" opacity="0.3" />
                                                                    <path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" fill="#000000" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Accounting</span>
                                <span class="d-block text-dark-50 font-size-lg">eCommerce</span>
                            </a>
                        </div>
                        <!--end:Item-->
                        <!--begin:Item-->
                        <div class="col-6">
                            <a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-bottom">
                                                        <span class="svg-icon svg-icon-3x svg-icon-success">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-attachment.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z" fill="#000000" opacity="0.3" />
                                                                    <path d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z" fill="#000000" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Administration</span>
                                <span class="d-block text-dark-50 font-size-lg">Console</span>
                            </a>
                        </div>
                        <!--end:Item-->
                        <!--begin:Item-->
                        <div class="col-6">
                            <a href="#" class="d-block py-10 px-5 text-center bg-hover-light border-right">
                                                        <span class="svg-icon svg-icon-3x svg-icon-success">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
                                                                    <path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Projects</span>
                                <span class="d-block text-dark-50 font-size-lg">Pending Tasks</span>
                            </a>
                        </div>
                        <!--end:Item-->
                        <!--begin:Item-->
                        <div class="col-6">
                            <a href="#" class="d-block py-10 px-5 text-center bg-hover-light">
                                                        <span class="svg-icon svg-icon-3x svg-icon-success">
                                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Customers</span>
                                <span class="d-block text-dark-50 font-size-lg">Latest cases</span>
                            </a>
                        </div>
                        <!--end:Item-->
                    </div>
                    <!--end:Nav-->
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Quick Actions-->
            <!--begin::My Cart-->
            {{--<div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white btn-dropdown btn-lg mr-1">
                                                <span class="svg-icon svg-icon-xl">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Cart3.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path d="M12,4.56204994 L7.76822128,9.6401844 C7.4146572,10.0644613 6.7840925,10.1217854 6.3598156,9.76822128 C5.9355387,9.4146572 5.87821464,8.7840925 6.23177872,8.3598156 L11.2317787,2.3598156 C11.6315738,1.88006147 12.3684262,1.88006147 12.7682213,2.3598156 L17.7682213,8.3598156 C18.1217854,8.7840925 18.0644613,9.4146572 17.6401844,9.76822128 C17.2159075,10.1217854 16.5853428,10.0644613 16.2317787,9.6401844 L12,4.56204994 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                            <path d="M3.5,9 L20.5,9 C21.0522847,9 21.5,9.44771525 21.5,10 C21.5,10.132026 21.4738562,10.2627452 21.4230769,10.3846154 L17.7692308,19.1538462 C17.3034221,20.271787 16.2111026,21 15,21 L9,21 C7.78889745,21 6.6965779,20.271787 6.23076923,19.1538462 L2.57692308,10.3846154 C2.36450587,9.87481408 2.60558331,9.28934029 3.11538462,9.07692308 C3.23725479,9.02614384 3.36797398,9 3.5,9 Z M12,17 C13.1045695,17 14,16.1045695 14,15 C14,13.8954305 13.1045695,13 12,13 C10.8954305,13 10,13.8954305 10,15 C10,16.1045695 10.8954305,17 12,17 Z" fill="#000000" />
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-xl dropdown-menu-anim-up">
                    <form>
                        <!--begin::Header-->
                        <div class="d-flex align-items-center py-10 px-8 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url({{ asset('cp/assets/media/misc/bg-1.jpg') }})">
                                                    <span class="btn btn-md btn-icon bg-white-o-15 mr-4">
                                                        <i class="flaticon2-shopping-cart-1 text-success"></i>
                                                    </span>
                            <h4 class="text-white m-0 flex-grow-1 mr-3">My Cart</h4>
                            <button type="button" class="btn btn-success btn-sm">2 Items</button>
                        </div>
                        <!--end::Header-->
                        <!--begin::Scroll-->
                        <div class="scroll scroll-push" data-scroll="true" data-height="250" data-mobile-height="200">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center justify-content-between p-8">
                                <div class="d-flex flex-column mr-2">
                                    <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">iBlender</a>
                                    <span class="text-muted">Best kichen gadget in 2020</span>
                                    <div class="d-flex align-items-center mt-2">
                                        <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 350</span>
                                        <span class="text-muted mr-1">for</span>
                                        <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">5</span>
                                        <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                            <i class="ki ki-minus icon-xs"></i>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                            <i class="ki ki-plus icon-xs"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href="#" class="symbol symbol-70 flex-shrink-0">
                                    <img src="{{ asset('cp/assets/media/stock-600x400/img-1.jpg') }}" title="" alt="" />
                                </a>
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-solid"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center justify-content-between p-8">
                                <div class="d-flex flex-column mr-2">
                                    <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">SmartCleaner</a>
                                    <span class="text-muted">Smart tool for cooking</span>
                                    <div class="d-flex align-items-center mt-2">
                                        <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 650</span>
                                        <span class="text-muted mr-1">for</span>
                                        <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">4</span>
                                        <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                            <i class="ki ki-minus icon-xs"></i>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                            <i class="ki ki-plus icon-xs"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href="#" class="symbol symbol-70 flex-shrink-0">
                                    <img src="{{ asset('cp/assets/media/stock-600x400/img-2.jpg') }}" title="" alt="" />
                                </a>
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-solid"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center justify-content-between p-8">
                                <div class="d-flex flex-column mr-2">
                                    <a href="#" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">CameraMax</a>
                                    <span class="text-muted">Professional camera for edge cutting shots</span>
                                    <div class="d-flex align-items-center mt-2">
                                        <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 150</span>
                                        <span class="text-muted mr-1">for</span>
                                        <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">3</span>
                                        <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                            <i class="ki ki-minus icon-xs"></i>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                            <i class="ki ki-plus icon-xs"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href="#" class="symbol symbol-70 flex-shrink-0">
                                    <img src="{{ asset('cp/assets/media/stock-600x400/img-3.jpg') }}" title="" alt="" />
                                </a>
                            </div>
                            <!--end::Item-->
                            <!--begin::Separator-->
                            <div class="separator separator-solid"></div>
                            <!--end::Separator-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center justify-content-between p-8">
                                <div class="d-flex flex-column mr-2">
                                    <a href="#" class="font-weight-bold text-dark text-hover-primary">4DPrinter</a>
                                    <span class="text-muted">Manufactoring unique objects</span>
                                    <div class="d-flex align-items-center mt-2">
                                        <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ 1450</span>
                                        <span class="text-muted mr-1">for</span>
                                        <span class="font-weight-bold mr-2 text-dark-75 font-size-lg">7</span>
                                        <a href="#" class="btn btn-xs btn-light-success btn-icon mr-2">
                                            <i class="ki ki-minus icon-xs"></i>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-light-success btn-icon">
                                            <i class="ki ki-plus icon-xs"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href="#" class="symbol symbol-70 flex-shrink-0">
                                    <img src="{{ asset('cp/assets/media/stock-600x400/img-4.jpg') }}" title="" alt="" />
                                </a>
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Scroll-->
                        <!--begin::Summary-->
                        <div class="p-8">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <span class="font-weight-bold text-muted font-size-sm mr-2">Total</span>
                                <span class="font-weight-bolder text-dark-50 text-right">$1840.00</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-7">
                                <span class="font-weight-bold text-muted font-size-sm mr-2">Sub total</span>
                                <span class="font-weight-bolder text-primary text-right">$5640.00</span>
                            </div>
                            <div class="text-right">
                                <button type="button" class="btn btn-primary text-weight-bold">Place Order</button>
                            </div>
                        </div>
                        <!--end::Summary-->
                    </form>
                </div>
                <!--end::Dropdown-->
            </div>--}}
            <!--end::My Cart-->

            {{--<div class="topbar-item">
                <div class="btn btn-icon btn-hover-transparent-white btn-lg mr-1" id="kt_quick_panel_toggle">
                    <span class="svg-icon svg-icon-xl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </div>
            </div>--}}
            <!--end::Quick panel-->

            <!--begin::User-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                    <div class="btn btn-icon btn-hover-transparent-white d-flex align-items-center btn-lg px-md-2 w-md-auto">

                        <span class="text-white opacity-90 font-weight-bolder font-size-base d-none d-md-inline mr-4">{{ \Illuminate\Support\Facades\Auth::user()->mobile }}</span>
                        <span class="symbol symbol-35">
                                                    <span class="symbol-label text-white font-size-h5 font-weight-bold bg-white-o-30"><i class="fa fa-user"></i></span>
                                                </span>
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">
                    <!--begin::Header-->
                    <div class="d-flex align-items-center rounded-top">
                        <!--begin::Symbol-->

                        <!--end::Symbol-->
                        <!--begin::Text-->
{{--                        <div class="text-dark m-0 flex-grow-1 mr-3 font-size-h5">Sean Stone</div>--}}
{{--                        <span class="label label-light-success label-lg font-weight-bold label-inline">3 messages</span>--}}
                        <!--end::Text-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Nav-->
                    <div class="navi navi-spacer-x-0">
{{--                        <!--begin::Item-->--}}
{{--                        <a href="custom/apps/user/profile-1/personal-information.html" class="navi-item px-8">--}}
{{--                            <div class="navi-link">--}}
{{--                                <div class="navi-icon mr-2">--}}
{{--                                    <i class="flaticon2-calendar-3 text-success"></i>--}}
{{--                                </div>--}}
{{--                                <div class="navi-text">--}}
{{--                                    <div class="font-weight-bold">My Profile</div>--}}
{{--                                    <div class="text-muted">Account settings and more--}}
{{--                                        <span class="label label-light-danger label-inline font-weight-bold">update</span></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <!--end::Item-->--}}
{{--                        <!--begin::Item-->--}}
{{--                        <a href="custom/apps/user/profile-3.html" class="navi-item px-8">--}}
{{--                            <div class="navi-link">--}}
{{--                                <div class="navi-icon mr-2">--}}
{{--                                    <i class="flaticon2-mail text-warning"></i>--}}
{{--                                </div>--}}
{{--                                <div class="navi-text">--}}
{{--                                    <div class="font-weight-bold">My Messages</div>--}}
{{--                                    <div class="text-muted">Inbox and tasks</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <!--end::Item-->--}}
{{--                        <!--begin::Item-->--}}
{{--                        <a href="custom/apps/user/profile-2.html" class="navi-item px-8">--}}
{{--                            <div class="navi-link">--}}
{{--                                <div class="navi-icon mr-2">--}}
{{--                                    <i class="flaticon2-rocket-1 text-danger"></i>--}}
{{--                                </div>--}}
{{--                                <div class="navi-text">--}}
{{--                                    <div class="font-weight-bold">My Activities</div>--}}
{{--                                    <div class="text-muted">Logs and notifications</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <!--end::Item-->--}}
{{--                        <!--begin::Item-->--}}
{{--                        <a href="custom/apps/userprofile-1/overview.html" class="navi-item px-8">--}}
{{--                            <div class="navi-link">--}}
{{--                                <div class="navi-icon mr-2">--}}
{{--                                    <i class="flaticon2-hourglass text-primary"></i>--}}
{{--                                </div>--}}
{{--                                <div class="navi-text">--}}
{{--                                    <div class="font-weight-bold">My Tasks</div>--}}
{{--                                    <div class="text-muted">latest tasks and projects</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <!--end::Item-->--}}
{{--                        <!--begin::Footer-->--}}

                        <div class="navi-footer px-2 py-2 row mx-0">
                            <div class="w-100 mb-2">
                                <a href="{{ route('userPanel.profile.index') }}" class="btn btn-light-primary btn-block font-weight-bold"><i class="fa fa-card-id"></i>حساب کاربری</a>
                            </div>
                            <div class="w-100">
                                <a href="{{ route('userPanel.logout') }}" class="btn btn-light-primary btn-block font-weight-bold"><i class="fa fa-power-off"></i> خروج از حساب کاربری</a>
                            </div>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
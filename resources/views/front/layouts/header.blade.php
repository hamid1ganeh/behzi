<header class="col-12 row mx-0 px-2 px-xl-3 pt-3 py-md-4">

    <div class="show-in-mobile">
        <a href="" class="btn btn-gradient-blue btn-sm position-absolute pl-1 pr-2" style="left: 1rem;z-index:2">ثبت سفارش
            <img src="{{ asset('svg/plus.svg') }}" width="20" height="20" class=""></a>
    </div>
    <div class="col-12 col-lg-3 col-xl-3 font-weight-bolder text-center text-xl-right">
        <div class="pr-xl-5 mb-0 mb-3 mb-lg-0"><a href="{{ route('front.index') }}"><img src="{{ asset('images/static/logo.png') }}" alt="BEHZI"></a></div>
    </div>
    <div class="col-lg-6 col-xl-6 px-0 text-center menu-container hide-in-mobile my-auto">
        <div class="hide-in-mobile">
            <form action="{{ route('front.pages.index') }}" method="GET">
                <div class="position-relative">
                    <input type="text" autocomplete="off" name="name" class="rounded pr-5 shadow-sm border-hover-info" placeholder="دنبال چی میگردی؟">
                    <img onclick="$('#srch-submit')[0].click()" src="{{ asset('svg/magnifyer-b.svg') }}" width="38" height="24" class="px-2 pointer search-icon">
                </div>
                <input type="submit" id="srch-submit" hidden>
            </form>
{{--            <a href="{{ route('front.index') }}" class="mx-1 p-2 menu-item position-relative hvr-underline-from-center">خانه</a>--}}
{{--            <a href="{{ route('front.index') . '#services' }}" class="mx-1 p-2 menu-item position-relative hvr-underline-from-center">خدمات</a>--}}
{{--            <a href="" class="mx-1 p-2 menu-item position-relative hvr-underline-from-center">مشاغل</a>--}}
{{--            <a href="/about-us" class="mx-1 p-2 menu-item position-relative hvr-underline-from-center">درباره ما</a>--}}
{{--            <a href="/contact-us" class="mx-1 p-2 menu-item position-relative hvr-underline-from-center">تماس با ما</a>--}}
        </div>
    </div>
    <div class="col-lg-3 col-xl-3 text-left px-0 px-xl-3 hide-in-mobile my-auto">
        <div>
            @if(Auth::check())
                <span class="mx-1 mx-xl-3 position-relative user-panel-link">
                    <span onclick="doToggle()"><img src="{{ asset('images/static/h-arrows.svg') }}" width="6" class="ml-2">پنل کاربری
                        <img src="{{ asset('svg/user.svg') }}" class="px-1" width="35">
                    </span>
                    <div class="dropdown position-absolute bg-white border shadow-sm rounded small text-center pb-2">
                        <div class="mt-2"><a href="{{ route('userPanel.index') }}">مشاهده پنل مدیریت</a></div>
                        <div class="mt-2"><a href="{{ route('userPanel.logout') }}">خروج </a></div>
                    </div>
                </span>
                <a href="#" class="btn btn-gradient-blue pr-xl-3"> ثبت سفارش<img src="{{ asset('svg/plus.svg') }}" width="20" height="20" class="pr-1"></a>

            @else
                <a href="#loginModal" data-toggle="modal" class="mx-1 mx-xl-3">
                    <small>ورود/ثبت نام</small>
                    <img src="{{ asset('svg/user.svg') }}" class="px-1" width="35">
                </a>
            @endif
        </div>
    </div>
    <div class="show-in-mobile">
        <img onclick="openMenu()" class="mobile-menu-btn p-2" src="{{ asset('svg/menu-icon.svg') }}" width="45" alt="-">
    </div>
</header>

{{--mobile menu--}}
<div class="show-in-mobile">
    <div class="mobile-menu">
        <div class="m-header w-100 mb-3 d-flex justify-content-center align-items-center">
            <h3 class="text-white text-capitalize display-4 font-weight-lighter">behzi</h3>
        </div>
        <a href="{{ route('front.index') }}">
            <div class="col-12 p-3">
                <i><svg width="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" style="enable-background:new 0 0 100 100" xml:space="preserve"><g><path d="M55.1,10c-2.9-2.6-7.2-2.6-10.1,0L12.8,39.3c-0.3,0.3-0.5,0.7-0.5,1.1v43c0,4.7,3.8,8.5,8.5,8.5H39c0.8,0,1.5-0.7,1.5-1.5   V62.9h19v27.5c0,0.8,0.7,1.5,1.5,1.5h18.2c4.7,0,8.5-3.8,8.5-8.5v-43c0-0.4-0.2-0.8-0.5-1.1L55.1,10z"/></g></svg></i>
                <span class="pr-1 text-dark">خانه</span>
            </div>
        </a>
        <a href="">
            <div class="col-12 p-3">
                <i><svg width="20" xmlns:x="http://ns.adobe.com/Extensibility/1.0/" xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/" xmlns:graph="http://ns.adobe.com/Graphs/1.0/" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" style="enable-background:new 0 0 100 100;" xml:space="preserve"><switch><foreignObject requiredExtensions="http://ns.adobe.com/AdobeIllustrator/10.0/" x="0" y="0" width="1" height="1"/><g i:extraneous="self"><g><path d="M5273.1,2400.1v-2c0-2.8-5-4-9.7-4s-9.7,1.3-9.7,4v2c0,1.8,0.7,3.6,2,4.9l5,4.9c0.3,0.3,0.4,0.6,0.4,1v6.4     c0,0.4,0.2,0.7,0.6,0.8l2.9,0.9c0.5,0.1,1-0.2,1-0.8v-7.2c0-0.4,0.2-0.7,0.4-1l5.1-5C5272.4,2403.7,5273.1,2401.9,5273.1,2400.1z      M5263.4,2400c-4.8,0-7.4-1.3-7.5-1.8v0c0.1-0.5,2.7-1.8,7.5-1.8c4.8,0,7.3,1.3,7.5,1.8C5270.7,2398.7,5268.2,2400,5263.4,2400z"/><path d="M5268.4,2410.3c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1c0-0.6-0.4-1-1-1H5268.4z"/><path d="M5272.7,2413.7h-4.3c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1C5273.7,2414.1,5273.3,2413.7,5272.7,2413.7z"/><path d="M5272.7,2417h-4.3c-0.6,0-1,0.4-1,1c0,0.6,0.4,1,1,1h4.3c0.6,0,1-0.4,1-1C5273.7,2417.5,5273.3,2417,5272.7,2417z"/></g><g><path d="M96.2,89.7L76.3,69.8c5.7-7.1,9.1-16.1,9.1-25.9C85.4,21.1,66.8,2.5,44,2.5S2.5,21.1,2.5,44S21.1,85.4,44,85.4     c9.8,0,18.8-3.4,25.9-9.1l19.8,19.8c0.9,0.9,2.1,1.3,3.2,1.3s2.3-0.4,3.2-1.3C97.9,94.4,97.9,91.5,96.2,89.7z M11.7,44     c0-17.8,14.5-32.3,32.3-32.3S76.3,26.2,76.3,44S61.8,76.3,44,76.3S11.7,61.8,11.7,44z"/><path d="M50.7,46.2c0,2.7-2.2,4.9-4.9,4.9h-3.5c-2.7,0-4.9-2.2-4.9-4.9v-0.2c-4.6-0.5-8.9-1.4-12.7-2.7v11.8c0,2.5,2,4.5,4.5,4.5     h29.7c2.5,0,4.5-2,4.5-4.5V43.3c-3.7,1.3-8,2.2-12.6,2.7V46.2z"/><path d="M58.8,30.6H53v-2.5c0-3.1-2.5-5.6-5.6-5.6h-6.8c-3.1,0-5.6,2.6-5.6,5.6v2.5h-5.8c-2.5,0-4.5,2-4.5,4.5v4.2     c3.7,1.4,8,2.4,12.7,2.9c0.2-2.5,2.3-4.5,4.9-4.5h3.5c2.6,0,4.7,2,4.9,4.5c4.7-0.5,9-1.5,12.7-2.9v-4.2     C63.3,32.6,61.3,30.6,58.8,30.6z M48.5,30.6h-9.1v-2.5c0-0.6,0.5-1.1,1.1-1.1h6.8c0.6,0,1.1,0.5,1.1,1.1V30.6z"/><path d="M45.8,47.4c0.7,0,1.2-0.5,1.2-1.2v-3.5c0-0.7-0.5-1.2-1.2-1.2h-3.5c-0.7,0-1.2,0.5-1.2,1.2v3.5c0,0.7,0.5,1.2,1.2,1.2     H45.8z"/></g></g></switch><text x="0" y="115" fill="#000000" font-size="5px" font-weight="bold" font-family="'Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif">Created by Adrien Coquet</text><text x="0" y="120" fill="#000000" font-size="5px" font-weight="bold" font-family="'Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif">from the Noun Project</text></svg></i>
                <span class="pr-1 text-dark">مشاغل</span>
            </div>
        </a>
        <a href="/about-us">
            <div class="col-12 p-3">
                <i><svg width="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 128 160" enable-background="new 0 0 128 128" xml:space="preserve"><path d="M109.553,6h-5.088c0.012,0.203,0.028,0.403,0.028,0.61c0,1.184-0.177,2.319-0.493,3.39h5.553  c3.055,0,5.447,2.406,5.447,5.477v102.957c0,3.069-2.443,5.566-5.447,5.566H30.448c-3.004,0-5.448-2.497-5.448-5.566V15.477  C25,12.406,27.394,10,30.448,10h48.755C79.068,9.289,79,8.546,79,7.777C79,7.173,79.063,6.583,79.157,6H30.448  C25.229,6,21,10.193,21,15.477v102.957c0,5.283,4.229,9.566,9.448,9.566h79.104c5.218,0,9.447-4.283,9.447-9.566V15.477  C119,10.193,114.771,6,109.553,6z"/><path d="M76.648,31.461c0.68-1.747-0.209-2.775-0.965-2.622c-3.496,0.711-5.623,5.347-7.357,5.347c-0.68,0-1.26-0.683-1.26-1.265  c0-1.751,1.66-2.721,2.914-3.986c3.865-3.693,8.891-6.514,14.498-6.514c4.152,0,8.602,2.528,5.119,11.961L69.257,88.473  c-0.58,1.457-1.642,3.892-1.642,5.445c0,0.68,0.384,1.359,1.16,1.359c2.896,0,4.916-4.668,6.271-4.668  c0.483,0,1.155,0.584,1.155,1.459c0,2.815-8.009,11.279-17.771,11.279c-3.479,0-5.896-1.65-5.896-5.348  c0-4.667,3.287-12.641,3.963-14.294L76.648,31.461z M84.574,7.777C84.574,3.499,88.245,0,92.498,0c3.865,0,6.669,2.623,6.669,6.61  c0,4.474-3.672,7.779-8.021,7.779C87.184,14.389,84.574,11.763,84.574,7.777z"/><path d="M106,30H95.833c-0.126,1.25-0.409,2.587-0.833,4h11c1.104,0,2-0.896,2-2S107.104,30,106,30z"/><path d="M62,32.921c0-1.132,0.278-2.094,0.686-2.921H34c-1.104,0-2,0.896-2,2s0.896,2,2,2h28.12C62.044,33.65,62,33.29,62,32.921z"/><path d="M66,44H34c-1.104,0-2,0.896-2,2s0.896,2,2,2h30.458L66,44z"/><path d="M106,44H91.505L90,48h16c1.104,0,2-0.896,2-2S107.104,44,106,44z"/><path d="M61,58H34c-1.104,0-2,0.896-2,2s0.896,2,2,2h25.458L61,58z"/><path d="M106,58H86l-1.504,4H106c1.104,0,2-0.896,2-2S107.104,58,106,58z"/><path d="M106,72H81l-1.504,4H106c1.104,0,2-0.896,2-2S107.104,72,106,72z"/><path d="M55.542,72H34c-1.104,0-2,0.896-2,2s0.896,2,2,2h20L55.542,72z"/><path d="M50,86H34c-1.104,0-2,0.896-2,2s0.896,2,2,2h14.667C49.04,88.75,49.485,87.415,50,86z"/><path d="M106,86H75.657L75.4,86.684c0.269-0.048,0.55-0.074,0.846-0.074c2.107,0,3.967,1.424,4.754,3.393h25c1.104,0,2-0.896,2-2  S107.104,86,106,86z"/><path d="M47.213,100H34c-1.104,0-2,0.896-2,2s0.896,2,2,2h15C48.106,102.895,47.492,101.55,47.213,100z"/><path d="M106,100H77c-1.518,1.457-3.35,2.837-5.396,4H106c1.104,0,2-0.896,2-2S107.104,100,106,100z"/></svg></i>
                <span class="pr-1 text-dark">درباره ما</span>
            </div>
        </a>
        <a href="/contact-us">
            <div class="col-12 p-3">
                <i><svg width="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path d="M84.5,15.5c-19.1-19.1-50-19.1-69.1,0c-19.1,19.1-19.1,50,0,69.1s50,19.1,69.1,0C103.6,65.5,103.6,34.5,84.5,15.5z   M77.2,72.4c-0.1,0.1-0.2,0.3-0.3,0.4c-0.9,0.9-2.2,1.5-3.5,1.6c-1.5,0.1-3-0.5-4.1-1.6l-4.7-4.7c0,0,0-0.1-0.1-0.1  c-1.1,0.6-2.2,0.9-3.6,0.8c-2.7-0.2-5.2-1.1-7.7-2.3c-5.4-2.6-10.1-6.3-14-11c-2.9-3.5-5.3-7.1-6.8-11.4c-0.8-2-1.3-4.2-1.1-6.3  c0.1-1.3,0.6-2.5,1.6-3.5c1.1-1.1,2.1-2.1,3.2-3.2c1.4-1.3,3.2-1.3,4.5,0c0.9,0.8,1.7,1.7,2.6,2.6c0.8,0.8,1.6,1.6,2.5,2.5  c1.5,1.5,1.5,3.2,0,4.6c-1.1,1.1-2,2.1-3.2,3.1c-0.3,0.3-0.3,0.5-0.2,0.8c0.7,1.7,1.7,3.2,2.8,4.6c2.3,2.8,4.9,5.3,7.9,7.2  c0.6,0.4,1.4,0.7,2,1.1c0.4,0.2,0.6,0.1,0.9-0.2c1.1-1.1,2.1-2.1,3.2-3.2c1.4-1.4,3.2-1.4,4.5,0c1.7,1.7,3.4,3.4,5.1,5.1  c1.4,1.4,1.4,3.2,0,4.6c-0.2,0.2-0.3,0.4-0.5,0.5l4.7,4.7c0.1,0.1,0.2,0.1,0.3,0.1c0.1,0,0.2,0,0.2-0.1c10.2-12.3,8.9-30.4-2.8-41.3  c-11.5-10.6-29.4-10.6-40.9,0c-6.1,5.6-9.5,13.3-9.7,21.5c-0.2,8.3,3,16,8.8,21.9c8.3,8.3,20.8,11,31.8,6.9c1.3-0.5,2.8,0.2,3.3,1.5  c0.5,1.3-0.2,2.8-1.5,3.3c-12.9,4.8-27.4,1.6-37.1-8.1C18.3,68.1,14.7,59,14.9,49.4c0.2-9.6,4.2-18.6,11.3-25.2  c13.4-12.4,34.4-12.4,47.8,0C87.6,36.9,89.1,58.1,77.2,72.4z"/><text x="0" y="115" fill="#000000" font-size="5px" font-weight="bold" font-family="'Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif">Created by Gregor Cresnar</text><text x="0" y="120" fill="#000000" font-size="5px" font-weight="bold" font-family="'Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif">from the Noun Project</text></svg></i>
                <span class="pr-1 text-dark">تماس با ما</span>
            </div>
        </a>
        <hr>
        @if(Auth::check())
            <a href="{{ route('userPanel.index') }}">
                <div class="pr-3 mb-3">
                    <img src="{{ asset('svg/user.svg') }}" class="px-1" width="35">
                    <span class="pr-1 text-dark">مشاهده پنل مدیریت</span>
                </div>
            </a>
            <a href="{{ route('userPanel.logout') }}">
                <div class="pr-3">
                    <img src="{{ asset('svg/logout.svg') }}" class="pl-1" width="27">
                    <span class="pr-1 text-dark">خروج</span>
                </div>
            </a>
        @else
            <a onclick="showLoginModal()">
                <div class="pr-3">
                    <img src="{{ asset('svg/user.svg') }}" class="px-1" width="35">
                    <span class="pr-1 text-dark">ورود/ثبت نام</span>
                </div>
            </a>
        @endif

    </div>
</div>

<!-- Modal -->
<div class="modal fade fade-up" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0 rounded">
            <div class="modal-body p-0 text-center">
                <div class="close-modal pointer p-1 p-md-3 text-light" data-dismiss="modal">× بستن</div>
                <div class="w-100 text-center">
                    <img src="{{ asset('images/static/lock.png') }}" class="rounded-top-14" width="100%">
                </div>
                <login-form-modal loading-gif="{{ asset('images/static/load.gif') }}"
                                  register-route="{{ route('userPanel.register') }}"
                                  login-route="{{ route('userPanel.login') }}"
                                  index-route="{{ request()->fullUrl() }}"
                                  search-city-route="{{ route('front.ajax.citySearch') }}"
                                  set-city-route="{{ route('userPanel.setCity') }}"></login-form-modal>
            </div>
        </div>
    </div>
</div>
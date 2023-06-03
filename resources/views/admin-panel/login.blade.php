
<html lang="fa" dir="rtl">
<!--begin::Head-->
<head><base href="../../../">
    <meta charset="utf-8" />
    <title>Metronic | Login Page 1</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('cp/admin-assets/css/pages/users/login-1.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('cp/admin-assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cp/admin-assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cp/admin-assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('cp/admin-assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cp/admin-assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cp/admin-assets/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cp/admin-assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <style>
        @font-face {
            font-family: "Vazir";
            src: url('{{ asset('cp/assets/fonts/vazir/Vazir.woff') }}');
            src: url('{{ asset('cp/assets/fonts/vazir/Vazir.eot?#iefix') }}') format('FontName-opentype'),
            url('{{ asset('cp/assets/fonts/vazir/Vazir.woff') }}') format('woff'),
            url('{{ asset('cp/assets/fonts/vazir/Vazir.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('cp/assets/css/custom.css') }}">
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside d-flex flex-row-auto text-center bgi-size-cover bgi-no-repeat p-10 p-lg-10" style="background-image: url('{{ asset('cp/admin-assets/media/bg/bg-4.jpg') }}');">
            <!--begin: Aside Container-->
            <div class="d-flex flex-row-fluid flex-column justify-content-between">
                <!--begin: Aside content-->
                <div class="flex-column-fluid d-flex flex-column justify-content-center">
                    <h3 class="font-size-h1 mb-5 text-white">Welcome to Behzi</h3>
                    <p class="font-weight-lighter text-white opacity-80">پنل مدیریتی سامانه جامع اطلاعات مشاغل بهزی</p>
                </div>
                <!--end: Aside content-->
                <!--begin: Aside footer for desktop-->
                <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                    <div class="opacity-70 font-weight-bold text-white">2020 © copyright</div>
                </div>
                <!--end: Aside footer for desktop-->
            </div>
            <!--end: Aside Container-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="flex-row-fluid d-flex flex-column position-relative p-7 overflow-hidden">
            <!--begin::Content body-->
            <div class="text-center text-md-left">
                <img src="{{ asset('cp/admin-assets/media/logos/logo-letter-1.png') }}" alt="">
            </div>
            <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
                <!--begin::Signin-->
                <div class="login-form login-signin">
                        <div class="text-center mb-10 mb-lg-20">
                            <h3 class="display-4">ورود</h3>
                            <p class="text-muted font-weight-bold">ایمیل و رمزعبور خود را وارد کنید</p>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('adminPanel.login') }}" method="POST" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="email" name="email" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password" name="password" autocomplete="off" />
                            </div>
                            <!--begin::Action-->
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                <a href="#" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">رمز عبور خود را فراموش کرده اید؟</a>
                                <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">ورود</button>
                            </div>
                            <!--end::Action-->
                        </form>
                        <!--end::Form-->
                    </div>

                <!--end::Signin-->
                <!--begin::Forgot-->
{{--                <div class="login-form login-forgot">--}}
{{--                    <div class="text-center mb-10 mb-lg-20">--}}
{{--                        <h3 class="font-size-h1">Forgotten Password ?</h3>--}}
{{--                        <p class="text-muted font-weight-bold">Enter your email to reset your password</p>--}}
{{--                    </div>--}}
{{--                    <!--begin::Form-->--}}
{{--                    <form class="form" novalidate="novalidate">--}}
{{--                        <div class="form-group">--}}
{{--                            <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" autocomplete="off" />--}}
{{--                        </div>--}}
{{--                        <div class="form-group d-flex flex-wrap flex-center">--}}
{{--                            <button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>--}}
{{--                            <button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancel</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <!--end::Form-->--}}
{{--                </div>--}}
                <!--end::Forgot-->
            </div>
            <!--end::Content body-->
            <!--begin::Content footer for mobile-->
            <div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
                <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">2020 © copyright</div>
            </div>
            <!--end::Content footer for mobile-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('cp.admin-assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('cp.admin-assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('cp.admin-assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('cp/admin-assets/js/pages/custom/login/login.js') }}"></script>
<!--end::Page Scripts-->
</body>
<!--end::Body-->
</html>
<html direction="rtl" dir="rtl" style="direction: rtl" >
<!--begin::Head-->
<head><base href="../../../">
    <meta charset="utf-8" />
    <title>ورود به پنل مشاغل</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('cp/assets/css/pages/users/login-2.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('cp/assets/plugins/global/plugins.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cp/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('cp/assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ asset('cp/assets/media/logos/favicon.ico') }}" />
    <style type="text/css">
        @font-face {
            font-family: "Vazir";
            src: url('{{ asset('cp/assets/fonts/vazir/Vazir.woff') }}');
            src: url('{{ asset('cp/assets/fonts/vazir/Vazir.eot?#iefix') }}') format('FontName-opentype'),
            url('{{ asset('cp/assets/fonts/vazir/Vazir.woff') }}') format('woff'),
            url('{{ asset('cp/assets/fonts/vazir/Vazir.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        body
        {
            font-family: Vazir; !important;
        }
        #underline{
            border-bottom: 1px dashed white;
        }
        .login-form #loading{
            display:none !important
        }
    </style>

{{--    <link rel="stylesheet" type="text/css" href="https://static.neshan.org/api/web/v1/openlayers/v4.6.5.css">--}}
{{--    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>--}}
{{--    <script type="text/javascript" src="https://static.neshan.org/api/web/v1/openlayers/v4.6.5.js"></script>--}}
    <link href="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.css" rel="stylesheet" type="text/css">
    <script src="https://static.neshan.org/sdk/leaflet/1.4.0/leaflet.js" type="text/javascript"></script>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" style="background-image: url({{ asset('cp/assets/media/bg/bg-10.jpg') }})" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root" id="app">
    <!--begin::Login-->
    <div class="login login-signin-on login-2 d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{ asset('cp/assets/media/bg/bg-1.jpg') }});">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                <!--begin::Login Header-->
                <div class="d-flex flex-center mb-15">
                    <a href="#">
                        <img src="{{ asset('cp/assets/media/logos/logo-letter-9.png') }}" class="max-h-100px" alt="" />
                    </a>
                </div>
{{--                <example-component></example-component>--}}
                <!--end::Login Header-->
                <!--begin::Login Sign in form-->
{{--                <div class="login-signin">--}}
{{--                    <div class="mb-20">--}}
{{--                        <h3>ورود به مشاغل</h3>--}}
{{--                        <p class="opacity-60 font-weight-bold">شماره موبایل خود را وارد کنید.</p>--}}
{{--                    </div>--}}
{{--                    <form class="form" action="{{ route('userPanel.login') }}" method="POST">--}}
{{--                        {{ csrf_field() }}--}}
{{--                        <div class="form-group">--}}
{{--                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="text" placeholder="شماره موبایل ..." name="mobile" autocomplete="off" />--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="Password" name="password" />--}}
{{--                        </div>--}}
{{--                        <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">--}}
{{--                            <label class="checkbox checkbox-outline checkbox-white text-white m-0">--}}
{{--                                <input type="checkbox" name="remember" />Remember me--}}
{{--                                <span></span></label>--}}
{{--                            <a href="javascript:;" id="kt_login_forgot" class="text-white font-weight-bold">Forget Password ?</a>--}}
{{--                        </div>--}}
{{--                        <div class="form-group text-center mt-10">--}}
{{--                            <button type="submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 spinner spinner-darker-primary spinner-right">تایید</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <div class="mt-10">--}}
{{--                        <span class="opacity-70 mr-4">قوانین و مقررات را قبول دارم.</span>--}}
{{--                        <a href="javascript:;" id="kt_login_signup" class="text-white font-weight-bold">Sign Up</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <login-form register-route="{{ route('userPanel.register') }}" login-route="{{ route('userPanel.login') }}" index-route="{{ route('userPanel.index') }}"></login-form>
                <!--end::Login Sign in form-->
                <!--begin::Login Sign up form-->
{{--                <div id="map" style="width: 400px; height: 400px; background: #eee; border: 2px solid #aaa;"></div>--}}
                <div class="login-signup">
                    <div class="mb-20">
                        <h3>Sign Up</h3>
                        <p class="opacity-60">Enter your details to create your account</p>
                    </div>
                    <form class="form text-center">
                        <div class="form-group">
                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Fullname" name="fullname" />
                        </div>
                        <div class="form-group">
                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Password" name="password" />
                        </div>
                        <div class="form-group">
                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="password" placeholder="Confirm Password" name="rpassword" />
                        </div>
                        <div class="form-group text-left px-8">
                            <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                                <input type="checkbox" name="agree" />I Agree the
                                <a href="#" class="text-white font-weight-bold">terms and conditions</a>.
                                <span></span></label>
                            <div class="form-text text-muted text-center"></div>
                        </div>
                        <div class="form-group">
                            <button id="kt_login_signup_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Sign Up</button>
                            <button id="kt_login_signup_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
                        </div>
                    </form>
                </div>
                <!--end::Login Sign up form-->
                <!--begin::Login forgot password form-->
                <div class="login-forgot">
                    <div class="mb-20">
                        <h3>Forgotten Password ?</h3>
                        <p class="opacity-60">Enter your email to reset your password</p>
                    </div>
                    <form class="form">
                        <div class="form-group mb-10">
                            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <button id="kt_login_forgot_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Request</button>
                            <button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</button>
                        </div>
                    </form>
                </div>
                <!--end::Login forgot password form-->
            </div>
        </div>
    </div>
    <!--end::Login-->
</div>
<script>
    window.Laravel = {};
    window.url = '{{ url('/') }}';
    window.Laravel.Auth = '{{ Auth::check() }}' == '' ? false : true;
    window.Laravel.csrfToken = '{{ csrf_token() }}';
</script>
<!--end::Main-->
<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script src="{{ asset('js/app.js') }}"></script>
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('cp/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('cp/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('cp/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('cp/assets/js/pages/custom/login/login.js') }}"></script>
<!--end::Page Scripts-->
<script>
    let myMap = new L.Map('map', {
        // editable: false,
        key: 'web.hQb9alf6jbjwF3RNFmohk0TzqkfnXutekFov0DBj',
        maptype: 'dreamy',
        poi: true,
        traffic: false,
        center: [35.699739, 51.338097],
        zoom: 14
    });
    let marker = L.marker([35.699739, 51.338097]).addTo(myMap);
    let circle = L.circle([35.699739, 51.338097], {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5,
        radius: 500
    }).addTo(myMap);
    marker.bindPopup("<b>سلام</b><br>اینجا مغازه منه،گل").openPopup();

    let popup = L.popup();

    // function onMapClick(e) {
    //     popup
    //         .setLatLng(e.latlng)
    //         .setContent("You clicked the map at " + e.latlng.toString())
    //         .openOn(myMap);
    //     console.log(e.latlng)
    // }
    //
    // myMap.on('click', onMapClick);
    function onMapClick(e) {

        let marker = L.marker(e.latlng, {
            draggable: true,
            title: "Resource location",
            alt: "Resource Location",
            riseOnHover: true
        }).addTo(myMap)
            .bindPopup(e.latlng.toString()).openPopup();

        // Update marker on changing it's position
        marker.on("dragend", function(ev) {

            let chagedPos = ev.target.getLatLng();
            this.bindPopup(chagedPos.toString()).openPopup();

        });
        getFeaturesInView();
    }

    myMap.on('click', onMapClick);
    function getFeaturesInView() {
        let features = [];
        myMap.eachLayer( function(layer) {
            if(layer instanceof L.Marker) {
                if(myMap.getBounds().contains(layer.getLatLng())) {
                    console.log(layer.getLatLng());
                    features.push(layer.feature);
                }
            }
        });
        // return features;
        console.log(features);
    }
        // navigator.geolocation.getCurrentPosition(function(location) {
        //     let latlng = new L.LatLng(location.coords.latitude, location.coords.longitude);
        //     console.log(latlng);
        // });
    navigator.geolocation.getCurrentPosition(getCoor, errorCoor, {maximumAge:60000, timeout:5000, enableHighAccuracy:true});

    function getCoor(position) {
        let lat = position.coords.latitude;
        let long = position.coords.longitude;
        alert('lat : '+lat+" , lng : "+long);
    }
    function errorCoor(e) {
        console.log(e.message);
    }
</script>
</body>
<!--end::Body-->
</html>
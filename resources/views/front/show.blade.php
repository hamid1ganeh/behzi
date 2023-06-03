@extends('front.layouts.main')

@section('content')
    @push('css')
        <style>
            .blur-bg:before {
                background: url('/images/pic.png');
                background-size: cover;
                background-position: center;
            }
        </style>
    @endpush
    @include('front.layouts.header')
    {{--End header--}}
    <div class="border-specifier bg-white"></div>
    <div class="w-100 blur-bg">
        <div class="col-12 row mx-0 text-right head-title-container parent-height">
            <div class="col-md-9 text-white pr-md-5 my-auto">
                <div>
                    <h1>سوپرمارکت آرش</h1>
                    <span class="pr-md-4">آرش حمیدی</span>
                </div>
            </div>
            <div class="col-md-3 text-left pb-3 mt-auto">
                <small class="text-light">امتیاز ۳ از ۵</small>
                <hr class="my-1 border-bottom-0 border-light">
                <div>
                    <img src="{{ asset('images/static/star.svg') }}" width="30" height="30">
                    <img src="{{ asset('images/static/star.svg') }}" width="30" height="30">
                    <img src="{{ asset('images/static/star.svg') }}" width="30" height="30">
                </div>
            </div>
        </div>
    </div>
    <div class="main-container col-12 row mx-0 px-0 px-md-3">
        <div class="col-lg-3 py-4">
            <div class="right-col shadow-sm text-center bg-white">
                <div class="card-poster-holder" style="background-image: url('/images/thumbnail.png')"></div>
                <h2 class="h3 pt-4">سوپر مارکت آرش</h2>
                <div>به مدیریت آرش حمیدی</div>
                <small class="text-muted d-block pb-3">خوار و بار فروشی</small>
                <div class="pb-3 pt-1 border-bottom">
                    <a href=""><img src="{{ asset('images/static/insta.png') }}" width="38" class="mx-1"></a>
                    <a href=""><img src="{{ asset('images/static/tw.png') }}" width="38" class="mx-1"></a>
                    <a href=""><img src="{{ asset('images/static/wa.png') }}" width="38" class="mx-1"></a>
                    <a href=""><img src="{{ asset('images/static/facebook.png') }}" width="38" class="mx-1"></a>
                </div>
                <div class="py-4 text-muted border-bottom">
                    <div class="col-12 pb-2"><img src="{{ asset('images/static/phone.png') }}" width="20" class="pl-1"> ۰۹۸۹۶۸۵۶۵۱۲</div>
                    <div class="col-12"><img src="{{ asset('images/static/email.png') }}" width="25" class="pl-1"> supermarket@gmail.com </div>
                </div>
                <a href="">
                    <div class="col-12 text-secondary bg-light py-2 border-bottom">دانلود گواهی کسب با فرمت PDF</div>
                </a>
                <div class="col-12 py-3 about-us">
                    <div class="font-large pb-2">درباره ی ما</div>
                    <p class="px-3 text-muted mb-3">سوپر مارکت آرش با بیش از ۱۲ سال سابقه واعتبار واقع در منطقه ۸ تهران آماده ی ارائه ی خدمات به همشهریان عزیز میباشد این سوپر مارکت جهت رفاه حال مشتریان عزیز از نسیه شما قبول میکند</p>
                    <a href="" class="more px-5 pt-1">ادامه مطلب</a>
                </div>

            </div>
        </div>
        <div class="col-lg-7 pl-lg-5 ">
            <div class="w-100 shadow-sm mt-4 p-2">
                <div class="col-12 pt-2 px-0 row mx-0 px-0 px-md-3">
                    <div class="col-2 col-md-1 px-0">
                        <img src="{{ asset('images/static/gallery.svg') }}" width="32" height="24" alt="Gallery">
                    </div>
                    <h2 class="h4 col px-0 mb-0 my-auto">گالری تصاویر</h2>
                    <div class="col-3 text-left px-1 px-md-3">
                        <span class="btn-circle bg-light px-3 border py-1 small d-block d-md-inline text-center">۱۱ مورد</span>
                    </div>
                </div>
                <hr class="mb-0">
                <div class="col-12 row mx-0 pt-3">
                    {{-- Loop starts from here--}}
                    <div class="col-6 col-md-4 pb-3">
                        <a href="/gallery">
                            <div class="position-relative gallery-hover-animation">
                                <img src="{{ asset('images/store.jpg') }}" class="img-fluid">
                                <div class="col text-center category-title text-white">نمای خارجی سوپرمارکت</div>
                            </div>
                        </a>
                    </div>
                    {{--***--}}
                    <div class="col-6 col-md-4 pb-3">
                        <a href="/gallery">
                            <div class="position-relative gallery-hover-animation">
                                <img src="{{ asset('images/thumbnail.png') }}" class="img-fluid">
                                <div class="col text-center category-title text-white">نمای داخلی سوپرمارکت</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 pb-3">
                        <a href="/gallery">
                            <div class="position-relative gallery-hover-animation">
                                <img src="{{ asset('images/instore.png') }}" class="img-fluid">
                                <div class="col text-center category-title text-white">جشنواره ی تابستانه</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 pb-3">
                        <a href="/gallery">
                            <div class="position-relative gallery-hover-animation">
                                <img src="{{ asset('images/thumbnail.png') }}" class="img-fluid">
                                <div class="col text-center category-title text-white">افتتاحیه</div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="w-100 my-4" align="center">
                    <div class="col-9 col-sm-8 col-xl-4 row mx-0 px-0 border pagination shadow-sm">

                        <div class="col py-2"><img src="{{ asset('images/static/chevron-right.png') }}" width="8"></div>

                        <div class="col py-2 active">۱</div>

                        <div class="col py-2">۲</div>

                        <div class="col py-2">۳</div>

                        <div class="col py-2">...</div>

                        <div class="col py-2"><img src="{{ asset('images/static/chevron-left.png') }}" width="8" alt=""></div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 pr-lg-0 left-col py-3">
            <h4 class="h5 pt-3 pb-2">ساعت کاری</h4>
            <div>
                <div class="col-12 px-0 row mx-0 pb-2">
                    <div class="days-name py-1 col-2 px-0 active">شنبه</div>
                    <div class="col pl-0 pr-2">
                        <div class="open-hours py-1">۵ صبح الی ۱۳ </div>
                    </div>
                </div>
                <div class="col-12 px-0 row mx-0 pb-2">
                    <div class="days-name py-1 col-2 px-0">یک شنبه</div>
                    <div class="col pl-0 pr-2">
                        <div class="open-hours py-1">بسته</div>
                    </div>
                </div>
                <div class="col-12 px-0 row mx-0 pb-2">
                    <div class="days-name py-1 col-2 px-0 active">دو شنبه</div>
                    <div class="col pl-0 pr-2">
                        <div class="open-hours py-1">۵ صبح الی ۱۳ </div>
                    </div>
                </div>
                <div class="col-12 px-0 row mx-0 pb-2">
                    <div class="days-name py-1 col-2 px-0 active">سه شنبه</div>
                    <div class="col pl-0 pr-2">
                        <div class="open-hours py-1 first-half">۵ الی ۱۳ </div>
                    </div>
                    <div class="col pl-0 pr-2">
                        <div class="open-hours py-1 sec-half">۱۳ الی ۱۵ </div>
                    </div>
                </div>
                <div class="col-12 px-0 row mx-0 pb-2">
                    <div class="days-name py-1 col-2 px-0 active">چهار شنبه</div>
                    <div class="col pl-0 pr-2">
                        <div class="open-hours py-1">۵ صبح الی ۱۳ </div>
                    </div>
                </div>
                <div class="col-12 px-0 row mx-0 pb-2">
                    <div class="days-name py-1 col-2 px-0 active">پنج شنبه</div>
                    <div class="col pl-0 pr-2">
                        <div class="open-hours py-1">۵ صبح الی ۱۳ </div>
                    </div>
                </div>
                <div class="col-12 px-0 row mx-0 pb-2">
                    <div class="days-name py-1 col-2 px-0">جمعه</div>
                    <div class="col pl-0 pr-2">
                        <div class="open-hours py-1">بسته</div>
                    </div>
                </div>
            </div>
            <h4 class="h5 pt-4 pb-2">موقعیت مکانی</h4>
            <div class="w-100 text-center bg-white shadow-sm location">
{{--                <iframe class="shadow-sm" src="https://www.google.com/maps/d/embed?mid=1mK0lMV_LTb1pErWQIaeLj2V6XOGzup0l&hl=en" width="100%" height="200"></iframe>--}}
                <div class="small address text-muted pt-1 pb-2 px-2">تهران ، میدان آرژانتین ، رو به رو بانک رفاه</div>
            </div>
        </div>
    </div>

@stop
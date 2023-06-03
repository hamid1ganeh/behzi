@extends('front.layouts.main')

@section('content')
    <section data-section-name="Enterance" class="section gate my-auto d-flex">
        <div class="col-12 row mx-0">
            <div class="col-lg-5 d-flex align-items-center pr-xl-5 order-1 order-lg-0 px-0 px-md-3">
                <div class="w-100 pr-xl-5">
                    <h1 class="display-2 text-center text-lg-right">Behzi</h1>
                    <p class="h4 text-center text-lg-right">سامانه سراسری بانک مشاغل</p>
                    <login-form register-route="{{ route('userPanel.register') }}"
                                login-route="{{ route('userPanel.login') }}"
                                index-route="{{ route('front.index') }}"
                                search-city-route="{{ route('front.ajax.citySearch') }}"
                                set-city-route = "{{ route('userPanel.setCity') }}"
                                user-panel-route="{{ route('userPanel.index') }}"
                                pages-route="{{ route('front.pages.index') }}"/>
                </div>
            </div>
            <div class="col-lg-7 my-auto px-0 order-0 order-lg-1 pl-lg-5 pr-lg-3">
                @include('front.includes.landing')
            </div>
        </div>
    </section>
    <section data-section-name="Search" class="section search pt-4">
        <div class="col-12 text-center curved-bg">
            <img src="{{ asset('images/static/new/srch-animate.svg') }}" width="150">
            <div class="h4 text-blue">جستجوی مشاغل</div>
            <div class="text-primary mt-5 mb-3">جستجو میان بیش از 5هزار عنوان شغلی</div>
        </div>
        <div class="container">
            <form action="{{ route('front.pages.index') }}">
            <div class="col-12 row mx-0 px-0 px-md-3">
                <div class="col-12 d-flex justify-content-center">
                    <div class="col-lg-8 mb-3 mb-lg-0">
                        <input type="text" name="name" class="pr-4" placeholder="دنبال چی میگردی؟" autocomplete="off">
                    </div>
                </div>
                {{--                        <div class="col-lg-3 px-lg-0 mb-3 mb-lg-0">--}}
                {{--                            <select class="select2 py-1 w-100" name="city">--}}
                {{--                                <option disabled selected>نام استان</option>--}}
                {{--                                <option value="1">رشت</option>--}}
                {{--                            </select>--}}
                {{--                        </div>--}}
                {{--                        <div class="col-lg-3 mb-3 mb-lg-0 work_category_select">--}}
                {{--                            <select class="select2 py-1 w-100" name="work_category">--}}
                {{--                                <option disabled selected>دسته بندی</option>--}}
                {{--                                <option value="1">ورزشی</option>--}}
                {{--                            </select>--}}
                {{--                        </div>--}}
                <div class="col-12 text-center mt-5 d-flex justify-content-center">
                    <button class="btn-gradient-blue py-2 font-large col-md-3">جستجو</button>
                </div>
            </div>
            </form>

        </div>
    </section>
    <section data-section-name="Pages" class="section">
        <h2 class="h3 px-2 px-lg-5 pt-5">تاپ ترین‌ها</h2>
        <div class="col-12 mb-5 px-7">
            <div class="slider-items">
                @foreach($bestPages as $page)
                    <div class="px-md-2 px-3 pt-3 pb-4">
                        <a href="{{ route('front.pages.show', $page->slug) }}">
                            <div class="slick-item shadow rounded" style="background-image: url({{ url('storage/images/' . $page->image->name['original']) }})">
                                <div class="bg-gradient-white">
                                    <div class="h6 col-12 text-truncate text-black pt-4">
                                        <span>{{ $page->getName() }}</span>
                                    </div>
                                    <div class="small col-12 text-truncate text-muted">
                                        <span onclick="linkTo(event)" href="" class="on-hover-link">{{ $page->work_item->work_category->getName() }}</span>
                                    </div>
                                    <div class="col-12 text-truncate mt-4">
                                        <span onclick="linkTo(event)" href="{{ route('front.pages.index', ['province' => $page->address->city->province->id]) }}" class="text-info on-hover-link">{{ $page->address->province->getName() }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
            <div class="text-left">
                <a href="#" class="btn-gradient-blue px-4 py-1 mx-3">بیشتر</a>
            </div>
        </div>
        {{--    most visited    --}}
{{--        <h2 class="h3 px-2 px-lg-5 mt-5">پربازدید ترین‌ها</h2>--}}
{{--        <div class="col-12 mb-5 px-7">--}}
{{--            <div class="slider-items">--}}
{{--                <div class="px-md-2 px-3 pt-3 pb-4">--}}
{{--                    <div class="slick-item shadow rounded" style="background-image: url({{ asset('images/bg1.jpg') }})">--}}
{{--                        <div class="bg-gradient-white">--}}
{{--                            <a href="#">--}}
{{--                                <div class="h5 col-12 text-dark text-truncate pt-4">تولیدی باقری</div>--}}
{{--                            </a>--}}
{{--                            <div class="small col-12 text-truncate text-muted">لوازم تحریر</div>--}}

{{--                            <div class="col-12 text-truncate mt-4">--}}
{{--                                <a href="#" class="text-info">استان گیلان</a>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="px-2 pt-3 pb-4">--}}
{{--                    <div class="slick-item shadow rounded" style="background-image: url({{ asset('images/bg4.jpg') }})">--}}
{{--                        <div class="bg-gradient-white">--}}
{{--                            <a href="#">--}}
{{--                                <div class="h5 col-12 text-dark text-truncate pt-4">تولیدی باقری</div>--}}
{{--                            </a>--}}
{{--                            <div class="small col-12 text-truncate text-muted">لوازم تحریر</div>--}}

{{--                            <div class="col-12 text-truncate mt-4">--}}
{{--                                <a href="#" class="text-info">استان گیلان</a>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="px-2 pt-3 pb-4">--}}
{{--                    <div class="slick-item shadow rounded" style="background-image: url({{ asset('images/bg3.png') }})">--}}
{{--                        <div class="bg-gradient-white">--}}
{{--                            <a href="#">--}}
{{--                                <div class="h5 col-12 text-dark text-truncate pt-4">تولیدی باقری</div>--}}
{{--                            </a>--}}
{{--                            <div class="small col-12 text-truncate text-muted">لوازم تحریر</div>--}}

{{--                            <div class="col-12 text-truncate mt-4">--}}
{{--                                <a href="#" class="text-info">استان گیلان</a>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="px-2 pt-3 pb-4">--}}
{{--                    <div class="slick-item shadow rounded" style="background-image: url({{ asset('images/bg4.jpg') }})">--}}
{{--                        <div class="bg-gradient-white">--}}
{{--                            <a href="#">--}}
{{--                                <div class="h5 col-12 text-dark text-truncate pt-4">تولیدی باقری</div>--}}
{{--                            </a>--}}
{{--                            <div class="small col-12 text-truncate text-muted">لوازم تحریر</div>--}}

{{--                            <div class="col-12 text-truncate mt-4">--}}
{{--                                <a href="#" class="text-info">استان گیلان</a>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="px-2 pt-3 pb-4">--}}
{{--                    <div class="slick-item shadow rounded" style="background-image: url({{ asset('images/bg3.png') }})">--}}
{{--                        <div class="bg-gradient-white">--}}
{{--                            <a href="#">--}}
{{--                                <div class="h5 col-12 text-dark text-truncate pt-4">تولیدی باقری</div>--}}
{{--                            </a>--}}
{{--                            <div class="small col-12 text-truncate text-muted">لوازم تحریر</div>--}}

{{--                            <div class="col-12 text-truncate mt-4">--}}
{{--                                <a href="#" class="text-info">استان گیلان</a>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="px-2 pt-3 pb-4">--}}
{{--                    <div class="slick-item shadow rounded" style="background-image: url({{ asset('images/bg1.jpg') }})">--}}
{{--                        <div class="bg-gradient-white">--}}
{{--                            <a href="#">--}}
{{--                                <div class="h5 col-12 text-dark text-truncate pt-4">تولیدی باقری</div>--}}
{{--                            </a>--}}
{{--                            <div class="small col-12 text-truncate text-muted">لوازم تحریر</div>--}}

{{--                            <div class="col-12 text-truncate mt-4">--}}
{{--                                <a href="#" class="text-info">استان گیلان</a>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="text-left">--}}
{{--                <a href="#" class="btn-gradient-blue px-4 py-1 mx-3">بیشتر</a>--}}
{{--            </div>--}}
{{--        </div>--}}
        {{--    latest    --}}
        <h2 class="h3 px-2 px-lg-5 mt-5">جدید ترین‌ها</h2>
        <div class="col-12 mb-5 px-7">
            <div class="slider-items">
                @foreach($latestPages as $page)
                    <div class="px-md-2 px-3 pt-3 pb-4">
                        <a href="{{ route('front.pages.show', $page->slug) }}">
                            <div class="slick-item shadow rounded" style="background-image: url({{ url('storage/images/' . $page->image->name['original']) }})">
                                <div class="bg-gradient-white">
                                    <div class="h6 col-12 text-black text-truncate pt-4"><span>{{ $page->getName() }}</span></div>
                                    <div class="small col-12 text-truncate text-muted">
                                        <span onclick="linkTo(event)" href="" class="on-hover-link">{{ $page->work_item->work_category->getName() }}</span>
                                    </div>
                                    <div class="col-12 text-truncate mt-4">
                                        <span onclick="linkTo(event)" href="{{ route('front.pages.index', ['province' => $page->address->city->province->id]) }}" class="text-info on-hover-link">{{ $page->address->province->getName() }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-left">
                <a href="#" class="btn-gradient-blue px-4 py-1 mx-3">بیشتر</a>
            </div>
        </div>
    </section>
@stop

@push('js')
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/scrollify.js') }}"></script>
    <script>
        //scroll section snap
        $(document).ready(function () {
            if(window.matchMedia("(min-width: 992px)").matches){
                $.scrollify({
                    section : ".section",
                    setHeights: false
                });
            }
        });
        //slick option
        $('.slider-items').slick({
            rtl:true,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 2,
            nextArrow: `@include('front.includes.slick-next-svg')`,
            prevArrow: `@include('front.includes.slick-prev-svg')`,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        centerMode:true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false
                    }
                }
            ]
        });
    </script>
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('css/slick.min.css') }}">
    <style>
        .slick-item{
            width:100%;
            height: 143px;
            background-size: cover;
            background-position: left;
            background-repeat: no-repeat;
        }

        @media (max-width: 990px) {
            .slick-item {
                height: 122px;
            }
            h2.h3{
                font-size: 17px !important;
            }
        }
        .slick-item:hover{
            transition: all .2s;
            box-shadow: 0 4px 15px #b6b6b6 !important;
        }
        .curved-bg{
            background-image: url({{ asset('images/static/new/curved.svg') }});
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top;
        }
        .search{
            min-height: 630px;
            background-image: url("{{ asset('images/static/new/search-bg.png') }}");
            background-position: left bottom;
            background-repeat: no-repeat;
            background-size: contain;
        }
        @media (min-width: 1600px) {
            .search{
                background-size: cover;
            }
        }
        .mobile-icon{
            position: absolute;
            top: 0;
            right: 1rem;
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
        }
        .code-icon{
            position: absolute;
            top: 0;
            right: 1.5rem;
        }
        input[type="text"]:not(.default){
            height:3rem;
            padding-right: 4rem;
        }
        .bg-gradient-white{
            background:linear-gradient(to left,white, white, rgba(255, 255, 255, 0.8),transparent);
            width: 100%;
            height:inherit;
            border-radius: 12px;
        }
        .px-7{
            padding-right: 4.5rem;
            padding-left: 4.5rem;
        }
        .text-black{
            color:black
        }
        .on-hover-link:hover{
            color: #48a7ff !important;
        }
        @media (max-width: 1024px) {
            .px-7{
                padding-right: 0;
                padding-left: 0;
            }
        }
        /*select2*/
        /*.select2-container--default .select2-selection--single{*/
        /*    border-radius: 50px !important;*/
        /*    box-shadow: 0 0 5px lightgray;*/
        /*    border:none !important;*/
        /*}*/
        /*.select2-container--default .select2-selection--single .select2-selection__rendered,.select2-container .select2-selection--single{*/
        /*    line-height: 3rem;*/
        /*    height: 3rem !important;*/
        /*    text-align: right;*/
        /*}*/
        /*.select2.select2-container.select2-container--default{*/
        /*    width:100% !important;*/
        /*}*/
        /*.select2-container--default .select2-selection--single .select2-selection__arrow{*/
        /*    right:auto;*/
        /*    left:5px;*/
        /*    top: 12px !important*/
        /*}*/

    </style>
    <style>
        #eu704bvhmsf3_tr {
            animation: eu704bvhmsf3_tr__tr 20s linear infinite normal forwards
        }

        @keyframes eu704bvhmsf3_tr__tr {
            0% {
                transform: translate(310.779297px, 236.574219px) rotate(0deg)
            }
            33.333333% {
                transform: translate(310.779297px, 236.574219px) rotate(4.813204deg)
            }
            66.666667% {
                transform: translate(310.779297px, 236.574219px) rotate(-1.302696deg)
            }
            100% {
                transform: translate(310.779297px, 236.574219px) rotate(0deg)
            }
        }

        #eu704bvhmsf3_ts {
            animation: eu704bvhmsf3_ts__ts 10s linear infinite normal forwards
        }

        @keyframes eu704bvhmsf3_ts__ts {
            0% {
                transform: scale(0.926949, 0.943479)
            }
            51.111111% {
                transform: scale(0.956351, 1)
            }
            100% {
                transform: scale(0.926949, 0.943479)
            }
        }
        </style>
@endpush

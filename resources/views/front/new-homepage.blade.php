

@extends('front.layouts.main')

@section('content')
    <section class="search-container mx-0 mx-md-2 mb-4 shadow">
        @include('front.layouts.header')
        {{--End header--}}
        <div class="col-12 mt-5 pr-lg-5" style="font-family: 'iransansdn';">
            <h2 class="display-4 pb-2">جستجو مشاغل</h2>
            <div class="text-light-blue font-large pr-3">از میان بیش از ۵۰۰۰ شغل</div>
            <div class="text-light-blue font-large pr-3">در سامانه ی سراری مشاغل بهزی</div>
        </div>
        <form class="col-12 mt-5 row mx-0 pt-5 hide-in-mobile" action="{{ route('front.pages.index') }}" method="GET">

            <div class="col-6 pt-2 mt-2 px-0 pr-lg-6 position-relative search">
                <input name="text" type="text">

                <button class="btn btn-gradient-blue position-absolute pr-md-4">جستجو<img
                            src="{{ asset('svg/magnifyer-w.svg') }}" width="42" height="24" class="px-2" alt="search"></button>
                {{--<search-filter-inline subject="search-category" placeholder="دسته بندی" class="hide-in-mobile"></search-filter-inline>--}}
                {{--<search-filter-inline subject="search-province" placeholder="نام استان" class="hide-in-mobile"></search-filter-inline>--}}
                <div class="filter">
                    <select class="select2" name="work_category">
                        <option value="0">دسته</option>
                        @foreach($workCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter state">
                    <select class="select2" name="province">
                        <option value="0">استان</option>
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </form>
        <div class="col-12 row mx-0 px-0 px-md-3">
            <div class="col-lg-7 row mx-0 mt-5 pt-4 count-services">
                <div class="col-4 px-1 px-md-3">
                    <div class="text-center font-weight-bold">
                        <div class="font-very-large counter-up">5000</div>
                        <div class="h5">عنوان شغلی</div>
                    </div>
                </div>
                <div class="col-4 px-1 px-md-3">
                    <div class="text-center font-weight-bold">
                        <div class="font-very-large counter-up">104</div>
                        <div class="h5">قالب پشنهادی</div>
                    </div>
                </div>
                <div class="col-4 px-1 px-md-3">
                    <div class="text-center font-weight-bold">
                        <div class="font-very-large counter-up">6402</div>
                        <div class="h5">طرح کارت ویزیت و لوگو</div>
                    </div>
                </div>
            </div>
            <div class="col-1 hide-in-mobile"></div>
            <div class="col-lg-4 px-0 text-center">
                <img src="{{ asset('images/static/poster.png') }}" class="img-fluid" alt="poster">
            </div>
        </div>
    </section>

    <section class="col-12 pb-4 pt-3 px-0">
        <h2 class="h2 px-2 px-lg-5">برترین مشاغل</h2>
        <drag-scroll></drag-scroll>
    </section>

    <section class="col-12 row mx-0 px-0 px-md-5 py-4" id="map-section">
        <div class="col-xl-5 row mx-0 pt-3">
            <div class="col-2 px-1 mt-md-4"><img src="{{ asset('images/static/map-pointer.png') }}" class="img-fluid"
                                                 alt="pointer"></div>
            <div class="col-10 my-auto px-0 px-md-3">
                <div class="h2 pt-2 font-weight-bold">برای یافتن مشاغل هر استان</div>
                <div class="h3 text-secondary">بر روی استان کلیک کنید!</div>
            </div>
            <div class="col-12 row mx-0 my-3 mt-4 justify-content-center justify-content-lg-start px-0 px-md-3">
                <div class="col text-left px-0 px-md-3 mt-2 title">استان مورد نظر</div>
                <div class="col-7 col-md-6">
                    <select class="select2" name="map_province">
                        <option value="0" disabled selected>استان</option>
                        @foreach($provinces as $province)
                            <option value="{{ route('front.pages.index', ['province' => $province->id]) }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col co-xl-1 px-0 text-right">
                    <div class="p-1">
                        <a href="" id="province-btn" title="برو">
                            <img src="{{ asset('images/static/chevron-circle-l.png') }}">
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-1"></div>
        <div class="col-xl-5 px-2 iran-map">
            @include('front.includes.iran-map')
        </div>
    </section>

    <section class="col-12 row mx-0 services" id="services">
        <div class="col-xl-4 my-auto pr-4">
            <h2 class="font-weight-bold mt-5 mt-xl-3">با ما بیشتر دیده شوید</h2>
            <h5 class="pt-3 dastnevis" style="line-height: 2">سامانه ی مشاغل بهزی جهت بهتر دیده شدن کسب و کار شما تا انتها کنارتان
                است</h5>
        </div>
        <div class="col-xl-8 row mx-0 px-0 px-xl-5 pt-md-5 pb-3 mt-5">
            @include('front.includes.service-developing')
            @include('front.includes.service-visit-card')
            @include('front.includes.service-sms')
        </div>
    </section>

    <div class="show-in-mobile">
        <button class="btn btn-gradient-blue position-fixed btn-circle btn-floating-search"
                data-toggle="modal" data-target="#home_filter_modal"><img
                    src="{{ asset('svg/magnifyer-w.svg') }}" width="42" height="24" class="px-2" alt="search"></button>
    </div>
    <div class="modal" id="home_filter_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0">
                <div class="col-12 bg-light text-secondary text-center py-3 rounded-top">جستجو با فیلتر</div>
                <div class="col-12 pb-5">
                    <form action="{{ route('front.pages.index') }}" method="GET">
                        <div class="py-4">
                            <input type="text" class="default w-100 rounded p-1"
                                   style="height: inherit !important; border: 1px solid #aaaaaa" placeholder="عنوان جستجو...">
                        </div>
                        <div class="position-relative mb-4">
                            <select class="select2" name="work_category">
                                <option value="0">دسته</option>
                                @foreach($workCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="chevron-down d-flex justify-content-center align-items-center">@include('front.includes.chevron-d')</span>
                        </div>
                        <div class="position-relative mb-4">
                            <select class="select2 py-1 w-100" name="city">
                                <option value="0">استان</option>
                                @foreach($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            <span class="chevron-down d-flex justify-content-center align-items-center">@include('front.includes.chevron-d')</span>
                        </div>
                        <button class="btn btn-gradient-blue w-100">جستجو کردن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/counterup.min.js') }}"></script>
    <script>
        $('.select2').select2();
        /* Run bootstrap tooltip */
        $('[data-toggle="tooltip"]').tooltip();
        /* Run jquery counter */
        $('.counter-up').counterUp({ time: 1000 });
        lazyload();
    </script>
@endpush
@push('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet"/>
    <style>
        #map-section .select2-container--default .select2-selection--single{
            border-radius: 0 !important;
            background-color: #e9e9e9 !important;
        }
        #map-section .select2-container--default .select2-selection--single .select2-selection__rendered{
            line-height: 42px;
            text-align: center;
        }
        #map-section .select2.select2-container.select2-container--default{
            width:100% !important;
        }
        .search-container {
            background-image: url({{ asset("/images/static/search-banner.png") }});
        }
        .btn-floating-search{
            width:58px;
            height:58px;
            bottom:1rem;
            right: 1rem;
            z-index:2;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 10px #5987dc;
        }
        .fade-up .modal-content-max-height{
            max-height: calc(100vh - 375px);
        }
        @media(max-width: 992px){
            .fade-up .modal-dialog {
                position:fixed;
                top:auto;
                right:auto;
                left:auto;
                bottom:0;
            }
            .h2{
                font-size: 15px !important;
            }
            .fade-up .modal-content-max-height{
                max-height: 300px;
            }
            #sms-service .mt--16{
                margin-top: -16px;
            }
        }
    </style>
@endpush
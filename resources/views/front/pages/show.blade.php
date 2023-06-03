@extends('front.layouts.main')

@section('content')
    @push('css')
        <style scoped>
            .blur-bg:before {
                background-color: grey;
                background: url({{ $page->getPageImage() }});
                background-size: cover;
                background-position: center;
            }
            .pb-1-half{
                padding-bottom: 0.35rem;
            }
            .line-height-2{
                line-height: 1.8;
            }
            .user-comment-icon{
                position: absolute;
                right:6px;
                top:0;
            }

            #review_set textarea::placeholder,
            #review_set textarea::placeholder,
            #review_set textarea::-ms-input-placeholder {

            }

            @media (max-width: 768px) {
                .mapbox #mapId{
                    pointer-events: none;
                }
            }
        </style>
        <link rel="stylesheet" href="{{ asset('css/leaflet/mapbox.gl.css') }}">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
        <link rel="stylesheet"
              href="https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css">
    @endpush
    @include('front.layouts.header')
    {{--End header--}}
    <div class="border-specifier bg-white"></div>
    <div class="w-100 blur-bg">
        <div class="col-12 row mx-0 text-right head-title-container parent-height">

            <div class="col-lg-9 text-white pr-md-5 my-auto">
                <div>
                    <h1 class="pb-lg-2 pt-2 pt-lg-0 text-truncate" title="{{ $page->getName() }}">{{ $page->getName() }}</h1>

                    <span class="mr-md-4 btn-circle py-0 bg-rgba-light text-white btn-sm d-inline-block"
                          style="height:22px;min-width:70px">
                        @if($page->isOpenNow())
                            <img src="{{ asset('images/static/light-green.png') }}" width="15" class="pt-1">
                            <b class="pr-2">باز</b>
                        @else
                            <img src="{{ asset('images/static/light-grey.png') }}" width="15" class="pt-1">
                            <b class="pr-2">بسته</b>
                        @endif
                    </span>
                </div>
            </div>

            <div class="col-lg-3 text-left pb-2 mt-auto">
                <div class="mb-xl-3">
                    <span class="mr-md-4 btn-circle py-0 bg-rgba-light text-white btn-sm d-inline-block"
                          style="height: 22px; min-width: 70px;">
                        <svg width="20" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" version="1.1" x="0px" y="0px" viewBox="0 0 100 100"><g transform="translate(0,-952.36218)"><path style="text-indent:0;text-transform:none;direction:ltr;block-progression:tb;baseline-shift:baseline;color:#000000;enable-background:accumulate;" d="m 50,979.36219 c 19.255,0 36.3089,7.9974 46.1562,20.5312 a 4.0004,4.0004 0 0 1 0,4.93761 c -9.8474,12.5338 -26.9012,20.5312 -46.1562,20.5312 -19.255,0 -36.3089,-7.9974 -46.1561998,-20.5312 a 4.0004,4.0004 0 0 1 0,-4.93761 C 13.6911,987.35959 30.745,979.36219 50,979.36219 z m 1.5312,9.0938 c 1.542,1.8948 2.4688,4.3004 2.4688,6.9062 0,6.02781 -4.9722,11.00001 -11,11.00001 -2.6215,0 -5.0375,-0.9101 -6.9375,-2.4688 0.7538,7.0484 6.6761,12.4688 13.9375,12.4688 7.7793,0 14,-6.2208 14,-14 0,-7.26121 -5.4206,-13.15221 -12.4688,-13.90621 z m 16.875,1.9062 c 2.266,3.4573 3.5938,7.5794 3.5938,12.00001 0,4.4177 -1.3305,8.5441 -3.5938,12 7.7322,-2.6325 14.3609,-6.8401 19.2188,-12 -4.8594,-5.16571 -11.4828,-9.36881 -19.2188,-12.00001 z m -36.8124,0 c -7.736,2.6312 -14.3594,6.8343 -19.2188,12.00001 4.8579,5.1599 11.4866,9.3675 19.2188,12 -2.2633,-3.4559 -3.5938,-7.5823 -3.5938,-12 0,-4.42061 1.3278,-8.54271 3.5938,-12.00001 z m 11.4062,2 c -1.7042,0 -3,1.2958 -3,3 0,1.7042 1.2958,3 3,3 1.7042,0 3,-1.2958 3,-3 0,-1.7042 -1.2958,-3 -3,-3 z" fill="#282828" fill-opacity="1" stroke="none" marker="none" visibility="visible" display="inline" overflow="visible"/></g></svg>
                        <b>12 بازدید</b>
                    </span>
                </div>
                {{--Rating--}}
                <rate-panel
                            page="{{ $page->getId() }}"
                            rate="{{ $page->getRateScore() }}"
                            user-rate="{{ $page->getRateScore(true) }}"
                            save-route="{{ route('front.pages.pageRateStore',$page->slug) }}"
                            image-url="{{ url('/') }}">
                </rate-panel>
            </div>
        </div>
    </div>
    <div class="main-container col-12 row mx-0 px-0 px-md-3 min-height">

        <div class="col-lg-3 py-4">
            <div class="right-col shadow-sm text-center bg-white">
{{--                <div class="card-poster-holder"--}}
{{--                     style="background-image: url({{ $page->getPageImage('medium') }})">--}}
{{--                </div>--}}
                <div>
                    <img src="{{ $page->getPageImage('original') }}" class="w-100 rounded-top-40" alt="{{ $page->slug }}">
                </div>

                <h2 class="h5 pt-4">{{ $page->getName() }}</h2>

                {{--<div>به مدیریت آرش حمیدی</div>--}}

                <small class="text-muted d-block pb-3">
                    {{ $page->work_item->getName() }}
                </small>

                <div class="py-4 text-muted border-bottom border-top">
                    <div class="font-large pb-2">درباره ی ما</div>
                    <p class="px-3 px-lg-4 text-muted mb-3 text-justify line-height-2">{{ $page->getDescription() }}</p>
                    {{--<a href="" class="more px-5 pt-1">ادامه مطلب</a>--}}

                </div>

                {{--<a href="">--}}
                {{--    <div class="col-12 text-secondary bg-light py-2 border-bottom">دانلود گواهی کسب با فرمت PDF</div>--}}
                {{--</a>--}}

                <div class="col-12 py-3 about-us">
                    <div class="pb-3 pt-1 border-bottom">
                        @if($page->getConnectionValue(\App\Enums\PageConnectionType::Telegram))
                            <a href="https://t.me/{{ $page->getConnectionValue(\App\Enums\PageConnectionType::Telegram) }}" target="_blank">
                                <img src="{{ asset('images/static/telegram.png') }}" width="38" class="mx-1" alt="">
                            </a>
                        @endif
                        @if($page->getConnectionValue(\App\Enums\PageConnectionType::Instagram))
                            <a href="https://instagram.com/{{ $page->getConnectionValue(\App\Enums\PageConnectionType::Instagram) }}" target="_blank">
                                <img src="{{ asset('images/static/insta.png') }}" width="38" class="mx-1" alt="">
                            </a>
                        @endif
                        @if($page->getConnectionValue(\App\Enums\PageConnectionType::Twitter))
                            <a href="https://twitter.com/{{ $page->getConnectionValue(\App\Enums\PageConnectionType::Twitter) }}" target="_blank">
                                <img src="{{ asset('images/static/tw.png') }}" width="38" class="mx-1" alt="">
                            </a>
                        @endif
                        @if($page->getConnectionValue(\App\Enums\PageConnectionType::Whatsapp))
                            <a href="https://whatsapp.com/{{ $page->getConnectionValue(\App\Enums\PageConnectionType::Whatsapp) }}" target="_blank">
                                <img src="{{ asset('images/static/wa.png') }}" width="38" class="mx-1" alt="">
                            </a>
                        @endif
                        @if($page->getConnectionValue(\App\Enums\PageConnectionType::Facebook))
                            <a href="https://facebook.com/{{ $page->getConnectionValue(\App\Enums\PageConnectionType::Facebook) }}" target="_blank">
                                <img src="{{ asset('images/static/facebook.png') }}" width="38" class="mx-1" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="pt-4 text-muted">

                        <div class="col-12 pb-2">
                            <img src="{{ asset('images/static/phone.png') }}" width="20" class="pl-1" alt="">تعیین نشده
                            {{--{{ $page->getConnectionValue(\App\Enums\PageConnectionType::Mobile) ? $page->getConnectionValue(\App\Enums\PageConnectionType::Mobile) : 'تعیین نشده' }}--}}
                        </div>

                        <div class="col-12">
                            <img src="{{ asset('images/static/email.png') }}" width="25" class="pl-1" alt="">
                            {{ $page->getConnectionValue(\App\Enums\PageConnectionType::Mail) ? $page->getConnectionValue(\App\Enums\PageConnectionType::Mail) : 'تعیین نشده' }}
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-7 pl-lg-5">

            <div class="w-100 shadow-sm mt-4 p-2">

                <div class="col-12 py-1 mb-3 bg-grey table-responsive font-small-xs" style="white-space: nowrap">
                    {!! Breadcrumbs::view('front.includes.breadcrumbs', 'front.pages.show', $page) !!}
                </div>

                <div class="col-12 pt-2 px-0 row mx-0 px-0 px-md-3">

                    <div class="col-2 col-md-1 px-0">
                        <img src="{{ asset('images/static/gallery.svg') }}" width="32" height="24" alt="Gallery">
                    </div>

                    <h2 class="h4 col px-0 mb-0 my-auto">گالری تصاویر</h2>

                    <div class="col-3 text-left px-1 px-md-3">
                        <span class="btn-circle bg-light px-3 border py-1 small d-block d-md-inline text-center">
                            {{ $page->getNumberOfGalleries() }} مورد</span>
                    </div>

                </div>

                <hr class="mb-0">

                <div class="col-12 row mx-0 pt-3">
                    {{--If there is no card--}}
                    @if($page->getNumberOfGalleries() == 0)
                        <div class="w-100 text-center py-5">
                            <img src="{{ asset('images/static/not-found.png') }}" class="img-fluid" alt="">
                        </div>
                    @else
                        {{-- Loop starts from here--}}
                        @foreach($galleries as $gallery)
                            <div class="col-6 col-md-4 pb-3">
                                <a href="{{ route('front.pages.galleries.show', [$page->getSlug(), $gallery->getSlug()]) }}">
                                    <div class="position-relative gallery-hover-animation">
                                        @if($gallery->getNumberOfImages())
                                            <img data-src="{{ $gallery->getAgentImage('medium') }}"
                                                 class="lazyload img-fluid">
                                            <div class="col text-center category-title text-white">{{ $gallery->getName() }}</div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach

                        {!! $galleries->render() !!}

                    @endif
                </div>

            </div>
            <div class="col-12 pt-5 px-0 row mx-0 px-0 px-md-3">

                <div class="col-2 col-md-1 px-0">
                    <img src="{{ asset('svg/comment.svg') }}" width="32" height="24">
                </div>

                <h2 class="h4 col px-0 mb-0 my-auto">نظرات کابران</h2>

                <div class="col-4 text-left px-1 px-md-3">
                    <a href="#review_set" data-toggle="modal" class="btn-circle color-animate-grey-blue bg-white px-1 pr-xl-3 py-1 small d-block d-md-inline text-center">
                        ثبت نظر من
                        <svg width="18" class="mx-1" style="margin-top: -2px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 46"><g transform="translate(-914 -405)"><circle cx="23" cy="23" r="23" transform="translate(914 405)"/><path d="M0,0H31.215" transform="translate(921.393 428.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="3"/><line y2="29" transform="translate(937.5 413.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-width="3"/></g></svg>
                    </a>
                </div>
                @include('front.includes.review-set')
            </div>

            <hr class="mb-0">

            {{-- start single comment element--}}
            <div class="col-12 row mx-0 mt-4 px-0 px-md-1">
                <div class="col-1 pt-3 pr-0">
                    <img src="{{ asset('images/static/new/default.png') }}" class="rounded-circle c-user-picture" width="52" height="52">
                </div>
                <div class="col-11 pl-0 pr-1">
                    <div class="w-100 rounded bg-white py-3 shadow-sm">
                        <div class="col-12">
                            <b>علی علیزاده</b>
                            <span class="float-left">
                                <a href="">
                                <span class="c-dislike px-1">
                                    <img src="{{ asset('svg/dislike.svg') }}" width="13" class="ml-1">6</span>
                                </a>
                                <a href="">
                                <span class="c-like">
                                    <img src="{{ asset('svg/like.svg') }}" width="13" class="ml-1">12</span>
                                </a>
                            </span>
                            <div class="col-12 px-0 text-muted small">12 مهر 1399</div>
                        </div>
                        <div class="col-12 row mx-0">
                            <div class="col-lg-9 pr-0">
                                <div class="p-2 text-justify font-13 line-height-2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه.
                                    <span onclick="editingComment(this.parentElement)" class="opacity-1-onhover" title="ویرایش">
                                    <img src="{{ asset('svg/comment-edit.svg') }}" width="20"/>
                                </span></div>
                            </div>
                            <div class="col-lg-3 px-0">
                                <div class="w-100 bg-light pb-1 rounded c-rating-holder">
                                    <a href="#">
                                        <div class="col-12 text-center small rounded-top-14"
                                             style="color:#d1b354;background-color:rgba(234,228,174,0.29);border-bottom: 1px solid #efe85d;">ویرایش</div>
                                    </a>
                                    <div class="row mx-0 col-12 px-2 small pt-2">قیمت
                                        <span class="review-rating mr-auto">
                                            <img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20">
                                        </span>
                                    </div>
                                    <div class="row mx-0 col-12 px-2 small pt-1">مکان&nbsp;
                                        <span class="review-rating mr-auto">
                                            <img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20">
                                        </span>
                                    </div>
                                    <div class="row mx-0 col-12 px-2 small pt-1">برخورد
                                        <span class="review-rating mr-auto">
                                            <img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20">
                                        </span>
                                    </div>
                                    <div class="row mx-0 col-12 px-2 small pt-1">خدمات
                                        <span class="review-rating mr-auto">
                                            <img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20">
                                        </span>
                                    </div>
                                    <div class="row mx-0 col-12 px-2 small pt-1">کیفیت
                                        <span class="review-rating mr-auto">
                                            <img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20"><img src="{{ asset('images/static/star-off.svg') }}" width="20">
                                        </span>
                                    </div>
                                    <div class="col-12 small text-muted px-2 text-left">
                                        <hr class="mb-0 mt-2">
                                        <span class="pl-2 small">میانگین امتیاز 3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="w-100 rounded bg-light-grey px-3 pt-1 pb-3">
                                <div>پاسخ مدیر صفحه:</div>
                                <div class="small pt-1">دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</div>

                                <form class="position-relative">
                                    <input type="text" class="w-100 border p-1 default bg-light mt-3 small pl-5" placeholder="پاسخ من ...">
                                    <span class="text-info position-absolute pointer" style="left:10px; top:18px;">ارسال</span>
                                </form>

                            </div>
                        </div>
                    </div>
                    <img class="c-curved" src="{{ asset('svg/comment-curved.svg') }}" width="40">
                </div>
            </div>
            {{--end--}}
        </div>
        <div class="col-lg-2 pr-lg-0 left-col py-3">
            <h4 class="h5 pt-3 pb-2">ساعت کاری</h4>
            <div style="min-width: 174px">
                @if( ! $page->isTheWorkTimeSet()|| $page->areAllWorktimesoff())
                    <div class="col-12 bg-rgba-light py-2 small text-center text-muted"> زمانی تعیین نشده
                        <span>&otimes;</span></div>
                @else
                    @foreach($week_days as $week_day)
                        <div class="col-12 px-0 row mx-0 pb-1-half">
                            <div class="days-name @if($week_day->getDayOfWeek() == \Morilog\Jalali\Jalalian::now()->getDayOfWeek()) current-day @endif py-1 col-2 px-0 @if($workTimes = $page->getWorkTimesInSpecificDay($week_day)) active @endif">{{ $week_day->getName() }}</div>
{{--                            todo: For more information on each day i tag should be shown--}}
                            @if($week_day->info != null)
                            <i class="weeks-info" data-toggle="tooltip" data-placement="right" title="از ساعت 12 تا 12:15 وقت نهار است">
                                <img src="{{ asset('svg/info.svg') }}" alt="i">
                            </i>
                            @endif
                            @if($workTimes)
                                @foreach($workTimes as $time)
                                    <div class="col pl-0 pr-1 @if($week_day->getDayOfWeek() == \Morilog\Jalali\Jalalian::now()->getDayOfWeek()) font-weight-bold @endif">
                                        <div class="open-hours py-1 {{ $loop->iteration == 1 && $loop->count == 2 ? 'first-half' : '' }} {{ $loop->iteration == 2 && $loop->count == 2 ? 'sec-half' : '' }}">
                                            از<span> {{ $time->getStartTime() }} </span>
                                            <span style="padding: 0 1px">تا</span>
                                            <span> {{ $time->getEndTime() }} </span>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col pl-0 pr-2">
                                    <div class="open-hours py-1 text-muted bg-light-grey">بسته</div>
                                </div>
                            @endif

                        </div>
                    @endforeach
                @endif
            </div>
            <h4 class="h5 pt-4 pb-2">موقعیت مکانی</h4>
            <div class="w-100 text-center bg-white shadow-sm location">
                <div class="mapbox position-relative w-100">
                    <div id="mapId" class="w-100"></div>
                </div>
                <div class="small address text-muted pt-1 pb-2 px-2 d-flex justify-content-center">
                    <div>
                        <svg width="20" xmlns:x="http://ns.adobe.com/Extensibility/1.0/"
                             xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/"
                             xmlns:graph="http://ns.adobe.com/Graphs/1.0/" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"
                             viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;fill:rgba(255,63,0,0.39)"
                             xml:space="preserve"><switch>
                                <foreignObject requiredExtensions="http://ns.adobe.com/AdobeIllustrator/10.0/" x="0"
                                               y="0" width="1" height="1"/>
                                <g i:extraneous="self">
                                    <g>
                                        <path d="M68.3,67.6c-1.2,2.1-2.5,4.1-3.8,6c8.4,1.9,13.4,5.2,13.4,7.7c0,3.7-11.1,9.3-27.9,9.3c-16.8,0-27.9-5.6-27.9-9.3     c0-2.5,5-5.7,13.4-7.7c-1.3-1.9-2.6-3.9-3.8-6c-9.6,2.5-16.5,7-16.5,13.7c0,10.6,17.5,16.2,34.8,16.2s34.8-5.6,34.8-16.2     C84.8,74.6,77.9,70.1,68.3,67.6z"/>
                                        <path d="M53.1,78.5C60.2,68,77.2,41.7,77.2,29.8C77.2,14.7,65,2.5,50,2.5S22.7,14.7,22.7,29.8c0,11.9,17.1,38.2,24.2,48.7     C48.4,80.6,51.6,80.6,53.1,78.5z M37.3,29.8c0-7,5.7-12.7,12.7-12.7s12.7,5.7,12.7,12.7S57,42.4,50,42.4S37.3,36.7,37.3,29.8z"/>
                                    </g>
                                </g>
                            </switch>
                        </svg>
                    </div>
                    <div class="pl-4 pr-1 text-center pt-1">{{ $page->address->getAddress() }}</div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <script src="{{ asset('js/leaflet/mapbox.gl.js') }}"></script>
    <script src="{{ asset('js/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('js/leaflet/control-geo.js') }}"></script>
    <script src='{{ asset('js/leaflet/fullscreen.js') }}'></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        lazyload();
        // leaflet config
        let map;
        let lat = '{{ $page->address->getLat() }}';
        let long = '{{ $page->address->getLng() }}';
        map = L.map('mapId', {zoomControl: false, fullscreenControl: true}).setView([lat, long], 13);
        map.setMaxBounds([[84.67351256610522, -174.0234375], [-58.995311187950925, 223.2421875]]);
        let osmLayer = new L.TileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);
        let marker = L.marker([lat, long]).addTo(map);
        if(window.matchMedia("(max-width: 768px)").matches){
            let map_element = document.querySelector(".mapbox");
            $(map_element).click(function () {
                $(document.getElementById('mapId')).css("pointer-events", "auto")
            });
            $(map_element).mouseleave(function () {
                $(document.getElementById('mapId')).css("pointer-events", "none")
            });
        }
    </script>
@endpush


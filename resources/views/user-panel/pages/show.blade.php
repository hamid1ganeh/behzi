@extends('user-panel.master')
@section('content')
{{--    @dd($page->domain->toArray())--}}
    <div class="d-flex flex-column-fluid min-height">
        <div class="col-12 row mx-0 px-md-5 px-xl-30">
            <div class="col-md-4 order-1 order-md-0 mt-5 mt-md-0 px-0 px-md-5">
                <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 text-center" style="min-height: 50px">
                        <div class="card-title">
                            <div class="card-label">
                                <div class="font-weight-bold">آمار بازدید روزانه</div>
                            </div>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2 d-flex flex-column px-0">
                        <!--begin::Chart-->
                        <div id="chart_2"></div>
                    </div>
                </div>
                <div class="mt-4 bg-white-o-100 rounded py-4 px-3 col-12 row mx-0">
                    <div class="col-6">تاریخ ثبت:</div>
                    <div class="col-6">{{ $page->getJalaliCreatedAtDate() }}</div>
                </div>
                <div class="mt-4 bg-white-o-100 rounded py-4 px-3 col-12 row mx-0">
                    <div class="col-6">تاریخ شروع:</div>
                    <div class="col-6">{{ $page->getJalaliStartDate() }}</div>
                </div>
                <div class="mt-4 bg-white-o-100 rounded py-4 px-3 col-12 row mx-0">
                    <div class="col-6">تاریخ پایان:</div>
                    <div class="col-6">{{ $page->getJalaliExpireDate() }}</div>
                </div>
                <div class="mt-4 bg-white-o-100 rounded py-4 px-3 col-12 row mx-0">
                    <div class="col-6">تاریخ آخرین بروز رسانی:</div>
                    <div class="col-6">{{ $page->getJalaliUpdatedAtDate() }}</div>
                </div>
            </div>
            <div class="col-md-8 order-0 order-md-1 rounded bg-white px-1">
                <div class="w-100 my-1 wide-image-container rounded-top"></div>
                <div class="col-12 row mx-0 pt-2 pt-md-5 px-0">
                    <div class="col-12 col-md-3">
                        <span class="badge bg-{{ $page->getPageStatus()['class'] }}-o-55 text-{{ $page->getPageStatus()['class'] }}">وضعیت : {{ $page->getPageStatus()['name'] }}</span>
                    </div>
                    <div class="col-12 col-md-6 text-center">
                        <h1 class="h4 pt-3 pt-md-0" style="word-wrap: break-word;">{{ $page->name }}
                            <small class="font-size-sm text-muted">({{ $page->work_item->name }})</small></h1>
                    </div>
                    <div class="col-12 col-md-3 text-right my-3 my-md-0">
                        <a href="{{ route('userPanel.pages.edit',$page->id) }}" class="btn btn-warning text-white d-block d-md-inline">ویرایش اطلاعات</a>
                    </div>
                    <div class="col-12 row mx-0 mb-5">
                        <div class="col-12 mt-5">
                        <span><svg width="20" xmlns:x="http://ns.adobe.com/Extensibility/1.0/"
                                   xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/"
                                   xmlns:graph="http://ns.adobe.com/Graphs/1.0/" xmlns="http://www.w3.org/2000/svg"
                                   xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"
                                   viewBox="0 0 100 100" xml:space="preserve" style="fill: rgba(255, 63, 0, 0.39);"><switch><foreignObject
                                            requiredExtensions="http://ns.adobe.com/AdobeIllustrator/10.0/" x="0" y="0"
                                            width="1" height="1"></foreignObject> <g i:extraneous="self"><g><path
                                                    d="M68.3,67.6c-1.2,2.1-2.5,4.1-3.8,6c8.4,1.9,13.4,5.2,13.4,7.7c0,3.7-11.1,9.3-27.9,9.3c-16.8,0-27.9-5.6-27.9-9.3     c0-2.5,5-5.7,13.4-7.7c-1.3-1.9-2.6-3.9-3.8-6c-9.6,2.5-16.5,7-16.5,13.7c0,10.6,17.5,16.2,34.8,16.2s34.8-5.6,34.8-16.2     C84.8,74.6,77.9,70.1,68.3,67.6z"></path> <path
                                                    d="M53.1,78.5C60.2,68,77.2,41.7,77.2,29.8C77.2,14.7,65,2.5,50,2.5S22.7,14.7,22.7,29.8c0,11.9,17.1,38.2,24.2,48.7     C48.4,80.6,51.6,80.6,53.1,78.5z M37.3,29.8c0-7,5.7-12.7,12.7-12.7s12.7,5.7,12.7,12.7S57,42.4,50,42.4S37.3,36.7,37.3,29.8z"></path></g></g></switch></svg></span>
                            <span class="text-muted">{{ $page->address->getAddress() }}</span>
                        </div>
                        <div class="w-100 my-4 bg-light-o-70 rounded-xl py-3 px-lg-8 text-justify"><b class="pl-3">توضیحات:</b>
                            <p class="px-3 px-md-0">{{ $page->getDescription() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 row mx-0">
                    <div class="col-12 mx-0 px-0 row">
                        <div class="col-lg-4">
                            <div class="card card-custom bgi-no-repeat card-stretch gutter-b"
                                 style="background-position: right top; background-size: 30%; background-image: url({{ asset('cp/assets/media/svg/shapes/abstract-4.svg') }});">
                                <div class="card-body"><span
                                                          class="card-title font-weight-bold text-muted text-hover-primary font-size-h3">راه های ارتباطی</span>
                                    <div class="font-weight-bold font-size-h5 text-success  mt-2 mb-4">{{ $page->getConnectionsCount() }} مورد</div>
                                    <div><a href="{{ route('userPanel.pages.connections.create',$page->id) }}" class="btn btn-primary btn-block">ویرایش</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-custom bgi-no-repeat card-stretch gutter-b"
                                 style="background-position: right top; background-size: 30%; background-image: url({{ asset('cp/assets/media/svg/shapes/abstract-2.svg') }});">
                                <div class="card-body"><span
                                                          class="card-title font-weight-bold text-muted text-hover-primary font-size-h3">ساعات کاری</span>
                                    <div class="font-weight-bold font-size-h5 text-success  mt-2 mb-4">
                                        @if($page->isTheWorkTimeSet() && !$page->AreAllWorkTimesOff())
                                        تعیین نشده
                                        @else
                                        تعیین شده
                                        @endif
                                    </div>
                                    <div><a href="{{ route('userPanel.pages.workTime.create',$page->id) }}" class="btn btn-success btn-block">
                                            @if($page->isTheWorkTimeSet() && !$page->AreAllWorkTimesOff())
                                                تنظیم ساعت‌کار
                                            @else
                                                ویرایش
                                            @endif
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-custom bgi-no-repeat card-stretch gutter-b"
                                 style="background-position: right top; background-size: 30%; background-image: url({{ asset('cp/assets/media/svg/shapes/abstract-1.svg') }});">
                                <div class="card-body"><span
                                            class="card-title font-weight-bold text-muted text-hover-primary font-size-h3">تعداد گالری‌ها</span>
                                    <div class="font-weight-bold font-size-h5 text-success mt-2 mb-4"> {{ $page->getNumberOfGalleries() }} مورد</div>
                                    <div><a href="{{ route('userPanel.pages.galleries.index',$page->id) }}" class="btn btn-warning btn-block">ویرایش</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-7">
                    <a href="{{ route('userPanel.pages.messages.index',$page->id) }}">
                        <div class="col-12 bg-warning-o-50 bg-hover-warning-o-2 rounded py-2">
                        <span class="svg-icon svg-icon-warning svg-icon-3x">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs></defs>
                                <g id="Stockholm-icons-/-Communication-/-Mail-notification" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                    <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" id="Combined-Shape" fill="#000000"></path>
                                    <circle class="oval" cx="19.5" cy="17.5" r="3.6"></circle>
                                </g>
                            </svg>
                        </span>
                            <span class="text-dark">شما <b>4</b> پیام از مشتریان خود دریافت کردید!</span>
                            <div class="float-right mt-3 text-muted small hide-in-mobile">برای مشاهده کلیک کنید</div>
                        </div>
                    </a>

                </div>

                <div class="col-12 mb-3">
                    @if(!is_null($page->domain))
                        {{--<update-domain domain-update-route="{{ route('userPanel.pages.domains.update') }}"
                                       domain-name="{{ $page->domain->name }}"
                                       domain-id="{{ $page->domain->id }}"
                                       page-id="{{ $page->id }}"/>--}}
                        <div class="build-website bg2 col-12 row mx-0 rounded text-white">
                            <form action="{{ route('userPanel.pages.domains.update') }}" method="post" class="col-12 px-0 row mx-0 domain-status">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" value="{{ $page->domain->id }}" name="domain_id">
                                <input type="hidden" value="{{ $page->id }}" name="page_id">
                                <div class="font-size-h1 mt-16 mb-7 col-12 text-white">فرم اطلاعات وب سایت</div>
                                <div class="col-md-6 mb-4">
                                    <div class="mb-1">آدرس دامنه وب سایت:</div>
                                    <input type="text" name="name" value="{{ $page->domain->name }}" class="rounded bg-light-o-35 border-0 px-3 w-100 text-dark d-block py-1">
                                    @if($errors->first('name'))
                                        <span class="form-text d-inline-block text-white bg-dark-o-100 mt-2 px-2">
                                            <i class="fa fa-exclamation-triangle pr-2 fa-xs text-warning"></i>{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="mb-1">وضعیت:</div>
                                    <span class="rounded bg-dark-o-35 border-0 px-3 text-white d-block py-1">درحال بررسی</span>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="mb-1">DNS1:</div>
                                    <span class="rounded bg-dark-o-35 border-0 px-3 text-white d-block py-1 position-relative">
                                        <i class="fa fa-copy float-right text-hover-warning" title="کپی" onclick="copyText('dns1.abd.com')"></i>dns1.abd.com</span>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="mb-1">DNS2:</div>
                                    <span class="rounded bg-dark-o-35 border-0 px-3 text-white d-block py-1">
                                        <i class="fa fa-copy float-right text-hover-warning" title="کپی" onclick="copyText('dns1.abd.com')"></i>dns2.abd.com</span>
                                </div>
                                <hr class="w-100 border border-top-0">
                                <div class="col-md-6 mb-4">
                                    <div>عنوان وب سایت:</div>
                                    <input type="text" name="title" value="{{ $page->domain->detail->title ?? $page->getName() }}" class="form-control bg-light-o-35 border-0 text-dark py-1 d-block px-3">
                                    @if($errors->first('title'))
                                        <span class="form-text d-inline-block text-white bg-dark-o-100 mt-2 px-2">
                                            <i class="fa fa-exclamation-triangle pr-2 fa-xs text-warning"></i>{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="mb-2">متن درباره ما:</div>
                                    <textarea name="aboutUs">{{ $page->domain->detail->aboutUs ?? '' }}</textarea>
                                    @if($errors->first('aboutUs'))
                                        <span class="form-text d-inline-block text-white bg-dark-o-100 mt-2 px-2">
                                            <i class="fa fa-exclamation-triangle pr-2 fa-xs text-warning"></i>{{ $errors->first('aboutUs') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="mb-2">قوانین سایت:</div>
                                    <textarea name="privacyPolicy" {{--class="form-control bg-light-o-35 border-0 text-dark py-1 d-block px-3"--}}>{{ $page->domain->detail->privacyPolicy ?? '' }}</textarea>
                                    @if($errors->first('privacyPolicy'))
                                        <span class="form-text d-inline-block text-white bg-dark-o-100 mt-2 px-2">
                                            <i class="fa fa-exclamation-triangle pr-2 fa-xs text-warning"></i>{{ $errors->first('privacyPolicy') }}</span>
                                    @endif
                                </div>
                                <div class="col-12 mb-5 px-md-25">
                                    <div>ارسال تصویر لوگو:</div>
                                    <cropper-single cropper-width="200" cropper-height="200"/>
                                    <span class="form-text text-danger" ></span>
                                </div>
                                <div class="col-md-12 d-flex justify-content-center mb-3">
                                    <div class="col-md-5">
                                        <input type="submit" class="btn btn-light font-weight-bold w-100" value="ثبت و بروزرسانی">
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <form action="{{ route('userPanel.pages.domains.store') }}" method="POST">
                            @csrf()
                            <input type="hidden" value="{{ $page->id }}" name="page_id">
                            <div class="build-website col-12 row mx-0 rounded text-white">
                                <div class="col-md-8 my-auto px-0 px-md-10">
                                    <div class="font-size-h2 font-size-h1-md mt-9 mb-1">وب سایت خودت رو داشته باش!</div>
                                    <div class="row mx-0 col-12 px-0" id="domain-step1">
                                        <small>نام آدرس وب سایت یا دامنه ای که در نظر دارید چیست؟</small>
                                        <input type="text" name="name" class="form-control my-2 text-right" dir="ltr" placeholder="www.">
                                        @if(count($errors))
                                        <span class="form-text text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                        <div class="w-100 text-center mt-3">
                                            <input type="submit" class="btn btn-light font-weight-bold px-12 py-1" value="پردازش">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 py-5 mt-auto">
                                    <img src="{{ asset('images/static/build-site-poster.svg') }}">
                                </div>
                            </div>
                        </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <link href="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .wide-image-container {
            height: 150px;
            background-image: url("{{ $page->image->getImagePath('original') }}");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .build-website{
            background-color: rgba(173, 216, 230, 0.17);
            background-image: url({{ asset('images/static/build-site-bg.svg') }});
            background-size: cover;
            background-position: bottom center;
        }
        .build-website.bg2{
            background-image: url({{ asset('images/static/build-site-bg2.svg') }});
        }
        .font-size-h1-md, .font-size-h4{
            text-shadow:0 0 2px grey;
        }
        .domain-status .form-control{
            height:unset !important
        }
        .bg-dark-o-35{
            word-break: break-word;
        }
        .fa-copy{
            cursor: pointer;
        }
        .oval{
            fill: #ffeecc;
            animation: circle-flash-light 2s infinite;
        }
        #cke_aboutUs,#cke_privacyPolicy ,.cke_inner, .cke_top{
            border-radius: 7px;
        }
        .cke_bottom{
            border-radius: 0 0 7px 7px;
        }
        @keyframes circle-flash-light {
            0%{
                fill: #ffeecc;
            }
            50%{
                fill: orangered;
            }
        }
        @media screen and (max-width: 720px){
            .hide-in-mobile{
                display: none !important;
            }
        }
    </style>
@stop
@section('js')
    <script src="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.js') }}"></script>
    <script src="{{ asset('cp/assets/js/pages/features/charts/apexcharts.js') }}"></script>
    <script>
        const ck_config = {
            contentsLangDirection : 'rtl',
            toolbar: [
                ['Styles','Format','Font','FontSize'],
                ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','Print'],
                ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                ['Image','Table','-','Link','Flash','Smiley','TextColor','BGColor','Source']
            ]
        };
        CKEDITOR.replace( 'aboutUs',ck_config);
        CKEDITOR.replace( 'privacyPolicy',ck_config);

        var KTApexChartsDemo = function () {
            let chart2 = function () {
                const apexChart = "#chart_2";
                let options = {
                    series: [{
                        name: 'بازدید',
                        data: [31, 40, 28, 51, 42, 109, 100]
                    }],
                    chart: {
                        height: 250,
                        type: 'area'
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                    },
                    tooltip: {
                        x: {
                            format: 'HH:mm'
                        },
                        style: {
                            fontSize: '12px',
                            fontFamily: "Vazir",
                        },
                    },
                    colors: [danger]
                };

                let chart = new ApexCharts(document.querySelector(apexChart), options);
                chart.render();
            };
            return {
                // public functions
                init: function () {
                    chart2()
                }
            }
        }();

        jQuery(document).ready(function () {
            KTApexChartsDemo.init();
        });
    </script>

    <script>
        function copyText(txt) {
            let dummy = document.createElement("textarea");
            // to avoid breaking orgain page when copying more words
            // cant copy when adding below this code
            // dummy.style.display = 'none'
            document.body.appendChild(dummy);
            //Be careful if you use texarea. setAttribute('value', value), which works with "input" does not work with "textarea". – Eduard
            dummy.value = txt;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
            Vue.$toast.success('متن کپی شد');
        }
    </script>
@stop

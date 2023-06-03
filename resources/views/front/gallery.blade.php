@extends('front.layouts.main')

@section('content')
    @include('front.layouts.header')
    {{--End header--}}
    <div class="border-specifier bg-white"></div>
    <div class="w-100 blur-bg gallery">
        <div class="col-12 row mx-0 text-right head-title-container parent-height">
            <div class="col-3 col-lg-2"></div>
            <div class="col text-white pr-md-5 my-auto">
                <div>
                    <h1>نمای داخلی سوپر مارکت</h1>
                    <span class="pr-md-2">26 مورد</span>
                </div>
            </div>
            {{--<div class="col-md-3 text-left pb-3 mt-auto">
                <small class="text-light">امتیاز ۳ از ۵</small>
                <hr class="my-1 border-bottom-0 border-light">
                <div>
                    <img src="{{ asset('images/static/star.svg') }}" width="30" height="30">
                    <img src="{{ asset('images/static/star.svg') }}" width="30" height="30">
                    <img src="{{ asset('images/static/star.svg') }}" width="30" height="30">
                </div>
            </div>--}}
        </div>
    </div>
    <div class="main-container col-12 row mx-0 px-0 px-md-3 d-block">
        <div class="col-12">
            <div class="col-2 px-0 text-lg-center">
                <img src="{{ asset('images/thumbnail.png') }}" class="shadow-sm rounded position-absolute category-logo" style="bottom: -1rem; z-index: 5;">
            </div>
        </div>
        <div class="col-12 pt-3">
            <div class="w-100 shadow-sm mt-4 p-2 bg-white">
                <div class="col-12 pt-2 px-0 row mx-0 px-0 px-md-3">
                    <div class="float-right">
                        <img src="{{ asset('images/static/gallery.svg') }}" width="32" height="24" alt="Gallery">
                    </div>
                    <h2 class="h4 col px-0 mb-0 my-auto px-4">گالری تصاویر</h2>
                    <div class="col-3 text-left px-1 px-md-3">
                        <span class="btn-circle bg-light px-3 border py-1 small d-block d-md-inline text-center"><b class="px-1">۱</b>صفحه</span>
                    </div>
                </div>
                <hr class="mb-0">
                <div class="hover01 column col-12 row mx-0">
                    {{-- Loop starts from here--}}
                    <div class="col-6 col-md-3">
                        <figure>
                            <img src="" class="img-fluid"/>
                        </figure>
                    </div>
                    {{--***--}}
                    <div class="demo-gallery">
                        <ul id="lightgallery" class="list-unstyled row">
                            <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="/images/fata.png" data-src="/images/fata.png" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
                                <a href="">
                                    <img class="img-responsive" src="/images/fata.png">
                                </a>
                            </li>
                            <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="/img/2-375.jpg 375, /img/2-480.jpg 480, /img/2.jpg 800" data-src="/img/2-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                                <a href="">
                                    <img class="img-responsive" src="/img/thumb-2.jpg">
                                </a>
                            </li>
                            <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="/img/13-375.jpg 375, /img/13-480.jpg 480, /img/13.jpg 800" data-src="/img/13-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                                <a href="">
                                    <img class="img-responsive" src="/img/thumb-13.jpg">
                                </a>
                            </li>
                            <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="/img/4-375.jpg 375, /img/4-480.jpg 480, /img/4.jpg 800" data-src="/img/4-1600.jpg" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                                <a href="">
                                    <img class="img-responsive" src="/img/thumb-4.jpg">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>

                </div>
                <div class="w-100 my-4" align="center">
                    <div class="col-9 col-sm-8 col-xl-4 row mx-0 px-0 border pagination shadow-sm">

                        <div class="col py-2"><img src="{{ asset('images/static/chevron-right.png') }}" width="8" alt=""></div>

                        <div class="col py-2 active">۱</div>

                        <div class="col py-2">۲</div>

                        <div class="col py-2">۳</div>

                        <div class="col py-2">...</div>

                        <div class="col py-2"><img src="{{ asset('images/static/chevron-left.png') }}" width="8" alt=""></div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@stop

@push('css')
    <link href="/light-gallery/css/lightgallery.css" rel="stylesheet">
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
    <script src="/light-gallery/js/lightgallery-all.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
        });
    </script>

@endpush
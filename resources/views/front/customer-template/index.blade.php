@extends('front.customer-template.layouts.main')

@section('content')
    <div class="w-100 blur-bg">
        <div class="col-12 row mx-0">
            <div class="col-lg-4 text-white text-right head-title-container">
                <div>
                    <h1>سوپرمارکت آرش</h1>
                    <span class="pr-md-4">آرش حمیدی</span>
                </div>
            </div>
            <div class="col-lg-7 row mx-0">
                <div class="col">
                    <div id="pic1" style="background-image: url('/images/s2.png')"></div>
                    <div id="pic2" style="background-image: url('/images/s2.png')"></div>
                    <div id="pic3" style="background-image: url('/images/s2.png')"></div>
                    <div id="pic4" style="background-image: url('/images/s2.png')"></div>
                    <div id="pic5" style="background-image: url('/images/s2.png')"></div>
                    <div id="pic6" style="background-image: url('/images/s2.png')"></div>
                    <div id="pic7" style="background-image: url('/images/s2.png')"></div>
                    <div id="pic8" style="background-image: url('/images/s2.png')"></div>
                </div>
            </div>
            <div class="col-lg-1 d-flex">
                <img src="/svg/more.svg" alt="more">
            </div>

        </div>
    </div>
    {{-- End of blur part--}}
    <section class="col-12 row mx-0 contents">
        <div class="col-lg-3">Loading...</div>
        <div class="col-lg-6 px-0"></div>
        <div class="col-lg-3">

        </div>
    </section>

@stop
@extends('front.layouts.main')

@section('content')
    @include('front.layouts.header')
    {{--End header--}}
    <div class="col-12 px-0 px-md-3 row mx-0 multi-show-container">
        <div class="col-xl-3">
            <div class="shadow-sm px-2 pb-4 pt-3 filter-box sticky-top" style="top:2.5rem">
                <h2 class="h5 p-1">استان مورد نظر</h2>
                <div class="pb-3 position-relative">
                    <select class="py-1 w-100">
                        <option value="تهران">تهران</option>
                        <option value="تهران">اردبیل</option>
                        <option value="تهران">مازندران</option>
                    </select>
                    <span class="chevron-down d-flex justify-content-center align-items-center">@include('front.includes.chevron-d')</span>
                </div>
                <div class="position-relative">
                    <select class="py-1 w-100">
                        <option selected disabled value="تهران">شهر خود را انتخاب کنید</option>
                        <option value="">تهران</option>
                        <option value="">پردیس</option>
                        <option value="">شهریار</option>
                    </select>
                    <span class="chevron-down d-flex justify-content-center align-items-center">@include('front.includes.chevron-d')</span>
                </div>
                <hr>
                <h2 class="h5 p-1 mt-2">دسته بندی</h2>
                <div class="pb-3 position-relative">
                    <select class="py-1">
                        <option value="">فروشگاه</option>
                        <option value="">الکترونیک</option>
                        <option value="">ورزشی</option>
                    </select>
                    <span class="chevron-down d-flex justify-content-center align-items-center">@include('front.includes.chevron-d')</span>
                </div>
                <div class="position-relative">
                    <select class="py-1">
                        <option selected disabled value="تهران">زیر دسته</option>
                        <option value="">سوپر مارکت</option>
                        <option value="">استخر</option>
                    </select>
                    <span class="chevron-down d-flex justify-content-center align-items-center">@include('front.includes.chevron-d')</span>
                </div>
                <div class="pt-4">
                    <button class="btn btn-gradient-blue w-100">اعمال بروز رسانی</button>
                </div>
            </div>
        </div>
        <div class="col-xl-9 row mx-0 mt-3">
            <div class="col-12 px-0 row mx-0">
                <div class="col-xl-8"><h2 class="h2">فیلتر بر اساس استان تهران</h2></div>
                <div class="col-xl-4 text-center text-md-left px-0 mt-3 mt-md-0">
                    <small class="text-muted">مرتب سازی بر اساس</small>
                    {{--Todo: toggle `active` class--}}
                    <a href="" class="btn btn-light btn-circle small btn-sm mr-2 active">جدیدترین</a>
                    <a href="" class="btn btn-light btn-circle small btn-sm mx-2">امتیاز</a>
                </div>
            </div>
            <div class="col-12 shadow-sm px-0 px-md-3">
                {{--breadcrumb--}}
                <div class="col-12 py-2 my-3 bg-light table-responsive" style="white-space: nowrap">
                    <span class="px-3">استان تهران</span>
                    <img src="{{ asset('images/static/chevron-left.png') }}" width="8">
                    <span class="px-3">شهر تهران</span>
                    <img src="{{ asset('images/static/chevron-left.png') }}" width="8">
                    <span class="px-3">فروشگاه</span>
                </div>
                {{-- End --}}
                <div class="col-12 row mx-0 px-0">
                    {{--Card starts from here--}}
                    <div class="col-xl-4 col-sm-6 pb-4 pt-5">
                        <div class="bg-white shadow border-radius custom-card">
                            <div class="w-100 row mx-0">
                                <div class="col-1 px-0"></div>
                                <div class="col-10">
                                    <a href="/show">
                                        <div class="img-container border-radius shadow-sm" style="background-image: url({{ asset('/images/thumbnail.png') }})"></div>
                                    </a>
                                </div>
                                <div class="col-1 px-0 text-success small mt-4">
                                    <div class="rate bg-light position-absolute">
                                        <div>۳</div>
                                        <div>/</div>
                                        <div>۵</div>
                                    </div>
                                </div>
                                <div class="text-center w-100 pt-3">
                                    <a href="/show">
                                        <h3 class="h4 text-truncate px-1 text-dark">سوپرمارکت آرش</h3>
                                    </a>
                                    <div class="small text-muted">خوار و بار فروشی</div>
                                    <div class="col-12 px-0 row mx-0 pt-1 pb-2">
                                        <div class="col-md-6 text-right small text-info">استان <span>تهران</span></div>
                                        <div class="col-md-6 text-left">
                                            <img src="{{ asset('/images/static/star.svg') }}" alt="">
                                            <img src="{{ asset('/images/static/star.svg') }}" alt="">
                                            <img src="{{ asset('/images/static/star.svg') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--***--}}
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
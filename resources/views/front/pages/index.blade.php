@extends('front.layouts.main')

@section('content')
    @include('front.layouts.header')
    {{--End header--}}
    <div class="col-12 px-0 px-md-3 row mx-0 multi-show-container min-height">
        {{--        <div class="col-xl-3">--}}
        {{--            <form class="shadow-sm px-2 pb-4 pt-3 filter-box sticky-top" style="top:2.5rem">--}}
        {{--                <h2 class="h5 p-1">استان مورد نظر</h2>--}}
        {{--                <div class="pb-3 position-relative">--}}
        {{--                    <select class="select2 py-1 w-100" name="province">--}}
        {{--                        <option value="0">همه</option>--}}

        {{--                    @foreach($provinces as $province)--}}
        {{--                            <option value="{{ $province->id }}" {{ request()->get('province') == $province->id ? 'selected' : '' }}>{{ $province->name }}</option>--}}
        {{--                        @endforeach--}}
        {{--                    </select>--}}
        {{--                    <span class="chevron-down d-flex justify-content-center align-items-center">@include('front.includes.chevron-d')</span>--}}
        {{--                </div>--}}
        {{--                <div class="position-relative">--}}
        {{--                    <select class="select2 py-1 w-100" name="city">--}}
        {{--                        <option value="0">همه</option>--}}

        {{--                    @foreach($cities as $city)--}}
        {{--                            <option value="{{ $city->id }}" {{ request()->get('city') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>--}}
        {{--                        @endforeach--}}
        {{--                    </select>--}}
        {{--                    <span class="chevron-down d-flex justify-content-center align-items-center">@include('front.includes.chevron-d')</span>--}}
        {{--                </div>--}}
        {{--                <hr>--}}

        {{--                <h2 class="h5 p-1 mt-2">دسته بندی</h2>--}}
        {{--                <div class="pb-3 position-relative">--}}
        {{--                    <select class="select2 py-1" name="work_category">--}}
        {{--                        <option value="0">همه</option>--}}
        {{--                        @foreach($workCategories as $workCategory)--}}
        {{--                            <option value="{{ $workCategory->id }}" {{ request()->get('work_category') == $workCategory->id ? 'selected' : '' }}>{{ $workCategory->name }}</option>--}}
        {{--                       @endforeach--}}
        {{--                    </select>--}}
        {{--                    <span class="chevron-down d-flex justify-content-center align-items-center">@include('front.includes.chevron-d')</span>--}}
        {{--                </div>--}}
        {{--                <div class="position-relative">--}}
        {{--                    <select class="select2 py-1" name="work_item">--}}
        {{--                        <option value="0">همه</option>--}}

        {{--                        @foreach($workItems as $workItem)--}}
        {{--                            <option value="{{ $workItem->id }}" {{ request()->get('work_item') == $workItem->id ? 'selected' : '' }}>{{ $workItem->name }}</option>--}}
        {{--                        @endforeach--}}
        {{--                    </select>--}}
        {{--                    <span class="chevron-down d-flex justify-content-center align-items-center">@include('front.includes.chevron-d')</span>--}}
        {{--                </div>--}}
        {{--                <div class="pt-4">--}}
        {{--                    <button type="submit" class="btn btn-gradient-blue w-100">اعمال بروز رسانی</button>--}}
        {{--                </div>--}}
        {{--            </form>--}}
        {{--        </div>--}}
        <div class="col-xl-3" id="filter-form">
            <filter-form v-cloak category="{{ request()->has('work_category') ? request()->get('work_category') : 0}}"
                         item="{{ request()->has('work_item') ? request()->get('work_item') : 0}}"
                         name="{{ request()->has('name') ? request()->get('name') : null}}"
                         province="{{ request()->has('province') ? request()->get('province') : 0}}"
                         city="{{ request()->has('city') ? request()->get('city') : 0}}"
                         sort="{{ request()->has('sort') ? request()->get('sort') : null }}"
                         pages-route="{{ route('front.pages.index') }}"
                         provinces-route="{{ route('front.ajax.provinces') }}"
                         categories-route="{{ route('front.ajax.workCategories') }}"></filter-form>
        </div>
        <div class="col-xl-9 row mx-0 mt-2 d-table">
            <div class="col-12 px-0 row mx-0">
                <div class="col-xl-8">
                    @if(request()->has('name'))
                    عنوان جستجو شده :<h2 class="h4 mb-0 d-inline pr-md-3" style="word-wrap: break-word;">{{ request()->has('name') ? request()->get('name') : '' }}</h2>
                    @endif
                </div>
                <sort-section
                    sort="{{ request()->has('sort') ? request()->get('sort') : 'created_at' }}"></sort-section>
            </div>

            <div class="col-12 shadow-sm px-0 px-md-3 mt-2 pt-1 pb-1">
                <div class="col-12 py-2 my-3 bg-light table-responsive font-small-xs" style="white-space: nowrap">
                    {{ Breadcrumbs::view('front.includes.breadcrumbs', 'front.pages.index') }}
                </div>
                {{-- End --}}
                <div class="col-12 row mx-0 px-0">
                    {{--Card starts from here--}}
                    @foreach($pages as $page)
                        <div class="col-xl-4 col-sm-6 pb-4 pt-5">
                            <div class="bg-white shadow border-radius custom-card">
                                <div class="w-100 row mx-0">
                                    <div class="col-1 px-0"></div>
                                    <div class="col-10">
                                        <a href="{{ route('front.pages.show', $page->slug) }}">
                                            @if(!is_null($page->image) )
                                                <div class="img-container border-radius shadow-sm"
                                                     style="background-image: url({{ url('storage/images/' . $page->image->name['original']) }})">
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-1 px-0 text-success small mt-4">
                                        <div class="rate bg-light position-absolute">
                                            <div>{{ $page->rate }}</div>
                                            <div>/</div>
                                            <div>۵</div>
                                        </div>
                                    </div>
                                    <div class="text-center w-100 pt-3">
                                        <a href="{{ route('front.pages.show', $page->slug) }}">
                                            <h3 class="h6 text-truncate px-1 text-dark">{{ $page->name }}</h3>
                                        </a>
                                        <div class="small text-muted">{{ $page->work_item->name }}</div>
                                        <div class="col-12 px-0 row mx-0 pt-1 pb-2">
                                            <div class="col-md-7 text-right small text-info pl-0">
                                                <a class="text-info"
                                                   href="{{ route('front.pages.index', ['province' => $page->address->city->province->id]) }}">استان
                                                    <span>{{ $page->address->city->province->name }}</span>
                                                </a>
                                            </div>
                                            <div class="col-md-5 text-left pr-0">
                                                @for($i=0;$i<$page->rate;$i++)
                                                    <img src="{{ asset('/images/static/star.svg') }}" alt="">
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{--***--}}
                    {{--If there is no card--}}
                    @if($pages->count() < 1)
                        <div class="w-100 text-center py-5">
                            <img src="{{ asset('images/static/not-found.png') }}" class="img-fluid">
                        </div>
                    @endif
                </div>
                {{ $pages->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
@stop

@push('css')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet"/>
    <style>
        .select2.select2-container.select2-container--default {
            width: 100% !important;
        }

        .select2-selection__arrow {
            display: none;
        }

        .select2-container .select2-selection--single, .select2-container--default .select2-selection--single .select2-selection__rendered {
            height: 35px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
        }

        .select2-container--default .select2-selection--single {
            border-radius: 8px;
        }

        .multi-show-container .custom-card:hover{
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.25) !important;
        }
    </style>
@endpush

@push('js')
    <script src="{{ asset('js/select2.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endpush

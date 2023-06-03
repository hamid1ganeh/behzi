@extends('front.layouts.main')

@section('content')
    @push('css')
        <style>
            .blur-bg:before {
                background-color: grey;
                background: url({{ $pageGallery->page->getPageImage() }});
                background-size: cover;
                background-position: center;
            }
        </style>
        <link href="{{ asset('light-gallery/css/lightgallery.css') }}" rel="stylesheet">
    @endpush
    @include('front.layouts.header')
    {{--End header--}}
    <div class="border-specifier bg-white"></div>
    <div class="w-100 blur-bg gallery">
        <div class="col-12 row mx-0 text-right head-title-container parent-height">
            <div class="col-3 col-lg-2"></div>
            <div class="col text-white pr-md-5 my-auto">
                <div>
                    <h1>{{ $pageGallery->getName() }}</h1>
                    <span class="pr-md-2">{{ $pageGallery->getNumberOfImages() }} مورد</span>
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
    <div class="main-container col-12 row mx-0 px-0 px-md-3 d-block min-height">
        <div class="col-12">
            <div class="col-2 px-0 text-lg-center">
                <img src="{{ $pageGallery->getAgentImage() }}" class="shadow-sm rounded position-absolute category-logo"
                     style="bottom: -1rem; z-index: 5;">
            </div>
        </div>

        <div class="col-12 pt-3">
            <div class="col-12 py-1 my-3 bg-grey table-responsive font-small-xs" style="white-space: nowrap">
                {!! Breadcrumbs::view('front.includes.breadcrumbs', 'front.pages.galleries.show', $pageGallery->page,$pageGallery) !!}
            </div>
            <div class="w-100 shadow-sm p-2 bg-white">
                <div class="col-12 pt-2 px-0 row mx-0 px-0 px-md-3">
                    <div class="float-right">
                        <img src="{{ asset('images/static/gallery.svg') }}" width="32" height="24" alt="Gallery">
                    </div>
                    <h2 class="h4 col px-0 mb-0 my-auto px-4">گالری تصاویر</h2>
                    <div class="col-3 text-left px-1 px-md-3">
                        <span class="btn-circle bg-light px-3 border py-1 small d-block d-md-inline text-center"><b
                                    class="px-1">{{$images->lastPage()}}</b>صفحه</span>
                    </div>
                </div>
                <hr class="mb-0">
                <div class="hover01 column col-12 row mx-0" id="lightgallery">
                {{--Loop starts from here--}}
                    @foreach($images as $pageGalleryImage)
                        <div class="col-6 col-md-3" data-src="{{ $pageGalleryImage->image->getImagePath('original') }}">
                            <figure>
                                <img data-src="{{ $pageGalleryImage->image->getImagePath('medium') }}"
                                     class="lazyload img-fluid"/>
                            </figure>
                        </div>
                    @endforeach
                {{--***--}}
                </div>

                {!! $images->render() !!}
            </div>
        </div>

    </div>

@stop
@push('js')
    <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
    <script src="{{ asset('light-gallery/js/lightgallery-all.min.js') }}"></script>
    <script>
        lazyload();
        $("#lightgallery").lightGallery();
    </script>
@endpush
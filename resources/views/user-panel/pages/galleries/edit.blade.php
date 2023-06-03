@extends('user-panel.master')
@section('content')
    <div class="col-lg-8 offset-lg-2" style="flex: auto">
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="col-12 rounded-top text-center" style="background-color: #eef2fd">
                <img src="{{ asset('images/static/new/gallery-create.png') }}" width="150">
                <h3 class="card-title pb-5">افزودن تصویر به گالری</h3>
            </div>
            <form class="form" action="{{ route('userPanel.pages.galleries.images.store',[$page->id,$pageGallery->id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-10">
                                <div class="form-group pt-0 pt-md-5">
                                    <label>تگ Title  : </label>
                                    <input type="text" name="title" class="form-control" placeholder="نام تصویر"/>
                                    <span class="form-text text-danger"> {{ $errors->first('title') }} </span>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>تگ Alt : </label>
                                    <input type="text" name="alt" class="form-control" placeholder="نام تصویر"/>
                                    <span class="form-text text-danger"> {{ $errors->first('alt') }} </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pt-3 d-flex justify-content-center">
                            <div class="col-md-9">
                                <cropper cropped-width="800" cropped-height="800"></cropper>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <span class="form-text text-danger err-container"> {{ $errors->first('image') }} </span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col d-flex justify-content-center row mx-0">
                            <button type="submit" class="btn btn-primary col-lg-4 mr-2">افزودن</button>
                            <a href="{{ route('userPanel.pages.galleries.index',$page->id) }}" class="btn btn-light col-lg-4 mr-2 mt-3 mt-lg-0">بازگشت به مدیریت گالری</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end::Card-->
        <div class="col-12 d-flex justify-content-center">
            <div class="col-md-12">
                <image-list :images="{{ $pageGalleryImages }}" image-url="{{ url('storage' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR ) }}" update-route="{{ route('userPanel.pages.galleries.sort', [$page, $pageGallery]) }}"></image-list>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.js') }}"></script>
    <script>
        $('#upload-preview').hide();
    </script>
@endsection
@section('css')
    <link href="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .handle{
            cursor: all-scroll;
        }
    </style>

@endsection
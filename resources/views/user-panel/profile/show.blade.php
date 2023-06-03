@extends('user-panel.master')
@section('content')
    <!--Dear shahin it begins from here ::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Profile Personal Information-->
            <div class="d-flex flex-row">
                <!--::Content-->
                <div class="flex-row-fluid ml-lg-8">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Header-->
                        <div class="card-header py-3">
                            <div class="card-title align-items-start flex-column">
                                <h3 class="card-label font-weight-bolder text-dark">اطلاعات شخصی</h3>
                                <span class="text-muted font-weight-bold font-size-sm mt-1">اطلاعات شخصی خود را بروزرسانی کنید</span>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->

                            <!--begin::Body-->
                            <div class="card-body row mx-0">

                                <div class="col-lg-4 border-right">
                                    <div class="form-group row">
                                        <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                        <div class="col-lg-9 col-xl-6">
                                            <form action="{{ route('userPanel.profile.setAvatar') }}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                {{ method_field('PATCH') }}
                                                <div class="col-md-12">
                                                    <cropper-single cropped-width="200" cropped-height="200" current-image="{{ $user->getAvatar() }}"/>
                                                </div>
                                                {{--<div class="image-input image-input-outline" id="kt_profile_avatar" style="background-image: url({{ asset('cp/assets/media/users/blank.png') }})">
                                                    <div class="image-input-wrapper" style=""></div>
                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="افزودن تصویر کاربر" data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="profile_avatar" onchange="setUserImage(this)" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="profile_avatar_remove">
                                                    </label>
                                                    <span onclick="removeUserImage()" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-danger btn-shadow" data-action="remove" data-toggle="tooltip" title="حذف تصویر">
                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                            </span>
                                                </div>--}}
                                                <span class="form-text text-muted mt-3">فرمت عکس های قابل قبول: png, jpg, jpeg.</span>
                                                <div class="col-12 text-center">
                                                    <input type="submit" class="btn btn-success py-1 mt-4" value="ذخیره عکس">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <form class="form" method="POST" action="{{ route('userPanel.profile.update') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PATCH') }}
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9">
                                                <h5 class="font-weight-bold mb-6">اطلاعات کاربر</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-lg-right">نام و نام‌خانوادگی</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control form-control-lg form-control-solid" name="name" type="text" value="{{ $user->name }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h5 class="font-weight-bold mt-10 mb-6">اطلاعات ارتباطی</h5>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label text-lg-right">شماره تماس</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="input-group input-group-lg input-group-solid">
                                                    <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="la la-phone"></i>
                                                            </span>
                                                    </div>
                                                    <input disabled style="cursor:not-allowed" type="text" class="form-control form-control-lg form-control-solid" value="{{ $user->mobile }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 row mx-0 d-flex justify-content-center">
                                        <div class="col-md-3 mb-3 mb-lg-0">
                                            <button class="w-100 btn btn-success" type="submit">ذخیره تغییرات</button>
                                        </div>
                                        <div class="col-md-3">
                                            <a class="w-100 btn btn-light border" href="">بازگشت</a>
                                        </div>
                                    </div>
                                    </form>
                                </div>

{{--                                <div class="form-group row">--}}
{{--                                    <label class="col-xl-3 col-lg-3 col-form-label text-lg-right">ایمیل</label>--}}
{{--                                    <div class="col-lg-9 col-xl-6">--}}
{{--                                        <div class="input-group input-group-lg input-group-solid">--}}
{{--                                            <div class="input-group-prepend">--}}
{{--                                                        <span class="input-group-text">--}}
{{--                                                            <i class="la la-at"></i>--}}
{{--                                                        </span>--}}
{{--                                            </div>--}}
{{--                                            <input disabled style="cursor:not-allowed" type="text" class="form-control form-control-lg form-control-solid" value="nick.bold@loop.com" />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>

                        <!--end::Form-->
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Profile Personal Information-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@stop

@section('css')
    <link href="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('js')
    <script src="{{ asset('cp/assets/plugins/custom/cropper/cropper.bundle.js') }}"></script>
    <script>
        function setUserImage(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('.image-input-wrapper').css('background-image', 'url('+e.target.result+')');
                    $('[name="profile_avatar_remove"]')[0].value = false;
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        function removeUserImage(){
            $('[name="profile_avatar_remove"]')[0].value = true;
            $('.image-input-wrapper').css('background-image', '');
        }
    </script>

    <script src="{{ asset('assets/js/pages/custom/profile/profile.js') }}"></script>
@endsection

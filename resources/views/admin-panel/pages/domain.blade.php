@extends('admin-panel.master')

@section('content')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b">
                        <div class="card-header bg-light-o-35">
                            <h3 class="card-title">فرم در خواست سایت اختصاصی</h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="form mb-0" action="{{ route('adminPanel.pages.domain.update',$page->id) }}" method="POST"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-lg-12 d-flex justify-content-center">
                                        <div class="col-lg-5 text-center">
                                            <img src="{{ asset('images/logo-samandehi.png') }}" class="img-fluid">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-4">
                                        <label for="title">عنوان سایت</label>
                                        <input name="title" id="title" type="text" class="form-control" placeholder="عنوان وب سایت" value="{{ $domain->detail->title ?? '' }}"/>
                                        <span class="form-text text-danger"> {{ $errors->first('title') }} </span>
                                    </div>

                                    <div class="col-lg-4 my-4">
                                        <label for="name">آدرس دامنه وب سایت :</label>
                                        <input name="name" id="name" type="text" class="form-control" value="{{ $domain->name ?? '' }}"/>
                                        <span class="form-text text-danger"> {{ $errors->first('name') }} </span>
                                    </div>
                                    
                                    <div class="col-lg-4 my-4">
                                        <label for="status">وضعیت</label>
                                        <div>
                                            <select class="form-control selectpicker" name="status" id="status" data-size="7">
                                                <option value="{{ \App\Enums\DomainStatus::Approved }}" {{ \App\Enums\DomainStatus::Approved == ($domain->status ?? '') ? 'selected' : '' }}>
                                                    تایید شده
                                                </option>
                                                <option value="{{ \App\Enums\DomainStatus::Pending }}" {{ \App\Enums\DomainStatus::Pending == ($domain->status ?? '')? 'selected' : '' }}>
                                                    در حال بررسی
                                                </option>
                                                <option value="{{ \App\Enums\DomainStatus::Changed }}" {{ \App\Enums\DomainStatus::Changed  == ($domain->status ?? '') ? 'selected' : '' }}>
                                                    تغییر
                                                </option>
                                                <option value="{{ \App\Enums\DomainStatus::Ban }}" {{ \App\Enums\DomainStatus::Ban == ($domain->status ?? '') ? 'selected' : '' }}>
                                                    مسدود شده
                                                </option>
                                            </select>
                                            <span class="form-text text-danger"> {{ $errors->first('status') }} </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-2">
                                        <label for="work_item_id">DNS1 :</label>
                                        <input name="dns1" type="text" class="form-control" value="{{ $domain->dns1 ?? '' }}"/>
                                        <div>
                                            <span class="form-text text-danger"> {{ $errors->first('dns1') }} </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-2">
                                        <label for="work_item_id">DNS2 :</label>
                                        <input name="dns2" type="text" class="form-control" value="{{ $domain->dns2 ?? '' }}"/>
                                        <div>
                                            <span class="form-text text-danger"> {{ $errors->first('dns2') }} </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mt-3">
                                        <label for="name">متن درباره ما :</label>
                                        <textarea class="form-control line-height-2" name="aboutUs" rows="10">{{ $domain->detail->aboutUs ?? '' }}</textarea>
                                        <span class="form-text text-danger"> {{ $errors->first('aboutUs') }} </span>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label for="name">متن قوانین سایت :</label>
                                        <textarea class="form-control line-height-2" name="privacyPolicy" rows="10">{{ $domain->detail->privacyPolicy ?? '' }}</textarea>
                                        <span class="form-text text-danger"> {{ $errors->first('privacyPolicy') }} </span>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer pt-3 pb-5 bg-light-o-55">
                                <div class="row">
                                    <div class="col-lg-6 mb-3 mb-lg-0">
                                        <b>اطلاعات مشتری</b>
                                        <hr class="mt-1">
                                        <div>شماره تماس: 091165165165</div>
                                    </div>
                                    <div class="col-lg-6 text-right d-flex align-items-end justify-content-lg-end justify-content-center">
                                        <span>
                                            <button type="submit" class="btn btn-primary mr-2 px-10">ذخیره</button>
                                            <button type="reset" class="btn btn-secondary px-10 ">انصراف</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection

@section('css')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css"/>
    <style scoped>
        .line-height-2{
            line-height: 2.5;
            color: black;
        }
        #cke_aboutUs,#cke_privacyPolicy ,.cke_inner, .cke_top{
            border-radius: 7px;
        }
        .cke_bottom{
            border-radius: 0 0 7px 7px;
        }
    </style>
@endsection

@section('script')
    <script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#start_date').persianDatepicker({
                initialValueType: 'gregorian',
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '#start_date_alt',
                formatPersian: false
            });
            $('#expire_date').persianDatepicker({
                initialValueType: 'gregorian',
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '#expire_date_alt',
                formatPersian: false
            });
        });
        //CKEDITOR
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
    </script>
@endsection
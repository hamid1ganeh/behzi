@extends('admin-panel.master')

@section('content')

    <div class="bg-white p-2 p-lg-3 col-12">
        <h2>نظردهنده: 09481155642
            <span class="float-right">
                <form action="" id="review-status" >
                    @csrf
                    <select class="custom-select bg-warning text-white border-0 py-2" style="height:31px">
                        <option value="0">فعال</option>
                        <option value="1">غیرفعال</option>
                    </select>
                </form>
            </span>
        </h2>
        <div>مخاطب: <span class="text-grey">پوکه معدنی ایران (رضا عباسی)</span></div>
        <hr>
        <div class="row mx-0">
            <span class="mx-lg-5">گروه امتیازی: صنعتی</span>
            <div class="">
                <div class="symbol symbol-light-success mr-3">
                    <span class="symbol-label font-size-sm shadow-sm w-auto px-2" style="height: 25px;">مکان: 3</span></div>
                <div class="symbol symbol-light-success mr-3">
                    <span class="symbol-label font-size-sm shadow-sm w-auto px-2" style="height: 25px;">برخورد: 3</span></div>
                <div class="symbol symbol-light-success mr-3">
                    <span class="symbol-label font-size-sm shadow-sm w-auto px-2" style="height: 25px;">انظباط در کار: 3</span></div>
                <div class="symbol symbol-light-success mr-3">
                    <span class="symbol-label font-size-sm shadow-sm w-auto px-2" style="height: 25px;">کیفیت: 3</span></div>
                <div class="symbol symbol-light-success mr-3">
                    <span class="symbol-label font-size-sm shadow-sm w-auto px-2" style="height: 25px;">زمان: 3</span></div>

            </div>
            <div class="ml-auto" style="white-space: nowrap">امتیاز میانگین: 3</div>
        </div>
    </div>
    <div class="bg-light p-2 p-lg-3 col-12">
        <div class="text-primary">13 مهر 1399 | 12:06</div>
        <p class="px-5 mt-3 font-weight-bold" style="line-height:2">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازمراهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
        <div class="bg-dark-o-65 text-white p-2 p-lg-3 col-12 mb-4 mt-7">
            <div><b>پاسخ مدیر کسب و کار:</b><span class="float-right">14 مهر 1399 | 10:32</span></div>
            <div>عذرخواهی میکنیم در اسرع وقت اصلاح میکنیم.</div>
            <div class="p-3 bg-light mt-4 text-dark">
                <div class="small text-dark-50">در جواب مدیر:<span class="float-right">16 آذر 1399 | 16:51</span></div>
                <p>ممنون</p>
            </div>
        </div>
    </div>
    <div class="col-12 py-5 text-center">
        <form action="" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger px-10">حذف</button>
        </form>
        <button type="submit" class="btn btn-warning px-5" form="review-status">ذخیره تغییرات</button>
        <a href="#" class="btn btn-light border border-secondary px-10">بازگشت</a>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css">
    <style>
        .fa-sort{
            font-size: 11px;
            position:absolute;
            left: 1.3rem;
            top:1rem;
            z-index: 2;
        }
        .show-reviews th{
            white-space: nowrap;
        }
        .reviews-table td{
            vertical-align: middle !important;
            font-size: 11px;
        }
        @media (max-width:992px){
            .border-top-xs{
                border-top:1px solid lightgrey;
            }
        }
    </style>
@stop

@section('script')
    <script>
        $(document).ready(function () {
            $('#operator').select2({width: '100%'});
        });
        function addReviewGroup(element){
            const form_inputs = `<div class="col-11 row mx-0 border-top-xs"><i style="right: -5px; top: 14px;" class="fa fa-circle fa-xs text-primary position-absolute"></i>
                                <div class="col-lg-4">
                                    <div class="form-group form-row">
                                        <label for="name" class="col-md-3 px-0 col-form-label text-md-right">عنوان بازخورد:</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" name="name[]" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form-row">
                                        <label for="description" class="col-md-2 col-form-label text-md-right">توضیحات:</label>
                                        <div class="col-lg-10">
                                            <textarea name="description[]" class="form-control" style="height:39px"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group form-row">
                                        <label for="status" class="col-md-4 px-0 col-form-label text-md-right">وضعیت</label>
                                        <div class="col-lg-8">
                                            <select name="status[]" id="status" class="custom-select pl-0">
                                                <option value="0">فعال</option>
                                                <option value="1">غیر فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            $(form_inputs).insertBefore(element);
        }
    </script>
@endsection
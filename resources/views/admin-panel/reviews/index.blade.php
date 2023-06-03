@extends('admin-panel.master')

@section('content')

    <h3> فیلتر
        <span><a class="btn text-info" data-toggle="collapse" href="#pro-filter" role="button" aria-expanded="false">
            <i class="fa fa-chevron-circle-down text-info"></i>
        </a></span></h3>
    <hr>
    <div class="collapse" id="pro-filter">
        <form id="filter-form">
            <div class="form-row">
                <div class="form-group col-12 col-md-6">
                    <label for="name">نام</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ request('name') }}">
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="statuses">وضعیت</label>
                    <select name="statuses[]" id="statuses" style="height:48px" multiple>
                        <option value="{{ \App\Enums\WorkCategoryStatus::Active }}" {{ in_array(\App\Enums\WorkCategoryStatus::Active, ( request('statuses') ?? [] )) ? 'selected' : '' }}>{{ trans('statuses/work_category.' . \App\Enums\WorkCategoryStatus::Active) }}</option>
                        <option value="{{ \App\Enums\WorkCategoryStatus::Inactive }}" {{ in_array(\App\Enums\WorkCategoryStatus::Inactive, ( request('statuses') ?? [] )) ? 'selected' : '' }}>{{ trans('statuses/work_category.' . \App\Enums\WorkCategoryStatus::Inactive) }}</option>
                    </select>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="created_at">ایجاد</label>
                    <div class="form-row">
                        <div class="col-12 col-md-6 input-group">
                            <div class="input-group-prepend form-group">
                                <span class="input-group-text">از</span>
                            </div>
                            <input id="created_at_from" name="created_at_from" type="text" placeholder="1394-01-01"
                                   class="form-control" value="{{ request('created_at_from') }}">
                        </div>
                        <div class="col-12 col-md-6 input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">تا</span>
                            </div>
                            <input id="created_at_to" name="created_at_to" type="text" placeholder="1396-01-01"
                                   class="form-control" value="{{ request('created_at_to') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="updated_at">بروزرسانی</label>
                    <div class="form-row">
                        <div class="col-12 col-md-6 input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">از</span>
                            </div>
                            <input id="updated_at_from" name="updated_at_from" type="text" placeholder="1394-01-01"
                                   class="form-control" value="{{ request('updated_at_from') }}">
                        </div>
                        <div class="col-12 col-md-6 input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">تا</span>
                            </div>
                            <input id="updated_at_to" name="updated_at_to" type="text" placeholder="1396-01-01"
                                   class="form-control" value="{{ request('updated_at_to') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group col-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-info col-lg-4">
                        <i class="fa fa-filter fa-sm"></i>
                        <span class="pr-2">فیلتر</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="bg-white p-2 table-responsive">

        <table class="table table-hover table-striped text-center show-reviews">
            <thead>
            <tr>
                <th>عنوان نظردهنده</th>
                <th>مخاطب</th>
                <th>وضعیت</th>
                <th>نام صفحه</th>
                <th>متن نظر</th>
                <th>امتیازات</th>
                <th>تاریخ ثبت</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="reviews-table">

                <tr>

                    <td>09115545544</td>
                    <td>رضا عباسی</td>
                    <td>فعال</td>
                    <td>پوکه معدنی عباسی</td>
                    <td class="text-truncate small" style="max-width: 150px;" title="کاربر گرامی هم اکنون شما علاوه بر دسترسی به بانک اطلاعات مشاغل می‌توانید کسب و کار خود را برای بهتر دیده شدن ، در سامانه‌ی بهزی به ثبت برسانید.">
                        کاربر گرامی هم اکنون شما علاوه بر دسترسی به بانک اطلاعات مشاغل می‌توانید کسب و کار خود را برای بهتر دیده شدن ، در سامانه‌ی بهزی به ثبت برسانید.
                    </td>
                    <td>
                        <div class="symbol-list">
                            <div class="symbol symbol-light mr-3">
                                <span class="symbol-label font-size-sm shadow-sm w-auto px-2" style="height:25px">مکان: 3</span>
                            </div>
                            <div class="symbol symbol-light mr-3">
                                <span class="symbol-label font-size-sm shadow-sm w-auto px-2" style="height:25px">کیفیت: 2</span>
                            </div>
                            <div class="symbol symbol-light mr-3">
                                <span class="symbol-label font-size-sm shadow-sm w-auto px-2" style="height:25px">زمان: 5</span>
                            </div>
                            <div class="symbol symbol-light mr-3">
                                <span class="symbol-label font-size-sm shadow-sm w-auto px-2" style="height:25px">کارایی: 5</span>
                            </div>
                            <div class="symbol symbol-light mr-3">
                                <span class="symbol-label font-size-sm shadow-sm w-auto px-2" style="height:25px">قیمت: 5</span>
                            </div>
                        </div>
                    </td>
                    <td>1399-10-10</td>
                    <td style="white-space: nowrap">
                        <a href="/admin/panel/reviews/show" class="p-3" title="مشاهده">
                            <i class="fa fa-eye text-primary"></i>
                        </a>
                        <a href="#" class="p-3" title="حذف">
                            <i class="fa fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>

            </tbody>
        </table>
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
            $('#statuses').select2({width: '100%'});
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
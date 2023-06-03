@extends('admin-panel.master')

@section('content')
    <a href="" class="btn btn-primary my-4" data-toggle="modal" data-target="#newReview">
        <i class="fa fa-plus"></i>
        <span>گروه بازخورد جدید</span>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="newReview" tabindex="-1" aria-labelledby="newReviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header py-3">
                    <h5 class="modal-title" id="newReviewLabel">گروه بازخورد جدید</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="new-review-group-form">
                        @csrf
                        <div class="col-12 row px-0">
                            <div class="col-md-4">
                                <div class="form-group form-row">
                                    <label for="name" class="col-2 col-form-label text-right">نام گروه</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="group_name" id="name" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group form-row">
                                    <label for="description" class="col-2 col-form-label text-right">توضیحات</label>
                                    <div class="col-10">
                                        <textarea name="description" class="form-control" style="height:39px"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12"><hr class="mt-0 border-primary"></div>
                        <div class="col-12 px-0 row mx-0">

                            <div class="col-11 row mx-0">
                                <i style="right: -5px; top: 14px;" class="fa fa-circle fa-xs text-primary position-absolute"></i>
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
                            </div>

                            <div class="col-1 d-flex justify-content-center align-items-end">
                                <img onclick="addReviewGroup(this.parentElement)" title="افزودن بازخورد" class="cursor-pointer" src="{{ asset('svg/plus-blue.svg') }}" width="35" style="min-width:29px">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary px-8" form="new-review-group-form">ذخیره</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="reviews" tabindex="-1" aria-labelledby="reviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header py-3">
                    <h5 class="modal-title" id="newReviewLabel">گروه بازخورد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="review-group-form">
                        @csrf
                        <div class="col-12 row mx-0 px-0 border-bottom" style="margin-bottom: 3px;">
                            <div class="col-md-4">
                                <div class="form-group form-row">
                                    <label for="name" class="col-2 col-form-label text-right">نام گروه</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="group_name" id="name" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group form-row">
                                    <label for="description" class="col-2 col-form-label text-right">توضیحات</label>
                                    <div class="col-10">
                                        <textarea name="description" class="form-control" style="height:39px"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-12 px-0 row mx-0">
                            {{--start loop--}}
                            <div class="col-12 row mx-0 border-top pt-5">

                                <div class="col-lg-4">
                                    <i style="right: -5px; top: 14px;" class="fa fa-circle fa-xs text-warning position-absolute"></i>
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
                                            <select name="status[]" id="status" class="custom-select pl-2">
                                                <option value="0">فعال</option>
                                                <option value="1">غیر فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End--}}
                            <div class="col-12 row mx-0 border-top pt-5">

                                <div class="col-lg-4">
                                    <i style="right: -5px; top: 14px;" class="fa fa-circle fa-xs text-warning position-absolute"></i>
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
                                            <select name="status[]" id="status" class="custom-select pl-2">
                                                <option value="0">فعال</option>
                                                <option value="1">غیر فعال</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning px-8" form="review-group-form">ویرایش</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white p-2 table-responsive">
        <table class="table table-hover table-striped text-center">
            <thead>
            <tr>
                <th>نام گروه</th>
                <th>وضعیت</th>
                <th>بازخورد ها</th>
                <th>توضیحات</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="reviews-table">

                <tr>
                    <td>صنعتی و فنی
{{--                        {{ $reviews->getName() }}--}}
                    </td>
                    <td>فعال
{{--                        {{ $reviews->getStatus() }}--}}
                    </td>
                    <td>
                        <div class="symbol-list">
                            <div class="symbol symbol-light-success mr-3">
                                <span class="symbol-label font-size-sm shadow-sm" style="height:25px">مکان</span>
                            </div>
                            <div class="symbol symbol-light mr-3">
                                <span class="symbol-label font-size-sm shadow-sm" style="height:25px">کیفیت</span>
                            </div>
                            <div class="symbol symbol-light-success mr-3">
                                <span class="symbol-label font-size-sm shadow-sm" style="height:25px">زمان</span>
                            </div>
                        </div>
                    </td>
                    <td class="text-truncate small" style="max-width: 150px;">
                        کاربر گرامی هم اکنون شما علاوه بر دسترسی به بانک اطلاعات مشاغل می‌توانید کسب و کار خود را برای بهتر دیده شدن ، در سامانه‌ی بهزی به ثبت برسانید.
                    </td>
                    <td>
                        <a href="#reviews" data-toggle="modal">
                            <i class="fa fa-eye text-warning"></i>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>پزشکی
                        {{--                        {{ $reviews->getName() }}--}}
                    </td>
                    <td>فعال
                        {{--                        {{ $reviews->getStatus() }}--}}
                    </td>
                    <td>
                        <div class="symbol-list">
                            <div class="symbol symbol-light-success mr-3">
                                <span class="symbol-label font-size-sm shadow-sm" style="height:25px">مکان</span>
                            </div>
                            <div class="symbol symbol-light mr-3">
                                <span class="symbol-label font-size-sm shadow-sm" style="height:25px">کیفیت</span>
                            </div>
                            <div class="symbol symbol-light-success mr-3">
                                <span class="symbol-label font-size-sm shadow-sm" style="height:25px">زمان</span>
                            </div>
                        </div>
                    </td>
                    <td class="text-truncate small" style="max-width: 150px;">
                        کاربر گرامی هم اکنون شما علاوه بر دسترسی به بانک اطلاعات مشاغل می‌توانید کسب و کار خود را برای بهتر دیده شدن ، در سامانه‌ی بهزی به ثبت برسانید.
                    </td>
                    <td>
                        <a href="#reviews" data-toggle="modal">
                            <i class="fa fa-eye text-warning"></i>
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
        .reviews-table td{
            vertical-align: middle !important;
        }
        @media (max-width:992px){
            .border-top-xs{
                border-top:1px solid lightgrey;
            }
            .reviews-table{
                font-size: 13px;
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
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


    <form id="bulk-operation-form">
        <h3>عملیات دسته جمعی</h3>
        <hr>
        <div class="form-row align-items-end">
            <div class="col-12 col-md-3 form-group">
                <label for="action">عمل</label>
                <select name="action" id="action" class="custom-select">
                    <option value="0">
                        <span>وضعیت : </span>
                        {{ trans('statuses/work_category.' . \App\Enums\WorkCategoryStatus::Active) }}
                    </option>

                    <option value="1">
                        <span>وضعیت : </span>
                        {{ trans('statuses/work_category.' . \App\Enums\WorkCategoryStatus::Inactive) }}
                    </option>

                </select>
            </div>

            <div class="col-3 form-group">
                <button type="submit" class="btn btn-dark px-lg-10">انجام</button>
            </div>
        </div>
    </form>


    <div class="clearfix py-2">
        <div class="float-left table-filters">
            <a href="?statuses[]={{ \App\Enums\WorkCategoryStatus::Active }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\WorkCategoryStatus::Active, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">
                فعال
            </a>
            <a href="?statuses[]={{ \App\Enums\WorkCategoryStatus::Inactive }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\WorkCategoryStatus::Inactive, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">
                غیر فعال
            </a>
            <a href="{{ route('adminPanel.work_categories.index') }}"
               class="page-link d-inline-block {{ request()->fullUrl() == route('adminPanel.work_categories.index') ? 'bg-warning text-white shadow' : 'text-dark' }}">همه</a>
        </div>

        <div class="float-right text-muted">{{ $workCategories->total() }}<span> آیتم دریافت شد</span></div>
    </div>

    <table class="table table-white table-striped table-hover table-bordered text-center table-responsive-md">
        <thead>
        <tr>
            <th>
                <input type="checkbox" id="bulk-operation-select-all">
            </th>
            <th>
                <span>نام</span>
                <div class="float-right px-2">
                    {!! display_sort_arrow('name') !!}
                </div>
            </th>
            <th>
                <span>وضعیت</span>
                <div class="float-right px-2">
                    {!! display_sort_arrow('status') !!}
                </div>
            </th>
            <th>
                <span>زیر دسته ها</span>
                <div class="float-right px-2">
                    {!! display_sort_arrow('work_items') !!}
                </div>
            </th>
            <th>
                <span>صفحه ها</span>
                <div class="float-right px-2">
                    {!! display_sort_arrow('pages') !!}
                </div>
            </th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($workCategories as $workCategory)
            <tr>
                <td>
                    <input type="checkbox" class="bulk-operation-item-select" name="bulk_operation_item_select[]"
                           form="bulk-operation-form" value="{{ $workCategory->getId() }}">
                </td>
                <td>{{ $workCategory->getName() }}</td>
                <td>{{ trans('statuses/work_category.' . $workCategory->getStatus()) }}</td>
                <td>{{ $workCategory->getNumberOfWorkItems() }}</td>
                <td>{{ $workCategory->getNumberOfPages() }}</td>
                <td>
                    <a class="btn  btn-icon" href="{{ route('adminPanel.work_categories.edit', $workCategory) }}">
                        <i class="fa fa-edit text-primary"></i>
                    </a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $workCategories->onEachSide(0)->withQueryString()->links() !!}
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css">
    <style>
        .select2-container .select2-selection--single,
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: calc(1.5em + 1.3rem + 2px)
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: normal
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #e5eaee;
        }

        .table-filters .page-link {
            min-width: 80px;
            text-align: center;
        }
    </style>
@stop
@section('script')
    <script>
        $(document).ready(function () {

            $('#statuses').select2({
                width: '100%'
            });

            $('#bulk-operation-select-all').on('change', function () {
                let isChecked = $(this).is(':checked');
                $('.bulk-operation-item-select').prop('checked', isChecked);
            })

        });

        form = $('#filter-form');

        form.on('submit', function () {
            form.find('input').each(function () {
                let input = $(this);
                if (!$(this).val()) {
                    input.prop('disabled', true);
                }
            });

            form.find('select').each(function () {
                let input = $(this);
                if (!$(this).val()) {
                    input.prop('disabled', true);
                }
            });
        });

    </script>
@endsection
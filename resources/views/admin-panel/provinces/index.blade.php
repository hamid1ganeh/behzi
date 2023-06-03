@extends('admin-panel.master')

@section('content')
    <h3>فیلتر</h3>
    <hr>
    <form id="filter-form">
        <div class="form-row">
            <div class="form-group col-12 col-md-6">
                <label for="name">نام</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ request('name') }}">
            </div>

            <div class="form-group col-12 col-md-6">
                <label for="statuses">وضعیت</label>
                <select name="statuses[]" id="statuses" multiple>
                    <option value="{{ \App\Enums\ProvinceStatus::Active }}" {{ in_array(\App\Enums\ProvinceStatus::Active, ( request('statuses') ?? [] )) ? 'selected' : '' }}>{{ trans('statuses/work_category.' . \App\Enums\ProvinceStatus::Active) }}</option>
                </select>
            </div>

            <div class="form-group col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-info col-lg-4">
                    <i class="fa fa-filter fa-sm"></i>
                    <span class="pr-2">فیلتر</span>
                </button>
            </div>
        </div>
    </form>

    <form id="bulk-operation-form">
        <h3>عملیات دسته جمعی</h3>
        <hr>
        <div class="form-row align-items-end">
            <div class="col-12 col-md-3 form-group">
                <label for="action">عمل</label>
                <select name="action" id="action" class="custom-select">
                    <option value="0">
                        <span>وضعیت : </span>
                        {{ trans('statuses/province.' . \App\Enums\ProvinceStatus::Active) }}
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
            <a href="?statuses[]={{ \App\Enums\ProvinceStatus::Active }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\ProvinceStatus::Active, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">
                فعال
            </a>
            <a href="{{ route('adminPanel.provinces.index') }}"
               class="page-link d-inline-block {{ request()->fullUrl() == route('adminPanel.provinces.index') ? 'bg-warning text-white shadow' : 'text-dark' }}">همه</a>
        </div>

        <div class="float-right text-muted">{{ $provinces->total() }}<span> آیتم دریافت شد</span></div>
    </div>

    <table class="table table-white table-striped table-hover table-bordered text-center table-responsive-md">
        <thead>
        <tr>
            <th>
                <input type="checkbox" id="bulk-operation-select-all">
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">نام</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('name') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">وضعیت</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('status') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">تعداد شهر</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('work_items') !!}
                </span>
            </th>

            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($provinces as $province)
            <tr>
                <td>
                    <input type="checkbox" class="bulk-operation-item-select" name="bulk_operation_item_select[]"
                           form="bulk-operation-form" value="{{ $province->getId() }}">
                </td>
                <td>{{ $province->getName() }}</td>
                <td>{{ trans('statuses/province.' . $province->getStatus()) }}</td>
                <td>{{ $province->getNumberOfCities() }}</td>
                <td>
                    <a class="btn  btn-icon" href="{{ route('adminPanel.provinces.edit', $province) }}">
                        <i class="fa fa-edit text-primary"></i>
                    </a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $provinces->onEachSide(0)->withQueryString()->links() !!}
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
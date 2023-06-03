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
                <div class="form-group col-12 col-md-4">
                    <label for="name">نام</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ request('name') }}">
                </div>

                <div class="form-group col-12 col-md-4">
                    <label for="email">ایمیل</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{ request('email') }}">
                </div>

                <div class="form-group col-12 col-md-4">
                    <label for="statuses">وضعیت</label>
                    <select name="statuses[]" id="statuses" style="height:48px" multiple>
                        <option value="{{ \App\Enums\AdminStatus::Pending }}" {{ in_array(\App\Enums\AdminStatus::Pending, ( request('statuses') ?? [] )) ? 'selected' : '' }}>{{ trans('statuses/admin.' . \App\Enums\AdminStatus::Pending) }}</option>
                        <option value="{{ \App\Enums\AdminStatus::Active }}" {{ in_array(\App\Enums\AdminStatus::Active, ( request('statuses') ?? [] )) ? 'selected' : '' }}>{{ trans('statuses/admin.' . \App\Enums\AdminStatus::Active) }}</option>
                        <option value="{{ \App\Enums\AdminStatus::Ban }}" {{ in_array(\App\Enums\AdminStatus::Ban, ( request('statuses') ?? [] )) ? 'selected' : '' }}>{{ trans('statuses/admin.' . \App\Enums\AdminStatus::Ban) }}</option>
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
                        {{ trans('statuses/admin.' . \App\Enums\AdminStatus::Pending) }}
                    </option>

                    <option value="1">
                        <span>وضعیت : </span>
                        {{ trans('statuses/admin.' . \App\Enums\AdminStatus::Active) }}
                    </option>

                    <option value="2">
                        <span>وضعیت : </span>
                        {{ trans('statuses/admin.' . \App\Enums\AdminStatus::Ban) }}
                    </option>

                    <option value="3">حذف</option>

                    <option value="4">بازیابی</option>
                </select>
            </div>

            <div class="col-3 form-group">
                <button type="submit" class="btn btn-dark px-lg-10">انجام</button>
            </div>
        </div>
    </form>


    <div class="clearfix py-2">
        <div class="float-left table-filters">
            <a href="?garbage_status=deleted"
               class="page-link d-inline-block {{ request()->get('garbage_status') == 'deleted' ? 'bg-dark text-light shadow' : 'text-dark' }}">حذف
                شده</a>
            <a href="?garbage_status=un-deleted"
               class="page-link d-inline-block {{ request()->get('garbage_status') == 'un-deleted' ? 'bg-dark text-light shadow' : 'text-dark' }}">حذف
                نشده</a>
            <a href="?statuses[]={{ \App\Enums\AdminStatus::Pending }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\AdminStatus::Pending, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">
                {{ trans('statuses/admin.' . \App\Enums\AdminStatus::Pending) }}
            </a>
            <a href="?statuses[]={{ \App\Enums\AdminStatus::Active }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\AdminStatus::Active, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">
                {{ trans('statuses/admin.' . \App\Enums\AdminStatus::Active) }}
            </a>
            <a href="?statuses[]={{ \App\Enums\AdminStatus::Ban }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\AdminStatus::Ban, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">
                {{ trans('statuses/admin.' . \App\Enums\AdminStatus::Ban) }}
            </a>
            <a href="{{ route('adminPanel.admins.index') }}"
               class="page-link d-inline-block {{ request()->fullUrl() == route('adminPanel.admins.index') ? 'bg-warning text-white shadow' : 'text-dark' }}">همه</a>
        </div>

        <div class="float-right text-muted">{{ $admins->total() }}<span> آیتم دریافت شد</span></div>
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
                <span>ایمیل</span>
                <div class="float-right px-2">
                    {!! display_sort_arrow('email') !!}
                </div>
            </th>
            <th>
                <span>وضعیت</span>
                <div class="float-right px-2">
                    {!! display_sort_arrow('status') !!}
                </div>
            </th>
            <th>
                <span>ایجاد</span>
                <div class="float-right px-2">
                    {!! display_sort_arrow('created_at') !!}
                </div>
            </th>
            <th>
                <span>بروزرسانی</span>
                <div class="float-right px-2">
                    {!! display_sort_arrow('updated_at') !!}
                </div>
            </th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $user)
            <tr>
                <td>
                    <input type="checkbox" class="bulk-operation-item-select" name="bulk_operation_item_select[]"
                           form="bulk-operation-form" value="{{ $user->getId() }}">
                </td>
                <td>{{ $user->getName() }}</td>
                <td>{{ $user->getEmail() }}</td>
                <td>{{ trans('statuses/admin.' . $user->getStatus()) }}</td>
                <td>{{ \Morilog\Jalali\Jalalian::forge($user->created_at)->format('Y-m-d') }}</td>
                <td>{{ \Morilog\Jalali\Jalalian::forge($user->updated_at)->format('Y-m-d') }}</td>
                <td>
                    <a class="btn  btn-icon" href="{{ route('adminPanel.admins.edit', $user) }}">
                        <i class="fa fa-edit text-primary"></i>
                    </a>


                    @if($user->trashed())
                        <form action="{{ route('adminPanel.admins.recycle', $user) }}"
                              method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn  btn-icon"><i class="fa fa-recycle text-danger"></i>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('adminPanel.admins.destroy', $user) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn  btn-icon"><i class="fa fa-trash text-danger"></i></button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $admins->onEachSide(0)->withQueryString()->links() !!}
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
@extends('admin-panel.master')

@section('content')
    <h3>فیلتر</h3>
    <hr>
    <form id="filter-form">
        <div class="form-row">
            <div class="form-group col-12 col-md-6 col-lg-3">
                <label for="name">نام</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ request('name') }}">
            </div>

            <div class="form-group col-12 col-md-6 col-lg-3">
                <label for="creator">سازنده</label>
                <input type="text" id="creator" name="creator" class="form-control" value="{{ request('creator') }}" placeholder="09121234565">
            </div>

            <div class="form-group col-12 col-md-6 col-lg-3">
                <label for="levels">سطح</label>
                <select name="levels[]" id="levels" style="height:48px" multiple>
                    <option value="{{ \App\Enums\PageLevel::VIP }}" {{ in_array(\App\Enums\PageLevel::VIP, ( request('levels') ?? [] )) ? 'selected' : '' }}>
                        {{ trans('statuses/page_level.' . \App\Enums\PageLevel::VIP) }}
                    </option>
                    <option value="{{ \App\Enums\PageLevel::Simple }}" {{ in_array(\App\Enums\PageLevel::Simple, ( request('levels') ?? [] )) ? 'selected' : '' }}>
                        {{ trans('statuses/page_level.' . \App\Enums\PageLevel::Simple) }}
                    </option>
                </select>
            </div>

            <div class="form-group col-12 col-md-6 col-lg-3">
                <label for="statuses">وضعیت</label>
                <select name="statuses[]" id="statuses" style="height:48px" multiple>
                    <option value="{{ \App\Enums\PageStatus::Active }}" {{ in_array(\App\Enums\PageStatus::Active, ( request('statuses') ?? [] )) ? 'selected' : '' }}>
                        {{ trans('statuses/page.' . \App\Enums\PageStatus::Active) }}
                    </option>
                    <option value="{{ \App\Enums\PageStatus::Inactive }}" {{ in_array(\App\Enums\PageStatus::Inactive, ( request('statuses') ?? [] )) ? 'selected' : '' }}>
                        {{ trans('statuses/page.' . \App\Enums\PageStatus::Inactive) }}
                    </option>
                    <option value="{{ \App\Enums\PageStatus::Pending }}" {{ in_array(\App\Enums\PageStatus::Pending, ( request('statuses') ?? [] )) ? 'selected' : '' }}>
                        {{ trans('statuses/page.' . \App\Enums\PageStatus::Pending) }}
                    </option>
                    <option value="{{ \App\Enums\PageStatus::Ban }}" {{ in_array(\App\Enums\PageStatus::Ban, ( request('statuses') ?? [] )) ? 'selected' : '' }}>
                        {{ trans('statuses/page.' . \App\Enums\PageStatus::Ban) }}
                    </option>
                </select>
            </div>

            <div class="collapse w-100 row mx-0" id="pro-filter">
                <div class="form-group col-12 col-md-6 col-lg-3">
                    <label for="work_categories">دسته</label>
                    <select name="work_categories[]" id="work_categories" style="height:48px" multiple>
                        @foreach(\App\Models\WorkCategory::all() as $workCategory)
                            <option value="{{ $workCategory->getId() }}" {{ in_array($workCategory->getId(), ( request('work_categories') ?? [] )) ? 'selected' : '' }}>
                                {{ $workCategory->getName() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12 col-md-6 col-lg-3">
                    <label for="work_items">زیردسته</label>
                    <select name="work_items[]" id="work_items" style="height:48px" multiple>
                        @foreach(\App\Models\WorkItem::all() as $work_item)
                            <option value="{{ $work_item->getId() }}" {{ in_array($work_item->getId(), ( request('work_items') ?? [] )) ? 'selected' : '' }}>
                                {{ $work_item->getName() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12 col-md-6 col-lg-3">
                    <label for="provinces">استان</label>
                    <select name="provinces[]" id="provinces" style="height:48px" multiple>
                        @foreach(\App\Models\Province::all() as $province)
                            <option value="{{ $province->getId() }}" {{ in_array($province->getId(), ( request('provinces') ?? [] )) ? 'selected' : '' }}>
                                {{ $province->getName() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12 col-md-6 col-lg-3">
                    <label for="cities">شهر</label>
                    <select name="cities[]" id="cities" style="height:48px" multiple>
                        @foreach(\App\Models\City::all() as $city)
                            <option value="{{ $city->getId() }}" {{ in_array($city->getId(), ( request('cities') ?? [] )) ? 'selected' : '' }}>
                                {{ $city->getName() }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-12 col-md-6 mb-md-0 col-lg-4">
                    <label for="start_date">شروع</label>
                    <div class="form-row">
                        <div class="col-12 col-md-6 input-group">
                            <div class="input-group-prepend form-group">
                                <span class="input-group-text">از</span>
                            </div>
                            <input id="start_date_from" name="start_date_from" type="text" placeholder="1394-01-01"
                                   class="form-control" value="{{ request('start_date_from') }}">
                        </div>
                        <div class="col-12 col-md-6 input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">تا</span>
                            </div>
                            <input id="start_date_to" name="start_date_to" type="text" placeholder="1396-01-01"
                                   class="form-control" value="{{ request('created_at_to') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group col-12 col-md-6 mb-md-0 col-lg-4">
                    <label for="expire_date">انقضا</label>
                    <div class="form-row">
                        <div class="col-12 col-md-6 input-group">
                            <div class="input-group-prepend form-group">
                                <span class="input-group-text">از</span>
                            </div>
                            <input id="expire_date_from" name="expire_date_from" type="text" placeholder="1394-01-01"
                                   class="form-control" value="{{ request('expire_date_from') }}">
                        </div>
                        <div class="col-12 col-md-6 input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">تا</span>
                            </div>
                            <input id="expire_date_to" name="expire_date_to" type="text" placeholder="1396-01-01"
                                   class="form-control" value="{{ request('expire_date_to') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group col-12 col-md-6 mb-md-0 col-lg-4">
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
            </div>

            <div class="form-group col-12 d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-info col-lg-4 offset-lg-4">
                    <i class="fa fa-filter fa-sm"></i>
                    <span class="pr-2">فیلتر</span>
                </button>
                <div class="col-lg-4 text-right">
                    <a class="btn text-info" data-toggle="collapse" href="#pro-filter" role="button" aria-expanded="false">
                        فیلتر پیشرفته<i class="fa fa-chevron-down px-1" style="font-size: 10px;color:inherit"></i>
                    </a>
                </div>
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
                        {{ trans('statuses/page.' . \App\Enums\PageStatus::Active) }}
                    </option>

                    <option value="1">
                        <span>وضعیت : </span>
                        {{ trans('statuses/page.' . \App\Enums\PageStatus::Inactive) }}
                    </option>

                    <option value="2">
                        <span>وضعیت : </span>
                        {{ trans('statuses/page.' . \App\Enums\PageStatus::Pending) }}
                    </option>

                    <option value="3">
                        <span>وضعیت : </span>
                        {{ trans('statuses/page.' . \App\Enums\PageStatus::Ban) }}
                    </option>

                    <option value="4">حذف</option>

                    <option value="5">بازیابی</option>
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
            <a href="?statuses[]={{ \App\Enums\PageStatus::Active }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\PageStatus::Active, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">فعال
            </a>
            <a href="?statuses[]={{ \App\Enums\PageStatus::Inactive }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\PageStatus::Inactive, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">غیر فعال
            </a>
            <a href="?statuses[]={{ \App\Enums\PageStatus::Pending }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\PageStatus::Pending, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">در انتظار
            </a>
            <a href="?statuses[]={{ \App\Enums\PageStatus::Ban }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\PageStatus::Ban, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">معلق
            </a>
            <a href="{{ route('adminPanel.pages.index') }}"
               class="page-link d-inline-block {{ request()->fullUrl() == route('adminPanel.pages.index') ? 'bg-warning text-white shadow' : 'text-dark' }}">همه</a>
        </div>

        <div class="float-right text-muted">{{ $pages->total() }}<span> آیتم دریافت شد</span></div>
    </div>

    <table class="table table-white table-striped table-hover table-bordered text-center table-responsive font-size-lg">
        <thead>
        <tr>
            <th>
                <input type="checkbox" id="bulk-operation-select-all">
            </th>
            <th class="px-8"></th>
            <th class="position-relative px-29">
                <span class="mx-3">نام</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('name') !!}
                </span>
            </th>
            <th class="px-3">سایت</th>
            <th class="position-relative px-5">
                <span class="mx-3">انقضا</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('expire_date') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">سازنده</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('creator') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">دسته</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('work_category') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">زیردسته</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('work_item') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">وضعیت</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('status') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">استان</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('province') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">شهر</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('city') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">سطح</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('level') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">رتبه</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('rate') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">شروع</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('start_date') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">بروزرسانی</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('updated_at') !!}
                </span>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
            <tr class="position-relative">
                <td class="text-left">
                    <input type="checkbox" class="bulk-operation-item-select" name="bulk_operation_item_select[]"
                           form="bulk-operation-form" value="{{ $page->getId() }}">
                </td>
                <td></td>
                <td class="position-relative">{{ $page->getName() }}
                    <div class="position-absolute on-hover-tools">
                        <div role="group" class="btn-group">
                            <a href="{{ route('adminPanel.pages.edit', $page) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm"><span class="svg-icon svg-icon-md svg-icon-primary"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect> <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path> <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path></g></svg></span></a>
                            @if($page->trashed())
                                <form action="{{ route('adminPanel.pages.recycle', $page) }}"
                                      method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-icon btn-light btn-hover-primary btn-sm rounded-0"><i class="fa fa-recycle text-danger"></i></button>
                                </form>
                            @else
                                <form action="{{ route('adminPanel.pages.delete', $page) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-icon btn-light btn-hover-primary btn-sm rounded-0"><i class="fa fa-trash text-danger"></i></button>
                                </form>
                            @endif
                            <a href="{{ route('adminPanel.galleries.index', ['pages[]' => $page->getId() ]) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm"><i class="fa fa-eye text-success"></i></a>
                        </div>
                    </div>
                </td>
                <td><a href="{{ route('adminPanel.pages.domain.edit',$page->id) }}"><i class="fa fa-globe text-warning"></i></a></td>
                <td>{{ \Morilog\Jalali\Jalalian::forge($page->expire_date)->format('Y-m-d') }}</td>
                <td>{{ $page->getOwner()->getMobile() }}</td>
                <td>{{ $page->work_category->getName() }}</td>
                <td>{{ $page->work_item->getName() }}</td>
                <td>{{ trans('statuses/page.' . $page->getStatus()) }}</td>
                <td>{{ $page->address->province->getName() }}</td>
                <td>{{ $page->address->city->getName() }}</td>
                <td>{{ trans('statuses/page_level.' . $page->getLevel()) }}</td>
                <td>{{ $page->getRate() }}</td>
                <td>{{ \Morilog\Jalali\Jalalian::forge($page->start_date)->format('Y-m-d') }}</td>
                <td>{{ \Morilog\Jalali\Jalalian::forge($page->updated_at)->format('Y-m-d') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $pages->onEachSide(0)->withQueryString()->links() !!}
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css">
    <style>
        td{
            white-space: nowrap
        }
        tr td .on-hover-tools{
            display: none;
            top:10%;
            z-index: 9;
            right:-52px;
        }
        tr:hover > td .on-hover-tools{
            display: block;
        }
        .select2-container .select2-selection--single,
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            height:calc(1.5em + 1.3rem + 2px)
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered{
            line-height:normal
        }
        .select2-container--default .select2-selection--single{
            border: 1px solid #e5eaee;
        }
        .table-filters .page-link{
            min-width: 80px;
            text-align: center;
        }
        .border-radius-r-0{
            border-bottom-right-radius: 0 !important;
            border-top-right-radius: 0 !important;
        }
    </style>
@stop
@section('script')
    <script>
        $(document).ready(function () {

            $('#levels').select2({
                width: '100%'
            });

            $('#work_categories').select2({
                width: '100%'
            });

            $('#work_items').select2({
                width: '100%'
            });

            $('#provinces').select2({
                width: '100%'
            });

            $('#cities').select2({
                width: '100%'
            });

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
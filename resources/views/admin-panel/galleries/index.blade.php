@extends('admin-panel.master')

@section('content')
    <h3>فیلتر</h3>
    <hr>
    <form id="filter-form">
        <div class="form-row">
            <div class="form-group col-12 col-md-4">
                <label for="name">نام</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ request('name') }}">
            </div>
            <div class="form-group col-12 col-md-4">
                <label for="statuses">وضعیت</label>
                <select name="statuses[]" id="statuses" style="height:48px" multiple>
                    <option value="{{ \App\Enums\PageGalleryStatus::Approved }}" {{ in_array(\App\Enums\PageGalleryStatus::Approved, ( request('statuses') ?? [] )) ? 'selected' : '' }}>
                        {{ trans('statuses/page_gallery.' . \App\Enums\PageGalleryStatus::Approved) }}
                    </option>
                    <option value="{{ \App\Enums\PageGalleryStatus::Pending }}" {{ in_array(\App\Enums\PageGalleryStatus::Pending, ( request('statuses') ?? [] )) ? 'selected' : '' }}>
                        {{ trans('statuses/page_gallery.' . \App\Enums\PageGalleryStatus::Pending) }}
                    </option>
                    <option value="{{ \App\Enums\PageGalleryStatus::Ban }}" {{ in_array(\App\Enums\PageGalleryStatus::Ban, ( request('statuses') ?? [] )) ? 'selected' : '' }}>
                        {{ trans('statuses/page_gallery.' . \App\Enums\PageGalleryStatus::Ban) }}
                    </option>
                </select>
            </div>

            <div class="form-group col-12 col-md-4">
                <label for="pages">صفحه</label>
                <select name="pages[]" id="pages" style="height:48px" multiple>
                    @foreach($pages as $page)
                        <option value="{{ $page->getId() }}" {{ in_array($page->getId(), ( request('pages') ?? [] )) ? 'selected' : '' }}>{{ $page->getName() }}</option>
                    @endforeach
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

    <form id="bulk-operation-form">
        <h3>عملیات دسته جمعی</h3>
        <hr>
        <div class="form-row align-items-end">
            <div class="col-12 col-md-3 form-group">
                <select name="action" id="action" class="custom-select">
                    <option value="0">
                        <span>وضعیت : </span>
                        {{ trans('statuses/page_gallery.' . \App\Enums\PageGalleryStatus::Approved) }}
                    </option>

                    <option value="1">
                        <span>وضعیت : </span>
                        {{ trans('statuses/page_gallery.' . \App\Enums\PageGalleryStatus::Pending) }}
                    </option>

                    <option value="2">
                        <span>وضعیت : </span>
                        {{ trans('statuses/page_gallery.' . \App\Enums\PageGalleryStatus::Ban) }}
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
        <div class="float-left">
            <a href="?garbage_status=deleted"
               class="page-link d-inline-block {{ request()->get('garbage_status') == 'deleted' ? 'bg-dark text-light shadow' : 'text-dark' }}">حذف
                شده</a>
            <a href="?garbage_status=un-deleted"
               class="page-link d-inline-block {{ request()->get('garbage_status') == 'un-deleted' ? 'bg-dark text-light shadow' : 'text-dark' }}">حذف
                نشده</a>
            <a href="?statuses[]={{ \App\Enums\PageGalleryStatus::Approved }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\PageGalleryStatus::Approved, (request()->get('statuses') ?? [])) ? 'bg-dark text-light shadow' : 'text-dark' }}">تایید
                شده
            </a>
            <a href="?statuses[]={{ \App\Enums\PageGalleryStatus::Pending }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\PageGalleryStatus::Pending, (request()->get('statuses') ?? [])) ? 'bg-dark text-light shadow' : 'text-dark' }}">در
                انتظار
            </a>
            <a href="?statuses[]={{ \App\Enums\PageGalleryStatus::Ban }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\PageGalleryStatus::Ban, (request()->get('statuses') ?? [])) ? 'bg-dark text-light shadow' : 'text-dark' }}">معلق
            </a>
            <a href="{{ route('adminPanel.gallery_images.index') }}"
               class="page-link d-inline-block {{ request()->fullUrl() == route('adminPanel.galleries.index') ? 'bg-dark text-light shadow' : 'text-dark' }}">همه</a>
        </div>

        <div class="float-right text-muted">{{ $galleries->total() }}<span> آیتم دریافت شد</span></div>
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
                <span class="mx-3">صفحه</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('page') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">تعداد تصاویر</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('number_of_images') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">ایجاد</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('created_at') !!}
                </span>

            </th>
            <th class="position-relative px-5">
                <span class="mx-3">بروزرسانی</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('updated_at') !!}
                </span>

            </th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($galleries as $gallery)
            <tr>
                <td>
                    <input type="checkbox" class="bulk-operation-item-select" name="bulk_operation_item_select[]"
                           form="bulk-operation-form" value="{{ $gallery->getId() }}">
                </td>
                <td>{{ $gallery->getName() }}</td>
                <td>{{ trans('statuses/page_gallery.' . $gallery->getStatus()) }}</td>
                <td>{{ $gallery->page->getName() }}</td>
                <td>{{ $gallery->getNumberOfImages() }}</td>
                <td>{{ \Morilog\Jalali\Jalalian::forge($gallery->created_at)->format('Y-m-d') }}</td>
                <td>{{ \Morilog\Jalali\Jalalian::forge($gallery->updated_at)->format('Y-m-d') }}</td>
                <td>
                    <a class="btn  btn-icon" type="button" data-toggle="modal"
                       data-target="#{{ 'galleryEditModal-' . $gallery->getId() }}">
                        <i class="fa fa-edit text-primary"></i>
                    </a>


                    <!-- Modal -->
                    <div class="modal fade" id="{{ 'galleryEditModal-' . $gallery->getId() }}" tabindex="-1"
                         aria-labelledby="{{ 'galleryEditModal-' . $gallery->getId() . '-Label' }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="{{ 'galleryEditModal-' . $gallery->getId() . '-Label' }}">بروزرسانی
                                        گالری</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('adminPanel.galleries.update', $gallery) }}"
                                          method="POST" id="{{ 'gallery-edit-form-' . $gallery->getId() }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-row">
                                            <div class="form-group col-12 form-row">
                                                <label for="name" class="col-2 col-form-label">نام گالری</label>
                                                <div class="col-10">
                                                    <input type="text" value="{{ $gallery->getName() }}" id="name"
                                                           name="name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-12 form-row">
                                                <label for="{{ 'status-' . $gallery->getId() }}"
                                                       class="col-2 col-form-label">وضعیت</label>
                                                <div class="col-10">
                                                    <select name="status" id="{{ 'status-' . $gallery->getId() }}"
                                                            class="custom-select">
                                                        <option value="{{ \App\Enums\PageGalleryStatus::Approved }}"
                                                                {{ $gallery->getStatus() == \App\Enums\PageGalleryStatus::Approved ? 'selected' : ''}}
                                                        >
                                                            {{ trans('statuses/page_gallery.' . \App\Enums\PageGalleryStatus::Approved) }}
                                                        </option>

                                                        <option value="{{ \App\Enums\PageGalleryStatus::Pending }}"
                                                                {{ $gallery->getStatus() == \App\Enums\PageGalleryStatus::Pending ? 'selected' : ''}}
                                                        >
                                                            {{ trans('statuses/page_gallery.' . \App\Enums\PageGalleryStatus::Pending) }}
                                                        </option>

                                                        <option value="{{ \App\Enums\PageGalleryStatus::Ban }}"
                                                                {{ $gallery->getStatus() == \App\Enums\PageGalleryStatus::Ban ? 'selected' : ''}}
                                                        >
                                                            {{ trans('statuses/page_gallery.' . \App\Enums\PageGalleryStatus::Ban) }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                                    <button type="submit" class="btn btn-primary"
                                            form="{{ 'gallery-edit-form-' . $gallery->getId() }}">بروزرسانی
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a class="btn btn-icon"
                       href="{{ route('adminPanel.gallery_images.index', ['galleries[]'=> $gallery->getId()]) }}">
                        <i class="fa fa-images text-dark"></i>
                    </a>

                    @if($gallery->trashed())
                        <form action="{{ route('adminPanel.galleries.recycle', $gallery) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            <button type="submit" class="btn  btn-icon"><i class="fa fa-recycle text-danger"></i>
                            </button>
                        </form>
                    @else
                        <form action="{{ route('adminPanel.galleries.destroy', $gallery) }}"
                              method="POST"
                              class="d-inline">
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
        {!! $galleries->onEachSide(0)->withQueryString()->links() !!}
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
    </style>

@stop

@section('script')
    <script>
        $(document).ready(function () {

            $('#pages').select2({
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
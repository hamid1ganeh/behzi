@extends('admin-panel.master')

@section('content')
    <h3>فیلتر</h3>
    <hr>
    <form id="filter-form">
        <div class="form-row">
            <div class="form-group col-12 col-md-6">
                <label for="title">عنوان</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ request('title') }}">
            </div>

            <div class="form-group col-12 col-md-6">
                <label for="alt">متن جایگزین</label>
                <input type="text" id="alt" name="alt" class="form-control" value="{{ request('alt') }}">
            </div>

            <div class="collapse w-100 row mx-0" id="pro-filter">
                <div class="form-group col-12 col-md-6">
                    <label for="statuses">وضعیت</label>
                    <select name="statuses[]" id="statuses" multiple>
                        <option value="{{ \App\Enums\PageGalleryStatus::Approved }}" {{ in_array(\App\Enums\PageGalleryStatus::Approved, ( request('statuses') ?? [] )) ? 'selected' : '' }}>{{ trans('statuses/page_gallery_image.' . \App\Enums\PageGalleryStatus::Approved) }}</option>
                        <option value="{{ \App\Enums\PageGalleryStatus::Pending }}" {{ in_array(\App\Enums\PageGalleryStatus::Pending, ( request('statuses') ?? [] )) ? 'selected' : '' }}>{{ trans('statuses/page_gallery_image.' . \App\Enums\PageGalleryStatus::Pending) }}</option>
                        <option value="{{ \App\Enums\PageGalleryStatus::Ban }}" {{ in_array(\App\Enums\PageGalleryStatus::Ban, ( request('statuses') ?? [] )) ? 'selected' : '' }}>{{ trans('statuses/page_gallery_image.' . \App\Enums\PageGalleryStatus::Ban) }}</option>
                    </select>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="galleries">گالری</label>
                    <select name="galleries[]" id="galleries" multiple>
                        @foreach($galleries as $gallery)
                            <option value="{{ $gallery->getId() }}" {{ in_array($gallery->getId(), ( request('pages') ?? [] )) ? 'selected' : '' }}>{{ $gallery->getName() }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-md-0 col-12 col-md-6">
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

                <div class="form-group mb-md-0 col-12 col-md-6">
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

            <div class="form-group col-12 d-flex justify-content-center mt-md-3">
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
                        {{ trans('statuses/page_gallery_image.' . \App\Enums\PageGalleryImageStatus::Approved) }}
                    </option>

                    <option value="1">
                        <span>وضعیت : </span>
                        {{ trans('statuses/page_gallery_image.' . \App\Enums\PageGalleryImageStatus::Pending) }}
                    </option>

                    <option value="2">
                        <span>وضعیت : </span>
                        {{ trans('statuses/page_gallery_image.' . \App\Enums\PageGalleryImageStatus::Ban) }}
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
            <a href="?statuses[]={{ \App\Enums\PageGalleryImageStatus::Approved }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\PageGalleryImageStatus::Approved, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">تایید
                شده
            </a>
            <a href="?statuses[]={{ \App\Enums\PageGalleryImageStatus::Pending }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\PageGalleryImageStatus::Pending, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">در
                انتظار
            </a>
            <a href="?statuses[]={{ \App\Enums\PageGalleryImageStatus::Ban }}"
               class="page-link d-inline-block {{ in_array(\App\Enums\PageGalleryImageStatus::Ban, (request()->get('statuses') ?? [])) ? 'bg-warning text-white shadow' : 'text-dark' }}">معلق
            </a>
            <a href="{{ route('adminPanel.gallery_images.index') }}"
               class="page-link d-inline-block {{ request()->fullUrl() == route('adminPanel.gallery_images.index') ? 'bg-warning text-white shadow' : 'text-dark' }}">همه</a>
        </div>

        <div class="float-right text-muted">{{ $images->total() }}<span> آیتم دریافت شد</span></div>
    </div>

    <table class="table table-white table-striped table-hover table-bordered text-center table-responsive-md">
        <thead>
        <tr>
            <th>
                <input type="checkbox" id="bulk-operation-select-all">
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">گالری</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('gallery') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">وضعیت</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('status') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">عنوان</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('title') !!}
                </span>
            </th>
            <th class="position-relative px-5">
                <span class="mx-3">متن جایگزین</span>
                <span class="position-absolute">
                    {!! display_sort_arrow('alt') !!}
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
        @foreach($images as $image)
            <tr>
                <td>
                    <input type="checkbox" class="bulk-operation-item-select" name="bulk_operation_item_select[]"
                           form="bulk-operation-form" value="{{ $image->getId() }}">
                </td>
                <td>{{ $image->page_gallery->getName() }}</td>
                <td>{{ trans('statuses/page_gallery_image.' . $image->getStatus()) }}</td>
                <td>{{ $image->image->getTitle() }}</td>
                <td>{{ $image->image->getAlt() }}</td>
                <td>{{ \Morilog\Jalali\Jalalian::forge($image->created_at)->format('Y-m-d') }}</td>
                <td>{{ \Morilog\Jalali\Jalalian::forge($image->updated_at)->format('Y-m-d') }}</td>
                <td>
                    <a class="btn  btn-icon" type="button" data-toggle="modal"
                       data-target="#{{ 'galleryImageModal-' . $image->getId() }}">
                        <i class="fa fa-edit text-primary"></i>
                    </a>


                    <!-- Modal -->
                    <div class="modal fade" id="{{ 'galleryImageModal-' . $image->getId() }}" tabindex="-1"
                         aria-labelledby="{{ 'galleryImageModal-' . $image->getId() . '-Label' }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="{{ 'galleryImageModal-' . $image->getId() . '-Label' }}">
                                        بروزرسانی تصویر گالری</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('adminPanel.gallery_images.update', $image) }}"
                                          method="POST" id="{{ 'gallery-image-edit-form-' . $image->getId() }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-row">
                                            <div class="form-group col-12 form-row">
                                                <label for="title" class="col-2 col-form-label">عنوان</label>
                                                <div class="col-10">
                                                    <input type="text" value="{{ $image->image->getTitle() }}"
                                                           id="title"
                                                           name="title" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-12 form-row">
                                                <label for="alt" class="col-2 col-form-label">متن جایگزین</label>
                                                <div class="col-10">
                                                    <input type="text" value="{{ $image->image->getAlt() }}" id="alt"
                                                           name="alt" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group col-12 form-row">
                                                <label for="{{ 'status-' . $image->getId() }}"
                                                       class="col-2 col-form-label">وضعیت</label>
                                                <div class="col-10">
                                                    <select name="status" id="{{ 'status-' . $image->getId() }}"
                                                            class="custom-select">
                                                        <option value="{{ App\Enums\PageGalleryImageStatus::Approved }}"
                                                                {{ $image->getStatus() == App\Enums\PageGalleryImageStatus::Approved ? 'selected' : ''}}
                                                        >
                                                            {{ trans('statuses/page_gallery_image.' . App\Enums\PageGalleryImageStatus::Approved) }}
                                                        </option>

                                                        <option value="{{ App\Enums\PageGalleryImageStatus::Pending }}"
                                                                {{ $image->getStatus() == App\Enums\PageGalleryImageStatus::Pending ? 'selected' : ''}}
                                                        >
                                                            {{ trans('statuses/page_gallery_image.' . App\Enums\PageGalleryImageStatus::Pending) }}
                                                        </option>

                                                        <option value="{{ App\Enums\PageGalleryImageStatus::Ban }}"
                                                                {{ $image->getStatus() == App\Enums\PageGalleryImageStatus::Ban ? 'selected' : ''}}
                                                        >
                                                            {{ trans('statuses/page_gallery_image.' . App\Enums\PageGalleryImageStatus::Ban) }}
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
                                            form="{{ 'gallery-image-edit-form-' . $image->getId() }}">بروزرسانی
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a class="btn  btn-icon" type="button" data-toggle="modal"
                       data-target="#{{ 'imageEditModal-' . $image->getId() }}">
                        <i class="fa fa-images text-dark"></i>
                    </a>

                    <div class="modal fade" id="{{ 'imageEditModal-' . $image->getId() }}" tabindex="-1"
                         aria-labelledby="{{ 'imageEditModal-' . $image->getId() . '-Label' }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="{{ 'imageEditModal-' . $image->getId() . '-Label' }}">
                                        تصویر</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="my-5">
                                        <a href="{{ $image->image->getImagePath() }}">
                                            <img class="w-100" src="{{ $image->image->getImagePath() }}"
                                                 alt="{{ $image->image->getAlt() }}"
                                                 title="{{ $image->image->getTitle() }}">
                                        </a>
                                    </div>
                                    <form action="{{ route('adminPanel.gallery_images.update', $image) }}"
                                          method="POST" enctype="multipart/form-data"
                                          id="{{ 'image-edit-form-' . $image->getId() }}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="custom-file form-group">
                                            <input type="file" class="custom-file-input" id="photo" name="photo">
                                            <label class="custom-file-label" for="photo">تعویض تصویر</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                                    <button type="submit" class="btn btn-primary"
                                            form="{{ 'image-edit-form-' . $image->getId() }}">بروزرسانی
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    @if($image->trashed())
                        <form action="{{ route('adminPanel.gallery_images.recycle', $image) }}"
                              method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn  btn-icon"><i class="fa fa-recycle text-danger"></i></button>
                        </form>
                    @else
                        <form action="{{ route('adminPanel.gallery_images.destroy', $image) }}"
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
        {!! $images->onEachSide(0)->withQueryString()->links() !!}
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

            $('#galleries').select2({
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
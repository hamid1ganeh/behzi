@extends('admin-panel.index')

@section('content')

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">بروزرسانی دسته</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('adminPanel.work_categories.update', $workCategory) }}"
                              method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-lg-6">
                                        <label for="name">نام :</label>
                                        <input name="name" id="name" type="text" class="form-control"
                                               placeholder="لطفا نام صفحه را وارد کنید"
                                               value="{{ old('name') ?? $workCategory->getName() }}"/>
                                        <span class="form-text text-danger"> {{ $errors->first('name') }} </span>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="status">وضعیت</label>
                                        <div>
                                            <select class="form-control selectpicker" name="status" id="status"
                                                    data-size="7"
                                                    data-live-search="true">
                                                <option value="{{ \App\Enums\WorkCategoryStatus::Active }}" {{ \App\Enums\WorkCategoryStatus::Active == ( old('status') ?? $workCategory->getStatus() ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/work_category.' . \App\Enums\WorkCategoryStatus::Active) }}
                                                </option>
                                                <option value="{{ \App\Enums\WorkCategoryStatus::Inactive }}" {{ \App\Enums\WorkCategoryStatus::Inactive == ( old('status') ?? $workCategory->getStatus() ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/work_category.' . \App\Enums\WorkCategoryStatus::Inactive) }}
                                                </option>
                                            </select>
                                            <span class="form-text text-danger"> {{ $errors->first('status') }} </span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="btn btn-primary mr-2">ذخیره</button>
                                        <button type="reset" class="btn btn-secondary">انصراف</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->

                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">زیر دسته جدید</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form"
                              action="{{ route('adminPanel.work_categories.work_items.store', $workCategory) }}"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-lg-6">
                                        <label for="name">نام :</label>
                                        <input name="name" id="name" type="text" class="form-control"
                                               placeholder="لطفا نام دسته را وارد کنید" value="{{ old('name') }}"/>
                                        <span class="form-text text-danger"> {{ $errors->first('name') }} </span>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="status">وضعیت</label>
                                        <div>
                                            <select class="form-control selectpicker" name="status" id="status"
                                                    data-size="7"
                                                    data-live-search="true">
                                                <option value="{{ \App\Enums\WorkItemStatus::Active }}" {{ \App\Enums\WorkItemStatus::Active == ( old('status') ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/work_category.' . \App\Enums\WorkItemStatus::Active) }}
                                                </option>
                                                <option value="{{ \App\Enums\WorkItemStatus::Inactive }}" {{ \App\Enums\WorkItemStatus::Inactive == ( old('status') ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/work_category.' . \App\Enums\WorkItemStatus::Inactive) }}
                                                </option>
                                            </select>
                                            <span class="form-text text-danger"> {{ $errors->first('status') }} </span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="btn btn-primary mr-2">ذخیره</button>
                                        <button type="reset" class="btn btn-secondary">انصراف</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>

                    <div class="card p-5">
                        <table class="table table-striped table-hover table-bordered text-center">
                            <thead>
                            <tr>
                                <th>نام</th>
                                <th>وضعیت</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($workCategory->work_items as $work_item)


                                <!-- Modal -->
                                <div class="modal fade" id="editModal-{{ $work_item->getId() }}" tabindex="-1"
                                     aria-labelledby="editModalLabel-{{ $work_item->getId() }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel-{{ $work_item->getId() }}">
                                                    بروزرسانی زیردسته</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form"
                                                      action="{{ route('adminPanel.work_items.update', $work_item) }}"
                                                      method="POST" id="work-item-edit-form-{{ $work_item->getId() }}">
                                                    <input type="hidden" name="_token"
                                                           value="{{ csrf_token() }}"
                                                           form="work-item-edit-form-{{ $work_item->getId() }}">
                                                    <input type="hidden" name="_method" value="PATCH"
                                                           form="work-item-edit-form-{{ $work_item->getId() }}">
                                                    <div class="card-body">
                                                        <div class="form-group row">

                                                            <div class="col-lg-6">
                                                                <label for="name">نام :</label>
                                                                <input name="name" id="name" type="text"
                                                                       class="form-control"
                                                                       placeholder="لطفا نام زیر دسته را وارد کنید"
                                                                       value="{{ old('name') ?? $work_item->getName() }}"
                                                                       form="work-item-edit-form-{{ $work_item->getId() }}"/>
                                                                <span class="form-text text-danger"> {{ $errors->first('name') }} </span>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label for="status">وضعیت</label>
                                                                <div>
                                                                    <select class="form-control selectpicker"
                                                                            name="status" id="status"
                                                                            data-size="7"
                                                                            data-live-search="true"
                                                                            form="work-item-edit-form-{{ $work_item->getId() }}">
                                                                        <option value="{{ \App\Enums\WorkItemStatus::Active }}" {{ \App\Enums\WorkItemStatus::Active == ( old('status') ?? $work_item->getStatus() ) ? 'selected' : '' }}>
                                                                            {{ trans('statuses/work_category.' . \App\Enums\WorkItemStatus::Active) }}
                                                                        </option>
                                                                        <option value="{{ \App\Enums\WorkItemStatus::Inactive }}" {{ \App\Enums\WorkItemStatus::Inactive == ( old('status') ?? $work_item->getStatus() ) ? 'selected' : '' }}>
                                                                            {{ trans('statuses/work_category.' . \App\Enums\WorkItemStatus::Inactive) }}
                                                                        </option>
                                                                    </select>
                                                                    <span class="form-text text-danger"> {{ $errors->first('status') }} </span>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    انصراف
                                                </button>
                                                <button type="submit" class="btn btn-primary"
                                                        form="work-item-edit-form-{{ $work_item->getId() }}">بروزرسانی
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <tr>
                                    <td>{{ $work_item->getName() }}</td>
                                    <td>{{ trans('statuses/work_item.' . $work_item->getStatus())}}</td>
                                    <td>
                                        <button type="button" class="btn btn-icon btn-danger btn-sm" data-toggle="modal"
                                                data-target="#editModal-{{ $work_item->getId() }}">
                                            <i class="fa fa-edit"></i>
                                        </button>


                                        <button type="button" class="btn btn-icon btn-success btn-sm"
                                                data-toggle="modal"
                                                data-target="#exchangeWorkCategoryModal-{{ $work_item->getId() }}">
                                            <i class="fa fa-exchange-alt"></i>
                                        </button>


                                    </td>
                                </tr>

                                <div class="modal fade" id="exchangeWorkCategoryModal-{{ $work_item->getId() }}"
                                     tabindex="-1"
                                     aria-labelledby="exchangeWorkCategoryModalLabel-{{ $work_item->getId() }}"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel-{{ $work_item->getId() }}">
                                                    تغییر دسته</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form"
                                                      action="{{ route('adminPanel.work_items.exchange_work_category', $work_item) }}"
                                                      method="POST"
                                                      id="exchange-work-category-form-{{ $work_item->getId() }}">
                                                    <input type="hidden" name="_token"
                                                           value="{{ csrf_token() }}"
                                                           form="exchange-work-category-form-{{ $work_item->getId() }}">
                                                    <div class="card-body">
                                                        <div class="form-group row">

                                                            <div class="col-lg-12">
                                                                <label for="work_category">نام :</label>
                                                                <select name="work_category" class="work_category"
                                                                        form="exchange-work-category-form-{{ $work_item->getId() }}">
                                                                    @foreach(\App\Models\WorkCategory::all() as $workCategory)
                                                                        <option value="{{ $workCategory->getId() }}">{{ $workCategory->getName() }}</option>
                                                                    @endforeach
                                                                </select>

                                                                <span class="form-text text-danger"> {{ $errors->first('work_category') }} </span>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </form>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    انصراف
                                                </button>
                                                <button type="submit" class="btn btn-primary"
                                                        form="exchange-work-category-form-{{ $work_item->getId() }}">انجام
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!--end::Card-->
                </div>
            </div>

            <!--end::Container-->
        </div>

    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.work_category').select2({width: '100%'})
        });
    </script>
@endsection
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
                            <h3 class="card-title">دسته جدید</h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('adminPanel.work_categories.store') }}" method="POST">
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
                                                <option value="{{ \App\Enums\WorkCategoryStatus::Active }}" {{ \App\Enums\WorkCategoryStatus::Active == ( old('status') ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/work_category.' . \App\Enums\WorkCategoryStatus::Active) }}
                                                </option>
                                                <option value="{{ \App\Enums\WorkCategoryStatus::Inactive }}" {{ \App\Enums\WorkCategoryStatus::Inactive == ( old('status') ) ? 'selected' : '' }}>
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
                    <!--end::Card-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>


@endsection

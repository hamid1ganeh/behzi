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
                            <h3 class="card-title">ایجاد نقش</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('adminPanel.roles.store') }}"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-12">
                                        <label for="name">نام :</label>
                                        <input name="name" id="name" type="text" class="form-control"
                                               placeholder="لطفا نام نقش را وارد کنید"
                                               value="{{ old('name') }}"/>
                                        <span class="form-text text-danger"> {{ $errors->first('name') }} </span>
                                    </div>

                                    <div class="col-12 my-5">
                                        <div class="row">
                                            @foreach($permissions as $permission)
                                                <div class="col-12 col-md-4 col-lg-3 my-2">
                                                    <input name="permissions[]" type="checkbox"
                                                           value="{{ $permission->id }}" id="{{ $permission->name }}" {{ in_array($permission->id, old('permissions') ?? []) ? 'checked' : '' }}>
                                                    <label for="{{ $permission->name }}">{{ trans('permission.' . $permission->name) }}</label>
                                                </div>
                                            @endforeach
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
                </div>
            </div>

            <!--end::Container-->
        </div>

    </div>

@endsection
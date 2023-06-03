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
                            <h3 class="card-title">بروزرسانی مدیر</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('adminPanel.admins.update', $admin) }}"
                              method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-lg-6">
                                        <label for="name">نام :</label>
                                        <input name="name" id="name" type="text" class="form-control"
                                               placeholder="لطفا نام مدیر را وارد کنید"
                                               value="{{ old('name') ?? $admin->getName() }}"/>
                                        <span class="form-text text-danger"> {{ $errors->first('name') }} </span>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="email">ایمیل :</label>
                                        <input name="email" id="email" type="text" class="form-control"
                                               placeholder="لطفا ایمیل مدیر را وارد کنید"
                                               value="{{ old('email') ?? $admin->getEmail() }}"/>
                                        <span class="form-text text-danger"> {{ $errors->first('email') }} </span>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="password">کلمه عبور :</label>
                                        <input name="password" id="password" type="password" class="form-control"
                                               placeholder="برای تغییر نکردن پسورد خالی بگذارید"
                                               value=""/>
                                        <span class="form-text text-danger"> {{ $errors->first('password') }} </span>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="password_confirmation">تکرار کلمه عبور :</label>
                                        <input name="password_confirmation" id="password_confirmation" type="password" class="form-control"
                                               placeholder="برای تغییر پسورد پسورد جدید را در اینجا تکرار کنید"
                                               value=""/>
                                        <span class="form-text text-danger"> {{ $errors->first('password_confirmation') }} </span>
                                    </div>


                                    <div class="col-lg-12">
                                        <label for="status">وضعیت</label>
                                        <div>
                                            <select class="form-control selectpicker" name="status" id="status"
                                                    data-size="7"
                                                    data-live-search="true">
                                                <option value="{{ \App\Enums\AdminStatus::Pending }}" {{ \App\Enums\AdminStatus::Pending == ( old('status') ?? $admin->getStatus() ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/admin.' . \App\Enums\AdminStatus::Pending) }}
                                                </option>
                                                <option value="{{ \App\Enums\AdminStatus::Active }}" {{ \App\Enums\AdminStatus::Active == ( old('status') ?? $admin->getStatus() ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/admin.' . \App\Enums\AdminStatus::Active) }}
                                                </option>
                                                <option value="{{ \App\Enums\AdminStatus::Ban }}" {{ \App\Enums\AdminStatus::Ban == ( old('status') ?? $admin->getStatus() ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/admin.' . \App\Enums\AdminStatus::Ban) }}
                                                </option>
                                            </select>
                                            <span class="form-text text-danger"> {{ $errors->first('status') }} </span>
                                        </div>
                                    </div>


                                    <div class="col-12 my-5">
                                        <div class="row">
                                            @foreach($roles as $role)
                                                <div class="col-12 col-md-4 col-lg-3 my-2">
                                                    <input name="roles[]" type="checkbox"
                                                           value="{{ $role->id }}" id="{{ $role->name }}" {{ in_array($role->id, old('roles') ?? $admin->roles->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                    <label for="{{ $role->name }}">{{ $role->name }}</label>
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
            $('.status').select2({width: '100%'})
        });
    </script>
@endsection
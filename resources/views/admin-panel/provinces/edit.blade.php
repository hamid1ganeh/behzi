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
                            <h3 class="card-title">بروزرسانی استان</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form" action="{{ route('adminPanel.provinces.update', $province) }}"
                              method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-lg-6">
                                        <label for="name">نام :</label>
                                        <input name="name" id="name" type="text" class="form-control"
                                               placeholder="لطفا نام استان را وارد کنید"
                                               value="{{ old('name') ?? $province->getName() }}"/>
                                        <span class="form-text text-danger"> {{ $errors->first('name') }} </span>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="status">وضعیت</label>
                                        <div>
                                            <select class="form-control selectpicker" name="status" id="status"
                                                    data-size="7"
                                                    data-live-search="true">
                                                <option value="{{ \App\Enums\ProvinceStatus::Active }}" {{ \App\Enums\ProvinceStatus::Active == ( old('status') ?? $province->getStatus() ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/province.' . \App\Enums\ProvinceStatus::Active) }}
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
                            <h3 class="card-title">شهر جدید</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form"
                              action="{{ route('adminPanel.provinces.cities.store', $province) }}"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">

                                    <div class="col-lg-6">
                                        <label for="name">نام :</label>
                                        <input name="name" id="name" type="text" class="form-control"
                                               placeholder="لطفا نام شهر را وارد کنید" value="{{ old('name') }}"/>
                                        <span class="form-text text-danger"> {{ $errors->first('name') }} </span>
                                    </div>

                                    <div class="col-lg-6">
                                        <label for="status">وضعیت</label>
                                        <div>
                                            <select class="form-control selectpicker" name="status" id="status"
                                                    data-size="7"
                                                    data-live-search="true">
                                                <option value="{{ \App\Enums\CityStatus::Active }}" {{ \App\Enums\CityStatus::Active == ( old('status') ) ? 'selected' : '' }}>
                                                    {{ trans('statuses/province.' . \App\Enums\CityStatus::Active) }}
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
                            @foreach($province->cities as $city)


                                <!-- Modal -->
                                <div class="modal fade" id="editModal-{{ $city->getId() }}" tabindex="-1"
                                     aria-labelledby="editModalLabel-{{ $city->getId() }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel-{{ $city->getId() }}">
                                                    بروزرسانی شهر</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form"
                                                      action="{{ route('adminPanel.cities.update', $city) }}"
                                                      method="POST" id="work-item-edit-form-{{ $city->getId() }}">
                                                    <input type="hidden" name="_token"
                                                           value="{{ csrf_token() }}"
                                                           form="work-item-edit-form-{{ $city->getId() }}">
                                                    <input type="hidden" name="_method" value="PATCH"
                                                           form="work-item-edit-form-{{ $city->getId() }}">
                                                    <div class="card-body">
                                                        <div class="form-group row">

                                                            <div class="col-lg-6">
                                                                <label for="name">نام :</label>
                                                                <input name="name" id="name" type="text"
                                                                       class="form-control"
                                                                       placeholder="لطفا نام شهر را وارد کنید"
                                                                       value="{{ old('name') ?? $city->getName() }}"
                                                                       form="work-item-edit-form-{{ $city->getId() }}"/>
                                                                <span class="form-text text-danger"> {{ $errors->first('name') }} </span>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <label for="status">وضعیت</label>
                                                                <div>
                                                                    <select class="form-control selectpicker"
                                                                            name="status" id="status"
                                                                            data-size="7"
                                                                            data-live-search="true"
                                                                            form="work-item-edit-form-{{ $city->getId() }}">
                                                                        <option value="{{ \App\Enums\CityStatus::Active }}" {{ \App\Enums\CityStatus::Active == ( old('status') ?? $city->getStatus() ) ? 'selected' : '' }}>
                                                                            {{ trans('statuses/province.' . \App\Enums\CityStatus::Active) }}
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
                                                        form="work-item-edit-form-{{ $city->getId() }}">بروزرسانی
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <tr>
                                    <td>{{ $city->getName() }}</td>
                                    <td>{{ trans('statuses/city.' . $city->getStatus())}}</td>
                                    <td>
                                        <button type="button" class="btn btn-icon btn-danger btn-sm" data-toggle="modal"
                                                data-target="#editModal-{{ $city->getId() }}">
                                            <i class="fa fa-edit"></i>
                                        </button>




                                    </td>
                                </tr>


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
            $('.province').select2({width: '100%'})
        });
    </script>
@endsection
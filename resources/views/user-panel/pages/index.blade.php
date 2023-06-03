@extends('user-panel.master')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            {{--<div class="row">
                <div class="col-xl-12">
                    <!--begin::Advance Table Widget 3-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">صفحه های شما</span>
--}}{{--                                <span class="text-muted mt-3 font-weight-bold font-size-sm">لیست صفحات</span>--}}{{--
                            </h3>
                            <div class="card-toolbar">
                                <a href="{{ route('userPanel.pages.create') }}" class="btn btn-success font-weight-bolder font-size-sm">
											<span class="svg-icon svg-icon-md svg-icon-white">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
											</span>ساخت صفحه جدید</a>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-0 pb-3">
                            <!--begin::Table-->
                            <div class="table-responsive">
                                <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                    <thead>
                                    <tr class="text-uppercase">
                                        <th style="min-width: 250px" class="pl-7">
                                            <span class="text-dark-75">نام</span>
                                        </th>
                                        <th style="min-width: 100px">دسته</th>
                                        <th style="min-width: 100px">تاریخ</th>
                                        <th style="min-width: 100px">روز باقیمانده</th>
                                        <th style="min-width: 100px">وضعیت</th>
                                        <th style="min-width: 120px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pages as $page)
                                            <tr>
                                                <td class="pl-0 py-8">
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                            <div class="symbol-label" style="background-image: url('assets/media/stock-600x400/img-26.jpg')"></div>
                                                        </div>
                                                        <div>
                                                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $page->name }}</a>
                                                            <span class="text-muted font-weight-bold d-block">{{ $page->pivot->user_type_model->name }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 d-block">{{ $page->work_item->name }}</span>
                                                    <span class="text-muted font-size-sm">{{ $page->work_item->work_category->name }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-dark-75 d-block font-size-sm">{{ $page->getJalaliStartDate() }}</span>
                                                    <span class="text-muted font-size-sm">{{ $page->getJalaliExpireDate() }}</span>
                                                </td>
                                                <td>
                                                    <span class="text-danger font-weight-bolder d-block font-size-lg">{{ $page->getRemainingDays() }}</span>
                                                </td>
                                                <td>
                                                    <span class="label label-lg label-light-{{ $page->getPageStatus()['class'] }} label-inline">{{ $page->getPageStatus()['name'] }}</span>
                                                </td>
                                                <td class="text-right pr-0">

                                                    <div class="btn-toolbar" role="toolbar" aria-label="...">
                                                        <div class="btn-group mr-2" role="group" aria-label="...">
--}}{{--                                                            <a href="{{ route('userPanel.pages.workTimePage',$page->id) }}" class="btn  btn-icon"><i class="fa fa-edit text-primary"></i></a>--}}{{--
                                                            <a data-toggle="tooltip" title="" data-placement="top" data-original-title="ویرایش" href="{{ route('userPanel.pages.edit',$page->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                                                <span class="svg-icon svg-icon-md svg-icon-primary">

                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
                                                                <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                                </g>
                                                                </svg>

                                                                </span>
                                                            </a>
                                                            <a data-toggle="tooltip" title="" data-placement="top" data-original-title="مشاهده" type="button" class="btn btn-icon btn-light btn-hover-primary btn-sm"><i class="fa fa-eye text-success"></i></a>
                                                            <a data-toggle="tooltip" title="" data-placement="top" data-original-title="گالری" href="{{ route('userPanel.pages.galleries.index',$page->id) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm"><i class="fa fa-images text-warning"></i></a>
--}}{{--                                                            <span type="button" class="btn  btn-icon"><i class="fa fa-trash text-danger"></i></span>--}}{{--

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="justify-content-center d-flex">
                                    {{ $pages->onEachSide(0)->links() }}
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 3-->
                </div>
            </div>--}}
            <div class="row mx-0 mb-4">
                @foreach($pages as $page)
                    <div class="col-lg-12">
                        <!--begin::Example-->
                        <!--begin::Card-->
                        <div class="card card-custom" data-card="true" id="kt_card_2">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3 class="card-label">{{ $page->name }}</h3>
                                </div>
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-icon btn-sm btn-light mr-2" data-card-tool="toggle" aria-describedby="tooltip_d6eh2lrtja">
                                        <i class="ki ki-arrow-down icon-xs"></i>
                                    </a>
                                    <a href="{{ route('userPanel.pages.show',$page->id) }}" title="مشاهده" class="btn btn-icon btn-sm btn-primary"  >
                                        <i class="fa fa-eye" style="font-size:14px"></i>
                                    </a>
                                    <div class="tooltip tooltip-card tooltip bs-tooltip-top" role="tooltip" id="tooltip_g9vj461s9a" aria-hidden="true" x-placement="top" style="position: absolute; will-change: transform; visibility: hidden; top: 0px; left: 0px; transform: translate3d(8px, -34px, 0px);">                            <div class="tooltip-arrow arrow" style="left: 32px;"></div>                            <div class="tooltip-inner">Remove</div>                        </div><div class="tooltip tooltip-card tooltip bs-tooltip-top" role="tooltip" id="tooltip_i4vtufgq9y" aria-hidden="true" x-placement="top" style="position: absolute; will-change: transform; visibility: hidden; top: 0px; left: 0px; transform: translate3d(47px, -34px, 0px);">                            <div class="tooltip-arrow arrow" style="left: 29px;"></div>                            <div class="tooltip-inner">Reload</div>                        </div><div class="tooltip tooltip-card tooltip bs-tooltip-top" role="tooltip" id="tooltip_d6eh2lrtja" aria-hidden="true" x-placement="top" style="position: absolute; will-change: transform; visibility: hidden; top: 0px; left: 0px; transform: translate3d(78px, -34px, 0px);">                            <div class="tooltip-arrow arrow" style="left: 34px;"></div>                            <div class="tooltip-inner">Collapse</div>                        </div></div>
                            </div>
                            <div class="card-body px-2 py-0 my-5">
                                <div class="col-12 row mx-0 px-0">
                                    <div class="col-md-3">
                                        <img src=" {{ asset('storage/images/' . $page->image->name['original']) }}" class="w-100" alt="">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="pt-4"><b class="pr-4">دسته:</b>{{ $page->work_item->work_category->name  }} ({{ $page->work_item->name }})</div>
                                        <div class="pt-4"><b class="pr-4">تاریخ شروع:</b>{{ $page->getJalaliStartDate() }}</div>
                                        <div class="pt-4"><b class="pr-4">تاریخ پایان:</b><span class="text-danger">{{ $page->getJalaliExpireDate() }}</span></div>
                                    </div>
                                    <div class="col-md-3 text-right">
                                        {{--todo: Dont delete these lines, dynamic them --}}
                                        {{--                                    <div>--}}
                                        {{--                                        <span class="badge bg-warning-o-95"> در حال بررسی<i class="fa fa-hourglass-start text-warning ml-2 fa-spin" style="font-size:14px"></i></span>--}}
                                        {{--                                    </div>--}}
                                        {{--                                    <div>--}}
                                        {{--                                        <span class="badge bg-success-o-95"> تایید شده<i class="fa fa-check-square text-success ml-2" style="font-size:14px"></i></span>--}}
                                        {{--                                    </div>--}}
                                        <div>
                                            <span class="badge bg-{{ $page->getPageStatus()['class'] }}-o-95">{{ $page->getPageStatus()['name'] }}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-light-o-55 py-3 px-0 px-md-3">
                                <div class="col-12 px-0 row mx-0 justify-content-center justify-content-md-end">
                                    <div class="mr-3"><a href="{{ route('userPanel.pages.galleries.index',$page->id) }}" class="btn btn-warning py-md-1">گالری تصاویر</a></div>
                                    <div class="mr-3"><a href="{{ route('userPanel.pages.workTime.create',$page->id) }}" class="btn btn-success py-md-1">ساعات کاری</a></div>
                                    <div><a href="{{ route('userPanel.pages.connections.create',$page->id) }}" class="btn btn-primary py-md-1">راه های ارتباطی</a></div>
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                        <!--end::Example-->
                    </div>
                @endforeach
            </div>
            {{ $pages->links() }}
        <!--end::Card-->
        </div>
        <!--end::Container-->

    </div>
    <a href="{{ route('userPanel.pages.create') }}">
        <div class="position-float">
            <div class="btn-floating mx-auto">
                <i class="fa fa-plus text-white"></i>
            </div>
            <div class="mt-1">افزودن صفحه</div>
        </div>
    </a>
@endsection

@section('css')
    <style>
        .position-float{
            position:fixed;
            bottom: 1rem;
            right:1.5rem;
        }
        .btn-floating{
            background-color: #0a6aa1;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-shadow: 0 0 5px #26a2c6;
            display: flex;
            justify-content: center;
            align-items: center;

        }
    </style>
@stop
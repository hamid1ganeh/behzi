@extends('user-panel.master')

@section('content')
    <div class="d-flex flex-column-fluid min-height">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!--begin::Advance Table Widget 3-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5 px-3">
                            <h3 class="card-title align-items-start flex-column my-auto">
                                <span class="card-label font-weight-bolder text-dark">
                                    <span class="svg-icon svg-icon-lg svg-icon-dark">
                                        <svg width="26px" height="26px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Stockholm-icons / Files / Pictures1</title> <desc>Created with Sketch.</desc> <defs></defs> <g id="Stockholm-icons-/-Files-/-Pictures1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect id="bound" x="0" y="0" width="24" height="24"></rect> <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path> <polygon id="Path" fill="#000000" opacity="0.3" points="4 19 10 11 16 19"></polygon> <polygon id="Path-Copy" fill="#000000" points="11 19 15 14 19 19"></polygon> <path d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z" id="Path" fill="#000000" opacity="0.3"></path></g></svg>
                                    </span>
                                    لیست آلبوم ها</span>
                                {{-- <span class="text-muted mt-3 font-weight-bold font-size-sm">لیست صفحات</span>--}}
                            </h3>
                            <div class="card-toolbar">
                                <a data-target="#create_gallery" data-toggle="modal" {{--href="{{ route('userPanel.pages.galleries.create',$page->id) }}"--}} class="btn btn-success font-weight-bolder font-size-sm">
                                    ساخت آلبوم جدید<span class="svg-icon svg-icon-md svg-icon-white mr-0 ml-2">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span></a>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade fade-up" id="create_gallery" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content px-lg-5">
                                    <form class="form" action="{{ route('userPanel.pages.galleries.store',$page->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="col-12 text-center border-bottom py-3 pt-4">
                                            <span class="svg-icon svg-icon-xl svg-icon-success">
                                                <svg width="12px" height="12px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><title>Stockholm-icons / Files / Pictures1</title> <desc>Created with Sketch.</desc> <defs></defs> <g id="Stockholm-icons-/-Files-/-Pictures1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect id="bound" x="0" y="0" width="24" height="24"></rect> <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path> <polygon id="Path" fill="#000000" opacity="0.3" points="4 19 10 11 16 19"></polygon> <polygon id="Path-Copy" fill="#000000" points="11 19 15 14 19 19"></polygon> <path d="M18,12 C18.8284271,12 19.5,11.3284271 19.5,10.5 C19.5,9.67157288 18.8284271,9 18,9 C17.1715729,9 16.5,9.67157288 16.5,10.5 C16.5,11.3284271 17.1715729,12 18,12 Z" id="Path" fill="#000000" opacity="0.3"></path></g></svg>
                                            </span>
                                            <span class="font-size-h5">ساخت آلبوم تصاویر</span>
                                        </div>
                                        <div class="col-12 pt-10">
                                            <label>نام گالری</label>
                                            <input type="text" name="name" class="form-control rounded">
                                            <span class="form-text text-danger"> {{ $errors->first('name') }} </span>
                                        </div>
                                        <div class="col-12 pt-5 mb-8 d-flex justify-content-center">
                                            <input type="submit" class="btn btn-success px-10" value="ثبت گالری">
                                            <span class="btn btn-light mx-3 px-15" data-dismiss="modal">بستن</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-0 pb-3 px-2 px-lg-5">
                            <!--begin::Table-->
                            <div class="w-100 font-size-h6">
                                @foreach($galleries as $gallery)
                                    <div class="col-12 row mx-0 py-5 border-top px-0 px-xl-5">
                                        <div class="col-lg-4 mb-3 mb-lg-0">
                                            <img src="{{ $gallery->getAgentImage('thumbnail') }}" class="shadow-sm" width="45">
                                            <span class="text-dark-75 font-weight-bolder font-size-lg ml-3">{{ $gallery->name }}</span>
                                        </div>
                                        <div class="col-lg my-auto">
                                            <span class="badge bg-warning-o-55 text-warning">تایید شده</span>
                                        </div>
                                        <div class="col-lg small my-auto py-3 py-lg-0">
                                            <div><span class="text-muted">تاریخ ثبت:</span> 12 مهر 1399</div>
                                            <div><span class="text-muted">تعداد عکس:</span> {{$gallery->getNumberOfImages() }} مورد</div>
                                        </div>
                                        <div class="col-lg pr-0 mt-4 mt-lg-0 d-flex justify-content-center justify-content-lg-end align-items-center">
                                            <div class="row mx-0">
                                                <a href="{{ route('userPanel.pages.galleries.edit',[$page->id,$gallery->id]) }}" class="badge bg-warning text-white d-flex">
                                                <div class="my-auto">افزودن تصویر</div><i class="fa fa-plus-square text-white pl-2"></i>
                                                </a>
                                                <div class="d-flex align-items-center" role="toolbar">
                                                    <form action="{{ route('userPanel.pages.galleries.destroy', [$page, $gallery]) }}" method="POST" class="mb-0 ml-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="badge bg-danger text-white d-flex border-0"><span class="my-auto">حذف</span><i class="fa fa-trash text-white pl-2"></i></button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Advance Table Widget 3-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
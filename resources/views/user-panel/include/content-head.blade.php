<div class="subheader min-h-lg-175px pt-5 pb-7 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Details-->
        <div class="d-flex align-items-center flex-wrap mr-2">
            <!--begin::Heading-->
            <div class="d-flex flex-column">
                <!--begin::Title-->
                <h2 class="text-white font-weight-bold my-2 mr-5">داشبورد</h2>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
            {{ \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() }}
                <!--end::Breadcrumb-->
            </div>
            <!--end::Heading-->
        </div>
        <!--end::Details-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <a href="{{ url()->previous() }}" title="بازگشت">
                <div class="bg-light-o-55 bg-hover-light-o-2 rounded py-3 px-4"><i class="fa fa-chevron-left text-white"></i></div>
            </a>
            <!--begin::Button-->
{{--            <a href="#" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Reports</a>--}}
            <!--end::Button-->
            <!--begin::Dropdown-->
{{--            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">--}}
{{--                <a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>--}}
{{--                <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">--}}
{{--                    <!--begin::Navigation-->--}}
{{--                    <ul class="navi navi-hover py-5">--}}
{{--                        <li class="navi-item">--}}
{{--                            <a href="#" class="navi-link">--}}
{{--                                                            <span class="navi-icon">--}}
{{--                                                                <i class="flaticon2-drop"></i>--}}
{{--                                                            </span>--}}
{{--                                <span class="navi-text">New Group</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="navi-item">--}}
{{--                            <a href="#" class="navi-link">--}}
{{--                                                            <span class="navi-icon">--}}
{{--                                                                <i class="flaticon2-list-3"></i>--}}
{{--                                                            </span>--}}
{{--                                <span class="navi-text">Contacts</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="navi-item">--}}
{{--                            <a href="#" class="navi-link">--}}
{{--                                                            <span class="navi-icon">--}}
{{--                                                                <i class="flaticon2-rocket-1"></i>--}}
{{--                                                            </span>--}}
{{--                                <span class="navi-text">Groups</span>--}}
{{--                                <span class="navi-link-badge">--}}
{{--                                                                <span class="label label-light-primary label-inline font-weight-bold">new</span>--}}
{{--                                                            </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="navi-item">--}}
{{--                            <a href="#" class="navi-link">--}}
{{--                                                            <span class="navi-icon">--}}
{{--                                                                <i class="flaticon2-bell-2"></i>--}}
{{--                                                            </span>--}}
{{--                                <span class="navi-text">Calls</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="navi-item">--}}
{{--                            <a href="#" class="navi-link">--}}
{{--                                                            <span class="navi-icon">--}}
{{--                                                                <i class="flaticon2-gear"></i>--}}
{{--                                                            </span>--}}
{{--                                <span class="navi-text">Settings</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="navi-separator my-3"></li>--}}
{{--                        <li class="navi-item">--}}
{{--                            <a href="#" class="navi-link">--}}
{{--                                                            <span class="navi-icon">--}}
{{--                                                                <i class="flaticon2-magnifier-tool"></i>--}}
{{--                                                            </span>--}}
{{--                                <span class="navi-text">Help</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="navi-item">--}}
{{--                            <a href="#" class="navi-link">--}}
{{--                                                            <span class="navi-icon">--}}
{{--                                                                <i class="flaticon2-bell-2"></i>--}}
{{--                                                            </span>--}}
{{--                                <span class="navi-text">Privacy</span>--}}
{{--                                <span class="navi-link-badge">--}}
{{--                                                                <span class="label label-light-danger label-rounded font-weight-bold">5</span>--}}
{{--                                                            </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <!--end::Navigation-->--}}
{{--                </div>--}}
{{--            </div>--}}
            <!--end::Dropdown-->
        </div>
        <!--end::Toolbar-->
    </div>
</div>
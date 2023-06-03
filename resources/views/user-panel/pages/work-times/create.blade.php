@extends('user-panel.master')

@section('content')
    <div class="d-flex flex-column-fluid min-height">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--begin::Card-->
                    <work-time-form page-id="{{ $page->id }}" get-page-work-times-route="{{ route('userPanel.pages.workTime.index',$page->id) }}" save-route="{{ route('userPanel.pages.workTime.store',$page->id) }}" update-route="{{ route('userPanel.pages.workTime.store',$page->id) }}" success-redirect-route="{{ route('userPanel.pages.show',$page) }}"></work-time-form>
                    <!--end::Card-->
                    <!--end::Card-->
{{--                    <behzi-alert ></behzi-alert>--}}
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
@extends('user-panel.master')
@section('content')
    <div class="container-fluid min-height">
        <div class="row">
            <div class="col-lg-6 mb-10 mb-lg-0">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="col-12 text-center row mx-0 pb-5 pt-5 pt-md-10">
                        <div class="col-12 row mx-0 px-0 px-md-4">
                            <div class="col-7 h4 text-left connection-responsive-text">افزودن شماره تلفن</div>
                            <div class="col-5 text-right">
                                <connection-link-store-modal
                                        logo="{{ asset('images/static/phone-circle-green.png') }}"
                                        page-id="{{ $page->getId() }}"
                                        store-route="{{ route('userPanel.pages.phones.store') }}"
                                        title="افزودن شماره تلفن"
                                        type="phone"></connection-link-store-modal>
                            </div>
                            <hr class="w-100">
                            <div class="col-md-12 px-0">
                                <Phone-list
                                        base-route="{{ url('') }}"
                                        fetch-route="{{ route('userPanel.pages.phones.index') }}"
                                        page-id="{{ $page->getId() }}"
                                        update-route="{{ route('userPanel.pages.phones.sort') }}"></Phone-list>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-lg-6">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="col-12 text-center row mx-0 pb-5 pt-5 pt-md-10">
                        <div class="col-12 row mx-0 px-0 px-md-4">
                            <div class="col-7 h4 text-left connection-responsive-text">افزودن لینک شبکه‌های اجتماعی</div>
                            <div class="col-5 text-right">
                                <connection-link-store-modal
                                        logo="{{ asset('images/static/social-media.png') }}"
                                        page-id="{{ $page->getId() }}"
                                        store-route="{{ route('userPanel.pages.connections.store') }}"
                                        title="افزودن لینک شبکه‌های اجتماعی"
                                        type="social-media"></connection-link-store-modal>
                            </div>
                            <hr class="w-100">
                            <div class="col-md-12 px-0 px-lg-5">
                                <connection-list
                                        base-route="{{ url('') }}"
                                        fetch-route="{{ route('userPanel.pages.connections.index') }}"
                                        page-id="{{ $page->getId() }}"
                                        update-route="{{ route('userPanel.pages.connections.sort') }}"></connection-list>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        let avatar5 = new KTImageInput('kt_image_5');
        // import ConnectionStoreModal from "../../js/components/ConnectionLinkStoreModal";
        // export default {
        //     components: {ConnectionStoreModal}
        // }
    </script>
@endsection
@section('css')
    <style>
        .handle{
            cursor: all-scroll;
        }
        @media (max-width: 720px){
            .symbol.symbol-50 .symbol-label{
                width:32px;
                height:32px;
            }
        }
        @media (max-width: 992px){
            .connection-responsive-text{
                font-size: 12px !important;
            }
        }
    </style>
@endsection

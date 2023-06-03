@extends('user-panel.master')

@section('js')
    <script src="{{ asset('cp/assets/js/pages/custom/chat/chat.js') }}"></script>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid min-height">
        <!--begin::Container-->
        <div class="container">
            <div class="row">
                <ticket-chat ticket-base-route="{{ route('userPanel.tickets.index') }}"></ticket-chat>
            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
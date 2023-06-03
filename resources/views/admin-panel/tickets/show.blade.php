@extends('admin-panel.master')

@section('content')


    <div class="row">
        <div class="col-lg-12 card">
            @foreach($ticket->messages as $message)
                <div class="card my-4">
                    <div class="card-header clearfix">
                        <div class="float-left">
                            <span class="text-danger font-weight-bold">پیام از طرف : </span>
                            <span>{{ $message->messageer->getName() ?? 'بی نام'  }}</span>
                            <span class="badge badge-danger text-small">
                                {{ $message->messageer->isTicketDepartmentOperator() ? 'اپراتور' : 'کاربر' }}
                            </span>
                        </div>

                        <div class="float-right">
                            <span class="text-danger font-weight-bold">ارسال شده در : </span>
                            <span style="direction: ltr">{{ \Morilog\Jalali\Jalalian::forge($message->created_at)->format('Y-m-d H:i:s') }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $message->getContent() }}
                        <div>
                        </div>
                    </div>
                </div>
            @endforeach

            <form action="{{ route('adminPanel.tickets.messages.store', $ticket->getId()) }}" method="POST">
                @csrf
                <div class="form-group form-row">
                    <label for="content" class="col-form-label col-2 align-self-center text-center">پیام</label>
                    <div class="col-10">
                        <textarea name="content" id="content" cols="30" rows="10"
                                  class="form-control"></textarea>
                        <div class="my-2 justify-content-end d-flex">
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                </div>
            </form>
        </div>
    </div>

@endsection


@section('script')
    <script>
        $(document).ready(function () {
            $('#operator').select2({width: '100%'});
        });
    </script>
@endsection
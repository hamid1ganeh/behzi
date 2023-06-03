@extends('admin-panel.master')

@section('content')

    <!-- Modal -->
    <div class="bg-white p-2">
        <table class="table table-hover table-striped text-center">
            <thead>
            <tr>
                <th>ایجاد کننده</th>
                <th>وضعیت</th>
                <th>مشاهده</th>
                <th>دپارتمان</th>
                <th>ایجاد</th>
                <th>بروزرسانی</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>
                        {{ $ticket->creator->getName() }}
                    </td>
                    <td>
                        {{ trans('statuses/ticket_status.' . $ticket->getStatus()) }}
                    </td>
                    <td>
                        {{ trans('statuses/ticket_seen_status.' . $ticket->getSeen()) }}
                    </td>
                    <td>
                        {{ $ticket->department->getName() }}
                    </td>
                    <td>
                        {{ $ticket->created_at->diffForHumans() }}
                    </td>
                    <td>
                        {{ $ticket->created_at->diffForHumans() }}
                    </td>
                    <td>
                        <a href="{{ route('adminPanel.tickets.show', $ticket->getId()) }}" class="btn btn-sm"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function () {
            $('#operator').select2({width: '100%'});
        });
    </script>
@endsection
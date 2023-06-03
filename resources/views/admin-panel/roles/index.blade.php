@extends('admin-panel.master')

@section('content')




    <table class="table table-white table-striped table-hover table-bordered text-center table-responsive-md">
        <thead>
        <tr>
            <th>
                <span>نام</span>
            </th>
            <th>
                <span>تعداد دسترسی ها</span>
            </th>
            <th>
                <span>ایجاد</span>
            </th>
            <th>
                <span>بروزرسانی</span>
            </th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>
                <td>{{ $role->permissions->count() }}</td>
                <td>{{ \Morilog\Jalali\Jalalian::forge($role->created_at)->format('Y-m-d') }}</td>
                <td>{{ \Morilog\Jalali\Jalalian::forge($role->updated_at)->format('Y-m-d') }}</td>
                <td>
                    <a class="btn  btn-icon" href="{{ route('adminPanel.roles.edit', $role) }}">
                        <i class="fa fa-edit text-primary"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $roles->onEachSide(0)->withQueryString()->links() !!}
    </div>

@endsection
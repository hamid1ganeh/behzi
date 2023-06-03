@extends('admin-panel.master')

@section('content')
    <a href="" class="btn btn-primary my-4" data-toggle="modal" data-target="#newDepartment">
        <i class="fa fa-plus"></i>
        <span>تعریف دپارتمان</span>
    </a>

    <!-- Modal -->
    <div class="modal fade" id="newDepartment" tabindex="-1" aria-labelledby="newDepartmentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newDepartmentLabel">تعریف دپارتمان</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('adminPanel.tickets.department.store') }}" method="POST"
                          id="new-department-form">
                        @csrf
                        <div class="form-group form-row">
                            <label for="name" class="col-2 col-form-label">نام</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label for="status" class="col-2 col-form-label">وضعیت</label>
                            <div class="col-10">
                                <select name="status" id="status" class="custom-select">
                                    <option value="0">فعال</option>
                                    <option value="1">غیر فعال</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <label for="operator" class="col-form-label col-2">اپراتور</label>
                            <div class="col-10 position-relative">
                                <i class="fa fa-sort text-dark"></i>
                                <select name="operator[]" id="operator" multiple>
                                    @foreach($admins as $admin)
                                        <option value="{{ $admin->getId() }}">{{ $admin->getName() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                    <button type="submit" class="btn btn-primary" form="new-department-form">ذخیره</button>
                </div>
            </div>
        </div>
    </div>


    <div class="bg-white p-2">
        <table class="table table-hover table-striped text-center">
            <thead>
            <tr>
                <th>نام</th>
                <th>وضعیت</th>
                <th>تعداد تیکت ها</th>
                <th>تعداد اپراتورها</th>
            </tr>
            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>
                        {{ $department->getName() }}
                    </td>
                    <td>
                        {{ $department->getStatus() }}
                    </td>
                    <td>
                        {{ $department->getNumberOfTickets() }}
                    </td>
                    <td>
                        {{ $department->getNumberOfOperators() }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css">
    <style>
        .fa-sort{
            font-size: 11px;
            position:absolute;
            left: 1.3rem;
            top:1rem;
            z-index: 2;
        }
    </style>
@stop

@section('script')
    <script>
        $(document).ready(function () {
            $('#operator').select2({width: '100%'});
        });
    </script>
@endsection
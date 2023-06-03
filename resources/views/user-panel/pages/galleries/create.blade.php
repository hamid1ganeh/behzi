@extends('user-panel.master')
@section('content')
    <div class="col-lg-8 offset-lg-2">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="col-12 rounded-top text-center" style="background-color: #eef2fd">
                <img src="{{ asset('images/static/new/gallery-create.png') }}">
                <h3 class="card-title pb-5">افرودن گالری جدید</h3>
            </div>


            <form class="form" action="{{ route('userPanel.pages.galleries.store',$page->id) }}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label> نام گالری:</label>
                        <input type="text" name="name" class="form-control" placeholder="نام گالری"/>
                        <span class="form-text text-danger"> {{ $errors->first('name') }} </span>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <button type="submit" class="col-5 btn btn-primary mr-2">افزودن</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--end::Card-->
    </div>
@endsection
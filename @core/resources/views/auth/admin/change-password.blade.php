@extends('backend.admin-master')
@section('site-title')
    تغيير كلمة المرور
@endsection
@section('content')
    <div class="main-content-inner margin-top-30">
        <div class="row">
            <div class="col-lg-12">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('admin.password.change')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="old_password">كلمة المرور القديمة </label>
                                <input type="password" class="form-control" id="old_password" name="old_password"
                                       placeholder="كلمة المرور القديمة">
                            </div>
                            <div class="form-group">
                                <label for="password">كلمة المرور الجديدة</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="كلمة المرور الجديدة">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">تاكيد كلمة المرور</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                       name="password_confirmation" placeholder="تاكيد كلمة المرور">
                            </div>
                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

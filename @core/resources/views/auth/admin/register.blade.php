@extends('layouts.login-screens')

@section('content')
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="login-form-head">
                        <h4>تسجيل دخول إلى لوحة التحكم</h4>
                       
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="username">البريد الالكتروني</label>
                            <input type="text" id="username" name="username" value="{{old('username')}}">
                            <i class="ti-email"></i>
                            @error('username')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-gp">
                            <label for="password">كلمة المرور</label>
                            <input type="password" id="password" name="password" id="password">
                            <i class="ti-lock"></i>
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                    <label class="custom-control-label" for="remember">تذكرني</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#">هل نسيت كلمة المرور</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">تسجيل دخول  <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Reset Password')}}
@endsection
@section('content')
    <section class="login-page-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-form-wrapper">
                        <h2>{{get_static_option('var_'.$user_select_lang_slug.'_reset_password')}}</h2>
                        @include('backend.partials.message')
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('user.reset.password.change')}}" method="post" enctype="multipart/form-data" class="account-form">
                            @csrf
                            <input type="hidden" name="token" value="{{$token}}">
                            <div class="form-group">
                                <input type="text" id="username" class="form-control" readonly value="{{$username}}" name="username"
                                placeholder="{{get_static_option('var_'.$user_select_lang_slug.'_user_name')}}">
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" class="form-control" name="password" placeholder="{{get_static_option('var_'.$user_select_lang_slug.'_password')}}">
                            </div>
                            <div class="form-group">
                                <input type="password" id="password_confirmation"  class="form-control" name="password_confirmation" placeholder="{{get_static_option('var_'.$user_select_lang_slug.'_confirm_password')}}">
                            </div>
                            <div class="form-group btn-wrapper">
                                <button type="submit" class=" nav-btn fully-rounded--rose px-5 text-muted p-3 h2 text-decoration-none">{{get_static_option('var_'.$user_select_lang_slug.'_reset_password')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


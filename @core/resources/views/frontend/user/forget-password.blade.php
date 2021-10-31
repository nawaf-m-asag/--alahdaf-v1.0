@extends('frontend.frontend-page-master')
@section('page-title')
   {{get_static_option('var_'.$user_select_lang_slug.'_forgot_password')}}
@endsection
@section('content')
    <section class="login-page-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-form-wrapper">
                        <h2>{{get_static_option('var_'.$user_select_lang_slug.'_forgot_password')}}</h2>
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
                        <form action="{{route('user.forget.password')}}" method="post" enctype="multipart/form-data" class="account-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="{{get_static_option('var_'.$user_select_lang_slug.'_user_name')}}">
                            </div>
                            <div class="form-group btn-wrapper">
                                <button type="submit" class=" nav-btn fully-rounded--rose px-5 text-muted p-3 h2 text-decoration-none">{{get_static_option('contact_page_'.$user_select_lang_slug.'_form_submit_btn_text')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

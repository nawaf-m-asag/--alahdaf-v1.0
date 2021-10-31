@extends('frontend.user.dashboard.user-master')
@section('section')
    <div class="dashboard-form-wrapper">
        <h2 class="title">{{get_static_option('var_'.$user_select_lang_slug.'_change_password')}}</h2>
        <form action="{{route('user.password.change')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="old_password">{{get_static_option('var_'.$user_select_lang_slug.'_old_password')}}</label></label>
                <input type="password" class="form-control p-3" id="old_password" name="old_password"
                       placeholder="{{get_static_option('var_'.$user_select_lang_slug.'_old_password')}}">
            </div>
            <div class="form-group">
                <label for="password">{{get_static_option('var_'.$user_select_lang_slug.'_new_password')}}</label>
                <input type="password" class="form-control p-3" id="password" name="password"
                       placeholder="{{get_static_option('var_'.$user_select_lang_slug.'_new_password')}}">
            </div>
            <div class="form-group">
                <label for="password_confirmation">{{get_static_option('var_'.$user_select_lang_slug.'_confirm_password')}}</label>
                <input type="password" class="form-control p-3" id="password_confirmation"
                       name="password_confirmation" placeholder="{{get_static_option('var_'.$user_select_lang_slug.'_confirm_password')}} ">
            </div>
            <button type="submit" class="nav-btn fully-rounded--rose px-5 text-muted p-3 mt-3 h2 text-decoration-none">حفظ</button>
        </form>
    </div>
@endsection
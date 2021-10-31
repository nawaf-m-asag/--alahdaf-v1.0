@extends('backend.admin-master')
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
@endsection
@section('site-title')
    تحرير الملف الشخصي
@endsection
@section('content')
    <div class="main-content-inner margin-top-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                       <x-error-msg/>
                       <x-flash-msg/>
                        <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="username">اسم المستخدم</label>
                                <input type="text" class="form-control" name="username" id="username" value="{{auth()->user()->username}} ">
                                <small class="info-text">لاتستخدم اي مسافة</small>
                            </div>
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{auth()->user()->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">البريد الالكتروني</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{auth()->user()->email}} ">
                            </div>
                            <x-media-upload :id="auth()->guard('admin')->user()->image" :name="'image'" :dimentions="'100x100'" :title="__('Image')"/>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection


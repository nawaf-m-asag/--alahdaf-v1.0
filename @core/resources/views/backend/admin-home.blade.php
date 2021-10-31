@extends('backend.admin-master')
@section('site-title')
    لوحة التحكم
@endsection
@section('content')

    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-3 mt-5 mb-3">
                        <div class="card">
                            <div class="dsh-box-style">
                                <a href="{{route('admin.new.user')}}" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-user"></i>
                                </div>
                                <div class="content">
                                    <span class="total">{{$total_admin}}</span>
                                    <h4 class="title">الادارة </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card">
                            <div class="dsh-box-style">
                                <a href="{{route('admin.blog.new')}}" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-layout-width-default"></i>
                                </div>
                                <div class="content">
                                    <span class="total">{{$blog_count}}</span>
                                    <h4 class="title">الاخبار</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                   
                  
                    @if(!empty(get_static_option('product_module_status')))
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card">
                            <div class="dsh-box-style">
                                <a href="{{route('admin.products.new')}}" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-package"></i>
                                </div>
                                <div class="content">
                                    <span class="total">{{$total_products}}</span>
                                    <h4 class="title">المنتجات</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    @endif
                   
                  
                </div>
            </div>
        </div>
     
    </div>
@endsection

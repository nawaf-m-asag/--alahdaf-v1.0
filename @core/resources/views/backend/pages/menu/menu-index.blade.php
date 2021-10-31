@extends('backend.admin-master')
@section('site-title')
    القوائم
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                @include('backend/partials/message')
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">القوائم</h4>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @php $a=0; @endphp
                            @foreach($all_menu as $key => $menu)
                                <li class="nav-item">
                                    <a class="nav-link @if($a == 0) active @endif"  data-toggle="tab" href="#slider_tab_{{$key}}" role="tab" aria-controls="home" aria-selected="true">{{get_language_by_slug($key)}}</a>
                                </li>
                                @php $a++; @endphp
                            @endforeach
                        </ul>
                        <div class="tab-content margin-top-40" id="myTabContent">
                            @php $b=0; @endphp
                            @foreach($all_menu as $key => $menu)
                                <div class="tab-pane fade @if($b == 0) show active @endif" id="slider_tab_{{$key}}" role="tabpanel" >
                                    <table class="table table-default">
                                        <thead>
                                        <th>المعرف</th>
                                        <th>العنوان</th>
                                        <th>الحالة</th>
                                        <th>تاريخ الانشاء</th>
                                        <th>العمليات</th>
                                        </thead>
                                        <tbody>
                                        @foreach($menu as $data)
                                            <tr>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->title}}</td>
                                                <td>
                                                    @if($data->status == 'default')
                                                        <span class="alert alert-success">القائمة الافتراضية</span>
                                                    @else
                                                        <form action="{{route('admin.menu.default',$data->id)}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-info btn-sm mb-3 mr-1 set_default_menu">تحديد كأفتراضية</button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td>{{$data->created_at->diffForHumans()}}</td>
                                                <td>
                                                    @if($data->status != 'default')
                                                    <x-delete-popover :url="route('admin.menu.delete',$data->id)"/>
                                                    @endif
                                                    <a class="btn btn-lg btn-primary btn-sm mb-3 mr-1" href="{{route('admin.menu.edit',$data->id)}}">
                                                        <i class="ti-pencil"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @php $b++; @endphp
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">اضافة قائمة</h4>
                        <form action="{{route('admin.menu.new')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>اللغة</label>
                                        <select name="lang" id="language" class="form-control">
                                            @foreach($all_languages as $lang)
                                                <option value="{{$lang->slug}}">{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">العنوان</label>
                                        <input type="text" class="form-control"  id="title" name="title" placeholder="العنوان">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">اضافة</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection

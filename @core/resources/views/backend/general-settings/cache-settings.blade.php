@extends('backend.admin-master')
@section('site-title')
 اعدادات الكاش
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"اعدادات الكاش</h4>
                        <form action="{{route('admin.general.cache.settings')}}" method="POST" id="cache_settings_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="cache_type" id="cache_type" class="form-control">
                             <button class="btn btn-primary mt-4 pr-4 pl-4 clear-cache-submit-btn" data-value="view">مسح الفيو</button><br>
                             <button class="btn btn-primary mt-4 pr-4 pl-4 clear-cache-submit-btn" data-value="route">مسح الراوت</button><br>
                             <button class="btn btn-primary mt-4 pr-4 pl-4 clear-cache-submit-btn" data-value="config">مسح التكوينات</button><br>
                             <button class="btn btn-primary mt-4 pr-4 pl-4 clear-cache-submit-btn" data-value="cache">مسح الكاش </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    (function($){
        "use strict";
        
        $(document).ready(function(){
            $(document).on('click','.clear-cache-submit-btn',function(e){
                e.preventDefault();
                $('#cache_type').val($(this).data('value'));
                $('#cache_settings_form').submit();
            });
        });
        
        
    })(jQuery);
</script>
@endsection
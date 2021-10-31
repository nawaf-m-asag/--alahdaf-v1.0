@extends('frontend.frontend-master')
@section('site-title')
    {{get_static_option('about_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-title')
    {{get_static_option('about_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('about_page_'.$user_select_lang_slug.'_meta_description')}}">
    <meta name="tags" content="{{get_static_option('about_page_'.$user_select_lang_slug.'_meta_tags')}}">
@endsection
@section('content')
    @if(!empty(get_static_option('about_page_page_builder_status')))
        {!! \App\PageBuilder\PageBuilderSetup::render_frontend_pagebuilder_content_by_location('aboutpage') !!}
    @else
        @include('frontend.partials.about-page-content')
    @endif
@endsection

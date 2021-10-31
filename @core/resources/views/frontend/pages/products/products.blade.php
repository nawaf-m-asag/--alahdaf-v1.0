@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('product_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-title')
    {{get_static_option('product_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('product_page_'.$user_select_lang_slug.'_meta_description')}}">
    <meta name="tags" content="{{get_static_option('product_page_'.$user_select_lang_slug.'_meta_tags')}}">
@endsection
@section('main_class')
bg-light
@endsection
@section('content')
<style>
    .card-img-products{
        width:100%;
        height:180px;
    }
</style>
<section class="products mb-0 pb-5">
    <div class="container bg-light">
        <div class="route py-5 h4">
            <a class="text-decoration-none text-muted fw-lighter" href="{{url('/')}}">{{get_static_option('var_'.$user_select_lang_slug.'_home')}}</a>
            / <a class="text-decoration-none text-muted fw-lighter" href="{{url('/').'/'.get_static_option('product_category_')}}"> {{get_static_option('product_category_' . $user_select_lang_slug . '_text')}}</a>
        </div>
        

        <h2 class="products__title pb-2 mb-5 ">{{get_static_option('product_category_'.$user_select_lang_slug.'_text')}} </h2>

        @php
            $id=isset($_GET['id'])?$_GET['id']:'';
        @endphp
        <div class="accordion" id="accordionExample">
            @foreach ($all_category as $key=> $item)
             
           
            <div class="accordion-item">
                <h2 class="accordion-header"
                    id="heading{{$item->id}}">
                    <button class="accordion-button text-muted fw-lighter 
                        @if ($item->id!=$id)
                        collapsed
                        @endif"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapse{{$item->id}}"   
                        aria-expanded="true"
                      
                        aria-controls="collapse{{$item->id}}">
                        {{$item->title}}
                    </button>
                </h2>
                <div id="collapse{{$item->id}}"
                    
                    class="accordion-collapse collapse 
                    @if ($item->id==$id)
                       show
                    @endif"
                    aria-labelledby="heading{{$item->id}}"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            
                            @foreach($all_products->chunk(4) as $row)
                          
                             @foreach($row as $key => $data)
                               
                                 @if ($data->category_id==$item->id)
                                    <div class="col-lg-3 col-sm-6 col-md-4 border-bottom  border-start  p-md-3 p-lg-5 p-sm-1 p-1">
                                                {!! render_image_markup_by_attachment_id($data->image,'card-img-products','grid') !!}
                                        <h3 class="px-4 py-1">{{$data->title}}</h3>
                                        <a href="{{route('frontend.products.single',$data->slug)}}"
                                            class="fully-rounded--rose text-decoration-none text-muted px-4 py-1 mb-3 ">
                                            {{get_static_option('var_'.$user_select_lang_slug.'_details')}}
                                        </a>
                                        @if ($data->downloadable_file!=null)
                                        <a href="{{route('products.file.download',$data->id)}}"
                                            class="fully-rounded-bg--rose text-decoration-none text-light px-4 py-1 ">
                                            PDF
                                        </a>    
                                        @endif
                                    </div>
                                    @endif
                                @endforeach
                               
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        
        </div>
    </div>
</section>
</main>
@endsection




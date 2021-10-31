@extends('backend.admin-master')
@section('site-title')
طلبات المنتجات
@endsection
@section('style')
    <style>
        .extra-data {
            margin-bottom: 20px;
        }
        .billing-and-shipping-details {
            margin-bottom: 40px;
        }
        .product-variant-list-wrapper {
            display: flex;
        }
        .product-variant-list-wrapper .title {
            font-size: 16px;
            line-height: 20px;
            margin-right: 10px;
        }
        .pdetails{
            margin-bottom: 10px;
            display: block;
        }
    </style>
@endsection
@section('content')
   <div class="col-lg-12 margin-top-40 ">
       <div class="card">
           <div class="card-body">
               <div class="order-success-area">
                   <div class="product-orders-summery-warp">
                       <div class="header-wap margin-bottom-30 d-flex justify-content-between">
                           <h3 class="title">تفاصيل الطلب</h3>
                           <div class="btn-wrapper">
                               <a href="{{route('admin.products.order.logs')}}" class="btn btn-primary">الطلبات</a>
                           </div>
                       </div>
                       <div class="extra-data">
                           <ul>
                               <li><strong>رقم الطلب :</strong> {{'#'.$order_details->id}}</li>
                               <li><strong>طريقة الشحن : </strong> {{get_shipping_name_by_id($order_details->product_shippings_id)}}</li>
                               <li><strong>طريقة الدفع : </strong> {{str_replace('_',' ', ucfirst($order_details->payment_gateway))}}</li>
                               <li><strong>حالة الدفع : </strong> {{__($order_details->payment_status)}}</li>
                               <li><strong>رقم المعاملة : </strong> {{__($order_details->transaction_id)}}</li>
                               <li><strong>حالة الطلب : </strong> {{__($order_details->status)}}</li>
                           </ul>
                       </div>
                       <div class="billing-and-shipping-details">
                           <div class="billing-wrap">
                               <h4 class="title">تفاصيل الفاتورة</h4>
                               <ul>
                                   <li><strong>الاسم :</strong> {{$order_details->billing_name}}</li>
                                   <li><strong>البريد الالكتروني : </strong> {{$order_details->billing_email}}</li>
                                   <li><strong>الهاتف : </strong> {{$order_details->billing_phone}}</li>
                                   <li><strong>البلد : </strong> {{$order_details->billing_country}}</li>
                                   <li><strong>العنوان : </strong> {{$order_details->billing_street_address}}</li>
                                   <li><strong>المنطقة</strong> {{$order_details->billing_district}}</li>
                                   <li><strong>المحافظة</strong> {{$order_details->billing_town}}</li>
                               </ul>
                           </div>
                           @if($order_details->different_shipping_address == 'yes')
                               <div class="billing-wrap">
                                   <h4 class="title">تفاصيل الشحن</h4>
                                   <ul>
                                       <li><strong>الاسم : </strong> {{$order_details->shipping_name}}</li>
                                       <li><strong>البريد الالكتروني</strong> {{$order_details->shipping_email}}</li>
                                       <li><strong>الهاتف : </strong> {{$order_details->shipping_phone}}</li>
                                       <li><strong>البلد : </strong> {{$order_details->shipping_country}}</li>
                                       <li><strong>العنوان : </strong> {{$order_details->shipping_street_address}}</li>
                                       <li><strong>المنطقة : </strong> {{$order_details->shipping_district}}</li>
                                       <li><strong>المحافظة : </strong> {{$order_details->shipping_town}}</li>
                                   </ul>
                               </div>
                           @endif
                       </div>
                       @php $cart_items = unserialize($order_details->cart_items); @endphp
                       <h4 class="title">مبلغ الطلب</h4>
                       <div class="cart-total-table-wrap">
                           <div class="cart-total-table table-responsive table-default">
                               <table class="table table-bordered">
                                   <tr>
                                       <td><strong>الاجمالي</strong></td>
                                       <td>{{amount_with_currency_symbol($order_details->subtotal)}}</td>
                                   </tr>
                                   <tr>
                                       <td><strong>خصم الكوبون</strong></td>
                                       <td>- {{amount_with_currency_symbol($order_details->coupon_discount)}}</td>
                                   </tr>
                                   <tr>
                                       <td><strong>رسوم الشحن</strong></td>
                                       <td>+ {{amount_with_currency_symbol($order_details->shipping_cost)}}</td>
                                   </tr>
                                   @if(is_tax_enable())
                                       @php $tax_percentage = get_static_option('product_tax_type') == 'total' ? '('.get_static_option('product_tax_percentage').')' : '';  @endphp
                                       <tr>
                                           <td><strong>الضريبة :  {{$tax_percentage}}</strong></td>
                                           <td>+ {{amount_with_currency_symbol(cart_tax_for_mail_template($cart_items))}}</td>
                                       </tr>
                                   @endif
                                   <tr>
                                       <td><strong>الاجمالي الكلي</strong></td>
                                       <td>{{amount_with_currency_symbol($order_details->total)}}</td>
                                   </tr>
                               </table>
                               @if(get_static_option('product_tax') && get_static_option('product_tax_system') == 'inclusive')
                                   <p class="tax-info"></p>
                               @endif
                           </div>
                       </div>
                   </div>
                   <div class="ordered-product-summery margin-top-30">
                       <h4 class="title">المنتجات التي تم طلبها</h4>
                       <table class="table table-bordered order-view-table">
                           <thead>
                           <th>الصورة</th>
                           <th>معلومات المنتجات</th>
                           </thead>
                           <tbody>
                           @foreach($cart_items as $item)
                               @php $product_info = \App\Products::find($item['id']);@endphp
                               <tr>
                                   <td>
                                       <div class="product-thumbnail">
                                           {!! render_image_markup_by_attachment_id($product_info->image,'','thumb') !!}
                                       </div>
                                   </td>
                                   <td>
                                       <div class="product-info-wrap">
                                           <h4 class="product-title margin-bottom-20"><a href="{{route('frontend.products.single',$product_info->slug)}}">{{$product_info->title}}</a></h4>
                                           @if (!empty($item['variant']))
                                               @foreach(json_decode($item['variant']) as $variant)
                                                   @php
                                                       $variant_title = get_product_variant_list_by_id($variant->variantID);
                                                   @endphp
                                                   @if(!empty($variant_title))
                                                       <div class="product-variant-list-wrapper">
                                                           <h5 class="title">{{$variant_title}}</h5>
                                                           <ul class="product-variant-list">
                                                               <li>{{$variant->term}}</li>
                                                           </ul>
                                                       </div>
                                                   @endif
                                               @endforeach
                                           @endif
                                           <span class="pdetails"><strong>السعر : </strong> {{amount_with_currency_symbol($product_info->sale_price)}}</span>
                                           <span class="pdetails"><strong>الكمية : </strong> {{$item['quantity']}}</span>
                                           @php $tax_amount = 0; @endphp
                                           @if(get_static_option('product_tax_type') == 'individual' && is_tax_enable())
                                               @php
                                                   $percentage = !empty($product_info->tax_percentage) ? $product_info->tax_percentage : 0;
                                                   $tax_amount = ($product_info->sale_price * $item['quantity']) / 100 * $product_info->tax_percentage;
                                               @endphp
                                               <span class="pdetails" style="color: red"><strong>الضريبة : {{'('.$percentage.'%) :'}}</strong> +{{amount_with_currency_symbol($tax_amount)}}</span>
                                           @endif
                                           <span class="pdetails"><strong>الاجمالي : </strong> {{amount_with_currency_symbol($product_info->sale_price * $item['quantity'] + $tax_amount )}}</span>
                                       </div>
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection

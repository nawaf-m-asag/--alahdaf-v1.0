@extends('backend.admin-master')
@section('site-title')
  تقارير طلبات المنتجات
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                @if(!empty($error_msg))
                    <div class="alert alert-danger">{{$error_msg}}</div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">  تقارير طلبات المنتجات</h4>
                        <form action="{{route('admin.products.order.report')}}" method="get" enctype="multipart/form-data" id="report_generate_form">
                            <input type="hidden" name="page" value="1">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="start_date">تاريخ البدء</label>
                                        <input type="date" name="start_date" value="{{$start_date}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="end_date">تاريخ النهاية</label>
                                        <input type="date" name="end_date" value="{{$end_date}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="payment_status">حالة الدفع</label>
                                        <select name="payment_status" id="order_status" class="form-control">
                                            <option value="">الكل</option>
                                            <option @if( $payment_status == 'pending') selected @endif value="pending">قيد الانتظار</option>
                                            <option @if( $payment_status == 'complete') selected @endif value="complete">مكتمل</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="order_status">حالة الطلب</label>
                                        <select name="order_status" id="order_status" class="form-control">
                                            <option value="">الكل</option>
                                            <option @if( $order_status == 'pending') selected @endif value="pending">قيد الانتظار</option>
                                            <option @if( $order_status == 'in_progress') selected @endif value="in_progress">قيد المعالجة</option>
                                            <option @if( $order_status == 'shipped') selected @endif value="shipped">قيد الشحن</option>
                                            <option @if( $order_status == 'cancel') selected @endif value="cancel">ملغى</option>
                                            <option @if( $order_status == 'complete') selected @endif value="complete">مكتمل</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="items">المنتجات</label>
                                        <select name="items" id="items" class="form-control">
                                            <option @if( $items == '10') selected @endif value="10">10</option>
                                            <option @if( $items == '20') selected @endif value="20">20</option>
                                            <option @if( $items == '50') selected @endif value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">تطبيق</button>
                                    @if(!empty($order_data) && count($order_data) > 0)
                                        <button type="button" class="btn btn-secondary mt-4 pr-4 pl-4" id="download_as_csv"><i class="fas fa-download"></i> {{__('CSV')}}</button>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if(!empty($order_data))
                    <div class="card">
                        <div class="card-body">
                            @if(count($order_data) > 0)
                                <div class="table-wrap">
                                    <table class="table table-bordered">
                                        <thead>
                                        <th>رقم الطلب</th>
                                        <th>الاسم</th>
                                        <th>البريد الالكتروني</th>
                                        <th>الهاتف</th>
                                        <th>البلد</th>
                                        <th>العنوان</th>
                                        <th>المحافظة</th>
                                        <th>المنطقة</th>
                                        <th>الاسم في الشحن</th>
                                        <th>البريد الالكتروني</th>
                                        <th>الهاتف للشحن</th>
                                        <th>البريد الالكتروني للشحن</th>
                                        <th>العنوان للشحن</th>
                                        <th>المحافظة</th>
                                        <th>المنطقة</th>
                                        <th>طريقة الشحن </th>
                                        <th>رسوم الشحن</th>
                                        <th>اجمالي للمبلغ</th>
                                        <th>طريقة الدفع</th>
                                        <th>حالة الطلب</th>
                                        <th>حالة الدف</th>
                                        <th>رقم المعاملة</th>
                                        <th>التاريخ</th>
                                        </thead>
                                        <tbody>
                                        @foreach($order_data as $data)
                                            <tr>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->billing_name}}</td>
                                                <td>{{$data->billing_email}}</td>
                                                <td>{{$data->billing_phone}}</td>
                                                <td>{{$data->billing_country}}</td>
                                                <td>{{$data->billing_street_address}}</td>
                                                <td>{{$data->billing_town}}</td>
                                                <td>{{$data->billing_district}}</td>
                                                <td>{{$data->shipping_name}}</td>
                                                <td>{{$data->shipping_email}}</td>
                                                <td>{{$data->shipping_phone}}</td>
                                                <td>{{$data->shipping_country}}</td>
                                                <td>{{$data->shipping_street_address}}</td>
                                                <td>{{$data->shipping_town}}</td>
                                                <td>{{$data->shipping_district}}</td>
                                                <td>{{$data->shipping_details ? $data->shipping_details->title : __('Shipping Not Available')}}</td>
                                                <td>{{$data->shipping_details ? amount_with_currency_symbol($data->shipping_details->cost) : __('Shipping Not Available')}}</td>
                                                <td>{{amount_with_currency_symbol($data->total)}}</td>
                                                <td><strong>{{ucwords(str_replace('_',' ',$data->payment_gateway))}}</strong></td>
                                                <td>
                                                    @if($data->status == 'pending')
                                                        <span class="alert alert-warning text-capitalize">{{$data->status}}</span>
                                                    @elseif($data->status == 'in_progress')
                                                        <span class="alert alert-info text-capitalize">{{ucwords(str_replace('_',' ',$data->status))}}</span>
                                                    @elseif($data->status == 'shipped')
                                                        <span class="alert alert-info text-capitalize">{{$data->status}}</span>
                                                    @elseif($data->status == 'complete')
                                                        <span class="alert alert-success text-capitalize">{{$data->status}}</span>
                                                    @elseif($data->status == 'cancel')
                                                        <span class="alert alert-danger text-capitalize">{{$data->status}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($data->payment_status == 'pending')
                                                        <span class="alert alert-warning text-capitalize">{{str_replace('-',' ',$data->payment_status)}}</span>
                                                    @else
                                                        <span class="alert alert-success text-capitalize">{{str_replace('-',' ',$data->payment_status)}}</span>
                                                    @endif
                                                </td>
                                                <td>{{$data->transaction_id}}</td>
                                                <td>{{date_format($data->created_at,'d M Y')}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination-wrapper report-pagination">
                                    {!! $order_data->links() !!}
                                </div>
                            @else
                                <div class="alert alert-warning">لايوجد</div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function (){
            $(document).on('click','.report-pagination nav ul li a',function (e){
                e.preventDefault();
                var el = $(this);
                var href = el.attr('href');
                var match = href.match(/(:?=)\d+/);
                var pageNumber = match != null ? match[0].replace('=',' ') : '';
                $('input[name="page"]').val(pageNumber.trim());
                $('#report_generate_form').submit();
            });

            $(document).on('click','#download_as_csv',function (e){
                e.preventDefault();
                exportTableToCSV('product-order-report.csv');
            });

            function downloadCSV(csv, filename) {
                var csvFile;
                var downloadLink;

                // CSV file
                csvFile = new Blob([csv], {type: "text/csv"});

                // Download link
                downloadLink = document.createElement("a");

                // File name
                downloadLink.download = filename;

                // Create a link to the file
                downloadLink.href = window.URL.createObjectURL(csvFile);

                // Hide download link
                downloadLink.style.display = "none";

                // Add the link to DOM
                document.body.appendChild(downloadLink);

                // Click download link
                downloadLink.click();
            }

            function exportTableToCSV(filename) {
                var csv = [];
                var rows = document.querySelectorAll("table tr");

                for (var i = 0; i < rows.length; i++) {
                    var row = [], cols = rows[i].querySelectorAll("td, th");

                    for (var j = 0; j < cols.length; j++)
                        row.push(cols[j].innerText);

                    csv.push(row.join(","));
                }

                // Download CSV file
                downloadCSV(csv.join("\n"), filename);
            }


        });


    </script>
@endsection

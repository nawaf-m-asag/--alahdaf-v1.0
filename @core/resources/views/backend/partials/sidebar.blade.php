@php $home_page_variant = get_static_option('home_page_variant');@endphp
<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo" style="max-height: 50px;">
            <a href="{{route('admin.home')}}">
                @php
                    $logo_type = 'site_logo';
                    if(!empty(get_static_option('site_admin_dark_mode'))){
                        $logo_type = 'site_white_logo';
                    }
                @endphp
                {!! render_image_markup_by_attachment_id(get_static_option($logo_type)) !!}
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav id="main_menu_wrap">
                <ul class="metismenu" id="menu">
                    <li class="{{active_menu('admin-home')}}">
                        <a href="{{route('admin.home')}}"
                           aria-expanded="true">
                            <i class="ti-dashboard"></i>
                            <span>لوحة التحكم</span>
                        </a>
                    </li>
                    @if(check_page_permission('admin_manage'))
                    <li
                        class="main_dropdown
                        @if(request()->is(['admin-home/admin/*'])) active @endif
                        ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span>مدير الموقع</span></a>
                        <ul class="collapse">
                            <li class="{{active_menu('admin-home/admin/all')}}"><a
                                        href="{{route('admin.all.user')}}">الكل </a></li>
                            <li class="{{active_menu('admin-home/admin/new')}}"><a
                                        href="{{route('admin.new.user')}}">اضافة جديد</a></li>
                            <li class="{{active_menu('admin-home/admin/all/role')}}"><a
                                        href="{{route('admin.all.user.role')}}">الصلاحيات</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(check_page_permission_by_string('Users Manage'))
                    <li
                        class="main_dropdown
                        @if(request()->is([
                        'admin-home/frontend/user/*',
                        ])) active @endif
                        ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-user"></i>
                            <span>المستخدمين</span></a>
                        <ul class="collapse">
                            <li class="{{active_menu('admin-home/frontend/user/all')}}"><a
                                    href="{{route('admin.all.frontend.user')}}">كل المستخدمين</a></li>
                            <li class="{{active_menu('admin-home/frontend/user/new')}}"><a
                                    href="{{route('admin.frontend.new.user')}}">اضافة مستخدم جديد</a></li>
                        </ul>
                    </li>
                    @endif
                   

                   

                    @if(check_page_permission_by_string('Blogs Manage'))
                        <li
                         class="main_dropdown
                        @if(request()->is(['admin-home/blog/*','admin-home/blog'])) active @endif
                        ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>الملتقى الصناعي</span></a>
                            <ul class="collapse">
                                <li class="{{active_menu('admin-home/blog')}}"><a
                                            href="{{route('admin.blog')}}">الكل</a></li>
                                <li class="{{active_menu('admin-home/blog/category')}}"><a
                                            href="{{route('admin.blog.category')}}">التصنيفات</a></li>
                                <li class="{{active_menu('admin-home/blog/new')}}"><a
                                            href="{{route('admin.blog.new')}}">اضافة جديد</a></li>
                                <li class="{{active_menu('admin-home/blog/page-settings')}}"><a
                                        href="{{route('admin.blog.page.settings')}}">اعدادت  </a></li>
                              
                            </ul>
                        </li>
                    @endif
                   
                    @if(check_page_permission_by_string('Blogs Manage'))
                    <li
                     class="main_dropdown
                    @if(request()->is(['admin-home/last-news/*','admin-home/last-news'])) active @endif
                    ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="fas fa-newspaper"></i>
                            <span> الاخبار</span></a>
                        <ul class="collapse">
                            <li class="{{active_menu('admin-home/last-news')}}"><a
                                        href="{{route('admin.last-news')}}">الاخبار</a></li>
                            <li class="{{active_menu('admin-home/last-news/category')}}"><a
                                        href="{{route('admin.last-news.category')}}">التصنيفات</a></li>
                            <li class="{{active_menu('admin-home/last-news/new')}}"><a
                                        href="{{route('admin.last-news.new')}}">اضافة جديد</a></li>
                            <li class="{{active_menu('admin-home/last-news/page-settings')}}"><a
                                    href="{{route('admin.last-news.page.settings')}}">الاعدادات</a></li>
                                     
                           
                        </ul>
                    </li>
                    @endif


                    @if(check_page_permission_by_string('Services'))
                    <li class="main_dropdown
                    @if(request()->is(['admin-home/services/*','admin-home/services'])) active @endif
                    ">
                        <a href="javascript:void(0)"
                           aria-expanded="true">
                            <i class="ti-layout"></i>
                            <span>بوابة العملاء</span>
                        </a>
                        <ul class="collapse">
                            >
                           
                            <li class="{{active_menu('admin-home/services/category')}}"><a
                                    href="{{route('admin.service.category')}}">بوابة العملاء</a></li>
                          
                        </ul>
                    </li>
                    @endif
                   
                   
                    @if(check_page_permission_by_string('Video Gallery'))
                        <li class="main_dropdown
                        {{active_menu('admin-home/video-gallery')}}
                        @if(request()->is('admin-home/video-gallery/*')) active @endif
                                ">
                            <a href="javascript:void(0)" aria-expanded="true"><i class="ti-write"></i>
                                <span>الفديوهات</span></a>
                            <ul class="collapse">
                                <li class="{{active_menu('admin-home/video-gallery')}}">
                                    <a href="{{route('admin.video.gallery.all')}}" >الفيديو</a>
                                </li>
                               
                            </ul>
                        </li>
                    @endif
                    
                   
                   @if(check_page_permission_by_string('Testimonial'))
                    <li class="main_dropdown {{active_menu('admin-home/testimonial')}}">
                        <a href="{{route('admin.testimonial')}}" aria-expanded="true"><i class="ti-control-forward"></i>
                            <span>السلايدر</span></a>
                    </li>
                    @endif
                   
                   
                  
                    <li class="main_dropdown
                    @if(request()->is(['admin-home/quote-manage/*',
                    'admin-home/package/*',
                    'admin-home/payment-logs',
                    'admin-home/payment-logs/report',
                    'admin-home/jobs',
                    'admin-home/jobs/*',
                    'admin-home/events',
                    'admin-home/events/*',
                    'admin-home/products',
                    'admin-home/products/*',
                    'admin-home/donations',
                    'admin-home/donations/*',
                    'admin-home/knowledge',
                    'admin-home/knowledge/*',
                    'admin-home/appointment/*',
                    'admin-home/courses/*',
                    'admin-home/support-tickets/*',
                    'admin-home/support-tickets'
                    ])) active @endif">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                            <span>إدارة المنتجات</span></a>
                        <ul class="collapse ">
                         
                            <!--
                           
                            @if(check_page_permission_by_string('Package Orders Manage'))
                               <li class="main_dropdown @if(request()->is(['admin-home/payment-logs/report','admin-home/payment-logs','admin-home/package/*'])) active @endif
                                        ">
                                    <a href="javascript:void(0)" aria-expanded="true">
                                        الطلبات</a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/package/order-manage/all')}}"><a
                                                    href="{{route('admin.package.order.manage.all')}}">كل الطلبات</a></li>
                                        <li class="{{active_menu('admin-home/package/order-manage/pending')}}"><a
                                                    href="{{route('admin.package.order.manage.pending')}}">قيد الانتظار</a></li>
                                        <li class="{{active_menu('admin-home/package/order-manage/in-progress')}}"><a
                                                    href="{{route('admin.package.order.manage.in.progress')}}">تحت المعالجة</a></li>
                                        <li class="{{active_menu('admin-home/package/order-manage/completed')}}"><a
                                                    href="{{route('admin.package.order.manage.completed')}}">المكتملة</a></li>
                                        <li class="{{active_menu('admin-home/package/order-manage/success-page')}}"><a
                                                    href="{{route('admin.package.order.success.page')}}">جميع الطلبات المكتملة</a></li>
                                        <li class="{{active_menu('admin-home/package/order-manage/cancel-page')}}"><a
                                                    href="{{route('admin.package.order.cancel.page')}}">جميع الطلبات الملغاه</a></li>
                                        <li class="{{active_menu('admin-home/package/order-page')}}">
                                            <a href="{{route('admin.package.order.page')}}">ادارة الطلبات</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/package/order-report')}}">
                                            <a href="{{route('admin.package.order.report')}}">تقارير الطلبات</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/payment-logs')}}"><a
                                                    href="{{route('admin.payment.logs')}}">سجل المدفوعات</a></li>
                                        <li class="{{active_menu('admin-home/payment-logs/report')}}"><a
                                                    href="{{route('admin.payment.report')}}">تقارير المدفوعات</a></li>
                                        <li class="{{active_menu('admin-home/package/order-manage/settings')}}"><a
                                                    href="{{route('admin.package.settings')}}">الاعدادات</a></li>
                                    </ul>
                                </li>
                            @endif
                            -->
                            
                            @if(check_page_permission_by_string('Products Manage') && !empty(get_static_option('product_module_status')))
                                    <li class="main_dropdown
                                    {{active_menu('admin-home/products')}}
                                    @if(request()->is('admin-home/products/*')) active @endif
                                            ">
                                        <a href="javascript:void(0)" aria-expanded="true">
                                            المنتجات</a>
                                        <ul class="collapse">
                                            <li class="{{active_menu('admin-home/products')}}"><a
                                                        href="{{route('admin.products.all')}}">المنتجات</a></li>
                                            <li class="{{active_menu('admin-home/products/new')}}"><a
                                                        href="{{route('admin.products.new')}}">اضافة منتج جديد</a></li>
                                            <li class="{{active_menu('admin-home/products/category')}}"><a
                                                        href="{{route('admin.products.category.all')}}">التصنيفات</a></li>
                                           <!-- <li class="{{active_menu('admin-home/products/shipping')}}"><a
                                                        href="{{route('admin.products.shipping.all')}}">الشحن</a></li>
                                            <li class="{{active_menu('admin-home/products/coupon')}}"><a
                                                        href="{{route('admin.products.coupon.all')}}">الكوبونات</a></li>
                                            <li class="{{active_menu('admin-home/products/variants')}}"><a
                                                        href="{{route('admin.products.variants.all')}}">{{__('Variants')}}</a></li>
                                            <li class="{{active_menu('admin-home/products/page-settings')}}"><a
                                                        href="{{route('admin.products.page.settings')}}">اعدادات صفحة المنتجات</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/products/single-page-settings')}}"><a
                                                        href="{{route('admin.products.single.page.settings')}}">اعدادات المنتج</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/products/success-page-settings')}}"><a
                                                        href="{{route('admin.products.success.page.settings')}}">اعدادات الطلبات المكتملة</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/products/cancel-page-settings')}}"><a
                                                        href="{{route('admin.products.cancel.page.settings')}}">اعدادات الطلبات الملغاة</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/products/product-order-logs')}}"><a
                                                        href="{{route('admin.products.order.logs')}}">الطلبات</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/products/product-ratings')}}"><a
                                                        href="{{route('admin.products.ratings')}}">التقييمات</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/products/order-report')}}">
                                                <a href="{{route('admin.products.order.report')}}">تقارير الطلبات</a>
                                            </li>
                                            <li class="{{active_menu('admin-home/products/tax-settings')}}">
                                                <a href="{{route('admin.products.tax.settings')}}">اعدادات الضريبة</a>
                                            </li> -->
                                            <li class="{{active_menu('admin-home/products/settings')}}">
                                                <a href="{{route('admin.products.settings')}}">الاعدادات</a>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                           
                            
                            
                        </ul>
                    </li>
                 
                    <li class="main_dropdown
                    @if(request()->is([
                    'admin-home/form-builder/*',
                    'admin-home/email-template/*',
                    'admin-home/popup-builder/*',
                    'admin-home/widgets/*',
                    'admin-home/widgets',
                    'admin-home/menu-edit/*',
                    'admin-home/media-upload/page',
                    'admin-home/menu',
                    'admin-home/appearance-setting/*'
                    ])) active @endif
                    ">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                            <span>إدارة المحتوى</span></a>
                        <ul class="collapse ">
                             @if(check_page_permission('about_page_manage'))
                             <li class="main_dropdown @if (request()->is('admin.e-portal.page')) active @endif ">
                                <a href="{{route('admin.e-portal.page')}}">
                                الخدمات الا لكترونية
                                </a>
                            
                            </li>
                             @endif
                            @if(check_page_permission_by_string('Topbar Settings'))
                                <li class="{{active_menu('admin-home/appearance-setting/topbar-settings')}}">
                                    <a href="{{route('admin.topbar.settings')}}"
                                       aria-expanded="true">
                                        مواقع التواصل
                                    </a>
                                </li>
                            @endif
                            @if(check_page_permission('about_page_manage'))
                                <li class="main_dropdown @if(request()->is('admin-home/about-page/*') || request()->is('admin-home/page-builder/about-page')  ) active @endif ">
                                    <a href="javascript:void(0)"
                                       aria-expanded="true">
                                       من نحن
                                    </a>
                                    <ul class="collapse">
                                        @if(empty(get_static_option('about_page_page_builder_status')))
                                        <li class="{{active_menu('admin-home/about-page/about-us')}}"><a
                                                    href="{{route('admin.about.page.about')}}">من نحن</a></li>
                                        <li class="{{active_menu('admin-home/about-page/global-network')}}"><a
                                                    href="{{route('admin.about.global.network')}}">قسم العملاء</a></li>
                                       <li class="{{active_menu('admin-home/contact-page/map')}}">
                                            <a href="{{route('admin.contact.page.map')}}">الخريطة</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/contact-page/contact-info')}}">
                                            <a href="{{route('admin.contact.info')}}">معلومات التواصل</a>
                                        </li>
                                        <li class="{{active_menu('admin-home/about-page/team-member')}}"><a
                                                    href="{{route('admin.about.team.member')}}">قسم الفريق</a></li>
                                       
                                       
                                        
                                        @endif 
                                       
                                    </ul>
                                </li>
                            @endif
                            @if(check_page_permission_by_string('Home Variant'))
                               
                               
                               
                            @endif

                            @if(check_page_permission_by_string('Menus Manage'))
                                <li
                                        class="main_dropdown
                                        {{active_menu('admin-home/menu')}}
                                        @if(request()->is('admin-home/menu-edit/*')) active @endif
                                        ">
                                    <a href="javascript:void(0)" aria-expanded="true">
                                         القوائم</a>
                                    <ul class="collapse">
                                        <li class="{{active_menu('admin-home/menu')}}"><a
                                                    href="{{route('admin.menu')}}">اداره القوائم </a></li>
                                    </ul>
                                </li>
                            @endif
                                @if(check_page_permission_by_string('Widgets Manage'))
                                    <li
                                            class="main_dropdown
                                            {{active_menu('admin-home/widgets')}}
                                            @if(request()->is('admin-home/widgets/*')) active @endif
                                                    ">
                                        <a href="javascript:void(0)" aria-expanded="true">
                                            الفوتر</a>
                                        <ul class="collapse">
                                            <li class="{{active_menu('admin-home/widgets')}}"><a
                                                        href="{{route('admin.widgets')}}">اداره الفوتر</a></li>
                                        </ul>
                                    </li>
                                @endif
                               
                               
                               
                               
                        </ul>
                    </li>
                    @if(check_page_permission_by_string('General Settings'))
                    <li class="main_dropdown @if(request()->is('admin-home/general-settings/*')) active @endif">
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-settings"></i>
                            <span>الإعدادات</span></a>
                        <ul class="collapse ">
                            <li class="{{active_menu('admin-home/general-settings/site-identity')}}"><a
                                        href="{{route('admin.general.site.identity')}}">الشعار</a></li>
                            <li class="{{active_menu('admin-home/general-settings/basic-settings')}}"><a
                                        href="{{route('admin.general.basic.settings')}}">الإعدادات الأساسية</a>
                            </li>
                           
                            
                            <li class="{{active_menu('admin-home/general-settings/seo-settings')}}"><a
                                        href="{{route('admin.general.seo.settings')}}">إعدادات SEO</a></li>
                            <li class="{{active_menu('admin-home/general-settings/scripts')}}"><a
                                        href="{{route('admin.general.scripts.settings')}}">إعدادات السكربتات</a>
                            </li>
                            <li class="{{active_menu('admin-home/general-settings/email-template')}}"><a
                                        href="{{route('admin.general.email.template')}}">قالب البريد الالكتروني</a>
                            </li>
                          
                            <li class="{{active_menu('admin-home/general-settings/smtp-settings')}}"><a
                                        href="{{route('admin.general.smtp.settings')}}">إعدادات SMTP</a>
                            </li>
                           
                          
                           

                            <li class="{{active_menu('admin-home/general-settings/cache-settings')}}"><a
                                        href="{{route('admin.general.cache.settings')}}">إعدادات الكاش</a>
                            </li>
                            <li class="{{active_menu('admin-home/general-settings/gdpr-settings')}}"><a
                                        href="{{route('admin.general.gdpr.settings')}}">اعدادات الكوكيز</a>
                            </li>
                           
                            <li class="{{active_menu('admin-home/general-settings/sitemap-settings')}}"><a
                                    href="{{route('admin.general.sitemap.settings')}}">إعدادات خريطة الموقع</a>
                            </li>
                           
                         
                            
                            
                        </ul>
                    </li>
                    @endif
                   
                </ul>
            </nav>
        </div>
    </div>
</div>

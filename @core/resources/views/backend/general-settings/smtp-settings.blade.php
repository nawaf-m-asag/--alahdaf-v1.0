@extends('backend.admin-master')
@section('site-title')
 اعدادات SMTP
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
           <div class="col-lg-12">
               @include('backend.partials.message')
               <x-error-msg/>
           </div>
            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">اعدادات SMTP</h4>
                        <form action="{{route('admin.general.smtp.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="site_smtp_mail_mailer">نوع SMTP</label>
                                <select name="site_smtp_mail_mailer" class="form-control">
                                    <option value="smtp" @if(get_static_option('site_smtp_mail_mailer') == 'smtp') selected @endif>{{__('SMTP')}}</option>
                                    <option value="sendmail" @if(get_static_option('site_smtp_mail_mailer') == 'sendmail') selected @endif>{{__('SendMail')}}</option>
                                    <option value="mailgun" @if(get_static_option('site_smtp_mail_mailer') == 'mailgun') selected @endif>{{__('Mailgun')}}</option>
                                    <option value="postmark" @if(get_static_option('site_smtp_mail_mailer') == 'postmark') selected @endif>{{__('Postmark')}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_host">مضيف SMTP</label>
                                <input type="text" name="site_smtp_mail_host"  class="form-control" value="{{get_static_option('site_smtp_mail_host')}}">
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_port">المنفذ SMTP </label>
                                 <select name="site_smtp_mail_port" class="form-control">
                                    <option value="587" @if(get_static_option('site_smtp_mail_port') == '587') selected @endif>{{__('587')}}</option>
                                    <option value="465" @if(get_static_option('site_smtp_mail_port') == '465') selected @endif>{{__('465')}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_username">اسم المستخدم SMTP</label>
                                <input type="text" name="site_smtp_mail_username"  class="form-control" value="{{get_static_option('site_smtp_mail_username')}}" id="site_smtp_mail_username">
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_password">كلمة المرور SMTP</label>
                                <input type="password" name="site_smtp_mail_password"  class="form-control" value="{{get_static_option('site_smtp_mail_password')}}" id="site_smtp_mail_password">
                            </div>
                            <div class="form-group">
                                <label for="site_smtp_mail_encryption">التشفير SMTP</label>
                                 <select name="site_smtp_mail_encryption" class="form-control">
                                    <option value="ssl" @if(get_static_option('site_smtp_mail_encryption') == 'ssl') selected @endif>{{__('SSL')}}</option>
                                    <option value="tls" @if(get_static_option('site_smtp_mail_encryption') == 'tls') selected @endif>{{__('TLS')}}</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">حفظ</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"> بريد تجريبي</h4>
                        <form action="{{route('admin.general.smtp.settings.test')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="email">البريد الالكتروني</label>
                                <input type="email" name="email"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="subject">الموضوع</label>
                                <input type="text" name="subject"  class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="message">الرسالة</label>
                                <textarea name="message" class="form-control"  cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">ارسال</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

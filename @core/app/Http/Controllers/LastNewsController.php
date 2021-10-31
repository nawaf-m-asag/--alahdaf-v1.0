<?php

namespace App\Http\Controllers;

use App\LastNews;

use App\BlogCategory;
use App\Helpers\SanitizeInput;
use App\Language;
use App\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;


class LastNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_blog = LastNews::all()->groupBy('lang');
        return view('backend.pages.last-news.index')->with([
            'all_blog' => $all_blog
        ]);
    }
    public function new_blog(){
        $all_category = BlogCategory::where('lang',get_default_language())->get();
        $all_language = Language::all();
        return view('backend.pages.last-news.new')->with([
            'all_category' => $all_category,
            'all_languages' => $all_language,
        ]);
    }
    public function store_new_blog(Request $request){
      
        $this->validate($request,[
           'category' => 'required',
           'blog_content' => 'required',
           'tags' => 'required',
           'excerpt' => 'required',
           'title' => 'required',
           'lang' => 'required',
           'status' => 'required',
           'author' => 'required',
           'slug' => 'nullable',
           'meta_tags' => 'nullable|string',
           'meta_description' => 'nullable|string',
           'image' => 'nullable|string|max:191',
        ]);
      
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title,$request->lang);
        $slug_check = LastNews::where(['slug' => $slug,'lang' => $request->lang])->count();
        $slug = $slug_check > 0 ? $slug.'2' : $slug;
    
        LastNews::create([
            'blog_categories_id' => $request->category,
            'slug' => $slug,
            'content' => SanitizeInput::kses_basic($request->blog_content),
            'tags' => $request->tags,
            'title' => $request->title,
            'status' => $request->status,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'excerpt' => $request->excerpt,
            'lang' => $request->lang,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'author' => $request->author,
        ]);
       
        return redirect()->back()->with([
            'msg' => __('تم اضافة خبر بنجاح'),
            'type' => 'success'
        ]);
    }
    public function clone_blog(Request $request)
    {
        $blog_details = LastNews::find($request->item_id);
        LastNews::create([
            'blog_categories_id' => $blog_details->blog_categories_id,
            'slug' => $blog_details->slug.'33',
            'content' => $blog_details->content,
            'tags' => $blog_details->tags,
            'title' => $blog_details->title,
            'status' => 'draft',
            'meta_tags' => $blog_details->meta_tags,
            'meta_description' => $blog_details->meta_description,
            'excerpt' => $blog_details->excerpt,
            'lang' => $blog_details->lang,
            'image' => $blog_details->image,
            'user_id' => null,
            'author' => $blog_details->author,
        ]);

        return redirect()->back()->with([
            'msg' => __('تم نسخ الخبر بنجاح'),
            'type' => 'success'
        ]);
    }

    public function edit_blog($id){
        $blog_post = LastNews::find($id);
        $all_category = BlogCategory::where('lang',$blog_post->lang)->get();
        $all_language = Language::all();
        return view('backend.pages.last-news.edit')->with([
            'all_category' => $all_category,
            'blog_post' => $blog_post,
            'all_languages' => $all_language,
        ]);
    }
    public function update_blog(Request $request,$id){
        $this->validate($request,[
            'category' => 'required',
            'blog_content' => 'required',
            'tags' => 'required',
            'excerpt' => 'required',
            'title' => 'required',
            'lang' => 'required',
            'status' => 'required',
            'author' => 'required',
            'slug' => 'nullable',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'image' => 'nullable|string|max:191',
        ]);
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title,$request->lang);
        $slug_check = LastNews::where(['slug' => $slug,'lang' => $request->lang])->count();
        $slug = $slug_check > 1 ? $slug.'2' : $slug;
        LastNews::where('id',$id)->update([
            'blog_categories_id' => $request->category,
            'slug' => $slug,
            'content' => $request->blog_content,
            'tags' => $request->tags,
            'title' => $request->title,
            'status' => $request->status,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
            'excerpt' => $request->excerpt,
            'lang' => $request->lang,
            'image' => $request->image,
            'user_id' => Auth::user()->id,
            'author' => $request->author,
        ]);

        return redirect()->back()->with([
            'msg' => __('تم تحديث الخبر بنجاح'),
            'type' => 'success'
        ]);
    }
    public function delete_blog(Request $request,$id){
        LastNews::find($id)->delete();

        return redirect()->back()->with([
            'msg' => __('تم الحذف بنجاح'),
            'type' => 'danger'
        ]);
    }

    public function category(){
        $all_category = BlogCategory::all()->groupBy('lang');
        $all_language = Language::all();
        return view('backend.pages.last-news.category')->with([
            'all_category' => $all_category,
            'all_languages' => $all_language
        ]);
    }
    public function new_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191|unique:blog_categories',
            'lang' => 'required|string|max:191',
            'status' => 'required|string|max:191'
        ]);

        BlogCategory::create($request->all());

        return redirect()->back()->with([
            'msg' => __('تم اضافة تصنيف بنجاح'),
            'type' => 'success'
        ]);
    }

    public function update_category(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'lang' => 'required|string|max:191',
            'status' => 'required|string|max:191'
        ]);

        BlogCategory::find($request->id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'lang' => $request->lang,
        ]);

        return redirect()->back()->with([
            'msg' => __('تم تحديث التصنيف بنجاح'),
            'type' => 'success'
        ]);
    }

    public function delete_category(Request $request,$id){
        if (LastNews::where('blog_categories_id',$id)->first()){
            return redirect()->back()->with([
                'msg' => __('لا يمكنك حذف هذا التصنيف، فهو مرتبط بالفعل بخبر'),
                'type' => 'danger'
            ]);
        }
        BlogCategory::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('تم حذف تصنيف بنجاح'),
            'type' => 'danger'
        ]);
    }

    public function Language_by_slug(Request $request){
        $all_category = BlogCategory::where('lang',$request->lang)->get();

        return response()->json($all_category);
    }

    public function blog_page_settings(){
        $all_languages = Language::all();
        return view('backend.pages.last-news.page-settings.last-news')->with(['all_languages' => $all_languages]);
    }
    public function blog_single_page_settings(){
        $all_languages = Language::all();
        return view('backend.pages.last-news.page-settings.last-news-single')->with(['all_languages' => $all_languages]);
    }

    public function update_blog_single_page_settings(Request $request){
        $this->validate($request,[
            'blog_single_page_recent_post_item' => 'nullable|string|max:191'
        ]);
        $all_languages = Language::all();

        foreach ($all_languages as $lang){
            $this->validate($request, [
                'blog_single_page_'.$lang->slug.'_related_post_title' => 'nullable|string',
                'blog_single_page_'.$lang->slug.'_share_title' => 'nullable|string',
                'blog_single_page_'.$lang->slug.'_category_title' => 'nullable|string',
                'blog_single_page_'.$lang->slug.'_recent_post_title' => 'nullable|string',
                'blog_single_page_'.$lang->slug.'_tags_title' => 'nullable|string'
            ]);

            $fields = [
                'blog_single_page_'.$lang->slug.'_related_post_title',
                'blog_single_page_'.$lang->slug.'_share_title',
                'blog_single_page_'.$lang->slug.'_category_title',
                'blog_single_page_'.$lang->slug.'_recent_post_title',
                'blog_single_page_'.$lang->slug.'_tags_title'
            ];

            foreach ($fields as $field){
                update_static_option($field, $request->$fields);
            }
        }
        update_static_option('blog_single_page_recent_post_item',$request->blog_single_page_recent_post_item);

        return redirect()->back()->with([
            'msg' => __('تم تحديث الاعدات بنجاح'),
            'type' => 'success'
        ]);
    }

    public function update_blog_page_settings(Request $request){

        $this->validate($request,[
           'blog_page_recent_post_widget_items' => 'nullable|string|max:191',
           'blog_page_item' => 'nullable|string|max:191'
        ]);

        $all_languages = Language::all();
        foreach ($all_languages as $lang){
            $this->validate($request, [
                'blog_page_'.$lang->slug.'_read_more_btn_text' => 'nullable|string',
            ]);
            $read_more_btn_text = 'blog_page_'.$lang->slug.'_read_more_btn_text';
            update_static_option($read_more_btn_text, $request->$read_more_btn_text);
        }

        update_static_option('blog_page_item',$request->blog_page_item);
        update_static_option('blog_page_recent_post_widget_items',$request->blog_page_recent_post_widget_items);

        return redirect()->back()->with([
            'msg' => __('تم تحديث الاعدادات بنجاح'),
            'type' => 'success'
        ]);
    }

    public function bulk_action(Request $request){
        LastNews::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

    public function category_bulk_action(Request $request){
        BlogCategory::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }

}

<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategory;
use App\Language;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $all_page = Page::all()->groupBy('lang');
        $all_language = Language::all();
        return view('backend.pages.page.index')->with([
            'all_page' => $all_page,
            'all_languages' => $all_language,
        ]);
    }
    public function new_page(){
        $all_language = Language::all();
        return view('backend.pages.page.new')->with(['all_languages' => $all_language]);
    }
    public function store_new_page(Request $request){
        $this->validate($request,[
            'content' => 'nullable',
            'meta_tags' => 'nullable',
            'meta_description' => 'nullable',
            'lang' => 'nullable',
            'title' => 'required',
            'slug' => 'nullable',
            'visibility' => 'nullable',
            'status' => 'required|string|max:191',
        ]);

        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title,$request->lang);
        $slug_check = Page::where(['slug' => $slug,'lang' => $request->lang])->count();
        $slug = $slug_check > 0 ? $slug.'2' : $slug;

        Page::create([
            'lang' => $request->lang,
            'slug' => $slug,
            'status' => $request->status,
            'content' => $request->page_content,
            'title' => $request->title,
            'visibility' => $request->visibility,
            'page_builder_status' => $request->page_builder_status,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
        ]);

        return redirect()->back()->with([
            'msg' => __('تم انشاء الصفحة بنجاح'),
            'type' => 'success'
        ]);
    }
    public function edit_page($id){
        $page_post = Page::find($id);
        $all_language = Language::all();
        return view('backend.pages.page.edit')->with([
            'page_post' => $page_post,
            'all_languages' => $all_language
        ]);
    }
    public function update_page(Request $request,$id){
        $this->validate($request,[
            'content' => 'nullable',
            'meta_tags' => 'nullable',
            'meta_description' => 'nullable',
            'lang' => 'nullable',
            'title' => 'required',
            'slug' => 'nullable',
            'visibility' => 'nullable',
            'status' => 'required|string|max:191',
        ]);
        $slug = !empty($request->slug) ? $request->slug : Str::slug($request->title,$request->lang);
        $slug_check = Page::where(['slug' => $slug,'lang' => $request->lang])->count();
        $slug = $slug_check > 1 ? $slug.'2' : $slug;
        Page::where('id',$id)->update([
            'lang' => $request->lang,
            'status' => $request->status,
            'content' => $request->page_content,
            'visibility' => $request->visibility,
            'page_builder_status' => $request->page_builder_status,
            'title' => $request->title,
            'slug' => $slug,
            'meta_tags' => $request->meta_tags,
            'meta_description' => $request->meta_description,
        ]);


        return redirect()->back()->with([
            'msg' => __('تم تحديث الصفحة بنجاح'),
            'type' => 'success'
        ]);
    }
    public function delete_page(Request $request,$id){
        Page::find($id)->delete();
        return redirect()->back()->with([
            'msg' => __('تم حذف الصفحة بنجاح'),
            'type' => 'danger'
        ]);
    }

    public function bulk_action(Request $request){
        $all = Page::whereIn('id',$request->ids)->delete();
        return response()->json(['status' => 'ok']);
    }
}

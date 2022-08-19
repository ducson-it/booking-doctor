<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class Newcontroller extends Controller
{
    public function index()
    {
        return view('admin.new');
    }

    public function listNew()
    {
        $listnew =  News::all();
        return view('admin.list_new', compact('listnew'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'subtitle' => 'required',
            'content' => 'required',
            'image' => 'required',
        ], [
            'title.required' => 'Bạn cần phải nhập tên',
            'title.min' => 'Không được nhỏ hơn 5 ký tự',
            'subtitle.required' => 'Không được để trống',
            'content.required' => 'Không được để trống',
            'image.required' => 'Không được để trống',
        ]);

        if($request->hasFile('image')) {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('image')->move(public_path('img'), $fileName);
        }

        $news =  new News();

        $news->title = $request->title;
        $news->subtitle = $request->subtitle;
        $news->content = $request->content;
        $news->image = $fileName;
        $news->save();

        return redirect()->route('admin.new.list')->with('msg', 'Tạo bài viết thành công');
    }

    public function editNew($id)
    {
        $new = News::find($id);
        return view('admin.edit-new', compact('new'));
    }

    public function updateNew(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'subtitle' => 'required',
            'content' => 'required',
            'image' => 'required',
        ], [
            'title.required' => 'Bạn cần phải nhập tên',
            'title.min' => 'Không được nhỏ hơn 5 ký tự',
            'subtitle.required' => 'Không được để trống',
            'content.required' => 'Không được để trống',
            'image.required' => 'Không được để trống',
        ]);

        if($request->hasFile('image')) {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('image')->move(public_path('img'), $fileName);
        }

        $news =  new News();

        $news->title = $request->title;
        $news->subtitle = $request->subtitle;
        $news->content = $request->content;
        $news->image = $fileName;
        $news->save();

        return redirect()->route('admin.new.edit', $news->id)->with('msg', 'Tạo bài viết thành công');
    }

    public function deleteNew($id)
    {

    }


}

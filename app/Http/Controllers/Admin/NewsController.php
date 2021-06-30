<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(){
        return view('dashboard.admin');
    }

    public function list(){
        $data['news'] = News::all();
        return view('dashboard.news-list', $data);
    }

    public function createView(){
        return view('dashboard.create-news');
    }

    public function create(Request $request){
        $news = new News;
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->save();

        return redirect('/dashboard/news')->with('sucess', 'News has created successfully!');
    }

    public function editView($id ,Request $request){
        $data['news'] = News::find($id);
        return view('dashboard.edit-news', $data);
    }

    public function edit($id , Request $request){
        $news = News::find($id);
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->save();

        return redirect('/dashboard/news')->with('success', 'News has edited successfully!');
    }

    public function delete($id){
        $news = News::find($id);
        $news->delete();

        return redirect('/dashboard/news')->with('success', 'News has deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;
// use Carbon\Carbon;

class NewsController extends Controller
{
    public function getAllNews(){
        $allNews = News::all();
        return response()->json($allNews, 200);
    }

    public function getDetailNews($id){
        $detailNews = News::find($id);
        return response()->json($detailNews, 200);
    }

    public function search(Request $request){
        $searchKeyword = $request->keyword;
        $news = News::where('title', 'like', '%' . $searchKeyword . '%')->get();
        return response()->json($news, 200);
    }
}

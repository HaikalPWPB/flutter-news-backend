<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\News;

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
        
    }
}

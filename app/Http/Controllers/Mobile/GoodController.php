<?php

namespace App\Http\Controllers\Mobile;

use App\models\Good;
use App\models\GoodGallery;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodController extends Controller
{
    //
    public function detail($id)
    {
        $good = Good::find($id);
        $gallery=GoodGallery::where('goods_id',$id)->get();
        return view('mobile.good.detail', [
            'good' => $good,
            'gallery' => $gallery
        ]);
    }

    public function index()
    {
        $good = Good::with('cover')->paginate(15);
        return view('mobile.good.index',[
            'good' => $good
        ]);
    }
}

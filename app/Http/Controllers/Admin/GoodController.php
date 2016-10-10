<?php

namespace App\Http\Controllers\admin;

use App\models\Brand;
use App\models\GoodGallery;
use App\models\Supplier;
use Illuminate\Http\Request;
use Validator;

use App\Http\Requests;
use App\Models\Good;
use App\Models\Category;

class GoodController extends Controller
{
    //
    protected $breadcrumb=[];
    //保存验证数据及错误提示
    protected $rules = [];
    protected $messages = [];

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->breadcrumb[]=['url'=>\URL::route('admin.good.index'),'title'=>trans('admin/good.list')];

    }

    public function index()
    {
        return view('admin.good.index',[
            'page_title'=>trans('admin/good.list'),
            'breadcrumb'=>$this->breadcrumb
        ]);
    }

    public function edit($id)
    {
        if(!$this->adminGate('good_edit')){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('admin/good.edit')];
        $brands=Brand::all();
        $category=Category::all();
        $suppliers = Supplier::all();
        $goods = Good::find($id);
        return view('admin.good.edit', [
            'page_title'=>trans('admin/good.edit'),
            'breadcrumb'=>$this->breadcrumb,
            'brands'=>$brands,
            'category'=>$category,
            'suppliers' => $suppliers,
            'goods' => $goods
        ]);
    }

    public function create()
    {
        if(!$this->adminGate('good_new')){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('admin/good.create')];
        $goods = new Good();
        $brands = Brand::all();
        $category=Category::all();
        $suppliers = Supplier::all();
        return view('admin.good.edit', [
            'page_title'=>trans('admin/good.create'),
            'breadcrumb'=>$this->breadcrumb,
            'goods' => $goods,
            'category'=>$category,
            'brands'=>$brands,
            'suppliers' => $suppliers
        ]);
    }

    public function save(Request $request)
    {
        if(!$this->adminGate(['good_new','good_edit'])){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return $this->Msg('',null,'error')->withErrors($validator);
        }
        if ($request->has('goods_id')) {
            $goods=Good::find($request->goods_id);
            if($request->img_id_del) {
                $img_id_del=explode(',', $request->img_id_del);
                foreach ($img_id_del as &$item) {
                    $item=intval($item);
                }
                foreach($goods->gallery->whereIn('img_id', $img_id_del) as $item){
                    \Storage::disk('images')->delete($item->img_url);
                    \Storage::disk('images')->delete($item->thumb_url);
                    \Storage::disk('images')->delete($item->original_url);
                    $item->delete();
                };
            }
        } else {
            $goods = new Good();
        }
        $goods->goods_sn = $request->goods_sn;
        $goods->goods_name = $request->goods_name;
        $goods->goods_barcode = $request->input('goods_barcode','');
        $goods->cat_id = $request->cat_id;
        $goods->brand_id = $request->brand_id;
        $goods->market_price = $request->market_price;
        $goods->shop_price = $request->shop_price;
        $goods->keywords = $request->keywords;
        $goods->goods_desc = $request->goods_desc;
        $goods->goods_brief = $request->goods_brief;
        $goods->img_id = $request->img_id;
        $goods->is_delete = $request->input('is_delete',0);
        $goods->is_on_sale = $request->input('is_on_sale',0);
        $goods->is_best = $request->input('is_best',0);
        $goods->is_new = $request->input('is_new',0);
        $goods->is_hot = $request->input('is_hot',0);
        $goods->sort_order = $request->input('sort_order',100);
        $goods->click_count = $request->input('click_count',0);
        $goods->save();
        //保存图片
        if($request->hasFile('upload_img')) {
            foreach ($request->file('upload_img') as $file) {
                if ($file->isValid()) {
                    $filename = '/data/images/img/' . $request->goods_id . "_" . date('YmsHis') . rand(10000, 99999) . ".jpg";
                    $filename_thumb = '/data/images/thumb/' . $request->goods_id . "_" . date('YmsHis') . rand(10000, 99999) . ".jpg";
                    $filename_original = '/data/images/original/' . $request->goods_id . "_" . date('YmsHis') . rand(10000, 99999) . ".jpg";
                    \Storage::disk('images')->put($filename, \File::get($file));
                    \Storage::disk('images')->put($filename_thumb, \File::get($file));
                    \Storage::disk('images')->put($filename_original, \File::get($file));
                    $gallery = new GoodGallery();
                    $gallery->goods_id = $goods->goods_id;
                    $gallery->img_desc = $goods->goods_id;
                    $gallery->img_url = $filename;
                    $gallery->thumb_url = $filename_thumb;
                    $gallery->original_url = $filename_original;
                    $gallery->save();
                }
            }
        }
        if(!GoodGallery::where('goods_id',$goods->goods_id)->where('img_id',$goods->img_id)->count()){
            $goods->img_id = GoodGallery::where('goods_id',$goods->goods_id)->first()->img_id ?? 0;
            $goods->save();
        }
        return $this->Msg(trans('admin/good.save_success'),\URL::route('admin.good.index'));
    }

    public function ajax(Request $request)
    {
        $filter = $request->only(['draw', 'columns', 'order', 'start', 'length']);
        $data = Good::orderBy($filter['columns'][$filter['order'][0]['column']]['data'], $filter['order'][0]['dir'])->forPage($filter['start'] / $filter['length'] + 1, $filter['length'])->get();
        $recordsTotal = Good::count();
        $recordsFiltered = Good::count();
        return [
            'draw' => intval($filter['draw']),
            'recordsTotal' => intval($recordsTotal),
            'recordsFiltered' => intval($recordsFiltered),
            'data' => $data->toArray()
        ];
    }
}

<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Brand;
use Validator;

class BrandController extends Controller
{
    //
    protected $breadcrumb=[];
    //保存验证数据及错误提示
    protected $rules = [];
    protected $messages = [];

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->rules = [
            'brand_name' => 'required',
        ];
        $this->messages = [
            'brand_name.required' => sprintf(trans('admin/sys.required'),trans('admin/brand.brand_name')),
        ];
        $this->breadcrumb[]=['url'=>\URL::route('admin.brand.index'),'title'=>trans('admin/brand.list')];
    }

    public function index()
    {
        if(!$this->adminGate(['brand_show'])){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        return view('admin.brand.index',[
            'page_title'=>trans('admin/brand.list'),
            'breadcrumb'=>$this->breadcrumb
        ]);
    }

    public function edit($id)
    {
        if(!$this->adminGate(['brand_edit'])){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('admin/brand.edit')];
        $brand = Brand::find($id);
        return view('admin.brand.edit', [
            'page_title'=>trans('admin/brand.edit'),
            'breadcrumb'=>$this->breadcrumb,
            'brand' => $brand
        ]);
    }

    public function create()
    {
        if(!$this->adminGate(['brand_new'])){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('admin/brand.create')];
        $brand = new Brand();
        return view('admin.brand.edit', [
            'page_title'=>trans('admin/brand.create'),
            'breadcrumb'=>$this->breadcrumb,
            'brand' => $brand
        ]);
    }

    public function del($id)
    {
        if(!$this->adminGate('brand_del')){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $brand = Brand::find($id);
        if($brand&&$brand->goods->isEmpty()) {
            $brand->delete();
            return $this->Msg(trans('admin/brand.del_success'), \URL::route('admin.brand.index'));
        }else
            return $this->Msg(trans('admin/brand.del_fail'), \URL::route('admin.brand.index'),'error');
    }

    public function save(Request $request)
    {
        if(!$this->adminGate(['brand_new','brand_edit'])){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return $this->Msg('',null,'error')->withErrors($validator);
        }
        if ($request->has('brand_id')) {
            $brand=Brand::find($request->brand_id);
        } else {
            $brand = new Brand();
            $brand->add_time=time();
        }
        $brand->brand_name = $request->brand_name;
        $brand->sort_order = $request->input('sort_order',50);
        $brand->is_show = $request->input('is_show',0);
        $brand->site_url = $request->site_url;
        $brand->brand_desc = $request->brand_desc;
        $brand->save();

        $file=$request->file('brand_logo_img');
        if($file){
            $filename="/data/brand/".$brand->brand_id . "_".date('YmdHis').".jpg";
            if($brand->brand_logo && \Storage::disk('images')->exists($brand->brand_logo)){
                \Storage::disk('images')->delete($brand->brand_logo);
            }
            \Storage::disk('images')->put($filename,\File::get($file));
            $brand->brand_logo = $filename;
            $brand->update();
        }
        return $this->Msg(trans('admin/brand.save_success'),\URL::route('admin.brand.index'));
    }

    public function ajax(Request $request)
    {
        $filter = $request->only(['draw', 'columns', 'order', 'start', 'length']);
        $data = Brand::orderBy($filter['columns'][$filter['order'][0]['column']]['data'], $filter['order'][0]['dir'])->forPage($filter['start'] / $filter['length'] + 1, $filter['length'])->get();
        $recordsTotal = Brand::count();
        $recordsFiltered = Brand::count();
        return [
            'draw' => intval($filter['draw']),
            'recordsTotal' => intval($recordsTotal),
            'recordsFiltered' => intval($recordsFiltered),
            'data' => $data->toArray()
        ];
    }

    public function toggle_show(Request $request){
        $id=$request->id;
        $msg=[
            'error'=>0,
            'msg'=>''
        ];
        if(!$this->adminGate('brand_edit')){
            $msg['error']=1;
            $msg['msg']=trans('admin/sys.no_permission');
            return \Response::json($msg);
        }
        $brand=Brand::find($id);
        if($brand){
            $brand->is_show=!$brand->is_show;
            $brand->update();
            return \Response::json($msg);
        }else{
            $msg['error']=1;
            $msg['msg']=trans('admin/brand.not_exist');
            return \Response::json($msg);
        }
    }
}

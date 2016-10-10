<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Supplier;
use Validator;

class SupplierController extends Controller
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
            'suppliers_name' => 'required',
        ];
        $this->messages = [
            'suppliers_name.required' => sprintf(trans('admin/sys.required'),trans('admin/suppliers.suppliers_name')),
        ];
        $this->breadcrumb[]=['url'=>\URL::route('admin.suppliers.index'),'title'=>trans('admin/suppliers.list')];
    }

    public function index()
    {
        if(!$this->adminGate(['suppliers_show'])){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        return view('admin.suppliers.index',[
            'page_title'=>trans('admin/suppliers.list'),
            'breadcrumb'=>$this->breadcrumb
        ]);
    }

    public function edit($id)
    {
        if(!$this->adminGate(['suppliers_edit'])){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('admin/suppliers.edit')];
        $brand = Supplier::find($id);
        return view('admin.suppliers.edit', [
            'page_title'=>trans('admin/suppliers.edit'),
            'breadcrumb'=>$this->breadcrumb,
            'brand' => $brand
        ]);
    }

    public function create()
    {
        if(!$this->adminGate(['suppliers_new'])){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('admin/suppliers.create')];
        $brand = new Supplier();
        return view('admin.suppliers.edit', [
            'page_title'=>trans('admin/suppliers.create'),
            'breadcrumb'=>$this->breadcrumb,
            'brand' => $brand
        ]);
    }

    public function del($id)
    {
        if(!$this->adminGate('suppliers_del')){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $brand = Supplier::find($id);
        if($brand&&$brand->goods->isEmpty()) {
            $brand->delete();
            return $this->Msg(trans('admin/suppliers.del_success'), \URL::route('admin.suppliers.index'));
        }else
            return $this->Msg(trans('admin/suppliers.del_fail'), \URL::route('admin.suppliers.index'),'error');
    }

    public function save(Request $request)
    {
        if(!$this->adminGate(['suppliers_new','suppliers_edit'])){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return $this->Msg('',null,'error')->withErrors($validator);
        }
        if ($request->has('suppliers_id')) {
            $brand=Supplier::find($request->suppliers_id);
        } else {
            $brand = new Supplier();
        }
        $brand->suppliers_name = $request->suppliers_name;
        $brand->suppliers_desc = $request->suppliers_desc;
        $brand->save();
        return $this->Msg(trans('admin/suppliers.save_success'),\URL::route('admin.suppliers.index'));
    }

    public function ajax(Request $request)
    {
        $filter = $request->only(['draw', 'columns', 'order', 'start', 'length']);
        $data = Supplier::orderBy($filter['columns'][$filter['order'][0]['column']]['data'], $filter['order'][0]['dir'])->forPage($filter['start'] / $filter['length'] + 1, $filter['length'])->get();
        $recordsTotal = Supplier::count();
        $recordsFiltered = Supplier::count();
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
        if(!$this->adminGate('suppliers_edit')){
            $msg['error']=1;
            $msg['msg']=trans('admin/sys.no_permission');
            return \Response::json($msg);
        }
        $brand=Supplier::find($id);
        if($brand){
            $brand->is_show=!$brand->is_show;
            $brand->update();
            return \Response::json($msg);
        }else{
            $msg['error']=1;
            $msg['msg']=trans('admin/suppliers.not_exist');
            return \Response::json($msg);
        }
    }
}

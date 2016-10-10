<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;

class CategoryController extends Controller
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
            'cat_name' => 'required',
        ];
        $this->messages = [
            'cat_name.required' => sprintf(trans('admin/sys.required'),trans('admin/category.cat_name')),
        ];
        $this->breadcrumb[]=['url'=>\URL::route('admin.category.index'),'title'=>trans('admin/category.list')];
    }

    /**
     * 商品类别列表
     * @return mixed
     */
    public function index()
    {
        if(!$this->adminGate('category_show')){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $category=Category::getCatList(0);
        return view('admin.category.index',[
            'page_title'=>trans('admin/category.list'),
            'breadcrumb'=>$this->breadcrumb,
            'category'=>$category,
        ]);
    }

    /**
     * 编辑商品类别
     * @param int $id
     * @return mixed
     */
    public function edit($id)
    {
        if(!$this->adminGate('category_edit')){
            return $this->Msg(trans('admin/sys.no_permission'),'','error');
        }
        $this->breadcrumb[]=['url'=>'javascript:void(0)','title'=>trans('admin/category.edit')];
        $category = Category::find($id);
        //不允许选择上级类别为子类别
        $children=array_merge(array_column(Category::getCatList($id),'cat_id'),[$id]);
        $cat = Category::whereNotIn('cat_id',$children)->get();
        return view('admin.category.edit', [
            'page_title'=>trans('admin/category.edit'),
            'breadcrumb'=>$this->breadcrumb,
            'category'=>$category,
            'cat'=>$cat
        ]);
    }
}

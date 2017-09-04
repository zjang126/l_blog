<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;
use App\Http\Requests;

class IndexController extends CommonController
{
    public function index(){
        //点击最高的6篇文章
        $pics=Article::orderBy('art_view','desc')->take(6)->get();
        //文章推荐，带分页
        $data=Article::orderBy('art_time','desc')->paginate(5);
        //友情链接
        $links=Links::orderBy('link_order','asc')->get();
        return view('home.index',compact('pics','data','links'));
    }

    public function cate($cat_id){
        //分类信息
        $find=Category::find($cat_id);
        //图文列表（分页）
        $data=Article::where('cate_id',$cat_id)->orderBy('art_time','desc')->paginate(4);
        //当前分类的子分类
        $submenu=Category::where('cate_pid',$cat_id)->get();
        return  view('home.list',compact('find','data','submenu'));
    }
    public function article(){
        return view('home.new');
    }
}

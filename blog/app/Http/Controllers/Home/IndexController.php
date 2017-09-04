<?php

namespace App\Http\Controllers\Home;




use App\Http\Model\Article;
use App\Http\Model\Links;
use App\Http\Requests;


class IndexController extends CommonController
{
    public function index(){
        //点击最高的6篇文章
        $hot=Article::orderBy('art_view','desc')->take(6)->get();
        $hots=Article::orderBy('art_view','desc')->take(5)->get();

        //文章推荐，带分页
        $data=Article::orderBy('art_time','desc')->paginate(5);

        //最新发布文章
        $new=Article::orderBy('art_time','desc')->take(8)->get();


        //友情链接
        $links=Links::orderBy('link_order','asc')->get();


        return view('home.index',compact('hot','hots','new','data','links'));
    }

    public function cate(){
        return  view('home.list');
    }
    public function article(){
        return view('home.new');
    }
}

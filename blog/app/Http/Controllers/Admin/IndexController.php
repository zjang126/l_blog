<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator; //注意路径问题,默认生成不一定对


class IndexController extends CommonController
{
    //
    public function index(){
        $navs=Navs::all();
        return view('admin.index',compact('navs'));
    }
    public function info(){
        return view('admin.info');
    }
    public function pass(Request $req){

        if($req->isMethod('post')){
            //$input=Input::all();    少用判断,冗余
            $input = $req->all();
            $rules=[
                'password'=>'required | between:6,20 | confirmed',
            ];
            $message=[
                'password.required'=>'新密码不能为空',
                'password.between' =>'新密码必须在6到20位',
                'password.confirmed' =>'新密码与确认密码输入不一致',
            ];
            $validator=Validator::make($input,$rules,$message);
            if($validator->passes()){
               $user=User::first();
               $_password=Crypt::decrypt($user->user_pass);
               if($input['password_o'] == $_password){
                   $user->user_pass=Crypt::encrypt($input['password']);
                   $user->update();
                   return back()->with('errors','密码修改成功!'); //返回提示信息的变量都是errors
               }else{
                   return back()->with('errors','原密码错误!');
               }
            }else{
                return back()->withErrors($validator);
            }
            exit;
        }
        return view('admin.pass');
    }
}

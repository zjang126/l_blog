<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once 'resources/org/code/Code.class.php';

class LoginController extends CommonController
{
    public function  login(){
        if ($input = Input::all()) {
            $code = new \Code;
            $_code = $code->get();
            if (strtoupper($input['code']) != $_code) {
                return back()->with('msg', '验证码错误');
            }
            $user=User::first();
            if($user->user_name != trim($input['user_name']) || Crypt::decrypt($user->user_pass) != $input['user_pass']){
                return back()->with('msg','用户名或者密码错误');
            }
            session(['user'=>$user]);//把用户信息存进session,用作以后页面的验证
            return redirect('admin/index');
        }
        else {
            session(['user'=>null]);
            return view('admin.login');
        }
    }
    public function  code(){
        $code=new \Code; //反斜线 用于底层寻找,不然会报错,会在当前空间找这个类
        $code->make();
    }
    public function  quit(){
        session(['user'=>null]);
        return redirect('admin/login');
    }
}

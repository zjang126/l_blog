<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;//建立公共控制器
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpKernel\EventListener\ValidateRequestListener;

class CommonController extends Controller
{
 // 图片上传
    public function  upload(){
        $file=Input::file('Filedata');
        if($file->isValid()){
            $entension=$file->getClientOriginalExtension();//上传文件
            $newName=date('YmdHis').mt_rand(100,999).'.'.$entension;
            $file->move(base_path().'/uploads',$newName);
            $filepath='uploads/'.$newName;
            return $filepath;
        }
    }
}

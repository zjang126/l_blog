<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    //get.admin/config  全部配置项列表
    public function index()
    {
        $data = Config::orderBy('conf_order','asc')->get();
        //内容的分类显示
        foreach($data as $k=>$v){
            switch($v->field_type){
                case 'input':
                    $data[$k]->_html='<input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'">';
                    break;
                case 'textarea':
                    $data[$k]->_html='<textarea type="text" class="lg" name="conf_content[]" >'.$v->conf_content.'</textarea>';
                    break ;
                case 'radio':
                    //  1|开启,0|关闭
                    $arr=explode(',',$v->field_value);
                    $str='';  //用作拼接
                    foreach($arr as $m=>$n){

                        //1|开启
                        $r=explode('|',$n);
                        $c=$v->conf_content==$r[0]?'checked':'';  //默认选中
                        $str.='<input type="radio" name="conf_content[]" value="'.$r[0].'" '.$c.'>'.$r[1].'&nbsp;&nbsp;';
                    }
                    $data[$k]->_html= $str;
                    break;
            }
        }
        return view('admin.config.index',compact('data'));
    }
    //网站配置提交
    public function changeContent(){
        $input=Input::all();
        foreach($input['conf_id'] as $k=>$v){
        Config::where('conf_id',$v)->update(['conf_content'=>$input['conf_content'][$k]]);
        }
        $this->putFile();
        return back()->with('errors','配置项更新成功！');
    }
    //配置项写入配置文件
    public function putFile(){

        // \Illuminate\Support\Facades\Config::get('web.web_title'); 可以echo读取配置文件
        $config=Config::pluck('conf_content','conf_name')->all();
        $path=base_path().'\config\web.php';//写进配置文件
        $str='<?php return '.var_export($config,true).';'; //写入文件内容
        file_put_contents($path,$str);
    }

    public function changeOrder()
    {
        $input = Input::all();
        $config = Config::find($input['conf_id']);
        $config->conf_order = $input['conf_order'];
        $re = $config->update();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '配置项排序更新成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '配置项排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //get.admin/config/create   添加配置项
    public function create()
    {
        return view('admin/config/add');
    }

    //post.admin/config  添加配置项提交
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'conf_name'=>'required',
            'conf_title'=>'required',
        ];

        $message = [
            'conf_name.required'=>'配置项名称不能为空！',
            'conf_title.required'=>'配置项标题不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Config::create($input);
            if($re){
                return redirect('admin/config');
            }else{
                return back()->with('errors','配置项失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/config/{config}/edit  编辑配置项
    public function edit($conf_id)
    {
        $field = Config::find($conf_id);
        return view('admin.config.edit',compact('field'));
    }

    //put.admin/config/{config}    更新配置项
    public function update($conf_id)
    {
        $input = Input::except('_token','_method');
        $re = Config::where('conf_id',$conf_id)->update($input);
        if($re){
            $this->putFile();//修改数据成功后更新配置项
            return redirect('admin/config');
        }else{
            return back()->with('errors','配置项更新失败，请稍后重试！');
        }
    }

    //delete.admin/config/{config}   删除配置项
    public function destroy($conf_id)
    {
        $re = Config::where('conf_id',$conf_id)->delete();
        if($re){
            $this->putFile();//修改数据成功后更新配置项
            $data = [
                'status' => 0,
                'msg' => '配置项删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '配置项删除失败，请稍后重试！',
            ];
        }
        return $data;
    }
}

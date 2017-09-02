<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('resources/views/admin/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('resources/views/admin/style/js/jquery.js')}}"></script>
</head>
<body style="background:#F3F3F4;">
<div class="login_box">
    <h1>Blog</h1>
    <h2>欢迎使用博客管理平台</h2>
    <div class="form">
        @if(session('msg'))
            <p style="color:#ff7b7d"><b>{{session('msg')}}</b></p>
        @endif
        <form action="" method="post"><!--laravel表单提交跨栏攻击保护措施-->
            {{csrf_field()}}
            <ul>
                <li>
                    <input type="text" name="user_name" style="display: none;"/>
                    <input type="text" name="user_name" class="text" autocomplete="off"/>
                    <span><i class="fa fa-user"></i></span>
                </li>
                <li>
                    <input type="text" name="user_pass" style="display: none;"/>
                    <input type="password" name="user_pass" class="text" autocomplete="off"/>
                    <span><i class="fa fa-lock"></i></span>
                </li>
                <li>
                    <input type="text" class="code" name="code"/>
                    <span><i class="fa fa-check-square-o"></i></span>
                    <img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('admin/code')}}?'+Math.random()">
                </li>
                <li>
                    <input type="submit" value="立即登陆"/>
                </li>
            </ul>
        </form>
        <p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="" target="_blank"></a></p>
    </div>
</div>
</body>
<script type="text/javascript">
    setInterval("$(document).change()",3000);//定时 3秒显示背景图
    $(document).change(function(){
        var random_bg=parseInt(Math.random()*54+1);//随机背景图
        var bg='url(/resources/org/img/'+random_bg+'.jpg)';
        $("body").css("background-image",bg);
        $("body").css("background-size","cover");
    });
</script>
</html>
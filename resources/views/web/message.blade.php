@extends('layouts.web')
<link href="/css/contactUs.css" type="text/css" rel="stylesheet" />
@section('content')
    <div class="main">

        @include('web.sideLeft')

        <div class="right">
            <div class="box02">
                <div class="message">
                    <span>在线留言</span>
                    <form method="post">
                        姓　　名：<input type="text" name="name" value="" class="name"/><br />
                        联系电话：<input type="text" name="phone" value="" class="tel"/><br />
                        电子邮箱：<input type="text" name="email" value="" class="email"/><br />
                        留言内容：<input type="text" name="content" value="" class="messg"/><br />
                        <input type="submit" value="提交留言" class="sub"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="/js/map.js"></script>
@endsection
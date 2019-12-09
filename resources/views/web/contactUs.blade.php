@extends('layouts.web')
<link href="/css/contactUs.css" type="text/css" rel="stylesheet" />
@section('content')
    <div class="main">

        @include('web.sideLeft')

        <div class="right">
            <div class="box01">
                <h4>化妆品</h4>
                <h3>品牌火热招商中...</h3>
                <div class="ad">
                    <span><p>官网热线：400-888-2837</p><p>地址：北京市崇文区崇外大街正仁大厦1段9单元</p></span>
                    <a href="#">申请加盟化妆品<p></p></a>
                </div>
            </div>
            <div class="box02">
                <div id="dituContent"></div>
                <div class="message">
                    <span>在线留言</span>
                    <input type="text" value="姓　　名：" class="name"/>
                    <input type="text" value="联系电话：" class="tel"/>
                    <input type="text" value="电子邮箱：" class="email"/>
                    <input type="text" value="留言内容：" class="messg"/>
                    <input type="submit" value="提交留言" class="sub"/>
                </div>
            </div>
        </div>
    </div>
    <script src="js/map.js"></script>
@endsection
<div class="banner" style="background-image: url('{{ GetCustomData('banner')['picture'] }}')">
    <!--头部-->
    <div class="top">
        <div class="logo" style="background-image: url({{ WebInfo('logo') }})"></div>
        <span></span>
        <div class="txt01">
            <p>专注护肤行业<b>10年</b></p>
            <p>我们只生产最高品质的护肤产品</p>
        </div>
        <div class="tel">
            <p>全国服务咨询热线</p>
            <b>{{ WebInfo('hotline') }}</b>
        </div>
    </div>
    <div class="nav">
        <div class="nav_bg">
            <ul>
                <li {{ Active('/','ff') }}><a href="/">首页</a></li>
                @foreach(NavBar() as $nav)
                    <li {{ Active($nav['link'],'ff') }}><span></span><a href="{{ $nav['link'] }}">{{ $nav['name'] }}</a></li>
                @endforeach

            </ul>
            <div class="search">
                <div class="s01">产品搜索</div>
                <input type="text" value="请输入关键字" class="s02"/><span></span>
            </div>
        </div>
    </div>
</div>

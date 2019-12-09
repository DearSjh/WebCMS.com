<h2>
    当前位置：首页
    @foreach(Position() as $bd)
        ><a href="{{ $bd['link'] }}">{{ $bd['name'] }}</a>
    @endforeach
</h2>

<div class="left">
    <ul>
        @foreach(SideBar() as $sideBar)
            <li {{ Active($sideBar['link'],'curr') }}>
                <a href="{{ $sideBar['link'] }}"><span></span>{{$sideBar['name']}}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="ad">
        <div class="s01"><span></span>
            <p>客服中心</p><span></span></div>
        <div class="s02"><b><i></i></b></div>
        <div class="s03"><p>电话：{{ WebInfo('phone') }}</p>
            <p>地址：{{ WebInfo('address') }}</p></div>
    </div>
    <div class="tel">
        <div class="box01"><span>服务热线</span><i></i>
            <p>{{ WebInfo('hotline') }}</p></div>
    </div>
    <div class="yin"><img src="/images/yin01.png"/></div>
</div>


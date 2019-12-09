@extends('layouts.web')
<link href="/css/index.css" type="text/css" rel="stylesheet"/>
@section('content')
    <div class="customer">
        <div class="news">
            <span><a href="/javascript:">公司新闻</a></span>
            <span class="cur"><a href="javascript:void(0)">公司理念</a></span>
            <ul>
                @foreach(ArticleList(637,4) as $value)
                    <li><a href="{{ $value['link'] }}">{{ $value['title'] }}</a></li>
                @endforeach
            </ul>
            <ul>
                <p><a href="/companyIdea.html">2014年12月20日，现代中草药个人护理专家——化妆品首家体验型专卖店于上海正大广场全新揭幕。店内一系列特有的增值服务和贴心的体验环境，从空间打造到功能布局，完美诠释养美新体验。</a>
                </p>
            </ul>
        </div>
        <div class="product">
            <ul>
                @foreach(ArticleList(640,3) as $value)
                <li>
                    <a href="{{ $value['link'] }}"><img src="{{ $value['main_pic'] }}"></a>

                    <p><a href="{{ $value['link'] }}">{{ $value['title'] }}</a></p>
                </li>
                @endforeach
            </ul>
            <a href="/javascript:"><i><span class="curr"><b></b></span><span><b></b></span><span><b></b></span></i></a>
        </div>
        <div class="consult">
            <span>HOTLINE</span>
            <p>全国免费专线</p><big>400-821-6188</big>
            <div class="web">
                <div class="qq">
                    <a href="/#"><img src="/images/01.png"></a>
                    <a href="/#"><img src="/images/02.png"></a>
                    <a href="/#"><img src="/images/03.png"></a>
                    <a href="/#"><img src="/images/04.png"></a>
                    <a href="/#"><img src="/images/05.png"></a>
                    <p><a href="/#">售后服务</a><a href="/#">售后服务</a></p>
                    <span><a href="/#">在线咨询</a><a href="/#">在线咨询</a></span>
                </div>
                <a href="/#" class="two"><img src="/images/07.png"></a>
            </div>
            <b><img src="/images/MM.png"></b>
        </div>
    </div>

    <div class="main01">
        <h2>
            <span></span>
            <div class="right">
                <b class="curr01"></b><b></b><b></b>
                <a href="/javascript:"><p><i></i></p>
                    <p><big></big></p></a>
            </div>
        </h2>

        <div class="goods">
            <ul>
                <li><a href="/#"><img src="/images/index01.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index02.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index03.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index01.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index02.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index03.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index01.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index02.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index03.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index01.png"/>
                        <p>太极系列</p></a></li>
            </ul>
            <ul>
                <li><a href="/#"><img src="/images/index04.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index05.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index06.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index04.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index05.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index06.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index04.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index05.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index06.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index04.png"/>
                        <p>太极系列</p></a></li>
            </ul>
            <ul>
                <li><a href="/#"><img src="/images/index07.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index05.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index03.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index07.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index05.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index03.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index07.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index05.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index03.png"/>
                        <p>太极系列</p></a></li>
                <li><a href="/#"><img src="/images/index01.png"/>
                        <p>太极系列</p></a></li>
            </ul>
        </div>
    </div>

    <div class="main02">
        <h2>
            <span></span>
            <!--<div class="right">
                <b></b><b></b><b class="curr01"></b>
                <p class="curr02"></p><p></p>
            </div>-->
        </h2>
        <div class="company01"><span>中国智慧，全球时尚</span>
            <p>上海化妆品瓶有限公司，是上海家化联合股份有限公司
                的全资子公司，拥有近3000万的固定注册资产。1998年8月，
                化妆品作为全新概念的现代中草药中高档个人护理品品牌被
                推出市场，并以其独树一帜在定位，很快在国内化妆品市场
                崛起，在消费者心中树立起自然、清新、健康良好的品牌形
                象。</p><a href="/#">了解更多>></a></div>
        <div class="company02">
            <img src="/images/002.png">
            <p>公司大楼</p><span>公司座落于:上海市浦东新区陆家嘴西路168号正大广场1层</span>
        </div>
        <div class="company03">
            <img src="/images/003.png">
            <p>首家海外店铺成立</p><span>化妆品家海外旗舰店于法国巴黎的歌剧院大道38号盛
大揭幕。旗舰店空间设计流露浓浓东方韵味,</span>
        </div>
    </div>
    <script src="/js/index.js"></script>
@endsection

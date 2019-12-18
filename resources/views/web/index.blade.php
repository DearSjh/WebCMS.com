@extends('layouts.web')

@section('content')

    <!-- 首页banner -->
    <!-- Swiper -->
    <div class="swiper-container">

        <div class="swiper-wrapper">
            @foreach(Banner() as $banner)
                <div class="swiper-slide" style="margin-right: 0px!important;">
                    <a title="通祐视觉" href="{{ $banner['link'] }}" target="_blank">
                        <img src="{{ $banner['picture'] }}" alt="通祐视觉"/>
                    </a>
                </div>
            @endforeach

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination" style="display:none;"></div>

        <div class="title1">
            <div class="container">
                <span>最新产品</span>
            </div>
        </div>

    </div>
    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-slide img {
            width: 100%;
        }

        .swiper-container-horizontal > .swiper-pagination-bullets, .swiper-pagination-custom, .swiper-pagination-fraction {
            bottom: 102px;
        }

        .swiper-pagination-bullet {
            width: 56px;
            line-height: 4px;
            height: 4px;
            border-radius: 3px;
            background: #fff;
            opacity: .6;
        }

        .swiper-pagination-bullet-active {
            opacity: 1;
        }

        .swiper-container-horizontal > .swiper-pagination-bullets .swiper-pagination-bullet {
            margin: 0px 6px;
        }
    </style>



    <div class="main1">
        <div class="title1">
            <div class="container">
                <span>最新产品</span>
            </div>
        </div>
        <div class="tab2li container">
            <ul class="clearfix">

                @foreach(ArticleList(7, 6) as $list)
                    <li>
                        <a href="{{ $list['link'] }}">
                            <img src="{{ $list['main_pic'] }}">
                            <p>{{ $list['title'] }}</p></a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="tab2s clearfix">

            <div class="tab2 container clearfix">
                <div class="tabimg bounceInleft1">
                    <a href="http://www.koyoai.com/product/569.html"><img
                                src="http://www.koyoai.com/template/default/images/show_product.png"></a>
                </div>
                <div class="text1 bounceInRight1">
                    <div class="line1"></div>
                    <h3>E30 <p>KY-MV-EVS系列</p></h3>

                    <div class="libox clearfix">
                        <div class="icon-item">
                            <p><img src="http://www.koyoai.com/template/default/images/t1.png" alt=""></p>
                            <div class="p-14">轮廓识别</div>
                        </div>
                        <div class="icon-item">
                            <p><img src="http://www.koyoai.com/template/default/images/t2.png" alt=""></p>
                            <div class="p-14">颜色面积识别</div>
                        </div>
                        <div class="icon-item">
                            <p><img src="http://www.koyoai.com/template/default/images/t3.png" alt=""></p>
                            <div class="p-14">宽度高度识别</div>
                        </div>
                        <div class="icon-item">
                            <p><img src="http://www.koyoai.com/template/default/images/t4.png" alt=""></p>
                            <div class="p-14">直径节距</div>
                        </div>
                    </div>

                    <div class="more1 clearfix">
                        <a href="http://www.koyoai.com/product/569.html">产品详情 +</a>
                        <a href="http://www.koyoai.com/product/569.html#fw">应用范围 +</a>
                    </div>
                </div>
            </div>

            <div class="tab2 container clearfix" style="display:none;">
                <div class="tabimg bounceInleft1">
                    <a href="http://www.koyoai.com/p/product3.html"><img
                                src="http://www.koyoai.com/template/default/images/product4.png"></a>
                </div>
                <div class="text1 bounceInRight1">
                    <div class="line1"></div>
                    <h3>环形平角无影光源 <p>美好生活的承担者 </p></h3>

                    <div class="libox clearfix">
                        <div class="icon-item icon-item2">
                            <img src="http://www.koyoai.com/template/default/images/t1.png" alt="">
                            <div class="p-14">照射均匀的光线</div>
                        </div>
                        <div class="icon-item icon-item2">
                            <img src="http://www.koyoai.com/template/default/images/t2.png" alt="">
                            <div class="p-14">以0°的照射方式穿过漫射板</div>
                        </div>
                        <div class="icon-item icon-item2">
                            <img src="http://www.koyoai.com/template/default/images/t3.png" alt="">
                            <div class="p-14">以低角度照射被测物体上</div>
                        </div>
                        <div class="icon-item" style="display:none;">
                            <img src="http://www.koyoai.com/template/default/images/t4.png" alt="">
                            <div class="p-14">直径节距</div>
                        </div>
                    </div>

                    <div class="more1 clearfix">
                        <a href="http://www.koyoai.com/p/product3.html">产品详情 +</a>
                        <a href="http://www.koyoai.com/product/569.html#fw">应用范围 +</a>
                    </div>
                </div>
            </div>

            <div class="tab2 container clearfix" style="display:none;">
                <div class="tabimg bounceInleft1">
                    <a href="http://www.koyoai.com/p/product2.html"><img
                                src="http://www.koyoai.com/template/default/images/product3.png"></a>
                </div>
                <div class="text1 bounceInRight1">
                    <div class="line1"></div>
                    <h3>高均匀条形光源<p>美好生活的承担者</p></h3>

                    <div class="libox clearfix">
                        <div class="icon-item icon-item3">
                            <img src="http://www.koyoai.com/template/default/images/t1.png" alt="">
                            <div class="p-14">更高均匀性，更高亮度</div>
                        </div>
                        <div class="icon-item icon-item3">
                            <img src="http://www.koyoai.com/template/default/images/t2.png" alt="">
                            <div class="p-14">特别适合大尺寸特征的成像场合运用</div>
                        </div>
                        <div class="icon-item" style="display:none;">
                            <img src="http://www.koyoai.com/template/default/images/t3.png" alt="">
                            <div class="p-14">宽度高度识别</div>
                        </div>
                        <div class="icon-item" style="display:none;">
                            <img src="http://www.koyoai.com/template/default/images/t4.png" alt="">
                            <div class="p-14">直径节距</div>
                        </div>
                    </div>

                    <div class="more1 clearfix">
                        <a href="http://www.koyoai.com/p/product2.html">产品详情 +</a>
                        <a href="http://www.koyoai.com/product/569.html#fw">应用范围 +</a>
                    </div>
                </div>
            </div>

            <div class="tab2 container clearfix" style="display:none;">
                <div class="tabimg bounceInleft1">
                    <a href="http://www.koyoai.com/p/product4.html"><img
                                src="http://www.koyoai.com/template/default/images/product5.png"></a>
                </div>
                <div class="text1 bounceInRight1">
                    <div class="line1"></div>
                    <h3>光源恒流控制器<p>美好生活的承担者</p></h3>

                    <div class="libox clearfix">
                        <div class="icon-item icon-item4">
                            <p><img src="http://www.koyoai.com/template/default/images/t1.png" alt=""></p>
                            <div class="p-14">亮度可无级精准调节</div>
                        </div>
                        <div class="icon-item icon-item4">
                            <p><img src="http://www.koyoai.com/template/default/images/t2.png" alt=""></p>
                            <div class="p-14">输出电流不随输出电压增大而变化，保证LED长寿命稳定工作</div>
                        </div>
                        <div class="icon-item icon-item4">
                            <p><img src="http://www.koyoai.com/template/default/images/t3.png" alt=""></p>
                            <div class="p-14">全系带外部触发，可适应5~24伏高低电平，适应不同外部传感器</div>
                        </div>
                        <div class="icon-item icon-item4">
                            <p><img src="http://www.koyoai.com/template/default/images/t4.png" alt=""></p>
                            <div class="p-14">具有短路保护，过压保护，过流保护等功能</div>
                        </div>
                    </div>

                    <div class="more1 clearfix">
                        <a href="http://www.koyoai.com/p/product4.html">产品详情 +</a>
                        <a href="http://www.koyoai.com/product/569.html#fw">应用范围 +</a>
                    </div>
                </div>
            </div>

        </div>


        <script>
            // $(".tab2li li").eq(0).addClass("cur");
            // $(".tab2").eq(0).show();
            // $(".tab2li li").click(function(){
            //     $(this).addClass("cur").siblings().removeClass("cur");
            //     var ind=$(this).index();
            //     $(".tab2").eq(ind).show().siblings(".tab2").hide();
            // })
        </script>

    </div>

    <div class="main2 clearfix">
        <div class="title2 container clearfix">
            <span class="mtitle2"><div class="line3"></div>通祐视觉</span>
            <span class="mtitle3"><img src="http://www.koyoai.com/template/default/images/title1.png"></span>
            <a href="about/" class="more2"><img src="http://www.koyoai.com/template/default/images/more1.jpg"></a>
        </div>
        <div class="container">
            <p class="intro1 ">
                专注于机器视觉与人工智能技术及应用，帮助企业提高产品质量管控，降低制造成本，提高生产效率，助力企业实现“工业4.0”。
            </p>
        </div>
        <div class="main2-content clearfix">
            <div class="main2l">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="data/images/slide/20181226163447_911.jpg" alt="公司简介" class="img1"
                                 style="display:none;"/>
                            <img src="http://www.koyoai.com/data/images/slide/20181225102158_284.jpg" alt="公司简介"
                                 class="img1"/>
                        </div>
                        <div class="swiper-slide">
                            <img src="data/images/slide/20181226163456_318.jpg" alt="公司简介" class="img1"
                                 style="display:none;"/>
                            <img src="http://www.koyoai.com/data/images/slide/20190125095956_539.jpg" alt="公司简介"
                                 class="img1"/>
                        </div>
                        <div class="swiper-slide">
                            <img src="" alt="" class="img1" style="display:none;"/>
                            <img src="http://www.koyoai.com/data/images/slide/20190125100051_834.jpg" alt=""
                                 class="img1"/>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="main2r">
                <img src="http://www.koyoai.com/template/default/images/about1.jpg">
                <div class="m2_text">
                    <h1>智能让检测如此简单</h1>
                    <p>
                        江苏通祐视觉科技有限公司成立于2018年，以机器视觉及人工智能为主要研究方向，专注于机器视觉与人工智能技术及应用，为工业自动化领域提供方便易用的视觉系统、视觉软件、视觉传感器设备以及相关技术方案。</p>
                    <p><br/></p>
                    <p>通祐视觉帮助企业提高产品质量管控，降低制造成本，提高生产效率，助力企业实现“工业4.0”。</p>
                    <a href="p/about.html">公司简介 +</a>
                </div>
            </div>
        </div>
    </div>


    <div class="main3 container">
        <div class="title2 clearfix">
            <span class="mtitle2"><div class="line3"></div>新闻资讯</span>
            <span class="mtitle3"><img src="http://www.koyoai.com/template/default/images/title2.png"></span>
            <a href="news/" class="more2"><img src="http://www.koyoai.com/template/default/images/more1.jpg"></a>
        </div>
        <p class="intro1">
            用创新的科技、严谨的品质和高效的服务承担美好生活
        </p>
        <ul class="news_list1 clearfix">
            <li>
                <a href="http://www.koyoai.com/news/387.html" title="机器视觉检测技术介绍">
                    机器视觉检测技术介绍
                </a>
                <p>一、机器视觉系统机器视觉（machine vision）或者计算机视觉（computer vision）是用机器人...</p>
                <span>2019-06-14</span>

            </li>
        </ul>
    </div>

    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

        });

    </script>

@endsection

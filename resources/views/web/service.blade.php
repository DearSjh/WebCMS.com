@extends('layouts.web')

@section('content')

    <!-- 内页banner -->


    <div class="n_banner">
        <img src="http://www.koyoai.com/data/images/slide/20181220135140_638.jpg" alt="解决方案" title="解决方案" />
        <div class="text">
            <h2>技术&服务</h2>
            <p>专注于机器视觉与人工智能技术及应用，为工业自动化领域提供方便易用的视觉系统、视觉软件、视觉传感器设备以及相关技术方案。</p>
            <a href="http://www.koyoai.com/message/">去咨询 >></a>
        </div>
    </div>



    <!-- 主体部分 -->

    <div class="n_title ">
        <div class="container">
            <div class="site">

                首 页 > 技术&服务
                <span><a href="http://www.koyoai.com/">返回首页</a></span>


            </div>
        </div>
    </div>


    <div class="content2 container clearfix">


        <div class="left">
            <div class="sort_menu">

                <ul class="sort">
                    <li class="about_a">
                        <a href="http://www.koyoai.com/about_jsfw/jssl961.html">技术实力</a>
                    </li>
                    <li class="about_a">
                        <a href="http://www.koyoai.com/about_jsfw/fwysa69.html">服务优势</a>
                    </li>
                </ul>
                <script type="text/javascript">
                    $(".about_a").hover
                    (
                        function()
                        {
                            if($(this).find(".about_b li").length > 0)
                            {
                                $(this).find(".about_b").stop().show();

                            }
                            $(this).addClass("change");
                        },
                        function()
                        {
                            $(this).find(".about_b").stop().hide();
                            $(this).removeClass("change");
                        }
                    );
                </script>

            </div>
        </div>


        <div class="right">

            <div class="content">

                <div class="sortt1">
                    <a href="http://www.koyoai.com/about_jsfw/jssl961.html">技术实力</a>
                    <a href="http://www.koyoai.com/about_jsfw/fwysa69.html">服务优势</a>
                </div>
                <div class="n_title2">技术实力</div>
                <p style="text-indent:28px;text-autospace:ideograph-numeric;line-height:150%"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;">江苏通祐视觉科技有限公司成立于2018年初春，集科研、生产、方案形成于一体，专业从事机器视觉检测、测量与定位系统的研发与应用，致力于工业智能视觉新技术的研发与市场开拓。历经了两年余的创业发展，公司在董事长王琰的带领下，以卓越的专利技术、突出的技术实力、强大的资源力量和全新的管理模式，完成了一定质量数量的优质解决方案，创造了显著的社会和经济效益，赢得了良好的企业声望和信誉。</span></p><p style="text-indent:28px;text-autospace:ideograph-numeric;line-height:150%"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;">公司注册资金1000万元，具有中、高级算法工程师近十余人，拥有各类检验测试平台，并设有专门的产品测试房间，现今公司主要在3C行业、包装行业以及模塑行业，有着视觉检测有无、视觉轮廓检测等检测内容案例。</span></p><p style="text-indent:28px;text-autospace:ideograph-numeric;line-height:150%"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;">“专业、真诚、高效”是公司应对每一个客户的行为准则。公司承揽的方案项目范围暂且为华东地区，通祐视觉检测在为客户节约基础投资的同时，逐步解决质检工人效率低、精度不稳定、成本持续投入等问题。以优良的质量和低廉的报价，得到客户的好评，收到了良好的社会和经济效益。</span></p><p style="text-indent: 28px; line-height: 150%;"><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 16px;">“攀技术之巅，创行业生机”——江苏通祐视觉科技有限公司始终以技术创新为源动力，以促进行业技术进步为己任，坚持“开发一流技术、提供一流服务、打造一流企业”，愿以先进的技术、经济的报价、优质的服务、科学的管理和真诚的态度，为社会提供服务，为客户创造价值，愿与社会各界建立长期、稳定、友好、共赢的全面合作关系，携手共进，同创未来。</span></p>

            </div>
        </div>
    </div>

@endsection
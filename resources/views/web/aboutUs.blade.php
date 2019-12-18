@extends('layouts.web')

@section('content')

    <!-- 内页banner -->
    <div class="n_banner n_banner1" id="about1">
        <img src="http://www.koyoai.com/data/images/slide/20181220084655_458.png" alt="关于我们" title="关于我们" />
        <div class="text">
            <h2>江苏通祐视觉科技有限公司</h2>
            <div class="line2"></div>
            <span>美好生活承担者</span>
            <p>江苏通祐视觉科技有限公司成立于2018年，公司总部位于苏州市昆山市，在苏州工业园区设有研发中心，联合西安电子科技大学，以机器视觉及人工智能为主要研究方向，专注于机器视觉与人工智能技术及应用，为工业自动化领域提供方便易用的视觉系统、视觉软件、视觉传感器设备以及相关技术方案。</p><p><br/></p><p>通祐视觉帮助企业提高产品质量管控，降低制造成本，提高生产效率，助力企业实现“工业4.0”。</p>
            <a href="http://www.koyoai.com/message/">去咨询 >></a>
        </div>
    </div>
    <!-- 主体部分 -->
    <div class="about_main1 container2" id="about2">
        <div class="n_title1">企业文化</div>
        <ul class="qywh clearfix">
            <li>
                <img src="http://www.koyoai.com/data/images/slide/20181220090226_608.png">
                <h1>企业目标</h1>
                <p>用创新的科技、严谨的品质和高效的服务承担美好生活</p>
            </li>
            <li>
                <img src="http://www.koyoai.com/data/images/slide/20181220090317_419.png">
                <h1>企业理念</h1>
                <p>以专业素养 争行业上游<br>
                    以真诚服务 圆客户需求</p>
            </li>
            <li>
                <img src="http://www.koyoai.com/data/images/slide/20181220090407_734.png">
                <h1>企业精神</h1>
                <p>自主创新，铸科技视觉<br>
                    文化渊远，创行业领军</p>
            </li>
            <li>
                <img src="http://www.koyoai.com/data/images/slide/20181220090427_770.png">
                <h1>企业使命</h1>
                <p>专业、真诚、激情、创新</p>
            </li>
            <li>
                <img src="http://www.koyoai.com/data/images/slide/20181220090500_330.png">
                <h1>企业价值观</h1>
                <p>美好生活承担者<br>
                    Support a Better Life</p>
            </li>
        </ul>
    </div>

    <div class="about_main2" id="about3">
        <div class="n_title1">企业环境</div>
        <div class="swiper-container container2">
            <div class="swiper-wrapper">
                <div class="swiper-slide">

                    <img src="http://www.koyoai.com/data/images/slide/20181227134305_632.jpg" title="企业环境" alt="企业环境" class="img1"/>
                </div>
                <div class="swiper-slide">

                    <img src="http://www.koyoai.com/data/images/slide/20181227134325_702.jpg" title="企业环境" alt="企业环境" class="img1"/>
                </div>
                <div class="swiper-slide">

                    <img src="http://www.koyoai.com/data/images/slide/20181227134339_199.jpg" title="企业环境" alt="企业环境" class="img1"/>
                </div>
            </div>
            <div class="swiper-pagination" style="display:none;"></div>
        </div>
    </div>



    <div class="about_main3 container2" id="about4">
        <div class="n_title1">专家团队</div>
        <div class="pc_about">
            <div class="sideMenu clearfix" style="margin:0 auto">

                <h3 class="on">
                    <img src="http://www.koyoai.com/data/images/slide/20181220094023_133.jpg">
                    <p>副教授硕士生导师：张亮</p>
                    <span></span>
                </h3>
                <ul>
                    <div class="z_title">个人简介</div>
                    <li>
                        <span>姓名：张亮</span>&nbsp;&nbsp;&nbsp;
                        <span>学历：博士</span>&nbsp;&nbsp;&nbsp;
                        <span>职位：副教授硕士生导师</span>
                    </li>
                    <div class="z_title">教育经历</div>
                    <p>2015年3月毕业于浙江大学生物医学工程及仪器科学学院，取得仪器科学与技术学科工学博士学位。<br>
                        2015年4月入职西安电子科技大学软件学院，从事师资博士后研究工作。<br>
                        2017年4月师资博士后出站并留校工作至今。<br></p>
                </ul>
                <h3 class="on">
                    <img src="http://www.koyoai.com/data/images/slide/20190614093751_896.jpg">
                    <p>副教授硕士生导师：朱光明</p>
                    <span></span>
                </h3>
                <ul>
                    <div class="z_title">个人简介</div>
                    <li>
                        <span>姓名：朱光明</span>&nbsp;&nbsp;&nbsp;
                        <span>学历：博士</span>&nbsp;&nbsp;&nbsp;
                        <span>职位：副教授硕士生导师</span>
                    </li>
                    <div class="z_title">教育经历</div>
                    <p>2015年3月毕业于浙江大学生物医学工程及仪器科学学院，取得仪器科学与技术学科工学博士学位。<br>

                        2015年4月入职西安电子科技大学软件学院，从事师资博士后研究工作。<br>
                        2017年4月师资博士后出站并留校工作至今。</p>
                </ul>
            </div>
        </div>
        <script>
            jQuery(".sideMenu").slide({titCell:"h3", targetCell:"ul",defaultIndex:1,effect:"slideLeft",delayTime:300,returnDefault:true});
        </script>
        <div class="m_about" id="about4">
            <ul class="clearfix">

                <li class="m_text">
                    <h3>
                        <img src="http://www.koyoai.com/data/images/slide/20181220094023_133.jpg">
                        <p>副教授硕士生导师：张亮</p>
                        <span></span>
                    </h3>
                    <div class="xs">
                        <div class="close">X</div>
                        <div class="z_title">个人简介</div>

                        <span>姓名：张亮</span>
                        <span>学历：博士</span>
                        <span>职位：副教授硕士生导师</span>

                        <div class="z_title">教育经历</div>
                        <p>2015年3月毕业于浙江大学生物医学工程及仪器科学学院，取得仪器科学与技术学科工学博士学位。<br>
                            2015年4月入职西安电子科技大学软件学院，从事师资博士后研究工作。<br>
                            2017年4月师资博士后出站并留校工作至今。<br></p>
                    </div>
                </li>
                <li class="m_text">
                    <h3>
                        <img src="http://www.koyoai.com/data/images/slide/20190614093751_896.jpg">
                        <p>副教授硕士生导师：朱光明</p>
                        <span></span>
                    </h3>
                    <div class="xs">
                        <div class="close">X</div>
                        <div class="z_title">个人简介</div>

                        <span>姓名：朱光明</span>
                        <span>学历：博士</span>
                        <span>职位：副教授硕士生导师</span>

                        <div class="z_title">教育经历</div>
                        <p>2015年3月毕业于浙江大学生物医学工程及仪器科学学院，取得仪器科学与技术学科工学博士学位。<br>

                            2015年4月入职西安电子科技大学软件学院，从事师资博士后研究工作。<br>
                            2017年4月师资博士后出站并留校工作至今。</p>
                    </div>
                </li>

                <script>
                    $('.m_text').click(function(){
                        $(this).find('.xs').stop().toggle(400);
                    });

                    // $('.close').click(function(){
                    // $('.xs').hide(400);
                    // });
                </script>
            </ul>

        </div>
    </div>

    <div class="about_main2 about_main4" id="about5">
        <div class="container2">
            <div class="n_title1">合作伙伴</div>
            <div class="ct tab-content">
                <div id="owl-demo" class="owl-carousel clearfix">
                    <a class="item">
                        <img src="http://www.koyoai.com/data/images/slide/20181220104147_527.jpg" >
                        <p>西安电子科技大学嵌入式技术与视觉处理研究中心（XDU-ETVP），成立于2015年10月。研究中心依托于原西电软件学院大数据技术和嵌入式系统实验室基础成立，重点关注嵌入式技术、机器人复杂场景中环境感知与场景理解、地图构建与导航SLAM、深度学习、图像分布式编码、图像去雾增强等热点研究方向。</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

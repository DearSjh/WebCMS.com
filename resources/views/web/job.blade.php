@extends('layouts.web')

@section('content')
    <!-- 内页banner -->

    @include('web.banner')



    @include('web.sideLeft')


    <!-- main -->

    <div class="container n_container clearfix">

        <div class="right">
            <div class="content">

                <div class="n_title1">人才招聘</div>
                <div class="job_content clearfix">
                    <div class="job1">
                        <div class="job_title">{{ GetCustomData(1)['name'] }}</div>
                        <div class="job_content1">
                            {!! GetCustomData(1)['content'] !!}
                        </div>
                    </div>

                    <div class="job2">
                        <div class="job_title">职位空缺</div>
                        <ul class="job_list clearfix">


                            @foreach(Jobs() as $val)
                                <li>
                                    <h1>{{ $val['name'] }}</h1>
                                    <p class="p3">
                                        <span>学历要求：{{ $val['degree'] }}</span>
                                        <span>年龄要求：30周岁及以上</span>
                                        <span>工作地点：{{ $val['place'] }}</span>
                                        <a href="mailto:info@koyoai.com">立即申请</a>
                                    </p>

                                    <div class="jian"><a href="javascript:void(0);"><</a></div>
                                    {!! $val['description'] !!}
                                </li>
                            @endforeach


                        </ul>

                        <script type="text/javascript">
                            //始终有一个显示，点击谁，谁显示
                            $(document).ready(function () {
                                $('.job_list li:gt(9)').remove();
                                $(".job_list li:eq(0) .xs1").addClass('user-menu-nav-cur');//只显示第一个
                                $(".job_list li .xs1").addClass('user-menu-nav');//只显示第一个
                                $('.job_list li').click(function () {
                                    $(this).find('.xs1').addClass('user-menu-nav-cur');       //find是获取this下的子元素，即当前点击的元素
                                    $(this).find('.xs1').removeClass('user-menu-nav');
                                    $(this).siblings().find('.xs1').addClass('user-menu-nav');//siblings是获取前被点击元素之外的同级元素
                                    $(this).siblings().find('.xs1').removeClass('user-menu-nav-cur');
                                });
                            });

                        </script>


                    </div>
                </div>
                <style>
                    body {
                        background-color: #f0f0f0;
                    }

                    .main4 {
                        margin-top: 10em;
                    }

                </style>

            </div>
        </div>


    </div>

    <style>
        .left {
            display: none;
        }

        .right {
            width: 100%;
            float: none;
        }
    </style>
@endsection
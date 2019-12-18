@extends('layouts.web')

@section('content')
    <!-- 内页banner -->

    @php $info = ArticleInfo() @endphp

    @if(!empty($info))

        <div class="p_detail1">
            <div class="container clearfix">
                <div class="tab2lis">
                    <ul class="clearfix">
                        <li>
                            <img src="{{ $info['main_pic'] }}">
                        </li>
                    </ul>
                </div>

                <div class="tab2ss clearfix">

                    <div class="tabs2  bounceInRight1 clearfix">
                        <div class="tabsimg">
                            <a href=""> <img src="{{ $info['group_pic'] }}"></a>
                        </div>
                        <div class="texts1">
                            <h3>{{ $info['title'] }}<p>{{ $info['abstract'] }}</p></h3>
                            <a href="http://www.koyoai.com/message/" class="mores1">咨询客服</a>
                        </div>
                    </div>

                </div>


                <script>
                    $(".tab2lis li").eq(0).addClass("cur");
                    $(".tabs2").eq(0).show();
                    $(".tab2lis li").click(function () {
                        $(this).addClass("cur").siblings().removeClass("cur");
                        var ind = $(this).index();
                        $(".tabs2").eq(ind).show().siblings(".tabs2").hide();
                    })
                </script>

                <style>
                    .tabsimg{
                        background: none;
                        padding-bottom: 0;
                    }
                    .texts1 h3{
                        padding-top: 0px;
                    }
                </style>


            </div>
        </div>

        {!! $info['content'] !!}



        <style>
            .n_container{
                width: 100%;
                overflow: hidden;
            }
            .title3{
                font-size: 2rem;
                color: #333;
                text-align: center;
                margin: 2em 0 1em 0;
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
                position: relative;
            }
            .swiper-slide p{
                position: absolute;
                left: 15px;
                bottom:10px;
                color: #fff;
                font-size: 1.5rem;
            }
            .swiper-slide img{
                width: 100%;
            }
            .swiper-pagination{
                position: relative;
                padding-top: 20px;
            }
            .swiper-pagination-bullet{
                margin:0 5px;
            }
            .swiper-button-next{
                right: -66px;
                width: 27px;
                height: 44px;
                margin-top: -22px;
                z-index: 10;
                cursor: pointer;
                background-size: 27px 44px;
                background-position: center;
                background-repeat: no-repeat;
            }
            .swiper-button-prev{
                left: -66px;
                width: 27px;
                height: 44px;
                z-index: 10;
                cursor: pointer;
                background-size: 27px 44px;
                background-position: center;
                background-repeat: no-repeat;
            }
            .swiper-container .swiper-notification{
                /*display: none;*/
            }
            ::-webkit-scrollbar {
                width: 0px;
            }
            HTML {
                scrollbar-base-color: #fff;
                scrollbar-base-color: #fff;
                scrollbar-3dlight-color: #fff;
                scrollbar-highlight-color: #fff;
                scrollbar-track-color: #fff;
                scrollbar-arrow-color: #fff;
                scrollbar-shadow-color: #fff;
                scrollbar-dark-shadow-color: #fff;
            }
            .main4{
                margin-top: 3em;
            }
            @media(max-width: 768px){
                .swiper-slide p{
                    font-size: 1rem;
                }
            }

            .tabsimg {
                background: none;
                padding-bottom: 0;
            }

            .texts1 h3 {
                padding-top: 0px;
            }
        </style>


    @else

        @include('web.banner')


        @include('web.sideLeft')


        <!-- main -->

        <div class="container n_container clearfix">

            <div class="right">
                <div class="content">

                    <ul class="pro-list clearfix">

                        @foreach(ArticleAll(GetCatId()) as $val)
                            <li class="item1">
                                <a href="{{ $val['link'] }}" class="pro-a pm-btn-hover">
                                    <div class="pic">
                                        <img src="{{ $val['group_pic'] }}" alt="E30"/>
                                    </div>
                                    <div class="txts">
                                        <p class="ti ti1">{{ $val['title'] }}</p>
                                        <p class="ti ti2">{{ $val['abstract'] }}</p>
                                        <div class="pro-more clearfix">
                                            <div class="pm-btn"><span class="line"></span></div>
                                            查看详情
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                    </ul>


                </div>
            </div>

        </div>



    @endif

    <style>
        .left{
            display: none;
        }
        .right{
            width: 100%;
            float: none;
        }
    </style>
@endsection


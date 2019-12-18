@extends('layouts.web')

@section('content')

    @include('web.banner')

    @include('web.sideLeft')


    @if(GetArticleId() > 0)
        @php $info = ArticleInfo() @endphp

        <div class="content2 container clearfix">

            <div class="left">
                <div class="sort_menu">

                    <ul class="sort">
                        @foreach(SideBar() as $value)
                            <li class="layer1">
                                <a href="{{ $value['link'] }}" class="list_item">{{ $value['name'] }}</a>
                                <div class="layer2" style="display:none;">
                                    <ul>
                                    </ul>
                                </div>
                            </li>
                        @endforeach

                    </ul>

                    <script type="text/javascript">
                        $(".layer1").hover
                        (
                            function () {
                                if ($(this).find(".layer2 li").length > 0) {
                                    $(this).find(".layer2").show();
                                }
                            },
                            function () {
                                $(this).find(".layer2").hide();
                            }
                        );

                        $(".layer2 li").hover
                        (
                            function () {
                                if ($(this).find(".layer3 li").length > 0) {
                                    $(this).find(".layer3").show();
                                }
                            },
                            function () {
                                $(this).find(".layer3").hide();
                            }
                        );
                    </script>
                </div>
            </div>

            <div class="right">

                <div class="content">

                    <!-- 案例详细 -->
                    <div class="case_detail">

                        <div class="content">

                            {!! $info['content'] !!}

                        </div>


                    </div>
                </div>
            </div>

        </div>

    @elseif(CatLevel() == 2)

        <div class="container n_container clearfix">

            <div class="right">
                <div class="content">

                    <ul class="case_list clearfix">
                        @foreach(ArticleAll(GetCatId()) as $value)
                        <li>
                            <a href="{{ $value['link'] }}" title="光斑有无检测" class="img" target="_self">
                                <img src="{{ $value['main_pic'] }}" alt="光斑有无检测">
                            </a>
                            <h3><a href="" title="光斑有无检测">{{ $value['title'] }}</a></h3>
                        </li>
                        @endforeach
                    </ul>


                </div>
            </div>

        </div>

        <style>
            .left{
                display: none;
            }
            .right{
                width: 100%;
                float: none;
            }
        </style>

    @elseif(CatLevel() == 1)

        <div class="container">
            <ul class="case_list clearfix">

                @foreach(SideBar() as $value)
                <li>
                    <a title="模型行业" href="{{ $value['link'] }}">
                        <img src="{{ $value['picture'] }}" alt="模型行业">

                    </a>
                    <h3>
                        <a title="模型行业" href="{{ $value['link'] }}">
                            {{ $value['name'] }}
                        </a>
                    </h3>

                </li>
                @endforeach
            </ul>
        </div>

    @endif



@endsection
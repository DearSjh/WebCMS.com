@extends('layouts.web')

@section('content')


    <!-- 内页banner -->
    @include('web.banner')


    @include('web.sideLeft')


    <!-- main -->

    <div class="container n_container clearfix">

        <div class="right">
            <div class="content">

                <div class="n_title1">通祐视觉下载中心</div>
                <ul class="sortt container3 clearfix">

                    @foreach(SideBar() as $key => $item)
                        <li>
                        <span>
                            <img src="http://www.koyoai.com/template/default/images/d{{ ++$key }}.png">
                            <a href="@if($item['id'] == '17') javascript:void(0); @else {{ $item['link'] }} @endif">{{ $item['name'] }}</a>
                        </span>
                            <div class="downs">
                                @foreach($item['child'] as $value)
                                    <a href="{{ $value['link'] }}">{{ $value['name'] }}</a>
                                @endforeach
                            </div>
                        </li>
                    @endforeach

                </ul>

                <ul class="download_list container3 clearfix">

                    @foreach(ArticleAll(GetCatId()) as $value)
                        <li class="clearfix">
                            <div class="d_text">
                                <h1>{{ $value['title'] }}</h1>
                                <span style="display:none;">下载次数：{{ $value['visits'] }}</span>
                                <span>更新时间：{{ TimeConvert($value['updated_at']) }}</span>

                            </div>
                            <a class="xiaz" href="{{ $value['file_path'] }}" title="E30-Client"></a>
                        </li>
                    @endforeach

                </ul>
                <script>

                </script>
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
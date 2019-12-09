@extends('layouts.web')
<link href="/css/productxq.css" type="text/css" rel="stylesheet"/>
<link href="/css/product.css" type="text/css" rel="stylesheet"/>


@section('content')
    <div class="main">

        @include('web.sideLeft')

        <div class="right" id="center">
            <div class="title">
                @foreach(TopBar() as $value)
                    <p {{ Active($value['link'],'curr') }}>
                        <a href="{{ $value['link'] }}">{{ $value['name'] }}</a>
                    </p>
                @endforeach

            </div>
            <div class="line"><b></b><i></i></div>
            @php $info =  ArticleInfo();  @endphp

            @if(!empty($info))

                <div class="box01">
                    <b><img src="{{ $info['main_pic'] }}" style="border:solid 1px #d2e0ce"/></b>
                    <span>产品名称：{{ $info['title'] }}</br>系　　列：新七白系列</br>加倍莹润并呵护肌肤，令肌肤润白细腻</span>
                </div>
                <div class="txt">
                    {{ $info['content'] }}

                </div>
                <h3>关联产品</h3>
                <div class="box02" id="display">
                    <ul>
                        <li><img src="/images/product001.jpg"
                                 style="border:solid 1px #d2e0ce"/><br/><span>新七白美白日霜</span>
                        </li>
                        <li><img src="/images/product002.jpg"
                                 style="border:solid 1px #d2e0ce"/><br/><span>新七白美白润体乳</span>
                        </li>
                        <li><img src="/images/product003.jpg"
                                 style="border:solid 1px #d2e0ce"/><br/><span>新七白美白嫩肤眼膜</span>
                        </li>
                        <li><img src="/images/product004.jpg"
                                 style="border:solid 1px #d2e0ce"/><br/><span>新七白美白柔肤水</span>
                        </li>

                        <li><img src="/images/product005.png"
                                 style="border:solid 1px #d2e0ce"/><br/><span>新七白美白润体乳</span>
                        </li>
                        <li><img src="/images/product002.jpg"
                                 style="border:solid 1px #d2e0ce"/><br/><span>新七白美白嫩肤眼膜</span>
                        </li>
                        <li><img src="/images/product003.jpg"
                                 style="border:solid 1px #d2e0ce"/><br/><span>新七白美白柔肤水</span>
                        </li>
                        <li><img src="/images/product008.png"
                                 style="border:solid 1px #d2e0ce"/><br/><span>新七白美白日霜</span>
                        </li>

                        <li><img src="/images/product009.png"
                                 style="border:solid 1px #d2e0ce"/><br/><span>新七白美白润体乳</span>
                        </li>
                        <li><img src="/images/product002.jpg"
                                 style="border:solid 1px #d2e0ce"/><br/><span>新七白美白嫩肤眼膜</span>
                        </li>
                        <li><img src="/images/product003.jpg"
                                 style="border:solid 1px #d2e0ce"/><br/><span>新七白美白柔肤水</span>
                        </li>
                        <li><img src="/images/product012.png"
                                 style="border:solid 1px #d2e0ce"/><br/><span>新七白美白润体乳</span>
                        </li>
                    </ul>
                    <div class="prev"><a href="javascript:"></a></div>
                    <div class="next"><a href="javascript:"></a></div>
                </div>

            @else

                <div class="box02">
                    <div class="set01">
                        <ul>
                            @foreach(ArticleAll(GetCatId()) as $value)
                                <li>
                                    <a href="{{ $value['link'] }}">
                                        <img src="/images/013.png" style="border:solid 1px #d2e0ce"/>
                                        <span>新七白美白嫩肤面膜（S）</span>
                                    </a>
                                    <p>（焕新版） 促进肌肤活力和弹性，软化老化角质，修护肤色不均。</p>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="num">
                    <b><a href="javascript:">上一页</a></b>
                    <span class="curr"><a href="javascript:">1</a></span>
                    <span><a href="javascript:">2</a></span>
                    <span><a href="javascript:">3</a></span>
                    <span><a href="javascript:">4</a></span>
                    <b><a href="javascript:">下一页</a></b>
                </div>

            @endif
        </div>
    </div>

@endsection


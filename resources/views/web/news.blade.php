@extends('layouts.web')
<link href="/css/news.css" type="text/css" rel="stylesheet"/>

@section('content')

    <div class="main">

        @include('web.sideLeft')


        <div class="right" id="center">

            @php $info = ArticleInfo() @endphp

            @if(!empty($info))
                <h3>{{ $info['title'] }}</h3>

                <p>{{ $info['content'] }}</p>
            @else

                <ul>
                    @foreach(ArticleAll(GetCatId(),'',4) as $value)
                        <li>
                            <a href="{{ $value['link'] }}">
                                <img src="{{ $value['main_pic'] }}" style="border:solid 6px #e0eebf"/>
                                <div class="txt">
                                    {{ $value['title'] }}
                                    <p>
                                        {{ StrLimit($value['content'],300) }}
                                    </p>
                                </div>
                                <span>详情>></span>
                            </a>
                        </li>
                    @endforeach
                </ul>


                {{ Page() }}

            @endif

        </div>

    </div>
    <script src="/js/news.js"></script>
@endsection



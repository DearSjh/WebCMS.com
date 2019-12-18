@extends('layouts.web')

@section('content')
    <!-- 内页banner -->


    @include('web.banner')


    <!-- 主体部分 -->

    @include('web.sideLeft')



    <div class="content2 container clearfix">

        <div class="left">
            <div class="sort_menu">

                <ul class="sort">

                    @foreach(SideBar() as $value)
                        <li class="about_a">
                            <a href="{{ $value['link'] }}">{{ $value['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
                <script type="text/javascript">
                    $(".about_a").hover
                    (
                        function () {
                            if ($(this).find(".about_b li").length > 0) {
                                $(this).find(".about_b").stop().show();

                            }
                            $(this).addClass("change");
                        },
                        function () {
                            $(this).find(".about_b").stop().hide();
                            $(this).removeClass("change");
                        }
                    );
                </script>

            </div>
        </div>


        <div class="right">

            <div class="content">

                @php $info = ArticleInfo(GetCatId(),true) @endphp

                @if(!empty($info['id']))


                    <div class="n_title2">{{ $info['title'] }}</div>
                    {!! $info['content'] !!}

                @else


                    <div class="n_title2">在线留言</div>
                    <form class="message" method="post">
                        <input name="action" type="hidden" value="saveadd">
                        <ul id="message_main" class="clearfix">
                            <li>
                                <p>*姓名</p>
                                <input id="name" name="name" type="text" class="m_input">
                            </li>
                            <li>
                                <p>*电话号码</p>
                                <input id="contact" name="phone" type="text" class="m_input">
                            </li>
                            <li>
                                <p>*电子邮箱</p>
                                <input id="email" name="email" type="text" class="m_input">
                            </li>
                        </ul>
                        <div class="mess_content">
                            <p>留言内容</p>
                            <textarea id="content" name="content" class="m_input"></textarea>
                        </div>

                        <ul id="message_main" class="clearfix">
                            <li style="float: left">
                                <p>验证码</p>
                                <div style="display: flex">
                                    <input id="checkcode" name="code" type="text" class="m_input" >
                                    <img id="img" src="" style="">
                                </div>

                            </li>
                        </ul>

                        <div class="btn">
                            <input type="button" class="msgbtn" name="btn" value="提交留言">
                        </div>

                    </form>

                @endif
            </div>
        </div>


    </div>



@endsection
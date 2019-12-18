<header>
    <div class="container top clearfix">
        <div class="logo">
            <a href="/">
                <h1><img alt="视觉传感器" src="{{ WebInfo('logo') }}"/></h1>
            </a>
        </div>
        <!-- nav -->
        <ul class="nav clearfix">

            @foreach(NavBar() as $val)
                <li>
                    <a href="{{ $val['link'] }}">{{ $val['name'] }}</a>
                    <div class="sec">
                        @foreach($val['child'] as $child)
                            <a href="{{ $child['link'] }}">{{ $child['name'] }}</a>
                        @endforeach
                    </div>
                </li>
            @endforeach


            <script>
                $('.secc a:gt(3)').remove();
            </script>
        </ul>


        <script type="text/javascript">
            $(function () {
                $('.nav > li').hover(function () {
                    var sec_count = $(this).find('.sec a').length;
                    var a_height = $(this).find('.sec a').eq(0).height();
                    var sec_height = sec_count * a_height;
                    $(this).find('.sec').stop().animate({height: sec_height}, 300);
                }, function () {
                    $(this).find('.sec').stop().animate({height: 0}, 300);
                });
            });
        </script>


        <div class="navbg"></div>

        <div class="nav1">
            <div class="close">X</div>
            <ul id="nav1">
                @foreach(NavBar() as $val)
                    <li>
                        <a href="javascript:void(0);" class="m_nav1">{{ $val['name'] }}</a>
                        <div class="con" style="display: none;">
                            @foreach($val['child'] as $child)
                                <a href="{{ $child['link'] }}">{{ $child['name'] }}</a>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <script>
            $('.navbg').click(function () {
                $('.nav1').show(400);
            });

            $('.close').click(function () {
                $('.nav1').hide(400);
            });
        </script>
        <script>
            $('#nav1 li a.m_nav1').on('click', function () {
                if (!$(this).hasClass("cur2")) {
                    $(this).addClass("cur2").parent("li").siblings("li").find('.m_nav1').removeClass("cur2");
                    $(this).next('.con').slideDown().parent("li").siblings("li").find('.con').slideUp();
                } else {
                    $(this).removeClass("cur2");
                    $(this).next('.con').slideUp()
                }
            })
        </script>

        <ul class="translate">
            <li>
                <a class="lan">切换多语言</a>
                <div class="translate-en">
                    @foreach(Lang('lang') as $lang)
                        <a href="#" class="lang" id="{{ $lang['id'] }}" rel="nofollow">{{ $lang['name'] }}</a>
                    @endforeach
                </div>
            </li>
        </ul>

    </div>
</header>
<script type="text/javascript">
    $(function () {
        $('.translate > li').hover(function () {
            $(this).find('.translate-en').stop().show();
        }, function () {
            $(this).find('.translate-en').stop().hide();
        });
    });
</script>
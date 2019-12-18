@extends('layouts.web')

@section('content')

    <!-- 内页banner -->


    @include('web.banner')


    @include('web.sideLeft')


    <div class="content2 container clearfix">


        <div class="left">
            <div class="sort_menu">

                <ul class="sort">

                    @foreach(SideBar() as $val)
                        <li class="about_a">
                            <a href="{{ $val['link'] }}">{{ $val['name'] }}</a>
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
                <div class="n_title2">{{ $info['title'] }}</div>
                {!! $info['content'] !!}

            </div>
        </div>


    </div>

    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 4,
            spaceBetween: 40,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                }
            }
        });
    </script>

@endsection
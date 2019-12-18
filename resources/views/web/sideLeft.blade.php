<div class="n_title ">
    <div class="container">
        <div class="site">

            <a href="/">首 页</a>

            @foreach(Position() as $bd)
                > {{ $bd['name'] }}
            @endforeach

            <span><a href="/">返回首页</a></span>

        </div>
    </div>
</div>


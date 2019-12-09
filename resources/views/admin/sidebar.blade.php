<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user"></div>
            <ul class="nav nav-primary">
                <li class="nav-item index">
                    <a href="/admin/index" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>首页</p>
                    </a>
                </li>
                <li class="nav-item webInfo">
                    <a href="/admin/webInfo">
                        <i class="fas fa-layer-group"></i>
                        <p>网站信息配置</p>
                    </a>
                </li>
                <li class="nav-item banner">
                    <a href="/admin/banner/list">
                        <i class="fas fa-pen-square"></i>
                        <p>首页轮播图</p>
                    </a>
                </li>
                <li class="nav-item catelog">
                    <a href="/admin/category/list">
                        <i class="fas fa-pen-square"></i>
                        <p>栏目管理</p>
                    </a>
                </li>
                <li class="nav-item article">
                    <a href="/admin/article/list">
                        <i class="fas fa-table"></i>
                        <p>内容管理</p>
                    </a>
                </li>
                {{--<li class="nav-item goods">--}}
                    {{--<a href="/admin/goods/list">--}}
                        {{--<i class="fas fa-map-marker-alt"></i>--}}
                        {{--<p>商品管理</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item goodsCatelog">--}}
                    {{--<a href="/admin/goods/catelog/list">--}}
                        {{--<i class="far fa-chart-bar"></i>--}}
                        {{--<p>商品类别</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="nav-item friendLink">
                    <a href="/admin/friendLink/list">
                        <i class="fas fa-bars"></i>
                        <p>友情链接</p>
                    </a>
                </li>
                <li class="nav-item recruitment">
                    <a href="/admin/recruitment/list">
                        <i class="fas fa-bars"></i>
                        <p>招聘管理</p>
                    </a>
                </li>
                <li class="nav-item customData">
                    <a href="/admin/customData/list">
                        <i class="fas fa-bars"></i>
                        <p>自定义数据</p>
                    </a>
                </li>
                <li class="nav-item message">
                    <a href="/admin/message/list">
                        <i class="fas fa-desktop"></i>
                        <p>在线留言</p>
                        <span class="badge badge-success">4</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    var url = window.location.pathname
    if (url == '/admin/index'){
        $('.index').addClass('active')
    }
    if (url == '/admin/webInfo'){
        $('.webInfo').addClass('active')
    }
    if (url == '/admin/banner/list'){
        $('.banner').addClass('active')
    }
    if (url == '/admin/category/list'){
        $('.catelog').addClass('active')
    }
    if (url == '/admin/article/list'){
        $('.article').addClass('active')
    }
    if (url == '/admin/goods/list'){
        $('.goods').addClass('active')
    }
    if (url == '/admin/goodsCatelog/list'){
        $('.goodsCatelog').addClass('active')
    }
    if (url == '/admin/friendLink/list'){
        $('.friendLink').addClass('active')
    }
    if (url == '/admin/recruitment/list'){
        $('.recruitment').addClass('active')
    }
    if (url == '/admin/customData/list'){
        $('.customData').addClass('active')
    }
    if (url == '/admin/message/list'){
        $('.message').addClass('active')
    }
</script>
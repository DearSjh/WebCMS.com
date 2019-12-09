<div class="bottom">
    <div class="bb">
        <ul>
            <li><a href="/index.html">首页</a></li>
            <li><span></span><a href="/news.html">公司新闻</a></li>
            <li><span></span><a href="/product.html">产品中心</a></li>
            <li><span></span><a href="/companyIdea.html">公司理念</a></li>
            <li><span></span><a href="/contactUs.html">联系我们</a></li>
        </ul>
    </div>
    <p>© 上海化妆品有限公司版权所有 沪ICP备11049051号</p>
</div>
<script>
    $(function () {
        $.getJSON('/col',{url:window.location.href});
    });
</script>
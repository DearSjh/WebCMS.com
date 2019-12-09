<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue">

        <a href="/admin/index" class="logo">
            <img src="/assets/img/logo.svg" alt="" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item dropdown hidden-caret">
                    <button style="color: white;cursor:pointer;" class="el-button el-button--primary is-round clean_up_cookies">清理Cookies</button>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="/admin/message/list" id="notifDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        {{--留言数据有几条--}}
                        <span class="notification">0</span>
                    </a>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                    </a>
                    <div class="dropdown-menu quick-actions quick-actions-info" id="xiala">
                        <div class="quick-actions-header">
                            <span>退出登录</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
<script>
    $('.clean_up_cookies').click(function () {
        swal("你确定要清楚cookies?", {
            buttons: {
                cancel: "取消",
                catch: {
                    text: "确定",
                    value: "catch",
                },
            },
        }).then((value) => {
                switch (value) {
                    case "catch":
                        swal("清楚成功!", "", "success");
                        var cookies = document.cookie.split(";");
                        for (var i = 0; i < cookies.length; i++) {
                            var cookie = cookies[i];
                            var eqPos = cookie.indexOf("=");
                            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
                            document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
                        }
                        if(cookies.length > 0)
                        {
                            for (var i = 0; i < cookies.length; i++) {
                                var cookie = cookies[i];
                                var eqPos = cookie.indexOf("=");
                                var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
                                var domain = location.host.substr(location.host.indexOf('.'));
                                document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/; domain=" + domain;
                            }
                        }
                        window.location.reload()
                        break;
                }
            });
    })
</script>
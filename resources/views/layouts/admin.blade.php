<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="wangjinpeng">
    <title>@yield('title')</title>

    {{--jquery--}}
    <script src="/assets/js/core/jquery.3.2.1.min.js"></script>

    {{--element  vue--}}
    <script src="//cdn.jsdelivr.net/npm/vue@2.6.0"></script>
    <link rel="stylesheet" href="//unpkg.com/element-ui/lib/theme-chalk/index.css">
    <script src="//unpkg.com/element-ui/lib/index.js"></script>

    <!-- 最新的 Bootstrap 核心 css 文件 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    {{--总页面样式--}}
    <link rel="stylesheet" href="/assets/css/atlantis.css">

    {{--图标--}}
    <script src="/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            // google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
</head>
<body>

<div class="wrapper">

@include('admin.header')

<!-- Sidebar -->
    @include('admin.sidebar')


    <div class="main-panel">

        @yield('content')

        @include('admin.footer')
    </div>

    <!-- Custom template | don't include it in your project! -->
@include('admin.custombg')
<!-- End Custom template -->
</div>

<!-- jQuery UI -->

</body>
</html>
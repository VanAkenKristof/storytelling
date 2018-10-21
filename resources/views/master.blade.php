<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($title) ? $title : "Storytelling" }}</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/stylesheet.css" rel="stylesheet">

    @yield('styles')
</head>
<body>
<div id="wrapper">

    @include('partials._sidebar')

    <div id="page-wrapper" class="gray-bg" style="min-height: 938px;">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <ul class="nav navbar-top-links navbar-right">
                    @if (Auth::user())
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Log out

                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endif
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>{{ isset($subTitle) ? $subTitle : "Storytelling" }}</h2>
            </div>
        </div>

        <div class="wrapper wrapper-content  animated fadeInRight article">
            <div class="row">
                @yield('content')
            </div>
        </div>

        <div class="footer">
            <div class="pull-right">
                Karel De Grote Hogeschool <strong>2018-2019.</strong>
            </div>
            <div>
                <strong>Van Aken Kristof</strong> Web Development P1
            </div>
        </div>

    </div>
</div>
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="/js/inspinia.js"></script>
<script src="/js/plugins/pace/pace.min.js"></script>
@yield('scripts')
</body>
</html>
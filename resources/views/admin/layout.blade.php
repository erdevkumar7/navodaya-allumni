<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('admin.headerCSS')
</head>

<body>
    @include('admin.sidebar')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        @include('admin.topNav')        

        @yield('page_content')
				
        @include('admin.footer')
    </div>
    @include('admin.footerJS')
</body>
</html>

<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('admin.layout-data.headerCSS')
</head>

<body>
    @include('admin.layout-data.sidebar')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        @include('admin.layout-data.topNav')        

        @yield('page_content')
				
        @include('admin.layout-data.footer')
    </div>
    @include('admin.layout-data.footerJS')
</body>
</html>

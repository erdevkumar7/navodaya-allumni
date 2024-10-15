<!doctype html>
<html class="no-js" lang="en">

<head>
    @include('org.headerCSS')
</head>

<body>
    @include('admin.layout-data.sidebar')
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        @include('org.topNav')        

        @yield('page_content')
				
        @include('org.footer')
    </div>
    @include('org.footerJS')
</body>
</html>
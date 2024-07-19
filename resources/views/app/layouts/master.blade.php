<!DOCTYPE html>
<html lang="en">
<head>
    @include('app.layouts.head-tag')
    @yield('head-tag')
</head>
<body>
    
    @include('app.layouts.header')

    @yield('content')

      
             

    
    @include('app.layouts.footer')

    @include('app.layouts.scripts')
    @yield('script')

</body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('website.includes.head')
    </head>
    <body>
        @include('website.includes.nevbar')
        
        <!-- Page Content-->
        @yield('content')

        @include('website.includes.footer')

        @include('website.includes.script')
        
    </body>
</html>

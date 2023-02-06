<!DOCTYPE html>
<html lang="en">

<head>
@include('admin.includes.head')
</head>

<body>

  @include('admin.includes.header')

  @include('admin.includes.sidebar')
 
  @yield('content')

  @include('admin.includes.footer')

  @include('admin.includes.script')

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.head')
</head>
<body>
@include('layouts.partials.admin-nav')
@include('layouts.partials.header')
@yield('content')
@include('layouts.partials.footer-scripts')
</body>
</html>

<style>
    body {
        padding-top: 70px;
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    body::-webkit-scrollbar {
        display: none;
    }
</style>

